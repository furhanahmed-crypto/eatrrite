<?php

declare(strict_types=1);

final class SlotTimesStore
{
    private GoogleAppsScriptClient $sheet;
    private string $cacheFile;
    private string $localFile;
    private int $ttlSeconds = 300;

    public function __construct(array $config, ?GoogleAppsScriptClient $sheet = null)
    {
        $this->sheet = $sheet ?? new GoogleAppsScriptClient($config);
        $dir = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data';
        if (!is_dir($dir) && !mkdir($dir, 0775, true) && !is_dir($dir)) {
            throw new RuntimeException('Unable to create appointment data directory.');
        }
        $this->cacheFile = $dir . DIRECTORY_SEPARATOR . 'slot-times-cache.json';
        $this->localFile = dirname(__DIR__) . '/constants/slot-times-config.php';
    }

    /**
     * Sheet tab when present; otherwise the local PHP fallback.
     *
     * @return array{
     *   customer_meeting_minutes:int,
     *   consultant_prep_minutes:int,
     *   fallback_interval_minutes:int,
     *   weekly_hours:array<string, list<array{start:string,end:string}>>,
     *   source:string
     * }
     */
    public function load(): array
    {
        $cached = $this->readCache();
        if ($cached === 'miss') {
            $local = $this->loadLocal();
            $local['source'] = 'local';

            return $local;
        }
        if (is_array($cached)) {
            return $cached;
        }

        $fromSheet = $this->loadFromSheet();
        if ($fromSheet !== null) {
            $this->writeCache($fromSheet);

            return $fromSheet;
        }

        $this->writeMiss();
        $local = $this->loadLocal();
        $local['source'] = 'local';

        return $local;
    }

    /**
     * @return array<string, mixed>|null
     */
    private function loadFromSheet(): ?array
    {
        if (!$this->sheet->isConfigured()) {
            return null;
        }

        try {
            $payload = $this->sheet->listSlotTimesConfig();
        } catch (Throwable) {
            return null;
        }

        if (empty($payload['found'])) {
            return null;
        }

        try {
            $parsed = $this->parseSheetPayload($payload);
            $parsed['source'] = 'sheet';

            return $parsed;
        } catch (Throwable) {
            return null;
        }
    }

    /**
     * @param array<string, mixed> $payload
     * @return array{
     *   customer_meeting_minutes:int,
     *   consultant_prep_minutes:int,
     *   fallback_interval_minutes:int,
     *   weekly_hours:array<string, list<array{start:string,end:string}>>
     * }
     */
    public function parseSheetPayload(array $payload): array
    {
        $local = $this->loadLocal();
        $settings = is_array($payload['settings'] ?? null) ? $payload['settings'] : [];
        $windows = is_array($payload['windows'] ?? null) ? $payload['windows'] : [];

        $meeting = $this->intSetting($settings, 'customer_meeting_minutes', (int) $local['customer_meeting_minutes']);
        $prep = $this->intSetting($settings, 'consultant_prep_minutes', (int) $local['consultant_prep_minutes']);
        $fallback = $this->intSetting($settings, 'fallback_interval_minutes', (int) $local['fallback_interval_minutes']);

        $weekly = [
            'monday' => [],
            'tuesday' => [],
            'wednesday' => [],
            'thursday' => [],
            'friday' => [],
            'saturday' => [],
            'sunday' => [],
        ];

        $sawWindowRow = false;
        foreach ($windows as $window) {
            if (!is_array($window)) {
                continue;
            }
            $day = strtolower(trim((string) ($window['weekday'] ?? '')));
            if (!array_key_exists($day, $weekly)) {
                continue;
            }
            $sawWindowRow = true;
            $start = trim((string) ($window['start'] ?? ''));
            $end = trim((string) ($window['end'] ?? ''));
            if ($start === '' || $end === '') {
                continue;
            }
            $weekly[$day][] = ['start' => $start, 'end' => $end];
        }

        if (!$sawWindowRow) {
            throw new RuntimeException('slot-times-config sheet has no weekday rows.');
        }

        return [
            'customer_meeting_minutes' => $meeting,
            'consultant_prep_minutes' => $prep,
            'fallback_interval_minutes' => $fallback,
            'weekly_hours' => $weekly,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function loadLocal(): array
    {
        $rules = require $this->localFile;
        if (!is_array($rules)) {
            throw new RuntimeException('Local slot-times-config.php is invalid.');
        }

        return $rules;
    }

    /**
     * @param array<string, mixed> $settings
     */
    private function intSetting(array $settings, string $key, int $default): int
    {
        if (!array_key_exists($key, $settings) || $settings[$key] === '' || $settings[$key] === null) {
            return $default;
        }

        $value = (int) $settings[$key];

        return $value > 0 ? $value : $default;
    }

    /**
     * @return array<string, mixed>|null|'miss'
     */
    private function readCache(): array|string|null
    {
        if (!is_readable($this->cacheFile)) {
            return null;
        }
        $decoded = json_decode((string) file_get_contents($this->cacheFile), true);
        if (!is_array($decoded) || empty($decoded['at'])) {
            return null;
        }
        if (time() - (int) $decoded['at'] > $this->ttlSeconds) {
            return null;
        }
        if (!empty($decoded['miss'])) {
            return 'miss';
        }
        if (!is_array($decoded['rules'] ?? null)) {
            return null;
        }

        return $decoded['rules'];
    }

    /**
     * @param array<string, mixed> $rules
     */
    private function writeCache(array $rules): void
    {
        file_put_contents(
            $this->cacheFile,
            json_encode(['at' => time(), 'rules' => $rules], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
        );
    }

    private function writeMiss(): void
    {
        file_put_contents(
            $this->cacheFile,
            json_encode(['at' => time(), 'miss' => true], JSON_UNESCAPED_SLASHES)
        );
    }
}

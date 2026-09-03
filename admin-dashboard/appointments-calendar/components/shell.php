<div class="er-cal" data-er-calendar data-view="<?php echo htmlspecialchars($view, ENT_QUOTES, 'UTF-8'); ?>">
    <header class="er-cal-topbar">
        <div>
            <p class="er-admin-kicker">Eat Rrite consultant</p>
            <h1>Appointments calendar</h1>
        </div>
        <?php if ($showLogout): ?>
            <a class="er-cal-text-btn" href="<?php echo htmlspecialchars(admin_dashboard_logout_url(), ENT_QUOTES, 'UTF-8'); ?>">Sign out</a>
        <?php endif; ?>
    </header>

    <?php if ($error !== ''): ?>
        <p class="er-admin-alert"><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
    <?php endif; ?>

    <div class="er-cal-layout">
        <?php require __DIR__ . '/sidebar.php'; ?>
        <section class="er-cal-main">
            <?php require __DIR__ . '/toolbar.php'; ?>
            <?php if ($view === 'day'): ?>
                <?php require __DIR__ . '/day-grid.php'; ?>
            <?php else: ?>
                <?php require __DIR__ . '/month-grid.php'; ?>
                <?php require __DIR__ . '/month-agenda.php'; ?>
            <?php endif; ?>
        </section>
    </div>

    <?php require __DIR__ . '/detail-drawer.php'; ?>
</div>

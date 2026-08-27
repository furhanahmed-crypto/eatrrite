/**
 * Eat Rrite appointment booking – standalone Google Apps Script
 *
 * Create this from https://script.google.com (not from the sheet Extensions menu).
 * It opens the spreadsheet by ID. The Google Drive file name does not matter.
 *
 * Script properties (gear icon → Project Settings):
 *   SCRIPT_SECRET  = value of GOOGLE_APPS_SCRIPT_SECRET in .env
 *   SHEET_ID       = 1hbwqnwyzt4heR4O6lHQtCDItofUkbCH98vQxuQRaWbU
 *   TAB_NAME       = Sheet1
 *
 * Then: Services (+) → Google Calendar API
 * Deploy → New deployment → Web app → Execute as Me → Anyone
 * Paste the /exec URL into .env as GOOGLE_APPS_SCRIPT_WEBAPP_URL
 *
 * Run testSheetAccess() once in the editor to grant spreadsheet permission.
 */

const HEADERS = [
  'Name',
  'Service',
  'Phone Number',
  'Appointment Date',
  'Appointment Time',
  'Google Meet Link',
  'Appointment Booked At',
];

function doPost(e) {
  try {
    const payload = parsePayload_(e);
    assertSecret_(payload.secret);

    if (payload.action === 'list') {
      return json_({ ok: true, booked: listBooked_(payload) });
    }

    if (payload.action === 'book') {
      return json_(book_(payload));
    }

    return json_({ ok: false, error: 'Unknown action.' }, 400);
  } catch (error) {
    const message = error && error.message ? error.message : String(error);
    const taken = message === 'slot_taken';
    return json_({
      ok: false,
      error: taken ? 'That slot was just booked. Please pick another time.' : message,
      code: taken ? 'slot_taken' : 'error',
    });
  }
}

function doGet() {
  return json_({ ok: true, service: 'eatrrite-appointments' });
}

function parsePayload_(e) {
  if (!e || !e.postData || !e.postData.contents) {
    throw new Error('Empty request.');
  }
  const payload = JSON.parse(e.postData.contents);
  if (!payload || typeof payload !== 'object') {
    throw new Error('Invalid JSON.');
  }
  return payload;
}

function assertSecret_(secret) {
  const expected = PropertiesService.getScriptProperties().getProperty('SCRIPT_SECRET') || '';
  if (!expected || secret !== expected) {
    throw new Error('Unauthorized Apps Script request.');
  }
}

function getSheet_(payload) {
  const props = PropertiesService.getScriptProperties();
  const tabName = (payload && payload.tab_name) || props.getProperty('TAB_NAME') || 'Sheet1';
  const sheetId = (payload && payload.sheet_id) || props.getProperty('SHEET_ID') || '';

  if (!sheetId) {
    throw new Error('Missing SHEET_ID. Set it in Apps Script properties.');
  }

  const spreadsheet = SpreadsheetApp.openById(sheetId);
  let sheet = spreadsheet.getSheetByName(tabName);
  if (!sheet) {
    sheet = spreadsheet.insertSheet(tabName);
  }

  ensureHeaders_(sheet);
  return sheet;
}

function testSheetAccess() {
  const sheet = getSheet_({});
  Logger.log('Connected to spreadsheet. Tab: ' + sheet.getName());
}

function ensureHeaders_(sheet) {
  const range = sheet.getRange(1, 1, 1, HEADERS.length);
  const current = range.getValues()[0];
  const missing = current.every(function (value) {
    return String(value).trim() === '';
  });

  if (missing) {
    range.setValues([HEADERS]);
    sheet.getRange(1, 1, 1, HEADERS.length).setFontWeight('bold');
    sheet.setFrozenRows(1);
  }
}

function listBooked_(payload) {
  const sheet = getSheet_(payload);
  const lastRow = sheet.getLastRow();
  if (lastRow < 2) {
    return [];
  }

  const values = sheet.getRange(2, 1, lastRow - 1, 5).getValues();
  const booked = [];

  values.forEach(function (row) {
    const date = normalizeDate_(row[3]);
    const time = normalizeTime_(row[4]);
    if (date && time) {
      booked.push({ date: date, time: time });
    }
  });

  return booked;
}

function book_(payload) {
  const lock = LockService.getScriptLock();
  lock.waitLock(20000);

  try {
    const date = normalizeDate_(payload.date);
    const time = normalizeTime_(payload.time);

    if (!date || !time) {
      throw new Error('Appointment date and time are required.');
    }

    const existing = listBooked_(payload);
    const taken = existing.some(function (row) {
      return row.date === date && row.time === time;
    });

    if (taken) {
      throw new Error('slot_taken');
    }

    const bookedAt = Utilities.formatDate(new Date(), 'Asia/Kolkata', 'yyyy-MM-dd HH:mm:ss');
    const meetLink = createMeetLink_(payload);
    const sheet = getSheet_(payload);

    sheet.appendRow([
      String(payload.name || ''),
      String(payload.service || ''),
      String(payload.phone || ''),
      date,
      time,
      meetLink,
      bookedAt,
    ]);
    sheet.getRange(sheet.getLastRow(), 4, 1, 2).setNumberFormat('@');

    return {
      ok: true,
      meet_link: meetLink,
      booked_at: bookedAt,
    };
  } finally {
    lock.releaseLock();
  }
}

function createMeetLink_(payload) {
  const startIso = payload.start_iso;
  const endIso = payload.end_iso;
  const title = 'Eat Rrite appointment – ' + (payload.name || 'Client');

  const event = Calendar.Events.insert(
    {
      summary: title,
      description: [
        'Service: ' + (payload.service || ''),
        'Phone: ' + (payload.phone || ''),
        'Payment ID: ' + (payload.payment_id || ''),
      ].join('\n'),
      start: { dateTime: startIso, timeZone: 'Asia/Kolkata' },
      end: { dateTime: endIso, timeZone: 'Asia/Kolkata' },
      conferenceData: {
        createRequest: {
          requestId: Utilities.getUuid(),
          conferenceSolutionKey: { type: 'hangoutsMeet' },
        },
      },
    },
    'primary',
    { conferenceDataVersion: 1 }
  );

  if (event.hangoutLink) {
    return event.hangoutLink;
  }

  if (event.conferenceData && event.conferenceData.entryPoints) {
    const video = event.conferenceData.entryPoints.filter(function (entry) {
      return entry.entryPointType === 'video' && entry.uri;
    })[0];
    if (video) {
      return video.uri;
    }
  }

  throw new Error('Google Meet link could not be created. Enable Calendar API in Apps Script.');
}

function normalizeDate_(value) {
  if (!value && value !== 0) {
    return '';
  }

  if (Object.prototype.toString.call(value) === '[object Date]' && !isNaN(value)) {
    return Utilities.formatDate(value, 'Asia/Kolkata', 'yyyy-MM-dd');
  }

  const text = String(value).trim();
  const iso = text.match(/^(\d{4}-\d{2}-\d{2})/);
  if (iso) {
    return iso[1];
  }

  const parsed = new Date(text);
  if (!isNaN(parsed.getTime())) {
    return Utilities.formatDate(parsed, 'Asia/Kolkata', 'yyyy-MM-dd');
  }

  return '';
}

function normalizeTime_(value) {
  if (!value && value !== 0) {
    return '';
  }

  if (Object.prototype.toString.call(value) === '[object Date]' && !isNaN(value)) {
    return Utilities.formatDate(value, 'Asia/Kolkata', 'HH:mm');
  }

  const text = String(value).trim();
  const match24 = text.match(/^([01]?\d|2[0-3]):([0-5]\d)/);
  if (match24 && !/am|pm/i.test(text)) {
    return pad_(match24[1]) + ':' + match24[2];
  }

  const match12 = text.match(/^(\d{1,2}):([0-5]\d)\s*([AaPp][Mm])/);
  if (match12) {
    let hour = parseInt(match12[1], 10);
    const minute = match12[2];
    const meridiem = match12[3].toUpperCase();
    if (meridiem === 'PM' && hour < 12) hour += 12;
    if (meridiem === 'AM' && hour === 12) hour = 0;
    return pad_(hour) + ':' + minute;
  }

  return '';
}

function pad_(value) {
  const text = String(value);
  return text.length === 1 ? '0' + text : text;
}

function json_(object) {
  return ContentService
    .createTextOutput(JSON.stringify(object))
    .setMimeType(ContentService.MimeType.JSON);
}

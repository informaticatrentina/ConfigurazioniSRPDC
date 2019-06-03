<?php

/**
 * @file
 * main local
 * This file contain all constants that is related to server configuration.
 * @author Pradeep<pradeep@incaendo.com>
 * @link http://www.incaendo.com
 * @copyright (c) 2015, Incaendo Technology Pvt Ltd.
 */

// Set it to prod for production server.
define('YII_ENV_DEV', 'dev');

// Set it false if want to disable log.
define('YII_DEBUG', TRUE);

$protocol = 'http://';
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
  $protocol = 'https://';
} else if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ||
  (array_key_exists('SERVER_PORT', $_SERVER) && $_SERVER['SERVER_PORT'] == 443)) {
  $protocol = 'https://';
}

// Define base url of site with trailng slash /.
define('BASE_URL', $protocol . 'jlb_crow.partecipa.tn.it/');

// File Storage settings:
// files used to store Control Panel settings, Main settings, Roles, Permissions.
// - copy sample files in /data/ dir into new ones and remove "_sample" suffix.
// - files need web server write permission.
define('FS_CONTROL_PANEL', 'controlPanel.properties.json');
define('FS_MAIN_SETTINGS', 'mainSettings.properties.json');
define('FS_ROLES', 'roles.properties.json');
define('FS_PERMISSION_TO_ROLES', 'permissionToRoles.properties.json');

// Cookie validation key.
define('COOKIE_VALIDATION_KEY', 'sdhvyewfvy8om2438ryhfnjbaf');

// Active error log.
define('ACTIVE_LOGS', " ['error', 'warning', 'trace']");

// Define theme name that you want to use.
define('THEME_NAME', 'basic');

// Set homepage title.
define('HOME_PAGE_TITLE', 'Home | Crowdfunding');

// Logo link url.
define('LOGO_LINK_URL', 'http://www.provincia.trento.it');

// Application log file name.
define('APP_LOG_FILE_NAME', 'cwdf.log');

// Set source for crowdfunding project to be saved in aggregator.
define('SOURCE', 'jlb_crow');

// Define language for showing all text.
define('SITE_LANGUAGE', 'it');

// Define Image related constant.
define('MAX_UPLOAD_FILE', 4);
define('ALLOWED_IMAGE_EXTENSION', 'png, jpg, jpeg');

// Set it to TRUE if organization is used in installation otherwise FALSE.
define('HOME_PAGE_ORGANIZATION',TRUE);

// Define constant for aggregator configuration.
#define('AGGREGATOR_API_URL', 'http://.partecipa.tn.it/api/v1/M91z6wSbYKwg1QNf/');
define('AGGREGATOR_API_URL', 'http://jlb_agg.partecipa.tn.it/api/v1/M91z6wSbYKwg1QNf/');

// Define constant for identity manager configuration.
define('IDM_API_URL', 'http://jlb_id.partecipa.tn.it/v1/');
define('IDM_ENTITY', 'users');
define('IDM_API_KEY', 'Za3Thei7pashoh2i');

// Define SMS API Credential.
define('SMS_API_URL', 'http://jsms.jlbbooks.it/Api.php');
define('SMS_API_KEY', 'jsms2k15');
define('SMS_API_USER', 'infotn');
define('SMS_API_EMAIL', 'info@partecipa.tn.it');
define('AUTH_CODE', '');

// Define static link.
define('PRIVACY_POLICY_LINK', 'http://www.provincia.tn.it/privacy');
define('TERM_OF_SERVICES', 'http://partecipa.tn.it/pianosalute/tos');
define('PROFILE_LINK', 'https://profili-dev.partecipa.tn.it/');

$money_range = array(100, 200, 300, 400);
define('MONEY_DEFAULT_RANGE', json_encode($money_range));

$time_range = array(8, 10, 12, 14);
define('TIME_DEFAULT_RANGE', json_encode($time_range));

// Define super user for crowdfunding.
$super_user = array('anna.stefani@tndigit.it','gianfranco.stellucci@tndigit.it');
define('SUPER_USER', json_encode($super_user));

// Defiend backend Roles. Verify FS_ROLES file before $super_user array.
if (file_exists(__DIR__.'/../data/'.FS_ROLES)) 
{
    $backend_roles_files=file_get_contents(__DIR__.'/../data/'.FS_ROLES);
    define("BACKEND_ROLES", $backend_roles_files);
}
else
{
    $backend_roles = array('standard' => Yii::t('app', 'Standard'),'organisation_owner' => Yii::t('app', 'Organisation'));
    define("BACKEND_ROLES", json_encode($backend_roles));
}

// Defiend additional question for new user.
$question = array(
  'dob' => array(
    'text' => 'Data di nascita',
  ),
  'gender' => array(
    'text' => 'Sesso',
    'value' => array('m' => 'Maschio', 'f' => 'Femmina',),
  ),
  'education_level' => array(
    'text' => 'Livello di istruzione',
    'value' => array(
      'elemetaryschool' => 'Licenza elementare',
      'middleschool' => 'Licenza scuola media',
      'highschool' => 'Diploma o qualifica di scuola media superiore',
      'degree' => 'Laurea/diploma universitario o titolo superiore',
      'other' => 'Altro',
    ),
  ),
  'citizenship' => array(
    'text' => 'Cittadinanza',
    'value' => array('italian' => 'Italiana', 'foreign' => 'Straniera',),
  ),
  'residence' => array(
    'text' => 'Residenza',
  ),
  'profession' => array(
    'text' => 'Professione',
  ),
  'work' => array(
    'text' => 'Lavoro',
    'value' => array('yc' => 'Sì, in modo continuativo',
      'nc' => 'Sì, in modo non continuativo',
      'no' => 'No',
    ),
  ),
  'public_authority' => array(
    'text' => 'Ente di appartenenza',
    'value' => array('healthauthority' => 'Azienda sanitaria',
      'province' => 'Provincia',
      'localauthority' => 'Amministrazione locale',
      'civilsociety' => 'Società civile',
      'school' => 'Scuola',
      'other' => 'Altro',
    ),
  ),
  'association' => array(
    'text' => 'Associazione',
    'value' => array('other' => 'Altro',),
  ),
  'attended_class' => array(
    'text' => 'Classe frequentata',
  )
);
define("ADDITIONAL_QUESTION", json_encode($question));

/* Define constants for email.
 * Allowed values for SMTP_ENCRYPTION:
 * - '' for no encryption
 * - 'tls'
 * - 'ssl'
 */

define('MAIL_FROM', 'info@partecipa.tn.it');
define('SMTP_HOST', 'smtp.infotn.it');
define('SMTP_USER', 'info@partecipa.tn.it');
define('SMTP_PASSWORD', 'mE872Dir*');
define('SMTP_PORT', '25');
define('SMTP_ENCRYPTION', '');

//Define limit in Bytes
define('UPLOAD_FILE_SIZE_LIMIT', 2 * 1024 * 1024);

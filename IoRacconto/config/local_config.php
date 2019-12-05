<?php

/**
 * This is a local config file. Created from sample file.
 * Contains all the configurations which will be local to an installation.
 * Author: Pradeep Kumar<pradeep@incaendo.com>
 * This file is part of <Timu>.
 */

/**
 * Caution: create a copy of this file as local_config.php and change required
 * configurations in it
 */

/**
 * Set error reporting (E_ALL enable it)
 */
error_reporting(0);
ini_set('display_errors', 0);

/**
 * Setting the protocol based on url accessed.
 */
$protocol = 'http://';
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
  $protocol = 'https://';
} else if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ||
  (array_key_exists('SERVER_PORT', $_SERVER) && $_SERVER['SERVER_PORT'] == 443)) {
  $protocol = 'https://';
}
define('PROTOCOL', $protocol);

/**
 * Set the timezone
 */
ini_set('date.timezone', 'Europe/Rome');

/**
 * Define installation details
 */
/* GP: instance related */
define('BASE_URL', PROTOCOL . 'jlb_timu.partecipa.tn.it/');
define('IMAGE_URL', BASE_URL .'/images/');

/**
 * Constant for database configuration
 */

define('DB_HOST', 'localhost');
define('DB_NAME', 'jlb_timu');
define('DB_USER', 'jlb_timu');
define('DB_PASS', 'jlb_timu');
define('DB_CHARSET', 'utf8');

/**
 * Define aggregator API URL (http://API_URL/)
 */
define('AGGREGATOR_API_URL', 'http://jlb_agg.partecipa.tn.it/api/v1/M91z6wSbYKwg1QNf/');

/**
 * Define identity manager details
 */
define('IDENTITY_MANAGER_API_URL', 'http://jlb_id.partecipa.tn.it/v1/');
define('IDM_USER_ENTITY', 'users');
define('IDM_API_KEY', 'Za3Thei7pashoh2i');



/**
 * Define app content filter key
 */
define('SOURCE', 'jlb_timu');

/**
 * Define application log file name
 */
define('APP_LOG_FILE_NAME', 'jlb_timu-' . date('d-M-Y').'.log');

/**
 * Define site session cookie name
 */
define('SITE_SESSION_COOKIE_NAME', 'jlb_timu');

/**
 * Define site language
 */
define('SITE_LANGUAGE', 'it_it');

/**
 * Define site title
 */
define('SITE_TITLE', 'IoRacconto');

/**
 * Define constant for uploading image extension and size (in byte)
 */
define('ALLOWED_IMAGE_EXTENSION', '["jpg", "png", "jpeg"]');
define('UPLOAD_IMAGE_SIZE_LIMIT', 5242880);

/**
 * define constant upload directory
 */
define('UPLOAD_DIRECTORY', 'uploads/');

/**
 * define constant  for  runtime directory
 */
define('RUNTIME_DIRECTORY', dirname(__FILE__).'/../runtime');

//constant for registration page url (page for user's registeration)
// define('REGISTRATION_URL','https://www.civiclinks.it/it/a/register/?network=story');
define('REGISTRATION_URL','#');

define('SESSION_TIMEOUT_TIME', 172800);

define('USER_GENERATED_DIRECTORY', '["uploads"]');
$rbacPermission = array(
  'is_admin' => 'Admin',
  'can_create_story' => "Can create story",
  'can_edit_story' => "Can edit story",
  'can_delete_story' => "Can delete story",
  'can_add_post' => "Can add post"
  );
define('PERMISSION', json_encode($rbacPermission));
define('ALL_ENTRY', '999999');
#define('STORY','story');
define('STORY','story');

define('SITE_THEME', 'classic');
define('RBAC_ADMIN_USER', 'anna.stefani@tndigit.it');
define('DEFAULT_EMAIL', 'info@partecipa.tn.it');
define('INVITATION_MAIL_SUBJECT', 'Invitation for adding story');
define('SHORT_DESCRIPTION_LIMIT', 242);

//define constant for user profile
define('PROFILE_IMAGE_URL', 'https://jlb_prof.partecipa.tn.it/photo/');
define('PROFILE_URL', 'https://jlb_prof.partecipa.tn.it/show/');

// Add SMTP parameters
define('SMTP_HOST', 'smtp.infotn.it');
define('SMTP_PORT', '25');
define('SMTP_USER', 'info@partecipa.tn.it');
define('SMTP_PASSWORD', 'mE872Dir*');
define('SMTP_AUTH', true);
// set 1 for enable sendmail else 0 for smtp
define('ENABLE_SENDMAIL', 0);

define('AHREF_FOUNDATION_URL', 'http://www.ahref.eu/it');
define('AHREF_FOUNDATION_LOGO', 'http://civi.ci/img/logoahref.png');
define('CIVIC_LINKS_LOGO', 'http://story.timu.it/themes/classic/images/civiclinkslogo.png');
define('CIVIC_LINKS_BASE_URL', 'https://www.civiclinks.it/');
define('FACT_CHECKING_PROJECT_BASE_URL', 'https://factchecking.civiclinks.it/');
define('TIMU_PROJECT_BASE_URL', 'https://timu.civiclinks.it/');
define('CIVICI_PROJECT_BASE_URL', 'http://civi.ci');
define('CONTEST_GRANT_PROJECT_BASE_URL', 'http://civicgrant.civiclinks.it');

define('LOGOUT_URL', BASE_URL . 'logout');
define('ENABLE_NAVBAR_MODULE', 1);
$enabledModules = array('backendconnector', 'rbacconnector', 'static/navbar');
define('ENABLE_MODULES_LIST', json_encode($enabledModules));

/*
 * define domain for creating cookie
 */
define('COOKIE_DOMAIN', 'jlb_timu.partecipa.tn.it');

/**
 * Constant to define image quality from 1 to 100
 */
define('RESIZE_IMAGE_QUALITY_LIMIT', 50);

/**
 * Constant to define min image size where 1024 = 1KB.
 */
define('MIN_IMAGE_SIZE_FOR_RESIZED', 1024);

/**
 * Constant for allowed files(Ex. pdf, docs etc)
 */
$allowedFileExtention = array('pdf', 'mpeg');
define('ALLOWED_FILE_EXTENTIONS', json_encode($allowedFileExtention));

$allowedAudioFileExtention = array('mpeg', 'mp3');
define('ALLOWED_AUDIO_FILE_EXTENTIONS', json_encode($allowedAudioFileExtention));

define('GOOGLE_MAP_API_KEY', 'AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM');
define('GOOGLE_MAP_API_URL', 'https://maps.googleapis.com/maps/api/js?key=' . GOOGLE_MAP_API_KEY . '&sensor=false');

//Define api_key for entity manager
define('EM_API_KEY', 'a87669e925f30da27c253e75d832af14');
define('EM_SALT', '07d14f9b716a88cae4ce709d80ce8287793f63ae');
define('ENCRYPTION_KEY', 'incaendo');
define('ACTIVATION_LINK_TIME_OUT', 30 * 86400);
define('FIRST_STORY_SLUG', '');
define('SHARE_LOCATION', 'Share Location');

//authentication key for google analytic code
define('GOOGLE_ANALYTIC_AUTH_KEY', 'UA-92297575-19');
define('GOOGLE_ANALYTIC_COOKIE_DOMAIN','jlb_timu.partecipa.tn.it');

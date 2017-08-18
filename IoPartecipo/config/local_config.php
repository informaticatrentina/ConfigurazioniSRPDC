<?php

/**
 * This is a local config file. Created from sample file.
 * Contains all the configurations which will be local to an installation.
 * @author Santosh Singh <santosh@incaendo.com>
 * @author Sankalp Mishra <sankalp@incaendo.com>
 * This file is part of <Civico>.
 * This file can not be copied and/or distributed without the express permission
 * of <ahref Foundation.
 */

/**
 * Caution: create a copy of this file as local_config.php and change
 * required configurations in it
 */

/**
 * set error reporting on turn it off on production. Or just remove
 * following two lines on production
 */
//error_reporting(0);
//ini_set('display_errors', 0);

/**
 * Setting the protocol based on url accessed
 */
$protocol = 'http://';
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
  $protocol = 'https://';
} else if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) {
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
define('BASE_URL', 'https://jlb_civici.partecipa.tn.it/');
define('IMAGE_URL', BASE_URL . 'images/');
define('CONTEST_IMAGE_URL', BASE_URL . 'uploads/contestImage/');

/**
 * Constant for database configuration
 */
define('DB_HOST', 'localhost');
define('DB_NAME', 'jlb_civici');
define('DB_USER', 'jlb_civici');
define('DB_PASS', 'jlb_civici');
define('DB_CHARSET', 'utf8');

/**
 * Define aggregator API URL (http://API_URL/)
 */

define('AGGREGATOR_API_URL', 'http://jlb_agg.partecipa.tn.it/api/v1/M91z6wSbYKwg1QNf/');

/**
 * Define identity manager details
 */
#define('IDENTITY_MANAGER_API_URL', 'http://jlb_id.partecipa.tn.it/v1/');
#define('IDM_USER_ENTITY', 'users');
#define('IDM_API_KEY', 'AbDM5azSzE4bCqml');

define('IDENTITY_MANAGER_API_URL', 'http://jlb_id.partecipa.tn.it/v1/');
define('IDM_USER_ENTITY', 'users');
define('IDM_API_KEY', 'identitymngt-soc');

/**
 * Define application log file name
 */
define('APP_LOG_FILE_NAME', 'jlb_civici-' . date('d-M-Y').'.log');

/**
 * Define site session cookie name
 */
define('SITE_SESSION_COOKIE_NAME', 'jlb_civici');

/**
 * Define contest Admin users email
 */
define('DISCUSSION_ADMIN_USERS', '[ "anna.stefani@infotn.it",  "alessio.massaro@infotn.it"]');

/**
 * Define site language
 */
define('SITE_LANGUAGE', 'it_it');

/**
 * Define site title
 */
define('SITE_TITLE', 'IoPartecipo Riforma Statuto');
define('SITE_NAME', 'IoPartecipo Riforma Statuto');

/**
 * Constant for Site/Page Title
 */
define('TITLE', 'IoPartecipo Riforma Statuto');

/**
 * Define social settings
 */
define('TWITTER_USERNAME', '');
define('FACEBOOK_USERNAME', '');
define('LINKEDIN_USERNAME', '');

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
 * define constant for runtime directory
 */
define('RUNTIME_DIRECTORY', dirname(__FILE__).'/../runtime');

/**
 * constant for aggregator source for this site instance
 */
define('CIVICO', 'jlb_civici');

/**
 * define constant for civiclinks constant
 */
define('CIVICLINKS_NETWORK_TOKEN', 'jlb_civici');

/**
 * Constants for profile manager
 */
define('PROFILE_IMAGE_URL', 'https://jlb_prof.partecipa.tn.it/photo/');
define('PROFILE_URL', 'https://jlb_prof.partecipa.tn.it/show/');
/**
 * constant for registration page url (page for users registration)
 */
define('REGISTRATION_URL','#');

/**
 * constant for logout url
 */
define('LOGOUT_URL', BASE_URL . 'logout');

/**
 * Max filesize
 */
ini_set('upload_max_filesize','5M');

/**
 * constant for load all entry
 */
define('ALL_ENTRY', 999999);

/**
 * Constant for Session Time out time
 */
define('SESSION_TIMEOUT_TIME', 172800);

/**
 * Constant for submission
 */
define('SUBMISSION_CLOSED', false);

/**
 * Define constant for theme
 */
define('SITE_THEMES', 'civici-iopart_statuto');

/**
 * Constant for number of boxes to be shown in a single row on home page
 */
define('CHUNK_SIZE', 2);

/**
 * This constant is used in destinazioneitalia theme. The indexes of array are the
 * name of discussions and their values are the color of div of that discussion.
 */
$divColors = array(
  'educare' => 'skyblue',
  'donare' => 'olive',
  'produrre' => 'blue',
  'cooperare' => 'yellow',
  'lavorare' => 'red',
  'curare' => 'wheat',
  'recuperare' => 'purple'
  );

$divColors = serialize($divColors);
define('DIV_COLORS', $divColors);

/**
 * Constant for key and languages of translation
 */
define('TRANSLATION_API_KEY', '');
define('TRANSLATE_LANGUAGE', '["italian"]');

/**
 * Constant for number of characters
 */
define('CHAR_LIMIT', '500');
define('USER_GENERATED_DIRECTORY', '["assets"]');

// no of proposal submmitted by a user
define('PROPOSAL_SUBMIT_LIMIT', 3);

// constant for disable google language detection
define('GOOGLE_TRANSLATION_ENABLED', 0);

// authentication key for google analytic code
define('GOOGLE_ANALYTIC_AUTH_KEY', 'UA-57628407-7');
define('GOOGLE_ANALYTIC_COOKIE_DOMAIN','jlb_civici.partecipa.tn.it');

/**
 * Constant to define active log level. Possible vaues are:
 * info, error, trace, warning
 * we can pass multiple values as comma sepreated
 */
define('LOG_LEVEL_ACTIVE', 'error, info, trace');

// super admin user
define('RBAC_ADMIN_USER', 'stefano.schivari@jlbbooks.it');

// all permissions that can be assigned
$rbacPermission = array(
  'is_admin' => 'Admin',
  'can_post_answers_on_opinion' => 'Can post answers on opinion',
  'can_mark_highlighted' => 'Can mark highlighted',
  'can_show_hide_opinion' => 'Can Show Hide Opinion',
  'configure_home_page' => 'Configure home page',
  'create_new_discussion' => 'Create new discussion',
  'access_report' => 'Access report'
  );
define('PERMISSION', json_encode($rbacPermission));

// define constant for available feature in theme
$themeFeature = array('notification_email' => true, 'visibility_changes_email' => true);
define('THEME_FEATURE', json_encode($themeFeature));

/**
 * Email sending constants
 */
// set 1 for enable sendmail else 0 for smtp
define('ENABLE_SENDMAIL', 0);
define('SMTP_HOST', 'smtp.infotn.it');
define('SMTP_PORT', '25');
define('SMTP_USER', 'info@partecipa.tn.it');
define('SMTP_PASSWORD', 'ds453grt');
define('SMTP_AUTH', true);
// Default email
define('DEFAULT_EMAIL', 'info@partecipa.tn.it');
// Feed email: the email author for the feeds
define('FEED_EMAIL', 'noreply@partecipa.tn.it');

/**
* Constant to define modules(list of enabled modules)
*/
define('ENABLE_NAVBAR_MODULE', 1);
$enabledModules = array('backendconnector','rbacconnector', 'static/navbar');
define('ENABLE_MODULES_LIST', json_encode($enabledModules));

// Define constant for generate encrypted link
define('EM_SALT', '07d14f9b716a88cae4ce709d80ce8287793f63ae');
define('ENCRYPTION_KEY', 'infoTN');
define('ACTIVATION_LINK_TIME_OUT', 5 * 86400);

// Define constants for users additional details and statistics
$question = array(
  'age_range' => array(
    'text' => 'Fascia di età',
    'value' => array(
      '18-24' => '18-24',
      '25-39' => '25-39',
      '40-64' => '40-64',
      '65-80' => '65-80',
      'over 80' => 'over 80'
      )
    ),
  'age' => array(
   'text' => 'Età'
   ),
  'sex' => array(
    'text' => 'Genere',
    'value' => array('M' => 'Maschio', 'F' => 'Femmina')
    ),
  'education_level' => array(
    'text' => 'Livello di istruzione',
    'value' => array(
      'elemetaryschool' =>  'Licenza elementare',
      'middleschool' =>  'Licenza scuola media',
      'highschool' =>  'Diploma o qualifica di scuola media superiore',
      'degree' =>  'Laurea/diploma universitario o titolo superiore',
      'other' => 'Altro'
      )
    ),
  'citizenship' => array(
    'text' => 'Cittadinanza',
    'value' => array(
      'italian' =>  'Italiana',
      'foreign' =>  'Straniera'
      )
    ),
  'work' => array(
    'text' => 'Lavoro',
    'value' => array(
      'YC' => 'Sì, in modo continuativo',
      'NC' => 'Sì, in modo non continuativo',
      'N' => 'No'
      )
    ),
  'public_authority' => array(
    'text' => 'Ente di appartenenza',
    'value' => array(
      'healthauthority' => 'Azienda sanitaria',
      'province' => 'Provincia',
      'localauthority' => 'Amministrazione locale',
      'civilsociety' => 'Società civile',
      'other' => 'Altro'
      )
    ),
  'profession' => array(
    'text' => Yii::t('discussion', 'Professione (lavoratore/studente/altro)')
    ),
  'residence' => array(
    'text' => Yii::t('discussion', 'Residenza')
    ),
  'association' => array(
                       'text' => 'Minoranza Linguistica',
                       'value' => array(
                                    'Cimbro' => 'Cimbro',
                                    'Ladino' => 'Ladino',
                                    'Mocheno' => 'Mocheno',
                                    'Nessuna' => 'Nessuno'
                                  )
    )
  );
define('ADDITIONAL_INFORMATION', json_encode($question));

$proposalSortingOrder = array('albhabetical' => 'Alphabetical', 'opinion_count' => 'No of opinion', 'custom_weight' => 'Custom weight');
define('PROPOSAL_SORTING_BASE', json_encode($proposalSortingOrder));

$statisticsPoint = array(
  'age_range' => 'Fascia di età',
  'sex' => 'Genere',
  'education_level' => 'Livello istruzione',
  'residence' => 'Residenza',
  'profession' => 'Professione',
  'association' => 'Minoranza Linguistica'
  );
define('USER_STATISTIC_POINT', json_encode($statisticsPoint));

$userStatisticChart = array(
  'age_range' => array(
    'title' => 'Utente - Fascia di età',
    'header' => array('User', 'Fascia di età')
    ),
  'sex' => array(
    'title' => 'Utente - Genere',
    'header' => array('User', 'Genere')
    ),
  'education_level' => array(
    'title' => 'Utente - Livello istruzione',
    'header' => array('User', 'Livello istruzione')
    ),
  'residence' => array(
    'title' => 'Utente - Residenza',
    'header' => array('User', 'Residenza')
    ),
 'profession' => array(
    'title' => 'Utente - Professione',
    'header' => array('User', 'Professione')
    ),
  'association' => array(
    'title' => 'Utente - Minoranza Linguistica',
    'header' => array('User', 'Minoranza')
    ),
  );
define('USER_STATISTIC_CHART_INFO', json_encode($userStatisticChart));

$allStatistics = array(
  'age_range' => 'Fascia di età',
  'sex' => 'Genere',
  'education_level' => 'Livello istruzione',
  'residence' => 'Residenza',
  'profession' => 'Professione',
  'association' => 'Minoranza Linguistica'
  );
define('STATS', json_encode($allStatistics));


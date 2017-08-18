<?php

/**
 * This file is used for define constant and configuration of Aggregator project
 * Copyright (c) 2014 <ahref Foundation -- All rights reserved.
 * Author: Pradeep Kumar<pradeep@incaendo.com>
 * This file is part of <Timu>.
 * This file can not be copied and/or distributed without the express permission of
 *  <ahref Foundation.
 */

/**
 * Including local configuration file.
 */
require_once(dirname(__FILE__).'/local_config.php');
require_once(dirname(__FILE__).'/featurePermission.php');
require_once(dirname(__FILE__).'/../function.php');
/**
 * define constant for story
 */
define('STORY','story');
/**
 * define constant for response format
 */
define('RESPONSE_FORMAT', 'json');

/**
 * define constant for entry
 */
define('ENTRY', 'entry');

/**
 * define constant for default limit (number of entry to be show)
 */
define('DEFAULT_LIMIT', 1);
define('POST_LIMIT', 20);

/**
 * define constant for default offset
 */
define('DEFAULT_OFFSET', 0);

/**
 * define constant for curl timeout (execution time)
 */
define('CURL_TIMEOUT', 60);

/**
 * define log message level
 */
define('INFO', 'info');
define('ERROR', 'error');
define('DEBUG', 'trace');
define('WARNING', 'warning');

//define constant for source - save with entry
define('SOURCE', 'timu');


/**
 * define constant for entry limit
 */
define('ENTRY_LIMIT', 20);

//define constatnt for status
define('ACTIVE', 1);
define('INACTIVE', 0);

//define constant for user profile
define('PROFILE_IMAGE_URL', 'http://profiles.test.hub.x.ahref.eu/photo/');
define('PROFILE_URL', 'http://profiles.test.hub.x.ahref.eu/show/');
define('PROFILE_IMAGE_SIZE', 350);
$url = substr(BASE_URL, 0, -1);
define('THEME_URL', $url . '/themes/' . SITE_THEME . '/');
define('IMAGE_URL', THEME_URL. '/images/');

//constant for type of story
define('INVITE_STORY_TYPE', 'Invite');
define('OPEN_STORY_TYPE', 'Open');
//status of invited author
define('PENDING', 'Pending');
define('APPROVED', 'approved');

define('ENCRIPT_SALT', 'da39a3ee5e6b4b0d3255bfef95601890afd80709');
define('POST_CUSTOM_TAG_SCHEME', 'http://ahref.eu/scheme/custom-tag');
define('SHARE_LOCATION_TAG_SCHEME', 'http://ahref.eu/scheme/share-location');
/*
 * configuration for interaction of file
 */

return array(
  'defaultController' => 'story',
  'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
  'runtimePath' => RUNTIME_DIRECTORY,
  'name' => SITE_TITLE,
  'import' => array(
    'application.models.*',
    'application.components.*',
    'application.controllers.*',
    'application.extensions.JsTrans.*',
    'application.views.*',
    'application.lib.*',
  ),
  'sourceLanguage' => 'en',
  'language' => SITE_LANGUAGE,
  'preload' => array('log'),
  'components' => array(
    array('themeManager' => array('basePath' => dirname(__FILE__) . '../../themes')),
    'log' => array(
      'class' => 'CLogRouter',
      'routes' => array(
        array(
          'class' => 'CFileLogRoute',
          'levels' => 'trace, info, error',
          'logFile' => APP_LOG_FILE_NAME
        )
      ),
    ),
   'viewRenderer' => array(
      'class' => 'ext.ETwigViewRenderer',
      'fileExtension' => '.html',
      'functions' => array(
        'getTweets' => 'getTweets'    ,
        'getFirstContest' => 'getFirstContest',
        'checkPermission' => 'checkPermission',
        'getImageDimension' => 'getImageDimension',
        'getContestList' => 'getContestList',
        'getAdminMenuList' => 'getAdminMenuList',
        'adminMenuVisible' => 'adminMenuVisible',
        'canUserEditPost' => 'canUserEditPost',
        'stories' => 'stories'
      )
    ),

    'db' => array(
      'class' => 'CDbConnection',
      'connectionString' => 'mysql:host='.DB_HOST.';dbname='.DB_NAME,
      'username' => DB_USER,
      'password' => DB_PASS,
      'emulatePrepare' => true,
      'charset' => DB_CHARSET,
    ),
    'image'=>array(
      'class'=>'application.extensions.image.CImageComponent',
      'driver'=>'GD',
    ),
    'urlManager' => array(
      'urlFormat' => 'path',
      'showScriptName' => false,
      'caseSensitive'=>false,
      'rules'=> array(
        '' => 'story/index',
        'admin/story/list' => 'story/getStory',
        'admin/story/createStory' => 'story/create',
        'admin/story/edit/<slug:[\w-]+>' => 'story/edit',
        'admin/story/delete/<slug:[\w-]+>/<status:[\d-]+>' => 'story/delete',
        'login' => 'user/login',
        'logout' => 'user/logout',
        'story/upload' => 'story/uploadImage',
        'story/pdfUpload' => 'story/uploadFiles',
        'story/audioUpload' => 'story/audioFiles',
        'story/post/submit/<slug:[\w-]+>' => 'story/submitPost',
        'story/post' => 'story/getPost',
        'story/comment' => 'story/getComment',
        'story/comment/save' => 'story/saveComment',
        'story/desc' => 'story/getStoryDescription',
        'story/delete/<slug:[\w-]+>' => 'story/deletePost',
        'story/<slug:[\w-]+>/<tag_slug:[\w-]+>' => 'story/posts',
        'story/delete-comment' => 'story/deleteComment',
        'story/<slug:[\w-]+>' => 'story/posts',
        'admin/invitation/list/<slug:[\w-]+>' => 'invite/list',
        'admin/invitation/send/<slug:[\w-]+>' => 'invite/invitation',
        'admin/invitation/status/<slug:[\w-]+>' => 'invite/checkInvitationStatus',
        'register' => 'user/register',
        'user/activate' => 'user/activateUser',
        'user/question' => 'user/saveAdditionalInfo',
        'user/forgot-password' => 'user/forgotPassword',
        'user/change-password' => 'user/changePassword',
        'question/save' => 'user/saveAdditinalInformationQuestion',
      ),
    ),
    'session' => array(
      'sessionName' => SITE_SESSION_COOKIE_NAME,
      'class' => 'CHttpSession',
      'timeout' => SESSION_TIMEOUT_TIME,
      'cookieMode' => 'allow',
    ),
    'errorHandler' => array(
      'errorAction' => 'story/error',
    ),
    'messages' => array(
      'class' => 'CGettextMessageSource',
      'useMoFile' => FALSE,
      'catalog' => 'story'
    ),
    'globaldef' => array('class' => 'application.components.GlobalDef'),
  ),
  'modules'=> defined('ENABLE_MODULES_LIST') ? json_decode(ENABLE_MODULES_LIST, TRUE) : array()
);

<?php

/** This file is part of KCFinder project
  *
  *      @desc Base configuration file
  *   @package KCFinder
  *   @version 2.54
  *    @author Pavel Tzonkov <sunhater@sunhater.com>
  * @copyright 2010-2014 KCFinder Project
  *   @license http://www.opensource.org/licenses/gpl-2.0.php GPLv2
  *   @license http://www.opensource.org/licenses/lgpl-2.1.php LGPLv2
  *      @link http://kcfinder.sunhater.com
  */

// IMPORTANT!!! Do not remove uncommented settings in this file even if
// you are using session configuration.
// See http://kcfinder.sunhater.com/install for setting descriptions

$_CONFIG = array(


// GENERAL SETTINGS

    'disabled' => true,
    'theme' => "oxygen",
    'uploadURL' => "upload",
    'uploadDir' => "",

    'types' => array(

    // (F)CKEditor types
        'files'   =>  "",
        'flash'   =>  "swf",
        'images'  =>  "*img",

    // TinyMCE types
        'file'    =>  "",
        'media'   =>  "swf flv avi mpg mpeg qt mov wmv asf rm",
        'image'   =>  "*img",
    ),


// IMAGE SETTINGS

    'imageDriversPriority' => "imagick gmagick gd",
    'jpegQuality' => 90,
    'thumbsDir' => ".thumbs",

    'maxImageWidth' => 0,
    'maxImageHeight' => 0,

    'thumbWidth' => 100,
    'thumbHeight' => 100,

    'watermark' => "",


// DISABLE / ENABLE SETTINGS

    'denyZipDownload' => false,
    'denyUpdateCheck' => false,
    'denyExtensionRename' => false,


// PERMISSION SETTINGS

    'dirPerms' => 0755,
    'filePerms' => 0644,

    'access' => array(

        'files' => array(
            'upload' => true,
            'delete' => true,
            'copy'   => true,
            'move'   => true,
            'rename' => true
        ),

        'dirs' => array(
            'create' => true,
            'delete' => true,
            'rename' => true
        )
    ),

    'deniedExts' => "exe com msi bat php phps phtml php3 php4 cgi pl",


// MISC SETTINGS

    'filenameChangeChars' => array(/*
        ' ' => "_",
        ':' => "."
    */),

    'dirnameChangeChars' => array(/*
        ' ' => "_",
        ':' => "."
    */),

    'mime_magic' => "",

    'cookieDomain' => "",
    'cookiePath' => "",
    'cookiePrefix' => 'KCFINDER_',


// THE FOLLOWING SETTINGS CANNOT BE OVERRIDED WITH SESSION SETTINGS

    '_check4htaccess' => true,
    //'_tinyMCEPath' => "/tiny_mce",

    '_sessionVar' => &$_SESSION['KCFINDER'],
    //'_sessionLifetime' => 30,
    //'_sessionDir' => "/full/directory/path",

    //'_sessionDomain' => ".mysite.com",
    //'_sessionPath' => "/my/path",
);

// modx settings

if(!isset($modx))
{
	global $database_server,$database_user,$database_password,$database_connection_charset,$database_connection_method,$dbase,$site_sessionname,$https_port,$database_type;
	define('IN_MANAGER_MODE', 'true');
	define('MODX_API_MODE', true);
	$self = 'assets/plugins/kcfinder/kcfinder/config.php';
	$base_path = str_replace($self, '', str_replace('\\','/', __FILE__));
	include_once("{$base_path}manager/includes/config.inc.php");
	startCMSSession();
}

if(2 < count(explode(':',$host))) $host = substr($host,0,strrpos(':',$host));
$_CONFIG['disabled']        = false;
//echo $upload_url;exit;
$_CONFIG['uploadURL']       = $_SESSION['kcf_upload_url'];
$_CONFIG['uploadDir']       = $_SESSION['kcf_upload_dir'];
$_CONFIG['mime_magic']      = '';
$_CONFIG['maxImageWidth']   = $_SESSION['image_limit_width'];
$_CONFIG['maxImageHeight']  = 800;
$_CONFIG['thumbWidth']      = 75;
$_CONFIG['thumbHeight']     = 75;
$_CONFIG['thumbsDir']       = 'cache/.thumbs';
$_CONFIG['jpegQuality']     = 80;
$_CONFIG['cookieDomain']    = $_SESSION['kcf_http_host'];
$_CONFIG['cookiePath']      = '';
$_CONFIG['cookiePrefix']    = 'KCFINDER_';
$_CONFIG['_check4htaccess'] = false;
$_CONFIG['_tinyMCEPath']    = $_SESSION['kcf_mce_path'];

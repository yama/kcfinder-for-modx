<?php

/** This file is part of KCFinder project
  *
  *      @desc Base configuration file
  *   @package KCFinder
  *   @version 2.51
  *    @author Pavel Tzonkov <pavelc@users.sourceforge.net>
  * @copyright 2010, 2011 KCFinder Project
  *   @license http://www.opensource.org/licenses/gpl-2.0.php GPLv2
  *   @license http://www.opensource.org/licenses/lgpl-2.1.php LGPLv2
  *      @link http://kcfinder.sunhater.com
  */

// IMPORTANT!!! Do not remove uncommented settings in this file even if
// you are using session configuration.
// See http://kcfinder.sunhater.com/install for setting descriptions

$_CONFIG = array(

    'disabled' => true,
    'denyZipDownload' => false,
    'denyUpdateCheck' => false,
    'denyExtensionRename' => false,

    'theme' => "oxygen",

    'uploadURL' => "upload",
    'uploadDir' => "",

    'dirPerms' => 0755,
    'filePerms' => 0644,

    'access' => array(

        'files' => array(
            'upload' => true,
            'delete' => true,
            'copy' => true,
            'move' => true,
            'rename' => true
        ),

        'dirs' => array(
            'create' => true,
            'delete' => true,
            'rename' => true
        )
    ),

    'deniedExts' => "exe com msi bat php phps phtml php3 php4 cgi pl",

    'types' => array(

        // CKEditor & FCKEditor types
        'files'   =>  "",
        'flash'   =>  "swf",
        'images'  =>  "*img",

        // TinyMCE types
        'file'    =>  "",
        'media'   =>  "swf flv avi mpg mpeg qt mov wmv asf rm",
        'image'   =>  "*img",
    ),

    'filenameChangeChars' => array(/*
        ' ' => "_",
        ':' => "."
    */),

    'dirnameChangeChars' => array(/*
        ' ' => "_",
        ':' => "."
    */),

    'mime_magic' => "",

    'maxImageWidth' => 0,
    'maxImageHeight' => 0,

    'thumbWidth' => 100,
    'thumbHeight' => 100,

    'thumbsDir' => ".thumbs",

    'jpegQuality' => 90,

    'cookieDomain' => "",
    'cookiePath' => "",
    'cookiePrefix' => 'KCFINDER_',

    // THE FOLLOWING SETTINGS CANNOT BE OVERRIDED WITH SESSION CONFIGURATION
    '_check4htaccess' => true,
    //'_tinyMCEPath' => "/tiny_mce",

    '_sessionVar' => &$_SESSION['KCFINDER'],
    //'_sessionLifetime' => 30,
    //'_sessionDir' => "/full/directory/path",

    //'_sessionDomain' => ".mysite.com",
    //'_sessionPath' => "/my/path",
);

$base_url  = preg_replace('@(.*)/assets/.*@', '$1', $_SERVER['REQUEST_URI']);
$base_url  = rtrim($base_url,'/') . '/';
$base_path = preg_replace('@(.*)/assets/.*@', '$1', str_replace("\\", "/", dirname(__FILE__)));
$base_path = rtrim($base_path,'/') . '/';
include_once($base_path . 'assets/cache/kcf_config.php');
if($config['rb_base_url']!=='/') $upload_url = rtrim($config['rb_base_url'], '/');
$upload_dir = rtrim($config['rb_base_dir'], '/');
$host = getenv('SERVER_NAME');

$_CONFIG['disabled']        = false;
$_CONFIG['uploadURL']       = $base_url . $upload_url;
$_CONFIG['uploadDir']       = $upload_dir;
$_CONFIG['mime_magic']      = '';
$_CONFIG['maxImageWidth']   = 800;
$_CONFIG['maxImageHeight']  = 600;
$_CONFIG['thumbWidth']      = 75;
$_CONFIG['thumbHeight']     = 75;
$_CONFIG['thumbsDir']       = 'cache/.thumbs';
$_CONFIG['jpegQuality']     = 80;
$_CONFIG['cookieDomain']    = $host;
$_CONFIG['cookiePath']      = '';
$_CONFIG['cookiePrefix']    = 'KCFINDER_';
$_CONFIG['_check4htaccess'] = false;
$_CONFIG['_tinyMCEPath']    = $base_url . 'assets/plugins/tinymce/jscripts/tiny_mce';

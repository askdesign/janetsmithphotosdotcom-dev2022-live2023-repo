<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly
/* --- MULTI-SITE Control ---
  All non-checkbox options for this theme are filtered based on the 'unfiltered_html' capability,
  so non-admins and non-editors can only add safe html to the various options. It should be
  fairly safe to leave all theme options available on your Multi-site installation. If you want
  to eliminate most of the options that let users enter HTML,
  then set WVRX_MULTISITE_RESTRICT_OPTIONS to true.

  You can uncomment the const WVRX_MULTISITE_RESTRICT_OPTIONS = true;
  ( remove the // in front ) in this file, but that change will be
  overwritten when you update the theme. You can also copy the uncommented line to the wp-config.php
  file for your WP installation ( anywhere before the "That's all, stop editing! Happy blogging." line ),
  and the setting will then survive WP and theme updates.
*/

// const WVRX_MULTISITE_RESTRICT_OPTIONS = true;

/* Version Information */

const WEAVERX_VERSION = '5.0.7';
const WEAVERX_VERSION_ID = 100;
const WEAVERX_THEMENAME = 'Weaver Xtreme'; // do not change in child theme!

const WEAVERX_THEMEVERSION = WEAVERX_THEMENAME . ' ' . WEAVERX_VERSION;
const WEAVERX_MIN_WPVERSION = '5.6';

const WVRX_PAGEBUILDERS = true;    // support for page builders

const WEAVERX_THEME_WIDTH = 1100;    /* manually fix in style-weaverx.css */

const WEAVERX_PHP_MEMORY_LIMIT = 128;

const WEAVERX_DEV_MODE = false;


// if DEV MODE THEN UNCOMMENT FOLLOWING
//const WEAVERX_DEFAULT_THEME_FILE = 'none';

// if NOT DEV MODE THEN UNCOMMENT FOLLOWING
const WEAVERX_DEFAULT_THEME_FILE = '/subthemes/arctic-white.wxt';

const WEAVERX_DEFAULT_THEME = 'arctic-white';


/* WARNING: Editing any of the following settings may break the theme, including by child themes */

/* Settings definitions */
const WEAVERX_SETTINGS_VERSION = 'Settings:5.0';   // update settings conversion if change

const WEAVERX_LEVEL_BEGINNER = 1;
const WEAVERX_LEVEL_INTERMEDIATE = 5;
const WEAVERX_LEVEL_ADVANCED = 10;


/* This is also used in functions.php for add_editor_style ( note: no , and no | - use %2C and %7C */
const WEAVERX_GOOGLE_FONTS_URL = "https://fonts.googleapis.com/css?family=Open+Sans:400%2C700%2C700italic%2C400italic%7COpen+Sans+Condensed:300%2C700%7CAlegreya+SC:400%2C400i%2C700%2C700i%7CAlegreya+Sans+SC:400%2C400i%2C700%2C700i%7CAlegreya+Sans:400%2C400i%2C700%2C700i%7CAlegreya:400%2C400i%2C700%2C700i%7CDroid+Sans:400%2C700%7CDroid+Serif:400%2C400italic%2C700%2C700italic%7CExo+2:400%2C700%7CLato:400%2C400italic%2C700%2C700italic%7CLora:400%2C400italic%2C700%2C700italic%7CArvo:400%2C700%2C400italic%2C700italic%7CRoboto:400%2C400italic%2C700%2C700italic%7CRoboto+Condensed:400%2C700%7CRoboto+Slab:400%2C700%7CArchivo+Black%7CSource+Sans+Pro:400%2C400italic%2C700%2C700italic%7CSource+Serif+Pro:400%2C700%7CVollkorn:400%2C400italic%2C700%2C700italic%7CArimo:400%2C700%7CTinos:400%2C400italic%2C700%2C700italic%7CRoboto+Mono:400%2C700%7CInconsolata%7CHandlee%7CUltra&subset=latin%2Clatin-ext";

const WEAVERX_GOOGLE_FONTS = "<link href='" . WEAVERX_GOOGLE_FONTS_URL . "' rel='stylesheet' type='text/css'>";

// Version dependent options for plugin compatibility
// Weaver Xtreme used options


const WEAVER_CUSTOMIZER_TYPE = 'option';   // can't use theme_mod: Legacy Interface uses Options API
const WEAVER_CUSTOMIZER_DEFAULT_INTERFACE = 'where'; // where or what


const WEAVER_GET_OPTION = 'get_option';
const WEAVER_DELETE_OPTION = 'delete_option';
const WEAVER_UPDATE_OPTION = 'update_option';

const WEAVER_SETTINGS_NAME = 'weaverx5_settings';   // IMPORTANT: must also edit customizer-preview.js api()'s to use this value!

// Weaver theme directories and generated files

const WEAVERX_ADMIN_DIR = '/admin';

const WEAVERX_SUBTHEMES_DIR = 'weaverx5-subthemes';
const WEAVERX_STYLE_FILE = 'style-weaverxt.css';

const WEAVERX_OBSOLETE = '* OBSOLETE *';
const WEAVERX_SHOW_DEBUG = false;       // display weaverx_alert_debug()?


const WEAVERX_MINIFY = '.min';    // dev: '', production: '.min'


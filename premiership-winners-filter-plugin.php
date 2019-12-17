<?php
/*
* Plugin Name: Premiership Winners Filter Plugin
* Plugin URI: http://wprevs.com
* Description: This plugin adds details about the winners and the runners up of the English Premiership football league for the last 10 years. It provides advanced search and filter options to gain insights into points totals, goals and more.   
* Author: wprevs.com
* Version: 1.0.0
* Author URI: http://wprevs.com
* License: GPLv2 or later
*/

if(!defined( 'ABSPATH' )) exit;

require dirname(__FILE__) . 'classes-init/class-pwf-taxonomies-initializer.php';

//registers taxonomies in constructor function
$pwf_taxonomies_initializer = new PWF_Taxonomies_Initializer();

//register terms on activation (only once)
register_activation_hook( __FILE__, array( $pwf_taxonomies_initializer, 'register_terms' ) );
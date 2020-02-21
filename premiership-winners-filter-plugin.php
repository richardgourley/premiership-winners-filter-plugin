<?php
/*
* Plugin Name: Premiership Winners Filter Plugin
* Plugin URI: http://wprevs.com
* Description: This plugin adds details about the winners and the runners up of the English Premiership football league for the last 11 years. It provides advanced search and filter options to gain insights into points totals, goals and more.   
* Author: wprevs.com
* Version: 1.0.0
* Author URI: http://wprevs.com
* License: GPLv2 or later
*/

if( !defined( 'ABSPATH' )) exit;

define( 'PLUGIN_ROOT', dirname( __FILE__ ) );

require dirname(__FILE__) . '/classes-init/class-pwf-taxonomies-initializer.php';
require dirname(__FILE__) . '/classes-init/class-pwf-custom-post-type-initializer.php';
require dirname(__FILE__) . '/classes-init/class-pwf-posts-initializer.php';
require dirname(__FILE__) . '/classes-init/class-pwf-scripts-initializer.php';
require dirname(__FILE__) . '/classes-model/class-pwf-model.php';
require dirname(__FILE__) . '/classes-handler/class-pwf-handler.php';
require dirname(__FILE__) . '/classes-controller/class-pwf-controller.php';
require dirname(__FILE__) . '/classes-deactivate/class-pwf-deactivate.php';

//enqueues css file
$pwf_scripts_initializer = new PWF_Scripts_Initializer();

//registers taxonomies in constructor function
$pwf_taxonomies_initializer = new PWF_Taxonomies_Initializer();

//register terms on activation (only once)
register_activation_hook( __FILE__, array( $pwf_taxonomies_initializer, 'register_terms' ) );

//registers custom post type 'team'
$pwf_custom_post_type_initializer = new PWF_Custom_Post_Type_Initializer();

//flushes rewrites rules on plugin activation
register_activation_hook( __FILE__, array( $pwf_custom_post_type_initializer, 'register_post_type_activation' ) );

//inserts 'team' posts with post metadata and taxonomies detailling team stats
$pwf_posts_initializer = new PWF_Posts_Initializer();
register_activation_hook( __FILE__, array( $pwf_posts_initializer, 'insert_team_posts' ) );

$pwf_model_class = new PWF_Model();

$pwf_controller_class = new PWF_Controller();

/***
Takes instance of model and controller class
Handles form
Gets results from model - passes results to controller which displays correct view.
***/
$pwf_handler_class = new PWF_Handler( $pwf_model_class, $pwf_controller_class );

$pwf_deactivate = new PWF_Deactivate();
register_deactivation_hook( __FILE__, array( $pwf_deactivate, 'deactivate_plugin' ) );
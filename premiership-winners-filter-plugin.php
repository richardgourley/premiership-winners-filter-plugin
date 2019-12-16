<?php
/*
* Plugin Name: Guitar Chord Sequence Plugin
* Plugin URI: http://wprevs.com
* Description: A plugin for guitarists that creates a part of a page or post, where chord sequences of different lengths can be generated at the click of a button. It can be useful for practicing the guitar or even writing songs.   
* Author: wprevs.com
* Version: 1.0.0
* Author URI: http://wprevs.com
* License: GPLv2 or later
*/

if(!defined( 'ABSPATH' )) exit;
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

function add_test_register_taxonomy_team(){
    $labels_team = array(
            "name" => __( "Team" ),
             "singular_name" => __( "Team" ),
        );
        $args_team = array(
            "label" => __( "Team" ),
            "labels" => $labels_team,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => true,
            "show_ui" => false,
            "show_in_menu" => false,
            "show_in_nav_menus" => false,
            "query_var" => true,
            "rewrite" => array( 'slug' => 'team', 'with_front' => true, ),
            "show_admin_column" => false,
            "show_in_rest" => true,
            "rest_base" => "team",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "show_in_quick_edit" => false,
        );
        register_taxonomy( 'team', array( "team" ), $args_team );
}

add_action( 'init', 'add_test_register_taxonomy_team' );
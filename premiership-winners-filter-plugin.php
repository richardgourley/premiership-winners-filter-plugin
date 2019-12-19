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

require dirname(__FILE__) . '/classes-init/class-pwf-taxonomies-initializer.php';
require dirname(__FILE__) . '/classes-init/class-pwf-custom-post-type-initializer.php';
require dirname(__FILE__) . '/classes-init/class-pwf-posts-initializer.php';

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

function premiership_winners_plugin_test_shortcode(){
    $output_message = '';

    if( $_SERVER['REQUEST_METHOD'] == 'POST' && isset( $_POST['pwf-filter'] )){
        $output_message .= $_POST['pwf-filter'];
    }

    $html = '';
    $html .= '<form action="' . esc_url( get_the_permalink() ) . '" method="post">';
    $html .= '<select name="pwf-filter">';
    $html .= '<option value="2008-2009">2008-2009</option>';
    $html .= '<option value="2009-2010">2009-2010</option>';
    $html .= '</select>';
    $html .= '<input type="submit" value="Get results">';
    $html .= '</form>';
    $html .= $output_message;
    return $html;

    
}

add_shortcode('pw_plugin_test_shortcode', 'premiership_winners_plugin_test_shortcode');
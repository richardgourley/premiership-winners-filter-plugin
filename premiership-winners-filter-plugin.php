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
require dirname(__FILE__) . '/classes-init/class-pwf-scripts-initializer.php';

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

class My_Test_Class{
    public function __construct(){

    }

    public function get_select_form($output_message){
        $html = '';
        $html .= '<div class="pwf-grid">';

        $html .= '<div>';
        $html .= '<form action="' . esc_url( get_the_permalink() ) . '" method="post">';
        $html .= wp_nonce_field( 'pwf_form_action', 'pwf_form_nonce' );
        $html .= '<select name="pwf-options">';
        $html .= '<option value="2008-2009">2008-2009</option>';
        $html .= '<option value="2009-2010">2009-2010</option>';
        $html .= '</select>';
        $html .= '<input type="submit" value="Get results">';
        $html .= '</form>';
        $html .= '</div>';

        $html .= '<div>';
        $html .= '<h2>' . $output_message . '</h2>';
        $html .= '</div>';

        $html .= '</div>';

        return $html;
    }

    public function handle_form(){
        $output_message = '';

        if( $_SERVER['REQUEST_METHOD'] == 'POST' 
            && isset( $_POST['pwf_form_nonce'] )
            && wp_verify_nonce( $_POST['pwf_form_nonce'], 'pwf_form_action' )){

            $output_message .= $_POST['pwf-options'];
        }

        return $output_message;
    }

    public function premiership_winners_plugin_test_shortcode(){
        $output_message = $this->handle_form();
        $this->get_post_ids();
        return $this->get_select_form( $output_message );
    }

    public function get_post_ids(){
        $query = new WP_Query( array( 'post_type' => 'team' ) );
        var_dump( $query->posts );
    }
}

$my_test_class = new My_Test_Class();

add_shortcode('pw_plugin_test_shortcode', array( $my_test_class, 'premiership_winners_plugin_test_shortcode' ));
<?php

class PWF_Taxonomies_Initializer{
    public function __construct(){
        add_action( 'init', array( $this, 'register_taxonomies' ) );
    }

    //This is called with a 'register_activation hook in main file.'
    public function register_terms(){
        //NOTE: Register terms must be called again, directly before registering terms
        register_taxonomies();

        if( !term_exists( 'liverpool' )){
            wp_insert_term( 'Liverpool', 'team' );
        }
    }

    public function register_taxonomies(){
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
}

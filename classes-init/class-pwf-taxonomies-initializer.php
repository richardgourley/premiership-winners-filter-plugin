<?php

class PWF_Taxonomies_Initializer{
    public function __construct(){
        add_action( 'init', array( $this, 'register_taxonomies' ) );
    }

    //This is called with a 'register_activation hook in main file.'
    public function register_terms(){
        //NOTE: Register taxonomies must be called again, directly before registering terms
        $this->register_taxonomies();

        if( !term_exists( 'winner' )){
            wp_insert_term( 'Winner', 'position' );
        }

        if( !term_exists( 'runner-up' )){
            wp_insert_term( 'Runner Up', 'position' );
        }

        if( !term_exists( '2008-2009' )){
            wp_insert_term( '2008-2009', 'season' );
        }

        if( !term_exists( 'liverpool' )){
            wp_insert_term( 'Liverpool', 'team' );
        }

        if( !term_exists( 'manchester-united' )){
            wp_insert_term( 'Manchester United', 'team' );
        }

        if( !term_exists( '2009-2010' )){
            wp_insert_term( '2009-2010', 'season' );
        }

        if( !term_exists( 'chelsea' )){
            wp_insert_term( 'Chelsea', 'team' );
        }

        if( !term_exists( '2010-2011' )){
            wp_insert_term( '2010-2011', 'season' );
        }

        if( !term_exists( '2011-2012' )){
            wp_insert_term( '2011-2012', 'season' );
        }

        if( !term_exists( 'manchester-city' )){
            wp_insert_term( 'Manchester City', 'team' );
        }

        if( !term_exists( '2012-2013' )){
            wp_insert_term( '2012-2013', 'season' );
        }

        if( !term_exists( '2013-2014' )){
            wp_insert_term( '2013-2014', 'season' );
        }

        if( !term_exists( '2014-2015' )){
            wp_insert_term( '2014-2015', 'season' );
        }

        if( !term_exists( '2015-2016' )){
            wp_insert_term( '2015-2016', 'season' );
        }

        if( !term_exists( 'arsenal' )){
            wp_insert_term( 'Arsenal', 'team' );
        }

        if( !term_exists( 'leicester-city' )){
            wp_insert_term( 'Leicester City', 'team' );
        }

        if( !term_exists( '2016-2017' )){
            wp_insert_term( '2016-2017', 'season' );
        }

        if( !term_exists( 'tottenham-hotspur' )){
            wp_insert_term( 'Tottenham Hotspur', 'team' );
        }

        if( !term_exists( '2017-2018' )){
            wp_insert_term( '2017-2018', 'season' );
        }

        if( !term_exists( '2018-2019' )){
            wp_insert_term( '2018-2019', 'season' );
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

        $labels_league = array(
        "name" => __( "League" ),
         "singular_name" => __( "League" ),
        );
        $args_league = array(
            "label" => __( "League" ),
            "labels" => $labels_league,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => true,
            "show_ui" => false,
            "show_in_menu" => false,
            "show_in_nav_menus" => false,
            "query_var" => true,
            "rewrite" => array( 'slug' => 'league', 'with_front' => true, ),
            "show_admin_column" => false,
            "show_in_rest" => true,
            "rest_base" => "league",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "show_in_quick_edit" => false,
        );

        register_taxonomy( 'league', array( "team" ), $args_league );

        $labels_season = array(
        "name" => __( "Season" ),
         "singular_name" => __( "Season" ),
        );
        $args_season = array(
            "label" => __( "Season" ),
            "labels" => $labels_season,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => true,
            "show_ui" => false,
            "show_in_menu" => false,
            "show_in_nav_menus" => false,
            "query_var" => true,
            "rewrite" => array( 'slug' => 'season', 'with_front' => true, ),
            "show_admin_column" => false,
            "show_in_rest" => true,
            "rest_base" => "season",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "show_in_quick_edit" => false,
        );

        register_taxonomy( 'season', array( "team" ), $args_season );

        $labels_position = array(
        "name" => __( "Position" ),
         "singular_name" => __( "Position" ),
        );
        $args_position = array(
            "label" => __( "Position" ),
            "labels" => $labels_position,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => true,
            "show_ui" => false,
            "show_in_menu" => false,
            "show_in_nav_menus" => false,
            "query_var" => true,
            "rewrite" => array( 'slug' => 'position', 'with_front' => true, ),
            "show_admin_column" => false,
            "show_in_rest" => true,
            "rest_base" => "position",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "show_in_quick_edit" => false,
        );

        register_taxonomy( 'position', array( "team" ), $args_position );
    }
}

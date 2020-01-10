<?php

class PWF_Custom_Post_Type_Initializer{
    public function __construct(){
        add_action( 'init', array( $this, 'add_team_post_type' ));
    }

    //called in main file with register_activation_hook()
    public function register_post_type_activation(){
        $this->add_team_post_type();
        flush_rewrite_rules();
    }

    private function add_team_post_type(){
        $labels = array(
            "name" => __( "Team" ),
            "singular_name" => __( "Team" ),
            "menu_name" => __( "Team" ),
            "all_items" => __( "All Teams" ),
            "add_new" => __( "Add New" ),
            "add_new_item" => __( "Add New Team" ),
            "edit_item" => __( "Edit Team" ),
            "new_item" => __( "New Team" ),
            "view_item" => __( "View Team" ),
            "view_items" => __( "View Teams" ),
            "search_items" => __( "Search Teams" ),
            "not_found" => __( "No Teams found" ),
            "not_found_in_trash" => __( "No Teams found in trash" ),
            "featured_image" => __( "Featured Image for the Team" ),
            "set_featured_image" => __( "Set featured image for this Team" ),
            "remove_featured_image" => __( "Remove featured image for this Team" ),
            "use_featured_image" => __( "Use featured image for this Team" ),
            "archives" => __( "Team Archives" ),
            "insert_into_item" => __( "Insert into Team" ),
            "uploaded_to_this_item" => __( "Uploaded to this Team" ),
            "filter_items_list" => __( "Filter Teams" ),
            "items_list_navigation" => __( "Teams list navigation" ),
            "items_list" => __( "Teams list" ),
            "attributes" => __( "Team attributes" ),
        );
        $args = array(
            "label" => __( "Team" ),
            "labels" => $labels,
            "description" => "This post type is of teams for the Premiership winners filter plugin.",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => false,
            "delete_with_user" => false,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "has_archive" => false,
            "show_in_menu" => false,
            "show_in_nav_menus" => false,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => array( "slug" => "teams", "with_front" => true ),
            "query_var" => false,
        );
        register_post_type( 'team', $args );
    }

}

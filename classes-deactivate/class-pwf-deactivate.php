<?php

class PWF_Deactivate{
    public function __construct(){
        
    }

    public function unregister_custom_post_type(){
        unregister_post_type( 'team' );
    }

    public function unregister_taxonomies(){
        unregister_taxonomy( 'season' );
        unregister_taxonomy( 'team' );
        unregister_taxonomy( 'position' );
    }

    public function delete_terms(){
        
    }

    public function delete_posts_postmeta(){
        global $wpdb;
        $wpdb->get_results("DELETE wp_posts, wp_postmeta FROM wp_posts
            INNER JOIN wp_postmeta
            ON wp_postmeta.post_id = wp_posts.ID
            WHERE wp_posts.post_type = 'team'");
    }


}

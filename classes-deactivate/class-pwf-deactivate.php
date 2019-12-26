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

    public function delete_posts(){
        global $wpdb;
        $wpdb->get_results("DELETE FROM wp_posts WHERE post_type = 'team'");
    }

    public function delete_postmeta(){
        global $wpdb;
        $wpdb->get_results("SELECT wp_postmeta.post_id, wp_postmeta.meta_id, wp_postmeta.meta_key FROM wp_postmeta
            INNER JOIN (SELECT ID FROM wp_posts WHERE post_type = 'team') AS b 
            WHERE wp_postmeta.post_id = b.ID
            ORDER BY wp_postmeta.post_id");
    }


}

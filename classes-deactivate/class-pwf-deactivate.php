<?php

class PWF_Deactivate{
    public function __construct(){
        
    }

    /************
    * This function is called in main file as a 'deactivation' hook.
    * Calls other functions in this class 
    ************/
    public function deactivate_plugin(){
        $this->unregister_custom_post_type();
        $this->unregister_taxonomies();
        $this->delete_posts_postmeta_taxonomies_terms();
    }

    private function unregister_custom_post_type(){
        unregister_post_type( 'team' );
    }

    public function unregister_taxonomies(){
        unregister_taxonomy( 'season' );
        unregister_taxonomy( 'team' );
        unregister_taxonomy( 'position' );
    }

    public function delete_posts_postmeta_taxonomies_terms(){
        global $wpdb;
        $wpdb->get_results(
            "DELETE wp_posts, wp_postmeta, wp_terms, wp_term_taxonomy, wp_term_relationships
            FROM wp_posts 
            INNER JOIN wp_postmeta 
            ON wp_posts.ID = wp_postmeta.post_id
            INNER JOIN wp_term_relationships 
            ON wp_postmeta.post_id = wp_term_relationships.object_id
            INNER JOIN wp_term_taxonomy 
            ON wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id
            INNER JOIN wp_terms 
            ON wp_terms.term_id = wp_term_taxonomy.term_id
            WHERE wp_posts.post_type = 'team'"
        );
    }


}

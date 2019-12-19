<?php

class PWF_Posts_Initializer{
    public function __construct(){
        
    }

    /*****
    returns null
    Inserts all team posts for the plugin, linking posts to taxonomies and adding postmeta data
    *****/
    public function insert_team_posts(){
        
    }

    private function insert_team_data(
    	$team_name, 
    	$team_slug, 
    	$season, 
    	$position, 
    	$goals_for, 
    	$goals_against, 
    	$points
    ){
        $post_array = array(
        'post_title' => $team_name,
        'post_type' => 'team',
        'post_status' => 'publish',
        'meta_input' => array(
            'Points' => $points,
            'Goals For' => $goals_for,
            'Goals Against' => $goals_against
            )
        );

	    $post_id = wp_insert_post( $post_array );

	    wp_set_object_terms( $post_id, $team_slug, 'team' );
	    wp_set_object_terms( $post_id, $season, 'season' );
	    wp_set_object_terms( $post_id, $position, 'position' );

    }

}

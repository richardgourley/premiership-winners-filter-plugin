<?php

class PWF_Posts_Initializer{
    public function __construct(){
        
    }

    /*****
    @returns null
    * Called in register_activation hook in main file
    * Inserts all team posts for the plugin, linking posts to taxonomies and adding postmeta data
    *****/
    public function insert_team_posts(){
        $this->insert_team_data(
            'Manchester United', 'manchester-united', '2008-2009', 'winner', 68, 24, 90
        );

        $this->insert_team_data(
            'Liverpool', 'liverpool', '2008-2009', 'runner-up', 77, 27, 86
        );

        $this->insert_team_data(
            'Chelsea', 'chelsea', '2009-2010', 'winner', 103, 32, 86
        );

        $this->insert_team_data(
            'Manchester United', 'manchester-united', '2009-2010', 'runner-up', 86, 28, 85
        );

        $this->insert_team_data(
            'Manchester United', 'manchester-united', '2010-2011', 'winner', 78, 37, 80
        );

        $this->insert_team_data(
            'Chelsea', 'chelsea', '2010-2011', 'runner-up', 69, 33, 71
        );

        $this->insert_team_data(
            'Manchester City', 'manchester-city', '2011-2012', 'winner', 93, 29, 89
        );

        $this->insert_team_data(
            'Manchester United', 'manchester-united', '2011-2012', 'runner-up', 89, 33, 89
        );

        $this->insert_team_data(
            'Manchester United', 'manchester-united', '2012-2013', 'winner', 86, 43, 89
        );

        $this->insert_team_data(
            'Manchester City', 'manchester-city', '2012-2013', 'runner-up', 66, 34, 78
        );

        $this->insert_team_data(
            'Manchester City', 'manchester-city', '2013-2014', 'winner', 102, 37, 86
        );
        
        $this->insert_team_data(
            'Liverpool', 'liverpool', '2013-2014', 'runner-up', 101, 50, 84
        );

        $this->insert_team_data(
            'Chelsea', 'chelsea', '2014-2015', 'winner', 73, 32, 87
        );

        $this->insert_team_data(
            'Manchester City', 'manchester-city', '2014-2015', 'runner-up', 83, 38, 79
        );

        $this->insert_team_data(
            'Leicester City', 'leicester-city', '2015-2016', 'winner', 68, 36, 81
        );

        $this->insert_team_data(
            'Arsenal', 'arsenal', '2015-2016', 'runner-up', 65, 36, 71
        );

        $this->insert_team_data(
            'Chelsea', 'chelsea', '2016-2017', 'winner', 85, 33, 93
        );

        $this->insert_team_data(
            'Tottenham Hotspur', 'tottenham-hotspur', '2016-2017', 'runner-up', 86, 26, 86
        );

        $this->insert_team_data(
            'Manchester City', 'manchester-city', '2017-2018', 'winner', 106, 27, 100
        );

        $this->insert_team_data(
            'Manchester United', 'manchester-united', '2017-2018', 'runner-up', 68, 28, 81
        );

        $this->insert_team_data(
            'Manchester City', 'manchester-city', '2018-2019', 'winner', 95, 23, 98
        );

        $this->insert_team_data(
            'Liverpool', 'liverpool', '2018-2019', 'runner-up', 89, 22, 97
        );
    }

    private function insert_team_data(
    	$team_name, $team_slug, $season, $position, $goals_for, $goals_against, $points
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

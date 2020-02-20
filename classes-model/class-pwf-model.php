<?php

class PWF_Model{
    public function __construct(){
        
    }

    public function get_all_teams(){
        $args = array(
            'post_type'  => 'team',
            'meta_key'   => 'points',
            'orderby'    => 'meta_value_num',
            'order'      => 'DESC',
            'posts_per_page' => '-1',
        );
        $query = new WP_Query( $args );

        return $query;
    }

    public function get_winners(){
        $args = array(
            'post_type'  => 'team',
            'meta_key'   => 'points',
            'orderby'    => 'meta_value_num',
            'order'      => 'DESC',
            'posts_per_page' => '-1',
            'tax_query' => array(
                array(
                    'taxonomy' => 'position',
                    'field' => 'slug',
                    'terms' => 'winner'
                )
            )
        );
        $query = new WP_Query( $args );

        return $query;
    }

    public function get_runners_up(){
        $args = array(
            'post_type'  => 'team',
            'meta_key'   => 'points',
            'orderby'    => 'meta_value_num',
            'order'      => 'DESC',
            'posts_per_page' => '-1',
            'tax_query' => array(
                array(
                    'taxonomy' => 'position',
                    'field' => 'slug',
                    'terms' => 'runner-up'
                )
            )
        );
        $query = new WP_Query( $args );

        return $query;
    }

    public function get_winners_lowest_points(){
        $args = array(
            'post_type'  => 'team',
            'meta_key'   => 'points',
            'orderby'    => 'meta_value_num',
            'order'      => 'ASC',
            'posts_per_page' => '-1',
            'tax_query' => array(
                array(
                    'taxonomy' => 'position',
                    'field' => 'slug',
                    'terms' => 'winner'
                )
            )
        );
        $query = new WP_Query( $args );

        return $query;
    }

    public function get_runners_up_lowest_points(){
        $args = array(
            'post_type'  => 'team',
            'meta_key'   => 'points',
            'orderby'    => 'meta_value_num',
            'order'      => 'ASC',
            'posts_per_page' => '-1',
            'tax_query' => array(
                array(
                    'taxonomy' => 'position',
                    'field' => 'slug',
                    'terms' => 'runner-up'
                )
            )
        );
        $query = new WP_Query( $args );

        return $query;
    }
    
    public function get_winners_most_goals(){
        $args = array(
            'post_type'  => 'team',
            'meta_key'   => 'Goals For',
            'orderby'    => 'meta_value_num',
            'order'      => 'DESC',
            'posts_per_page' => '-1',
            'tax_query' => array(
                array(
                    'taxonomy' => 'position',
                    'field' => 'slug',
                    'terms' => 'winner'
                )
            )
        );
        $query = new WP_Query( $args );

        return $query;
    }

    public function get_runners_up_most_goals(){
        $args = array(
            'post_type'  => 'team',
            'meta_key'   => 'Goals For',
            'orderby'    => 'meta_value_num',
            'order'      => 'DESC',
            'posts_per_page' => '-1',
            'tax_query' => array(
                array(
                    'taxonomy' => 'position',
                    'field' => 'slug',
                    'terms' => 'runner-up'
                )
            )
        );
        $query = new WP_Query( $args );

        return $query;
    }

    public function get_winners_least_goals_scored(){
        $args = array(
            'post_type'  => 'team',
            'meta_key'   => 'Goals For',
            'orderby'    => 'meta_value_num',
            'order'      => 'ASC',
            'posts_per_page' => '-1',
            'tax_query' => array(
                array(
                    'taxonomy' => 'position',
                    'field' => 'slug',
                    'terms' => 'winner'
                )
            )
        );
        $query = new WP_Query( $args );

        return $query;
    }

    public function get_runners_up_least_goals_scored(){
        $args = array(
            'post_type'  => 'team',
            'meta_key'   => 'Goals For',
            'orderby'    => 'meta_value_num',
            'order'      => 'ASC',
            'posts_per_page' => '-1',
            'tax_query' => array(
                array(
                    'taxonomy' => 'position',
                    'field' => 'slug',
                    'terms' => 'runner-up'
                )
            )
        );
        $query = new WP_Query( $args );

        return $query;
    }

    public function get_winners_least_goals_conceded(){
        $args = array(
            'post_type'  => 'team',
            'meta_key'   => 'Goals Against',
            'orderby'    => 'meta_value_num',
            'order'      => 'ASC',
            'posts_per_page' => '-1',
            'tax_query' => array(
                array(
                    'taxonomy' => 'position',
                    'field' => 'slug',
                    'terms' => 'winner'
                )
            )
        );
        $query = new WP_Query( $args );

        return $query;
    }

    public function get_runners_up_least_goals_conceded(){
        $args = array(
            'post_type'  => 'team',
            'meta_key'   => 'Goals Against',
            'orderby'    => 'meta_value_num',
            'order'      => 'ASC',
            'posts_per_page' => '-1',
            'tax_query' => array(
                array(
                    'taxonomy' => 'position',
                    'field' => 'slug',
                    'terms' => 'runner-up'
                )
            )
        );
        $query = new WP_Query( $args );

        return $query;
    }

    public function get_average_points(){
        global $wpdb;
        //retrieves average points
        $results = $wpdb->get_results(
            "SELECT a.name, ROUND(a.points/a.seasons,2) AS average
            FROM 
            (SELECT COUNT(wp_posts.post_title) AS seasons, 
            SUM(wp_postmeta.meta_value) AS points, 
            wp_terms.name
                FROM wp_posts
                INNER JOIN wp_postmeta
                ON wp_posts.ID = wp_postmeta.post_id
                INNER JOIN wp_term_relationships
                ON wp_postmeta.post_id = wp_term_relationships.object_id
                INNER JOIN wp_term_taxonomy
                ON wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id
                INNER JOIN wp_terms
                ON wp_term_taxonomy.term_id = wp_terms.term_id
                WHERE wp_posts.post_type = 'team'
                AND wp_postmeta.meta_key = 'Points'
                AND (wp_terms.name = 'Winner' OR wp_terms.name = 'Runner Up')
            GROUP BY wp_terms.name
            ORDER BY points DESC) as a;"
        );

        return $results;
    }

    //calculates how many seasons are covered. Allows dynamic future changes to number of seasons.
    public function get_number_of_seasons(){
        global $wpdb;

        $results = $wpdb->get_results(
            "SELECT COUNT(taxonomy) AS seasons
            FROM wp_term_taxonomy
            WHERE taxonomy = 'season'"
        );
        
        if( $results ){
            return $results[0]->seasons;
        }
        return 'a number of';
    }
    
}




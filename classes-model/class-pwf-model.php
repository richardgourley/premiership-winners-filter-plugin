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



    
}



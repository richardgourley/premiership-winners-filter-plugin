<?php

class PWF_Model{
    public function __construct(){
        //add shortcode
    }

    
}

/*
class My_Test_Class{
    public function __construct(){

    }

    public function get_select_form($results){
        $html = '';
        $html .= '<div class="pwf-grid">';

        $html .= '<div>';
        $html .= '<form action="' . esc_url( get_the_permalink() ) . '" method="post">';
        $html .= wp_nonce_field( 'pwf_form_action', 'pwf_form_nonce' );
        $html .= '<select name="pwf-options">';
        $html .= '<option value="winners">Winners Only</option>';
        $html .= '<option value="runners-up">Runners Up Only</option>';
        $html .= '</select>';
        $html .= '<input type="submit" value="Get results">';
        $html .= '</form>';
        $html .= '</div>';

        $html .= '<div>';
        $html .= $results;
        $html .= '</div>';

        $html .= '</div>';

        return $html;
    }

    public function handle_form(){
        $selected_option = '';

        if( $_SERVER['REQUEST_METHOD'] == 'POST' 
            && isset( $_POST['pwf_form_nonce'] )
            && wp_verify_nonce( $_POST['pwf_form_nonce'], 'pwf_form_action' )){

            $selected_option .= $_POST['pwf-options'];
        }else{
            $selected_option = 'all';
        }

        return $selected_option;
    }

    public function premiership_winners_plugin_test_shortcode(){
        $selected_option = $this->handle_form();
        $results = $this->get_results( $selected_option );
        return $this->get_select_form( $results );
    }

    public function get_results( $selected_option){
        if( $selected_option == 'all'){
           $results = '';

            $args = array(
                'post_type'  => 'team',
                'meta_key'   => 'points',
                'orderby'    => 'meta_value_num',
                'order'      => 'DESC',
                'posts_per_page' => '-1'
                /*'meta_query' => array(
                    array(
                        'key'     => 'Points',
                        'value'   => array( 93,85,84 ),
                        'compare' => 'IN'
                    ),
                ),
            );
            $query = new WP_Query( $args );

            $results .= '<table class="form-table">';
            $results .= '<tr>';
            $results .= '<th>Season</th>';
            $results .= '<th>Team</th>';
            $results .= '<th>Points</th>';
            $results .= '</tr>';
            
            foreach( $query->posts as $result){
                $results .= '<tr>';
                $results .= '<td>' . get_the_terms( $result->ID, 'season' )[0]->name . '</td>';
                $results .= '<td>' . $result->post_title . '</td>';
                $results .= '<td>' . get_post_meta( $result->ID, 'Points', true ) . '</td>';
                $results .= '</tr>';
            }

            $results .= '</table>';

            return $results; 
        }

    }
}

$my_test_class = new My_Test_Class();

add_shortcode('pw_plugin_test_shortcode', array( $my_test_class, 'premiership_winners_plugin_test_shortcode' ));

*/

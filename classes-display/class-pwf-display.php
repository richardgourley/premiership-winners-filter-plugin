<?php

class PWF_Display{
    protected $model_class;

    public function __construct($model_class){
        $this->model_class = $model_class;
        add_shortcode( 'pwf_display_results_shortcode', array( $this, 'display_results' ) ); 
    }

    public function display_results(){
        $selected_option = $this->handle_form();
        $results_as_table = $this->get_results( $selected_option );
        return $this->display_form_and_results( $results_as_table );
    }

    public function handle_form(){
        $selected_option = '';

        if( $_SERVER['REQUEST_METHOD'] == 'POST' 
            && isset( $_POST['pwf_form_nonce'] )
            && wp_verify_nonce( $_POST['pwf_form_nonce'], 'pwf_form_action' )){

            $selected_option .= $_POST['pwf-options'];
        }else{
            $selected_option = 'get_all_teams';
        }

        return $selected_option;
    }

    /****
    *@return - html string of results in table form
    ****/
    public function get_results($selected_option){
        if( $selected_option == 'get_all_teams' ){
            //returns a table of results
            return $this->get_results_in_table_format( 
                $this->model_class->get_all_teams() 
            );
        }
        if( $selected_option == 'winners' ){
            return $this->get_results_in_table_format( 
                $this->model_class->get_winners() 
            );
        }
        if( $selected_option == 'runners-up' ){
            return $this->get_results_in_table_format( 
                $this->model_class->get_runners_up() 
            );
        }
        
        //return a blank string if $selected option doesn't match
        return '';
    }

    public function get_results_in_table_format($posts){
        $results = '';

        $results .= '<table class="form-table">';
        $results .= '<tr>';
        $results .= '<th>Season</th>';
        $results .= '<th>Position</th>';
        $results .= '<th>Team</th>';
        $results .= '<th>Points</th>';
        $results .= '</tr>';
        
        foreach( $posts->posts as $result){
            $results .= '<tr>';
            $results .= '<td>' . get_the_terms( $result->ID, 'season' )[0]->name . '</td>';
            $results .= '<td>' . get_the_terms( $result->ID, 'position' )[0]->name . '</td>';
            $results .= '<td>' . $result->post_title . '</td>';
            $results .= '<td>' . get_post_meta( $result->ID, 'Points', true ) . '</td>';
            $results .= '</tr>';
        }

        $results .= '</table>';

        return $results;
    }

    public function display_form_and_results($results){
        $html = '';
        $html .= '<h4>We took all the data of Premiership winners and runners up over the last 10 years. Filter the results from the drop-down menu below.</h4>';
        $html .= '<div class="pwf-grid">';

        $html .= '<div>';
        $html .= '<p>Filter results</p>';
        $html .= '<form action="' . esc_url( get_the_permalink() ) . '" method="post">';
        $html .= wp_nonce_field( 'pwf_form_action', 'pwf_form_nonce' );
        $html .= '<select name="pwf-options">';
        $html .= '<option value="winners">Winners - Highest points</option>';
        $html .= '<option value="runners-up">Runners Up - Highest points</option>';
        $html .= '</select>';
        $html .= '<input type="submit" value="Filter results">';
        $html .= '</form>';
        $html .= '</div>';

        $html .= '<div>';
        $html .= $results;
        $html .= '</div>';

        $html .= '</div>';

        return $html;
    }


}

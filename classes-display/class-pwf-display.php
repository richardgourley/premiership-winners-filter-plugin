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
        return $this->display_form_and_results( $results_as_table, $selected_option );
    }

    public function handle_form(){
        $selected_option = '';

        if( $_SERVER['REQUEST_METHOD'] == 'POST' 
            && isset( $_POST['pwf_form_nonce'] )
            && wp_verify_nonce( $_POST['pwf_form_nonce'], 'pwf_form_action' )){

            $selected_option .= $_POST['pwf-options'];
        }else{
            $selected_option .= 'get-all-teams';
        }

        return $selected_option;
    }

    /****
    *@return - html string of results in table form
    ****/
    public function get_results($selected_option){
        if( $selected_option == 'get-all-teams' ){
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
        if( $selected_option == 'winners-lowest-points' ){
            return $this->get_results_in_table_format( 
                $this->model_class->get_winners_lowest_points()
            );
        }

        if( $selected_option == 'winners-most-goals' ){
            return $this->get_results_in_table_format( 
                $this->model_class->get_winners_most_goals()
            );
        }

        if( $selected_option == 'winners-least-goals-conceded' ){
            return $this->get_results_in_table_format( 
                $this->model_class->get_winners_least_goals_conceded()
            );
        }

        if( $selected_option == 'average-points' ){
            return $this->display_average_points( 
                $this->model_class->get_average_points()
            );
        }
        
        //return a blank string if $selected option doesn't match
        return '';
    }

    public function get_results_in_table_format($posts){
        $results = '';

        $results .= '<div class="pwf-display-table">';
        $results .= '<table class="form-table">';
        $results .= '<tr>';
        $results .= '<th>Season</th>';
        $results .= '<th>Position</th>';
        $results .= '<th>Team</th>';
        $results .= '<th>Goals For</th>';
        $results .= '<th>Goals Against</th>';
        $results .= '<th>Points</th>';
        $results .= '</tr>';
        
        foreach( $posts->posts as $result){
            $results .= '<tr>';
            $results .= '<td>' . get_the_terms( $result->ID, 'season' )[0]->name . '</td>';
            $results .= '<td>' . get_the_terms( $result->ID, 'position' )[0]->name . '</td>';
            $results .= '<td>' . $result->post_title . '</td>';
            $results .= '<td>' . get_post_meta( $result->ID, 'Goals For', true ) . '</td>';
            $results .= '<td>' . get_post_meta( $result->ID, 'Goals Against', true ) . '</td>';
            $results .= '<td><strong>' . get_post_meta( $result->ID, 'Points', true ) . '</strong></td>';
            $results .= '</tr>';
        }

        $results .= '</table>';
        $results .= '</div>';

        return $results;
    }

    public function display_average_points($results){
        $html = '';
        $html .= '<p>Last 11 premiership seasons:</p>';
        foreach( $results as $result ){
            if( $result->position == 'Winner' ){
                $html .= '<h3>Average Points per winner:</h3>';
                $html .= '<h2>' . $result->points_total / $result->total . '</h2>';
            }
            if( $result->position == 'Runner Up' ){
                $html .= '<h3>Average Points per runner-up:</h3>';
                $html .= '<h2>' . $result->points_total / $result->total . '</h2>';
            }
        }
        return $html;
    }

    public function display_form_and_results($results, $selected_option){
        $html = '';
        $html .= '<div class="pwf-intro-text">';
        $html .= '<h4>We took all the data of Premiership winners and runners up over the last 11 years. Filter the results from the drop-down menu below.</h4>';
        $html .= '</div>';
        $html .= '<div class="pwf-grid">';

        $html .= '<div>';
        $html .= '<p>Filter the results</p>';
        $html .= '<div class="pwf-select-menu">';
        $html .= '<form action="' . esc_url( get_the_permalink() ) . '" method="post">';
        $html .= wp_nonce_field( 'pwf_form_action', 'pwf_form_nonce' );
        $html .= '<select name="pwf-options">';
        $html .= $this->generate_form_options($selected_option);
        $html .= '</select>';
        $html .= '</div>';
        $html .= '<div class="pwf-form-button">';
        $html .= '<input type="submit" value="Filter results">';
        $html .= '</div>';
        $html .= '</form>';
        $html .= '</div>';

        $html .= '<div>';
        $html .= $results;
        $html .= '</div>';

        $html .= '</div>';

        return $html;
    }

    /***
    * @return string
    * returns a string of html of options for the filter form
    * highlights options as 'selected' for most recent form request
    ***/
    public function generate_form_options($selected_option){
        $html = '';
        
        if( $selected_option == 'get-all-teams' ){
            $html .= '<option value="get-all-teams" selected>Winners & runners-up - Highest Points</option>'; 
        }else{
            $html .= '<option value="get-all-teams">Winners & runners-up - Highest Points</option>';
        }
      
        if( $selected_option == 'winners' ){
            $html .= '<option value="winners" selected>Winners - Highest points</option>'; 
        }else{
            $html .= '<option value="winners">Winners - Highest points</option>';
        }

        if( $selected_option == 'runners-up' ){
            $html .= '<option value="runners-up" selected>Runners Up - Highest points</option>';
        }else{
            $html .= '<option value="runners-up">Runners Up - Highest points</option>';
        }

        if( $selected_option == 'winners-lowest-points' ){
            $html .= '<option value="winners-lowest-points" selected>Winners - Lowest points</option>';
        }else{
            $html .= '<option value="winners-lowest-points">Winners - Lowest points</option>';
        }

        if( $selected_option == 'winners-most-goals' ){
            $html .= '<option value="winners-most-goals" selected>Winners - Most Goals Scored</option>';
        }else{
            $html .= '<option value="winners-most-goals">Winners - Most Goals Scored</option>';
        }

        if( $selected_option == 'winners-least-goals-conceded' ){
            $html .= '<option value="winners-least-goals-conceded" selected>Winners - Least Goals Conceded</option>';
        }else{
            $html .= '<option value="winners-least-goals-conceded">Winners - Least Goals Conceded</option>';
        }

        if( $selected_option == 'average-points'){
            $html .= '<option value="average-points" selected>Winners & Runners-Up - Average Points</option>';
        }else{
            $html .= '<option value="average-points">Winners & Runners-Up - Average Points</option>';
        }

        return $html;
    }

}

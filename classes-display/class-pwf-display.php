<?php

class PWF_Display{
    protected $model_class;

    public function __construct($model_class){
        $this->model_class = $model_class;
        add_shortcode( 'pwf_display_results_shortcode', array( $this, 'display_results' ) ); 
    }

    public function display_results(){
        $selected_option = $this->handle_form();
        $results = $this->get_results( $selected_option );
        return $this->display_forms_and_results( $results, $selected_option );
    }

    private function handle_form(){
        $selected_option = '';

        if( $_SERVER['REQUEST_METHOD'] == 'POST' 
            && isset( $_POST['pwf_form_nonce'] )
            && wp_verify_nonce( $_POST['pwf_form_nonce'], 'pwf_form_action' )){

            $selected_option .= sanitize_text_field( $_POST['pwf-options'] );
        }else{
            $selected_option .= 'get-all-teams';
        }

        return $selected_option;
    }

    /****
    *@return - html string of results in table form
    ****/
    private function get_results( $selected_option ){
        if( $selected_option == 'get-all-teams' ){
            return $this->model_class->get_all_teams();
        }
        if( $selected_option == 'winners' ){
            return $this->model_class->get_winners();
        }
        if( $selected_option == 'runners-up' ){
            return $this->model_class->get_runners_up();
        }
        if( $selected_option == 'winners-lowest-points' ){
            return $this->model_class->get_winners_lowest_points();
        }

        if( $selected_option == 'runners-up-lowest-points' ){
            return $this->model_class->get_runners_up_lowest_points();
        }

        if( $selected_option == 'winners-most-goals' ){
            return $this->model_class->get_winners_most_goals();
        }

        if( $selected_option == 'runners-up-most-goals' ){
            return $this->model_class->get_runners_up_most_goals();
        }

        if( $selected_option == 'winners-least-goals-scored' ){
            return $this->model_class->get_winners_least_goals_scored();
        }
    
        if( $selected_option == 'runners-up-least-goals-scored' ){
            return $this->model_class->get_runners_up_least_goals_scored();
        }

        if( $selected_option == 'winners-least-goals-conceded' ){
            return $this->model_class->get_winners_least_goals_conceded();
        }

        if( $selected_option == 'runners-up-least-goals-conceded' ){
            return $this->model_class->get_runners_up_least_goals_conceded();
        }

        if( $selected_option == 'average-points' ){
            return $this->model_class->get_average_points();
        }
        
        //return a blank string if $selected option doesn't match
        return '';
    }

    private function display_average_points($results){
        $html = '';
        $html .= '<p>Last 11 premiership seasons:</p>';
        foreach( $results as $result ){
            $position = esc_html( $result->position );
            $points_total = esc_html( $result->points_total );
            $total = esc_html( $result->total );
            if( $position == 'Winner' ){
                $html .= '<h3>Average Points per winner:</h3>';
                $html .= '<h2>' . number_format( $points_total / $total, 2 ) . '</h2>';
            }
            if( $position == 'Runner Up' ){
                $html .= '<h3>Average Points per runner-up:</h3>';
                $html .= '<h2>' . number_format( $points_total / $total, 2 ) . '</h2>';
            }
        }
        return $html;
    }

    private function display_forms_and_results($results, $selected_option){
        //keeps previously selected option acive in select box
        $form_options_search_by_points = $this->generate_form_options_search_by_points( $selected_option );
        $form_options_search_by_goals = $this->generate_form_options_search_by_goals( $selected_option );

        $number_of_seasons = $this->model_class->get_number_of_seasons();

        if( $selected_option == 'average-points' ){
            ob_start();
            require_once( PLUGIN_ROOT . '/views/average-points.php' );
            $output = ob_get_contents();
            ob_end_clean();

            return $output;
        }

        ob_start();
        require_once( PLUGIN_ROOT . '/views/table.php' );
        $output = ob_get_contents();
        ob_end_clean();

        return $output;

    }

    /***
    * @return string
    * returns a string of html of options for the filter form
    * highlights options as 'selected' for most recent form request
    ***/
    private function generate_form_options_search_by_points($selected_option){
        $html = '';
        
        if( $selected_option == 'get-all-teams' ){
            $html .= '<option value="get-all-teams" selected>Winners & runners-up - Highest Points</option>'; 
        }else{
            $html .= '<option value="get-all-teams">Winners & runners-up - Highest Points</option>';
        }

        if( $selected_option == 'average-points'){
            $html .= '<option value="average-points" selected>Winners & Runners-Up - Average Points</option>';
        }else{
            $html .= '<option value="average-points">Winners & Runners-Up - Average Points</option>';
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

        if( $selected_option == 'runners-up-lowest-points' ){
            $html .= '<option value="runners-up-lowest-points" selected>Runners-up - Lowest points</option>';
        }else{
            $html .= '<option value="runners-up-lowest-points">Runners-up - Lowest points</option>';
        }

        return $html;
    }

    private function generate_form_options_search_by_goals( $selected_option ){
        $html = '';
        
        if( $selected_option == 'winners-most-goals' ){
            $html .= '<option value="winners-most-goals" selected>Winners - Most Goals Scored</option>';
        }else{
            $html .= '<option value="winners-most-goals">Winners - Most Goals Scored</option>';
        }

        if( $selected_option == 'runners-up-most-goals' ){
            $html .= '<option value="runners-up-most-goals" selected>Runners-up - Most Goals Scored</option>';
        }else{
            $html .= '<option value="runners-up-most-goals">Runners-up - Most Goals Scored</option>';
        }

        if( $selected_option == 'winners-least-goals-scored' ){
            $html .= '<option value="winners-least-goals-scored" selected>Winners - Least Goals Scored</option>';
        }else{
            $html .= '<option value="winners-least-goals-scored">Winners - Least Goals Scored</option>';
        }

        if( $selected_option == 'runners-up-least-goals-scored' ){
            $html .= '<option value="runners-up-least-goals-scored" selected>Runners-up - Least Goals Scored</option>';
        }else{
            $html .= '<option value="runners-up-least-goals-scored">Runners-up - Least Goals Scored</option>';
        }

        if( $selected_option == 'winners-least-goals-conceded' ){
            $html .= '<option value="winners-least-goals-conceded" selected>Winners - Least Goals Conceded</option>';
        }else{
            $html .= '<option value="winners-least-goals-conceded">Winners - Least Goals Conceded</option>';
        }

        if( $selected_option == 'runners-up-least-goals-conceded' ){
            $html .= '<option value="runners-up-least-goals-conceded" selected>Runners Up - Least Goals Conceded</option>';
        }else{
            $html .= '<option value="runners-up-least-goals-conceded">Runners Up - Least Goals Conceded</option>';
        }

        return $html;
    }

}

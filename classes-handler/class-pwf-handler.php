<?php

class PWF_Handler{
    protected $model_class;
    protected $controller_class;

    public function __construct( $model_class, $controller_class ){
        $this->model_class = $model_class;
        $this->controller_class = $controller_class;
        add_shortcode( 'pwf_display_results_shortcode', array( $this, 'display_results' ) ); 
    }

    public function display_results(){
        //Check is a method name in $model_class matches the option selected by user
        $selected_option = $this->check_selected_option_is_method( $this->handle_form() );
        
        $results = $this->model_class->{$selected_option}();
        return $this->controller_class->{$selected_option}( $results );
    }

    private function handle_form(){
        $selected_option = '';

        if( $_SERVER['REQUEST_METHOD'] == 'POST' 
            && isset( $_POST['pwf_form_nonce'] )
            && wp_verify_nonce( $_POST['pwf_form_nonce'], 'pwf_form_action' )){

            $selected_option .= sanitize_text_field( $_POST['pwf-options'] );
        }else{
            $selected_option .= 'winners_runners_up_highest_points';
        }

        return $selected_option;
    }
    
    /*****
    @ return string
    Checks the selected option name from the menu exists as a method name in $this->model_class
    ...if not - returns 'winners_runners_up_highest_points'
    *****/
    private function check_selected_option_is_method( $selected_option ){
        foreach( get_class_methods( $this->model_class ) as $method ){
            if( $selected_option == $method ){
                return $selected_option;
            }
        }

        return 'winners_runners_up_highest_points';   
    }
    
}

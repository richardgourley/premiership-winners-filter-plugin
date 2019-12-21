<?php

class PWF_Display{
    public function __construct(){
        add_shortcode( 'pwf_display_results_shortcode', array( $this, 'display_results' ) ); 
    }


}

<?php

class PWF_Scripts_Initializer{
    public function __construct(){
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_css' ) );
    }

    public function enqueue_css(){
        wp_enqueue_style(
            'pwf-css', 
            plugins_url( 'css/styles.css', __DIR__) 
        );
    }

}

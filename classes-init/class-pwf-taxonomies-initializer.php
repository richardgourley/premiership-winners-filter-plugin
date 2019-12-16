<?php

class PWF_Taxonomies_Initializer{
    public function __construct(){
        add_action( 'init', array( $this, 'register_taxonomies' ) );
    }
}

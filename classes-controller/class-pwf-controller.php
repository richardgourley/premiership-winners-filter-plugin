<?php

class PWF_Controller{
    
    public function __construct(){

    }

    public function winners_runners_up_highest_points( $results ){
        ob_start();
        //to be used in highlighting current table option.
        $selected_option = __FUNCTION__;
        require_once( PLUGIN_ROOT . '/views/table.php' );
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }

    public function winners_highest_points( $results ){
        ob_start();
        //to be used in highlighting current table option.
        $selected_option = __FUNCTION__;
        require_once( PLUGIN_ROOT . '/views/table.php' );
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }

    public function runners_up_highest_points( $results ){
        ob_start();
        //to be used in highlighting current table option.
        $selected_option = __FUNCTION__;
        require_once( PLUGIN_ROOT . '/views/table.php' );
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }

    public function winners_lowest_points( $results ){
        ob_start();
        //to be used in highlighting current table option.
        $selected_option = __FUNCTION__;
        require_once( PLUGIN_ROOT . '/views/table.php' );
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }

    public function runners_up_lowest_points( $results ){
        ob_start();
        //to be used in highlighting current table option.
        $selected_option = __FUNCTION__;
        require_once( PLUGIN_ROOT . '/views/table.php' );
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }

    public function winners_most_goals( $results ){
        ob_start();
        //to be used in highlighting current table option.
        $selected_option = __FUNCTION__;
        require_once( PLUGIN_ROOT . '/views/table.php' );
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }

    public function runners_up_most_goals( $results ){
        ob_start();
        //to be used in highlighting current table option.
        $selected_option = __FUNCTION__;
        require_once( PLUGIN_ROOT . '/views/table.php' );
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }

    public function winners_least_goals( $results ){
        ob_start();
        //to be used in highlighting current table option.
        $selected_option = __FUNCTION__;
        require_once( PLUGIN_ROOT . '/views/table.php' );
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }

    public function runners_up_least_goals( $results ){
        ob_start();
        //to be used in highlighting current table option.
        $selected_option = __FUNCTION__;
        require_once( PLUGIN_ROOT . '/views/table.php' );
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    } 

    public function winners_least_goals_conceded( $results ){
        ob_start();
        //to be used in highlighting current table option.
        $selected_option = __FUNCTION__;
        require_once( PLUGIN_ROOT . '/views/table.php' );
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }

    public function runners_up_least_goals_conceded( $results ){
        ob_start();
        //to be used in highlighting current table option.
        $selected_option = __FUNCTION__;
        require_once( PLUGIN_ROOT . '/views/table.php' );
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }

    public function average_points( $results ){
        ob_start();
        //to be used in highlighting current table option.
        $selected_option = __FUNCTION__;
        require_once( PLUGIN_ROOT . '/views/average-points.php' );
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
    }




}

<?php

/*
Plugin Name: Wordpress Model View Controller (WP-MVC)
Description: Based Plugin Structure
Version: 1.1
Author: Charly Capillanes
Author URI: https://charlycapillanes.wordpress.com/
*/

include_once ( 'register.php' );

register::load ( true, 
    array ( 
        'system'  => $system_load, 
        'package' => $package_load, 
        'config'  => $config_load,
        'helper'  => $helper_load,
        'model'   => $model_load,
        'control' => $control_load 
    ) 
);
<?php
   
   /**
    *  @Application WP MVC
    *  @charlycapillanes since (2013)
   **/
   
   /**
    *  System load wp mvc default classes
   **/
   
   /** auto load 
       $system_load = array( 'system-1', 'system-2', 'system-3' );
   **/

   $system_load = array( 'add', 'load', 'input', 'html', 'uploader', 'post', 'widget', 'redirect' );

   /**
   $package_load= array( 
              'package-directory-1' => array( 'package-file-1', 'package-file-2' ), 
              'package-directory-2' => array( 'package-file-2', 'package-file-2' )
          ); **/

   $package_load= array(
              'default' => array( 'html_var', 'validate' ),  
              'library' => array( 'money_format' ) 
          );  

   /** config load 
       $config_load = array( 'config-1', 'config-2', 'config-3' );
   **/
        
   $config_load = array( 'router', 'overloading', 'config', 'autoload' );

  /**
    *  Helper load custom classes
   **/
   
    /** helper load 
       $helper_load = array( 'helper-1', 'helper-2', 'helper-3' );
   **/
   
   $helper_load = array( 'user-control', 'money_format' );
   
   /**
    *  Model load custom classes
   **/
   
   /** model load 
       $model_load = array( 'model-1', 'model-2', 'model-3' );
   **/
    
   $model_load = array( 'db', 'form', 'users' );
    
   /**
    *  Controller load custom classes
   **/

   /** control load
       $control_load = array( 'control-1', 'control-2', 'control-3' );
   **/
    
   $control_load = array( 'db_action', 'action' );
   
?>
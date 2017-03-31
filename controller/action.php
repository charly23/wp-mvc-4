<?php if( ! class_exists( 'action' ) or wp_die ( 'error found.' ) ) 
{
    
     class action extends db_action
     {
          
          public static $tbls = array();

          public function __construct () 
          {
                parent::__construct();
          }

          /**
           * INSERT : wp-mvc
          **/

          public static function add_action () 
          {
              // action
          }

          public static function ajax_action () 
          {
              // action
          }
          
          // END
     }
}
?>
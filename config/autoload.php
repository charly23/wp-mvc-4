<?php if( ! class_exists( 'wp_mvc_page' ) or wp_die ( 'error found.' ) ) 
{    
    class wp_mvc_page extends config
    {

        private static $instance; 
        
        public static function getInstance()  
        { 
              if( ! self::$instance ) self::$instance = new self(); 
              return self::$instance;
        } 

        /**
          * user roles access entry cntrl
          * user role filter  
        **/

        public static function user_roles_access_entry ( $status=false ) 
        {
            if( $status != false ) 
            {
                return array ( 
                    'administrator' 
                );       
            } else {
                return array ();   
            }
        }
        
        /**
         * load construct
         * auto file call
         * wp structure hook
         * wpdb querys 
         * - etc   
        **/

        public function admin_page () 
        {
            global $wp_roles;
            
            $this->userdata = get_userdata( get_current_user_id() );
            
            if( in_array( $this->userdata->roles[0], self::user_roles_access_entry( true ) ) ) {
                $icon = self::$icon;
            } else {
                $icon = self::$icon_2;
            }

            $menu[] = array( self::$name, self::$name, 1, self::$plugin_slug, array( $this,  self::$plugin_slug.'_function' ), $icon ); 
            
            if( in_array( $this->userdata->roles[0], self::user_roles_access_entry( true ) ) ) 
            { 
                $menu[] = array( 'Help?', 'Help?', 1, self::$plugin_slug, 'help_'.self::$plugin_slug, array( $this, 'help_'.self::$plugin_slug.'_function' ) );
            }

            if( is_array( $menu ) ) add::load_menu_page( $menu );
        }
        
        public function update_db_check () 
        {
            global $db_version;
            if ( get_site_option( 'db_version' ) != $db_version ) self::install();
        }
        
        /** 
            view structure ( include )
            @function callback
            @function page 
        **/
        
        public function wp_mvc_function () 
        { 
            load::view( 'manage' );
        }
                
        public function help_wp_mvc_function() 
        {
            load::view( 'help' );
        }
        
        /** 
            shortcode structure ( include )
            @function callback
            @function page  
        **/
        
        public function wp_mvc_shortcode_handler () 
        {
            load::view( 'shortcode/shortcode' );
            return shortcode::front_page();
        }
                
        /** 
            ajaxs structures ( load-file ) 
            @function callback
            @function page 
        **/

        public function ajaxs_action_handler () 
        {
            action::ajax_action(); 
            die();
        }

        // END
    }

}  

new wp_mvc_page( true );
?>
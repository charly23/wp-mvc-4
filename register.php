<?php if( ! class_exists ( 'register' ) or wp_die( 'register directory function call not exists' ) ) 
{

    class load_var
    {

        public static $slugs   = 'WP_MVC';
        public static $php     = array( '.php', '/' );
        public static $dirname = 'wp-mvc';

        public static function php_val () 
        {
            $value = self::$php;
            return array_shift( array_values( $value ) );
        }

        public static function slashes () 
        {
            return end( self::$php );
        }

        // END
    }

    require_once ( "config/load" . __( load_var::php_val() )  );  

    class register extends load_var
    {

        public function __construct () 
        {
            // parents
        }

        public static function load ( $is_active=true, $load=null ) 
        {

            if( $is_active ) 
            {
                if ( array_key_exists ( 'system', $load ) ) {
                    self::system( $load['system'] );
                }
                if ( array_key_exists ( 'package', $load ) ) {
                    self::package( $load['package'] );
                }
                if ( array_key_exists ( 'config', $load ) ) {
                    self::config( $load['config'] );
                }
                if ( array_key_exists ( 'helper', $load ) ) {
                    self::helper( $load['helper'] );
                }
                if ( array_key_exists ( 'model', $load ) ) {
                    self::model( $load['model'] );
                }
                if ( array_key_exists ( 'control', $load ) ) {
                    self::control( $load['control'] );   
                }
            }
        }

        /**
         * system ( directory )
         * @return LOADER
        **/ 

        public static function system ( $load=array() ) 
        {
            $system = $load;
            $phpval = self::php_val();

            define( __( self::$slugs, 'slug' ) . '_SYSTEMS', 'system' );
            if( is_array( $system ) ) :
                foreach ( $system as $system_key => $system_var ) : if( is_string( $system[$system_key] ) ) :  
                       require_once ( WP_MVC_SYSTEMS . self::slashes() . $system[$system_key] . $phpval );
                   endif;
                endforeach;
            endif;  
        }

        /**
         * system/package ( directory )
         * @return LOADER
        **/

        public static function package ( $load=array() ) 
        {
            $package = $load;
            $phpval = self::php_val();

            define( __( self::$slugs, 'slug' ) . '_PACKAGES', 'packages' );
            if( is_array( $package ) AND isset( $package ) ) :
                foreach ( $package as $package_key => $package_var ) : if( is_array( $package[$package_key] ) ) :  

                   if ( count( $package[$package_key] ) != 0 ) :
                        foreach( $package[$package_key] as $value ) : if ( is_string ( $value ) ) :
                            require_once (  __( WP_MVC_SYSTEMS, 're-use-slug' ) . self::slashes() . WP_MVC_PACKAGES . self::slashes() . $package_key . self::slashes() .  $value . $phpval ); 
                        endif;
                        endforeach;
                   endif;

                   endif;
                endforeach;
            endif;
        }

        /**
         * config ( directory )
         * @return LOADER
        **/ 

        public static function config ( $load=array() ) 
        {
            $config = $load;
            $phpval = self::php_val();

            define( __( self::$slugs, 'slug' ) . '_CONFIG', 'config' );
            if( is_array( $config ) ) :
                foreach ( $config as $config_key => $config_var ) : if( is_string( $config[$config_key] ) ) :
                       require_once ( WP_MVC_CONFIG . self::slashes() . $config[$config_key] . $phpval );
                   endif;
                endforeach;
            endif;
        }

        /**
         * helper ( directory )
         * @return LOADER
        **/

        public static function helper ( $load=array() ) 
        {
            $helper = $load;
            $phpval = self::php_val();

            define( __( self::$slugs, 'slug' ) . '_HELPER', 'helper' );
            if( is_array( $helper ) ) :
                foreach ( $helper as $helper_key => $helper_var ) : if( is_string( $helper[$helper_key] ) ) :
                       require_once ( WP_MVC_HELPER . self::slashes() . $helper[$helper_key] . $phpval );
                   endif;
                endforeach;
            endif;
        }

        /**
         * system/{dir} ( directory )
         * @return LOADER
        **/

        /**
         * model ( directory )
         * @return LOADER
        **/ 

        public static function model ( $load=array() ) 
        {
            $model = $load;
            $phpval = self::php_val();

            define( __( self::$slugs, 'slug' ) . '_MODEL', 'model' );
            if( is_array( $model ) ) :
                foreach ( $model as $model_key => $model_var ) : if( is_string( $model[$model_key] ) ) : 
                       require_once ( WP_MVC_MODEL . self::slashes() . $model[$model_key] . $phpval );
                   endif;
                endforeach;
            endif;
        } 

        /**
         * control ( directory )
         * @return LOADER
        **/ 

        public static function control ( $load=array() ) 
        {
            $control = $load;
            $phpval = self::php_val();

            define( __( self::$slugs, 'slug' ) . '_CONTROLLER', 'controller' );
            if( is_array( $control ) ) :
                foreach ( $control as $control_key => $control_var ) : if( is_string( $control[$control_key] ) ) :
                       require_once ( WP_MVC_CONTROLLER . self::slashes() . $control[$control_key] . $phpval );
                   endif;
                endforeach;
            endif;
        }

    }

    // END
}
?>
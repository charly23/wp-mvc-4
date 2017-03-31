<?php if( ! class_exists( 'config' ) or wp_die ( 'config load error.' ) ) 
{   
    /**
     * lower _dir (file)
     * helper, model, controller
    **/

    load::includes_file( '/model/db', 'model-file' );
    
    class config 
    {

         public static $slug = 'wp-mvc';

         public static $name        = "WP MVC";
         public static $icon        = "wp-mvc/assets/images/36-16.png";
         public static $icon_2      = "wp-mvc/assets/images/36-16.png";
         public static $plugin_slug = 'wp_mvc';
         public static $folder      = 'wp-mvc';
         public static $shortcode   = 'wp_mvc';
         public static $assets      = 'assets';
         
         protected $values          = array();
        
         function __construct() 
         {
                global $wpdb;
                
                add::action_page( array( $this, 'admin_page' ) );
                
                /** backend style ( admin ) **/
                 
                add::style( true, self::$plugin_slug.__( 'admin-style', self::$slug ), self::$folder.'/'.self::$assets.'/css/admin.css' );
                
                
                /** frontend style ( front ) **/
                
                add::style( false, self::$plugin_slug.__( 'front-style', self::$slug ), self::$folder.'/'.self::$assets.'/css/front.css' );
                
                /** backend script **/
                
                add::wp_script( 'jquery' );
                add::wp_script( 'dashboard', true );
                add::wp_script( 'jquery-ui-sortable', true );
                add::wp_script( 'jquery-ui-draggable' );
                add::wp_script( 'jquery-ui-droppable' );
                
                add::wp_script( 'jquery-ui-core' );
                add::wp_script( 'jquery-ui-dialog' );
                add::wp_script( 'jquery-ui-slider' );
                
                add::script( true, self::$plugin_slug.'admin-script', self::$folder.'/'.self::$assets.'/js/admin.js' );
                add::script( true, self::$plugin_slug.'sort-script', self::$folder.'/'.self::$assets.'/js/sort.js' );
                
                add::script( true, self::$plugin_slug.'ajax_handler', self::$folder.'/'.self::$assets.'/js/ajax.js' );
                add::localize_script( true, self::$plugin_slug.'ajax_handler', 'ajax_script', self::get_localize_script_arrays() );
                
                /** frontend script  **/
                
                add::script( false, self::$plugin_slug.'front-script', self::$folder.'/'.self::$assets.'/js/front.js' ); 
                
                /** actions method -- **/
                
                add::action_submit( 1, array( $this, 'action_add_handler' ) );
                add::action( 1, array( $this, 'menu_class_filter' ) );
                
                /** actions option ( callback ) **/
                
                add::action_loaded( array( $this,'update_db_check' ) );
                add_action( 'admin_bar_menu', array( $this, 'node_menu' ) );
                
                /** actions shortcode ( callback ) **/
                
                add::shortcode( self::$shortcode.'_shortcode_handler', array( $this, self::$shortcode.'_handler' ) );
                
                /** actions ajax actions ( callback ) **/
              
                add::action_ajax( array( $this, 'ajaxs_action_handler' ) ); 
                
                /** actions widget ( create ) **/
                
                add::widget_init( array( $this, 'register_widgets' ) );
                add::action( 2, array( $this, 'media_loader' ) );
                
         }

         public static function plugin_name () 
         {
                return self::$name;
         }
         
         public static function get_localize_script_arrays () 
         {
                return array( 
                    'ajax_url' => admin_url( 'admin-ajax.php' ), 
                    'admin_url' => admin_url()
                );   
         }
         
         public function media_loader () 
         {
                add::wp_media( true );
         }

         public static function install () 
         {
                global $wpdb;

                $tbls = array();
                    
                $tbl_1 = $wpdb->prefix . __( 'mvc', self::$slug );
                    
                $charset_collate = $wpdb->get_charset_collate();
                require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
                
                $tbls[] = "{$tbl_1}";

                $sqls = $tbls;
                
                if( isset( $sqls ) and is_array( $sqls ) ) foreach( $sqls as $sql ) :     
                dbDelta( $sql ); 
                endforeach;
                
                self::dbDelta_alters( array(), false );
                
         }
         
         public static function dbDelta_alters ( $tbls=array(), $is_active=true ) 
         {
                global $wpdb;
                
                require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
                
                if( is_array( $tbls ) 
                    AND $is_active == true ) : 
                foreach( $tbls as $tbls_keys => $tbls_res ) :   
                
                    $alts = "";
                    dbDelta( $alts ); 
                    
                endforeach; 
                endif;  
         }
         
         /**
          * Actions submits functions
          * events
         **/
         
         public function action_add_handler () 
         {
            // action
            action::add_action();   
         }

         /**
            WP register widgtet
         **/
         
         public function register_widgets () 
         {
            register_widget( 'Add_Widget' );
         }

         /**
          * admin page menu - filter
          * conditional class elements 
         **/

         public function menu_class_filter () 
         {
            global $menu, $submenu; 
            // $key_vals = array_search( 'wp_raffle', array_column( $menu, 2 ) );
            // foreach( $submenu['wp_raffle'] as $key => $value ) {
                // $value;    
            // }
         }

         public function node_menu ( $wp_admin_bar )
         {
            global $menu, $submenu;
            // $wp_admin_bar->add_node( $args );
         }

         // END
    }    
    
}
?>
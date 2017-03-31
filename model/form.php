<?php if( ! class_exists( 'form' ) or wp_die ( 'error found.' ) ) 
{    
    class form extends input
    {
          public static $slug = 'wp_mvc';

          var $html = null;

                
          public function __construct() 
          {
               parent::__construct();
               
               new page_rounter( true );
               new html_var( true );
          }

          public static function page_header ( $page_class=null ) 
          {
              $html = null;
              
              $userdata = get_userdata( get_current_user_id() );
              $user_role = user_control::get_role();

              $html .= html_var::_div( array( 'class' => __( self::$slug ) . '_header-left ' . __( self::$slug ) . '_' . __( $page_class ) . '_header-left' ) );
              $html .= __( 'Left', 'html' );
              $html .= html_var::_divend(); 

              $html .= html_var::_div( array( 'class' => __( self::$slug ) . '_header-right ' . __( self::$slug ) . '_' . __( $page_class ) . '_header-right' ) );
              $html .= __( 'Right', 'html' );
              $html .= html_var::_divend(); 

              return $html;
          }

          public static function page_title () 
          {
              $userdata = get_userdata( get_current_user_id() );
              $user_role = user_control::get_role();

              $page = self::get_is_object_element( 'page' );
              $name = config::plugin_name(); 

              $label['wp_mvc'] = array( 
                  'title' => __( $name  . ' : Manager - ' . ucfirst ( $userdata->user_login ) . " ({$user_role})", 'wp-gcf' ) 
              );

              $ids = self::get_is_object_element( 'edit' );
              $add_new_titled = intval( $ids ) ? __( 'Edit Form', 'title' ) : __( 'Add New Form', 'title' );

              $label['help_wp_mvc'] = array( 
                  'title' => __( $name . ' : Help?', 'wp-gcf' ) 
              );

              return $label[$page]['title'];
          }

          public static function page_body ( $page_class=null, $top=null, $inner=null, $bottom=null ) 
          {
              $html = null;

              if( $top != false AND ! is_null( $top ) )  
              {
                $html .= html_var::_div( array( 'class' => __( self::$slug ) . '_inner-top ' . __( self::$slug ) . '_' . __( $page_class ) . '_inner-top' ) );
                $html .= __( $top, 'html' );
                $html .= html_var::_divend(); 
              }

              if( $inner != false AND ! is_null( $inner ) )  
              {
                $html .= html_var::_div( array( 'class' => __( self::$slug ) . '_inner-center ' . __( self::$slug ) . '_' . __( $page_class ) . '_inner-center' ) );
                $html .= __( $inner, 'html' );
                $html .= html_var::_divend();  
              }
              
              if( $bottom != false AND ! is_null( $bottom ) ) 
              {
                $html .= html_var::_div( array( 'class' => __( self::$slug ) . '_inner-bottom ' . __( self::$slug ) . '_' . __( $page_class ) . '_inner-bottom' ) );
                $html .= __( $bottom, 'html' );
                $html .= html_var::_divend(); 
              }

              return $html; 
          }


          /**
           * form : manager
           * inner, html, style, ui
           * manager function handlers
          **/

          public static function manager_inner () 
          { 
              $html = null;

              $top = 'Top';
              $inner = 'Inner';
              $bottom = 'Bottom';

              $html .= self::page_body( 'manager', $top, $inner, $bottom );

              return $html;
          }

          /**
           * form : help
           * inner, html, style, ui
           * help function handlers
          **/

          public static function help_inner () 
          { 
              $html = null;

              $top = 'Top';
              $inner = 'Inner';
              $bottom = 'Bottom';

              $html .= self::page_body( 'help', $top, $inner, $bottom );

              return $html;
          }

          // END
    }
}
?>
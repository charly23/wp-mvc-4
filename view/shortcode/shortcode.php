<?php if( ! class_exists( 'shortcode' ) or die( 'error found.' ) ) 
{    
    class shortcode 
    {
        public static function front_page ()
        {
            load::view( 'shortcode/template/front_page' );
            
            $html = null;
            $html .= front_page_objects::template();
            
            return $html;
        }

        // END
        
    }
}

new shortcode();

?>
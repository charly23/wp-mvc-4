<?php if( ! class_exists( 'front_page_objects' ) or die ( 'error found.' ) ) 
{    
    class front_page_objects 
    {
        public static function template () 
        {
            $html = null;
            $html .= 'Hello World!';
            
            return $html;
            
        }

        // END       
    }
}
?>
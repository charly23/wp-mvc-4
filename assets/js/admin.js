jQuery ( function() 
    { 
        var $params = jQuery;

        /**
         * placeholder : custom js
         * @pamar : array object
        **/

        $params.fn.placeholder = function ( arrays=null ) 
        {
            var slg = 'placeholder'
            var inp = $params(this);
            var dlt = inp.val(); 
            var emp = null;   

            var val = 'value' in arrays ? arrays['value'] : null;
            var vdt = 'validate' in arrays ? arrays['validate'] : null;
    
            inp.on( 'click', function()
                {
                    if( dlt != val ) {
                        inp.val(); 
                    } else {
                        inp.val(emp);
                    }
                }
            );

            inp.on( 'blur', function() 
                {
                    var dlt=inp.val(); 
                    if( dlt != val ) {
                        inp.val(); 
                    } else {
                        inp.val(emp);
                    }
                    if( dlt == null || dlt == '' ) {
                        inp.val( val );
                    }
                }
            );

            if( vdt != false ) {
                inp.addClass( slg );
            }
        } 

        /**
         * input class : placeholder
         * list : input type
        **/  

        $params( 'input.form-name-value' ).placeholder({'value':'Name','validate':true});

        // END

    }
);
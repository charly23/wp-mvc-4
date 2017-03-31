<?php
    $userdata = get_userdata( get_current_user_id() );
?>

<div id="wp-mvc__wrap">

    <?php
        $user_role = user_control::get_role();
    ?>

    <div class='wp-mvc__help_head-wrap'>
        <?php 
             _e( form::page_header( 'help' ), 'wp-mvc' );
        ?>
    </div>
    
    <h2 class="wp-mvc_title wp-gcf_manager-title">
    
        <?php 
             _e( form::page_title(), 'wp-mvc' );
        ?>

    </h2>
    
    <div class="ajaxs-results"></div>
    
    <div class='wp-mvc__help_wrap'>
        
        <?php
            _e( form::help_inner(), 'wp-mvc' );
        ?>

    </div>


</div>


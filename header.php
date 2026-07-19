<?php
/*
Package: OnAir2
Description: Theme header
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php wp_head(); ?>
    </head>
    <body id="onair2Body" <?php body_class(); ?> data-start>
    <?php  
     /*=================================================
     * 
     * QantumThemes Business Suite Output
     * 
     =================================================*/
    if(function_exists('qttmbt_create_adslot')){
        echo qttmbt_create_adslot('qttmbt-adslot-1');
    }
    ?>
    <!-- QT HEADER END ================================ -->
        <div class="onair2-contents-master" id="onair2-contents-master">
<?php
/*
Template Name: Ad Campaign Submission
Package: OnAir2
Description: Teplate for visual composer without any sidebar or sharing function
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
?>
<?php get_header(); ?> 
    <?php  
    get_template_part ('phpincludes/menu');
    get_template_part ('phpincludes/part-searchbar'); 
    ?>
    <div id="maincontent" class="qt-main">
        <?php 
        /**
         * From V 2.5
         */
        if (get_theme_mod( 'qt_playerbar_version', '1' ) === '2'){ ?>
            <hr class="qt-header-player-spacer">
        <?php } ?>
        <div class="qt-container qt-vertical-padding-l">
	        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	                <?php 
					/**
					 * =========================================================
					 *  Business Tools form
					 * =========================================================
					 * */
					if( shortcode_exists( 'qttmbt-form' ) ) {
						echo do_shortcode('[qttmbt-form]');
					};
					?>
	                <?php the_content();?>
	            </div>
	        <?php endwhile; endif;?>
	    </div>
        <?php get_template_part ( 'phpincludes/part-sponsors' ); ?>
    </div><!-- .qt-main end -->
    <?php get_template_part ('phpincludes/footerwidgets'); ?>
    <?php get_template_part ('phpincludes/part-player-sidebar'); ?>
<?php get_footer(); ?>
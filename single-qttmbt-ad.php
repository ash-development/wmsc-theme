<?php
/*
Package: OnAir2
Description: Page to display ads stats
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
        <?php while ( have_posts() ) : the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <!-- ======================= HEADER SECTION ======================= -->
              
                <!-- ======================= CONTENT SECTION ======================= -->
                <div class="qt-container  qt-vertical-padding-l">
                   
                    <?php 
                    /**
                     * =========================================================
                     * ProRadio Business Tools 
                     * frontend-stats.php
                     * =========================================================
                     * */
                    if( function_exists('qttmbt_ad_stats_frontend') ) {
                        echo qttmbt_ad_stats_frontend( array('post_id' => get_the_ID() ) );
                    };
                    ?>
                   
                </div>
            </div>
        <?php endwhile; // end of the loop. ?>
    </div><!-- .qt-main end -->
    <?php get_template_part ( 'phpincludes/footerwidgets' ); ?>
    <?php get_template_part (  'phpincludes/part-player-sidebar' ); ?>
<?php get_footer(); ?>
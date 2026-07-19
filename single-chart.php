<?php
/*
Package: OnAir2
Description: Single chart
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
			<?php get_template_part( 'phpincludes/part-header-caption-chart'); ?>
			<!-- ======================= CONTENT SECTION ======================= -->
			<div class="qt-container">
				<div class="row qt-vertical-padding-l ">
					<div class="col s12 m12 l1 qt-pushpin-container">
						<div class="qt-pushpin">
							<?php get_template_part( 'phpincludes/sharepage' ); ?>
						</div>
						 <hr class="qt-spacer-m">
					</div>
					<div class="col s12 m12 l8">
						<?php  
						 /*=================================================
						 * 
						 * QantumThemes Business Suite Output
						 * 
						 =================================================*/
						if(function_exists('qttmbt_create_adslot')){
							echo qttmbt_create_adslot('qttmbt-adslot-2');
						}
						?>
						<?php 
						
						 /*=================================================
						 * 
						 * QantumThemes Business Suite Output
						 * 
						 =================================================*/
						if(function_exists('qttmbt_create_adslot') && '' !== get_the_content()){
							echo qttmbt_create_adslot('qttmbt-adslot-6');
						}

						the_content();
						
						if(shortcode_exists( 'qt-chart' )){
							echo do_shortcode('[qt-chart id="'.($post->ID).'"]' );
						}

						
						?>

						<?php  
						 /*=================================================
						 * 
						 * QantumThemes Business Suite Output
						 * 
						 =================================================*/
						if(function_exists('qttmbt_create_adslot')){
							echo qttmbt_create_adslot('qttmbt-adslot-8');
						}
						?>
					</div>
					<div class="qt-sidebar col s12 m12 l3">
						<?php get_template_part (  'phpincludes/sidebar' ); ?>
					</div>
				</div>
			</div>
			<!-- ======================= RELATED SECTION ======================= -->
			<?php get_template_part ('phpincludes/part', 'related' );  ?>
		</div>
		<?php endwhile; // end of the loop. ?>
	</div><!-- .qt-main end -->
	<?php get_template_part ( 'phpincludes/footerwidgets' ); ?>
	<?php get_template_part (  'phpincludes/part-player-sidebar' ); ?>
<?php get_footer(); ?>
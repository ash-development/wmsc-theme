<?php
/*
Package: OnAir2
Description: Post HERO
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
?>
<!-- POST HERO ITEM ========================= -->
<div class="qt-part-archive-item qt-part-item-post-hero">
	<div class="qt-item-header">
		<div class="qt-header-top">
			<div class="qt-feedback">
	    		<?php 
	    		/**
	    		 *  Display item counters. see functions.php
	    		 */
	    		qantumthemes_item_counters($post->ID, true); 
	    		?>
	    	</div>
	    </div>
		<div class="qt-header-mid qt-vc">
			<div class="qt-vi">
				<ul class="qt-tags">
					<?php
					$onair2_cats = get_the_category();
					$onair2_primary_id = 0;
					if ( function_exists( 'yoast_get_primary_term_id' ) ) {
						$onair2_primary_id = (int) yoast_get_primary_term_id( 'category', get_the_ID() );
					}
					if ( ! $onair2_primary_id && ! empty( $onair2_cats ) ) {
						$onair2_primary_id = $onair2_cats[0]->term_id;
					}
					foreach ( $onair2_cats as $onair2_cat ) {
						if ( 'featured' === strtolower( $onair2_cat->slug ) ) {
							continue;
						}
						$onair2_hl = ( $onair2_cat->term_id === $onair2_primary_id )
							? ' style="font-weight: 700; position: relative; z-index: 5;"'
							: ' style="color: #fff; opacity: 0.8; font-weight: 400; position: relative; z-index: 5;"';
						?>
						<li>
							<a href="<?php echo esc_url( get_category_link( $onair2_cat ) ); ?>"<?php echo $onair2_hl; ?>><?php echo esc_html( $onair2_cat->name ); ?></a>
						</li>
					<?php } ?>
				</ul>
		  		<h2 class="qt-title" style="max-width: 70%; margin-left: auto; margin-right: auto;">
					<a href="<?php the_permalink(); ?>" class="qt-text-shadow qt-ellipsis-2 qt-t">
						<?php the_title(); ?>
					</a>
				</h2>
				<h3 class="qt-author qt-byline-fit" style="max-width: 70%; margin-left: auto; margin-right: auto; white-space: nowrap;">
					By <?php
					if ( function_exists( 'get_coauthors' ) ) {
						$onair2_names = array();
						foreach ( get_coauthors() as $onair2_coauthor ) {
							$onair2_names[] = '<a href="' . esc_url( get_author_posts_url( $onair2_coauthor->ID, $onair2_coauthor->user_nicename ) ) . '"><u>' . esc_html( $onair2_coauthor->display_name ) . '</u></a>';
						}
						echo implode( ', ', $onair2_names );
					} else {
						?><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
							<u><?php the_author(); ?></u>
						</a><?php
					}
					?>
				</h3>
				<div class="qt-the-content qt-spacer-s small hide-on-med-and-down ">
					<p class="qt-spacer-s qt-text-shadow small qt-ellipsis-2">
					<?php echo get_the_excerpt(); ?>
					</p>
				</div>
			</div>
		</div>
		<?php 
		/**
		 *
		 *	Featured image background
		 * 
		 */
		if (has_post_thumbnail()){ ?>
	        <div class="qt-header-bg" data-bgimage="<?php echo the_post_thumbnail_url( 'large' ); ?>">
	            <?php the_post_thumbnail( 'large',array('class'=>'img-responsive activator') ); ?>
	        </div>
     	<?php } ?>
	</div>
</div>
<!-- POST HERO ITEM END ========================= -->

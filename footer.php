<?php
/*
Package: OnAir2
Version: 3.4.1
Author: QantumThemes
Author URI: http://qantumthemes.com
*/

			wp_reset_query();
			wp_reset_postdata();
			
			if(get_theme_mod( 'qt_auto_updater' )){
				$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
				?>
				<div id="qtcurrentpermalink"  data-permalink="<?php echo esc_url( $actual_link); ?>">
					<?php
					// Nothing here. Used by javascript for auto refresh 
					?>
				</div>
				<?php 
			} 
			?>
			<?php  
			 /*=================================================
			 * 
			 * QantumThemes Business Suite Output
			 * 
			 =================================================*/
			if(function_exists('qttmbt_create_adslot')){
				echo qttmbt_create_adslot('qttmbt-adslot-9');
			}
			?>
		</div> <?php /* End of onair2-contents-master */ ?>
		<?php  
		 /*=================================================
		 * 
		 * QantumThemes Business Suite Output
		 * 
		 =================================================*/
		if(function_exists('qttmbt_create_adslot')){
			echo qttmbt_create_adslot('qttmbt-adslot-7');
			echo qttmbt_create_adslot('qttmbt-adslot-4');
			echo qttmbt_create_adslot('qttmbt-adslot-4');
		}
		?>
		<?php 
		
		wp_footer(); 
		?>
	</body>
</html>
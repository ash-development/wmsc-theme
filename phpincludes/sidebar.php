<?php
/*
Package: OnAir2
Description: SIDEBAR WITH WIDGETS
Version: 0.0.0
Author: QantumThemes
Author URI: http://qantumthemes.com
*/
?>
<!-- SIDEBAR ================================================== -->
<div class="qt-widgets qt-sidebar-main qt-text-secondary">

	<?php if(is_active_sidebar( 'right-sidebar' ) ){ ?>
		<?php  
		 /*=================================================
		 * 
		 * QantumThemes Business Suite Output
		 * 
		 =================================================*/
		if(function_exists('qttmbt_create_adslot')){
			echo qttmbt_create_adslot('qttmbt-adslot-3');
		}
		?>
        <?php dynamic_sidebar( 'right-sidebar' ); ?>
        <?php  
		 /*=================================================
		 * 
		 * QantumThemes Business Suite Output
		 * 
		 =================================================*/
		if(function_exists('qttmbt_create_adslot')){
			echo qttmbt_create_adslot('qttmbt-adslot-5');
		}
		?>
	<?php } ?>
</div>
<!-- SIDEBAR END ================================================== -->

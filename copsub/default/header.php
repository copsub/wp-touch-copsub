<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<title><?php wp_title( ' | ', true, 'right' ); ?></title>
		<?php wptouch_head(); ?>
		<?php
			if ( !is_single() && !is_archive() && !is_page() && !is_search() ) {
				wptouch_canonical_link();
			}

			if ( isset( $_REQUEST[ 'wptouch_preview_theme' ] ) || isset( $_REQUEST[ 'wptouch_switch' ] ) )  {
				echo '<meta name="robots" content="noindex" />';
			}
		?>
		<style>
			<?php 
	  	//Dynanic styles for mobile theme
	  	$background_image_magnification  = 160;
	  	$background_image_front_section_1 = get_field( 'background_image_front_section_1',  'option' );
	  	$background_image_front_section_1_ratio = ($background_image_front_section_1[height]/$background_image_front_section_1[width])*($background_image_magnification-1);
	  	$background_image_front_section_2_ratio = (1306/1800)*($background_image_magnification-1);
	  	$background_image_front_section_3_ratio = (1200/1800)*($background_image_magnification-1);
	  	$background_image_front_section_4_ratio = (3850/1800)*($background_image_magnification-1);
	  	$background_image_front_section_5_ratio = (699/1800)*($background_image_magnification-1);
			?>	
			<!--
			.wrapper_front_section_1 {
			  background-size:<?php echo $background_image_magnification ?>% !important;
			  background-image:url('<?php echo $background_image_front_section_1[url] ?>');
			}
			.wrapper_front_section_1:after {
			  padding-top: <?php echo $background_image_front_section_1_ratio; ?>%;
			}
			.main_front_section_1_overlay_3 {
				background-image:url('<?php echo get_site_url()?>/wp-content/themes/cphsuborbitals/img/nexoepatch.png'); 
			}
			
			.wrapper_front_section_2 {
			  background-size:<?php echo $background_image_magnification ?>% !important;
			  background-image:url('<?php echo get_site_url()?>/wp-content/themes/cphsuborbitals/img/front-top-bck.jpg');
			}
			.wrapper_front_section_2:after {
  			padding-top: <?php echo $background_image_front_section_2_ratio; ?>%;
			}
			.main_front_big_button_S2O3_1 {
			  background-image:url('<?php echo get_site_url()?>/wp-content/themes/cphsuborbitals/img/donatesquare.png');
			  background-size: 40%;
			  background-position: right bottom;
    		background-repeat: no-repeat;
			}
			
			.main_front_big_button_S2O3_2 {

			}	
			.main_front_big_button_S2O3_3 {
			  background-image:url('<?php echo get_site_url()?>/wp-content/themes/cphsuborbitals/img/square_download.png');
			  background-size: 40%;
			  background-position: right bottom;
    		background-repeat: no-repeat;
			}
			
			.wrapper_front_section_3 {
			}
			.wrapper_front_section_3:after {
  			padding-top: <?php echo $background_image_front_section_3_ratio; ?>%;
			}

			.wrapper_front_section_4 {
			  background-size:<?php echo $background_image_magnification ?>% !important;
			  background-image:url('<?php echo get_site_url()?>/wp-content/themes/cphsuborbitals/img/front-spica-bck.jpg');
			}
			.wrapper_front_section_4:after {
  			padding-top: <?php echo $background_image_front_section_4_ratio; ?>%;
			}

			.wrapper_front_section_5 {
			  background-size:<?php echo $background_image_magnification ?>% !important;
			    background-color: #000;
			  background-image:url('<?php echo get_site_url()?>/wp-content/themes/cphsuborbitals/img/front-bottom-bck.jpg');
			}
			.wrapper_front_section_5:after {
  			padding-top: <?php echo $background_image_front_section_5_ratio; ?>%;
			}

			.main_front_section_5_overlay_2 {
			  background-image:url('<?php echo get_site_url()?>/wp-content/themes/cphsuborbitals/img/donatebutton.png');
			  background-size: contain;
			  background-position: center center;
    		background-repeat: no-repeat;
			}


			-->
		</style>	
	</head>

	<body <?php body_class( wptouch_get_body_classes() ); ?>>

		<?php do_action( 'wptouch_preview' ); ?>

		<?php do_action( 'wptouch_body_top' ); ?>

		<?php get_template_part( 'header-bottom' ); ?>

		<?php do_action( 'wptouch_body_top_second' ); ?>

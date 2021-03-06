<?php
/*
Template Name: Frontpage Sections Template (Mobile)
*/

$activate_war_mode = get_field( 'activate_war_mode',  'option' );

if ($activate_war_mode) {

header("Location: " . site_url() . "/nexo/");
die();
}
?>

	<?php get_header('front'); 

  $server_name = $_SERVER['SERVER_NAME'];

  global $post;

  $title    =  get_field( '_frontpage_template_1_title', $post->ID );
  $text     =  get_field( '_frontpage_template_1_text',  $post->ID );
  $video_id =  esc_attr( strip_tags( trim( get_field( '_frontpage_template_1_video', $post->ID ) ) ) );
  $themepath = ( $server_name === 'sb1.local' ? 'http://sb1.local/wp-content/themes/cphsuborbitals' : CHILD_THEME_URI );
  //$url_for_steaming_link = get_field( 'url_for_steaming_link',  $post->ID );
  $url_for_steaming_link = get_youtube_streaming_url_from_text_file();
  $url_for_post_link = get_field( 'url_for_post_link',  'option' );
  $event_mode_active = get_field( 'event_mode_active',  'option' );
  $url_link_ready = get_field( 'url_link_ready',  'option' );
  $event_button_text = get_field( 'event_button_text',  'option' );
  
  //var from settings page
  $launch_time_date = get_field( 'launch_time_date', 'option' );
  $launch_date = date('F jS', strtotime($launch_time_date));
  $launch_message = get_field( 'front_launch_message', 'option' );

  $time_hiding_countdown_frontpage = get_field( 'time_hiding_countdown_frontpage',  'option' );
  $show_countdown_on_frontpage = get_field( 'show_countdown_on_frontpage',  'option' );
  
  //Sections
  $front_section_1_active = get_field( 'front_section_1_active',  'option' );
  $background_image_front_section_1 = get_field( 'background_image_front_section_1',  'option' );
  $front_section_1_headline_l1 = get_field( 'front_section_1_headline_l1',  'option' );
  $front_section_1_link_button = get_field( 'front_section_1_link_button',  'option' );

  $front_section_2_active = get_field( 'front_section_2_active',  'option' );
  $front_section_3_active = get_field( 'front_section_3_active',  'option' );
  $front_section_4_active = get_field( 'front_section_4_active',  'option' );
  $front_section_5_active = get_field( 'front_section_5_active',  'option' );
  
  
  
  
  /*   
-------------------------
[ @-> gets latest blog ]
-------------------------
*/

   $query_blog =  new WP_Query( array(
      'no_found_rows'           => true, // counts posts, remove if pagination required
      'update_pos t_meta_cache' => false,  // grabs post meta, remove if post meta required
      'update_post_term_cache'  => false, // grabs terms, remove if terms required (category, tag...)
      'post_type'               => array( 'post' ),
      'posts_per_page'          => 6,
      'category_name'           => 'csblog',
	  'order'                   => 'date'
   ) );
   
   
  
?>

	<div id="content">

		<?php // ###Launch mode section start### ----------------------------------------------------------------------- ?>

		<?php //Launch mode background 
if ($front_section_1_active) {
?>

		<div class="wrapper_front_section_1">
			<div class="main_front_section_1"></div>
			<?php //---Countdown section--------------- ?>
			<div class="main_front_section_1_overlay_1 overlay_show">
				<?php 
		switch ($show_countdown_on_frontpage) {
			case "hidden":
				echo '<div class="front_launch_countdown"></div>';
				break;
			case "message":
				echo '<div class="front_launch_countdown">';
				echo '<div class="front_launch_message">'.$launch_message.' '.$launch_date.'</div>';
				echo '</div>';
				break;
			case "countdown":
				if (strtotime('now') <= $time_hiding_countdown_frontpage) {
					echo '<div class="front_launch_countdown">';
					echo do_shortcode( '[ujicountdown id="NextTest2" expire="'.$launch_time_date.'" hide="true" url="" subscr="Nexø I Launch" recurring="" rectype="second" repeats=""]' ); 
					echo '</div>';
				} else {
					echo '<div class="front_launch_countdown">';
					echo '<div class="front_launch_message">'.$launch_message.'</div>';
					echo '</div>';				
				}
				break;
		}
		?>
				<?php if($show_countdown_on_frontpage && ($time_hiding_countdown_frontpage >= strtotime(now))) { 

			} else {?>
				<?php } ?>
			</div>

			<?php //---Countdown section End ---------- ?>


			<?php //---Front Text Launch section--------------- ?>

			<div class="main_front_section_1_overlay_2 overlay_show">
				<?php echo $front_section_1_headline_l1;?>
			</div>

			<?php //---Front Text Launch section End ---------- ?>


			<?php //---Front Mission Page Button section--------------- ?>

			<a style="text-decoration: none;" href="<?php echo $front_section_1_link_button ?>" title="" onclick="_gaq.push(['_trackEvent','Media','Click','Watch Us on FP']);">
				<div class="main_front_section_1_overlay_4 overlay_show">
					Go to the mission page
				</div>
			</a>

			<?php //---Front Mission Page Button End ---------- ?>

			
			
			<?php //---Front Mission Patch section--------------- ?>

			<div class="main_front_section_1_overlay_3 overlay_show">
							<div>
				<div style="margin-bottom: 5px;color: white;">
					Sign up for our newsletter:
				</div>
			
	<?php echo do_shortcode('[mc4wp_form id="11166"]') ?>
				</div>			
			
		</div>
			</div>

			<?php //---Front Mission Patch section End ---------- ?>






		</div>



		<?php  } ?>





		<?php //----------- Launch mode section end ----------------------------------------------------------------------- ?>

		<?php //----------- Manned top section -----------------------------------------------------------------------------?>

		<div class="wrapper_front_section_2">
			<div class="main_front_section_2"></div>
			<div class="main_front_section_2_overlay_1 overlay_show">
				The world’s only amateur space program
			</div>
			<div class="main_front_section_2_overlay_2 overlay_show">
				<div>We’re 50 geeks building and flying our own rockets. </div>
				<div>One of us will fly into space. </div>
			</div>








			<div class="main_front_section_2_overlay_3 overlay_show">

				<table style="height: 100%">
					<tr>
						<td class="main_front_big_button_S2O3_1">
							<a style="text-decoration: none; color: black;" href="<?php $server_name ?>/support-us/" onclick="_gaq.push(['_trackEvent','Support','Click','Big donate button FP']);">
								It’s 100 % nonprofit and crowdfunded. Please donate here.
		  					<div><img src="<?php echo get_site_url()?>/wp-content/themes/cphsuborbitals/img/pointer-black.png" style="width: 12%;"></div> 
							</a>
						</td>
						
						
						
				<?php if($event_mode_active) {?>
					<?php if($url_link_ready) {?>
						<td class="main_front_big_button_S2O3_2">
							<a style="text-decoration: none;color: black;" href="<?php echo $url_for_steaming_link ?>" onclick="_gaq.push(['_trackEvent','Support','Click','Big download button FP']);">
								<?php echo $event_button_text ?>
								<div style="font-size: 2.5vw;margin-top: 5%">
										Live feed - Click here.
								</div>
								<div style="padding: 5% 0% 0% 30%;"><img src="<?php echo get_site_url()?>/wp-content/themes/cphsuborbitals/img/testsquare.png" style="width: 55%;"></div>
							</a>
						</td>
					<?php } else {?>
						<td class="main_front_big_button_S2O3_2">
							<a style="text-decoration: none;color: black;" href="<?php echo $url_for_post_link ?>" onclick="_gaq.push(['_trackEvent','Support','Click','Big download button FP']);">
								<?php echo $event_button_text ?>
								<div style="font-size: 2.5vw;margin-top: 5%">
										Videolink will be made available here as soon as possible.
								</div>
								<div><img src="<?php echo get_site_url()?>/wp-content/themes/cphsuborbitals/img/pointer-black.png" style="width: 12%;"></div>
							</a>
						</td>
						
					<?php }?>
				<?php } else {?>
				<?php }?>
						
						
						
						
						
						<td class="main_front_big_button_S2O3_3">
							<a style="text-decoration: none;color: black;" href="<?php $server_name ?>/ressources/" onclick="_gaq.push(['_trackEvent','Support','Click','Big download button FP']);">
								Download posters, wallpapers and more here.
								<div><img src="<?php echo get_site_url()?>/wp-content/themes/cphsuborbitals/img/pointer-black.png" style="width: 12%;"></div>
							</a>
						</td>
						<td>
							&nbsp;
						</td>
					</tr>
				</table>
			</div>
















			<div class="main_front_section_2_overlay_4 overlay_show">
				<div>Aiming high:</div>
				<div>The manned Spica mission</div>
			</div>
			<div class="main_front_section_2_overlay_5 overlay_show">
				Every step we take is leading to flying a person into space on what will be our biggest rocket: Spica
			</div>

			<a style="text-decoration: none;" rel="wp-video-lightbox" href="https://www.youtube.com/watch?v=1i3HDv2s7io&amp;width=640&amp;height=640" title="" onclick="_gaq.push(['_trackEvent','Media','Click','Watch Us on FP']);">
				<div class="main_front_section_2_overlay_6 overlay_show">
					<span style="">See our intro video</span>
					<img src="<?php echo get_site_url()?>/wp-content/themes/cphsuborbitals/img/pointer-black.png" style="width: 12%; vertical-align: middle;">
				</div>
			</a>

		</div>


		<?php //----------- Manned top section end -------------------------------------------------------------------------?>


		<?php //----------- Widget section ---------------------------------------------------------------------------------?>

		<div class="wrapper_front_section_3">
			<div class="main_front_section_3"></div>

			<div class="main_front_section_3_overlay_1 overlay_show">

				<div class="front-widget">
					<?php // lastest news col ?>
					<div class="widget-header-front">Latest blog posts</div>
					<ul>
						<?php if ( $query_blog->have_posts() ) : $query_blog->have_posts();
      while ( $query_blog->have_posts() ) :	$query_blog->the_post(); ?>
						<li>
							<?php
        printf( '<span class="date">%s</span>', get_the_date( 'd.m.Y' ) );
        printf( '<div class="widget-content"><a href="%s">%s</a></div>', get_permalink(), get_the_title() );
			  ?>
						</li>
						<?php endwhile;
      else :
      endif;    
      wp_reset_postdata();
      ?>
					</ul>
				</div>


			</div>



		</div>

		<?php //----------- Widget section end -----------------------------------------------------------------------------?>

		<?php //----------- Section 4 --------------------------------------------------------------------------------------?>

		<div class="wrapper_front_section_4">
			<div class="main_front_section_4"></div>
		</div>

		<?php //----------- Section 4 end ----------------------------------------------------------------------------------?>

		<?php //----------- Section 5 --------------------------------------------------------------------------------------?>

		<div class="wrapper_front_section_5">
			<div class="main_front_section_5"></div>
			<div class="main_front_section_5_overlay_1 overlay_show">
				We’re 100 % crowdfunded.</br>
				Donate or join the support group.</br>
				your money is the rocketfuel!
			</div>

			<a href="<?php echo (site_url().'/support-us/'); ?>" onclick="_gaq.push(['_trackEvent','Support','Click','Donate on bottom FP']);">
				<div class="main_front_section_5_overlay_2 overlay_show"></div>
			</a>

		</div>

		<?php //----------- Section 5 end ----------------------------------------------------------------------------------?>





		<?php



?>

	</div>

	<?php get_footer('frontlaunch'); ?>
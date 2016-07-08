<?php
/*
Template Name: Mission Landingpage Template (Mobile)
*/
?>

<?php get_header(); 

$server_name = $_SERVER['SERVER_NAME'];
$themepath = ( $server_name === 'sb1.local' ? 'http://sb1.local/wp-content/themes/cphsuborbitals' : CHILD_THEME_URI );

global $post;

$frontpage_id = get_option('page_on_front');
$url_for_steaming_link = get_youtube_streaming_url_from_text_file();
$mission_live_blog = get_field( 'mission_live_blog',  $post->ID  );
$about_the_mission_title = get_field( 'about_the_mission_title',  'option'  );
$about_the_mission_content = get_field( 'about_the_mission_content',  'option'  );

//var from settings page
$launch_time_date = get_field( 'launch_time_date', 'option' );
$launch_date = date('F jS', strtotime($launch_time_date));
$launch_message = get_field( 'front_launch_message', 'option' );
$time_hiding_countdown_frontpage = get_field( 'time_hiding_countdown_frontpage',  'option' );
$show_countdown_on_frontpage = get_field( 'show_countdown_on_frontpage',  'option' );
$activate_war_mode = get_field( 'activate_war_mode',  'option' );

$mission_landing_page_title_l1_normal_mode = get_field( 'mission_landing_page_title_l1_normal_mode',  'option' );
$mission_landing_page_title_l2_normal_mode = get_field( 'mission_landing_page_title_l2_normal_mode',  'option' );
$mission_landing_page_title_l1_war_mode = get_field( 'mission_landing_page_title_l1_war_mode',  'option' );
$mission_landing_page_title_l2_war_mode = get_field( 'mission_landing_page_title_l2_war_mode',  'option' );
$mission_landing_page_top_logo = get_field( 'mission_landing_page_top_logo',  'option' );
$mission_content_top = get_field( 'mission_content_top',  'option' );
$estimated_mission_plan = get_field( 'estimated_mission_plan',  'option' );
$live_blog_description = get_field( 'live_blog_description',  'option' );
$for_the_press_content = get_field( 'for_the_press_content',  'option' );
$more_about_image = get_field( 'more_about_image',  'option' );

   


?>

<div id="content">
	<div class="<?php wptouch_post_classes(); ?>">
	<?php while ( have_posts() ) : the_post(); ?>

		<div class="post-page-content">
	  	<section class="text">             

<?php
/* SUB HEADER SECTION START ----------------------------------------------------------------------------------------------------------------------------  */ 
If ($activate_war_mode) 	{	
?>
				<table style="width: 100%;vertical-align:bottom;  padding-bottom: 1.0vw;">					
					<tr>
						<td style="height: 15vw;" >
							<div style="Color:black; Font-size:4.5vw;font-weight: bold;line-height: 6.5vw;"><?php echo $mission_landing_page_title_l1_war_mode ?></div>
							<div style="Color:#FF4F00; Font-size:3.5vw;font-weight: bold; line-height: 4.0vw;"><?php echo $mission_landing_page_title_l2_war_mode ?></div>
						</td>
						<td style="text-align:right; width: 25vw;">
							<img src="<?php echo $mission_landing_page_top_logo[url] ?>" style="height:15vw;">
						</td>
					</tr>
					<tr>
						<td colspan="2"  style="height: 5vw;border-top: 1px solid black; 	border-collapse: collapse;border-top-color: #999999">
						</td>
					</tr>
				</table>	
				
<?php } else { ?>	
				
				<table style="width: 100%;vertical-align:bottom;  padding-bottom: 1.0vw;">					
					<tr>
						<td style="height: 15vw;" >
							<div style="Color:black; Font-size:4.5vw;font-weight: bold;line-height: 6.5vw;"><?php echo $mission_landing_page_title_l1_normal_mode ?></div>
							<div style="Color:#FF4F00; Font-size:3.5vw;font-weight: bold; line-height: 4.0vw;"><?php echo $mission_landing_page_title_l2_normal_mode ?></div>
						</td>
						<td style="text-align:right; width: 25vw;">
							<img src="<?php echo $mission_landing_page_top_logo[url] ?>" style="height:15vw;">
						</td>
					</tr>
					<tr>
						<td colspan="2"  style="height: 15vw;border-top: 1px solid black; 	border-collapse: collapse;border-top-color: #999999">
							<div style="padding-top: 1.0vw;"><?php echo $mission_content_top ?></div>
						</td>
					</tr>
				</table>					
				
	<?php			
	
}
/* SUB HEADER SECTION END ------------------------------------------------------------------------------------------------------------------------------  */ 

				
			If ($activate_war_mode) 	{		
			
/* LIVESTREAM SECTION START ----------------------------------------------------------------------------------------------------------------------------  */ 
			?>
<iframe width="878" height="494" src="https://www.youtube.com/embed/<?php echo $url_for_steaming_link; ?>?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>

			<?php
/* LIVESTREAM SECTION END  -----------------------------------------------------------------------------------------------------------------------------  */ 
			
			} 
			
				
				
				If ($activate_war_mode) 	{	
/* LIVEBLOG SECTION START -----------------------------------------------------------------------------------------------------------------------------  */ 
			?>
<table style="width: 100%;vertical-align:bottom;  padding-bottom: 1.0vw; background-color: #e7e7e7;margin-top:1vw;">
	<tr>
		<td style="height: 6.0vw; padding: 2.0vw 1.0vw 1.0vw 1.0vw;vertical-align:bottom;" >
			<div style="Color:black; Font-size:4.5vw;font-weight: bold;line-height: 8.5vw;padding-right: 10px;">Live blog</div>
			<div style="Color:black; Font-size:3.5vw;font-weight: normal;line-height: 4.5vw;"><?php echo $live_blog_description ?></div>
		</td>
	</tr>
	<tr>
		<td style="height: 27.0vw; padding: 2.0vw 1.0vw 1.0vw 1.0vw;border-top: 1px solid black; 	border-collapse: collapse;border-top-color: #999999" >
			<?php the_content(); ?>
		</td>
	</tr>
</table>
				
				
				
			<?php		
/* LIVEBLOG SECTION END  ------------------------------------------------------------------------------------------------------------------------------  */ 
			} else {	

/* NEWS SECTION START ---------------------------------------------------------------------------------------------------------------------------------  */ 

   $query =  new WP_Query( array(
      'no_found_rows'           => true, // counts posts, remove if pagination required
      'update_pos t_meta_cache' => false,  // grabs post meta, remove if post meta required
      'update_post_term_cache'  => false, // grabs terms, remove if terms required (category, tag...)
      'post_type'               => array( 'post' ),
      'posts_per_page'          => 3,
      'category_name'           => 'nexoe_news',
	  'order'                   => 'date'
   ) );
   
   ?>

<table style="width: 100%;vertical-align:bottom;  padding-bottom: 1.0vw; background-color: #e7e7e7">
	<tr>
		<td style="height: 27.0vw; padding: 0 0 1.0vw 0;" >
			<div class="latest_news">
    	<ul style="list-style: none; margin: 0;">
<?php if ( $query->have_posts() ) : $query->have_posts();
while ( $query->have_posts() ) :	$query->the_post(); ?>
		    <li style="margin: 0 0.5vw 0 0.5vw; ">
<?php
	printf( '<div class="missionnews"><div style="padding-top: 1vw;">%s</div><a href="%s">%s</a></div>', get_the_date( 'd.m.Y' ), get_permalink(), get_the_title() );
  printf( '<div>%s</div>', wp_trim_words( strip_tags( get_the_content( '', TRUE ) ), 20 ) );
?>  
				</li>
                    
<?php endwhile;
               else :
               endif;
    
               wp_reset_postdata();
        
              ?>
         </ul>
       </div>	
			
		</td>

	</tr>
	</table>
				
<table style="width: 100%;vertical-align:bottom;  padding-bottom: 1.0vw; background-color: #e7e7e7; margin-top: 1vw;">
		

	<tr>
			<td style=" padding: 2.0vw 1.0vw 1.0vw 1.0vw;">
			<?php echo $estimated_mission_plan ?>
		</td>
	</tr>
</table>
				
				

   
<?php   
/* NEWS SECTION END  ---------------------------------------------------------------------------------------------------------------------------------  */ 
  
}                    
			
				
/* NEWSLETTER-DONATE SECTION START --------------------------------------------------------------------------------------------------------------------  */ 

						If ($activate_war_mode) 	{	
			
				?>
	
<table style="width: 100%;  background-color: #FF4F00; margin-bottom:1vw;margin-top:1vw;">
	<tr>
		<td style="height: 8.0vw; padding: 2.3vw 1.0vw 2.0vw 1.0vw;text-align: center;" >
<a style="color: white;font-weight: bold;font-size:25px;text-decoration: none;" href="<?php echo get_site_url()?>/support-us/">Donate here ></a>
		</td>
		
	</tr></table>
				
<table style="width: 100%;  background-color: #FF4F00">
	<tr>		
		<td style="padding: 2.0vw 1.0vw 1.0vw 1.0vw;">
			<div>
				<div style="margin-bottom: 5px;color: white;">
					Sign up for our newsletter here:
				</div>
			
	<?php echo do_shortcode('[mc4wp_form id="11166"]') ?>
				</div>
		</td>
	</tr>
</table>				
				
				

					
					

	
<?php
						}			
/* NEWSLETTER-DONATE SECTION END  ---------------------------------------------------------------------------------------------------------------------  */ 

								
				
/* MISSION EXPLAINED SECTION START -----------------------------------------------------------------------------------------------------------------------------  */ 
				
?>                    
            		
<table style="width: 100%;vertical-align:bottom;  padding-bottom: 1.0vw; margin-top: 2.0vw;">
	<tr>
		<td style="height: 6.0vw; padding: 0 0 1.0vw 0;vertical-align:bottom;" >
			<span style="Color:black; Font-size:4.5vw;font-weight: bold;line-height: 5.0vw;padding-right: 1.0vw;"><?php echo $about_the_mission_title ?></span>
		</td>
	</tr>
	<tr>
		<td style="height: 27.0vw; padding: 3.0vw 0 1.0vw 0;border-top: 1px solid black; 	border-collapse: collapse;border-top-color: #999999" >
  
  <?php echo $about_the_mission_content ?>		</td>
	</tr>
</table>				
				
				
<?php
/* MISSION EXPLAINED SECTION END  ------------------------------------------------------------------------------------------------------------------------------  */ 
							
		
				
				
/* MORE ABOUT SECTION START -----------------------------------------------------------------------------------------------------------------------------  */ 
				
?>
	<a href="<?php echo get_site_url()?>/roadmap/nexo-i/">			
					<div style="height: 50.0vw; width: 100%; margin-bottom: 0; margin-top: 2.0vw; display: block; margin-left: auto; margin-right: auto; background-color:#e7e7e7; background-image: url('<?php echo $more_about_image[url]; ?>'); background-repeat: no-repeat;background-position: center;background-size: 100%;">
<div style="width: 65.0vw;margin-left:23vw;text-align: right;padding-top:2.0vw;">
		<div style="Color:#FF4F00; Font-size:4.5vw;font-weight: bold; line-height: 4.5vw;padding-bottom:1.0vw;">
			See the Nexø I rocket in detail
	</div>				
			<div style="margin-left:10vw;width: 55.0vw;Font-size:3.0vw; line-height: 4.0vw;padding-bottom:1.0vw;">
			See our page with the Nexø I rocket information in all it's glorious detail.
	</div>				
	
						</div>

				</div>
	</a>			
				
<?php				
				
/* MORE ABOUT SECTION END -------------------------------------------------------------------------------------------------------------------------------  */ 
				
				
			
				
/* NEWSLETTER-DONATE SECTION START --------------------------------------------------------------------------------------------------------------------  */ 

						If (!$activate_war_mode) 	{	
			
				?>
	
<table style="width: 100%;  background-color: #FF4F00; margin-bottom:1vw;margin-top:1vw;">
	<tr>
		<td style="height: 8.0vw; padding: 2.3vw 1.0vw 2.0vw 1.0vw;text-align: center;" >
<a style="color: white;font-weight: bold;font-size:25px;text-decoration: none;" href="<?php echo get_site_url()?>/support-us/">Donate here ></a>
		</td>
		
	</tr></table>
				
<table style="width: 100%;  background-color: #FF4F00">
	<tr>		
		<td style="padding: 2.0vw 1.0vw 1.0vw 1.0vw;">
			<div>
				<div style="margin-bottom: 5px;color: white;">
					Sign up for our newsletter here:
				</div>
			
	<?php echo do_shortcode('[mc4wp_form id="11166"]') ?>
				</div>
		</td>
	</tr>
</table>				
				
				

					
					

	
<?php
						}			
/* NEWSLETTER-DONATE SECTION END  ---------------------------------------------------------------------------------------------------------------------  */ 

					
				
			
/* PR SECTION START -----------------------------------------------------------------------------------------------------------------------------  */ 
				
?>
	
				<table style="width: 100%;vertical-align:bottom;  padding-bottom: 1.0vw; background-color: #FFF; margin-top: 3.0vw;">
	<tr>
		<td style="height: 6.0vw; padding: 2.0vw 1.0vw 1.0vw 1.0vw;vertical-align:bottom;" >
			<span style="Color:black; Font-size:4.5vw;font-weight: bold;line-height: 4.5vw;padding-right: 1.0vw;">For the press</span>
		</td>
	</tr>
	<tr>
		<td style="height: 27.0vw; padding: 2.0vw 1.0vw 1.0vw 1.0vw;border-top: 1px solid black; 	border-collapse: collapse;border-top-color: #999999" >
			<?php echo $for_the_press_content ?>
		</td>
	</tr>
</table>
				
				

				
				
<?php				
				
/* PR SECTION END -------------------------------------------------------------------------------------------------------------------------------  */ 
					
				
				
				
				
				
				
				
				?>			
				
				
				
				
				
				
				
				
				
				
				
					
                       


         
    			</section>    

				<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
				</div>

		<?php endwhile; ?>




	</div>
</div>





<?php //get_sidebar(); ?>
<?php get_footer(); ?>
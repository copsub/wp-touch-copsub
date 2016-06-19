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

//var from settings page
$launch_time_date = get_field( 'launch_time_date', 'option' );
$launch_date = date('F jS', strtotime($launch_time_date));
$launch_message = get_field( 'front_launch_message', 'option' );
$time_hiding_countdown_frontpage = get_field( 'time_hiding_countdown_frontpage',  'option' );
$show_countdown_on_frontpage = get_field( 'show_countdown_on_frontpage',  'option' );




/*
-------------------------
[ @-> gets latest news ]
-------------------------
*/

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


<div id="content">
	<div class="<?php wptouch_post_classes(); ?>">
		<div class="post-page-head-area bauhaus">
			<h2 class="post-title heading-font"><?php wptouch_the_title(); ?></h2>
			<?php if ( bauhaus_should_show_author() ) { ?>
				<span class="post-author"><?php the_author(); ?></span>
			<?php } ?>
		</div>
	
		<?php while ( have_posts() ) : the_post(); ?>
		
		
		

				<div class="post-page-content">
	        <section class="text">             
  
						
						
						
						<div style="padding-bottom: 20px;padding-top:20px;">
							<?php //echo '<div class="front_launch_message">Postponed to 2016</div>'; ?>               
       
						
						
						
						
						<?php                    

					
		switch ($show_countdown_on_frontpage) {
			case "hidden":
				echo '';
				break;
			case "message":
				echo '<div class="front_launch_message">'.$launch_message.' '.$launch_date.'</div>';
				break;
			case "countdown":
				if (strtotime('now') <= $time_hiding_countdown_frontpage) {
				echo '<div class="front_launch_countdown">';
				echo do_shortcode( '[ujicountdown id="NextTest" expire="'.$launch_time_date.'" hide="true" url="" subscr="Nexø I Launch" recurring="" rectype="second" repeats=""]' ); 
				echo '</div>';
				} else {
				echo '<div class="front_launch_countdown">';
				echo '<div class="front_launch_message">'.$launch_message.'</div>';
				echo '</div>';				
				}
				break;
		}
		?>
						
				   	</div>		
                       
		        <?php // lastest news col ?>
    		   	<div class="latest-news-widget">
							<div class="header">Latest Nexø news</div>
            	<ul>
              <?php if ( $query->have_posts() ) : $query->have_posts();
    	          while ( $query->have_posts() ) :	$query->the_post(); ?>
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
       		
					<?php wptouch_the_content(); ?>
         
    			</section>    

				<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
				</div>

		<?php endwhile; ?>




	</div>
</div>





<?php //get_sidebar(); ?>
<?php get_footer(); ?>
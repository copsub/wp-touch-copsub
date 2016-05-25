<?php
/*
Template Name: The Team Template
*/
?>

<?php get_header(); 

 global $post;


?>

<div id="content">
	<div class="<?php wptouch_post_classes(); ?>">




		<div class="post-page-head-area bauhaus">
			<h2 class="post-title heading-font"><?php wptouch_the_title(); ?></h2>
			<?php if ( bauhaus_should_show_author() ) { ?>
				<span class="post-author"><?php the_author(); ?></span>
			<?php } ?>
		</div>

				<div class="post-page-content">
        	<section class="text">
				<?php 

					echo '<div class="personnel"><h3>Mission Specialists</h3></div>';
					

					
					
					$type = 'personel';
					$args=array(
					  'post_type' => $type,
					  'post_status' => 'publish',
					  'posts_per_page' => -1,
					  'caller_get_posts' => 1,
					  'orderby' => 'title',
					  'order'   => 'ASC',
					  'team' => 'mission-specialists' );

					$my_query = null;
					$my_query = new WP_Query($args);
					if( $my_query->have_posts() ) {
					  while ($my_query->have_posts()) : $my_query->the_post(); 
					  	$job_area_personel  =  get_field( '_job_area', get_the_id() );
				    	?>
				    	<div style="width:330px; float: left; margin-bottom: 20px;" class="personnel">
				    		<div style="float:left; margin-right:20px;" class="personnel-img">
				    		<?php 
							if ( has_post_thumbnail( $_post->ID ) ) {	
					    		echo the_post_thumbnail( array(100, 100) ); 
					    	} else {
					    	echo '<img width="100" height="100" src="' . get_site_url() . '/wp-content/themes/cphsuborbitals/img/siluet.jpg" class="personnel-siluet" alt="siluet">';
					    	}
				    		?>
				    		</div>
				    		<div style="margin-top:5px;">
				    			<div style="font-size: 18px; font-weight: bold;"><?php the_title(); ?></div>
				    			<div style="font-weight: bold; color:#777"><?php echo $job_area_personel; ?></div>
				    		</div>
				    		

						</div>
						<?php						
						
						
					  endwhile;
						}
						wp_reset_query();  // Restore global post data stomped by the_post().







					echo '<div class="personnel" style="clear: both;"><h3>Support Group</h3></div>';
					

					
					
					$type = 'personel';
					$args=array(
					  'post_type' => $type,
					  'post_status' => 'publish',
					  'posts_per_page' => -1,
					  'caller_get_posts' => 1,
					  'orderby' => 'title',
					  'order'   => 'ASC',
					  'team' => 'support-group' );

					$my_query = null;
					$my_query = new WP_Query($args);
					if( $my_query->have_posts() ) {
					  while ($my_query->have_posts()) : $my_query->the_post(); 
					  	$job_area_personel  =  get_field( '_job_area', get_the_id() );
				    	?>
				    	<div style="width:330px; float: left; margin-bottom: 20px;" class="personnel">
				    		<div style="float:left; margin-right:20px;" class="personnel-img">
				    		<?php 
							if ( has_post_thumbnail( $_post->ID ) ) {	
					    		echo the_post_thumbnail( array(100, 100) ); 
					    	} else {
					    	echo '<img width="100" height="100" src="' . get_site_url() . '/wp-content/themes/cphsuborbitals/img/siluet.jpg" class="personnel-siluet" alt="siluet">';
					    	}
				    		?>
				    		</div>
				    		<div style="margin-top:5px;">
				    			<div style="font-size: 18px; font-weight: bold;"><?php the_title(); ?></div>
				    			<div style="font-weight: bold; color:#777"><?php echo $job_area_personel; ?></div>
				    		</div>
				    		

						</div>
						<?php						
						
						
					  endwhile;
						}
						wp_reset_query();  // Restore global post data stomped by the_post().

?>

<div style="clear: both;"></div>
                    </section>    
</div>





					</div>


</div>

<?php get_footer(); ?>


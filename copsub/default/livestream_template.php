<?php
/*
Template Name: Livestream template
*/

?>

<?php get_header(); 


  $server_name = $_SERVER['SERVER_NAME'];

  global $post;

 $frontpage_id = get_option('page_on_front');
 //$url_for_steaming_link = get_field( 'url_for_steaming_link',  $frontpage_id );
 $url_for_steaming_link = get_youtube_streaming_url_from_text_file();
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
						<?php the_content(); ?>
						<?php _e( wp_oembed_get( $url_for_steaming_link ) ); ?>
                    </section>    

						<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>


					</div>


				<?php //comments_template(); ?>
			<?php endwhile; ?>




  </duv>
</div>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>

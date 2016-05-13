<?php
/*
Template Name: Magazine Template
*/

get_header(); ?>
    
<div id="content" class="row">    
	<div id="primary" class="c9">

		<div id="magazine-slider">
				<?php echo whimsy_slider_template(); ?>
	</div><!-- #magazine-slider -->

		<main id="main" class="site-main" role="main">

            
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'post' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>

</div><!-- #content -->
<?php get_footer(); ?>
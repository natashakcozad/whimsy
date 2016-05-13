<?php
/*
Template Name: Business Template
*/

get_header(); ?>


<div id="content" class="row"> 
	<div id="business-slider" class="c12 end">
			<?php echo whimsy_slider_template(); ?>
	</div>   
	<div id="business" class="c12 end">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #business -->

<?php hybrid_get_sidebar( 'business' ); // Loads the sidebar/primary.php template. ?>
    
</div><!-- #content  -->
<?php get_footer(); ?>

<?php
/**
 * The Template for displaying all single posts.
 *
 * @package nouveau
 */

get_header(); ?>



<div id="primary" class="content-area">

		 <main id="main" class="site-main single" role="main">


		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<div class="below-post">
			<?php nouveau_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>
			</div>

		<?php endwhile; // end of the loop. ?>


		  <div class="clearfix"></div>

		</main><!-- #main -->




	</div><!-- #primary -->
	<div class="clearfix"></div>


<?php get_footer(); ?>
<?php
/**
 * @package nouveau
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="post-deco">
			<div class="hex hex-small">
				<div class="hex-inner"><i class="fa fa-external-link"></i></div>

				<div class="corner-1"></div>
				<div class="corner-2"></div>
			</div>
		</div><!--/.post-deco-->



	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );?>	
			<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php get_template_part( 'inc/meta' ); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content();?>


	</div><!-- .entry-content -->

	<?php endif; ?>

	<footer class="entry-meta">

	</footer><!-- .entry-meta -->
</article><!-- #post-## -->

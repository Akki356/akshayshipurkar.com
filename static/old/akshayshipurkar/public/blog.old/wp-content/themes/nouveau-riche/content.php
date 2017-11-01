<?php
/**Template for standard posts
 * @package nouveau
 */
global $post;
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );?>

		<?php if ( 'post' == get_post_type() ) : ?>

		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">


	   <a href="<?php the_permalink(); ?>" class="th" title="<?php the_title_attribute(); ?>" >
		<?php the_post_thumbnail('thumb-large'); ?>
		</a>


		<?php the_content( __( '<div class="read-more"> <span class="btn readbtn"><i class="fa fa-plus-circle inbtn"></i>  Read More </span></div>', 'nouveau' ) ); ?>

	</div><!-- .entry-content -->

	<?php endif; ?>

	<footer class="entry-meta">
		<div class="entry-meta">
			<?php get_template_part( 'inc/meta' ); ?>
		</div><!-- .entry-meta -->
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->

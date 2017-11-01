<?php
/**
 * @package nouveau
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="post-deco">
			<div class="hex hex-small">
				<div class="hex-inner"><i class="fa fa-quote-right"></i></div>

				<div class="corner-1"></div>
				<div class="corner-2"></div>
			</div>
		</div><!--/.post-deco-->



	<header class="entry-header">

	<h1 class="quote-post"><?php the_content(); ?></h1>

	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
<h2 class="quote-author"><a href="<?php the_permalink(); ?>" rel="bookmark"> - <?php the_title(); ?></a></h2>


	</div><!-- .entry-content -->

	<?php endif; ?>

	<footer class="entry-meta">

	</footer><!-- .entry-meta -->
</article><!-- #post-## -->

<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package nouveau
 */
?>

	</div><!-- #content -->
<a href="#"  class="scrollup" title="Back to top"><i class="fa fa-chevron-up"></i></a>

	<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="center footr">
	<?php dynamic_sidebar( 'footer-1' ); ?>

	<div class="clearfix"></div>
	</div>

		<div class="site-info">
			<div class="center">
			<div class="footer-copyright">
			<a href="http://wordpress.org/" rel="generator"><?php printf( __( 'Proudly powered by %s', 'nouveau' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
				<a href="<?php echo esc_url( __( 'http://fortisthemes.com/', 'nouveau' ) ); ?>"><?php printf( __( 'Made In Africa', 'nouveau' ), 'WordPress' ); ?></a>

			</div>
			<div class="footer-sub pull-right"><?php dynamic_sidebar( 'footer-2' ); ?> </div>
			<div class="clearfix"></div>
			</div>
		</div><!-- .site-info -->


	</footer><!-- #colophon -->
</div><!-- #page -->
<div id="modal">
    <?php get_sidebar(); ?>
</div>

<?php wp_footer(); ?>

</body>
</html>
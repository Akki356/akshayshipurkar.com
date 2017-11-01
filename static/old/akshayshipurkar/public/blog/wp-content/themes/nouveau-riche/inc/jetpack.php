<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package nouveau
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function nouveau_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'nouveau_jetpack_setup' );

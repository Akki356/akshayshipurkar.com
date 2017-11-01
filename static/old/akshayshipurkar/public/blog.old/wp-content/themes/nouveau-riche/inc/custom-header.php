<?php
/**
 * implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 *
 * @package nouveau
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * @uses nouveau_header_style()
 * @uses nouveau_admin_header_style()
 * @uses nouveau_admin_header_image()
 */
function nouveau_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'nouveau_custom_header_args', array(
		'default-image'          => get_template_directory_uri() . '/assets/img/header.jpg',
		'default-text-color'     => 'ffffff',
		'width'                  => 1260,
		'height'                 => 490,
		'flex-width'            => true,
		'flex-height'            => true,
		'wp-head-callback'       => 'nouveau_header_style',
		'admin-head-callback'    => 'nouveau_admin_header_style',
		'admin-preview-callback' => 'nouveau_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'nouveau_custom_header_setup' );

if ( ! function_exists( 'nouveau_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see nouveau_custom_header_setup().
 */
function nouveau_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.site-title,
		.description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		.site-title a,
		.site-branding span,
		h1.site-title a,
		.description h3,
		nav.menu ul li a {
			color: #<?php echo $header_text_color; ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // nouveau_header_style

if ( ! function_exists( 'nouveau_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see nouveau_custom_header_setup().
 */
function nouveau_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			border: none;
		}
		#headimg {
		    position: relative;
		}
		#headimg h1,
		#desc {
		    position: absolute;
            top: 122px;
            left: 70px;
		}
		#headimg h1 {
		}
		#headimg h1 a {
		}
		#desc {
		}
		#headimg img {
		}
	</style>
<?php
}
endif; // nouveau_admin_header_style

if ( ! function_exists( 'nouveau_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see nouveau_custom_header_setup().
 */
function nouveau_admin_header_image() {
	$style = sprintf( ' style="color:#%s;"', get_header_textcolor() );
?>
	<div id="headimg">
		<h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif; // nouveau_admin_header_image
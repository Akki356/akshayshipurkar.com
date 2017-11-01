<?php
/**
 * debut functions and definitions
 *
 * @package nouveau
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 820; /* pixels */
}

if ( ! function_exists( 'nouveau_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function nouveau_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on debut, use a find and replace
	 * to change 'nouveau' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'nouveau', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	add_editor_style();

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

		add_theme_support( 'post-thumbnails' );

		// Thumbnail sizes

		add_image_size( 'thumb-large', 700, 450 );


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'nouveau' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'status', 'gallery', 'image', 'audio', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'nouveau_custom_background_args', array(
		'default-color' => 'fff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
}
endif; // nouveau_setup
add_action( 'after_setup_theme', 'nouveau_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function nouveau_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'nouveau' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3> <hr>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Main', 'nouveau' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="col-3 widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer sub', 'nouveau' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'nouveau_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function nouveau_scripts() {
	wp_enqueue_style( 'nouveau-style', get_stylesheet_uri() );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css');

	wp_enqueue_script( 'nouveau-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	// GOOGLE FONTS
	$protocol = is_ssl() ? 'https' : 'http';

	// Lato
	wp_enqueue_style( 'Roboto', $protocol.'://fonts.googleapis.com/css?family=Lato:400,700,900' );


	//Open Sans
	wp_enqueue_style( 'Open_Sans', $protocol.'://fonts.googleapis.com/css?family=Open+Sans:400,700,600' );


	wp_enqueue_script( 'fitvid', get_template_directory_uri() . '/js/fitvid.js', array(), '20120203', true );

	wp_enqueue_script( 'pageslide', get_template_directory_uri() . '/js/pageslide.js', array(), '20120207', true );

	wp_enqueue_script( 'custom-scripts', get_template_directory_uri() . '/js/custom.js', array(), '20120208', true );

	wp_enqueue_script( 'custom-backstretch', get_template_directory_uri() . '/js/backstretch.js', array( 'jquery' ), '20120204' );

	wp_localize_script( 'custom-scripts', 'BackStretchImg', array( 'src' => get_header_image() ) );

	wp_enqueue_script( 'nouveau-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nouveau_scripts' );

/**
 * Custom Header
 */
require( get_template_directory() . '/inc/custom-header.php' );
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Customizer CSS File.
 */
require get_template_directory() . '/inc/style.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';




//enable oembed in excerpt

add_filter('the_excerpt', array($GLOBALS['wp_embed'], 'autoembed'), 9);



// Remove more link scroll when clicked
function nouveau_remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'nouveau_remove_more_link_scroll' );
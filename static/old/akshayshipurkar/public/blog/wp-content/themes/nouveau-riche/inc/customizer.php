<?php
/**
 * debut Theme Customizer
 *
 * @package nouveau
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */


function nouveau_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	//CUSTOM LOGO

	$wp_customize->add_section( 'nouveau_logo_section' , array(
    'title'       => __( 'Logo', 'nouveau' ),
    'priority'    => 30,
    'description' => 'Upload a logo to replace the default site name and description in the header',
) );


	$wp_customize->add_setting( 'nouveau_logo',
          array(
        'sanitize_callback' => 'esc_url_raw',
    ) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'nouveau_logo', array(
    'label'    => __( 'Logo', 'nouveau' ),
    'section'  => 'nouveau_logo_section',
    'settings' => 'nouveau_logo',

) ) );


    //Theme Color - Link Hover
    $wp_customize->add_setting( 'nouveau_theme',
        array(
        'default' => '#e8554e',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nouveau_theme', array(
    'label'    => __( 'Theme', 'nouveau' ),
    'section'  => 'colors',
    'settings' => 'nouveau_theme',
) ) );


}
add_action( 'customize_register', 'nouveau_customize_register' );



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function nouveau_customize_preview_js() {
	wp_enqueue_script( 'nouveau_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'nouveau_customize_preview_js' );

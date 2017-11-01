<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package nouveau
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header color-main" role="banner">

                    <div class="header-img">
                    </div>

		<div class="center">
<a href="#modal" class="second">&#9776;</a>


    <div class="site-branding">


      <?php if ( get_theme_mod( 'nouveau_logo' ) ) : ?>
      <div class="avatar">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
      <img src='<?php echo esc_url( get_theme_mod( 'nouveau_logo' ) ); ?>' alt="avatar">
      </a>
      </div>
      <?php else : ?>
        <div class="spacer"></div>
    <?php endif; ?>



      <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>


    </div>

    <div class="description"><h3> <?php bloginfo( 'description' ); ?></h3> </div>

		<nav id="site-navigation" class="main-navigation menu" role="navigation">

			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'nouveau' ); ?></a>


                                                    <?php wp_nav_menu(array(
                                                      'theme_location' => 'primary',
                                                      'items_wrap' => '<ul class="sf-menu"><li class="toggle"><a href="#">'.__('Menu' , 'dsf').'</a></li>%3$s</ul>',
                                                      'container' => false
                                                    )); ?>

		</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->

<div class="clearfix"></div>
	<div id="content" class="site-content center">

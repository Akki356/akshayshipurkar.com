<?php


function nouveau_customize_css()
{
	$theme_color = get_theme_mod( 'nouveau_theme' );


   ?>
<style>

a:hover, a:focus, a:active ,.hentry h1 a:hover , #sidebar .widget_calendar a {
	color: <?php echo $theme_color; ?> ;
}

.scrollup {
	background-color: <?php echo $theme_color; ?> ;
}
a.second {
	background-color: <?php echo $theme_color; ?> ;
}
nav.menu ul ul li a:hover {
    color: <?php echo $theme_color; ?> ;
}

nav.menu > ul > li >  ul {
	border-top-color: <?php echo $theme_color; ?> ;
}
nav.menu > ul > li >  ul:before {

	border-bottom-color: <?php echo $theme_color; ?> ;
}

.readbtn {
	background-color: <?php echo $theme_color; ?> ;
}

/* HEADER & SIDEBAR */

.color-main {
	background: <?php echo $theme_color; ?> ;
}



</style>
<?php }
add_action( 'wp_head', 'nouveau_customize_css');
?>
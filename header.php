<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php bloginfo( 'name' ); ?><?php wp_title(); ?></title>
<link href="<?php bloginfo( 'stylesheet_url' ); ?>" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="/favicon.ico">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">
<script src="<?php bloginfo( 'template_directory' ); ?>/js/modernizr-2.5.3-min.js"></script>
<?php wp_meta(); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header id="head">
		<div class="inner">
			<h1><a href="<?php echo home_url(); ?>" rel="home"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo( 'name' ); ?>" /></a></h1>
			<?php wp_nav_menu( array( 'container' => 'nav', 'theme_location' => 'primary', 'menu_class' => 'clear' ) ); ?>
		</div>
	</header>
	<div id="content" class="document inner clear">
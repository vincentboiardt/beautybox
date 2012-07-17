<?php

function bb_init() {
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'feed_links', 2 );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'index_rel_link' );
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	remove_action( 'wp_head', 'wp_generator' );
	
	add_theme_support( 'custom-header', array(
		'width'			=> 480,
		'height'		=> 131,
		'default-image'	=> get_template_directory_uri() . '/img/logo.png',
		'uploads'		=> true,
		'flex-height'	=> true,
		'header-text'	=> false
	) );
	
	register_nav_menu( 'primary', 'Primary Menu' );
	
	register_sidebar( array(
		'name' => __( 'Sidebar' ),
		'id' => 'sidebar',
		'before_widget' => '<article id="%1$s" class="module %2$s">',
		'after_widget'  => '</article>',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
	) );
	register_sidebar( array(
		'name' => __( 'Footer' ),
		'id' => 'footer_sidebar',
		'before_widget' => '<div class="module %2$s">',
		'after_widget'  => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
	) );
}
add_action( 'init', 'bb_init' );

/* Shortcode */

function bb_shortcode_map( $attr, $content ) {
	return '<iframe class="map" width="575" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=sv&amp;iwloc=near&amp;q=' . urlencode( esc_attr( $content ) ) . '&amp;output=embed"></iframe>';
}
add_shortcode( 'map', 'bb_shortcode_map' );

/* Admin */

function bb_admin_init() {
	register_setting( 'general', 'bb_top_notice', 'esc_attr' );
	register_setting( 'general', 'bb_footer', 'esc_attr' );
	add_settings_field( 'bb_top_notice', __( 'Top Text', 'bb' ), 'bb_top_notice_field', 'general' );
	add_settings_field( 'bb_footer', __( 'Footer Text', 'bb' ), 'bb_footer_field', 'general' );
}
add_action( 'admin_init', 'bb_admin_init' );

function bb_admin_menu() {
	remove_menu_page( 'edit.php' );
	remove_menu_page( 'link-manager.php' );
	remove_menu_page( 'edit-comments.php' );
	remove_menu_page( 'tools.php' );
}
add_action( 'admin_menu', 'bb_admin_menu' );

function bb_top_notice_field() {
	echo '<input name="bb_top_notice" type="text" value="' . esc_attr( get_option('bb_top_notice') ) . '" class="regular-text">';
	echo '<p class="description">' . __( 'Text to be displayed in the top, for example: the phone number, or special offer', 'bb' ) . '</p>';
}

function bb_footer_field() {
	echo '<input name="bb_footer" type="text" value="' . esc_attr( get_option('bb_footer') ) . '" class="regular-text">';
	echo '<p class="description">' . __( 'Text to be displayed in the footer, for example: the address', 'bb' ) . '</p>';
}

function bb_tiny_mce_before_init($arr){
	$arr['theme_advanced_blockformats'] = 'h2,p,blockquote';
	$arr['theme_advanced_styles'] = 'Leading=leading';
	
	return $arr;
}
add_filter( 'tiny_mce_before_init', 'bb_tiny_mce_before_init' );

function bb_mce_buttons($arr){
	return array('bold', 'italic', '|', 'link', 'unlink' , '|', 'bullist', 'numlist', '|', 'formatselect', 'styleselect');
}
add_filter( 'mce_buttons', 'bb_mce_buttons' );
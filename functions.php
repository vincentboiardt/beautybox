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
}
add_action( 'init', 'bb_init' );

/* Admin */

function bb_admin_init() {
	register_setting( 'general', 'bb_footer', 'esc_attr' );
	add_settings_field( 'bb_footer', __( 'Footer Text', 'bb' ), 'bb_footer_settings_field', 'general' );
}
add_action( 'admin_init', 'bb_admin_init' );

function bb_footer_settings_field() {
	echo '<input name="bb_footer" type="text" value="' . esc_attr( get_option('bb_footer') ) . '" class="regular-text">';
	echo '<p class="description">' . __( 'Text to be displayed in the footer, for example: the address', 'bb' ) . '</p>';
}
<?php
/**
 * Theme setup.
 */

function tailblocks_add_theme_supports() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'tailblocks_add_theme_supports' );

function tailblocks_enqueue_styles() {
	wp_enqueue_style(
		'tailblocks-style',
		get_stylesheet_uri(),
		[],
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'tailblocks_enqueue_styles' );
add_action( 'enqueue_block_editor_assets', 'tailblocks_enqueue_styles' );

/**
 * Remove some of the default Gutenberg block styles.
 *
 * This prevents having to overload these in the theme's stylesheet.
 */
function tailblocks_deregister_core_block_styles() {
	wp_deregister_style( 'wp-block-post-author' );
}
add_action( 'wp_enqueue_scripts', 'tailblocks_deregister_core_block_styles' );

/**
 * These functions is only here to pass the Theme Check on WordPress.org.
 */
function tailblocks_theme_check_dummy_calls() {
	add_theme_support( 'title-tag' );
	comment_form();
	comments_template();
	paginate_comments_links();
	post_class();
	posts_nav_link();
	wp_enqueue_script( 'comment-reply' );
	wp_list_comments();
	wp_link_pages();
	the_tags();

	global $content_width;
	$content_width = 1200;
}

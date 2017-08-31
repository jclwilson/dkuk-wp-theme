<?php
// Opening tag mandatory, no short tags allowed.

// functions.php
// Fully documented by @jclwilson

function dkuk_setup() {

	// Adds custom logo to Theme
	// from the WordPress Developer Reference
	// https://developer.wordpress.org/reference/functions/add_theme_support/#custom-logo

	add_theme_support( 'custom-logo', array(
		'height'      => 100, // adjust this
		'width'       => 400, // adjust this
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ), // check whether these are variables or set strings
	) );

	// Ends custom logo

	// Adds RSS links to HEAD
	// from the WordPress Developer Reference
	// https://developer.wordpress.org/reference/functions/add_theme_support/#feed-links

	add_theme_support( 'automatic-feed-links' );

	// Ends RSS

	// Adds Post Thumbnails
	// from the WordPress Developer Reference
	// https://developer.wordpress.org/reference/functions/add_theme_support/#post-thumbnails

	add_theme_support( 'post-thumbnails' );

	// Ends Post Thumbnails

	// Adds HTML5 Tags
	// from the WordPress Developer Reference
	// https://developer.wordpress.org/reference/functions/add_theme_support/#html5

	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

	// Ends HTML5

	// Register Custom Menus
	// DKUK needs the main menu and the social media menu
	// from the WordPress Developer Reference
	// https://developer.wordpress.org/themes/functionality/navigation-menus/

	register_nav_menus(
		array(
			'main-menu' => __( 'Main menu' ),
			'social-menu' => __( 'Social Media Menu' )
		)
	);

	// Ends Register Custom Menus
}
add_action( 'after_setup_theme', 'dkuk_setup' );

// Disable All Comments
// from Github user @mattclements
// https://gist.githubusercontent.com/mattclements/eab5ef656b2f946c4bfb/raw/0905348f177677a6c1f611a6766dc13a42b09135/function.php

// Disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support() {
	$post_types = get_post_types();
	foreach ($post_types as $post_type) {
		if(post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
}
add_action('admin_init', 'df_disable_comments_post_types_support');

// Close comments on the front-end
function df_disable_comments_status() {
	return false;
}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);

// Hide existing comments
function df_disable_comments_hide_existing_comments($comments) {
	$comments = array();
	return $comments;
}
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
function df_disable_comments_admin_menu() {
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'df_disable_comments_admin_menu');

// Redirect any user trying to access comments page
function df_disable_comments_admin_menu_redirect() {
	global $pagenow;
	if ($pagenow === 'edit-comments.php') {
		wp_redirect(admin_url()); exit;
	}
}
add_action('admin_init', 'df_disable_comments_admin_menu_redirect');

// Remove comments metabox from dashboard
function df_disable_comments_dashboard() {
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'df_disable_comments_dashboard');

// Remove comments links from admin bar
function df_disable_comments_admin_bar() {
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
}
add_action('init', 'df_disable_comments_admin_bar');

// Ends Disable All Comments

// Closing tag not necessary, but here
 ?>

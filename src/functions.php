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

	// Adds title support
	// This is the modern way
	// from the WordPress blog
	// https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	function dkuk_title_tag() {
		add_theme_support( 'title-tag' );
	}
	add_action( 'after_setup_theme', 'dkuk_title_tag' );
}
add_action( 'after_setup_theme', 'dkuk_setup' );

// Adds classnames to next_posts_link and previous_posts_link
// from CSS Tricks
//

add_filter('next_posts_link_attributes', 'posts_link_attributes_1');
add_filter('previous_posts_link_attributes', 'posts_link_attributes_2');

function posts_link_attributes_1() {
    return 'class="prev-post__link"';
}
function posts_link_attributes_2() {
    return 'class="next-post__link"';
}

// Adds Custom Post Types
// Made by @jclwilson
// https://generatewp.com/post-type/

function dkuk_custom_posts() {

	$exhibition_labels = array(
		'name'                  => _x( 'Exhibitions', 'Post Type General Name', 'dkuk' ),
		'singular_name'         => _x( 'Exhibition', 'Post Type Singular Name', 'dkuk' ),
		'menu_name'             => __( 'Exhibitions', 'dkuk' ),
		'name_admin_bar'        => __( 'Exhibition', 'dkuk' ),
		'archives'              => __( 'Exhibition Archives', 'dkuk' ),
		'attributes'            => __( 'Exhibition Attributes', 'dkuk' ),
		'parent_item_colon'     => __( 'Parent Exhibition:', 'dkuk' ),
		'all_items'             => __( 'All Exhibitions', 'dkuk' ),
		'add_new_item'          => __( 'Add New Exhibition', 'dkuk' ),
		'add_new'               => __( 'Add New', 'dkuk' ),
		'new_item'              => __( 'New Exhibition', 'dkuk' ),
		'edit_item'             => __( 'Edit Exhibition', 'dkuk' ),
		'update_item'           => __( 'Update Exhibition', 'dkuk' ),
		'view_item'             => __( 'View Exhibition', 'dkuk' ),
		'view_items'            => __( 'View Exhibitions', 'dkuk' ),
		'search_items'          => __( 'Search Exhibition', 'dkuk' ),
		'not_found'             => __( 'Not found', 'dkuk' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'dkuk' ),
		'featured_image'        => __( 'Featured Image', 'dkuk' ),
		'set_featured_image'    => __( 'Set featured image', 'dkuk' ),
		'remove_featured_image' => __( 'Remove featured image', 'dkuk' ),
		'use_featured_image'    => __( 'Use as featured image', 'dkuk' ),
		'insert_into_item'      => __( 'Insert into exhibtion', 'dkuk' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Exhibition', 'dkuk' ),
		'items_list'            => __( 'Exhibitions list', 'dkuk' ),
		'items_list_navigation' => __( 'Exhibitons list navigation', 'dkuk' ),
		'filter_items_list'     => __( 'Filter exhibitions list', 'dkuk' ),
	);
	$exhibition_args = array(
		'label'                 => __( 'Exhibition', 'dkuk' ),
		'description'           => __( 'Used for exhibitions put on by DKUK', 'dkuk' ),
		'labels'                => $exhibition_labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-format-image',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'Exhibition', $exhibition_args );

	$podcast_labels = array(
		'name'                  => _x( 'Podcasts', 'Post Type General Name', 'dkuk' ),
		'singular_name'         => _x( 'Podcast', 'Post Type Singular Name', 'dkuk' ),
		'menu_name'             => __( 'Podcasts', 'dkuk' ),
		'name_admin_bar'        => __( 'Podcast', 'dkuk' ),
		'archives'              => __( 'Podcast Archive', 'dkuk' ),
		'attributes'            => __( 'Podcast Attributes', 'dkuk' ),
		'parent_item_colon'     => __( 'Parent Podcast:', 'dkuk' ),
		'all_items'             => __( 'All Podcasts', 'dkuk' ),
		'add_new_item'          => __( 'Add New Podcast', 'dkuk' ),
		'add_new'               => __( 'Add New', 'dkuk' ),
		'new_item'              => __( 'New Podcast', 'dkuk' ),
		'edit_item'             => __( 'Edit Podcast', 'dkuk' ),
		'update_item'           => __( 'Update Podcast', 'dkuk' ),
		'view_item'             => __( 'View Podcast', 'dkuk' ),
		'view_items'            => __( 'View Podcasts', 'dkuk' ),
		'search_items'          => __( 'Search Podcasts', 'dkuk' ),
		'not_found'             => __( 'Not found', 'dkuk' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'dkuk' ),
		'featured_image'        => __( 'Featured Image', 'dkuk' ),
		'set_featured_image'    => __( 'Set featured image', 'dkuk' ),
		'remove_featured_image' => __( 'Remove featured image', 'dkuk' ),
		'use_featured_image'    => __( 'Use as featured image', 'dkuk' ),
		'insert_into_item'      => __( 'Insert into podcast', 'dkuk' ),
		'uploaded_to_this_item' => __( 'Uploaded to this podcast', 'dkuk' ),
		'items_list'            => __( 'Podcasts list', 'dkuk' ),
		'items_list_navigation' => __( 'Podcasts list navigation', 'dkuk' ),
		'filter_items_list'     => __( 'Filter podcasts list', 'dkuk' ),
	);
	$podcast_args = array(
		'label'                 => __( 'Podcast', 'dkuk' ),
		'description'           => __( 'Used for podcasts made by DKUK', 'dkuk' ),
		'labels'                => $podcast_labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 6,
		'menu_icon'             => 'dashicons-microphone',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'Podcast', $podcast_args );

}
add_action( 'init', 'dkuk_custom_posts', 0 );

// Add widget areas to site
// Written by @jclwilson from the WordPress Codex.

function dkuk_register_widget() {

	// Header Widget is designed to be displayed underneath the navigation menu, and is primarily for displaying & editing the salon address. However it could be used for all sorts.
    register_sidebar( array(
        'name'          => 'Header Widget Area',
        'id'            => 'header-widget',
        'before_widget' => '<section class="header__widget align row center-xs">',
        'after_widget'  => '</section>',
        'before_title'  => '<h1>',
        'after_title'   => '</h1>',
    ) );

	// Footer widget is designed for anything that needs to go into the footer; random links, copyright notice etc.
	register_sidebar( array(
        'name'          => 'Footer Widget Area',
        'id'            => 'footer-widget',
        'before_widget' => '<section class="footer__widget align row center-xs">',
        'after_widget'  => '</section>',
        'before_title'  => '<h1>',
        'after_title'   => '</h1>',
    ) );

}
add_action( 'widgets_init', 'dkuk_register_widget' );

// Adds custom widget to admin dashboard
// This widget displays contact info for myself.

function dkuk_custom_dashboard_widgets() {
	global $wp_meta_boxes;

	function custom_dashboard_help() {
		echo '<p>The DKUK WordPress theme was rebuilt by Jacob Charles Wilson (@jclwilson).</p><p>The code for this Theme is all stored on Github at <a href="https://github.com/jclwilson/dkuk-wp-theme/">jclwilson/dkuk-wp-theme</a>.</p><p>Still need help? Contact him at <a href="mailto:hello@jacobcharleswilson.com">hello@jacobcharleswilson.com</a>.</p>';
	}
	wp_add_dashboard_widget('custom_help_widget', 'About this website', 'custom_dashboard_help');
}
add_action('wp_dashboard_setup', 'dkuk_custom_dashboard_widgets');

// End Custom Admin Dashboard Widget

// Adds Custom Login Page
// by @jclwilson from CSS Tricks
// https://css-tricks.com/snippets/wordpress/customize-login-page/

// Custom link
function dkuk_url_login(){
	return get_bloginfo( 'url' ); // your URL here
}
add_filter('login_headerurl', 'dkuk_url_login');

// Changes the login page logo
function dkuk_custom_login_logo() {
	echo '<style type="text/css">h1 a { background: url('.get_bloginfo('template_directory').'/assets/img/logo.svg) 50% 50% no-repeat !important; width:100% !important; background-size: contain !important;}</style>';
}
add_action('login_head', 'dkuk_custom_login_logo');

// Custom Logo title
function dkuk_logo_url_title() {
    return get_bloginfo( 'title' );;
}
add_filter( 'login_headertitle', 'dkuk_logo_url_title' );

// Custom WordPress Footer
function remove_footer_admin () {

}
add_filter('admin_footer_text', 'remove_footer_admin');

// Remove visual error shake
function my_login_head() {
remove_action('login_head', 'wp_shake_js', 12);
}
add_action('login_head', 'my_login_head');

// Ends Custom Login Page

// Hide Dashboard Widgets
// by @jclwilson

function remove_dashboard_meta() {
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        // remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
}
add_action( 'admin_init', 'remove_dashboard_meta' );

// Ends Hide Dashboard Widgets

// Hide Post Widgets

// Hide Editing Screen Widgets
// By @jclwilson

function dkuk_remove_post_widgets() {
	remove_meta_box( 'authordiv' , 'page' , 'normal' );
	remove_meta_box( 'commentstatusdiv' , 'page' , 'normal' );
	remove_meta_box( 'commentsdiv' , 'page' , 'normal' );
	remove_meta_box( 'formatdiv' , 'page' , 'normal' );
	remove_meta_box( 'pageparentdiv' , 'page' , 'normal' );
	remove_meta_box( 'postcustom' , 'page' , 'normal' );
	remove_meta_box( 'revisionsdiv' , 'page' , 'normal' );
	remove_meta_box( 'trackbacksdiv' , 'page' , 'normal' );

	// posts
	remove_meta_box( 'authordiv' , 'post' , 'normal' );
	remove_meta_box( 'categorydiv' , 'post' , 'normal' );
	remove_meta_box( 'commentstatusdiv' , 'post' , 'normal' );
	remove_meta_box( 'commentsdiv' , 'post' , 'normal' );
	remove_meta_box( 'formatdiv' , 'post' , 'normal' );
	remove_meta_box( 'pageparentdiv' , 'post' , 'normal' );
	remove_meta_box( 'postcustom' , 'post' , 'normal' );
	remove_meta_box( 'revisionsdiv' , 'post' , 'normal' );
	remove_meta_box( 'tagsdiv-post_tag' , 'post' , 'normal' );
	remove_meta_box( 'trackbacksdiv' , 'post' , 'normal' );
}
add_action( 'admin_menu' , 'dkuk_remove_post_widgets' );

// Ends Hide Editing Screen Widgets

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

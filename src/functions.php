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

// Remove taxonomies and cateogires

add_action('init', 'myprefix_remove_tax');
function myprefix_remove_tax() {
    register_taxonomy('category', array());
    register_taxonomy('post_tag', array());
}

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

// Disables Emoji
// From Kinsta.com
// https://kinsta.com/knowledgebase/disable-emojis-wordpress/#disable-emojis-code

function disable_emojis() {
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

/**
* Filter function used to remove the tinymce emoji plugin.
*
* @param array $plugins
* @return array Difference betwen the two arrays
*/
function disable_emojis_tinymce( $plugins ) {
if ( is_array( $plugins ) ) {
return array_diff( $plugins, array( 'wpemoji' ) );
} else {
return array();
}
}

/**
* Remove emoji CDN hostname from DNS prefetching hints.
*
* @param array $urls URLs to print for resource hints.
* @param string $relation_type The relation type the URLs are printed for.
* @return array Difference betwen the two arrays.
*/
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
if ( 'dns-prefetch' == $relation_type ) {
/** This filter is documented in wp-includes/formatting.php */
$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

$urls = array_diff( $urls, array( $emoji_svg_url ) );
}

return $urls;
}

// Closing tag not necessary, but here
 ?>

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

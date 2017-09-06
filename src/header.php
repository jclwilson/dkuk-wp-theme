<!DOCTYPE html>
<!-- Set lang attribute according to blog default -->
<html <?php language_attributes(); ?>>
<head>
	<!-- Sets Charset according to blog default -->
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- Sets title according to page type
		Written by @jclwilson -->
	<title>
            <?php if (function_exists('is_tag') && is_tag()) {
                echo 'Tag Archive for &quot;'.$tag.'&quot; - ';
            } elseif (is_archive()) {
                wp_title(''); echo ' Archive - ';
            } elseif (is_search()) {
                echo 'Search for &quot;'.wp_specialchars($s).'&quot; - ';
            } elseif (!(is_404()) && (is_single()) || (is_page())) {
                wp_title(''); echo ' - ';
            } elseif (is_404()) {
                echo 'Not Found - ';
            } bloginfo('name'); ?>
		</title>
		<base href="<?php bloginfo('url'); ?>">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<!-- Set Google Site Verification code for Search Console -->
		<meta name="google-site-verification" content="">
		<link href="http://gmpg.org/xfn/11" rel="profile" />
		<link href="<?php bloginfo( 'pingback_url' ); ?>" rel="pingback" />
		<!-- CSS -->
		<style>
			/* Inline CSS */
			html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{border:0;font-size:100%;font:inherit;vertical-align:baseline;margin:0;padding:0}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:none}table{border-collapse:collapse;border-spacing:0}
		</style>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>"/>
		<!-- End of CSS -->
		<!-- Local script assets -->
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/main.min.js"></script>
		<!-- wp_head
		This is necessary for plugins that need to put scripts in the head.
		It goes here to avoid us overwriting any of the scripts -->
		<?php wp_head(); ?>
		<!-- End of wp_head -->
</head>
<body class="container-fluid stripes">
	<header class="header align">
			<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<h1 class="header__title row center-xs">
					<a class="header__Link col-xs" href="<?php bloginfo('url'); ?>" rel="home" title="<?php bloginfo( 'name' ); ?>">
						<img class="header__logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.svg" alt="<?php bloginfo( 'name' ); ?>" />
					</a>
				</h1>
			<?php endif; ?>
		<nav class="header__nav row center-xs">
			<?php
				wp_nav_menu(
					array(
					'theme_location' => 'main-menu'
					)
				);
			?>
		</nav>
		<?php if ( is_active_sidebar( 'header-widget' ) ) : ?>
			<?php dynamic_sidebar( 'header-widget' ); ?>
		<?php endif; ?>
	</header>

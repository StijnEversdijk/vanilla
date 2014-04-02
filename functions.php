<?php
// Admin Bar
show_admin_bar('true');

// ----------------------------
// Navigation Functions
// ----------------------------

// Register Menus
register_nav_menus( array(
    'header' => __( 'Header Navigation', 'vanilla' ),
    'footer' => __( 'Footer Navigation', 'vanilla' )
) );

// Remove nav classes, except for 'usefull classes'
function custom_wp_nav_menu($var) {
	return is_array($var) ? array_intersect($var, array(
		// Useful classes
		'current_page_item',
		'current_page_parent',
		'current_page_ancestor'
		)
	) : '';}
add_filter('nav_menu_css_class', 'custom_wp_nav_menu');
add_filter('nav_menu_item_id', 'custom_wp_nav_menu');
add_filter('page_css_class', 'custom_wp_nav_menu');

// ----------------------------
// Theme Branding Functions
// ----------------------------

// Custom CSS for the login page
function loginCSS() {
	echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_directory').'/wp-login.css"/>';
}
add_action('login_head', 'loginCSS');

// ----------------------------
// Content Functions
// ----------------------------

// Featured Images
add_theme_support( 'post-thumbnails' );

// Post Formats
add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );
?>
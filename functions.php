<?php
// ***********************************
//  Styles & Scripts
// ***********************************
function theme_files() {
	// main styles
	wp_enqueue_style('main-styles', get_theme_file_uri('/dist/styles.css'));

	// main scripts
	wp_enqueue_script('main-scripts', get_theme_file_uri('/dist/scripts.js'), NULL, '1.0', true);
}
add_action('wp_enqueue_scripts', 'theme_files');




// ***********************************
//  Scripts with type="module" attribute
// ***********************************
/*
function enqueue_module_script() {
	wp_enqueue_script('main-scripts', get_template_directory_uri() . '/dist/scripts.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_module_script');

function set_module_script_type($tag, $handle) {
	if ('main-scripts' === $handle) {
		$tag = str_replace('type=\'text/javascript\'', 'type=\'module\'', $tag);
	}
	return $tag;
}
add_filter('script_loader_tag', 'set_module_script_type', 10, 2);
*/




// *****************************************************************
//
//  Register your navigation menus
//
//  Enables 'Menus' within the WordPress Admin Dashboard's 'Appearance' menu
//
//  Required for the 'wp_nav_menu' function to work
//
//  Used in the 'template-parts/site-navigation.php'
//  and 'template-parts/site-navigation-footer.php' files
//
// *****************************************************************
/*
function register_navigation() {
	register_nav_menus(array(
		'menu-1' => __('Primary Navigation', 'alxwntr')
		// 'menu-2' => __('Footer Navigation', 'alxwntr')
	) );
}
add_action('after_setup_theme', 'register_navigation');
*/




// ***********************************
// 
//  Add custom classes to 'wp_nav_menu' <li> elements
// 
//  Used in the 'template-parts/site-navigation.php'
//  and 'template-parts/site-navigation-footer.php' files
// 
// ***********************************
/*
function add_menu_list_item_class($classes, $item, $args) {
	if (property_exists($args, 'list_item_class')) {
		$classes[] = $args->list_item_class;
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'add_menu_list_item_class', 1, 3);
*/




// ***********************************
// 
//  Add custom classes to 'wp_nav_menu' <a> elements
//
//  Used in the 'template-parts/site-navigation.php'
//  and 'template-parts/site-navigation-footer.php' files
// 
// ***********************************
/*
function add_menu_link_class($atts, $item, $args) {
	if (property_exists($args, 'link_class')) {
		$atts['class'] = $args->link_class;
	}
	return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);
*/




// ***********************************
//  Load inline SVG images
// ***********************************
// credit: https://enshrined.co.uk/2018/09/19/how-to-properly-include-inline-svgs-in-a-wordpress-theme/
/*
function load_inline_svg($filename) {
	// Add the path to your SVG directory inside your theme.
	$svg_path = '/assets/';

	// Check the SVG file exists
	if (file_exists(get_stylesheet_directory() . $svg_path . $filename)) {
		// Load and return the contents of the file
		echo file_get_contents(get_stylesheet_directory_uri() . $svg_path . $filename);
	}

	// Return a blank string if we can't find the file.
	return '';
}
*/




// ***********************************
//  Remove Bloat
// ***********************************

// Remove various bloat:
// <link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://domain.com/xmlrpc.php?rsd" />
// <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://domain.com/wp-includes/wlwmanifest.xml" />
// <link rel="alternate" type="application/json+oembed" href="http://domain.com/wp-json/oembed/1.0/embed?url=http%3A%2F%2Fdomain.com%2F" />
// <link rel="https://api.w.org/" href="http://domain.com/wp-json/" />
// <link rel="alternate" type="application/json" href="http://domain.com/wp-json/wp/v2/pages/345" />
function remove_bloat() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_oembed_add_discovery_links');

	// Disable the REST API endpoint
	add_filter('rest_authentication_errors', '__return_true');
	// Remove the REST API <link> elements
	remove_action('wp_head', 'rest_output_link_wp_head');
}
add_action('init', 'remove_bloat', 30);

// Remove Gutenberg block editor:
// <link rel='stylesheet' id='classic-theme-styles-css' href='http://domain.com/wp-includes/css/classic-themes.min.css?ver=6.2.2' type='text/css' media='all' />
// <link rel='stylesheet' id='wp-block-library-css' href='http://domain.com/wp-includes/css/dist/block-library/style.min.css?ver=6.2.2' type='text/css' media='all' />
// <style id='global-styles-inline-css' type='text/css'> ... </style>
function remove_gutenberg() {
	wp_dequeue_style('classic-theme-styles');
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('global-styles');
}
add_action('wp_enqueue_scripts', 'remove_gutenberg', 30);

// Remove default icons:
// <link rel="icon" href="http://domain.com/wp-content/uploads/2023/03/cropped-favicon-32x32.png" sizes="32x32" />
// <link rel="icon" href="http://domain.com/wp-content/uploads/2023/03/cropped-favicon-192x192.png" sizes="192x192" />
// <link rel="apple-touch-icon" href="http://domain.com/wp-content/uploads/2023/03/cropped-favicon-180x180.png" />
// <meta name="msapplication-TileImage" content="http://domain.com/wp-content/uploads/2023/03/cropped-favicon-270x270.png" />
function default_favicons() {
	add_filter('get_site_icon_url', '__return_false');
}
add_action('init', 'default_favicons', 30);

// Remove emojis:
function disable_emojis() {
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('wp_print_styles', 'print_emoji_styles');
	// remove_action('admin_print_scripts', 'print_emoji_detection_script');
	// remove_action('admin_print_styles', 'print_emoji_styles');	
	// remove_filter('the_content_feed', 'wp_staticize_emoji');
	// remove_filter('comment_text_rss', 'wp_staticize_emoji');	
	// remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'disable_emojis', 30);

// Remove svg elements after opening <body> tag:
function remove_svg() {
	remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
	remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');
}
add_action('init', 'remove_svg', 30)
?>
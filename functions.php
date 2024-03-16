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
//  Enable Featured Images (Post Thumbnails)
// ***********************************
add_theme_support('post-thumbnails', array(
	'post',
	'page'
));




// ***********************************
//  Block Editor CSS
// ***********************************
function enqueue_block_editor_assets() {
	wp_enqueue_style(
        'block-editor-styles-back-end',
        get_template_directory_uri() . '/dist/block-editor.css',
        array(),  // Dependencies (if any)
        filemtime(get_template_directory() . '/dist/block-editor.css')  // Cache busting with file modification time
    );
}
add_action('enqueue_block_editor_assets', 'enqueue_block_editor_assets');




// ***********************************
//  Custom ACF Blocks
//  Register the blocks
// ***********************************
add_action( 'init', 'register_acf_blocks' );
function register_acf_blocks() {
	register_block_type( __DIR__ . '/blocks/image-slideshow' );
	register_block_type( __DIR__ . '/blocks/sounds' );
}




// ***********************************
//  has_block
//  echo inline styles
// ***********************************
// Check if the post has the relevant block (ACF or core)
// Output the contents of the .css file within a <style> tag in the <head>
function inline_block_styles() {
	$blocks = array(
		'acf/image-slideshow'   => '/blocks/image-slideshow/image-slideshow.css',
		'acf/sounds'            => '/blocks/sounds/sounds.css',
		'core/code'             => '/patterns/code/code.css',
	);

	foreach ($blocks as $block => $css_path) {
		if (has_block($block)) {
			echo "\n<!-- style: $block -->\n<style>" . file_get_contents(get_template_directory() . $css_path) . "</style>\n";
		}
	}
}
add_action('wp_head', 'inline_block_styles');

// ***********************************
//  has_block
//  enqueue scripts
// ***********************************
// Check if the post has the relevant block (ACF or core)
// Reference the script within a <script> tag before the closing </body>
function enqueue_block_scripts() {
    $blocks = array(
        'acf/image-slideshow' => '/blocks/image-slideshow/image-slideshow.min.js',
        'acf/sounds' => '/blocks/sounds/sounds.min.js',
		'core/code' => '/patterns/code/code.min.js',
    );

    foreach ($blocks as $block => $js_path) {
        if (has_block($block)) {
            wp_enqueue_script(
                $block, // Script handle (unique name for the script)
                get_template_directory_uri() . $js_path, // Script URL
                array(), // Dependencies (optional)
                filemtime(get_template_directory() . $js_path), // Version (using file modification time)
                true // Enqueue in the footer
            );
        }
    }
}
add_action('wp_enqueue_scripts', 'enqueue_block_scripts');




// ***********************************
//  404 Page
//  Echo inline styles
// ***********************************
// Check if this the 404 page
// Output the contents of the .css file within a <style> tag in the <head>
function inline_404_styles() {
	if (is_404()) {
		echo "\n<!-- style: acf/image-slideshow -->\n<style>" . file_get_contents(get_template_directory() . '/blocks/image-slideshow/image-slideshow.css') . "</style>\n";
	}
}
add_action('wp_head', 'inline_404_styles');

// ***********************************
//  404 Page
//  Enqueue scripts
// ***********************************
// Check if this the 404 page
// Reference the script within a <script> tag before the closing </body>
function enqueue_404_scripts() {
	if (is_404()) {
		wp_enqueue_script(
			'acf/image-slideshow', // Script handle (unique name for the script)
			get_template_directory_uri() . '/blocks/image-slideshow/image-slideshow.min.js', // Script URL
			array(), // Dependencies (optional)
			filemtime(get_template_directory() . '/blocks/image-slideshow/image-slideshow.min.js'), // Version (using file modification time)
			true // Enqueue in the footer
		);
	}
}
add_action('wp_enqueue_scripts', 'enqueue_404_scripts');




// ***********************************
//  Remove default block styles
//  Do not enqueue WordPress' default (core) gallery block styles
//  This is handy in preventing CSS specificity issues and writing cleaner CSS
// ***********************************
// Function to dequeue the default block styles
function remove_default_block_styles() {
	// wp-block-gallery
    wp_dequeue_style('wp-block-gallery');
    wp_deregister_style('wp-block-gallery');

	// wp-block-file
	wp_dequeue_style('wp-block-file');
	wp_deregister_style('wp-block-file');

	// wp-block-media-text
	wp_dequeue_style('wp-block-media-text');
	wp_deregister_style('wp-block-media-text');

	// wp-block-columns
	// wp_dequeue_style('wp-block-columns');
	// wp_deregister_style('wp-block-columns');
}
add_action('wp_enqueue_scripts', 'remove_default_block_styles', 100);
?>
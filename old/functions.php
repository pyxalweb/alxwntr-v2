<?php
// ***********************************
//  Styles & Scripts
// ***********************************
function theme_files() {
    // dns-prefetch (treated as a style)
    $prefetch_urls = array(
        '//fonts.googleapis.com',
        '//www.googletagmanager.com',
        // Add more URLs as needed
    );
    // Enqueue prefetch links using a loop
    // md5 is used to generate a unique handle for each URL
    foreach ($prefetch_urls as $url) {
        wp_enqueue_style('dns-prefetch-' . md5($url), $url, array(
            'rel' => 'dns-prefetch',
            'id' => '',
            'type' => '',
            'media' => '',
        ));
    }

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
//  .webp Support
//  using ACF and WebP Express
// ***********************************
function getImage($fieldName, $classes) {
    // Reset to null in case it's already been set for a previous image
    $image = null;
    $width = null;
    $height = null;
    $alt = null;
    $sizeFull = null;
    $sizeLarge = null;
    $sizeMedium = null;
    $sizeLargeWidth = null;
    $sizeMediumWidth = null;

    // Regular expression to extract the width from the file name
    $urlWidthRegEx = '/-(\d+)x\d+\.jpg$/';

    // Get the ACF Field Name
    $image = get_field($fieldName);

    // If the image exists, get the image data
    if ($image):
        $width = $image['width']; // Full size width
        $height = $image['height']; // Full size height
        $alt = $image['alt']; // Alt text attribute
        $sizeFull = $image['url']; // Full size url
        $sizeLarge = $image['sizes']['large']; // Large size url (1024)
        $sizeMedium = $image['sizes']['medium']; // Medium size url (400)

        // Extract the width from the file name using regular expressions
        preg_match($urlWidthRegEx, $sizeLarge, $sizeLargeWidthMatches);
        preg_match($urlWidthRegEx, $sizeMedium, $sizeMediumWidthMatches);
        // Extract the width from the matches if found
        if (!empty($sizeLargeWidthMatches[1])) {
            $sizeLargeWidth = (int) $sizeLargeWidthMatches[1];
        }
        if (!empty($sizeMediumWidthMatches[1])) {
            $sizeMediumWidth = (int) $sizeMediumWidthMatches[1];
        }

        // For testing purposes only
        // echo ('<strong>Width:</strong> ' . $width . '<br><br>');
        // echo ('<strong>Height:</strong> ' . $height . '<br><br>');
        // echo ('<strong>Alternate Text:</strong> ' . $alt . '<br><br>');
        // echo ('<strong>Full:</strong> ' . $sizeFull . '<br><br>');
        // echo ('<strong>Large:</strong> ' . $sizeLarge . '<br><br>');
        // echo ('<strong>Medium:</strong> ' . $sizeMedium . '<br><br>');
        // echo ('<strong>Large Width:</strong> ' . $sizeMediumWidth . '<br><br>');
        // echo ('<strong>Medium Width:</strong> ' . $sizeLargeWidth . '<br><br>');
    endif;

    // Determine which image to display based on the image sizes available
    if ($sizeMedium == $sizeFull && $sizeLarge == $sizeFull) {
        // For testing purposes only
        // echo ('Full is available only. <400w');
    ?>
    <picture>
        <source srcset="<?php echo $sizeFull ?>.webp <?php echo $width ?>w" type="image/webp">
        <source srcset="<?php echo $sizeFull ?> <?php echo $width ?>w" type="image/jpeg">
        <img src="<?php echo $sizeFull ?>" loading="lazy" alt="<?php echo $alt ?>" width="<?php echo $width ?>" height="<?php echo $height ?>" class="<?php echo $classes; ?>">
    </picture>
    <?php
    } elseif ($sizeMedium != $sizeFull && $sizeLarge == $sizeFull) {
        // For testing purposes only
        // echo ('Full and Medium are available. >400w and <1024w');
    ?>
    <picture>
        <source srcset="<?php echo $sizeMedium ?>.webp <?php echo $sizeMediumWidth ?>w, <?php echo $sizeFull ?>.webp <?php echo $width ?>w" type="image/webp">
        <source srcset="<?php echo $sizeMedium ?> <?php echo $sizeMediumWidth ?>w, <?php echo $sizeFull ?> <?php echo $width ?>w" type="image/jpeg">
        <img src="<?php echo $sizeMedium ?>" loading="lazy" alt="<?php echo $alt ?>" width="<?php echo $width ?>" height="<?php echo $height ?>" class="<?php echo $classes; ?>">
    </picture>
    <?php
    } elseif ($sizeMedium != $sizeFull && $sizeLarge != $sizeFull) {
        // For testing purposes only
        // echo ('Full, Large, and Medium are available. >1024w');
    ?>
    <picture>
        <source srcset="<?php echo $sizeMedium ?>.webp <?php echo $sizeMediumWidth ?>w, <?php echo $sizeLarge ?>.webp <?php echo $sizeLargeWidth ?>w, <?php echo $sizeFull ?>.webp <?php echo $width ?>w" type="image/webp">
        <source srcset="<?php echo $sizeMedium ?> <?php echo $sizeMediumWidth ?>w, <?php echo $sizeLarge ?> <?php echo $sizeLargeWidth ?>w, <?php echo $sizeFull ?> <?php echo $width ?>w" type="image/jpeg">
        <img src="<?php echo $sizeMedium ?>" loading="lazy" alt="<?php echo $alt ?>" width="<?php echo $width ?>" height="<?php echo $height ?>" class="<?php echo $classes; ?>">
    </picture>
    <?php
    }
}




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

// Remove WP Block Library Inline CSS
// <style id='wp-block-library-inline-css'> ... </style>
function remove_wp_block_library_inline_css() {
    // wp_dequeue_style('classic-theme-styles');
    wp_dequeue_style('wp-block-library');
    // wp_dequeue_style('global-styles');
}
add_action('wp_enqueue_scripts', 'remove_wp_block_library_inline_css', 30);

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
add_action('init', 'remove_svg', 30);




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




// ***********************************
//  Register pattern categories
// ***********************************
add_action( 'init', 'alxwntr_register_pattern_categories' );
function alxwntr_register_pattern_categories() {
    register_block_pattern_category( 'alxwntr/code', array( 
        'label'       => __( '*alxwntr: Code', 'alxwntr' ),
        'description' => __( 'Display code.', 'alxwntr' )
    ) );

    register_block_pattern_category( 'alxwntr/layouts', array( 
        'label'       => __( '*alxwntr: Layouts', 'alxwntr' ),
        'description' => __( 'Add various types of layouts.', 'alxwntr' )
    ) );

    register_block_pattern_category( 'alxwntr/media', array( 
        'label'       => __( '*alxwntr: Media', 'alxwntr' ),
        'description' => __( 'Add various types of media.', 'alxwntr' )
    ) );

    register_block_pattern_category( 'alxwntr/text', array( 
        'label'       => __( '*alxwntr: Text', 'alxwntr' ),
        'description' => __( 'Add various types of text.', 'alxwntr' )
    ) );
}




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
?>
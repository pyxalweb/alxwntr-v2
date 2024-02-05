<!-- icons -->
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/favicon-dark-mode.png" media="(prefers-color-scheme: dark)">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/favicon-light-mode.png" media="(prefers-color-scheme: light)">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/apple-touch-icon.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/site.webmanifest">
    <?php
    if (has_post_thumbnail()) {
        $featured_image_url = get_the_post_thumbnail_url();
    } else {
        $featured_image_url = get_template_directory_uri() . '/assets/logo-schema.png';
    }
    ?>
    <meta property="og:image" content="<?php echo esc_url($featured_image_url); ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="680">

<?php
/*
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package alxwntr
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php wp_title('-', 'echo', 'right'); ?></title>
	<?php wp_head(); ?>

	<!-- icons -->
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/favicon-dark-mode.png" media="(prefers-color-scheme: dark)">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/favicon-light-mode.png" media="(prefers-color-scheme: light)">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/apple-touch-icon.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/site.webmanifest">
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/logo-schema.png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="680">

    <?php get_template_part( 'template-parts/head', 'analytics' ); ?>
</head>

<body <?php body_class('preload'); ?>>
<?php wp_body_open(); ?>

<?php get_template_part( 'template-parts/site', 'skip-nav' ); ?>

<header id="site-header" class="site-header">
	<div class="header__container content width-df">
		<?php get_template_part( 'template-parts/site', 'logo' ); ?>

        <?php get_template_part( 'template-parts/site', 'navigation' ); ?>
	</div>
</header>

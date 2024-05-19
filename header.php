<?php
/*
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package alxwntr
 */
?>
<!doctype html>
<html <?php language_attributes(); ?> class="<?php echo 'loading'; ?>">
<?php /*
<html <?php language_attributes(); ?> class="<?php
if (isset($_COOKIE['theme']) && $_COOKIE['theme'] === 'light') {
	echo 'light-mode';
} elseif (isset($_COOKIE['theme']) && $_COOKIE['theme'] === 'dark') {
	echo 'dark-mode';
} else {
	echo 'dark-mode';
}
?>">
*/ ?>

<head>
	<script>
        // Apply the saved theme as early as possible
        (function() {
            const theme = localStorage.getItem('theme') || 'dark-mode';
            document.documentElement.className = theme;
        })();
    </script>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php wp_title('-', 'echo', 'right'); ?></title>
	<?php wp_head(); ?>

	<?php get_template_part( 'template-parts/head', 'icons' ); ?>
</head>

<body <?php body_class('preload'); ?>>

<?php wp_body_open(); ?>

<?php get_template_part( 'template-parts/site', 'skip-nav' ); ?>

<header id="site-header" class="site-header">
	<div class="header__container content width--x-large">
		<?php get_template_part( 'template-parts/site', 'logo' ); ?>

        <?php get_template_part( 'template-parts/site', 'navigation' ); ?>
	</div>
</header>
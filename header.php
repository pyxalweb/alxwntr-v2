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
</head>

<body <?php body_class('preload'); ?>>
<?php wp_body_open(); ?>

<?php get_template_part( 'template-parts/site', 'skip-nav' ); ?>

<header id="site-header" class="site-header">
	<div class="content width-df | header__container | pbl-c-1-5-3 bb-1-grey-100">
		<?php get_template_part( 'template-parts/site', 'logo' ); ?>

        <?php get_template_part( 'template-parts/site', 'navigation' ); ?>
	</div>
</header>

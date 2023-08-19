<?php
get_header();
?>

<?php
while ( have_posts() ) :
	the_post();
?>

<main id="site-main" <?php post_class($class = 'site-main interior'); ?>>
	<section class="content width-df | text-100 | mbl-3">
        <h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
    </section>
</main>

<?php
endwhile;
?>

<?php
get_footer();

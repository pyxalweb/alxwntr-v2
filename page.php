<?php
get_header();
?>

<?php
while ( have_posts() ) :
	the_post();
?>

<main id="site-content" <?php post_class($class = 'site-content interior'); ?>>
	<section class="content width-df | mbl-7 mbl-3-vw400">
        <h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
    </section>
</main>

<?php
endwhile;
?>

<?php
get_footer();

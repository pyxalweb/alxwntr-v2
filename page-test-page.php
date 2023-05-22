<?php /* Template Name: Test Page */ ?>

<?php
get_header();
?>

<main id="site-content" <?php post_class($class = 'site-content interior'); ?>>
    <section class="content width-df | mbl-7 mbl-3-vw400">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); the_content(); endwhile; endif; ?>
    </section>
</main>

<?php
get_footer();

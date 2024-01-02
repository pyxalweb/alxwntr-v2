<?php
/*
 * Template Name: Page Test
 * Template Post Type: page
 */
?>

<?php
get_header();
?>

<main id="site-main" class="site-main interior">
    <section class="content width-700" style="border:4px solid green;">
        <?php the_content(); ?>
    </section>

    <section class="content width-700" style="border:4px solid red;">
        <?php getImage('test_field', 'test-class'); ?>
    </section>
</main>

<?php
get_footer();
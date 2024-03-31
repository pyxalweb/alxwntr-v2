<?php
/*
Template Name: Portfolio
*/
?>

<?php get_header(); ?>

<main id="site-main" class="site-main">
    <section class="portfolio | content width--x-large" role="region" aria-label="Selected works from Alex Winter's portfolio">
        <header>
            <h1><?php the_title(); ?></h1>
            <p>A few websites I’ve been involved with over the years.</p>
        </header>

        <?php the_content(); ?>
    </section>
</main>

<?php get_footer(); ?>

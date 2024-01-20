<?php
/*
 * Template Name: Default template
 * Template Post Type: page
 */
?>

<?php
get_header();
?>

<main id="site-main" class="site-main interior">
    <article class="article | content width-400 | text-100 text-800--h1 text-600--h2 text-700--h3">
        <header>
            <h1><?php the_title(); ?></h1>
        </header>

        <section class="article__content">
            <?php the_content(); ?>
        </section>
    </article>
</main>

<?php
get_footer();
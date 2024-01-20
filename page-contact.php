<?php
/*
 * Template Name: Contact
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

            <script type="text/javascript" src="https://form.jotform.com/jsform/240190639405050"></script>
        </section>
    </article>
</main>

<?php
get_footer();
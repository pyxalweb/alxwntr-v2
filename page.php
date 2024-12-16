<?php get_header(); ?>

<!-- page.php -->

<main id="site-main" class="site-main">
    <section class="page-default">
        <header class="page-default__header">
            <div class="page-default__text | content width--x-large">
                <h1><?php the_title(); ?></h1>
                <p><?php the_field('sub_heading'); ?></p>
            </div>
        </header>

        <div class="content width--x-large">
            <?php the_content(); ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>

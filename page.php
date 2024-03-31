<?php get_header(); ?>

<main id="site-main" class="site-main">
    <section class="page-default | content width--x-large">
        <header>
            <h1><?php the_title(); ?></h1>
        </header>

        <?php the_content(); ?>
    </section>
</main>

<?php get_footer();

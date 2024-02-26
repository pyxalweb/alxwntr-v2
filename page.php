<?php get_header(); ?>

<main id="site-main" class="site-main interior">
    <article class="article | content width-small">
        <header>
            <h1><?php the_title(); ?></h1>
        </header>

        <div class="article__content">
            <?php the_content(); ?>
        </div>
    </article>
</main>

<?php get_footer();
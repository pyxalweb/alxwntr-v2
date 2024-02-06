<?php get_header(); ?>

<main id="site-main" class="site-main interior">
    <article class="article | content width-400 | text-100 text-200--h3 text-300--h2 text-400--h1">
        <header>
            <h1><?php the_title(); ?></h1>
        </header>

        <div class="article__content">
            <?php the_content(); ?>
        </div>
    </article>
</main>

<?php get_footer();
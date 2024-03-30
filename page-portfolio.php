<?php get_header(); ?>

<main id="site-main" class="site-main interior">
    <section class="portfolio | wrap" role="region" aria-label="Selected works from Alex Winter's portfolio">
        <div class="portfolio__container | content width--x-large">
            <h1>Selected Works</h1>
            <?php the_content(); ?>

            <!--
            <div class="portfolio__items">
                <a class="portfolio__item" href="#" target="_blank" rel="noopener">
                    <span></span>
                    <img src="" alt="">
                </a>
            </div>
            -->
        </div>
    </section>
</main>

<?php get_footer(); ?>

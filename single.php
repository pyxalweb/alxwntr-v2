<?php get_header(); ?>

<main id="site-main" class="site-main interior">
    <?php while(have_posts()) { the_post(); ?>
        <article class="article | wrap">
            <div class="article__container | content width-small">
                <header>
                    <h1><?php the_title(); ?></h1>
                </header>

                <div class="article__featured-image">
                    <?php the_post_thumbnail(); ?>
                </div>

                <div class="article__content">
                    <?php the_content(); ?>
                </div>

                <footer>
                    <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('F j, Y') ?></time>
                </footer>
            </div>
        </article>
    <?php } ?>
</main>

<?php get_footer();
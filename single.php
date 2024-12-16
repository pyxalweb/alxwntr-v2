<?php get_header(); ?>

<!-- single.php -->

<main id="site-main" class="site-main | text-300--h2 text-300--h3">
    <?php while(have_posts()) { the_post(); ?>
    <article class="single">
        <header class="single__header">
            <div class="single__text | content width--small">
                <h1><?php the_title(); ?></h1>
            </div>
        </header>

        <div class="content width--small">
            <?php if (has_post_thumbnail()) { ?>
            <div class="single__featured-image">
                <?php the_post_thumbnail(); ?>
            </div>
            <?php } ?>

            <div class="single__content">
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

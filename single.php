<?php get_header(); ?>

<main id="site-main" class="site-main">
    <?php while(have_posts()) { the_post(); ?>
    <article class="article | content width--small">
        <header>
            <h1><?php the_title(); ?></h1>
        </header>

        <?php if (has_post_thumbnail()) { ?>
        <div class="article__featured-image">
            <?php the_post_thumbnail(); ?>
        </div>
        <?php } ?>

        <div class="article__content">
            <?php the_content(); ?>
        </div>

        <footer>
            <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('F j, Y') ?></time>
        </footer>
    </article>
    <?php } ?>
</main>

<?php get_footer();

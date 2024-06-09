<?php get_header(); ?>
<main id="site-main" class="site-main">
    <section class="page-default | content width--x-large">
        <header>
            <h1>Search Results for: <?php echo get_search_query(); ?></h1>
        </header>

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="post">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <?php // the_excerpt(); ?>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <p>No results found for: <?php echo get_search_query(); ?></p>
        <?php endif; ?>
    </section>
</main>
<?php // get_sidebar(); ?>
<?php get_footer(); ?>

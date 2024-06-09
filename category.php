<?php get_header(); ?>
<main id="site-main" class="site-main">
    <section class="page-default | content width--x-large">
        <header>
            <h1>Category: <?php single_cat_title(); ?></h1>
        </header>

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="post">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <?php // the_excerpt(); ?>
        </div>
        <?php endwhile; endif; ?>
    </section>
</main>
<?php // get_sidebar(); ?>
<?php get_footer(); ?>

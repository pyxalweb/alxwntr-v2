<?php
get_header();
?>

<main id="site-main" class="site-main interior">
    <?php
    while(have_posts()) {
        the_post();
    ?>
        <article class="article | content width-400 | text-100 text-400--h1 text-300--h2 text-200--h3">
            <header>
                <h1><?php the_title(); ?></h1>
            </header>

            <section class="article__content">
                <?php the_content(); ?>
            </section>

            <footer>
                <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('F j, Y') ?></time>
            </footer>
        </article>
    <?php
	}
    ?>
</main>

<?php
get_footer();
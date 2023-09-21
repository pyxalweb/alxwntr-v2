<?php
/*
 * Template Name: Post Test
 * Template Post Type: post
 */
?>

<?php
get_header();
?>

<main id="site-main" class="site-main interior">
    <?php
    while(have_posts()) {
        the_post();
    ?>
        <section class="article | content width-df | text-100 text-200--h1--orange-yellow text-300--h2">
            <h1><?php the_title(); ?></h1>

            <div class="article__content">
                <?php the_content(); ?>
            </div>

            <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('F j, Y') ?></time>
        </section>
    <?php
	}
    ?>
</main>

<?php
get_footer();
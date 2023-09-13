<?php
get_header();
?>

<main id="site-main" class="site-main homepage">
    <!--
        Todo:
        figure out webp and picture element support
    -->
    <?php
    while(have_posts()) {
        the_post();
    ?>
        <section class="blog blog--archive | content width-df | text-100 text-200--h1--orange-yellow" role="region" aria-label="Blog Posts">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
            <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('F j, Y') ?></time>
        </section>
    <?php
	}
    ?>
</main>

<?php
get_footer();
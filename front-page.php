<?php get_header(); ?>

<main id="site-main" class="site-main">
    <section class="intro | wrap">
        <div class="intro__container | content width--x-large">
            <?php the_content(); ?>
        </div>
    </section>
</main>

<button class="theme-toggle--light-mode" style="width:130px">Light Mode</button>
<button class="theme-toggle--dark-mode" style="width:130px">Dark Mode</button>

<?php get_footer();

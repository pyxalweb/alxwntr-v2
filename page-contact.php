<?php get_header(); ?>

<main id="site-main" class="site-main interior">
    <article class="article | wrap">
        <div class="article__container | content width-small">
            <header>
                <h1><?php the_title(); ?></h1>
            </header>

            <section class="article__content">
                <?php the_content(); ?>

                <script type="text/javascript" src="https://form.jotform.com/jsform/240190639405050"></script>
            </section>
        </div>
    </article>
</main>

<?php get_footer();
<?php get_header(); ?>

<main id="site-main" class="site-main">
    <section class="contact | wrap" role="region" aria-label="Send an email using the contact form">
        <div class="contact__container | content width--small">
            <header>
                <h1><?php the_title(); ?></h1>
            </header>

            <?php the_content(); ?>

            <script type="text/javascript" src="https://form.jotform.com/jsform/240190639405050"></script>
        </div>
    </section>
</main>

<?php get_footer();
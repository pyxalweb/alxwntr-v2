<?php /* Template Name: Blog */ ?>

<?php
get_header();
?>

<main id="site-main" class="site-main homepage">
    <section class="blog blog--archive | content width-df | text-100 text-200--h1--orange-yellow" role="region" aria-label="Blog Posts">
        <h1>Blog</h1>
        <h2>2022</h2>

        <?php
            // refer to blog-dates.php
            $past_year = false;
            $year = '2022';

            get_template_part( 'template-parts/blog', 'categories', array('date' => $past_year, 'year' => $year) );
            get_template_part( 'template-parts/blog', 'posts', array('date' => $past_year, 'year' => $year) );
        ?>
    </section>
</main>

<?php
get_footer();

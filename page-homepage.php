<?php
get_header();
?>

<main id="site-main" class="site-main homepage">
    <section class="homepage__intro | content width-700 | text-100 text-800--h2" role="region" aria-label="Information about Alex Winter">
        <?php the_content(); ?>
    </section>

    <?php
    // Check if there are any blog posts from the past year
    // if there are no blog posts then return
    $date_query = array(
        array(
            'after' => '1 year ago',
        )
    );

    $posts = new WP_Query(array (
        'date_query' => $date_query,
    ));

    if (!$posts->have_posts()) {
        // do nothing
    }
    else {
        // display posts
    ?>
    <section class="blog blog--home | content width-700 | text-100 text-600--h2" role="region" aria-label="Latest Blog Posts">
        <?php
            $past_year = true;
            $all_years = false;
            $year = '';

            get_template_part('template-parts/blog', 'categories', array('past_year' => $past_year, 'all_years' => $all_years, 'year' => $year));
            get_template_part('template-parts/blog', 'posts', array('past_year' => $past_year, 'all_years' => $all_years, 'year' => $year));
        ?>

        <div class="blog__more" role="complementary" aria-label="View more blog posts in the archive">
            <a href="blog" class="button">Archive</a>
        </div>
    </section>
    <?php
    }
    ?>
</main>

<?php
get_footer();
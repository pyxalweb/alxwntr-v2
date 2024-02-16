<?php get_header(); ?>

<main id="site-main" class="site-main interior">
    <section class="blog blog--archive | content width-700" role="region" aria-label="Blog Posts">
        <h1>Blog</h1>

        <?php
        // Check if there are any blog posts from the past year
        // if there are no blog posts then return
        $date_query = null;

        $posts = new WP_Query(array (
            'date_query' => $date_query,
        ));

        if (!$posts->have_posts()) {
            // do nothing
        }
        else {
            // display posts

            // we don't want the past year on this page
            $past_year = false;

            // we want all years for the categories on this page
            $all_years = true;
            $year = '';
            get_template_part('template-parts/blog', 'categories', array('past_year' => $past_year, 'all_years' => $all_years, 'year' => $year));

            // set $all_years to false so that we can then get the posts for each year
            $all_years = false;
        ?>

        <?php
            $year = '2024';
            get_template_part('template-parts/blog', 'posts', array('past_year' => $past_year, 'all_years' => $all_years, 'year' => $year));
        ?>

        <?php
            $year = '2023';
            get_template_part('template-parts/blog', 'posts', array('past_year' => $past_year, 'all_years' => $all_years, 'year' => $year));
        ?>

        <?php
            $year = '2022';
            get_template_part('template-parts/blog', 'posts', array('past_year' => $past_year, 'all_years' => $all_years, 'year' => $year));
        ?>

        <?php
            $year = '2021';
            get_template_part('template-parts/blog', 'posts', array('past_year' => $past_year, 'all_years' => $all_years, 'year' => $year));
        ?>

        <?php } ?>
    </section>
</main>

<?php get_footer();
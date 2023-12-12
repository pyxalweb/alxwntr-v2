<?php
/*
 * Template Name: Homepage
 * Template Post Type: page
 */
?>

<?php
get_header();
?>

<main id="site-main" class="site-main homepage">
    <section class="about | content width-700 | text-100 text-200--h2--orange-yellow" role="region" aria-label="Information about Alex Winter">
        <div class="about__container">
            <div class="about__item about__item--text">
                <div>
                    <h2>I'm Alex Winter, a web developer in Portland, Oregon.</h2>
                    <?php the_content(); ?>
                </div>
            </div>

            <div class="about__item about__item--image">
                <!-- TODO: Add slideshow functionality using ACF Pro's "Gallery" or "Repeater" functionalities -->
                <div class="slideshow slideshow--round slideshow--about" data-interval="4000">
                    <div class="slideshow__slide" data-status="active">
                        <?php getImage('slideshow_1', 'test-class'); ?>
                    </div>

                    <div class="slideshow__slide" data-status="active">
                        <?php getImage('slideshow_2', 'test-class'); ?>
                    </div>

                    <div class="slideshow__slide" data-status="active">
                        <?php getImage('slideshow_3', 'test-class'); ?>
                    </div>
                    <!--
                    <div class="slideshow__controls">
                        <button class="slideshow__prev">Prev</button>
                        <button class="slideshow__next">Next</button>
                    </div>
                    <div class="slideshow__dots"></div>
                    -->
                </div>
            </div>
        </div>
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
    <section class="blog blog--home | content width-700 | text-100 text-300--h2--orange-yellow" role="region" aria-label="Latest Blog Posts">
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

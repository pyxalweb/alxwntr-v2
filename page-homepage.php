<?php /* Template Name: Homepage */ ?>

<?php
get_header();
?>

<main id="site-main" class="site-main homepage">
    <section class="about | content width-df | text-100 text-200--h2--orange-yellow" role="region" aria-label="Information about Alex Winter">
        <div class="about__container">
            <div class="about__item about__item--text">
                <div>
                    <h2>I'm Alex Winter, a web developer in Portland, Oregon.</h2>
                    <?php the_content(); ?>
                </div>
            </div>

            <div class="about__item about__item--image">
                <div class="slideshow slideshow--about" data-interval="4000">
                    <div class="slideshow__slide" data-status="active">
                        <img src="<?php echo get_template_directory_uri(); ?>/temp/alex-winter-egyptian-coffee@original.jpg" alt="Alex Winter drinking Egyptian coffee">
                    </div>
                    <div class="slideshow__slide">
                        <img src="<?php echo get_template_directory_uri(); ?>/temp/alex-winter-ipa-beer@original.jpg" alt="Alex Winter drinking an IPA">
                    </div>
                    <div class="slideshow__slide">
                        <img src="<?php echo get_template_directory_uri(); ?>/temp/alex-winter-old-coffee-mug@original.jpg" alt="Alex Winter drinking coffee from a very old mug">
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

    <section class="blog blog--home | content width-df | text-100 text-300--h2--orange-yellow" role="region" aria-label="Latest Blog Posts">
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
</main>

<?php
get_footer();

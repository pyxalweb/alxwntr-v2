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
<?php
/*
TODO:
Figure out how to support larger images
*/

// Get the repeater field data
$images = CFS()->get( 'slideshow' );

if ($images) {
    foreach ($images as $image) {
        $jpg_url = $image['image']; // Replace 'image' with field name
        $webp_url = str_replace('.jpg', '.webp', $jpg_url);

        // Get image width using wp_get_attachment_image_src
        // see https://developer.wordpress.org/reference/functions/wp_get_attachment_image_src/ for more details for more details about wp_get_attachment_image_src
        $image_data = wp_get_attachment_image_src(attachment_url_to_postid($jpg_url), 'full');
        // Check if image_data is not empty and has a width value
        if ($image_data && isset($image_data[1])) {
            $image_width = $image_data[1];
        } else {
            $image_width = 0; // Default width if data is not available
        }

        ?>
        <div class="slideshow__slide" data-status="active">
            <picture>
                <source srcset="<?php echo esc_url($webp_url) ?> <?php echo esc_attr($image_width) ?>w" type="image/webp">
                <source srcset="<?php echo esc_url($jpg_url) ?> <?php echo esc_attr($image_width) ?>w" type="image/jpeg">
                <img src="<?php echo esc_url($jpg_url) ?>" alt="" width="<?php echo esc_attr($image_width) ?>" height="<?php echo esc_attr($image_width) ?>">
            </picture>
        </div>
    <?php
    }
};
?>
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

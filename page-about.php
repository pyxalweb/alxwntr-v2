<?php /* Template Name: About */ ?>

<?php
get_header();
?>

<?php
while ( have_posts() ) :
	the_post();
?>

<main id="site-main" <?php post_class($class = 'site-main interior'); ?>>
	<section class="content width-df | text-100 | mbl-3">
        <div class="gridcontent gridcontent--3fr-1fr gridcontent--gap-3em">
            <div class="gridcontent__item">
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </div>

            <div class="gridcontent__item | flexcontent flexcontent--center-vertically | fixedwidth--348px | roundimage--100 | roundimage--border-grey-100">
                <div class="slideshow" data-interval="4000">
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
</main>

<?php
endwhile;
?>

<?php
get_footer();

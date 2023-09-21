<?php
/*
 * 404 error page
 */

$upload_dir = wp_upload_dir();
?>

<?php
get_header();
?>

<main id="site-main" class="site-main interior">
    <section class="error-page | content width-df | text-100 text-200--h1--orange-yellow">
        <h1>404</h1>

        <div class="mb-2">
            <p>Sorry, the page you are looking for could not be found.</p>
        </div>

        <div class="slideshow slideshow--round slideshow--center" data-interval="4000">
            <div class="slideshow__slide" data-status="active">
                <picture>
                    <source srcset="<?php echo $upload_dir['baseurl']; ?>/nancy-01.jpg.webp 348w" type="image/webp">
                    <source srcset="<?php echo $upload_dir['baseurl']; ?>/nancy-01.jpg 348w" type="image/jpeg">
                    <img src="<?php echo $upload_dir['baseurl']; ?>/nancy-01.jpg" loading="lazy" alt="Nancy the cat" width="348" height="348" class="test-class">
                </picture>
            </div>

            <div class="slideshow__slide" data-status="active">
                <picture>
                    <source srcset="<?php echo $upload_dir['baseurl']; ?>/clyde-01.jpg.webp 348w" type="image/webp">
                    <source srcset="<?php echo $upload_dir['baseurl']; ?>/clyde-01.jpg 348w" type="image/jpeg">
                    <img src="<?php echo $upload_dir['baseurl']; ?>/clyde-01.jpg" loading="lazy" alt="Clyde the corgi" width="348" height="348" class="test-class">
                </picture>
            </div>

            <!--
            <div class="slideshow__controls">
                <button class="slideshow__prev">Prev</button>
                <button class="slideshow__next">Next</button>
            </div>
            <div class="slideshow__dots"></div>
            -->
        </div>
    </section>
</main>

<?php
get_footer();

<?php
/*
 * 404 error page
 */

$upload_dir = wp_upload_dir();
?>

<?php
get_header();
?>

<!-- TEMPORARY INLINE STYLES UNTIL ACF IMAGE SLIDESHOW BLOCK IS FINISHED -->
<style>
.slideshow {
    display: grid;
    place-items: start;
}

.slideshow__slide {
    opacity: 0;
    z-index: -1;
    grid-column: 1 / 2;
    grid-row: 1 / 2;
    transition: all var(--t-medium);
}

.slideshow__slide[data-status='active'] {
    opacity: 1;
    z-index: 1;
}

.slideshow__dot {
    width: 1em;
    height: 1em;
}

.slideshow__dot[data-status='active'] {
    background-color: red;
}

.slideshow--round img {
    border-radius: 100%;
    border: clamp(0.25em, 2vw, 1em) solid var(--c-grey-100);
}

.slideshow--rounded img {
	border-radius: 2em;
	border: clamp(0.25em, 2vw, 1em) solid var(--c-grey-100);
}

.slideshow--center .slideshow__slide { margin-inline: auto; }
</style>

<main id="site-main" class="site-main interior">
    <section class="error-page | content width-400 | text-100 text-800--h1">
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
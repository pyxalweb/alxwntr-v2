<?php
get_header();
?>

<?php
while ( have_posts() ) :
	the_post();
endwhile;
?>

<main id="site-content" <?php post_class($class = 'site-content interior'); ?>>
	<section class="content width-df | mbl-7 mbl-3-vw400">
        <p>main content</p>
    </section>
</main>

<?php
get_footer();

<?php
/*
 * 404 error page
 */

get_header();
?>

<main id="site-main" class="site-main interior">
    <section class="error-page | content width-small | text-100 text-400--h1">
        <h1>404</h1>

        <?php
            $post = get_post( 2014 );
            $output = apply_filters( 'the_content', $post->post_content );
            echo $output;
        ?>
    </section>
</main>

<?php
get_footer();
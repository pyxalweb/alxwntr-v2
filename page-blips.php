<?php
/*
Template Name: Blips
*/
?>
<?php get_header(); ?>

<!-- page-blips.php -->

<main id="site-main" class="site-main site-main--page">
    <section class="page-default">
        <header class="page-default__header">
            <div class="page-default__text | content width--x-large">
                <h1><?php the_title(); ?></h1>
                <p><?php the_field('sub_heading'); ?></p>
            </div>
        </header>

        <div class="content width--x-large">
            <?php // the_content(); ?>
            
            <div class="post-feed-page">
                <div class="post-feed-page__blips">
                    <?php
                    $args = array(
                        'post_type'      => 'blip',
                        'posts_per_page' => 0,
                        'order'          => 'DESC',
                        'orderby'        => 'date'
                    );

                    $query = new WP_Query($args);

                    if ($query->have_posts()) :
                        echo '<div class="post-feed-page__items">';
                        while ($query->have_posts()) : $query->the_post();
                            ?>
                            <div class="post-feed-page__item | text-100">
                                <div <?php post_class('post-feed-page__post'); ?> id="post-<?php the_ID(); ?>">
                                    <?php the_content(); ?>
                                </div>
                                <div class="post-feed-page__date">
                                    <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('F j, Y'); ?></time>
                                </div>
                            </div>
                            <?php
                        endwhile;
                        echo '</div>';
                    else :
                        echo '<p>No posts found.</p>';
                    endif;

                    // Restore global post data
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
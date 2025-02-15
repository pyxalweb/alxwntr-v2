<?php get_header(); ?>

<!-- front-page.php -->

<main id="site-main" class="site-main site-main--front-page">
    <section class="intro | wrap">
        <div class="intro__container | content width--x-large">
            <?php the_content(); ?>
        </div>
    </section>

    <section class="text-300--h2 | bg-main-alt mt-xx-large pbl-xx-large">
        <div class="content width--x-large | post-feed-wrap">
            <div class="post-feed post-feed--blips">
                <h2>Blips</h2>
                <?php
                $args = array(
                    'post_type'      => 'blip',
                    'posts_per_page' => 3,
                    'order'          => 'DESC',
                    'orderby'        => 'date'
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    echo '<div class="post-feed__items">';
                    while ($query->have_posts()) : $query->the_post();
                        ?>
                        <div class="post-feed__item | text-90">
                            <div <?php post_class('post-feed__post'); ?> id="post-<?php the_ID(); ?>">
                                <?php the_content(); ?>
                            </div>
                            <div class="post-feed__date">
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

                <p><a href="blips">View All Blips</a></p>
            </div>

            <div class="post-feed post-feed--blog">
                <h2>Blog</h2>
                <?php
                $args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                    'order'          => 'DESC',
                    'orderby'        => 'date'
                );

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    echo '<div class="post-feed__items">';
                    while ($query->have_posts()) : $query->the_post();
                        ?>
                        <div class="post-feed__item | text-90">
                            <div <?php post_class('post-feed__post'); ?>>
                                <p><a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>"><?php the_title(); ?></a></p>
                            </div>
                            <div class="post-feed__date">
                                <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('F j, Y'); ?></time>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    echo '</div>';
                else :
                    echo '<p>No blog posts found.</p>';
                endif;

                // Restore global post data
                wp_reset_postdata();
                ?>

                <p><a href="blog">View All Blog Posts</a></p>
            </div>
        </div>
    </section>
</main>

<?php get_footer();

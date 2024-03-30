<?php
    // Delete later
    // Keep for now as it serves as a good template for a Custom Post type
    // (see "Template for Custom Post Type" in functions.php)
?>




<?php get_header(); ?>

<main id="site-main" class="site-main interior">
    <section class="portfolio | wrap" role="region" aria-label="Selected works from Alex Winter's portfolio">
        <div class="portfolio__container | content width--x-large">
            <h1>Selected Works</h1>
            <?php the_content(); ?>

            <div class="portfolio__posts">
                <?php
                // WP_Query arguments
                $args = array(
                    'post_type'      => 'portfolio', // Your custom post type
                    'posts_per_page' => -1, // Show all posts
                );

                // The Query
                $portfolio_query = new WP_Query( $args );

                // The Loop
                if ( $portfolio_query->have_posts() ) :
                    while ( $portfolio_query->have_posts() ) :
                        $portfolio_query->the_post();
                ?>
                        <a class="portfolio__post" href="<?php the_field('project_url'); ?>" target="_blank" rel="noopener">
                            <span><?php the_field('project_name'); ?></span>
                            <?php
                            $project_screenshot = get_field('project_screenshot');
                            if ($project_screenshot) :
                            ?>
                                <img src="<?php echo esc_url($project_screenshot['url']); ?>" alt="<?php echo esc_attr($project_screenshot['alt']); ?>" />
                            <?php endif; ?>
                        </a>
                <?php
                    endwhile;
                    wp_reset_postdata(); // Reset post data
                else :
                    // If no posts found
                    echo '<p>No portfolios found.</p>';
                endif;
                ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>

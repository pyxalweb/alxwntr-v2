<div class="blog__posts" role="group" aria-label="Articles from within the last year">
    <?php
    $year = $args['year'];

    include ( get_template_directory() . "/template-parts/blog-dates.php");

    // Get the posts from WordPress
    $posts = new WP_Query(array (
        'post_type' => 'post',
        'ignore_sticky_posts' => 1,
        'posts_per_page' => -1,
        'date_query' => $posts_date
    ));

    // Loop through the posts
    while($posts->have_posts()) {
        $posts->the_post();

        foreach((get_the_category()) as $category) {
            $category_id = $category->cat_ID;
            $category_name = $category->cat_name; ?>

            <div class="post__item | active fade" data-category="<?php echo $category_id; ?>">
                <h3 class="post__heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <div class="post__category" aria-label="Category">
                    <p><?php echo $category_name; ?></p>
                </div>
                <div class="post__date" aria-label="Date">
                    <time datetime="<?php the_time('Y-m-d') ?>"><?php the_time('F jS, Y'); ?></time>
                </div>
            </div>
        <?php }
    }
    ?>
</div>

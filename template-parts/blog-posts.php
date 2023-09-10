
<?php
$year = $args['year'];

include ( get_template_directory() . "/template-parts/blog-dates.php");

// Get the posts from WordPress
$posts = new WP_Query(array (
    'post_type' => 'post',
    'ignore_sticky_posts' => 1,
    'posts_per_page' => -1,
    'date_query' => $date_query,
));
?>

<?php 
if ($posts->have_posts()) {
    if ($args['past_year']) {
    ?>
        <div class="blog__posts" role="group" aria-label="Articles from the past year">
    <?php
    }
    else {
    ?>
        <div class="blog__posts" role="group" aria-label="Articles from <?php echo $year; ?>">
        <h2><?php echo $year; ?></h2>
    <?php
    }
    ?>
        <div class="blog__posts__container">
            <?php
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
    </div>
 <?php
} else {
        // there are no posts for this year
        return;
    }
?>

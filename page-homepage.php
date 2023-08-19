<?php /* Template Name: Homepage */ ?>

<?php
get_header();
?>

<main id="site-main" class="site-main homepage">
    <section class="categories | content width-df">
        <?php
        function categoriesList() {
            $categories = get_categories(array(
                'orderby' => 'name',
                'order' => 'ASC',
                'exclude' => '7'
            ));

            foreach($categories as $category) {
                echo '<button type="button" class="category__item | button" data-category="' . $category->term_id . '">' . $category->name . '</button>';
            }
        }
        categoriesList();
        ?>
        <button type="button" class="category__item | button | active" data-category="all">all</button>
    </section>

    <?php
    function get_posts_by_year($year) {
        // surpress categories by adding:
        // 'cat' => '-1,-2,-3' (where 1, 2, 3 are the category IDs)
        $posts = new WP_Query(array (
            'post_type' => 'post',
            'ignore_sticky_posts' => 1,
            'posts_per_page' => -1,
            'year' => $year
        ));

        while($posts->have_posts()) {
            $posts->the_post();

            foreach((get_the_category()) as $category) {
                $category_id = $category->cat_ID;
                $category_name = $category->cat_name;
                ?>
                <div class="post__item | active fade" data-category="<?php echo $category_id; ?>">
                    <h3 class="post__heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div class="post__category">
                        <p><?php echo $category_name; ?></p>
                    </div>
                    <div class="post__date">
                        <time datetime="<?php the_time('Y-m-d') ?>"><?php the_time('F jS, Y'); ?></time>
                    </div>
                </div>
            <?php
            } // end foreach
        } // end while
    }
    ?>

    <section class="posts | content width-df">
        <?php get_posts_by_year('2023'); ?>
    </section>
</main>

<?php
get_footer();

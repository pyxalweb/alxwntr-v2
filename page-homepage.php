<?php /* Template Name: Homepage */ ?>

<?php
get_header();
?>

<main id="site-main" class="site-main">
    <section class="categories | content width-df">
    <?php
        function categoriesList() {
        $categories = get_categories(array(
            'orderby' => 'name',
            'order' => 'ASC',
            'exclude' => '7'
        ));

        foreach($categories as $category) {
            echo '<button type="button" class="category__item" data-category="' . $category->term_id . '">' . $category->name . '</button>';
        }
    }
    categoriesList();
    ?>
    </section>

    <?php
    function get_posts_by_year($year) {
        // surpress categories by adding:
        // 'cat' => '-1,-2,-3' (where 1, 2, 3 are the category IDs)
        $posts = new WP_Query(array (
            'post_type' => 'post',
            'ignore_sticky_posts' => 1,
            'year' => $year
        ));

        while($posts->have_posts()) {
            $posts->the_post();

            foreach((get_the_category()) as $category) {
                $category_id = $category->cat_ID;
                $category_name = $category->cat_name;
                ?>
                <div class="post__item active" data-category="<?php echo $category_id; ?>">
                    <h3 class="post__heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div class="post__category">
                        <p><?php echo $category_name; ?></p>
                    </div>
                    <div class="post__date">
                        <p><?php the_time('F jS'); ?></p>
                    </div>
                </div>
            <?php
            } // end foreach
        } // end while
    }
    ?>

    <section class="posts | content width-df">
        <div class="post__year">
            <h2>2023</h2>
        </div>
        <div class="post__container">
            <?php get_posts_by_year('2023'); ?>
        </div>
    </section>

    <section class="posts | content width-df">
        <div class="post__year">
            <h2>2022</h2>
        </div>
        <div class="post__container">
            <?php get_posts_by_year('2022'); ?>
        </div>
    </section>

    <section class="posts | content width-df">
        <div class="post__year">
            <h2>2021</h2>
        </div>
        <div class="post__container">
            <?php get_posts_by_year('2021'); ?>
        </div>
    </section>
</main>

<?php
get_footer();

<?php /* Template Name: Homepage */ ?>

<?php
get_header();
?>

<main id="site-main" class="site-main">
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
            ?>

            <div class="post__item">
                <h3 class="post__heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <div class="post__category">
                    <p><?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?></p>
                </div>
                <div class="post__date">
                    <p><?php the_time('F jS'); ?></p>
                </div>
            </div>

            <?php
        }
    }
    ?>

    <section class="posts | content width-df">
        <div class="post__title">
            <h2>2023</h2>
        </div>
        <div class="post__container">
            <?php get_posts_by_year('2023'); ?>
        </div>
    </section>

    <section class="posts | content width-df">
        <div class="post__title">
            <h2>2022</h2>
        </div>
        <div class="post__container">
            <?php get_posts_by_year('2022'); ?>
        </div>
    </section>

    <section class="posts | content width-df">
        <div class="post__title">
            <h2>2021</h2>
        </div>
        <div class="post__container">
            <?php get_posts_by_year('2021'); ?>
        </div>
    </section>
</main>

<?php
get_footer();

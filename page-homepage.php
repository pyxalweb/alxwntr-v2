<?php /* Template Name: Homepage */ ?>

<?php
get_header();
?>

<main id="site-main" class="site-main">
    <?php
    function get_posts_by_year($year) {
        $posts = new WP_Query(array (
            'post_type' => 'post',
            'ignore_sticky_posts' => 1,
            'year' => $year,
            'cat' => '-1, -4, -7'
        ));

        while($posts->have_posts()) {
            $posts->the_post();
            ?>

            <div class="post-item">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <div class="post-meta">
                    <p><?php the_time('m/d'); ?> - <?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?></p>
                </div>
            </div>

            <?php
        }
    }
    ?>

    <section class="posts | content width-df">
        <h2>2023</h2>
        <?php get_posts_by_year('2023'); ?>
    </section>

    <section class="posts | content width-df">
        <h2>2022</h2>
        <?php get_posts_by_year('2022'); ?>
    </section>

    <section class="posts | content width-df">
        <h2>2021</h2>
        <?php get_posts_by_year('2021'); ?>
    </section>
</main>

<?php
get_footer();

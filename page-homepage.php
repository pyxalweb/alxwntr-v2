<?php /* Template Name: Homepage */ ?>

<?php
get_header();
?>

<main id="site-main" class="site-main">
    <section class="content width-df | mbl-7 mbl-3-vw400">
        <?php
        $posts2023 = new WP_Query(array (
            'post_type' => 'post',
            'ignore_sticky_posts' => 1,
            'year' => '2023',
            'cat' => '-4, -7'
        ));

        while($posts2023->have_posts()) {
            $posts2023->the_post();
        ?>

        <div class="post-item">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="post-meta">
                <p><?php the_time('m/d'); ?> - <?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?></p>
            </div>
        </div>

        <?php
        }
        ?>
    </section>
</main>

<?php
get_footer();

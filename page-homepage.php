<?php /* Template Name: Homepage */ ?>

<?php
get_header();
?>

<main id="site-main" class="site-main homepage">
    <section class="about | content width-df | text-100 text-125--h2">
        <div class="about__container">
            <div class="about__item">
                <div class="about__text">
                    <h2>I'm Alex Winter, a front-end web developer in Portland, Oregon.</h2>
                    <?php the_content(); ?>
                </div>
            </div>

            <div class="about__item about__item--image">
                <div class="slideshow slideshow--about" data-interval="4000">
                    <div class="slideshow__slide" data-status="active">
                        <img src="<?php echo get_template_directory_uri(); ?>/temp/alex-winter-egyptian-coffee@original.jpg" alt="Alex Winter drinking Egyptian coffee">
                    </div>
                    <div class="slideshow__slide">
                        <img src="<?php echo get_template_directory_uri(); ?>/temp/alex-winter-ipa-beer@original.jpg" alt="Alex Winter drinking an IPA">
                    </div>
                    <div class="slideshow__slide">
                        <img src="<?php echo get_template_directory_uri(); ?>/temp/alex-winter-old-coffee-mug@original.jpg" alt="Alex Winter drinking coffee from a very old mug">
                    </div>
                    <!--
                    <div class="slideshow__controls">
                        <button class="slideshow__prev">Prev</button>
                        <button class="slideshow__next">Next</button>
                    </div>
                    <div class="slideshow__dots"></div>
                    -->
                </div>
            </div>
        </div>
    </section>

    <section class="content width-df">
        <div class="posts">
            <!-- Posts will be loaded here -->
        </div>
        <button class="posts__more | button" data-page="1">Load More</button>
    </section>

    <div class="categories | content width-df" role="group" aria-label="Post category filters">
        <div class="categories__container">
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
        </div>
    </div>

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

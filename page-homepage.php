<?php /* Template Name: Homepage */ ?>

<?php
get_header();
?>

<main id="site-main" class="site-main homepage">
    <section class="about | content width-df | text-100 text-500--h2">
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

    <section class="content width-df | blog" role="region" aria-label="Blog Posts">
        <div class="blog__categories" role="group" aria-label="Post category filters">
            <div class="categories__container">
                <button type="button" class="category__item category__item--all active | button" data-category="all">all categories</button>
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
            </div>
        </div>

        <div class="blog__posts" role="group" aria-label="Articles from within the last year">
            <?php
            $posts = new WP_Query(array (
                'post_type' => 'post',
                'ignore_sticky_posts' => 1,
                'posts_per_page' => -1,
                'date_query' => array(
                    array(
                        'after' => '1 years ago'
                    )
                )
            ));

            while($posts->have_posts()) {
                $posts->the_post();

                foreach((get_the_category()) as $category) {
                    $category_id = $category->cat_ID;
                    $category_name = $category->cat_name;
                    ?>
                    <div class="post__item | active fade" data-category="<?php echo $category_id; ?>" aria-labelledby="post-heading-<?php the_ID(); ?>">
                        <h2 class="post__heading" id="post-heading-<?php the_ID(); ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="post__category" aria-label="Category">
                            <p><?php echo $category_name; ?></p>
                        </div>
                        <div class="post__date" aria-label="Date">
                            <time datetime="<?php the_time('Y-m-d') ?>"><?php the_time('F jS, Y'); ?></time>
                        </div>
                    </div>
                <?php
                } // end foreach
            } // end while
            ?>
        </div>

        <div class="blog__more">
            <div class="blog__more__text">
                <p>Want more for some reason?</p>
            </div>

            <a href="" class="button">The Archive</a>
        </div>
    </section>

    <!-- <div class="error"><p>You're already viewing this category.</p></div> -->
</main>

<?php
get_footer();

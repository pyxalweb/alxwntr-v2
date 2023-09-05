<?php /* Template Name: Homepage */ ?>

<?php
get_header();
?>

<main id="site-main" class="site-main homepage">
    <section class="about | content width-df | text-100 text-200--h2--orange-yellow" role="region" aria-label="Information about Alex Winter">
        <div class="about__container">
            <div class="about__item about__item--text">
                <div>
                    <h2>I'm Alex Winter, a web developer in Portland, Oregon.</h2>
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

    <section class="blog | content width-df | text-100 text-300--h2--orange-yellow" role="region" aria-labeledby="blog__heading">
        <div class="blog__intro">
            <h2 id="blog__heading">Things I've Learned and Observed</h2>
            <p>The following is a collection of recent blog posts.<br>Most of the posts are web development related to serve as a reference guide for myself and some posts are of varying topics.</p>
        </div>

        <div class="blog__categories" role="group" aria-label="Post category filters">
            <div class="categories__container">
                <button type="button" class="category__btn active" data-category="all">all categories</button>

                <?php
                // Get the categories from WordPress
                $categories = get_categories(array(
                    'exclude' => array(7),
                    'orderby' => 'name',
                    'order' => 'ASC'
                ));

                // Create an array of categories for the select dropdown
                $categoryOptions = [];

                foreach ($categories as $category) {
                    // Check if there are posts in the last year for the current category
                    $posts_in_category = get_posts(array(
                        'category' => $category->cat_ID,
                        'date_query' => array(
                            array(
                                'after' => '1 year ago',
                            )
                        ),
                        'posts_per_page' => -1,
                    ));

                    // If there are posts in the last year for this category, display the category button
                    if (!empty($posts_in_category)) { ?>
                        <button type="button" class="category__btn" data-category="<?php echo $category->cat_ID ?>"><?php echo $category->name ?></button>
                    <?php }

                    // If there are posts in the last year for this category, add it to the array of categories for the select dropdown
                    $categoryOptions[] = array(
                        'cat_ID' => $category->cat_ID,
                        'name' => $category->name
                    );
                }
                ?>
                <select class="categories__select">
                    <option data-category="all" value="all">all categories</option>
                    <?php
                    // Populate the select dropdown with the categories from the categoryOptions array
                    foreach ($categoryOptions as $categoryOption) { ?>
                        <option data-category="<?php echo $categoryOption['cat_ID'] ?>" value="<?php echo $categoryOption['cat_ID'] ?>"><?php echo $categoryOption['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="blog__posts" role="group" aria-label="Articles from within the last year">
            <?php
            // Get the posts from WordPress
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

        <div class="blog__more" role="complementary" aria-label="View more blog posts in the archive">
            <a href="" class="button">Archive</a>
        </div>
    </section>
</main>

<?php
get_footer();

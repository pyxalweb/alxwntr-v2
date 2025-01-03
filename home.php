<?php
/*
Template Name: Blog
*/
?>
<?php get_header(); ?>

<!-- home.php -->

<main id="site-main" class="site-main site-main--home">
    <section class="page-default page-blog">
        <?php
        // Get the ID of the 'Posts Page'
        $posts_page_id = get_option('page_for_posts');

        // Fetch the post object using the ID
        $posts_page = get_post($posts_page_id);

        // Check if the posts page exists and is not empty
        if ($posts_page) {
            // Setup the postdata to use template tags
            setup_postdata($posts_page);
        ?>
            <header class="page-default__header">
                <div class="page-default__text | content width--x-large">
                    <h1><?php single_post_title(); ?></h1>
                    <?php if (function_exists('the_field')) { ?>
                        <p><?php the_field('sub_heading', $posts_page_id); ?></p>
                    <?php } ?>
                </div>
            </header>

            <?php if (!empty($posts_page->post_content)) {
                echo $posts_page->post_content;
            } ?>

        <?php
            // Reset postdata to ensure it doesn't interfere with other queries
            wp_reset_postdata();
        }
        ?>

        <?php if ( have_posts() ) : ?>
            <div class="blog__filters__container | content width--x-large">
                <div class="filters__category">
                    <button class="filters__category__toggle">All Categories</button>
                    <ul class="filters__category__list">
                        <li class="filters__category__list-item"><button class="filters__category__button is-active" data-category="All">All Categories</button></li>
                        <?php $categories = get_categories(); 
                        if ($categories) {
                            foreach ($categories as $category) {
                                if ($category->cat_ID !== 7) { ?>
                                    <li class="filters__category__list-item"><button class="filters__category__button" data-category="<?php echo $category->cat_ID ?>"><?php echo $category->name ?></button></li>
                                <?php }
                            }
                        } ?>
                    </ul>
                </div>

                <div class="filters__year">
                    <button class="filters__year__toggle">All Years</button>
                    <ul class="filters__year__list">
                        <li class="filters__year__list-item"><button class="filters__year__button is-active" data-year="All">All Years</button></li>
                        <?php
                        $years = $wpdb->get_col("SELECT DISTINCT YEAR(post_date) FROM $wpdb->posts WHERE post_status = 'publish' ORDER BY post_date DESC");
                        foreach($years as $year) { ?>
                            <li class="filters__year__list-item"><button class="filters__year__button" data-year="<?php echo $year ?>"><?php echo $year ?></button></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

            <div class="blog__posts__wrapper | content width--x-large">
                <div class="blog__posts__container">
                    <ul class="blog__posts">
                        <?php
                        while ( have_posts() ) : the_post();
                        $categories = get_the_category();
                        $category_name = join(', ', wp_list_pluck($categories, 'name'));
                        $category_id = join(', ', wp_list_pluck($categories, 'cat_ID'));
                        ?>
                        <li data-category="<?php echo esc_html($category_id); ?>" data-year="<?php echo get_the_date('Y'); ?>" class="blog__posts__item is-visible">
                            <div class="blog__link">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </div>

                            <div class="blog__meta">
                                <div class="blog__category">
                                    <span><?php echo esc_html($category_name); ?></span>
                                </div>

                                <div class="blog__date">
                                    <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('Y-m-d'); ?></time>
                                </div>
                            </div>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                    <p class="blog__posts__message is-hidden">Nothing here :(</p>
                </div>
            </div>

        <?php else : ?>
            <p><?php esc_html_e( 'Sorry, no posts were found.' ); ?></p>
        <?php endif; ?>
    </section>
</main>

<script type="text/javascript">
    // ***********************************
    //  Filter posts
    //  by Alex Winter - 2024-04-21 - v1.0
    // ***********************************

    // **************************
    //  Get elements
    // **************************
    const categoryToggle = document.querySelector('.filters__category__toggle');
    const yearToggle = document.querySelector('.filters__year__toggle');
    const categoryList = document.querySelector('.filters__category__list');
    const yearList = document.querySelector('.filters__year__list');
    const categoryButtons = categoryList.querySelectorAll('button');
    const yearButtons = yearList.querySelectorAll('button');
    const postsContainer = document.querySelector('.blog__posts__container')
    const postsList = document.querySelector('.blog__posts');
    const posts = document.querySelectorAll('.blog__posts li');
    const categories = document.querySelectorAll('.blog__posts .blog__category');
    const dates = document.querySelectorAll('.blog__posts .blog__date');
    const noPosts = document.querySelector('.blog__posts__message');

    // **************************
    //  Set width for category/date lists and category/year buttons
    // **************************
    function setMaxWidth(elements, additionalWidth, targets) {
        // deal with long category names
        function truncateTextContent(element) {
            const textContent = element.textContent;
            if (textContent.length > 20) {
                element.setAttribute('title', textContent);
                element.textContent = `${textContent.substring(0, 20)}...`;
            }
        }
        // truncate category names in list
        elements.forEach(element => {
            if (element.classList.contains('blog__category')) {
                const categoryText = element.querySelector('span');
                if (categoryText) {
                    truncateTextContent(categoryText);
                }
            }
        });
        // truncate category names in buttons
        targets.forEach(truncateTextContent);

        let maxWidth = 0;

        elements.forEach(element => {
            const elementWidth = element.offsetWidth;
            if (elementWidth > maxWidth) {
                maxWidth = elementWidth;
            }
        });

        if (window.innerWidth > 640) {
            elements.forEach(element => element.style.width = maxWidth + additionalWidth + 'px');
            targets.forEach(target => target.style.width = maxWidth + additionalWidth + 'px');
        }
    }

    // categories
    setMaxWidth(categories, 60, [categoryToggle, ...categoryButtons]);

    // dates
    setMaxWidth(dates, 40, [yearToggle, ...yearButtons]);

    // **************************
    //  Set initial values for filters
    // **************************
    let selectedCategory = 'all';
    let selectedYear = 'all';
    let categoryName = '';
    let yearName = '';

    // **************************
    //  Toggle dropdown lists
    // **************************
    function addToggleListener(toggleElement, listElement) {
        // if you click toggleElement then toggle 'is-open'
        toggleElement.addEventListener('click', () => {
            toggleElement.classList.toggle('is-open');
            listElement.classList.toggle('is-open');
        });
        // if you click outside of toggleElement then remove 'is-open'
        document.addEventListener('click', (event) => {
            if (!toggleElement.contains(event.target)) {
                toggleElement.classList.remove('is-open');
                listElement.classList.remove('is-open');
            }
        });
    }
    addToggleListener(categoryToggle, categoryList);
    addToggleListener(yearToggle, yearList);

    // **************************
    //  Filter by category
    // **************************
    categoryButtons.forEach(button => {
        button.addEventListener('click', () => {
            if (button.dataset.category === 'All') {
                selectedCategory = 'all';
            } else {
                selectedCategory = button.getAttribute('data-category');
            }
            
            categoryList.classList.add('is-closed');
            categoryList.classList.remove('is-open');

            categoryButtons.forEach(button => button.classList.remove('is-active'));
            button.classList.add('is-active');

            categoryName = button.textContent;
            categoryToggle.textContent = categoryName;

            filterPostsTransition();
        });
    });

    // **************************
    //  Filter by year
    // **************************
    yearButtons.forEach(button => {
        button.addEventListener('click', () => {
            if (button.dataset.year === 'All') {
                selectedYear = 'all';
            } else {
                selectedYear = button.getAttribute('data-year');
            }

            yearList.classList.add('is-closed');
            yearList.classList.remove('is-open');

            yearButtons.forEach(button => button.classList.remove('is-active'));
            button.classList.add('is-active');

            yearName = button.textContent;
            yearToggle.textContent = yearName;

            filterPostsTransition();
        });
    });

    // **************************
    //  Filter posts
    // **************************
    function filterPosts() {
        posts.forEach(article => {
            const articleCategory = article.getAttribute('data-category');
            const articleYear = article.getAttribute('data-year');

            if ((selectedCategory === 'all' || articleCategory.includes(selectedCategory)) &&
                (selectedYear === 'all' || articleYear === selectedYear)) {
                article.classList.add('is-visible');
                article.classList.remove('is-hidden');
            } else {
                article.classList.remove('is-visible');
                article.classList.add('is-hidden');
            }
        });

        // if no article has class 'is-visible', show message
        const visiblePosts = postsList.querySelectorAll('.is-visible');
        if (visiblePosts.length === 0) {
            noPosts.classList.remove('is-hidden');
            noPosts.classList.add('is-visible');
        } else {
            noPosts.classList.remove('is-visible');
            noPosts.classList.add('is-hidden');

            categoryToggle.classList.remove('is-icon-hiding');
            yearToggle.classList.remove('is-icon-hiding');
        }
    }

    function filterPostsTransition() {
        categoryToggle.classList.add('is-icon-hiding');
        yearToggle.classList.add('is-icon-hiding');
        postsContainer.classList.add('is-hiding');
        setTimeout(() => {
            postsContainer.classList.remove('is-hiding');

            filterPosts();
        }, 500);
    }
</script>

<?php get_footer();

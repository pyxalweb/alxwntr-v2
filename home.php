<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>

<main id="site-main" class="site-main">
    <section class="page-blog | content width--x-large">
        <header>
            <h1><?php echo get_the_title(get_option('page_for_posts')); ?></h1>
            <p><?php the_field('sub_heading'); ?></p>
        </header>

        <?php if ( have_posts() ) : ?>
            <div class="blog__filters__container">
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

            <div class="blog__posts__container">
                <ul class="blog__posts">
                    <?php
                    while ( have_posts() ) : the_post();
                    $categories = get_the_category();
                    // var_dump($categories);
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
                <p class="blog__posts__message is-hidden">Sorry, no posts were found.</p>
            </div>

        <?php else : ?>
            <p><?php esc_html_e( 'Sorry, no posts were found.' ); ?></p>
        <?php endif; ?>
    </section>
</main>

<script type="text/javascript">
    // ***********************************
    //  Filter posts
    //  by Alex Winter - 2024-04-19 - v1.0
    // ***********************************

    // **************************
    //  Get elements
    // **************************
    const page = document.querySelector('.page-blog');
    const categoryToggle = document.querySelector('.filters__category__toggle');
    const yearToggle = document.querySelector('.filters__year__toggle');
    const categoryList = document.querySelector('.filters__category__list');
    const yearList = document.querySelector('.filters__year__list');
    const categoryButtons = categoryList.querySelectorAll('button');
    const yearButtons = yearList.querySelectorAll('button');
    const posts = document.querySelectorAll('.blog__posts li');
    const categories = document.querySelectorAll('.blog__posts .blog__category');
    const dates = document.querySelectorAll('.blog__posts .blog__date');
    const noPosts = document.querySelector('.blog__posts__message');

    // **************************
    //  Set width for category/date lists and category/year buttons
    // **************************
    function setMaxWidth(elements, additionalWidthLargeViewport, additionalWidthSmallViewport, targets) {
        let maxWidth = 0;
        let additionalWidth;

        elements.forEach(element => {
            const elementWidth = element.offsetWidth;
            if (elementWidth > maxWidth) {
                maxWidth = elementWidth;
            }
        });

        if (window.innerWidth >= 800) {
            additionalWidth = additionalWidthLargeViewport;
        } else {
            additionalWidth = additionalWidthSmallViewport;
        }

        elements.forEach(element => element.style.width = maxWidth + additionalWidth + 'px');
        targets.forEach(target => target.style.width = maxWidth + additionalWidth + 'px');
    }

    // categories
    setMaxWidth(categories, 60, 20, [categoryToggle, ...categoryButtons]);

    // dates
    setMaxWidth(dates, 40, 10, [yearToggle, ...yearButtons]);

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

            filterPosts();
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

            filterPosts();
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
        const visiblePosts = document.querySelectorAll('.is-visible');
        if (visiblePosts.length === 0) {
            noPosts.classList.remove('is-hidden');
            noPosts.classList.add('is-visible');
        } else {
            noPosts.classList.remove('is-visible');
            noPosts.classList.add('is-hidden');
        }
    }
</script>

<?php get_footer();

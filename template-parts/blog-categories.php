<div class="blog__categories" role="group" aria-label="Post category filters">
    <div class="categories__container">
        <button type="button" class="category__btn active" data-category="all">All Categories</button>

        <?php
        $year = $args['year'];

        include ( get_template_directory() . "/template-parts/blog-dates.php");

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
                'posts_per_page' => -1,
                'date_query' => $date_query,
            ));

            // If there are posts, display the category button
            if (!empty($posts_in_category)) { ?>
                <button type="button" class="category__btn" data-category="<?php echo $category->cat_ID ?>"><?php echo $category->name ?></button>
            <?php }

            // If there are posts o, add it to the array of categories for the select dropdown
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

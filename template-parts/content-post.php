<div class="post__item | active fade" data-category-id="<?php echo get_the_category()[0]->term_id; ?>">
    <h3 class="post__heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <div class="post__category">
        <p><?php echo get_the_category()[0]->name; ?></p>
    </div>
    <div class="post__date">
        <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('F jS, Y'); ?></time>
    </div>
</div>

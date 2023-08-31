<div class="post__item | active fade" data-category="<?php echo $category_id; ?>">
    <h3 class="post__heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <div class="post__category">
        <p><?php echo $category_name; ?></p>
    </div>
    <div class="post__date">
        <time datetime="<?php the_time('Y-m-d') ?>"><?php the_time('F jS, Y'); ?></time>
    </div>
</div>

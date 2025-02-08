<?php get_header(); ?>

<!-- front-page.php -->

<main id="site-main" class="site-main site-main--front-page">
    <section class="intro | wrap">
        <div class="intro__container | content width--x-large">
            <?php the_content(); ?>
        </div>
    </section>

    <section class="text-300--h2 | bg-main-alt mt-xx-large pbl-7">
        <div class="content width--x-large | post-feed-wrap">





<div class="post-feed post-feed--blips">
    <h2>Blips</h2>
    <?php
    $args = array(
        'post_type'      => 'blip',
        'posts_per_page' => 3,
        'order'          => 'DESC',
        'orderby'        => 'date'
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        echo '<div class="post-feed__items">';
        while ($query->have_posts()) : $query->the_post();
            ?>
            <div class="post-feed__item">
                <div <?php post_class('post-feed__post'); ?> id="post-<?php the_ID(); ?>"><?php the_content(); ?></div>
                <div class="post-feed__date"><time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('F j, Y'); ?></time></div>
            </div>
            <?php
        endwhile;
        echo '</div>';
    else :
        echo '<p>No posts found.</p>';
    endif;

    // Restore global post data
    wp_reset_postdata();
    ?>
</div>





<div class="post-feed post-feed--blog">
    <h2>Blog</h2>
    <?php
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 3,
        'order'          => 'DESC',
        'orderby'        => 'date'
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        echo '<div class="post-feed__items">';
        while ($query->have_posts()) : $query->the_post();
            ?>
            <div class="post-feed__item">
                <div <?php post_class('post-feed__post'); ?>><a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>"><?php the_title(); ?></a></div>
                <div class="post-feed__date"><time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('F j, Y'); ?></time></div>
            </div>
            <?php
        endwhile;
        echo '</div>';
    else :
        echo '<p>No blog posts found.</p>';
    endif;

    // Restore global post data
    wp_reset_postdata();
    ?>
</div>







<!--<h2>Blips - Options</h2>-->
<?php
// *********************************************
// Options: Blips
// *********************************************
// *********************************************
// IMPORTANT:
// Instead of using ACF Options perhaps you should be using ACF Post Types instead.
// *********************************************

/*

function render_blips($order = 'desc') // 'asc' or 'desc'
{
    $blips = get_field('blips', 'option');
    if (!$blips) {
        return;
    }

    // Sorting function
    usort($blips, function ($a, $b) use ($order) {
        $dateA = strtotime($a['blip_date']);
        $dateB = strtotime($b['blip_date']);

        if ($order === 'asc') {
            return $dateA <=> $dateB; // Ascending order
        } else {
            return $dateB <=> $dateA; // Descending order
        }
    });

    function render_blip($blip)
    {
        // Text
        $blip_text = $blip['blip_text'];
        
        // Date
        $blip_date = $blip['blip_date'];
        // Date formatting as 'Y-m-d'
        $blip_date_formatted = date('Y-m-d', strtotime($blip_date));
?>
        <?php if ($blip_text) : ?><div><?= $blip_text; ?></div><?php endif; ?>
        <?php if ($blip_date) : ?><div><time datetime="<?= $blip_date_formatted ?>"><?= $blip_date; ?></time></div><?php endif; ?>
        <hr>
<?php
    }

    foreach ($blips as $blip) {
        render_blip($blip);
    }
}

render_blips();

*/

?>







        </div>
    </section>
</main>

<?php get_footer();

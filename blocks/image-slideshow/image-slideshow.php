<?php
/**
 * Image Slideshow Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Retrieve the repeater field with all images
$images = get_field('images');

// Retrieve the slide interval setting
$slide_interval = get_field('slide_interval');
// Multiple the slide interval by 1000 to convert seconds to milliseconds
$slide_interval = ($slide_interval >= 1 && $slide_interval <= 20) ? $slide_interval * 1000 : $slide_interval;

$controls = get_field('controls');
if ($controls) :
    // Retrieve the Arrows setting
    $arrows = $controls['arrows'];

    // Retrieve the Arrows Style setting (as an array)
    $arrows_style = $controls['arrows_style'];
    // Construct the conditional class name using the selected value
    $arrows_style_class = ' slideshow__controls--' . $arrows_style;

    // Retrieve the Dots setting
    $dots = $controls['dots'];
endif;

$display = get_field('display');
if ($display) :
    // Retrieve the Image Shape setting
    $image_shape = $display['image_shape'];
    // Construct the conditional class name using the selected value
    $image_shape_class = ' slideshow--' . $image_shape;

    // Retrieve the Alignment setting
    $alignment = $display['alignment'];
    // Construct the conditional class name using the selected value
    $alignment_class = ' slideshow--' . $alignment;
endif;

if ($images) : ?>
    <div class="slideshow<?php if (!$image_shape == 0) echo esc_attr($image_shape_class); if (!$alignment ==0) echo esc_attr($alignment_class); ?>" data-interval="<?php echo esc_attr($slide_interval); ?>">
        <?php foreach ($images as $image) :
            if (!$image['image']) continue; // If no image, skip to next image (if any)
            $image = $image['image'];
            $image_url = $image['url'];
            $image_alt = $image['alt'];
        ?>
        <div class="slideshow__slide" data-status="active">
            <?php echo wp_get_attachment_image( $image['ID'], 'full', '', array( 'class' => 'highlighted-image__image__img' ) ); ?>
        </div>
        <?php endforeach;

        if ($arrows == 1) : ?>
        <div class="slideshow__controls<?php if (!$arrows_style == 0) echo esc_attr($arrows_style_class); ?>">
            <button class="slideshow__prev">Prev</button>
            <button class="slideshow__next">Next</button>
        </div>
        <?php endif;

        if ($dots == 1) : ?>
            <div class="slideshow__dots"></div>
        <?php endif; ?>
    </div>

    <?php
    // add JavaScript to Gutenberg Block Editor
    if (is_admin()) : ?>
        <script>
            (function () {
                var script = document.createElement('script');
                script.src = '<?php echo esc_url(get_template_directory_uri() . '/blocks/image-slideshow/image-slideshow.min.js'); ?>';
                document.head.appendChild(script);
            })();
        </script>
    <?php endif; ?>
<?php endif; ?>
<?php
/**
 * Image Slideshow Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Retrieve the repeater field with all images
$images = get_field('images');

// Retrieve the image shape setting (as an array)
$image_shape = get_field('image_shape');
// Construct the conditional class name using the selected value
$image_shape_class = ' slideshow--' . $image_shape;

// Retrieve the slide interval setting
$slide_interval = get_field('slide_interval');
// Multiple the slide interval by 1000 to convert seconds to milliseconds
$slide_interval = ($slide_interval >= 1 && $slide_interval <= 20) ? $slide_interval * 1000 : $slide_interval;

// Retrieve the Slideshow Controls setting
$slideshow_controls = get_field('slideshow_controls');

if ($images) : ?>
    <div class="slideshow<?php if (!$image_shape == 0) echo esc_attr($image_shape_class); ?>" data-interval="<?php echo esc_attr($slide_interval); ?>">
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

        if ($slideshow_controls == 1) : ?>
        <div class="slideshow__controls">
            <button class="slideshow__prev">Prev</button>
            <button class="slideshow__next">Next</button>
        </div>
        <?php endif; ?>

        <!--<div class="slideshow__dots"></div>-->
    </div>
<?php endif; ?>
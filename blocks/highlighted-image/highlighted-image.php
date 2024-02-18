<?php
/**
 * Highlighted Image Block template.
 *
 * @param array $block The block settings and attributes.
 */

 /***********************************
    NOTE: THIS IS READY FOR DELETION
    This block is no longer used. It has been replaced by the core 'group' and 'image' blocks.
    This block is only here for reference.
    Delete it when you feel like it's no longer needed.
 ***********************************/

// Load values and assign defaults.
$image             = get_field( 'image' );
$caption           = !empty(get_field( 'caption' )) ? get_field( 'caption' ) : 'Your text here...';
$arrange           = get_field( 'arrange' ); // ACF's radio button.

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'highlighted-image';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}
?>

<figure class="<?php echo esc_attr( $class_name ); ?>">
    <div class="highlighted-image__image">
        <?php echo wp_get_attachment_image( $image['ID'], 'full', '', array( 'class' => 'highlighted-image__image__img' ) ); ?>
    </div>

    <figcaption class="highlighted-image__caption">
        <?php echo esc_html( $caption ); ?>
    </figcaption>
</figure>
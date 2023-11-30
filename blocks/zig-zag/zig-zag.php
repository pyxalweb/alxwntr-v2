<?php
/**
 * Zig-Zag Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$zig_zag_text             = !empty(get_field( 'zig_zag_text' )) ? get_field( 'zig_zag_text' ) : 'Your text here...';
$image             = get_field( 'zig_zag_image' );
$background_color  = get_field( 'background_color' ); // ACF's color picker.
$text_color        = get_field( 'text_color' ); // ACF's color picker.

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'zig-zag';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}
if ( $background_color || $text_color ) {
    $class_name .= ' has-custom-acf-color';
}

// Build a valid style attribute for background and text colors.
$styles = array( 'background-color: ' . $background_color, 'color: ' . $text_color );
$style  = implode( '; ', $styles );
?>

<div class="<?php echo esc_attr( $class_name ); ?>" style="<?php echo esc_attr( $style ); ?>">
    <div class="zig-zag__text">
        <div class="zig-zag__text__inner">
            <?php echo esc_html( $zig_zag_text ); ?>
        </div>
    </div>

    <?php if ( $image ) : ?>
        <div class="zig-zag__image">
            <?php echo wp_get_attachment_image( $image['ID'], 'full', '', array( 'class' => 'zig-zag__image__img' ) ); ?>
        </div>
    <?php endif; ?>
</div>
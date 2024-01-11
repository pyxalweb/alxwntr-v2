<?php
/**
 * Link Button Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Retrieve the repeater field with all buttons
$buttons = get_field('buttons');

// Retrieve the mobile viewport width setting
$mobile_viewport_width = get_field('mobile_viewport_width');
// Construct the conditional class name
$mobile_class = ' button-container--vw' . $mobile_viewport_width . '-mobile';

// Retrieve the alignment setting
$alignment = get_field('alignment');
// Construct the conditional class name
$align_class = ' button-container--align-' . $alignment;

// Retrieve the margin group
$margin = get_field('margin');

if ($margin) :
    $margin_classes = '';

    // Retrieve the margin block setting
    $mbl = $margin['block'];
    if ($mbl) $margin_classes .= ' ' . $mbl;

    // Retrieve the margin top setting
    $mt = $margin['top'];
    if ($mt) $margin_classes .= ' ' . $mt;

    // Retrieve the margin bottom setting
    $mb = $margin['bottom'];
    if ($mb) $margin_classes .= ' ' . $mb;
endif;

// Retrieve the padding group
$padding = get_field('padding');

if ($padding) :
    $padding_classes = '';

    // Retrieve the padding block setting
    $pbl = $padding['block'];
    if ($pbl) $padding_classes .= ' ' . $pbl;

    // Retrieve the padding top setting
    $pt = $padding['top'];
    if ($pt) $padding_classes .= ' ' . $pt;

    // Retrieve the padding bottom setting
    $pb = $padding['bottom'];
    if ($pb) $padding_classes .= ' ' . $pb;
endif;

if ($buttons) : ?>
    <div class="button-container<?php if (!$mobile_viewport_width == 0) echo esc_attr($mobile_class); if (!$alignment == 0) echo esc_attr($align_class); if (!$margin_classes == '') echo esc_attr($margin_classes); if (!$padding_classes == '') echo esc_attr($padding_classes); ?>">
        <?php foreach ($buttons as $button) :
            if (!$button['link']) continue; // If no link, skip to next button (if any)
            $link = $button['link'];
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'];
        ?>
            <a class="button" href="<?php echo esc_url($link_url); ?>"<?php if ($link_target == '_blank') echo ' target="_blank" rel="noopener"'; ?>><?php echo esc_html($link_title); ?></a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
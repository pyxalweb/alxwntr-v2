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

// Retrieve the margin block setting
$mbl = get_field('margin_block');
// Construct the conditional class name
$mbl = ' ' . $mbl;

// Retrieve the margin top setting
$mt = get_field('margin_top');
// Construct the conditional class name
$mt = ' ' . $mt;

// Retrieve the margin bottom setting
$mb = get_field('margin_bottom');
// Construct the conditional class name
$mb = ' ' . $mb;

// Retrieve the padding block setting
$pbl = get_field('padding_block');
// Construct the conditional class name
$pbl = ' ' . $pbl;

// Retrieve the padding top setting
$pt = get_field('padding_top');
// Construct the conditional class name
$pt = ' ' . $pt;

// Retrieve the padding bottom setting
$pb = get_field('padding_bottom');
// Construct the conditional class name
$pb = ' ' . $pb;

if ($buttons) : ?>
    <div class="button-container<?php if (!$mobile_viewport_width == 0) echo esc_attr($mobile_class); if (!$alignment == 0) echo esc_attr($align_class); if (!$mbl == 0) echo esc_attr($mbl); if (!$mt == 0) echo esc_attr($mt); if (!$mb == 0) echo esc_attr($mb); if (!$pbl == 0) echo esc_attr($pbl); if (!$pt == 0) echo esc_attr($pt); if (!$pb == 0) echo esc_attr($pb); ?>">
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
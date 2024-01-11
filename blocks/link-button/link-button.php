<?php
/**
 * Link Button Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Label: Buttons
// Type: Repeater
// Purpose: Contains the buttons
$buttons = get_field('buttons');

// Label: Alignment
// Type: Select
// Purpose: Assigns class to 'button-container' element which determines what to set the 'justify-content' to, which aligns the buttons horizontally
$alignment = get_field('alignment');
$align_class = '';
if ($alignment) $align_class = ' button-container--align-' . $alignment;

// Label: Margin
// Type: Group
// Purpose: Contains the various margin settings fields which are assigned to the 'button-container' element
$margin = get_field('margin');
$margin_classes = '';

$mt = $margin['top'];
if ($mt) $margin_classes .= ' ' . $mt;

$mb = $margin['bottom'];
if ($mb) $margin_classes .= ' ' . $mb;

$mbl = $margin['block'];
if ($mbl) $margin_classes .= ' ' . $mbl;

// Label: Padding
// Type: Group
// Purpose: Contains the various padding settings fields which are assigned to the 'button-container' element
$padding = get_field('padding');
$padding_classes = '';

$pt = $padding['top'];
if ($pt) $padding_classes .= ' ' . $pt;

$pb = $padding['bottom'];
if ($pb) $padding_classes .= ' ' . $pb;

$pbl = $padding['block'];
if ($pbl) $padding_classes .= ' ' . $pbl;

// Label: Mobile Stack Vertically
// Type: Select
// Purpose: Assigns class to 'button-container' element which determines which viewport to change the 'flex-direction' to 'column', which stacks the buttons vertically
$mobile_stack_vertically = get_field('mobile_stack_vertically');
$mobile_class = '';
if ($mobile_stack_vertically) $mobile_class = ' button-container--vw' . $mobile_stack_vertically . '-mobile';

// build the markup
if ($buttons) : ?>
    <div class="button-container<?php if (!$mobile_stack_vertically == '') echo esc_attr($mobile_class); if (!$alignment == '') echo esc_attr($align_class); if (!$margin_classes == '') echo esc_attr($margin_classes); if (!$padding_classes == '') echo esc_attr($padding_classes); ?>">
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
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

if ($buttons) : ?>
    <div class="button-container<?php if (!$mobile_viewport_width == 0) echo esc_attr($mobile_class); ?>">
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

<?php
/**
 * Status Block template.
 *
 * @param array $block The block settings and attributes.
 */

$status_color = get_field('status_color');
$status_text = get_field('status_text');

if ($status_color == 'green') {
    $status_color_class = ' status--green';
} elseif ($status_color == 'yellow') {
    $status_color_class = ' status--yellow';
} elseif ($status_color == 'red') {
    $status_color_class = ' status--red';
} else {
    $status_color_class = '';
}
?>

<div class="status<?php echo esc_attr($status_color_class); ?>">
    <span></span>
    <p><?php echo esc_html($status_text); ?></p>
</div>

<?php
/**
 * Portfolio Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Retrieve the repeater field with all images
$portfolio = get_field('portfolio');

if ($portfolio) : ?>
    <div class="portfolio__items">
        <?php foreach ($portfolio as $portfolio_item) :
            if (!$portfolio_item['project_name'] | !$portfolio_item['project_url'] | !$portfolio_item['project_screenshot']) continue; // If no content, skip to next (if any)
            $project_name = $portfolio_item['project_name'];
            $project_url = $portfolio_item['project_url'];
            $project_screenshot = $portfolio_item['project_screenshot'];
        ?>
        <a class="portfolio__item <?php echo strtolower( preg_replace('/[^a-zA-Z0-9]/', '', $project_name) ); ?>" href="<?php echo esc_url( $project_url ); ?>" target="_blank" rel="noopener">
            <span><?php echo esc_html( $project_name ); ?></span>
            <img src="<?php echo esc_url($project_screenshot['url']); ?>" alt="<?php echo esc_attr($project_screenshot['alt']); ?>" />
        </a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

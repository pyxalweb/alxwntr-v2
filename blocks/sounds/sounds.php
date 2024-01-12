<?php
/**
 * Sounds Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Retrieve the repeater field with all images
$sounds = get_field('sounds');

if ($sounds) : ?>
    <div class="sounds">
        <?php foreach ($sounds as $sound) :
            if (!$sound['sound_name'] | !$sound['sound_url']) continue; // If no sound, skip to next sound (if any)
            $sound_name = $sound['sound_name'];
            $sound_url = $sound['sound_url'];
        ?>
        <div class="sounds__item <?php echo strtolower( preg_replace('/[^a-zA-Z0-9]/', '', $sound['sound_name']) ); ?>">
            <div class="sounds__name">
                <p><?php echo esc_html( $sound['sound_name'] ); ?></p>
            </div>
            <div class="sounds__btn">
                <a class="sounds__btn__download" href="<?php echo esc_url( $sound_url ); ?>" download><span>Download</span></a>
                <button class="sounds__btn__play"><span>Play</span></button>
                <audio>
                    <source src="<?php echo esc_url( $sound_url ); ?>" type="audio/wav">
                </audio>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

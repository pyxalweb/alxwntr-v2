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
                <a class="sounds__btn__download" aria-label="Download Sound" href="<?php echo esc_url( $sound_url ); ?>" download>
                    <svg xmlns="http://www.w3.org/2000/svg" height="44" width="44" viewBox="0 0 512 512">
                        <path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/>
                    </svg>
                </a>
                <button class="sounds__btn__play" aria-label="Play Sound">
                    <svg xmlns="http://www.w3.org/2000/svg" height="44" width="44" viewBox="0 0 512 512">
                        <path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM188.3 147.1c7.6-4.2 16.8-4.1 24.3 .5l144 88c7.1 4.4 11.5 12.1 11.5 20.5s-4.4 16.1-11.5 20.5l-144 88c-7.4 4.5-16.7 4.7-24.3 .5s-12.3-12.2-12.3-20.9V168c0-8.7 4.7-16.7 12.3-20.9z"/>
                    </svg>
                </button>
                <audio>
                    <source src="<?php echo esc_url( $sound_url ); ?>" type="audio/wav">
                </audio>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    
    <?php
    // add JavaScript to Gutenberg Block Editor
    if (is_admin()) : ?>
        <script>
            (function () {
                var script = document.createElement('script');
                script.src = '<?php echo esc_url(get_template_directory_uri() . '/blocks/sounds/sounds.min.js'); ?>';
                document.head.appendChild(script);
            })();
        </script>
    <?php endif; ?>
<?php endif; ?>

<?php get_header(); ?>

<main id="site-main" class="site-main">
    <section class="intro | wrap">
        <div class="intro__container | content width--x-large">
            <?php the_content(); ?>
        </div>
    </section>
</main>

<button class="light-mode" style="width:130px">Light Mode</button>
<button class="dark-mode" style="width:130px">Dark Mode</button>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const rootBody = document.body;

    // CSS Variables
    const wpPresetColorMain = '--wp--preset--color--main';
    const wpPresetColorMainAlt = '--wp--preset--color--main-alt';
    const wpPresetColorBase = '--wp--preset--color--base';
    const wpPresetColorGrey100 = '--wp--preset--color--grey-100';

    // Set default color values
    const default_wpPresetColorMain = getComputedStyle(document.documentElement).getPropertyValue(wpPresetColorMain);
    const default_wpPresetColorMainAlt = getComputedStyle(document.documentElement).getPropertyValue(wpPresetColorMainAlt);
    const default_wpPresetColorBase = getComputedStyle(document.documentElement).getPropertyValue(wpPresetColorBase);
    const default_wpPresetColorGrey100 = getComputedStyle(document.documentElement).getPropertyValue(wpPresetColorGrey100);

    // Add light mode styles
    const style = document.createElement('style');
    style.setAttribute('class', 'light-mode-style');
    document.head.appendChild(style);
    const styleElement = document.querySelector('.light-mode-style');

    // Set light mode color values
    light_wpPresetColorMain = '#ededed';
    light_wpPresetColorMainAlt = '#e0e0e0';
    light_wpPresetColorBase = '#000';
    light_wpPresetColorGrey100 = '#b8b8b8';

    document.querySelector('.light-mode').addEventListener('click', () => {
        // Set light mode color values
        rootBody.style.setProperty(wpPresetColorMain, light_wpPresetColorMain);
        rootBody.style.setProperty(wpPresetColorMainAlt, light_wpPresetColorMainAlt);
        rootBody.style.setProperty(wpPresetColorBase, light_wpPresetColorBase);
        rootBody.style.setProperty(wpPresetColorGrey100, light_wpPresetColorGrey100);

        // Add light mode styles
        style.innerHTML = '.header__navigation a:hover { color: #fff; }';
    });

    // Remove light mode styles
    document.querySelector('.dark-mode').addEventListener('click', () => {
        // Set dark mode (default) color values
        rootBody.style.setProperty(wpPresetColorMain, default_wpPresetColorMain);
        rootBody.style.setProperty(wpPresetColorMainAlt, default_wpPresetColorMainAlt);
        rootBody.style.setProperty(wpPresetColorBase, default_wpPresetColorBase);
        rootBody.style.setProperty(wpPresetColorGrey100, default_wpPresetColorGrey100);

        // Remove light mode styles
        styleElement.remove();
    });
});
</script>

<?php get_footer();

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
    const rootBody = document.body;

    // CSS Variables - 'Default' (Dark Mode)
    const wpPresetColorDefaultPrimary = '--wp--preset--color--primary';
    const wpPresetColorDefaultPrimaryRgb10 = '--wp--preset--color--primary-rgb-10';
    const wpPresetColorDefaultSecondary = '--wp--preset--color--secondary';
    const wpPresetColorDefaultTertiary = '--wp--preset--color--tertiary';
    const wpPresetColorDefault100 = '--wp--preset--color--100';
    const wpPresetColorDefault200 = '--wp--preset--color--200';
    const wpPresetColorDefault300 = '--wp--preset--color--300';
    const wpPresetColorDefaultMain = '--wp--preset--color--main';
    const wpPresetColorDefaultMainAlt = '--wp--preset--color--main-alt';
    const wpPresetColorDefaultBase = '--wp--preset--color--base';
    const wpPresetColorDefaultGrey100 = '--wp--preset--color--grey-100';
    const wpPresetColorDefaultGrey200 = '--wp--preset--color--grey-200';
    const wpPresetColorDefaultGrey300 = '--wp--preset--color--grey-300';
    const wpPresetGradientDefaultPrimary = '--wp--preset--gradient--primary';

    // CSS Variables - 'Light Mode'
    const wpPresetColorLightmodePrimary = '--wp--preset--color--lightmode--primary';
    const wpPresetColorLightmodePrimaryRgb10 = '--wp--preset--color--lightmode--primary-rgb-10';
    const wpPresetColorLightmodeSecondary = '--wp--preset--color--lightmode--secondary';
    const wpPresetColorLightmodeTertiary = '--wp--preset--color--lightmode--tertiary';
    const wpPresetColorLightmode100 = '--wp--preset--color--lightmode--100';
    const wpPresetColorLightmode200 = '--wp--preset--color--lightmode--200';
    const wpPresetColorLightmode300 = '--wp--preset--color--lightmode--300';
    const wpPresetColorLightmodeMain = '--wp--preset--color--lightmode--main';
    const wpPresetColorLightmodeMainAlt = '--wp--preset--color--lightmode--main-alt';
    const wpPresetColorLightmodeBase = '--wp--preset--color--lightmode--base';
    const wpPresetColorLightmodeGrey100 = '--wp--preset--color--lightmode--grey-100';
    const wpPresetColorLightmodeGrey200 = '--wp--preset--color--lightmode--grey-200';
    const wpPresetColorLightmodeGrey300 = '--wp--preset--color--lightmode--grey-300';
    const wpPresetGradientLightmodePrimary = '--wp--preset--gradient--lightmode--primary';

    // Create object for 'default' color values
    // and assign 'default' color values to object
    let defaultColors = {};
    function setDefaultColorValues(cssVariable) {
        defaultColors[cssVariable] = getComputedStyle(document.documentElement).getPropertyValue(cssVariable);
    }
    setDefaultColorValues(wpPresetColorDefaultMain);
    setDefaultColorValues(wpPresetColorDefaultMainAlt);
    setDefaultColorValues(wpPresetColorDefaultBase);
    setDefaultColorValues(wpPresetColorDefaultGrey100);
    console.log(defaultColors);

    // Create object for 'light mode' color values
    // and assign 'light mode' color values to object
    let lightColors = {};
    // Assign light mode color values to object
    function setLightColorValues(cssVariable) {
        lightColors[cssVariable] = getComputedStyle(document.documentElement).getPropertyValue(cssVariable);
    }
    setLightColorValues(wpPresetColorLightmodeMain);
    setLightColorValues(wpPresetColorLightmodeMainAlt);
    setLightColorValues(wpPresetColorLightmodeBase);
    setLightColorValues(wpPresetColorLightmodeGrey100);
    console.log(lightColors);

    // Additional styles for 'light mode'
    const style = document.createElement('style');
    style.setAttribute('class', 'light-mode-styles');
    document.head.appendChild(style);
    const lightModeStyles = document.querySelector('.light-mode-styles');

    function enableLightMode() {
        rootBody.style.setProperty('--wp--preset--color--main', lightColors['--wp--preset--color--lightmode--main']);
        rootBody.style.setProperty('--wp--preset--color--main-alt', lightColors['--wp--preset--color--lightmode--main-alt']);
        rootBody.style.setProperty('--wp--preset--color--base', lightColors['--wp--preset--color--lightmode--base']);
        rootBody.style.setProperty('--wp--preset--color--grey-100', lightColors['--wp--preset--color--lightmode--grey-100']);

        // Add 'light mode' styles
        lightModeStyles.innerHTML = `
            .header__navigation a:hover { color: #fff; }
        `;
    }

    function enableDefaultMode() {
        rootBody.style.setProperty('--wp--preset--color--main', defaultColors['--wp--preset--color--main']);
        rootBody.style.setProperty('--wp--preset--color--main-alt', defaultColors['--wp--preset--color--main-alt']);
        rootBody.style.setProperty('--wp--preset--color--base', defaultColors['--wp--preset--color--base']);
        rootBody.style.setProperty('--wp--preset--color--grey-100', defaultColors['--wp--preset--color--grey-100']);

        // Remove 'light mode' styles
        lightModeStyles.remove();
    }

    // Toggle 'light mode' CSS color values
    document.querySelector('.light-mode').addEventListener('click', () => {
        enableLightMode();
    });

    // Toggle 'default' (dark mode) CSS color values
    document.querySelector('.dark-mode').addEventListener('click', () => {
        enableDefaultMode();
    });
</script>

<?php get_footer();

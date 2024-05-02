<?php get_header(); ?>

<main id="site-main" class="site-main">
    <section class="intro | wrap">
        <div class="intro__container | content width--x-large">
            <?php the_content(); ?>
        </div>
    </section>
</main>

<button class="toggle-light-mode" style="width:130px">Light Mode</button>
<button class="toggle-dark-mode" style="width:130px">Dark Mode</button>

<script>
    // Cookie functions for theme toggle
    function setCookie(name, value, days) {
        let expires = "";
        if (days) {
            let date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    // Get cookie value
    function getCookie(name) {
        let nameEQ = name + "=";
        let ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    // Additional styles for 'light mode'
    const style = document.createElement('style');
    style.setAttribute('class', 'light-mode-styles');
    document.head.appendChild(style);
    const lightModeStyles = document.querySelector('.light-mode-styles');

    function enableLightMode() {
        document.documentElement.className = 'light-mode';

        // Add 'light mode' styles
        lightModeStyles.innerHTML = `
            .header__navigation a:hover { color: #fff; }
        `;

        setCookie('theme', 'light', 7);

        console.log('Light mode enabled')
    }

    function enableDefaultMode() {
        document.documentElement.className = 'dark-mode';

        // Remove 'light mode' styles
        lightModeStyles.remove();

        setCookie('theme', 'dark', 7);

        console.log('Default mode enabled')
    }

    // Check cookie on page load and set theme accordingly
    document.addEventListener('DOMContentLoaded', function() {
        const savedTheme = getCookie('theme');
        if (savedTheme === 'light') {
            enableLightMode();
        } else {
            enableDefaultMode();
        }

        document.querySelector('.toggle-light-mode').addEventListener('click', enableLightMode);
        document.querySelector('.toggle-dark-mode').addEventListener('click', enableDefaultMode);
    });
</script>

<?php get_footer();

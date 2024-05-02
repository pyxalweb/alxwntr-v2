<?php get_header(); ?>

<main id="site-main" class="site-main">
    <section class="intro | wrap">
        <div class="intro__container | content width--x-large">
            <?php the_content(); ?>
        </div>
    </section>
</main>

<button class="theme-toggle--light-mode" style="width:130px">Light Mode</button>
<button class="theme-toggle--dark-mode" style="width:130px">Dark Mode</button>

<script>
    // ***********************************
    //  Theme Toggle
    //  by Alex Winter - 2024-05-01 - v1.0
    // ***********************************

    // **************************
    //  Set and Get Cookie
    // **************************
    function setCookie(name, value, days) {
        let expires = "";
        if (days) {
            let date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }
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

    // **************************
    //  Light Mode
    // **************************
    function enableLightMode() {
        document.documentElement.className = 'light-mode';
        setCookie('theme', 'light', 7);
    }

    // **************************
    //  Dark Mode
    // **************************
    function enableDarkMode() {
        document.documentElement.className = 'dark-mode';
        setCookie('theme', 'dark', 7);
    }

    // **************************
    //  Check cookie on page load
    //  & listen for button clicks
    // **************************
    document.addEventListener('DOMContentLoaded', function() {
        const savedTheme = getCookie('theme');
        if (savedTheme === 'light') {
            enableLightMode();
        } else {
            enableDarkMode();
        }

        document.querySelector('.theme-toggle--light-mode').addEventListener('click', enableLightMode);
        document.querySelector('.theme-toggle--dark-mode').addEventListener('click', enableDarkMode);
    });
</script>

<?php get_footer();

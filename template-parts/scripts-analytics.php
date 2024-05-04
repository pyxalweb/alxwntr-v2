<?php
    // if the URL ends in '.local', don't load Google Analytics
    if (strpos($_SERVER['HTTP_HOST'], '.local') === false) {
?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GMLJF7GTXY"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-GMLJF7GTXY');
    </script>
<?php
    };
 ?>
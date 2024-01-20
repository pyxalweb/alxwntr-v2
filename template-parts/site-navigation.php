<div class="header__navigation">
    <?php
    wp_nav_menu( array(
        'menu' => 15,
        'container' => 'nav'
        // 'exclude' => '345', // hide page-item-345 (homepage) from the menu
        // 'theme_location' => 'menu-1', // Replace with the location of your menu
        // 'menu_class' => '', // Add a class to the parent <ul> wrapper
        // 'list_item_class' => 'nav-item', // Add a class to all <li> elements
        // 'link_class' => 'nav-link' // Add a class to all <a> elements
    ));
    ?>
</div>

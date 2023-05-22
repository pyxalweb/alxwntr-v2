<?php
wp_nav_menu( array(
    'theme_location' => 'menu-1', // Replace with the location of your menu
    'container' => 'nav', // Remove the <div> wrapper
    'menu_class' => '', // Add a class to the parent <ul> wrapper
    'list_item_class' => 'nav-item', // Add a class to all <li> elements
    'link_class' => 'nav-link' // Add a class to all <a> elements
    // TODO: Figure out how to add a class to the second level (dropdown) <ul> element
));
?>

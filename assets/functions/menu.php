<?php

register_nav_menus(array(
    'primary' => __('Main Menu', 'erik-reart'),
    'secondary' => __('Secondary Menu', 'erik-reart'),
));



// Add Foundation active class to menu
function required_active_nav_class( $classes, $item ) {
    if ( $item->current == 1 || $item->current_item_ancestor == true ) {
        $classes[] = 'active';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'required_active_nav_class', 10, 2 );

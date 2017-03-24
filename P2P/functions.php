<?php

add_theme_support( 'post-thumbnails', array( 'post', 'page') );

add_action('after_setup_theme', function(){
  register_nav_menus(array(
    'header_menu' => 'Header Menu',
    'footer_menu' => 'Footer Menu'
    ));
});


add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
    if( in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}



<?php

add_action('after_setup_theme', function(){
	register_nav_menus( array(
		'header_menu' => 'Header Menu',
		'footer_menu' => 'Footer Menu'
	) );
});

add_theme_support( 'post-thumbnails' );


function register_my_widgets(){
	register_sidebar( array(
		'name' => "Footer menu",
		'id' => 'footer_sidebar',
		'description' => 'Footer widgets',
		'before_widget' => '<div class="col-xs-12 col-sm-6 col-md-3 widget bottom-xs-pad-20">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title"><h3>',
		'after_title' => '</h3></div>'
	) );
	register_sidebar( array(
		'name' => "Right sidebar",
		'id' => 'right_sidebar',
		'description' => 'Right widgets',
		'before_widget' => '<div class="col-md-4">',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5>'
	) );
	
	register_sidebar( array(
		'name' => "Sidebar",
		'id' => '_sidebar',
		'description' => 'Widgets',
		'before_widget' => '<div class="col-md-4">',
		'after_widget' => '</div>',
		'before_title' => '<h5>',
		'after_title' => '</h5>'
	) );

}
add_action( 'widgets_init', 'register_my_widgets' );


class Delight_Walker_Menu extends Walker_Nav_Menu
{
var $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class='nav__drop'>\n";
  }

  function end_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "$indent</ul>\n";
  }

  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

    global $wp_query;
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
    $class_names = $value = ''; 
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;

    if(in_array('current-menu-item', $classes)) {
      $classes[] = 'current';
      unset($classes['current-menu-item']);
    }

    $children = get_posts(array('post_type' => 'nav_menu_item', 'nopaging' => true, 'numberposts' => 1, 'meta_key' => '_menu_item_menu_item_parent', 'meta_value' => $item->ID));
    if (!empty($children)) {
      $classes[] = '';
    }

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

    $output .= $indent . '<li' . $id . $value . $class_names .'>';

    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    $item_output .= '<span class="icon-right-open"></span></a>';
    $item_output .= $args->after;

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }

  function end_el( &$output, $item, $depth = 0, $args = array() ) {
    $output .= "</li>\n";
  }
}

function wp_nav_menu_no_ul()
{
    $options = array(
        'echo' => false,
        'container' => false,
        'theme_location' => 'footer_menu',
        'fallback_cb'=> 'default_page_menu'
    );

    $menu = wp_nav_menu($options);
    echo preg_replace(array(
        '#^<ul[^>]*>#',
        '#</ul>$#'
    ), '', $menu);

}

function default_page_menu() {
   wp_list_pages('title_li=');
} 

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}
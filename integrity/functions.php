<?php

add_action('after_setup_theme', function(){
	register_nav_menus( array(
		'header_menu' => 'Header Menu',
		'footer_menu' => 'Footer Menu'
	) );
});



add_theme_support( 'post-thumbnails' );
add_image_size( 'custom-size', 792, 550 );

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


function add_first_and_last($output) {
  $output = preg_replace('/class="menu-item/', 'class="menu-home menu-item', $output, 1);
  $output = substr_replace($output, 'class="last menu-item', strripos($output, 'class="menu-item'), strlen('class="menu-item'));
  return $output;
}
add_filter('wp_nav_menu', 'add_first_and_last');

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}

function filter_image_send_to_editor($html, $id, $caption, $title, $align, $url, $size, $alt) {
  $html = str_replace('<img ', '<img id="single_2" ', $html);

  return $html;
}
add_filter('image_send_to_editor', 'filter_image_send_to_editor', 10, 8);

add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );

function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}


add_filter( 'post_thumbnail_size', function( $size )
 {
     if( is_string( $size ) && 'full' === $size )
         add_filter( 
             'wp_calculate_image_srcset_meta',  
              '__return_null_and_remove_current_filter' 
         );   
    return $size;
 } );

// Would be handy, in this example, to have this as a core function ;-)
function __return_null_and_remove_current_filter ( $var )
{
    remove_filter( current_filter(), __FUNCTION__ );
    return null;
}

add_filter( 'wp_list_categories', 'filter_categories' );
function filter_categories( $html ) {
    $html = preg_replace( '/cat-item\scat-item-(.?[0-9])\s/', '', $html );
    $html = preg_replace( '/current-cat/', 'current', $html );
    $html = preg_replace( '/\sclass="cat-item\scat-item-(.?[0-9])"/', '', $html );
    $html = preg_replace( '/\stitle="(.*?)"/', '', $html );
    $html = preg_replace( '/\sclass=\'children\'/', '', $html );
		
    return $html;
}

add_filter('the_content', 'remove_empty_p', 20, 1);
function remove_empty_p($content){
    $content = force_balance_tags($content);
    return preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);
}


function wpb_alter_comment_form_fields($fields) {
    unset($fields['author']);
    unset($fields['email']);
    unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields', 'wpb_alter_comment_form_fields'); 

function add_googleplusone() {
echo '<script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script>';
}
add_action('wp_footer', 'add_googleplusone');


add_action( 'init', 'tech_init' );

function tech_init() {
	$labels = array(
		'name'               => _x( 'Technology', 'post type general name', 'integrity' ),
		'singular_name'      => _x( 'Technology', 'post type singular name', 'integrity' ),
		'menu_name'          => _x( 'Technology', 'admin menu', 'integrity' ),
		'name_admin_bar'     => _x( 'Technology', 'add new on admin bar', 'integrity' ),
		'add_new'            => _x( 'Add New', 'products', 'integrity' ),
		'add_new_item'       => __( 'Add New Technology', 'integrity' ),
		'new_item'           => __( 'New Technology', 'integrity' ),
		'edit_item'          => __( 'Edit Technology', 'integrity' ),
		'view_item'          => __( 'View Technology', 'integrity' ),
		'all_items'          => __( 'All Technology', 'integrity' ),
		'search_items'       => __( 'Search Technology', 'integrity' ),
		'parent_item_colon'  => __( 'Parent Technology:', 'integrity' ),
		'not_found'          => __( 'No Technology found.', 'integrity' ),
		'not_found_in_trash' => __( 'No Technology found in Trash.', 'integrity' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'tech' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type( 'technology', $args );
}

function kia_add_favicon(){ ?>
    <!-- Custom Favicons -->
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri();?>/img/Icon-32x32.png"/>
    <?php }
add_action('wp_head','kia_add_favicon');
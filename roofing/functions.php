<?php

function theme_name_scripts() {
	//Font Awesome Icons
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/css/font-awesome.min.css' );
	wp_enqueue_style( 'font-awesome1', get_template_directory_uri() .'/css/font-awesome.css' );
	//Bootstrap core CSS
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/css/bootstrap.min.css' );
	wp_enqueue_style( 'hover-dropdown-menu', get_template_directory_uri() .'/css/hover-dropdown-menu.css' );
	//Icomoon Icons
	wp_enqueue_style( 'icons', get_template_directory_uri() .'/css/icons.css' );
	// Revolution Slider
	wp_enqueue_style( 'revolution-slider', get_template_directory_uri() .'/css/revolution-slider.css' );
	wp_enqueue_style( 'settings', get_template_directory_uri() .'/rs-plugin/css/settings.css' );
	//Animations
	wp_enqueue_style( 'animate', get_template_directory_uri() .'/css/animate.min.css' );
	//Owl Carousel Slider
	wp_enqueue_style( 'carousel', get_template_directory_uri() .'/css/owl/owl.carousel.css' );
	wp_enqueue_style( 'theme', get_template_directory_uri() .'/css/owl/owl.theme.css' );
	wp_enqueue_style( 'transitions', get_template_directory_uri() .'/css/owl/owl.transitions.css' );
	//PrettyPhoto Popup
	wp_enqueue_style( 'prettyPhoto', get_template_directory_uri() .'/css/prettyPhoto.css' );

	//Custom Style 
	wp_enqueue_style( 'style', get_template_directory_uri() .'/css/style.css' );
	wp_enqueue_style( 'responsive', get_template_directory_uri() .'/css/responsive.css' );

	//Color Scheme
	wp_enqueue_style( 'color', get_template_directory_uri() .'/css/color.css' );


	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'hover-dropdown-menu', get_template_directory_uri() . '/js/hover-dropdown-menu.js', array(), '1.0.0', true );
	wp_enqueue_script( 'jquery.hover-dropdown-menu-addon', get_template_directory_uri() . '/js/jquery.hover-dropdown-menu-addon.js', array(), '1.0.0', true );
	wp_enqueue_script( 'jquery.easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array(), '1.0.0', true );
	wp_enqueue_script( 'jquery.sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array(), '1.0.0', true );
	wp_enqueue_script( 'bootstrapValidator', get_template_directory_uri() . '/js/bootstrapValidator.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'jquery.themepunch.tools', get_template_directory_uri() . '/rs-plugin/js/jquery.themepunch.tools.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'jquery.themepunch.revolution', get_template_directory_uri() . '/rs-plugin/js/jquery.themepunch.revolution.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'revolution', get_template_directory_uri() . '/js/revolution-custom.js', array(), '1.0.0', true );
	wp_enqueue_script( 'mixitup', get_template_directory_uri() . '/js/jquery.mixitup.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'appear', get_template_directory_uri() . '/js/jquery.appear.js', array(), '1.0.0', true );
	wp_enqueue_script( 'effect', get_template_directory_uri() . '/js/effect.js', array(), '1.0.0', true );
	wp_enqueue_script( 'carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array(), '1.0.0', true );
	wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/jquery.parallax-1.1.3.js', array(), '1.0.0', true );
	wp_enqueue_script( 'countTo', get_template_directory_uri() . '/js/jquery.countTo.js', array(), '1.0.0', true );
	wp_enqueue_script( 'carousel1', get_template_directory_uri() . '/js/tweet/carousel.js', array(), '1.0.0', true );
	wp_enqueue_script( 'tweet_scripts', get_template_directory_uri() . '/js/tweet/scripts.js', array(), '1.0.0', true );
	wp_enqueue_script( 'tweet_tweetie', get_template_directory_uri() . '/js/tweet/tweetie.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'easypiechart', get_template_directory_uri() . '/js/jquery.easypiechart.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'YTPlayer', get_template_directory_uri() . '/js/jquery.mb.YTPlayer.js', array(), '1.0.0', true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );





add_action('after_setup_theme', function(){
	register_nav_menus( array(
		'header_menu' => 'Header Menu',
		'footer_menu' => 'Footer Menu'
	) );
});




class custom_classes_sub_menu extends Walker_Nav_Menu {

	function start_lvl( &$output, $depth ) {
		$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' );
		$display_depth = ( $depth + 1);
		$classes = array(
			'sub-menu',
			( $display_depth % 2  ? 'dropdown-menu' : 'menu-even' ),
			( $display_depth >=2 ? 'sub-sub-menu' : '' ),
			'menu-depth-' . $display_depth
			);
		$class_names = implode( ' ', $classes );

		// build html
		$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
	}
}



add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

add_filter('excerpt_more', function($more) {
	return '...';
});

function new_excerpt_length($length) {
	return 278;
}
add_filter('excerpt_length', 'new_excerpt_length');

add_theme_support( 'post-thumbnails' );





add_action('init', 'my_custom_init');
function my_custom_init()
{
  $labels = array(
	'name' => 'Revieuws ', 
	'singular_name' => 'Revieuws', 
	'add_new' => 'Add new',
	'add_new_item' => 'Add new Revieuws',
	'edit_item' => 'Update Revieuws',
	'new_item' => 'New Revieuws',
	'view_item' => 'View Revieuws',
	'search_items' => 'Search Revieuws',
	'not_found' =>  'Revieuws not found',
	'not_found_in_trash' => 'Not Revieuws in trash',
	'parent_item_colon' => '',
	'menu_name' => 'Revieuws'

  );
  $args = array(
	'labels' => $labels,
	'public' => true,
	'publicly_queryable' => true,
	'show_ui' => true,
	'show_in_menu' => true,
	'query_var' => true,
	'rewrite' => true,
	'capability_type' => 'post',
	'has_archive' => true,
	'hierarchical' => false,
	'menu_position' => null,
	'supports' => array('title','editor','author','thumbnail','excerpt','comments')
  );
  register_post_type('news', $args);
}


add_action('init', 'create_taxonomy');
function create_taxonomy(){
	$labels = array(
		'name'              => 'News category',
		'singular_name'     => 'News category',
		'search_items'      => 'Search News category',
		'all_items'         => 'All News category',
		'parent_item'       => 'Parent News category',
		'parent_item_colon' => 'Parent News category:',
		'edit_item'         => 'Edit News category',
		'update_item'       => 'Update News category',
		'add_new_item'      => 'Add New News category',
		'new_item_name'     => 'New News category Name',
		'menu_name'         => 'News category',
	); 

	$args = array(
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => $labels,
		'public'                => true,
		'show_in_nav_menus'     => true, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_tagcloud'         => true, // равен аргументу show_ui
		'hierarchical'          => false,
		'update_count_callback' => '',
		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
		'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
		'_builtin'              => false,
		'show_in_quick_edit'    => null, // по умолчанию значение show_ui
	);
	register_taxonomy('category_news', array('news'), $args );
}



// Breadcrumbs

function custom_breadcrumbs() {
       
    // Settings
    $separator          = '';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumb';
    $home_title         = 'Home';
      
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'category_news';
       
    // Get the query & post information
    global $post,$wp_query;
       
    // Do not display on the homepage
    if ( !is_front_page() ) {
       
        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
           
        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        // echo '<li class="separator separator-home"> ' . $separator . ' </li>';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
              
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
              
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                // echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
              
        } else if ( is_single() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                // echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            // Get post category info
            $category = get_the_category();
             
            if(!empty($category)) {
              
                // Get last category post is in
                $last_category = end(array_values($category));
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                    // $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }
             
            }
              
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                   
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               
            }
              
            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                  
                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                // echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
              
            } else {
                  
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            }
              
        } else if ( is_category() ) {
               
            // Category page
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
               
        } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents in the right order
                $anc = array_reverse($anc);
                   
                // Parent page loop
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    // $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }
                   
                // Display parent pages
                echo $parents;
                   
                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
                   
            } else {
                   
                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
                   
            }
               
        } else if ( is_tag() ) {
               
            // Tag page
               
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
           
        } elseif ( is_day() ) {
               
            // Day archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            // echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            // echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
               
            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_month() ) {
               
            // Month Archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            // echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_year() ) {
               
            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
               
        } else if ( is_author() ) {
               
            // Auhor archive
               
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
               
            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
           
        } else if ( get_query_var('paged') ) {
               
            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
               
        } else if ( is_search() ) {
           
            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
           
        } elseif ( is_404() ) {
               
            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }
       
        echo '</ul>';
           
    }
       
}


function sendMailContactPage($post)
{
	$mail_c = false;

	if (!empty($post)) {
		
		//$admin_email = get_option('admin_email');
		$admin_email = 'info@rhdakwerken.nl';
		$subject = get_option('blogname').', Contact page.';
		$message = '
		<html>
			<head>
		  		<title>'.$subject.'</title>
			</head>
			<body>
			  	<p>'.$subject.'</p>
			  	<table>
			    	<div>
			    		<p>Naam: '.$_POST['contact_name'].'</p><br/>
			    		<p>E-mail: '.$_POST['contact_email'].'</p><br/>
			    		<p>Telefoonnummer: '.$_POST['contact_phone'].'</p><br/>
			    		<p>Сontact message: '.$_POST['contact_message'].'</p><br/>
			    	</div>
			  	</table>
			</body>
		</html>
			';
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$mail_c = mail($admin_email, $subject, $message, $headers);
		
		

		
	}
	if($mail_c) {
		  header("Location: http://google.com");
		  exit();
		} 

	return $mail_c;
	
}


/* function sendMailOfertePage($post)
{
	$mail_c = false;

	if (!empty($post)) {
		//$admin_email = get_option('admin_email');
		//$admin_email = 'info@rhdakwerken.nl';
		$admin_email = 'wp.dev.morgan@gmail.com';
		$subject = get_option('blogname').', Offerte page.';
		$message = '
		<html>
			<head>
		  		<title>'.$subject.'</title>
			</head>
			<body>
			  	<p>'.$subject.'</p>
			  	<table>
			    	<div>
			    		<p>Naam: '.$_POST['oferte_name'].'</p>
			    		<p>E-mail: '.$_POST['oferte_email'].'</p>
			    		<p>Telefoonnummer: '.$_POST['oferte_tel'].'</p>
			    		<p>Postcode: '.$_POST['oferte_postcode'].'</p>
			    		<p>Adres: '.$_POST['oferte_adres'].'</p>
			    		<p>Woonplaats: '.$_POST['oferte_woon'].'</p>
			    		<p>Type werkzaamheden: '.$_POST['oferte_werk'].'</p>
			    		<p>Opmerking/Vraag: '.$_POST['oferte_masage'].'</p>
			    	</div>
			  	</table>
			</body>
		</html>
			';
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$mail_c = mail($admin_email, $subject, $message, $headers);
	}

	return $mail_c;
} */


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
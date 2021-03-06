<?php
/**
 * @package Basis
 */

/**
 * The current version of the theme.
 *
 * @since 1.0.
 */
define( 'BASIS_VERSION', '1.0.16' );

// Set the theme's content width.
if ( ! isset( $content_width ) ) {
	$content_width = 610;
}

if ( ! function_exists( 'basis_setup' ) ) :
/**
 * Set up your theme here
 *
 * @since 1.0.
 */
function basis_setup() {
	// The the theme's text domain
	load_theme_textdomain( 'basis', get_template_directory() . '/includes' );

	// General Includes
	require( get_template_directory() . '/functions/logo.php' );
	require( get_template_directory() . '/functions/options-helpers.php' );
	require( get_template_directory() . '/functions/options.php' );

	// Admin-only includes
	if ( is_admin() ) {
		require( get_template_directory() . '/functions/help.php' );
		require( get_template_directory() . '/includes/html-builder/html-builder.php' );
		require( get_template_directory() . '/functions/tinymce.php' );

		// Load the unboxing files; wrapping in a "file_exists" as it is a submodule, and the file may go missing
		if ( file_exists( get_template_directory() . '/includes/unbox/unbox.php' ) ) {
			require( get_template_directory() . '/includes/unbox/unbox.php' );
		}
	}

	// WPCOM conditional includes
	if ( basis_is_wpcom() ) {
		require( get_template_directory() . '/functions/functions-wpcom.php' );
	} else {
		require( get_template_directory() . '/functions/avatar.php' );
	}

	// Image sizes
	add_image_size( 'basis-featured-page'   ,  940, 9999 );
	add_image_size( 'basis-featured-archive',  720,  480, true ); // 3:2 image ratio
	add_image_size( 'basis-featured-single' , 1290,  860, true );  // 3:2 image ratio
	add_image_size( 'basis-homepage'        , 1440, 1440 );

	// Post Thumbnails
	add_theme_support( 'post-thumbnails' );

	// Feed Links
	add_theme_support( 'automatic-feed-links' );

	// Custom background
	add_theme_support( 'custom-background' );

	// Add the theme's editor style
	add_editor_style( 'includes/stylesheets/editor-style.css' );

	// Register Nav Menu
	register_nav_menus( array(
		'header' => __( 'Header Menu', 'basis' )
	) );

	// Infinite Scroll support
	add_theme_support( 'infinite-scroll', array(
		'container'      => 'posts-container',
		'footer_widgets' => array( 'footer-left', 'footer-right' ),
		'render'         => 'basis_infinite_scroll_render'
	) );

	// Set up the theme colors for WordPress.com
	if ( basis_is_wpcom() ) {
		global $themecolors;
		$themecolors = array(
			'bg'     => 'fefefe',
			'border' => 'f3f4f5',
			'text'   => '484b50',
			'link'   => '18a374',
			'url'    => '18a374',
		);
	}
}
endif;

add_action( 'after_setup_theme', 'basis_setup' );

if ( ! function_exists( 'basis_register_sidebars' ) ) :
/**
 * Register the sidebars.
 *
 * @since  1.0.
 *
 * @return void
 */
function basis_register_sidebars() {
	register_sidebar( array(
		'id'            => 'sidebar-1',
		'name'          => __( 'Blog Sidebar', 'basis' ),
		'description'   => __( 'Widgets placed here will appear in a sidebar to the right of your content on the blog. If you do not place any widgets here, no sidebar will be shown, and the blog will use a full-width layout.', 'basis' ),
		'before_widget' => '<div id="%1$s" class="widget sidebar-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle sidebar-widgettitle">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'id'            => 'sidebar-page',
		'name'          => __( 'Page Sidebar', 'basis' ),
		'description'   => __( 'Widgets placed here will appear in a sidebar to the right of your content on pages. If you do not place any widgets here, no sidebar will be shown.', 'basis' ),
		'before_widget' => '<div id="%1$s" class="widget sidebar-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle sidebar-widgettitle">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'id'            => 'footer-left',
		'name'          => __( 'Left Footer Column', 'basis' ),
		'description'   => __( 'Widgets placed here will appear in the left column of your site footer.', 'basis' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle footer-widgettitle">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'id'            => 'footer-right',
		'name'          => __( 'Right Footer Column', 'basis' ),
		'description'   => __( 'Widgets placed here will appear in the right column of your site footer.', 'basis' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle footer-widgettitle">',
		'after_title'   => '</h3>',
	) );
}
endif;

add_action( 'widgets_init', 'basis_register_sidebars' );

if ( ! function_exists( 'basis_content_width' ) ) :
/**
 * Adjusts content_width value for templates.
 *
 * @since  1.0
 *
 * @return void
 */
function basis_content_width() {
	global $content_width;

	if ( is_page() && ! basis_is_sidebar_view() ) {
		$content_width = 940;
	}
}
endif;

add_action( 'template_redirect', 'basis_content_width' );

if ( ! function_exists( 'basis_enqueue_scripts' ) ) :
/**
 * Enqueue frontend styles and scripts
 *
 * @since  1.0.
 *
 * @return void
 */
function basis_enqueue_scripts() {
	// Suffix for minified script versions
	$sfx = ( basis_is_wpcom() || ( defined( 'WP_DEBUG' ) && true === WP_DEBUG ) ) ? '' : '.min';
	define( 'BASIS_SCRIPT_SUFFIX', $sfx );

	// Dependencies arrays
	$style_dependencies = array();
	$script_dependencies = array( 'jquery' );

	/**
	 * Translators: If there are characters in your language that are not supported by one of the Google Fonts,
	 * translate the corresponding translation string to 'off'. Do not translate into your own language.
	 */
	$fonts = array();
	if ( 'off' !== _x( 'on', 'Arimo font: on or off', 'basis' ) ) {
		$fonts[] = 'Arimo:400,700,400italic,700italic';
	}

	if ( ! empty( $fonts ) ) {
		// Use Google Fonts url style to append fonts
		$fonts = implode( '|', $fonts );

		// Enqueue the fonts
		wp_enqueue_style(
			'basis-google-fonts',
			'//fonts.googleapis.com/css?family=' . $fonts,
			array(),
			BASIS_VERSION
		);

		$style_dependencies[] = 'basis-google-fonts';
	}

	// Main stylesheet
	wp_enqueue_style(
		'basis-style',
		get_stylesheet_directory_uri() . '/style.css',
		$style_dependencies,
		BASIS_VERSION,
		'screen'
	);
	
	// Add the print styles
	wp_enqueue_style(
		'basis-print-style',
		get_template_directory_uri() . '/includes/stylesheets/print-styles.css',
		array( 'basis-style' ),
		BASIS_VERSION,
		'print'
	);

	// Responsive nav script is used only if the header is shown
	if ( true === basis_show_header() ) {
		wp_enqueue_script(
			'basis-responsive-nav',
			get_template_directory_uri() . '/includes/javascripts/responsive-nav/responsive-nav' . BASIS_SCRIPT_SUFFIX . '.js',
			array( 'jquery' ),
			'1.0.17',
			true
		);
		$script_dependencies[] = 'basis-responsive-nav';

		// Send args to the responsive-nav script
		wp_localize_script(
			'basis-responsive-nav',
			'basisResponsiveNavOptions',
			basis_get_responsive_nav_options()
		);
	}

	// Enqueue FitVids
	basis_fitvids_script_setup( 'basis-fitvids' );
	$script_dependencies[] = 'basis-fitvids';

	// Enqueue slideshow scripts only on pages with the Slideshow template
	if ( 'slideshow.php' === get_page_template_slug() ) {
		// Main slideshow script
		wp_enqueue_script(
			'basis-slideshow',
			get_template_directory_uri() . '/includes/javascripts/cycle2/jquery.cycle2' . BASIS_SCRIPT_SUFFIX . '.js',
			array( 'jquery', 'jquery-effects-core' ),
			'20131005',
			true
		);
		$script_dependencies[] = 'basis-slideshow';
		// Add swipe functionality
		wp_enqueue_script(
			'basis-slideshow-swipe',
			get_template_directory_uri() . '/includes/javascripts/cycle2/jquery.cycle2.swipe' . BASIS_SCRIPT_SUFFIX . '.js',
			array( 'jquery', 'jquery-effects-core', 'basis-slideshow' ),
			'20121120',
			true
		);
		$script_dependencies[] = 'basis-slideshow-swipe';
	}

	// General theme script
	wp_enqueue_script(
		'basis-javascript',
		get_template_directory_uri() . '/javascripts/theme.js',
		$script_dependencies,
		BASIS_VERSION,
		true
	);

	// Comment script
	if ( ! is_admin() && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
endif;

add_action( 'wp_enqueue_scripts', 'basis_enqueue_scripts' );

if ( ! function_exists( 'basis_title_tag' ) ) :
/**
 * Filter: Enhance the title tag.
 *
 * @since 1.0.
 *
 * @param  string    $title          The title of the current post/page
 * @param  string    $sep            The separator
 * @param  string    $seplocation    The location of the separator (right or left)
 * @return string                    The modified title
 */
function basis_title_tag( $title, $sep = '&raquo;', $seplocation = null ) {
	// We don't want to affect RSS feeds
	if ( is_feed() ) {
		return $title;
	}

	global $page, $paged;
	$site_label = get_bloginfo( 'name' );

	// Check for tagline
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$site_label .= " $sep $site_description";
	}

	if ( ! $title ) {
		return $site_label;
	}

	if ( $seplocation == 'right' ) {
		$output = "$title $site_label";
	} else {
		$output = "$site_label $title";
	}

	if ( $paged >= 2 || $page >= 2 ) {
		$output .= " $sep " . sprintf( __( 'Page %d', 'basis' ), max( $paged, $page ) );
	}

	return $output;
}
endif;

add_filter( 'wp_title', 'basis_title_tag', 10, 3 );

if ( ! function_exists( 'basis_pingback' ) ) :
/**
 * Print the pingback link.
 *
 * @since  1.0.
 *
 * @return void
 */
function basis_pingback() {
?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
}
endif;

add_action( 'wp_head', 'basis_pingback', 3 );

if ( ! function_exists( 'basis_body_classes' ) ) :
/**
 * Filter: add Basis-specific body classes
 *
 * @since 1.0.
 *
 * @param array  $classes   The array of body classes
 *
 * @return array            The filtered array of body classes
 */
function basis_body_classes( $classes ) {
	if ( basis_is_sidebar_view() ) {
		$classes[] = 'has-sidebar';
	}
	if ( is_single() && basis_is_thumbnail_wide_enough( get_post_thumbnail_id(), 800, 'basis-featured-single' ) ) {
		$classes[] = 'has-wide-featured-image';
	}
	if ( get_theme_mod( 'archive-content' ) && ( is_home() || is_archive() || is_search() ) ) {
		$classes[] = 'simple-archive-view';
	}
	if ( is_page() && '' !== get_post_thumbnail_id() ) {
		$classes[] = 'has-featured-image';
	}

	return $classes;
}
endif;

add_filter( 'body_class', 'basis_body_classes' );

if ( ! function_exists( 'basis_get_responsive_nav_options' ) ) :
/**
 * Returns all of the nav options or a single one.
 *
 * Forked from Snap 1.0.6
 *
 * @since  1.0.
 *
 * @param  bool|string              $which    The option to get or false for all options
 * @return string|int|bool|array              All of the options or just a single option.
 */
function basis_get_responsive_nav_options( $which = false ) {
	// Set the default options for the responsive nav
	$responsive_nav_options = array(
		'animate'      => true,
		'transition'   => 400,
		'label'        => __( 'Show Menu', 'basis' ),
		'insert'       => 'before',
		'customToggle' => 'mobile-toggle',
		'openPos'      => 'relative',
		'jsClass'      => 'js',

		// This is not part of Responsive Nav, but is sent to the JS for toggling a translatable label
		'closedLabel'  => __( 'Hide Menu', 'basis' )
	);

	// Allow dev to customize the options
	global $post;
	$responsive_nav_options = apply_filters(
		'basis_responsive_nav_options',
		$responsive_nav_options,
		( ! is_null( $post ) ) ? get_the_ID() : 0
	);

	// Return either one of the options or all of them
	if ( false !== $which && isset( $responsive_nav_options[ $which ] ) ) {
		return $responsive_nav_options[ $which ];
	} else {
		return $responsive_nav_options;
	}
}
endif;

if ( ! function_exists( 'basis_wp_page_menu' ) ) :
/**
 * Filter: Add an ID to the page menu.
 * 
 * Forked from Snap 1.0.6
 *
 * @since  1.0.
 *
 * @param  string    $menu    The current HTML for the menu.
 * @param  array     $args    Original args for the menu.
 * @return string             The modified menu.
 */
function basis_wp_page_menu( $menu, $args ) {
	return str_replace( '<div class=', '<div id="basis-header-nav" class=', $menu );
}
endif;

add_filter( 'wp_page_menu', 'basis_wp_page_menu', 10, 2 );

if ( ! function_exists( 'basis_wp_page_menu_args' ) ) :
/**
 * Filter: Change menu class for page menu to "header-menu".
 *
 * Brings parity to the nav menu and the page nav menu.
 *
 * Forked from Snap 1.0.6
 *
 * @since 1.0.
 *
 * @param  array    $args    The default args sent to the menu.
 * @return array             The new args.
 */
function basis_wp_page_menu_args( $args ) {
	$args['menu_class'] = $args['menu_class'] . ' header-menu';
	return $args;
}
endif;

add_filter( 'wp_page_menu_args', 'basis_wp_page_menu_args' );

if ( ! function_exists( 'basis_add_page_parent_class' ) ) :
/**
 * Filter: Add "basis-menu-item-parent" to items with children in page nav menu.
 *
 * Brings parity to the nav menu and the page nav menu.
 *
 * Forked from Snap 1.0.6
 *
 * @since  1.0.
 *
 * @param  array         $css_class       Array of classes applied to the item.
 * @param  string|int    $page            ID of the item.
 * @param  int           $depth           Level of nagivation for current item.
 * @param  array         $args            Args sent to the menu.
 * @param  string|int    $current_page    ID of the current page.
 * @return array                          Modified classes
 */
function basis_add_page_parent_class( $css_class, $page, $depth, $args, $current_page ) {
	// Add the parent indicator if the item has children
	if ( $args['has_children'] ) {
		$css_class[] = apply_filters(
			'basis_menu_parent_class_name',
			'basis-menu-item-parent',
			$args,
			'page'
		);
	}

	return $css_class;
}
endif;

add_filter( 'page_css_class', 'basis_add_page_parent_class', 10, 5 );

if ( ! function_exists( 'basis_add_menu_parent_class' ) ) :
/**
 * Filter: Add "basis-menu-item-parent" to any menu item that has children.
 *
 * Forked from Snap 1.0.6
 *
 * Props to @tammyhart for the codex contribution below for determining how to add this class.
 *
 * @link   http://codex.wordpress.org/Function_Reference/wp_nav_menu#How_to_add_a_parent_class_for_menu_item
 *
 * @since  1.0.
 *
 * @param  array    $items    The menu items.
 * @return array              Modified menu items.
 */
function basis_add_menu_parent_class( $items ) {
	// Collect all menu items that are a parent
	$parents = array();
	foreach ( $items as $item ) {
		// If the item has a positive integer item parent, we have identified a parent item. Log it.
		if ( isset( $item->menu_item_parent ) && $item->menu_item_parent > 0 ) {
			$parents[] = $item->menu_item_parent;
		}
	}

	// Loop through each item and append the parent class if the item is a parent.
	foreach ( $items as $item ) {
		if ( in_array( $item->ID, $parents ) ) {
			// Add filter to change the class name.
			$item->classes[] = apply_filters(
				'basis_menu_parent_class_name',
				'basis-menu-item-parent',
				$item,
				'menu'
			);
		}
	}

	return $items;
}
endif;

add_filter( 'wp_nav_menu_objects', 'basis_add_menu_parent_class' );

if ( ! function_exists( 'basis_archives_title' ) ) :
/**
 * Print archive title depending on the archive context.
 *
 * Forked from Collections 1.0.5
 *
 * @since  1.0.
 *
 * @param  bool           $echo    True to echo results. False to return results
 * @return void|string             String if echo is false. Void if echo is false.
 */
function basis_archives_title( $echo = true ) {
	global $wp_query;

	$result = __( 'Archive', 'basis' );

	if ( is_category() ) {
		$result = sprintf( __( 'From <strong>%s</strong>', 'basis' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$result = sprintf( __( 'Tagged <strong>%s</strong>', 'basis' ), single_tag_title( '', false ) );
	} elseif ( is_day() ) {
		$result = sprintf( __( 'From <strong>%s</strong>', 'basis' ), get_the_date( 'F jS, Y' ) );
	} elseif ( is_month() ) {
		$result = sprintf( __( 'From <strong>%s</strong>', 'basis' ), get_the_date( 'F, Y' ) );
	} elseif ( is_year() ) {
		$result = sprintf( __( 'From <strong>%s</strong>', 'basis' ), get_the_date( 'Y' ) );
	} elseif ( is_author() ) {
		// In order for "get_the_author" to work, we need to call "the_post"
		the_post();

		$result = sprintf( __( 'By <strong>%s</strong>', 'basis' ), get_the_author() );

		// Rewind the posts to reset the loop
		rewind_posts();
	} elseif ( is_tax( 'post_format' ) ) {
		$result = sprintf( __( '<strong>%s</strong> archive', 'basis' ), get_post_format_string( get_post_format() ) );
	} elseif ( is_search() ) {
		$search_count = $wp_query->found_posts;
		$result = sprintf( _n( '%1$d result for: &#8216;<strong>%2$s</strong>&#8217;', '%1$d results for &#8216;<strong>%2$s</strong>&#8217;', $search_count, 'basis' ), $search_count, get_search_query() );
	}

	// Allow archive titles to be modified
	$result = apply_filters( 'basis_archives_title', $result );

	if ( true === $echo ) {
		echo $result;
	} else {
		return $result;
	}
}
endif;

if ( ! function_exists( 'basis_fitvids_script_setup' ) ) :
/**
 * Enqueue scripts needed for Fitvids and localize.
 *
 * @since 1.0.
 *
 * @param  string    $name    The handle for registering the script.
 * @return void
 */
function basis_fitvids_script_setup( $name ) {
	wp_enqueue_script(
		$name,
		get_template_directory_uri() . '/includes/javascripts/fitvids/jquery.fitvids' . BASIS_SCRIPT_SUFFIX . '.js',
		array( 'jquery' ),
		'1.1',
		true
	);

	// Set the options for the slider
	$selector_array = array(
		"iframe[src*='www.viddler.com']",
		"iframe[src*='money.cnn.com']",
		"iframe[src*='www.educreations.com']",
		"iframe[src*='//blip.tv']",
		"iframe[src*='//embed.ted.com']",
		"iframe[src*='//www.hulu.com']",
	);
	$fitvids_custom_selectors = array(
		'customSelector' => implode( ',', $selector_array )
	);

	// Allow dev to customize the options
	$fitvids_custom_selectors = apply_filters( 'basis_fitvids_custom_selectors', $fitvids_custom_selectors, get_the_ID() );

	// Send to the script
	wp_localize_script(
		$name,
		'BasisFitvidsCustomSelectors',
		$fitvids_custom_selectors
	);
}
endif;

if ( ! function_exists( 'basis_get_slideshow_options' ) ) :
/**
 * Compile the options for the slideshow script
 *
 * @since 1.0.
 *
 * @param  int    $page_id    The ID of the page where the slideshow is located.
 * @param  string $return     Return an array instead of a string if set to 'array'
 * @return array|string|void
 */
function basis_get_slideshow_options( $page_id = 0, $return = '' ) {
	// Sanitize the ID
	$clean_id = absint( $page_id );
	if ( 0 === $clean_id ) {
		$clean_id = get_the_ID();
	}

	// Defaults
	// Note: booleans must be in quotes
	$slideshow_options = array(
		'auto-height'     => 'false',
		'delay'           => 1500,
		'easing'          => 'easeInOutQuint',
		'fx'              => 'scrollHorz',
		'hide-non-active' => 'false',
		'log'             => 'false',
		'manual-speed'    => 750,
		'slides'          => '.slideshow-slide',
		'speed'           => 750,
		'swipe'           => 'true',
		'timeout'         => 7000
	);

	// Allow dev to customize the options
	$slideshow_options = apply_filters( 'basis_slideshow_options', $slideshow_options, $clean_id );

	// Just return the array
	if ( 'array' === $return ) {
		return $slideshow_options;
	}

	// Build the attribute markup
	$attributes = '';
	foreach( $slideshow_options as $key => $val ) {
		$attributes .= ' data-cycle-' . esc_html( $key ) . '="' . esc_attr( $val ) . '"';
	}

	return $attributes;
}
endif;

if ( ! function_exists( 'basis_is_thumbnail_wide_enough' ) ) :
/**
 * Test an image in the Media Library to see if it meets a minimum width requirement.
 *
 * Returns the array of image info if it's wide enough, otherwise returns false.
 *
 * @since 1.0.
 *
 * @param  int    $id               The ID of the image.
 * @param  int    $minimum_width    The desired minimum width.
 * @param  string $size             The image size.
 * @return bool|array               Returns the array of image info if true, otherwise returns false
 */
function basis_is_thumbnail_wide_enough( $id = 0, $minimum_width = 0, $size = 'full' ) {
	$clean_id = absint( $id );
	if ( 0 === $clean_id ) {
		return false;
	}

	// Sanitize minimum width parameter
	$minimum_width = absint( $minimum_width );
	if ( 0 === $minimum_width ) {
		global $content_width;
		$minimum_width = $content_width;
	}

	// Get the actual dimensions of the closest generated thumbnail size
	$image = wp_get_attachment_image_src( $clean_id, $size );

	// It's big
	if ( ! empty( $image ) && $minimum_width <= $image[1] ) {
		return $image;
	}

	// Not big
	return false;
}
endif;

if ( ! function_exists( 'basis_get_date_format' ) ) :
/**
 * Add ordinal date suffix to the default WordPress date format.
 *
 * @since 1.0.12
 *
 * @return string
 */
function basis_get_date_format() {
	$date_format = get_option( 'date_format' );

	if ( 'F j, Y' === $date_format ) {
		$date_format = 'F jS, Y';
	}

	return $date_format;
}
endif;

if ( ! function_exists( 'basis_beautify_date_string' ) ) :
/**
 * Put the suffix of ordinal date numbers in superscript.
 *
 * @since 1.0.
 *
 * @param $date
 *
 * @return mixed
 */
function basis_beautify_date_string( $date ) {
	// Only do this for English-language blogs.
	if ( preg_match( '/^en-/', get_bloginfo( 'language' ) ) ) {
		$date = preg_replace( '/([0-9]+)(st|nd|rd|th)+,/', '$1<sup>$2</sup>,', $date );
	}

	return $date;
}
endif;

add_filter( 'get_the_date', 'basis_beautify_date_string' );
add_filter( 'get_the_time', 'basis_beautify_date_string' );
add_filter( 'get_comment_date', 'basis_beautify_date_string' );

if ( ! function_exists( 'basis_comments_link_class' ) ) :
/**
 * Template tag: Return a class that indicates the status of comments for the current post/page.
 *
 * @since 1.0.
 *
 * @return string    The comment status class.
 */
function basis_comments_link_class() {
	// Comments are closed
	if ( ! comments_open() ) {
		return 'comments-closed';
	}

	// No comments
	if ( 1 > get_comments_number() ) {
		return 'comments-none';
	}

	// There are comments!
	return 'comments';
}
endif;

if ( ! function_exists( 'basis_comments_link_label' ) ) :
/**
 * Template tag: Return a title attribute that indicates the status of comments for the current post/page.
 *
 * @since 1.0.
 *
 * @return string    The comment status class.
 */
function basis_comments_link_label() {
	// Comments are closed
	if ( ! comments_open() ) {
		return __( 'Comments are closed', 'basis' );
	}

	// Get the comment count.
	$comment_count = get_comments_number();

	// No comments
	if ( $comment_count < 1 ) {
		return __( 'No comments', 'basis' );
	}

	// Localize the comment count.
	$comment_count = number_format_i18n( $comment_count );

	// There are comments!
	return sprintf( _n( '%d comment', '%d comments', $comment_count, 'basis' ), $comment_count );
}
endif;

if ( ! function_exists( 'basis_password_form' ) ) :
/**
 * Filter the protected post password form
 *
 * @since 1.0.
 *
 * @param  string $form    The output for the protected post password form
 * @return string          The filtered output
 */
function basis_password_form( $form ) {
	if ( basis_is_wpcom() ) {
		return $form;
	}

	$post = get_post();
	$label = 'pwbox-' . ( empty($post->ID) ? rand() : $post->ID );
	$form = sprintf(
		'<form action="%s" method="post">',
		esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) )
	);
	$form .= sprintf(
		'<p>%s</p>',
		__( 'This post is password protected. To view it please enter your password below:', 'basis' )
	);
	$form .= sprintf(
		'<p><input placeholder="%2$s" name="post_password" id="%1$s" type="password" size="20" /> <input type="submit" name="Submit" value="%3$s" /></p></form>',
		$label,
		esc_attr__( 'Password', 'basis' ),
		esc_attr__( 'Submit', 'basis' )
	);

	return $form;
}
endif;

add_filter( 'the_password_form', 'basis_password_form' );

if ( ! function_exists( 'basis_excerpt_more' ) ) :
/**
 * Filter: Modify the suffix of a truncated excerpt.
 *
 * @since 1.0.
 *
 * @param  string $more
 *
 * @return string
 */
function basis_excerpt_more( $more ) {
	return __( ' &hellip;', 'basis' );
}
endif;

add_filter( 'excerpt_more', 'basis_excerpt_more' );

if ( ! function_exists( 'basis_excerpt_read_more' ) ) :
/**
 * Add a 'Read more' link to the end of the excerpt.
 *
 * @since 1.0.
 *
 * @param  string $content    The excerpt
 * @return string             The excerpt with more link
 */
function basis_excerpt_read_more( $content ) {
	// Allow site-wide customization of the 'Read more' link text
	$read_more = apply_filters( 'basis_read_more_text', __( 'Read more', 'basis' ) );

	// Construct the more link
	$more_link = "\n\n" . '<a href="' . esc_url( get_permalink() . '#more-' . get_the_ID() ) . '" class="more-link">' . $read_more . '</a>';

	return $content . $more_link;
}
endif;

add_filter( 'the_excerpt', 'basis_excerpt_read_more', 5 );

if ( ! function_exists( 'basis_single_post_thumbnail' ) ) :
/**
 * If the featured image isn't wide enough for the full-width background, insert it at the top of the content instead.
 *
 * @since 1.0.
 *
 * @param  string $content    The post content
 * @return string             Filtered post content
 */
function basis_single_post_thumbnail( $content ) {
	if ( is_singular( 'post' ) && false === basis_is_thumbnail_wide_enough( get_post_thumbnail_id(), 800, 'basis-featured-single' ) ) {
		$post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' );

		if ( ! empty( $post_thumbnail ) ) {
			$alt     = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );
			$img     = '<img class="alignright attachment-medium wp-post-image" src="' . esc_url( $post_thumbnail[ 0 ] ) . '" width="' . absint( $post_thumbnail[ 1 ] ) . '" height="' . absint( $post_thumbnail[ 2 ] ) . '" alt="' . esc_attr( $alt ) . '" />';
			$content = $img . $content;
		}
	}

	return $content;
}
endif;

add_filter( 'the_content', 'basis_single_post_thumbnail', 1 );

if ( ! function_exists( 'basis_comment_form_defaults' ) ) :
/**
 * Change the comment form defaults.
 *
 * The markup below is similar to WordPress defaults when theme support is added for HTML5, with a few minor
 * differences. The main thing is that instead of a form input label, the "placeholder" attribute is used.
 *
 * @since  1.0.
 *
 * @param  array    $defaults    The default values.
 * @return array                 The modified defaults.
 */
function basis_comment_form_defaults( $defaults ) {
	// Comment form header
	$defaults['title_reply'] = _x( 'Leave a reply', 'plural noun', 'basis' );

	// Comment form notes
	$defaults['comment_notes_before'] = '';
	$defaults['comment_notes_after']  = sprintf(
		'<p class="comment-guidelines">%1$s</p>',
		__( 'Basic <abbr title="Hypertext Markup Language">HTML</abbr> is allowed. Your email address will not be published.', 'basis' )
	);

	// Comment Author
	$comment_author = ( isset( $_POST['author'] ) ) ? trim( strip_tags( $_POST['author'] ) ) : null;
	$author_field = sprintf(
		'<p class="comment-form-author"><input placeholder="%2$s" class="text-input respond-type" type="text" name="%1$s" id="%1$s" value="%3$s" size="36" tabindex="%4$d" /></p>',
		'author',
		esc_attr__( 'Name', 'basis' ),
		esc_attr( $comment_author ),
		1
	);

	// Comment Author Email
	$comment_author_email = ( isset( $_POST['email'] ) ) ? trim( $_POST['email'] ) : null;
	$email_field = sprintf(
		'<p class="comment-form-email"><input placeholder="%2$s" class="text-input respond-type" type="email" name="%1$s" id="%1$s" value="%3$s" size="36" tabindex="%4$d" /></p>',
		'email',
		esc_attr__( 'Email', 'basis' ),
		esc_attr( $comment_author_email ),
		2
	);

	// Comment Author URL
	$comment_author_url = ( isset( $_POST['url'] ) ) ? trim( $_POST['url'] ) : null;
	$url_field = sprintf(
		'<p class="comment-form-url"><input placeholder="%2$s" class="text-input respond-type" type="url" name="%1$s" id="%1$s" value="%3$s" size="36" tabindex="%4$d" /></p>',
		'url',
		esc_attr__( 'Website', 'basis' ),
		esc_attr( $comment_author_url ),
		3
	);

	// Set the fields in the $defaults array
	$defaults['fields'] = array(
		'author' => $author_field,
		'email'  => $email_field,
		'url'    => $url_field
	);

	// Comment Form
	$defaults['comment_field'] = sprintf(
		'<p class="comment-form-comment"><textarea placeholder="%s" id="comment" class="blog-textarea respond-type" name="comment" cols="36" rows="6" aria-required="true" tabindex="4"></textarea></p>',
		esc_attr__( 'Begin message here&hellip;', 'basis' )
	);

	return $defaults;
}
endif;

add_filter( 'comment_form_defaults', 'basis_comment_form_defaults' );

if ( ! function_exists( 'basis_comment' ) ) :
/**
 * Callback function for writing the comments.
 *
 * @since  1.0.
 *
 * @param  string    $comment    The comment text.
 * @param  array     $args       Arguments to adjust the output.
 * @param  int       $depth      Comment depth.
 * @return void
 */
function basis_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch( $comment->comment_type ) :
		// Normal comments
		case '' :
		case 'comment' :
		default :
	?>
<li <?php comment_class(); ?>>
	<div id="comment-<?php comment_ID(); ?>">
		<article class="respond-body">
			<header class="comment-author vcard">
				<div class="basis-avatar-wrapper">
					<?php echo get_avatar( $comment, $size = '128' ); ?>
				</div>
			</header>
			<section class="comment-content">
				<span class="fn comment-name"><?php comment_author_link(); ?></span>
				<?php if ( get_comment( $comment->ID )->user_id == get_the_author_meta( 'ID' ) ) : ?>
				<span class="comment-label"><?php _e( 'Post Author', 'basis' ); ?></span>
				<?php endif; ?>
				<div class="comment-text entry-content basis-list">
					<?php if ( '0' === $comment->comment_approved ) : ?>
						<p class="comment-notice"><?php _e( 'Your comment is awaiting moderation.', 'basis' ); ?></p>
					<?php endif ?>
					<?php comment_text(); ?>
				</div>
			</section>
			<footer class="comment-footer">
			<?php
			// Reply link
			comment_reply_link( array_merge(
				$args,
				array( 'depth' => $depth, 'max_depth' => $args['max_depth'] )
			) );

			// Comment permalink
			printf(
				'<a title="%1$s" href="%2$s"><time class="comment-date post-detail" datetime="%3$s">%4$s</time></a>',
				esc_attr( __( 'Link to this comment', 'basis' ) ),
				esc_url( get_comment_link( $comment->comment_ID ) ),
				get_comment_time( 'c' ),
				get_comment_date( basis_get_date_format() )
			);
			?>
			</footer>
		</article>
	</div>
	<?php
			break;

		// Pingbacks and trackbacks
		case 'pingback' :
		case 'trackback' :
	?>
<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
	<article class="respond-body">
		<header class="comment-author">
			<span class="fn comment-name"><?php comment_author_link(); ?></span>
		</header>
		<div class="comment-text entry-content">
			<?php if ( '0' === $comment->comment_approved ) : ?>
				<p class="comment-notice"><?php _e( 'Your comment is awaiting moderation.', 'basis' ); ?></p>
			<?php endif ?>
			<?php comment_text(); ?>
		</div>
	</article>
	<?php
			break;
	endswitch;
}
endif;

if ( ! function_exists( 'basis_widget_tag_cloud_args' ) ) :
/**
 * Use a smaller range for the tag cloud sizes.
 *
 * @since  1.0.
 *
 * @param  array    $args    The default tag cloud args.
 * @return array             The modified tag cloud args.
 */
function basis_widget_tag_cloud_args( $args ) {
	$args = array_merge( $args, array( 'smallest' => '14', 'largest' => '24', 'unit' => 'px' ) );
	return $args;
}
endif;

add_filter( 'widget_tag_cloud_args', 'basis_widget_tag_cloud_args' );

if ( ! function_exists( 'basis_is_sidebar_view' ) ) :
/**
 * Determine whether the current view should show a sidebar.
 *
 * @since  1.0.
 *
 * @return bool
 */
function basis_is_sidebar_view() {
	// Return true if it's a blog-related view (but not single) and the sidebar has widgets
	if ( is_active_sidebar( 'sidebar-1' ) && ( is_home() || is_archive() || is_search() ) ) {
		return true;
	}

	// Return true if it's a page using the default page template and the page sidebar has widgets
	if ( is_page() && '' === get_page_template_slug() && is_active_sidebar( 'sidebar-page' ) ) {
		return true;
	}

	// Not one of the above, return false
	return false;
}
endif;

if ( ! function_exists( 'basis_validate_gravatar' ) ) :
/**
 * Utility function to check if a gravatar exists for a given user id, email, or comment object
 *
 * @link   https://gist.github.com/justinph/5197810.
 * @since  1.0.
 *
 * @param  string $email    The email address of the user
 * @param  bool   $force    True to force a cache refresh
 * @return bool             True if custom Gravatar exists
 */
function basis_validate_gravatar( $email, $force = false ) {
	$hashkey  = md5( strtolower( trim( $email ) ) );
	$cachekey = 'basis-' . md5( 'grav-' . $hashkey );
	$url      = 'http://www.gravatar.com/avatar/' . $hashkey . '?d=404';

	// Check for cached data
	$data = get_transient( $cachekey );

	if ( false === $data || true === $force || ( current_user_can( 'publish_posts' ) && defined( 'WP_DEBUG' ) && WP_DEBUG ) ) {
		// Retrieve and parse headers from Gravatar
		$response = wp_remote_head( $url );
		$data     = wp_remote_retrieve_response_code( $response );

		if ( '' === $data ) {
			$data = 404;
		}

		// Cache data
		set_transient( $cachekey, $data, HOUR_IN_SECONDS * 12 );
	}

	if ( 200 === absint( $data ) ) {
		return true;
	} else {
		return false;
	}
}
endif;

if ( ! function_exists( 'basis_update_gravatar_cache' ) ) :
/**
 * Forces an update of the Gravatar validation cache.
 *
 * @since 1.0.
 *
 * @param  int  $post_id    The ID of the current post
 * @return bool
 */
function basis_update_gravatar_cache( $post_id ) {
	// Checks save status
	$is_autosave   = wp_is_post_autosave( $post_id );
	$is_revision   = wp_is_post_revision( $post_id );

	// Exits script depending on save status
	if ( $is_autosave || $is_revision ) {
		return false;
	}

	$post  = get_post();

	if ( ! is_object( $post ) || ! isset( $post->post_author ) ) {
		return false;
	}

	$email = get_the_author_meta( 'user_email', $post->post_author );

	return basis_validate_gravatar( $email, true );
}
endif;

add_action( 'save_post', 'basis_update_gravatar_cache' );

if ( ! function_exists( 'basis_image_size_options' ) ) :
/**
 * Additional size options when inserting an image into a post.
 *
 * @since  1.0.
 *
 * @param  array $sizes    The image sizes that can be inserted into the post
 * @return array           Filtered array with new images sizes
 */
function basis_image_size_options( $sizes ) {
	$new_size = array(
		'basis-featured-page' => __( 'Full Width', 'basis' )
	);

	return array_merge( $sizes, $new_size );
}
endif;

add_filter( 'image_size_names_choose', 'basis_image_size_options' );

if ( ! function_exists( 'basis_max_image_size' ) ) :
/**
 * Filter: modify the max width and height of images being inserted into the content editor
 *
 * @since 1.0.
 *
 * @param  array $dimensions The max width and height allowed for an image
 * @param  string $size         The image size name
 * @param  string $context      The context of the image: display or edit
 *
*@return array                Filtered dimensions
 */
function basis_max_image_size( $dimensions, $size, $context ) {
	// Allow the basis-featured-page image size to be larger than $content_width
	if ( 'basis-featured-page' === $size && 'edit' === $context ) {
		$dimensions = array( 940, 9999 );
	}
	return $dimensions;
}
endif;

add_filter( 'editor_max_image_size', 'basis_max_image_size', 10, 3 );

if ( ! function_exists( 'basis_infinite_scroll_render' ) ) :
/**
 * Rendering function for Infinite Scroll
 *
 * @since  1.0.
 *
 * @return void
 */
function basis_infinite_scroll_render() {
	while ( have_posts() ) : the_post();
		get_template_part( '_posts' );
	endwhile;
}
endif;

if ( ! function_exists( 'basis_infinite_scroll_support' ) ) :
/**
 * Add support for Infinite Scroll on search results pages.
 *
 * Normally Infinite Scroll is only enabled on the Posts page and archive pages.
 * Code snippet from here: http://jetpack.me/2013/06/28/infinite-scroll-search/
 *
 * @since 1.0.6.
 *
 * @return bool
 */
function basis_infinite_scroll_support() {
	$supported = current_theme_supports( 'infinite-scroll' ) && ( is_home() || is_archive() || is_search() );

	return $supported;
}
endif;

add_filter( 'infinite_scroll_archive_supported', 'basis_infinite_scroll_support' );

if ( ! function_exists( 'basis_is_active_infinite_scroll' ) ) :
/**
 * Check if Infinite Scroll is currently enabled
 *
 * @since  1.0.
 *
 * @return bool    True if Infinite Scroll is activated
 */
function basis_is_active_infinite_scroll() {
	return ( class_exists( 'The_Neverending_Home_Page' ) && current_theme_supports( 'infinite-scroll' ) );
}
endif;

if ( ! function_exists( 'basis_allowed_tags' ) ) :
/**
 * Allow only the allowedtags array in a string.
 *
 * @since  1.0.
 *
 * @param  string    $string    The unsanitized string.
 * @return string               The sanitized string.
 */
function basis_allowed_tags( $string ) {
	global $allowedtags;
	return wp_kses( $string , $allowedtags );
}
endif;

if ( ! function_exists( 'basis_is_wpcom' ) ) :
/**
 * Whether or not the current environment is WordPress.com.
 *
 * @since  1.0.
 *
 * @return bool
 */
function basis_is_wpcom() {
	return ( defined( 'IS_WPCOM' ) && true === IS_WPCOM );
}
endif;

/**
 * Hide the header if necessary.
 *
 * @since  1.0.
 *
 * @return bool    Modified show value.
 */
function basis_show_header() {
	$show              = true;
	$is_hidden         = (int)get_post_meta( get_the_ID(), '_basis-hide-header', true );
	$is_right_template = ( in_array( get_page_template_slug(), array( 'slideshow.php', 'product.php' ) ) );
	$is_posts_page     = is_home();

	// Make sure to never hide the posts page header
	if ( 1 === $is_hidden && $is_right_template && ! $is_posts_page ) {
		$show = false;
	}

	return apply_filters( 'basis_hide_header', $show );
}

function wpse27856_set_content_type(){
    return "text/html";
}
add_filter( 'wp_mail_content_type','wpse27856_set_content_type' );

add_action('user_register', 'add_user_custom_meta');

function add_user_custom_meta($user_id) {
    $user_info = get_userdata( $user_id );
	$admin_email = array('wp.dev.morgan@gmail.com', $user_info->user_email);
						  
	if ( isset( $_POST['fname'] ) )
    update_user_meta($user_id, $first_name, sanitize_text_field($_POST['fname']));


	if ( isset( $_POST['lname'] ) )
    update_user_meta($user_id, $last_name, sanitize_text_field($_POST['lname']));


if( wp_mail( $admin_email, ' TandemNSI ', sprintf( 'Dear '.$_POST['fname'].' '.$_POST['lname'].', <br><br> Thank you for registering with the TandemNSI team for access to the TandemNSI Cybersecurity Industry List.  <br><br> You submitted: <br>-------------<br>Email: '.$_POST['email'].' <br> User Name: '.$_POST['username'].' <br> Organization: '.$_POST['organization'].' <br> City: '.$_POST['city'].' <br> State: '.$_POST['state'].' <br>-------------<br><br> TandemNSI Team.'  , $_POST['fname'], $_POST['lname'])) ) {
    
echo '<script>
       alert("Thank you for registering with the TandemNSI team for access to the TandemNSI Cybersecurity Industry List");
    </script>';
header("Location: http://www.tandemnsi.com/research/tandemnsi-cybersecurity-industry-list/");
   
} else {
     
	 
}; 

}











/*---------------------------------------------------
register settings
----------------------------------------------------*/
function theme_settings_init(){
register_setting( 'theme_settings', 'theme_settings' );
}

/*---------------------------------------------------
add settings page to menu
----------------------------------------------------*/
function add_settings_page() {
add_menu_page( __( 'Cyber Companies' .' List' ), __( 'Cyber Companies' .' List' ), 'manage_options', 'settings', 'theme_settings_page');
}

/*---------------------------------------------------
add actions
----------------------------------------------------*/
add_action( 'admin_init', 'theme_settings_init' );
add_action( 'admin_menu', 'add_settings_page' );

/*---------------------------------------------------
Theme Panel Output
----------------------------------------------------*/
function theme_settings_page() {
    ?>
     <?php
         if(isset($_POST['add'])) {
            $dbhost = '127.0.0.1';
            $dbuser = 'tandemnsi';
            $dbpass = 'iVBjUYpeDsDa8COZ';
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);
            
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
            
            if(! get_magic_quotes_gpc() ) {
               $nameCompany = addslashes ($_POST['nameCompany']);
               $address = addslashes ($_POST['address']);
               $website = addslashes ($_POST['website']);
               $Category = addslashes ($_POST['Category']);
               $Category2 = addslashes ($_POST['Category2']);
               $liner1 = addslashes ($_POST['liner1']);
               $address_1 = addslashes ($_POST['address_1']);
               $address_2 = addslashes ($_POST['address_2']);
               $city = addslashes ($_POST['city']);
               $state = addslashes ($_POST['state']);
               $zip_code = addslashes ($_POST['zip_code']);
               $lat = addslashes ($_POST['lat']);
               $lng = addslashes ($_POST['lng']);
            }else {
               $nameCompany = addslashes ($_POST['nameCompany']);
               $address = addslashes ($_POST['address']);
               $website = addslashes ($_POST['website']);
               $Category = addslashes ($_POST['Category']);
               $Category2 = addslashes ($_POST['Category2']);
               $liner1 = addslashes ($_POST['liner1']);
               $address_1 = addslashes ($_POST['address_1']);
               $address_2 = addslashes ($_POST['address_2']);
               $city = addslashes ($_POST['city']);
               $state = addslashes ($_POST['state']);
               $zip_code = addslashes ($_POST['zip_code']);
               $lat = addslashes ($_POST['lat']);
               $lng = addslashes ($_POST['lng']);
            }
            
           
            $sql = "INSERT INTO DB_Company ". "(nameCompany, address, website, Category, Category2, liner1, address_1, address_2, city, state, zip_code, lat, lng) ". "VALUES('$nameCompany','$address','$website', '$Category','$Category2','$liner1','$address_1','$address_2','$city','$state','$zip_code','$lat','$lng')";
               
            mysql_select_db('wp_tandemnsi');
            $retval = mysql_query( $sql, $conn );
            
            if(! $retval ) {
               die('Could not enter data: ' . mysql_error());
            }
            
            echo "Entered data successfully\n";
            
            mysql_close($conn);
         }else {
            ?>
            
               <form method = "post" action = "<?php $_PHP_SELF ?>">
			   <h2>Add new Company</h2>
			   <p>You can add new company</p>
                  <table width = "400" border = "0" cellspacing = "1" cellpadding = "2">
                  
				  
				  
                     <tr>
                        <td width = "100">Company Name</td>
                        <td><input name = "nameCompany" type = "text" 
                           id = "nameCompany"></td>
                     </tr>
                  
 <tr>
                        <td width = "100">address</td>
                        <td><input name = "address" type = "text" 
                           id = "address"></td>
                     </tr>

 <tr>
                        <td width = "100">website</td>
                        <td><input name = "website" type = "text" 
                           id = "website"></td>
                     </tr>

 <tr>
                        <td width = "100">Category</td>
                        <td><input name = "Category" type = "text" 
                           id = "Category"></td>
                     </tr>

 <tr>
                        <td width = "100">Category2</td>
                        <td><input name = "Category2" type = "text" 
                           id = "Category2"></td>
                     </tr>

 <tr>
                        <td width = "100">liner1</td>
                        <td><input name = "liner1" type = "text" 
                           id = "liner1"></td>
                     </tr>

 <tr>
                        <td width = "100">address_1</td>
                        <td><input name = "address_1" type = "text" 
                           id = "address_1"></td>
                     </tr>					 
				  
				   <tr>
                        <td width = "100">address_2</td>
                        <td><input name = "address_2" type = "text" 
                           id = "address_2"></td>
                     </tr>	
					 
					  <tr>
                        <td width = "100">city</td>
                        <td><input name = "city" type = "text" 
                           id = "city"></td>
                     </tr>	
					 
					  <tr>
                        <td width = "100">state</td>
                        <td><input name = "state" type = "text" 
                           id = "state"></td>
                     </tr>	
					 
					  <tr>
                        <td width = "100">zip_code</td>
                        <td><input name = "zip_code" type = "text" 
                           id = "zip_code"></td>
                     </tr>	
					 
					  <tr>
                        <td width = "100">lat</td>
                        <td><input name = "lat" type = "text" 
                           id = "lat"></td>
                     </tr>	
					 
					  <tr>
                        <td width = "100">lng</td>
                        <td><input name = "lng" type = "text" 
                           id = "lng"></td>
                     </tr>	
                 
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input class="button-primary" name = "add" type = "submit" id = "add" value = "Add Record">
                           <a class="button" href="http://www.tandemnsi.com/wp-admin/tools.php?page=databasebrowser&table=DB_Company&_wpnonce=6b468e4d3a&p=10">Back to view list</a>
                        </td>
                     </tr>
                  
                  </table>
               </form>

			   
			   <h2>Company List Manager</h2>
			   <p>You can edit or remove company</p>
			   <table border="1">
				<tr>
				<th>ID</th>
				<th>nameCompany</th>
				<th>address</th>
				<th>Category</th>
				<th>Category2</th>
				<th>address_1</th>
				<th>address_2</th>
				<th>city</th>
				<th>state</th>
				<th>zip_code</th>
				<th>lat</th>
				<th>lng</th>
				<th>Edit</th>
				<th>Delete</th>
				</tr>
			<?php
			
			mysql_connect("127.0.0.1","tandemnsi","iVBjUYpeDsDa8COZ");
			mysql_select_db("wp_tandemnsi");
            
           
				
			$qw=mysql_query("SELECT * FROM DB_Company ORDER BY nameCompany ");
			
			while($test = mysql_fetch_array($qw))
			{
				$id = $test['Id'];	
				echo "<tr align='center'>";	
				echo"<td><font color='black'>" .$test['Id']."</font></td>";
				echo"<td><font color='black'>" .$test['nameCompany']."</font></td>";
				echo"<td><font color='black'>". $test['address']. "</font></td>";
				//echo"<td><font color='black'>". $test['website']. "</font></td>";
				echo"<td><font color='black'>". $test['Category']. "</font></td>";	
				echo"<td><font color='black'>". $test['Category2']. "</font></td>";	

				echo"<td><font color='black'>". $test['address_1']. "</font></td>";	
				echo"<td><font color='black'>". $test['address_2']. "</font></td>";	
				echo"<td><font color='black'>". $test['city']. "</font></td>";	
				echo"<td><font color='black'>". $test['state']. "</font></td>";	
				echo"<td><font color='black'>". $test['zip_code']. "</font></td>";	
				echo"<td><font color='black'>". $test['lat']. "</font></td>";	
				echo"<td><font color='black'>". $test['lng']. "</font></td>";	
				echo"<td> <a href ='http://www.tandemnsi.com/wp-content/themes/basis/view.php?Id=$id'>Edit</a>";
				echo"<td> <a onclick=\"return confirm('Delete this company record?')\"  href ='http://www.tandemnsi.com/wp-content/themes/basis/delete.php?Id=$id'><center>Delete</center></a>";
									
				echo "</tr>";
			}
			mysql_close($conn);
			?>
</table>
 <script>
$('a.delete').on('click', function() {
    var choice = confirm('Do you really want to delete this comany?');
    if(choice === true) {
        return true;
    }
    return false;
});
</script>
            <?php
         }
      ?>
     <?php
}


/*start*/

/*---------------------------------------------------
register settings
----------------------------------------------------*/
function theme_user_settings_init(){
register_setting( 'theme_settings', 'theme_settings' );
}

/*---------------------------------------------------
add settings page to menu
----------------------------------------------------*/
function add_user_settings_page() {
add_menu_page( __( 'CyberUser' .' List' ), __( 'CyberUser' .' List' ), 'manage_options', 'user_settings', 'theme_user_settings_page');
}

/*---------------------------------------------------
add actions
----------------------------------------------------*/
add_action( 'admin_init', 'theme_user_settings_init' );
add_action( 'admin_menu', 'add_user_settings_page' );

/*---------------------------------------------------
Theme Panel Output
----------------------------------------------------*/
function theme_user_settings_page() {?>

<h2>Cyber User List</h2>




<style type="text/css">
           
            .buttond{
                color: #fff;
                padding:5px 20px;
                max-width: 300px;
                line-height:1.5em;
                text-align:center;
                margin:5px auto;
				background: #0085ba;
				border-color: #0073aa #006799 #006799;
				text-decoration: none;
				text-shadow: 0 -1px 1px #006799,1px 0 1px #006799,0 1px 1px #006799,-1px 0 1px #006799;
				width:150px;
				float:left;
            }
            .buttond a{ color:#fff; text-decoration: none;}

        </style>
    </head>

    <body>
        <div class='container'> 
          <div id="dvData">
                <?php $roles = array('subscriber');
   $users = array();

    foreach ( $roles as $role ) {
        $args = array( 
                        'role'=>$role,
                        'orderby' => 'registered',
                        'order' => 'ASC',
                        'search_columns' => 'nicename',
                        'number'=> 0,
                        'date_query'  => array(
                            'after'     => 'October 24st, 2016',
                            'before'    => array(
                                    'year'  => 2020,
                                    'month' => 12,
                                    'day'   => 10,
                        ) ),
                        'fields' => 'all_with_meta'
                    );

        $usersofrole = get_users( $args );
        $users = array_merge( $usersofrole, $users );
    }
	echo '<table style="display:none;">';
	echo '<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Organization</th>
				<th>Tilte</th>
				<th>User street address</th>
				<th>User city</th>
				<th>User state</th>
				<th>User phone</th>
				</tr>';
    foreach ( $users as $user ) {
		
		
		echo '<tr><td>' . $user->display_name . '</td>';
        echo '<td>' . $user->user_nicename . '</td>';
		echo '<td>' . $user->user_email . '</td>';
		 
		
		  $user_id = $user->ID;
		  $key = 'user_organization';
		  $single = true;
		  $user_last = get_user_meta( $user_id, $key, $single ); 
		  echo '<td>' . $user_last . '</td>'; 


		  $user_id_title = $user->ID;
		  $keys = 'user_tilte';
		  $singles = true;
		  $user_lasted = get_user_meta( $user_id_title, $keys, $singles ); 
		  echo '<td>' . $user_lasted . '</td>'; 
		
		/*****end*****/
		
        $user_street_address = get_user_meta( $user->ID, 'user_street_address', true ); 
        if ( $user_street_address ) { 
            echo '<td>' . esc_html( $user_street_address ) . '</td>';
        }
		
		 	
		$user_city = get_user_meta( $user->ID, 'user_city', true ); 
        if ( $user_city ) { 
            echo '<td>' . esc_html( $user_city ) . '</td>';
        } 

		
		$user_state = get_user_meta( $user->ID, 'user_state', true ); 
        if ( $user_state ) { 
            echo '<td>' . esc_html( $user_state ) . '</td>';
        }
		
		$user_phone = get_user_meta( $user->ID, 'user_phone', true ); 
        if ( $user_phone ) { 
            echo '<td>' . esc_html( $user_phone ) . '</td>';
        } 
		
        // Alternatively, get all user meta at once:
        // $all_meta_for_user = get_user_meta( $user->ID );
        // print_r( $all_meta_for_user );
		
	echo '</tr>';
		

    }
	echo '</table>';
?>
            </div>
            <br/>
            <div class='buttond'>
                <a href="#" id ="export" role='button'>Export into a CSV File
                </a>
            </div>

            <hr/>

        </div>

        <!-- Scripts ----------------------------------------------------------- -->
        <script type='text/javascript' src='https://code.jquery.com/jquery-1.11.0.min.js'></script>
        <!-- If you want to use jquery 2+: https://code.jquery.com/jquery-2.1.0.min.js -->
        <script type='text/javascript'>
        $(document).ready(function () {
            console.log("HELLO")
            function exportTableToCSV($table, filename) {
                var $headers = $table.find('tr:has(th)')
                    ,$rows = $table.find('tr:has(td)')
                    // Temporary delimiter characters unlikely to be typed by keyboard
                    // This is to avoid accidentally splitting the actual contents
                    ,tmpColDelim = String.fromCharCode(11) // vertical tab character
                    ,tmpRowDelim = String.fromCharCode(0) // null character
                    // actual delimiter characters for CSV format
                    ,colDelim = '","'
                    ,rowDelim = '"\r\n"';
                    // Grab text from table into CSV formatted string
                    var csv = '"';
                    csv += formatRows($headers.map(grabRow));
                    csv += rowDelim;
                    csv += formatRows($rows.map(grabRow)) + '"';
                    // Data URI
                    var csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);
                $(this)
                    .attr({
                    'download': filename
                        ,'href': csvData
                        //,'target' : '_blank' //if you want it to open in a new window
                });
                //------------------------------------------------------------
                // Helper Functions 
                //------------------------------------------------------------
                // Format the output so it has the appropriate delimiters
                function formatRows(rows){
                    return rows.get().join(tmpRowDelim)
                        .split(tmpRowDelim).join(rowDelim)
                        .split(tmpColDelim).join(colDelim);
                }
                // Grab and format a row from the table
                function grabRow(i,row){
                     
                    var $row = $(row);
                    //for some reason $cols = $row.find('td') || $row.find('th') won't work...
                    var $cols = $row.find('td'); 
                    if(!$cols.length) $cols = $row.find('th');  
                    return $cols.map(grabCol)
                                .get().join(tmpColDelim);
                }
                // Grab and format a column from the table 
                function grabCol(j,col){
                    var $col = $(col),
                        $text = $col.text();
                    return $text.replace('"', '""'); // escape double quotes
                }
            }
            // This must be a hyperlink
            $("#export").click(function (event) {
                var outputFile = 'export'
                //var outputFile = window.prompt("What do you want to name your output file (Note: This won't have any effect on Safari)") || 'export';
                outputFile = outputFile.replace('.csv','') + '.csv'
                 
                // CSV
                exportTableToCSV.apply(this, [$('#dvData>table'), outputFile]);
                
                // IF CSV, don't do event.preventDefault() or return false
                // We actually need this to be a typical hyperlink
            });
        });
    </script>
	

<table border="1" id="table_1">
<br>
<br>
<tr>
				<th>ID</th>
				<th>First name</th>
				<th>Last Name</th>
				<th>User email</th>
				<th></th>
				<th></th>
				</tr>	
			<?php
			mysql_connect("127.0.0.1","tandemnsi","iVBjUYpeDsDa8COZ");
			mysql_select_db("wp_tandemnsi");
			$conn = mysql_connect($dbhost, $dbuser, $dbpass);
				
		

$counter = 1;	
$results = mysql_query("SELECT * FROM wp_tandemnsi.wp_users INNER JOIN wp_tandemnsi.wp_usermeta ON (wp_users.ID = wp_usermeta.user_id) WHERE 1=1 AND wp_users.user_registered > '2016-10-24 00:00:00' AND wp_users.user_registered < '2017-11-11 00:00:00' AND ( (wp_usermeta.meta_key = 'wp_capabilities' AND CAST(wp_usermeta.meta_value AS CHAR) LIKE '%\"subscriber\"%') ) ORDER BY user_nicename ASC");	

			
			while($tests = mysql_fetch_array($results))
			{
				$id = $tests['ID'];	
				echo "<tr align='center'>";	
				echo"<td><font color='black'>" .$counter ."</font></td>";
				
				echo"<td><font color='black'>" .$tests['display_name']."</font></td>";
				echo"<td><font color='black'>". $tests['user_nicename']. "</font></td>";
				echo"<td><font color='black'>". $tests['user_email']. "</font></td>";

				$counter++;

				echo"<td> <a href ='http://www.tandemnsi.com/wp-admin/user-edit.php?user_id=$id'>Edit</a></td> ";
				
				echo "<td><a onclick=\"return confirm('Delete this user data record?')\" href=\"http://www.tandemnsi.com/wp-content/themes/basis/udelete.php?id=$id\">Delete</a></td> ";
					
				echo "</tr>";
			}
			mysql_close($conn);
			?>
</table>
		
<script>
$('a.delete').on('click', function() {
    var choice = confirm('Do you really want to delete this record?');
    if(choice === true) {
        return true;
    }
    return false;
});
</script>
<?php } ?>



<?php 
add_action( 'show_user_profile', 'wpse_show_my_fields' );
add_action( 'edit_user_profile', 'wpse_show_my_fields' );
add_action( 'user_new_form',     'wpse_show_my_fields' );
function wpse_show_my_fields( $user ) {
    $user_organization = get_user_meta( $user->ID, 'user_organization', true ); 
    $user_tilte = get_user_meta( $user->ID, 'user_tilte', true ); 
    $user_street_address = get_user_meta( $user->ID, 'user_street_address', true ); 
    $user_city = get_user_meta( $user->ID, 'user_city', true ); 
    $user_state = get_user_meta( $user->ID, 'user_state', true ); 
    $user_phone = get_user_meta( $user->ID, 'user_phone', true ); 
	
	?>
 <table class="form-table">   
	<tr class="form-field">
        <th><label for="user_organization"><?php _e( 'User organization', 'text-domain' ) ?> </label></th>
        <td>
            <input name="user_organization" type="text" id="user_organization" value="<?php echo esc_attr( $user_organization ); ?>">
        </td>
    </tr>

	<tr class="form-field">
        <th><label for="user_tilte"><?php _e( 'User tilte', 'text-domain' ) ?> </label></th>
        <td>
            <input name="user_tilte" type="text" id="user_tilte" value="<?php echo esc_attr( $user_tilte ); ?>">
        </td>
    </tr>
	<tr class="form-field">
        <th><label for="user_street_address"><?php _e( 'User street address', 'text-domain' ) ?> </label></th>
        <td>
            <input name="user_street_address" type="text" id="user_street_address" value="<?php echo esc_attr( $user_street_address ); ?>">
        </td>
    </tr>
	<tr class="form-field">
        <th><label for="user_city"><?php _e( 'User city', 'text-domain' ) ?> </label></th>
        <td>
            <input name="user_city" type="text" id="user_city" value="<?php echo esc_attr( $user_city ); ?>">
        </td>
    </tr>
	<tr class="form-field">
        <th><label for="user_state"><?php _e( 'User state', 'text-domain' ) ?> </label></th>
        <td>
            <input name="user_state" type="text" id="user_state" value="<?php echo esc_attr( $user_state ); ?>">
        </td>
    </tr>
<tr class="form-field">
        <th><label for="user_phone"><?php _e( 'User phone', 'text-domain' ) ?> </label></th>
        <td>
            <input name="user_phone" type="text" id="user_phone" value="<?php echo esc_attr( $user_phone ); ?>">
        </td>
    </tr>
</table>	
<?php
}

add_action( 'personal_options_update',  'wpse_save_my_form_fields' );
add_action( 'edit_user_profile_update', 'wpse_save_my_form_fields' );
add_action( 'user_register',            'wpse_save_my_form_fields' );
function wpse_save_my_form_fields( $user_id ) {
    update_user_meta( $user_id, 'user_organization', $_POST['user_organization'] );
    update_user_meta( $user_id, 'user_tilte', $_POST['user_tilte'] );
    update_user_meta( $user_id, 'user_street_address', $_POST['user_street_address'] );
    update_user_meta( $user_id, 'user_city', $_POST['user_city'] );
    update_user_meta( $user_id, 'user_state', $_POST['user_state'] );
    update_user_meta( $user_id, 'user_phone', $_POST['user_phone'] );
}

add_action( 'edit_user_created_user', 'wpse_edit_user_created_user', 10, 2 ); 
function wpse_edit_user_created_user( $user_id, $notify ) {
    $meta1 = get_user_meta( $user_id, 'user_organization', true );
    $meta2 = get_user_meta( $user_id, 'user_tilte', true );
    $meta3 = get_user_meta( $user_id, 'user_street_address', true );
    $meta4 = get_user_meta( $user_id, 'user_city', true );
    $meta5 = get_user_meta( $user_id, 'user_state', true );
    $meta6 = get_user_meta( $user_id, 'user_phone', true );
}


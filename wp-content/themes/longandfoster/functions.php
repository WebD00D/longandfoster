<?php
/**
 * longandfoster functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package longandfoster
 */

if ( ! function_exists( 'longandfoster_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function longandfoster_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on longandfoster, use a find and replace
	 * to change 'longandfoster' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'longandfoster', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'longandfoster' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'longandfoster_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'longandfoster_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function longandfoster_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'longandfoster_content_width', 640 );
}
add_action( 'after_setup_theme', 'longandfoster_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function longandfoster_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'longandfoster' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'longandfoster' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'longandfoster_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function longandfoster_scripts() {
	wp_enqueue_style( 'longandfoster-style', get_stylesheet_uri() );

	wp_enqueue_script( 'longandfoster-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'longandfoster-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'longandfoster_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/** CUSTOM POST TYPES AND TAXONOMIES **/

function create_agentposttype() {

	register_post_type( 'agents',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Agents' ),
				'singular_name' => __( 'Agent' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'agents'),
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_agentposttype' );


function create_listingposttype() {

	register_post_type( 'listings',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Listings' ),
				'singular_name' => __( 'Listing' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'listings'),
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_listingposttype' );


//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_listing_type_taxonomy', 0 );

//create a custom taxonomy name it topics for your posts

function create_listing_type_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' => _x( 'Listing Type', 'taxonomy general name' ),
    'singular_name' => _x( 'Listing Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Listing Types' ),
    'all_items' => __( 'All Listing Types' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Listing Type' ),
    'update_item' => __( 'Update Listing Type' ),
    'add_new_item' => __( 'Add New Listing Type' ),
    'new_item_name' => __( 'New Listing Type' ),
    'menu_name' => __( 'Listing Types' ),
  );

// Now register the taxonomy

  register_taxonomy('listing_types',array('listings'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'listing-type' ),
  ));

}

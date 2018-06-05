<?php
/**
 * Spark Body and Soul functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Spark_Body_and_Soul
 */

if ( ! function_exists( 'spark_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function spark_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Spark Body and Soul, use a find and replace
		 * to change 'spark' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'spark', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'spark' ),
			'spark-menu' => esc_html__( 'Main Spark Menu', 'spark' ),

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
		add_theme_support( 'custom-background', apply_filters( 'spark_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		
		add_theme_support( 'woocommerce' );

	}
endif;
add_action( 'after_setup_theme', 'spark_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function spark_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'spark_content_width', 640 );
}
add_action( 'after_setup_theme', 'spark_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function spark_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'spark' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'spark' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'spark_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function spark_scripts() {
	wp_enqueue_style( 'spark-style', get_stylesheet_uri() );
	
	wp_enqueue_script('jquery');
	
	
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css' );

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '20151215', true );

	
	if ( is_singular( 'Gift Card' ) ) {
		
		wp_enqueue_style( 'etalage-css', get_template_directory_uri() . '/css/etalage.css' );
		wp_enqueue_script( 'etalage-js', get_template_directory_uri() . '/js/jquery.etalage.min.js', array('jquery'), '20151215', true );
		wp_enqueue_script( 'Gift Card-js', get_template_directory_uri() . '/js/Gift Card.js', array('jquery', 'etalage-js'), '20151215', true );

	}

	wp_enqueue_script( 'spark-js', get_template_directory_uri() . '/js/spark.js', array('jquery'), '20151215', true );

	

	wp_enqueue_script( 'spark-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'spark-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'spark_scripts', 1 );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


add_filter( 'nav_menu_css_class', 'special_nav_class', 10, 3 );
function special_nav_class( $classes, $item, $args ) {
    if ( 'spark-menu' === $args->theme_location ) {
        $classes[] = 'nav-item';
    }

    return $classes;
}

function add_menu_atts( $atts, $item, $args ) {
    // check if the item is in the primary menu
    if( 'spark-menu' === $args->theme_location ) {
      // add the desired attributes:
      $atts['class'] = 'nav-link';
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_atts', 10, 3 );

add_action('pre_get_posts','myfunc');
function myfunc($query){ 
    if ($query->is_main_query() && $query->is_archive){
        $query->set( 'posts_per_page', 1000);
    }
    return $query;
}

function register_spark_cpts() {

	/**
	 * Post Type: Packages.
	 */

	$labels = array(
		"name" => __( 'Gift Cards', 'spark' ),
		"singular_name" => __( 'Gift Cards', 'spark' ),
		"add_new_item" => __('Add New Gift Card', 'spark'),
		"edit_item" => __('Edit Gift Card', 'spark'),
		"view_item" => __('View Gift Card', 'spark'),
		"view_items" => __('View Gift Cards', 'spark'),

	);

	$args = array(
		"label" => __( 'Gift Cards', 'spark' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "gift_cards", "with_front" => true ),
		"query_var" => true,
		"menu_icon" => "dashicons-products",
		"taxonomies" => array( "category" ),
	);

register_post_type( "gift_cards", $args );

}

add_action( 'init', 'register_spark_cpts' );

function my_acf_google_api() {
	
	acf_update_setting( 'google_api_key', "AIzaSyDJx0f2n1AZj1TULsFkXGSzidbq40NnTAA" );
}

add_action('acf/init', 'my_acf_google_api');
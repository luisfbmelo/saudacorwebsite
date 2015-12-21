<?php
/**
 * saudacor functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package saudacor
 */

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');


if ( ! function_exists( 'saudacor_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function saudacor_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on saudacor, use a find and replace
	 * to change 'saudacor' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'saudacor', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary Menu', 'main' ),
		'top-extra'=> esc_html__('Top Extra Menu', 'top')
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'saudacor_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
}
endif; // saudacor_setup
add_action( 'after_setup_theme', 'saudacor_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function saudacor_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'saudacor_content_width', 640 );
}
add_action( 'after_setup_theme', 'saudacor_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function saudacor_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Barra Lateral', 'saudacor' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Rodapé', 'saudacor' ),
		'id'            => 'footer-sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s col-xs-12 col-sm-3">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Eventos', 'saudacor' ),
		'id'            => 'events-sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) ); 

	register_sidebar( array(
		'name'          => esc_html__( 'Projetos', 'saudacor' ),
		'id'            => 'projects-sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Páginas de detalhes', 'saudacor' ),
		'id'            => 'single-sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'saudacor_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function saudacor_scripts() {
	wp_enqueue_style( 'saudacor-style', get_stylesheet_uri() );
	wp_enqueue_style( 'titillium-google-fonts', 'https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600,700', false );
	wp_enqueue_style( 'opensans-google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700', false );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', false, NULL, 'all' );
	wp_enqueue_style( 'custom', get_template_directory_uri() . '/css/saudacor.css' );

	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr-custom.js', array(), NULL, true );
	wp_enqueue_script( 'saudacor-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'saudacor-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap/bootstrap.min.js',array('jquery'), NULL, true );
	wp_enqueue_script( 'placeholder-fix', get_template_directory_uri() . '/js/placeholder-fix.js',array('jquery'), NULL, true );	
	wp_enqueue_script( 'mixitup', get_template_directory_uri() . '/js/jquery.mixitup.min.js',array('jquery'), NULL, true );	
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js',array('jquery'), NULL, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'saudacor_scripts' );

/**
 * Template customizer
 */
function saudacor_customizer( $wp_customize ) {

	/**
	 * Logo upload
	 */
    $wp_customize->add_section( 'saudacor_logo_section' , array(
	    'title'       => __( 'Logo', 'saudacor' ),
	    'priority'    => 30,
	    'description' => 'Upload a logo to replace the default site name and description in the header',
	));

	$wp_customize->add_setting( 'saudacor_logo' );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'saudacor_logo', array(
	    'label'    => __( 'Logo', 'saudacor' ),
	    'section'  => 'saudacor_logo_section',
	    'settings' => 'saudacor_logo',
	) ) );

	
}
add_action( 'customize_register', 'saudacor_customizer' );


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

/**
 * Replace excerpt more button
 */
function new_excerpt_more($more) {
	global $post;
	//return '... <div class="moretag"><a class="cta primary outlined small" href="'. get_permalink($post->ID) . '"> Ler mais </a></div>';
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

/**
 * CUSTOM POST TYPES
 */

/*function custom_post_type_func() {
    //posttypename = services
	$labels_services = array(
		'name' => _x( 'Serviços', 'serviços' ),
		'singular_name' => _x( 'serviços', 'serviços' ),
		'add_new' => _x( 'Adicionar Novo', 'serviços' ),
		'add_new_item' => _x( 'Novo serviço', 'serviços' ),
		'edit_item' => _x( 'Editar serviço', 'serviços' ),
		'new_item' => _x( 'Novo serviço', 'serviços' ),
		'view_item' => _x( 'Ver serviço', 'serviços' ),
		'search_items' => _x( 'Procurar serviços', 'serviços' ),
		'not_found' => _x( 'Não foram encontrados serviços', 'serviços' ),
		'not_found_in_trash' => _x( 'Sem itens no Lixo', 'serviços' ),
		'parent_item_colon' => _x( 'Serviços Pai:', 'serviços' ),
		'menu_name' => _x( 'Serviços', 'serviços' ),
	);
	$args_services = array(
		'labels' => $labels_services,
		'hierarchical' => true,
		'supports' => array( 'title', 'editor', 'thumbnail'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'has_archive' => false,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'capability_type' => 'post'
	);
	

	//posttypename = events
	$labels_events = array(
		'name' => _x( 'Eventos', 'eventos' ),
		'singular_name' => _x( 'eventos', 'eventos' ),
		'add_new' => _x( 'Adicionar Novo', 'eventos' ),
		'add_new_item' => _x( 'Novo evento', 'eventos' ),
		'edit_item' => _x( 'Editar evento', 'eventos' ),
		'new_item' => _x( 'Novo evento', 'eventos' ),
		'view_item' => _x( 'Ver evento', 'eventos' ),
		'search_items' => _x( 'Procurar eventos', 'eventos' ),
		'not_found' => _x( 'Não foram encontrados eventos', 'eventos' ),
		'not_found_in_trash' => _x( 'Sem itens no Lixo', 'eventos' ),
		'parent_item_colon' => _x( 'Eventos Pai:', 'eventos' ),
		'menu_name' => _x( 'Eventos', 'eventos' ),
	);
	$args_events = array(
		'labels' => $labels_events,
		'hierarchical' => true,
		'supports' => array( 'title', 'editor', 'thumbnail'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'_builtin' => false
	);
	// RESET RULES
	//flush_rewrite_rules();
	
	register_post_type( 'events', $args_events );
	register_post_type( 'services', $args_services );
}
add_action( 'init', 'custom_post_type_func');
*/

/**
 * Add custom taxonomies
 *
 * Additional custom taxonomies can be defined here
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
 */
function add_custom_taxonomies() {
  // Add new "Locations" taxonomy to Posts
  register_taxonomy('project_type', 'projects', array(
    // Hierarchical taxonomy (like categories)
    'hierarchical' => true,
    // This array of options controls the labels displayed in the WordPress Admin UI
    'labels' => array(
      'name' => _x( 'Tipo de projeto', 'project' ),
      'singular_name' => _x( 'Tipo de projeto', 'project' ),
      'search_items' =>  __( 'Procurar por tipo de projeto' ),
      'all_items' => __( 'Todos os tipos' ),
      'parent_item' => __( 'Tipo pai' ),
      'parent_item_colon' => __( 'Tipo pai:' ),
      'edit_item' => __( 'Editar tipo' ),
      'update_item' => __( 'Actualizar tipo' ),
      'add_new_item' => __( 'Adicionar novo tipo' ),
      'new_item_name' => __( 'Adicionar nome do tipo' ),
      'menu_name' => __( 'Tipos de projeto' ),
    ),
    // Control the slugs used for this taxonomy
    'rewrite' => array(
      'slug' => 'project_type', // This controls the base slug that will display before each term
      'with_front' => false, // Don't display the category base before "/type/"
      'hierarchical' => true // This will allow URL's like "/type/boston/cambridge/"
    ),
  ));
}
add_action( 'init', 'add_custom_taxonomies', 0 );

/**
 * Customize taxonomy query
 */
function customize_customtaxonomy_archive_display ( $query ) {
    if (($query->is_main_query()) && (is_tax('project_type')))
    $query->set('meta_key', 'event_date');
    $query->set( 'orderby', 'meta_value_num' );
    $query->set( 'order', 'DESC' );
}
 
add_action( 'pre_get_posts', 'customize_customtaxonomy_archive_display' );


/**
 * Hightlight custom post types
 */
function add_current_nav_class($classes, $item) {
	
	// Getting the current post details
	global $post;
	
	// Getting the post type of the current post
	$current_post_type = get_post_type_object(get_post_type($post->ID));
	$current_post_type_slug = $current_post_type->rewrite['slug'];
		
	// Getting the URL of the menu item
	$menu_slug = strtolower(trim($item->url));
	
	// If the menu item URL contains the current post types slug add the current-menu-item class
	if (strpos($menu_slug,$current_post_type_slug) !== false) {
	
	   $classes[] = 'current-menu-item';
	
	}
	
	// Return the corrected set of classes to be added to the menu item
	return $classes;

}
add_action('nav_menu_css_class', 'add_current_nav_class', 10, 2 );
?>
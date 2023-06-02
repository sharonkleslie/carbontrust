<?php
/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );
/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles() {

	// Get the theme data.
	$the_theme = wp_get_theme();

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";

	wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $the_theme->get( 'Version' ) );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $the_theme->get( 'Version' ), true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {
    
    // Check function exists.
    if( function_exists('acf_register_block_type') ) {
        
        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'Block:Testimonial',
            'title'             => __('Testimonial'),
            'description'       => __('A custom testimonial block.'),
            'render_template'   => 'loop-templates/blocks/testimonial/testimonial.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'testimonial', 'quote' ),
        ));
    }

}

/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

function child_theme_setup() {

	// Editor Color Palette
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => __( 'White', 'child_theme' ),
			'slug'  => 'white',
			'color'	=> '#ffffff',
		),
			array(
			'name'	=> __( 'Black', 'child_theme' ),
			'slug'	=> 'black',
			'color'	=> '#000000',
		),
		array(
			'name'  => __( 'Coral', 'child_theme' ),
			'slug'  => 'coral',
			'color' => '#df4661',
		),
		array(
			'name'  => __( 'Magenta', 'child_theme' ),
			'slug'  => 'magenta',
			'color' => '#d0006f',
		),
		array(
			'name'  => __( 'Violet', 'child_theme' ),
			'slug'  => 'violet',
			'color' => '#6961ce',
		),
		array(
			'name'  => __( 'Sky', 'child_theme' ),
			'slug'  => 'sky',
			'color' => '#418fde',
		),
		array(
			'name'  => __( 'Aqua', 'child_theme' ),
			'slug'  => 'aqua',
			'color' => '#00afd7',
		),
		array(
			'name'  => __( 'Grass', 'child_theme' ),
			'slug'  => 'grass',
			'color' => '#6ba539',
		),
		array(
			'name'  => __( 'Chili', 'child_theme' ),
			'slug'  => 'chili',
			'color' => '#a50034',
		),
		array(
			'name'  => __( 'Plum', 'child_theme' ),
			'slug'  => 'plum',
			'color' => '#89004b',
		),
		array(
			'name'  => __( 'Grape', 'child_theme' ),
			'slug'  => 'grape',
			'color' => '#582c83',
		),
		array(
			'name'  => __( 'Blueberry', 'child_theme' ),
			'slug'  => 'blueberry',
			'color' => '#2a4891',
		),
		array(
			'name'  => __( 'Ocean', 'child_theme' ),
			'slug'  => 'ocean',
			'color' => '#005b77',
		),
		array(
			'name'  => __( 'Forest', 'child_theme' ),
			'slug'  => 'forest',
			'color' => '#1c6632',
		),
		array(
			'name'  => __( 'Grey', 'child_theme' ),
			'slug'  => 'grey',
			'color' => '#efefef',
		),
	) );
}
add_action( 'after_setup_theme', 'child_theme_setup', '100' );


/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @param string $current_mod The current value of the theme_mod.
 * @return string
 */
function understrap_default_bootstrap_version( $current_mod ) {
	return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20 );

// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

  global $wp_version;
  if ( $wp_version !== '5.7' ) {
     return $data;
  }

  $filetype = wp_check_filetype( $filename, $mimes );

  return [
      'ext'             => $filetype['ext'],
      'type'            => $filetype['type'],
      'proper_filename' => $data['proper_filename']
  ];

}, 10, 4 );

function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
  echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );


/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js() {
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array( 'customize-preview' ),
		'20130508',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js' );

add_theme_support( 'align-wide' );

// Our custom post type function
function create_posttype() {

   register_post_type( 
'Case Studies',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Case Studies' ),
                'singular_name' => __( 'Case Studies' ) ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'case-studies'),
            'show_in_rest' => true,
  
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );

function mindbase_create_acf_pages() {
  if(function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
      'page_title'      => 'Project Archive Settings', /* Use whatever title you want */
      
      'menu_slug'     => 'edit.php?post_type=projects', /* Change "services" to fit your situation */
      'capability' => 'edit_posts'
    ));
	   acf_add_options_page(array(
      'page_title'      => 'Project Alumni Settings', /* Use whatever title you want */
      
      'menu_slug'     => 'edit.php?post_type=alumni', /* Change "services" to fit your situation */
      'capability' => 'edit_posts'
    ));
	   acf_add_options_sub_page(array(
		     'page_title' => 'Case Studies Settings', /* Use whatever title you want */
      
      'menu_slug'     => 'edit.php?post_type=casestudies', /* Change "services" to fit your situation */
      'capability' => 'edit_posts'
		       ));
  }
}
add_action('init', 'mindbase_create_acf_pages');

function remove_category_text_from_archive_title($title) {
    return is_category()?single_cat_title('', false):$title;
}
add_filter('get_the_archive_title', 'remove_category_text_from_archive_title'); 
add_filter('the_title', function( $title ) {
  return is_admin() ? $title : html_entity_decode( $title );
}, 99 );

function wb_infinite_scroll_render() {
    get_template_part( 'loop-templates/content-image', 'standard' );
}
function custom_pre_get_posts($query) {
    // validate
    if(!is_admin() && $query->is_main_query()) {

        if(is_archive()) {
            $query->set('orderby', 'name'); // order posts by title
            $query->set('order', 'ASC'); // and in ascending order
        }
    }
}
add_action('pre_get_posts', 'custom_pre_get_posts');

function my_excerpt_length($length){ return 25; } add_filter('excerpt_length', 'my_excerpt_length');

function get_custom_cat_template($single_template) {
     global $post;
 
       if ( in_category( 'portfolio' )) {
		    
          $single_template = dirname( __FILE__ ) . '/single-portfolio.php';
		  
		  }
		  
		 
     return $single_template;
		  
}
add_filter( "single_template", "get_custom_cat_template" ) ;

add_filter('wp_title','search_form_title');

function search_form_title($title){
 
 global $searchandfilter;
 
 if ( $searchandfilter->active_sfid() == 11475)
 {
 return 'Search Results';
 }
 else
 {
 return $title;
 }
 
}
/** 
 * Enables the HTTP Strict Transport Security (HSTS) header in WordPress. 
 */
function tg_enable_strict_transport_security_hsts_header_wordpress() {
    header( 'Strict-Transport-Security: max-age=31536000' );
}
add_action( 'send_headers', 'tg_enable_strict_transport_security_hsts_header_wordpress' );

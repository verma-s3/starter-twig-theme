<?php
/**
 * grasslands functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package grasslands
 */

if ( ! function_exists( 'grasslands_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function grasslands_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on grasslands, use a find and replace
		 * to change 'grasslands' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'grasslands', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'grasslands' ),
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
		add_theme_support( 'custom-background', apply_filters( 'grasslands_custom_background_args', array(
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
	}
endif;
add_action( 'after_setup_theme', 'grasslands_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function grasslands_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'grasslands_content_width', 640 );
}
add_action( 'after_setup_theme', 'grasslands_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function grasslands_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'grasslands' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'grasslands' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'grasslands_widgets_init' );



/**
 * Enqueue scripts and styles.
 */
function grasslands_scripts() {

	wp_enqueue_style( 'dashicons' );

	// wp_enqueue_script( 'grasslands-fancybox-mousewheel-js', get_template_directory_uri() . '/fancybox/lib/jquery.mousewheel.pack.js', array( 'jquery' ), '20170802', true );

  	// wp_enqueue_style( 'grasslands-fancybox-css', get_template_directory_uri() . '/fancybox/source/jquery.fancybox.css' );

	wp_enqueue_script( 'my-script', get_template_directory_uri() . '/js/all.min.js', array('jquery'), true );

	// wp_enqueue_script( 'slick-script', get_template_directory_uri() . '/js/slick.js', array('jquery'), true );

	wp_enqueue_style( 'grasslands-bootstrap-css', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
	
	wp_enqueue_script( 'grasslands-boot', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js');

	wp_enqueue_style( 'grasslands-style', get_template_directory_uri() . '/style.css');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'grasslands_scripts' );


// *** Remove unecessary menu items for all but Administrators ***
function grasslands_remove_comments_menu_item() {
   $user = wp_get_current_user();
   if ( ! $user->has_cap( 'manage_options' ) ) {
       remove_menu_page( 'edit-comments.php' );
       remove_menu_page( 'tools.php' );
       remove_menu_page( 'profile.php' );
   }
}
add_action( 'admin_menu', 'grasslands_remove_comments_menu_item' );


// *** login logo ***
function grasslands_login_logo() {  ?>
    <style type="text/css">
        .login h1 a {
            background-image: url("/wp-content/themes/grasslands/images/Hylife-reverse.svg");
            padding-bottom: 0;
            width: 307px;
            height: 175px;
            background-size: 301px;
						background-position: center bottom;
						margin-bottom: 66px
				}

		.login {
			background-color: #05314d;
		}

		#login a {
			color: #fff !important;
		}

    </style>
<?php }
add_action( 'login_head', 'grasslands_login_logo' ); //custom login function


/*** Register Custom Post Types***/
// add_action( 'init', 'create_custom_post_type' );
// function create_custom_post_type() {
//   register_post_type( 'slider',
//     array(
//       'labels' => array(
//         'name' => __( 'Slider' ),
//         'singular_name' => __( 'Slider' )
//       ),
//       'public' => true,
//       'has_archive' => true,
//       'menu_icon'   => 'dashicons-format-gallery',
// 			'supports'    => array('title', 'editor', 'custom-fields'),
//     )
// 	);
// }



if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();
	acf_set_options_page_title( __('Contact') );


}


function remove_editor() {
	if (isset($_GET['post'])) {
			$id = $_GET['post'];
			$template = get_post_meta($id, '_wp_page_template', true);
			switch ($template) {
					case 'page-templates/home-page.php':

					remove_post_type_support('page', 'editor');
					break;
					default :
					// Don't remove any other template.
					break;
			}
	}
}
add_action('init', 'remove_editor');



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

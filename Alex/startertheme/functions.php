<?php
/**
 * Timber starter-theme
 * https://github.com/timber/starter-theme
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

/**
 * If you are installing Timber as a Composer dependency in your theme, you'll need this block
 * to load your dependencies and initialize Timber. If you are using Timber via the WordPress.org
 * plug-in, you can safely delete this block.
 */


$composer_autoload = __DIR__ . '/vendor/autoload.php';
if ( file_exists( $composer_autoload ) ) {
	require_once $composer_autoload;
	$timber = new Timber\Timber();
}

/**
 * This ensures that Timber is loaded and available as a PHP class.
 * If not, it gives an error message to help direct developers on where to activate
 */
if ( ! class_exists( 'Timber' ) ) {

	add_action(
		'admin_notices',
		function() {
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
		}
	);

	add_filter(
		'template_include',
		function( $template ) {
			return get_stylesheet_directory() . '/static/no-timber.html';
		}
	);
	return;
}

/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = array( 'templates', 'views' );

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;


/**
 * We're going to configure our theme inside of a subclass of Timber\Site
 * You can move this to its own file and include here via php's include("MySite.php")
 */
class StarterSite extends Timber\Site 
{
	/** Add timber support. */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'theme_supports' ) );
		add_filter( 'timber/context', array( $this, 'add_to_context' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts_and_styles' ) );
		add_action( 'widgets_init', array( $this, 'widget_area' ) );
		add_action( 'login_head', array( $this, 'custom_login_logo' ) );
		add_filter( 'login_headerurl', array( $this, 'login_logo_url' ) );
		add_filter( 'login_headertext', array( $this, 'login_logo_url_title' ) );
		add_action( 'admin_menu', array( $this, 'remove_unecessary_menu_items' ) );
		add_action('init', array( $this,'remove_editor' ) );
		add_filter( 'timber_context', array( $this, 'options_page_global' ) );
		add_action('wp_before_admin_bar_render', array( $this, 'admin_custom_logo' ) );
		add_action( 'after_setup_theme', array( $this, 'theme_register_nav_menus', 0 ) );
		add_action( 'after_setup_theme', array( $this, 'image_cropping_sizes' ) );
		add_action( 'after_setup_theme', array( $this, 'acf_options_page_for_theme' ) );
		add_action( 'init', array( $this, 'register_custom_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
		parent::__construct();
	}

	/** This is where you can register custom post types. */
	public function register_custom_post_types() {

	}
	
	/** This is where you can register custom taxonomies. */
	public function register_taxonomies() {

	}

	
	/** This is where you add some context
	 *
	 * @param string $context context['this'] Being the Twig's {{ this }}.
	 */
	public function add_to_context( $context ) {
		$context['menu']  = new Timber\Menu();
		$context['site']  = $this;
		return $context;
	}


	/**
	 * Load Styles and Scripts Here
	 */
	public function scripts_and_styles() {

		wp_enqueue_style( 'dashicons' );
	
		wp_enqueue_script( 'my-fancybox-mousewheel-js', get_template_directory_uri() . '/fancybox/lib/jquery.mousewheel.pack.js', array( 'jquery' ), '20170802', true );
	
		wp_enqueue_style( 'my-fancybox-css', get_template_directory_uri() . '/fancybox/source/jquery.fancybox.css' );
	
		wp_enqueue_script( 'my-script', get_template_directory_uri() . '/static/js/all.min.js', array('jquery'), true );
	
		// wp_enqueue_script( 'slick-script', get_template_directory_uri() . '/js/slick.js', array('jquery'), true );
	
		// wp_enqueue_style( 'my-bootstrap-css', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
	
		wp_enqueue_style( 'my-style', get_template_directory_uri() . '/static/css/main.css');
	
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

	/**
	 * Register widget area.
	*/
	public function widget_area() {
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'deerwoodprojects' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'deerwoodprojects' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}

	// *** login logo ***
	public function custom_login_logo() {
		echo '
			<style type="text/css">
				.login h1 a {
					background-image: url("/wp-content/themes/deerwoodprojects/static/images/deerwood-projects-logo.svg");
					padding-bottom: 0;
					width: 320px;
					height: 116px;
					background-size: 320px;
					background-position: center bottom;
				}
			</style>';
	}

	// *** login URL ***
	public function login_logo_url() {
		return home_url();
	}

		
	// *** login title ***
	public function login_logo_url_title() {
		return 'deerwoodprojects';
	}

	// *** Remove unecessary menu items for all but Administrators ***
	public function remove_unecessary_menu_items() {
		$user = wp_get_current_user();
		if ( ! $user->has_cap( 'manage_options' ) ) {
			remove_menu_page( 'edit-comments.php' );
			remove_menu_page( 'tools.php' );
			remove_menu_page( 'profile.php' );
		}
	}

	// *** Remove Editor ***
	public function remove_editor() {
		if (isset($_GET['post'])) {
				$id = $_GET['post'];
				$template = get_post_meta($id, '_wp_page_template', true);
				switch ($template) {
						case 'page-templates/page-home.php':
						case 'page-templates/page-landscaping-features.php':
						case 'page-templates/page-project-gallery.php':

						remove_post_type_support('page', 'editor');
						break;
						default :
						// Don't remove any other template.
						break;
				}
		}
	}

	/* Use Options Page Globally */
	public function options_page_global( $context ) {
		$context['options'] = get_fields('option');
		return $context;
	}

	/* Custom Backend Logo */
	public function admin_custom_logo() {
		echo '
		<style type="text/css">
			#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
			background-image: url(' . get_bloginfo('stylesheet_directory') . '/static/images/deerwoodprojects-monogram.svg) !important;
			background-position: 0 0;
			color:rgba(0, 0, 0, 0);
			}
			#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
			background-position: 0 0;
		}
		</style>
		';
	}
	
		
	/**
	 * Theme Support
	 */
	public function theme_supports() {
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

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'audio',
			)
		);

		add_theme_support( 'menus' );
	}

	/**
	 * Regsiter Nav Menus
	 */
	public function theme_register_nav_menus() {
		register_nav_menus( array(
			'primary_menu' => esc_html__( 'Primary Menu', 'deerwoodprojects' ),
		) );		
	}

	/**
	 * Regsiter ACF Options Page
	 */
	public function acf_options_page_for_theme() {
		if( function_exists('acf_add_options_page') ) {
			acf_add_options_page();
			acf_set_options_page_title( __('Footer') );
		}		
	}

	/**
	 * Image Cropping Sizes
	 */
	public function image_cropping_sizes() {
		add_image_size('square-imgs', 502, 337, true);
	}

}

new StarterSite();
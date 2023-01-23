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
		// add_action('init', array( $this,'remove_editor' ) );
		add_filter( 'timber_context', array( $this, 'options_page_global' ) );
		add_action('wp_before_admin_bar_render', array( $this, 'admin_custom_logo' ) );
		add_action( 'after_setup_theme', array( $this, 'theme_register_nav_menus' ) );
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
	
		wp_enqueue_script( 'slick-script', get_template_directory_uri() . '/slick/slick.min.js', array('jquery'), true );
	
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
			'name'          => esc_html__( 'Sidebar', 'bmf' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'bmf' ),
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
					background-image: url("/wp-content/themes/bmf/static/images/bmf-logo.svg");
					padding-bottom: 0;
					width: 320px;
					height: 116px;
					background-size: 320px;
					background-position: center bottom;
				}

				.wp-core-ui .button-primary {
					background-color: #0A2136;
					border-color: #0A2136;
				}

				#nav a {
					color: #fff !important;
				}

				#backtoblog a {
					color: #fff !important;
				}

				.login {
					background-image: url("/wp-content/themes/bmf/static/images/login-bg.jpg");
					background-size: cover;
					background-position: center;
					background-repeat: no-repeat;
				}
			</style>';
	}

	// *** login URL ***
	public function login_logo_url() {
		return home_url();
	}

		
	// *** login title ***
	public function login_logo_url_title() {
		return 'bmf';
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
	// public function remove_editor() {
	// 	if (isset($_GET['post'])) {
	// 			$id = $_GET['post'];
	// 			$template = get_post_meta($id, '_wp_page_template', true);
	// 			switch ($template) {
	// 					case 'page-templates/page-home.php':
	// 					case 'page-templates/page-about.php':
	// 					case 'page-templates/page-services.php':
	// 					case 'page-templates/page-portfolio.php':
	// 					case 'page-templates/page-careers.php':
	// 					case 'page-templates/page-contact.php':

	// 					remove_post_type_support('page', 'editor');
	// 					break;
	// 					default :
	// 					// Don't remove any other template.
	// 					break;
	// 			}
	// 	}
	// }

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
			background-image: url(' . get_bloginfo('stylesheet_directory') . '/static/images/badge.svg) !important;
			background-position: 0 0;
			color:rgba(0, 0, 0, 0);
			background-size: contain;
			background-repeat: no-repeat;
			width: 51px;
			background-repeat: no-repeat;
			display: block;
			height: 47px;
			top: -8px;
			}

			#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
				background-position: 0 0;
			}

			#wpadminbar #wp-admin-bar-wp-logo>.ab-item {
				padding: 0 52px;
				padding-right: 79px;
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
			'primary_menu' => esc_html__( 'Primary Menu', 'bmf' ),
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
		add_image_size('hero', 1920, 1128, true);
		add_image_size('img-block', 812, 487, true);
		add_image_size('full-width', 1640, 487, true);
		add_image_size('full-width-large', 1640, 1035, true);
		add_image_size('team', 260, 304, true);
		add_image_size('portfolio', 398, 296, true);
	}

}


/****************
 * Admin styling
 ****************/
add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
    body, td, textarea, input, select {
		font-family: "Montserrat", sans-serif;
    }
	


	.wp-admin {
		background-color: #fff;
		margin-top: 0px !important;
	}

	
	#wpadminbar {
		background-color: #0A2136;
		padding: 0px 0;
	}



	@media screen and (min-width: 768px) {
		.edit-post-layout .editor-post-publish-panel {
			top: 58px;
		}

		.wp-admin {
			background-color: #fff;
			margin-top: 27px !important;
		}
	
		
		#wpadminbar {
			background-color: #0A2136;
			padding: 8px 0;
		}
	}



	.edit-post-header {
		margin-top: 22px;
	}

	input[type=checkbox]:focus, input[type=color]:focus, input[type=date]:focus, input[type=datetime-local]:focus, input[type=datetime]:focus, input[type=email]:focus, input[type=month]:focus, input[type=number]:focus, input[type=password]:focus, input[type=radio]:focus, input[type=search]:focus, input[type=tel]:focus, input[type=text]:focus, input[type=time]:focus, input[type=url]:focus, input[type=week]:focus, select:focus, textarea:focus {
		border-color: #79242f !important;
		box-shadow: 0 0 0 1px #79242f !important;
	}

	.acf-switch.-on {
		background-color: #79242f;
		border-color: #79242f;
	}


	#footer-thankyou {
		display: none;
	}

	#adminmenu, #adminmenu .wp-submenu, #adminmenuback, #adminmenuwrap {
		background-color: #0A2136;
	}

	.wp-core-ui .button-primary.focus, .wp-core-ui .button-primary.hover, .wp-core-ui .button-primary:focus, .wp-core-ui .button-primary:hover {
		background-color: #79242f;
		border-color: #79242f;
		color: #fff;
	}
	
	.wp-core-ui .button-primary.active, .wp-core-ui .button-primary.active:focus, .wp-core-ui .button-primary.active:hover, .wp-core-ui .button-primary:active {
		background-color: #79242f;
		border-color: #79242f;
		color: #fff;
	}

	.wp-core-ui .button-primary {
		background-color: #79242f;
		border-color: #79242f;
	}
	.wp-core-ui .button, .wp-core-ui .button-secondary,
	.wp-core-ui .button-secondary:active, .wp-core-ui .button:active {
		border-color: #79242f;
	}

	.wp-core-ui .button-secondary:hover, .wp-core-ui .button.hover, .wp-core-ui .button:hover {
		background-color: #79242f;
		border-color: #79242f;
		color: #fff !important;
	}





	#adminmenu {
		background-color: #0A2136;
	}

	#adminmenu a.wp-has-current-submenu {
		background-color: #79242f !important;
	}

	#adminmenu li a:focus div.wp-menu-image:before, #adminmenu li.opensub div.wp-menu-image:before, #adminmenu li:hover div.wp-menu-image:before,
	a:hover {
		color: #c8a977 !important;
	}

	a {
		color: #0A2136;
	}

	a::before {
		color: #c8a977 !important;
	}


	.wp-core-ui .button {
		color: #79242f;
	}

	.wp-core-ui .button-primary {
		color: #fff;
	}
  </style>';
}



/**************************
 * Remove default posts
 ***************************/
add_action( 'admin_menu', 'remove_default_post_type' );

function remove_default_post_type() {
    remove_menu_page( 'edit.php' );
}


/***************************
 * REMOVE COMMENT FUNCTION
 ****************************/
function my_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'my_admin_bar_render' );

// Removes from admin menu
add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
// Removes from post and pages
add_action('init', 'remove_comment_support', 100);

function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function mytheme_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );


/***************************************
 * REGISTER ACF BLOCKS FOR GUTENBURG
 ***************************************/
add_action('acf/init', 'my_acf_init');
function my_acf_init() {
	
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		// register a hero image block
		acf_register_block(array(
			'name'				=> 'hero',
			'title'				=> __('Hero'),
			'description'		=> __('A custom hero image block.'),
			'render_callback'	=> 'hero_render_callback',
			'category'			=> 'formatting',
			'icon' 				=> 'images-alt',
			'post_types' => array('page'),
			'keywords'			=> array( 'hero', 'image' ),
		));

		// register accordion block
		acf_register_block(array(
			'name'				=> 'accordion',
			'title'				=> __('Accordion'),
			'description'		=> __('A custom accordion block.'),
			'render_callback'	=> 'accordion_render_callback',
			'category'			=> 'formatting',
			'icon' 				=> 'images-alt',
			'post_types' => array('page'),
			'keywords'			=> array( 'accordion'),
		));

		// register Steps Slider block
		acf_register_block(array(
			'name'				=> 'steps_slider',
			'title'				=> __('Steps Slider'),
			'description'		=> __('A custom slider block that lists steps.'),
			'render_callback'	=> 'step_slider_render_callback',
			'category'			=> 'formatting',
			'icon' 				=> 'images-alt',
			'post_types' => array('page'),
			'keywords'			=> array( 'steps', 'slider' ),
		));

		// register 4 column list block
		acf_register_block(array(
			'name'				=> 'four_column_list',
			'title'				=> __('Four Column List'),
			'description'		=> __('A four column layout.'),
			'render_callback'	=> 'four_column_layout_render_callback',
			'category'			=> 'formatting',
			'icon' 				=> 'images-alt',
			'post_types' => array('page'),
			'keywords'			=> array( 'four', 'column', 'layout' ),
		));

		// register Team Members block
		acf_register_block(array(
			'name'				=> 'team_members',
			'title'				=> __('Team Members'),
			'description'		=> __('Team Members Block.'),
			'render_callback'	=> 'team_member_render_callback',
			'category'			=> 'formatting',
			'icon' 				=> 'images-alt',
			'post_types' => array('page'),
			'keywords'			=> array( 'members', 'team', 'layout' ),
		));

		// register services block
		acf_register_block(array(
			'name'				=> 'services',
			'title'				=> __('Services'),
			'description'		=> __('Services Block.'),
			'render_callback'	=> 'services_render_callback',
			'category'			=> 'formatting',
			'icon' 				=> 'images-alt',
			'post_types' => array('page'),
			'keywords'			=> array( 'services', 'block' ),
		));

		// register careers block
		acf_register_block(array(
			'name'				=> 'careers',
			'title'				=> __('Careers'),
			'description'		=> __('Careers Block.'),
			'render_callback'	=> 'careers_render_callback',
			'category'			=> 'formatting',
			'icon' 				=> 'images-alt',
			'post_types' => array('page'),
			'keywords'			=> array( 'careers', 'block' ),
		));
	}
}


/*********************************************
 * Callback function for Registering Blocks
 ********************************************/
/// hero
function hero_render_callback( $block, $content = '', $is_preview = false ) {
    $context = Timber::context();

    // Store block values.
    $context['block'] = $block;

    // Store field values.
    $context['fields'] = get_fields();

    // Store $is_preview value.
    $context['is_preview'] = $is_preview;

    // Render the block.
	$templates = array( 'views/blocks/hero-block.twig' );
	Timber::render( $templates, $context );
}



//accordion
function accordion_render_callback( $block, $content = '', $is_preview = false ) {
    $context = Timber::context();

    // Store block values.
    $context['block'] = $block;

    // Store field values.
    $context['fields'] = get_fields();

    // Store $is_preview value.
    $context['is_preview'] = $is_preview;

    // Render the block.
	$templates = array( 'views/blocks/accordion-block.twig' );
	Timber::render( $templates, $context );
}



//Step Slider
function step_slider_render_callback( $block, $content = '', $is_preview = false ) {
    $context = Timber::context();

    // Store block values.
    $context['block'] = $block;

    // Store field values.
    $context['fields'] = get_fields();

    // Store $is_preview value.
    $context['is_preview'] = $is_preview;

    // Render the block.
	$templates = array( 'views/blocks/step-slider-block.twig' );
	Timber::render( $templates, $context );
}


//Four Column Layout
function four_column_layout_render_callback( $block, $content = '', $is_preview = false ) {
    $context = Timber::context();

    // Store block values.
    $context['block'] = $block;

    // Store field values.
    $context['fields'] = get_fields();

    // Store $is_preview value.
    $context['is_preview'] = $is_preview;

    // Render the block.
	$templates = array( 'views/blocks/four-column-layout-block.twig' );
	Timber::render( $templates, $context );
}


//Team Member Layout
function team_member_render_callback( $block, $content = '', $is_preview = false ) {
    $context = Timber::context();

    // Store block values.
    $context['block'] = $block;

    // Store field values.
    $context['fields'] = get_fields();

    // Store $is_preview value.
    $context['is_preview'] = $is_preview;

    // Render the block.
	$templates = array( 'views/blocks/team-member-block.twig' );
	Timber::render( $templates, $context );
}



// Services Block
function services_render_callback( $block, $content = '', $is_preview = false ) {
    $context = Timber::context();

    // Store block values.
    $context['block'] = $block;

    // Store field values.
    $context['fields'] = get_fields();

    // Store $is_preview value.
    $context['is_preview'] = $is_preview;

    // Render the block.
	$templates = array( 'views/blocks/services-block.twig' );
	Timber::render( $templates, $context );
}



// Careers Block
function careers_render_callback( $block, $content = '', $is_preview = false ) {
    $context = Timber::context();

    // Store block values.
    $context['block'] = $block;

    // Store field values.
    $context['fields'] = get_fields();

    // Store $is_preview value.
    $context['is_preview'] = $is_preview;

    // Render the block.
	$templates = array( 'views/blocks/careers-block.twig' );
	Timber::render( $templates, $context );
}
new StarterSite();
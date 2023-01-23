<?php

// *** Change site backend settings ***
update_option( 'siteurl', 'http://cornerstone.psone.ca' );
update_option( 'home', 'http://cornerstone.psone.ca' );

// *** To point domain to a sub directory ***
update_option( 'siteurl', 'http://cornerstone.psone.ca/site' );


// *** YEAR SHORTCODE ***
function year_shortcode() {
  $year = date('Y');
  return $year;
}
add_shortcode("year", "year_shortcode");


// *** ADD CUSTOM LOGIN LOGO ***
function racka_login_logo() {  ?>
    <style type="text/css">
        .login h1 a {
            background-image: url("/wp-content/uploads/2016/02/logo-bg.png");
            padding-bottom: 0;
            width: 235px;
            height: 55px;
            background-size: 235px;
            background-position: center bottom;
        }
    </style>
<?php }
add_action( 'login_head', 'racka_login_logo' ); //custom login function

function racka_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'racka_login_logo_url' ); //custom login function

function racka_login_logo_url_title() {
    return 'Racka Roofing';
}
add_filter( 'login_headertitle', 'racka_login_logo_url_title' ); //custom login function


// *** ENQUEUE CUSTOM SCRIPT ***
function racka_scripts() {
  wp_enqueue_script( 'racka-functionality', get_stylesheet_directory_uri() . '/js/app.js', array(), '20160225', true );
}
add_action( 'wp_enqueue_scripts', 'racka_scripts' );


// *** DELETE IMAGES ON TRASH REMOVAL ***
function delete_associated_media( $id ) {
    $media = get_children( array(
        'post_parent' => $id,
        'post_type'   => 'attachment'
    ) );

    if( empty( $media ) ) {
        return;
    }

    foreach( $media as $file ) {
        wp_delete_attachment( $file->ID );
    }
}
add_action( 'before_delete_post', 'delete_associated_media' );


// *** WORDPRESS POST TYPE QUERY ***
$args = array(
		'post_type' => 'post',
		'posts_per_page' => -1 ,
		//'orderby' => 'menu_order',
		'order' => 'ASC',
		'category_name' => 'front-top',
		'post_status' => 'publish'
	);
$query = new WP_Query($args);
$current_id = 1;

if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
	$current_id = get_the_ID();?>
<article id="<?php echo "article-" . $current_id; ?>">
	<div class="clearfix"><?php the_content(); ?></div>
</article>

<?php endwhile; endif;
wp_reset_query();
wp_reset_postdata();


// *** Create Products Post Type ***
add_action( 'init', 'create_product_post_type' );
function create_product_post_type() {
  register_post_type( 'products',
    array(
      'labels' => array(
        'name' => __( 'Products' ),
        'singular_name' => __( 'Product' )
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon'   => 'dashicons-cart',
    )
  );
}


// *** Add rel="lightbox" attribute to [gallery] ***
add_filter('wp_get_attachment_link', 'rc_add_rel_attribute');
function rc_add_rel_attribute($link) {
	global $post;
	return str_replace('<a href', '<a rel="lightbox" href', $link);
}


// *** Remove Update Nags and Notifications ***

function remove_core_updates(){
global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_core_updates');
add_filter('pre_site_transient_update_plugins','remove_core_updates');
add_filter('pre_site_transient_update_themes','remove_core_updates');


// *** UNTESTED - Redirects Author Pages to prevent finding username ***
add_action(‘template_redirect’, ‘psone_template_redirect’);
function psone_template_redirect() {
	if (is_author()) {
		wp_redirect( home_url() ); exit;
	}
}
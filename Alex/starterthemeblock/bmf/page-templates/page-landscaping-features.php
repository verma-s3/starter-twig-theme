<?php
  global $post;

/*
  Template Name: Landscaping Features
*/
/**
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package deerwoodprojects
 */

if ( !class_exists('DeerwoodFeaturesPage') ) {
   
  class DeerwoodFeaturesPage
  {
    //Variables
    protected $features;

    /**
     * On Initialization
     */
    public function __construct(array $features) {
      $this->features = $features;
    }

    /**
     * Landscaping Features
    */
    public function landscapingFeatures() {
      ob_start();

      $landscapingFeatures = $this->features;

      if( is_array($landscapingFeatures) && !empty($landscapingFeatures) ) :
        // Loop through features
        foreach( $landscapingFeatures as $feature ) :

          //Images
          $imageUrl = $feature['image']['sizes']['square-imgs'];
          $imageAlt = $feature['image']['alt'];

          //HTML
          echo '<div class="tripleCol">';
            echo sprintf('<img src="%s" alt="%s" />', $imageUrl, $imageAlt);
            echo '<h2>' . $feature['title'] . '</h2>';
            echo '<p>' . $feature['description'] . '</p>';
          echo '</div>';

        endforeach;

      endif;

      return ob_get_clean();
    }
  }

  // DYNAMIC CONTENT
  $acfFeatures = get_field('landscaping_feautures');

  $featurePage = new DeerwoodFeaturesPage($acfFeatures);
}


/****************************************************
 * STORE ALL LOGIC AND OUTPUT TO VIEW
 ***************************************************/

$context          = Timber::context();
$context['acf'] = new Timber\Post();
$context['features'] = $featurePage->landscapingFeatures();
$templates        = array( 'views/page-landscaping-features.twig' );

Timber::render( $templates, $context );


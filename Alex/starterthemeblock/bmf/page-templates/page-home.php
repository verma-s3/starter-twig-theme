<?php
  global $post;

/*
  Template Name: Home
*/
/**
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package deerwoodprojects
 */

if ( !class_exists('DeerwoodHomePage') ) {
  
  class DeerwoodHomePage
  {
    //Variables
    protected $intro;
    protected $process;
    protected $featureProducts;

    /**
     * On Initialization
     */
    public function __construct(string $intro, array $process, array $featureProducts) {
      $this->intro = $intro;
      $this->process = $process;
      $this->featureProducts = $featureProducts;
    }

    /**
     * Intro
     */
    public function introduction() {
      return $this->intro;
    }

    /**
     * Our Process
     */
    public function ourProcess() {
      ob_start();

      $processList = $this->process;
      $i = 1;

      // Check if is array and exists
      if (is_array($processList) && !empty($processList)) :
        // Loops through list items
        foreach( $processList as $listItem ) :
          //store imgs;
          $listImageUrl = $listItem['image']['sizes']['square-imgs'];
          $listImageAlt = $listItem['image']['alt'];

          //HTML
          echo '<div class="tripleCol">';

            echo sprintf('<img src="%s" alt="%s" />', $listImageUrl, $listImageAlt);
            echo sprintf('<h3><span>%s</span>%s</h3>', $i, $listItem['title']);
            echo '<p>' . $listItem['description'] . '</p>';

          echo '</div>';

          $i++;

        endforeach;
       
      endif;

      return ob_get_clean();

    }
    
    /**
     * Feature Line Products
     */
    public function featureProducts() {
      $productList = $this->featureProducts;
      $productImgs = '';

      if(is_array($productList) && !empty($productList)) :

        foreach($productList as $productListItem) :
          $productImgs .= '<img src="' . $productListItem['image']['url'] . '" alt="' . $productListItem['image']['alt'] . '"/>';
        endforeach;

      endif;

      return $productImgs;
    }

  }

  /****************************
   * DYNAMIC CONTENT
   ***************************/
  $acfIntro = get_field('introduction');
  $acfProcess = get_field('our_process');
  $acfFeatureProducts = get_field('featured_product_lines');
  
  $homePage = new DeerwoodHomePage($acfIntro, $acfProcess, $acfFeatureProducts);

}


/****************************************************
 * STORE ALL LOGIC IN CONTEXT AND OUTPUT TO VIEW
 ***************************************************/

$context = Timber::context();
$context['acf'] = new Timber\Post();
$context['intro'] = $homePage->introduction();
$context['process'] = $homePage->ourProcess();
$context['featured'] = $homePage->featureProducts();
$templates = array( 'page-home.twig' );

Timber::render( $templates, $context );


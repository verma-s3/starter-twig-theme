<?php
  global $post;

/*
  Template Name: Project Gallery
*/
/**P
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package deerwoodprojects
 */

if ( !class_exists('DeerwoodGalleryPage') ) {
  
  class DeerwoodGalleryPage
  {
    //Variables
    protected $gallery;

    /**
     * On Initialization
     */
    public function __construct(array $gallery) {
      $this->gallery = $gallery;
    }

    /**
     * Gallery
     */
    public function projectGallery() {

      $galleryImages = $this->gallery;
      $listResults = '';

      if( is_array($galleryImages) && !empty($galleryImages) ) :

        $rows = 0;

        foreach( $galleryImages as $images ) :
            $lightBoxSize = $images['image']['url'];
            $imageSize = $images['image']['sizes']['square-imgs']; 
            $imageAlt = $images['image']['alt'];

            $listResults .= sprintf('<a class="fancybox tripleCol" href="%s" rel="gal"><img src="%s" alt="%s" /></a>', $lightBoxSize, $imageSize, $imageAlt);
          $rows++;
          if($rows == 12) : 
            break;
          endif;
        endforeach;

      endif;

      return $listResults;

    }

    /**
     * View More Gallery
     */
    public function viewMoreProjectGallery() {

      $galleryImages = $this->gallery;
      $listResults = '';

      if( is_array($galleryImages) && !empty($galleryImages) ) :

        $rows = 0;

        foreach( $galleryImages as $images ) :
          $rows++;
          if($rows > 12) : 
            $lightBoxSize = $images['image']['url'];
            $imageSize = $images['image']['sizes']['square-imgs']; 
            $imageAlt = $images['image']['alt'];

            $listResults .= sprintf('<a class="fancybox tripleCol" href="%s" rel="gal"><img src="%s" alt="%s" /></a>', $lightBoxSize, $imageSize, $imageAlt);
          endif;
        endforeach;

      endif;

      return $listResults;

    }
  }

  //DYNAMIC CONTENT
  $acfGallery = get_field('gallery');

  $projectPage = new DeerwoodGalleryPage($acfGallery);

}


/****************************************************
 * STORE ALL LOGIC AND OUTPUT TO VIEW
 ***************************************************/

$context          = Timber::context();
$context['acf'] = new Timber\Post();
$context['gallery'] = $projectPage->projectGallery();
$context['viewMoreProjects'] = $projectPage->viewMoreProjectGallery();
$templates        = array( 'page-project-gallery.twig' );

Timber::render( $templates, $context);


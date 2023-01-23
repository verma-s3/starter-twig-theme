<?php

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


// *** CUSTOM FIELD SUITES ***
$args1 = array(
      'post_type' => 'post',
      'posts_per_page' => -1 ,
      'order' => 'ASC',
      'category_name' => 'contact',
      'post_status' => 'publish'
    );
$query1 = new WP_Query($args1);
while ( $query1->have_posts() ) : $query1->the_post();
$contactPhone = strtr(CFS()->get('phone'), array('.' => '', ',' => '')); ?>
  <h2><?php echo (CFS()->get('title')); ?></h2>
  <div class="address-container">
    <p>SUMMIT HEAD OFFICE</p>
    <?php echo '<p class="contact-phone">t. <a href="tel:+1'.$contactPhone.'">' . CFS()->get('phone') . '</a>'; ?>
    <p class="contact-email">e. <?php echo do_shortcode('[email-obfuscate email="' . (CFS()->get('email')) . '"]'); ?></p>
    <?php echo the_content(); ?>
  </div>
<?php endwhile;
wp_reset_query();
wp_reset_postdata();


// *** FOREACH LOOP ***
$speciesRows = CFS()->get('species_row');
	foreach ($speciesRows as $speciesRow) {
		echo '<li>' . $speciesRow['species'] . '</li>';
}
?>

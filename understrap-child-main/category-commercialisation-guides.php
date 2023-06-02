<?php
/**
 * The template for displaying Commercialisation Guides category pages
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>
	
<section class="wp-bp-jumbotron-content">
	<div class="jumbo" style="background:#582c83;">
<div class="jumbotron-inner-page">	
			<div class="divcolorsub" style="height: auto!important; background:#6961ce;">	
		<div class="container">
	<div class="row">
		<div class="d-flex">
<h1 class="page-title">Commercialisation Guides</h1>
</div></div></div></div>
		</div></div>

</section>	
<div class="wrapper" id="archive-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<main class="site-main" id="main">
			<div class="row">
			<?php
			// Do the left sidebar check and open div#primary.
			get_template_part( 'global-templates/left-sidebar-check' );
			?>
	
   <ul class="nav nav-pills" role="tablist">
			  
	     <li class="nav-item" role="presentation">
  <button class="nav-link active" id="country-tab" data-bs-toggle="tab" data-bs-target="#country" type="button" role="tab" aria-controls="country-tab" aria-selected="false">Country Guides</button>
  </li>
<li class="nav-item" role="presentation">
  <button class="nav-link" id="investment-tab" data-bs-toggle="tab" data-bs-target="#investment" type="button" role="tab" aria-controls="investment-tab" aria-selected="false">Investment Guides</button>
  </li>
 
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="market-tab" data-bs-toggle="tab" data-bs-target="#market" type="button" role="tab" aria-controls="market-tab" aria-selected="false">Market Guides</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="technical-tab" data-bs-toggle="tab" data-bs-target="#technical" type="button" role="tab" aria-controls="technical-tab" aria-selected="false">Technical Guides</button>
  </li>
	   <li class="nav-item" role="presentation">
    <button class="nav-link" id="theme-tab" data-bs-toggle="tab" data-bs-target="#theme" type="button" role="tab" aria-controls="theme-tab" aria-selected="false">Theme Guides</button>
  </li>
</ul>
	
				<div class="tab-content mt-4">
 <div class="tab-pane fade show active" id="country" role="tabpanel" aria-labelledby="country-tab" tabindex="0">	
  <div class="row justify-content-left">
		<h2>
			Country Guides
	  </h2>	
   <?php
    $do_not_duplicate = array();
$the_query = new WP_Query( array(
 'post_type' => 'attachment', 
    'category_name' => 'Country Guide', 
    'post_mime_type'    => 'application/pdf',
   'orderby'   => 'name',
        'order' => 'ASC',
        'post_status' => 'published',
) );
	while ($the_query->have_posts()) : $the_query->the_post(); ?>

				
	<?php echo get_template_part( 'loop-templates/content-image', get_post_type() );
endwhile; // End of the loop.
?>

<?php wp_reset_query(); ?>

</div> 
					</div>
				
	<div class="tab-pane fade" id="investment" role="tabpanel" aria-labelledby="investment-tab" tabindex="0">	

  <div class="row justify-content-left">
		<h2>
			Investment Guides
	  </h2>	
   <?php
    $do_not_duplicate = array();
$the_query = new WP_Query( array(
 'post_type' => 'attachment', 
    'category_name' => 'invetment-guide-dfis', 
    'post_mime_type'    => 'application/pdf',
   'orderby'   => 'name',
        'order' => 'ASC',
        'post_status' => 'published',
) );
	while ($the_query->have_posts()) : $the_query->the_post(); ?>

			
	<?php echo get_template_part( 'loop-templates/content-image', get_post_type() );
endwhile; // End of the loop.
?>

<?php wp_reset_query(); ?>

</div> 
					</div>
					
<div class="tab-pane fade" id="market" role="tabpanel" aria-labelledby="market-tab" tabindex="0">	

  <div class="row justify-content-left">
		<h2>
			Market Guides
	  </h2>
   <?php
    $do_not_duplicate = array();
$the_query = new WP_Query( array(
 'post_type' => 'attachment', 
    'category_name' => 'market-guide', 
    'post_mime_type'    => 'application/pdf',
   'orderby'   => 'name',
        'order' => 'ASC',
        'post_status' => 'published',
) );
	while ($the_query->have_posts()) : $the_query->the_post(); ?>

				
	<?php echo get_template_part( 'loop-templates/content-image', get_post_type() );
endwhile; // End of the loop.
?>

<?php wp_reset_query(); ?>

</div> 
					</div>
					
					
<div class="tab-pane fade" id="technical" role="tabpanel" aria-labelledby="technical-tab" tabindex="0">	

  <div class="row justify-content-left">
		<h2>
			Technical Guides
	  </h2>
   <?php
    $do_not_duplicate = array();
$the_query = new WP_Query( array(
 'post_type' => 'attachment', 
    'category_name' => 'technical-guide', 
    'post_mime_type'    => 'application/pdf',
   'orderby'   => 'name',
        'order' => 'ASC',
        'post_status' => 'published',
) );
	while ($the_query->have_posts()) : $the_query->the_post(); ?>

				
	<?php echo get_template_part( 'loop-templates/content-image', get_post_type() );
endwhile; // End of the loop.
?>

<?php wp_reset_query(); ?>

</div> 
					</div>
				<div class="tab-pane fade" id="theme" role="tabpanel" aria-labelledby="theme-tab" tabindex="0">	

  <div class="row justify-content-left">
		<h2>
			Theme Guides
	  </h2>
   <?php
    $do_not_duplicate = array();
$the_query = new WP_Query( array(
 'post_type' => 'attachment', 
    'category_name' => 'theme-guide', 
    'post_mime_type'    => 'application/pdf',
   'orderby'   => 'name',
        'order' => 'ASC',
        'post_status' => 'published',
) );
	while ($the_query->have_posts()) : $the_query->the_post(); ?>

				
	<?php echo get_template_part( 'loop-templates/content-image', get_post_type() );
endwhile; // End of the loop.
?>

<?php wp_reset_query(); ?>

</div> 
					</div>
					
				</div>

					

			<?php
			// Display the pagination component.
			understrap_pagination();

			// Do the right sidebar check and close div#primary.
			get_template_part( 'global-templates/right-sidebar-check' );
			?>	</div></main>

	

	</div><!-- #content -->

</div><!-- #archive-wrapper -->

<?php
get_footer();
?>

<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<section class="wp-bp-jumbotron-content">
	<div class="jumbotron" style="height: auto!important; background-color:#582c83;">
	 <div class="jumbotron-image ms-auto" style="background-image: url(/wp-content/uploads/2023/02/energy-catalyst-funders.jpg);" alt="Energy Catalyst News and Events">	
		</div> 
<div class="jumbotron-inner-page">	
		<div class="divcolor" style="height: auto!important; background:#6961ce;">	
		<div class="container">
	<div class="row">
		<div class="d-flex">

<h1 class="page-title">News</h1>

</div></div></div></div>
		<div class="divcolorsub" style="background:#418fde;">	
		<div class="container">
	<div class="row">
		<div class="d-flex">
			<h2 class="page-subtitle">Latest news and updates from Energy Catalyst</h2>
</div></div></div></div></div>	</div>	

</section>	
<div class="wrapper" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<?php
			// Do the left sidebar check and open div#primary.
			get_template_part( 'global-templates/left-sidebar-check' );
			?>

		<main class="site-main" id="main">
	<div class="row justify-content-left">	
			 <?php
    $do_not_duplicate = array();
$the_query = new WP_Query( array(
'post_type' => 'post',
	'category_name'=> 'news',
	'posts_per_archive_page' => -1,
		'orderby'   => 'date',
        'order' => 'DESC',
        'post_status' => 'published',
) );
	
		while ($the_query->have_posts()) : $the_query->the_post(); ?>

			
	<?php echo get_template_part( 'loop-templates/content', get_post_type() );
endwhile; // End of the loop.
?>
				</div>
			</main>

			<?php
			// Display the pagination component.
			understrap_pagination();

			// Do the right sidebar check and close div#primary.
			get_template_part( 'global-templates/right-sidebar-check' );
			?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php
get_footer();

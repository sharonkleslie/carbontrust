<?php
/**
 * The template for displaying all single portfolio posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>
<section class="wp-bp-jumbotron-content">
	<div class="jumbotron" style="height: auto!important; background:<?php the_field('image_background_color', 'option'); ?>;">
	      <div <?php if ( get_field('image', 'option') ) { echo 'style="background-image: url(' . get_field('image', 'option') . ')"'; } ?> class="jumbotron-image ms-auto" alt="Energy Catalyst Portfolio"></div>	
<div class="jumbotron-inner-page">	
			<div class="divcolor"  style="height: auto!important; background:<?php the_field("title_background_color", 'option'); ?>">	
		<div class="container">
	<div class="row">
		<div class="d-flex">
						<?php if( get_field('title', 'option') ): ?> 
<h1 class="page-title"><?php the_field('title', 'option'); ?></h1>
<?php endif; ?>
			
</div></div></div></div>
		<div class="divcolorsub" style="background:<?php the_field("subtitle_background_color", 'option'); ?>">	
		<div class="container">
	<div class="row">
		<div class="d-flex">
		
			<?php if( get_field('subtitle', 'option') ): ?> 
<h2 class="page-subtitle"><?php the_field('subtitle', 'option'); ?></h2>
<?php endif; ?>
</div></div></div></div></div></div>

</section>	
<div class="wrapper" id="single-wrapper">
<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
<div class="container">
<div class="row justify-content-center">
			<?php
			// Do the left sidebar check and open div#primary.
			get_template_part( 'global-templates/left-sidebar-check' );
			?>

			<main class="site-main" id="main">
					<div class="col-lg-11 col-12">
	<div class="breadcrumbs">
<?php echo do_shortcode('[wpseo_breadcrumb]'); ?>
	</div>	</div>
					
				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'loop-templates/content', 'portfolio' );
					understrap_post_nav();

					// If comments are open or we have at least one comment, load up the comment template.
			
				}
				?>
			</main>
	
			<?php
			// Do the right sidebar check and close div#primary.
			get_template_part( 'global-templates/right-sidebar-check' );
			?>
</div><!-- .container -->
		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php
get_footer();

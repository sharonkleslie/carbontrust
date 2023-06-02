<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<section class="wp-bp-jumbotron-content">
	<div class="jumbotron" style="height: auto!important; background:<?php the_field("image_background_color"); ?>;">
	      <div <?php if ( get_field('image') ) { echo 'style="background-image: url(' . get_field('image') . ')"'; } ?> class="jumbotron-image ms-auto" alt="Energy Catalyst"></div>	
<div class="jumbotron-inner-page">	
			<div class="divcolor"  style="height: auto!important; background:<?php the_field("title_background_color"); ?>">	
		<div class="container">
	<div class="row">
		<div class="d-flex">
					
			<?php if( get_field('title') ): ?> 
<h1 class="page-title"><?php the_field('title'); ?></h1>
<?php endif; ?>
</div></div></div></div>
		<div class="divcolorsub" style="background:<?php the_field("subtitle_background_color"); ?>">	
		<div class="container">
	<div class="row">
		<div class="d-flex">
		
			<?php if( get_field('subtitle') ): ?> 
<h2 class="page-subtitle"><?php the_field('subtitle'); ?></h2>
<?php endif; ?>
</div></div></div></div></div></div>

</section>	
<div class="wrapper" id="page-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">
			<?php
			// Do the left sidebar check and open div#primary.
			get_template_part( 'global-templates/left-sidebar-check' );
			?>
			<main class="site-main" id="main">
				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'loop-templates/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				}
				?>

			</main>

			<?php
			// Do the right sidebar check and close div#primary.
			get_template_part( 'global-templates/right-sidebar-check' );
			?>

		</div><!-- .row -->
	</div><!-- #content -->
</div><!-- #page-wrapper -->

<?php
get_footer();

<?php
/**
 * The template for displaying archive pages
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
	<div class="jumbotron" style="height: auto!important; background:<?php the_field('case_study_image_background_color', 'option'); ?>;">
	      <div <?php if ( get_field('case_study_image', 'option') ) { echo 'style="background-image: url(' . get_field('case_study_image', 'option') . ')"'; } ?> class="jumbotron-image ms-auto" alt="Energy Catalyst Cases Studies"></div>	
<div class="jumbotron-inner-page">	
			<div class="divcolor"  style="height: auto!important; background:<?php the_field("case_study_title_background_color", 'option'); ?>">	
		<div class="container">
	<div class="row">
		<div class="d-flex">
					
			<?php if( get_field('case_study_title', 'option') ): ?> 
<h1 class="page-title"><?php the_field('case_study_title', 'option'); ?></h1>
<?php endif; ?>
</div></div></div></div>
		<div class="divcolorsub" style="background:<?php the_field("case_study_subtitle_background_color", 'option'); ?>">	
		<div class="container">
	<div class="row">
		<div class="d-flex">
		
			<?php if( get_field('case_study_subtitle', 'option') ): ?> 
<h2 class="page-subtitle"><?php the_field('case_study_subtitle', 'option'); ?></h2>
<?php endif; ?>
</div></div></div></div></div></div>

</section>	
<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<?php
			// Do the left sidebar check and open div#primary.
			get_template_part( 'global-templates/left-sidebar-check' );
			?>

			<main class="site-main" id="main">

				<?php
				if ( have_posts() ) {
					?>
					
							<div class="row justify-content-left" id="casestudies">
					<?php
					// Start the loop.
					while ( have_posts() ) {
						the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'loop-templates/content', '');
					}
				} else {
					get_template_part( 'loop-templates/content', '' );
				}
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

</div><!-- #archive-wrapper -->

<?php
get_footer();

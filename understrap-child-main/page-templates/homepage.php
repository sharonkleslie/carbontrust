<?
/**
 * Template Name: Home Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<section class="hero">
	<div <?php if ( get_field('header_image') ) { echo 'style="background-image: url(' . get_field('header_image') . ')"'; } ?> class="jumbotron" alt="Energy Catalyst">
	
	<div class="container">
	<div class="row justify-content-center">
		<div class="d-flex align-items-start">
			
		<div class="jumbotron-inner">
				<?php if( get_field('header') ): ?> 
<h1 class="header"><?php the_field('header'); ?></h1>	
			<?php endif; ?>


	<div class="row justify-content-center">
				<div class="jumbotron-external">
					<?php if( get_field('subhead') ): ?> 
<h2 class="subhead" style="height: auto!important; background:<?php the_field("subtitle_home_background_color"); ?>"><?php the_field('subhead'); ?></h2>		
		<?php endif; ?>	
		</div> </div> </div></div> </div></div></div>
		</section>
<section>

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

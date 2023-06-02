<?php
/**
 * Header Navbar (bootstrap5)
 *
 * @package Understrap
 * @since 1.1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<nav id="main-nav" class="navbar navbar-expand-md navbar-dark bg-primary" aria-labelledby="main-nav-label">

	<h2 id="main-nav-label" class="screen-reader-text">
		<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
	</h2>


	<div class="<?php echo esc_attr( $container ); ?>">

		<!-- Your site branding in the menu -->
		<?php get_template_part( 'global-templates/navbar-branding' ); ?>
		 <div class="search">
		<div class="ms-auto">
			 <div class="row">
<div class="site-search">
	<?php echo do_shortcode('[searchandfilter id="12100"]'); ?></div></div></div>
	
		<button
			class="navbar-toggler navbar-toggler-right collapsed"
			type="button"
			data-bs-toggle="collapse"
			data-bs-target="#navbarNavDropdown"
			aria-controls="navbarNavDropdown"
			aria-expanded="false"
			aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>"
		>	
	
						<span class="icon-bar top-bar"></span>
	<span class="icon-bar middle-bar"></span>
	<span class="icon-bar bottom-bar"></span>		
				
</button>
		
		<!-- The WordPress Menu goes here -->
		<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'container_class' => 'collapse navbar-collapse',
				'container_id'    => 'navbarNavDropdown',
				'menu_class'      => 'navbar-nav',
				'fallback_cb'     => '',
				'menu_id'         => 'main-menu',
				'depth'           => 2,
				'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
			)
		);
		?>	
		</div>	
	</div><!-- .container(-fluid) -->

</nav><!-- #main-nav -->

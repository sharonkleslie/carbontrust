<?php
/**
 * The template for displaying Portfolio round9 category pages
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
<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			
			<?php
			// Do the left sidebar check and open div#primary.
			get_template_part( 'global-templates/left-sidebar-check' );
			?>

				<main class="site-main" id="main">
							<div class="row justify-content-left m-3">
								<?php echo do_shortcode('[searchandfilter id="11475"]'); ?>
					</div>
					
						<div class="row justify-content-left" id="search-results">
								
<?php
$args =( array(
'post_type' => 'round9',
	'category_name'=> 'round9',
	'search_filter_id'  => '11475',
	'posts_per_archive_page' => -1,
		'orderby'   => 'title',
        'order' => 'ASC',
        'post_status' => 'published',
	'paged' => $_POST['paged'],
) );
				$my_query = new WP_Query( $args );
if ( $my_query->have_posts() ) : 
$i = 1; // Set the increment variable  
while ( $my_query->have_posts() ) : $my_query->the_post(); 					
?>
							
<!-- Loop content -->		
			<div class="col-lg-3 col-6">
		<ul>
			<li>
			<div class="card h-100" data-bs-toggle="modal" data-bs-target="#myModal-<?php echo $i;?>">
	
		<?php if ( 'post' === get_post_type() ) : ?>
					<div class="card-body">
		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<figure class="wp-block-post-featured-image">
	<?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?>
	</figure>
		
				
	<header class="entry-header">
	  <h3 class="card-title"><?php the_title(); ?></h3>
</header><!-- .entry-header -->
		
		<!-- #post-<?php the_ID(); ?> -->
			
		<?php endif; ?>
		</article></div>
				
	<div class="card-footer mt-auto">
	</div>


			</div></li></ul></div>

<!-- Modal content-->
		
				<div class="modal fade right" role="document" id="myModal-<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="myModal-<?php echo $i;?>" aria-hidden="true">
  <div class="modal-dialog modal-xl">
	   
		 <div class="modal-content">	
      <div class="modal-header whitebg">
		  	 <div class="whitebg">
		    <h2 style="text-align:left" id="porti"><?php the_title(); ?></h2> <button type="button" class="btn-close" style="text-align:left" data-bs-dismiss="modal" data-bs-target="modal" aria-label="Close">
        </button>
       
				 </div>    </div>
      <div class="modal-body">
	  
	 
		  			<?php if( get_field('subtitle') ): ?> 
<h3><?php the_field('subtitle'); ?></h3>
<?php endif; ?>
		  <?php if( get_field('partners') ): ?> 
	<div class="portititle">PARTNERS:</div> <p><?php the_field('partners'); ?></p>
<?php endif; ?>
		  			<?php if( get_field('country') ): ?> 
<div class="portititle">COUNTRY:</div> <p><?php the_field('country'); ?></p>
<?php endif; ?>
		  		  			<?php if( get_field('technology') ): ?> 
<div class="portititle">TECHNOLOGY:</div> <p><?php the_field('technology'); ?></p>
<?php endif; ?>
		  			<?php if( get_field('stage') ): ?> 
	<div class="portititle">STAGE:</div> <p><?php the_field('stage'); ?></p>
<?php endif; ?>
		  	<?php if( get_field('funding_round') ): ?> 
	<div class="portititle">FUNDING ROUND:</div> <p><?php the_field('funding_round'); ?></p>
<?php endif; ?>
	  <?php the_content(); ?>
  		<?php edit_post_link(__('{Edit}')); ?>	
      </div>
			 <?php if( get_field('website') ): ?> 
	<div class="portititle">WEBSITE:</div> <p><?php the_field('website'); ?></p>
			 <?php endif; ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-size:24px;">Close</button>
      </div>
    </div>
  </div>
</div>

<?php $i++; // Increment the increment variable by 1

	endwhile; //End the loop 

else :

    // no rows found

endif; 
wp_reset_query();							
							
?>
</div>
		
			<?php
			// Display the pagination component.


			// Do the right sidebar check and close div#primary.
			get_template_part( 'global-templates/right-sidebar-check' );
			?>
	</main></div>
		</div><!-- .row -->

	

</div><!-- #archive-wrapper -->

<?php
get_footer();

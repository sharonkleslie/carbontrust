<?php
/**
 * Search results partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>	

<div class="col-lg-2 col-6" id="search_results">
	<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">

	
	<?php 
$image = get_field('pdf_thumbnail');
if( !empty( $image ) ): ?>
    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
<?php endif; ?>
	</a>	
	
	<header class="entry-header" id="guides">
		<p><?php the_title(); ?></p>
	
	<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<?php $caption = wp_get_attachment_caption($attachment_id);
			print_r($caption); ?></a></h3>
	</header><!-- .entry-header -->		
</article>	

<!-- #post-<?php the_ID(); ?> -->

							</div>

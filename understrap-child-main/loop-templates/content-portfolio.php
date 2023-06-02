<?php
/**
 * Search results partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

	<div class="entry-content" id="newscontent">
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header"  id="newsheader">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
				
			<?php if( get_field('subtitle') ): ?> 
<h3><?php the_field('subtitle'); ?></h3>
<?php endif; ?>
	<hr>
	<?php if( get_field('partners') ): ?> 
<p>Partners: <?php the_field('partners'); ?></p><?php endif; ?>
<?php if( get_field('country') ): ?> 
<p>Country: <?php the_field('country'); ?></p>
<?php endif; ?>
<?php if( get_field('technology') ): ?> 
<p>Technology: <?php the_field('technology'); ?></p>
<?php endif; ?>
				
									<?php if( get_field('stage') ): ?> 
<p>Stage: <?php the_field('stage'); ?></p>
	<?php endif; ?>			
				<?php if( get_field('funding_round') ): ?> 
<p>Stage: <?php the_field('funding_round'); ?></p>
<?php endif; ?>	
		<?php
		the_content();
		?>
		<?php if( get_field('website') ): ?> 
<p>Website: <?php the_field('website'); ?></p>
<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->
</div><!-- .entry-content -->
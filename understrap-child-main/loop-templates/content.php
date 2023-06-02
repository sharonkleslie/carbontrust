<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

	<div class="col-lg-4 col-12 mt-5">
			<div class="card h-100" id="news">
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

<figure class="wp-block-post-featured-image">
	<?php if ( has_post_thumbnail() ) : ?>
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
  	<?php the_post_thumbnail( 'post-featured-image', ['alt' => get_the_title()] ); ?>
    </a>
<?php endif; ?>
	</figure>
		<div class="card-body">
	<header class="entry-header">

	
			<?php
		the_title(
			sprintf( '<h2 class="wp-block-post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h2>'
		);
		?>
		<?php if ( 'post' === get_post_type() ) : ?>

			<div class="wp-block-post-date">
				<?php the_time('F jS, Y'); ?>

			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="wp-block-post-excerpt">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary --></div>
		<div class="card-footer mt-auto">
	<div class="wp-block-button">
		<a class="wp-block-button__link wp-element-button" href="<?php the_permalink() ?>" rel=
"bookmark" title="<?php the_title(); ?>">Read More</a></div>

	</div>
	
</article><!-- #post-<?php the_ID(); ?> -->
		</div></div>
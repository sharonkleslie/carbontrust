<?php
/**
 * Single post partial template
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
		<div class="entry-meta">
<?php the_time('F jS, Y'); ?>
</div><!-- .entry-meta -->		
		<?php
		the_content();
		?>
		

</article><!-- #post-<?php the_ID(); ?> -->
</div><!-- .entry-content -->
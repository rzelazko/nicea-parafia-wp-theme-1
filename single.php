<?php
/**
 * @package WordPress
 * @subpackage Nicea-Parafia
 */
?>

<?php get_header(); ?>

<?php if ( has_post_format( 'image' ) ): ?>

	<div class="fullpage">		
		<?php get_template_part( 'loop', 'single' ); ?>
	</div><!-- .fullpage -->

<?php else: ?>

	<div class="left">		
		<?php get_template_part( 'loop', 'single' ); ?>
	</div><!-- .left -->
	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>

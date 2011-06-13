<?php
/**
 * @package WordPress
 * @subpackage Nicea-Parafia
 */
?>

<?php get_header(); ?>

<div class="left">		
	<?php get_template_part( 'loop', 'single' ); ?>
</div><!-- .left -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
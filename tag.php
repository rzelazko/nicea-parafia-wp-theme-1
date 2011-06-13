<?php
/**
 * @package WordPress
 * @subpackage Nicea-Parafia
 */
?>

<?php get_header(); ?>

<div class="left">
	<h1 class="contentMargin">Wpisy związane z hasłem: <?php single_tag_title( '' ) ?></h1>
		
	<?php get_template_part( 'loop', 'tag' ); ?>
</div><!-- .left -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
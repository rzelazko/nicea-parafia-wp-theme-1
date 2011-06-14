<?php
/**
 * @package WordPress
 * @subpackage Nicea-Parafia
 */
?>

<?php get_header(); ?>

<div class="left">
	<h1 class="postTitle contentMargin">Polska Parafia w Nicei - Ogłoszenia</h1>
		
	<?php get_template_part( 'loop', 'index' ); ?>
</div><!-- .left -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
<?php
/**
 * @package WordPress
 * @subpackage Nicea-Parafia
 */
?>

<?php get_header(); ?>

<div class="left">
	<h1 class="postTitle contentMargin">Wpisy dla kategorii: <?php single_cat_title( '' ) ?></h1>
		
	<?php get_template_part( 'loop', 'category' ); ?>
</div><!-- .left -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
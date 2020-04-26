<?php
/**
 * @package WordPress
 * @subpackage Nicea-Parafia
 */
?>

<?php get_header(); ?>

<div class="left">
	<h1 class="postTitle contentMargin"><?php printf( __( 'Polska Parafia wyniki wyszukiwania dla: %s', 'nicea-parafia' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		
	<?php get_template_part( 'loop', 'search' ); ?>
</div><!-- .left -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
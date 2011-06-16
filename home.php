<?php
/**
 * @package WordPress
 * @subpackage Nicea-Parafia
 */
?>

<?php get_header(); ?>

<?php if ( my_is_home() ) : // if it is real homepage ?>
	<div id="bodyLeft">
		<h1 class="postTitle">Polska Parafia w Nicei - Ogłoszenia</h1>
		
		<?php get_template_part( 'loop', 'home' ); ?>
	</div> <!-- .bodyLeft -->
	
	<?php get_sidebar(my_is_home() ? 'home' : 'subpage' ); ?>
	
<?php else : // this is not first page of homepage posts ?>

	<div class="left">
		<h1 class="postTitle contentMargin">Polska Parafia w Nicei - Ogłoszenia</h1>
			
		<?php get_template_part( 'loop', 'index' ); ?>
	</div><!-- .left -->
	
	<?php get_sidebar(); ?>

<?php endif; ?>

<?php get_footer(); ?>
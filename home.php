<?php
/**
 * @package WordPress
 * @subpackage Nicea-Parafia
 */
?>

<?php get_header(); ?>

<div id="bodyLeft">
	<h1 class="postTitle">Polska Parafia w Nicei - Ogłoszenia</h1>
	
	<?php get_template_part( 'loop', 'home' ); ?>
</div> <!-- .bodyLeft -->

<?php get_sidebar('home'); ?>
<?php get_footer(); ?>
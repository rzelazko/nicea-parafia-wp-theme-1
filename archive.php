<?php
/**
 * @package WordPress
 * @subpackage Nicea-Parafia
 */
?>

<?php get_header(); ?>

<div class="left">
	<?php the_post(); ?>

	<h1 class="contentMargin">Parafia Polska -
		<?php if ( is_day() ) : ?>
			<?php printf( __( 'ogłoszenia na&nbsp;dzień: <span>%s</span>', 'nicea-parafia' ), get_the_date() ); ?>
		<?php elseif ( is_month() ) : ?>
			<?php printf( __( 'ogłoszenia na&nbsp;miesiąc: <span>%s</span>', 'nicea-parafia' ), get_the_date( 'F Y' ) ); ?>
		<?php elseif ( is_year() ) : ?>
			<?php printf( __( 'ogłoszenia na&nbsp;rok: <span>%s</span>', 'nicea-parafia' ), get_the_date( 'Y' ) ); ?>
		<?php else : ?>
			<?php _e( 'ogłoszenia', 'nicea-parafia' ); ?>
		<?php endif; ?>
	</h1>

	<?php rewind_posts(); ?>
		
	<?php get_template_part( 'loop', 'archive' ); ?>
</div><!-- .left -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
<?php
/**
 * @package WordPress
 * @subpackage Nicea-Parafia
 */
?>

<?php /* Start the Loop */ ?>
<?php if (have_posts()) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		
		<div class="postBlock contentMargin">
			<p class="title">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</p>
			<p class="meta">Utworzone: <?php my_posted_on(false); ?></p>
			
			<p class="msg">
				<?php the_excerpt(); ?>
			</p><!-- .msg -->
			
			<p class="actions">
				<a class="more action" href="<?php the_permalink() ?>"><span>Więcej</span></a>
				<a class="comment action" href="<?php the_permalink() ?>#komentuj"><span><?php comments_number( 'Brak komentarzy', 'Jeden komentarz', 'Komentarze %' ); ?></span></a>
			</p>
		</div>
	
	<?php endwhile; ?>
<?php else : ?>
	<div class="postBlock contentMargin">
		<p class="title">Brak ogłoszeń</p>
		<p class="msg">Brak ogłoszeń spełniających podane kryteria.</p>
	</div>
<?php endif; ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>	
	<div class="contentMargin prevNext">
		<?php previous_posts_link( '<span>Następne</span>' ); ?>
		<?php next_posts_link( '<span>Poprzednie</span>' ); ?>
	</div>
<?php endif; ?>	
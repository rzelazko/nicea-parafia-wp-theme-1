<?php
/**
 * @package WordPress
 * @subpackage Nicea-Parafia
 */
?>

<?php /* Start the Loop */ ?>
<?php if (have_posts()) : ?>
	<?php $i = 0; while ( have_posts() ) : the_post(); ?>
	
		<?php if ( $i == 2 ) : ?>
			<?php $adv = getHomeAdv(); ?>
			<div class="gallery <?php echo $adv['cls']; ?>">
				<a class="place" href="<?php bloginfo( 'url' ); ?><?php echo $adv['url']; ?>">
					<span class="title"><?php echo $adv['place']; ?></span>
					<span>
						<?php echo $adv['msg']; ?> <img src="<?php bloginfo( 'template_directory' ); ?>/img/ico-more.gif" alt="Więcej" />
					</span>
				</a>
			</div> <!-- gallery -->
			
		<?php endif; ?>
		
		<div class="post <?php if ( $i == 2 ) : ?> afterAd <?php endif; ?>">
			<p class="title">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</p>
			<p class="meta">Utworzone: <?php my_posted_on(false); ?></p>
			
			<div class="msg">
				<?php the_excerpt(); ?>
			</div><!-- .msg -->
			
			<p class="actions">
				<a class="more action" href="<?php the_permalink() ?>"><span>Więcej</span></a>
			</p>
		</div> <!-- .post -->
	
	<?php $i++; endwhile; ?>
<?php else : ?>
	<div class="post">
		<p class="title">Brak ogłoszeń</p>
		<p class="msg">Brak ogłoszeń spełniających podane kryteria.</p>
	</div>
<?php endif; ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>	
	<p class="post actions">
		<?php previous_posts_link( '<span>Nowsze ogłoszenia</span>' ); ?>
		<?php next_posts_link( '<span>Starsze ogłoszenia</span>' ); ?>
	</p>
<?php endif; ?>	
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
				<?php if ('gallery' == get_post_format( $post->ID ) || 'image' == get_post_format( $post->ID ) ) : ?>
					<?php
						$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
						if ( $images ) :
							$total_images = count( $images );
							$image = array_shift( $images );
							$image_img_tag =  has_post_thumbnail() ? get_the_post_thumbnail($post->ID, 'list-thumb') : wp_get_attachment_image( $image->ID, 'list-thumb' );
					?>
						<p>
							<a class="size-thumbnail" href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a><br/>
							<em><?php printf( _n( 'Galeria zawiera <a %1$s>%2$s zdjęcie</a>.', 'Galeria zawiera <a %1$s>%2$s zdjęć</a>.', $total_images, 'niceaparafia' ),
								'href="' . get_permalink() . '" title="' . sprintf( esc_attr__( 'Permalink dla %s', 'niceaparafia' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
								number_format_i18n( $total_images )
							); ?></em>
						</p>
					<?php endif; /* if images*/ ?>
				<?php else : ?>
					<?php the_excerpt(); ?>
				<?php endif; ?>
			</p><!-- .msg -->
			
			<p class="actions">
				<a class="more action" href="<?php the_permalink() ?>"><span>Więcej</span></a>
				<a class="comment action" href="<?php the_permalink() ?>#comments"><span><?php comments_number( 'Brak komentarzy', 'Jeden komentarz', 'Komentarze %' ); ?></span></a>
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
<?php if (  $wp_query->max_num_pages > 1 ) :?>	
	<div class="contentMargin prevNext">
		<?php previous_posts_link( '<span>Nowsze ogłoszenia</span>' ); ?>
		<?php next_posts_link( '<span>Starsze ogłoszenia</span>' ); ?>
	</div>
<?php endif; ?>	

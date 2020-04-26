<?php
/**
 * @package WordPress
 * @subpackage Nicea-Parafia
 */
?>

<?php /* Start the Loop */ ?>
<?php if (have_posts()) : ?>
	<?php $i = 0; while ( have_posts() ) : the_post(); ?>
		
		<?php $hide_actions = false ?>
		
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
			<?php if (has_excerpt() && !('gallery' == get_post_format() || 'image' == get_post_format())): ?> <!-- if has excerpt -->
				<div class="excerpt"><a href="<?php the_permalink() ?>"><div class="title"><?php the_title(); ?></div><?php the_excerpt(); ?></a></p></div>
					<p class="actions">
						<a class="more action" href="<?php the_permalink() ?>"><span>Więcej</span></a>
					</p>
			<?php else: ?> <!-- if no excerpt -->
				<p class="title">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php trim(the_title()); ?></a>
				</p>
				<p class="meta">Utworzone: <?php my_posted_on(false); ?></p>
				
				<div class="msg">
					<?php if ('gallery' == get_post_format() || 'image' == get_post_format()) : ?>
						<?php
							$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
							if ( $images ) :
								$post_content = get_the_content();
								$img_tag_pattern = '~<img [^\>]*\ />~';
								$img_tags = array();
								preg_match_all( $img_tag_pattern, $post_content, $img_tags );

								$total_images = $img_tags[0] ? count( $img_tags[0] ) : 0;
								$image = array_shift( $images );
								$image_img_tag =  has_post_thumbnail() ? get_the_post_thumbnail($post->ID, 'homepage-thumb', array('class' => 'aligncenter')) : wp_get_attachment_image( $image->ID, 'homepage-thumb', false, array('class' => 'aligncenter') );
						?>
							<p>
								<a class="size-thumbnail" href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
								<?php if ($total_images > 0): ?><br/>
									<em><?php printf( _n( 'Galeria zawiera <a %1$s>%2$s zdjęcie</a>.', 'Galeria zawiera <a %1$s>%2$s zdjęć</a>.', $total_images, 'niceaparafia' ),
										'href="' . get_permalink() . '" title="' . sprintf( esc_attr__( 'Permalink dla %s', 'niceaparafia' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
										number_format_i18n( $total_images )
									); ?></em>
								<?php endif ?>
							</p>
						<?php endif; /* if images */?>
					<?php elseif (has_post_thumbnail()) : ?>
						<?php
								$image_img_tag = get_the_post_thumbnail($post->ID, 'homepage-thumb', array('class' => 'aligncenter'));
								$hide_actions = true;
						?>
						<p>
							<a class="size-thumbnail" href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
						</p>
					<?php else : ?>
						<?php trim(the_excerpt()); ?>
					<?php endif; ?>
				</div><!-- .msg -->

				<?php if (!$hide_actions) : ?>
					<p class="actions">
						<a class="more action" href="<?php the_permalink() ?>"><span>Więcej</span></a>
					</p>
				<?php endif ?>
			<? endif ?> <!-- if no excerpt  -->
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

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>
		<h1 class="postTitle contentMargin"><?php the_title(); ?></h1>
		
		<div class="postBlock postDetail contentMargin">		
			<?php /* p class="date">Utworzone: <?php my_posted_on(); ?></p */ ?>
        	<p class="tags">Utworzone: <?php my_posted_on(); ?>. <?php my_meta_info(); ?></p>
        	
			<div class="entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<p class="pages">Strony: ', 'after' => '</p>' ) ); ?>
			</div><!-- .entry-content -->
			
			<p class="actions">
				<?php my_edit_post_link( '<span>Edytuj ogłoszenie</span>' ); ?>
				<?php if ( comments_open() ) : ?>
					<a class="comment action" href="#comments"><span>Dodaj komentarz do ogłoszenia</span></a>
				<?php endif; ?>
			</p>
		</div><!-- .postBlock .postDetail -->
		
		<?php comments_template( '', true ); ?>		
		
		<?php if ('gallery' == get_post_format( $post->ID ) || 'image' == get_post_format( $post->ID )): ?>
			<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/jquery.lightbox-0.5.pack.js"></script>
			<script type="text/javascript">
				jQuery(function() {
					jQuery('dt[class=gallery-icon] a[href$=".jpg"],a[href$=".jpeg"],a[href$=".png"],a[href$=".gif"]').lightBox({
						imageLoading: '<?php bloginfo( 'template_directory' ); ?>/img/lightbox/lightbox-ico-loading.gif',
						imageBtnClose: '<?php bloginfo( 'template_directory' ); ?>/img/lightbox/lightbox-btn-close.gif',
						imageBtnPrev: '<?php bloginfo( 'template_directory' ); ?>/img/lightbox/lightbox-btn-prev.gif',
						imageBtnNext: '<?php bloginfo( 'template_directory' ); ?>/img/lightbox/lightbox-btn-next.gif',
						imageBlank: '<?php bloginfo( 'template_directory' ); ?>/img/lightbox/lightbox-blank.gif',
						txtImage: 'Zdjęcie',
						txtOf: 'z'
					});
				});			
			</script>
		<?php endif; ?>
	<?php endwhile; ?> 

<?php else : ?>
	<div class="postBlock contentMargin">
		<p class="title">Nie znaleziono</p>
		<p class="msg">Nie znaleziono żądanego ogłoszenia.</p>
	</div>
<?php endif; ?>

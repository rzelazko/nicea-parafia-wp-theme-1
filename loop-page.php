<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>
		<h1 class="postTitle contentMargin"><?php the_title(); ?></h1>
		
		<div class="postBlock postDetail contentMargin">        	
			<div class="entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<p class="pages">Strony: ', 'after' => '</p>' ) ); ?>
			</div><!-- .entry-content -->
			
			<p class="actions">
				<?php my_edit_post_link( '<span>Edytuj stronę</span>' ); ?>
				<?php if ( comments_open() ) : ?>
					<a class="comment action" href="#comments"><span>Dodaj komentarz</span></a>
				<?php endif; ?>
			</p>
		</div><!-- .postBlock .postDetail -->
		
		<?php comments_template( '', true ); ?>		
	<?php endwhile; ?> 

<?php else : ?>
	<div class="postBlock contentMargin">
		<p class="title">Nie znaleziono</p>
		<p class="msg">Nie znaleziono żądanej strony.</p>
	</div>
<?php endif; ?>
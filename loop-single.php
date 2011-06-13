<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>
		<h1 class="contentMargin"><?php the_title(); ?></h1>
		
		<div class="postBlock postDetail contentMargin">		
			<p class="date"><?php my_posted_on(); ?></p>
        	<p class="tags"><?php my_meta_info(); ?></p>
        	
			<div class="entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<p class="pages">Strony: ', 'after' => '</p>' ) ); ?>
			</div><!-- .entry-content -->
			
			<p class="actions">
				<?php my_edit_post_link( '<span>Edytuj wpis</span>' ); ?>
				<?php if ( comments_open() ) : ?>
					<a class="comment action" href="#komentuj"><span>Dodaj komentarz do ogłoszenia</span></a>
				<?php endif; ?>
			</p>
		</div><!-- .postBlock .postDetail -->
		
		<div class="postTitle contentMargin"><a name="komentuj" id="komentuj"></a>Komentarze</div>
		<!-- TODO -->		
	<?php endwhile; ?> 

<?php else : ?>
	<div class="postBlock contentMargin">
		<p class="title">Nie znaleziono</p>
		<p class="msg">Nie znaleziono żądanego wpisu.</p>
	</div>
<?php endif; ?>
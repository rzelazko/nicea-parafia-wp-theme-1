<?php
/**
 * @package WordPress
 * @subpackage Nicea-Parafia
 */
?>

<div class="postTitle contentMargin"><a name="komentuj" id="komentuj"></a>
	<?php if ( have_comments() ) : ?>
		<?php
			printf( _n( 'Jeden komentarz do %2$s', '%1$s odpowiedzi na %2$s', get_comments_number(), 'nicea-parafia' ),
			number_format_i18n( get_comments_number() ), get_the_title() );
		?>
	<?php else : ?>
		Komentarze
	<?php endif; ?>
</div>

<div class="commentsList contentMargin">
	<?php if ( post_password_required() ) : ?>
		<div class="commentBox">
			<div class="comment">Ten wpis został zabezpieczony hasłem. Podaj hasło aby zobaczyć komentarze.</div>
		</div> <!-- .commentBox -->
	<?php return; endif; ?>

	<?php if ( have_comments() ) : ?>
	
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="commentBox">
				<div class="prevNext">
					<?php previous_comments_link( '<span>Starsze komentarze</span>' ); ?>
					<?php next_comments_link( '<span>Nowsze komentarze</span>' ); ?>
				</div>
			</div> <!-- .commentBox -->
		<?php endif; // check for comment navigation ?>
		
		<?php wp_list_comments( array( 'callback' => 'niceaparafia_comment' ) ); ?>
		
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="commentBox">
				<div class="prevNext">
					<?php previous_comments_link( '<span>Starsze komentarze</span>' ); ?>
					<?php next_comments_link( '<span>Nowsze komentarze</span>' ); ?>
				</div>
			</div> <!-- .commentBox -->
		<?php endif; // check for comment navigation ?>
		
		<?php if ( ! comments_open() ) : ?>
			<div class="commentBox">
				<div class="comment">Komentarze dla tego wpisu są zamknięte.</div>
			</div>
		<?php endif; // end if comments closed ?>
		
	<?php else : // or, if we don't have comments: ?>
		<div class="commentBox">
			<div class="comment">
				<?php if ( comments_open() ) : ?>
					Brak komentarzy. Dodaj pierwszy wpis używając poniższego formularza.
				<?php else : // if comments closed ?>
					Komentarze dla tego wpisu są zamknięte.
				<?php endif; // end if comments closed ?>
			</div>
		</div> <!-- .commentBox -->
	<?php endif; ?>
</div>
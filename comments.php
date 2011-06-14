<?php
/**
 * @package WordPress
 * @subpackage Nicea-Parafia
 */
?>

<div id="comments" class="postTitle contentMargin">
	<?php if ( have_comments() ) : ?>
		<?php
			printf( _n( 'Jeden komentarz do %2$s', '%1$s odpowiedzi na %2$s', get_comments_number(), 'nicea-parafia' ),
			number_format_i18n( get_comments_number() ), get_the_title() );
		?>
	<?php else : ?>
		Komentarze
	<?php endif; ?>
</div> <!-- #comments -->


<?php if ( post_password_required() ) : ?>
	<div class="contentMargin">
		<p>Ten wpis został zabezpieczony hasłem. Podaj hasło aby zobaczyć komentarze.</div>
	</div> <!-- .contentMargin -->
<?php return; endif; ?>

<?php if ( have_comments() ) : ?>
	<div class="commentsList contentMargin">
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
			</div> <!-- .commentBox -->
		<?php endif; // end if comments closed ?>
	</div> <!-- .commentsList -->
<?php else : // or, if we don't have comments: ?>

	<?php if ( comments_open() ) : ?>
		<div class="commentsList contentMargin">
			<div class="commentBox">
				<div class="comment">
					Brak komentarzy. Dodaj pierwszy wpis używając poniższego formularza.
				</div>
			</div> <!-- .commentBox -->
		</div> <!-- .commentsList -->
	<?php else : // if comments closed ?>
		<div class="contentMargin">
			<p>Komentarze dla tego wpisu są zamknięte.</p>
		</div> <!-- .contentMargin -->
	<?php endif; // end if comments closed ?>
	
<?php endif; ?>
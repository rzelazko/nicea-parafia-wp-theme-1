<?php 
/**
 * @package WordPress
 * @subpackage Nicea-Parafia
 */

/******************************************************************************
 * setup administrative theme option page 
 *****************************************************************************/
require_once ( get_template_directory() . '/theme-options.php' );

function getCarouselSettings() {
	$np_def_carousel_opts = getDefaultOptions('carousel');
	
	$options = get_option( 'niceaparafia_theme_carousel', $np_def_carousel_opts );
	$settings = array();
		
	foreach ($options as $optKey => $optVal) {
		$idx = preg_replace('/[^0-9]*/', '', $optKey);
		$key = preg_replace('/homeimg([0-9]+)_/', '', $optKey);
		
		if ( is_array($settings[$idx]) ) {
			$settings[$idx][$key] = $optVal;
		} else {
			$settings[$idx] = array($key => $optVal);
		}
		
		if ($key == 'src') {
			$settings[$idx][$key] = get_bloginfo( 'template_directory' ) . '/img/homepage/main-carousel/' . $settings[$idx][$key];
		}
	}
	return $settings;
}

function getSubpImg() {
	$np_def_subpage_opts = getDefaultOptions('subpage-img');
	
	$options = get_option( 'niceaparafia_theme_subpimg', $np_def_subpage_opts );
	$rand_key = array_rand($options);
	$rand_key = preg_replace('/_[a-z]+$/', '', $rand_key);
	
	$opt = array();
	$opt['cls'] = $options[$rand_key . '_cls'];
	$opt['src'] = $options[$rand_key . '_src'];
	$opt['place'] = $options[$rand_key . '_place'];
	
	return $opt;
}

/******************************************************************************
 * sets up theme defaults and registers support for various WordPress features 
 *****************************************************************************/
add_action( 'after_setup_theme', 'niceaparafia_setup' );

if ( ! function_exists( 'niceaparafia_setup' ) ):
function niceaparafia_setup() {
	add_theme_support('menus');
	
	register_nav_menus(
		array(
			'header-menu' => __( 'Menu w nagłówku' ),
			'footer-menu' => __( 'Menu w stopce' )
		)
	);
		
	add_theme_support( 'post-formats', array( 'gallery' ) );
	
}
endif;

/******************************************************************************
 * add custom gravatar to settings->discussion
 *****************************************************************************/
function my_own_gravatar( $avatar_defaults ) {
    $myavatar = get_bloginfo('template_directory') . '/img/subpage/ico-gravatar.gif';
    $avatar_defaults[$myavatar] = 'Nicea-Parafia';
    return $avatar_defaults;
}

add_filter( 'avatar_defaults', 'my_own_gravatar' );

/******************************************************************************
 * css class to action link adding
 *****************************************************************************/
function cls_prev_action() {
	return 'class="prev action"';
}

function cls_next_action() {
	return 'class="next action"';
}

function my_edit_post_link( $link = null, $id = 0 ) {
	if ( !$post = &get_post( $id ) )
		return;

	if ( !$url = get_edit_post_link( $post->ID ) )
		return;

	if ( null === $link )
		$link = __('Edit This');

	$post_type_obj = get_post_type_object( $post->post_type );
	$link = '<a class="edit action" href="' . $url . '" title="' . esc_attr( $post_type_obj->labels->edit_item ) . '">' . $link . '</a>';
	echo apply_filters( 'edit_post_link', $link, $post->ID );
}

function my_edit_comment_link( $link = null, $before = '', $after = '' ) {
	global $comment;

	if ( !current_user_can( 'edit_comment', $comment->comment_ID ) )
		return;

	if ( null === $link )
		$link = __('Edit This');

	$link = '<a class="edit action" href="' . get_edit_comment_link( $comment->comment_ID ) . '" title="' . esc_attr__( 'Edit comment' ) . '">' . $link . '</a>';
	echo $before . apply_filters( 'edit_comment_link', $link, $comment->comment_ID ) . $after;
}

function my_comment_reply_link($args = array(), $comment = null, $post = null) {
	echo str_replace('comment-reply-link', 'comment action', get_comment_reply_link($args, $comment, $post));
}

add_filter('next_posts_link_attributes', 'cls_next_action');
add_filter('previous_posts_link_attributes', 'cls_prev_action');
add_filter('next_comments_link_attributes', 'cls_next_action');
add_filter('previous_comments_link_attributes', 'cls_prev_action');

/******************************************************************************
 * utilities functions
 *****************************************************************************/
if (!function_exists('mb_ucfirst')):
function mb_ucfirst($str, $charset) {
    $f = mb_strtoupper(mb_substr($str, 0, 1, $charset), $charset);
    return $f . mb_substr($str, 1, mb_strlen($str, $charset), $charset);
} 
endif;

function my_is_home() {
	$pageNumber = (get_query_var('paged')) ? get_query_var('paged') : 1;
	return is_home() && $pageNumber < 2;
}

/******************************************************************************
 * my html helper functions
 *****************************************************************************/
function my_posted_on($ucFirst = true) {
	$charset = get_bloginfo( 'charset' );
	$date = mb_strtolower(get_the_date('l, j F Y'), $charset);
	
	if ($ucFirst) {
		$date = mb_ucfirst($date, $charset);
	}
	
	printf( __( '%1$s', 'nicea-parafia' ),
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			$date
		)
	);
}

function my_meta_info() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'Wpis w kategorii %1$s oznaczony tagami %2$s. Dodaj do zakładek <a href="%3$s" title="Odnośnik bezpośredni %4$s" rel="bookmark">odnośnik bezpośredni</a>.', 'nicea-parafia' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'Wpis w kategorii %1$s. Dodaj do zakładek <a href="%3$s" title="Odnośnik bezpośredni %4$s" rel="bookmark">odnośnik bezpośredni</a>.', 'nicea-parafia' );
	} else {
		$posted_in = __( 'Dodaj do zakładek <a href="%3$s" title="Odnośnik bezpośredni %4$s" rel="bookmark">odnośnik bezpośredni</a>.', 'nicea-parafia' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}

function niceaparafia_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' : ?>
			
			<div id="comment-<?php comment_ID(); ?>" class="commentBox">
				<?php echo get_avatar( $comment, 38 ); ?>
				<p class="name">
					<?php echo get_comment_author_link(); ?>
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<em><?php _e( 'Komentarz oczekuje na akceptację', 'nicea-parafia' ); ?></em>
					<?php endif; ?>
				</p> <!-- .name -->
				
				<p class="date">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s %2$s', 'nicea-parafia' ), get_comment_date(),  get_comment_time() ); 
					?></a><?php my_edit_comment_link( __( '<span>Edytuj</span>', 'nicea-parafia' ), ' ' ); ?>
				</p> <!-- .date -->
				
				<div class="comment"><?php comment_text(); ?></div> <!-- .comment -->
				
				<p class="comment reply">
					<?php my_comment_reply_link( array_merge( $args, array( 
						'depth' => $depth, 
						'max_depth' => $args['max_depth'],
						'reply_text' => '<span>Odpowiedz</span>'
					) ) ); ?>
				</p><!-- .reply -->
			</div> <!-- #comment-<?php comment_ID(); ?> -->
			
			<?php break;
		case 'pingback'  :
		case 'trackback' : ?>
			
			<div id="comment-<?php comment_ID(); ?>" class="commentBox">
				<div class="comment pingback">
					<?php _e( 'Pingback:', 'nicea-parafia' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edytuj)', 'nicea-parafia' ), ' ' ); ?>
				</div> <!-- .comment -->
			</div> <!-- #comment-<?php comment_ID(); ?> -->
		
			<?php break;
	endswitch;
}

<?php 
/**
 * @package WordPress
 * @subpackage Nicea-Parafia
 */

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
}

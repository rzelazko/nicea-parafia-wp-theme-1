<?php 
/**
 * @package WordPress
 * @subpackage Nicea-Parafia
 */

/******************************************************************************
 *  menu support 
 *****************************************************************************/
if (function_exists('add_theme_support')) {
    add_theme_support('menus');
}

add_action( 'init', 'register_my_menus' );

function register_my_menus() {
	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu' ),
			'footer-menu' => __( 'Footer Menu' )
		)
	);
}

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

/******************************************************************************
 * my html helper functions
 *****************************************************************************/
function my_posted_on() {
	$charset = get_bloginfo( 'charset' );
	
	printf( __( '%1$s', 'nicea-parafia' ),
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			ucfirst(mb_strtolower(get_the_date('l, j F Y'), $charset))
		)
	);
}

function my_meta_info() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'nicea-parafia' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'nicea-parafia' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'nicea-parafia' );
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

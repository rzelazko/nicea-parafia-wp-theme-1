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
		$idx = preg_replace('/^homeimg([0-9]+)_[a-zA-Z0-9]+$/', '$1', $optKey);
		$key = preg_replace('/^homeimg([0-9]+)_/', '', $optKey);
	
		if ( is_array($settings[$idx]) ) {
			$settings[$idx][$key] = $optVal;
		} else {
			$settings[$idx] = array($key => $optVal);
		}
		
		if ($key == 'src') {
			$settings[$idx][$key] = get_template_directory_uri() . '/img/homepage/main-carousel/' . $settings[$idx][$key];
		} 
		elseif ($key == 'place1') {
			$settings[$idx]['place'] = $optVal;
		}
		elseif ($key == 'place2') {
			$settings[$idx]['place'] .= '<br/>' . $optVal;
		}
	}
	shuffle($settings);
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

function getSubpAdv() {
	$np_def_galleries = getDefaultOptions('galleries');
	
	$options = get_option( 'niceaparafia_theme_galleries', $np_def_galleries );
	$rand_key = array_rand($options);
	$rand_key = preg_replace('/_[a-z]+$/', '', $rand_key);
	
	$opt = array();
	$opt['cls'] = $options[$rand_key . '_cls'];
	$opt['src'] = $options[$rand_key . '_src'];
	$opt['url'] = $options[$rand_key . '_url'];
	$opt['title'] = $options[$rand_key . '_title'];
	$opt['msg'] = $options[$rand_key . '_msg'];
	
	return $opt;
}

function getHomeAdv() {
	$np_def_homepage_adv = getDefaultOptions('homepage-adverts');
	
	$options = get_option( 'niceaparafia_theme_hmpgadv', $np_def_homepage_adv );
	$settings = array();
	
	foreach ($options as $optKey => $optVal) {
		$idx = preg_replace('/[^0-9]*/', '', $optKey);
		$key = preg_replace('/adv([0-9]+)_/', '', $optKey);
		
		if ( is_array($settings[$idx]) ) {
			$settings[$idx][$key] = $optVal;
		} else {
			$settings[$idx] = array($key => $optVal);
		}
		
		if ($key == 'msg') {
			$settings[$idx][$key] = preg_replace('/([0-9]{2}:[0-9]{2})/', '<span class="time">$1</span>', $optVal);
		}
	}
	
	$adv_arr = array_filter($settings, function ($var) {
		return $var['enabled'];
	});
	
	$rand_key = array_rand($adv_arr);	
	return $adv_arr[$rand_key];
}

function getOnHolidays() {
	$np_def_holidays = false;
	$options = get_option( 'niceaparafia_theme_holidays', $np_def_holidays );
	return (bool)$options;
}

function getHmpgContactImg() {
	$np_def_hmpgcnct = getDefaultOptions('homepage-contact-img');
	$options = get_option( 'niceaparafia_theme_hmpgcnct', $np_def_hmpgcnct );
	if (!isset($options['image']) || $options['image'] == '') {
		$options = $np_def_hmpgcnct;
	}
	return $options['image'];
}

/******************************************************************************
 * sets up theme defaults and registers support for various WordPress features 
 *****************************************************************************/
add_action( 'after_setup_theme', 'niceaparafia_setup' );
if ( ! function_exists( 'niceaparafia_setup' ) ):
function niceaparafia_setup() {
	add_theme_support('menus');

	add_theme_support( 'post-formats', array( 'gallery', 'image' ) );	

	add_theme_support( 'post-thumbnails' );
	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'homepage-thumb', 413, 188, true);
		add_image_size( 'list-thumb', 580, 9999, false);
		add_image_size( 'big-post-pic', 900, 900, false);
	}	

	register_nav_menus(
		array(
			'header-menu' => __( 'Menu w nagłówku' ),
			'footer-menu' => __( 'Menu w stopce' )
		)
	);
		
}
endif;

/******************************************************************************
 * Custom size for image upload - to hanlde image post type
 *****************************************************************************/
function nicea_add_custom_sizes( $sizes ) {
	$my_sizes = array('big-post-pic' => __('Duży obrazek do galerii'));
	return array_merge( $sizes, $my_sizes );
}
add_filter( 'image_size_names_choose', 'nicea_add_custom_sizes' );

/******************************************************************************
 * Registers dynamic sidebars
 *****************************************************************************/

function nicea_widgets_init() {
	// Area 1 - located at the top of the home page
	register_sidebar( array(
		'name' => __( 'Strona główna - góra', 'nicea' ),
		'id' => 'homepage-top',
		'description' => __( 'Informacje o mszach świętych', 'nicea' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );

	// Area 2, located at the bottom of the home page
	register_sidebar( array(
		'name' => __( 'Strona główna - dół', 'nicea' ),
		'id' => 'homepage-bottom',
		'description' => __( 'Dane kontaktowe - ze zdjęciem', 'nicea' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<strong>',
		'after_title' => '</strong>',
	) );
	
	// Area 3, located above the add on the non-home pages
	register_sidebar( array(
		'name' => __( 'Pozostałe strony - góra', 'nicea' ),
		'id' => 'non-homepage-top',
		'description' => __( 'Dane kontaktowe - bez zdjęcia', 'nicea' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	) );
	
	//Area 3, located below the add on the non-home pages
	register_sidebar( array(
		'name' => __( 'Pozosałe strony - dół', 'nicea' ),
		'id' => 'non-homepage-bottom',
		'description' => __( 'Informacje o Mszach - skrócone', 'nicea' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
	
	register_widget('Mass_Widget'); 
	// registered WP_Widget_Text
	
	unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Pages');
	unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Archives');
	unregister_widget('WP_Widget_Links');
	unregister_widget('WP_Widget_Meta');
	unregister_widget('WP_Widget_Search');
	unregister_widget('WP_Widget_Categories');
	unregister_widget('WP_Widget_Recent_Posts');
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Tag_Cloud');
	unregister_widget('WP_Nav_Menu_Widget');	
}

/** Register sidebars by running twentyten_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'nicea_widgets_init' );

/**
 * Mass widget
 *
 * @since 2.8.0
 */
class Mass_Widget extends WP_Widget {

	function Mass_Widget() {
		$control_ops = array('width' => 400, 'height' => 350);
		$widget_ops = array('classname' => 'mass_widget', 'description' => __('Dodawanie mszy św. do panelu bocznego'));
		$this->WP_Widget(false, 'Msza Święta', $widget_ops, $control_ops);
	}

	function widget( $args, $instance ) {
		$args['title'] = $instance['title'];
		$args['page'] = $instance['page'];
		$args['text'] = $instance['text'];
		$args['list'] = explode("\n", $instance['list']);
		?>
		<a class="place" href="<?php echo bloginfo( 'url' )."/".$args['page'];  ?>">
			<?php echo $args['title'];  ?></a>
		<div class="info">
			<p><?php echo $args['text']?></p>
			<ul>
				<?php foreach ($args['list'] as $li) : ?>
					<li><?php echo preg_replace('/^\s*\-/', '', preg_replace('/([0-9]{2}:[0-9]{2})/', '<strong>$1</strong>', $li)) ?></li>
				<?php endforeach; ?>
			</ul>
			<h2><a class="action more" href="<?php echo bloginfo( 'url' ).'/'.$args['page']; ?>"
				><span>Kościół Polski <?php echo $args['title'];?>, zdjęcia, mapa dojazdu</span></a></h2>
		</div>
		<?php 
	}

	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'page' => '', 'text' => '','list' => '' ) );
		$title = ($instance['title']);
		$page = ($instance['page']);
		$text = $instance['text'];
		$list = $instance['list'];
?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Miejscowość:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<p>
			<label for="<?php echo $this->get_field_id('page'); ?>">Podstrona:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('page'); ?>" name="<?php echo $this->get_field_name('page'); ?>" type="text" value="<?php echo esc_attr($page); ?>" /></p>
		<p>
			<label for="<?php echo $this->get_field_id('text'); ?>">Opis:</label>
		<textarea class="widefat" rows="4" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea></p>
		<p>
			<label for="<?php echo $this->get_field_id('text'); ?>">Lista mszy (od myślnika):</label>
		<textarea class="widefat" rows="4" cols="20" id="<?php echo $this->get_field_id('list'); ?>" name="<?php echo $this->get_field_name('list'); ?>"><?php echo $list; ?></textarea></p>
<?php
	}
}

/******************************************************************************
 * get readings for mass
 *****************************************************************************/
/*function getReadingsForMass() {
	$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://www.niedziela.pl/index/liturgia/liturgia1.php');
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    
    $data = curl_exec($ch);
    curl_close($ch);
    
    if ($data) {
    	$reading_m = array();    	
    	
    	if (preg_match('~</font></a><table>(.+)</table>~mis', $data, $reading_m)) {
    		$reading_ex = explode('</tr>', $reading_m[1]);
    		foreach ($reading_ex as $tr) {
	    		$reading_str = iconv('ISO-8859-2', get_option('blog_charset'), str_replace("\n", ' ', $tr));
	    		$reading_tr = strip_tags(str_replace('</td>', ' ', str_replace('</b>', ' ', $reading_str)));
	    		echo '<dd>' . $reading_tr . '</dd>' . PHP_EOL;
    		}
    	}
    	else {
    		echo '<dd>Nie poprawne informacje o czytaniach</dd>';
    	}
    }
    else {
    	echo '<dd>Nie można pobrać informacji o czytaniach</dd>';
    }
}*/

function getReadingsForMassOld() {
	$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://mateusz.pl/czytania/' . date('Y') . '/' . date('Ymd') . '.htm');
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    
    $data = curl_exec($ch);
    curl_close($ch);
    
    if ($data) {
    	$reading_m = array();    	
    	
    	if (preg_match('~<a\s+href="#czytania">([^<]+)</a>~mis', $data, $reading_m)) {
	    	$reading_str = iconv('ISO-8859-2', get_option('blog_charset'), str_replace("\n", ' ', $reading_m[1]));
			$reading_line = explode(';', $reading_str);
			foreach ($reading_line as $rl) {
				echo '<dd>' . $rl . '</dd>' . PHP_EOL;
			}
    	}
    	else {
    		echo '<dd>Nie poprawne informacje o czytaniach</dd>';
    	}
    }
    else {
    	echo '<dd>Nie można pobrać informacji o czytaniach</dd>';
    }
}

function getReadingsForMass() {
	$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://opoka.org.pl/liturgia_iframe.php');
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    
    $data = curl_exec($ch);
    curl_close($ch);
    
    if ($data) {
    	$reading_m = array();    	
    	
    	if (preg_match('~<div\s+class="sekcja\s+jeden">(.*)</div><div\s+class="sekcja\s+patroni">~mis', $data, $reading_m)) {
	    	$reading_str = $reading_m[1];
			$reading_line = explode('</div></div>', $reading_str);
			foreach ($reading_line as $rl) {
				echo '<dd>' . preg_replace('~<div(\s+[\w="]+)*>~i', ' ', $rl) . '</dd>' . PHP_EOL;
			}
    	}
    	else {
    		echo '<dd>Nie poprawne informacje o czytaniach</dd>';
    	}
    }
    else {
    	echo '<dd>Nie można pobrać informacji o czytaniach</dd>';
    }
}

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
    $f = strtoupper(substr($str, 0, 1, $charset), $charset);
    return $f . substr($str, 1, strlen($str, $charset), $charset);
} 
endif;

function my_is_home() {
	$pageNumber = (get_query_var('paged')) ? get_query_var('paged') : 1;
	return is_home() && $pageNumber < 2;
}

/******************************************************************************
 * my html helper functions
 *****************************************************************************/
function my_posted_on($ucFirst = false) {
	$charset = get_bloginfo( 'charset' );
	$date = strtolower(get_the_date('l, j F Y'));
	
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

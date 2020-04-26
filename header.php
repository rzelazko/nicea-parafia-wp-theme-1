<?php
/**
 * @package WordPress
 * @subpackage Nicea-Parafia
 */
?><!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( my_is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
	
	<link rel="profile" href="//gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />	
	
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>?modtime=20200208203500" />
	<?php if ( my_is_home() ): ?>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/homepage.css?modtime=20200208203500" />
	<?php endif; ?>
		
	<!--[if lt IE 9]>
		<link href="<?php echo get_template_directory_uri(); ?>/css/ie-lt-9.css" type="text/css" rel="stylesheet" />
	<![endif]-->
	<!--[if lt IE 8]>
		<link href="<?php echo get_template_directory_uri(); ?>/css/ie-lt-8.css" type="text/css" rel="stylesheet" />
	<![endif]-->
	
	<!--link rel="stylesheet" type="text/css" media="all" href="//fonts.googleapis.com/css?family=PT+Sans:regular,bold|PT+Sans+Narrow:regular,bold&subset=latin,cyrillic" /-->
    <link type="text/css" rel="stylesheet" href="//fonts.googleapis.com/css?family=PT+Sans|PT+Sans+Narrow&subset=latin,latin-ext">
	<?php if (is_single() && 'gallery' == get_post_format()): ?>
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_directory' ); ?>/css/jquery.lightbox-0.5.css" />		
	<?php endif; ?>
	<?php if (getOnHolidays()): ?>
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_directory' ); ?>/css/holidays.css" />
	<?php endif; ?>

	<link rel="shortcut icon" href="<?php bloginfo( 'template_directory' ); ?>/favicon.ico" type="image/x-icon" />
	<link rel="bookmark icon" href="<?php bloginfo( 'template_directory' ); ?>/favicon.ico" type="image/x-icon" />
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
		
	<?php wp_enqueue_script("jquery"); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="header">
    <div class="nav">
        <ul>
            <li class="first <?php if ( my_is_home() ) : ?> current-menu-item <?php endif; ?>"><a href="<?php bloginfo( 'url' ); ?>/"><img src="<?php bloginfo( 'template_directory' ); ?>/img/ico-hmpg.png" /></a></li>
            
			<?php if ( my_is_home() ) : ?>
				<li id="navTopSearch"><span id="searchIco"><img src="<?php bloginfo( 'template_directory' ); ?>/img/ico-search.png" /></span></li>
			<?php endif; ?>
					
            <?php wp_nav_menu( array( 
            	'theme_location' => 'header-menu', 
            	'container' => '', 
            	'items_wrap' => '%3$s', 
            	'depth' => 0
            ) ); ?>

        </ul>
    </div><!-- .nav -->

    <?php get_template_part( 'headimage', my_is_home() ? 'home' : 'subpage' ); ?>
    
    <div class="pageLogo">
        <a href="<?php bloginfo( 'url' ); ?>/">
        	<img src="<?php bloginfo( 'template_directory' ); ?>/img/nicea-parafia.png" alt="Parafia Nicea" />
        	<span class="logoLine1">Polska Parafia</span>
        	<span class="logoLine2">Nicea Cannes Monaco</span>
        </a>
    </div><!-- .pageLogo -->
</div><!-- #header -->

<div id="content">
	<div class="main">
		<div id="body"<?php if (is_singular() && has_post_format( 'image' )): ?> class="fullpage"<?php endif ?>>

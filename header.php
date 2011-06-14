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
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />	
	
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<?php if ( is_home() ): ?>
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_directory' ); ?>/css/homepage.css" />
	<?php endif; ?>
		
	<!--[if lt IE 9]>
		<link href="<?php bloginfo( 'template_directory' ); ?>/css/ie-lt-9.css" type="text/css" rel="stylesheet" />
	<![endif]-->
	<!--[if lt IE 8]>
		<link href="<?php bloginfo( 'template_directory' ); ?>/css/ie-lt-8.css" type="text/css" rel="stylesheet" />
	<![endif]-->
	<!--[if lte IE 6]>
		<link href="<?php bloginfo( 'template_directory' ); ?>/css/ie-lte-6.css" type="text/css" rel="stylesheet" />
		<script src="<?php bloginfo( 'template_directory' ); ?>/css/iepngfix/iepngfix_tilebg.js" type="text/javascript"></script> 
	<![endif]-->
	
	<link rel="stylesheet" type="text/css" media="all" href="http://fonts.googleapis.com/css?family=PT+Sans:regular,bold|PT+Sans+Narrow:regular,bold&subset=latin,cyrillic" />
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="content">
    <div class="main">
        <div id="body">
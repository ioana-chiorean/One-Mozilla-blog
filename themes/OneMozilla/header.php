<!DOCTYPE html>
<html <?php language_attributes(); ?> id="mozilla-blog">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- For Facebook -->
  <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
  <meta property="og:title" content="<?php if (is_singular()) : single_post_title(); else : bloginfo('name'); endif; ?>">
  <meta property="og:url" content="<?php if (is_singular()) : the_permalink(); else : bloginfo('url'); endif; ?>">
  <meta property="og:description" content="<?php fc_meta_desc(); ?>">
<?php if (is_singular() && has_post_thumbnail()) : ?>
  <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
  <meta property="og:image" content="<?php echo $thumb['0']; ?>">
<?php elseif (get_header_image()) : ?>
  <meta property="og:image" content="<?php echo get_header_image(); ?>">
<?php endif; ?>
  
  <meta name="title" content="<?php if (is_singular()) : single_post_title(); echo ' | '; endif; bloginfo('name'); ?>">
  <meta name="description" content="<?php fc_meta_desc(); ?>">
  
  <meta name="Rating" content="General">
  <!--[if IE]>
  <meta name="MSSmartTagsPreventParsing" content="true">
  <meta http-equiv="imagetoolbar" content="no">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <script src="<?php bloginfo('stylesheet_directory'); ?>/js/html5.js"></script>
  <![endif]-->

  <link rel="copyright" href="#colophon">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="shortcut icon" type="image/ico" href="<?php bloginfo('stylesheet_directory'); ?>/img/favicon.ico">
  <link rel="stylesheet" type="text/css" media="screen,projection" href="<?php bloginfo('stylesheet_url'); ?>">
  <link rel="stylesheet" type="text/css" media="all" href="//www.mozilla.org/tabzilla/media/css/tabzilla.css">
  <link rel="stylesheet" type="text/css" media="print" href="<?php bloginfo('stylesheet_directory'); ?>/css/print.css">
  <!--[if lte IE 7]><link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/css/ie7.css"><![endif]-->

  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

  <title><?php
    if ( is_single() ) { single_post_title(); echo ' | '; bloginfo('name'); } 
    elseif ( is_home() || is_front_page() ) { bloginfo('name'); if (get_bloginfo('description','display')) { echo ' | '. get_bloginfo('description','display'); } fc_page_number(); } 
    elseif ( is_page() ) { single_post_title(''); echo ' | '; bloginfo('name'); } 
    elseif ( is_search() ) { printf( __('Search results for "%s"', 'onemozilla'), esc_html( $s ) ); fc_page_number(); echo ' | '; bloginfo('name'); }
    elseif ( is_day() ) { $post = $posts[0]; _e('Posts for ', 'onemozilla'); echo the_time('F jS, Y'); echo ' | '; bloginfo('name'); fc_page_number(); }
    elseif ( is_month() ) { $post = $posts[0]; _e('Posts for ', 'onemozilla'); echo the_time('F, Y'); echo ' | '; bloginfo('name'); fc_page_number(); }
    elseif ( is_year() ) { $post = $posts[0]; _e('Posts for ', 'onemozilla'); echo the_time('Y'); echo ' | '; bloginfo('name'); fc_page_number(); }
    elseif ( is_404() ) { _e('Not Found', 'onemozilla'); echo ' | '; bloginfo('name'); } 
    else { wp_title(''); echo ' | '; bloginfo('name'); fc_page_number(); } 
  ?></title>

  <?php if ( is_singular() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); } ?>
  <?php	wp_head(); ?>
</head>

<body <?php body_class(); ?> role="document">
<div id="page"><div class="wrap">
  <nav id="nav-access">
    <ul role="navigation">
      <li><a href="#content-main" tabindex="1"><?php _e( 'Skip to main content', 'onemozilla' ); ?></a></li>
      <li><a href="#content-sub" tabindex="2"><?php _e( 'Skip to sidebar', 'onemozilla' ); ?></a></li>
    <?php if ( is_active_widget( false, false, 'search', true ) || ( !is_active_sidebar('sidebar') ) ) : ?>
      <li><a href="#search" tabindex="3"><?php _e( 'Skip to blog search', 'onemozilla' ); ?></a></li>
    <?php endif; ?>
    </ul>
  </nav>

	<header id="masthead" role="banner">
		<hgroup>
    <?php if ( (is_front_page()) && ($paged < 1) ) : ?>
      <h1 id="site-title"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></h1>
    <?php else : ?>
      <h1 id="site-title"><a href="<?php echo esc_url( home_url('/') ); ?>" rel="home" title="<?php _e('Go to the front page', 'onemozilla'); ?>"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a></h1>
    <?php endif; ?>
    <?php if (get_bloginfo('description','display')) : ?>
      <h2 id="site-description"><?php echo esc_attr( get_bloginfo('description', 'display') ); ?></h2>
    <?php endif; ?>
		</hgroup>
	  <a href="http://www.mozilla.org/" id="tabzilla">Mozilla</a>
	</header><!-- #branding -->

	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => 'nav', 'container_id' => 'nav-primary', 'fallback_cb' => 'false', ) ); ?>

	<div id="content">
<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WAI_Components_Gallery
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="not-w3c-notification">This is an Editor’s draft, for <em>preview purposes only</em>.</div>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wai_components' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

    <div class="w3c-wai-header">
      <a href="http://w3.org/"><img alt="W3C" src="<?php bloginfo('template_url'); ?>/img/w3c.png" width="90"></a>
      <a href="http://w3.org/WAI/" class="wai"><img alt="Web Accessibility Initiative" src="<?php bloginfo('template_url'); ?>/img/wai.png"></a>
    </div>
    <span class="page-title">
    	<?php if ( is_front_page() && is_home() ) : ?>
      	<span class="current-a">
			<?php else : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
    	<?php endif; ?>
      <?php bloginfo( 'name' ); ?> <span class="subheading"><?php bloginfo( 'description' ); ?></span>
      <?php if ( is_front_page() && is_home() ) : ?>
      	</span>
			<?php else : ?>
				</a>
    	<?php endif; ?>
    </span>
	</header><!-- #masthead -->

	<div id="content" class="site-content">

<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EpixMaterialWP
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <a class="skip-link screen-reader-text"
       href="#content"><?php esc_html_e('Skip to content', 'epixmaterialwp'); ?></a>

    <header id="masthead" class="site-header mdl-layout__header" role="banner">
        <div class="mdl-layout__header-row">
            <span class="mdl-layout-title"><?php bloginfo('name'); ?></span>

            <div class="mdl-layout-spacer"></div>

            <nav id="site-navigation" class="main-navigation mdl-navigation mdl-layout--large-screen-only" role="navigation">
                <?php echo epixmaterialwp_simple_a_tag_menu('mdl-navigation__link') ?>
            </nav><!-- #site-navigation -->
        </div>
    </header><!-- #masthead -->
    <div class="mdl-layout__drawer mdl-layout--small-screen-only">
        <span class="mdl-layout-title"><?php bloginfo('name'); ?></span>
        <nav class="mdl-navigation">
            <?php echo epixmaterialwp_simple_a_tag_menu('mdl-navigation__link') ?>
        </nav><!-- #site-navigation -->
    </div>

    <main id="content" class="site-content mdl-layout__content">
        <div class="page-content mdl-grid">

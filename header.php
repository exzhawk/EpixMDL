<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EpixMDL
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="preload" href="<?php get_stylesheet_uri();?>" as="style" onload="this.rel='stylesheet'">
	<link rel="preload" href="https://fonts.googleapis.com/icon?family=Material+Icons" as="style" onload="this.rel='stylesheet'">
	<link rel="preload" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css" as="style" onload="this.rel='stylesheet'">


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
	<header class="mdl-layout__header">
		<div class="mdl-layout__header-row">
			<div class="mdl-layout-spacer"></div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                  mdl-textfield--floating-label mdl-textfield--align-right">
				<label class="mdl-button mdl-js-button mdl-button--icon"
				       for="fixed-header-drawer-exp">
					<i class="material-icons">search</i>
				</label>
				<div class="mdl-textfield__expandable-holder">
					<input class="mdl-textfield__input" type="text" name="sample"
					       id="fixed-header-drawer-exp">
				</div>
			</div>
		</div>
	</header>
	<div class="mdl-layout__drawer">
		<span class="mdl-layout-title"><?php bloginfo( 'name' ); ?></span>
		<nav class="mdl-navigation">
			<?php $menu_items = wp_get_nav_menu_items( get_nav_menu_locations()["primary"] );
			foreach ( $menu_items as $menu_item ) {
				printf( '<a class="mdl-navigation__link" href="%s">%s%s</a>',
					$menu_item->url, $menu_item->menu_item_parent ? '&nbsp;&nbsp;' : '', $menu_item->title );
			}
			?>
		</nav>
	</div>
	<main class="mdl-layout__content">
		<div class="page-content mdl-grid">

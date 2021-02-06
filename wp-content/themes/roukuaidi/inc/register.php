<?php

function lp_register_theme_support() {
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'lp_register_theme_support');

function lp_register_image_sizes() {
	add_image_size('max_width', 1920, 0, false);
	add_image_size('container_width', 1200, 0, false);
	add_image_size('xs_width', 768, 0, false);
}
add_action('after_setup_theme', 'lp_register_image_sizes');

function lp_register_menus() {
	register_nav_menus(array(
		'header-menu' => 'Header menu',
	));
}
add_action('init', 'lp_register_menus');

function lp_register_sidebars() {
	/*register_sidebar(array(
		'name' => 'Sidebar',
		'id' => 'sidebar',
		'description' => '',
		'before_widget' => '<div id="%1$s" class="sidebar %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));*/
}
add_action('widgets_init', 'lp_register_sidebars');


function lp_register_query_vars($vars) {
	//$vars[] = 'barrister_status';

	return $vars;
}
add_action('query_vars', 'lp_register_query_vars');
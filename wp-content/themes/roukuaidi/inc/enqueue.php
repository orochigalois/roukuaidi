<?php

function lp_enqueue_frontend()
{
	// Dequeue existing scripts
	wp_dequeue_script('jquery');
	wp_deregister_script('jquery');

	// Third-party styles

	// Our styles
	// wp_enqueue_style('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css');

	wp_enqueue_style('app-css', get_template_directory_uri() . '/dist/app.css');

	// Third-party scripts
	// if (defined('LP_GMAPS_KEY') && LP_GMAPS_KEY) {
	// 	wp_enqueue_script('gmaps_api', 'https://maps.googleapis.com/maps/api/js?key=' . LP_GMAPS_KEY, '', '', true);
	// }

	// Our scripts
	wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.3.1.min.js', '', '', false);
	wp_enqueue_script('app-script', get_template_directory_uri() . '/dist/app.js', array('jquery'), '', true);
	
	// wp_enqueue_script('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array('jquery'), '', true);
	// wp_enqueue_script('background-video', 'https://rawgit.com/BGStock/jquery-background-video/master/jquery.background-video.js', array('jquery'), '', true);


	
}
add_action('wp_enqueue_scripts', 'lp_enqueue_frontend');

function lp_enqueue_admin()
{
	add_editor_style(get_template_directory_uri() . '/css/editor-styles.css');
	wp_enqueue_style('lity-style', get_template_directory_uri() . '/css/lity.min.css');
	wp_enqueue_script('lity-script', get_template_directory_uri() . '/js/lity.min.js', array('jquery'), '', true);
	wp_enqueue_style('acf-tip-style', get_template_directory_uri() . '/css/acf-tip.css');
	wp_enqueue_script('acf-tip-script', get_template_directory_uri() . '/js/acf-tip.js', array('jquery'), '', true);
}
add_action('admin_init', 'lp_enqueue_admin');

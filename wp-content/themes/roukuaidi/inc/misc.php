<?php
/*
 * Template utilities
 */
function is_blog () {
	return (is_archive() || is_author() || is_category() || is_single() || is_tag()) && 'post' == get_post_type();
}

function lp_theme_url() {
	return get_stylesheet_directory_uri();
}

function lp_theme_dir() {
	return get_stylesheet_directory();
}

function lp_theme_partial($path, $args = array()) {
	extract($args);
	include lp_theme_dir().$path;
}

function lp_image_dir(){
	echo lp_theme_url().'/images';
}

/*
 * Convert a given string to a slug
 */
function lp_slugify($text) {
	return sanitize_title($text);
}

/*
 * Theme file contents
 */
function lp_file_contents($path) {
	return file_get_contents(lp_theme_dir().$path);
}

/*
 * SVG icons
 */
function lp_svg_use($id, $width = 32, $height = 32, $class = 'icon') {
	return '<svg class="'.$class.'" width="'.$width.'" height="'.$height.'"><use xlink:href="#'.$id.'"></use></svg>';
}

/*
 * Font Awesome
 */
function lp_fa($icon, $alt = '') {
	return '<i class="fa '.$icon.'" aria-hidden="true"></i>'.($alt ? '<span class="sr-only">'.$alt.'</span>' : '');
}

/**
 * Check if a plugin is active
 *
 * @param $plugin_file Name of plugin file eg woocommerce/woocommerce.php
 * @return bool
 */
function lp_is_plugin_active($plugin_file) {
	static $plugins = null;

	if(!$plugins) {
		$plugins = get_option('active_plugins');
	}

	return in_array($plugin_file, $plugins);
}

/**
 * Return the type part of a mime type, eg for image/jpeg returns jpeg
 *
 * @param $mime the mime type to parse
 * @return string
 */
function lp_parse_mime($mime) {
	preg_match('/.*\/(\w*)\+?.*/', $mime, $matches);
	return $matches[1];
}


/**
 * Excerpt customiser
 * Strips headings and sets a custom length
 * * Template usage:
 * if(has_excerpt()) { the_excerpt(); }
 * * You can also use the function to shorten the manual excerpt:
 * lp_custom_excerpt(get_the_excerpt());
 * * Or simply shorten the content:
 * lp_custom_excerpt(get_the_content());
 *
 * @param $text - the string to strip headings and shorten, generally get_the_excerpt or get_the_content
 * @param $word_count - how many words to include in the output
 * @return string
 */
function lp_custom_excerpt($text, $word_count) {

	// Remove shortcode tags from the given content
	$text = strip_shortcodes($text);
	$text = apply_filters('the_content', $text);
	$text = str_replace(']]>', ']]&gt;', $text);

	// Regular expression that strips the header tags and their content
	$regex = '#(<h([1-6])[^>]*>)\s?(.*)?\s?(<\/h\2>)#';
	$text = preg_replace($regex,'', $text);

	// Set the word count
	$excerpt_length = apply_filters('excerpt_length', $word_count); // WP default word count is 55

	// Set the ending
	$excerpt_end = '...'; // The WP default is [...]
	$excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end);
	$excerpt = wp_trim_words($text, $excerpt_length, $excerpt_more);

	// Return it
	return wpautop(apply_filters('wp_trim_excerpt', $excerpt));
}
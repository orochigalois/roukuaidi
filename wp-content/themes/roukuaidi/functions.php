<?php

require 'inc/constants.php';

require 'inc/vendor.php';
require 'inc/acf.php';
require 'inc/admin.php';
require 'inc/ajax.php';
require 'inc/enqueue.php';
require 'inc/forms.php';
require 'inc/markup.php';
require 'inc/media.php';
require 'inc/menus.php';
require 'inc/misc.php';
require 'inc/query.php';
require 'inc/register.php';


// Set the homepage <title> attribute;
/*function different_document_title($title) {
    if(lp_is_homepage()) {
        $title = get_bloginfo('name');
    }

    return $title;
}
add_filter('pre_get_document_title', 'different_document_title', 100);*/

// Reroute inaccessible pages to 404
function reroute_to_404($template) {
	if(get_field('page_inaccessible')) {
		return locate_template('404.php');
	}
	else {
		return $template;
	}
}
add_filter('template_include', 'reroute_to_404');

// Redirect to a URL
function redirect_to_url() {
	$redirect = get_field('page_redirect');
	if($redirect && $redirect['url']) {
		wp_redirect($redirect['url']);
	}
}
add_action('template_redirect', 'redirect_to_url');


//Allow svg uploading
function my_theme_custom_upload_mimes( $existing_mimes ) { 
    $existing_mimes['svg'] = 'svg';
    return $existing_mimes;
}
add_filter( 'mime_types', 'my_theme_custom_upload_mimes' );


add_action('admin_head-post.php', 'print_theme_instruction_folder');
add_action('admin_head-post-new.php', 'print_theme_instruction_folder');
add_action('admin_head-toplevel_page_acf-options-theme-options', 'print_theme_instruction_folder');
function print_theme_instruction_folder() {
	
	?>
	<script>
	jQuery(function() {
		jQuery( "a" ).each(function() {
			var href = jQuery( this ).attr( "href" );
			var instruction_folder_path = '<?php echo get_template_directory_uri().'/images/instruction/';?>';
			if(href.indexOf("%%THEME_INSTRUCTION_FOLDER%%") > -1){
				var res = href.replace('%%THEME_INSTRUCTION_FOLDER%%', instruction_folder_path);
				jQuery( this ).attr( "href",res );
			}

		  });
	});
	</script>
	
	<?php
	
}

/*Display $hook_suffix as Admin Notice in WordPress*/

/*
add_action( 'admin_notices', 'wps_print_admin_pagehook' );
function wps_print_admin_pagehook(){
    global $hook_suffix;
    if( !current_user_can( 'manage_options') )
        return;
    ?>
    <div class="error"><p><?php echo $hook_suffix; ?></p></div>
    <?php 
}
*/

add_action('init', 'ap_remove_editor_from_post_type');
function ap_remove_editor_from_post_type() {
    remove_post_type_support( 'page', 'editor' );
}


function add_to_admin_header()
{
	?>
	<script type="text/javascript">
		var _imagedir = '<?php lp_image_dir(); ?>';
	</script>
<?php
}
add_action('admin_head', 'add_to_admin_header');




add_action('admin_init', function () {
    // Redirect any user trying to access comments page
    global $pagenow;
    
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }

    // Remove comments metabox from dashboard
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

    // Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});


// add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );


function alex_product_thumbnail_size( $size ) {
    global $product;

    $size = 'medium';

    return $size;
}
add_filter( 'single_product_archive_thumbnail_size', 'alex_product_thumbnail_size' );
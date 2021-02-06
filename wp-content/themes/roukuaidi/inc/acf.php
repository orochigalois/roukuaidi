<?php

function setup_acf()
{
	// Hide from admin menu
	//acf_update_setting('show_admin', false);

	// Google maps
	if (defined('LP_GMAPS_KEY') && LP_GMAPS_KEY) {
		acf_update_setting('google_api_key', LP_GMAPS_KEY);
	}

	if (function_exists('acf_add_options_page')) {
		/*acf_add_options_page(array(
			'page_title' => 'Project Options',
			'post_id' => 'projects',
			'parent_slug' => 'edit.php?post_type=project',
		));*/

		acf_add_options_page(array(
			'page_title' => 'Theme Options',
		));
	}
}
add_action('acf/init', 'setup_acf');

// Supply the license key
function lp_acf_license($value)
{
	return (defined('LP_ACF_LICENSE') ? LP_ACF_LICENSE : $value);
}
apply_filters('pre_option_acf_pro_license', 'lp_acf_license', 10, 1);

// Re-enable the Custom Fields metabox on certain post types
function lp_show_acf_customfields()
{
	if (in_array(get_post_type(), array('shop_order', 'shop_subscription'))) {
		acf_update_setting('remove_wp_meta_box', false);
	}
}
add_action('acf/input/admin_head', 'lp_show_acf_customfields', 1);

/**
 * Load acf svg icons
 *
 * @return void
 */
function acfLoadSvgIcons($field)
{
	$icons = [
		'logo-header' => ['label' => 'Header Logo'],
		'logo-footer' => ['label' => 'Footer Logo'],
		'freight-icon' => ['label' => 'Freight'],
		'warehousing-icon' => ['label' => 'Warehousing'],
		'logistics-icon' => ['label' => 'Logistics'],
		'aust-owned' => ['label' => 'Aust-owned'],
		'trustworthy' => ['label' => 'Trustworthy'],
		'customized-3pl' => ['label' => 'Customised 3PL'],
		'end-to-end' => ['label' => 'End-to-end'],
		'committed' => ['label' => 'Committed'],
		'realiability' => ['label' => 'Realiability'],
		'industry' => ['label' => 'Industry'],
		'integrated' => ['label' => 'Integrated'],
		'scalability' => ['label' => 'Scalability'],
		'team' => ['label' => 'Team'],
		'enviro' => ['label' => 'Enviro'],
		'community' => ['label' => 'Community'],
		'professionalism' => ['label' => 'Professionalism'],
		'leadership' => ['label' => 'Leadership'],
		'innovation' => ['label' => 'Innovation'],
		'commitment' => ['label' => 'Commitment'],
		'sustainability' => ['label' => 'Sustainability'],
		'environmental' => ['label' => 'Environmental'],
		'on-time-delivery' => ['label' => 'On-time-delivery'],
		'optimization' => ['label' => 'Optimization'],
		'inbound' => ['label' => 'Inbound'],
		'put-away' => ['label' => 'Put-away'],
		'warehousing' => ['label' => 'Warehousing Small'],
		'pick-and-pack' => ['label' => 'Pick-and-pack'],
		'distribution' => ['label' => 'Distribution'],
		'thumb_up' => ['label' => 'Thumb_up'],
		'custom-orders' => ['label' => 'custom-orders'],
		'status-order' => ['label' => 'status-order'],
		'inventory' => ['label' => 'inventory'],
		'invoicing' => ['label' => 'invoicing'],
		'POD' => ['label' => 'POD'],
	];
	$choices = [];
	foreach ($icons as $key => $icon) {

		if (
			$icon['label'] == "Freight" ||
			$icon['label'] == "Warehousing" ||
			$icon['label'] == "Logistics"
		)
			$choices[$key] = '<div style="display: inline-flex; align-items: center; background: grey;"><img width="100" src="' . get_template_directory_uri() . '/images/svg/' . $key . '.svg' . '"> <div style="padding-left: 0.5rem">' . $icon['label'] . '</div></div>';
		else {
			$choices[$key] = '<div style="display: inline-flex; align-items: center;"><img width="20" src="' . get_template_directory_uri() . '/images/svg/' . $key . '.svg' . '"> <div style="padding-left: 0.5rem">' . $icon['label'] . '</div></div>';
		}
	}
	$field['choices'] = $choices;
	return $field;
}
add_action('acf/load_field/name=icon_svg', 'acfLoadSvgIcons');
add_action('acf/load_field/name=card1_icon_svg', 'acfLoadSvgIcons');
add_action('acf/load_field/name=card2_icon_svg', 'acfLoadSvgIcons');
add_action('acf/load_field/name=header_logo', 'acfLoadSvgIcons');
add_action('acf/load_field/name=footer_logo', 'acfLoadSvgIcons');



/**
 * Register ACF Windsor
 *
 * @return void
 */
function register_acf_windsor()
{
	\Windsor\Capsule\Manager::make()->register();
}
add_action('acf/init', 'register_acf_windsor');


/*

// Use this to add image previews of your flexi content modules to the selector
// useful if modules have similar names but different designs
// Take screenshots of the modules and link them up as background images in here
add_action('admin_head', 'lp_acf_flexi_previews');
function lp_acf_flexi_previews(){
	?>
	<style type="text/css">
		.acf-tooltip ul li a::before{
			content:'';
			display: block;
			width:200px;
			position: absolute;
			left:-220px;
			top:-5px;
			opacity: 0;
			height:100px;
			border: 2px #000 solid;
		}

		.acf-tooltip ul li a:hover:before{
			opacity: 1;
		}

		.acf-tooltip ul li a[data-layout="generic-content"]:before{
			background: url('<?= lp_theme_url(); ?>/images/acf-images/generic-content.png') no-repeat center/cover;
		}
	</style>
	<?php
}*/

// Append labels to Flexible Content layouts
/*function append_fc_labels($title, $fields, $layout, $i) {
	if($layout['name'] == 'anchor') {
		if($fields['value']) {
			// On load
			foreach($layout['sub_fields'] as $sf) {
				if($sf['name'] == 'id') {
					if(isset($fields['value'][$i][$sf['key']])) {
						$title .= ' - '.$fields['value'][$i][$sf['key']];
						break;
					}
				}
			}
		}
		else {
			// On AJAX update
			foreach($layout['sub_fields'] as $sf) {
				if($sf['name'] == 'id') {
					if(isset($_POST['value'][$sf['key']])) {
						$title .= ' - '.$_POST['value'][$sf['key']];
						break;
					}
				}
			}
		}
	}

	return $title;
}
add_filter('acf/fields/flexible_content/layout_title/name=content_sections', 'append_fc_labels', 10, 4);*/

// Add preset colours to acf colour picker
/*function lp_acf_colour_presets() {
	?>
	<script type="text/javascript">
		(function($) {
			acf.add_filter('color_picker_args', function( args, $field ){
				args.palettes = ['#A05799', '#672D6C', '#D0AA88', '#414241', '#30D9E5', '#F7F059', '#F17DB1']
				return args;
						
			});
		})(jQuery);	
	</script>
	<?php
}
add_action('acf/input/admin_footer', 'lp_acf_colour_presets');*/
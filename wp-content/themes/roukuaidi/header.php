<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php if (is_singular() && pings_open(get_queried_object())) : ?>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php endif; ?>

	<?php wp_head(); ?>

	<script type="text/javascript">
		var _ajaxurl = '<?= admin_url("admin-ajax.php"); ?>';
		var _pageid = '<?= get_the_ID(); ?>';
		var _imagedir = '<?php lp_image_dir(); ?>';
	</script>

</head>

<body <?php body_class('stretched'); ?>>

	<?php

	// This fixes an issue where wp_nav_menu applied the_title filter which causes WC and plugins to change nav menu labels
	print '<!--';
	the_title();
	print '-->';

	?>

	<div id="top"></div>
	<div id="wrapper">
		<header id="header">
			<div class="container">
				<div class="header_wrap">
					<a href="/">
						<img src="<?= get_field('header_logo', 'options')['url']; ?>" alt="">
					</a>
				</div>
			</div>


		</header>
		<main class="main">
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

					<nav id="nav" role="navigation" aria-label="Primary Menu"><a class="nav-opener" href="#"><span>Open</span></a>
						<div class="nav-drop">
							<?php

							wp_nav_menu(array(
								'depth' => 0,
								'container' => '',
								'theme_location' => 'header-menu',
							));

							?>
						</div>
					</nav>

					<span class="hphone">

						<a href="tel:<?= get_field('header_phone', 'options'); ?>">
							<img src="<?= get_template_directory_uri() . '/images/svg/phone.svg' ?>" alt="">
							<?= get_field('header_phone', 'options'); ?></a>
					</span>
					<?php

					$link = get_field('header_button', 'options');

					if ($link) :
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
					?>
						<a class="header_btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
					<?php endif; ?>
				</div>
			</div>


		</header>
		<main class="main">
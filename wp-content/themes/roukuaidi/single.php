<?php
the_post();
get_header();
?>

<section class="title-page-section">
	<div class="container">
		<h1><?php the_title(); ?></h1>
	</div>
</section>
<section class="info-persen-section">
	<div class="container md">
		<div class="image-holder">
			<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>
			<img src="<?php echo $image[0]; ?>" alt="image description">
		</div>
		<div class="text-box">
			<div class="contacts-person">
				<strong><?php the_title(); ?></strong>
				<div class="sub-row">
					<a href="tel:<?= get_field('tel_link'); ?>"><?= get_field('tel'); ?></a>
				</div>
				<div class="sub-row">
					<a href="tel:<?= get_field('fax_link'); ?>"><?= get_field('fax'); ?></a>
				</div>
				<div class="sub-row">
					<a href="mailto:<?= get_field('email'); ?>"><?= get_field('email'); ?></a>
				</div>
			</div>
			<strong class="description-title">AREAS OF EXPERTISE</strong>
			<div class="description-content">
				<?php if (get_field('expertise')) : ?>
					<?= get_field('expertise'); ?>

				<?php else : ?>
					<?php

					$terms = wp_get_post_terms($post->ID, 'barrister-expertise', array('fields' => 'all'));
					foreach ($terms as $term) {
						echo '<p>' . $term->name . '</p>';
					}
					?>
				<?php endif; ?>
			</div>



			<strong class="description-title">ADMISSIONS & APPOINTMENTS</strong>
			<div class="description-content">
				<?= get_field('admissions_appointments'); ?>
			</div>

			<strong class="description-title">BACKGROUND & EXPERIENCE</strong>
			<div class="description-content">
				<?= get_field('background_experience'); ?>
			</div>

			<a href="<?php echo home_url( '/barrister/' ); ?>" class="more-information">></a>
		</div>
	</div>
</section>

<?php get_footer(); ?>
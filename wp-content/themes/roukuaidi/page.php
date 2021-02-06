<?php
the_post();
get_header();
?>

<?php lp_theme_partial('/partials/flexible.php'); ?>
<?php the_content(); ?>
<?php get_footer(); ?>
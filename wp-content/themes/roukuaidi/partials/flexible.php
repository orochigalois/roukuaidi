<?php

$source = (isset($source) ? $source : null);
$field  = (isset($field) ? $field : 'flexible');

while(have_rows($field, $source)) {
	the_row();

	lp_theme_partial('/partials/flexible/'.get_row_layout().'.php');
}
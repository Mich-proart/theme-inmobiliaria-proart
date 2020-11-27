<?php
/**
 * Custom CPTs Functions
 *
 * @package fc_corporativa
 */



/* ------------- Custom Excerpt for the CPT */
function get_excerpt_cpts($description) {
	$new_description = get_field($description);
	$description_corta = mb_substr($new_description, 0, 107);

	$output = '';
	$output .= strip_tags($description_corta . '...'); // Devuelve: "Texto de plano"
	echo $output;
}

function get_excerpt_cpts_servicios($description) {
	$new_description = get_field($description);
	$description_corta = mb_substr($new_description, 0, 204);

	$output = '';
	$output .= strip_tags($description_corta . '...'); // Devuelve: "Texto de plano"
	echo $output;
}


function get_excerpt_cpts_inversiones($description) {
	$new_description = get_field($description);
	$description_corta = mb_substr($new_description, 0, 166);

	$output = '';
	$output .= strip_tags($description_corta . '...'); // Devuelve: "Texto de plano"
	echo $output;
}
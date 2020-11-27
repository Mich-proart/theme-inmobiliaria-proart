<?php
/**
 * Add ALT to images
 *
 * @package fc_corporativa
 */

/* ------------- Get ALT information from Wordpress */

function img_with_alt($custom_field) {

	global $post;
	$image_id = get_field($custom_field);
	$image_src = wp_get_attachment_image_src($image_id, 'full');
	$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);

	echo '<img class="img-fluid" src="' . $image_src[0] . '"
	alt="'. $image_alt . '">';
}
function img_with_alt_sub($custom_field) {

	global $post;
	$image_id = get_sub_field($custom_field);
	$image_src = wp_get_attachment_image_src($image_id, 'full');
	$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);

	echo '<img class="img-fluid" src="' . $image_src[0] . '"
	alt="'. $image_alt . '">';
}


function img_with_alt_featured() {

	global $post;
	$image_id = get_post_thumbnail_id( $post->ID );
	$image_src = wp_get_attachment_image_src($image_id, 'full');
	$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);

	echo '<img class="img-fluid" src="' . $image_src[0] . '"
	alt="'. $image_alt . '">';
}



function img_with_alt_page($custom_field, $page_id) {

	global $post;
	$image_id = get_field($custom_field, $page_id);
	$image_src = wp_get_attachment_image_src($image_id, 'full');
	$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);

	echo '<img class="img-fluid" src="' . $image_src[0] . '"
	alt="'. $image_alt . '">';
}


function img_with_alt_tax($custom_field, $page_id) {

	global $post;
	$image_id = get_field($custom_field, 'tipos-servicios_'. $page_id);
	$image_src = wp_get_attachment_image_src($image_id, 'full');
	$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);

	echo '<img class="img-fluid" src="' . $image_src[0] . '"
	alt="'. $image_alt . '">';
}
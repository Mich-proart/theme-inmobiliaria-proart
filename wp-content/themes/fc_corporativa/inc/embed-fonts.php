<?php
/**
 * Embed Fonts
 *
 * @package fc_corporativa
 */

/* ------------- Embed Google Fonts */
 function include_admin_font() {
 	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap' );
 }
 add_action( 'wp_enqueue_scripts', 'include_admin_font' );

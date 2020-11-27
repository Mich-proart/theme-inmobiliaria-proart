<?php
/**
 * Embed Scripts
 *
 * @package fc_corporativa
 */

/* ------------- Embed JS Scripts */
function include_scripts() {
  wp_enqueue_script ('popper', get_template_directory_uri() . '/dist/js/popper.min.js', false, '', true);
  wp_enqueue_script ('bs-js', get_template_directory_uri() . '/dist/js/bootstrap.min.js', array('jquery'), '', true);
  wp_enqueue_script ('slick-js', get_template_directory_uri() . '/dist/js/slick.min.js', array('jquery'), '', true);
  wp_enqueue_script ('select2-js', get_template_directory_uri() . '/dist/js/select2.min.js', array('jquery'), '', true);
  wp_enqueue_script('skip-link-focus-fix', get_template_directory_uri() . '/dist/js/skip-link-focus-fix.js', array(), '20151215', true );
  wp_enqueue_script ('fc-init', get_template_directory_uri() . '/dist/js/init.js', array('jquery'), '', true);
  wp_enqueue_script ('busqueda-inmuebles', get_template_directory_uri() . '/dist/js/busqueda-inmuebles.js', array('jquery'), '', true);
  wp_enqueue_script ('dynamic-fields', get_template_directory_uri() . '/dist/js/dynamic-fields.js', array('jquery'), '', true);
}
add_action( 'wp_enqueue_scripts', 'include_scripts' );
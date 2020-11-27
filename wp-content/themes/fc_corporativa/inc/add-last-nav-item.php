<?php
/**
 * Add last nav item para menu movil
 *
 * @package fc_corporativa
 */



function add_last_nav_item($items, $args) {
	if( $args->theme_location == 'primary' ) {
		if (pll_current_language() == 'es') {
			$url = cpts_translation_url('ca');
			/* $form = custom_get_search_form(); */
		return $items .= (
		'<div class="d-lg-none d-block">
		<img src="'. get_template_directory_uri() .'/img/decorativo-blanco.png" class="custom-logo phone" alt="logo-decorativo-blanco" height="auto">

		<div class="es-ca d-flex justify-content-center align-items-center mt-5">
            <span class="fs-1 fw-400 color-coral text-uppercase">
                ES
            </span>
            <span class="px-2">|</span>
            <a class="fs-1 fw-400 text-uppercase color-white" href="'. $url .'">
                CA
            </a>

        </div>
		
		</div>');
		}
		else if (pll_current_language() == 'ca') {
			$url = cpts_translation_url('es');
		return $items .= (
		'<div class="d-lg-none d-block">
		<img src="'. get_template_directory_uri() .'/img/decorativo-blanco.png" class="custom-logo phone" alt="logo-decorativo-blanco" height="auto">
		
		<div class="es-ca d-flex justify-content-center align-items-center mt-5">
        	<a class="fs-1 fw-400 text-uppercase color-white" href="'. $url .'">
                ES
            </a>
        	<span class="px-2">|</span>
            <span class="fs-1 fw-400 color-coral text-uppercase">
                CA
            </span>
        </div>


		</div>');
		}
	}
	else {
		return $items;
	}
}
add_filter('wp_nav_menu_items','add_last_nav_item', 10, 2);
<?php
/**
 * Get Translation URL
 *
 * @package fc_corporativa
 */

/* ------------- Pages Only */
function pages_translation_url($selected_lang) {
	if (!is_404()) {
		if (is_page()) {
			if (!function_exists('pll_the_languages')) return;
			$languages = pll_the_languages(array(
				'display_names_as' => 'slug',
				'hide_if_no_translation' => 1,
				'raw' => true,
				'hide_if_empty' => 1
			));
			foreach($languages as $language) {
				$current = $language['current_lang'];
				$slug = $language['slug'];
				if (!$current) {
					if ($selected_lang == $slug) {
						$url = $language['url'];
						return $url;
					}
				}
			}
			die();
		}
	} else {
		$languages = pll_the_languages(array(
			'display_names_as' => 'slug',
			'hide_if_no_translation' => 1,
			'raw' => true,
			'hide_if_empty' => 1
		));

		foreach($languages as $language) {

			$current = $language['current_lang'];
			$slug = $language['slug'];
			if (!$current) {
				if ($selected_lang == $slug) {
					$url = get_site_url().
					'/'.$slug.
					'/404.php';
					return $url;
				}
			}
		}
		die();
	}
}

/* ------------- Pages + Posts - Without CPTs */
function mixed_translation_url($selected_lang) {
	if (!is_404()) {
		if (!function_exists('pll_the_languages')) return;
		$languages = pll_the_languages(array(
			'display_names_as' => 'slug',
			'hide_if_no_translation' => 1,
			'raw' => true,
			'hide_if_empty' => 1
		));
		foreach($languages as $language) {
			$current = $language['current_lang'];
			$slug = $language['slug'];
			if (!$current) {
				if ($selected_lang == $slug) {
					$url = $language['url'];
					return $url;
				}
			}
		}
		die();
	} else {
		$languages = pll_the_languages(array(
			'display_names_as' => 'slug',
			'hide_if_no_translation' => 1,
			'raw' => true,
			'hide_if_empty' => 1
		));

		foreach($languages as $language) {

			$current = $language['current_lang'];
			$slug = $language['slug'];
			if (!$current) {
				if ($selected_lang == $slug) {
					$url = get_site_url().
					'/'.$slug.
					'/404.php';
					return $url;
				}
			}
		}
		die();
	}
}


/* ------------- CPTs + Pages + Posts */
function cpts_translation_url($selected_lang) {

if ( !is_404() ) {
	if (!empty($_GET["tipo-operacion"])) {
		$tipo_operacion_slug = htmlspecialchars($_GET["tipo-operacion"]);
	}
	global $post;
	$current_post_type = $post->post_type;
	if (is_page() || $current_post_type == 'propiedades' || $current_post_type == 'inversiones' ) {
			if ( ! function_exists( 'pll_the_languages' ) ) return;
			$languages = pll_the_languages( array(
				'display_names_as'       => 'slug',
				'hide_if_no_translation' => 1,
				'raw'                    => true,
				'hide_if_empty'					=> 1
			) );

			foreach ( $languages as $language ) {

				$current = $language['current_lang'];
				$slug = $language['slug'];
				if ( ! $current ) {
					if ($selected_lang == $slug) {
						$url = $language['url'];

						if (basename($url)=='resultado-busqueda') {
							if ($tipo_operacion_slug == 'lloguer') {
								$tipo_operacion_slug = 'alquiler';
							}
							$url = $url . '?tipo-operacion=' . $tipo_operacion_slug;
							return $url;
						}
						elseif (basename($url)=='resultat-cerca') {
							if ($tipo_operacion_slug == 'alquiler') {
								$tipo_operacion_slug = 'lloguer';
							}
							$url = $url . '?tipo-operacion=' . $tipo_operacion_slug;
							return $url;
						}
						else {
							return $url;
						}
					}
				}
			}
			die();
	}
}
else {
	if ( ! function_exists( 'pll_the_languages' ) ) return;
	$languages = pll_the_languages( array(
		'display_names_as'       => 'slug',
		'raw'                    => true,
		'hide_if_empty'					=> 1
	) );
	foreach ( $languages as $language ) {
		$current = $language['current_lang'];
		$slug = $language['slug'];
		if ( ! $current ) {
			if ($selected_lang == $slug) {
				$url = get_site_url() . '/' . $slug .'/404.php';
				return $url;
			}
		}
	}
	die();
}
}

/* ------------- Translation for cpts + pages + 404 */
function multiple_cpts_translation_url($selected_lang) {
	if (!is_404()) {
		global $post;
		$current_post_type = $post->post_type;
		if (is_page() || $current_post_type == 'servicios' || $current_post_type == 'proyectos') {
			if (!function_exists('pll_the_languages')) return;
			$languages = pll_the_languages(array(
				'display_names_as' => 'slug',
				'hide_if_no_translation' => 1,
				'raw' => true,
				'hide_if_empty' => 1
			));
			foreach($languages as $language) {
				$current = $language['current_lang'];
				$slug = $language['slug'];
				if (!$current) {
					if ($selected_lang == $slug) {
						$url = $language['url'];
						return $url;
					}
				}
			}
			die();
		}
	} else {
		if (!function_exists('pll_the_languages')) return;
		if (pll_current_language() == 'es') {
			$url = get_site_url().
			'/ca/404.php';
			return $url;
		} else if (pll_current_language() == 'ca') {
			$url = get_site_url().
			'/404.php';
			return $url;
		}
		die();
	}
}
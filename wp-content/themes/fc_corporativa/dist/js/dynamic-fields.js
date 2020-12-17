/* Custom JS for
 *
 * Carga de zonas busqueda home
 *
 *
 */

jQuery(document).ready(function ($) {


	// Get poblacion value
	$('#search-poblacion').on('change', function () {
		var poblacion_value;
		poblacion_value = $('#search-poblacion option:selected').val();
		var origin = window.location.origin;
		var pathname = window.location.pathname.split('/')[1];
		if (pathname === 'theme-inmobiliaria-proart') {
			origin = origin + '/theme-inmobiliaria-proart'
		}
		var ajax_url = '/wp-admin/admin-ajax.php';
		// Send poblacion value to back-end
		$.ajax({
			url: origin + ajax_url,
			type: 'post',
			data: {
				action: 'loadzone',
				poblacion_value: poblacion_value
			},
			success: function (data) {
				$('#zonas-poblacion').html(data);
			}

		});
		return false;


	});


	// Get precio value
	$('#tipo_operacion_1').on('change', function () {
		var tipo_operacion_2;
		tipo_operacion_2 = $('#tipo_operacion_1 option:selected').val();
		var origin = window.location.origin;
		var pathname = window.location.pathname.split('/')[1];
		if (pathname === 'theme-inmobiliaria-proart') {
			origin = origin + '/theme-inmobiliaria-proart'
		}
		var ajax_url = '/wp-admin/admin-ajax.php';
		// Send precio value to back-end
		$.ajax({
			url: origin + ajax_url,
			type: 'post',
			data: {
				action: 'loadprecio',
				tipo_operacion_2: tipo_operacion_2
			},
			success: function (data) {
				$('#cambio-precio').html(data);
				$('#precio').select2({});
			}

		});
		return false;


	});

});
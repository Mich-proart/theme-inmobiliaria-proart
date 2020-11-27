/* Custom JS for
 *
 * Teacher Search Filter
 *
 *
 */

(function ($) {
	$(window).bind("pageshow", function () {
		$('#zonas-poblacion').val('');
	});
})(jQuery);

jQuery(document).ready(function ($) {



	$('#buscador_resultados').on('click', function (e) {
		e.preventDefault();
		$('#respuesta_filtro .row').html('');
		var filter = $('#form-filtro');
		var tipo_operacion_1 = $('#tipo_operacion_1 option:selected').val();
		var tipo_operacion_1_txt = $('#tipo_operacion .select2-selection__rendered').text().toLowerCase();
		var tipo_propiedad_1 = $('#tipo_propiedad_1 option:selected').val();
		var poblacion_1 = $('#poblacion_1 option:selected').val();
		var zona_poblacion = $('#zonas-poblacion option:selected').val();
		var precio = $('#precio option:selected').val();
		var refe = $('#refe').val();
		var idioma = $('#idioma').val();
		var origin = window.location.origin;
		var pathname = window.location.pathname.split('/')[1];
		if (pathname === 'aincasa') {
			origin = origin + '/aincasa'
		}


		$.ajax({
			url: filter.attr('action'),
			data: {
				action: 'searchfilter',
				tipo_operacion_1: tipo_operacion_1,
				tipo_propiedad_1: tipo_propiedad_1,
				poblacion_1: poblacion_1,
				zona_poblacion: zona_poblacion,
				precio: precio,
				refe: refe,
				idioma: idioma,
			},
			type: filter.attr('method'), // POST
			success: function (data) {
				$('#respuesta_filtro').html(data);
					
				if (idioma == 'es') {
					processAjaxData(data, origin + '/resultado-busqueda/?tipo-operacion=' + tipo_operacion_1_txt);
				}
				else if(idioma == 'ca'){
					processAjaxData(data, origin + '/ca/resultat-cerca/?tipo-operacion=' + tipo_operacion_1_txt);
				}
				
				$('.galeria-resultados').slick({
					infinite: true,
					speed: 300,
					autoplaySpeed: 3500,
					autoplay: true,
					slidesToScroll: 1,
					slidesToShow: 1,
					arrows: true,
					fade: false,
					dots: false,
					responsive: [{
						breakpoint: 992,
						settings: {
							arrows: true,
							slidesToShow: 1,
							slidesToScroll: 1
						}
					}]
				});
				$('.operacion').text(tipo_operacion_1_txt);
			}
		});
		return false;
	});

	$('#buscador_home').on('click', function (e) {
		e.preventDefault();
		var tipo_operacion_1_txt = $('#tipo_operacion .select2-selection__rendered').text().toLowerCase();
		var form_url = $('#home_search_form').attr('action');
		var updated_url = form_url + '/?tipo-operacion=' + tipo_operacion_1_txt;
		$('#home_search_form').attr('action', updated_url);
		$('#home_search_form').submit();
		return false;
	});

	$('.zona-alquiler').on('click', function (e) {
		e.preventDefault();
		$('#home_alquiler_zona_form').attr('action');
		$(this).find('#home_alquiler_zona_form').submit();
		return false;
	});

	$('.zona-compra').on('click', function (e) {
		$('#home_compra_zona_form').attr('action');
		$(this).find('#home_compra_zona_form').submit();
		return false;
	});

	$('#submit-alquiler').on('click', function (e) {
		$('#home_alquiler').attr('action');
		$(this).find('#home_alquiler').submit();
		return false;
	});

	$('#submit-comprar').on('click', function (e) {
		$('#home_comprar').attr('action');
		$(this).find('#home_comprar').submit();
		return false;
	});

	function processAjaxData(response, urlPath) {
		$('#main_resultado').html(response);
		window.history.pushState({
			"html": response.html
		}, "", urlPath);
	}


	//envio de formulario ordenar

	$('#select_orden').on('change', function (e) {
		e.preventDefault();

		var filter = $('#form-filtro');
		var tipo_operacion_1 = $('#tipo_operacion_1 option:selected').val();
		var tipo_operacion_1_txt = $('#tipo_operacion .select2-selection__rendered').text().toLowerCase();
		var tipo_propiedad_1 = $('#tipo_operacion_1 option:selected').val();
		var poblacion_1 = $('#poblacion_1 option:selected').val();
		var zona_poblacion = $('#zonas-poblacion option:selected').val();
		var precio = $('#precio option:selected').val();
		var refe = $('#refe').val();
		var idioma_ordenar = $('#idioma_ordenar').val();
		var selected_orden = $('#select_orden option:selected').val();
		var origin = window.location.origin;
		var pathname = window.location.pathname.split('/')[1];

		$('#respuesta_filtro .row').html('');

		if (pathname === 'aincasa') {
			origin = origin + '/aincasa'
		}
		//var precio = $('#filter_precio select option:selected').val();

		$.ajax({
			url: filter.attr('action'),
			data: {
				action: 'searchfilter',
				tipo_operacion_1: tipo_operacion_1,
				tipo_propiedad_1: tipo_propiedad_1,
				poblacion_1: poblacion_1,
				zona_poblacion: zona_poblacion,
				precio: precio,
				refe: refe,
				selected_orden: selected_orden,
				idioma_ordenar: idioma_ordenar,
			},
			type: filter.attr('method'), // POST
			success: function (data) {
				$('#respuesta_filtro').html(data);
				if (idioma_ordenar == 'es') {
					processAjaxData(data, origin + '/resultado-busqueda/?tipo-operacion=' + tipo_operacion_1_txt);
				}
				else if(idioma_ordenar == 'ca'){
					processAjaxData(data, origin + '/ca/resultat-cerca/?tipo-operacion=' + tipo_operacion_1_txt);
				}
				$('.galeria-resultados').slick({
					infinite: true,
					speed: 300,
					autoplaySpeed: 3500,
					autoplay: true,
					slidesToScroll: 1,
					slidesToShow: 1,
					arrows: true,
					fade: false,
					dots: false,
					responsive: [{
						breakpoint: 992,
						settings: {
							arrows: true,
							slidesToShow: 1,
							slidesToScroll: 1
						}
					}]
				});
			}
		});
		return false;
	});

});
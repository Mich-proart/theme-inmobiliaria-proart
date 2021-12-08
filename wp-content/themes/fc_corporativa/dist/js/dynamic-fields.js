/* Custom JS for
 *
 * Carga de zonas busqueda home
 *
 *
 */

jQuery(document).ready(function ($) {
		
    // 1. Cargar tipo de operacion con propiedades

    var origin = window.location.origin;
    var pathname = window.location.pathname.split('/')[1];
    if (pathname === 'servinghouse') {
        origin += '/servinghouse'
    }
    var ajax_url = '/wp-admin/admin-ajax.php'

    if (!window.location['href'].includes('resultado-busqueda')) {
        $.ajax({
            url: origin + ajax_url,
            type: 'post',
            data: {
                'action' : 'loadOperation',
            },
            success: function (data) {
                $('#tipo_operacion_1').append(data);
            }
        });
    }

    // 2. Cargar tipos de propiedades con propiedades segun tipo de operacion
	$('#tipo_operacion_1').on('change', function () {

        $("#tipo_propiedad_1").empty().append('<option value>Tipo de propiedad</option>')
        $("#poblacion_1").empty().append('<option value>Municipio</option>')
        $("#zonas-poblacion").empty().append('<option value>Zona</option>')
        
		var tipo_operacion_value = $('#tipo_operacion_1 option:selected').val();

		var origin = window.location.origin;
		var pathname = window.location.pathname.split('/')[1];
        if (pathname === 'servinghouse') {
            origin += '/servinghouse'
        }
		var ajax_url = '/wp-admin/admin-ajax.php'

		// Send poblacion value to back-end
		$.ajax({
			url: origin + ajax_url,
			type: 'post',
			data: {
				'action' : 'loadPropertyType',
				'tipo_operacion_value' : tipo_operacion_value
			},
			success: function (data) {
				$('#tipo_propiedad_1').html(data);
			}

		});
		return false;
	});

    $('#tipo_operacion_2').on('change', function () {

        
        $("#poblacion_2").empty().append('<option value>Elija tipo de propiedad</option>')
        $("#zonas-poblacion").empty().append('<option value>Elija municipio</option>')
        
		var tipo_operacion_value = $('#tipo_operacion_2 option:selected').val();

		var origin = window.location.origin;
		var pathname = window.location.pathname.split('/')[1];
        if (pathname === 'servinghouse') {
            origin += '/servinghouse'
        }
		var ajax_url = '/wp-admin/admin-ajax.php'

		// Send poblacion value to back-end
		$.ajax({
			url: origin + ajax_url,
			type: 'post',
			data: {
				'action' : 'loadPropertyType',
				'tipo_operacion_value' : tipo_operacion_value
			},
			success: function (data) {
				$('#tipo_propiedad_2').html(data);
			}

		});
		return false;
	});

    // 3. Cargar municipios con propiedades segun tipo de operacion y tipo de propiedad
	$('#tipo_propiedad_1').on('change', function () {

        $("#poblacion_1").empty().append('<option value>Municipio</option>')
        $("#zonas-poblacion").empty().append('<option value>Zona</option>')

        var tipo_operacion = $('#tipo_operacion_1 option:selected').val();
		var tipo_propiedad = $('#tipo_propiedad_1 option:selected').val();

		var origin = window.location.origin;
		var pathname = window.location.pathname.split('/')[1];
        if (pathname === 'servinghouse') {
            origin += '/servinghouse'
        }
		var ajax_url = '/wp-admin/admin-ajax.php'

		// Send poblacion value to back-end
		$.ajax({
			url: origin + ajax_url,
			type: 'post',
			data: {
				'action' : 'loadMunicipio',
                'tipo_operacion' : tipo_operacion,
                'tipo_propiedad' : tipo_propiedad
			},
			success: function (data) {
				$('#poblacion_1').html(data);
			}

		});
		return false;
	});
    

	// Cargar zonas segun municipio y propiedades disponibles
    $('#poblacion_1').on('change', function () {

        $("#zonas-poblacion").empty().append('<option value>Zona</option>')

        var tipo_operacion = $('#tipo_operacion_1 option:selected').val();
		var tipo_propiedad = $('#tipo_propiedad_1 option:selected').val();
		var poblacion_value = $('#poblacion_1 option:selected').val();

		var origin = window.location.origin;
		var pathname = window.location.pathname.split('/')[1];
        if (pathname === 'servinghouse') {
            origin += '/servinghouse'
        }
		var ajax_url = '/wp-admin/admin-ajax.php'

		// Send poblacion value to back-end
		$.ajax({
			url: origin + ajax_url,
			type: 'post',
			data: {
				'action' : 'loadzone',
				'tipo_operacion' : tipo_operacion,
                'tipo_propiedad' : tipo_propiedad,
                'poblacion_value' : poblacion_value
			},
			success: function (data) {
				$('#zonas-poblacion').html(data);
			}

		});
		return false;

	});


	// Get precio value
	$('#tipo_operacion_1').on('change', function () {

		var tipo_operacion_2 = $('#tipo_operacion_1 option:selected').val();
        var origin = window.location.origin;
		var pathname = window.location.pathname.split('/')[1];
        if (pathname === 'servinghouse') {
            origin += '/servinghouse'
        }
		var ajax_url = '/wp-admin/admin-ajax.php'

		// Send poblacion value to back-end
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

    /////////////////////////////////////////////////////////////////////////////////////////////7


    // 2. Cargar tipos de propiedades con propiedades segun tipo de operacion
	$('#tipo_operacion_2').on('change', function () {

        $("#poblacion_1").empty().append('<option value>Municipio</option>')
        $("#zonas-poblacion").empty().append('<option value>Zona</option>')
        
		var tipo_operacion_value = $('#tipo_operacion_2 option:selected').val();
        console.log(tipo_operacion_value)
		var origin = window.location.origin;
		var pathname = window.location.pathname.split('/')[1];
        if (pathname === 'servinghouse') {
            origin += '/servinghouse'
        }
		var ajax_url = '/wp-admin/admin-ajax.php'

		// Send poblacion value to back-end
		$.ajax({
			url: origin + ajax_url,
			type: 'post',
			data: {
				'action' : 'loadPropertyType',
				'tipo_operacion_value' : tipo_operacion_value
			},
			success: function (data) {
				$('#tipo_propiedad_2').html(data);
			}

		});
		return false;
	});

});
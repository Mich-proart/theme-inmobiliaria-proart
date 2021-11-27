<?php
/**
 * Handle Dynamic Fields for Location
 *
 * @package Aincasa
 */

/* ------------- Dynamic Load Operation type Field */

function loadOperationType() {

    ?>

    <option value><?php pll_e('Indiferente'); ?></option>

    <?php

        $tipos_operacion = get_terms(
            array(
                'taxonomy' => 'tipo-operacion',
                'hide_empty' => true
            )
        );

        $array_ids_tipos_operacion = array();

        foreach($tipos_operacion as $tipo_operacion) {
            array_push($array_ids_tipos_operacion, $tipo_operacion->term_id);
        }
        
        foreach($array_ids_tipos_operacion as $id_tipo_operacion) {
            
            $args_propiedades = array(
                'post_type' => 'propiedades',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'tipo-operacion',
                        'field' => 'term_id',
                        'terms' => $id_tipo_operacion
                    )
                )
            );

            $query_propiedades = new WP_Query($args_propiedades);

            if ($query_propiedades->have_posts()) { $query_propiedades->the_post(); ?>
                
                <option value="<?php echo $id_tipo_operacion; ?>"><?php echo get_term($id_tipo_operacion)->name; ?></option>

            <?php }
        }
}

add_action('wp_ajax_loadOperation', 'loadOperationType');
add_action('wp_ajax_nopriv_loadOperation', 'loadOperationType');

/* ------------- Dynamic Load Property type Field */

function loadPropertyType() {

    $id_tipo_operacion = $_POST['tipo_operacion_value']; ?>

    <option value><?php pll_e('Tipo de propiedad'); ?></option>
    <option value><?php pll_e('Indiferente'); ?></option>

    <?php

        $array_tipo_propiedad_con_propiedades = array();

        $tipos_propiedad = get_terms(
            array(
                'taxonomy' => 'tipo-propiedad',
                'hide_empty' => true
            )
        );

        foreach ($tipos_propiedad as $tipo_propiedad_term) {

            // empty == 'Indiferente' || 'Tipo de operación'
            if (empty($id_tipo_operacion)) {

                $args_propiedades = array(
                    'post_type' => 'propiedades',
                    'posts_per_page' => -1,
                    'tax_query' => array(  
                        array(
                            'taxonomy' => 'tipo-propiedad',
                            'field' => 'term_id',
                            'terms' => $tipo_propiedad_term->term_id
                        ),
                    )
                );
            } else {
                
                $args_propiedades = array(
                    'post_type' => 'propiedades',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'tipo-operacion',
                            'field' => 'term_id',
                            'terms' => $id_tipo_operacion
                        ),
                        array(
                            'taxonomy' => 'tipo-propiedad',
                            'field' => 'term_id',
                            'terms' => $tipo_propiedad_term->term_id
                        ),
                    )
                );
            }

            $propiedades = new WP_Query($args_propiedades);

            if ($propiedades->have_posts()) {
                array_push($array_tipo_propiedad_con_propiedades, $tipo_propiedad_term);
            }
        }

        foreach ($array_tipo_propiedad_con_propiedades as $tipo_propiedad_con_propiedades) { ?>
            <option value="<?php echo $tipo_propiedad_con_propiedades->term_id; ?>"><?php echo $tipo_propiedad_con_propiedades->name; ?></option>
        <?php } ?>

<?php }

add_action('wp_ajax_loadPropertyType', 'loadPropertyType');
add_action('wp_ajax_nopriv_loadPropertyType', 'loadPropertyType');

/* ------------- Dynamic Load town type Field */

function loadMunicipio() {

    $id_tipo_operacion = $_POST['tipo_operacion'];
    $id_tipo_propiedad = $_POST['tipo_propiedad']; ?>

    <option value><?php pll_e('Municipio'); ?></option>
    <option value><?php pll_e('Indiferente'); ?></option>

    <?php

        $array_municipios_con_propiedades = array();

        $args_municipios = array(
            'post_type' => 'poblacion',
            'posts_per_page' => -1
        );

        $municipios = new WP_Query($args_municipios);

        if ($municipios->have_posts()) {
            while ($municipios->have_posts()) { $municipios->the_post();
                $id_municipio = get_the_ID();

                if (empty($id_tipo_operacion) && empty($id_tipo_propiedad)) {

                    $args_propiedades = array(
                        'post_type' => 'propiedades',
                        'posts_per_page' => -1,
                        'meta_query' => array(
                            array(
                                'key' => 'poblacion',
                                'value' => $id_municipio,
                                'compare' => '=' 
                            )
                        )
                    );
                } elseif (empty($id_tipo_operacion) && !empty($id_tipo_propiedad)) {

                    $args_propiedades = array(
                        'post_type' => 'propiedades',
                        'posts_per_page' => -1,
                        'meta_query' => array(
                            array(
                                'key' => 'poblacion',
                                'value' => $id_municipio,
                                'compare' => '=' 
                            )
                        ),
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'tipo-propiedad',
                                'field' => 'term_id',
                                'terms' => $id_tipo_propiedad
                            )
                        )
                    );
                } elseif (!empty($id_tipo_operacion) && empty($id_tipo_propiedad)) {

                    $args_propiedades = array(
                        'post_type' => 'propiedades',
                        'posts_per_page' => -1,
                        'meta_query' => array(
                            array(
                                'key' => 'poblacion',
                                'value' => $id_municipio,
                                'compare' => '=' 
                            )
                        ),
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'tipo-operacion',
                                'field' => 'term_id',
                                'terms' => $id_tipo_operacion
                            )
                        )
                    );
                } else {

                    $args_propiedades = array(
                        'post_type' => 'propiedades',
                        'posts_per_page' => -1,
                        'meta_query' => array(
                            array(
                                'key' => 'poblacion',
                                'value' => $id_municipio,
                                'compare' => '=' 
                            )
                        ),
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'tipo-operacion',
                                'field' => 'term_id',
                                'terms' => $id_tipo_operacion
                            ),
                            array(
                                'taxonomy' => 'tipo-propiedad',
                                'field' => 'term_id',
                                'terms' => $id_tipo_propiedad
                            )
                        )
                    );
                }

                $propiedades = new WP_Query($args_propiedades);

                if ($propiedades->have_posts()) {
                    array_push($array_municipios_con_propiedades, $id_municipio);
                }
            }
        }

        $args_municipios = array(
            'post_type' => 'poblacion',
            'post__in' => $array_municipios_con_propiedades,
        );
        
        $municipios_con_propiedades = new WP_Query( $args_municipios );
        
        if ($municipios_con_propiedades->have_posts()) {
            while ($municipios_con_propiedades->have_posts()) { $municipios_con_propiedades->the_post();
                $id_municipio = get_the_ID(); ?>
                
                <option value="<?php echo $id_municipio; ?>"><?php the_title(); ?></option>
            
            <?php }
        }
}

add_action('wp_ajax_loadMunicipio', 'loadMunicipio');
add_action('wp_ajax_nopriv_loadMunicipio', 'loadMunicipio');

/* ------------- Dynamic Load zone Field */

function loadzone() {

    $id_tipo_operacion = $_POST['tipo_operacion'];
    $id_tipo_propiedad = $_POST['tipo_propiedad'];
    $id_poblacion = $_POST['poblacion_value'];
    
    ?>

    <option value><?php pll_e('Zona'); ?></option>
    <option value><?php pll_e('Indiferente'); ?></option>

    <?php

        $array_zonas_con_propiedades = array();

        // Cogemos todas las zonas
        $args_zonas = array(
            'post_type' => 'zona',
            'posts_per_page' => -1,
        );
        $zonas = new WP_Query( $args_zonas );

        if ($zonas->have_posts()) {
            
            while ($zonas->have_posts()) { $zonas->the_post();

                $id_zona = get_the_ID();

                // 0 0 0
                if (empty($id_tipo_operacion) && empty($id_tipo_propiedad) && empty($id_poblacion)) {
                    
                    $args_propiedades = array(
                        'post_type' => 'propiedades',
                        'posts_per_page' => -1,
                        'meta_query' => array(
                            array(
                                'key'     => 'zona',
                                'value'   => $id_zona,
                                'compare' => '=',
                            )
                        )
                    );
                // 0 0 1
                } elseif (empty($id_tipo_operacion) && empty($id_tipo_propiedad) && !empty($id_poblacion)) {

                    $args_propiedades = array(
                        'post_type' => 'propiedades',
                        'posts_per_page' => -1,
                        'meta_query' => array(
                            array(
                                'key'     => 'zona',
                                'value'   => $id_zona,
                                'compare' => '=',
                            ),
                            array(
                                'key'     => 'poblacion',
                                'value'   => $id_poblacion,
                                'compare' => '=',
                            )
                        )
                    );
                // 0 1 0
                } elseif (empty($id_tipo_operacion) && !empty($id_tipo_propiedad) && empty($id_poblacion)) {

                    $args_propiedades = array(
                        'post_type' => 'propiedades',
                        'posts_per_page' => -1,
                        'meta_query' => array(
                            array(
                                'key'     => 'zona',
                                'value'   => $id_zona,
                                'compare' => '=',
                            )
                        ),
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'tipo-propiedad',
                                'field' => 'term_id',
                                'terms' => $id_tipo_propiedad
                            )
                        )
                    );
                // 0 1 1
                } elseif (empty($id_tipo_operacion) && !empty($id_tipo_propiedad) && !empty($id_poblacion)) {

                    $args_propiedades = array(
                        'post_type' => 'propiedades',
                        'posts_per_page' => -1,
                        'meta_query' => array(
                            array(
                                'key'     => 'zona',
                                'value'   => $id_zona,
                                'compare' => '=',
                            ),
                            array(
                                'key'     => 'poblacion',
                                'value'   => $id_poblacion,
                                'compare' => '=',
                            )
                        ),
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'tipo-propiedad',
                                'field' => 'term_id',
                                'terms' => $id_tipo_propiedad
                            )
                        )
                    );
                // 1 0 0
                } elseif (!empty($id_tipo_operacion) && empty($id_tipo_propiedad) && empty($id_poblacion)) {
                    
                    $args_propiedades = array(
                        'post_type' => 'propiedades',
                        'posts_per_page' => -1,
                        'meta_query' => array(
                            array(
                                'key'     => 'zona',
                                'value'   => $id_zona,
                                'compare' => '=',
                            )
                        ),
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'tipo-operacion',
                                'field' => 'term_id',
                                'terms' => $id_tipo_operacion
                            )
                        )
                    );
                // 1 0 1
                } elseif (!empty($id_tipo_operacion) && empty($id_tipo_propiedad) && !empty($id_poblacion)) {

                    $args_propiedades = array(
                        'post_type' => 'propiedades',
                        'posts_per_page' => -1,
                        'meta_query' => array(
                            array(
                                'key'     => 'zona',
                                'value'   => $id_zona,
                                'compare' => '=',
                            ),
                            array(
                                'key'     => 'poblacion',
                                'value'   => $id_poblacion,
                                'compare' => '=',
                            )
                        ),
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'tipo-operacion',
                                'field' => 'term_id',
                                'terms' => $id_tipo_operacion
                            )
                        )
                    );
                // 1 1 0
                } elseif (!empty($id_tipo_operacion) && !empty($id_tipo_propiedad) && empty($id_poblacion)) {
                    
                    $args_propiedades = array(
                        'post_type' => 'propiedades',
                        'posts_per_page' => -1,
                        'meta_query' => array(
                            array(
                                'key'     => 'zona',
                                'value'   => $id_zona,
                                'compare' => '=',
                            )
                        ),
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'tipo-operacion',
                                'field' => 'term_id',
                                'terms' => $id_tipo_operacion
                            ),
                            array(
                                'taxonomy' => 'tipo-propiedad',
                                'field' => 'term_id',
                                'terms' => $id_tipo_propiedad
                            )
                        )
                    );
                // 1 1 1
                } else {
                    
                    $args_propiedades = array(
                        'post_type' => 'propiedades',
                        'posts_per_page' => -1,
                        'meta_query' => array(
                            array(
                                'key'     => 'zona',
                                'value'   => $id_zona,
                                'compare' => '=',
                            ),
                            array(
                                'key'     => 'poblacion',
                                'value'   => $id_poblacion,
                                'compare' => '=',
                            )
                        ),
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'tipo-operacion',
                                'field' => 'term_id',
                                'terms' => $id_tipo_operacion
                            ),
                            array(
                                'taxonomy' => 'tipo-propiedad',
                                'field' => 'term_id',
                                'terms' => $id_tipo_propiedad
                            )
                        )
                    );
                }
                
                $propiedades = new WP_Query( $args_propiedades );
                if ($propiedades->have_posts()) {
                    // Añadimos al array los id's de aquellas zonas que tienen propiedades asociadas
                    array_push($array_zonas_con_propiedades, $id_zona);
                }
            }
        }

        $args_zonas = array(
            'post_type' => 'zona',
            'post__in' => $array_zonas_con_propiedades,
        );
        
        $zonas_query = new WP_Query( $args_zonas );
        
        if ($zonas_query->have_posts()) {
            while ($zonas_query->have_posts()) { $zonas_query->the_post();
                $zona_id = get_the_ID(); ?>
                
                <option value="<?php echo $zona_id; ?>"><?php the_title(); ?></option>
            
            <?php }
        } ?>

    <?php
    die();
}

add_action('wp_ajax_loadzone', 'loadzone');
add_action('wp_ajax_nopriv_loadzone', 'loadzone');


add_action('wp_ajax_loadprecio', 'loadprecio');
add_action('wp_ajax_nopriv_loadprecio', 'loadprecio');
function loadprecio() {
$tipo_operacion_2 = $_POST['tipo_operacion_2'];
?>

<label class="color-coral ml-3">Precio maximo</label>
<select class="form-control" id="precio" name="precio">
    <option value="5000000"><?php pll_e('Indiferente'); ?></option>
    <?php if ($tipo_operacion_2 == 8 || $tipo_operacion_2 == 36) { ?>
    <option value="50000">50.000 €</option>
    <option value="100000">100.000 €</option>
    <option value="150000">150.000 €</option>
    <option value="200000">200.000 €</option>
    <option value="250000">250.000 €</option>
    <option value="300000">300.000 €</option>
    <option value="350000">350.000 €</option>
    <option value="400000">400.000 €</option>
    <option value="450000">450.000 €</option>
    <option value="500000">500.000 €</option>
    <option value="600000">600.000 €</option>
    <option value="700000">700.000 €</option>
    <option value="800000">800.000 €</option>
    <option value="900000">900.000 €</option>
    <option value="1000000">1.000.000 €</option>
    <option value="2000000">2.000.000 €</option>
    <option value="3000000">3.000.000 €</option>
    <option value="4000000">4.000.000 €</option>
    <?php } elseif($tipo_operacion_2 == 7|| $tipo_operacion_2 == 39) { ?>
    <option value="500">500 €</option>
    <option value="600">600 €</option>
    <option value="650">650 €</option>
    <option value="700">700 €</option>
    <option value="750">750 €</option>
    <option value="800">800 €</option>
    <option value="850">850 €</option>
    <option value="900">900 €</option>
    <option value="950">950 €</option>
    <option value="1000">1000 €</option>
    <option value="1200">1.200 €</option>
    <option value="1300">1.300 €</option>
    <option value="1400">1.400 €</option>
    <option value="1500">1.500 €</option>
    <option value="1600">1.600 €</option>
    <option value="1700">1.700 €</option>
    <option value="1800">1.800 €</option>
    <option value="1900">1.900 €</option>
    <option value="2000">2.000 €</option>
    <?php } ?>

</select>

<?php
  die();
}
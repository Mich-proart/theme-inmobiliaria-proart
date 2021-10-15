<?php
/* Template Name: Resultado de Busqueda */
if (!empty($_POST['tipo_operacion_1'])) {
    $tipo_propiedad_1 = '';
    $poblacion_1 = '';
    $zonas_poblacion = '';
  
    $tipo_operacion_1 = $_POST['tipo_operacion_1'];
    if (!empty($_POST['tipo_propiedad_1'])) {
      $tipo_propiedad_1 = $_POST['tipo_propiedad_1'];
    }
    if (!empty($_POST['poblacion_1'])) {
      $poblacion_1 = $_POST['poblacion_1'];
    }
    if (!empty($_POST['zonas_poblacion'])) {
      $zonas_poblacion = $_POST['zonas_poblacion'];
    }
}/* 
elseif (!empty($_POST['zona_alquiler_id'])) {
    if (pll_current_language() == 'es') {
        $tipo_operacion_1 = 79;
    }
    elseif (pll_current_language() == 'ca') { 
    $tipo_operacion_1 = 39;
    }
    $tipo_propiedad_1 = '';
    $poblacion_1 = 532;
    $zonas_poblacion = $_POST['zona_alquiler_id'];
}
elseif (!empty($_POST['zona_compra_id'])) {
    if (pll_current_language() == 'es') {
        $tipo_operacion_1 = 80;
    }
    elseif (pll_current_language() == 'ca') { 
    $tipo_operacion_1 = 36;
    }
    $tipo_propiedad_1 = '';
    $poblacion_1 = 532;
    $zonas_poblacion = $_POST['zona_compra_id'];
} */

else {
    $tipo_operacion_slug = htmlspecialchars($_GET["tipo-operacion"]);
    $tipos_operacion = get_terms('tipo-operacion');
    foreach ($tipos_operacion as $term) {
        if ($term->slug == $tipo_operacion_slug) {
          $tipo_operacion_1 = $term->term_id;
        }
    }
    $tipo_propiedad_1 = '';
    $poblacion_1 = '';
    $zonas_poblacion = '';
  }
  
get_header('top-bar-classy');



if (!empty($tipo_propiedad_1)) {
$item['taxonomy'] = 'tipo-propiedad';
$item['terms'] = $tipo_propiedad_1;
$item['field'] = 'term_id';
$list[]=$item;
}

$item['taxonomy'] = 'tipo-operacion';
$item['terms'] = $tipo_operacion_1;
$item['field'] = 'term_id';
$list[]=$item;

$cleanArray = array_merge(array('relation' => 'AND'), $list);

if (!empty($poblacion_1) && !empty($zonas_poblacion)) {
  $meta_queries_location	= array (
    array (
      'key'		=> 'poblacion',
      'value'		=> $poblacion_1,
    ),
    array (
      'key'		=> 'zona',
      'value'		=> $zonas_poblacion,
    ),
  );
  $meta_queries = array_merge(array('relation' => 'AND'), $meta_queries_location);
}
else {
  $meta_queries = '';
}

$args_propiedades = array(
            'post_type'       =>  'propiedades',
            'posts_per_page'  =>  1000,
            'paged'           =>  $paged,
            'tax_query'       =>  $cleanArray,
            'meta_query'      =>  $meta_queries,
          );
?>

<div id="main-resultado" class="container-fluid m-layaout pt-lg-5 pt-3">
    <div class="row">
        <div class="col-lg-4 col-12 pr-lg-5 pr-3" id="filtros">
            <div class="container mb-4 d-lg-none">
                <div class="row">
                    <div class="col-12 p-0 m-0">
                        <h1 class="mb-0 titulo-resultados text-center operacion">

                            <?php
                                            
                                $tipo_operacion_title = get_terms(
                                    array('taxonomy' => 'tipo-operacion',
                                    'hide_empty' => false)
                                );
                                if ( !empty($tipo_operacion_1) ) :                                                 
                                foreach( $tipo_operacion_title as $termino ) {
                                    if( $termino->term_id == $tipo_operacion_1 ) {
                                        echo  $termino->name;
                                    }
                                } 

                                endif;
                            ?>
                        </h1>
                    </div>
                </div>
            </div>
            <form id="form-filtro" method="post" action="<?php echo admin_url('admin-ajax.php'); ?>">

                <div class="accordion br-0 border-0" id="accordionExample">
                    <div class="card br-0 border-0">
                        <div class="card-header br-0 border-0 p-0 bg-transparent" id="headingOne">

                            <button class="br-rounded py-lg-3 py-2 w-100 bg-coral text-lg-center text-left pl-lg-2 pl-3"
                                type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                aria-controls="collapseOne">
                                <span class="servicios-home d-block text-white">
                                    <?php pll_e('FILTROS'); ?></span>
                            </button>

                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                            data-parent="#accordionExample">
                            <div class="card-body card-body br-0 border-0 bg-grey-light">
                                <div class="row mb-3 mt-0 mx-auto">
                                    <div class="col-12 p-0 my-2" id="tipo_operacion">
                                        <label class="color-coral ml-3"><?php pll_e('Tipo de operación'); ?></label>
                                        <select class="form-control FormControlSelect2" id="tipo_operacion_1" name="tipo_operacion_1">
                                            <?php
                                            
                                                $tipo_operacion_terms = get_terms(
                                                    array('taxonomy' => 'tipo-operacion',
                                                    'hide_empty' => false)
                                                );
                                                if ( !empty($tipo_operacion_1) ) : 
                                            ?>

                                            <?php 
    
                                                $output_1 = '';
                                                $output_2 = '';
                                                foreach( $tipo_operacion_terms as $term ) {
                                                    if( $term->term_id == $tipo_operacion_1 ) {
                                                        $output_1 = '<option value="'. $term->term_id .'">'. $term->name .'</option>';
                                                    }
                                                    else {
                                                        $output_2 = '<option value="'. $term->term_id .'">'. $term->name .'</option>';
                                                    }
                                                }
                                                echo $output_1 . $output_2;
                                                endif;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-12 p-0 my-2">
                                        <label class="color-coral ml-3"><?php pll_e('Tipo de propiedad'); ?></label>
                                        <select class="form-control FormControlSelect2" id="tipo_propiedad_1"
                                            name="tipo_propiedad_1">
                                            <?php

                                            $tipo_propiedad_terms = get_terms(
                                                array('taxonomy' => 'tipo-propiedad',
                                                'hide_empty' => false)
                                            );
                                            if ( !empty($tipo_propiedad_1) ) : ?>

                                            <?php 
                                                foreach( $tipo_propiedad_terms as $term ) {
                                                    if( $term->term_id == $tipo_propiedad_1 ) {
                                                        $output0.= '<option value="'. $term->term_id .'">
                                                        '. $term->name .'</option>';
                                                    }
                                                }
                                                echo $output0;
                                            
                                                foreach( $tipo_propiedad_terms as $term ) {
                                                    if( $term->term_id != $tipo_propiedad_1 ) {
                                                        $output.= '<option value="'. $term->term_id .'">
                                                        '. $term->name .'</option>';
                                                    }
                                                }
                                                echo $output; ?>
                                            <option value><?php pll_e('Indiferente'); ?></option>

                                            <?php else:
                                                        
                                                foreach( $tipo_propiedad_terms as $term ) {
                                                   
                                                    $outputt.= '<option value="'. $term->term_id .'">
                                                    '. $term->name .'</option>';
                                                } ?>
                                            <option value><?php pll_e('Indiferente'); ?></option>
                                            <?php echo $outputt;
                                                
                                            endif;
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-12 p-0 my-2" id="search-poblacion">
                                        <label class="color-coral ml-3"><?php pll_e('Provincia'); ?></label>
                                        <select class="form-control FormControlSelect2" id="poblacion_1"
                                            name="poblacion_1">
                                            <?php
                                        $args = array(
                                          'post_type' => 'poblacion',
                                          'posts_per_page' 	=> -1,
                                          'orderby'					=> 'title',
                                          'order'   				=> 'ASC'
                                        );
                                        $poblacion_query = new WP_Query( $args );
                                        ?>
                                            <?php if (!empty($poblacion_1)) { ?>
                                            <option value="<?php echo $poblacion_1 ?>">
                                                <?php echo get_the_title($poblacion_1)?>
                                            </option>
                                            <?php
                                          while ( $poblacion_query->have_posts() ) : $poblacion_query->the_post();
                                            $post_id = get_the_ID();
                                            if ($post_id != $poblacion_1) {
                                          ?>
                                            <option value="<?php echo $post_id ?>"><?php the_title() ?></option>
                                            <?php
                                          }
                                          endwhile;
                                          wp_reset_query();
                                          ?>
                                            <option value><?php pll_e('Indiferente'); ?></option>

                                            <?php } else {?>
                                            <option value=""><?php pll_e('Indiferente'); ?></option>
                                            <?php
                                        while ( $poblacion_query->have_posts() ) : $poblacion_query->the_post();
                                          $post_id = get_the_ID();
                                        ?>
                                            <option value="<?php echo $post_id ?>"><?php the_title() ?></option>
                                            <?php
                                        endwhile;
                                        wp_reset_query();
                                        }
                                        ?>
                                        </select>
                                    </div>

                                    <div class="col-12 p-0 my-2">
                                        <label class="color-coral ml-3"><?php pll_e('Municipio'); ?></label>
                                        <select class="form-control FormControlSelect2" id="zonas-poblacion"
                                            name="zonas_poblacion">

                                            <?php
                                          if (!empty($poblacion_1) && empty($zonas_poblacion)) {
                                          ?>
                                            <?php
                                          $args_zones = array(
                                            'post_type' => 'zona',
                                            'posts_per_page' 	=> -1,
                                            'orderby'					=> 'title',
                                            'order'   				=> 'ASC',
                                            'meta_query' => array(
                                              array(
                                                  'key'     => 'location_poblacion',
                                                  'value'   => $poblacion_1,
                                              ),
                                          ));
                                          $zones_query = new WP_Query( $args_zones );
                                            if( $zones_query->have_posts() ) {
                                            ?>
                                            <option value><?php pll_e('Indiferente'); ?></option>
                                            <?php
                                            while ( $zones_query->have_posts() ) : $zones_query->the_post();
                                              $post_id = get_the_ID();
                                            ?>
                                            <option value="<?php echo $post_id ?>"><?php the_title() ?></option>
                                            <?php
                                            endwhile;
                                            wp_reset_postdata();
                                            }
                                            else {
                                                echo '<option value>No hay resultados para esa provincia</option>';
                                            }
                                          ?>

                                            <?php } elseif (!empty($poblacion_1) && !empty($zonas_poblacion)) {
                                          $args_zones = array(
                                            'post_type' => 'zona',
                                            'posts_per_page' 	=> -1,
                                            'orderby'					=> 'title',
                                            'order'   				=> 'ASC',
                                            'meta_query' => array(
                                              array(
                                                  'key'     => 'location_poblacion',
                                                  'value'   => $poblacion_1,
                                              ),
                                          ));
                                          $zones_query = new WP_Query( $args_zones );
                                        ?>
                                            <option value="<?php echo $poblacion_1 ?>">
                                                <?php echo get_the_title($zonas_poblacion)?></option>

                                            <?php
                                          while ( $zones_query->have_posts() ) : $zones_query->the_post();
                                            $post_id = get_the_ID();
                                            if ($post_id != $zonas_poblacion) {
                                          ?>
                                            <option value="<?php echo $post_id ?>"><?php the_title() ?></option>
                                            <?php
                                          }
                                          endwhile;
                                          wp_reset_postdata();?>

                                            <?php } else { ?>
                                            <option value><?php pll_e('Elija Provincia'); ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>

                                    <div class="col-12 p-0 my-2" id="cambio-precio">
                                        <label class="color-coral ml-3"><?php pll_e('Precio máximo'); ?></label>
                                        <select class="form-control FormControlSelect2" id="precio" name="precio">
                                            <option value="5000000"><?php pll_e('Indiferente'); ?></option>
                                            <?php if ($tipo_operacion_1 == 80 ) { ?>
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
                                            <?php } elseif($tipo_operacion_1 == 79 ) { ?>
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
                                    </div>
                                    <div class="col-12 p-0 my-2">
                                        <label
                                            class="color-coral ml-3"><?php pll_e('Encuentra una referencia'); ?></label>
                                        <input type="text" class="form-control" id="refe" name="refe"
                                            placeholder="Ej. TRADYNG2021-referencia">
                                    </div>
                                    <div class="col-12 p-0 my-2 pb-4">
                                        <input type="hidden" value="<?php pll_current_language(); ?>" id="idioma">

                                        <input type="submit" class="bg-coral px-4 py-3 btn text-white h-100 btn-search" value="BUSCAR" id="buscador_resultados">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-lg-8 mt-0 p-0">
            <div class="container-fluid">
                <div class="row my-3">
                    <div class="col-lg-12">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-9 d-none d-lg-block p-0 m-0">
                                    <h1 class="mb-0 titulo-resultados text-uppercase operacion">
                                        <?php
                                            
                                            $tipo_operacion_title = get_terms(
                                                array('taxonomy' => 'tipo-operacion',
                                                'hide_empty' => false)
                                            );
                                            if ( !empty($tipo_operacion_1) ) :                                                 
                                            foreach( $tipo_operacion_title as $termino ) {
                                                if( $termino->term_id == $tipo_operacion_1 ) {
                                                    echo  $termino->name;
                                                }
                                            } 
            
                                            endif;
                                        ?>
                                    </h1>
                                </div>
                                <div class="col-lg-3 px-lg-3 px-0" id="ordenar">
                                    <form method="POST" id="form-order"
                                        action="<?php echo site_url() ?>/wp-admin/admin-ajax.php">
                                        <select class="form-control FormControlSelect2 custom-inputs" id="select_orden"
                                            name="ordenar_precio">
                                            <option><?php pll_e('Ordenar'); ?></option>
                                            <option value="precio_mayor"><?php pll_e('Precio mayor'); ?></option>
                                            <option value="precio_menor"><?php pll_e('Precio menor'); ?></option>
                                            <option value="date"><?php pll_e('Mas recientes'); ?></option>
                                        </select>
                                        <input type="hidden" value="<?php pll_current_language(); ?>" id="idioma_ordenar">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-lg-5 mt-lg-5 mt-3 mb-2 query aqui" id="respuesta_filtro">

                    <?php
                    $search_query = new WP_Query( $args_propiedades );
                    if( $search_query->have_posts() ) {
                        while ( $search_query->have_posts() ) : $search_query->the_post();
                        $post_id = get_the_ID();
                    ?>
                    <div class="col-lg-6 col-12">
                        <div class="card mb-5 br-0 border-right-0 border-top-0 border-bottom-0 border-left-0 br-x">
                            <div class="galeria-resultados">

                                <?php
                                if( have_rows('slider_propiedades') ):
                                while ( have_rows('slider_propiedades') ) : the_row();
                                ?>

                                <div class="img-zonas-home">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php img_with_alt_sub('imagen_propiedades'); ?>
                                    </a>
                                </div>

                                <?php
                                endwhile;
                                endif;
                                ?>

                            </div>
                            <div class="card-body border-left border-right br-0">
                                <a href="<?php the_permalink(); ?>">
                                    <h3 class="mb-1 propiedad color-orange-gradiente fw-900"><?php the_title(); ?></h3>
                                </a>
                                
                                <?php 
                                    if ( is_user_logged_in() && get_field('mostrar_direccion') == 'Dirección Exacta') {

                                   /*  $user = wp_get_current_user();
                                    $user_id = $user->ID;
                                    $user_info = get_userdata($user_id);

                                    if ( in_array( 'vendedor', $user_info->roles ) || in_array( 'administrator', $user_info->roles ) ) : */

                                    ?>

                                    <p class="card-text fw-500 color-blue">
                                        <?php the_field('ubicacion_de_la_propiedad');?>
                                    </p>

                                    <?php } elseif (get_field('mostrar_direccion') == 'No mostrar') { ?>
                                        <p class="card-text fw-500 color-blue">

                                        </p>
                                        <?php}
                                        ?>

                                <?php 
                                //endif;
                                }else {
                                    echo '<span class="text-white direccion fs-08 fw-600">Suscríbete para ver contenido oculto</span>';	
                                }?>
                                <div class="container">
                                    <div class="row">
                                        <?php
                                        if( have_rows('caracteristicas') ):
                                        while ( have_rows('caracteristicas') ) : the_row();
                                        ?>
                                        <div class="col-6 px-0 mx-0">

                                            <div class="mb-3 d-flex align-items-center">
                                                <span class="icon-area color-coral fs-18 mr-2"></span>
                                                <p class="mb-0 fs-09"><?php the_sub_field('metros_cuadrados'); ?>
                                                    m<sup>2</sup></p>
                                            </div>
                                            <div class="mb-3 d-flex align-items-center">
                                                <span class="icon-bathroom color-coral fs-18 mr-2"></span>
                                                <p class="mb-0 fs-09"> <?php the_sub_field('banos'); ?>
                                                    <?php pll_e('Baños'); ?></p>
                                            </div>


                                        </div>

                                        <div class="col-6 px-0 mx-0">
                                            <div class="mb-3 d-flex align-items-center">
                                                <span class="icon-bed color-coral fs-18 mr-2"></span>
                                                <p class="mb-0 fs-09"><?php the_sub_field('habitaciones'); ?>
                                                    <?php pll_e('Habitaciones'); ?></p>
                                            </div>
                                            <?php if( get_sub_field('plazas_de_parkings') ) {?>
                                            <div class="mb-3 d-flex align-items-center">
                                                <span class="icon-parking color-coral fs-18 mr-2"></span>
                                                <p class="mb-0 fs-09"> <?php the_sub_field('plazas_de_parkings'); ?>
                                                    <?php pll_e('Plaza Garaje'); ?></p>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <?php
                                        endwhile;
                                        endif;
                                        ?>
                                        <div class="col-12">
                                            <a href="<?php the_permalink(); ?>" class="mb-1 propiedad color-blue fw-900">Ver Detalles</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer px-5 bg-coral d-flex justify-content-between border-0">
                                <span class="text-uppercase precio text-white fw-600"><?php pll_e('Precio'); ?></span>
                                
                                <span
                                    class="text-white direccion fw-600"><?php echo number_format(intval(get_field('precio')), 0,",","."); ?>
                                    <?php if ($tipo_operacion_1 == 80 ) { ?>
                                    €
                                    <?php }else{?>
                                    €/mes
                                    <?php } ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <?php
                        endwhile;
                        wp_reset_postdata();
                    } 
                    else {?>
                    <div class="col-12">

                        <?php pll_e('No hay resultados para la búsqueda actual.'); ?>

                        <?php  } ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<!-- FORMULARIO -->

<section class="bg-custom-beige py-lg-5 py-3 mt-lg-5 mt-0">
    <div class="container-fluid m-layaout my-2">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12 text-center mt-lg-0 mt-3">
                <h2 class="color-blue mb-4 fw-500 text-center fs-14">
                    <?php the_field('titulo_contacto') ?>
                </h2>

                <?php  
                $contact = get_field('codigo_formulario');
                echo do_shortcode($contact);
                ?>
            </div>
        </div>
    </div>
</section>

<!-- /FORMULARIO -->



<?php
get_footer();
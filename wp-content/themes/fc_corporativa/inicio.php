<?php

/* Template Name: Home */

get_header('top-bar');
?>

<!-- BANNER -->

<section class="banner-home d-lg-flex align-items-end rel-wrapper limite">
    <?php img_with_alt('imagen_banner'); ?>
    <div class="container-fluid d-lg-none d-block">
        <div class="row">
            <div class="col-12 px-0">
            <?php img_with_alt('imagen_banner_movil'); ?>
            </div>
        </div>
    </div>
    <div class="container-fluid py-lg-5 py-3 content-banner bg-custom-white">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-12 text-center add-id">
                <h1 class="titulo-banner color-grey mt-lg-0 mt-2"><?php the_field('titulo_banner') ?></h1>
                <div class="form-home mt-3">
                    <form method="post" action="<?php echo get_site_url(); ?>/resultado-busqueda" id="home_search_form">
                        <div class="container-fluid m-layaout">
                            <div class="row justify-content-center">
                                <div class="col-lg-10 col-12 pl-0 pr-lg-2 pr-0">
                                    <div class="container-fluid">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-3 col-md-3 col-sm-12 pl-0 pr-lg-2 pr-0 mb-lg-0 mb-2">
                                                <div class="bg-white pt-lg-2 pb-lg-2 pt-0 pb-1"  id="tipo_operacion">
                                                    <select class="form-control FormControlSelect2"
                                                        id="tipo_operacion_1" name="tipo_operacion_1">
                                                        <option value>Tipo de operación</option>
                                                        <?php
                                                        $operaciones = '';
                                                        $tipo_operacion_terms = get_terms(
                                                        array('taxonomy' => 'tipo-operacion',
                                                        'hide_empty' => false)
                                                        );
                                                        foreach ($tipo_operacion_terms as $term) {
                                                        $operaciones .= '<option value="' . $term->term_id . '">' . $term->name . '</option>';
                                                        }
                                                        echo $operaciones;
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12 pl-0 pr-lg-2 pr-0 mb-lg-0 mb-2">
                                                <div class="bg-white pt-lg-2 pb-lg-2 pt-0 pb-1">
                                                    <select class="form-control FormControlSelect2"
                                                        id="tipo_propiedad_1" name="tipo_propiedad_1">
                                                        <option value>Tipo de propiedad</option>
                                                        <?php
                                                        $propiedades = '';
                                                        $tipo_propiedad_terms = get_terms(
                                                        array('taxonomy' => 'tipo-propiedad',
                                                        'hide_empty' => false)
                                                        );
                                                        foreach ($tipo_propiedad_terms as $term) {
                                                        $propiedades .= '<option value="' . $term->term_id . '">' . $term->name . '</option>';
                                                        }
                                                        echo $propiedades;
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-3 col-sm-12 pl-0 pr-lg-2 pr-0 mb-lg-0 mb-2">
                                                <div class="bg-white pt-lg-2 pb-lg-2 pt-0 pb-1" id="search-poblacion">
                                                    <select class="form-control FormControlSelect2" id="poblacion_1"
                                                        name="poblacion_1">
                                                        <option value>Población</option>
                                                        <?php

                                                    $args = array(  'post_type'     	=> 'poblacion',
                                                                                    'posts_per_page' 	=> -1,
                                                                                    'orderby'					=> 'title',
                                                                                    'order'   				=> 'ASC'
                                                                    );
                                                    $poblacion_query = new WP_Query( $args );
                                                    while ( $poblacion_query->have_posts() ) : $poblacion_query->the_post();
                                                        $post_id = get_the_ID();
                                                        ?>
                                                        <option value="<?php echo $post_id ?>"><?php the_title() ?></option>
                                                        <?php endwhile;
                                                        wp_reset_query();
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-12 pl-0 pr-0 mb-lg-0 mb-2">
                                                <div class="bg-white pt-lg-2 pb-lg-2 pt-0 pb-1">
                                                    <select class="form-control FormControlSelect2" id="zonas-poblacion"
                                                        name="zonas_poblacion">
                                                        <option value>Elige población</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-12 px-0">
                                    <input type="submit" class="bg-coral btn text-white h-100 w-100 btn-search" value="BUSCAR" name="buscador_home"  id="buscador_home">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- /BANNER -->

<!-- INTRODUCCIÓN -->
<section>
    <div class="container-fluid m-layaout my-lg-5 my-3 ">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-12 text-center px-0">
                <div class="mt-lg-3 mt-0 mb-4">
                    <?php img_with_alt('imagen_logo_introduccion'); ?>
                </div>
                <h2 class="titulo-introducion mb-3 color-blue fw-400"><?php the_field('texto_introduccion') ?></h2>
            </div>
        </div>
    </div>
</section>
<!-- /INTRODUCCIÓN -->

<!-- SERVICIOS -->

<section class="limite">
    <div class="container-fluid m-layaout">
        <div class="row">
            <div class="col-lg-6 col-12 pr-lg-0 pr-3 mb-lg-0 mb-3 pb-lg-0 pb-3">
                <a href="#" id="submit-comprar">
                    <form method="post" action="<?php echo get_site_url(); ?>/resultado-busqueda/?tipo-operacion=compra" id="home_comprar">
                        <div class="height-servicios">
                            <?php img_with_alt('imagen_servicio_1'); ?>
                            <div class="content-banner2 mt-lg-0 mt-3">
                                <h2 class="servicios-home text-white text-uppercase">
                                    <?php the_field('texto_servicio_1') ?>
                                </h2>
                            </div>
                        </div>
                    </form>
                </a>
            </div>
            <div class="col-lg-6 col-12">
                <div class="container-fluid px-lg-3 px-0">
                    <div class="row">
                        <div class="col-12 mb-3 pb-3">
                            <a id="submit-alquiler" href="#">
                                <form method="post" action="<?php echo get_site_url(); ?>/resultado-busqueda/?tipo-operacion=alquiler"
                                    id="home_alquiler">
                                    <div class="height-servicios2">
                                        <?php img_with_alt('imagen_servicio_2'); ?>
                                        <div class="content-banner2 mt-2 pt-2">
                                            <h2 class="servicios-home text-white text-uppercase">
                                                <?php the_field('texto_servicio_2') ?></h2>
                                        </div>
                                    </div>
                                </form>
                            </a>
                        </div>
                        <div class="col-12">
                            <a href="<?php echo site_url() ?>/inversiones">
                                <div class="height-servicios3">
                                    <?php img_with_alt('imagen_servicio_3'); ?>
                                    <div class="content-banner2 mt-2 pt-2">
                                        <h2 class="servicios-home text-white text-uppercase">
                                            <?php the_field('texto_servicio_3') ?></h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /SERVICIOS -->

<!-- NEWSLETTERS -->
<section class="limite py-5">
    <div class="container-fluid px-lg-0 px-3">
        <div class="row bg-custom-beige py-lg-0 py-4">
            <div class="col-lg-7 col-12 m-layaout-left pr-lg-3 pr-4 d-flex align-items-center">
                <div class="center px-0 container-fluid">
                    <h3 class="suscribete color-blue"><?php the_field('titulo_suscribete') ?></h3>
                    <p><?php the_field('texto_suscribete') ?></p>
                    <form action="#">
                        <div class="container-fluid px-2">
                            <div class="row">
                                <div class="col-lg-8 col-12 px-2 py-lg-2 py-1">
                                    <span class="wpcf7-form-control-wrap your-email">
                                        <input type="email" name="your-email" value="" size="40"
                                            class="form-control b-r-0" aria-required="true" aria-invalid="false"
                                            placeholder="Email">
                                    </span>
                                </div>
                                <div
                                    class="col-lg-4 text-right float-right d-lg-flex justify-content-end px-2 py-lg-2 py-1 mt-4 mt-lg-0">
                                    <input type="submit" value="SUSCRÍBETE"
                                        class="form-control text-white b-r-0 bg-black text-uppercase px-4 bg-coral br-0 btn-search">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 d-lg-block d-none">
                <?php img_with_alt('imagen_suscribete'); ?>
            </div>
        </div>
    </div>
</section>
<!-- /NEWSLETTERS -->

<!-- ZONAS BARCELONA -->
<section>
    <div class="container-fluid m-layaout mt-4 mb-lg-5 mb-3">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item mr-3">
                        <a class="br-0 text-uppercase nav-link tabs color-coral border-coral-1 active"
                            id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                            aria-controls="pills-home" aria-selected="true"><?php the_field('titulo_alquiler') ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="br-0 text-uppercase nav-link tabs color-coral border-coral-1 " id="pills-profile-tab"
                            data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile"
                            aria-selected="false"><?php the_field('titulo_comprar') ?></a>
                    </li>
                </ul>

                <h3 class="color-blue my-4"><?php the_field('titulo') ?></h3>


                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">


                        <section>
                            <div class="container-fluid px-0 ml">

                                <div class="row mx-auto">
                                    <?php
                                        $args_zonas = array(
                                        'posts_per_page' => -1,
                                        'post_type' => 'zona',
                                        'meta_query'			=> array (
										'relation'				=> 'AND',
										    array (
											    'key'		=> 'location_poblacion',
											    'value'		=> 300,
											    'compare'	=> 'LIKE'
										    )
										)
                                        );
                                        $wp_query = new WP_Query( $args_zonas );

                                        while ( $wp_query->have_posts() ) : $wp_query->the_post();
                                    ?>

                                    <div class="col-lg-4 col-12 mb-3 pr-0 pl-lg-3 pl-0">
                                        <a href="#" class="zona-alquiler">
                                            <form method="post"
                                                action="<?php echo get_site_url(); ?>/resultado-busqueda/?tipo-operacion=alquiler"
                                                id="home_alquiler_zona_form">
                                                <div class="img-zonas-home rel-wrapper limite">
                                                    <?php img_with_alt_featured(); ?>

                                                    <div class="content-details text-center py-4 w-100">
                                                        <h3 class="text-white text-uppercase mb-4 text-zonas">
                                                            <?php the_title(); ?>
                                                        </h3>

                                                        <div class="btn text-white border-1 border-white fw-500">
                                                            <?php
                                                      $post_id = get_the_ID();
                                                      $item['taxonomy'] = 'tipo-operacion';
                                                      $item['terms'] = 7;
                                                      $item['field'] = 'term_id';
                                                      $list[]=$item;
                                                      $cleanArray = array_merge(array('relation' => 'AND'), $list);
                                                      $meta_queries_location	= array (
                                                        array (
                                                          'key'		=> 'poblacion',
                                                          'value'		=> 300,
                                                        ),
                                                        array (
                                                          'key'		=> 'zona',
                                                          'value'		=> $post_id,
                                                        ),
                                                      );
                                                      $args_numero_zonas = array(
                                                                  'post_type'       =>  'propiedades',
                                                                  'posts_per_page'  =>  -1,
                                                                  'tax_query'       =>  $cleanArray,
                                                                  'meta_query'      =>  $meta_queries_location,
                                                                );
                                                      $zonas_inicio_query = new WP_Query( $args_numero_zonas );
                                                      $numero_propiedades = $zonas_inicio_query->post_count;
                                                        echo $numero_propiedades?> 
                                                            propiedades
                                                        </div>
                                                        <input type="hidden" name="zona_alquiler_id"
                                                            value="<?php echo $post_id ?>">
                                                        <?php
                                                    wp_reset_postdata();
                                                    ?>
                                                    </div>

                                                </div>
                                            </form>
                                        </a>
                                    </div>

                                    <?php endwhile;
                                        wp_reset_query();
                                    ?>
                                    <div
                                        class="col-12 mb-3 pl-lg-3 pl-0 pr-0 d-flex justify-content-center align-items-center">
                                        <div
                                            class="bg-coral w-100 h-100 d-flex flex-column justify-content-center align-items-center px-3 text-center py-4">
                                            <?php img_with_alt('imagen_logo_mini_banner'); ?>
                                            <span
                                                class="suscribete d-block text-white mt-3"><?php the_field('titular_mini_banner') ?></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>

                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                        <section>
                            <div class="container-fluid px-0 ml">

                                <div class="row mx-auto">
                                    <?php
                                      $args_zonas = array(
                                      'posts_per_page' => -1,
                                      'post_type' => 'zona',
                                      'meta_query'			=> array (
                                      'relation'				=> 'AND',
                                                        array (
                                                          'key'		=> 'location_poblacion',
                                                          'value'		=> 300,
                                                          'compare'	=> 'LIKE'
                                                        )
                                                      )
                                      );
                                      $wp_query = new WP_Query( $args_zonas );

                                      while ( $wp_query->have_posts() ) : $wp_query->the_post();
                                  ?>

                                    <div class="col-lg-4 col-12 mb-3 pr-0 pl-lg-3 pl-0">
                                        <a href="#" class="zona-compra">
                                            <form method="post"
                                                action="<?php echo get_site_url(); ?>/resultado-busqueda/?tipo-operacion=compra"
                                                id="home_compra_zona_form">
                                                <div class="img-zonas-home rel-wrapper limite">
                                                    <?php img_with_alt_featured(); ?>

                                                    <div class="content-details text-center py-4 w-100">
                                                        <h3 class="text-white text-uppercase mb-4 text-zonas">
                                                            <?php the_title(); ?>
                                                        </h3>
                                                        <div class="btn text-white border-1 border-white fw-500">
                                                            <?php
                                                            $post_id = get_the_ID();
                                                            $item_compra['taxonomy'] = 'tipo-operacion';
                                                            $item_compra['terms'] = 8;
                                                            $item_compra['field'] = 'term_id';
                                                            $list_compra[]=$item_compra;
                                                            $cleanArray_compra = array_merge(array('relation' => 'AND'), $list_compra);
                                                            $meta_queries_location	= array (
                                                            array (
                                                                'key'		=> 'poblacion',
                                                                'value'		=> 300,
                                                            ),
                                                            array (
                                                                'key'		=> 'zona',
                                                                'value'		=> $post_id,
                                                            ),
                                                            );

                                                    $args_numero_zonas_compra = array(
                                                                'post_type'       =>  'propiedades',
                                                                'posts_per_page'  =>  -1,
                                                                'tax_query'       =>  $cleanArray_compra,
                                                                'meta_query'      =>  $meta_queries_location,
                                                              );
                                                    $zonas_inicio_query_compra = new WP_Query( $args_numero_zonas_compra );
                                                    $numero_propiedades = $zonas_inicio_query_compra->post_count;
                                                      echo $numero_propiedades;
                                                    ?> 
                                                        propiedades
                                                        </div>
                                                        <input type="hidden" name="zona_compra_id"
                                                            value="<?php echo $post_id ?>">
                                                        <?php
                                                    wp_reset_postdata();
                                                    ?>
                                                    </div>

                                                </div>
                                            </form>
                                        </a>
                                    </div>

                                    <?php endwhile;
                                      wp_reset_query();
                                  ?>
                                    <div class="col-12 mb-3 pl-lg-3 pl-0 pr-0 d-flex justify-content-center align-items-center">
                                        <div
                                            class="bg-coral w-100 h-100 d-flex flex-column justify-content-center align-items-center px-3 text-center py-4">
                                            <?php img_with_alt('imagen_logo_mini_banner'); ?>
                                            <span
                                                class="suscribete d-block text-white mt-3"><?php the_field('titular_mini_banner') ?></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / ZONAS BARCELONA -->

<!-- FORMULARIO -->

<section class="bg-custom-beige py-5">
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
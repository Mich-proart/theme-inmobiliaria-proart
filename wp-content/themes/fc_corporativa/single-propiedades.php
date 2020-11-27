<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package fc_corporativa
 */

get_header('top-bar');
?>

<!-- Large modal mapa -->

<?php
    if( have_rows('caracteristicas') ):
    while ( have_rows('caracteristicas') ) : the_row();
?>
<div class="modal fade bd-example-modal-lg" id="modal-mapa" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content br-0">
            <div class="modal-header">
                <span>Localización Apróximada</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                    

                    
                    if (get_sub_field('mostrar_direccion') == 'Dirección Exacta') {

                        $map = get_sub_field('ver_mapa');
                        acf_make_map_marker( $map );

                    } elseif (get_sub_field('mostrar_direccion') == 'Por Calle Aproximada') {

                        $map = get_sub_field('ver_mapa');
                        acf_make_map( $map );
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<!-- Large modal -->
<div class="modal fade bd-example-modal-lg" id="video-modal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content br-0">
            <div class="modal-header">
                <span>Vídeo Exhibición</span>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php get_iframe_url_vimeo_sub('video'); ?>
            </div>
        </div>
    </div>
</div>
<?php 
    endwhile;
    endif;
?>


<section class="pt-lg-5 pt-3">
    <div class="container-fluid m-layaout">
        <div class="row">
            <div class="col-lg-7 col-12 order-lg-1 order-2" id="single">
                <div class="galeria-inversiones pb-3 d-lg-block d-none">

                    <?php
					if( have_rows('slider_propiedades') ):
					while ( have_rows('slider_propiedades') ) : the_row();
                    ?>

                    <div class="img-propiedades">
                        <?php img_with_alt_sub('imagen_propiedades'); ?>
                    </div>

                    <?php 
                    endwhile;
					endif;
				    ?>

                </div>
                <div class="mt-lg-5 mt-3">
                    <?php the_field('descripcion_propiedades') ?>
                </div>
                <div class="bg-custom-beige p-5 text-center d-lg-none d-block">
                    <h2 class="color-blue"><?php the_field('titulo_formulario') ?></h2>
                    <?php  
                                $contact = get_field('codigo_formulario');
                                echo do_shortcode($contact);
                                ?>
                </div>
            </div>

            <div class="col-lg-5 col-12 text-left order-lg-2 order-1">
                <section>
                    <div class="container-fluid px-0">
                        <div class="row">
                            <div class="col-12 order-1 d-lg-none d-block">
                                <div class="galeria-inversiones pb-3">

                                    <?php
                                    if( have_rows('slider_propiedades') ):
                                    while ( have_rows('slider_propiedades') ) : the_row();
                                    ?>

                                    <div class="img-propiedades">
                                        <?php img_with_alt_sub('imagen_propiedades'); ?>
                                    </div>

                                    <?php 
                                    endwhile;
                                    endif;
                                    ?>

                                </div>
                            </div>
                            <div class="col-12 order-lg-1 order-2">
                                <span
                                    class="color-blue refe fw-300 d-block mb-4"><?php the_field('referencia_de_la_propiedad');?></span>
                                <h1 class="color-grey"><?php the_title(); ?></h1>
                                <p class="card-text fw-500 mb-5">
                                    <?php the_field('ubicacion_de_la_propiedad');?>
                                </p>


                                <div class="container-fluid px-0">
                                    <div class="row">
                                        <?php
                                            if( have_rows('caracteristicas') ):
                                            while ( have_rows('caracteristicas') ) : the_row();
                                        ?>


                                        <div class="mb-3 col-lg-4 col-6 d-flex align-items-center">
                                            <span class="icon-area color-coral fs-18 mr-2"></span>
                                            <p class="mb-0 fs-09"><?php the_sub_field('metros_cuadrados'); ?>
                                                m<sup>2</sup></p>
                                        </div>
                                        <div class="mb-3 col-lg-4 col-6 d-flex align-items-center">
                                            <span class="icon-bed color-coral fs-18 mr-2"></span>
                                            <p class="mb-0 fs-09"><?php the_sub_field('habitaciones'); ?> Habs</p>
                                        </div>

                                        <?php
                                            if( get_sub_field('calefaccion') ) {?>
                                        <div class="mb-3 col-lg-4 col-6 d-flex align-items-center">
                                            <span class="icon-heating color-coral fs-18 mr-2"></span>
                                            <p class="mb-0 fs-09">
                                                <?php if (pll_current_language() == 'es') { ?>Calefacción<?php } else if (pll_current_language() == 'ca') { ?>Calefacció<?php } ?>
                                            </p>
                                        </div>
                                        <?php } ?>

                                        <div class="mb-3 col-lg-4 col-6 d-flex align-items-center">
                                            <span class="icon-bathroom color-coral fs-18 mr-2"></span>
                                            <p class="mb-0 fs-09"> <?php the_sub_field('banos'); ?>
                                                <?php if (pll_current_language() == 'es') { ?>Baños<?php } else if (pll_current_language() == 'ca') { ?>Banys<?php } ?>
                                            </p>
                                        </div>
                                        <div class="mb-3 col-lg-4 col-6 d-flex align-items-center">
                                            <span class="icon-parking color-coral fs-18 mr-2"></span>
                                            <p class="mb-0 fs-09"> <?php the_sub_field('plazas_de_parkings'); ?>
                                                <?php if (pll_current_language() == 'es') { ?>Plaza<?php } else if (pll_current_language() == 'ca') { ?>Plaça<?php } ?>
                                            </p>
                                        </div>
                                        <div class="mb-3 col-lg-4 col-6 d-flex align-items-center">
                                            <span class="icon-hotel color-coral fs-18 mr-2"></span>
                                            <p class="mb-0 fs-09"> <?php the_sub_field('planta'); ?>
                                                <?php if (pll_current_language() == 'es') { ?>Planta<?php } else if (pll_current_language() == 'ca') { ?>Planta<?php } ?>
                                            </p>
                                        </div>

                                        <div class="mb-3 col-lg-4 col-6">
                                            <a href="#" data-toggle="modal" data-target="#video-modal"
                                                class="d-flex align-items-center">
                                                <span class="icon-video color-coral fs-18 mr-2"></span>
                                                <p class="mb-0 fs-09"> <?php if (pll_current_language() == 'es') { ?>Ver
                                                    Vídeo<?php } else if (pll_current_language() == 'ca') { ?>Veure
                                                    Vídeo<?php } ?></p>
                                            </a>
                                        </div>
                                        <div class="mb-3 col-lg-4 col-6">
                                            <a href="#" data-toggle="modal" data-target="#modal-mapa"
                                                class="d-flex align-items-center">
                                                <span class="icon-location color-coral fs-18 mr-2"></span>
                                                <p class="mb-0 fs-09"> <?php if (pll_current_language() == 'es') { ?>Ver
                                                    Mapa<?php } else if (pll_current_language() == 'ca') { ?>Veure
                                                    Mapa<?php } ?></p>
                                            </a>
                                        </div>

                                        <?php
                                            if( get_sub_field('ascensor') ) {?>
                                        <div class="mb-3 col-lg-4 col-6 d-flex align-items-center">
                                            <span class="icon-elevator color-coral fs-18 mr-2"></span>
                                            <p class="mb-0 fs-09">
                                                <?php if (pll_current_language() == 'es') { ?>Ascensor<?php } else if (pll_current_language() == 'ca') { ?>Ascensor<?php } ?>
                                            </p>
                                        </div>
                                        <?php } ?>

                                        <?php
                                            if( get_sub_field('terraza') ) {?>
                                        <div class="mb-3 col-lg-4 col-6 d-flex align-items-center">
                                            <span class="icon-balcony color-coral fs-18 mr-2"></span>
                                            <p class="mb-0 fs-09">
                                                <?php if (pll_current_language() == 'es') { ?>Terraza<?php } else if (pll_current_language() == 'ca') { ?>Terraza<?php } ?>
                                            </p>
                                        </div>
                                        <?php } ?>


                                        <?php 
                                        endwhile;
                                        endif;
                                        ?>
                                    </div>
                                </div>
                                <div class="mb-2 card-footer px-5 bg-dos d-flex justify-content-between br-0 border-0">
                                    <span
                                        class="text-uppercase precio color-beige"><?php if (pll_current_language() == 'es') { ?>Precio<?php } else if (pll_current_language() == 'ca') { ?>Preu<?php } ?></span>
                                    <span class="text-white direccion fw-600">
                                        <?php echo number_format(intval(get_field('precio')), 0,",","."); ?> €/
                                        mes</span>
                                </div>
                                <div class="mb-lg-5 mb-3 text-lg-right text-left">
                                    <p class="mb-0 fs-09"><b><?php the_field('titilo_indice_de_referencia');?>:</b> <?php the_field('valor_indice_de_referencia');?> €/m² </p>
                                    <p class="mb-0 fs-09"><?php if (pll_current_language() == 'es') { ?>Fianza de<?php } else if (pll_current_language() == 'ca') { ?>Fiança de<?php } ?> <?php the_field('meses_de_fianza');?> <?php if (pll_current_language() == 'es') { ?>meses<?php } else if (pll_current_language() == 'ca') { ?>mesos<?php } ?></p>
                                </div>
                            </div>
                            <div class="col-12 order-2 d-lg-block d-none">
                                <div class="bg-custom-beige p-5 text-center">
                                    <h2 class="color-blue"><?php the_field('titulo_formulario') ?></h2>
                                    <?php  
                                $contact = get_field('codigo_formulario');
                                echo do_shortcode($contact);
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="col-12 mt-4 my-5 order-3">
                <div class="container-fluid px-0 mb-3">
                    <div class="row">
                        <div class="col-lg-7 col-12 mb-4">
                            <h2 class="color-blue mb-3"><?php the_field('titulo_equipamientos') ?></h2>
                            <div class="pt-3 px-3 border d-inline-flex align-items-start flex-wrap">

                                <?php
                                    if( have_rows('equipamientos') ):
                                    while ( have_rows('equipamientos') ) : the_row();
                                ?>

                                <span
                                    class="py-2 px-3 equipamientos mr-3 mb-3"><?php the_sub_field('equipamiento'); ?></span>

                                <?php 
                                    endwhile;
                                    endif;
                                ?>

                            </div>
                        </div>
                        <?php
                            if( get_field('certificado') == 'A') {?>
                        <div class="col-12 d-flex align-items-center">
                            <div class="py-5 img-certificado"><img src="<?php echo get_template_directory_uri() ?>/img/a.png" class="img-fluid" alt="Certificado energetico a"></div>
                            <p class="mb-0"><?php the_field('texto_certificado') ?></p>
                        </div>
                        <?php } elseif( get_field('certificado') == 'B') {?>
                            <div class="col-12 d-flex align-items-center">
                            <div class="py-5 img-certificado"><img src="<?php echo get_template_directory_uri() ?>/img/b.png" class="img-fluid" alt="Certificado energetico b"></div>
                            <p class="mb-0"><?php the_field('texto_certificado') ?></p>
                        </div>
                        <?php } elseif( get_field('certificado') == 'C') {?>
                            <div class="col-12 d-flex align-items-center">
                            <div class="py-5 img-certificado"><img src="<?php echo get_template_directory_uri() ?>/img/c.png" class="img-fluid" alt="Certificado energetico c"></div>
                            <p class="mb-0"><?php the_field('texto_certificado') ?></p>
                            </div>
                        <?php } elseif( get_field('certificado') == 'D') {?>
                            <div class="col-12 d-flex align-items-center">
                            <div class="py-5 img-certificado"><img src="<?php echo get_template_directory_uri() ?>/img/d.png" class="img-fluid" alt="Certificado energetico d"></div>
                            <p class="mb-0"><?php the_field('texto_certificado') ?></p>
                            </div>
                        <?php } elseif( get_field('certificado') == 'E') {?>
                            <div class="col-12 d-flex align-items-center">
                            <div class="py-5 img-certificado"><img src="<?php echo get_template_directory_uri() ?>/img/e.png" class="img-fluid" alt="Certificado energetico e"></div>
                            <p class="mb-0"><?php the_field('texto_certificado') ?></p>
                            </div>
                        <?php } elseif( get_field('certificado') == 'F') {?>
                            <div class="col-12 d-flex align-items-center">
                            <div class="py-5 img-certificado"><img src="<?php echo get_template_directory_uri() ?>/img/f.png" class="img-fluid" alt="Certificado energetico f"></div>
                            <p class="mb-0"><?php the_field('texto_certificado') ?></p>
                            </div>
                        <?php } elseif( get_field('certificado') == 'G') {?>
                            <div class="col-12 d-flex align-items-center">
                            <div class="py-5 img-certificado"><img src="<?php echo get_template_directory_uri() ?>/img/g.png" class="img-fluid" alt="Certificado energetico g"></div>
                            <p class="mb-0"><?php the_field('texto_certificado') ?></p>
                            </div>
                        
                        <?php } elseif( get_field('certificado') == 'No dispone') {?>
                            <div class="col-12 d-flex align-items-center">
                            <div class="py-5 img-certificado"><img src="<?php echo get_template_directory_uri() ?>/img/no-disponible.png" class="img-fluid" alt="Certificado energetico Aún no dispone"></div>
                            <p class="mb-0"><?php the_field('texto_certificado') ?></p>
                            </div>
                    
                        <?php } elseif( get_field('certificado') == 'Exento') {?>
                            <div class="col-12 d-flex align-items-center">
                            <div class="py-5 img-certificado"><img src="<?php echo get_template_directory_uri() ?>/img/exento.png" class="img-fluid" alt="Certificado energetico Exento"></div>
                            <p class="mb-0"><?php the_field('texto_certificado') ?></p>
                            </div>
                        
                        <?php } elseif( get_field('certificado') == 'En tramite') {?>
                            <div class="col-12 d-flex align-items-center">
                            <div class="py-5 img-certificado"><img src="<?php echo get_template_directory_uri() ?>/img/en-tramite.png" class="img-fluid" alt="Certificado energetico en tramite"></div>
                            <p class="mb-0"><?php the_field('texto_certificado') ?> kWh/m² <?php if (pll_current_language() == 'es') { ?>año<?php } else if (pll_current_language() == 'ca') { ?>any<?php } ?></p>
                            </div>
                        <?php } ?>

                    </div>
                </div>
                <div class="d-flex justify-content-start align-items-center">

                    <span class="color-grey fw-500"><?php the_field('titulo_rrss') ?></span>
                    <?php  
                  $rrss = get_field('codigo_rrss');
                  echo do_shortcode($rrss);
                ?>
                </div>
            </div>

        </div>
    </div>
</section>


<?php
//get_sidebar();
get_footer();
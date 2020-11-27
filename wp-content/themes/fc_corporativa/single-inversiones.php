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

<section class="pt-lg-5 pt-3">
    <div class="container-fluid m-layaout">
        <div class="row">
            <div class="col-lg-7 col-12">
                <div class="galeria-inversiones pb-3">

                    <?php
					if( have_rows('slider_inversiones') ):
					while ( have_rows('slider_inversiones') ) : the_row();
                    ?>

                    <div class="img-inversiones">
                        <?php img_with_alt_sub('imagen_inversiones'); ?>
                    </div>

                    <?php 
                    endwhile;
					endif;
				    ?>

                </div>
                <h1 class="color-blue my-4"><?php the_title(); ?></h1>
                <p class="card-text fw-500">
                    <?php the_field('ubicacion_de_la_inversion');?>
                </p>
                <div class="">
                    <?php the_field('descripcion_inversiones') ?>
                </div>

            </div>

            <div class="col-lg-5 col-12">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 bg-custom-beige p-lg-5 py-5 px-3 text-center order-lg-1 order-2">
                            <h2 class="color-blue"><?php the_field('titulo_formulario') ?></h2>
                            <?php  
                            $contact = get_field('codigo_formulario');
                            echo do_shortcode($contact);
                            ?>
                        </div>
                        <div class="col-12 my-lg-5 my-3 order-lg-2 order-1 px-0">
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
                    </div>
                </div>
            </div>

            <div class="col-12 mt-4 mb-5">
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
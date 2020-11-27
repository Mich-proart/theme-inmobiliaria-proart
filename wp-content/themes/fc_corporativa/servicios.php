<?php

/* Template Name: Servicios*/

get_header('top-bar');
?>

<!-- BANNER -->

<section class="banner-generico d-lg-flex align-items-end rel-wrapper limite">
    <?php img_with_alt('imagen_banner'); ?>

    <div class="container-fluid m-layaout py-lg-5 py-3 content-banner3">
        <div class="row">
            <div class="col-12">
                <h1 class="titulo-banner-second color-grey text-left text-uppercase">
                    <?php the_field('titulo_banner') ?>
                </h1>
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
                <div class="mt-3 mb-4">
                    <?php img_with_alt('imagen_logo_introduccion'); ?>
                </div>
                <h2 class="titulo-introducion mb-3 color-blue fw-400"><?php the_field('texto_introduccion') ?></h2>
            </div>
        </div>
    </div>
</section>
<!-- /INTRODUCCIÓN -->

<!-- SERVICIOS -->

<section class="home-services">
    <div class="container-fluid m-layaout">

        <?php
            if( have_rows('servicios_aincasa') ):
              while ( have_rows('servicios_aincasa') ) : the_row(); ?>

        <div class="row my-5 pb-lg-5 pb-3 pt-0">

            <div class="img col-lg-6 col-12">
                <?php img_with_alt_sub('imagen_servicio'); ?>
            </div>

            <div class="col-lg-6 col-12 d-flex align-items-center mt-lg-0 mt-4">
                <div class="center">
                    <h3 class="titulo-servicios color-coral mb-3 text-uppercase">
                        <?php the_sub_field('titulo_servicio'); ?>
                    </h3>
                    <p class="mb-lg-4 mb-3">
                        <?php the_sub_field('descripcion_servicio'); ?>
                    </p>

                    <?php if (get_sub_field('texto_boton_info')) { ?>

                    <a href="<?php the_sub_field('enlace_boton_info'); ?>"
                        class="bg-coral btn text-white btn-search text-uppercase py-2 w-lg-100">
                        <?php the_sub_field('texto_boton_info'); ?>
                    </a>
                    <?php }?>
                </div>
            </div>
        </div>
        <?php 
            endwhile;
          endif;
          ?>


    </div>
</section>

<!-- /SERVICIOS -->


<!-- FORMULARIO -->

<section class="bg-custom-beige py-lg-5 py-3">
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
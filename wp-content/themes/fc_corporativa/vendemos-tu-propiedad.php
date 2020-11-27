<?php

/* Template Name: Vendemos Tu Propiedad */

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
    <div class="container-fluid m-layaout my-lg-5 my-3 pt-3 pb-lg-3 pb-0">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12 mb-lg-0 mb-4 text-center formato">
                <?php the_field('texto_introductorio') ?>
            </div>
        </div>
    </div>
</section>
<!-- /INTRODUCCIÓN -->

<!-- CÓMO TRABAJAMOS -->
<section>
    <div class="container-fluid m-layaout bg-white pt-lg-4 pt-2 pb-4 mb-lg-5 mb-3">

        <div class="row d-flex justify-content-lg-between justify-content-center align-items-center">
            <?php
                if( have_rows('proceso') ):
                while ( have_rows('proceso') ) : the_row();
                ?>
            <div class="col-lg-2 col-12 px-lg-0 px-5 text-center">
                <span class="icon-camera color-coral fs-3"></span>
                <div class="mt-2">
                    <h4 class="color-beige-t text-center fw-400 lh-22"><?php the_sub_field('proceso_01')?></h4>
                </div>
            </div>
            <div class="col-lg-1 col-12 d-flex justify-content-center px-lg-0 px-5">
                <div class="linea-proceso align-middle"></div>
            </div>
            <div class="col-lg-2 col-12 text-center px-lg-0 px-5">
                <span class="icon-laptop color-coral fs-3"></span>
                <div class="mt-2">
                    <h4 class="color-beige-t text-center fw-400 lh-22"><?php the_sub_field('proceso_2')?></h4>
                </div>
            </div>
            <div class="col-lg-1 col-12 d-flex justify-content-center px-lg-0 px-5">
                <div class="linea-proceso"></div>
            </div>
            <div class="col-lg-2 col-12 text-center px-lg-0 px-5">
                <span class="icon-building color-coral fs-3"></span>
                <div class="mt-2">
                    <h4 class="color-beige-t text-center fw-400 lh-22"><?php the_sub_field('proceso_3')?></h4>
                </div>
            </div>
            <div class="col-lg-1 col-12 d-flex justify-content-center px-lg-0 px-5">
                <div class="linea-proceso"></div>
            </div>
            <div class="col-lg-2 col-12 text-center px-lg-0 px-5">
                <span class="icon-coins color-coral fs-3"></span>
                <div class="mt-2">
                    <h4 class="color-beige-t text-center fw-400 lh-22"><?php the_sub_field('proceso_4')?></h4>
                </div>
            </div>


            <?php
                    endwhile;
                    endif;
                ?>

        </div>

    </div>
</section>
<!-- /CÓMO TRABAJAMOS -->

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
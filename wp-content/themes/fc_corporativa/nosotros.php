<?php

/* Template Name: Nosotros */

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
    <div class="container-fluid m-layaout mb-lg-5 mb-4 mt-lg-5 mt-3 pt-lg-5 pt-3 pb-4">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-12 text-center pr-lg-5 pr-3 order-lg-1 order-2 pt-lg-0 pt-3">
                <?php img_with_alt('foto_perfil'); ?>
            </div>
            <div class="col-lg-7 col-12 order-lg-2 order-1 mb-lg-0 mb-4 formato text-lg-left text-center">
                <?php the_field('texto_nosotros') ?>
            </div>
        </div>
    </div>
</section>
<!-- /INTRODUCCIÓN -->

<!-- CÓMO TRABAJAMOS -->
<section>
    <div class="container-fluid m-layaout mt-lg-4 mb-5 pb-3">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12 text-center formato">
                <h2 class="color-blue"><?php the_field('titulo_como_trabajamos') ?></h2>
                <p><?php the_field('texto_como_trabajamos') ?></p>
            </div>
        </div>
    </div>
    <div class="container-fluid m-layaout bg-custom-beige py-4">

        <div class="row d-flex justify-content-lg-between justify-content-center align-items-center">
            <?php
                if( have_rows('proceso') ):
                while ( have_rows('proceso') ) : the_row();
                ?>
            <div class="col-lg-2 col-12 p-0">
                <h3 class="fs-numero d-flex justify-content-center pb-2 color-beige-t">01</h3>
                <div class="">
                    <h4 class="color-coral text-center fw-500 fs-09"><?php the_sub_field('proceso_01')?></h4>
                </div>
            </div>
            <div class="col-lg-1 col-12 d-flex justify-content-center">
                <div class="linea-proceso align-middle"></div>
            </div>
            <div class="col-lg-2 col-12">
                <h3 class="fs-numero d-flex justify-content-center pb-2 color-beige-t">02</h3>
                <div class="">
                    <h4 class="color-coral text-center fw-500 fs-09"><?php the_sub_field('proceso_2')?></h4>
                </div>
            </div>
            <div class="col-lg-1 col-12 d-flex justify-content-center">
                <div class="linea-proceso"></div>
            </div>
            <div class="col-lg-2 col-12">
                <h3 class="fs-numero d-flex justify-content-center pb-2 color-beige-t">03</h3>
                <div class="">
                    <h4 class="color-coral text-center fw-500 fs-09"><?php the_sub_field('proceso_3')?></h4>
                </div>
            </div>
            <div class="col-lg-1 col-12 d-flex justify-content-center">
                <div class="linea-proceso"></div>
            </div>
            <div class="col-lg-2 col-12">
                <h3 class="fs-numero d-flex justify-content-center pb-2 color-beige-t">04</h3>
                <div class="">
                    <h4 class="color-coral text-center fw-500 fs-09"><?php the_sub_field('proceso_4')?></h4>
                </div>
            </div>


            <?php
                    endwhile;
                    endif;
                ?>

        </div>

    </div>
</section>
<!-- /CÓMO TRABAJAMOS DESKTOP-->

<!-- MÁS INFO -->
<section>
    <div class="container-fluid m-layaout my-lg-5 my-5 py-lg-5 py-2">
        <div class="row justify-content-center">
            
            <div class="col-lg-7 col-12 mb-lg-0 mb-4 formato text-lg-left text-center">
                <?php the_field('texto_mas_info') ?>
            </div>

            <div class="col-lg-5 col-12 text-center pt-lg-0 pt-3">
                <?php img_with_alt('foto_mas_info'); ?>
            </div>
        </div>
    </div>
</section>
<!-- /MÁS INFO -->

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
<?php

/* Template Name: Contacto */

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
        <div class="row">
            <div class="col-12 order-lg-2 order-1 mb-lg-0 pt-lg-0 pt-4 mb-4 formato text-lg-left text-center">
                <?php the_field('texto_contacto') ?>
            </div>
        </div>
    </div>
</section>
<!-- /INTRODUCCIÓN -->


<!-- INFORMACIÓN CONTACTO -->
<section class="limite mb-lg-5 mb-3">
    <div class="container-fluid m-layaout">
        <div class="row">
            <div class="col-lg-6 col-12 p-3 order-lg-1 order-2">
                <div class="mapa-alt">
                
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2994.052435456982!2d2.135609615374163!3d41.37294547926543!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a49884e1812ee9%3A0xe09cf8259198cbd7!2sCarrer%20de%20Maria%20Vict%C3%B2ria%2C%2008014%20Barcelona!5e0!3m2!1ses!2ses!4v1608233538211!5m2!1ses!2ses"
                        width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                        aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>

            <div class="col-lg-6 col-12 p-3 order-lg-2 order-1">
                <?php
                    if( have_rows('informacion_contacto') ):
                    while ( have_rows('informacion_contacto') ) : the_row();
                ?>
                <div>
                    <p class="mb-1 d-lg-block d-none">
                        <span class="icon-marker color-blue mr-2"></span> <?php the_sub_field('direccion_contacto')?>
                    </p>
                    <p class="d-block d-lg-none mb-1 pr-5 mr-4">
                        <span class="icon-marker color-blue mr-2"></span> <?php the_sub_field('direccion_contacto')?>
                    </p>
                    <p class="mb-1">
                        <span class="icon-phone color-blue mr-2"></span>
                        <a
                            href="tel:0034<?php the_sub_field('telefono_contacto')?>"><?php the_sub_field('telefono_contacto')?></a>
                        / <a
                            href="tel:0034<?php the_sub_field('telefono_contacto_movil')?>"><?php the_sub_field('telefono_contacto_movil')?></a>

                    </p>
                    <p class="mb-2">
                        <span class="icon-email-1 color-blue mr-2"></span> <a
                            href="mailto:<?php the_sub_field('email_contacto')?>"><?php the_sub_field('email_contacto')?></a>

                    </p>


                    <div>
                        <?php

                        $contacto = get_sub_field('codigo_formulario');
                        echo do_shortcode($contacto);
                        ?>
                    </div>

                    <?php
                    endwhile;
                    endif;
                ?>


                </div>



            </div>
        </div>
</section>
<!-- /INFORMACIÓN CONTACTO -->

<?php

get_footer();
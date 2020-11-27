<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package fc_corporativa
 */

get_header('top-bar');
?>
<section class="py-5 error-404">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row py-md-5">
                <?php if (pll_current_language() == 'es') { ?>
                <div
                    class="col-md-6 col-12 text-center pr-xl-5 d-flex align-items-center flex-column justify-content-center mt-4 mb-5 my-md-0">
                    <h1 class="mb-4 text-center color-blue">
                        ¡Vaya! Error 404
                    </h1>
                    <div>
                        <p>
                            No hemos podido encontrar la página que buscas. Aquí tienes algunos
                            enlaces que pueden servirte de ayuda:
                        </p>
                    </div>
                    <div class="text-center mt-4 d-flex align-items-center justify-content-center flex-column">
                        <a href="<?php echo site_url() ?>" class="bg-coral btn text-white btn-search px-4 py-2 mb-3 text-uppercase">
                            Inicio
                        </a>
                        <a href="<?php echo site_url() ?>/resultado-busqueda/?tipo-operacion=compra"
                            class="bg-coral btn text-white btn-search px-4 py-2 mb-3 text-uppercase">
                            Compra
                        </a>
                        <a href="<?php echo site_url() ?>/resultado-busqueda/?tipo-operacion=alquiler"
                            class="bg-coral btn text-white btn-search px-4 py-2 mb-3 text-uppercase">
                            Alquiler
                        </a>
                        <a href="<?php echo site_url() ?>/contacto"
                            class="bg-coral btn text-white btn-search text-uppercase px-4 py-2">
                            Contacto
                        </a>
                    </div>
                </div>
                <?php } else if (pll_current_language() == 'ca') { ?>
                <div
                    class="col-md-6 col-12 text-center pr-xl-5 d-flex align-items-center flex-column justify-content-center mt-4 mb-5 my-md-0">
                    <h1 class="mb-4 text-center color-blue">
                        Vagi! Error 404
                    </h1>
                    <div>
                        <p>
                            No hem pogut trobar la pàgina que cerques.
                            Aquí tens alguns enllaços que poden servir-te d'ajuda:
                        </p>
                    </div>
                    <div class="text-center mt-4 d-flex align-items-center justify-content-center flex-column">
                        <a href="<?php echo site_url() ?>/ca" class="bg-coral btn text-white btn-search px-4 py-2 mb-3 text-uppercase">
                            Inici
                        </a>
                        <a href="<?php echo site_url() ?>/ca/resultat-cerca/?tipo-operacion=compra"
                            class="bg-coral btn text-white btn-search px-4 py-2 mb-3 text-uppercase">
                            Compra
                        </a>
                        <a href="<?php echo site_url() ?>/ca/resultat-cerca/?tipo-operacion=alquiler"
                            class="bg-coral btn text-white btn-search px-4 py-2 mb-3 text-uppercase">
                            Alquiler
                        </a>

                        <a href="<?php echo site_url() ?>/ca/contacte"
                            class="bg-coral btn text-white btn-search text-uppercase px-4 py-2">
                            Contacte
                        </a>
                    </div>
                </div>
                <?php } ?>
                <div class="col-md-6 col-12">
                    <div class="bg-image-regular"
                        style="background-image:url(<?php echo get_template_directory_uri() ?>/img/error.jpg)">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
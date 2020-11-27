<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fc_corporativa
 */

?>

</div><!-- #content -->
<footer id="colophon" class="site-footer bg-blue text-white pt-lg-5 pt-3">
    <section class="wrapper">
        <div class="container-fluid">
            <div class="row border-bottom">
                <div class="col-lg-3 col-6 pl-0 pb-3 footer-logo">
                    <?php
                    if ( !function_exists('dynamic_sidebar')
                    || !dynamic_sidebar('Footer_Logo') ) : ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-12 pl-0">

                    <div class="mt-4 mt-lg-3 text-left">
                        <?php
                        if ( !function_exists('dynamic_sidebar')
                        || !dynamic_sidebar('Footer_1') ) : ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-3 col-12 pl-lg-3 pl-0">
                    <div class="mt-4 mt-lg-3">
                        <?php
                            if ( !function_exists('dynamic_sidebar')
                            || !dynamic_sidebar('Footer_2') ) : ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-3 col-12 pl-lg-3 pl-0">
                    <div class="mt-4 mt-lg-3">
                        <?php
                            if ( !function_exists('dynamic_sidebar')
                            || !dynamic_sidebar('Footer_3') ) : ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-3 col-12 pr-0 pl-lg-3 pl-0 pt-3">
                    <?php
                        if ( !function_exists('dynamic_sidebar')
                        || !dynamic_sidebar('Footer_4') ) : ?>
                    <?php endif; ?>
                </div>

            </div>
        </div>
        <div class="container-fluid bg-grey-dark color-white">
            <div class="row py-3">
                <div class="col-sm-12 mt-1 footer-copyright px-0">
                    <div class="text-left">
                        <p class="mb-0 fs-08">
                            <?php if (pll_current_language() == 'es') { ?>
                            © 2020 · Aincasa · Todos los derechos reservados · Desarrollado por
                            <?php } else if (pll_current_language() == 'ca') { ?>
                            © 2020 · Aincasa · Tots els drets reservats · Desenvolupat per
                            <?php } ?>
                            <a href="https://www.factoriacreativabarcelona.es/diseno-web-barcelona/"
                                target="_blank">Factoria Creativa</a>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
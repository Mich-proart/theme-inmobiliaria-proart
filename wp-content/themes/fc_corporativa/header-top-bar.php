<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fc_corporativa
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <meta name="theme-color" content="#fff">
    <meta name="apple-mobile-web-app-status-bar-style" content="#fff">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
    <?php if (pll_current_language() == 'ca') { ?>
    <script>
    window.addEventListener("load", function() {
        window.cookieconsent.initialise({
            "palette": {
                "popup": {
                    "background": "#fff",
                    "text": "#4a4a4a"
                },
                "button": {
                    "background": "#000",
                    "text": "#fff",
                    "border": "#000"
                }
            },
            "content": {
                "message": "Utilitzem cookies pròpies i de tercers per a millorar l'experiència de l'usuari a través de la seva navegació. Si continues navegant acceptes el seu ús",
                "dismiss": "Entès",
                "link": "Politica de Cookies",
                "href": ""
            }
        })
    });
    </script>
    <?php }
    else if (pll_current_language() == 'es') { ?>
    <script>
    window.addEventListener("load", function() {
        window.cookieconsent.initialise({
            "palette": {
                "popup": {
                    "background": "#fff",
                    "text": "#4a4a4a"
                },
                "button": {
                    "background": "#000",
                    "text": "#fff",
                    "border": "#000"
                }
            },
            "content": {
                "message": "Utilizamos cookies propias y de terceros para mejorar la experiencia del usuario a través de su navegación. Si continúas navegando aceptas su uso",
                "dismiss": "Entendido",
                "link": "Política de Cookies",
                "href": "https://aincasa.fcweb.es/politica-privacidad/"
            }
        })
    });
    </script>
    <?php
    }
    wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site margin-top-content">
        <header id="masthead" class="site-header fixed-top">
            <nav class="navbar-main navbar-expand-lg
        <?php
        if ( is_user_logged_in() ) {
          $user = wp_get_current_user();
          if ($user->roles[0] == 'administrator') { ?>
            logged-admin
          <?php
          }
        }
        ?>
        navbar-transition top-bar-include">
                <a href="#" class="close-menu d-lg-none collapse">
                    <span aria-hidden="true" class="color-blue">&times;</span>
                </a>

                <?php
          if ( is_user_logged_in() ) {
            $user = wp_get_current_user();
            if ($user->roles[0] == 'administrator') { ?>
                <div class="fc-adminbar px-2 px-lg-5 bg-black color-custom-white
             fs-08 py-1">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-center justify-content-between">
                                    <a href="<?php echo site_url()?>/wp-admin">
                                        Panel de Gestión
                                    </a>
                                    <a href="<?php echo wp_logout_url() ?>">
                                        Cerrar Sesión
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
          }
          ?>

                <div class="top-bar wrapper bg-white pt-2 d-lg-block d-none">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-center justify-content-end">
                                    <!-- <div class="mr-3">
                                        <i class="icon-facebook mr-2 color-blue"></i>
                                        <i class="icon-twitter mr-2 color-blue"></i>
                                        <i class="icon-instagram mr-2 color-blue"></i>
                                        <i class="icon-linkedin mr-2 color-blue"></i>
                                        <i class="icon-pinterest mr-2 color-blue"></i>
                                        <i class="icon-marker mr-2 color-blue"></i>
                                        <i class="icon-phone mr-2 color-blue"></i>
                                        <i class="icon-email-1 mr-2 color-blue"></i>
                                        <i class="icon-search mr-2 color-blue"></i>
                                        <i class="icon-email-dark color-blue"></i>
                                    </div> -->
                                    <div class="es-ca d-flex justify-content-center align-items-center">

                                        <?php
                                          if (pll_current_language() == 'es') {
                                        ?>
                                        <span class="fs-08 fw-400 text-uppercase color-custom-black">
                                            ES
                                        </span>
                                        <span class="px-2">|</span>
                                        <a class="fs-08 fw-400 color-blue text-uppercase"
                                            href="<?php echo cpts_translation_url('ca') ?>">
                                            CA
                                        </a>
                                        <?php }
                                          else if (pll_current_language() == 'ca') { ?>
                                        <a class="fs-08 fw-400 color-blue text-uppercase"
                                            href="<?php echo cpts_translation_url('es') ?>">
                                            ES
                                        </a>
                                        <span class="px-2">|</span>
                                        <span class="fs-08 text-uppercase color-custom-black fw-400">
                                            CA
                                        </span>
                                        <?php }

                                          ?>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wrapper">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12 pl-0 pr-lg-3 pr-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="navbar-brand pt-3 pb-3 pb-lg-3 pt-lg-1">
                                        <?php the_custom_logo(); ?>
                                    </div>
                                    <?php
                                      wp_nav_menu([
                                      'menu'	           => 'primary',
                                      'theme_location'   => 'primary',
                                      'container'        => 'div',
                                      'container_id'     => 'navbar',
                                      'depth'            => 2,
                                      'container_class'  => 'menu collapse navbar-collapse justify-content-end pb-lg-3 pt-lg-1',
                                      'menu_id'          => 'main-menu',
                                      'menu_class'       => 'navbar-nav nav-primary text-lg-left text-center justify-content-lg-end justify-content-center',
                                      'fallback_cb'      => 'WP_Bootstrap_Navwalker::fallback',
                                      'walker'           => new WP_Bootstrap_Navwalker()
                                      ]);
                                    ?>
                                    <a class="navbar-toggler-right d-lg-none navbar-icon-menu" type="button"
                                        data-toggle="collapse" data-target="#navbar" aria-expanded="false"
                                        aria-label="Toggle navigation" href="#">
                                        <i class="icon-menu color-blue"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <div id="content" class="site-content">
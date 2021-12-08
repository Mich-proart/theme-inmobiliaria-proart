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
                "href": "https://servinghouse.es/politica-privacidad/"
            }
        })
    });
    </script>
    <?php wp_head(); ?>

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
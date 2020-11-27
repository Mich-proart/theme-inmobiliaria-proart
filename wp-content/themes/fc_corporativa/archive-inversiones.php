<?php

/* Template Name: Inversiones */


get_header('top-bar');

if (pll_current_language() == 'es') {
$page_object = get_queried_object();
$page = get_page_by_path($page_object->rewrite['slug']);
$page_id = $page->ID;
}
else if (pll_current_language() == 'ca') {
$page_id = 316;
}

?>



<!-- BANNER -->
<section class="banner-generico d-lg-flex align-items-end rel-wrapper limite">
    <?php img_with_alt_page('imagen_banner', $page_id); ?>

    <div class="container-fluid m-layaout py-lg-5 py-3 content-banner3">
        <div class="row">
            <div class="col-12">
                <h1 class="titulo-banner-second color-grey text-left text-uppercase">
                    <?php the_field('titulo_banner', $page_id) ?>
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
            <div class="col-lg-9 col-12 text-center px-lg-0">
                <div class="mt-3 mb-4">
                    <?php img_with_alt_page('imagen_logo_introduccion', $page_id); ?>
                </div>
                <p class=" mb-3 color-blue fs-11" style="line-height: 24px;"><?php the_field('texto_introduccion', $page_id) ?>
</p>
            </div>
        </div>
    </div>
</section>
<!-- /INTRODUCCIÓN -->

<div class="container-fluid m-layaout">

    <div class="row">
        <?php
        if ( have_posts() ) :
                $args = array(  'post_type' => 'inversiones',
                                'posts_per_page' => -1,
                );
                $wp_query = new WP_Query( $args );
                $counter =1;

        while ( $counter < 7 ) : $wp_query->the_post(); ?>

        <div class="col-lg-4" id="inversion<?php echo $counter; ?>">
            <div class="card mb-5 br-0 border-0">
                <a href="<?php the_permalink(); ?>">
                    <div class="property-image">
                        <?php img_with_alt_featured(); ?>
                    </div>
                </a>
                <div class="card-body bg-custom-black">

                    <div class="mb-3">
                        <a href="<?php the_permalink(); ?>">
                            <h4><?php the_title(); ?></h4>
                        </a>
                        <p class="card-text fw-500">
                            <?php the_field('ubicacion_de_la_inversion');?>
                        </p>
                    </div>

                    <p class="card-text">
                        <?php echo get_excerpt_cpts_inversiones('descripcion_inversiones'); ?>
                    </p>

                </div>
                <div class="card-footer bg-coral text-white text-center br-0">
                    <a href="<?php the_permalink(); ?>" class="leer-mas text-uppercase w-100 h-100 btn p-0">
                        Leer más
                    </a>
                </div>
            </div>
        </div>

        <?php
            $counter++;          
            endwhile;
        endif;
        wp_reset_query();
        ?>
    </div>
</div>

<!-- NEWSLETTERS -->
<section class="col-12 mb-lg-5 mb-3">
    <div class="container-fluid px-lg-0 px-3">
        <div class="row bg-custom-beige py-lg-0 py-4">
            <div class="col-lg-7 col-12 m-layaout-left pr-lg-3 pr-4 d-flex align-items-center">
                <div class="center">
                    <h3 class="suscribete color-blue"><?php the_field('titulo_suscribete', $page_id) ?></h3>
                    <p><?php the_field('texto_suscribete', $page_id) ?></p>
                    <form action="#">
                        <div class="container-fluid px-2">
                            <div class="row">
                                <div class="col-lg-8 col-12 px-2 py-lg-2 py-1">
                                    <span class="wpcf7-form-control-wrap your-email">
                                        <input type="email" name="your-email" value="" size="40"
                                            class="form-control b-r-0" aria-required="true" aria-invalid="false"
                                            placeholder="Email">
                                    </span>
                                </div>
                                <div
                                    class="col-lg-4 text-right float-right d-lg-flex justify-content-end px-2 py-lg-2 py-1 mt-4 mt-lg-0">
                                    <input type="submit" value="<?php if (pll_current_language() == 'es') { ?>SUSCRÍBETE<?php } else if (pll_current_language() == 'ca') { ?>SUBSCRIU-TE<?php } ?>"
                                        class="form-control text-white b-r-0 bg-coral br-0 btn-search text-uppercase px-4">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-5 pr-0 d-lg-block d-none">
                <?php img_with_alt_page('imagen_suscribete', $page_id); ?>
            </div>
        </div>
    </div>
</section>
<!-- /NEWSLETTERS -->

<div class="container-fluid m-layaout mb-2">

    <div class="row">
        <?php
                $args = array(  'post_type' => 'inversiones',
                                'posts_per_page' => 6,
                                'offset' => 6
                );
                $wp_query = new WP_Query( $args );
                $counter =1;

        while ( have_posts() ) : $wp_query->the_post(); ?>

        <div class="col-lg-4" id="inversion<?php echo $counter; ?>">
            <div class="card mb-5 br-0 border-0">
                <a href="<?php the_permalink(); ?>">
                    <div class="property-image">
                        <?php img_with_alt_featured(); ?>
                    </div>
                </a>
                <div class="card-body bg-custom-black">

                    <div class="mb-3">
                        <a href="<?php the_permalink(); ?>">
                            <h4><?php the_title(); ?></h4>
                        </a>
                        <p class="card-text fw-500">

                            <?php the_field('ubicacion_de_la_inversion');?>
                        </p>
                    </div>

                    <p class="card-text">
                        <?php echo get_excerpt_cpts_inversiones('descripcion_inversiones'); ?>
                    </p>

                </div>
                <div class="card-footer bg-coral text-white text-center br-0">
                    <a href="<?php the_permalink(); ?>" class="leer-mas text-uppercase w-100 h-100 btn p-0">
                        Leer más
                    </a>
                </div>
            </div>
        </div>

        <?php  $counter++;
            endwhile;
            wp_reset_query();
        ?>

    </div>

  <!--   <div class="row">
        <div class="col-lg-12 mb-5 d-flex justify-content-center">
            <div class="d-flex align-items-center justify-content-center">
                <div class="pagination">
                    <?php //echo pagination_bar($wp_query); ?>
                </div>
            </div>
        </div>
    </div> -->
</div>

<!-- FORMULARIO -->

<section class="bg-custom-beige py-lg-5 py-3">
    <div class="container-fluid m-layaout my-2">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12 text-center mt-lg-0 mt-3">
                <h2 class="color-blue mb-4 fw-500 text-center fs-14">
                    <?php the_field('titulo_contacto', $page_id) ?>
                </h2>
                <?php  
                $contact = get_field('codigo_formulario', $page_id);
                echo do_shortcode($contact);
                ?>
            </div>
        </div>
    </div>
</section>

<!-- /FORMULARIO -->

<?php

get_footer();
<?php

get_header();

?>


<!-- BANNER -->
<section class="img-proyectos d-flex align-items-center px-extra"
    style="background:url('<?php echo get_template_directory_uri() ?>/img/blog.jpg') center center; background-size:cover;">
    <div class="container" style="position:relative;">
        <div class="bg-transparent-white content-overlay ml-negativo-2 d-lg-none d-block"></div>
        <div class="row top-box">
            <div class="col-6 py-3">
                <?php if (pll_current_language() == 'es') {  ?>
                <h1 class="title-banner fw-semi-bold">Categoria - Blog</h1>
                <?php } elseif (pll_current_language() == 'ca') { ?>
                <h1 class="title-banner fw-semi-bold">Categoria - Blog</h1>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 px-0 pt-2 pl-2 d-lg-block d-none">
            <svg width="100%" height="111">
                <defs>
                    <pattern id="patron1" x="0" y="0" width="19" height="19" patternUnits="userSpaceOnUse"
                        viewBox="0 0 50 50">
                        <circle r=4 cx="4" cy="4" fill="#f4dfba" />
                    </pattern>
                </defs>
                <rect x="0" y="0" width="100%" height="111" stroke="0" fill="url(#patron1)" />
            </svg>
        </div>
        <div class="col-12 px-0 pt-1 pl-1 d-lg-none d-block">
            <svg width="100%" height="60">
                <defs>
                    <pattern id="patron2" x="0" y="0" width="18" height="18" patternUnits="userSpaceOnUse"
                        viewBox="0 0 50 50">
                        <circle r=4 cx="4" cy="4" fill="#f4dfba" />
                    </pattern>
                </defs>
                <rect x="0" y="0" width="100%" height="111" stroke="0" fill="url(#patron2)" />
            </svg>
        </div>
    </div>
</div>
<!-- /BANNER -->


<section class="px-extra">
    <div class="container my-lg-5 my-3">
      <div class="row">
        <div class="col-12">
          <?php blog_breadcrumbs() ?>
        </div>
      </div>
        <div class="row">
            <div class="col-lg-9 col-12 pr-xl-5 pr-lg-4 pr-3">
                <div class="row">
                    <?php

                    if ( have_posts() ) :

                    $args = array(  'posts_per_page' => 12,
                                    'paged' => $paged,
                                    'cat' => get_query_var('cat'),
                                    //'meta_key' => 'event_date',
                                    //'orderby' => 'meta_value',
                    );
                    $wp_query = new WP_Query( $args );

                    while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>


                    <div class="col-lg-6 col-12 mb-xl-5 mb-lg-4 mb-3">
                        <a href="<?php the_permalink(); ?>" class="d-block rel-wrapper">
                            <div style="background:url(<?php echo atrib_imagen_destacada(); ?>) center center; background-size:cover;"
                                class="img-blog">
                            </div>
                        </a>
                        <div class="mt-2 fs-08 fw-semi-bold color-beige" id="datos-entrada">
                            <?php echo get_the_author(); ?> | <?php echo get_the_date(); ?>
                            |
                            <?php echo get_the_category_list(); ?> </div>
                        <div class="text-blog-content">
                            <h3 class="my-3 color-grey text-left lg">
                                <?php the_title(); ?>
                            </h3>
                            <p><?php echo post_excerpt(270); ?></p>
                            <a href="<?php the_permalink(); ?>" class="fw-semi-bold"><ins>Leer más</ins></a>
                        </div>
                    </div>

                    <?php endwhile;
                                endif;
                            ?>

                </div>
            </div>
            <div class="col-lg-3 col-12 mt-lg-0 mt-3">
                <div class="row">
                    <div class="col-12">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php echo numeric_post_navigation() ?>
            </div>
        </div>
    </div>

</section>




<?php

get_footer();

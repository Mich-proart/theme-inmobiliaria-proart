<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package fc_corporativa
 */

get_header();
?>



<section id="primary" class="content-area">
    <div id="main" class="container-fluid">
        <div class="row justify-content-center">
            <?php if ( have_posts() ) : ?>
            <div class="col-12 px-0">
                <!-- BANNER -->
                <section class="img-proyectos d-flex align-items-center px-extra"
                    style="background:url('<?php echo get_template_directory_uri() ?>/img/blog.jpg') center center; background-size:cover;">
                    <div class="container" style="position:relative;">
                        <div class="bg-transparent-white content-overlay ml-negativo-2 d-lg-none d-block"></div>
                        <div class="row top-box">
                            <div class="col-6 py-3">
                                <?php if (pll_current_language() == 'es') {  ?>
                                <h1 class="page-title title-banner fw-semi-bold">
                                    <?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Resultados de busqueda para: %s', 'fc_corporativa' ), '<span>' . get_search_query() . '</span>' );
					?>
                                </h1>
                                <?php } elseif (pll_current_language() == 'ca') { ?>
                                <h1 class="page-title title-banner fw-semi-bold">
                                    <?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Busca Resultats per: %s', 'fc_corporativa' ), '<span>' . get_search_query() . '</span>' );
					?>
                                </h1>
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
                                    <pattern id="patron1" x="0" y="0" width="19" height="19"
                                        patternUnits="userSpaceOnUse" viewBox="0 0 50 50">
                                        <circle r=4 cx="4" cy="4" fill="#f4dfba" />
                                    </pattern>
                                </defs>
                                <rect x="0" y="0" width="100%" height="111" stroke="0" fill="url(#patron1)" />
                            </svg>
                        </div>
                        <div class="col-12 px-0 pt-1 pl-1 d-lg-none d-block">
                            <svg width="100%" height="60">
                                <defs>
                                    <pattern id="patron2" x="0" y="0" width="18" height="18"
                                        patternUnits="userSpaceOnUse" viewBox="0 0 50 50">
                                        <circle r=4 cx="4" cy="4" fill="#f4dfba" />
                                    </pattern>
                                </defs>
                                <rect x="0" y="0" width="100%" height="111" stroke="0" fill="url(#patron2)" />
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- /BANNER -->
            </div>
        </div>
    </div>
    <section class="px-extra">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 pb-4">
                    <?php

				while ( have_posts() ) : the_post();


				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				//get_template_part( 'template-parts/content', 'search' ); ?>


                    <div class="container mb-4 br-beige">
                        <div class="row">
                            <div class="col-12 px-0">
                                <div class="container-fluid bg-beige py-2">
                                    <h4 class="mb-0 text-white text-uppercase">
                                        <?php if($post->post_type == 'post') : ?>
                                        Post
                                        <?php elseif($post->post_type == 'servicios'): ?>
                                        <?php if (pll_current_language() == 'es') {  ?>
                                        Servicio
                                        <?php } elseif (pll_current_language() == 'ca') { ?>
                                        Servei
                                        <?php } ?> - <?php $term = get_field('tipo_de_servicio');
                                        if( $term ): ?>
                                        <?php echo esc_html( $term->name ); ?>
                                        <?php endif; ?>
                                        <?php elseif($post->post_type == 'proyecto'): ?>
                                        <?php if (pll_current_language() == 'es') {  ?>
                                        Proyecto
                                        <?php } elseif (pll_current_language() == 'ca') { ?>
                                        Projecte
                                        <?php } ?> -
                                        <?php elseif($post->post_type == 'page'): ?>
                                        <?php if (pll_current_language() == 'es') {  ?>
                                        Página
                                        <?php } elseif (pll_current_language() == 'ca') { ?>
                                        Pàgina
                                        <?php } ?> -
                                        <?php endif; ?>

                                    </h4>
                                </div>
                            </div>

                            <div class="col-lg-11 col-12 p-3">

                                <p class="card-title color-beige text-left">
                                    <b><a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?></a></b>
                                </p>
                                <div class="row py-1 info">

                                    <?php if($post->post_type == 'post') : ?>
                                    <div class="col-12 pr-0">
                                        <p class="text-left"><?php echo post_excerpt(107); ?></p>
                                    </div>
                                    <?php elseif($post->post_type == 'servicios'): ?>
                                    <div class="col-12 pr-0">
                                        <p class="text-left"><?php get_excerpt_cpts('detalle_del_servicio'); ?></p>
                                    </div>
                                    <?php elseif($post->post_type == 'proyectos'): ?>
                                    <div class="col-12 pr-0">
                                        <p class="text-left"><?php get_excerpt_cpts('detalle_del_servicio'); ?></p>
                                    </div>
                                    <?php endif; ?>
                                </div>



                            </div>
                        </div>
                    </div>

                    <?php endwhile; 
			?>
                </div>

                <?php else :

                         get_template_part( 'template-parts/content', 'none' );


                         endif; ?>

                <div class="col-lg-4 col-12">
                    <div class="container-fluid px-0 pt-lg-0 pt-4">
                        <div class="row">
                            <div class="col-12">
                                <?php get_sidebar(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- #main -->
    </section>
</section><!-- #primary -->

<?php
get_footer();
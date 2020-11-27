<?php

/* Template Name: Grids */

get_header('');
?>

<section id="banner">
    <div class="banner banner-desktop d-none d-lg-block"
        style="background-image:url(<?php the_field('banner_desktop_img') ?>)">
        <div class="bg-overlay"></div>
    </div>
    <div class="banner banner-mobile d-lg-none" style="background-image:url(<?php the_field('banner_mobile_img') ?>)">
        <div class="bg-overlay"></div>
    </div>
</section>

<section class="wrapper grid-boxes">
    <div class="container-fluid">

        <?php
  $args = array(  'posts_per_page' => -1,
                  'post_type' => 'servicios',
  );
  $wp_query = new WP_Query( $args );

  while ( $wp_query->have_posts() ) : $wp_query->the_post();
  ?>
        <div class="row my-5">
            <div class="col-lg-4 col-12 d-flex align-items-center text-lg-left text-center">
                <div class="card-servicios bg-custom-white py-4 pr-lg-5 pr-3 pl-lg-5 pl-3">
                    <h3 class="text-uppercase text-lg-left text-center lg">
                        <a href="<?php the_permalink(); ?>" class="fw-500">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                    <div class="text-lg-left text-center mb-lg-4 mb-0">
                        <?php the_field('service_description'); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="btn border-1 border-black
            bg-transparent b-r-0 text-uppercase px-4">
                        + info
                    </a>
                </div>
            </div>
            <div class="col-lg-8 col-12">
                <?php img_with_alt('service_img') ?>
            </div>
        </div>
        <?php
  endwhile;
  wp_reset_query();
  ?>
    </div>
</section>

<div class="my-5 py-5 bg-black">
</div>

<section class="wrapper grid-full">
    <div class="container-fluid">
        <?php
  $args = array(  'posts_per_page' => -1,
                  'post_type' => 'servicios',
  );
  $wp_query = new WP_Query( $args );

  while ( $wp_query->have_posts() ) : $wp_query->the_post();
  ?>
        <div class="row my-5 my-lg-0">
            <div class="col-lg-6 col-12 grid-full-text d-flex align-items-center text-lg-left text-center">
                <div class="card-servicios py-4">
                    <h3 class="text-uppercase text-lg-left d-none d-lg-block">
                        <a href="<?php the_permalink(); ?>" class="fw-500">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                    <div class="text-lg-left text-center mb-lg-4 mb-0">
                        <?php the_field('service_description'); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="btn border-1 border-black
            bg-transparent b-r-0 text-uppercase px-4">
                        + info
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-12 px-3 px-lg-0">
                <span class="fw-500 text-uppercase text-left d-block d-lg-none mb-4">
                    <a href="<?php the_permalink(); ?>" class="fw-500">
                        <?php the_title(); ?>
                    </a>
                </span>
                <?php img_with_alt('service_img') ?>
            </div>
        </div>
        <?php
  endwhile;
  wp_reset_query();
  ?>

    </div>
</section>

<?php
get_footer();
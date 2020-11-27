<?php

/* Template Name: Gallery */

get_header('no-margin');
?>

<section id="banner">
  <div class="banner banner-desktop d-none d-lg-block"
  style="background-image:url(<?php the_field('banner_desktop_img') ?>)">
    <div class="bg-overlay"></div>
  </div>
  <div class="banner banner-mobile d-lg-none"
  style="background-image:url(<?php the_field('banner_mobile_img') ?>)">
    <div class="bg-overlay"></div>
  </div>
</section>

<section id="gallery" class="mt-5 pt-md-5 wrapper">
  <div class="container-fluid">
    <div class="row d-flex align-items-center justify-content-center">
      <div class="col-12">
        <div class="container-fluid px-0">
          <div class="row">
            <?php
            if( have_rows('grid_galeria') ):
              while ( have_rows('grid_galeria') ) : the_row();
                if( get_row_layout() == '13' ): ?>

                <div class="col-lg-4 col-md-4 col-12 my-2 px-sm-2 px-0">
                  <?php img_with_alt_sub('imagen_13'); ?>
                </div>
                <div class="col-lg-4 col-md-4 col-12 my-2 px-sm-2 px-0">
                  <?php img_with_alt_sub('imagen_14'); ?>
                </div>
                <div class="col-lg-4 col-md-4 col-12 my-2 px-sm-2 px-0">
                  <?php img_with_alt_sub('imagen_15'); ?>
                </div>

              <?php elseif( get_row_layout() == '23' ): ?>

                <div class="col-lg-6 col-md-6 col-12 my-2 px-sm-2 px-0 height-100">
                  <?php img_with_alt_sub('imagen_23'); ?>
                </div>
                <div class="col-lg-6 col-md-6 col-12 my-2 px-sm-2 px-0 height-100">
                  <?php img_with_alt_sub('imagen_24'); ?>
                </div>

              <?php elseif( get_row_layout() == '33' ): ?>

                <div class="col-12 my-2 px-sm-2 px-0">
                  <?php img_with_alt_sub('imagen_33'); ?>
                </div>

              <?php elseif( get_row_layout() == '13_y_23' ): ?>

                <div class="col-lg-4 col-md-4 col-12 my-2 px-sm-2 px-0 height-100">
                  <?php img_with_alt_sub('imagen_16'); ?>
                </div>
                <div class="col-lg-8 col-md-8 col-12 my-2 px-sm-2 px-0 height-100">
                  <?php img_with_alt_sub('imagen_17'); ?>
                </div>

              <?php elseif( get_row_layout() == 'fila_de_23_y_13' ): ?>

                <div class="col-lg-8 col-md-8 col-12 my-2 px-sm-2 px-0 height-100">
                  <?php img_with_alt_sub('imagen_18'); ?>
                </div>
                <div class="col-lg-4 col-md-4 col-12 my-2 px-sm-2 px-0 height-100">
                  <?php img_with_alt_sub('imagen_19'); ?>
                </div>

              <?php endif;
            endwhile;
          endif;
          ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();

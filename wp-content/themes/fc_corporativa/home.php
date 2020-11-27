<?php

/* Template Name: Blog */

get_header();
$page_id = get_queried_object_id();
?>
<section id="banner" class="relative">
  <div class="banner banner-desktop d-none d-lg-block"
  style="background-image:url(<?php the_field('banner_desktop_img',$page_id ) ?>)">
    <div class="bg-overlay bg-black"></div>
  </div>
  <div class="banner banner-mobile d-lg-none"
  style="background-image:url(<?php the_field('banner_mobile_img',$page_id) ?>)">
    <div class="bg-overlay bg-black"></div>
  </div>
  <div class="banner-caption color-white z-index-11">
    <span class="text-uppercase fw-600 banner-caption-subtitle">
      Blog
    </span>
    <h1 class="banner-caption-title">
      <?php the_field('banner_title',$page_id) ?>
    </h1>
  </div>
</section>

<section class="wrapper">
  <div class="container-fluid my-lg-5 my-3">
    <div class="row">
      <div class="col-lg-9 col-12 pr-lg-5 pr-3">
        <div class="row">
        <?php
        $args = array(  'posts_per_page' => 6,
                        'paged' => $paged,
        );
        $wp_query = new WP_Query( $args );

        while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

          <div class="col-lg-6 col-12 mb-5">
            <a href="<?php the_permalink(); ?>" class="d-block rel-wrapper
              article-image">
              <div style="background-image:url(<?php echo get_featured_img(); ?>)"
                  class="bg-image-regular">
              </div>
            </a>
            <div class="my-3 d-flex">
                <span><?php echo get_the_author(); ?></span>
                <span class="mx-2">|</span>
                <span><?php echo get_the_date(); ?></span>
                <span class="mx-2">|</span>
                <span><?php echo get_the_category_list(); ?></span>
            </div>
            <div class="blog-list-content">
                <h3 class="my-3">
                    <?php the_title(); ?>
                </h3>
                <p><?php echo display_excerpt(230); ?></p>
                <a href="<?php the_permalink(); ?>"
                  class="border-bottom-1 border-black">
                  Leer más
                </a>
            </div>
          </div>
          <?php
          endwhile;
          wp_reset_query();
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

<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package fc_corporativa
 */

get_header('top-bar');
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




<?php
//get_sidebar();
get_footer();

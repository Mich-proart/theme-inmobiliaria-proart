<?php
/**
 * Custom breadcrumbs
 *
 * @package Factoria
 */

 /* ------------- Blog Breadcrumbs */
 function blog_breadcrumbs() {

   echo '<a href="'. home_url() .'">Home</a>';
   ?>
   <span class="color-grey mx-1">>></span>
   <?php
   echo '<a href="'. home_url("/blog/") .'">Blog</a>';
    if (is_category() || is_single()) {
        ?>
        <span class="color-grey mx-1">>></span>
        <?php
            if (is_single()) {
              the_category(' &bull; ');
              ?>
              <span class="color-grey mx-1">>></span>
              <span><?php
                the_title(); ?></span>
            <?php }
            else {
              single_cat_title();
            }
    } elseif (is_page()) {
        ?>
        <span class="color-grey mx-1">>></span>
        <?php
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
 }

 /* ------------- CPT Breadcrumbs */
 function cpt_breadcrumbs($cpt_name) {
   ?>
   <a class="text-uppercase"
   href="<?php echo site_url() . '/' . $cpt_name; ?>">
     <?php echo $cpt_name?>
   </a>
   <span class="color-grey mx-1">></span>
   <span>
     <?php the_title(); ?>
   </span>
<?php }

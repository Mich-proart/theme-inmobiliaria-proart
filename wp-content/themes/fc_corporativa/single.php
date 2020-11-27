<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package fc_corporativa
 */

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
                <h1 class="tit-banner-vision fw-bold">Blog</h1>
                <?php } elseif (pll_current_language() == 'ca') { ?>
                <h1 class="tit-banner-vision fw-bold">Blog</h1>
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

<div id="primary" class="content-area">
    <main id="main" class="site-main px-extra">
        <div class="container-fluid">
            <div class="d-lg-none mt-4">
                    <?php
                        get_search_form();          
                    ?>
                </div>
            <div class="row">
                <div class="col-12 px-0">
                    <?php
					while ( have_posts() ) :
						the_post();

                    get_template_part( 'template-parts/content', get_post_type() );
                    /* the_post_navigation(); */
                    ?>
                    <div class="container d-none">
                        <?php	 //If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;?>
                    </div>
                    <?php	endwhile; // End of the loop.
                    ?>
                </div>

            </div>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
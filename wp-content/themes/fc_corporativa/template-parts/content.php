<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fc_corporativa
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="container my-3">
        <div class="row">
            <div class="col-lg-9 col-12 entry-content pr-lg-5 pr-3">

                <header class="entry-header content">
                    <div style="background:url('<?php //echo atrib_imagen_destacada(); ?>') center center; background-size:cover;"
                        class="img-blog-single">
                    </div>
                    <?php if ( 'post' === get_post_type() ) :
			?>
                    <div class="mt-2 fs-1-lg fs-08 fw-semi-bold color-beige" id="datos-entrada-single">
                        <?php echo get_the_author(); ?> | <?php echo get_the_date(); ?>
                        |
                        <?php echo get_the_category_list(); ?>
                    </div><!-- .entry-meta -->
                    <?php endif; ?>
                    <div class="container px-0 mt-4">
                        <?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title color-grey my-2 text-left" style="position:relative;z-index:2;">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title color-grey my-2 text-left" style="position:relative;z-index:2;"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		?>
                    </div>
                </header><!-- .entry-header -->

                <?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'fc_corporativa' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fc_corporativa' ),
			'after'  => '</div>',
		) );
		?>
            </div><!-- .entry-content -->

            <div class="col-lg-3 col-12 mt-lg-0 mt-4">
                <div class="row">
                    <div class="col-12">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->

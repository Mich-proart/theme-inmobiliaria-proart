<?php
/**
 * Custom Blog Functions
 *
 * @package fc_corporativa
 */

/* ------------- Post Navigation */
function numeric_post_navigation() {

  if( is_singular() )
      return;

  global $wp_query;

  /** Stop execution if there's only 1 page */
  if( $wp_query->max_num_pages <= 1 )
      return;

  $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
  $max   = intval( $wp_query->max_num_pages );

  /** Add current page to the array */
  if ( $paged >= 1 )
      $links[] = $paged;

  /** Add the pages around the current page to the array */
  if ( $paged >= 3 ) {
      $links[] = $paged - 1;
      $links[] = $paged - 2;
  }

  if ( ( $paged + 2 ) <= $max ) {
      $links[] = $paged + 2;
      $links[] = $paged + 1;
  }

  echo '<div class="navigation d-flex align-items-center justify-content-center"><ul class="d-flex list-unstyled">' . "\n";

  /** Previous Post Link */
  if ( get_previous_posts_link() )
      printf( '<li class="pagination-text text-right">%s</li>' . "\n", get_previous_posts_link( __( '<img src="'.get_template_directory_uri().'/img/flecha-izquierda.png" class="img-fluid w-50">', 'textdomain' ) ) );

  /** Link to first page, plus ellipses if necessary */
  if ( ! in_array( 1, $links ) ) {
      $class = 1 == $paged ? ' class="active"' : '';

      printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

      if ( ! in_array( 2, $links ) )
          echo '<li class="mx-2">…</li>';
  }

  /** Link to current page, plus 2 pages in either direction if necessary */
  sort( $links );
  foreach ( (array) $links as $link ) {
      $class = $paged == $link ? ' class="active"' : '';
      printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
  }

  /** Link to last page, plus ellipses if necessary */
  if ( ! in_array( $max, $links ) ) {
      if ( ! in_array( $max - 1, $links ) )
          echo '<li class="mx-2">…</li>' . "\n";

      $class = $paged == $max ? ' class="active"' : '';
      printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
  }

  /** Next Post Link */
  if ( get_next_posts_link() )
      printf( '<li class="pagination-text">%s</li>' . "\n", get_next_posts_link( __( '<img src="'.get_template_directory_uri().'/img/flecha-derecha.png" class="img-fluid w-50">', 'textdomain' ) ) );

  echo '</ul></div>' . "\n";

}

/* ------------- Filter for Excerpt Length */
function fc_excerpt_length( $length ) {
		return 15;
}
add_filter( 'excerpt_length', 'fc_excerpt_length', 999 );

/* ------------- Filter Excerpt More */
function fc_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'fc_excerpt_more' );

/* ------------- Custom Excerpt */
function display_excerpt($number) {
		$excerpt = get_the_content();
		/*$excerpt = preg_replace(" ([.*?])",'',$excerpt);*/
		$excerpt = strip_shortcodes($excerpt);
		$excerpt = strip_tags($excerpt);
		$excerpt = substr($excerpt, 0, $number);
		$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
		$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
		$excerpt = $excerpt.'...';
		return $excerpt;
}

/* ------------- img feature for the Blog */

function get_featured_img() {
    global $post;
    $thumbID = get_post_thumbnail_id( $post->ID );
    $imgDestacada = wp_get_attachment_image_src( $thumbID, 'full' ); // Sustituir por thumbnail, medium, large o full
    return $imgDestacada[0]; // 0 = ruta, 1 = altura, 2 = anchura, 3 = boolean
}

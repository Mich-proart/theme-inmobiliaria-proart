<?php
/**
 * Handle filter parameters and build response
 *
 * @package fc-corporativa
 */


/* ------------- search Filter */
add_action('wp_ajax_searchfilter', 'searchfilter');
add_action('wp_ajax_nopriv_searchfilter', 'searchfilter');
function searchfilter() {

    if (!empty($_POST['tipo_operacion_1'])) {
        $tipo_operacion_1 = $_POST['tipo_operacion_1'];
    
    }
        $tipo_propiedad_1 = '';
        $poblacion_1 = '';
        $zona_poblacion = '';
        $selected_orden='';
        
    if (!empty($_POST['tipo_propiedad_1'])) {
        $tipo_propiedad_1 = $_POST['tipo_propiedad_1'];
    }

    if (!empty($_POST['poblacion_1'])) {
        $poblacion_1 = $_POST['poblacion_1'];
    }
    
    if (!empty($_POST['zona_poblacion'])) {
        $zona_poblacion = $_POST['zona_poblacion'];
    }
    
    if (!empty($_POST['precio'])) {
        $precio = $_POST['precio'];
    }

    if (!empty($_POST['refe'])) {
        $refe = $_POST['refe'];
    }

    if (!empty($_POST['selected_orden'])) {
        $selected_orden = $_POST['selected_orden'];
    }



/* $compra = 'COMPRA';
$alquiler = 'ALQUILER'; */

if (!empty($tipo_propiedad_1)) {
$item['taxonomy'] = 'tipo-propiedad';
$item['terms'] = $tipo_propiedad_1;
$item['field'] = 'term_id';
$list[]=$item;
}

$item['taxonomy'] = 'tipo-operacion';
$item['terms'] = $tipo_operacion_1;
$item['field'] = 'term_id';
$list[]=$item;

$cleanArray = array_merge(array('relation' => 'AND'), $list);
$meta_queries = '';

if (!empty($poblacion_1) && !empty($zona_poblacion)) {
  $meta_queries_location = array (
    array (
      'key'		=> 'poblacion',
      'value'	=> $poblacion_1,
    ),
    array (
      'key'		=> 'zona',
      'value'	=> $zona_poblacion,
    ),
  );
}
else {
  $meta_queries_location = '';
}

if (!empty($precio)) {
    $meta_queries_precio = array(
      array (
        'key'		=> 'precio',
        'value'		=> $precio,
        'type'		=> 'NUMERIC',
        'compare'	=> '<='
      ),
    );
} else {
    $meta_queries_precio='';
}

if (!empty($refe)) {
    $meta_queries_refe = array(
      array (
        'key'		=> 'referencia_de_la_propiedad',
        'value'		=> $refe,
        'type'		=> 'TEXT',
        'compare'	=> '=='
      ),
    );
} else {
    $meta_queries_refe='';
}


$meta_queries = array('relation' => 'AND');
$meta_queries[0] = $meta_queries_location;
$meta_queries[1] = $meta_queries_precio;
$meta_queries[2] = $meta_queries_refe;

if ($selected_orden == 'precio_menor') {
    $args_propiedades = array(
        'post_type'       =>  'propiedades',
        'posts_per_page'  =>  10,
        'paged'           =>  $paged,
        'tax_query'       =>  $cleanArray,
        'meta_query'      =>  $meta_queries,
        'orderby' => 'meta_value_num',
        'meta_key' => 'precio',
        'order' => 'ASC',
    );
}
elseif ($selected_orden == 'precio_mayor') {
    $args_propiedades = array(
        'post_type'       =>  'propiedades',
        'posts_per_page'  =>  10,
        'paged'           =>  $paged,
        'tax_query'       =>  $cleanArray,
        'meta_query'      =>  $meta_queries,
        'orderby' => 'meta_value_num',
        'meta_key' => 'precio',
        'order' => 'DESC',
    );
} 
elseif($selected_orden == 'recientes'){
    $args_propiedades = array(
        'post_type'       =>  'propiedades',
        'posts_per_page'  =>  10,
        'paged'           =>  $paged,
        'tax_query'       =>  $cleanArray,
        'meta_query'      =>  $meta_queries,
        'orderby' => 'date',
        'order' => 'DESC',
    );
}
else{
    $args_propiedades = array(
        'post_type'       =>  'propiedades',
        'posts_per_page'  =>  10,
        'paged'           =>  $paged,
        'tax_query'       =>  $cleanArray,
        'meta_query'      =>  $meta_queries,
    );
}


/* 
print_r2($meta_queries); */
?>




<?php
    $search_query = new WP_Query( $args_propiedades );
    if ( $search_query->have_posts() ) :
    while ( $search_query->have_posts() ) : $search_query->the_post();
    $post_id = get_the_ID();
?>

<div class="col-lg-6 col-12">
    <div class="card mb-5 br-0 border-right border-top-0 border-bottom-0 border-left-0 br-x">
        <div class="galeria-resultados">

            <?php
                if( have_rows('slider_propiedades') ):
                while ( have_rows('slider_propiedades') ) : the_row();
            ?>

            <div class="img-zonas-home">
                <?php img_with_alt_sub('imagen_propiedades'); ?>
            </div>

            <?php
                endwhile;
                endif;
            ?>

        </div>
        <div class="card-body border-left br-0">
            <a href="<?php the_permalink(); ?>">
                <h3 class="mb-1 propiedad color-orange-gradiente fw-900"><?php the_title(); ?></h3>
            </a>

            <?php 
                if ( is_user_logged_in() ) {

                $user = wp_get_current_user();
                $user_id = $user->ID;
                $user_info = get_userdata($user_id);

                if ( in_array( 'vendedor', $user_info->roles ) || in_array( 'administrator', $user_info->roles ) ) : 
            ?>
            <p class="direccion fs-08 fw-600"><?php the_field('ubicacion_de_la_propiedad'); ?></p>

            <?php endif;
                }else {
                    echo '<span class="text-white direccion fs-08 fw-600">Suscríbete para ver contenido oculto</span>';	
            }?>
            <div class="container">
                <div class="row">
                    <?php
                        if( have_rows('caracteristicas') ):
                        while ( have_rows('caracteristicas') ) : the_row();
                    ?>

                    <div class="col-6 px-0 mx-0">

                        <div class="mb-3 d-flex align-items-center">
                            <span class="icon-area color-coral fs-18 mr-2"></span>
                            <p class="mb-0 fs-09"><?php the_sub_field('metros_cuadrados'); ?> m<sup>2</sup></p>
                        </div>
                        <div class="mb-3 d-flex align-items-center">
                            <span class="icon-bathroom color-coral fs-18 mr-2"></span>
                            <p class="mb-0 fs-09"> <?php the_sub_field('banos'); ?>
                            <?php pll_e('Baños'); ?>
                            </p>
                        </div>


                    </div>

                    <div class="col-6 px-0 mx-0">
                        <div class="mb-3 d-flex align-items-center">
                            <span class="icon-bed color-coral fs-18 mr-2"></span>
                            <p class="mb-0 fs-09"><?php the_sub_field('habitaciones'); ?>
                            <?php pll_e('Habitaciones'); ?>
                            </p>
                        </div>
                        <div class="mb-3 d-flex align-items-center">
                            <span class="icon-parking color-coral fs-18 mr-2"></span>
                            <p class="mb-0 fs-09"> <?php the_sub_field('plazas_de_parkings'); ?>
                            <?php pll_e('Plaza garaje'); ?>
                            </p>
                        </div>
                    </div>
                    <?php
                        endwhile;
                        endif;
                    ?>
                    <div class="col-12">
                        <a href="<?php the_permalink(); ?>" class="color-black">Ver Detalles</a>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer px-5 bg-coral d-flex justify-content-between border-0">
            <span
                class="text-uppercase precio text-white fw-600"><?php pll_e('Precio'); ?></span>
            
            <span
                class="text-white direccion fw-600"><?php echo number_format(intval(get_field('precio')), 0,",","."); ?>
                <?php if ($tipo_operacion_1 == 80) { ?>
                €
                <?php }else{?>
                €/mes
                <?php } ?>
            </span>
        </div>
    </div>
</div>
<?php
    endwhile;
    wp_reset_postdata();

    else :
?>
<div class="col-12">

    <span class="titulo-resultados"><?php pll_e('No hay resultados para la búsqueda actual.'); ?> </span>

</div>
<?php
endif;
  die();
}
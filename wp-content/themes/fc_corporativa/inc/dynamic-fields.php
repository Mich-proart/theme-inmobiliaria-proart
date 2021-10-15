<?php
/**
 * Handle Dynamic Fields for Location
 *
 * @package Aincasa
 */

/* ------------- Dynamic Load zone Field */
add_action('wp_ajax_loadzone', 'loadzone');
add_action('wp_ajax_nopriv_loadzone', 'loadzone');
function loadzone() {
$poblacion_value = $_POST['poblacion_value'];
$args_poblacion =
array(  'post_type'     	=> 'poblacion',
        'posts_per_page' 	=> -1,
        'orderby'					=> 'title',
        'order'   				=> 'ASC'
        );

/* $poblaciones_query = new WP_Query( $args_poblacion );
while ( $poblaciones_query->have_posts() ) : $poblaciones_query->the_post();
$post_title = get_the_title();
  if ($post_title == $poblacion_value) {
    $chosen_poblacion_id = get_the_ID();
  }
endwhile;
wp_reset_postdata();
   */
  ?>
<option value>Zona</option>
<option value>Indiferente</option>

<?php

    $args_zones =
    array(  'post_type'     	=> 'zona',
            'posts_per_page' 	=> -1,
            'orderby'					=> 'title',
            'order'   				=> 'ASC',
            'meta_query' => array(
              array(
                  'key'     => 'location_poblacion',
                  'value'   => $poblacion_value,
              ),
            ));
    $zones_query = new WP_Query( $args_zones );
    if( $zones_query->have_posts() ) {
    while ( $zones_query->have_posts() ) : $zones_query->the_post();
      $post_id = get_the_ID();
      ?>

<option value="<?php echo $post_id ?>"><?php the_title() ?></option>
<?php endwhile;
    wp_reset_postdata();
    }
    else {
        echo '<option value>No hay resultados para esa Población</option>';
    }
  ?>


<?php
  die();
}


add_action('wp_ajax_loadprecio', 'loadprecio');
add_action('wp_ajax_nopriv_loadprecio', 'loadprecio');
function loadprecio() {
$tipo_operacion_2 = $_POST['tipo_operacion_2'];
?>

<label class="color-coral ml-3">Precio maximo</label>
<select class="form-control" id="precio" name="precio">
    <option value="5000000">Indiferente</option>
    <?php if ($tipo_operacion_2 == 8 || $tipo_operacion_2 == 36) { ?>
    <option value="50000">50.000 €</option>
    <option value="100000">100.000 €</option>
    <option value="150000">150.000 €</option>
    <option value="200000">200.000 €</option>
    <option value="250000">250.000 €</option>
    <option value="300000">300.000 €</option>
    <option value="350000">350.000 €</option>
    <option value="400000">400.000 €</option>
    <option value="450000">450.000 €</option>
    <option value="500000">500.000 €</option>
    <option value="600000">600.000 €</option>
    <option value="700000">700.000 €</option>
    <option value="800000">800.000 €</option>
    <option value="900000">900.000 €</option>
    <option value="1000000">1.000.000 €</option>
    <option value="2000000">2.000.000 €</option>
    <option value="3000000">3.000.000 €</option>
    <option value="4000000">4.000.000 €</option>
    <?php } elseif($tipo_operacion_2 == 7|| $tipo_operacion_2 == 39) { ?>
    <option value="500">500 €</option>
    <option value="600">600 €</option>
    <option value="650">650 €</option>
    <option value="700">700 €</option>
    <option value="750">750 €</option>
    <option value="800">800 €</option>
    <option value="850">850 €</option>
    <option value="900">900 €</option>
    <option value="950">950 €</option>
    <option value="1000">1000 €</option>
    <option value="1200">1.200 €</option>
    <option value="1300">1.300 €</option>
    <option value="1400">1.400 €</option>
    <option value="1500">1.500 €</option>
    <option value="1600">1.600 €</option>
    <option value="1700">1.700 €</option>
    <option value="1800">1.800 €</option>
    <option value="1900">1.900 €</option>
    <option value="2000">2.000 €</option>
    <?php } ?>

</select>

<?php
  die();
}
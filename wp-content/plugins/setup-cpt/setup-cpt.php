<?php
/**
 * Plugin Name: Setup CPT
 * Description: Register CPTs and Custom taxonomies
 * Version: 1.0.1
 * Author: Factoria Creativa
 * Author URI: https://www.factoriacreativabarcelona.es
*/


/*
==============================
Register CPT
==============================
*/
function registration_cpt() {

/* ------------- First CPT */
  register_post_type('propiedades',
       array(
           'labels' => array(
               'name'              => __('Propiedades'),
           ),
           'public'      => true,
           'has_archive' => true,
           'menu_icon'   => 'dashicons-editor-ul',
           'supports' => array( 'title','thumbnail' ),
           'rewrite' => array( 'with_front' => false ),
       )
  );

/* ------------- Second CPT */
  register_post_type('inversiones',
      array(
          'labels' => array(
              'name'              => __('Inversiones'),
          ),
          'public'      => true,
          'has_archive' => true,
          'menu_icon'   => 'dashicons-portfolio',
          'supports' => array( 'title','thumbnail' ),
          'rewrite' => array( 'with_front' => false ),
      )
    );

    /* ------------- Tree CPT */
  register_post_type('poblacion',
  array(
      'labels' => array(
          'name'              => __('Población'),
      ),
      'public'      => true,
      'has_archive' => true,
      'menu_icon'   => 'dashicons-location',
      'supports' => array( 'title','thumbnail' ),
      'rewrite' => array( 'with_front' => false ),
  )
);

/* ------------- Four CPT */
register_post_type('zona',
 array(
     'labels' => array(
         'name'              => __('Zona'),
     ),
     'public'      => true,
     'has_archive' => true,
     'menu_icon'   => 'dashicons-location',
     'supports' => array( 'title','thumbnail' ),
     'rewrite' => array( 'with_front' => false ),
 )
);

 }
 add_action( 'init', 'registration_cpt' );

/* ------------- Activation Hook */
 function register_cpt() {
     registration_cpt();
     flush_rewrite_rules();
 }
 register_activation_hook( __FILE__, 'register_cpt' );

/* ------------- Update CPT Labels */

add_action( 'init', 'change_cpt_label' );
function change_cpt_label() {
    $get_post_type = get_post_type_object('propiedades');
    $labels = $get_post_type->labels;
    $labels->name = 'Propiedades';
    $labels->singular_name = 'propiedad';
    $labels->add_new = 'Añadir propiedad';
    $labels->add_new_item = 'Añadir propiedad';
    $labels->edit_item = 'Editar propiedad';
    $labels->new_item = 'propiedades';
    $labels->view_item = 'Ver propiedades';
    $labels->search_items = 'Buscar propiedad';
    $labels->not_found = 'No se encontró la propiedad';
    $labels->all_items = 'Todos las propiedades';
    $labels->menu_name = 'Propiedades';
    $labels->name_admin_bar = 'Propiedades';
    $get_post_type = get_post_type_object('inversiones');
    $labels = $get_post_type->labels;
    $labels->name = 'Inversiones';
    $labels->singular_name = 'inversión';
    $labels->add_new = 'Añadir inversión';
    $labels->add_new_item = 'Añadir inversión';
    $labels->edit_item = 'Editar inversión';
    $labels->new_item = 'inversiones';
    $labels->view_item = 'Ver inversiones';
    $labels->search_items = 'Buscar inversión';
    $labels->not_found = 'No se encontró un inversión';
    $labels->all_items = 'Todos los inversiones';
    $labels->menu_name = 'Inversiones';
    $labels->name_admin_bar = 'Inversiones';
    $get_post_type = get_post_type_object('poblacion');
    $labels = $get_post_type->labels;
    $labels->name = 'Población';
    $labels->singular_name = 'Población';
    $labels->add_new = 'Añadir Población';
    $labels->add_new_item = 'Añadir Población';
    $labels->edit_item = 'Editar Población';
    $labels->new_item = 'Población';
    $labels->view_item = 'Ver Población';
    $labels->search_items = 'Buscar Población';
    $labels->not_found = 'No se encontró un Población';
    $labels->all_items = 'Todos los Población';
    $labels->menu_name = 'Población';
    $labels->name_admin_bar = 'Población';
    $get_post_type = get_post_type_object('zona');
    $labels = $get_post_type->labels;
    $labels->name = 'Zona';
    $labels->singular_name = 'Zona';
    $labels->add_new = 'Añadir Zona';
    $labels->add_new_item = 'Añadir Zona';
    $labels->edit_item = 'Editar Zona';
    $labels->new_item = 'Zona';
    $labels->view_item = 'Ver Zona';
    $labels->search_items = 'Buscar Zona';
    $labels->not_found = 'No se encontró un Zona';
    $labels->all_items = 'Todos los Zona';
    $labels->menu_name = 'Zona';
    $labels->name_admin_bar = 'Zona';
}
 /*
 ==============================
 Register Taxonomies
 ==============================
 */

function registration_taxonomy() {

/* ------------- First Taxonomy */
  $labels = [
    'name'              => _x('Tipo de propiedades', 'taxonomy general name'),
    'singular_name'     => _x('Tipo de propiedad', 'taxonomy singular name'),
    'search_items'      => __('Buscar tipo de propiedad'),
    'all_items'         => __('Todos los Tipos de propiedad'),
    'edit_item'         => __('Editar tipo de propiedad'),
    'update_item'       => __('Actualizar tipo de propiedad'),
    'add_new_item'      => __('Añadir Nuevo tipo de propiedad'),
    'new_item_name'     => __('Nombre de tipo de propiedad'),
    'menu_name'         => __('Tipo de propiedad'),
  ];
  $args = [
    'hierarchical'      => true, // make it hierarchical (like categories)
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    //'meta_box_cb'       => 'post_categories_meta_box',
    'rewrite'           => ['slug' => 'tipo-propiedad'],
  ];
  register_taxonomy('tipo-propiedad',  'propiedades', $args);

  /* ------------- Second Taxonomy */
  $labels = [
    'name'              => _x('Tipo de operación', 'taxonomy general name'),
    'singular_name'     => _x('Tipo de operación', 'taxonomy singular name'),
    'search_items'      => __('Buscar Tipo de operación'),
    'all_items'         => __('Todos los Tipos de operaciones'),
    'edit_item'         => __('Editar Tipo de operación'),
    'update_item'       => __('Actualizar Tipo de operación'),
    'add_new_item'      => __('Añadir Nuevo Tipo de operación'),
    'new_item_name'     => __('Nombre de Tipo de operación'),
    'menu_name'         => __('Tipos de operación'),
  ];
  $args = [
    'hierarchical'      => true, // make it hierarchical (like categories)
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    //'meta_box_cb'       => 'post_categories_meta_box',
    'rewrite'           => ['slug' => 'tipo-operacion'],
  ];

register_taxonomy('tipo-operacion', 'propiedades', $args);
}
add_action('init', 'registration_taxonomy');

function register_custom_taxonomy() {
  registration_taxonomy();
  flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'register_custom_taxonomy' );
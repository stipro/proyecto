<?php 

/**
 * La primera función de pruebas del curso de creando el framework MVC
 *
 * @return void
 */
function en_custom() {
  return 'ESTOY DENTRO DE CUSTOM_FUNCTIONS.';
}

/**
 * Carga las diferentes divisas soporatadas en el proyecto de pruebas
 *
 * @return void
 */
function get_coins() {
  return 
  [
    'MXN',
    'USD',
    'CAD',
    'EUR',
    'ARS',
    'AUD',
    'JPY'
  ];
}

function format_temario_estado($estado)
{
  $text        = '';
  $classes     = '';
  $icon        = '';
  $placeholder = '<span class="%s"><i class="%s"></i> %s</span>';

  switch ($estado) {
    case 'borrador':
      $text    = 'Borrador';
      $classes = 'badge bg-warning text-dark';
      $icon    = 'fas fa-eraser';
      break;
    case 'realizado':
      $text    = 'Realizado';
      $classes = 'badge bg-success';
      $icon    = 'fas fa-check';
      break;
    default:
      $text    = 'Desconocido';
      $classes = 'badge bg-danger';
      $icon    = 'fas fa-question-circle';
  }

  return sprintf($placeholder, $classes, $icon, $text);
}

function get_all_marcas()
{
  $select = array();
  $allMarcas = marcasModel::all();
  foreach ($allMarcas as $clMarcas) {
    $item = [$clMarcas['nombre_marca'], $clMarcas['id_marca'], $clMarcas['nombre_marca']];
    array_push($select, $item);
  }
  return $select;
}

function get_all_categorias()
{
  $select = array();
  $allCategorias = categoriasModel::all();
  foreach ($allCategorias as $clCategorias) {
    $item = [$clCategorias['nombre_categoria'], $clCategorias['id_categoria'], $clCategorias['nombre_categoria']];
    array_push($select, $item);
  }
  return $select;
}

function get_all_productos()
{
  $select = array();
  $allProductos = productosModel::all();
  foreach ($allProductos as $clProductos) {
    $item = [$clProductos['nombre_producto'], $clProductos['id_producto'], $clProductos['nombre_producto']];
    array_push($select, $item);
  }
  return $select;
}


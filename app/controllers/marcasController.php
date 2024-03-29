<?php

/**
 * Plantilla general de controladores
 * Versión 1.0.2
 *
 * Controlador de marcas
 */
class marcasController extends Controller
{
  function __construct()
  {
    // Validación de sesión de usuario, descomentar si requerida
    /* if (!Auth::validate()) {
      Flasher::new('Debes iniciar sesión primero.', 'danger');
      Redirect::to('login');
    } */
  }

  function index()
  {
    /* debug(marcasModel::all_paginated());
    die; */
    $data =
      [
        'title' => 'Marcas',
        'msg'   => 'Bienvenido al controlador de "marcas", se ha creado con éxito si ves este mensaje.',
        'padding' => '0px',
        'height' => '100vh',
        'title_crud' => 'Marca',
        'marcas' => marcasModel::all_paginated()
      ];

    // Descomentar vista si requerida
    View::render('index', $data);
  }

  function ver($id)
  {
    View::render('ver');
  }

  function agregar()
  {
    View::render('agregar');
  }

  function post_agregar()
  {
  }

  function editar($id)
  {
    View::render('editar');
  }

  function post_editar()
  {
  }

  function borrar($id)
  {
    // Proceso de borrado
  }
}

<?php

/**
 * Plantilla general de controladores
 * Versión 1.0.2
 *
 * Controlador de salidas
 */
class salidasController extends Controller
{
  function __construct()
  {
    // Validación de sesión de usuario, descomentar si requerida
    /**
    if (!Auth::validate()) {
      Flasher::new('Debes iniciar sesión primero.', 'danger');
      Redirect::to('login');
    }
     */
  }

  function index()
  {
    $rptNumSalida = salidasModel::nSalida();
    $numsalida = str_pad($rptNumSalida[0]['nSalida'], 8, "0", STR_PAD_LEFT);
    /* debug(salidasModel::all_paginated());
    die; */
    $data =
      [
        'title' => 'Salidas',
        'msg'   => 'Bienvenido al controlador de "salidas", se ha creado con éxito si ves este mensaje.',
        'padding' => '0px',
        'height' => '100vh',
        'nsalida' => $numsalida
        /* 'salidas' => salidasModel::all_paginated() */
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

<?php

/**
 * Plantilla general de controladores
 * Versión 1.0.2
 *
 * Controlador de kardex
 */
class kardexController extends Controller
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
    $rptNumIngreso = ingresosModel::nIngreso();
    $numIngreso = str_pad($rptNumIngreso[0]['nIngreso'], 8, "0", STR_PAD_LEFT);
    $rptNumSalida = salidasModel::nSalida();
    $numsalida = str_pad($rptNumSalida[0]['nSalida'], 8, "0", STR_PAD_LEFT);
    /* debug(kardexModel::all_general());
    die; */
    $data =
      [
        'title' => 'Kardex',
        'msg'   => 'Bienvenido al controlador de "kardex", se ha creado con éxito si ves este mensaje.',
        'padding' => '0px',
        'height' => '100vh',
        'ningreso' => $numIngreso,
        'nsalida' => $numsalida,
        'kardex' => kardexModel::all_general()
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

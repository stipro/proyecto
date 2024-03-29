<?php

/**
 * Plantilla general de controladores
 * Versión 1.0.2
 *
 * Controlador de ingresos
 */
class ingresosController extends Controller
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
    $numIngreso = $rptNumIngreso[0]['nIngreso'];
    $newNumIngreso = str_pad($numIngreso+1, 8, "0", STR_PAD_LEFT);
    /* debug($numIngreso);
    die; */
    $data =
      [
        'title' => 'Ingresos',
        'msg'   => 'Bienvenido al controlador de "ingresos", se ha creado con éxito si ves este mensaje.',
        'padding' => '0px',
        'height' => '100vh',
        'ningreso' => $newNumIngreso
        /* 'ingresos' => ingresosModel::all_paginated() */
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

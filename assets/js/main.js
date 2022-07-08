$(document).ready(function () {

  // Toast para notificaciones
  //toastr.warning('My name is Inigo Montoya. You killed my father, prepare to die!');

  // Waitme
  //$('body').waitMe({effect : 'orbit'});

  /**
   * Alerta para confirmar una acción establecida en un link o ruta específica
   */
  $('body').on('click', '.confirmar', function (e) {
    e.preventDefault();

    let url = $(this).attr('href'),
      ok = confirm('¿Estás seguro?');

    // Redirección a la URL del enlace
    if (ok) {
      window.location = url;
      return true;
    }

    console.log('Acción cancelada.');
    return true;
  });

  /**
   * Inicializa summernote el editor de texto avanzado para textareas
   */
  if ($('.summernote').length !== 0) {
    $('.summernote').summernote({
      placeholder: 'Escribe en este campo...',
      tabsize: 2,
      height: 300
    });
  }

  ////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////
  ///////// NO REQUERIDOS, SOLO PARA EL PROYECTO DEMO DE GASTOS E INGRESOS
  ////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////

  $('#insertIpt-brands-product, #insertIpt-categories-product').select2({
    theme: 'bootstrap-5',
    dropdownParent: $('#mdAdd-product'),
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    placeholder: $(this).data('placeholder'),
    allowClear: true,
    "language": {
      "noResults": function () {
        return "No se han encontrado resultados <a href='#' class='btn btn-danger'>úsalo de todos modos</a>";
      }
    },
    escapeMarkup: function (markup) {
      return markup;
    }
  });

  $('#editIpt-brands-product, #editIpt-categories-product').select2({
    theme: 'bootstrap-5',
    dropdownParent: $('#mdEdit-product'),
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    placeholder: $(this).data('placeholder'),
    allowClear: true,
    "language": {
      "noResults": function () {
        return "No se han encontrado resultados <a href='#' class='btn btn-danger'>úsalo de todos modos</a>";
      }
    },
    escapeMarkup: function (markup) {
      return markup;
    }
  });

  $('#insertIpt-product-income').select2({
    theme: 'bootstrap-5',
    dropdownParent: $('#mdAdd-income'),
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    placeholder: $(this).data('placeholder'),
    allowClear: true,
    "language": {
      "noResults": function () {
        return "No se han encontrado resultados <a href='#' class='btn btn-danger'>úsalo de todos modos</a>";
      }
    },
    escapeMarkup: function (markup) {
      return markup;
    }
  });

  $('#insertIpt-product-output').select2({
    theme: 'bootstrap-5',
    dropdownParent: $('#mdAdd-output'),
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    placeholder: $(this).data('placeholder'),
    allowClear: true,
    "language": {
      "noResults": function () {
        return "No se han encontrado resultados <a href='#' class='btn btn-danger'>úsalo de todos modos</a>";
      }
    },
    escapeMarkup: function (markup) {
      return markup;
    }
  });

  /*   get_brands();
    function get_brands() {
      var wrapper = $('.wrapper_brands'),
        hook = 'bee_hook',
        action = 'get';
  
      if (wrapper.length === 0) {
        return;
      }
  
      $.ajax({
        url: 'ajax/get_table_brands',
        type: 'POST',
        dataType: 'json',
        cache: false,
        data: {
          hook, action
        },
        beforeSend: function () {
          wrapper.waitMe();
        }
      }).done(function (res) {
        if (res.status === 200) {
          wrapper.html(res.data);
          //select2All();
        } else {
          toastr.error(res.msg, '¡Upss!');
          wrapper.html(res.msg);
        }
      }).fail(function (err) {
        toastr.error('Hubo un error en la petición', '¡Upss!');
        wrapper.html('Hubo un error al cargar los productos, intenta más tarde.');
      }).always(function () {
        wrapper.waitMe('hide');
      })
    } */

  $(document).on('click', '#btnAdd-md-brand', function () {
    $('#mdAdd-brand').modal('show');
  });

  $(document).on('click', '#btnAdd-md-category', function () {
    $('#mdAdd-category').modal('show');
  });

  $(document).on('click', '#btnAdd-md-product', function () {
    $('#mdAdd-product').modal('show');
  });

  $(document).on('click', '.btnView_product', function () {
    $('#mdView-product').modal('show');
  });

  $(document).on('click', '.btnEdit_product', function () {
    $('#mdEdit-product').modal('show');
  });
  // Ingreso
  $(document).on('click', '#btnAdd-md-income', function () {
    $('#mdAdd-income').modal('show');
  });
  // Salida
  $(document).on('click', '#btnAdd-md-output', function () {
    $('#mdAdd-output').modal('show');
  });

  // Agregar una Marca
  $('#add_brand_form').on('submit', add_brand_form);
  function add_brand_form(e) {
    e.preventDefault();
    var form = $(this),
      data = new FormData(form.get(0));
    // AJAX
    $.ajax({
      url: 'ajax/add_brand_form',
      type: 'post',
      dataType: 'json',
      contentType: false,
      processData: false,
      cache: false,
      data: data,
      beforeSend: function () {
        form.waitMe();
      }
    }).done(function (res) {
      if (res.status === 201) {
        toastr.success(res.msg, '¡Bien!');
        /* form.trigger('reset'); */
        /* get_brands(); */
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      form.waitMe('hide');
    })
  }

  // Agregar una Categoria
  $('#add_category_form').on('submit', add_category_form);
  function add_category_form(e) {
    e.preventDefault();
    var form = $(this),
      data = new FormData(form.get(0));
    // AJAX
    $.ajax({
      url: 'ajax/add_category_form',
      type: 'post',
      dataType: 'json',
      contentType: false,
      processData: false,
      cache: false,
      data: data,
      beforeSend: function () {
        form.waitMe();
      }
    }).done(function (res) {
      if (res.status === 201) {
        toastr.success(res.msg, '¡Bien!');
        /* form.trigger('reset'); */
        /* get_category(); */
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      form.waitMe('hide');
    })
  }

  // Agregar una Producto
  $('#add_product_form').on('submit', add_product_form);
  function add_product_form(e) {
    e.preventDefault();
    let val_brandId = $('#insertIpt-brands-product').find(':selected').data('id');
    let val_categoryId = $('#insertIpt-categories-product').find(':selected').data('id');
    var form = $(this),
      data = new FormData(form.get(0));
    data.append("brand_id", JSON.stringify(val_brandId));
    data.append("category_id", JSON.stringify(val_categoryId));

    // Validar selección
    if (!val_brandId) {
      toastr.error('Seleccióne Marca', '¡Upss!');
      return;
    }

    // Validar selección
    if (!val_categoryId) {
      toastr.error('Seleccióne Categoria', '¡Upss!');
      return;
    }

    // AJAX
    $.ajax({
      url: 'ajax/add_product_form',
      type: 'post',
      dataType: 'json',
      contentType: false,
      processData: false,
      cache: false,
      data: data,
      beforeSend: function () {
        form.waitMe();
      }
    }).done(function (res) {
      if (res.status === 201) {
        toastr.success(res.msg, '¡Bien!');
        /* form.trigger('reset'); */
        /* get_category(); */
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      form.waitMe('hide');
    })
  }

  // Cargar información de presentación [VISTA]
  $('body').on('click', '.btnView_product', btnView_product);
  function btnView_product(e) {
    e.preventDefault();

    var button = $(this),
      id = button.data('id'),
      action = 'get',
      hook = 'bee_hook',
      form_e = $('#view_product_form');

    // Cargar la información del registro de la lección
    $.ajax({
      url: 'ajax/get_product_form',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action, id
      },
      beforeSend: function () {
        $('.view_product_form').waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        let nombre_producto = res.data.nombre_producto ? res.data.nombre_producto : '-';
        $('[name="name-product"]', form_e).val(nombre_producto);
        let codigo_producto = res.data.codigo_producto ? res.data.codigo_producto : '-';
        $('[name="code-product"]', form_e).val(codigo_producto);
        let codigoBarra_producto = res.data.codigoBarra_producto ? res.data.codigoBarra_producto : '-';
        $('[name="barCode-product"]', form_e).val(codigoBarra_producto);

        $('#viewIpt-brands-product').empty().append($('<option>', {
          value: res.data.nombre_marca,
          text: res.data.nombre_marca
        }));
        $('#viewIpt-categories-product').empty().append($('<option>', {
          value: res.data.nombre_categoria,
          text: res.data.nombre_categoria
        }));

      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      $('.view_product_form').waitMe('hide');
    })
  }

  // Cargar información de producto [EDITAR]
  $('body').on('click', '.btnEdit_product', btnEdit_product);
  function btnEdit_product(e) {
    e.preventDefault();

    var button = $(this),
      id = button.data('id'),
      action = 'get',
      hook = 'bee_hook',
      form_e = $('#edit_product_form');

    // Cargar la información del registro de la indicación
    $.ajax({
      url: 'ajax/get_product_form',
      type: 'POST',
      dataType: 'json',
      cache: false,
      data: {
        hook, action, id
      },
      beforeSend: function () {
        $('.edit_product_form').waitMe();
      }
    }).done(function (res) {
      if (res.status === 200) {
        /* $('[name="id"]', form_e).val(res.data.id_producto); */
        let nombre_producto = res.data.nombre_producto ? res.data.nombre_producto : '-';
        $('[name="name-product"]', form_e).val(nombre_producto);
        let codigo_producto = res.data.codigo_producto ? res.data.codigo_producto : '-';
        $('[name="code-product"]', form_e).val(codigo_producto);
        let codigoBarra_producto = res.data.codigoBarra_producto ? res.data.codigoBarra_producto : '-';
        $('[name="barCode-product"]', form_e).val(codigoBarra_producto);

        $('#editIpt-brands-product option[data-id=' + res.data.marca_id + ']').attr("selected", true);
        $("#editIpt-brands-product").trigger('change');
        $('#editIpt-categories-product option[data-id=' + res.data.categoria_id + ']').attr("selected", true);
        $("#editIpt-categories-product").trigger('change');
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      $('.edit_product_form').waitMe('hide');
    })
  }

  // Borrar un producto
  $('body').on('click', '.btnDelete_product', btnDelete_product);
  function btnDelete_product(e) {
    e.preventDefault();
    console.log(this);
    var boton = $(this),
      id = boton.data('id'),
      hook = 'bee_hook',
      action = 'delete';

    swal({
      title: "Estas seguro?",
      text: "Una vez eliminado, no podrá recuperarlo!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: 'ajax/delete_product',
          type: 'POST',
          dataType: 'json',
          cache: false,
          data: {
            hook, action, id
          },
          beforeSend: function () {
            $('body').waitMe();
          }
        }).done(function (res) {
          if (res.status === 200) {
            toastr.success(res.msg, 'Bien!');
            swal("¡La información ha sido eliminado!", {
              icon: "success",
            });
          } else {
            toastr.error(res.msg, '¡Upss!');
          }
        }).fail(function (err) {
          toastr.error('Hubo un error en la petición', '¡Upss!');
        }).always(function () {
          $('body').waitMe('hide');
        })

      } else {
        swal("¡La información está a salvo!");
      }
    });
  }

  // Agregar un Ingreso
  $('#add_income_form').on('submit', add_income_form);
  function add_income_form(e) {
    e.preventDefault();
    let val_product = $('#insertIpt-product-income').find(':selected').data('id');
    var form = $(this),
      data = new FormData(form.get(0));
    data.append("product_id", JSON.stringify(val_product));

    // Validar selección
    if (!val_product) {
      toastr.error('Seleccióne Producto', '¡Upss!');
      return;
    }

    // AJAX
    $.ajax({
      url: 'ajax/add_income_form',
      type: 'post',
      dataType: 'json',
      contentType: false,
      processData: false,
      cache: false,
      data: data,
      beforeSend: function () {
        form.waitMe();
      }
    }).done(function (res) {
      if (res.status === 201) {
        toastr.success(res.msg, '¡Bien!');
        /* form.trigger('reset'); */
        /* get_category(); */
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      form.waitMe('hide');
    })
  }

  // Agregar una salida
  $('#add_output_form').on('submit', add_output_form);
  function add_output_form(e) {
    e.preventDefault();
    let val_brandId = $('#insertIpt-brands-product').find(':selected').data('id');
    let val_categoryId = $('#insertIpt-categories-product').find(':selected').data('id');
    var form = $(this),
      data = new FormData(form.get(0));
    data.append("brand_id", JSON.stringify(val_brandId));
    data.append("category_id", JSON.stringify(val_categoryId));

    // Validar selección
    if (!val_brandId) {
      toastr.error('Seleccióne Marca', '¡Upss!');
      return;
    }

    // Validar selección
    if (!val_categoryId) {
      toastr.error('Seleccióne Categoria', '¡Upss!');
      return;
    }

    // AJAX
    $.ajax({
      url: 'ajax/add_output_form',
      type: 'post',
      dataType: 'json',
      contentType: false,
      processData: false,
      cache: false,
      data: data,
      beforeSend: function () {
        form.waitMe();
      }
    }).done(function (res) {
      if (res.status === 201) {
        toastr.success(res.msg, '¡Bien!');
        //form.trigger('reset');
        //get_category();
      } else {
        toastr.error(res.msg, '¡Upss!');
      }
    }).fail(function (err) {
      toastr.error('Hubo un error en la petición', '¡Upss!');
    }).always(function () {
      form.waitMe('hide');
    })
  }

});



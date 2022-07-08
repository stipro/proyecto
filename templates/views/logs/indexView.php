<?php require_once INCLUDES . 'inc_header.php'; ?>
<div id="main-wrapper">
  <?php require_once INCLUDES . 'inc_navbar.php'; ?>
  <div class="card rounded-0">
    <div class="card-header">
      <h2><?php echo $d->title; ?></h2>
    </div>
    <div class="card-body">
      <div id="table-head">
        <form method="post" action="" name="searchf">
          <input type="text" name="search" placeholder="Buscar..." class="search fleft" value="" />
        </form>
        <img src="media/img/loader-small.gif" class="fleft loader" width="15" height="15" />
        <div class="fright">
          <div class="select-holder">
            <i class="fa fa-caret-down"></i>
            <select name="show-per-page">
              <option value="25" selected>25</option>
              <option value="50">50</option>
              <option value="100">100</option>
              <option value="150">150</option>
              <option value="200">200</option>
              <option value="300">300</option>
              <option value="500">500</option>
            </select>
          </div>
        </div>
        <div class="fright" style="height:5px; margin-right:55px;"></div>
        <a href="" name="delete-all" class="btn red fright">
          <i class="fa fa-close"></i>
          <span class="hidden-xs hidden-sm">Eliminar</span>
        </a>

        <span class="fright">|</span>
        <a href="" name="check-out-all" class="btn blue disabled fright"><i class="fa fa-arrow-up"></i>Salidas</a>
        <a href="" name="check-in-all" class="btn green disabled fright"><i class="fa fa-arrow-down"></i>Ingresos</a>
      </div>
      <table border="1" rules="rows" id="items">
        <thead>
          <tr>
            <td width="5%"><input type="checkbox" name="select-all" /></td>
            <td width="6%">ID</td>
            <td width="30%">Producto</td>
            <td width="20%">Categoría</td>
            <td width="10%">Stock</td>
            <td width="14%">Precio</td>
            <td width="15%">Acciones</td>
          </tr>
        </thead>
        <tbody>
          <tr data-type="element" data-id="">
            <td><input type="checkbox" name="chbox" value="" /></td>
            <td class="hover" data-type="id"></td>
            <td class="hover" data-type="name"></td>
            <td class="hover" data-type="cat"></td>
            <td></td>
            <td></td>
            <td>
              <a href="" name="c1" title="Ingreso"><i class="fa fa-arrow-down"></i></a>
              <a href="" name="c2" title="Salida"><i class="fa fa-arrow-up"></i></a>
              <a href="" name="c3" title="Editar"><i class="fa fa-pencil"></i></a>
              <a href="" name="c4" title="Log"><i class="fa fa-file-text-o"></i></a>
              <a href="" name="c5" title="Eliminar"><i class="fa fa-close"></i></a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="clear" style="margin-bottom:40px;"></div>
  <div class="border" style="margin-bottom:30px;"></div>
</div>
<?php require_once INCLUDES . 'inc_footer.php'; ?>
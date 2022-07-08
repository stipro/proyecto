<?php if (empty($d->rows)) : ?>
  <div class="text-center">
    <p class="text-muted">
      No se encontro registros
    </p>
  </div>
<?php else : ?>
  <table id="tbMaster-marcas" class="table table-striped table-sm table-hover table-bordered caption-top" style="width:100%">
    <!-- <caption>Lista</caption> -->
    <thead class="table-light">
      <tr>
        <th scope="col" width="5%"><input type="checkbox" name="select-all" />#</th>
        <th scope="col" width="6%">ID</th>
        <th scope="col" width="30%">Marca</th>
        <td scope="col" width="15%">Acciones</td>
      </tr>
    </thead>
    <?php $i = 1 ?>
    <tbody class="table-group-divider">
      <?php foreach ($d->rows as $t) : ?>
        <tr data-type="element" data-id="">
          <th scope="row"><input type="checkbox" name="chbox" value="<?php echo $item->id_marca; ?>" /> <?php echo ($i); ?></th>
          <td><?php echo $t->id_marca;
              $i++; ?></td>
          <td><?php echo $t->nombre_marca; ?></td>
          <td class="text-center" style="width:15rem;">
            <button type="button" data-bs-toggle="modal" data-bs-target="#mdView-brand" class="btn btn-info btn-sm btnView_brand" data-id="<?php echo $item->id_marca; ?>">
              <i class="fas fa-eye"></i>
            </button>
            <button type="button" data-bs-toggle="modal" data-bs-target="#mdEdit-brand" class="btn btn-warning btn-sm btnEdit_brand" data-id="<?php echo $item->id_marca; ?>">
              <i class="fa-solid fa-pen-to-square"></i>
            </button>
            <button type="button" class="btn btn-danger btn-sm brand" data-id=""><i class="fas fa-trash"></i></button>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <?php echo $d->pagination; ?>
<?php endif; ?>
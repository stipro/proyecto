<!-- Modal -->
<div class="modal fade" id="mdView-product" tabindex="-1" aria-labelledby="mdView-productLabel" aria-hidden="true" role="dialog" style="overflow-y: scroll;">
    <div class="modal-dialog modal-lg">
        <form class="row g-3" id="view_product_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mdView-productLabel">[Ver] <?php echo $d->title_crud; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="viewIpt-name-product" class="control-label">Nombre <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="name-product" id="viewIpt-name-product" class="form-control form-control-sm" aria-label="Nombre" value="" placeholder="Ingrese Nombre" autofocus autocomplete="off" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="viewIpt-code-product" class="control-label">Codigo Producto</label>
                                <input type="text" name="code-product" id="viewIpt-code-product" class="form-control form-control-sm" aria-label="Nombre" value="" autocomplete="off" placeholder="Ingrese Codigo Barras" disabled>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="viewIpt-barCode-product" class="control-label">Codigo Barras</label>
                                <input type="text" name="barCode-product" id="barCode-product" class="form-control form-control-sm" aria-label="Nombre" value="" autocomplete="off" placeholder="Ingrese Codigo Barras" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="viewIpt-brands-product" class="control-label">Marcas <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <select class="form-select form-select-sm" name="brands-product" id="viewIpt-brands-product" data-placeholder="Escribe para buscar..." disabled>
                                        <option></option>
                                        <?php if (empty(get_all_marcas())) : ?>
                                            <option value="--0--">--No se obtuvo informacion--</option>
                                        <?php else : ?>
                                            <?php foreach (get_all_marcas() as $cl) : ?>
                                                <?php echo sprintf('<option value="%s" data-id="%s">%s</option>', $cl[0], $cl[1], $cl[2]); ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                    <!-- <a class="btn btn-outline-secondary border-1 m-0 form-control-sm" href="./marcas" role="button" id="mbtnAdd-brand" target="_blank"><i class="bi bi-plus-lg"></i></a> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="viewIpt-categories-product" class="control-label">Categorias <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <select class="form-select form-select-sm" name="categories-product" id="viewIpt-categories-product" data-placeholder="Escribe para buscar..." disabled>
                                        <option></option>
                                        <?php if (empty(get_all_categorias())) : ?>
                                            <option value="--0--">--No se obtuvo informacion--</option>
                                        <?php else : ?>
                                            <?php foreach (get_all_categorias() as $cl) : ?>
                                                <?php echo sprintf('<option value="%s" data-id="%s">%s</option>', $cl[0], $cl[1], $cl[2]); ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fright" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </form>
    </div>
</div>
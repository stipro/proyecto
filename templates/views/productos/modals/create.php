<!-- Modal -->
<div class="modal fade" id="mdAdd-product" tabindex="-1" aria-labelledby="mdAdd-productLabel" aria-hidden="true" role="dialog" style="overflow-y: scroll;">
    <div class="modal-dialog modal-lg">
        <form class="row g-3" id="add_product_form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mdAdd-productLabel">[Creación] Productos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="insertIpt-name_product" class="control-label">Nombre <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="name_product" id="insertIpt-name_product" class="form-control form-control-sm" aria-label="Nombre" value="" placeholder="Ingrese Nombre" autofocus autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="insertIpt-code-product" class="control-label">Codigo Producto</label>
                                <input type="text" name="code_product" id="insertIpt-code-product" class="form-control form-control-sm" aria-label="Nombre" value="" autocomplete="off" placeholder="Ingrese Codigo Barras">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="insertIpt-barCode-product" class="control-label">Codigo Barras</label>
                                <input type="text" name="barCode_product" id="barCode_product" class="form-control form-control-sm" aria-label="Nombre" value="" autocomplete="off" placeholder="Ingrese Codigo Barras">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="insertIpt-brands-product" class="control-label">Marcas <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <select class="form-select form-select-sm" name="brands-product" id="insertIpt-brands-product" data-placeholder="Escribe para buscar...">
                                        <option></option>
                                        <?php if (empty(get_all_marcas())) : ?>
                                            <option value="--0--">--No se obtuvo informacion--</option>
                                        <?php else : ?>
                                            <?php foreach (get_all_marcas() as $cl) : ?>
                                                <?php $validSelected = $cl[1] == 1 ? 'selected' : ''; ?>
                                                <?php echo sprintf('<option value="%s" data-id="%s" %s>%s</option>', $cl[0], $cl[1], $validSelected, $cl[2]); ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                    <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnUpdate-brand"><i class="bi bi-arrow-clockwise"></i></button>
                                    <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnAdd-md-brand"><i class="bi bi-plus-lg"></i></button>
                                    <!-- <a class="btn btn-outline-secondary border-1 m-0 form-control-sm" href="./marcas" role="button" id="mbtnAdd-brand" target="_blank"><i class="bi bi-plus-lg"></i></a> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="insertIpt-categories-product" class="control-label">Categorias <span class="text-danger">*</span></label>
                                <div class="input-group input-group-sm">
                                    <select class="form-select form-select-sm" name="categories-product" id="insertIpt-categories-product" data-placeholder="Escribe para buscar...">
                                        <option></option>
                                        <?php if (empty(get_all_categorias())) : ?>
                                            <option value="--0--">--No se obtuvo informacion--</option>
                                        <?php else : ?>
                                            <?php foreach (get_all_categorias() as $cl) : ?>
                                                <?php $validSelected = $cl[1] == 1 ? 'selected' : ''; ?>
                                                <?php echo sprintf('<option value="%s" data-id="%s" %s>%s</option>', $cl[0], $cl[1], $validSelected, $cl[2]); ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                    <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnUpdate-categories"><i class="bi bi-arrow-clockwise"></i></button>
                                    <button class="btn btn-outline-secondary form-control-sm" type="button" id="btnAdd-md-category"><i class="bi bi-plus-lg"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fright" data-bs-dismiss="modal">Cerrar</button>
                    <?php echo insert_inputs(); ?>
                    <button type="submit" class="btn green fright">Registrar</button>
                </div>
            </div>
        </form>
    </div>
</div>
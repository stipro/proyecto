<option></option>
<?php if (empty(get_all_categorias())) : ?>
    <option value="--0--">--No se obtuvo informacion--</option>
<?php else : ?>
    <?php foreach (get_all_categorias() as $cl) : ?>
        <?php echo sprintf('<option value="%s" data-id="%s">%s</option>', $cl[0], $cl[1], $cl[2]); ?>
    <?php endforeach; ?>
<?php endif; ?>
<?php require_once INCLUDES . 'inc_header.php'; ?>
<div id="main-wrapper">
    <?php require_once INCLUDES . 'inc_navbar.php'; ?>
    <div class="wrapper-pad">
        <h2>Inicio</h2>
        <ul id="selectors">
            <li class="selected" value="today">HOY</li>
            <li value="this_week">ESTA SEMANA</li>
            <li value="this_month">ESTE MES</li>
            <li value="this_year">ESTE AÑO</li>
            <li value="all_time">TODOS</li>
        </ul>

        <div id="fdetails">
            <div class="element">
                <span></span><br />
                NUEVOS<br />
                PRODUCTOS
            </div>
            <div class="element">
                <span></span><br />
                INGRESOS<br />
                (CANT. TOTAL)
            </div>
            <div class="element">
                <span></span><br />
                SALIDAS<br />
                (CANT TOTAL)
            </div>
            <div class="element">
                <span>$2</span><br />
                INGRESOS
            </div>
            <div class="element">
                <span>$5</span><br />
                SALIDAS
            </div>
        </div>
    </div>

    <div class="clear" style="margin-bottom:40px;height:1px;"></div>
    <div class="border" style="margin-bottom:30px;"></div>

    <div class="wrapper-pad">
        <h3>ESTADÍSTICAS GENERALES</h3>
        <div id="f2details">
            <div class="element">
                <span>2</span><br />
                PRODUCTOS<br />
                REGISTRADOS
            </div>
            <div class="element">
                <span>5</span><br />
                ALMACÉN<br />
                PRODUCTO (CANT)
            </div>
            <div class="element">
                <span>$500</span><br />
                VALOR EN ALMACÉN
            </div>
            <div class="element">
                <span>$10</span><br />
                VALOR SALIDAS
            </div>
        </div>
    </div>

    <div class="clear" style="height:50px;"></div>

</div>
<?php require_once INCLUDES . 'inc_footer.php'; ?>
<?php require_once VIEWS . 'productos/modals/create.php'; ?>
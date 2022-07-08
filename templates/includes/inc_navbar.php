<?php $nameModule =  $d->title;
$titleMinuscula = strtolower($nameModule);
?>
<div id="header">
    <div class="left">
        <a href="http://obedalvarado.pw/" target='_blank'><img src="<?php echo IMAGES . 'logo3x.png'; ?>" width="150" height="50" alt="Inventario App" /></a>
        <div class="center" style="font-size:12px; font-style:italic;color:#bbb;">Administrador</div>
    </div>
    <div class="right"><a href="users.php" title="Users">Usuarios</a>|
        <a href="settings.php" title="Settings">Configuración</a>|
        <a href="logout.php" title="Logout">Salir</a>
    </div>
    <div class="clear"></div>
</div>

<input type="checkbox" class="toggle" id="opmenu" style="display:none" />
<label for="opmenu" id="open-menu"><i class="fa fa-align-justify"></i> Menu</label>
<div id="menu">
    <ul id="menuli" class="p-0">
        <li <?php if ($titleMinuscula == 'home') : ?> class="active" <?php else : ?> class="nel" <?php endif; ?>>
            <a href="home" title="Home"><i class="fa fa-home"></i> Inicio</a>
        </li>
        <li <?php if ($titleMinuscula == 'productos') : ?> class="active" <?php else : ?> class="nel" <?php endif; ?>>
            <a href="productos" title="productos"><i class="fa fa-folder"></i> Productos</a>
        </li>
        <li <?php if ($titleMinuscula == 'kardex') : ?> class="active" <?php else : ?> class="nel" <?php endif; ?>>
            <a href="kardex" title="kardex"><i class="fa fa-list-ul"></i> Kardex</a>
        </li>
        <li <?php if ($titleMinuscula == 'ingresos') : ?> class="active" <?php else : ?> class="nel" <?php endif; ?>>
            <a href="ingresos" title="Check-In Item"><i class="fa fa-arrow-down"></i> Ingresos</a>
        </li>
        <li <?php if ($titleMinuscula == 'salidas') : ?> class="active" <?php else : ?> class="nel" <?php endif; ?>>
            <a href="salidas" title="Check-Out Item"><i class="fa fa-arrow-up"></i> Salidas</a>
        </li>
        <li <?php if ($titleMinuscula == 'logs') : ?> class="active" <?php else : ?> class="nel" <?php endif; ?>>
            <a href="logs" title="Logs"><i class="fa fa-file-text-o"></i> Logs</a>
        </li>
        <li <?php if ($titleMinuscula == 'marcas') : ?> class="active" <?php else : ?> class="nel" <?php endif; ?>>
            <a href="marcas" title="Marcas"><i class="fa fa-folder"></i> Marcas</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Mantenimiento
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Marcas</a></li>
                <li><a class="dropdown-item" href="#">Categorias</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </li>
        <li <?php if ($titleMinuscula == 'categorias') : ?> class="active" <?php else : ?> class="nel" <?php endif; ?>>
            <a href="categorias" title="Categories"><i class="fa fa-folder"></i> Categorías</a>
        </li>
    </ul>
</div>
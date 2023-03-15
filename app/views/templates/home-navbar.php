<div class="navbar-menu">
    <a href="<?= PATH_URL ?>/pages/home" class="navbar-logo"><img src="<?= PATH_URL ?>/public/img/logo.png" alt="logo"></a>

    <nav>
        <ul>
            <li><a href="#inicio">Inicio</a></li>

            <li class="navbar-submenu">
                <a class="title" href="#">Dropdown 1</a>
                <ul class="items">
                    <li><a href="#">Item 1</a></li>
                    <li><a href="#">Item 2</a></li>
                </ul>
            </li>

            <li class="navbar-submenu">
                <a class="title" href="#">Dropdown 2</a>
                <ul class="items">
                    <li><a href="#">Item 1</a></li>
                    <li><a href="#">Item 2</a></li>
                    <li><a href="#">Item 3</a></li>
                    <li><a href="#">Item 4</a></li>
                </ul>
            </li>

            <li class="navbar-submenu">
                <a class="title" href="#">Dropdown 3</a>
                <ul class="items">
                    <li><a href="#">Item 1</a></li>
                </ul>
            </li>

            <li class="navbar-submenu">
                <a class="title" href="#">Dropdown 4</a>
                <ul class="items">
                    <li><a href="#">Item 1</a></li>
                    <li><a href="#">Item 2</a></li>
                </ul>
            </li>

            <li class="navbar-submenu">
                <a class="title" href="#">Dropdown 5</a>
                <ul class="items">
                    <li><a href="#">Item 1</a></li>
                    <li><a href="#">Item 2</a></li>
                    <li><a href="#">Item 3</a></li>
                    <li><a href="#">Item 4</a></li>
                </ul>
            </li>

            <li class="navbar-submenu">
                <a class="title" href="#">Dropdown 6</a>
                <ul class="items left-side">
                    <li><a href="#">Item 1</a></li>
                </ul>
            </li>

            <li class="navbar-submenu user-menu">
                <a class="title" href="#">Usuario</a>
                <ul class="items left-side">
                    <li><a href="#" class="user-info"><?= $data['userEmail'] ?></a></li>

                    <li><a href="#" class="user-info"><?= $data['userName'] ?></a></li>
                    
                    <li><a href="<?= PATH_URL ?>/pages/change">Cambiar contraseña</a></li>

                    <?php if ($data['userRole'] == 'admin'): ?>
                        <li><a href="#">Solicitudes</a></li>

                        <li><a href="#">Usuarios</a></li>
                    <?php endif; ?>

                    <li><a href="<?= PATH_URL ?>/logout/index">Cerrar sesión</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
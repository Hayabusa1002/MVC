<!-- If the user already logged in, redirect to Home page -->
<?php if (isset($_SESSION['loginSuccess'])) { header('location: ' . PATH_URL . '/pages/home'); } ?>

<!-- NOTE: class attributes are for css and id attributes are for js -->
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once PATH_APP . '/views/templates/header-main.php';  ?>
    <?php require_once PATH_APP . '/views/templates/header-login.php'; ?>
</head>

<body>
    <div class="container-login">
        <div class="wrap-login">
            <!-- $data array comes from Pages Controller -->
            <span class="login-form-title"><?= $data['title'] ?></span>

            <!-- data-tilt attribute is for the visual effect (tilt jquery library) -->
            <div class="login-logo" data-tilt>
                <img src="<?= PATH_URL ?>/public/img/logo.png" alt="logo">
            </div>  

            <!-- With id="validate-form" works login.js -->
            <form class="login-form" id="validate-form">
                <span class="login-form-title">INICIO DE SESIÓN</span>

                <!-- Email input -->
                <div class="wrap-input">
                    <span class="symbol-input">
                        <i class="fa-duotone fa-envelope"></i>
                    </span>

                    <input class="input-login" type="text" name="email" placeholder="Correo">
                    <span class="focus-input"></span>
                </div>
                <!-- /Email input -->

                <!-- Password input -->
                <div class="wrap-input" id="show-hide-pswd">
                    <span class="symbol-input">
                        <i class="fa-duotone fa-lock-keyhole"></i>
                    </span>

                    <input class="input-login" type="password" name="pswd" placeholder="Contraseña">
                    <span class="focus-input"></span>

                    <span class="symbol-pswd">
                        <i class="fa-solid fa-eye" id="show-hide-icon"></i>
                    </span>
                </div>
                <!-- /Password input -->
                
                <div class="container-login-form-btn">
                    <button class="login-form-btn">Iniciar sesión</button>
                </div>

                <div class="login-link">
                    <span>Olvidé mi</span>
                    <a href="<?= PATH_URL ?>/pages/forgot">contraseña</a>
                </div>

                <div class="login-link second-link">
                    <a href="<?= PATH_URL ?>/pages/signup">
                        Registrar nuevo usuario <i class="fa-sharp fa-solid fa-angles-right"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>

    <?php require_once PATH_APP . '/views/templates/footer-main.php';  ?>
    <?php require_once PATH_APP . '/views/templates/footer-login.php'; ?>
</body>

</html>
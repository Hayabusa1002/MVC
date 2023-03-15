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

            <!-- With id="validate-form" works forgot-pswd.js -->
            <form class="login-form" id="validate-form">
                <span class="login-form-title">RECUPERAR CONTRASEÑA</span>

                <!-- Email input -->
                <div class="wrap-input">
                    <span class="symbol-input">
                        <i class="fa-duotone fa-envelope"></i>
                    </span>    

                    <input class="input-login" type="text" name="email" placeholder="Correo">
                    <i class="focus-input"></i>
                </div>
                <!-- /Email input -->

                <!-- ID card input -->
                <div class="wrap-input">
                    <span class="symbol-input">
                        <i class="fa-duotone fa-id-card-clip"></i>
                    </span>

                    <input class="input-login" type="number" name="id_card" placeholder="Cédula">
                    <i class="focus-input"></i>
                </div>
                <!-- /ID card input -->
                
                <div class="container-login-form-btn">
                    <button class="login-form-btn">Recuperar</button>
                </div>

                <div class="login-link">
                    <span>Volver a</span>
                    <a href="<?= PATH_URL ?>/pages/login">inicio de sesión</a>
                </div>

                <div class="login-link second-link">
                    <a href="<?= PATH_URL ?>/pages/signup">
                        Registrar nuevo usuario <i class="fa-sharp fa-solid fa-angles-right"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>

    <?php require_once PATH_APP . '/views/templates/footer-main.php'; ?>
    <?php require_once PATH_APP . '/views/templates/footer-forgot.php'; ?>
</body>

</html>
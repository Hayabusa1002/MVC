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

            <!-- With id="validate-form" works recover-pswd.js -->
            <form class="login-form" id="validate-form">
                <span class="login-form-title">NUEVA CONTRASEÑA</span>

                <!-- New password input -->
                <div class="wrap-input" id="show-hide-pswd">
                    <span class="symbol-input">
                        <i class="fa-duotone fa-lock-keyhole"></i>
                    </span>

                    <input class="input-login" type="password" name="new" placeholder="Nueva contraseña">
                    <i class="focus-input"></i>

                    <span class="symbol-pswd">
                        <i class="fa-solid fa-eye" id="show-hide-icon"></i>
                    </span>
                </div>
                <!-- New password input -->

                <!-- Confirm password input -->
                <div class="wrap-input" id="show-hide-pswd">
                    <span class="symbol-input">
                        <i class="fa-duotone fa-lock-keyhole"></i>
                    </span>

                    <input class="input-login" type="password" name="confirm" placeholder="Confirmar contraseña">
                    <i class="focus-input"></i>

                    <span class="symbol-pswd">
                        <i class="fa-solid fa-eye 2" id="show-hide-icon"></i>
                    </span>
                </div>
                <!-- Confirm password input -->

                <!------------------------------------------------ HIDDEN INPUTS ------------------------------------------------>
                <!-- Variables that the View get from the Controller, and these inputs are returned to the Controller          -->
                <!-- This data is lost between the methods of the same Controller once the View is loaded                      -->
                <input type="hidden" name="user_id" value="<?= $data['userData']['USER_ID']  ?>"/>
                <input type="hidden" name="id_card" value="<?= $data['userData']['ID_CARD']  ?>"/>
                <input type="hidden" name="email"   value="<?= $data['userData']['EMAIL']    ?>"/>
                <input type="hidden" name="last"    value="<?= $data['userData']['PASSWORD'] ?>"/>
                <!------------------------------------------------ HIDDEN INPUTS ------------------------------------------------>
                
                <div class="container-login-form-btn">
                    <button class="login-form-btn">CAMBIAR</button>
                </div>

                <div class="login-link">
                    <a href="<?= PATH_URL ?>/pages/login">
                        Iniciar sesión <i class="fa-sharp fa-solid fa-angles-right"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>

    <?php require_once PATH_APP . '/views/templates/footer-main.php';    ?>
    <?php require_once PATH_APP . '/views/templates/footer-recover.php'; ?>
</body>

</html>
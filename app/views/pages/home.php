<!-- If the user still not logged in, redirect to Log In page -->
<?php if (!isset($_SESSION['loginSuccess'])) { header('location: ' . PATH_URL . '/pages/login'); } ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once PATH_APP . '/views/templates/header-main.php';  ?>
    <?php require_once PATH_APP . '/views/templates/header-home.php';  ?>
</head>

<body>
    <header>
        <?php require_once PATH_APP . '/views/templates/home-navbar.php'; ?>
    </header>

    <main>
        <?php require_once PATH_APP . '/views/templates/home-user-request.php'; ?>
    </main>

    <footer></footer>

    <?php require_once PATH_APP . '/views/templates/footer-main.php'; ?>
    <?php require_once PATH_APP . '/views/templates/footer-home.php'; ?>
</body>

</html>
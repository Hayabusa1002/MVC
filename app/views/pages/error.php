<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once PATH_APP . '/views/templates/header-main.php';  ?>
    <?php require_once PATH_APP . '/views/templates/header-error.php'; ?>
</head>

<body>
    <section class="page_404">
        <h1>404</h1>
        
        <div class="four_zero_four_bg"></div>
        
        <div class="contant_box_404">
            <h3>Parece que está perdido</h3>
            <p>¡La página que está buscando no existe!</p>
            
            <a href="<?= PATH_URL ?>/pages/login" class="link_404">Ir a la Pagina Principal</a>
        </div>
    </section>
</body>

</html>
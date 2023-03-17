<!-- AdminLTE 3 -->
<link rel="stylesheet" href="<?= PATH_URL ?>/public/css/lib/adminlte.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" type="text/css" href="<?= PATH_URL ?>/public/css/lib/fontawesome_6.2.0/css/all.css"/>

<!-- Sweet Alert 2 -->
<link rel="stylesheet" href="<?= PATH_URL ?>/public/css/lib/sweetalert2.min.css">

<!-- Own Style -->
<?php $css = filemtime('./css/style.css'); ?>
<link rel="stylesheet" type="text/css" href="<?= PATH_URL . '/public/css/style.css?v=' . $css ?>"/>

<?php $css = filemtime('./css/home.css'); ?>
<link rel="stylesheet" type="text/css" href="<?= PATH_URL . '/public/css/home.css?v=' . $css ?>"/>
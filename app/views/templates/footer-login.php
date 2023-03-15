<!--============================================ Own code ===================================================-->

<!-- Back-end JavaSript -->
<script>url = '<?= PATH_URL ?>/login/index';</script>

<?php $js = filemtime('./js/login.js'); ?>
<script type="text/javascript" src="<?= PATH_URL . '/public/js/login.js?v=' . $js ?>"></script>

<!-- Show or Hide password -->
<?php $js = filemtime('./js/show-hide-pswd.js'); ?>
<script type="text/javascript" src="<?= PATH_URL . '/public/js/show-hide-pswd.js?v=' . $js ?>"></script>
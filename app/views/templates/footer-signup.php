<!--============================================ Own code ===================================================-->

<!-- Back-end JavaSript -->
<script>url = '<?= PATH_URL ?>/signup/index';</script>

<?php $js = filemtime('./js/signup.js'); ?>
<script type="text/javascript" src="<?= PATH_URL . '/public/js/signup.js?v=' . $js ?>"></script>

<!-- Show or Hide password -->
<?php $js = filemtime('./js/show-hide-pswd2.js'); ?>
<script type="text/javascript" src="<?= PATH_URL . '/public/js/show-hide-pswd2.js?v=' . $js ?>"></script>
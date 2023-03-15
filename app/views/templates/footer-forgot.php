<!--============================================ Own code ===================================================-->

<!-- Back-end JavaSript -->
<script>url = '<?= PATH_URL ?>/forgot/index';</script>

<?php $js = filemtime('./js/forgot-pswd.js'); ?>
<script type="text/javascript" src="<?= PATH_URL . '/public/js/forgot-pswd.js?v=' . $js ?>"></script>
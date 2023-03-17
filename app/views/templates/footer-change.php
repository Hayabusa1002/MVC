<!--============================================ Own code ===================================================-->

<!-- Back-end JavaSript -->
<script>
    logout_url       = '<?= PATH_URL ?>/logout/index';
    url              = '<?= PATH_URL ?>/change/index';
</script>

<?php $js = filemtime('./js/change-pswd.js'); ?>
<script type="text/javascript" src="<?= PATH_URL . '/public/js/change-pswd.js?v=' . $js ?>"></script>

<!-- Show or Hide password -->
<?php $js = filemtime('./js/show-hide-pswd3.js'); ?>
<script type="text/javascript" src="<?= PATH_URL . '/public/js/show-hide-pswd3.js?v=' . $js ?>"></script>
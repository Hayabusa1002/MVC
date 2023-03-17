<!--============================================ Own code ===================================================-->

<!-- Back-end JavaSript -->
<script>
    match_user_data  = '<?= $data['match_user_data'] ?>';
    link_has_expired = '<?= $data['link_has_expired'] ?>';
    login_url        = '<?= PATH_URL ?>/pages/login';
    url              = '<?= PATH_URL ?>/recover/updatePswd';
</script>

<?php $js = filemtime('./js/recover-pswd.js'); ?>
<script type="text/javascript" src="<?= PATH_URL . '/public/js/recover-pswd.js?v=' . $js ?>"></script>

<!-- Show or Hide password -->
<?php $js = filemtime('./js/show-hide-pswd2.js'); ?>
<script type="text/javascript" src="<?= PATH_URL . '/public/js/show-hide-pswd2.js?v=' . $js ?>"></script>
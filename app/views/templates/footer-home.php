<!-- AdminLTE 3 -->
<script src="<?= PATH_URL ?>/public/js/lib/adminlte.min.js"></script>

<!-- DataTables.net -->
<script src="<?= PATH_URL ?>/public/js/lib/jquery.dataTables.min.js"></script>
<script src="<?= PATH_URL ?>/public/js/lib/jquery.dataTables.min.js.descarga?"></script>

<!--============================================ Own code ===================================================-->

<!-- Back-end JavaSript -->
<script>request_table_url = '<?= PATH_URL ?>/datatable/requestTable';</script>
<script>request_form_url  = '<?= PATH_URL ?>/datatable/requestForm' ;</script>

<?php $js = filemtime('./js/user-request-table.js'); ?>
<script type="text/javascript" src="<?= PATH_URL . '/public/js/user-request-table.js?v=' . $js ?>"></script>

<?php $js = filemtime('./js/user-request-form.js'); ?>
<script type="text/javascript" src="<?= PATH_URL . '/public/js/user-request-form.js?v=' . $js ?>"></script>
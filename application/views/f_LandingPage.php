<?php
header("Content-Security-Policy: script-src 'self' https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,500i,700,900&display=swap; style-src 'self'; img-src: 'self';");
header("X-Frame-Options: DENY");
header("X-Content-Type-Options: nosniff");
header("X-XSS-Protection: 1; mode=block");
?>
<script src="<?= base_url() ?>assets/js/page.js"></script>
<script src="<?= base_url() ?>assets/js/disabled_CtrlShiftC.js"></script>
<script src="<?= base_url() ?>assets/js/disabled_viewPageSource.js"></script>
<?php // app/Views/themes/dashboard/partials/custom-js/wonderpush.php ?>
<?php $nonce = $nonce ?? ['style' => '', 'script' => '']; ?>
<!-- WonderPush Web SDK --> 
<script <?= $nonce['script'] ?? '' ?>>
window.WonderPush = window.WonderPush || [];
WonderPush.push(["init", {
    webKey: "8deea69a8880aca2222bb378781f0094fc106653871db15e10f599f1b5f5ae26",
}]);
</script>

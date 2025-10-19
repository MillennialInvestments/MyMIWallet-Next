<?php // app/Views/themes/dashboard/partials/custom-js/datepicker.php ?>
<?php $nonce = $nonce ?? ['style' => '', 'script' => '']; ?>
<!-- Datepicker and Daterangepicker Example -->
<script src="<?= base_url('assets/vendor/datepicker/jquery-ui.min.js'); ?>" <?= $nonce['script'] ?? '' ?>></script>
<script src="<?= base_url('assets/vendor/daterangepicker/moment.min.js'); ?>" <?= $nonce['script'] ?? '' ?>></script>
<script src="<?= base_url('assets/vendor/daterangepicker/daterangepicker.js'); ?>" <?= $nonce['script'] ?? '' ?>></script>
<script <?= $nonce['script'] ?? '' ?>>
$(function() {
    $("#date").datepicker({
    
    });
  });
</script>

<script <?= $nonce['script'] ?? '' ?>>
$(function() {
  $('input[id="date"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('MM-DD-YYYY'));
  });
});
</script>

<?php
$nonce = $nonce ?? ['style' => '', 'script' => ''];
// Get URI segments to determine the current page
$pageURIA = $this->uri->segment(1);
$pageURIB = $this->uri->segment(2);
$pageURIC = $this->uri->segment(3);
$pageURID = $this->uri->segment(4);
$pageURIE = $this->uri->segment(5);

if ($pageURIB === 'Search') {
    ?>
<script <?= $nonce['script'] ?? '' ?>>
$('.stock-search').selectpicker();
</script>
<?php
}
?>


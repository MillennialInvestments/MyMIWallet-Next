<?php
$subViewData                = [
    'uri'                   => $uri,
    'cuID'                  => $cuID,
    'pageTitle'             => $pageTitle,
];
?>
<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline --><!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include Bootstrap's JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<!-- Include Bootstrap Select (SelectPicker) -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script> -->
<!-- Include Summernote -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> -->
<!-- <script <?= $nonce['script'] ?? '' ?>>window.jQuery || document.write('<script src="<?php echo base_url(); ?>jquery-1.7.2.min.js"><\/script>');</script> -->
<?php //echo Assets::js(); ?>
<!-- JavaScript -->
<script src="<?php echo base_url('/assets/js/bundle.js?ver=3.1.0'); ?>"></script>
<script src="<?php echo base_url('/assets/js/scripts.js?ver=3.1.0'); ?>"></script>
<script src="<?php echo base_url('/assets/js/charts/gd-invest.js?ver=3.1.0'); ?>"></script>
<!-- Updated Bootstrap Select JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>

<!-- DataTables -->
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.0/b-2.0.0/sl-1.3.3/datatables.min.js"></script>

<!-- include summernote css/js -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script <?= $nonce['script'] ?? '' ?>>
(function($) {
    var $win = $(window),
        $body = $('body'),
        $introNav = $('.intro-navbar'),
        _navbar_fixed = 'navbar-fixed',
        $link = $('.link-to');

    $link.on('click', function() {
        var href = $(this).attr('href'),
            $toHash = $(href);
        if ($toHash.length) {
            $('html, body').scrollTop($toHash.offset().top - $introNav.innerHeight());
            return false;
        }
    });

    $win.on('scroll', function() {
        if ($win.scrollTop() > 0) {
            if (!$introNav.hasClass(_navbar_fixed)) {
                $introNav.addClass(_navbar_fixed);
            }
        } else {
            if ($introNav.hasClass(_navbar_fixed)) {
                $introNav.removeClass(_navbar_fixed);
            }
        }
    });
})(jQuery);
</script>
<?php echo view('themes/dashboard/layouts/custom-js', $subViewData); ?>
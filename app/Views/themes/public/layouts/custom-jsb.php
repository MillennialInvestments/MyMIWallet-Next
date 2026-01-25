
<!-- Global site tag (gtag.js) - Google Analytics -->

<?php
$pageURISegmentA = $this->uri->segment(1);
$pageURISegmentB = $this->uri->segment(2);
// Get Datatables
echo theme_view('custom-js/Datatables');
// Get Page Schemas
echo theme_view('custom-js/Schema');
// Get Paypal Buttons
if ($pageURISegmentA === 'Free-Trial' or $pageURISegmentA === 'Memberships'or $pageURISegmentA === 'Membership-Upgrade' or $pageURISegmentA === 'Membership-Downgrades') {
    echo theme_view('custom-js/Paypal');
}
//Get Investor Sentiment
if ($pageURISegmentB === 'Investor-Sentiment') {
    echo theme_view('custom-js/' . $pageURISegmentB);
}

// Analytic Tracking
echo theme_view('custom-js/Tawk-To');
echo theme_view('custom-js/Charts');
echo theme_view('custom-js/Google_Analytics');
echo theme_view('custom-js/selectpicker');
//~ echo theme_view('custom-js/Facebook_Analytics');
?>
<?php $cspNonce = $cspNonce ?? (service('renderer')->getData('cspNonce') ?? ''); ?>

<script nonce="<?= esc($cspNonce) ?>">
window.onload = function() {
  $("#navbarSupportedContent").hide();
};
</script>

<!-- recaptcha script removed (CSP nonce required when reinstated). -->
<?php if ($pageURISegmentA === 'Dashboard') { ?>
	
	<script nonce="<?= esc($cspNonce) ?>">
		$(function () {
			$('[data-bs-toggle="tooltip"]').tooltip()
		})
	</script>

<?php
}
?>
<script type="text/javascript" nonce="<?= esc($cspNonce) ?>">
    $(document).ready(function() {
        // Get the user's timezone offset in minutes
        var timezoneOffset = new Date().getTimezoneOffset();
        
        // Send the timezone offset to the server
        $.ajax({
            url: 'YourController/setUserTimezone',
            method: 'POST',
            data: {
                timezoneOffset: timezoneOffset
            },
            success: function(response) {
                console.log('User timezone set');
            },
            error: function(error) {
                console.error('Error setting user timezone:', error);
            }
        });
    });
</script>

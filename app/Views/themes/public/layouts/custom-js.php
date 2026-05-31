<?php 

// // Get Datatables
// echo view('custom-js/Datatables');
// // Get Page Schemas
// echo view('custom-js/Schema');
// // Get Paypal Buttons
// if ($pageURIA === 'Free-Trial' || $pageURIA === 'Memberships' || $pageURIA === 'Membership-Upgrade' || $pageURIA === 'Membership-Downgrades') {
//     echo view('custom-js/Paypal');
// }
// // Get Investor Sentiment
// if ($pageURIB === 'Investor-Sentiment') {
//     echo view('custom-js/' . $pageURIB);
// }

// // Analytic Tracking
// echo view('custom-js/Tawk-To');
// echo view('custom-js/Charts');
// echo view('custom-js/Google_Analytics');
// echo view('custom-js/selectpicker');
//~ echo view('custom-js/Facebook_Analytics');
// echo view('custom-js/Wonderpush');
// echo view('custom-js/Hotjar');
// echo view('custom-js/LinkedIn_Analytics');
// echo view('custom-js/Hubspot_Analytics');
// echo view('custom-js/Google_Tag_Manager');
// echo view('custom-js/FullStory_Analytics');
// echo view('custom-js/Drift_Chat');
// echo view('custom-js/Intercom_Chat');
// echo view('custom-js/Olark_Chat');
// echo view('custom-js/LiveChat_Chat');
// echo view('custom-js/Smartsupp_Chat');
// echo view('custom-js/Zoho_Chat');
// echo view('custom-js/Chatra_Chat');  
?>

<!-- SCRIPTS -->
<?php
$resolvedNonce = $cspNonce ?? (service('renderer')->getData('cspNonce') ?? '');
if (! is_scalar($resolvedNonce)) {
    $resolvedNonce = '';
}
$cspNonce = (string) $resolvedNonce;
?>
<script nonce="<?= esc($cspNonce) ?>">
    function toggleMenu() {
        var menuItems = document.getElementsByClassName('menu-item');
        for (var i = 0; i < menuItems.length; i++) {
            var menuItem = menuItems[i];
            menuItem.classList.toggle("hidden");
        }
    }
</script>
<script nonce="<?= esc($cspNonce) ?>">
window.addEventListener('load', function() {
  if (window.jQuery) {
    window.jQuery("#navbarSupportedContent").hide();
  }
});
</script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-168714029-1"></script>
<script nonce="<?= esc($cspNonce) ?>">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-168714029-1');
</script>
<!-- Meta Pixel Code -->
<!-- <script nonce="<?= esc($cspNonce) ?>">
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
if (!window.__mymiMetaPixelInitialized) {
    fbq('init', '1066980131308331');
    window.__mymiMetaPixelInitialized = true;
}
fbq('track', 'PageView');
</script> -->
<!-- Meta pixel is loaded once in the public header. -->
 <!-- Clarity tracking code for https://mymiwallet.com/ -->
<script nonce="<?= esc($cspNonce) ?>">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i+"?ref=bwt";
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "u766iff868");
</script>

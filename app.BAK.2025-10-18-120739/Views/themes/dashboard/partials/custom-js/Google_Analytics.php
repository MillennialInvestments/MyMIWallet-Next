<!-- Global site tag (gtag.js) - Google Analytics -->
<?php // app/Views/themes/dashboard/partials/custom-js/Google_Analytics.php ?>
<?php $nonce = $nonce ?? ['style' => '', 'script' => '']; ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-2FS4BNS0SL" <?= $nonce['script'] ?? '' ?>></script>
<script <?= $nonce['script'] ?? '' ?>>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-2FS4BNS0SL');
</script>
<script <?= $nonce['script'] ?? '' ?>>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window, document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1066980131308331');
fbq('track', 'PageView');
</script>
<noscript><img class="d-none" height="1" width="1" src="https://www.facebook.com/tr?id=1066980131308331&ev=PageView&noscript=1"/></noscript>
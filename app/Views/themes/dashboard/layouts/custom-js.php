<?php
// app/Views/themes/dashboard/layouts/custom-js.php
$totalSegments = $uri->getTotalSegments();
$pageURIA = $totalSegments >= 1 ? $uri->getSegment(1) : null;
$pageURIB = $totalSegments >= 2 ? $uri->getSegment(2) : null;
$pageURIC = $totalSegments >= 3 ? $uri->getSegment(3) : null;
$pageURID = $totalSegments >= 4 ? $uri->getSegment(4) : null;

$nonce = $nonce ?? ['style' => '', 'script' => ''];
$subViewData = [
    'uri' => $uri,
    'cuID' => $cuID,
    'siteSettings' => $siteSettings,
    'pageTitle' => $pageTitle,
    'nonce' => $nonce,
    'csp' => $csp ?? [],
    'theme' => $theme ?? 'dashboard',
    'bodyClass' => $bodyClass ?? '',
    'bodyData' => $bodyData ?? [],
    'pageURIA' => $pageURIA,
    'pageURIB' => $pageURIB,
    'pageURIC' => $pageURIC,
    'pageURID' => $pageURID,
    'currentUser' => $currentUser,
    'useDataTables' => $useDataTables ?? false,
    'useDatepicker' => $useDatepicker ?? false,
    'useTradingView' => $useTradingView ?? false,
    'useExchangeJS' => $useExchangeJS ?? false,
    'useGoogleTreemap' => $useGoogleTreemap ?? false,
    'useRealTimeData' => $useRealTimeData ?? false,
    'useTawkTo' => $useTawkTo ?? false,
    'useWonderpush' => $useWonderpush ?? false,
    'useGoogleAnalytics' => $useGoogleAnalytics ?? true,
    'useSummernote' => $useSummernote ?? false, // Default to false if not set
    'useSelect2' => $useSelect2 ?? false, // Default to false if not set
    'useChartJS' => $useChartJS ?? false, // Default to false if not set
    'useAOS' => $useAOS ?? false, // Default to false if
    'useClipboardJS' => $useClipboardJS ?? false, // Default to false if not set
    'useBootstrapIcons' => $useBootstrapIcons ?? false, // Default to false if not set
    'useFontAwesome' => $useFontAwesome ?? false, // Default to false if not set
    'useFeatherIcons' => $useFeatherIcons ?? false, // Default to false if not set
    'useIonIcons' => $useIonIcons ?? false, // Default to false if not set
    'useRemixIcons' => $useRemixIcons ?? false, // Default to false if not set
    'useThemifyIcons' => $useThemifyIcons ?? false, // Default to false if not set
    'useWeatherIcons' => $useWeatherIcons ?? false, // Default to false if not set
    'useLineIcons' => $useLineIcons ?? false, // Default to false if not set
    'useCryptoIcons' => $useCryptoIcons ?? false, // Default to false if not set
    'useFlagIcons' => $useFlagIcons ?? false, // Default to false if not set
    'usePaymentIcons' => $usePaymentIcons ?? false, // Default to false if not set
    'useCustomIcons' => $useCustomIcons ?? false, // Default to false if not set    
];

echo view('themes/dashboard/partials/custom-js/Digibyte-js', $subViewData);
echo view('themes/dashboard/partials/custom-js/modals', $subViewData);

if (!empty($useDataTables)) {
    echo view('themes/dashboard/partials/custom-js/datatables', $subViewData);
}
if (!empty($useDatepicker)) {
    echo view('themes/dashboard/partials/custom-js/datepicker', $subViewData);
}
if (!empty($useTradingView)) {
    echo view('themes/dashboard/partials/custom-js/tradingview', $subViewData);
}
if (!empty($useExchangeJS)) {
    echo view('themes/dashboard/partials/custom-js/Exchange-js', $subViewData);
}
if (!empty($useGoogleTreemap)) {
    echo view('themes/dashboard/partials/custom-js/google-treemap', $subViewData);
}
if (!empty($useRealTimeData)) {
    echo view('themes/dashboard/partials/custom-js/realTimeData', $subViewData);
}
if (!empty($useTawkTo)) {
    echo view('themes/dashboard/partials/custom-js/tawk-to', $subViewData);
}
if (!empty($useWonderpush)) {
    echo view('themes/dashboard/partials/custom-js/wonderpush', $subViewData);
}
if ($useGoogleAnalytics ?? true) {
    echo view('themes/dashboard/partials/custom-js/Google_Analytics', $subViewData);
}
?>
<script <?= $nonce['script'] ?? '' ?>>
    // Dynamically update CSRF token on page load and after AJAX requests
    document.addEventListener('DOMContentLoaded', () => {
        const csrfMeta = document.querySelector('meta[name="' + window.CSRF_TOKEN.name + '"]');
        if (csrfMeta) {
            csrfMeta.setAttribute('content', window.CSRF_TOKEN.hash);
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        var dropdownElements = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
        dropdownElements.forEach(function (dropdown) {
            new bootstrap.Dropdown(dropdown);
        });
    });

    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(function() {
            alert('Copied to clipboard!');
        }, function(err) {
            console.error('Could not copy text: ', err);
        });
    }

    function copyAddressToClipboard(text) {
        navigator.clipboard.writeText(text).then(function() {
            alert('Address Copied to clipboard!');
        }, function(err) {
            console.error('Could not copy text: ', err);
        });
    }

    (function startWhenJQueryReady(){
        if (typeof window.jQuery === 'undefined') {
            return setTimeout(startWhenJQueryReady, 50);
        }

        const $ = window.jQuery;

        $(document).ajaxComplete((event, xhr) => {
            const newCsrfName = xhr.getResponseHeader('X-CSRF-Token-Name');
            const newCsrfHash = xhr.getResponseHeader('X-CSRF-Token-Hash');

            if (newCsrfName && newCsrfHash) {
                window.CSRF_TOKEN.name = newCsrfName;
                window.CSRF_TOKEN.hash = newCsrfHash;
                const csrfMeta = document.querySelector('meta[name="' + newCsrfName + '"]');
                if (csrfMeta) {
                    csrfMeta.setAttribute('content', newCsrfHash);
                }
            }
        });

        $(function() {
            console.log('Document is ready');
            $('.nk-menu-item.has-sub.nk-menu-sub').removeClass('active current-page');
            $('.nk-menu-toggle').on('click', function(e) {
                e.preventDefault();
                let $submenu = $(this).next('.nk-menu-sub');
                $submenu.slideToggle();
                $(this).parent().toggleClass('active');
            });
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.nk-menu-item.has-sub').length) {
                    $('.nk-menu-sub').slideUp();
                    $('.nk-menu-item.has-sub').removeClass('active');
                }
            });
            $('.nk-nav-toggle').on('click', function(e) {
                e.preventDefault();
                var sidebarId = $(this).data('target');
                $('#' + sidebarId).toggleClass('show');
            });
            $(document).on('click', function(e) {
                if (!$(e.target).closest('#sidebarMenu, .nk-nav-toggle').length) {
                    $('#sidebarMenu').removeClass('show');
                }
            });
            <?php if (!empty($useSummernote)) : ?>
            if ($.fn.summernote) {
                $('.summernote').summernote({
                    height: 300,
                    placeholder: 'Write here...',
                    toolbar: [
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ]
                });
            }
            <?php endif; ?>
            $('input[name="q"]').on('keyup', function() {
                var keyword = $(this).val();
                if (keyword.length > 2) {
                    $.get('<?= site_url("/search"); ?>', { q: keyword }, function(data) {
                        $('.search-results').html(data);
                    });
                }
            });
            $('body').on('click', '.close', function() {
                $(this).closest('.modal').modal('hide');
            });
        });
    })();
</script>
<?php if ($pageURIA === 'Dashboard') : ?>
<script <?= $nonce['script'] ?? '' ?>>
    (function ensureTooltipReady(){
        if (typeof window.jQuery === 'undefined') {
            return setTimeout(ensureTooltipReady, 50);
        }

        window.jQuery(function () {
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    })();
</script>
<?php endif; ?>
<?php if ($pageURIA === 'Budget') : ?>
    <script type="module" src="<?= base_url('assets/js/app/budget-dashboard.js'); ?>" <?= $nonce['script'] ?? '' ?> defer></script>
<?php endif; ?>

<?php if (ENVIRONMENT !== 'production') : ?>
    <script src="<?= base_url('assets/js/dev-html-guard.js'); ?>" <?= $nonce['script'] ?? '' ?> defer></script>
<?php endif; ?>

<script <?= $nonce['script'] ?? '' ?>>
if ('serviceWorker' in navigator) {
  window.addEventListener('load', function () {
    navigator.serviceWorker.register('/sw.js').catch(function (err) {
      console.warn('SW register failed:', err);
    });
  });
}
</script>

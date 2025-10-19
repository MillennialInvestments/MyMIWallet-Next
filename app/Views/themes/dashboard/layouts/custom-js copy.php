<?php 
// app/Views/themes/dashboard/layouts/custom-js.php
$totalSegments = $uri->getTotalSegments();
$pageURIA = $totalSegments >= 1 ? $uri->getSegment(1) : null;
$pageURIB = $totalSegments >= 2 ? $uri->getSegment(2) : null;
$pageURIC = $totalSegments >= 3 ? $uri->getSegment(3) : null;
$pageURID = $totalSegments >= 4 ? $uri->getSegment(4) : null;

$subViewData = [
    'uri' => $uri,
    'cuID' => $cuID,
    'pageTitle' => $pageTitle,
];

// Get Datatables
if ($pageURIA === 'Exchange' || $pageURIB === 'Exchange') {
    // echo view('themes/dashboard/partials/custom-js/Exchange-js', $subViewData);
};
// echo view('themes/dashboard/partials/custom-js/Exchange-js', $subViewData);
echo view('themes/dashboard/partials/custom-js/Digibyte-js', $subViewData);
echo view('themes/dashboard/partials/custom-js/modals', $subViewData);
// echo view('themes/dashboard/partials/custom-js/realTimeData', $subViewData); // Real-Time Data Websocket
// echo view('themes/dashboard/partials/custom-js/datatables', $subViewData);
?>
<script <?= $nonce['script'] ?? '' ?>>
  window.CSRF_TOKEN_NAME = '<?= csrf_token() ?>';
  window.CSRF_TOKEN_HASH = '<?= csrf_hash() ?>';
</script>
<script <?= $nonce['script'] ?? '' ?>>
  // send XHR header so $this->request->isAJAX() is true
  $.ajaxSetup({ headers: { 'X-Requested-With': 'XMLHttpRequest' } });

  // attach CSRF to every state-changing request
  $(document).ajaxSend(function (_evt, jqXHR, settings) {
    const needsToken = /^(POST|PUT|PATCH|DELETE)$/i.test(settings.type || 'GET');
    if (!needsToken || !window.CSRF_TOKEN_NAME || !window.CSRF_TOKEN_HASH) return;

    // If data is FormData, append; if it’s a string, concat; else treat as object
    if (settings.data instanceof FormData) {
      settings.data.append(window.CSRF_TOKEN_NAME, window.CSRF_TOKEN_HASH);
    } else if (typeof settings.data === 'string') {
      settings.data += (settings.data ? '&' : '') +
        encodeURIComponent(window.CSRF_TOKEN_NAME) + '=' +
        encodeURIComponent(window.CSRF_TOKEN_HASH);
    } else {
      settings.data = settings.data || {};
      settings.data[window.CSRF_TOKEN_NAME] = window.CSRF_TOKEN_HASH;
    }
  });

  // refresh token from JSON responses that include it
  $(document).ajaxComplete(function (_evt, _xhr, _settings) {
    try {
      const res = _xhr.responseJSON;
      if (res && res.csrf) window.CSRF_TOKEN_HASH = res.csrf;
    } catch (e) { /* ignore */ }
  });
</script>

<script <?= $nonce['script'] ?? '' ?>> 
    // Dynamically update CSRF token on page load and after AJAX requests
    document.addEventListener('DOMContentLoaded', () => {
        const csrfMeta = document.querySelector('meta[name="' + window.CSRF_TOKEN.name + '"]');
        if (csrfMeta) {
            csrfMeta.setAttribute('content', window.CSRF_TOKEN.hash);
        }
    });

    $(document).ajaxComplete((event, xhr) => {
        const newCsrfName = xhr.getResponseHeader('X-CSRF-Token-Name');
        const newCsrfHash = xhr.getResponseHeader('X-CSRF-Token-Hash');

        if (newCsrfName && newCsrfHash) {
            // Update CSRF globally
            window.CSRF_TOKEN.name = newCsrfName;
            window.CSRF_TOKEN.hash = newCsrfHash;

            // Update meta tag
            const csrfMeta = document.querySelector('meta[name="' + newCsrfName + '"]');
            if (csrfMeta) {
                csrfMeta.setAttribute('content', newCsrfHash);
            }
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        // Initialize Bootstrap dropdowns
        var dropdownElements = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
        dropdownElements.forEach(function (dropdown) {
            new bootstrap.Dropdown(dropdown); // Initialize Bootstrap dropdowns
        });
    });

    $(document).ready(function() {

        console.log("Document is ready");

        // Remove 'active' from specific menu items if not desired
        $('.nk-menu-item.has-sub.nk-menu-sub').removeClass('active current-page');

        // Toggle nk-menu-sub visibility
        $('.nk-menu-toggle').click(function(e) {
            e.preventDefault();
            let $submenu = $(this).next('.nk-menu-sub');
            $submenu.slideToggle();
            $(this).parent().toggleClass('active');
        });

        // Hide nk-menu-sub when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.nk-menu-item.has-sub').length) {
                $('.nk-menu-sub').slideUp();
                $('.nk-menu-item.has-sub').removeClass('active');
            }
        });

        // Sidebar toggle functionality
        $('.nk-nav-toggle').click(function(e) {
            e.preventDefault();
            var sidebarId = $(this).data('target');
            $('#' + sidebarId).toggleClass('show');
            console.log("Toggled visibility for: #" + sidebarId);
        });

        $(document).click(function(e) {
            if (!$(e.target).closest('#sidebarMenu, .nk-nav-toggle').length) {
                $('#sidebarMenu').removeClass('show');
                // console.log("Clicked outside sidebar, sidebar closed.");
            }
        });

        // Initialize Summernote (if applicable)
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

        // Initialize search functionality
        $('input[name="q"]').on('keyup', function() {
            var keyword = $(this).val();
            if (keyword.length > 2) {
                $.get('<?php echo site_url("/search"); ?>', { q: keyword }, function(data) {
                    $('.search-results').html(data);
                });
            }
        });

        // Close modal on click of the close button
        $('body').on('click', '.close', function() {
            $(this).closest('.modal').modal('hide');
        });
    });

    // Additional utility functions
    function calculate(inputElement) {
        var input = inputElement.value;
        var resultElement = inputElement.parentNode.getElementsByClassName('calculation')[0];

        if (input.startsWith('=')) {
            try {
                var result = eval(input.substring(1));
                resultElement.value = result;
            } catch (e) {
                console.log(e.message);
                // Handle any potential errors from eval
            }
        }
    }

    function toggleMenu() {
        var menuItems = document.getElementsByClassName('menu-item');
        for (var i = 0; i < menuItems.length; i++) {
            var menuItem = menuItems[i];
            menuItem.classList.toggle("hidden");
        }
    }

    // Window onload handler
    window.onload = function() {
        $("#navbarSupportedContent").hide();
    };

    // Mutation observer for menu style changes
    const observer = new MutationObserver(mutations => {
        mutations.forEach(mutation => {
            if (mutation.attributeName === 'style') {
                console.log('Style changed:', mutation.target.style.display);
            }
        });
    });

    const menu = document.querySelector('.nk-menu-sub');
    if (menu) {
        observer.observe(menu, {
            attributes: true, // Configure it to listen to attribute changes
            attributeFilter: ['style'] // Specifically for style changes
        });
    }
    

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
</script>

<?php if ($pageURIA === 'Dashboard') : ?>
<script <?= $nonce['script'] ?? '' ?>>
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function (el) {
      new bootstrap.Tooltip(el);
    });
  });
</script>
<?php endif; ?>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-168714029-1"></script>
<script <?= $nonce['script'] ?? '' ?>>
    window.dataLayer = window.dataLayer || [];
    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-168714029-1');
</script>

<?php if ($pageURIA === 'Exchange') : ?>

<script <?= $nonce['script'] ?? '' ?>>
// Create Solana Wallet Address / Append to Customer Account
document.getElementById('createSolanaWallet').addEventListener('click', function(event) {
    event.preventDefault();
    const modalBody = document.getElementById('connectSolanaModalBody');
    modalBody.innerHTML = `
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    `;
    fetch('<?= base_url('/Exchange/Solana/createSolanaWallet') ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            user_id: '<?= $cuID ?>',
            user_email: '<?= $cuEmail ?>'
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            modalBody.innerHTML = `
                <div class="alert alert-warning" role="alert">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="alert-heading">Important!</h4>
                            <p>
                                Please write down or save your private key somewhere safe. 
                                Our application will only store the public key and you will not be able to retrieve your private key from us once this window is closed.
                            </p>        
                        </div>                        
                    </div>
                </div>
                <div class="alert alert-light" role="alert">
                    <div class="row">
                        <div class="col-12">
                            <p class="my-3">Public Key: <strong class="text-break">${data.publicKey}</strong> <a href="#" onclick="copyAddressToClipboard('${data.publicKey}')"><em class="icon ni ni-copy"></em></a></p>
                            <p class="my-3">Private Key: <strong class="text-break">${data.privateKey}</strong> <a href="#" onclick="copyAddressToClipboard('${data.privateKey}')"><em class="icon ni ni-copy"></em></a></p> 
                        </div>                        
                    </div>
                </div>
            `;
        } else {
            modalBody.innerHTML = `<div class="alert alert-danger" role="alert">Error: ${data.message}</div>`;
        }
    })
    .catch(error => {
        console.error('Error:', error);
        modalBody.innerHTML = `<div class="alert alert-danger" role="alert">Error: ${error.message}</div>`;
    });
});

// Import Customer Wallet / Append to Customer Accounts
document.getElementsByClassName('importSolanaWallet')[0].addEventListener('click', function(event) {
    event.preventDefault();
    const key = prompt("Please enter your 12-word phrase or private key:");
    if (!key) {
        alert("Key is required!");
        return;
    }

    const modalBody = document.getElementById('connectSolanaModalBody');
    modalBody.innerHTML = `
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    `;
    fetch('<?= base_url('/Exchange/Solana/Import/Wallet') ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            key: key.trim() // Ensure the key is trimmed
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            modalBody.innerHTML = `
                <div class="alert alert-warning" role="alert">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="alert-heading">Important!</h4>
                            <p>
                                Please write down or save your private key somewhere safe. 
                                Our application will only store the public key and you will not be able to retrieve your private key from us once this window is closed.
                            </p>        
                        </div>                        
                    </div>
                </div>
                <div class="alert alert-light" role="alert">
                    <div class="row">
                        <div class="col-12">
                            <p class="my-3">Public Key: <strong class="text-break">${data.publicKey}</strong> <a href="#" onclick="copyAddressToClipboard('${data.publicKey}')"><em class="icon ni ni-copy"></em></a></p>
                            <p class="my-3">Private Key: <strong class="text-break">${data.privateKey}</strong> <a href="#" onclick="copyAddressToClipboard('${data.privateKey}')"><em class="icon ni ni-copy"></em></a></p> 
                        </div>                        
                    </div>
                </div>
            `;
        } else {
            modalBody.innerHTML = `<div class="alert alert-danger" role="alert">Error: ${data.message}</div>`;
        }
    })
    .catch(error => {
        console.error('Error:', error);
        modalBody.innerHTML = `<div class="alert alert-danger" role="alert">Error: ${error.message}</div>`;
    });
});

</script>
<?php endif;?>

<?php if ($pageURIA === 'Management' && $pageURIB === 'Marketing') : ?>
<script <?= $nonce['script'] ?? '' ?>>
function generatePlatformMessages(entityType, entityId, routeUrl, fieldPrefix = '', useTextFields = false) {
    const csrfTokenName = window.CSRF_TOKEN?.name;
    const csrfTokenValue = window.CSRF_TOKEN?.hash;

    if (!entityId || !csrfTokenName || !csrfTokenValue) {
        console.error("❌ Missing entityId or CSRF token:", {
            entityId,
            csrfTokenName,
            csrfTokenValue
        });
        alert("❗ Missing ID or CSRF token.");
        return;
    }

    const payload = {
        type: entityType
    };
    payload[`${entityType.toLowerCase()}_id`] = entityId;
    payload[csrfTokenName] = csrfTokenValue;

    console.log('📤 Payload to send:', payload);

    $.ajax({
        url: routeUrl,
        method: 'POST',
        data: payload,
        dataType: 'json',
        success: function (response, status, xhr) {
            if (response.status === 'success') {
                const content = response.generated_content || {};

                // Auto-fill the form fields
                $('#facebook_message').val(content.facebook_message || '');
                $('#linkedin_message').val(content.linkedin_message || '');
                $('#discord_message').val(content.discord_message || '');
                $('#stocktwits_message').val(content.stocktwits_message || '');
                $('#tiktok_message').val(content.tiktok_message || '');
                $('#youtube_message').val(content.youtube_message || '');
                $('#email_message').val(content.email_message || '');
                $('#hashtags').val(content.hashtags || '');

                if (content.voice_script) {
                    // Optional: inject voiceover dynamically if needed
                    const audioHtml = `
                        <div class="mt-3">
                            <strong>🎧 Voiceover Preview:</strong>
                            <audio controls src="${content.voice_script}" class="w-100 mt-1"></audio>
                        </div>
                    `;
                    $('#modal-content-body').append(audioHtml);
                }

                // Refresh CSRF tokens if present
                const newName = xhr.getResponseHeader('X-CSRF-Token-Name');
                const newValue = xhr.getResponseHeader('X-CSRF-Token-Hash');
                if (newName && newValue) {
                    window.CSRF_TOKEN.name = newName;
                    window.CSRF_TOKEN.hash = newValue;
                    $('meta[name="csrf_token_name"]').attr('content', newName);
                    $('meta[name="csrf_token_value"]').attr('content', newValue);
                }

                alert(`✅ ${entityType} content generated successfully.`);
            } else {
                alert("⚠️ Error: " + (response.message || "Unknown error."));
            }
        },
        error: function (xhr) {
            console.error(`❌ ${entityType} AJAX error:`, xhr.responseText);
            alert(`❌ Failed to generate ${entityType} content.`);
        }
    });
}

</script>
<?php endif;?>
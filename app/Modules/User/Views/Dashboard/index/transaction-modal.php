<!-- app/Modules/User/Views/Dashboard/index/transaction-modal.php -->
<?php
helper('url_guard');
?>

<?php if (!defined('TRANSACTION_MODAL_RENDERED')): ?>
<?php define('TRANSACTION_MODAL_RENDERED', true); ?>

<div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="transactionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" id="transactionModalDialog">
        <div class="modal-content">
            <div id="loading-content">
                <?= view('UserModule\Views\Dashboard\index\modal-loading-page'); ?>
            </div>

            <div id="transactionContainer" class="d-none"></div>
        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
(function () {
    if (window.__transactionModalBound === true) {
        return;
    }

    const modalElement = document.getElementById('transactionModal');
    const loadingContent = document.getElementById('loading-content');
    const transactionContainer = document.getElementById('transactionContainer');

    if (!modalElement || !loadingContent || !transactionContainer) {
        console.warn('transactionModal containers are missing.');
        return;
    }

    window.__transactionModalBound = true;
    const modalBaseUrl = "<?= rtrim(mymi_url_guard(site_url('Dashboard/Transaction-Modal'), ['source' => __FILE__, 'line' => __LINE__]), '/') ?>";
    const csrfHeaderName = <?= json_encode(csrf_header()) ?>;
    let csrfHash = <?= json_encode(csrf_hash()) ?>;
    let activeModalUrl = null;

    const placeholderPattern = /\(:?(segment|num)\)/i;
    const encodedPlaceholderPattern = /%28:(segment|num)%29/i;

    const actionMap = {
        '.postAnnouncementBtn': { formtype: 'Marketing', endpoint: 'addCampaign' },
        '.addBankAccount': { formtype: 'Add', endpoint: 'addBankAccount' },
        '.addCreditAccount': { formtype: 'Add', endpoint: 'addCreditAccount' },
        '.deleteWalletBtn, #deleteWalletBtn': { formtype: 'Delete', endpoint: 'deleteWallet' }
    };

    function getModalAdapter(modalElement) {
        if (window.bootstrap && window.bootstrap.Modal) {
            const instance = window.bootstrap.Modal.getOrCreateInstance(modalElement);
            return {
                show: () => instance.show(),
                hide: () => instance.hide()
            };
        }

        if (window.jQuery && typeof window.jQuery.fn.modal === 'function') {
            return {
                show: () => window.jQuery(modalElement).modal('show'),
                hide: () => window.jQuery(modalElement).modal('hide')
            };
        }

        return null;
    }

    function guardUrl(url, meta = {}) {
        if (!url || placeholderPattern.test(url) || encodedPlaceholderPattern.test(url)) {
            console.warn('Modal URL guard blocked request.', { url, meta });
            return null;
        }

        return url;
    }

    function sanitizeSegment(segment) {
        if (segment === null || segment === undefined) {
            return '';
        }

        const decoded = decodeURIComponent(String(segment)).replace(/^\/+/, '').trim();
        const placeholderOnlyPattern = /^\(:?(segment|num)\)$/i;

        if (!decoded || placeholderOnlyPattern.test(decoded) || encodedPlaceholderPattern.test(String(segment))) {
            return '';
        }

        return encodeURIComponent(decoded);
    }

    function buildModalUrl(target) {
        const segments = [
            sanitizeSegment(target?.formtype),
            sanitizeSegment(target?.endpoint),
            sanitizeSegment(target?.accountid),
            sanitizeSegment(target?.category),
            sanitizeSegment(target?.platform),
        ].filter(Boolean);

        return `${modalBaseUrl}/${segments.join('/')}`;
    }

    function getActionConfigFromTrigger(trigger) {
        const dataset = {
            formtype: trigger.dataset.formtype ||
                trigger.dataset.formType ||
                trigger.dataset.modalFormtype ||
                '',
            endpoint: trigger.dataset.endpoint ||
                trigger.dataset.modalEndpoint ||
                trigger.dataset.action ||
                '',
            accountid: trigger.dataset.accountid ||
                trigger.dataset.accountId ||
                trigger.dataset.walletId ||
                trigger.dataset.walletid ||
                trigger.dataset.id ||
                trigger.dataset.cuid ||
                '',
            category: trigger.dataset.category || '',
            platform: trigger.dataset.platform || ''
        };

        if (dataset.formtype && dataset.endpoint) {
            return dataset;
        }

        for (const [selector, config] of Object.entries(actionMap)) {
            if (trigger.matches(selector)) {
                return {
                    ...dataset,
                    formtype: config.formtype,
                    endpoint: config.endpoint
                };
            }
        }

        return null;
    }

    const allowedEndpoints = new Set([
        'continueSetup',
        'addCampaign',
        'addBankAccount',
        'addCreditAccount',
        'addDebtAccount',
        'addInvestAccount',
        'addCryptoAccount',
        'deleteWallet',
        'addBondTrade', 'addCryptoTrade', 'addOptionsTrade', 'addStockTrade', 'addWatchlist',
        'addBudgetIncome', 'addBudgetExpense', 'viewHistory',
        'Add', 'View',
        'editBankAccount', 'editCreditAccount', 'editDebtAccount', 'editInvestAccount', 'editCryptoAccount',
        'purchasePaypal',
        'walletSelection',
        'createTradeAlert', 'manageTradeAlert', 'updateExchange', 'viewTradeChart',
        'Add',
        'newProject', 'commitProject', 'discussProject', 'investProject', 'sellProject',
        'connectWalletModal', 'coinSwap', 'createSolanaToken', 'viewSolanaOrders', 'viewSolanaToken', 'viewSolanaWallet'
    ]);

    function isAllowedAction(action) {
        return !!(action?.formtype && action?.endpoint && allowedEndpoints.has(action.endpoint));
    }

    function setLoadingState() {
        loadingContent.classList.remove('d-none');
        transactionContainer.classList.add('d-none');
        transactionContainer.innerHTML = '';
    }

    function showInlineError(message) {
        loadingContent.classList.add('d-none');
        transactionContainer.innerHTML = `
            <div class="modal-body">
                <div class="alert alert-danger mb-0">${message}</div>
            </div>
        `;
        transactionContainer.classList.remove('d-none');
    }

    function updateCsrfFromPayload(payload) {
        if (!payload || typeof payload !== 'object') {
            return;
        }

        if (typeof payload.csrfHash === 'string' && payload.csrfHash.trim() !== '') {
            csrfHash = payload.csrfHash;
        }
    }

    function parseJsonSafely(response, rawText) {
        const contentType = String(response.headers.get('content-type') || '').toLowerCase();
        if (!contentType.includes('application/json')) {
            return null;
        }

        try {
            return JSON.parse(rawText);
        } catch (error) {
            return null;
        }
    }

    function runModalDiagnostics() {
        const ids = ['transactionModal', 'transactionModalDialog', 'transactionContainer', 'loading-content'];

        ids.forEach(function (id) {
            const el = document.getElementById(id);
            if (!el) {
                console.warn('[MODAL DEBUG] Missing element:', id);
                return;
            }

            const cs = window.getComputedStyle(el);
            console.log('[MODAL DEBUG]', id, {
                display: cs.display,
                visibility: cs.visibility,
                opacity: cs.opacity,
                zIndex: cs.zIndex,
                position: cs.position,
                pointerEvents: cs.pointerEvents,
                transform: cs.transform,
                overflow: cs.overflow,
                width: cs.width,
                height: cs.height,
                className: el.className,
                inlineStyle: el.getAttribute('style')
            });
        });

        document.querySelectorAll('.modal-backdrop').forEach(function (el, index) {
            const cs = window.getComputedStyle(el);
            console.log('[MODAL DEBUG] modal-backdrop #' + index, {
                display: cs.display,
                visibility: cs.visibility,
                opacity: cs.opacity,
                zIndex: cs.zIndex,
                position: cs.position,
                className: el.className,
                inlineStyle: el.getAttribute('style')
            });
        });

        const topElement = document.elementFromPoint(Math.floor(window.innerWidth / 2), Math.floor(window.innerHeight / 2));
        console.log('[MODAL DEBUG] Top center element:', topElement);
    }

    function refreshTransactionViews() {
        if (window.jQuery && jQuery.fn?.DataTable && jQuery.fn.DataTable.isDataTable('#walletTransactionDatabase')) {
            const dt = jQuery('#walletTransactionDatabase').DataTable();
            if (typeof dt.ajax?.reload === 'function') {
                dt.ajax.reload(null, false);
            } else {
                dt.draw(false);
            }
        }

        window.dispatchEvent(new CustomEvent('wallet:updated'));
    }

    async function loadModalFromUrl(url, options = {}) {
        const shouldShowModal = options.show !== false;
        const modalAdapter = getModalAdapter(modalElement);
        if (!modalAdapter) {
            console.warn('[transactionModal] No Bootstrap modal runtime detected.');
            return;
        }

        activeModalUrl = url;
        setLoadingState();

        if (shouldShowModal) {
            modalAdapter.show();
        }

        const response = await fetch(url, {
            method: 'GET',
            credentials: 'same-origin',
            headers: {
                'Accept': 'text/html,application/xhtml+xml',
                'X-Requested-With': 'XMLHttpRequest',
                [csrfHeaderName]: csrfHash,
            }
        });

        const html = await response.text();

        if (!response.ok) {
            throw new Error(`Modal request failed (${response.status}).`);
        }

        if (response.headers.get('X-Session-Expired') === '1' || /login/i.test(html)) {
            modalAdapter.hide();
            window.location.href = <?= json_encode(site_url('/login')) ?>;
            return;
        }

        loadingContent.classList.add('d-none');
        transactionContainer.innerHTML = html;
        transactionContainer.classList.remove('d-none');

        modalElement.style.display = 'block';
        modalElement.style.visibility = 'visible';
        modalElement.style.opacity = '1';

        runModalDiagnostics();
    }

    async function loadFromTrigger(trigger, options = {}) {
        const action = getActionConfigFromTrigger(trigger);

        if (!isAllowedAction(action)) {
            console.warn('Blocked unsupported transactionModal action.', {
                classes: trigger.className,
                dataset: trigger.dataset
            });

            if (options.showError === true) {
                setLoadingState();
                showInlineError('This modal action is not available yet. Please refresh and try again.');
            }

            return;
        }

        const url = guardUrl(buildModalUrl(action), {
            source: options.source || 'trigger',
            classes: trigger.className,
            action
        });

        if (!url) {
            return;
        }

        if (activeModalUrl === url) {
            return;
        }

        try {
            await loadModalFromUrl(url, { show: options.show !== false });
        } catch (error) {
            activeModalUrl = null;
            console.error('Failed to load transaction modal content.', error);
            showInlineError('Unable to load this action right now.');
        }
    }

    async function openFromTrigger(trigger) {
        return loadFromTrigger(trigger, { source: 'click', show: true });
    }

    document.addEventListener('click', function (event) {
        const trigger = event.target.closest('.dynamicModalLoader, .postAnnouncementBtn, .addBankAccount, .addCreditAccount, .depositFundsBtn, .withdrawFundsBtn, .deleteWalletBtn, #deleteWalletBtn');
        if (!trigger) {
            return;
        }

        event.preventDefault();
        openFromTrigger(trigger);
    });

    modalElement.addEventListener('show.bs.modal', function (event) {
        const trigger = event.relatedTarget;
        if (!trigger || !trigger.matches?.('.dynamicModalLoader, .postAnnouncementBtn, .addBankAccount, .addCreditAccount, .depositFundsBtn, .withdrawFundsBtn, .deleteWalletBtn, #deleteWalletBtn')) {
            return;
        }

        loadFromTrigger(trigger, {
            source: 'bootstrap-show',
            show: false,
            showError: true
        });
    });

    modalElement.addEventListener('hidden.bs.modal', function () {
        activeModalUrl = null;
        setLoadingState();
    });

    transactionContainer.addEventListener('submit', async function (event) {
        const form = event.target.closest('form');
        if (!form) {
            return;
        }

        const method = String(form.getAttribute('method') || 'GET').toUpperCase();
        if (method !== 'POST') {
            return;
        }

        event.preventDefault();

        const submitButton = form.querySelector('[type="submit"]');
        const originalButtonHtml = submitButton ? submitButton.innerHTML : '';
        if (submitButton) {
            submitButton.disabled = true;
            submitButton.innerHTML = 'Saving...';
        }

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                credentials: 'same-origin',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    [csrfHeaderName]: csrfHash,
                },
                body: new FormData(form),
            });

            const rawText = await response.text();
            const payload = parseJsonSafely(response, rawText);

            if (!payload) {
                throw new Error(`Expected JSON response, received: ${response.status}`);
            }

            updateCsrfFromPayload(payload);

            if (!response.ok || payload.status === 'error') {
                showInlineError(payload.message || 'We could not save your changes.');
                return;
            }

            const modalAdapter = getModalAdapter(modalElement);
            if (modalAdapter) {
                modalAdapter.hide();
            }
            refreshTransactionViews();

            if (payload.redirect && typeof payload.redirect === 'string') {
                window.location.href = payload.redirect;
                return;
            }

            if (!document.querySelector('#walletTransactionDatabase')) {
                window.location.reload();
            }
        } catch (error) {
            console.error('Transaction modal form submission failed.', error);
            showInlineError('A network or server error occurred. Please try again.');
        } finally {
            if (submitButton) {
                submitButton.disabled = false;
                submitButton.innerHTML = originalButtonHtml;
            }
        }
    });

    window.dynamicModalLoader = function (urlOrPath) {
        if (typeof urlOrPath !== 'string' || !urlOrPath.trim()) {
            return;
        }

        const absoluteUrl = urlOrPath.startsWith('http')
            ? urlOrPath
            : <?= json_encode(rtrim(site_url('/'), '/')) ?> + '/' + urlOrPath.replace(/^\/+/, '');

        const guardedUrl = guardUrl(absoluteUrl, { source: 'window.dynamicModalLoader' });
        if (!guardedUrl) {
            return;
        }

        loadModalFromUrl(guardedUrl).catch((error) => {
            console.error('dynamicModalLoader request failed.', error);
        });
    };
})();
</script>

<?php endif; ?>

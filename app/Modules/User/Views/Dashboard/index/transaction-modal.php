<!-- app/Modules/User/Views/Dashboard/index/transaction-modal.php -->
<?php
helper('url_guard');
?>

<?php if (!defined('TRANSACTION_MODAL_RENDERED')): ?>
<?php define('TRANSACTION_MODAL_RENDERED', true); ?>

<div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="transactionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" id="transModalDialog">
        <div class="modal-content" id="loading-content">
            <?= view('UserModule\Views\Dashboard\index\modal-loading-page'); ?>
        </div>
        <div class="modal-content d-none" id="transactionContainer"></div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
(function () {
    if (!window.bootstrap?.Modal) {
        console.warn('Bootstrap 5 modal runtime not detected.');
        return;
    }

    const modalElement = document.getElementById('transactionModal');
    const loadingContent = document.getElementById('loading-content');
    const transactionContainer = document.getElementById('transactionContainer');

    if (!modalElement || !loadingContent || !transactionContainer) {
        console.warn('transactionModal containers are missing.');
        return;
    }

    const modalInstance = bootstrap.Modal.getOrCreateInstance(modalElement);
    const modalBaseUrl = "<?= rtrim(mymi_url_guard(site_url('Dashboard/Transaction-Modal'), ['source' => __FILE__, 'line' => __LINE__]), '/') ?>";
    const csrfHeaderName = <?= json_encode(csrf_header()) ?>;
    const csrfHash = <?= json_encode(csrf_hash()) ?>;

    const placeholderPattern = /\(:?(segment|num)\)/i;
    const encodedPlaceholderPattern = /%28:(segment|num)%29/i;

    const actionMap = {
        '.postAnnouncementBtn': { formtype: 'Marketing', endpoint: 'addCampaign' },
        '.addBankAccount': { formtype: 'Add', endpoint: 'addBankAccount' },
        '.addCreditAccount': { formtype: 'Add', endpoint: 'addCreditAccount' },
        '.deleteWalletBtn, #deleteWalletBtn': { formtype: 'Delete', endpoint: 'deleteWallet' }
    };

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
            formtype: trigger.dataset.formtype || '',
            endpoint: trigger.dataset.endpoint || '',
            accountid: trigger.dataset.accountid || trigger.dataset.cuid || '',
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

    async function loadModalFromUrl(url) {
        setLoadingState();
        modalInstance.show();

        const response = await fetch(url, {
            method: 'GET',
            credentials: 'same-origin',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                [csrfHeaderName]: csrfHash,
            }
        });

        const html = await response.text();

        if (!response.ok) {
            throw new Error(`Modal request failed (${response.status}).`);
        }

        if (response.headers.get('X-Session-Expired') === '1' || /login/i.test(html)) {
            modalInstance.hide();
            window.location.href = <?= json_encode(site_url('/login')) ?>;
            return;
        }

        loadingContent.classList.add('d-none');
        transactionContainer.innerHTML = html;
        transactionContainer.classList.remove('d-none');
    }

    async function openFromTrigger(trigger) {
        const action = getActionConfigFromTrigger(trigger);

        if (!isAllowedAction(action)) {
            console.warn('Blocked unsupported transactionModal action.', {
                classes: trigger.className,
                dataset: trigger.dataset
            });
            return;
        }

        const url = guardUrl(buildModalUrl(action), {
            source: 'trigger',
            classes: trigger.className,
            action
        });

        if (!url) {
            return;
        }

        try {
            await loadModalFromUrl(url);
        } catch (error) {
            console.error('Failed to load transaction modal content.', error);
            loadingContent.classList.add('d-none');
            transactionContainer.innerHTML = '<div class="modal-body"><div class="alert alert-danger text-center mb-0">Unable to load this action right now.</div></div>';
            transactionContainer.classList.remove('d-none');
        }
    }

    document.addEventListener('click', function (event) {
        const trigger = event.target.closest('.dynamicModalLoader, .postAnnouncementBtn, .addBankAccount, .addCreditAccount, .depositFundsBtn, .withdrawFundsBtn, .deleteWalletBtn, #deleteWalletBtn');
        if (!trigger) {
            return;
        }

        event.preventDefault();
        openFromTrigger(trigger);
    });

    modalElement.addEventListener('hidden.bs.modal', function () {
        setLoadingState();
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

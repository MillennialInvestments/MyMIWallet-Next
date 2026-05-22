<?php
/**
 * Global Transaction Modal Shell
 * This file should render only a hidden Bootstrap modal shell.
 * Content is injected by JS only after a .dynamicModalLoader trigger is clicked.
 */
?>

<div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="transactionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" id="transModalDialog">
        <div class="modal-content" id="transactionModalContent">
            <div id="transactionContainer">
                <!-- AJAX modal content is injected here only after click. -->
            </div>
        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', function () {
    const modalElement = document.getElementById('transactionModal');
    const container = document.getElementById('transactionContainer');

    if (!modalElement || !container) {
        console.warn('[transactionModal] Modal shell or container missing.');
        return;
    }

    let activeRequestController = null;

    function getModalAdapter() {
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

    function loadingHtml() {
        return `
            <div class="modal-header">
                <h5 class="modal-title" id="transactionModalLabel">Please Hold... Loading Content</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center py-5">
                <div class="spinner-border text-primary" role="status" aria-hidden="true"></div>
                <p class="text-muted mt-3 mb-0">Loading this action...</p>
            </div>
        `;
    }

    function errorHtml(message) {
        return `
            <div class="modal-header">
                <h5 class="modal-title" id="transactionModalLabel">Unable to Load</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger mb-0">${message}</div>
            </div>
        `;
    }

    function readAction(trigger) {
        return {
            formtype:
                trigger.dataset.formtype ||
                trigger.dataset.formType ||
                trigger.dataset.modalFormtype ||
                '',

            endpoint:
                trigger.dataset.endpoint ||
                trigger.dataset.modalEndpoint ||
                trigger.dataset.action ||
                '',

            accountid:
                trigger.dataset.accountid ||
                trigger.dataset.accountId ||
                trigger.dataset.walletId ||
                trigger.dataset.walletid ||
                trigger.dataset.id ||
                trigger.dataset.cuid ||
                '',

            category:
                trigger.dataset.category ||
                trigger.dataset.modalCategory ||
                '',

            platform:
                trigger.dataset.platform ||
                trigger.dataset.modalPlatform ||
                ''
        };
    }

    function buildUrl(action) {
        const baseUrl = <?= json_encode(rtrim(site_url('Dashboard/Transaction-Modal'), '/')) ?>;
        const parts = [
            action.formtype,
            action.endpoint,
            action.accountid,
            action.category,
            action.platform
        ].filter(function (part) {
            return part !== null && part !== undefined && String(part).trim() !== '';
        });

        return baseUrl + '/' + parts.map(encodeURIComponent).join('/');
    }

    function abortInFlightRequest() {
        if (activeRequestController) {
            activeRequestController.abort();
            activeRequestController = null;
        }
    }

    function cleanupModalArtifacts() {
        document.querySelectorAll('.modal-backdrop').forEach(function (backdrop, index, arr) {
            if (index < arr.length - 1) {
                backdrop.remove();
            }
        });

        const hasOpenModal = document.querySelector('.modal.show') !== null;
        if (!hasOpenModal) {
            document.body.classList.remove('modal-open');
            document.body.style.removeProperty('padding-right');
        }
    }

    async function loadModal(url) {
        const adapter = getModalAdapter();

        if (!adapter) {
            console.warn('[transactionModal] No Bootstrap modal runtime detected.');
            return;
        }

        container.innerHTML = loadingHtml();
        adapter.show();

        try {
            abortInFlightRequest();
            activeRequestController = new AbortController();

            const response = await fetch(url, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                credentials: 'same-origin',
                signal: activeRequestController.signal
            });

            const html = await response.text();

            console.debug('[transactionModal] response', {
                url: url,
                status: response.status,
                length: html.length,
                preview: html.substring(0, 300)
            });

            if (!response.ok) {
                throw new Error('Request failed with status ' + response.status);
            }

            if (!html || html.trim() === '') {
                throw new Error('Modal request returned empty HTML.');
            }

            container.innerHTML = html;
        } catch (error) {
            if (error && error.name === 'AbortError') {
                return;
            }

            console.error('[transactionModal] load failed', error);
            container.innerHTML = errorHtml('Unable to load this action right now. Please refresh and try again.');
        } finally {
            activeRequestController = null;
        }
    }

    document.addEventListener('click', function (event) {
        const trigger = event.target.closest('.dynamicModalLoader');

        if (!trigger) {
            return;
        }

        event.preventDefault();

        const action = readAction(trigger);

        if (!action.formtype || !action.endpoint) {
            console.warn('[transactionModal] Missing modal action data.', {
                dataset: trigger.dataset,
                action: action
            });

            container.innerHTML = errorHtml('This button is missing modal action data.');
            const adapter = getModalAdapter();
            if (adapter) {
                adapter.show();
            }

            return;
        }

        const url = buildUrl(action);

        console.debug('[transactionModal] opening', {
            action: action,
            url: url
        });

        loadModal(url);
    });

    modalElement.addEventListener('hide.bs.modal', function () {
        abortInFlightRequest();
    });

    modalElement.addEventListener('shown.bs.modal', function () {
        cleanupModalArtifacts();
    });

    modalElement.addEventListener('hidden.bs.modal', function () {
        container.innerHTML = '';
        cleanupModalArtifacts();
    });
});
</script>
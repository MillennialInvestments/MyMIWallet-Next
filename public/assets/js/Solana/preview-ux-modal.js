/**
 * MyMI Wallet Solana Preview UX Modal - Phase 14
 *
 * Safety guarantees:
 * - Preview-only.
 * - No transaction broadcast.
 * - No mainnet minting.
 * - No private-key submission.
 * - No auth or CSRF bypass.
 * - Blocks swap/transaction-like form submission and shows preview modal instead.
 */
(function () {
    'use strict';

    const MARKER = 'MYMI_SOLANA_PREVIEW_UX_MODAL_PHASE14_20260603';

    if (window[MARKER]) {
        return;
    }

    window[MARKER] = true;

    const config = window.mymiSolanaPreviewConfig || {};

    const blockedSecretFields = [
        'private_key',
        'privateKey',
        'secret_key',
        'secretKey',
        'seed',
        'seed_phrase',
        'mnemonic',
        'wallet_secret'
    ];

    function getConfigValue(key, fallback) {
        return Object.prototype.hasOwnProperty.call(config, key) ? config[key] : fallback;
    }

    function getCsrfName(form) {
        if (getConfigValue('csrfTokenName', '')) {
            return getConfigValue('csrfTokenName', '');
        }

        const metaName = document.querySelector('meta[name="csrf-token-name"]');
        if (metaName && metaName.content) {
            return metaName.content;
        }

        if (form) {
            const hidden = form.querySelector('input[type="hidden"][name]');
            if (hidden && hidden.name && hidden.value) {
                return hidden.name;
            }
        }

        return '';
    }

    function getCsrfHash(form) {
        if (getConfigValue('csrfHash', '')) {
            return getConfigValue('csrfHash', '');
        }

        const metaHash = document.querySelector('meta[name="csrf-token"]');
        if (metaHash && metaHash.content) {
            return metaHash.content;
        }

        if (form) {
            const hidden = form.querySelector('input[type="hidden"][name]');
            if (hidden && hidden.value) {
                return hidden.value;
            }
        }

        return '';
    }

    function getFormValue(form, names, fallback) {
        for (let i = 0; i < names.length; i += 1) {
            const field = form.querySelector('[name="' + names[i] + '"], #' + names[i]);
            if (field && typeof field.value !== 'undefined' && String(field.value).trim() !== '') {
                return String(field.value).trim();
            }
        }

        return fallback;
    }

    function sanitizePayload(payload) {
        blockedSecretFields.forEach(function (field) {
            if (Object.prototype.hasOwnProperty.call(payload, field)) {
                delete payload[field];
            }
        });

        payload.private_key_submission_allowed = false;
        payload.broadcast = false;
        payload.dry_run = true;
        payload.signature_required = true;
        payload.wallet_signature_required = true;

        return payload;
    }

    function buildPreviewPayload(form) {
        const payload = {};

        const formData = new FormData(form);

        formData.forEach(function (value, key) {
            if (blockedSecretFields.indexOf(key) !== -1) {
                return;
            }

            payload[key] = value;
        });

        payload.action = getFormValue(form, ['action', 'swap_action'], 'swap_preview');
        payload.network = getFormValue(form, ['network', 'blockchain'], 'solana');
        payload.from_token = getFormValue(form, ['from_token', 'fromToken', 'from_coin', 'fromCoin'], 'SOL');
        payload.to_token = getFormValue(form, ['to_token', 'toToken', 'selectedToken', 'coin', 'token'], '');
        payload.amount = getFormValue(form, ['amount', 'from_amount', 'quantity', 'subtotal'], '');
        payload.slippage = getFormValue(form, ['slippage', 'slippage_tolerance'], 'Preview only');
        payload.estimated_output = getFormValue(form, ['estimated_output', 'to_amount'], 'Preview pending API estimate');
        payload.estimated_fee = getFormValue(form, ['estimated_fee', 'transaction_fee', 'fee'], 'Preview pending fee estimate');

        return sanitizePayload(payload);
    }

    function createModalShell() {
        let modal = document.getElementById('mymiSolanaPreviewUxModal');

        if (modal) {
            return modal;
        }

        modal = document.createElement('div');
        modal.id = 'mymiSolanaPreviewUxModal';
        modal.className = 'modal fade';
        modal.tabIndex = -1;
        modal.setAttribute('role', 'dialog');
        modal.setAttribute('aria-labelledby', 'mymiSolanaPreviewUxModalLabel');
        modal.setAttribute('aria-hidden', 'true');

        modal.innerHTML = ''
            + '<div class="modal-dialog modal-lg modal-dialog-centered" role="document">'
            + '  <div class="modal-content">'
            + '    <div class="modal-header">'
            + '      <h5 class="modal-title" id="mymiSolanaPreviewUxModalLabel">Solana Transaction Preview</h5>'
            + '      <button type="button" class="close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close">'
            + '        <span aria-hidden="true">&times;</span>'
            + '      </button>'
            + '    </div>'
            + '    <div class="modal-body" id="mymiSolanaPreviewUxModalBody"></div>'
            + '    <div class="modal-footer">'
            + '      <button type="button" class="btn btn-secondary" data-dismiss="modal" data-bs-dismiss="modal">Close</button>'
            + '      <button type="button" class="btn btn-outline-primary" disabled>Wallet Signature Next Step</button>'
            + '    </div>'
            + '  </div>'
            + '</div>';

        document.body.appendChild(modal);

        return modal;
    }

    function escapeHtml(value) {
        return String(value === null || typeof value === 'undefined' ? '' : value)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    function boolBadge(value) {
        const normalized = value === true || value === 'true' || value === 1 || value === '1';

        return normalized
            ? '<span class="badge badge-success bg-success">true</span>'
            : '<span class="badge badge-danger bg-danger">false</span>';
    }

    function renderPreview(payload, responsePayload, errorMessage) {
        const data = responsePayload && typeof responsePayload === 'object' ? responsePayload : {};
        const preview = data.preview && typeof data.preview === 'object' ? data.preview : data;

        const action = preview.action || payload.action || 'swap_preview';
        const network = preview.network || payload.network || 'solana';
        const fromToken = preview.from_token || payload.from_token || 'SOL';
        const toToken = preview.to_token || payload.to_token || 'Selected token pending';
        const amount = preview.amount || payload.amount || 'Amount pending';
        const estimatedOutput = preview.estimated_output || payload.estimated_output || 'Preview pending API estimate';
        const slippage = preview.slippage || payload.slippage || 'Preview only';
        const estimatedFee = preview.estimated_fee || payload.estimated_fee || 'Preview pending fee estimate';

        const dryRun = Object.prototype.hasOwnProperty.call(preview, 'dry_run') ? preview.dry_run : true;
        const broadcast = Object.prototype.hasOwnProperty.call(preview, 'broadcast') ? preview.broadcast : false;
        const signatureRequired = Object.prototype.hasOwnProperty.call(preview, 'signature_required') ? preview.signature_required : true;
        const walletSignatureRequired = Object.prototype.hasOwnProperty.call(preview, 'wallet_signature_required') ? preview.wallet_signature_required : true;
        const privateKeyAllowed = Object.prototype.hasOwnProperty.call(preview, 'private_key_submission_allowed') ? preview.private_key_submission_allowed : false;

        let html = '';

        html += '<div class="alert alert-warning">';
        html += '<strong>Preview only.</strong> No transaction has been signed or broadcast. Wallet signature is the next step, but it is disabled in this Phase 14 UX preview.';
        html += '</div>';

        if (errorMessage) {
            html += '<div class="alert alert-danger">';
            html += '<strong>Preview API warning:</strong> ' + escapeHtml(errorMessage);
            html += '</div>';
        }

        html += '<div class="card">';
        html += '  <div class="card-body">';
        html += '    <div class="row gy-2">';
        html += '      <div class="col-md-6"><strong>Action:</strong><br>' + escapeHtml(action) + '</div>';
        html += '      <div class="col-md-6"><strong>Network:</strong><br>' + escapeHtml(network) + '</div>';
        html += '      <div class="col-md-6"><strong>Token Pair:</strong><br>' + escapeHtml(fromToken) + ' → ' + escapeHtml(toToken) + '</div>';
        html += '      <div class="col-md-6"><strong>Amount:</strong><br>' + escapeHtml(amount) + '</div>';
        html += '      <div class="col-md-6"><strong>Estimated Output:</strong><br>' + escapeHtml(estimatedOutput) + '</div>';
        html += '      <div class="col-md-6"><strong>Slippage:</strong><br>' + escapeHtml(slippage) + '</div>';
        html += '      <div class="col-md-6"><strong>Estimated Fee:</strong><br>' + escapeHtml(estimatedFee) + '</div>';
        html += '      <div class="col-md-6"><strong>Wallet Signature:</strong><br>Required before any future executable transaction.</div>';
        html += '    </div>';
        html += '  </div>';
        html += '</div>';

        html += '<hr>';

        html += '<div class="row gy-2">';
        html += '  <div class="col-md-4"><strong>dry_run:</strong> ' + boolBadge(dryRun) + '</div>';
        html += '  <div class="col-md-4"><strong>broadcast:</strong> ' + boolBadge(broadcast) + '</div>';
        html += '  <div class="col-md-4"><strong>signature_required:</strong> ' + boolBadge(signatureRequired) + '</div>';
        html += '  <div class="col-md-6 mt-2"><strong>wallet_signature_required:</strong> ' + boolBadge(walletSignatureRequired) + '</div>';
        html += '  <div class="col-md-6 mt-2"><strong>private_key_submission_allowed:</strong> ' + boolBadge(privateKeyAllowed) + '</div>';
        html += '</div>';

        html += '<div class="alert alert-info mt-3 mb-0">';
        html += 'This screen is a safety preview. It does not submit private keys, does not mint, does not broadcast, and does not bypass CSRF/authentication.';
        html += '</div>';

        return html;
    }

    function showModal(html) {
        const modal = createModalShell();
        const body = document.getElementById('mymiSolanaPreviewUxModalBody');

        if (body) {
            body.innerHTML = html;
        }

        if (window.jQuery && typeof window.jQuery.fn.modal === 'function') {
            window.jQuery(modal).modal('show');
            return;
        }

        if (window.bootstrap && typeof window.bootstrap.Modal === 'function') {
            window.bootstrap.Modal.getOrCreateInstance(modal).show();
            return;
        }

        modal.classList.add('show');
        modal.style.display = 'block';
        modal.removeAttribute('aria-hidden');
        document.body.classList.add('modal-open');
    }

    async function callPreviewApi(form, payload) {
        const endpoint = getConfigValue('swapPreviewUrl', '/index.php/API/Solana/swap/preview');
        const csrfName = getCsrfName(form);
        const csrfHash = getCsrfHash(form);

        const body = new URLSearchParams();

        Object.keys(payload).forEach(function (key) {
            body.append(key, payload[key]);
        });

        if (csrfName && csrfHash && !body.has(csrfName)) {
            body.append(csrfName, csrfHash);
        }

        const headers = {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
            'X-Requested-With': 'XMLHttpRequest'
        };

        if (csrfHash) {
            headers['X-CSRF-TOKEN'] = csrfHash;
        }

        const response = await fetch(endpoint, {
            method: 'POST',
            credentials: 'same-origin',
            headers: headers,
            body: body.toString()
        });

        let json = {};

        try {
            json = await response.json();
        } catch (error) {
            json = {};
        }

        if (!response.ok) {
            throw new Error(json.message || 'Preview API returned HTTP ' + response.status);
        }

        return json;
    }

    function isSolanaPreviewForm(form) {
        if (!form) {
            return false;
        }

        if (form.id === 'solanaCoinSwapForm') {
            return true;
        }

        const action = String(form.getAttribute('action') || '').toLowerCase();

        return action.indexOf('solana') !== -1 && (
            action.indexOf('execute-swap') !== -1 ||
            action.indexOf('executeswap') !== -1 ||
            action.indexOf('swap') !== -1 ||
            action.indexOf('purchase') !== -1 ||
            action.indexOf('sell') !== -1
        );
    }

    function neutralizePrivateKeyFields() {
        blockedSecretFields.forEach(function (name) {
            const fields = document.querySelectorAll('[name="' + name + '"], #' + name);

            fields.forEach(function (field) {
                field.value = '';
                field.required = false;
                field.disabled = true;
                field.setAttribute('autocomplete', 'off');
                field.setAttribute('data-mymi-phase14-disabled', 'true');

                const wrapper = field.closest('.form-group, .form-control-wrap, .row, .col-md-6, div');
                if (wrapper) {
                    const notice = document.createElement('div');
                    notice.className = 'alert alert-warning mt-2';
                    notice.textContent = 'Private-key submission is disabled. Use wallet signature flow only.';
                    wrapper.appendChild(notice);
                }
            });
        });
    }

    document.addEventListener('submit', function (event) {
        const form = event.target;

        if (!isSolanaPreviewForm(form)) {
            return;
        }

        event.preventDefault();
        event.stopPropagation();

        if (typeof event.stopImmediatePropagation === 'function') {
            event.stopImmediatePropagation();
        }

        const payload = buildPreviewPayload(form);

        showModal(renderPreview(payload, {}, 'Loading safe transaction preview...'));

        callPreviewApi(form, payload)
            .then(function (previewResponse) {
                showModal(renderPreview(payload, previewResponse, ''));
            })
            .catch(function (error) {
                showModal(renderPreview(payload, {}, error.message || 'Preview failed safely. No transaction was submitted.'));
            });
    }, true);

    document.addEventListener('DOMContentLoaded', function () {
        neutralizePrivateKeyFields();
    });

    if (document.readyState === 'interactive' || document.readyState === 'complete') {
        neutralizePrivateKeyFields();
    }
})();

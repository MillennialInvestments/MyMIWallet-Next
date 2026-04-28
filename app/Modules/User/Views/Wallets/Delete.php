<?php
$uri = service('uri');
$walletID = (int) ($uri->getSegment(5) ?? 0);
$accountType = (string) ($uri->getSegment(6) ?? 'Bank');

$deleteUrl = $walletID > 0
    ? site_url('Wallets/Delete/' . rawurlencode($accountType) . '/' . $walletID)
    : '#';
?>
<div class="modal-header">
    <h3 class="modal-title" id="deleteWalletModalLabel">Delete This Wallet?</h3>
    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="alert alert-warning mb-0">
        This action permanently deletes the wallet and related records.
    </div>
    <div class="small text-muted mt-2" id="walletDeleteTargetText">
        Wallet ID: <?= esc((string) $walletID) ?> | Type: <?= esc($accountType) ?>
    </div>
</div>
<div class="modal-footer">
    <form id="delete_wallet_form" action="<?= esc($deleteUrl) ?>" method="post" class="w-100 d-flex justify-content-end gap-2">
        <?= csrf_field() ?>
        <button class="btn btn-danger" type="submit" <?= $walletID > 0 ? '' : 'disabled' ?>>Yes, delete</button>
        <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Cancel</button>
    </form>
</div>

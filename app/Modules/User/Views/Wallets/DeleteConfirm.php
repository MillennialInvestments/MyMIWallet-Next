<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <title>Delete Wallet | MyMI Wallet</title>
    <style>
        body { margin: 0; min-height: 100vh; display: flex; align-items: center; justify-content: center;
               font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif; background: #f5f6fa; color: #1c2b46; }
        .card { background: #fff; border-radius: 8px; box-shadow: 0 2px 12px rgba(0,0,0,.08); padding: 32px; max-width: 420px; width: calc(100% - 32px); text-align: center; }
        h1 { font-size: 1.25rem; margin: 0 0 8px; }
        p { margin: 0 0 20px; color: #526484; font-size: 0.95rem; }
        .warning { background: #fff3cd; color: #856404; padding: 12px; border-radius: 4px; margin-bottom: 20px; font-size: 0.875rem; text-align: left; }
        button { background: #e85347; color: #fff; border: 0; border-radius: 4px; padding: 10px 24px; font-size: 1rem; cursor: pointer; font-weight: 500; }
        button:hover { background: #cf3c30; }
        a { display: inline-block; margin-top: 16px; color: #6576ff; text-decoration: none; font-size: 0.9rem; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
<div class="card">
    <h1>Delete <?= esc(ucfirst($accountType)) ?> Wallet?</h1>
    <div class="warning">
        <strong>Warning:</strong> This action permanently deletes wallet #<?= esc((string) $walletID) ?> and its associated account records.
    </div>
    <p>Are you sure you want to proceed?</p>
    <form action="<?= site_url('Wallets/Delete/' . rawurlencode($accountType) . '/' . (int) $walletID) ?>" method="post">
        <?= csrf_field() ?>
        <?php if (! empty($childAccountId)): ?>
            <input type="hidden" name="account_id" value="<?= esc((string) $childAccountId) ?>">
        <?php endif; ?>
        <button type="submit" autofocus>Yes, delete wallet</button>
    </form>
    <div>
        <a href="<?= site_url('/Wallets') ?>">Cancel and return to Wallets</a>
    </div>
</div>
</body>
</html>

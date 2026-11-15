<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <title>Sign out | MyMI Wallet</title>
    <style>
        body { margin: 0; min-height: 100vh; display: flex; align-items: center; justify-content: center;
               font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif; background: #f5f6fa; color: #1c2b46; }
        .card { background: #fff; border-radius: 8px; box-shadow: 0 2px 12px rgba(0,0,0,.08); padding: 32px; max-width: 360px; width: calc(100% - 32px); text-align: center; }
        h1 { font-size: 1.25rem; margin: 0 0 8px; }
        p { margin: 0 0 24px; color: #526484; }
        button { background: #6576ff; color: #fff; border: 0; border-radius: 4px; padding: 10px 24px; font-size: 1rem; cursor: pointer; }
        a { display: inline-block; margin-top: 16px; color: #6576ff; }
    </style>
</head>
<body>
<div class="card">
    <h1>Sign out of MyMI Wallet?</h1>
    <p>You will need to log in again to see your account.</p>
    <form action="<?= site_url('logout') ?>" method="post">
        <?= csrf_field() ?>
        <button type="submit" autofocus>Sign out</button>
    </form>
    <a href="<?= site_url('/Dashboard') ?>">Back to my account</a>
</div>
</body>
</html>

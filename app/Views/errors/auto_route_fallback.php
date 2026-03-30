<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Page Not Found</title>
</head>
<body>
    <h1>Page Not Found</h1>
    <p>We could not find: <code><?= esc($path ?? ($url ?? 'unknown')) ?></code></p>
    <p><a href="<?= site_url('/') ?>">Return home</a></p>
</body>
</html>

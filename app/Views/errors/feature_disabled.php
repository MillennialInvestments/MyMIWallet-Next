<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Feature Temporarily Disabled</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-md-5">
                    <h1 class="h4 mb-3">Feature Temporarily Disabled</h1>
                    <p class="text-muted mb-4">
                        This feature is temporarily unavailable while maintenance is in progress.
                    </p>
                    <div class="alert alert-warning" role="alert">
                        Feature key: <strong><?= esc($feature ?? 'UNKNOWN') ?></strong>
                    </div>
                    <a class="btn btn-primary" href="<?= esc($supportUrl ?? '/Support') ?>">Contact Support</a>
                    <a class="btn btn-outline-secondary ms-2" href="/">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

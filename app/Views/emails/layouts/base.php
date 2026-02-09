<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'MyMI Wallet') ?></title>
</head>
<body style="margin:0;padding:20px;background:#f8f9fa;font-family:Arial,Helvetica,sans-serif;color:#212529;">
<div style="max-width:600px;margin:0 auto;background:#ffffff;border:1px solid #e9ecef;border-radius:6px;overflow:hidden;">
    <div style="background:#0d6efd;color:#ffffff;padding:16px 20px;">
        <h2 style="margin:0;font-size:20px;line-height:1.2;">MyMI Wallet</h2>
    </div>

    <div style="padding:20px;font-size:15px;line-height:1.6;color:#212529;">
        <?= $content ?? '' ?>
    </div>

    <?php if (! empty($actionUrl)) : ?>
        <div style="padding:0 20px 20px;">
            <a href="<?= esc($actionUrl) ?>"
               style="display:inline-block;background:#0d6efd;color:#ffffff;text-decoration:none;padding:12px 18px;border-radius:4px;font-weight:bold;">
                <?= esc($actionText ?? 'Continue') ?>
            </a>
        </div>
    <?php endif; ?>

    <div style="background:#f1f3f5;padding:16px 20px;font-size:13px;line-height:1.6;color:#495057;">
        <?= $footer ?? '' ?>
    </div>
</div>
</body>
</html>

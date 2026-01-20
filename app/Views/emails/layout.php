<?php
$title = $title ?? 'MyMI Wallet';
$preheader = $preheader ?? '';
$logoUrl = $logoUrl ?? '';
$appUrl = $appUrl ?? '';
$supportEmail = $supportEmail ?? 'support@mymiwallet.com';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title) ?></title>
</head>
<body style="margin:0; padding:0; background-color:#f5f7fb; font-family: Arial, sans-serif; color:#1d1d1d;">
    <div style="display:none; max-height:0; overflow:hidden; opacity:0;">
        <?= esc($preheader) ?>
    </div>
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color:#f5f7fb; padding:30px 0;">
        <tr>
            <td align="center">
                <table role="presentation" width="600" cellspacing="0" cellpadding="0" style="background-color:#ffffff; border-radius:10px; overflow:hidden; box-shadow:0 4px 16px rgba(0,0,0,0.06);">
                    <tr>
                        <td align="center" style="padding:24px 24px 8px; background-color:#ffffff;">
                            <a href="<?= esc($appUrl) ?>" target="_blank" rel="noopener" style="display:inline-block;">
                                <img src="<?= esc($logoUrl) ?>" alt="MyMI Wallet" width="140" style="display:block; border:0;" />
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:24px;">
                            <?= $content ?? '' ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:20px 24px 32px; font-size:12px; color:#6b7280; background-color:#f9fafb;">
                            <p style="margin:0 0 8px;">Need help? Contact us at <a href="mailto:<?= esc($supportEmail) ?>" style="color:#2563eb; text-decoration:none;"><?= esc($supportEmail) ?></a>.</p>
                            <p style="margin:0;">You received this email because you have an account with MyMI Wallet.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>

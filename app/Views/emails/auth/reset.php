<?php
helper('email');

$resolvedResetUrl = (string) ($resetUrl ?? $actionUrl ?? '');
$resolvedSupportEmail = (string) ($supportEmail ?? 'support@mymiwallet.com');
$recipientName = esc($user->username ?? $user->email ?? $name ?? 'there');
$resolvedExpires = $expiresIn ?? null;

if (is_string($resolvedExpires) && trim($resolvedExpires) !== '') {
    $expiryLine = '<p style="margin:0 0 12px;"><strong>Important:</strong> This link expires in ' . esc($resolvedExpires) . '.</p>';
} elseif (is_int($resolvedExpires) && $resolvedExpires > 0) {
    $expiryLine = '<p style="margin:0 0 12px;"><strong>Important:</strong> This link expires in ' . esc((string) $resolvedExpires) . ' minutes.</p>';
} else {
    $expiryLine = '<p style="margin:0 0 12px;"><strong>Important:</strong> This link will expire for security reasons.</p>';
}

$content = '
<p style="margin:0 0 12px;">Hi ' . $recipientName . ',</p>

<p style="margin:0 0 12px;">We received a request to reset the password for your <strong>MyMI Wallet</strong> account.</p>

<p style="margin:0 0 12px;">Click the button below to set a new password.</p>
' . $expiryLine;

$footer = '
<p style="margin:0 0 8px;">If the button does not work, copy and paste this link:</p>
<p style="margin:0 0 14px;word-break:break-all;">
  <a href="' . esc($resolvedResetUrl) . '">' . esc($resolvedResetUrl) . '</a>
</p>

<hr style="border:none;border-top:1px solid #dee2e6;margin:12px 0;">

<p style="margin:0 0 8px;">If you did not request this reset, you can safely ignore this email or contact us at
<a href="mailto:' . esc($resolvedSupportEmail) . '">' . esc($resolvedSupportEmail) . '</a>.</p>

<p style="margin:0;">Protecting your account is our priority.</p>
';

echo safe_email_view('emails/layouts/base', [
    'title'      => 'Reset Your MyMI Wallet Password',
    'content'    => $content,
    'actionUrl'  => $resolvedResetUrl,
    'actionText' => 'Reset Password',
    'footer'     => $footer,
]);

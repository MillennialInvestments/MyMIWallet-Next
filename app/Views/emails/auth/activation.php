<?php
helper('email');

$resolvedActivationUrl = (string) ($activationUrl ?? $actionUrl ?? '');
$resolvedSupportEmail = (string) ($supportEmail ?? 'support@mymiwallet.com');
$resolvedBaseUrl = rtrim((string) (($baseUrl ?? env('APP_URL')) ?: site_url()), '/');
$recipientName = esc($user->username ?? $user->email ?? $name ?? 'there');

$content = '
<p style="margin:0 0 12px;">Hi ' . $recipientName . ',</p>

<p style="margin:0 0 12px;">Welcome to <strong>MyMI Wallet</strong>! You’re one step away from activating your account.</p>

<p style="margin:0 0 12px;">Please confirm your email address by clicking the button below.</p>

<p style="margin:0;">For your security, activation links may expire if left unused for too long.</p>
';

$footer = '
<p style="margin:0 0 8px;">If the button does not work, copy and paste this link into your browser:</p>
<p style="margin:0 0 14px;word-break:break-all;">
  <a href="' . esc($resolvedActivationUrl) . '">' . esc($resolvedActivationUrl) . '</a>
</p>

<hr style="border:none;border-top:1px solid #dee2e6;margin:12px 0;">

<p style="margin:0 0 8px;"><strong>Need help?</strong><br>
Email us at <a href="mailto:' . esc($resolvedSupportEmail) . '">' . esc($resolvedSupportEmail) . '</a>.</p>

<p style="margin:0;">Track your budget, investments, and alerts in one place at <a href="' . esc($resolvedBaseUrl) . '">' . esc($resolvedBaseUrl) . '</a>.</p>
';

echo safe_email_view('emails/layouts/base', [
    'title'      => 'Activate Your MyMI Wallet Account',
    'content'    => $content,
    'actionUrl'  => $resolvedActivationUrl,
    'actionText' => 'Activate My Account',
    'footer'     => $footer,
]);

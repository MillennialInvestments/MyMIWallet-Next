# Solana Token Logo Fallbacks

## Problem

The Solana Exchange frontend loads token images from external URLs. At least one token logo URL fails with:

net::ERR_CERT_COMMON_NAME_INVALID

Example:

https://secureservercdn.net/160.153.138.53/cjm.06a.myftpupload.com/wp-content/uploads/2021/12/whey-coin-2048x2048.png

This creates console noise and can slow the token rendering flow.

## Mission

Add safe token logo fallback behavior for Solana Exchange token lists.

## Requirements

1. Do not block page rendering when a token logo fails.
2. Replace failed token images with a local MyMI placeholder logo.
3. Avoid repeatedly retrying broken image URLs.
4. Sanitize or reject unsafe image URLs where possible.
5. Do not modify Solana wallet secret handling.
6. Do not enable mainnet minting.
7. Do not bypass auth, CSRF, or route filters.
8. Keep changes focused on Solana token logo rendering.

## Files To Inspect

- app/Modules/Exchange/Views/Solana/index.php
- app/Modules/Exchange/Views/Solana/assets.php
- app/Modules/Exchange/Views/Solana/swap.php
- public/assets/js/
- public/assets/images/
- public/assets/img/

## Validation

Run:

php -l app/Modules/Exchange/Views/Solana/index.php
php -l app/Modules/Exchange/Views/Solana/assets.php
php -l app/Modules/Exchange/Views/Solana/swap.php

Browser check:

- Open /Exchange/Solana
- Confirm broken token image URLs no longer throw visible failures repeatedly
- Confirm fallback image displays
- Confirm View Solana Wallet still returns status 200 fallback
- Fresh rerun with qwen2.5-coder:1.5b at 20260601-110251. Produce actual code changes.

# Solana Token Logo Active Context

## Current Problem

The Solana Exchange page is still attempting to render at least one broken external token logo URL:

```text
https://secureservercdn.net/160.153.138.53/cjm.06a.myftpupload.com/wp-content/uploads/2021/12/whey-coin-2048x2048.png

Browser error:

GET ... net::ERR_CERT_COMMON_NAME_INVALID

This happens during token rendering:

updateTopPerformingTokens
append
datatables-helper.js
jquery-3.7.1.min.js
Current Confirmed Wins

The Solana modal issue is fixed:

/Dashboard/Transaction-Modal/Solana/viewSolanaWallet returns status 200

The current branch validates cleanly:

php -l app/Modules/Exchange/Views/Solana/index.php
php -l app/Modules/Exchange/Views/Solana/assets.php
php -l app/Modules/Exchange/Views/Solana/swap.php

All returned:

No syntax errors detected
Current Branch

Use existing branch only:

fix/solana-token-logo-fallbacks

Do not create a new branch.

Important Observation

The bad image URL is still present in the backend token payload/log output as:

[coin_logo] => https://secureservercdn.net/160.153.138.53/cjm.06a.myftpupload.com/wp-content/uploads/2021/12/whey-coin-2048x2048.png

This means the frontend should not wait for image onerror only. It should sanitize or reject bad logo URLs before appending image tags.

Required Fix

Implement a focused Solana token-logo fallback system.

The fix should:

Replace known bad token logo hosts before image rendering.
Avoid appending <img src="https://secureservercdn.net/...">.
Use a local placeholder immediately for bad or untrusted URLs.
Still keep an onerror fallback for normal image load failures.
Avoid repeated retries of broken URLs.
Keep changes focused on Solana Exchange token rendering only.
Bad / Unsafe Logo URL Rules

Treat these as unsafe and replace with local fallback before rendering:

secureservercdn.net
myftpupload.com
http://
empty string
null
undefined
javascript:
data:
blob:
Preferred Placeholder

Use an existing local MyMI image if available.

Search:

find public/assets -type f | grep -Ei "logo|placeholder|coin|token|mymi" | head -n 80

If no ideal placeholder exists, use the safest available local logo in public/assets.

Files To Inspect
app/Modules/Exchange/Views/Solana/index.php
app/Modules/Exchange/Views/Solana/assets.php
app/Modules/Exchange/Views/Solana/swap.php
public/assets/js/datatables-helper.js
public/assets/js/
Likely Target Area

The browser stack points to token rendering around:

updateTopPerformingTokens
Solana page inline JS around the token card/table rendering area

Search for:

grep -RIn "updateTopPerformingTokens\|coin_logo\|logoURI\|logo_url\|token.logo\|append" app/Modules/Exchange/Views/Solana public/assets/js | head -n 200
Required Validation

Run:

php -l app/Modules/Exchange/Views/Solana/index.php
php -l app/Modules/Exchange/Views/Solana/assets.php
php -l app/Modules/Exchange/Views/Solana/swap.php
php spark solana:wallet-secrets:audit --limit 500

Also confirm:

grep -RIn "secureservercdn.net\|myftpupload.com" app/Modules/Exchange/Views/Solana public/assets/js || true

Expected: either no direct render path uses these URLs, or the code explicitly blocks them.

Browser Acceptance Criteria

Open:

https://www.mymiwallet.com/Exchange/Solana

Hard refresh.

Expected:

No repeated ERR_CERT_COMMON_NAME_INVALID from secureservercdn.net
Broken token logos display a local placeholder
View Solana Wallet still returns status 200 fallback
No Solana modal 500
No wallet secret regression
Do Not Change

Do not modify Solana wallet secret handling.
Do not enable mainnet minting.
Do not bypass auth, CSRF, route, or login filters.
Do not modify unrelated modules.

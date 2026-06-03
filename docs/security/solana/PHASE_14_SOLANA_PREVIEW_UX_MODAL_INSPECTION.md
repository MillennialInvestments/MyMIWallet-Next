# Phase 14 Solana Preview UX Modal Inspection

Generated UTC: 2026-06-03T08:42:05Z
Branch: feature/solana-preview-ux-modal-phase-14
Commit: fd2c67a8a Merge pull request #505 from MillennialInvestments/feature/solana-preview-api-runtime-smoke-phase-13

## Safety Scope
- Inspection only.
- No transaction broadcast.
- No mainnet minting.
- No private-key submission.
- No auth or CSRF bypass.
- Phase 14 target is frontend preview UX before swap/transaction-like actions.

## Required Preview API Behavior
- POST /API/Solana/transaction/preview
- POST /API/Solana/swap/preview
- dry_run=true
- broadcast=false
- signature_required=true
- wallet_signature_required=true
- private_key_submission_allowed=false

## Repo State
```text
?? docs/security/solana/PHASE_14_SOLANA_PREVIEW_UX_MODAL_INSPECTION.md
```

## Latest Commit
```text
fd2c67a8a Merge pull request #505 from MillennialInvestments/feature/solana-preview-api-runtime-smoke-phase-13
```

## Guardrail Smoke
```text

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-03 08:42:05 UTC+00:00

============================================================
SOLANA GUARDRAILS SMOKE
============================================================
Safety: no private keys, no broadcasts, no mainnet minting.

## Config Defaults
PASS: SOLANA_ALLOW_TRANSACTION_EXECUTION default false
PASS: SOLANA_ALLOW_MAINNET_BROADCAST default false
PASS: SOLANA_ALLOW_MAINNET_MINT default false
PASS: SOLANA_ALLOW_PRIVATE_KEY_SUBMISSION default false
PASS: SOLANA_REQUIRE_WALLET_SIGNATURE default true
PASS: SOLANA_DEFAULT_DRY_RUN default true

## Provider Library Guard Responses
PASS: MyMIRaydium::swap returns array
PASS: MyMIRaydium::swap broadcast=false
PASS: MyMIRaydium::swap dry_run=true
PASS: MyMIRaydium::swap sanitized payload
PASS: MyMIRaydium::swap safe guard message
PASS: MyMIPhantom::transfer returns array
PASS: MyMIPhantom::transfer broadcast=false
PASS: MyMIPhantom::transfer dry_run=true
PASS: MyMIPhantom::transfer sanitized payload
PASS: MyMIPhantom::transfer safe guard message
PASS: MyMIPhantom::swap returns array
PASS: MyMIPhantom::swap broadcast=false
PASS: MyMIPhantom::swap dry_run=true
PASS: MyMIPhantom::swap sanitized payload
PASS: MyMIPhantom::swap safe guard message
PASS: MyMIPhantom::createToken returns array
PASS: MyMIPhantom::createToken broadcast=false
PASS: MyMIPhantom::createToken dry_run=true
PASS: MyMIPhantom::createToken sanitized payload
PASS: MyMIPhantom::createToken safe guard message
PASS: MyMISolflare::transfer returns array
PASS: MyMISolflare::transfer broadcast=false
PASS: MyMISolflare::transfer dry_run=true
PASS: MyMISolflare::transfer sanitized payload
PASS: MyMISolflare::transfer safe guard message
PASS: MyMISolflare::swap returns array
PASS: MyMISolflare::swap broadcast=false
PASS: MyMISolflare::swap dry_run=true
PASS: MyMISolflare::swap sanitized payload
PASS: MyMISolflare::swap safe guard message
PASS: MyMISolflare::createToken returns array
PASS: MyMISolflare::createToken broadcast=false
PASS: MyMISolflare::createToken dry_run=true
PASS: MyMISolflare::createToken sanitized payload
PASS: MyMISolflare::createToken safe guard message

============================================================
RESULT
============================================================
PASS count: 41
FAIL count: 0
```

## Target Solana View Files

### app/Modules/Exchange/Views/Solana/coinSwap.php

- Exists: yes
- Line count: 168

```text
50:                            <h1>Solana Coin Swap - MyMI Wallet</h1>
51:                            <p>Welcome to the Solana Coin Swap section of MyMI Wallet. Use the form below to perform a coin swap between two cryptocurrencies. Below the form, you can find a list of available tokens on the MyMI Solana Exchange for quick selection.</p>
60:                            <!-- Coin Swap Form -->
61:                            <form id="solanaCoinSwapForm" action="<?= base_url('Exchange/SolanaController/executeSwap') ?>" method="post">                                
62:                                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
69:                                <input id="wallet_id" name="wallet_id" value="<?php echo $cuSolanaDW['id'] ?? ''; ?>" class="form-control" type="hidden">
77:                                        <label for="to_token">Your MyMI Solana Wallet</label>
93:                                        <label for="private_key">Private Key</label>
94:                                        <input type="text" name="private_key" id="private_key" class="form-control" value="<?= set_value('private_key') ?>" required>
104:                                    <button type="submit" class="btn btn-primary">Execute Swap</button>
```

### app/Modules/Exchange/Views/Solana/swap.php

- Exists: yes
- Line count: 884

```text
2:// MYMI_SOLANA_SWAP_SAFE_URI_SEGMENT_20260602
17:            log_message('warning', 'Solana swap safe URI segment fallback used: segment={segment}, error={error}', [
31:// MYMI_SOLANA_SWAP_FETCH_SAFETY_20260602
32:window.mymiSolanaSwapRuntime = window.mymiSolanaSwapRuntime || (function () {
39:        let box = document.getElementById('mymi-solana-swap-runtime-alert');
43:                document.querySelector('#solanaSwapForm') ||
49:            box.id = 'mymi-solana-swap-runtime-alert';
66:        box.textContent = message || 'Unable to load Solana swap data right now.';
111:    async function fetchJson(url, options = {}, fallbackMessage = 'Unable to load Solana data.') {
113:            const response = await fetch(url, {
184:        fetchJson,
193:// MYMI_SOLANA_SWAP_FETCHPRICES_COMPAT_20260602
194:window.fetchPrices = window.fetchPrices || async function fetchPrices() {
195:    const runtime = window.mymiSolanaSwapRuntime || null;
233:    if (!runtime || typeof runtime.fetchJson !== 'function') {
234:        console.warn('Solana swap runtime helper is not available yet.');
237:            message: 'Solana swap runtime helper is not available yet.'
246:            message: 'No swap tokens selected yet.'
259:        const fromPriceResult = await runtime.fetchJson(
274:        const toPriceResult = await runtime.fetchJson(
288:    if (typeof window.calculateSwap === 'function') {
290:            window.calculateSwap();
292:            console.warn('calculateSwap failed after fetchPrices:', error);
340:<!-- app/Modules/Exchange/Views/Solana/swap.php -->
351:<div class="modal-header">
352:    <h3 class="modal-title" id="useCoinModalLabel">MyMI Solana Exchange</h3>
353:    <?php if($current_url !== 'Exchange/Solana/Swap'): ?>
354:    <button class="close" type="button" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
358:<div class="modal-body">
362:                <h4 class="title nk-block-title">Swap Your SOL for Token</h4>
363:                <p>Swap your Solana tokens for other cryptocurrencies seamlessly.</p>
376:                    <?php if($current_url === 'Exchange/Solana/Swap'): ?>
390:                            <form id="solanaCoinSwapForm" action="<?= base_url('Exchange/Solana/Wallet/Execute-Swap') ?>" class="form-horizontal gy-3" method="post">
391:                                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
469:                                        <label class="form-label" for="to_token">Transaction Fees:</label>
483:                                        <button class="btn btn-primary btn-lg" type="submit">Execute</button>
499:<div class="fade modal show" aria-hidden="true" aria-labelledby="kycApprovalModalLabel" id="kycApprovalModal" tabindex="-1">
500:    <div class="modal-dialog">
501:        <div class="modal-content">
502:            <div class="modal-header">
503:                <h5 class="modal-title" id="kycApprovalModal">KYC Verification / AML Requirements</h5>
504:                <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
506:            <div class="modal-body">
530:        fetchExchangePrice();
538:        fetchTokenPrice();
542:    $('#solanaCoinSwapForm').on('submit', function (event) {
545:        const transactionLimit = 500; // Transaction limit in USD
547:        if (!cuKYC && subtotalCosts > transactionLimit) {
549:            $('#kycModal').modal('show');
553:    // Fetch Prices
554:    function fetchExchangePrice() {
556:        fetch(`https://www.mymiwallet.com/index.php/API/Solana/getExchangePrice/${selectedFromToken}`)
559:            .catch((error) => console.error('Error fetching exchange price:', error));
562:    function fetchTokenPrice() {
565:        fetch(`https://www.mymiwallet.com/index.php/API/Solana/getTokenPrice/${selectedToToken}`)
568:            .catch((error) => console.error('Error fetching token price:', error));
571:    // Fetch User Balance
572:    function fetchFromCoinAmount(selectedToken) {
573:        fetch(`<?= base_url('index.php/API/Solana/getCoinAmount') ?>/${selectedToken}`)
576:            .catch((error) => console.error('Error fetching coin amount:', error));
615:    // Swap Tokens
616:    $('#swapTokens').on('click', function () {
619:            alert('Please select a token to swap to.');
622:        performTokenSwap();
625:    function performTokenSwap() {
633:        // Swap the tokens in the UI
646:        // Recalculate with swapped tokens
651:    $('#refreshExchangePrice, #refreshTokenPrice').on('click', fetchPrices);
654:    fetchPrices();
655:    fetchFromCoinAmount('SOL');
668://     document.getElementById('solanaCoinSwapForm').addEventListener('submit', function(event) {
671://         const transactionLimit = 500; // Set your transaction limit in USD here
673://         if (!cuKYC && subtotalCosts > transactionLimit) {
675://             $('#kycModal').modal('show');
679://     function fetchPrices() {
680://         fetchExchangePrice();
681://         fetchTokenPrice();
684://     function fetchExchangePrice() {
686://         fetch(`https://www.mymiwallet.com/index.php/API/Solana/getExchangePrice/${selectedFromToken}`)
692://                 console.error("Error fetching exchange price: ", error);
696:// function fetchTokenPrice() {
699://         fetch(`https://www.mymiwallet.com/index.php/API/Solana/getTokenPrice/${selectedToken}`)
705://                 console.error("Error fetching token price: ", error);
710://     $('#refreshExchangePrice, #refreshTokenPrice').on('click', fetchPrices);
717://         fetchExchangePrice();
725://         fetchTokenPrice();
734://     //     fetchExchangePrice();
735://     //     fetchFromCoinAmount(selectedToken);
744://     //     fetchTokenPrice();
751://     $('#swapTokens').on('click', function() {
754://             alert('Please select a token to swap to.');
757://         swapTokens();
760://     function swapTokens() {
769://         // Swap the tokens
784://     function fetchFromCoinAmount(selectedToken) {
785://         fetch(`<?=base_url('index.php/API/Solana/getCoinAmount')?>/${selectedToken}`)
791://                 console.error("Error fetching coin amount: ", error);
800://         // Fetch the latest rates before calculation
801://         fetchExchangePrice();
802://         fetchTokenPrice();
881://     fetchPrices();
882://     fetchFromCoinAmount('SOL');
```

### app/Modules/Exchange/Views/Solana/executeSwap.php

- Exists: yes
- Line count: 90

```text
61:            <h1>Import Solana Wallet - MyMI Wallet</h1>
62:            <p>Use the form below to import an existing Solana wallet by storing its public key in the MyMI Wallet system.</p>
71:            <form action="<?= base_url('Exchange/SolanaController/importWallet') ?>" method="post">
72:                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
86:                <button type="submit" class="btn btn-primary">Import Wallet</button>
```

### app/Modules/Exchange/Views/Solana/trade.php

- Exists: yes
- Line count: 249

```text
44:<div class="modal-header">
45:    <h3 class="modal-title">View Your Solana Wallet</h3>
46:    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
50:<div class="modal-body">
69:                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
92:                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
149:    fetch('index.php/API/Solana/getMarketPrice')
168:                alert('Failed to fetch the latest price.');
172:            console.error('Error fetching the price:', error);
173:            alert('Error fetching the price. Please try again later.');
183:    formData.append('method', 'fiat'); // Set the method dynamically (crypto_swap, fiat, mymi_gold)
185:    fetch('Exchange/Solana/Purchase', {
189:            'X-CSRF-TOKEN': "<?= csrf_hash(); ?>" // Include CSRF token
209:    fetch('Exchange/Solana/Sell', { // Ensure the correct URL is used for processing the sell request
213:            'X-CSRF-TOKEN': "<?= csrf_hash(); ?>" // Include CSRF token
221:                // Optionally close the modal
222:                closeModal();
233:// Optional utility to close the modal
234:function closeModal() {
235:    const modalElement = document.querySelector('.modal');
236:    if (modalElement) {
237:        modalElement.classList.remove('show');
238:        modalElement.setAttribute('aria-hidden', 'true');
239:        modalElement.style.display = 'none';
240:        document.body.classList.remove('modal-open');
242:        const modalBackdrop = document.querySelector('.modal-backdrop');
243:        if (modalBackdrop) {
244:            modalBackdrop.remove();
```

## Solana / Swap / Wallet Public Assets
```text
public/assets/css/mymiwallet.mobile.css
public/assets/css/wallet-transactions.css
public/assets/documents/Exports/bf_exchanges_assets.csv
public/assets/documents/Exports/bf_users_wallet.csv
public/assets/documents/Marketing/MyMI-Wallet-Marketing-Content-Generator.pdf
public/assets/images/Company/MyMI-Wallet-Black.png
public/assets/images/Company/MyMI-Wallet-Company-Logo.png
public/assets/images/Company/MyMI-Wallet-Mobile-White.png
public/assets/images/Company/MyMI Wallet - The Future of Finance.png
public/assets/images/Company/MyMI-Wallet-The-Future-Of-Finance-SQ.png
public/assets/images/Company/MyMI-Wallet-White-213x70.png
public/assets/images/Company/MyMI-Wallet-White-LG.png
public/assets/images/Company/MyMI-Wallet-White.png
public/assets/images/Exchanges/Icons/mymiwallet-icon.png
public/assets/images/Marketing/Services/MyMIWallet-Customize-Your-Membership-Landing.png
public/assets/images/MyMI-Wallet-Logo-1024x1024.png
public/assets/images/MyMI-Wallet-Logo-Black.png
public/assets/images/MyMI-Wallet-Logo-White copy.png
public/assets/images/MyMI-Wallet-Logo-White.png
public/assets/images/MyMI-Wallet-Logo-White.svg
public/assets/images/MyMI-Wallet.png
```

## Public JS/CSS Handler Scan
### public/assets/css/mymiwallet.mobile.css

- Line count: 220

```text
1:/* MyMI Wallet Mobile Responsiveness Layer */
154:  .modal-dialog {
160:  .modal-content {
165:  .modal-header,
166:  .modal-footer {
170:  .modal-footer {
177:  .modal-body {
```

### public/assets/css/Trade_Tracker/style.css

- Line count: 691

```text
```

### public/assets/css/wallet-transactions.css

- Line count: 14

```text
1:.wallet-transaction-filter-wrap select {
11:    .wallet-transaction-filter-wrap,
12:    .wallet-transaction-filter-wrap select {
```

### public/assets/js/Exchange/Connection2.js

- Line count: 67

```text
44:          case Broadcast.POST : this.addNewPost(data); break;
```

### public/assets/js/Exchange/Connection.js

- Line count: 70

```text
46:    			case Broadcast.POST : this.addNewPost(data); break;
```

### public/assets/js/Exchange/mainCtrl.js

- Line count: 15

```text
11:	$rootScope.conn = new Connection(Broadcast.BROADCAST_URL+":"+Broadcast.BROADCAST_PORT);
```

### public/assets/js/Exchange/myApp.js

- Line count: 13

```text
```

### public/assets/js/Exchange/secondCtrl.js

- Line count: 38

```text
17:				var typeData = { broadType : Broadcast.POST, data : data.postData};
```

### public/assets/js/Trade_Tracker/Archive/Full/script.js

- Line count: 1078

```text
179:			// The frromDB property is useful when deleting the trade to decide whether a delete query should be fetched or not
292:	fetchChanges = async (e) => {
298:			const result = await fetch("The save trade api", {
424:				const result = await fetch("The save trade api", {
732:				button.addEventListener("click", this.fetchChanges);
```

### public/assets/js/Trade_Tracker/Archive/Full/style.css

- Line count: 93

```text
```

### public/assets/js/Trade_Tracker/Archive/mattia_script.js

- Line count: 2944

```text
19:- Print tickers and wallet with this new schema { id: "01", value: "Personal Account", tag: "Schwab" },
111:const walletElement = document.getElementById("wallet-list");
112:let tradesList, symbolList, walletList;
125:if (walletElement === null || walletElement.textContent === null) {
126:    walletList = [];
129:    walletList = JSON.parse(walletElement.textContent.trim());
531:    walletList: [...walletList],
824:        options: walletList,
1895:            const fetch = true;
1898:            if (fetch) {
```

### public/assets/js/Trade_Tracker/Archive/scrip-active.js

- Line count: 1250

```text
176:			// The frromDB property is useful when deleting the trade to decide whether a delete query should be fetched or not
291:	fetchChanges = async (e) => {
297:			const result = await fetch(
298:				"https://www.mymiwallet.com/Trade-Tracker/Trade-Manager",
331:			console.log("> $fetchChanges: Something went wrong", err);
430:				const result = await fetch(
431:					"https://www.mymiwallet.com/Trade-Tracker/Trade-Manager",
755:				button.addEventListener("click", this.fetchChanges);
```

### public/assets/js/Trade_Tracker/Archive/script.07262022.js

- Line count: 3041

```text
19:- Print tickers and wallet with this new schema { id: "01", value: "Personal Account", tag: "Schwab" },
123:const walletElement = document.getElementById("wallet-list");
124:let tradesList, symbolList, walletList;
137:if (walletElement === null || walletElement.textContent === null) {
138:    walletList = [];
141:    walletList = JSON.parse(walletElement.textContent.trim());
545:    walletList: [...walletList],
838:        options: walletList,
1944:                    const fetch = true;
1947:                    if (fetch) {
```

### public/assets/js/Trade_Tracker/Archive/script-active.08012022.js

- Line count: 3076

```text
19:- Print tickers and wallet with this new schema { id: "01", value: "Personal Account", tag: "Schwab" },
160:const walletElement = document.getElementById("wallet-list");
161:let tradesList, symbolList, walletList;
174:if (walletElement === null || walletElement.textContent === null) {
175:    walletList = [];
178:    walletList = JSON.parse(walletElement.textContent.trim());
583:    walletList: [...walletList],
876:        options: walletList,
1980:                    const fetch = true;
1983:                    if (fetch) {
```

### public/assets/js/Trade_Tracker/Archive/script-old.js

- Line count: 4599

```text
19:- Print tickers and wallet with this new schema { id: "01", value: "Personal Account", tag: "Schwab" },
259:const walletElement = document.getElementById("wallet-list");
260:let tradesList, symbolList, walletList;
273:if (walletElement === null || walletElement.textContent === null) {
274:    walletList = [];
277:    walletList = JSON.parse(walletElement.textContent.trim());
993:    walletList: [...walletList],
1293:        options: walletList,
2506:                const request = await fetch("http://192.168.0.23/MyMIWallet/v7/v1.5/public/index.php/Trade-Tracker/Trade-Manager", 
2507:                // "http://localhost/MyMIWallet/v7/v1.5/public/index.php/Trade-Tracker/Trade-Manager"
2508:                // "https://www.mymiwallet.com/Trade-Tracker/Trade-Manager"
2546:                if (isChild) //Swap and add the new id in the closed lists
2804:                            const request = await fetch("http://192.168.0.23/MyMIWallet/v7/v1.5/public/index.php/Trade-Tracker/Trade-Manager", 
2805:                            // "http://localhost/MyMIWallet/v7/v1.5/public/index.php/Trade-Tracker/Trade-Manager"
2806:                            // "https://www.mymiwallet.com/Trade-Tracker/Trade-Manager"
4176:                const result = await fetch("", {
```

### public/assets/js/Trade_Tracker/Archive/script.orig.js

- Line count: 1250

```text
176:			// The frromDB property is useful when deleting the trade to decide whether a delete query should be fetched or not
291:	fetchChanges = async (e) => {
297:			const result = await fetch(
298:				"https://www.mymiwallet.com/Trade-Tracker/Trade-Manager",
331:			console.log("> $fetchChanges: Something went wrong", err);
430:				const result = await fetch(
431:					"https://www.mymiwallet.com/Trade-Tracker/Trade-Manager",
755:				button.addEventListener("click", this.fetchChanges);
```

### public/assets/js/Trade_Tracker/Archive/script.tbj07272022.js

- Line count: 3134

```text
18:- Print tickers and wallet with this new schema { id: "01", value: "Personal Account", tag: "Schwab" },
181:var walletElement = document.getElementById("wallet-list");
182:var tradesList, symbolList, walletList;
195:if (walletElement === null || walletElement.textContent === null) {
196:    walletList = [];
199:    walletList = JSON.parse(walletElement.textContent.trim());
580:    walletList: __spreadArray([], walletList, true),
869:        options: walletList,
2007:                    var fetch_1 = true;
2010:                    if (fetch_1) {
```

### public/assets/js/Trade_Tracker/Archive/tim-script.js

- Line count: 2962

```text
19:- Print tickers and wallet with this new schema { id: "01", value: "Personal Account", tag: "Schwab" },
111:const walletElement = document.getElementById("wallet-list");
112:let tradesList, symbolList, walletList;
125:if (walletElement === null || walletElement.textContent === null) {
126:    walletList = [];
129:    walletList = JSON.parse(walletElement.textContent.trim());
534:    walletList: [...walletList],
827:        options: walletList,
1900:            const fetch = true;
1903:            if (fetch) {
```

### public/assets/js/Trade_Tracker/Archive/Tim/tim-script.js

- Line count: 2962

```text
19:- Print tickers and wallet with this new schema { id: "01", value: "Personal Account", tag: "Schwab" },
111:const walletElement = document.getElementById("wallet-list");
112:let tradesList, symbolList, walletList;
125:if (walletElement === null || walletElement.textContent === null) {
126:    walletList = [];
129:    walletList = JSON.parse(walletElement.textContent.trim());
534:    walletList: [...walletList],
827:        options: walletList,
1900:            const fetch = true;
1903:            if (fetch) {
```

### public/assets/js/Trade_Tracker/Archive/Typescript/script.js

- Line count: 4599

```text
19:- Print tickers and wallet with this new schema { id: "01", value: "Personal Account", tag: "Schwab" },
259:const walletElement = document.getElementById("wallet-list");
260:let tradesList, symbolList, walletList;
273:if (walletElement === null || walletElement.textContent === null) {
274:    walletList = [];
277:    walletList = JSON.parse(walletElement.textContent.trim());
993:    walletList: [...walletList],
1293:        options: walletList,
2506:                const request = await fetch("http://192.168.0.23/MyMIWallet/v7/v1.5/public/index.php/Trade-Tracker/Trade-Manager", 
2507:                // "http://localhost/MyMIWallet/v7/v1.5/public/index.php/Trade-Tracker/Trade-Manager"
2508:                // "https://www.mymiwallet.com/Trade-Tracker/Trade-Manager"
2546:                if (isChild) //Swap and add the new id in the closed lists
2804:                            const request = await fetch("http://192.168.0.23/MyMIWallet/v7/v1.5/public/index.php/Trade-Tracker/Trade-Manager", 
2805:                            // "http://localhost/MyMIWallet/v7/v1.5/public/index.php/Trade-Tracker/Trade-Manager"
2806:                            // "https://www.mymiwallet.com/Trade-Tracker/Trade-Manager"
4176:                const result = await fetch("", {
```

### public/assets/js/Trade_Tracker/Full/script.js

- Line count: 1078

```text
179:			// The frromDB property is useful when deleting the trade to decide whether a delete query should be fetched or not
292:	fetchChanges = async (e) => {
298:			const result = await fetch("The save trade api", {
424:				const result = await fetch("The save trade api", {
732:				button.addEventListener("click", this.fetchChanges);
```

### public/assets/js/Trade_Tracker/Full/style.css

- Line count: 93

```text
```

### public/assets/js/Trade_Tracker/mattia_script.js

- Line count: 2944

```text
19:- Print tickers and wallet with this new schema { id: "01", value: "Personal Account", tag: "Schwab" },
111:const walletElement = document.getElementById("wallet-list");
112:let tradesList, symbolList, walletList;
125:if (walletElement === null || walletElement.textContent === null) {
126:    walletList = [];
129:    walletList = JSON.parse(walletElement.textContent.trim());
531:    walletList: [...walletList],
824:        options: walletList,
1895:            const fetch = true;
1898:            if (fetch) {
```

### public/assets/js/Trade_Tracker/scrip-active.js

- Line count: 1250

```text
176:			// The frromDB property is useful when deleting the trade to decide whether a delete query should be fetched or not
291:	fetchChanges = async (e) => {
297:			const result = await fetch(
298:				"https://www.mymiwallet.com/Trade-Tracker/Trade-Manager",
331:			console.log("> $fetchChanges: Something went wrong", err);
430:				const result = await fetch(
431:					"https://www.mymiwallet.com/Trade-Tracker/Trade-Manager",
755:				button.addEventListener("click", this.fetchChanges);
```

### public/assets/js/Trade_Tracker/script.07262022.js

- Line count: 3041

```text
19:- Print tickers and wallet with this new schema { id: "01", value: "Personal Account", tag: "Schwab" },
123:const walletElement = document.getElementById("wallet-list");
124:let tradesList, symbolList, walletList;
137:if (walletElement === null || walletElement.textContent === null) {
138:    walletList = [];
141:    walletList = JSON.parse(walletElement.textContent.trim());
545:    walletList: [...walletList],
838:        options: walletList,
1944:                    const fetch = true;
1947:                    if (fetch) {
```

### public/assets/js/Trade_Tracker/script-active.08012022.js

- Line count: 3076

```text
19:- Print tickers and wallet with this new schema { id: "01", value: "Personal Account", tag: "Schwab" },
160:const walletElement = document.getElementById("wallet-list");
161:let tradesList, symbolList, walletList;
174:if (walletElement === null || walletElement.textContent === null) {
175:    walletList = [];
178:    walletList = JSON.parse(walletElement.textContent.trim());
583:    walletList: [...walletList],
876:        options: walletList,
1980:                    const fetch = true;
1983:                    if (fetch) {
```

### public/assets/js/Trade_Tracker/script.js

- Line count: 3120

```text
18:- Print tickers and wallet with this new schema { id: "01", value: "Personal Account", tag: "Schwab" },
181:var walletElement = document.getElementById("wallet-list");
182:var tradesList, symbolList, walletList;
195:if (walletElement === null || walletElement.textContent === null) {
196:    walletList = [];
199:    walletList = JSON.parse(walletElement.textContent.trim());
580:    walletList: __spreadArray([], walletList, true),
869:        options: walletList,
2006:                    var fetch_1 = true;
2009:                    if (fetch_1) {
```

### public/assets/js/Trade_Tracker/script-original-12042024.js

- Line count: 4587

```text
19:- Print tickers and wallet with this new schema { id: "01", value: "Personal Account", tag: "Schwab" },
259:const walletElement = document.getElementById("wallet-list");
260:let tradesList, symbolList, walletList;
273:if (walletElement === null || walletElement.textContent === null) {
274:    walletList = [];
277:    walletList = JSON.parse(walletElement.textContent.trim());
993:    walletList: [...walletList],
1293:        options: walletList,
2535:                const request = await fetch("https://www.mymiwallet.com/Trade-Tracker/Trade-Manager", {
2791:                            const request = await fetch(
2792:                            // "http://192.168.0.23/MyMIWallet/v7/v1.5/public/index.php/Trade-Tracker/Trade-Manager",
2793:                            // "http://localhost/MyMIWallet/v7/v1.5/public/index.php/Trade-Tracker/Trade-Manager",
2794:                            "https://www.mymiwallet.com/Trade-Tracker/Trade-Manager", {
4164:                // Dev Env: https://www.mymiwallet.com/dev/public/index.php/Trade-Tracker/Layout-Manager
4165:                // Prod Env: https://www.mymiwallet.com/Trade-Tracker/Layout-Manager
4166:                const result = await fetch("https://www.mymiwallet.com/dev/public/index.php/Trade-Tracker/Layout-Manager", {
```

### public/assets/js/Trade_Tracker/script.orig.js

- Line count: 1250

```text
176:			// The frromDB property is useful when deleting the trade to decide whether a delete query should be fetched or not
291:	fetchChanges = async (e) => {
297:			const result = await fetch(
298:				"https://www.mymiwallet.com/Trade-Tracker/Trade-Manager",
331:			console.log("> $fetchChanges: Something went wrong", err);
430:				const result = await fetch(
431:					"https://www.mymiwallet.com/Trade-Tracker/Trade-Manager",
755:				button.addEventListener("click", this.fetchChanges);
```

### public/assets/js/Trade_Tracker/script.tbj07272022.js

- Line count: 3134

```text
18:- Print tickers and wallet with this new schema { id: "01", value: "Personal Account", tag: "Schwab" },
181:var walletElement = document.getElementById("wallet-list");
182:var tradesList, symbolList, walletList;
195:if (walletElement === null || walletElement.textContent === null) {
196:    walletList = [];
199:    walletList = JSON.parse(walletElement.textContent.trim());
580:    walletList: __spreadArray([], walletList, true),
869:        options: walletList,
2007:                    var fetch_1 = true;
2010:                    if (fetch_1) {
```

### public/assets/js/Trade_Tracker/tim-script.js

- Line count: 2962

```text
19:- Print tickers and wallet with this new schema { id: "01", value: "Personal Account", tag: "Schwab" },
111:const walletElement = document.getElementById("wallet-list");
112:let tradesList, symbolList, walletList;
125:if (walletElement === null || walletElement.textContent === null) {
126:    walletList = [];
129:    walletList = JSON.parse(walletElement.textContent.trim());
534:    walletList: [...walletList],
827:        options: walletList,
1900:            const fetch = true;
1903:            if (fetch) {
```

### public/assets/js/Trade_Tracker/Tim/tim-script.js

- Line count: 2962

```text
19:- Print tickers and wallet with this new schema { id: "01", value: "Personal Account", tag: "Schwab" },
111:const walletElement = document.getElementById("wallet-list");
112:let tradesList, symbolList, walletList;
125:if (walletElement === null || walletElement.textContent === null) {
126:    walletList = [];
129:    walletList = JSON.parse(walletElement.textContent.trim());
534:    walletList: [...walletList],
827:        options: walletList,
1900:            const fetch = true;
1903:            if (fetch) {
```

## Phase 14 Patch Notes To Apply Later
- Add preview-first handler before swap/transaction-like actions.
- Render safe preview modal/card with action, network, token pair, amount, estimated output placeholder, slippage, estimated fee placeholder, dry_run, broadcast, signature flags, wallet-signature next step, and no-sign/no-broadcast warnings.
- Preserve CSRF handling.
- Keep execution/broadcast paths disabled or untouched unless already safely guarded.
- Do not collect private keys.

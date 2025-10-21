<!-- app/Modules/User/Views/Wallets/index.php -->
<?php
// Plaid Integration
$beta                                   = $siteSettings->beta;
$plaid                                  = $siteSettings->integrationOperations;
$debtOperations                         = $siteSettings->debtOperations;
$investmentOperations                   = $siteSettings->investmentOperations;
$btnSizing                              = 'pr-1 mr-0';
$limit                                  = 4;

/* The Following Configures: 
- MyMIGold Value
- User's Current Total MyMIGold
- Setting Wallet Costs
*/

$MyMIGoldValue                          = $siteSettings->MyMIGCoinValue;                            // Set MyMI Gold Coin Value
$MyMIGoldSum                            = $MyMIGCoinSum ?? '0.00';                                            // Set Variable for Control and Visibility, Passed to index.php from WalletsController::commonData()
$walletCost                             = $siteSettings->walletCost;                                // Set Wallet Costs Variable    
$gas_fee                                = $siteSettings->gasFee;                                    // Set Network Gas Fees // Needs to be Solana Network Fee for Transfer
$trans_fee                              = $siteSettings->transFee;                                  // MyMI Wallet Transaction Fee
$trans_percent                          = $siteSettings->transPercent;                              // MyMI Wallet Network Fee

$transferCoins                          = $gas_fee * $walletCost;
$expenses                               = ($walletCost * $trans_percent) + $trans_fee;              // Total Fees
$total_fees                             = number_format($expenses, 2);
$fee_coins                              = number_format(($expenses / $MyMIGoldValue), 8);
$walletCoins                            = ((float)$walletCost / (float)$MyMIGoldValue) + (Float)$fee_coins;
$walletCoins                            = (float)$walletCoins ?? '0';
$remainingCoins                         = (float)$MyMIGoldSum - $walletCoins;

if ($MyMIGoldSum <= 0) {
    $purchaseFiatWalletName				= '#coinModal';
    $purchaseDigitalWalletName			= '#coinModal';
} else {
    $purchaseFiatWalletName				= '#purchaseFiatWalletModal';
    $purchaseDigitalWalletName			= '#purchaseDigitalWalletModal';
}

// if (is_array($MyMICoinValue) && isset($MyMICoinValue['amount'])) {
//     $MyMICoinValue                      = $MyMICoinValue['amount'];
// } else {
//     // Fallback or default value if $MyMICoinValue is not set correctly
//     $MyMICoinValue                      = 1; // Default to 1 to prevent division by zero
// }
// if (is_array($MyMICoinSum) && isset($MyMICoinSum['total'])) {
//     $MyMICoinSum                        = (float)$MyMICoinSum['total']; // Cast to float to ensure correct operation
// } elseif (!is_float($MyMICoinSum) && !is_int($MyMICoinSum)) {
//     // If $MyMICoinSum is neither an array, float, nor int, set a default or handle error
//     $MyMICoinSum                        = 0.0; // Example default value
// }

if ($creditLimit != 0) {
    if (number_format(($creditAvailable / $creditLimit) * -100, 2) > 30) { 
        $creditLimitPercentage = '<span class="statusRed">'. number_format(($creditAvailable / $creditLimit) * -100, 2) . '%</span>';
    } else {
        $creditLimitPercentage = '<span>'. number_format(($creditAvailable / $creditLimit) * -100, 2) . '%</span>';
    }
} else {
    // Handle the case when $creditLimit is zero
    // For example, set $creditLimitPercentage to a default value or perform an alternative calculation
    $creditLimitPercentage = '<span>0.00</span>'; // This is an example. You should decide what makes sense for your application.
}     
$getWallets								= $userWallets ?? [];
$walletData								= array(
    'siteSettings'                      => $siteSettings,
    'uri'                               => $uri,
    'userAgent'                         => $userAgent,
    'getWallets'						=> $getWallets,
    'getUserBankAccounts'               => $getUserBankAccounts,
    'getUserCreditAccounts'             => $getUserCreditAccounts,
    'getUserCryptoAccounts'             => $getUserCryptoAccounts,
    'getUserDebtAccounts'               => $getUserDebtAccounts,
    'getUserInvestAccounts'             => $getUserInvestAccounts,
    'getUserWallets'                    => $getUserWallets,
    'getBudgetRecordsIsDebt'            => $getBudgetRecordsIsDebt,
    'cuID'								=> $cuID,
    'cuWalletCount'						=> $cuWalletCount,
    'walletID'							=> $walletID,
    'walletTitle'                       => 'MyMI Gold',
    'walletCoins'						=> $MyMIGoldSum ?? 0,
    'walletFunds'                       => $MyMIGoldSum ?? 0,
    'walletCost'                        => $walletCost,
    'limit'                             => $limit,
    'purchaseFiatWalletName'			=> $purchaseFiatWalletName,
    'purchaseDigitalWalletName'			=> $purchaseDigitalWalletName,
    'btnSizing'                         => $btnSizing,
    'checkingSummaryFMT'                => $checkingSummaryFMT,
    'creditAvailable'                   => $creditAvailable,
    'creditAvailableFMT'                => $creditAvailableFMT,
    'creditLimit'                       => $creditLimit,
    'creditLimitFMT'                    => $creditLimitFMT,
    'creditLimitPercentage'             => $creditLimitPercentage,
    'debtSummaryFMT'                    => $debtSummaryFMT,
    'cryptoSummaryFMT'                  => $cryptoSummaryFMT,
    'investSummaryFMT'                  => $investSummaryFMT,
);
// log_message('info', 'Wallets\index L96 - $walletData: ' . print_r($walletData, true));
$fundAccountData						= array(
    'redirectURL'						=> current_url(),
    'uri'                               => $uri,
    'cuID'								=> $cuID,
    'cuEmail'							=> $cuEmail,
    'walletID'							=> $walletID,
);
$viewPath                               = 'UserModule\Views'; 
// log_message('info', 'Wallets/index L102: $uri->getSegment(2): ' . $uri->getSegment(2));
if (empty($uri->getSegment(2))) {
    $viewFileNameA                      = $viewPath . '\Wallets\types\financial_wallets';
    if ($debtOperations === 1) {
        $viewFileNameB                  = $viewPath . '\Wallets\types\credit_wallets';
        $viewFileNameC                  = $viewPath . '\Wallets\types\debt_wallets';
    }
    if ($investmentOperations === 1) {
        $viewFileNameD                  = $viewPath . '\Wallets\types\investment_wallets';
        $viewFileNameE                  = $viewPath . '\Wallets\types\crypto_wallets';
    }
} elseif ($uri->getSegment(2) === 'Checking') {
    $viewFileNameA                      = $viewPath . '\Wallets\types\financial_wallets';
} elseif ($uri->getSegment(2) === 'Credit') {
    $viewFileNameA                      = $viewPath . '\Wallets\types\credit_wallets';
    // !! FIX THIS
    // if ($debtOperations === 1) {
    //     $viewFileNameB                  = $viewPath . '\Wallets\types\debt_summary';
    // }
} elseif ($uri->getSegment(2) === 'Crypto') {
    $viewFileNameA                      = $viewPath . '\Wallets\types\crypto_wallets';
} elseif ($uri->getSegment(2) === 'Debt') {
    if ($debtOperations === 1) {
        $viewFileNameA                  = $viewPath . '\Wallets\types\credit_wallets'; 
        $viewFileNameB                  = $viewPath . '\Wallets\types\debt_wallets'; 
        // $viewFileNameC                  = $viewPath . '\Wallets\types\debt_summary';
    }
} elseif ($uri->getSegment(2) === 'Investments') {
    if ($debtOperations === 1) {
        $viewFileNameB                  = $viewPath . '\Wallets\types\investment_wallets'; 
        // $viewFileNameC                  = $viewPath . '\Wallets\types\debt_summary';
    }
}
/** !! 
 PLAID SETTINGS 
*/
$client_id                      = '61d9ba14ecdeba001b3619f6';
// Sandbox Settings
// $secret                         = '432e5c1a0716e15fd26ca0d8c56640';
// $environment                    = 'sandbox';
// // Development Settings
$secret                         = 'aee78c834d39555f7d3b488acfcb2f';
$environment                    = 'development';
// Initialize variables to avoid undefined variable errors
$link_token                     = '';
$request_id                     = '';        
$api_base_url                   = 'https://sandbox.plaid.com'; // Default to sandbox
if ($environment === 'development') {
    $api_base_url               = 'https://development.plaid.com';
} elseif ($environment === 'production') {
    $api_base_url               = 'https://production.plaid.com';
}

$ch                             = curl_init();
$url                            = $api_base_url . '/link/token/create';
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
$data                           = array(
    'client_id'                 => $client_id,
    'secret'                    => $secret,
    'user'                      => array('client_user_id' => $cuID,),
    'client_name'               => 'MyMI Wallet',
    'products'                  => array('auth', 'transactions'),
    'country_codes'             => array('US'),
    'language'                  => 'en',
    'webhook'                   => 'https://sample-web-hook.com',
    'redirect_uri'              => site_url('/Content-Creator'),
    'account_filters'           => array('depository' => array('account_subtypes' => array('all')))
);
$data_string                    = json_encode($data);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
$result                         = curl_exec($ch);
curl_close($ch);// Check if the cURL request was successful
if ($result !== false) {
    $response = json_decode($result, true);

    // Check if the response contains the expected keys
    if (isset($response['link_token'])) {
        $link_token = $response['link_token'];
    } else {
        // Handle the error: link_token not found in the response
        // You could log this error or display a message to the user
        log_message('error', 'Plaid link_token not found in the response.');
    }

    if (isset($response['request_id'])) {
        $request_id = $response['request_id'];
    } else {
        // Handle the error: request_id not found in the response
        log_message('error', 'Plaid request_id not found in the response.');
    }
} else {
    // Handle the error: cURL request failed
    log_message('error', 'cURL request to Plaid API failed.');
}

// Continue with your code
$end_date = date('Y-m-d', strtotime('-1 day'));
$start_date = date('Y-m-d', strtotime('-5 years -1 day', strtotime($end_date)));
?>
<?php 
if ($uri->getSegment(2) === 'Debt') {
    echo view('App/Views/errors/html/under_construction'); 
}
?>
<div class="nk-block">
    <div class="gy-gs row">
        <div class="col-md-12 my-0">
            <?= view('Wallets/index/header', $walletData); ?>
        </div>
        <?php if (!empty($viewFileNameA)): ?>
            <div class="col-md-12 mt-0 mb-3">
                <?= view($viewFileNameA, $walletData); ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($viewFileNameB)): ?>
            <div class="col-md-12 mb-3">
                <?= view($viewFileNameB, $walletData); ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($viewFileNameC)): ?>
            <div class="col-md-12 mb-3">
                <?= view($viewFileNameC, $walletData); ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($viewFileNameD)): ?>
            <div class="col-md-12 mb-3">
                <?= view($viewFileNameD, $walletData); ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($viewFileNameE)): ?>
            <div class="col-md-12 mb-3">
                <?= view($viewFileNameE, $walletData); ?>
            </div>
        <?php endif; ?>
    </div>
</div>


<!-- Delete Wallet Modal -->
<div class="modal fade" id="deleteWalletModal" tabindex="-1" aria-labelledby="deleteWalletModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="deleteWalletModalLabel">Delete This Wallet?</h3>
                <button class="close" data-dismiss="modal" type="button" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this wallet?</p>
            </div>
            <div class="modal-footer">
                <a id="confirmDeleteButton" class="btn btn-success" href="#">Yes</a>
                <button class="btn btn-danger" data-dismiss="modal" type="button">No</button>
            </div>
        </div>
    </div>
</div>
<!-- Updated Delete Modal JavaScript Handler -->
<script <?= $nonce['script'] ?? '' ?>>
    function openDeleteModal(event) {
        event.preventDefault();

        // Use event.currentTarget to ensure we get the element with the data attributes
        const element = event.currentTarget;
        const walletId = element.getAttribute('data-id');
        const walletName = element.getAttribute('data-name');
        const accountType = element.getAttribute('data-type');

        console.log('walletID:', walletId);
        console.log('walletName:', walletName);
        console.log('accountType:', accountType);

        if (!walletId || !accountType) {
            console.error('Missing walletId or accountType. Cannot proceed with delete modal.');
            return;
        }

        // Update modal with wallet details
        const confirmDeleteButton = document.getElementById('confirmDeleteButton');
        if (confirmDeleteButton) {
            confirmDeleteButton.setAttribute('href', `/index.php/Wallets/Delete/${accountType}/${walletId}`);
        }

        const walletNameElement = document.getElementById('walletName');
        if (walletNameElement) {
            walletNameElement.textContent = walletName || 'Unknown Wallet';
        }

        // Show the modal using Bootstrap's Modal API
        const deleteWalletModalElement = document.getElementById('deleteWalletModal');
        if (deleteWalletModalElement) {
            const deleteWalletModal = new bootstrap.Modal(deleteWalletModalElement, {});
            deleteWalletModal.show();
        } else {
            console.error('Delete Wallet Modal element not found.');
        }
    }
</script>
<script src="https://cdn.plaid.com/link/v2/stable/link-initialize.js" async defer></script>

<script <?= $nonce['script'] ?? '' ?>>
    document.addEventListener('DOMContentLoaded', function () {
        // Function to handle errors in fetch requests
        const handleFetchError = (response) => {
            if (!response.ok) {
                throw new Error(response.statusText);
            }
            return response;
        };

        // Function to fetch transactions
        const fetchTransactions = async () => {
            try {
                const response = await fetch("<?php echo site_url('Accounts/get_transactions'); ?>");
                const data = await response.json();
                console.log(data); // Handle the transaction data
            } catch (error) {
                console.error('Error fetching transactions:', error);
            }
        };

        // Function to create the Plaid link token
        const createLinkToken = async () => {
            try {
                const response = await fetch("<?php echo site_url('Accounts/createLinkToken'); ?>");
                const data = await response.json();
                return data.link_token; // Return the link token
            } catch (error) {
                console.error('Error fetching link token:', error);
                return null; // Return null if the request fails
            }
        };

        // Check if the Plaid library is loaded
        if (typeof Plaid === 'undefined') {
            console.error('Plaid library not loaded');
        } else {
            // Initialize Plaid Link after getting the link token
            createLinkToken().then((linkToken) => {
                if (!linkToken) {
                    console.error('Failed to fetch Plaid link token.');
                    return;
                }

                const handler = Plaid.create({
                    token: linkToken,
                    onSuccess: async (publicToken, metadata) => {
                        try {
                            const response = await fetch("<?php echo site_url('Accounts/exchangeToken'); ?>", {
                                method: "POST",
                                body: JSON.stringify({ public_token: publicToken }),
                                headers: { "Content-Type": "application/json" },
                            });
                            if (!response.ok) throw new Error('Failed to exchange token');
                            console.log('Token exchanged successfully');

                            // Fetch transactions after successful token exchange
                            await fetchTransactions();
                        } catch (error) {
                            console.error('Error in exchanging public token:', error);
                        }
                    },
                    onExit: (error, metadata) => {
                        if (error) {
                            console.error('Plaid Link closed with error:', error);
                        } else {
                            console.log('Plaid Link closed successfully');
                        }
                    },
                });

                // Attach the handler to the link button
                const linkButton = document.getElementById("link-button");
                if (linkButton) {
                    linkButton.addEventListener("click", () => {
                        handler.open(); // Open the Plaid Link modal
                    });
                } else {
                    console.error('Link button not found');
                }
            });
        }
    });
</script>

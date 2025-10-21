<?php
// Now, safely access segments
$totalSegments = $uri->getTotalSegments();

$pageURIA = $totalSegments >= 1 ? $uri->getSegment(1) : null;
$pageURIB = $totalSegments >= 2 ? $uri->getSegment(2) : null;
$pageURIC = $totalSegments >= 3 ? $uri->getSegment(3) : null;
$pageURID = $totalSegments >= 4 ? $uri->getSegment(4) : null;
$pageURIE = $totalSegments >= 5 ? $uri->getSegment(5) : null;
?>
<div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="trackDepositsModal" aria-hidden="true">
	<div class="modal-dialog" id="transModalDialog">
		<div class="modal-content" id="loading-content">
			<?php echo view('Dashboard/index/modal-loading-page'); ?>
		</div>
		<div class="modal-content" id="transactionContainer">
		</div>
	</div>
</div>
<?php 
   //echo view('UserModule/Wallets/Add/wallet-transaction-modal');
// if ($pageURIA === 'Wallets' || $pageURIA === 'Wallet-Selection') {
//    echo view('UserModule/Wallets/Add/wallet-transaction-modal');
// }
?>
<script <?= $nonce['script'] ?? '' ?>>
    function loadModalContent(endpoint, cuID) {
        let url = '<?php echo site_url(); ?>/' + endpoint + '/' + cuID;
        $('#loading-image').show();
        $.ajax({
            type: 'get',
            url: url,
            dataType: 'html',
            beforeSend: function() {
                $('#loading-content').show();
                $('#transactionContainer').hide();
            },
            success: function(html) {
                $('#loading-content').hide();
                $('#transactionContainer').show();
                $('#transactionContainer').html(html);
            }
        });
        console.log(url);
    }
    // Assuming site_url is a function that returns the full URL for an endpoint
    $('.addBankAccount').click(function(e) {
        e.preventDefault();
        loadModalContent('Wallets/Add/Banking', '<?php echo $cuID; ?>');
    });

    $('.addCreditAccount').click(function(e) {
        e.preventDefault();
        loadModalContent('Wallets/Credit/Add/Account', '<?php echo $cuID; ?>');
    });

    $('.addDigitalWalletBtn').click(function(e) {
        e.preventDefault();
        loadModalContent('Add-Wallet/Digital', '<?php echo $cuID; ?>');
    });

    $('#addDigitalWalletBtn').click(function(e) {
        e.preventDefault();
        loadModalContent('Add-Wallet/Digital', '<?php echo $cuID; ?>');
    });

    $('.addFiatWalletBtn').click(function(e) {
        e.preventDefault();
        loadModalContent('Add-Wallet/Fiat', '<?php echo $cuID; ?>');
    });

    $('#addFiatWalletBtn').click(function(e) {
        e.preventDefault();
        loadModalContent('Add-Wallet/Fiat', '<?php echo $cuID; ?>');
    });

    $('.addExternalSiteBtn').click(function(e) {
        e.preventDefault();
        loadModalContent('Admin/Add-External-Site', '');
    });

    $('.addInvestAccount').click(function(e) {
        e.preventDefault();
        loadModalContent('Wallets/Investment/Add/Account/Modal', '<?php echo $cuID; ?>');
    });

    $('.createAssetRequest').click(function(e) {
        e.preventDefault();
        loadModalContent('Exchange/Coin-Listing/Request', '<?php echo $cuID; ?>');
    });

	$('.closeModalBtn').click(function(e) {
		// prevent the default action when a nav button link is clicked
		e.preventDefault();
		$('body').ajaxComplete(function() {
			$('#transactionContainer').empty();
		});
	});

    $('.completeAssetRequest').click(function(e) {
        e.preventDefault();
        loadModalContent('Exchange/Coin-Listing/Asset-Information-Modal/Existing', '<?php echo $cuID; ?>');
    });

    $('#deleteWalletBtn').click(function(e) {
        e.preventDefault();
        loadModalContent('Wallets/Delete', '<?php echo $pageURIC; ?>');
    });

    $('#generateWalletAddressBtn').click(function(e) {
        e.preventDefault();
        loadModalContent('Wallets/Address-Generator', '');
    });

    $('.postAnnouncementBtn').click(function(e) {
        e.preventDefault();
        loadModalContent('Announcements/Post', '');
    });

    $('.purDigitalWalletBtn').click(function(e) {
        e.preventDefault();
        loadModalContent('Purchase-Wallet/Digital', '<?php echo $cuID; ?>');
    });

    $('.purFiatWalletBtn').click(function(e) {
        e.preventDefault();
        loadModalContent('Purchase-Wallet/Fiat', '<?php echo $cuID; ?>');
    });

    $('.purMyMIGold').click(function(e) {
        e.preventDefault();
        loadModalContent('MyMI-Gold/Purchase', '<?php echo $cuID; ?>');
    });

    $('#purMyMIGoldNavbar').click(function(e) {
        e.preventDefault();
        loadModalContent('MyMI-Gold/Purchase', '<?php echo $cuID; ?>');
    });

    $('.purMyMIGoldWallet').click(function(e) {
        e.preventDefault();
        loadModalContent('MyMI-Gold/Purchase', '<?php echo $cuID; ?>');
    });

    $('#trackDepositBtn').click(function(e) {
        e.preventDefault();
        loadModalContent('Add-Wallet-Deposit-Fetch', '<?php echo $cuID; ?>');
    });

    $('#trackWithdrawBtn').click(function(e) {
        e.preventDefault();
        loadModalContent('Add-Wallet-Withdraw-Fetch', '<?php echo $cuID; ?>');
    });

    $("#transactionModal").on("hidden.bs.modal", function () {
        $('#transactionContainer').empty();
    });

    $('.walletSelection').click(function(e) {
        e.preventDefault();
        loadModalContent('Wallet-Selection', '<?php echo $cuID; ?>');
    });

    $('#walletSelection').click(function(e) {
        e.preventDefault();
        loadModalContent('Wallet-Selection', '<?php echo $cuID; ?>');
    });

    $('.walletSelectionDigital').click(function(e) {
        e.preventDefault();
        loadModalContent('Wallet-Selection/Digital', '<?php echo $cuID; ?>');
    });

    $('.walletSelectionFreeFiat').click(function(e) {
        e.preventDefault();
        loadModalContent('Wallet-Selection/Fiat', '<?php echo $cuID; ?>');
    });

    $('.walletSelectionFiat').click(function(e) {
        e.preventDefault();
        loadModalContent('Wallet-Selection/Free/Fiat', '<?php echo $cuID; ?>');
    });

    $('.withdrawFundsBtn').click(function(e) {
        e.preventDefault();
        loadModalContent('Withdraw-Funds', '<?php echo $cuID; ?>');
    });
</script>

<!-- app/Modules/User/Views/Wallets/Delete.php -->
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
<script <?= $nonce['script'] ?? '' ?>>
    function openDeleteModal(event) {
        event.preventDefault();

        // Get attributes from the clicked element
        const walletId = event.target.getAttribute('data-id');
        const walletName = event.target.getAttribute('data-name');
        const accountType = event.target.getAttribute('data-type');

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

        // Show the modal
        const deleteWalletModalElement = document.getElementById('deleteWalletModal');
        if (deleteWalletModalElement) {
            const deleteWalletModal = new bootstrap.Modal(deleteWalletModalElement, {});
            deleteWalletModal.show();
        } else {
            console.error('Delete Wallet Modal element not found.');
        }
    }
</script>
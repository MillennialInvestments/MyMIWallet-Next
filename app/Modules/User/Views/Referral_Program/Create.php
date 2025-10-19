<div class="modal-header">
    <h3 class="modal-title" id="referralModalLabel">Invite a Friend!</h3>
</div>
<div class="modal-body">
    <div class="nk-block">
        <div class="row g-gs">
            <!-- Email Referral Form -->
            <div class="col-12">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="nk-block-head">
                            <h4 class="nk-block-title">Refer via Email</h4>
                        </div>
                        <div class="nk-block-des text-soft">
                            <p>Enter the email address of the person you would like to refer:</p>
                        </div>
                        <form class="form-horizontal" id="referralForm" method="POST">
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                            <input type="hidden" name="referrer_code" value="<?= $cuID ?>"> <!-- Assuming $cuID is the user's referral code -->
                            <div class="form-group">
                                <label for="referralEmail">Email Address</label>
                                <input type="email" class="form-control" id="referralEmail" name="referral_email" placeholder="Enter email address" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Invitation</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Social Media Share Section -->
            <div class="col-12">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="nk-block-head">
                            <h4 class="nk-block-title">Share via Social Media</h4>
                        </div>
                        <div class="nk-block-des text-soft">
                            <p>Quickly share your referral link on social media:</p>
                        </div>
                        <div class="row g-gs">
                            <div class="col-4">
                                <a href="#" id="shareToFacebook" class="btn btn-block btn-primary">Facebook</a>
                            </div>
                            <div class="col-4">
                                <a href="#" id="shareToTwitter" class="btn btn-block btn-info">Twitter</a>
                            </div>
                            <div class="col-4">
                                <a href="#" id="shareToLinkedIn" class="btn btn-block btn-success">LinkedIn</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', function() {
    // Ensure we intercept form submission
    const form = document.getElementById('referralForm');

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        const referralEmail = document.getElementById('referralEmail').value;
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        if (!referralEmail) {
            alert('Please enter a valid email address.');
            return;
        }

        console.log("Sending referral email: ", referralEmail); // Log the email submission

        // Example AJAX request for sending the email referral
        fetch('<?=site_url("/Referrals/sendReferralEmail")?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                "X-CSRF-TOKEN": csrfToken, // Include the CSRF token in the headers
            },
            body: JSON.stringify({
                referral_email: referralEmail,
                user_id: <?=$cuID?> // Assuming you have the user ID available in your PHP view
            })
        })
        .then(response => {
            console.log("Response status: ", response.status); // Log response status
            return response.json(); // Parse the JSON from the response
        })
        .then(data => {
            console.log("Response data: ", data); // Log the response data
            if (data.success) {
                alert('Invitation sent successfully!');
                // You could redirect to a thank you page or a success modal
                window.location.href = "<?=site_url('/My-Referrals')?>"; // Redirect after success
            } else {
                alert('Failed to send the invitation: ' + data.message);
            }
        })
        .catch(error => {
            console.error('AJAX error:', error); // Log any errors
            alert('An error occurred. Please try again.');
        });
    });

    // Generate Referral Link
    const referralLink = "<?=site_url('/Referral/Register/' . $cuID)?>"; // Assuming you have a referral link URL

    // Social Media Share Handlers
    document.getElementById('shareToFacebook').addEventListener('click', function() {
        const url = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(referralLink)}&quote=${encodeURIComponent('Join me at MyMI Wallet and enjoy amazing financial tools!')}`;
        window.open(url, '_blank');
    });

    document.getElementById('shareToTwitter').addEventListener('click', function() {
        const url = `https://twitter.com/intent/tweet?url=${encodeURIComponent(referralLink)}&text=${encodeURIComponent('Join me at MyMI Wallet for amazing financial tools!')}`;
        window.open(url, '_blank');
    });

    document.getElementById('shareToLinkedIn').addEventListener('click', function() {
        const url = `https://www.linkedin.com/shareArticle?mini=true&url=${encodeURIComponent(referralLink)}&title=${encodeURIComponent('Join MyMI Wallet')}&summary=${encodeURIComponent('Join me at MyMI Wallet and enjoy amazing financial tools!')}`;
        window.open(url, '_blank');
    });

});

</script>

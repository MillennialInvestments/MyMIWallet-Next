<div class="nk-block">
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="card-head">
                        <h4 class="card-title">Subscription Successful</h4>
                    </div>
                    <div class="card-body">
                        <p>Thank you for subscribing to our <?= ucfirst($membership_type) ?> Membership. You can now enjoy all the benefits of your membership.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script <?= $nonce['script'] ?? '' ?>>
  fbq('track', 'ViewContent', {
    content_name: 'Membership Purchased',
    content_category: 'Memberships',
  });
</script>
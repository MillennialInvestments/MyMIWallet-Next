<a class="btn btn-primary" href="<?= site_url('/Investments') ?>">
    <em class="icon ni ni-arrow-left"></em> Back to Investments
</a>
<div class="nk-block">
    <div class="row g-gs">
        <?php 
        // Data for investment services
        $services = [
            ['name' => 'Personal Budgeting & Forecast', 'description' => 'Manual Budgeting Process', 'price' => 'Free'],
            ['name' => 'Automated Accounting Integration', 'description' => 'Real-Time Account Sync', 'price' => '$1.50'],
            ['name' => 'Real-Time Balance Updates', 'description' => 'Stay informed on account balances', 'price' => '$0.10/month'],
            ['name' => 'Investment Portfolio Manager', 'description' => 'All-in-one investment dashboard', 'price' => '$20/month'],
            ['name' => 'MyMI Trade Tracker', 'description' => 'Customizable trade analysis tools', 'price' => '$15/month'],
            ['name' => 'MyMI Trade Alerts', 'description' => 'Exclusive trade alert service', 'price' => '$10/month'],
            ['name' => 'Investment Portfolio Manager (Bundle)', 'description' => 'Includes Tracker & Alerts', 'price' => '$30/month'],
            ['name' => 'Identity Verification', 'description' => 'Comprehensive identity checks', 'price' => 'From $0.98/month'],
            ['name' => 'Recurring Transactions', 'description' => 'Automated transaction refresh', 'price' => '$0.23/month'],
            ['name' => 'Investment Advisory', 'description' => 'Expert investment guidance', 'price' => 'Contact for pricing'],
        ];
        ?>

        <?php foreach ($services as $service): ?>
            <div class="col-md-12 col-lg-4">
                <div class="card card-bordered">
                    <div class="card-inner text-center">
                        <h6 class="title"><?= esc($service['name']) ?></h6>
                        <p class="sub-title"><?= esc($service['description']) ?></p>
                        <div class="mt-3">
                            <strong class="display-4 text-success"><?= esc($service['price']) ?></strong>
                        </div>
                        <div class="mt-3">
                            <a href="<?= site_url('/Investments/Details/' . urlencode($service['name'])) ?>" class="btn btn-primary">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Script to handle potential interactivity -->
<script <?= $nonce['script'] ?? '' ?>>
    document.querySelectorAll('.btn-primary').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const targetUrl = this.getAttribute('href');
            if (confirm("Would you like to explore this service in detail?")) {
                window.location.href = targetUrl;
            }
        });
    });
</script>

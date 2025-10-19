<?php 
$subViewData = [
    'socialMedia' => $socialMedia ?? [],
    'uri' => $uri ?? service('uri'),
];
$referralCode = $uri->getSegment(3) ?? 'default'; // e.g., /MonetizedCreators/ref12345
?>

<style <?= $nonce['style'] ?? '' ?>>
    #landingBanner {
        background-image: url('<?php echo base_url('assets/images/MyMI-Walllet-Background.jpeg'); ?>');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        color: white;
        text-align: center;
        padding: 60px 2rem;
    }
    .callout-box {
        background-color: #fffbe6;
        border-left: 5px solid #ffcc00;
        padding: 1rem;
        margin: 2rem 0;
        border-radius: 8px;
    }
    .highlight {
        color: #28a745;
        font-weight: bold;
    }
</style>

<div id="landingBanner">
    <h1 class="display-4 fw-bold text-white">Monetized Content Creators 🤑💰📈</h1>
    <p class="lead">Welcome! You're one step away from monetizing your content like never before!</p>
    <p>Join <strong>478,000+</strong> active creators boosting their bonuses and building new revenue streams.</p>
    <a href="https://www.facebook.com/groups/3251923615044409" target="_blank" class="btn btn-warning btn-lg mt-3"><span>🎯 Join Monetized Content Creators!</span> <i class="icon ni ni-facebook"></i></a>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <h2>Why Join Through This Exclusive Group?</h2>
            <ul>
                <li>✅ Bonus tracking and revenue reporting through MyMI Wallet.</li>
                <li>✅ Access to our upcoming <strong>Crypto Creator Fund</strong> backed by real assets.</li>
                <li>✅ Invite others & earn <strong>passive referral rewards</strong>.</li>
                <li>✅ Use your content data to create and sell financial assets with <strong>MyMI Asset Creator</strong>.</li>
                <li>✅ Get automated budgeting, investment analytics, and real-time performance insights.</li>
            </ul>

            <div class="callout-box">
                <p><strong>🔥 Featured Admin Tip from Jacqui Fried:</strong><br>
                “Promote your page here & don’t be surprised if you start getting tons of followers!”</p>
                <p class="mb-0">Start growing <em>and</em> earning at the same time.</p>
            </div>

            <p>You'll also gain access to:</p>
            <ul>
                <li>📈 Real-time investment tools & analytics</li>
                <li>💼 Premium crypto exchange features with <strong>MyMI Solana</strong></li>
                <li>🛠️ Business monetization tools with <strong>MyMI Asset Marketplace</strong></li>
            </ul>

            <p class="mt-4">🎥 Watch our promo video below or scroll down to register ⬇️</p>
            <?php echo view('themes/public/resources/ytPromoVideo', $subViewData); ?>
        </div>
    </div>
</div>

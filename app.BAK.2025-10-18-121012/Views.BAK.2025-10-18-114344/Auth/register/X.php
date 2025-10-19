<?php 
$subViewData = [
    // 'debug'     => $debug,
    'socialMedia' => $socialMedia,
    'uri'       => $uri,
]; 
?>
<style <?= $nonce['style'] ?? '' ?>>
    #gettingStartedBanner {
        background-image: url('<?php echo base_url('assets/images/MyMI-Walllet-Background.jpeg'); ?>');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        width: 100%;
        color: white;
        text-align: center;
        padding: 50px 5rem;
        margin-bottom: 2rem; 
    }

    .highlight-image {
        filter: sepia(1) saturate(5) hue-rotate(10deg) brightness(1.2);
        width: 10%; 
    }

    .promo-content h2, .promo-content p, .promo-content ul {
        text-align: left;
        margin-left: auto;
        margin-right: auto;
        max-width: 800px;
    }

    .promo-content a {
        color: #1DA1F2; /* Twitter Blue */
    }
</style>

<div id="gettingStartedBanner">
    <h1 class="text-white">Welcome to MyMI Wallet</h1>
    <p>Follow us on Twitter for the latest in personal finance, investing tips, and cryptocurrency trading strategies!</p>
</div>

<div class="container promo-content">
    <div class="row">
        <div class="col-12">
            <h2>Join the Financial Revolution on X</h2>
            <p>Stay updated with the latest market insights, trading strategies, and personal finance tips by following us on <a href="https://twitter.com/mymiwallet" target="_blank">Twitter (X)</a>. Engage with industry leaders, participate in trending discussions, and get real-time financial alerts!</p>
            <ul>
                <li>🔥 <strong>Trending Finance News:</strong> Catch the latest finance trends and breaking news that matter to your portfolio.</li>
                <li>📊 <strong>Quick Tips & Tricks:</strong> Get daily financial tips, budget hacks, and quick investing strategies.</li>
                <li>💼 <strong>Investment Opportunities:</strong> Stay informed with real-time updates on the hottest investment opportunities.</li>
                <li>🚀 <strong>Live Market Alerts:</strong> Never miss out on key financial moves — get live alerts directly in your feed.</li>
            </ul>
            <p>Ready to follow? <a href="https://twitter.com/mymiwallet">Follow MyMI Wallet on Twitter</a> and be part of the financial revolution today!</p>
            
            <?php echo view('themes/public/resources/ytPromoVideo', $subViewData); ?>
        </div>
    </div>
</div>

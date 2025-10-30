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
        color: #4267B2; /* Facebook Blue */
    }
</style>

<div id="gettingStartedBanner">
    <h1 class="text-white">Welcome to MyMI Wallet</h1>
    <p>Join over 80,000 investors in our <a href="https://www.facebook.com/groups/investorstalk/" target="_blank">Investor’s Talk Facebook Group</a>!</p>
</div>

<div class="container promo-content">
    <div class="row">
        <div class="col-12">
            <h2>Get Started with MyMI Wallet on Facebook</h2>
            <p>Connect with thousands of investors and financial professionals in our Investor’s Talk Facebook group. Whether you’re new to investing or a seasoned pro, our community offers real-time insights, discussions, and educational content on everything from <strong>personal finance</strong> to <strong>crypto trading</strong>.</p>
            <ul>
                <li>👥 <strong>Collaborative Learning:</strong> Share your investment journey, ask questions, and get advice from experienced members.</li>
                <li>💼 <strong>Daily Market Updates:</strong> Stay informed with daily posts and discussions on the latest market trends.</li>
                <li>📈 <strong>Trading Insights:</strong> Get access to trade ideas and financial strategies from top investors in the community.</li>
                <li>🎯 <strong>Exclusive Alerts & Promotions:</strong> Receive special alerts and promotions exclusive to our Facebook group members.</li>
            </ul>
            <p>Ready to elevate your financial game? <a href="https://www.facebook.com/groups/investorstalk/">Join our Facebook Group</a> and start connecting with the community today!</p>
            
            <?php echo view('themes/public/resources/ytPromoVideo', $subViewData); ?>
        </div>
    </div>
</div>

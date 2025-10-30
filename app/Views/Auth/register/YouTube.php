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

    /* .promo-content a {
        color: #FF0000; /* YouTube Red *
    } */
</style>

<div id="gettingStartedBanner">
    <h1 class="text-white">Welcome to MyMI Wallet</h1>
    <p>Subscribe to MyMI Wallet on YouTube for the latest financial insights and tutorials!</p>
</div>

<div class="container promo-content">
    <div class="row">
        <div class="col-12">
            <h2>Subscribe to MyMI Wallet on YouTube</h2>
            <p>Stay informed and take your personal finance and investing to the next level with MyMI Wallet's YouTube channel. Whether you're a beginner or a seasoned investor, we provide in-depth video content to help you succeed.</p>
            <ul>
                <li>📹 <strong>Video Tutorials:</strong> Learn how to master our budgeting and investing tools step by step.</li>
                <li>💼 <strong>Investment Strategies:</strong> Get expert advice on how to optimize your investments and grow your wealth.</li>
                <li>🌟 <strong>Exclusive Webinars:</strong> Access exclusive content including webinars, interviews with experts, and more!</li>
            </ul>
            <p>Ready to learn? <a href="<?= $socialMedia->youtube ?>">Subscribe to MyMI Wallet's YouTube Channel</a> today and stay updated!</p>
            
            <?php echo view('themes/public/resources/ytPromoVideo', $subViewData); ?>
        </div>
    </div>
</div>

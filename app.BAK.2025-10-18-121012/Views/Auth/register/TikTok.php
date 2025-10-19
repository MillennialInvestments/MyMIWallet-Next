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
        color: #000000; /* TikTok Black */
    }
</style>

<div id="gettingStartedBanner">
    <h1 class="text-white">Welcome to MyMI Wallet</h1>
    <p>Follow us on TikTok for quick finance tips, challenges, and investment advice!</p>
</div>

<div class="container promo-content">
    <div class="row">
        <div class="col-12">
            <h2>Follow MyMI Wallet on TikTok</h2>
            <p>Join us on TikTok to get quick, digestible content on personal finance, investing, and crypto trading. We offer bite-sized tips and fun challenges to help you stay on top of your finances!</p>
            <ul>
                <li>🎬 <strong>Quick Finance Tips:</strong> Fast-paced videos that help you manage your budget and investments on the go.</li>
                <li>💡 <strong>Investment Challenges:</strong> Participate in community-driven challenges that make learning fun.</li>
                <li>📈 <strong>Market Updates:</strong> Stay ahead of market trends with our trending stock and crypto insights.</li>
            </ul>
            <p>Ready to follow? <a href="<?= $socialMedia->tiktok ?>" class="btn btn-md" style="background-color: #000000;">Follow MyMI Wallet on TikTok</a> and join the financial revolution today!</p>
            
            <?php echo view('themes/public/resources/ytPromoVideo', $subViewData); ?>
        </div>
    </div>
</div>

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
        color: #5865F2; /* Discord Purple */
    }
</style>

<div id="gettingStartedBanner">
    <h1 class="text-white">Welcome to MyMI Wallet</h1>
    <p>Join our growing financial community on Discord and take control of your financial future!</p>
</div>

<div class="container promo-content">
    <div class="row">
        <div class="col-12">
            <h2>Why Join the MyMI Wallet Discord Community?</h2>
            <p>MyMI Wallet isn't just about managing your finances — it’s about connecting with like-minded individuals who are passionate about personal finance, investment strategies, and crypto trading. Join our <a href="https://discord.gg/VzVYb9mqEv" target="_blank">Discord Server</a> to participate in real-time discussions, get investment tips, and stay updated on the latest market trends!</p>
            <ul>
                <li>💬 <strong>Real-Time Discussions:</strong> Talk to experts, share your strategies, and get feedback from a community of active investors.</li>
                <li>📊 <strong>Financial Insights:</strong> Get the latest market updates and investment opportunities from our community members and moderators.</li>
                <li>🤝 <strong>Collaborate & Learn:</strong> Our community is a space for collaboration — learn about different investment techniques, budgeting tips, and crypto strategies.</li>
                <li>🚀 <strong>Exclusive Alerts:</strong> Receive alerts on key financial moves and hot investment opportunities through our Discord channels.</li>
            </ul>
            <p>Don’t miss out on this opportunity to join one of the most interactive financial communities! <a href="https://discord.gg/VzVYb9mqEv">Join the MyMI Wallet Discord Community</a> now.</p>
            
            <?php echo view('themes/public/resources/ytPromoVideo', $subViewData); ?>
        </div>
    </div>
</div>

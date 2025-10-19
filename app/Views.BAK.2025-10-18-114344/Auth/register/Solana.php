<?php 
$subViewData = [
    'socialMedia' => $socialMedia,
    'uri'         => $uri,
]; 
?>
<style <?= $nonce['style'] ?? '' ?>>
    #exchangeBanner {
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
        color: #4CAF50; /* Solana themed green */
    }
</style>

<div id="exchangeBanner">
    <h1 class="text-white">Welcome to MyMI Solana Exchange</h1>
    <p>Experience fast, scalable, and secure crypto transactions powered by Solana. Trade, invest, and grow your digital assets with MyMI Wallet!</p>
</div>

<div class="container promo-content">
    <div class="row">
        <div class="col-12">
            <h2>Why Choose the Solana MyMI Crypto Exchange?</h2>
            <p>With Solana's high-performance blockchain and MyMI Wallet's trusted platform, you can enjoy seamless crypto trading and investment management. Whether you're a seasoned trader or new to the crypto world, our exchange offers the tools you need for success. Here’s what sets us apart:</p>
            <ul>
                <li>⚡ <strong>Ultra-Fast Transactions:</strong> Powered by Solana, MyMI offers transaction speeds that rival any in the crypto world, handling thousands of trades per second.</li>
                <li>🔒 <strong>Secure and Reliable:</strong> Your assets are protected with top-level security, including advanced 2FA and multi-factor authentication.</li>
                <li>📊 <strong>Advanced Analytics:</strong> Stay ahead with real-time insights and analytics, helping you make data-driven decisions in the volatile crypto market.</li>
                <li>🌐 <strong>Low Fees:</strong> Solana's scalable infrastructure means transaction fees are a fraction of the cost of other blockchains, maximizing your investment potential.</li>
                <li>💼 <strong>Comprehensive Exchange:</strong> Buy, sell, swap, and manage a wide range of cryptocurrencies including the MyMI Token and Solana-based tokens.</li>
            </ul>
            <p>Ready to start trading? Visit the <a href="https://www.mymiwallet.com/solana-exchange" target="_blank">Solana MyMI Crypto Exchange</a> and begin your journey in the fast lane of decentralized finance.</p>

            <!-- YouTube or Promo Video for Solana Exchange -->
            <?php echo view('themes/public/resources/ytPromoVideo', $subViewData); ?>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12 text-center">
            <h2>Join the Revolution with Solana and MyMI Wallet</h2>
            <p>Don’t miss out on the future of decentralized finance. Join our Solana exchange today and take control of your digital assets with confidence.</p>
            <a href="https://www.mymiwallet.com/solana-exchange" class="btn btn-primary">Get Started</a>
        </div>
    </div>
</div>

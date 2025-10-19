<?php 
$subViewData = [
    'socialMedia' => $socialMedia,
    'uri'       => $uri,
]; 
?>
<style <?= $nonce['style'] ?? '' ?>>
    #gettingStartedBanner {
        background-image: url('<?php echo base_url('assets/images/Partners/TBI-Solutions-Background1.png'); ?>');
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
        width: 100%;
        height: auto;
        min-height: 500px; /* Ensures visibility */
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
        padding: 50px 2rem;
        margin-bottom: 2rem; 
    }

    .highlight-image {
        filter: sepia(1) saturate(5) hue-rotate(10deg) brightness(1.2);
        width: 10%; 
    }
</style>
<div>

</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-black">TBI Solutions Invites You To Join Us<br>At <a href="<?php echo site_url('/'); ?>">MyMI Wallet</a>!</h1>
            <p>Where we are <strong>innovating the future</strong> with technology-driven solutions for personal finance, business, and digital investments.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?php echo view('themes/public/resources/ytPromoVideo', $subViewData); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-12">    
            <h2 class="pr-5">Transform Your Financial & Business Strategies</h2> 
            <p>Join **Timothy Burks Innovations** (TBI) and gain access to premium financial tools designed to **optimize investments, enhance business growth**, and **build wealth** strategically.</p>
            
            <p>Be part of an exclusive **entrepreneurial and investor community**, where business professionals and financial strategists collaborate to develop cutting-edge solutions.</p>
            
            <ul>
                <li>🚀 <strong>Advanced Investment Strategies:</strong> Optimize your portfolio with AI-driven insights, automated risk analysis, and real-time market data.</li>
                <li>💰 <strong>Smart Budgeting & Wealth Growth:</strong> Utilize TBI's proprietary budgeting and financial forecasting tools.</li>
                <li>📊 <strong>Business & Financial Consulting:</strong> Gain access to expert advice and resources for scaling businesses and investments.</li>
                <li>🔍 <strong>Blockchain & Cryptocurrency Solutions:</strong> Explore innovative digital asset management tools with TBI's custom blockchain integrations.</li>
                <li>🌍 <strong>Global Networking:</strong> Connect with like-minded investors and business professionals to expand your reach and opportunities.</li>
            </ul>
        </div>
    </div>
</div>

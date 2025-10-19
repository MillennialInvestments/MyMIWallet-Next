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
</style>


<div id="gettingStartedBanner">
    <h1 class="text-white">Welcome to MyMI Wallet</h1>
    <p>Empowering you with cutting-edge financial solutions for business and personal finance management.</p>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="pr-5">Control Your Financial Future with MyMI Wallet</h2> 
            <p>Join the financial revolution! MyMI Wallet offers advanced tools for <strong>personal budgeting</strong>, <strong>investment portfolio management</strong>, and <strong>cryptocurrency trading</strong>. By registering, you unlock the power to track your finances, set and achieve your goals, and access <strong>real-time market data</strong> to optimize your investments.</p>
            
            <p>Connect with like-minded investors in our <a href="https://www.facebook.com/groups/investorstalk/" target="_blank">Co-Op Investment Community on Facebook</a>, where financial service providers and individual investors collaborate. Share strategies, insights, and grow your financial knowledge with over <strong>80,000+ members!</strong></p>
            
            <ul>
                <li>📊 <strong>Track Your Investments:</strong> Get real-time updates on your portfolio and analyze performance trends using <strong>MyMI Wallet's advanced analytics</strong>.</li>
                <li>💡 <strong>Investment Analytics:</strong> Utilize <strong>customizable analytics</strong> and detailed reports to optimize your strategies and make better-informed decisions.</li>
                <li>🎯 <strong>Set Financial Goals:</strong> Budget effectively, invest smartly, and <strong>plan for retirement</strong> with tools designed to keep you on track with your long-term goals.</li>
                <li>🔔 <strong>Automated Alerts:</strong> Stay informed with automated notifications about <strong>market changes</strong> and potential investment opportunities.</li>
                <li>📈 <strong>Portfolio Diversification:</strong> Manage a wide range of investment assets including stocks, bonds, forex, and crypto, all in one place.</li>
            </ul>
            <p>Take control of your financial future today by creating a free account with MyMI Wallet. Register above and start managing your investments smarter!</p>
            <?php echo view('themes/public/resources/ytPromoVideo', $subViewData); ?>
        </div>
    </div>
</div>

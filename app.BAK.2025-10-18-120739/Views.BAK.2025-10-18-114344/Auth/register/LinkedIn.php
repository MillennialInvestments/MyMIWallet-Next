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
        color: #0077B5; /* LinkedIn Blue for links */
    }
</style>

<div id="gettingStartedBanner">
    <h1 class="text-white">Welcome to MyMI Wallet</h1>
    <p>Empowering you with cutting-edge financial solutions for business and personal finance management.</p>
</div>

<div class="container promo-content">
    <div class="row">
        <div class="col-12">
            <h2>Take Control of Your Financial Future with MyMI Wallet</h2>
            <p>Whether you're a professional investor, financial advisor, or an individual striving for financial success, MyMI Wallet offers comprehensive tools for <strong>personal budgeting </strong>, <strong>investment portfolio management </strong>, and <strong>cryptocurrency trading </strong>. Our solutions are designed to optimize your financial growth and help you make data-driven decisions.</p>
            <p>Connect with other finance professionals by joining our <a href="https://www.mymiwallet.com/index.php/LinkedIn/register" target="_blank">MyMI Wallet LinkedIn Community</a>, where industry experts and investors share insights, discuss market trends, and grow their financial knowledge.</p>
            <ul>
                <li>📊 <strong>Professional Investment Tracking:</strong> Monitor your portfolio with real-time updates and in-depth analytics.</li>
                <li>💼 <strong>Financial Analytics Tools:</strong> Leverage advanced tools to assess financial performance and optimize strategies.</li>
                <li>📈 <strong>Strategic Financial Planning:</strong> Plan for the future with personalized budgeting and retirement planning features.</li>
                <li>🔔 <strong>Timely Alerts:</strong> Stay ahead with automated alerts for market changes and investment opportunities.</li>
            </ul>
            <p><strong>Join MyMI Wallet today!</strong> Create a free account to access industry-leading financial tools and start managing your investments with confidence. <a href="<?= site_url('/LinkedIn/register'); ?>">Register on LinkedIn</a> now and take your financial management to the next level.</p>
            
            <?php echo view('themes/public/resources/ytPromoVideo', $subViewData); ?>
        </div>
    </div>
</div>

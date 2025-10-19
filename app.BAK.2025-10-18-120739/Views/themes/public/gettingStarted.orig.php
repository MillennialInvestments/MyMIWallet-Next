<?php 
// print_r($uri, true); 
$subViewData = [
    'debug'     => $debug,
    'uri'       => $uri,
]; 
?>
<style <?= $nonce['style'] ?? '' ?>>
    #gettingStartedBanner {
        background-image: url('<?php echo base_url('assets/images/MyMI-Walllet-Background.jpeg'); ?>');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100%;
        width: 100%;
    }

    .highlight-image {
        filter: sepia(1) saturate(5) hue-rotate(10deg) brightness(1.2);
        width: 10%; 
    }
</style>
<div class="bg-light mt-3 pt-3 pt-xl-3 pb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= site_url('/'); ?>">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Getting Started</li>
                </ul>
                <h1>Getting Started with MyMI Wallet</h1>
            </div>
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-6">
            <div class="content">
                <h2>Step 1: Create Your Account</h2>
                <p>To get started, sign up for a MyMI Wallet account:</p>
                <ol>
                    <li>Visit <a href="<?= site_url('/register'); ?>">MyMI Wallet Registration</a>.</li>
                    <li>Fill in the required details and submit the form.</li>
                    <li>Check your email for a confirmation link and click on it to verify your account.</li>
                    <li>Log in to your new MyMI Wallet account.</li>
                </ol>
                <h2>Step 2: Start Budgeting</h2>
                <p>With your account set up, you can now start budgeting:</p>
                <ol>
                    <li>Navigate to the Budgeting section in your MyMI Wallet dashboard.</li>
                    <li>Input your monthly income and expenses to get a clear picture of your financial health.</li>
                    <li>Set financial goals and track your progress over time.</li>
                </ol>
                
                <h2>Step 3: Manage Your Investments</h2>
                <p>Leverage our powerful tools to manage and analyze your investments:</p>
                <ol>
                    <li>Go to the Investment section in your dashboard.</li>
                    <li>Link your external trading accounts for comprehensive portfolio management.</li>
                    <li>Use our analytical tools to monitor and optimize your investments based on real-time data.</li>
                </ol>
                
                <h2>Step 4: Set Up Apex Trader Funding Accounts</h2>
                <p>Maximize your trading potential with Apex Trader Funding:</p>
                <ol>
                    <li>Visit <a href="https://www.mymiwallet.com/index.php/Apex/Referral">Apex Trader Funding Referral Link</a>.</li>
                    <li>Register for an Apex Trader Funding account using our referral link.</li>
                    <li>Link your Apex Trader Funding account to MyMI Wallet for seamless integration.</li>
                    <li>Start trading with increased capital and minimized risk.</li>
                </ol>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="content">
                <div class="ratio ratio-16x9 mb-5">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/AMCS5kwGgpA" 
                            title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; 
                            encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                    </iframe>
                </div>
                <h2>Need Help?</h2>
                <p>If you have any questions or need assistance, our support team is here to help. Visit our <a href="<?= site_url('/support'); ?>">Support Page</a> for more information.</p>

                <h2>Join the Community</h2>
                <p>Connect with other MyMI Wallet users, share tips, and stay updated with the latest news by joining our community on Discord: <a href="https://discord.gg/VzVYb9mqEv">Join MyMI Wallet Discord</a>.</p>
            </div>
        </div>
    </div>
    <hr>
    <?php echo view('themes/public/resources/stayConnected', $subViewData); ?>
    <hr>
    <div class="row justify-content-center my-5">
        <div class="col-12 col-lg-12">   
            <?php //echo view('Wallets\Purchase\Memberships\Features', $subViewData); ?>
        </div>
    </div>
</div>
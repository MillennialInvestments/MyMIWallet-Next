<?php 
$beta                       = $siteSettings->beta; 
if ($beta === 0) {
    $free_registration      = 'Free/register';
} elseif ($beta === 1) {
    $free_registration      = 'Beta/register';    
}
?>
<div class="nk-content nk-content-fluid">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="content-page">
                <div class="row g-gs">
                    <div class="col-xl-12">
                        <div class="nk-block-head nk-block-head-lg wide-md pb-0">
                            <div class="nk-block-head-content">
                                <div class="card">
                                    <div class="card-inner text-left">
                                        <h4 class="nk-block-title fw-normal"><i class="icon icon-md ni ni-spark"></i> Getting Started</h4>
                                        <div class="nk-block-des">
                                            <p class="lead">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="row g-gs">
                    <div class="col-xl-12">
                        <div class="nk-block-head nk-block-head-lg wide-md pb-0">
                            <div class="nk-block-head-content">
                                <div class="card">
                                    <div class="card-inner text-left">
                                        <h5 class="nk-block-title fw-normal">Overview</h5>
                                        <div class="nk-block-des">
                                            <p class="lead fs-14px">
                                                This article will introduce you to MyMI Wallet's basic requirements and information needed to set up your MyMI Account.<br> 
                                                This article will not cover everything in detail, but it will cover the three most important steps to get started.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-gs">
                    <div class="col-xl-12">
                        <div class="nk-block-head nk-block-head-lg wide-md pb-0">
                            <div class="nk-block-head-content">
                                <div class="card">
                                    <div class="card-inner text-left">
                                        <h5 class="nk-block-title fw-normal">Step 1: Basic Setup</h5>
                                        <div class="nk-block-des">
                                            <p class="lead fs-14px">
                                                <ul class="link-list-plain">
                                                    <li><a href="#basic-setup">Creating a MyMI Account</a></li>
                                                    <li><a href="#logging-into-dashboard">KYC Verification</a></li>
                                                    <li><a href="#kyc-verification">Configuring Investor Profile</a></li>
                                                </ul>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card-inner text-left">
                                        <h5 class="nk-block-title fw-normal">Step 2: Add Your Banking/Credit Wallets</h5>
                                        <div class="nk-block-des">
                                            <p class="lead fs-14px">
                                                <ul class="link-list-plain">
                                                    <li><a href="#configuring-investor-profile">Create a wallet for each Banking/Credit Card Account that you have.</a></li>
                                                    <li><a href="#integrating-wallets">Be sure to add your initial balance and continue to update your balances moving forward.</a></li>
                                                </ul>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card-inner text-left">
                                        <h5 class="nk-block-title fw-normal">Step 3: Create Your Financial Budget</h5>
                                        <div class="nk-block-des">
                                            <p class="lead fs-14px">
                                                <ul class="link-list-plain">
                                                    <li><a href="#anayltical-customization">Add your income, expenses, & debt</a></li>
                                                    <li><a href="#trade-tracker-customization">Utilize recurring accounts to project your net growth for the year.</a></li>
                                                </ul>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="basic-setup"></div>
                <div class="row g-gs">
                    <div class="col-xl-12">
                        <div class="nk-block-head nk-block-head-lg wide-md pb-0">
                            <div class="nk-block-head-content">
                                <div class="card">
                                    <div class="card-inner text-left">
                                        <h3 class="nk-block-title fw-normal">Step 1: Basic Setup</h3>
                                        <div class="nk-block-des">
                                            <p class="lead">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="row" id="creating-account"></div>
                <div class="row g-gs">
                    <div class="col-xl-12">
                        <div class="nk-block-head nk-block-head-lg wide-md pb-0">
                            <div class="nk-block-head-content">
                                <div class="card">
                                    <div class="card-inner text-left">
                                        <h5 class="nk-block-title fw-normal pb-3">Creating a MyMI Account</h5>
                                        <div class="nk-block-des">
                                            <p class="lead fs-14px">
                                                If you wish to utilize any of MyMI Wallet's Services, you must first register an account.<br>
                                                View the following article for instructions on how to register a MyMI Wallet Account.
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item"><a href="<?php echo site_url($free_registration); ?>">Register Account</a></li>
                                                </ul>
                                            </p>
                                            <p class="lead fs-14px">
                                                We provide a variety of accounts to suit everyone's need for our Accounting &amp; Analytical Software.<br>
                                                View the following article for more details on account types.
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item"><a href="<?php echo site_url('Knowledgebase/Types-Of-Accounts'); ?>">Types of Accounts</a></li>
                                                </ul>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="logging-into-dashboard"></div>
                <div class="row g-gs">
                    <div class="col-xl-12">
                        <div class="nk-block-head nk-block-head-lg wide-md pb-0">
                            <div class="nk-block-head-content">
                                <div class="card">
                                    <div class="card-inner text-left">
                                        <h5 class="nk-block-title fw-normal pb-3">Logging Into Dashboard</h5>
                                        <div class="nk-block-des">
                                            <p class="lead fs-14px">
                                                Once you have completed the <a href="">Sign-Up Process</a>, you will receive an email notifying you that your account has been created. 
                                                To gain access to your account and Investor Dashboard, visit <a href="<?php echo site_url('login'); ?>">https://www.mymiwallet.com/login</a>.<br> 
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item"><a href="<?php echo site_url('login'); ?>">Login Now!</a></li>
                                                </ul>
                                            </p>
                                            <p class="lead fs-14px">
                                                To log in, use the credentials you selected for the account during registration.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="kyc-verification"></div>
                <div class="row g-gs">
                    <div class="col-xl-12">
                        <div class="nk-block-head nk-block-head-lg wide-md pb-0">
                            <div class="nk-block-head-content">
                                <div class="card">
                                    <div class="card-inner text-left">
                                        <h5 class="nk-block-title fw-normal pb-3">KYC Verification</h5>
                                        <div class="nk-block-des">
                                            <p class="lead fs-14px">
                                                To comply with Anti-Money Laundering (AML) Laws, we require KYC Verification of all members in the MyMI Community to protect and provide safety in our Investment Platform. 
                                                KYC Verification is the process of verifying your identity and financial activities to ensure safety from risks of any illegal activities. 
                                            </p>
                                            <p class="lead fs-14px">
                                                After you register your account, you will receive an email with a verification code to confirm you are the user of the email assigned to the account.
                                                Alongside our Email Registration Verification, we also conduct KYC Verification for our Investors to improve security for the application and platforms we expect to deliver to the Markets.                                                
                                            </p>
                                            <p class="lead fs-14px">  
                                                Once you have completed our KYC Verification Process, you will be granted full access to the resources and tools MyMI Wallet has to offer as long as you comply with our <a href="#">Terms &amp; Agreements</a>.
                                            </p>
                                            <p class="lead fs-14px">
                                                To learn more about our KYC Process and Requirements, as well as check on the status of your KYC Verification, simply visit the links below:
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item"><a href="<?php echo site_url('Knowledgebase/KYC-Verification'); ?>">KYC Process &amp; Requirements</a></li>
                                                    <li class="list-group-item"><a href="<?php echo site_url('Support/Check-KYC-Verification'); ?>">Check KYC Status</a></li>
                                                </ul>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="configuring-investor-profile"></div>
                <div class="row g-gs">
                    <div class="col-xl-12">
                        <div class="nk-block-head nk-block-head-lg wide-md pb-0">
                            <div class="nk-block-head-content">
                                <div class="card">
                                    <div class="card-inner text-left">
                                        <h5 class="nk-block-title fw-normal pb-3">Configuring Investor Profile</h5>
                                        <div class="nk-block-des">
                                            <p class="lead fs-14px">
                                                We allow investors to "fine-tune" their profile to meet their investment needs by utilizing our Investor Profile. 
                                                Learn the full power of our Investor Profile by clicking below!
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item"><a href="<?php echo site_url('Knowledgebase/Investor-Profile'); ?>">Updating Investor Profile</a></li>
                                                </ul>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="adding-wallets-trades"></div>
                <div class="row g-gs">
                    <div class="col-xl-12">
                        <div class="nk-block-head nk-block-head-lg wide-md pb-0">
                            <div class="nk-block-head-content">
                                <div class="card">
                                    <div class="card-inner text-left">
                                        <h3 class="nk-block-title fw-normal">Step 2: Adding Wallets/Trades</h3>
                                        <div class="nk-block-des">
                                            <p class="lead">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="row" id="integrating-wallets"></div>
                <div class="row g-gs">
                    <div class="col-xl-12">
                        <div class="nk-block-head nk-block-head-lg wide-md pb-0">
                            <div class="nk-block-head-content">
                                <div class="card">
                                    <div class="card-inner text-left">
                                        <h5 class="nk-block-title fw-normal pb-3">Integrating Wallets</h5>
                                        <div class="nk-block-des">
                                            <p class="lead fs-14px">
                                                To discover more about our MyMI Wallets and how you can utilize them to analyze and improve your financial growth, click the link below!
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item"><a href="<?php echo site_url('Knowledgebase/Integrating-Wallets#completing-kyc-verification'); ?>">What are MyMI Wallets?</a></li>
                                                </ul>       
                                            </p>
                                            <p class="lead fs-14px">
                                                To better understand how our Wallets are managed, visit the links below to gain more insight into Manual-Tracking and our Brokerage Integrations.
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item"><a href="<?php echo site_url('Knowledgebase/Integrating-Wallets#individual-required-information'); ?>">How to Manually Track Trades</a></li>
                                                    <li class="list-group-item"><a href="<?php echo site_url('Knowledgebase/Integrating-Wallets#manually-integrated-wallets'); ?>">How to Integrate Brokerage Accounts</a></li>
                                                </ul>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="trade-history-and-tracker"></div>
                <div class="row g-gs">
                    <div class="col-xl-12">
                        <div class="nk-block-head nk-block-head-lg wide-md pb-0">
                            <div class="nk-block-head-content">
                                <div class="card">
                                    <div class="card-inner text-left">
                                        <h5 class="nk-block-title fw-normal pb-3">MyMI Trade Tracker</h5>
                                        <div class="nk-block-des">
                                            <p class="lead fs-14px">
                                                Whether you utilize our Manual-Tracking Analytics or our Integrated Services, tap into the power of our Trade Tracker to analyze and deep dive into:
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item"><a href="#<?php //echo site_url('login'); ?>">"What's With This Trade Tracker?"</a></li>
                                                </ul>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="anayltical-customization"></div>
                <div class="row g-gs">
                    <div class="col-xl-12">
                        <div class="nk-block-head nk-block-head-lg wide-md pb-0">
                            <div class="nk-block-head-content">
                                <div class="card">
                                    <div class="card-inner text-left">
                                        <h3 class="nk-block-title fw-normal">Step 3: Analytical Customization</h3>
                                        <div class="nk-block-des">
                                            <p class="lead">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="row" id="trade-tracker-customization"></div>
                <div class="row g-gs">
                    <div class="col-xl-12">
                        <div class="nk-block-head nk-block-head-lg wide-md pb-0">
                            <div class="nk-block-head-content">
                                <div class="card">
                                    <div class="card-inner text-left">
                                        <h5 class="nk-block-title fw-normal pb-3">Trade Tracker Customization</h5>
                                        <div class="nk-block-des">
                                            <p class="lead fs-14px">
                                                And just when you thought that was enough... 
                                                Then dive even deeper with the ability to customize our Trade Tracker in every way possible to capture the data you need to discover better investment decisions and strategies.                                              
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item"><a href="#<?php //echo site_url('login'); ?>">How to customize the Trade Tracker</a></li>
                                                    <li class="list-group-item"><a href="#<?php //echo site_url('login'); ?>">MyMI Trade Tracker - In-Depth Overview</a></li>
                                                </ul>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="backtesting-and-forecasting"></div>
                <div class="row g-gs">
                    <div class="col-xl-12">
                        <div class="nk-block-head nk-block-head-lg wide-md pb-0">
                            <div class="nk-block-head-content">
                                <div class="card">
                                    <div class="card-inner text-left">
                                        <h5 class="nk-block-title fw-normal pb-3">Backtesting / Forecasting</h5>
                                        <div class="nk-block-des">
                                            <p class="lead fs-14px">
                                                Backtesting allows you to simulate trading strategies using historical trade data to generate results. 
                                                With these results, you can analyze risk and profitability before risking any actual capital. 
                                                Well-conducted test that are yielding positive results indicates that the tested strategy is logical and has a higher chance of profitability when utilized with real money.
                                            </p>
                                            <p class="lead fs-14px">
                                                Trend Analysis & Forecasting can be utilized to provide additional confirmations and indications that a potential trade fits a potential investment strategy. 
                                                Our Trade Tracker allows Retail Investments and Fund Managers alike to track <a href="#"><strong>Customizable Indicators</strong></a> in the form of a Spreadsheet that can be built to track everything you need. 
                                                Add that with some trend analysis and fundamentals, and you can have all the accessible information at your fingertips to invest like a professional!
                                            </p>
                                            <!-- <p class="lead fs-14px">
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item"><a href="#<?php //echo site_url('login'); ?>">Ways to Backtest Your Investments</a></li>
                                                    <li class="list-group-item"><a href="#<?php //echo site_url('login'); ?>">Trend Analysis &amp; Forecasting Your Investments</a></li>
                                                    <li class="list-group-item"><a href="#<?php //echo site_url('login'); ?>">Import/Exporting Real-Time & Historical Data</a></li>
                                                    <li class="list-group-item"><a href="#<?php //echo site_url('login'); ?>">Share Trade Analysis</a></li>
                                                    <li class="list-group-item"><a href="#<?php //echo site_url('login'); ?>">Get The CommunityInvolved</a></li>
                                                    <li class="list-group-item"><a href="#<?php //echo site_url('login'); ?>">MyMI Trade Tracker - In-Depth Overview</a></li>
                                                </ul>
                                            </p> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$registerType = $uri->getSegment(1);
$title = $registerType === 'Investor' ? 'Register An Investor Account' : 'Register An Investor Account Free!';
$btnURL = empty($cuID) ? ($beta === 0 ? site_url('/Free/register') : site_url('/Beta/register')) : site_url('/Dashboard');
$btnText = empty($cuID) ? 'Register Now' : 'Dashboard';
?>
<style <?= $nonce['style'] ?? '' ?>>
    .intro-banner {
        background: url(<?php echo base_url('assets/images/MyMI-Walllet-Background.jpeg'); ?>) no-repeat center center fixed;
        background-size: cover;
    }
</style>

<!-- 🔹 Hero Banner -->
<div class="intro-banner pb-3 bg-dark">
  <div class="container pt-3">
    <div class="row justify-content-center pt-1">
      <!-- Left: Message -->
      <div class="col-xl-6 col-lg-6 col-md-12">
        <div class="intro-banner-wrap">
          <div class="intro-banner-inner text-center text-white">
            <div class="intro-banner-desc py-md-2 py-lg-5 text-white">
              <span class="overline-title">Introducing</span>
              <h1 class="title">How It Works</h1>
              <h2 class="subtitle pb-3">Investment Portfolio Management</h2>
              <p>
                MyMI Wallet offers a comprehensive platform to manage your investment portfolios efficiently. Whether you're a novice investor or an experienced trader, our tools help you track performance, manage risk, and optimize returns. With real-time analytics and multi-account integration, staying on top of your investments has never been easier.
              </p>
              <div class="content">
                <div class="ratio ratio-16x9 mb-5">
                  <iframe width="560" height="315" src="<?= $socialMedia->promotional_yt_video ?>" 
                          title="Introduction to MyMI Wallet" frameborder="0" allow="accelerometer; autoplay; clipboard-write; 
                          encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                  </iframe>
                </div>
              </div>
              <p class="text-light">Get started today by creating a free MyMI Wallet account and begin managing your investments smarter!</p>
              <div class="arrow-prompt">
                  Start Here
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <path d="M10 17l5-5-5-5v10z"/>
                  </svg>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Right: Registration Form -->
      <div class="col-md-12 col-lg-6 pl-lg-5 d-block-lg">
        <div class="intro-banner-wrap">
          <div class="intro-banner-inner">
            <div class="intro-banner-desc pt-0">
              <div class="card rounded p-3 shadow-sm">
                <div class="card-body">
                  <?= view('App/Views/Auth/register_form'); ?>
                </div>
              </div>
              <div id="features"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- 🔹 Overview Section -->
<div class="intro-section intro-overview text-center bg-white pt-md-5d-5">
  <div class="container-fluid pt-5">
    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-8 col-xl-7">
        <div class="intro-section-title">
          <span class="overline-title intro-section-subtitle">Investment Portfolio Management Overview</span>
          <h3 class="intro-heading-lead">Building a Solid Investment Strategy</h3>
          <div class="intro-section-desc">
            <p class="dark-text">
              Effective portfolio management involves selecting and overseeing a collection of investments that align with your long-term financial goals and risk tolerance. MyMI Wallet provides tools to help you implement key strategies such as asset allocation, diversification, and regular rebalancing to optimize your investment performance.
            </p>                        
          </div>
        </div>
      </div>
    </div>

    <!-- 🔹 Step-by-Step Process -->
    <div class="row justify-content-center pt-5 text-left">
      <div class="col-md-10 col-lg-8 col-xl-7">
        <div class="intro-section-title">
          <h4 class="subtitle"><strong>1. Establish Your Financial Goals</strong></h4>
        </div>
        <div class="intro-section-desc">
          <ul class="list list-sm list-checked">
            <li><strong class="list-blue-header pl-3">Define Clear Objectives:</strong> Determine what you aim to achieve with your investments, such as retirement planning, wealth accumulation, or funding education. Clear goals guide your investment strategy and asset selection.</li><br>
          </ul>
          <a class="btn btn-primary mb-3" href="<?php echo $btnURL; ?>">Set Your Goals</a>
        </div>
      </div>
    </div>

    <div class="row justify-content-center pt-5 text-left">
      <div class="col-md-10 col-lg-8 col-xl-7">
        <div class="intro-section-title">
          <h4 class="subtitle"><strong>2. Determine Your Risk Tolerance</strong></h4>
        </div>
        <div class="intro-section-desc">
          <ul class="list list-sm list-checked">
            <li><strong class="list-blue-header pl-3">Assess Your Comfort with Risk:</strong> Evaluate how much risk you're willing to take on. MyMI Wallet offers tools to help you understand your risk profile, which is crucial for selecting appropriate investments.</li><br>
          </ul>
          <a class="btn btn-primary mb-3" href="<?php echo $btnURL; ?>">Assess Risk Tolerance</a>
        </div>
      </div>
    </div>

    <div class="row justify-content-center pt-5 text-left">
      <div class="col-md-10 col-lg-8 col-xl-7">
        <div class="intro-section-title">
          <h4 class="subtitle"><strong>3. Asset Allocation & Diversification</strong></h4>
        </div>
        <div class="intro-section-desc">
          <ul class="list list-sm list-checked">
            <li><strong class="list-blue-header pl-3">Strategic Asset Allocation:</strong> Allocate your investments across various asset classes—stocks, bonds, real estate, and more—to balance risk and return according to your financial goals.</li><br>
            <li><strong class="list-blue-header pl-3">Diversify Your Portfolio:</strong> Spread your investments within asset classes to minimize the impact of any single investment's performance on your overall portfolio.</li><br>
          </ul>
          <a class="btn btn-primary mb-3" href="<?php echo $btnURL; ?>">Allocate & Diversify</a>
        </div>
      </div>
    </div>

    <div class="row justify-content-center pt-5 text-left">
      <div class="col-md-10 col-lg-8 col-xl-7">
        <div class="intro-section-title">
          <h4 class="subtitle"><strong>4. Choose Between Active and Passive Management</strong></h4>
        </div>
        <div class="intro-section-desc">
          <ul class="list list-sm list-checked">
            <li><strong class="list-blue-header pl-3">Active Management:</strong> Engage in frequent buying and selling of assets to outperform market indices. This approach requires continuous monitoring and analysis.</li><br>
            <li><strong class="list-blue-header pl-3">Passive Management:</strong> Invest in index funds or ETFs that aim to replicate market performance, offering a cost-effective and hands-off strategy.</li><br>
          </ul>
          <a class="btn btn-primary mb-3" href="<?php echo $btnURL; ?>">Select Management Style</a>
        </div>
      </div>
    </div>

    <div class="row justify-content-center pt-5 text-left">
      <div class="col-md-10 col-lg-8 col-xl-7">
        <div class="intro-section-title">
          <h4 class="subtitle"><strong>5. Regularly Rebalance Your Portfolio</strong></h4>
        </div>
        <div class="intro-section-desc">
          <ul class="list list-sm list-checked">
            <li><strong class="list-blue-header pl-3">Maintain Target Allocation:</strong> Periodically adjust your portfolio to realign with your original asset allocation, ensuring your investment strategy remains on track despite market fluctuations.</li><br>
          </ul>
          <a class="btn btn-primary mb-3" href="<?php echo $btnURL; ?>">Rebalance Portfolio</a>
        </div>
      </div>
    </div>

    <div class="row justify-content-center pt-5 text-left">
      <div class="col-md-10 col-lg-8 col-xl-7">
        <div class="intro-section-title">
          <h4 class="subtitle"><strong>Start Managing Your Portfolio with MyMI Wallet</strong></h4>
        </div>
        <div class="intro-section-desc">
          <p class="dark-text">
            <strong>MyMI Wallet</strong> empowers you to effectively manage your investments by offering a suite of tools designed to track performance, analyze market data, and adjust your portfolio with precision. Get started today and take control of your investment future.
          </p>      
          <ul class="intro-action-group">
            <li><a href="<?php echo $btnURL; ?>" class="btn btn-lg btn-primary">Get Started!</a></li>
          </ul>        
        </div>
      </div>
    </div>
  </div>
</div>

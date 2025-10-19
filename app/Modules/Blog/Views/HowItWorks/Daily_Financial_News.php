<?php
$registerType = $uri->getSegment(1);
$title = $registerType === 'Investor' ? 'Register An Investor Account' : 'Register An Investor Account Free!';
$btnURL = empty($cuID) ? ($beta === 0 ? site_url('/Free/register') : site_url('/Beta/register')) : site_url('/Dashboard');
$btnText = empty($cuID) ? 'Register Now' : 'Dashboard';
?>
<style <?= $nonce['style'] ?? '' ?>>
.intro-banner {
    background: url(<?= base_url('assets/images/MyMI-Walllet-Background.jpeg'); ?>) no-repeat center center fixed;
    background-size: cover;
}
.arrow-prompt {
    display: inline-flex;
    align-items: center;
    font-weight: bold;
    color: #ffc107;
    margin-top: 1rem;
}
.arrow-prompt svg {
    margin-left: 8px;
    fill: #ffc107;
    width: 24px;
    height: 24px;
}
.list-blue-header { color: #3E61BC }
.list-checked > li { font-size: 1.125rem }
</style>

<div class="intro-banner pb-3 bg-dark">
  <div class="container pt-3">
    <div class="row justify-content-center pt-1">
      <!-- Left: Message -->
      <div class="col-xl-6 col-lg-6 col-md-12">
        <div class="intro-banner-wrap">
          <div class="intro-banner-inner text-center text-white">
            <div class="intro-banner-desc py-md-2 py-lg-5 text-white">
              <span class="overline-title">Stay Informed</span>
              <h1 class="title">Daily Financial News</h1>
              <h2 class="subtitle pb-3">Customized News & Alerts</h2>
              <p>
                Get the edge with personalized daily financial news designed for investors like you. Track key market events, receive real-time alerts, and stay ahead of the curve with curated content powered by MyMI Wallet.
              </p>
              <ul class="text-left pt-2">
                <li>✔ Set alerts for stocks and crypto you follow</li>
                <li>✔ View market summaries daily</li>
                <li>✔ Customize your financial feed</li>
              </ul>
              <p class="text-light pt-3">Sign up to start receiving real-time insights.</p>
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
                  <?= view('App/Views/Auth\register_form'); ?>
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

<div class="intro-section intro-overview text-center bg-white pt-md-5d-5">
  <div class="container-fluid pt-5">
    <div class="row justify-content-center">
      <div class="col-md-10 col-lg-8 col-xl-7">
        <div class="intro-section-title">
          <span class="overline-title intro-section-subtitle">Daily Financial News Overview</span>
          <h3 class="intro-heading-lead">Keeping You Ahead</h3>
          <div class="intro-section-desc">
            <p class="dark-text">
              Staying informed about market news and trends is essential for making sound investment decisions. MyMI Wallet’s Daily Financial News feature delivers personalized articles and news updates straight to your dashboard. Whether it’s stock market shifts, cryptocurrency trends, or global financial events, we keep you informed in real-time.
            </p>                        
          </div>
        </div>
      </div>
    </div>

    <!-- Step 1 -->
    <div class="row justify-content-center pt-5 text-left">
      <div class="col-md-10 col-lg-8 col-xl-7">
        <h4 class="subtitle"><strong>1. Customize Your Newsfeed</strong></h4>
        <ul class="list list-sm list-checked">
          <li><strong class="list-blue-header pl-3">Set Your Preferences:</strong> Adjust your newsfeed to focus on topics that interest you the most—stocks, crypto, global events, or sector-specific news.</li><br>
        </ul>
        <a class="btn btn-primary mb-3" href="<?= $btnURL ?>">Set News Preferences</a>
      </div>
    </div>

    <!-- Step 2 -->
    <div class="row justify-content-center pt-5 text-left">
      <div class="col-md-10 col-lg-8 col-xl-7">
        <h4 class="subtitle"><strong>2. Real-Time Alerts</strong></h4>
        <ul class="list list-sm list-checked">
          <li><strong class="list-blue-header pl-3">Get Notified:</strong> Enable real-time alerts on stocks, crypto, or sectors you follow and act on important changes instantly.</li><br>
          <li><strong class="list-blue-header pl-3">Track Specific Assets:</strong> Get alerted when prices hit targets or volume spikes occur.</li><br>
        </ul>
        <a class="btn btn-primary mb-3" href="<?= $btnURL ?>">Enable Alerts</a>
      </div>
    </div>

    <!-- Step 3 -->
    <div class="row justify-content-center pt-5 text-left">
      <div class="col-md-10 col-lg-8 col-xl-7">
        <h4 class="subtitle"><strong>3. Curated Daily Insights</strong></h4>
        <ul class="list list-sm list-checked">
          <li><strong class="list-blue-header pl-3">Summary Reports:</strong> Receive expert-curated summaries on what’s happening in the markets and why it matters to your portfolio.</li><br>
          <li><strong class="list-blue-header pl-3">Tailored Updates:</strong> MyMI matches articles to your interests and holdings.</li><br>
        </ul>
      </div>
    </div>

    <!-- Step 4 -->
    <div class="row justify-content-center pt-5 text-left">
      <div class="col-md-10 col-lg-8 col-xl-7">
        <h4 class="subtitle"><strong>4. Premium Content Access</strong></h4>
        <ul class="list list-sm list-checked">
          <li><strong class="list-blue-header pl-3">Expert Market Analysis:</strong> Access reports, interviews, and forecasts reserved for Pro members.</li><br>
          <li><strong class="list-blue-header pl-3">Top-Tier Financial Intelligence:</strong> Get deep dives on economic events and investment opportunities others miss.</li><br>
        </ul>
        <a class="btn btn-primary mb-3" href="<?= $btnURL ?>">Upgrade to Pro</a>
      </div>
    </div>

    <!-- Final CTA -->
    <div class="row justify-content-center pt-5 text-left">
      <div class="col-md-10 col-lg-8 col-xl-7">
        <h4 class="subtitle"><strong>Stay Informed with MyMI Wallet</strong></h4>
        <p class="dark-text">
          <strong>MyMI Wallet</strong> empowers you with the right information at the right time. Gain an edge by staying informed and ready to act.
        </p>      
        <ul class="intro-action-group">
          <li><a href="<?= $btnURL ?>" class="btn btn-lg btn-primary">Get Started!</a></li>
        </ul>        
      </div>
    </div>
  </div>
</div>

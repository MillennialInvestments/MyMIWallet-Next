<?php 
$subViewData = [
  'socialMedia' => $socialMedia,
  'uri' => $uri,
]; 
?>

<style <?= $nonce['style'] ?? '' ?>>
  #missionRegisterBanner {
    background-image: url(<?php echo base_url('assets/images/Partners/TBI-Solutions-Background1.png'); ?>);
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
    width: 100%;
    min-height: 500px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    text-align: center;
    padding: 50px 2rem;
    margin-bottom: 2rem;
  }
  .section-divider {
    border-top: 2px solid #eee;
    margin: 3rem 0;
  }
</style>

<div id="missionRegisterBanner">
  <div>
    <h1>Join The Mission. Begin Your Journey With <a href="<?php echo site_url('/'); ?>">MyMI Wallet</a></h1>
    <p>Track your finances. Forecast your future. Invest with purpose.</p>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-12 text-center">
      <h2>Get Started with MyMI Wallet</h2>
      <p>Create your account to access budgeting tools, real-time investing dashboards, and the upcoming MyMI Exchange.</p>
      <a href="<?php echo site_url('/register'); ?>" class="btn btn-primary btn-lg mt-3">Register Your Free Account</a>
    </div>
  </div>

  <div class="section-divider"></div>

  <div class="row">
    <div class="col-md-6">
      <?php echo view('themes/public/resources/ytPromoVideo', $subViewData); ?>
    </div>
    <div class="col-md-6">
      <h3>Why MyMI Wallet?</h3>
      <ul>
        <li><strong>📊 Forecast Financial Futures:</strong> Simulate and plan 5-30 years ahead using real income and expenses.</li>
        <li><strong>🧠 Smart Budgeting Tools:</strong> AI-enhanced insights help you manage your money more effectively.</li>
        <li><strong>📈 Real-Time Investing:</strong> Monitor your portfolio with trade alerts and risk evaluations.</li>
        <li><strong>🪙 MyMI Gold & Asset Creator:</strong> Tokenize your financial insights and earn via our blockchain tools.</li>
        <li><strong>🏘️ Community Investing:</strong> Support and invest in under-funded local projects and share in their growth.</li>
      </ul>
    </div>
  </div>

  <div class="section-divider"></div>

  <div class="row">
    <div class="col-12">
      <h2 class="text-center">A Closer Look at The Mission</h2>
      <p>MyMI Wallet began as a tool for personal investment clarity and evolved into a mission to empower individuals and communities with financial intelligence, predictive insights, and new asset creation tools.</p>

      <h4>Our Mission</h4>
      <p>We help users forecast their financial future and manage risk in real-time, turning data into digital assets and growth opportunities.</p>

      <h4>Our Evolution</h4>
      <ul>
        <li>Started as a free budgeting platform</li>
        <li>Expanded to include investment tracking and portfolio analytics</li>
        <li>Now introducing asset creation, exchange services, and community funding tools</li>
      </ul>

      <h4>The Road Ahead</h4>
      <p>Our roadmap includes financial forecasting tools, MyMI Asset Creator, Growth Coin auctions, public marketplaces, and municipal & global expansion. Each milestone pushes forward the mission of financial freedom for all.</p>

      <h4>Connect With Us</h4>
      <p>Join our communities on <a href="https://discord.gg/YOUR_LINK">Discord</a>, <a href="https://facebook.com/mymiwallet">Facebook</a>, <a href="https://twitter.com/mymiwallet">Twitter</a>, and more to collaborate and stay updated.</p>
    </div>
  </div>
</div>

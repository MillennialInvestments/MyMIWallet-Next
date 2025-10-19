<!-- app/Views/emails/completeActivation.php -->
<?php ob_start(); ?>
<p>Dear Valued User,</p>

<p>We hope this message finds you well. We're reaching out to acknowledge a technical issue that may have prevented you from activating your <strong>MyMI Wallet</strong> account.</p>

<p>Due to an internal error that has since been resolved, some users did not receive a valid activation link or experienced difficulties completing the process.</p>

<hr>

<h3>🔐 <u>Reactivate Your Account</u></h3>

<p>Your security and access matter to us. Please click the link below to complete your account activation:</p>

<div style="text-align:center; margin: 20px 0;">
    <a href="<?= site_url('activate-account?token=' . ($activationToken ?? '')) ?>"
       style="background-color:#007bff;color:white;padding:12px 24px;border-radius:5px;text-decoration:none;font-weight:bold;">
        ✅ Activate My Account
    </a>
</div>

<p>If you continue to experience issues, you may <a href="<?= site_url('resend-activation') ?>">resend your activation</a> or <a href="<?= site_url('Support') ?>">contact our support team</a>.</p>

<hr>

<h3>🚀 <u>Getting Started: MyMI Wallet Walkthrough</u></h3>
<ol>
    <li><strong>Login</strong> to your account after activation.</li>
    <li><strong>Set Up</strong> your personal budget using our Smart Budget Tool.</li>
    <li><strong>Add Wallets</strong> to manage bank accounts, credit, crypto, and investments.</li>
    <li><strong>Track & Forecast</strong> your finances to build long-term wealth.</li>
    <li><strong>Explore Tools</strong>: Portfolio Manager, Retirement Planner, and more.</li>
</ol>

<p>All core tools are free forever. 🏦</p>

<hr>

<h3>💼 <u>Discover Premium Tools</u></h3>
<p>If you're looking to take your investing and finances to the next level, try out our Premium features:</p>
<ul>
    <li><strong>MyMI Trade Tracker</strong>: Get real-time stock and crypto alerts.</li>
    <li><strong>Option Spread Analyzer</strong>: Advanced tools for options traders.</li>
    <li><strong>Investor Portfolio Manager</strong>: Visualize and track investments across all asset types.</li>
    <li><strong>MyMI Projects</strong>: Participate in exclusive private equity and startup investments.</li>
</ul>

<p>You can upgrade any time inside your account.</p>

<hr>

<h3>🌐 <u>Join the Community</u></h3>
<p>Follow us and join the conversation:</p>
<ul>
    <li>📘 Facebook: <a href="<?= $socialMedia->facebook_page ?? '#' ?>">Investor’s Talk</a></li>
    <li>📸 Instagram: <a href="<?= $socialMedia->instagram ?? '#' ?>">@MyMIWallet</a></li>
    <li>💼 LinkedIn: <a href="<?= $socialMedia->linkedin ?? '#' ?>">MyMI Wallet</a></li>
    <li>🐦 Twitter/X: <a href="<?= $socialMedia->twitter ?? '#' ?>">@MyMIWallet</a></li>
    <li>💬 Discord: <a href="<?= $socialMedia->discord ?? '#' ?>">Join Our Server</a></li>
</ul>

<p>We sincerely apologize for any inconvenience and thank you for your patience.</p>

<p>Warm regards,<br>
<strong>The MyMI Wallet Team</strong></p>

<?php $content = ob_get_clean(); ?>

<?= view('emails/layout', ['content' => $content, 'siteSettings' => $siteSettings, 'socialMedia' => $socialMedia]) ?>

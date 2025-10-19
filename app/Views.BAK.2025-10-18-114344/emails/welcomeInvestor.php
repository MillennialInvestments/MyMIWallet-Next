<?php ob_start(); ?>
<p>Dear Future Investor,</p>

<p>Thank you for your interest in joining the <strong>Investor’s Talk</strong> community! 🎉</p>

<p>We’re thrilled to welcome you to the future of finance — <strong>MyMI Wallet</strong>.</p>

<hr>

<p><strong>Our Mission</strong> is to provide <em>complete financial clarity, investment opportunities, and wealth-building tools</em> to individuals, businesses, and entrepreneurs alike.</p>

<p>Here’s what you can unlock with us:</p>

<ol>
    <li><strong>Personal Budgeting & Forecasting</strong>: Manage today and plan tomorrow with intelligent income, expense, and investment tracking tools.</li>
    <li><strong>Smart Credit & Debt Management</strong>: Optimize your financial profile with tools to improve credit, reduce debt, and maximize savings.</li>
    <li><strong>Customized Retirement Planning</strong>: Build wealth with strategies personalized to your lifestyle and goals.</li>
    <li><strong>Strategic Investment Tools</strong>: Align your investments with real-time data, alerts, and portfolio insights — powered by our cutting-edge <strong>MyMI Trade Tracker</strong>.</li>
    <li><strong>Exclusive Private Equity Access</strong>: Participate in high-potential opportunities through <strong>MyMI Projects</strong> — real estate, startups, crypto-backed ventures, and more.</li>
    <li><strong>Crypto and Asset Creation</strong>: Tokenize and trade assets securely with our upcoming <strong>MyMI Solana Exchange</strong> and <strong>Asset Creator</strong> platform.</li>
    <li><strong>Community and Support</strong>: Get direct access to investor resources, tutorials, mentorship, and enterprise-ready solutions — all backed by a like-minded community of financial innovators.</li>
</ol>

<p>At MyMI Wallet, you're not just using a tool — you're building your legacy. 💼🚀</p>

<hr>

<?php if (isset($userStatus) && $userStatus === 'active') : ?>
    <div style="text-align:center; margin-top:20px;">
        <a href="<?= site_url('Dashboard') ?>" style="background-color:#28a745;color:white;padding:10px 20px;border-radius:5px;text-decoration:none;">🚀 Go To My Dashboard</a>
    </div>
<?php elseif (isset($userStatus) && $userStatus === 'inactive') : ?>
    <div style="text-align:center; margin-top:20px;">
        <a href="<?= site_url('resend-activation') ?>" style="background-color:#007bff;color:white;padding:10px 20px;border-radius:5px;text-decoration:none;margin-right:5px;">🔑 Activate Your Account</a><br><br>
        <a href="<?= site_url('forgot-password') ?>" style="background-color:#ffc107;color:black;padding:10px 20px;border-radius:5px;text-decoration:none;margin-top:10px;">🛠 Can't Login?</a><br><br>
        <a href="<?= site_url('Support') ?>" style="background-color:#6c757d;color:white;padding:10px 20px;border-radius:5px;text-decoration:none;margin-top:10px;">📩 Contact Support</a>
    </div>
<?php else : ?>
    <div style="text-align:center; margin-top:20px;">
        <a href="<?= site_url('/ITT/register') ?>" style="background-color:#17a2b8;color:white;padding:10px 20px;border-radius:5px;text-decoration:none;">✍️ Create Your Free Account</a>
    </div>
<?php endif; ?>

<p><strong>Get started and join the conversation:</strong><br>
👉 <a href="https://www.facebook.com/InvestorsTalk">Investor’s Talk Facebook Group</a></p>

<p>We’ll be sending you personalized tips, tools, and early-bird access to exclusive features very soon. Welcome to the movement!</p>

<p>Yours in financial growth,<br>
<strong>The MyMI Wallet Team</strong></p>
<?php $content = ob_get_clean(); ?>

<?= view('emails/layout', ['content' => $content, 'siteSettings' => $siteSettings, 'socialMedia' => $socialMedia]) ?>

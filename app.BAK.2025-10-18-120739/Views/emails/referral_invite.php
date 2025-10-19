<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Referral Invitation - Join MyMI Wallet</title>
    <style <?= $nonce['style'] ?? '' ?>>
        /* Inline CSS for email compatibility */
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
        }
        h2 {
            text-align: center;
            color: #4CAF50;
            font-weight: bold;
        }
        .cta-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin: 20px 0;
        }
        .social-links img {
            width: 24px;
            margin: 0 10px;
        }
        .promo-section, .event-section {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .promo-section h3, .event-section h3 {
            margin-bottom: 10px;
            color: #4CAF50;
        }
        .youtube-video {
            text-align: center;
            margin-bottom: 20px;
        }
        ul {
            padding-left: 20px;
        }
        a {
            color: #4CAF50;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
        }
        .footer p {
            font-size: 12px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Join MyMI Wallet Today!</h2>
        <p>Hi there,</p>
        <p>Your friend <strong><?= $referrer_name ?></strong> has invited you to join MyMI Wallet! MyMI Wallet is a cutting-edge financial platform designed to help you manage your investments and finances more effectively.</p>
        <p>With MyMI Wallet, you can:</p>
        <ul>
            <li>Track and manage your investments</li>
            <li>Access personalized financial insights</li>
            <li>Engage with a vibrant community of investors</li>
        </ul>
        <p>Start your financial journey today by clicking the link below:</p>
        <div style="text-align: center;">
            <a href="<?= $referral_link ?>" class="cta-button">Join MyMI Wallet</a>
        </div>

        <!-- Recent YouTube Video Section -->
        <div class="promo-section">
            <h3>Check out our latest YouTube video!</h3>
            <div class="youtube-video">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $youtube_video_id ?>" frameborder="0" allowfullscreen></iframe>
            </div>
            <p>Don't miss out on our latest tips and tutorials. Subscribe to our <a href="https://www.youtube.com/channel/YourChannelLink">YouTube channel</a> for more updates!</p>
        </div>

        <!-- Upcoming Promotions/Events Section -->
        <div class="event-section">
            <h3>Upcoming Events & Promotions</h3>
            <p>We have some exciting events coming up!</p>
            <ul>
                <li><strong>September 30th:</strong> MyMI Wallet Launch Event</li>
                <li><strong>October 15th:</strong> Webinar on Personal Finance Management</li>
                <li><strong>November 1st:</strong> Investment Strategies Workshop</li>
            </ul>
            <p>Stay tuned for more updates by visiting our <a href="https://www.mymiwallet.com/events">events page</a>.</p>
        </div>

        <!-- Social Media Links Section -->
        <div style="text-align: center;">
            <h4>Stay Connected</h4>
            <p>Follow us on social media to stay updated on the latest news and promotions:</p>
            <div class="social-links">
                <a href="https://www.twitter.com/MyMIWallet"><img src="https://img.icons8.com/fluent/48/000000/twitter.png" alt="Twitter"></a>
                <a href="https://www.youtube.com/channel/YourChannelLink"><img src="https://img.icons8.com/fluent/48/000000/youtube.png" alt="YouTube"></a>
                <a href="https://www.linkedin.com/company/mymiwallet"><img src="https://img.icons8.com/fluent/48/000000/linkedin.png" alt="LinkedIn"></a>
            </div>
        </div>

        <div class="footer">
            <p>If you have any questions, feel free to contact us at <a href="mailto:support@mymiwallet.com">support@mymiwallet.com</a>.</p>
            <p>Thanks,<br>The MyMI Wallet Team</p>
        </div>
    </div>
</body>
</html>

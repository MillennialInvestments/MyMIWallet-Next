
    
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            text-indent: 0;
        }

        .s1 {
            color: #FFF;
            font-family: "Book Antiqua", serif;
            font-style: italic;
            font-weight: normal;
            text-decoration: none;
            font-size: 16pt;
        }

        .s2 {
            color: #FFF;
            font-family: Calibri, sans-serif;
            font-style: italic;
            font-weight: bold;
            text-decoration: none;
            font-size: 16pt;
        }

        .s3 {
            color: #1B377C;
            font-family: Calibri, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 41.5pt;
        }

        h2 {
            color: black;
            font-family: Calibri, sans-serif;
            font-weight: bold;
            font-size: 16pt;
        }

        p {
            color: black;
            font-family: Tahoma, sans-serif;
            font-size: 9.5pt;
        }

        /* Additional styles as needed */
    </style>
    <!-- HEADER -->
    <p class="s1" style="padding-top: 4pt; padding-left: 453pt;"><?= $header_title ?? 'Oct 2024' ?></p>
    <p class="s2" style="padding-left: 445pt;"><?= $header_subtitle ?? 'Report #1' ?></p>
    <p class="s3" style="padding-top: 4pt; padding-left: 47pt;">CORPORATE EARNINGS</p>
    <h2 style="padding-left: 49pt;"><?= $campaign_title ?? 'WEEK OF OCT 21ST-25TH' ?></h2>

    <!-- INTRO SECTION -->
    <p style="padding-top: 7pt; padding-left: 47pt;"><?= $intro_text ?? 'At MyMI Wallet, we’re transforming the way...' ?></p>
    <p style="padding-top: 11pt; padding-left: 47pt;"><?= $highlight_text ?? 'Here’s how we’re making a difference...' ?></p>

    <!-- MAIN CONTENT AREA -->
    <div class="content">
        <?= $content ?? '' ?>
    </div>

    <!-- CALL TO ACTION -->
    <h2>Steps to Get Started:</h2>
    <ul>
        <?php foreach ($steps ?? [] as $step) : ?>
            <li style="padding-left: 47pt; color: #FFF; font-size: 10.5pt;"><?= $step ?></li>
        <?php endforeach; ?>
    </ul>

    <!-- FOOTER SECTION -->
    <div class="footer" style="padding-top: 36pt; text-align: center;">
        <h3>Stay Connected</h3>
        <p>Follow us on social media:</p>
        <?= $social_links ?? '' ?>
    </div>
<div class="container py-4">
    <div class="row">
        <div class="col-md-8">
            <h1 class="mb-3">How The MyMI Discord Works</h1>
            <p class="lead">Support is the default landing zone. New members start in <strong>#welcome-support</strong>, link their accounts, and learn where to post alerts, DD, and questions.</p>

            <section class="mb-4">
                <h4>Server layout</h4>
                <ul>
                    <li><strong>Alerts &amp; trading:</strong> #trade-alerts, #trade-alerts-free, tiered alerts (#trade-alerts-tier1/2/3), #alert-lifecycle</li>
                    <li><strong>News &amp; marketing:</strong> #marketing-news, #earnings-watch, #daily-earnings</li>
                    <li><strong>Support:</strong> #welcome-support (default landing), mirrored on staging</li>
                    <li><strong>Ops &amp; staging:</strong> #ops-status / #system-status, #staging-sandbox</li>
                </ul>
                <p>New member onboarding is reinforced by MEE6 + Community Onboarding, and staging mirrors the same Support-first flow.</p>
            </section>

            <section class="mb-4">
                <h4>Where to share what?</h4>
                <p>Follow the channel governance guidelines to keep automation-heavy channels tidy.</p>
                <p class="mb-1"><a href="<?= esc($sharingGuideUrl); ?>" target="_blank" rel="noreferrer">View the JSON sharing guide</a></p>
                <p class="mb-1"><a href="<?= site_url('docs/discord/where_to_share_what.md'); ?>" target="_blank" rel="noreferrer">Read the full markdown guide</a></p>
            </section>

            <section class="mb-4">
                <h4>Onboarding steps</h4>
                <ol>
                    <?php foreach ($onboardingSteps as $step): ?>
                        <li class="mb-2">
                            <strong><?= esc($step['title']); ?></strong><br>
                            <small><?= esc($step['description']); ?></small><br>
                            <?php if (!empty($step['url'])): ?>
                                <a href="<?= esc($step['url']); ?>" target="_blank" rel="noreferrer">Go to step</a>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </section>

            <section class="mb-4">
                <h4>Commands catalog</h4>
                <?php $byCategory = []; foreach ($commands as $key => $cmd) { $byCategory[$cmd['category']][] = $cmd; } ?>
                <?php foreach ($byCategory as $category => $items): ?>
                    <div class="mb-3">
                        <h6 class="mb-1"><?= esc($category); ?></h6>
                        <ul class="mb-0">
                            <?php foreach ($items as $cmd): ?>
                                <li>
                                    <strong><?= esc($cmd['name']); ?></strong> — <?= esc($cmd['description']); ?>
                                    <br><small>Usage: <?= esc($cmd['usage']); ?><?= !empty($cmd['premium']) ? ' (Premium)' : ''; ?></small>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </section>

            <section class="mb-4">
                <h4>Learn more</h4>
                <ul>
                    <li><a href="<?= site_url('How-It-Works'); ?>">How It Works (web)</a></li>
                    <li><a href="<?= site_url('Support/Discord'); ?>">Discord onboarding (Support)</a></li>
                    <li><a href="<?= site_url('How-It-Works/Streaming'); ?>">Streaming with Twitch &amp; YouTube</a></li>
                </ul>
            </section>
        </div>
    </div>
</div>
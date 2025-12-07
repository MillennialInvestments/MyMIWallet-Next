<div class="container py-4">
    <h1 class="mb-3">Discord Onboarding</h1>
    <p class="lead">Start in <strong>#welcome-support</strong>, link your MyMI Wallet account, and use the commands below to explore alerts, budgets, and projects.</p>

    <section class="mb-4">
        <h4>New user path</h4>
        <ol>
            <li>Register your MyMI Wallet account.</li>
            <li>Run <code>/mymi link</code> in Discord and follow the link.</li>
            <li>Review pinned messages in #welcome-support for rules and channel guidance.</li>
            <li>Use the key commands to pull alerts, tickers, budgets, and news.</li>
        </ol>
        <p class="mb-1"><a href="<?= site_url('How-It-Works/Discord'); ?>">See how the Discord server works</a></p>
    </section>

    <section class="mb-4">
        <h4>Commands</h4>
        <?php $byCategory = []; foreach ($commands as $cmd) { $byCategory[$cmd['category']][] = $cmd; } ?>
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
        <h4>Onboarding steps</h4>
        <ul>
            <?php foreach ($onboardingSteps as $step): ?>
                <li>
                    <strong><?= esc($step['title']); ?></strong> — <?= esc($step['description']); ?>
                    <?php if (!empty($step['url'])): ?>
                        (<a href="<?= esc($step['url']); ?>" target="_blank" rel="noreferrer">Open</a>)
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>

    <section class="mb-4">
        <h4>Support tips</h4>
        <ul>
            <li>Ask questions in #welcome-support or open a thread with @Support.</li>
            <li>Use <code>/mymi support</code> to grab this link quickly.</li>
            <li>Check <a href="<?= site_url('How-It-Works'); ?>">How-It-Works</a> for budgeting, investments, assets, and projects.</li>
        </ul>
    </section>
</div>

<div class="container py-4">
    <div class="row">
        <div class="col-md-8">
            <h1 class="mb-3">Streaming with Twitch &amp; YouTube</h1>
            <p class="lead">Use <strong>#live-streams</strong> as the single hub for go-live announcements, replays, and MyMI-powered talking points.</p>

            <section class="mb-4">
                <h4>Announce and recap</h4>
                <ul>
                    <li>Post live links + schedule in #live-streams; pin the current session.</li>
                    <li>Keep alerts/DD in their home channels; link back when referenced on-air.</li>
                    <li>Drop replay links and short recaps after the session.</li>
                </ul>
            </section>

            <section class="mb-4">
                <h4>Bring MyMI data on-screen</h4>
                <ul>
                    <li>Use /mymi alerts, /mymi ticker, /mymi news, /mymi earnings during live Q&amp;A.</li>
                    <li>Reference budget/forecast or project updates and link to <a href="<?= site_url('Support/Discord'); ?>">Discord onboarding</a> for newcomers.</li>
                    <li>Coordinate with #marketing-news or #earnings-watch for pre-show prep.</li>
                </ul>
            </section>

            <section class="mb-4">
                <h4>Branding &amp; overlays</h4>
                <ul>
                    <li>Include MyMI logo + URL in OBS/Prism overlays.</li>
                    <li>Keep ticker callouts consistent with $TICKER notation used in Discord.</li>
                    <li>If displaying chat, limit to #live-streams to avoid noise.</li>
                </ul>
            </section>

            <section class="mb-4">
                <h4>Testing &amp; staging</h4>
                <ul>
                    <li>Use staging webhooks pointed at #staging-sandbox to rehearse stream announcements.</li>
                    <li>Validate any automation that pulls alerts/news into #live-streams before production.</li>
                </ul>
            </section>

            <p class="mb-0"><a href="<?= site_url('docs/discord/streaming_setup.md'); ?>" target="_blank" rel="noreferrer">Read the streaming setup quickstart</a></p>
        </div>
    </div>
</div>

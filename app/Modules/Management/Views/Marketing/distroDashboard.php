<!-- Manual Marketing Distribution Dashboard -->
<div class="container-fluid px-4 py-4" style="background: #090d16; min-height: 100vh; color: #f1f5f9; font-family: 'Inter', -apple-system, sans-serif;">

    <!-- TOP HEADER -->
    <div class="d-flex flex-wrap justify-content-between align-items-center pb-3 mb-4 border-bottom" style="border-color: rgba(255,255,255,0.08) !important;">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="badge" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); font-size: 11px; letter-spacing: 0.5px;">LIVE PIPELINE</span>
                <span class="text-secondary small">Connected to gq-ai01 • n8n active</span>
            </div>
            <h2 class="h3 fw-bold mb-0 text-white d-flex align-items-center gap-2">
                <span>🚀 Marketing Distro & Alert Engine</span>
            </h2>
            <p class="text-secondary mb-0 small">Unified Trade Alerts, Market News Ingest, 30–60s Shorts Scripts, Voiceover Synthesis & n8n Multi-Platform Distribution</p>
        </div>

        <!-- ACTION BUTTONS -->
        <div class="d-flex flex-wrap gap-2 mt-3 mt-md-0">
            <button id="btnFetchEmails" class="btn btn-outline-info btn-sm d-flex align-items-center gap-2 px-3 py-2" style="border-radius: 8px;">
                <span id="fetchSpinner" class="spinner-border spinner-border-sm d-none" role="status"></span>
                <span>🔄 Fetch Inbound Emails</span>
            </button>
            <button id="btnInjectAlert" class="btn btn-outline-success btn-sm d-flex align-items-center gap-2 px-3 py-2" style="border-radius: 8px;">
                <span>⚡ Inject $BA Alert</span>
            </button>
            <button id="btnInjectNews" class="btn btn-outline-warning btn-sm d-flex align-items-center gap-2 px-3 py-2" style="border-radius: 8px;">
                <span>📰 Inject Market News</span>
            </button>
        </div>
    </div>

    <!-- TELEMETRY & CONNECTIVITY STATUS BAR -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-md-3">
            <div class="p-3 rounded-3" style="background: #111827; border: 1px solid rgba(255,255,255,0.06);">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <span class="text-secondary small text-uppercase fw-semibold">Mailbox Ingress</span>
                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill">ONLINE</span>
                </div>
                <div class="fw-bold text-white small">alerts@mymiwallet.com</div>
                <div class="text-secondary" style="font-size: 11px;">news@mymiwallet.com • DreamHost IMAP</div>
            </div>
        </div>

        <div class="col-12 col-md-3">
            <div class="p-3 rounded-3" style="background: #111827; border: 1px solid rgba(255,255,255,0.06);">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <span class="text-secondary small text-uppercase fw-semibold">Discord Relay</span>
                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill">ACTIVE</span>
                </div>
                <div class="fw-bold text-white small">Liquidity Scans & #stock_news</div>
                <div class="text-secondary" style="font-size: 11px;">Direct Webhook & Queue Active</div>
            </div>
        </div>

        <div class="col-12 col-md-3">
            <div class="p-3 rounded-3" style="background: #111827; border: 1px solid rgba(255,255,255,0.06);">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <span class="text-secondary small text-uppercase fw-semibold">User Email Outbox</span>
                    <span class="badge bg-info-subtle text-info border border-info-subtle rounded-pill">READY</span>
                </div>
                <div class="fw-bold text-white small">Queued: <span id="telemetryQueuedEmails"><?= (int) ($telemetry['email_outbox']['queued'] ?? 0) ?></span> | Sent: <?= (int) ($telemetry['email_outbox']['sent'] ?? 0) ?></div>
                <div class="text-secondary" style="font-size: 11px;">bf_email_outbox • Subscriber queue</div>
            </div>
        </div>

        <div class="col-12 col-md-3">
            <div class="p-3 rounded-3" style="background: #111827; border: 1px solid rgba(255,255,255,0.06);">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <span class="text-secondary small text-uppercase fw-semibold">n8n Automation Node</span>
                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill">RUNNING</span>
                </div>
                <div class="fw-bold text-white small">tbi.greenqube.com/n8n/</div>
                <div class="text-secondary" style="font-size: 11px;">TikTok, Shorts, X, LinkedIn Dispatch</div>
            </div>
        </div>
    </div>

    <!-- MAIN TWO-COLUMN WORKSPACE -->
    <div class="row g-4">

        <!-- LEFT COLUMN: INBOUND STREAM & FEED (40%) -->
        <div class="col-12 col-lg-5">
            <div class="card bg-dark border-0 shadow-sm rounded-3 h-100" style="background: #111827 !important; border: 1px solid rgba(255,255,255,0.08) !important;">
                <div class="card-header bg-transparent py-3 border-bottom d-flex justify-content-between align-items-center" style="border-color: rgba(255,255,255,0.08) !important;">
                    <div>
                        <h5 class="card-title text-white mb-0 h6 fw-bold">📥 Inbound Trade Alerts & News</h5>
                        <small class="text-secondary">Click any item to load into the Multi-Platform Studio</small>
                    </div>
                    <span id="inboundCountBadge" class="badge bg-secondary"><?= count($inboundFeed ?? []) ?> items</span>
                </div>

                <!-- FEED FILTER PILLS -->
                <div class="p-2 border-bottom d-flex gap-1" style="border-color: rgba(255,255,255,0.06) !important; background: #0c1220;">
                    <button class="btn btn-xs btn-outline-secondary text-white border-0 active feed-filter-btn" data-filter="all">All</button>
                    <button class="btn btn-xs btn-outline-secondary text-white border-0 feed-filter-btn" data-filter="trade_alert">Trade Alerts</button>
                    <button class="btn btn-xs btn-outline-secondary text-white border-0 feed-filter-btn" data-filter="marketing_news">Market News</button>
                    <button class="btn btn-xs btn-outline-secondary text-white border-0 feed-filter-btn" data-filter="pending">Pending</button>
                </div>

                <!-- FEED LIST -->
                <div class="card-body p-2 overflow-auto" id="inboundFeedContainer" style="max-height: 750px;">
                    <?php if (empty($inboundFeed)): ?>
                        <div class="text-center py-5 text-secondary">
                            <p class="mb-2">No raw alert emails in queue.</p>
                            <button class="btn btn-sm btn-outline-success" onclick="document.getElementById('btnInjectAlert').click();">Inject Test Trade Alert</button>
                        </div>
                    <?php else: ?>
                        <?php foreach ($inboundFeed as $idx => $item): ?>
                            <?php
                                $isAlert = ($item['type'] ?? '') === 'trade_alert';
                                $ticker = $item['ticker'] ?: 'SPY';
                                $parsed = $item['parsed_trade'] ?? [];
                                $strategy = $parsed['strategy'] ?? ($isAlert ? 'STRANGLE' : 'NEWS');
                                $callStrike = $parsed['call_strike'] ?? null;
                                $putStrike = $parsed['put_strike'] ?? null;
                                $targetProfit = $parsed['target_profit'] ?? 200.0;
                            ?>
                            <div class="inbound-item p-3 mb-2 rounded-2 <?= $idx === 0 ? 'selected-feed-item' : '' ?>" 
                                 style="background: #182234; border: 1px solid rgba(255,255,255,0.06); cursor: pointer; transition: all 0.2s;"
                                 data-id="<?= (int) $item['id'] ?>"
                                 data-type="<?= esc($item['type']) ?>"
                                 data-ticker="<?= esc($ticker) ?>"
                                 data-headline="<?= esc($item['title']) ?>"
                                 data-strategy="<?= esc($strategy) ?>"
                                 data-call="<?= esc((string) $callStrike) ?>"
                                 data-put="<?= esc((string) $putStrike) ?>"
                                 data-profit="<?= esc((string) $targetProfit) ?>"
                                 data-note="<?= esc($item['content']) ?>"
                                 onclick="selectInboundItem(this)">
                                
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="badge fw-bold" style="background: <?= $isAlert ? '#10b981' : '#f59e0b' ?>; color: #000; font-size: 11px;">
                                            $<?= esc($ticker) ?>
                                        </span>
                                        <span class="badge bg-dark text-secondary border border-secondary-subtle" style="font-size: 10px;">
                                            <?= esc($strategy) ?>
                                        </span>
                                    </div>
                                    <span class="badge <?= ($item['status'] ?? '') === 'pending' ? 'bg-warning text-dark' : 'bg-success' ?>" style="font-size: 10px;">
                                        <?= esc($item['status'] ?? 'pending') ?>
                                    </span>
                                </div>

                                <div class="fw-semibold text-white small mb-1 text-truncate"><?= esc($item['title']) ?></div>

                                <?php if ($isAlert && ($callStrike || $putStrike)): ?>
                                    <div class="small text-secondary mb-1" style="font-size: 11px;">
                                        Strikes: <span class="text-info"><?= $callStrike ? '$' . $callStrike . 'C' : '' ?></span> / <span class="text-danger"><?= $putStrike ? '$' . $putStrike . 'P' : '' ?></span>
                                        • Target: <span class="text-success">+<?= '$' . number_format((float) $targetProfit, 2) ?></span>
                                    </div>
                                <?php endif; ?>

                                <div class="d-flex justify-content-between align-items-center mt-2 pt-1 border-top" style="border-color: rgba(255,255,255,0.04) !important;">
                                    <span class="text-secondary" style="font-size: 10px;">
                                        <?= esc($item['mailbox'] ?? 'alerts@mymiwallet.com') ?> • <?= esc(substr($item['date_scraped'] ?? '', 5, 11)) ?>
                                    </span>
                                    <button class="btn btn-xs btn-outline-primary py-0 px-2 text-white" style="font-size: 10px;" onclick="event.stopPropagation(); triggerGenerateForId(<?= (int) $item['id'] ?>);">
                                        ⚡ Generate
                                    </button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- RIGHT COLUMN: MULTI-PLATFORM STUDIO & DISTRO CONTROL DECK (60%) -->
        <div class="col-12 col-lg-7">
            <div class="card bg-dark border-0 shadow-sm rounded-3" style="background: #111827 !important; border: 1px solid rgba(255,255,255,0.08) !important;">
                
                <!-- STUDIO HEADER -->
                <div class="card-header bg-transparent py-3 border-bottom d-flex flex-wrap justify-content-between align-items-center" style="border-color: rgba(255,255,255,0.08) !important;">
                    <div>
                        <span class="text-secondary small text-uppercase fw-bold">Active Content Studio</span>
                        <h4 class="h5 fw-bold text-white mb-0 d-flex align-items-center gap-2">
                            <span id="activeTickerDisplay">$BA</span>
                            <span id="activeStrategyBadge" class="badge bg-success text-dark" style="font-size: 11px;">STRANGLE</span>
                        </h4>
                    </div>
                    <div class="d-flex gap-2 mt-2 mt-sm-0">
                        <button id="btnGenerateStudio" class="btn btn-sm btn-primary d-flex align-items-center gap-2 px-3" style="background: linear-gradient(135deg, #0ea5e9 0%, #10b981 100%); border: 0;">
                            <span id="genSpinner" class="spinner-border spinner-border-sm d-none"></span>
                            <span>⚡ Generate Fresh Package</span>
                        </button>
                    </div>
                </div>

                <!-- STUDIO TABS -->
                <ul class="nav nav-tabs px-3 pt-2 border-bottom" id="studioTabs" style="border-color: rgba(255,255,255,0.08) !important; background: #0c1220;">
                    <li class="nav-item">
                        <a class="nav-link active text-white" data-bs-toggle="tab" href="#tabShorts">🎬 TikTok / YouTube Shorts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" data-bs-toggle="tab" href="#tabVoiceover">🎙️ Audio Voiceover</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" data-bs-toggle="tab" href="#tabDiscord">💬 Discord Embed</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" data-bs-toggle="tab" href="#tabEmail">📧 Email Blast</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" data-bs-toggle="tab" href="#tabSocial">🌐 X & LinkedIn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" data-bs-toggle="tab" href="#tabN8n">⚡ n8n Webhook</a>
                    </li>
                </ul>

                <!-- TAB CONTENTS -->
                <div class="card-body p-4 tab-content">

                    <!-- TAB 1: TIKTOK / YOUTUBE SHORTS (30-60s) -->
                    <div class="tab-pane fade show active" id="tabShorts">
                        <div class="mb-3">
                            <label class="form-label text-secondary small fw-semibold text-uppercase">0–3s High-Retention Hook</label>
                            <input type="text" id="videoHook" class="form-control form-control-sm bg-dark text-white border-secondary" value="Why is everyone watching $BA right now? Here's the options breakout setup you need to know.">
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-secondary small fw-semibold text-uppercase">3-Beat Visual Scene Plan & Camera Cues</label>
                            <div class="row g-2">
                                <div class="col-12 col-md-4">
                                    <div class="p-2 rounded bg-black border border-secondary-subtle">
                                        <div class="text-success small fw-bold mb-1">Beat 1 (0–12s)</div>
                                        <textarea id="videoBeat1" class="form-control form-control-sm bg-transparent text-white border-0 p-0" rows="3" style="font-size: 12px;">Screen showing $BA trading around $187.53. Heavy institutional momentum signaling breakout.</textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="p-2 rounded bg-black border border-secondary-subtle">
                                        <div class="text-info small fw-bold mb-1">Beat 2 (12–25s)</div>
                                        <textarea id="videoBeat2" class="form-control form-control-sm bg-transparent text-white border-0 p-0" rows="3" style="font-size: 12px;">Our weekly options scanner flagged the STRANGLE: $192.50 Call and $182.50 Put for +$200 net target profit.</textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="p-2 rounded bg-black border border-secondary-subtle">
                                        <div class="text-warning small fw-bold mb-1">Beat 3 (25–40s)</div>
                                        <textarea id="videoBeat3" class="form-control form-control-sm bg-transparent text-white border-0 p-0" rows="3" style="font-size: 12px;">Close-up of asymmetric profit curve. Volatility expansion locks in defined upside.</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <label class="form-label text-secondary small fw-semibold text-uppercase mb-0">Spoken Narration Script (~35–45s)</label>
                                <span id="narrationMetrics" class="badge bg-secondary" style="font-size: 11px;">92 words ~ 36s</span>
                            </div>
                            <textarea id="videoNarration" class="form-control bg-dark text-white border-secondary" rows="4" style="line-height: 1.5;" oninput="updateScriptMetrics(this.value);">Attention traders, $BA Boeing is setting up for a massive weekly options breakout. With the stock holding near 187 dollars, our algorithm just flagged a two-sided strangle targeting 192.50 calls and 182.50 puts. We are shooting for a target profit of plus 200 dollars on the position. Keep your risk strictly defined, and track this trade live in MyMI Wallet.</textarea>
                        </div>

                        <div class="row g-3 mb-2">
                            <div class="col-12 col-md-6">
                                <label class="form-label text-secondary small fw-semibold text-uppercase">Spoken CTA</label>
                                <input type="text" id="videoCta" class="form-control form-control-sm bg-dark text-white border-secondary" value="Tap the link in bio to track this $BA setup and get free trade alerts on MyMIWallet.com.">
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label text-secondary small fw-semibold text-uppercase">Captions & Hashtags</label>
                                <input type="text" id="videoHashtags" class="form-control form-control-sm bg-dark text-white border-secondary" value="#BA #options #trading #stockmarket #investing #mymiwallet #stocks">
                            </div>
                        </div>
                    </div>

                    <!-- TAB 2: AUDIO VOICEOVER SYNTHESIS -->
                    <div class="tab-pane fade" id="tabVoiceover">
                        <div class="p-3 rounded-3 mb-3" style="background: #0c1220; border: 1px solid rgba(255,255,255,0.06);">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div class="fw-bold text-white">🎙️ AI Narrator Audio Synthesis</div>
                                <button id="btnSynthesizeAudio" class="btn btn-sm btn-outline-info d-flex align-items-center gap-2">
                                    <span id="audioSpinner" class="spinner-border spinner-border-sm d-none"></span>
                                    <span>Synthesize Audio MP3</span>
                                </button>
                            </div>
                            <p class="text-secondary small mb-3">Converts the 30–60s video narration script into broadcast MP3 audio, stored in <code>public/uploads/audio/voiceovers/</code> for automated video rendering and distribution.</p>

                            <!-- AUDIO PLAYER -->
                            <div class="p-3 rounded bg-black border border-secondary-subtle mb-3">
                                <div class="text-secondary small mb-1">Preview Audio Track:</div>
                                <audio id="voiceoverAudioPlayer" controls class="w-100" style="outline: none;">
                                    <source id="voiceoverAudioSource" src="/uploads/audio/voiceovers/test_local.mp3" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>

                            <div class="row g-2 small text-secondary">
                                <div class="col-4">File: <span id="voFilePath" class="text-white">vo_ba_breakout.mp3</span></div>
                                <div class="col-4">Estimated Duration: <span id="voDuration" class="text-white">18.2s</span></div>
                                <div class="col-4 text-end"><a id="voDownloadLink" href="/uploads/audio/voiceovers/test_local.mp3" download class="text-info text-decoration-none">⬇️ Download MP3</a></div>
                            </div>
                        </div>
                    </div>

                    <!-- TAB 3: DISCORD RICH EMBED PREVIEW -->
                    <div class="tab-pane fade" id="tabDiscord">
                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center gap-2">
                                <label class="form-label text-secondary small fw-semibold text-uppercase mb-0">Target Channel:</label>
                                <select id="discordChannelSelect" class="form-select form-select-sm bg-dark text-white border-secondary w-auto">
                                    <option value="stock_news">#stock_news</option>
                                    <option value="financial_news">#financial_news</option>
                                    <option value="announcements">#announcements</option>
                                    <option value="mymi_news">#mymi_news</option>
                                </select>
                            </div>
                            <button id="btnSendDiscordSingle" class="btn btn-sm btn-outline-success">🚀 Send to Discord Now</button>
                        </div>

                        <!-- DISCORD EMBED MOCKUP -->
                        <div class="p-3 rounded-2" style="background: #2b2d31; border-left: 4px solid #10b981; max-width: 550px; font-family: 'gg sans', 'Noto Sans', sans-serif;">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <img src="/assets/images/logo-icon.png" onerror="this.src='https://cdn.discordapp.com/embed/avatars/0.png'" width="20" height="20" class="rounded-circle">
                                <span class="fw-bold text-white small" style="font-size: 13px;">MyMI Wallet Market Bot</span>
                                <span class="badge bg-primary" style="font-size: 9px; padding: 2px 4px;">BOT</span>
                            </div>
                            <div id="discordTitlePreview" class="fw-bold text-white mb-2" style="font-size: 15px;">🚨 Trade Alert: $BA — Weekly Strangle (5 DTE)</div>
                            <div id="discordDescPreview" class="text-secondary small mb-3" style="color: #dbdee1 !important; font-size: 13px;">A high-probability weekly options momentum setup has been flagged on $BA.</div>

                            <div class="row g-2 mb-3">
                                <div class="col-4">
                                    <div class="text-secondary small" style="font-size: 11px;">Ticker</div>
                                    <div id="discordFieldTicker" class="fw-bold text-white small">$BA</div>
                                </div>
                                <div class="col-4">
                                    <div class="text-secondary small" style="font-size: 11px;">Strategy</div>
                                    <div id="discordFieldStrategy" class="fw-bold text-white small">STRANGLE</div>
                                </div>
                                <div class="col-4">
                                    <div class="text-secondary small" style="font-size: 11px;">Spot Price</div>
                                    <div id="discordFieldSpot" class="fw-bold text-white small">$187.53</div>
                                </div>
                                <div class="col-4">
                                    <div class="text-secondary small" style="font-size: 11px;">Call Strike</div>
                                    <div id="discordFieldCall" class="fw-bold text-white small">$192.50</div>
                                </div>
                                <div class="col-4">
                                    <div class="text-secondary small" style="font-size: 11px;">Put Strike</div>
                                    <div id="discordFieldPut" class="fw-bold text-white small">$182.50</div>
                                </div>
                                <div class="col-4">
                                    <div class="text-secondary small" style="font-size: 11px;">Target Profit</div>
                                    <div id="discordFieldProfit" class="fw-bold text-success small">+$200.00 Net</div>
                                </div>
                            </div>

                            <div class="pt-2 border-top border-secondary text-secondary" style="font-size: 10px;">
                                MyMI Wallet Market Intelligence • Powered by GreenQube AI
                            </div>
                        </div>
                    </div>

                    <!-- TAB 4: SUBSCRIBER EMAIL BLAST -->
                    <div class="tab-pane fade" id="tabEmail">
                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <label class="form-label text-secondary small fw-semibold text-uppercase mb-0">Email Subject Line</label>
                            <button id="btnQueueEmailSingle" class="btn btn-sm btn-outline-info">📬 Queue to Subscriber Outbox</button>
                        </div>
                        <input type="text" id="emailSubjectInput" class="form-control form-control-sm bg-dark text-white border-secondary mb-3" value="🚨 [TRADE ALERT] $BA: Weekly Strangle Breakout Signal">

                        <div class="p-3 rounded-2 bg-black border border-secondary" style="max-height: 420px; overflow-y: auto;">
                            <div id="emailHtmlContainer">
                                <!-- Renders live HTML newsletter -->
                            </div>
                        </div>
                    </div>

                    <!-- TAB 5: X (TWITTER) & LINKEDIN -->
                    <div class="tab-pane fade" id="tabSocial">
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <label class="form-label text-secondary small fw-semibold text-uppercase mb-0">X (Twitter) Post</label>
                                <span id="xCharCounter" class="badge bg-secondary">210 / 280</span>
                            </div>
                            <textarea id="xPostText" class="form-control bg-dark text-white border-secondary" rows="3" oninput="document.getElementById('xCharCounter').innerText = this.value.length + ' / 280';">🚨 $BA Alert: STRANGLE ($192.50C / $182.50P)
Underlier: $187.53 | Target: +$200.00
Unusual options momentum detected on Boeing.
Track free: mymiwallet.com #options #stocks #investing</textarea>
                        </div>

                        <div>
                            <label class="form-label text-secondary small fw-semibold text-uppercase mb-1">LinkedIn Institutional Brief</label>
                            <textarea id="linkedinPostText" class="form-control bg-dark text-white border-secondary" rows="6">Market Intelligence Update: $BA

Our automated momentum scanner has identified an asymmetric weekly setup on $BA.

Key Parameters:
• Structure: STRANGLE
• Strikes: $192.50 Call | $182.50 Put
• Target Profit: +$200.00
• Underlier Context: $187.53

Thesis & Catalyst:
Unusual options volume detected. Delta Air Lines expansion catalyst driving aerospace sector momentum.

Disciplined risk management remains paramount in high-volatility environments. Explore our real-time options analytics and free financial tracking tools at MyMIWallet.com.

#Finance #Trading #OptionsTrading #RiskManagement #MyMIWallet #Markets</textarea>
                        </div>
                    </div>

                    <!-- TAB 6: N8N WEBHOOK PAYLOAD -->
                    <div class="tab-pane fade" id="tabN8n">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="text-secondary small">Dispatches structured JSON to <code>POST https://tbi.greenqube.com/n8n/webhook/mymi-marketing-distro</code></div>
                            <button id="btnDispatchN8nSingle" class="btn btn-sm btn-outline-warning">⚡ Fire n8n Webhook</button>
                        </div>
                        <pre id="n8nPayloadViewer" class="p-3 rounded bg-black text-info small" style="max-height: 400px; overflow-y: auto; font-family: monospace;"></pre>
                    </div>

                </div>

                <!-- MASTER DISTRIBUTION DECK (BOTTOM ACTION BAR) -->
                <div class="card-footer bg-transparent p-3 border-top d-flex flex-wrap justify-content-between align-items-center" style="border-color: rgba(255,255,255,0.08) !important; background: #0c1220;">
                    
                    <!-- DESTINATIONS SELECTOR -->
                    <div class="d-flex align-items-center gap-3">
                        <span class="text-secondary small fw-semibold text-uppercase">Distribute To:</span>
                        <div class="form-check form-check-inline mb-0">
                            <input class="form-check-input" type="checkbox" id="chkDiscord" value="discord" checked>
                            <label class="form-check-label text-white small" for="chkDiscord">Discord</label>
                        </div>
                        <div class="form-check form-check-inline mb-0">
                            <input class="form-check-input" type="checkbox" id="chkEmail" value="email" checked>
                            <label class="form-check-label text-white small" for="chkEmail">User Emails</label>
                        </div>
                        <div class="form-check form-check-inline mb-0">
                            <input class="form-check-input" type="checkbox" id="chkN8n" value="n8n" checked>
                            <label class="form-check-label text-white small" for="chkN8n">n8n (Socials & Shorts)</label>
                        </div>
                    </div>

                    <!-- BIG APPROVE & DISTRIBUTE BUTTON -->
                    <div class="d-flex align-items-center gap-2 mt-2 mt-sm-0">
                        <input type="hidden" id="currentGeneratedId" value="0">
                        <input type="hidden" id="currentTempId" value="<?= ! empty($inboundFeed[0]['id']) ? (int) $inboundFeed[0]['id'] : 0 ?>">
                        
                        <button id="btnApproveDistribute" class="btn btn-success fw-bold px-4 py-2 d-flex align-items-center gap-2" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); border: 0; box-shadow: 0 4px 14px rgba(16,185,129,0.35);">
                            <span id="distroSpinner" class="spinner-border spinner-border-sm d-none"></span>
                            <span>🚀 Approve & Distribute All</span>
                        </button>
                    </div>
                </div>

            </div>

            <!-- DISPATCH STATUS CONSOLE -->
            <div id="dispatchResultCard" class="card bg-dark border-0 mt-3 d-none" style="background: #111827 !important; border: 1px solid rgba(255,255,255,0.08) !important;">
                <div class="card-body p-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="text-success fw-bold small">✅ Live Distribution Complete</span>
                        <span id="dispatchTimestamp" class="text-secondary" style="font-size: 11px;"></span>
                    </div>
                    <div id="dispatchSummaryContent" class="small text-secondary"></div>
                </div>
            </div>
        </div>

    </div>

</div>

<!-- SCRIPT LOGIC FOR MANUAL DISTRO DASHBOARD -->
<script <?= $nonce['script'] ?? '' ?>>
let activeItemData = {
    temp_id: <?= ! empty($inboundFeed[0]['id']) ? (int) $inboundFeed[0]['id'] : 0 ?>,
    ticker: "<?= ! empty($inboundFeed[0]['ticker']) ? esc($inboundFeed[0]['ticker']) : 'BA' ?>",
    type: "<?= ! empty($inboundFeed[0]['type']) ? esc($inboundFeed[0]['type']) : 'trade_alert' ?>",
    headline: "<?= ! empty($inboundFeed[0]['title']) ? esc($inboundFeed[0]['title']) : 'Boeing Weekly Strangle Signal Alert' ?>",
    strategy: "STRANGLE",
    call_strike: "192.50",
    put_strike: "182.50",
    underlier_price: "187.53",
    target_profit: "200.00",
    note: "Heavy options momentum detected. Asymmetric breakout setup."
};

document.addEventListener('DOMContentLoaded', function() {
    // Generate initial package if empty
    triggerGenerateForActive();

    // Fetch Inbound Emails Button
    document.getElementById('btnFetchEmails').addEventListener('click', function() {
        const btn = this;
        const spinner = document.getElementById('fetchSpinner');
        btn.disabled = true;
        spinner.classList.remove('d-none');

        fetch('/API/Marketing/Distro/fetch', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
            body: 'mailbox=all&limit=20'
        })
        .then(r => r.json())
        .then(res => {
            btn.disabled = false;
            spinner.classList.add('d-none');
            alert(`Emails fetched!\nScanned: ${res.total_scanned || 0}\nStored: ${res.total_new_stored || 0}\nDuplicates: ${res.total_duplicates || 0}`);
            location.reload();
        })
        .catch(err => {
            btn.disabled = false;
            spinner.classList.add('d-none');
            alert('Error fetching emails: ' + err.message);
        });
    });

    // Inject $BA Alert
    document.getElementById('btnInjectAlert').addEventListener('click', function() {
        fetch('/API/Marketing/Distro/injectSample', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
            body: 'type=trade_alert&symbol=BA'
        })
        .then(r => r.json())
        .then(res => {
            location.reload();
        });
    });

    // Inject Market News
    document.getElementById('btnInjectNews').addEventListener('click', function() {
        fetch('/API/Marketing/Distro/injectSample', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
            body: 'type=marketing_news&symbol=SPY'
        })
        .then(r => r.json())
        .then(res => {
            location.reload();
        });
    });

    // Generate Package Button
    document.getElementById('btnGenerateStudio').addEventListener('click', function() {
        triggerGenerateForActive();
    });

    // Synthesize Voiceover Audio
    document.getElementById('btnSynthesizeAudio').addEventListener('click', function() {
        const script = document.getElementById('videoNarration').value;
        const ticker = activeItemData.ticker || 'BA';
        const spinner = document.getElementById('audioSpinner');
        this.disabled = true;
        spinner.classList.remove('d-none');

        fetch('/API/Marketing/Distro/voiceover', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
            body: `script=${encodeURIComponent(script)}&ticker=${encodeURIComponent(ticker)}`
        })
        .then(r => r.json())
        .then(res => {
            this.disabled = false;
            spinner.classList.add('d-none');
            if (res.success && res.file_url) {
                const player = document.getElementById('voiceoverAudioPlayer');
                const src = document.getElementById('voiceoverAudioSource');
                src.src = res.file_url;
                player.load();
                player.play().catch(() => {});
                document.getElementById('voFilePath').innerText = res.file_url.split('/').pop();
                document.getElementById('voDuration').innerText = res.duration_est + 's';
                document.getElementById('voDownloadLink').href = res.file_url;
            } else {
                alert('Audio synthesis notice: ' + (res.error || 'Failed'));
            }
        })
        .catch(err => {
            this.disabled = false;
            spinner.classList.add('d-none');
            alert('Voiceover error: ' + err.message);
        });
    });

    // Master Distribute Button
    document.getElementById('btnApproveDistribute').addEventListener('click', function() {
        const genId = parseInt(document.getElementById('currentGeneratedId').value, 10);
        if (!genId || genId < 1) {
            alert('Please generate the content package first before distributing.');
            return;
        }

        const destinations = [];
        if (document.getElementById('chkDiscord').checked) destinations.push('discord');
        if (document.getElementById('chkEmail').checked) destinations.push('email');
        if (document.getElementById('chkN8n').checked) destinations.push('n8n');

        if (destinations.length === 0) {
            alert('Select at least one destination (Discord, Email, or n8n).');
            return;
        }

        const btn = this;
        const spinner = document.getElementById('distroSpinner');
        btn.disabled = true;
        spinner.classList.remove('d-none');

        const params = new URLSearchParams();
        params.append('generated_content_id', genId);
        destinations.forEach(d => params.append('destinations[]', d));

        fetch('/API/Marketing/Distro/distribute', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
            body: params.toString()
        })
        .then(r => r.json())
        .then(res => {
            btn.disabled = false;
            spinner.classList.add('d-none');

            const card = document.getElementById('dispatchResultCard');
            card.classList.remove('d-none');
            document.getElementById('dispatchTimestamp').innerText = res.dispatched_at || '';

            let details = '<ul class="mb-0 ps-3">';
            if (res.destinations.discord) {
                const d = res.destinations.discord;
                details += `<li><strong>Discord:</strong> ${d.success ? '✅ Sent' : '❌ ' + (d.error || 'Failed')} (${d.method || 'webhook'})</li>`;
            }
            if (res.destinations.email) {
                const e = res.destinations.email;
                details += `<li><strong>User Emails:</strong> ${e.success ? '✅ ' + e.queued_count + ' Queued in Outbox' : '❌ Failed'}</li>`;
            }
            if (res.destinations.n8n) {
                const n = res.destinations.n8n;
                details += `<li><strong>n8n Webhook:</strong> ${n.success ? '✅ Dispatched to ' + n.endpoint : '❌ ' + (n.error || 'Failed')}</li>`;
            }
            details += '</ul>';
            document.getElementById('dispatchSummaryContent').innerHTML = details;
        })
        .catch(err => {
            btn.disabled = false;
            spinner.classList.add('d-none');
            alert('Distribution failed: ' + err.message);
        });
    });

    // Send Discord Single
    document.getElementById('btnSendDiscordSingle').addEventListener('click', function() {
        document.getElementById('chkDiscord').checked = true;
        document.getElementById('chkEmail').checked = false;
        document.getElementById('chkN8n').checked = false;
        document.getElementById('btnApproveDistribute').click();
    });

    // Queue Email Single
    document.getElementById('btnQueueEmailSingle').addEventListener('click', function() {
        document.getElementById('chkDiscord').checked = false;
        document.getElementById('chkEmail').checked = true;
        document.getElementById('chkN8n').checked = false;
        document.getElementById('btnApproveDistribute').click();
    });

    // Dispatch n8n Single
    document.getElementById('btnDispatchN8nSingle').addEventListener('click', function() {
        document.getElementById('chkDiscord').checked = false;
        document.getElementById('chkEmail').checked = false;
        document.getElementById('chkN8n').checked = true;
        document.getElementById('btnApproveDistribute').click();
    });
});

function selectInboundItem(el) {
    document.querySelectorAll('.inbound-item').forEach(i => i.classList.remove('selected-feed-item'));
    el.classList.add('selected-feed-item');

    activeItemData = {
        temp_id: el.getAttribute('data-id'),
        ticker: el.getAttribute('data-ticker'),
        type: el.getAttribute('data-type'),
        headline: el.getAttribute('data-headline'),
        strategy: el.getAttribute('data-strategy'),
        call_strike: el.getAttribute('data-call'),
        put_strike: el.getAttribute('data-put'),
        target_profit: el.getAttribute('data-profit'),
        note: el.getAttribute('data-note')
    };

    document.getElementById('currentTempId').value = activeItemData.temp_id;
    document.getElementById('activeTickerDisplay').innerText = '$' + activeItemData.ticker;
    document.getElementById('activeStrategyBadge').innerText = activeItemData.strategy;

    triggerGenerateForActive();
}

function triggerGenerateForId(id) {
    const el = document.querySelector(`.inbound-item[data-id="${id}"]`);
    if (el) selectInboundItem(el);
}

function triggerGenerateForActive() {
    const spinner = document.getElementById('genSpinner');
    const btn = document.getElementById('btnGenerateStudio');
    btn.disabled = true;
    spinner.classList.remove('d-none');

    const params = new URLSearchParams();
    if (activeItemData.temp_id) params.append('temp_id', activeItemData.temp_id);
    params.append('ticker', activeItemData.ticker);
    params.append('type', activeItemData.type);
    params.append('headline', activeItemData.headline);
    params.append('strategy', activeItemData.strategy);
    params.append('call_strike', activeItemData.call_strike);
    params.append('put_strike', activeItemData.put_strike);
    params.append('underlier_price', activeItemData.underlier_price);
    params.append('target_profit', activeItemData.target_profit);
    params.append('note', activeItemData.note);

    fetch('/API/Marketing/Distro/generate', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded', 'X-Requested-With': 'XMLHttpRequest'},
        body: params.toString()
    })
    .then(r => r.json())
    .then(res => {
        btn.disabled = false;
        spinner.classList.add('d-none');

        if (res.status === 'success') {
            document.getElementById('currentGeneratedId').value = res.generated_content_id;

            // Update Shorts fields
            if (res.video) {
                document.getElementById('videoHook').value = res.video.hook || '';
                if (res.video.visual_beats) {
                    document.getElementById('videoBeat1').value = res.video.visual_beats[0] || '';
                    document.getElementById('videoBeat2').value = res.video.visual_beats[1] || '';
                    document.getElementById('videoBeat3').value = res.video.visual_beats[2] || '';
                }
                document.getElementById('videoNarration').value = res.video.narration_script || '';
                document.getElementById('videoCta').value = res.video.spoken_cta || '';
                document.getElementById('videoHashtags').value = res.video.hashtags || '';
                updateScriptMetrics(res.video.narration_script || '');
            }

            // Update Voiceover
            if (res.voiceover && res.voiceover.file_url) {
                const player = document.getElementById('voiceoverAudioPlayer');
                const src = document.getElementById('voiceoverAudioSource');
                src.src = res.voiceover.file_url;
                player.load();
                document.getElementById('voFilePath').innerText = res.voiceover.file_url.split('/').pop();
                document.getElementById('voDuration').innerText = res.voiceover.duration_est + 's';
                document.getElementById('voDownloadLink').href = res.voiceover.file_url;
            }

            // Update Discord Mockup
            if (res.discord) {
                document.getElementById('discordTitlePreview').innerText = res.discord.title || '';
                document.getElementById('discordDescPreview').innerText = res.discord.description || '';
                document.getElementById('discordFieldTicker').innerText = '$' + res.ticker;
                document.getElementById('discordFieldStrategy').innerText = activeItemData.strategy;
                document.getElementById('discordFieldSpot').innerText = '$' + activeItemData.underlier_price;
                document.getElementById('discordFieldCall').innerText = activeItemData.call_strike ? '$' + activeItemData.call_strike : 'N/A';
                document.getElementById('discordFieldPut').innerText = activeItemData.put_strike ? '$' + activeItemData.put_strike : 'N/A';
                document.getElementById('discordFieldProfit').innerText = '+$' + activeItemData.target_profit + ' Net';
            }

            // Update Email Mockup
            if (res.email) {
                document.getElementById('emailSubjectInput').value = res.email.subject || '';
                document.getElementById('emailHtmlContainer').innerHTML = res.email.html || '';
            }

            // Update Social Posts
            if (res.social) {
                document.getElementById('xPostText').value = res.social.x_twitter || '';
                document.getElementById('xCharCounter').innerText = (res.social.x_twitter ? res.social.x_twitter.length : 0) + ' / 280';
                document.getElementById('linkedinPostText').value = res.social.linkedin || '';
            }

            // Update n8n Payload Preview
            if (res.n8n_payload) {
                document.getElementById('n8nPayloadViewer').innerText = JSON.stringify(res.n8n_payload, null, 2);
            }
        }
    })
    .catch(err => {
        btn.disabled = false;
        spinner.classList.add('d-none');
        console.error('Package generation error:', err);
    });
}

function updateScriptMetrics(text) {
    const words = text.trim() ? text.trim().split(/\s+/).length : 0;
    const estSec = Math.round(words / 2.5); // ~150 words per minute => 2.5 words/sec
    document.getElementById('narrationMetrics').innerText = `${words} words ~ ${estSec}s`;
}
</script>

<style>
.selected-feed-item {
    border-color: #10b981 !important;
    background: #1c2b42 !important;
    box-shadow: 0 0 12px rgba(16,185,129,0.15);
}
.inbound-item:hover {
    border-color: rgba(255,255,255,0.2) !important;
}
.nav-tabs .nav-link {
    border: none !important;
    border-bottom: 2px solid transparent !important;
    font-size: 13px;
    padding: 8px 16px;
}
.nav-tabs .nav-link.active {
    color: #10b981 !important;
    border-bottom: 2px solid #10b981 !important;
    background: transparent !important;
}
</style>

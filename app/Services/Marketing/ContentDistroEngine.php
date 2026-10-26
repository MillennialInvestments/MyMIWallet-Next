<?php

declare(strict_types=1);

namespace App\Services\Marketing;

use App\Libraries\MyMIDiscord;
use App\Models\Marketing\MarketingVideoAssetModel;
use App\Models\Marketing\MarketingVideoContentModel;
use App\Models\MarketingDistributionTargetModel;
use App\Models\MarketingModel;
use Config\Database;
use Config\MarketingDistribution;
use GuzzleHttp\Client;

class ContentDistroEngine
{
    private VoiceoverService $voiceoverService;
    private MarketingVideoContentModel $videoModel;
    private MarketingVideoAssetModel $videoAssetModel;
    private MarketingDistributionTargetModel $targetModel;
    private MarketingDistribution $distroConfig;
    private MyMIDiscord $discord;
    private Client $httpClient;
    private $db;

    public function __construct(
        ?VoiceoverService $voiceoverService = null,
        ?MarketingVideoContentModel $videoModel = null,
        ?MarketingVideoAssetModel $videoAssetModel = null,
        ?MarketingDistributionTargetModel $targetModel = null,
        ?MarketingDistribution $distroConfig = null,
        ?MyMIDiscord $discord = null,
        ?Client $httpClient = null
    ) {
        $this->voiceoverService = $voiceoverService ?? new VoiceoverService();
        $this->videoModel = $videoModel ?? new MarketingVideoContentModel();
        $this->videoAssetModel = $videoAssetModel ?? new MarketingVideoAssetModel();
        $this->targetModel = $targetModel ?? new MarketingDistributionTargetModel();
        $this->distroConfig = $distroConfig ?? config('MarketingDistribution');
        $this->discord = $discord ?? new MyMIDiscord();
        $this->httpClient = $httpClient ?? new Client(['timeout' => 12]);
        $this->db = Database::connect();
    }

    /**
     * Generate the complete multi-platform package for a raw or temp intake item.
     *
     * @param array<string, mixed> $input
     * @return array<string, mixed>
     */
    public function generatePackage(array $input): array
    {
        $ticker = strtoupper(trim((string) ($input['ticker'] ?? 'SPY')));
        $type = (string) ($input['type'] ?? 'trade_alert');
        $headline = trim((string) ($input['headline'] ?? $input['title'] ?? "{$ticker} Market Movement Alert"));
        $strategy = strtoupper(trim((string) ($input['strategy'] ?? 'STRANGLE')));
        $callStrike = isset($input['call_strike']) && $input['call_strike'] !== '' ? (float) $input['call_strike'] : null;
        $putStrike = isset($input['put_strike']) && $input['put_strike'] !== '' ? (float) $input['put_strike'] : null;
        $underlierPrice = isset($input['underlier_price']) && $input['underlier_price'] !== '' ? (float) $input['underlier_price'] : null;
        $targetProfit = isset($input['target_profit']) && $input['target_profit'] !== '' ? (float) $input['target_profit'] : 200.0;
        $note = trim((string) ($input['note'] ?? $input['content'] ?? 'High volume momentum and catalyst alert.'));
        $sourceId = isset($input['source_id']) ? (int) $input['source_id'] : null;

        // 1. TikTok & YouTube Shorts Video Script
        $videoData = $this->buildVideoScript($ticker, $type, $headline, $strategy, $callStrike, $putStrike, $underlierPrice, $targetProfit, $note);

        // 2. Audio Voiceover Synthesis
        $voiceover = $this->voiceoverService->generate($videoData['narration_script'], 'vo_' . strtolower($ticker) . '_' . date('Ymd_His'));
        $videoData['voiceover'] = $voiceover;

        // 3. Discord Rich Embed
        $discordEmbed = $this->buildDiscordEmbed($ticker, $type, $headline, $strategy, $callStrike, $putStrike, $underlierPrice, $targetProfit, $note);

        // 4. Subscriber HTML Email Blast
        $emailBlast = $this->buildEmailBlast($ticker, $type, $headline, $strategy, $callStrike, $putStrike, $underlierPrice, $targetProfit, $note);

        // 5. Social Posts (X / Twitter & LinkedIn)
        $socialPosts = $this->buildSocialPosts($ticker, $type, $headline, $strategy, $callStrike, $putStrike, $underlierPrice, $targetProfit, $note);

        // 6. Canonical n8n Payload
        $n8nPayload = [
            'event' => 'mymi_marketing_distro',
            'timestamp' => date('c'),
            'content_type' => $type,
            'ticker' => $ticker,
            'title' => $headline,
            'video_package' => [
                'platform' => 'tiktok_and_youtube_shorts',
                'hook' => $videoData['hook'],
                'visual_beats' => $videoData['visual_beats'],
                'overlay_text' => $videoData['overlay_text'],
                'narration_script' => $videoData['narration_script'],
                'spoken_cta' => $videoData['spoken_cta'],
                'caption' => $videoData['caption'],
                'hashtags' => $videoData['hashtags'],
                'voiceover_url' => $voiceover['file_url'] ?? null,
                'duration_est' => $voiceover['duration_est'] ?? 35.0,
            ],
            'social_copies' => [
                'x_twitter' => $socialPosts['x_twitter'],
                'linkedin' => $socialPosts['linkedin'],
            ],
            'discord_embed' => $discordEmbed,
            'email_blast' => [
                'subject' => $emailBlast['subject'],
                'html' => $emailBlast['html'],
            ],
            'distribution_targets' => ['tiktok', 'youtube_shorts', 'x', 'linkedin', 'discord', 'email'],
            'metadata' => [
                'source_id' => $sourceId,
                'strategy' => $strategy,
                'call_strike' => $callStrike,
                'put_strike' => $putStrike,
                'target_profit' => $targetProfit,
            ],
        ];

        // 7. Persist to Database Tables
        $videoRecordId = $this->persistVideoContent($videoData, $ticker, $sourceId);
        if ($videoRecordId > 0 && ! empty($voiceover['file_url'])) {
            $this->persistVideoAsset($videoRecordId, $voiceover);
        }

        $generatedContentId = $this->persistGeneratedContent($ticker, $headline, $type, $sourceId, [
            'video_data' => $videoData,
            'discord_embed' => $discordEmbed,
            'email_blast' => $emailBlast,
            'social_posts' => $socialPosts,
            'n8n_payload' => $n8nPayload,
        ]);

        return [
            'status' => 'success',
            'generated_content_id' => $generatedContentId,
            'video_record_id' => $videoRecordId,
            'ticker' => $ticker,
            'headline' => $headline,
            'type' => $type,
            'video' => $videoData,
            'voiceover' => $voiceover,
            'discord' => $discordEmbed,
            'email' => $emailBlast,
            'social' => $socialPosts,
            'n8n_payload' => $n8nPayload,
        ];
    }

    /**
     * Dispatch content to selected destinations (Discord, User Emails, n8n).
     *
     * @param int $generatedContentId
     * @param list<string> $destinations e.g. ['discord', 'email', 'n8n']
     * @param array<string, mixed> $customPayloadOverrides
     * @return array<string, mixed>
     */
    public function dispatch(int $generatedContentId, array $destinations = ['discord', 'email', 'n8n'], array $customPayloadOverrides = []): array
    {
        $record = $this->loadGeneratedContent($generatedContentId);
        if (! $record) {
            return ['status' => 'error', 'message' => "Generated content ID {$generatedContentId} not found."];
        }

        $bundle = json_decode((string) ($record['content_json'] ?? '{}'), true) ?: [];
        $results = [
            'status' => 'completed',
            'generated_content_id' => $generatedContentId,
            'dispatched_at' => date('Y-m-d H:i:s'),
            'destinations' => [],
        ];

        // DISCORD
        if (in_array('discord', $destinations, true)) {
            $discordData = array_merge($bundle['discord_embed'] ?? [], $customPayloadOverrides['discord'] ?? []);
            $discordRes = $this->sendDiscordAlert($discordData);
            $results['destinations']['discord'] = $discordRes;
            $this->logDistribution($generatedContentId, 'discord', $discordRes['success'] ? 'sent' : 'failed', $discordRes);
        }

        // USER EMAIL QUEUE
        if (in_array('email', $destinations, true)) {
            $emailData = array_merge($bundle['email_blast'] ?? [], $customPayloadOverrides['email'] ?? []);
            $emailRes = $this->queueSubscriberEmails($emailData, $generatedContentId);
            $results['destinations']['email'] = $emailRes;
            $this->logDistribution($generatedContentId, 'email', $emailRes['success'] ? 'queued' : 'failed', $emailRes);
        }

        // N8N WEBHOOK (TikTok, YouTube Shorts, X, LinkedIn)
        if (in_array('n8n', $destinations, true)) {
            $n8nData = array_merge($bundle['n8n_payload'] ?? [], $customPayloadOverrides['n8n'] ?? []);
            $n8nRes = $this->dispatchToN8n($n8nData);
            $results['destinations']['n8n'] = $n8nRes;
            $this->logDistribution($generatedContentId, 'n8n', $n8nRes['success'] ? 'dispatched' : 'failed', $n8nRes);
        }

        // Update overall status
        $this->db->table('bf_marketing_generated_content')->where('id', $generatedContentId)->update([
            'approval_status' => 'approved',
            'distribution_status' => 'distributed',
            'status' => 'completed',
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return $results;
    }

    /**
     * Send Rich Embed to Discord.
     */
    public function sendDiscordAlert(array $embed): array
    {
        $webhookUrl = (string) env('DISCORD_ALERTS_LIQUIDITY_SCANS_WEBHOOK', '');
        if ($webhookUrl === '') {
            $channelId = (string) env('MARKETING_DISCORD_CHANNEL_ID_STOCK_NEWS', '');
            if ($channelId !== '') {
                $webhookUrl = (string) ($this->distroConfig->discord['channels']['stock_news'] ?? '');
            }
        }

        $payload = [
            'username' => 'MyMI Wallet Market Bot',
            'avatar_url' => 'https://www.mymiwallet.com/assets/images/logo-icon.png',
            'embeds' => [$embed],
        ];

        if ($webhookUrl !== '' && preg_match('#^https://(canary\.)?discord\.com/api/webhooks/#', $webhookUrl)) {
            try {
                $res = $this->httpClient->post($webhookUrl, ['json' => $payload]);
                return [
                    'success' => $res->getStatusCode() >= 200 && $res->getStatusCode() < 300,
                    'status_code' => $res->getStatusCode(),
                    'method' => 'webhook',
                    'error' => null,
                ];
            } catch (\Throwable $e) {
                return ['success' => false, 'error' => 'Discord webhook error: ' . $e->getMessage()];
            }
        }

        // Fallback: check if local queue tables exist before attempting enqueuePlain
        if ($this->db->tableExists('bf_discord_queue') && $this->db->tableExists('bf_discord_policies')) {
            try {
                $sent = $this->discord->enqueuePlain('stock_news', $embed['title'] . "\n" . ($embed['description'] ?? ''));
                return ['success' => $sent, 'method' => 'library_enqueue', 'error' => $sent ? null : 'Discord enqueue returned false'];
            } catch (\Throwable $e) {
                return ['success' => false, 'error' => $e->getMessage()];
            }
        }

        return ['success' => false, 'error' => 'Discord webhook URL not configured and discord queue tables unavailable'];
    }

    /**
     * Queue responsive HTML email for subscribers in bf_email_outbox.
     */
    public function queueSubscriberEmails(array $emailData, int $generatedContentId): array
    {
        $subject = (string) ($emailData['subject'] ?? 'MyMI Wallet Trade Alert & Market Brief');
        $html = (string) ($emailData['html'] ?? '');

        // Queue to active subscribers or test admin
        $recipients = [];
        if ($this->db->tableExists('bf_users_subscribers')) {
            $subs = $this->db->table('bf_users_subscribers')
                ->select('email')
                ->where('status', 'active')
                ->limit(500)
                ->get()
                ->getResultArray();
            foreach ($subs as $s) {
                if (! empty($s['email']) && filter_var($s['email'], FILTER_VALIDATE_EMAIL)) {
                    $recipients[] = trim($s['email']);
                }
            }
        }

        // Fallback default ops / test email
        if (empty($recipients)) {
            $defaultRecipient = (string) env('test.email.to', 'tburks2392@gmail.com');
            $recipients[] = $defaultRecipient;
        }

        $queuedCount = 0;
        foreach (array_unique($recipients) as $recipient) {
            $this->db->table('bf_email_outbox')->insert([
                'user_id' => null,
                'to_email' => $recipient,
                'subject' => $subject,
                'body' => $html,
                'type' => 'marketing_trade_alert_blast',
                'status' => 'pending',
                'error_message' => null,
                'provider' => 'smtp',
                'meta_json' => json_encode([
                    'generated_content_id' => $generatedContentId,
                    'html_preview' => mb_substr($html, 0, 500),
                ]),
                'created_at' => date('Y-m-d H:i:s'),
                'sent_at' => null,
            ]);
            $queuedCount++;
        }

        return [
            'success' => $queuedCount > 0,
            'queued_count' => $queuedCount,
            'recipients_sample' => array_slice($recipients, 0, 3),
        ];
    }

    /**
     * Dispatch payload to n8n webhook.
     */
    public function dispatchToN8n(array $payload): array
    {
        // Try internal endpoint on port 5678, fallback to public URL
        $endpoints = [
            'http://127.0.0.1:5678/webhook/mymi-marketing-distro',
            'http://127.0.0.1:5678/webhook/tbi-aiops-runtime',
            'https://tbi.greenqube.com/n8n/webhook/mymi-marketing-distro',
            'https://tbi.greenqube.com/n8n/webhook/tbi-aiops-runtime',
        ];

        $lastError = null;
        foreach ($endpoints as $url) {
            try {
                $response = $this->httpClient->post($url, [
                    'json' => $payload,
                    'timeout' => 8,
                ]);
                $body = (string) $response->getBody();
                return [
                    'success' => $response->getStatusCode() >= 200 && $response->getStatusCode() < 300,
                    'endpoint' => $url,
                    'status_code' => $response->getStatusCode(),
                    'response' => json_decode($body, true) ?: $body,
                ];
            } catch (\Throwable $e) {
                $lastError = $e->getMessage();
            }
        }

        return [
            'success' => false,
            'endpoint' => $endpoints[0],
            'error' => 'n8n webhook failed on all candidate endpoints: ' . $lastError,
        ];
    }

    private function buildVideoScript(
        string $ticker,
        string $type,
        string $headline,
        string $strategy,
        ?float $callStrike,
        ?float $putStrike,
        ?float $underlierPrice,
        float $targetProfit,
        string $note
    ): array {
        $priceStr = $underlierPrice ? "\${$underlierPrice}" : 'current levels';
        $callStr = $callStrike ? "\${$callStrike}" : 'upper resistance';
        $putStr = $putStrike ? "\${$putStrike}" : 'lower support';

        if ($type === 'trade_alert') {
            $hook = "Why is everyone watching \${$ticker} right now? Here's the options breakout setup you need to know.";
            $beat1 = "Screen showing \${$ticker} trading around {$priceStr}. Heavy institutional momentum is signaling a two-sided breakout.";
            $beat2 = "Our weekly options scanner flagged the {$strategy}: targeting the {$callStr} call and {$putStr} put for a combined target profit of +\${$targetProfit}.";
            $beat3 = "Close up of profit curve. If volatility spikes either way before expiration, this strategy locks in asymmetric upside.";
            $narration = "Attention traders, \${$ticker} is setting up for a massive weekly options breakout. With the stock holding near {$priceStr}, our algorithm just flagged a {$strategy} position targeting {$callStr} calls and {$putStr} puts. We are shooting for a target profit of +\${$targetProfit} dollars on the position. Keep your risk strictly defined, and track this trade live in MyMI Wallet.";
            $cta = "Tap the link in our bio to track this \${$ticker} options setup and get free trade alerts on MyMIWallet.com.";
        } else {
            $hook = "Breaking news on \${$ticker}! Here is what Wall Street is not telling you.";
            $beat1 = "Headline banner on screen: {$headline}. Stock reaction chart showing immediate volatility.";
            $beat2 = "Key breakdown of the announcement and what it means for retail investors and options traders.";
            $beat3 = "Action plan: key resistance levels and how to position without getting caught in false breakouts.";
            $narration = "Breaking market update for \${$ticker}. {$headline}. Volatility is jumping across the board, and momentum indicators are flashing high alert. Whether you are trading shares or options, do not chase blindly. Manage your risk, plan your entry levels, and stay ahead of the curve.";
            $cta = "Head to MyMIWallet.com right now for full market analysis and free wealth tracking tools.";
        }

        $overlay = [
            ['timestamp' => '0:00 - 0:03', 'text' => "\${$ticker} BREAKOUT ALERT 🚨"],
            ['timestamp' => '0:03 - 0:15', 'text' => "Strategy: {$strategy} | Underlier: {$priceStr}"],
            ['timestamp' => '0:15 - 0:28', 'text' => "Strikes: {$callStr} Call / {$putStr} Put"],
            ['timestamp' => '0:28 - 0:38', 'text' => "Target Profit: +\${$targetProfit} 💰"],
            ['timestamp' => '0:38 - 0:45', 'text' => "Track Free at MyMIWallet.com 📲"],
        ];

        $hashtags = ["#{$ticker}", '#options', '#trading', '#stockmarket', '#investing', '#mymiwallet', '#stocks'];
        $caption = "🚨 \${$ticker} {$strategy} setup detected! Target profit: +\${$targetProfit}. " . implode(' ', $hashtags);

        return [
            'hook' => $hook,
            'visual_beats' => [$beat1, $beat2, $beat3],
            'overlay_text' => $overlay,
            'narration_script' => $narration,
            'spoken_cta' => $cta,
            'caption' => $caption,
            'hashtags' => implode(' ', $hashtags),
            'duration_target' => '30-45s',
        ];
    }

    private function buildDiscordEmbed(
        string $ticker,
        string $type,
        string $headline,
        string $strategy,
        ?float $callStrike,
        ?float $putStrike,
        ?float $underlierPrice,
        float $targetProfit,
        string $note
    ): array {
        $isTrade = $type === 'trade_alert';
        $color = $isTrade ? 0x10B981 : 0xF59E0B; // Emerald green or Amber

        $fields = [
            ['name' => 'Ticker / Asset', 'value' => "**\${$ticker}**", 'inline' => true],
            ['name' => 'Strategy', 'value' => $strategy, 'inline' => true],
            ['name' => 'Underlier Price', 'value' => $underlierPrice ? "\${$underlierPrice}" : 'Market', 'inline' => true],
        ];

        if ($callStrike || $putStrike) {
            $fields[] = ['name' => 'Call Strike', 'value' => $callStrike ? "\${$callStrike}" : 'N/A', 'inline' => true];
            $fields[] = ['name' => 'Put Strike', 'value' => $putStrike ? "\${$putStrike}" : 'N/A', 'inline' => true];
            $fields[] = ['name' => 'Target Net Profit', 'value' => "**+\${$targetProfit}**", 'inline' => true];
        }

        $fields[] = [
            'name' => 'Catalyst / Analysis',
            'value' => mb_substr($note ?: $headline, 0, 500),
            'inline' => false,
        ];

        $fields[] = [
            'name' => 'Action Link',
            'value' => "[Track Position in MyMI Wallet](https://www.mymiwallet.com/)",
            'inline' => false,
        ];

        return [
            'title' => ($isTrade ? '🚨 Trade Alert: ' : '📰 Market News: ') . "\${$ticker} — {$headline}",
            'description' => $isTrade
                ? "A high-probability weekly options momentum setup has been flagged on \${$ticker}."
                : "Breaking corporate and market announcement impacting \${$ticker}.",
            'color' => $color,
            'fields' => $fields,
            'footer' => [
                'text' => 'MyMI Wallet Market Intelligence • Powered by GreenQube AI',
                'icon_url' => 'https://www.mymiwallet.com/assets/images/logo-icon.png',
            ],
            'timestamp' => date('c'),
        ];
    }

    private function buildEmailBlast(
        string $ticker,
        string $type,
        string $headline,
        string $strategy,
        ?float $callStrike,
        ?float $putStrike,
        ?float $underlierPrice,
        float $targetProfit,
        string $note
    ): array {
        $subject = ($type === 'trade_alert' ? "🚨 [TRADE ALERT] " : "📰 [MARKET BRIEF] ") . "\${$ticker}: {$headline}";

        $priceStr = $underlierPrice ? "\${$underlierPrice}" : 'Market';
        $callStr = $callStrike ? "\${$callStrike}" : 'N/A';
        $putStr = $putStrike ? "\${$putStrike}" : 'N/A';

        $html = <<<HTML
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$subject}</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; background-color: #0f172a; color: #f8fafc; margin: 0; padding: 24px; }
        .card { max-width: 600px; margin: 0 auto; background: #1e293b; border-radius: 12px; border: 1px solid #334155; overflow: hidden; }
        .header { background: linear-gradient(135deg, #0ea5e9 0%, #10b981 100%); padding: 24px; text-align: center; color: #ffffff; }
        .badge { display: inline-block; padding: 4px 12px; font-size: 12px; font-weight: 700; border-radius: 9999px; background: rgba(255,255,255,0.25); text-transform: uppercase; margin-bottom: 8px; }
        .content { padding: 24px; }
        .grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin: 20px 0; background: #0f172a; padding: 16px; border-radius: 8px; }
        .grid-item { font-size: 14px; }
        .grid-label { color: #94a3b8; font-size: 12px; text-transform: uppercase; }
        .grid-value { font-weight: 700; font-size: 16px; color: #38bdf8; }
        .btn { display: block; text-align: center; background: #10b981; color: #ffffff; text-decoration: none; padding: 14px 20px; border-radius: 8px; font-weight: 700; margin: 24px 0 12px; }
        .footer { padding: 16px; text-align: center; font-size: 12px; color: #64748b; border-top: 1px solid #334155; }
    </style>
</head>
<body>
    <div class="card">
        <div class="header">
            <div class="badge">{$type}</div>
            <h1 style="margin: 0; font-size: 22px;">\${$ticker} Momentum Intelligence</h1>
        </div>
        <div class="content">
            <h2 style="font-size: 18px; margin-top: 0; color: #e2e8f0;">{$headline}</h2>
            <p style="color: #cbd5e1; line-height: 1.6;">{$note}</p>

            <div class="grid">
                <div class="grid-item">
                    <div class="grid-label">Underlier Price</div>
                    <div class="grid-value">{$priceStr}</div>
                </div>
                <div class="grid-item">
                    <div class="grid-label">Strategy</div>
                    <div class="grid-value">{$strategy}</div>
                </div>
                <div class="grid-item">
                    <div class="grid-label">Call Strike</div>
                    <div class="grid-value">{$callStr}</div>
                </div>
                <div class="grid-item">
                    <div class="grid-label">Put Strike</div>
                    <div class="grid-value">{$putStr}</div>
                </div>
                <div class="grid-item" style="grid-column: span 2;">
                    <div class="grid-label">Target Profit</div>
                    <div class="grid-value" style="color: #4ade80;">+\${$targetProfit} Net</div>
                </div>
            </div>

            <a href="https://www.mymiwallet.com/" class="btn">View Live Trade & Position</a>
            <p style="font-size: 12px; color: #94a3b8; text-align: center;">Always manage risk and trade within your plan.</p>
        </div>
        <div class="footer">
            &copy; 2026 MyMI Wallet. Sent to subscribed members.<br>
            <a href="https://www.mymiwallet.com/privacy" style="color: #38bdf8;">Privacy Policy</a> • <a href="https://www.mymiwallet.com/unsubscribe" style="color: #38bdf8;">Unsubscribe</a>
        </div>
    </div>
</body>
</html>
HTML;

        return [
            'subject' => $subject,
            'html' => $html,
        ];
    }

    private function buildSocialPosts(
        string $ticker,
        string $type,
        string $headline,
        string $strategy,
        ?float $callStrike,
        ?float $putStrike,
        ?float $underlierPrice,
        float $targetProfit,
        string $note
    ): array {
        $priceStr = $underlierPrice ? "\${$underlierPrice}" : 'market';
        $callStr = $callStrike ? "\${$callStrike}C" : '';
        $putStr = $putStrike ? "\${$putStrike}P" : '';
        $strikes = array_filter([$callStr, $putStr]) ? '(' . implode(' / ', array_filter([$callStr, $putStr])) . ')' : '';

        // X (Twitter) - max 280 chars
        $x = "🚨 \${$ticker} Alert: {$strategy} {$strikes}\n"
           . "Underlier: {$priceStr} | Target: +\${$targetProfit}\n"
           . mb_substr($headline, 0, 90) . "\n"
           . "Track free: mymiwallet.com #options #stocks #investing";

        if (mb_strlen($x) > 280) {
            $x = mb_substr($x, 0, 279) . '…';
        }

        // LinkedIn - Professional institutional tone
        $linkedin = "Market Intelligence Update: \${$ticker}\n\n"
                  . "Our automated momentum scanner has identified an asymmetric weekly setup on \${$ticker}.\n\n"
                  . "Key Parameters:\n"
                  . "• Structure: {$strategy}\n"
                  . "• Strikes: {$callStr} Call | {$putStr} Put\n"
                  . "• Target Profit: +\${$targetProfit}\n"
                  . "• Underlier Context: {$priceStr}\n\n"
                  . "Thesis & Catalyst:\n"
                  . "{$headline}. {$note}\n\n"
                  . "Disciplined risk management remains paramount in high-volatility environments. Explore our real-time options analytics and free financial tracking tools at MyMIWallet.com.\n\n"
                  . "#Finance #Trading #OptionsTrading #RiskManagement #MyMIWallet #Markets";

        return [
            'x_twitter' => $x,
            'linkedin' => $linkedin,
        ];
    }

    private function persistVideoContent(array $videoData, string $ticker, ?int $sourceId): int
    {
        if (! $this->db->tableExists('bf_marketing_video_content')) {
            return 0;
        }

        $row = [
            'source_type' => 'trade_alert',
            'source_id' => $sourceId,
            'platform' => 'tiktok',
            'video_type' => 'breakout_alert_video',
            'symbol' => $ticker,
            'title' => "\${$ticker} Weekly Options Breakout Video",
            'hook' => $videoData['hook'],
            'intro_text' => $videoData['visual_beats'][0] ?? '',
            'body_text' => $videoData['narration_script'],
            'cta_text' => $videoData['spoken_cta'],
            'caption' => $videoData['caption'],
            'hashtags' => $videoData['hashtags'],
            'voiceover_script' => $videoData['narration_script'],
            'overlay_text_json' => json_encode($videoData['overlay_text']),
            'scene_plan_json' => json_encode($videoData['visual_beats']),
            'duration_target' => '30-45s',
            'status' => 'Generated',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $this->db->table('bf_marketing_video_content')->insert($row);
        return (int) $this->db->insertID();
    }

    private function persistVideoAsset(int $videoContentId, array $voiceover): void
    {
        if (! $this->db->tableExists('bf_marketing_video_assets')) {
            return;
        }

        $this->db->table('bf_marketing_video_assets')->insert([
            'video_content_id' => $videoContentId,
            'asset_type' => 'audio_voiceover',
            'asset_path' => $voiceover['file_path'] ?? null,
            'asset_url' => $voiceover['file_url'] ?? null,
            'asset_label' => 'AI Narrator Voiceover (MP3)',
            'sort_order' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    private function persistGeneratedContent(string $ticker, string $title, string $type, ?int $sourceId, array $content): int
    {
        if (! $this->db->tableExists('bf_marketing_generated_content')) {
            return 0;
        }

        $row = [
            'source_type' => $type,
            'source_id' => $sourceId,
            'title' => "\${$ticker}: {$title}",
            'content_json' => json_encode($content, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            'status' => 'completed',
            'approval_status' => 'pending_review',
            'distribution_status' => 'ready',
            'version' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $this->db->table('bf_marketing_generated_content')->insert($row);
        return (int) $this->db->insertID();
    }

    private function loadGeneratedContent(int $id): ?array
    {
        if (! $this->db->tableExists('bf_marketing_generated_content')) {
            return null;
        }
        return $this->db->table('bf_marketing_generated_content')->where('id', $id)->get()->getRowArray();
    }

    private function logDistribution(int $contentId, string $platform, string $status, array $payload): void
    {
        if ($this->db->tableExists('bf_marketing_distribution_log')) {
            $this->db->table('bf_marketing_distribution_log')->insert([
                'generated_content_id' => $contentId,
                'platform' => $platform,
                'status' => $status,
                'response_payload' => json_encode($payload),
                'error_message' => $payload['error'] ?? null,
                'attempted_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}

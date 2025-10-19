<?php namespace App\Libraries;

use App\Libraries\{BaseLoader, MyMIBudget, MyMIMomentum};
use App\Models\AlertsModel;

#[\AllowDynamicProperties]
class MyMIAdvisor
{


    protected $MyMIBudget;
    protected $MyMIMomentum;
    protected $alertsModel;

    public function __construct()
    {
        $this->MyMIMomentum = new MyMIMomentum();
        $this->MyMIBudget = new MyMIBudget();
        $this->alertsModel = new AlertsModel();
    }

    public function generateAdvisorMediaPackage($userId)
    {
        helper('date');

        // STEP 1: Check if advisor already generated within last 15 minutes
        $db = \Config\Database::connect();
        $builder = $db->table('bf_investment_advisor_log');
        $existing = $builder
            ->where('user_id', $userId)
            ->where('advisor_type', 'default')
            ->get()
            ->getRow();

        if ($existing && strtotime($existing->updated_on) > strtotime('-15 minutes')) {
            log_message('info', "Advisor media recently generated for user {$userId}, skipping.");
            return [
                'user_id' => $userId,
                'ticker' => $existing->ticker,
                'summary' => $existing->summary,
                'script' => $existing->script,
                'voiceover_url' => $existing->voiceover_url,
                'score' => $existing->score,
                'risk_rating' => $existing->risk_rating,
                'flag_opportunity' => (bool) $existing->flag_opportunity,
                'sentiment' => $this->generateSentimentTag($existing->summary),
                'chart_url' => $existing->chart_url,
                'timestamp' => $existing->updated_on,
            ];
        }

        // STEP 2: Generate advisor content
        $advisor = $this->generateAdvisorNotes($userId);
        $summary = $advisor['summary'] ?? 'No summary.';
        $script = $this->generateVoiceoverScriptFromSummary($summary);
        $filename = "advisor_notes_user_{$userId}";
        $voiceoverUrl = $this->generateVoiceoverAudio($script, $filename);
        $topPick = $this->suggestTrades($userId)[0] ?? ['ticker' => 'AAPL'];
        $symbol = $topPick['ticker'];
        $chartUrl = $this->generateTradingViewChartUrl($symbol);

        // STEP 3: Save to advisor log table
        $data = [
            'user_id' => $userId,
            'advisor_type' => 'default',
            'status' => 'generated',
            'summary' => $summary,
            'script' => $script,
            'voiceover_url' => $voiceoverUrl,
            'media_json_url' => null,
            'chart_url' => $chartUrl,
            'score' => $advisor['score'],
            'risk_rating' => $advisor['risk_rating'],
            'flag_opportunity' => $advisor['flag_opportunity'] ? 1 : 0,
            'ticker' => $symbol,
            'updated_on' => date('Y-m-d H:i:s')
        ];

        if ($existing) {
            $builder->where('id', $existing->id)->update($data);
        } else {
            $builder->insert($data);
        }

        // STEP 4: Return response
        return [
            'user_id' => $userId,
            'ticker' => $symbol,
            'summary' => $summary,
            'script' => $script,
            'voiceover_url' => $voiceoverUrl,
            'score' => $advisor['score'],
            'risk_rating' => $advisor['risk_rating'],
            'flag_opportunity' => $advisor['flag_opportunity'],
            'sentiment' => $this->generateSentimentTag($summary),
            'chart_url' => $chartUrl,
            'timestamp' => date('Y-m-d H:i:s'),
        ];
    }

    public function generateFromAdvisorPick(array $recommendation): string
    {
        $ticker = $recommendation['ticker'];
        $score = $recommendation['score'];
        $risk = $recommendation['risk_rating'];
        $entry = $recommendation['entry_price'];
        $category = ucfirst($recommendation['category'] ?? 'Trade');
        $sentiment = ucfirst($recommendation['sentiment'] ?? 'Neutral');
        $rsi = $recommendation['rsi'] ?? null;
        $macd = $recommendation['macd'] ?? null;
        $emaTrend = $recommendation['ema_trend'] ?? null;
        $smaCross = $recommendation['sma_cross'] ?? null;
        $volume = $recommendation['volume'] ?? null;

        return <<<S
📈 MyMI Advisor Pick: {$ticker} ({$category})

This stock shows strong momentum with a score of {$score}, fitting your {$risk} profile.

🟢 Suggested Entry Price: \${$entry}
📊 RSI: {$rsi} | MACD: {$macd}
📐 EMA Trend: {$emaTrend} | SMA: {$smaCross}
📣 Market Sentiment: {$sentiment}
📦 Volume: {$volume}

Review the chart and analysis in your MyMI Wallet dashboard to explore this opportunity.
S;
    }

    public function generateAdvisorNotes($userId): array
    {
        log_message('debug', 'MyMIAdvisor::generateAdvisorNotes called for userId: ' . $userId);

        $forecast = $this->MyMIBudget->getForecastForUser($userId);
        $risk = $this->MyMIBudget->getUserRiskProfile($userId);

        if (empty($forecast) || empty($risk)) {
            log_message('error', 'MyMIAdvisor::generateAdvisorNotes - Missing forecast or risk profile.');
            return [
                'summary' => 'No forecast or risk profile available.',
                'score' => 0,
                'flag_opportunity' => false,
                'risk_rating' => 'Unknown',
            ];
        }

        $alerts = $this->alertsModel->getTradeAlertsWithCreatedFlag();

        if (empty($alerts)) {
            log_message('warning', 'MyMIAdvisor::generateAdvisorNotes - No trade alerts found.');
            return [
                'summary' => 'No trade alerts found.',
                'score' => 0,
                'flag_opportunity' => false,
                'risk_rating' => $risk['risk_level'],
            ];
        }

        if (!$this->MyMIMomentum) {
            log_message('critical', 'MyMIAdvisor::generateAdvisorNotes - MyMIMomentum is null');
            return [
                'summary' => 'Momentum analysis failed (internal error).',
                'score' => 0,
                'flag_opportunity' => false,
                'risk_rating' => $risk['risk_level'],
            ];
        }

        $momentumScores = [];
        foreach ($alerts as $alert) {
            $tradeId = $alert['id'] ?? '0';
            $ticker = $alert['ticker'] ?? 'UNKNOWN';
            try {
                $score = $this->MyMIMomentum->scoreTradeOpportunity($ticker, 5, $tradeId);
                $momentumScores[] = $score;
                log_message('debug', "Scored momentum for {$ticker}: {$score}");
            } catch (\Throwable $e) {
                log_message('error', "MyMIAdvisor::generateAdvisorNotes - Exception while scoring {$ticker}: " . $e->getMessage());
            }
        }

        $avgMomentum = count($momentumScores) ? array_sum($momentumScores) / count($momentumScores) : 0;
        log_message('debug', "MyMIAdvisor::generateAdvisorNotes - Avg momentum for user {$userId}: {$avgMomentum}");

        $summary = "User has \${$forecast['disposable_monthly']} disposable. Avg momentum: {$avgMomentum}. Risk: {$risk['risk_level']}.";
        $flagOpportunity = $forecast['disposable_monthly'] > 300 && $avgMomentum >= $risk['min_score'];

        return [
            'summary' => $summary,
            'score' => round($avgMomentum, 2),
            'flag_opportunity' => $flagOpportunity,
            'risk_rating' => $risk['risk_level'],
        ];
    }

    public function suggestTrades($userId): array
    {
        $riskProfile = $this->MyMIBudget->getUserRiskProfile($userId);
        $alerts = $this->alertsModel->getTradeAlertsWithCreatedFlag();
        $recommendations = [];

        foreach ($alerts as $alert) {
            $score = $this->MyMIMomentum->scoreTradeOpportunity($alert['ticker'], 5);
            if ($score >= $riskProfile['min_score']) {
                $recommendations[] = [
                    'ticker' => $alert['ticker'],
                    'score' => $score,
                    'risk_rating' => $riskProfile['risk_level'],
                    'entry_price' => $alert['price'],
                    'category' => $alert['category'],
                    'tv_chart' => $alert['tv_chart'],
                ];
            }
        }

        usort($recommendations, fn($a, $b) => $b['score'] <=> $a['score']);
        return $recommendations;
    }

    public function generateVoiceoverScriptFromSummary(string $summary): string
    {
        if (empty($summary)) {
            return 'No summary available for voiceover.';
        }

        $summary = strip_tags($summary);
        $sentences = preg_split('/(?<=[.!?])\s+(?=[A-Z])/', trim($summary), -1, PREG_SPLIT_NO_EMPTY);
        $hook = $sentences[0] ?? 'Here’s your market update:';

        $script = "**Voiceover Preview**\n\n";
        $script .= "[INTRO]\n{$hook}\n\n";

        foreach (array_slice($sentences, 1, 3) as $line) {
            $script .= "{$line}\n";
        }

        $script .= "\n[OUTRO]\nLearn more inside your MyMI Wallet.\n";
        return $script;
    }

    public function generateVoiceoverAudio($script, $filename): string
    {
        return $this->generateVoiceoverWithElevenLabs($script, $filename);
    }

    public function generateVoiceoverWithElevenLabs($text, $filename, $voiceIdOverride = null)
    {
        $apiKey = config('APIs')->elevenLabsAPIKey;
        $voiceId = $voiceIdOverride ?? config('APIs')->elevenLabsVoiceId;

        log_message('debug', "Using ElevenLabs voice: {$voiceId}");

        $client = \Config\Services::curlrequest();
        $response = $client->post("https://api.elevenlabs.io/v1/text-to-speech/{$voiceId}", [
            'headers' => [
                'xi-api-key' => $apiKey,
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'text' => $text,
                'model_id' => 'eleven_multilingual_v2',
                'voice_settings' => [
                    'stability' => 0.5,
                    'similarity_boost' => 0.75,
                ]
            ]
        ]);

        $voicePath = WRITEPATH . "uploads/voiceovers/";
        if (!is_dir($voicePath)) {
            mkdir($voicePath, 0755, true);
        }

        $filePath = $voicePath . "{$filename}.mp3";
        file_put_contents($filePath, $response->getBody());

        return base_url("writable/uploads/voiceovers/{$filename}.mp3");
    }

    public function generateSentimentTag($text): string
    {
        $tags = [];

        if (stripos($text, 'momentum') !== false || stripos($text, 'breakout') !== false) {
            $tags[] = '📈 Strong Momentum';
        }

        if (stripos($text, 'risk') !== false || stripos($text, 'volatility') !== false) {
            $tags[] = '⚠️ Elevated Risk';
        }

        if (stripos($text, 'MACD') !== false || stripos($text, 'reversal') !== false) {
            $tags[] = '🔄 MACD Reversal';
        }

        if (stripos($text, 'bullish') !== false) {
            $tags[] = '🐂 Bullish Signal';
        }

        return implode(' | ', $tags);
    }

    public function generateTradingViewChartUrl($symbol): string
    {
        return "https://www.tradingview.com/symbols/" . strtoupper($symbol) . "/";
    }

    public function exportCapCutJsonTemplate($mediaPackage)
    {
        $jsonDir = WRITEPATH . 'files/capcut_templates/';
        if (!is_dir($jsonDir)) {
            mkdir($jsonDir, 0755, true);
        }

        $filePath = $jsonDir . 'advisor_' . $mediaPackage['user_id'] . '.json';

        $template = [
            'title' => 'MyMI Advisor Notes',
            'subtitle' => 'AI-Powered Financial Briefing',
            'audio_url' => $mediaPackage['voiceover_url'],
            'text_overlays' => [[
                'text' => $mediaPackage['script'],
                'start' => 0,
                'duration' => 15,
                'position' => 'bottom',
                'font' => 'Roboto',
                'size' => 24
            ]],
            'background_chart' => $this->generateTradingViewChartUrl($mediaPackage['ticker'] ?? 'AAPL'),
            'created_at' => date('c')
        ];

        file_put_contents($filePath, json_encode($template, JSON_PRETTY_PRINT));

        return base_url('writable/files/capcut_templates/' . basename($filePath));
    }

    public function packageAdvisorMediaAsZip($mediaPackage)
    {
        $basePath = WRITEPATH . 'uploads/';
        $voiceFile = basename(parse_url($mediaPackage['voiceover_url'] ?? '', PHP_URL_PATH));
        $jsonUrl = $this->exportCapCutJsonTemplate($mediaPackage);
        $jsonFile = basename(parse_url($jsonUrl ?? '', PHP_URL_PATH));

        $voicePath = $basePath . "voiceovers/{$voiceFile}";
        $jsonPath = WRITEPATH . "files/capcut_templates/{$jsonFile}";
        $zipPath = $basePath . "advisor_media_user{$mediaPackage['user_id']}.zip";

        // === Ensure directories exist ===
        $dirs = [
            dirname($voicePath),
            dirname($jsonPath),
            dirname($zipPath),
            $basePath . 'tmp'
        ];
        foreach ($dirs as $dir) {
            if (!is_dir($dir)) {
                if (!mkdir($dir, 0755, true) && !is_dir($dir)) {
                    log_message('error', "Failed to create directory: {$dir}");
                    continue;
                }
            }
        }

        // Set temp dir
        putenv('TMPDIR=' . $basePath . 'tmp');

        // === Package Zip ===
        $zip = new \ZipArchive();
        if ($zip->open($zipPath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE)) {
            if (is_file($voicePath)) {
                $zip->addFile($voicePath, basename($voicePath));
            } else {
                log_message('error', "Missing voiceover file: {$voicePath}");
            }

            if (is_file($jsonPath)) {
                $zip->addFile($jsonPath, basename($jsonPath));
            } else {
                log_message('error', "Missing JSON file: {$jsonPath}");
            }

            $zip->close();
        } else {
            log_message('error', "Failed to create ZIP: {$zipPath}");
        }

        return base_url("writable/files/" . basename($zipPath));
    }

    public function prepareAdvisorMediaPackage($userId)
    {
        $db = \Config\Database::connect();
        $logTable = 'bf_investment_advisor_log';

        // Check if media was generated recently
        $existing = $db->table($logTable)->where('user_id', $userId)->get()->getRow();
        $now = new \DateTime();
        $shouldGenerate = true;

        if ($existing) {
            $lastGenerated = new \DateTime($existing->last_generated);
            $diff = $now->getTimestamp() - $lastGenerated->getTimestamp();

            if ($diff < 900) { // less than 15 minutes
                log_message('debug', "⏳ Skipping advisor package for user {$userId} (last generated {$diff} seconds ago)");
                $shouldGenerate = false;
            }
        }

        if (!$shouldGenerate) {
            return [
                'user_id' => $userId,
                'ticker' => 'N/A',
                'summary' => 'Cached advisor summary is still valid.',
                'script' => '',
                'voiceover_url' => '',
                'score' => 0,
                'risk_rating' => 'N/A',
                'flag_opportunity' => false,
                'sentiment' => '',
                'chart_url' => '',
                'timestamp' => $existing->last_generated,
            ];
        }

        // Otherwise, generate and update the log
        $advisor = $this->generateAdvisorNotes($userId);
        $summary = $advisor['summary'] ?? 'No summary.';
        $script = $this->generateVoiceoverScriptFromSummary($summary);
        $topPick = $this->suggestTrades($userId)[0] ?? ['ticker' => 'AAPL'];
        $symbol = $topPick['ticker'];

        $data = [
            'user_id' => $userId,
            'ticker' => $symbol,
            'summary' => $summary,
            'script' => $script,
            'voiceover_url' => null,
            'score' => $advisor['score'],
            'risk_rating' => $advisor['risk_rating'],
            'flag_opportunity' => $advisor['flag_opportunity'],
            'sentiment' => $this->generateSentimentTag($summary),
            'chart_url' => $this->generateTradingViewChartUrl($symbol),
            'timestamp' => $now->format('Y-m-d H:i:s'),
        ];

        // Upsert generation log
        $logData = ['user_id' => $userId, 'last_generated' => $now->format('Y-m-d H:i:s')];
        $db->table($logTable)->upsert($logData);

        log_message('debug', "✅ Generated advisor package for user {$userId}");
        return $data;
    }

}
?>

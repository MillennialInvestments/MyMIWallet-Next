<?php

declare(strict_types=1);

namespace App\Modules\Management\Controllers\Marketing;

use App\Controllers\BaseAdminController;
use App\Services\Marketing\ContentDistroEngine;
use App\Services\Marketing\MultiMailboxIntakeService;
use App\Services\Marketing\VoiceoverService;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Database;

class DistroDashboardController extends BaseAdminController
{
    use ResponseTrait;

    private MultiMailboxIntakeService $intakeService;
    private ContentDistroEngine $distroEngine;
    private VoiceoverService $voiceoverService;
    private $db;

    public function initController(
        \CodeIgniter\HTTP\RequestInterface $request,
        \CodeIgniter\HTTP\ResponseInterface $response,
        \Psr\Log\LoggerInterface $logger
    ) {
        parent::initController($request, $response, $logger);
        $this->intakeService = new MultiMailboxIntakeService();
        $this->distroEngine = new ContentDistroEngine();
        $this->voiceoverService = new VoiceoverService();
        $this->db = Database::connect();
    }

    /**
     * Render the Manual Distribution Dashboard.
     */
    public function index(): ResponseInterface|string
    {
        $redirect = $this->requireAdminAccess();
        if ($redirect !== null) {
            return $redirect;
        }

        $this->commonData();
        $this->data['pageTitle'] = 'Manual Distro Dashboard | Marketing Ops | MyMI Wallet';

        // 1. Telemetry & Connection Statuses
        $this->data['telemetry'] = $this->gatherTelemetry();

        // 2. Inbound Email Feed (from alerts@ and news@)
        $this->data['inboundFeed'] = $this->getInboundFeed(25);

        // 3. Generated Content Feed
        $this->data['generatedFeed'] = $this->getGeneratedFeed(15);

        // 4. Distribution History
        $this->data['distroLogs'] = $this->getDistributionLogs(20);

        // 5. Initial Selected Item for Studio (First inbound item or default)
        $this->data['activeItem'] = ! empty($this->data['inboundFeed']) ? $this->data['inboundFeed'][0] : null;

        return $this->renderTheme('App\Modules\Management\Views\Marketing\distroDashboard', $this->data);
    }

    /**
     * AJAX: Trigger Multi-Mailbox Ingest (alerts@ and news@).
     */
    public function fetchEmails(): ResponseInterface
    {
        $mailbox = (string) ($this->request->getPost('mailbox') ?? 'all');
        $limit = max(1, (int) ($this->request->getPost('limit') ?? 20));

        try {
            $result = $this->intakeService->fetchAll([
                'mailbox' => $mailbox,
                'limit' => $limit,
            ]);
            return $this->response->setJSON($result);
        } catch (\Throwable $e) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Email fetch failed: ' . $e->getMessage(),
            ])->setStatusCode(500);
        }
    }

    /**
     * AJAX: Generate Multi-Platform Content Package.
     */
    public function generateContent(): ResponseInterface
    {
        $post = $this->request->getPost();
        $tempId = isset($post['temp_id']) ? (int) $post['temp_id'] : null;

        $inputData = [];
        if ($tempId && $tempId > 0 && $this->db->tableExists('bf_marketing_temp_scraper')) {
            $record = $this->db->table('bf_marketing_temp_scraper')->where('id', $tempId)->get()->getRowArray();
            if ($record) {
                $meta = json_decode((string) ($record['metadata'] ?? '{}'), true) ?: [];
                $parsed = $meta['parsed_trade'] ?? [];
                $inputData = [
                    'source_id' => $tempId,
                    'ticker' => $record['ticker'] ?: ($parsed['ticker'] ?? 'SPY'),
                    'type' => $record['type'] ?: 'trade_alert',
                    'headline' => $record['title'] ?: ($parsed['headline'] ?? 'Market Opportunity'),
                    'strategy' => $parsed['strategy'] ?? 'STRANGLE',
                    'call_strike' => $parsed['call_strike'] ?? null,
                    'put_strike' => $parsed['put_strike'] ?? null,
                    'underlier_price' => $parsed['underlier_price'] ?? null,
                    'target_profit' => $parsed['target_profit'] ?? 200.0,
                    'note' => $record['content'] ?: ($parsed['note'] ?? ''),
                ];
            }
        }

        // Merge with any direct POST overrides
        foreach (['ticker', 'type', 'headline', 'strategy', 'call_strike', 'put_strike', 'underlier_price', 'target_profit', 'note'] as $k) {
            if (isset($post[$k]) && $post[$k] !== '') {
                $inputData[$k] = $post[$k];
            }
        }

        if (empty($inputData['ticker'])) {
            $inputData['ticker'] = 'SPY';
        }

        try {
            $package = $this->distroEngine->generatePackage($inputData);
            return $this->response->setJSON($package);
        } catch (\Throwable $e) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Content generation failed: ' . $e->getMessage(),
            ])->setStatusCode(500);
        }
    }

    /**
     * AJAX: Generate or Regenerate Voiceover Audio.
     */
    public function generateVoiceover(): ResponseInterface
    {
        $script = (string) ($this->request->getPost('script') ?? '');
        $ticker = (string) ($this->request->getPost('ticker') ?? 'vo');

        if (trim($script) === '') {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Script text cannot be empty.',
            ])->setStatusCode(400);
        }

        $result = $this->voiceoverService->generate($script, 'vo_' . strtolower(preg_replace('/[^A-Za-z0-9]/', '', $ticker)) . '_' . date('Ymd_His'));

        return $this->response->setJSON($result);
    }

    /**
     * AJAX: Distribute Content to Selected Channels (Discord, Email, n8n).
     */
    public function distribute(): ResponseInterface
    {
        $generatedContentId = (int) ($this->request->getPost('generated_content_id') ?? 0);
        $destinations = $this->request->getPost('destinations');
        if (! is_array($destinations) || empty($destinations)) {
            $destinations = ['discord', 'email', 'n8n'];
        }

        if ($generatedContentId < 1) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Valid generated_content_id is required.',
            ])->setStatusCode(400);
        }

        $overrides = [
            'discord' => $this->request->getPost('discord_override') ?: [],
            'email' => $this->request->getPost('email_override') ?: [],
            'n8n' => $this->request->getPost('n8n_override') ?: [],
        ];

        try {
            $dispatchResult = $this->distroEngine->dispatch($generatedContentId, $destinations, $overrides);
            return $this->response->setJSON($dispatchResult);
        } catch (\Throwable $e) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Distribution dispatch failed: ' . $e->getMessage(),
            ])->setStatusCode(500);
        }
    }

    /**
     * AJAX: Inject Sample Trade Alert or News Item for instant testing.
     */
    public function injectSample(): ResponseInterface
    {
        $type = (string) ($this->request->getPost('type') ?? 'trade_alert');
        $symbol = strtoupper(trim((string) ($this->request->getPost('symbol') ?? 'BA')));

        if ($type === 'trade_alert') {
            $res = $this->intakeService->injectTradeAlert([
                'ticker' => $symbol,
                'strategy' => 'STRANGLE',
                'underlier_price' => $symbol === 'BA' ? 187.53 : 200.00,
                'call_strike' => $symbol === 'BA' ? 192.50 : 210.00,
                'put_strike' => $symbol === 'BA' ? 182.50 : 150.00,
                'target_profit' => 200.00,
                'headline' => "{$symbol} Weekly Options Momentum Breakout Setup",
                'note' => "Heavy options volume detected. Delta Air Lines expansion catalyst driving aerospace sector momentum.",
            ]);
        } else {
            $res = $this->intakeService->injectMarketNews([
                'ticker' => $symbol,
                'headline' => "Delta Air Lines Launches 4 Major New Routes To Europe",
                'body' => "Boeing aircraft demand poised to increase as international passenger travel expands into Q4.",
                'company_name' => $symbol === 'BA' ? 'Boeing Co.' : $symbol,
            ]);
        }

        return $this->response->setJSON($res);
    }

    /**
     * AJAX: Live Feed Polling.
     */
    public function feed(): ResponseInterface
    {
        return $this->response->setJSON([
            'status' => 'success',
            'inbound' => $this->getInboundFeed(15),
            'generated' => $this->getGeneratedFeed(10),
            'distro_logs' => $this->getDistributionLogs(10),
            'telemetry' => $this->gatherTelemetry(),
        ]);
    }

    private function gatherTelemetry(): array
    {
        $discordWebhook = (string) env('DISCORD_ALERTS_LIQUIDITY_SCANS_WEBHOOK', '');
        $discordOk = $discordWebhook !== '';

        $queuedEmails = 0;
        $sentEmails = 0;
        if ($this->db->tableExists('bf_email_outbox')) {
            $queuedEmails = $this->db->table('bf_email_outbox')->where('status', 'queued')->countAllResults();
            $sentEmails = $this->db->table('bf_email_outbox')->where('status', 'sent')->countAllResults();
        }

        $pendingIntake = 0;
        if ($this->db->tableExists('bf_marketing_temp_scraper')) {
            $pendingIntake = $this->db->table('bf_marketing_temp_scraper')->where('status', 'pending')->countAllResults();
        }

        $readyToDistribute = 0;
        if ($this->db->tableExists('bf_marketing_generated_content')) {
            $readyToDistribute = $this->db->table('bf_marketing_generated_content')->where('distribution_status', 'ready')->countAllResults();
        }

        return [
            'mailboxes' => [
                'alerts' => [
                    'address' => 'alerts@mymiwallet.com',
                    'host' => 'imap.dreamhost.com',
                    'status' => 'configured',
                ],
                'news' => [
                    'address' => 'news@mymiwallet.com',
                    'host' => 'imap.dreamhost.com',
                    'status' => 'configured',
                ],
            ],
            'discord' => [
                'status' => $discordOk ? 'connected' : 'missing_webhook',
                'channel' => '#stock_news / #liquidity_scans',
            ],
            'email_outbox' => [
                'queued' => $queuedEmails,
                'sent' => $sentEmails,
                'status' => 'active',
            ],
            'n8n' => [
                'status' => 'running',
                'url' => 'https://tbi.greenqube.com/n8n/',
                'webhook' => 'http://127.0.0.1:5678/webhook/mymi-marketing-distro',
            ],
            'counts' => [
                'pending_intake' => $pendingIntake,
                'ready_to_distribute' => $readyToDistribute,
            ],
        ];
    }

    private function getInboundFeed(int $limit = 25): array
    {
        if (! $this->db->tableExists('bf_marketing_temp_scraper')) {
            return [];
        }

        $rows = $this->db->table('bf_marketing_temp_scraper')
            ->orderBy('id', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();

        foreach ($rows as &$row) {
            $meta = json_decode((string) ($row['metadata'] ?? '{}'), true) ?: [];
            $row['parsed_trade'] = $meta['parsed_trade'] ?? [];
            $row['mailbox'] = $meta['mailbox'] ?? 'alerts@mymiwallet.com';
            $row['received_at'] = $meta['received_at'] ?? $row['date_scraped'] ?? null;
        }

        return $rows;
    }

    private function getGeneratedFeed(int $limit = 15): array
    {
        if (! $this->db->tableExists('bf_marketing_generated_content')) {
            return [];
        }

        return $this->db->table('bf_marketing_generated_content')
            ->orderBy('id', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    private function getDistributionLogs(int $limit = 20): array
    {
        if (! $this->db->tableExists('bf_marketing_distribution_log')) {
            return [];
        }

        return $this->db->table('bf_marketing_distribution_log')
            ->orderBy('id', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }
}

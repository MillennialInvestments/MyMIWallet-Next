<?php

namespace App\Modules\Advisor\Controllers;

use App\Controllers\BaseController;
use App\Libraries\{KimiClient, MyMIAlerts, MyMIBudget, MyMIInvestments};
use App\Models\AlertsModel;
use CodeIgniter\API\ResponseTrait;

class AdvisorController extends BaseController
{
    use ResponseTrait;

    private KimiClient $kimi;
    private MyMIBudget $budget;
    private MyMIInvestments $investments;
    private MyMIAlerts $alerts;

    public function __construct()
    {
        $this->kimi        = service('kimiClient');
        $this->budget      = new MyMIBudget();
        $this->investments = new MyMIInvestments();
        $this->alerts      = new MyMIAlerts();
    }

    public function index()
    {
        if (! aiKimiEnabled()) {
            return redirect()->to('/Dashboard');
        }

        return view('App\\Modules\\Advisor\\Views\\advisor_dashboard');
    }

    public function generateAdvisorInsight()
    {
        if (! aiKimiEnabled()) {
            return $this->disabledResponse();
        }

        $userId = (int) ($this->request->getPost('user_id') ?? $this->cuID ?? 0);

        $budgetSummary      = $this->safeCall(fn() => method_exists($this->budget, 'getBudgetSummaryForAI') ? $this->budget->getBudgetSummaryForAI($userId) : null);
        $portfolioSummary   = $this->safeCall(fn() => method_exists($this->investments, 'getPortfolioSummaryForAI') ? $this->investments->getPortfolioSummaryForAI($userId) : null);
        $activeAlerts       = $this->safeCall(fn() => method_exists($this->alerts, 'getOpenAlertsSummaryForAI') ? $this->alerts->getOpenAlertsSummaryForAI($userId) : []);

        $messages = [
            [
                'role'    => 'system',
                'content' => 'You are the MyMI Advisor. Create concise, actionable financial guidance with health checks, opportunities, and risk notes.',
            ],
            [
                'role'    => 'user',
                'content' => json_encode([
                    'user_id'           => $userId,
                    'budget_summary'    => $budgetSummary,
                    'portfolio_summary' => $portfolioSummary,
                    'active_alerts'     => $activeAlerts,
                ], JSON_PRETTY_PRINT),
            ],
        ];

        try {
            $result = $this->kimi->chat($messages);
            $content = $this->extractContent($result);
            return $this->respond([
                'status'  => 'ok',
                'message' => 'Advisor insight generated.',
                'content' => $content,
                'data'    => $result,
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'AdvisorController::generateAdvisorInsight failed: ' . $e->getMessage());
            return $this->failServerError('Unable to generate advisor insight.');
        }
    }

    public function generateNewsStoryboard()
    {
        if (! aiKimiEnabled()) {
            return $this->disabledResponse();
        }

        $db     = db_connect();
        $recent = $db->table('bf_marketing_scraper')
            ->orderBy('created_at', 'DESC')
            ->limit(6)
            ->get()
            ->getResultArray();

        $messages = [
            [
                'role'    => 'system',
                'content' => 'Produce a Coffee & Stocks storyboard with timestamps, headlines, bullet insights, and clear calls-to-action.',
            ],
            [
                'role'    => 'user',
                'content' => json_encode(['latest_news' => $recent], JSON_PRETTY_PRINT),
            ],
        ];

        try {
            $result = $this->kimi->chat($messages, [], null, ['temperature' => 0.35]);
            $content = $this->extractContent($result);
            return $this->respond([
                'status'  => 'ok',
                'message' => 'Storyboard drafted.',
                'content' => $content,
                'data'    => $result,
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'AdvisorController::generateNewsStoryboard failed: ' . $e->getMessage());
            return $this->failServerError('Unable to generate storyboard.');
        }
    }

    public function generateTradeAnalysis(int $alertId)
    {
        if (! aiKimiEnabled()) {
            return $this->disabledResponse();
        }

        $alert = model(AlertsModel::class)->find($alertId);
        if (! $alert) {
            return $this->failNotFound('Alert not found.');
        }

        $messages = [
            [
                'role'    => 'system',
                'content' => 'Provide a structured trade analysis: thesis, entries/exits, stop-loss, macro forces, risk score, alternatives.',
            ],
            [
                'role'    => 'user',
                'content' => json_encode($alert, JSON_PRETTY_PRINT),
            ],
        ];

        try {
            $result = $this->kimi->chat($messages, [], null, ['temperature' => 0.3]);
            $content = $this->extractContent($result);
            return $this->respond([
                'status'  => 'ok',
                'message' => 'Trade analysis generated.',
                'content' => $content,
                'data'    => $result,
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'AdvisorController::generateTradeAnalysis failed: ' . $e->getMessage());
            return $this->failServerError('Unable to generate trade analysis.');
        }
    }

    private function safeCall(callable $callback)
    {
        try {
            return $callback();
        } catch (\Throwable $e) {
            log_message('warning', 'AdvisorController helper call failed: ' . $e->getMessage());
            return null;
        }
    }

    private function disabledResponse()
    {
        return $this->response->setJSON([
            'status'  => 'disabled',
            'message' => 'Kimi AI Services are currently disabled by SiteSettings.',
        ]);
    }

    private function extractContent(array $result): string
    {
        return (string) ($result['choices'][0]['message']['content'] ?? '');
    }
}

<?php

declare(strict_types=1);

namespace Tests\Unit\Mcp;

use CodeIgniter\Test\CIUnitTestCase;

final class TradingMcpTest extends CIUnitTestCase
{
    private string $bridgePath;
    private string $serverPath;

    protected function setUp(): void
    {
        parent::setUp();
        $this->bridgePath = ROOTPATH . 'scripts/mcp/trading_bridge.php';
        $this->serverPath = ROOTPATH . 'scripts/mcp/trading_mcp_server.py';
    }

    private function runBridge(string $tool, array $args = []): array
    {
        $cmd = sprintf(
            'php %s %s %s',
            escapeshellarg($this->bridgePath),
            escapeshellarg($tool),
            escapeshellarg(json_encode($args))
        );

        $output = shell_exec($cmd);
        $this->assertNotEmpty($output, "Bridge command returned empty output for {$tool}");

        $decoded = json_decode($output, true);
        $this->assertIsArray($decoded, "Bridge output was not valid JSON for {$tool}: {$output}");

        return $decoded;
    }

    /**
     * Test mymi.capabilities returns 11 tools, read-only flag, and provenance.
     */
    public function testMymiCapabilities(): void
    {
        $res = $this->runBridge('mymi.capabilities');

        $this->assertSame('success', $res['status']);
        $this->assertTrue($res['data']['read_only']);
        $this->assertFalse($res['data']['source_mutation']);
        $this->assertFalse($res['data']['broker_execution_enabled']);
        $this->assertCount(11, $res['data']['available_tools']);
        $this->assertContains('mymi.capabilities', $res['data']['available_tools']);
        $this->assertContains('mymi.market_scan', $res['data']['available_tools']);
        $this->assertContains('mymi.risk_check', $res['data']['available_tools']);
        $this->assertSame('MyMI System Registry', $res['provenance']['provider']);
        $this->assertTrue($res['provenance']['read_only']);
    }

    /**
     * Test mymi.market_snapshot returns ticker metrics and ATR/RVOL.
     */
    public function testMymiMarketSnapshot(): void
    {
        $res = $this->runBridge('mymi.market_snapshot', ['ticker' => 'NVDA']);

        $this->assertSame('success', $res['status']);
        $this->assertSame('NVDA', $res['data']['ticker']);
        $this->assertGreaterThan(0.0, $res['data']['price']);
        $this->assertGreaterThan(0.0, $res['data']['atr_14']);
        $this->assertGreaterThan(0.0, $res['data']['rvol_20d']);
    }

    /**
     * Test mymi.market_scan returns candidates with 5-part research breakdown.
     */
    public function testMymiMarketScan(): void
    {
        $res = $this->runBridge('mymi.market_scan', [
            'universe' => ['NVDA', 'SPY'],
            'min_rvol' => 0.5,
        ]);

        $this->assertSame('success', $res['status']);
        $this->assertCount(2, $res['data']['candidates']);
        $cand = $res['data']['candidates'][0];

        $this->assertArrayHasKey('ranking_breakdown', $cand);
        $this->assertArrayHasKey('technical_setup', $cand['ranking_breakdown']);
        $this->assertArrayHasKey('catalyst_quality', $cand['ranking_breakdown']);
        $this->assertArrayHasKey('execution_liquidity', $cand['ranking_breakdown']);
        $this->assertArrayHasKey('risk_reward', $cand['ranking_breakdown']);
        $this->assertArrayHasKey('capital_suitability', $cand['ranking_breakdown']);
        $this->assertContains($cand['recommendation'], ['TRADE', 'NO TRADE']);
    }

    /**
     * Test mymi.options_chain returns strikes around ATM.
     */
    public function testMymiOptionsChain(): void
    {
        $res = $this->runBridge('mymi.options_chain', ['ticker' => 'NVDA']);

        $this->assertSame('success', $res['status']);
        $this->assertSame('NVDA', $res['data']['ticker']);
        $this->assertNotEmpty($res['data']['chain']);
        $firstStrike = $res['data']['chain'][0];
        $this->assertArrayHasKey('call', $firstStrike);
        $this->assertArrayHasKey('put', $firstStrike);
    }

    /**
     * Test mymi.strategy_simulate calculates two-sided sizing and target profit.
     */
    public function testMymiStrategySimulate(): void
    {
        $res = $this->runBridge('mymi.strategy_simulate', [
            'ticker' => 'NVDA',
            'strategy' => 'strangle',
            'call_debit' => 0.95,
            'put_debit' => 0.95,
            'target_profit' => 200.0,
        ]);

        $this->assertSame('success', $res['status']);
        $this->assertEqualsWithDelta(200.0, (float) $res['data']['entry_rules']['total_entry_balance'], 0.001);
        $this->assertEqualsWithDelta(1.90, (float) $res['data']['pricing']['combined_debit'], 0.001);
        $this->assertEqualsWithDelta(3.90, (float) $res['data']['pricing']['required_exit_value'], 0.001);
    }

    /**
     * Test private endpoints fail closed when user_id is missing or invalid.
     */
    public function testPrivateEndpointsFailClosed(): void
    {
        $resSummary = $this->runBridge('mymi.portfolio_summary', []);
        $this->assertSame('error', $resSummary['status']);
        $this->assertStringContainsString('Authentication required', $resSummary['error']);

        $resCampaigns = $this->runBridge('mymi.open_campaigns', ['user_id' => 0]);
        $this->assertSame('error', $resCampaigns['status']);
        $this->assertStringContainsString('Authentication required', $resCampaigns['error']);

        $resHistory = $this->runBridge('mymi.execution_history', ['user_id' => -1]);
        $this->assertSame('error', $resHistory['status']);
        $this->assertStringContainsString('Authentication required', $resHistory['error']);
    }

    /**
     * Test mymi.risk_check evaluates budget thresholds and residual runner invariant.
     */
    public function testMymiRiskCheck(): void
    {
        $res = $this->runBridge('mymi.risk_check', [
            'user_id' => 1,
            'proposed_debit' => 190.0,
        ]);

        $this->assertSame('success', $res['status']);
        $this->assertTrue($res['data']['is_within_campaign_budget']);
        $this->assertSame('PASS', $res['data']['risk_status']);
        $this->assertStringContainsString('strictly not risk-free', $res['data']['residual_runner_risk_policy']);

        // Exceed budget
        $resOver = $this->runBridge('mymi.risk_check', [
            'user_id' => 1,
            'proposed_debit' => 350.0,
        ]);
        $this->assertFalse($resOver['data']['is_within_campaign_budget']);
        $this->assertSame('WARN_EXCEEDS_CAMPAIGN_BUDGET', $resOver['data']['risk_status']);
    }

    /**
     * Test mymi.provider_health reports provider status without exposing secrets.
     */
    public function testMymiProviderHealth(): void
    {
        $res = $this->runBridge('mymi.provider_health');

        $this->assertSame('success', $res['status']);
        $this->assertArrayHasKey('alphavantage', $res['data']['providers']);
        $this->assertArrayHasKey('finnhub', $res['data']['providers']);
        $this->assertArrayHasKey('stooq', $res['data']['providers']);
        // Verify no raw key strings exist in response
        $raw = json_encode($res);
        $this->assertStringNotContainsString('sk_', $raw);
        $this->assertStringNotContainsString('secret', $raw);
    }
}

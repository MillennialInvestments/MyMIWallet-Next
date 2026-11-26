<?php

declare(strict_types=1);

namespace Tests\Unit\Mcp;

use CodeIgniter\Test\CIUnitTestCase;

final class PlatformMcpTest extends CIUnitTestCase
{
    private string $bridgePath;
    private string $serverPath;

    protected function setUp(): void
    {
        parent::setUp();
        $this->bridgePath = ROOTPATH . 'scripts/mcp/mymi_platform_bridge.php';
        $this->serverPath = ROOTPATH . 'scripts/mcp/mymi_platform_mcp_server.py';
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

    public function testPlatformStatusReturnsValidStructure(): void
    {
        $res = $this->runBridge('mymi.platform_status');

        $this->assertArrayHasKey('provenance', $res);
        $this->assertTrue($res['provenance']['read_only']);
        $this->assertFalse($res['provenance']['mutation_allowed']);
        $this->assertSame('MyMI Platform Core', $res['provenance']['provider']);

        $this->assertArrayHasKey('platform', $res);
        $this->assertStringContainsString('CodeIgniter', $res['platform']['framework']);
        $this->assertArrayHasKey('database', $res);
        $this->assertArrayHasKey('telemetry', $res);
    }

    public function testMembershipsCatalogReturnsAllFourTiers(): void
    {
        $res = $this->runBridge('mymi.memberships_catalog');

        $this->assertArrayHasKey('tiers', $res);
        $this->assertArrayHasKey('bronze', $res['tiers']);
        $this->assertArrayHasKey('silver', $res['tiers']);
        $this->assertArrayHasKey('gold', $res['tiers']);
        $this->assertArrayHasKey('platinum', $res['tiers']);

        $this->assertSame(0, $res['tiers']['bronze']['monthly_usd']);
        $this->assertSame(24.99, $res['tiers']['gold']['monthly_usd']);
        $this->assertArrayHasKey('gateways', $res);
    }

    public function testAICopilotTelemetry(): void
    {
        $res = $this->runBridge('mymi.ai_copilot_telemetry', [
            'sample_text' => 'Buying $AAPL and $NVDA call options',
        ]);

        $this->assertArrayHasKey('ip_rate_limits', $res);
        $this->assertSame(5, $res['ip_rate_limits']['max_questions_per_day']);
        $this->assertArrayHasKey('ticker_intelligence', $res);
        $this->assertContains('AAPL', $res['ticker_intelligence']['extracted_tokens']);
        $this->assertContains('NVDA', $res['ticker_intelligence']['extracted_tokens']);
    }

    public function testModelLimitAuditReportsClean(): void
    {
        $res = $this->runBridge('mymi.model_limit_audit');

        $this->assertSame(0, $res['exit_code']);
        $this->assertTrue($res['audit_clean']);
        $this->assertStringContainsString('No unsafe model query patterns detected', $res['findings_output']);
    }

    public function testFormCertificationAudit(): void
    {
        $res = $this->runBridge('mymi.form_certification_audit');

        $this->assertArrayHasKey('form_ratchet', $res);
        $this->assertSame('shrink-only', $res['form_ratchet']['ratchet_rule']);
        $this->assertIsInt($res['form_ratchet']['allowed_gaps']);
    }

    public function testServerStdioJsonRpc(): void
    {
        $input = json_encode([
            'jsonrpc' => '2.0',
            'id'      => 42,
            'method'  => 'tools/call',
            'params'  => [
                'name'      => 'mymi.platform_status',
                'arguments' => [],
            ],
        ]) . "\n";

        $desc = [
            0 => ['pipe', 'r'],
            1 => ['pipe', 'w'],
            2 => ['pipe', 'w'],
        ];

        $proc = proc_open("python3 {$this->serverPath}", $desc, $pipes);
        $this->assertIsResource($proc);

        fwrite($pipes[0], $input);
        fclose($pipes[0]);

        $out = stream_get_contents($pipes[1]);
        fclose($pipes[1]);
        fclose($pipes[2]);
        proc_close($proc);

        $decoded = json_decode(trim($out), true);
        $this->assertSame('2.0', $decoded['jsonrpc']);
        $this->assertSame(42, $decoded['id']);
        $this->assertArrayHasKey('result', $decoded);
        $this->assertFalse($decoded['result']['isError']);
    }
}

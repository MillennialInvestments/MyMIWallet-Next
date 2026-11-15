<?php

declare(strict_types=1);

namespace Tests\Unit\AIOps;

use App\Services\AIOps\FormDebugSeederAuditService;
use App\Services\AIOps\FormIntelligenceService;
use App\Services\AIOps\FormRouteMatcher;
use App\Services\AIOps\FormSubmissionPolicy;
use App\Services\AIOps\FormTestExecutor;
use PHPUnit\Framework\TestCase;

/**
 * GT-FORM-HARNESS-001: the form harness must never submit, write to the DB, or
 * write into the source tree unless an operator explicitly approves a run on an
 * allow-listed, non-production host.
 */
final class FormHarnessSafetyTest extends TestCase
{
    private function matcher(): FormRouteMatcher
    {
        return new FormRouteMatcher([
            ['method' => 'POST', 'route' => 'Budget/Add', 'handler' => '\App\Modules\User\Controllers\BudgetController::add'],
            ['method' => 'GET', 'route' => 'Budget/Add', 'handler' => '\App\Modules\User\Controllers\BudgetController::addForm'],
            ['method' => 'POST', 'route' => 'Wallets/Edit/([0-9]+)', 'handler' => '\App\Modules\User\Controllers\WalletsController::edit/$1'],
            ['method' => 'GET', 'route' => 'Subscribe/Submit', 'handler' => '\App\Controllers\SubscribeController::submit'],
            ['method' => 'POST', 'route' => 'API/Notes/save', 'handler' => '\App\Controllers\NotesController::save'],
        ]);
    }

    // ---------------------------------------------------------------- policy

    public function testPolicyDeniesWithoutAllThreeFlags(): void
    {
        foreach ([[false, true, true], [true, false, true], [true, true, false], [false, false, false]] as [$s, $d, $a]) {
            $r = FormSubmissionPolicy::evaluate($s, $d, $a, 'testing', 'http://staging.test/', ['staging.test']);
            $this->assertFalse($r['allowed']);
            $this->assertSame('flags_missing', $r['reason']);
        }
    }

    public function testPolicyDeniesProductionEnvironmentAndHosts(): void
    {
        $r = FormSubmissionPolicy::evaluate(true, true, true, 'production', 'http://staging.test/', ['staging.test']);
        $this->assertSame('production_environment', $r['reason']);

        foreach (['https://mymiwallet.com/', 'https://www.mymiwallet.com/index.php/'] as $url) {
            $r = FormSubmissionPolicy::evaluate(true, true, true, 'testing', $url, ['mymiwallet.com', 'www.mymiwallet.com']);
            $this->assertFalse($r['allowed'], $url);
            $this->assertSame('production_host', $r['reason']);
        }
    }

    public function testPolicyDeniesWhenAllowlistIsEmptyOrHostIsNotListed(): void
    {
        $this->assertSame('host_not_allowlisted', FormSubmissionPolicy::evaluate(true, true, true, 'development', 'http://localhost:8080/', [])['reason']);
        $this->assertSame('host_not_allowlisted', FormSubmissionPolicy::evaluate(true, true, true, 'development', 'http://other.test/', ['staging.test'])['reason']);
        $this->assertSame('target_host_unknown', FormSubmissionPolicy::evaluate(true, true, true, 'development', '/relative', ['staging.test'])['reason']);
    }

    public function testPolicyAllowsOnlyTheFullyApprovedCase(): void
    {
        $r = FormSubmissionPolicy::evaluate(true, true, true, 'development', 'http://Staging.Test/', [' staging.test ']);
        $this->assertTrue($r['allowed']);
        $this->assertSame('approved', $r['reason']);
    }

    public function testReportDirectoryMayNotBeInsideTheSourceTree(): void
    {
        $root = '/srv/app/';
        $write = '/srv/app/writable/';
        $this->assertFalse(FormSubmissionPolicy::isAllowedReportDir('/srv/app/docs/_aiops/form-tests', $root, $write));
        $this->assertFalse(FormSubmissionPolicy::isAllowedReportDir('/srv/app/writable/../docs', $root, $write));
        $this->assertTrue(FormSubmissionPolicy::isAllowedReportDir('/srv/app/writable/aiops/form-tests', $root, $write));
        $this->assertTrue(FormSubmissionPolicy::isAllowedReportDir('/var/evidence/forms', $root, $write));

        $this->expectException(\RuntimeException::class);
        FormSubmissionPolicy::reportDir(ROOTPATH . 'docs/_aiops/form-tests');
    }

    // -------------------------------------------------------------- executor

    public function testExecutorRefusesWithoutAnApprovedPolicyAndTouchesNothing(): void
    {
        $analysis = ['ok' => true, 'source' => ['type' => 'text', 'value' => ''], 'form' => ['action' => '/Budget/Add', 'method' => 'POST', 'inputs' => ['amount']]];
        $executor = new FormTestExecutor();

        // No DB is configured in the unit suite: any insert or HTTP call would throw.
        foreach ([[], ['policy' => ['allowed' => false, 'reason' => 'flags_missing']], ['policy' => ['allowed' => 'yes']]] as $options) {
            $r = $executor->execute($analysis, $options);
            $this->assertFalse($r['ok']);
            $this->assertSame('BLOCKED', $r['status']);
            $this->assertNull($r['test_id']);
            $this->assertArrayNotHasKey('submit', $r);
        }
    }

    public function testPlanPreviewsSyntheticPayloadWithoutSending(): void
    {
        $plan = (new FormTestExecutor())->plan(['form' => ['action' => '/Budget/Add', 'method' => 'post', 'inputs' => ['email', 'csrf_test_name', 'amount']]]);
        $this->assertSame('SKIPPED', $plan['status']);
        $this->assertSame('dry_run', $plan['reason']);
        $this->assertSame('POST', $plan['method']);
        $this->assertStringEndsWith('@example.test', $plan['payload']['email']);
        $this->assertArrayNotHasKey('csrf_test_name', $plan['payload']);
        $this->assertMatchesRegularExpression('/^\d+\.\d{2}$/', $plan['payload']['amount']);
    }

    // ------------------------------------------------------------ inventory

    public function testInventoryParsesEveryFormAndJsRequestInAFile(): void
    {
        $src = <<<'PHP'
<div>
<?= form_open('Budget/Add', ['id' => 'add']) ?>
  <input name="amount" required>
<?= form_close() ?>
<form id="edit" action="<?= site_url('Wallets/Edit/' . $wallet['id']) ?>" method="post">
  <?= csrf_field() ?>
  <input name="nickname">
</form>
<form action="<?= base_url('Subscribe/Submit') ?>" method="post"><input name="email" type="email"></form>
<form action="" method="post"><input name="q"></form>
<script>
fetch('<?= site_url("API/Notes/save") ?>', { method: 'POST', body: data });
$.post('/budget/add', {});
</script>
</div>
PHP;
        $entries = (new FormIntelligenceService($this->matcher()))->inventory($src, 'app/Views/demo.php');
        $this->assertCount(6, $entries);

        $by = [];
        foreach ($entries as $e) {
            $by[$e['kind'] . ' ' . $e['line']] = $e;
            $this->assertMatchesRegularExpression('/^F-[0-9a-f]{12}$/', $e['key']);
            $this->assertContains($e['status'], ['PASS', 'FAIL', 'BLOCKED', 'SKIPPED']);
        }

        // form_open(): POST + CSRF, line preserved.
        $this->assertSame(['PASS', 'route_matched', 'POST', '/Budget/Add', true], [$by['form 2']['status'], $by['form 2']['reason'], $by['form 2']['method'], $by['form 2']['action'], $by['form 2']['csrf']]);
        $this->assertSame('App\Modules\User\Controllers\BudgetController', $by['form 2']['route']['controller']);
        $this->assertSame(['amount'], array_column($by['form 2']['inputs'], 'name'));
        $this->assertTrue($by['form 2']['inputs'][0]['required']);

        // Dynamic segment after a static prefix: sampled and matched.
        $this->assertSame('PASS', $by['form 5']['status']);
        $this->assertSame('route_matched_sampled_segment', $by['form 5']['reason']);
        $this->assertTrue($by['form 5']['csrf']);

        // Route exists only for GET: a POST form is a real defect.
        $this->assertSame(['FAIL', 'verb_mismatch'], [$by['form 9']['status'], $by['form 9']['reason']]);
        $this->assertSame(['GET'], $by['form 9']['route']['verbs']);

        $this->assertSame(['BLOCKED', 'blank_action'], [$by['form 10']['status'], $by['form 10']['reason']]);

        // JS: fetch with method option, and a case-only match.
        $this->assertSame(['PASS', 'POST', '/API/Notes/save'], [$by['js 12']['status'], $by['js 12']['method'], $by['js 12']['action']]);
        $this->assertSame(['FAIL', 'case_mismatch'], [$by['js 13']['status'], $by['js 13']['reason']]);
    }

    public function testKeysAreStableAndLegacyFilesAreSkipped(): void
    {
        $svc = new FormIntelligenceService($this->matcher());
        $a = $svc->inventory('<form action="/Budget/Add" method="post"></form>', 'app/Views/x.php');
        $b = $svc->inventory("\n\n<p>moved</p>\n<form action=\"/Budget/Add\" method=\"post\"></form>", 'app/Views/x.php');
        $this->assertSame($a[0]['key'], $b[0]['key']);

        $legacy = $svc->inventory('<form action="/nowhere" method="post"></form>', 'app/Views/Budget/Add-04042024.php');
        $this->assertSame(['SKIPPED', 'legacy_file'], [$legacy[0]['status'], $legacy[0]['reason']]);
        $this->assertTrue(FormIntelligenceService::isLegacyPath('app/Views/Auth_orig/login.php') || FormIntelligenceService::isLegacyPath('app/Views/login_orig.php'));
        $this->assertFalse(FormIntelligenceService::isLegacyPath('app/Views/Budget/Add.php'));
    }

    public function testUnknownAndDynamicActionsAreNotGuessed(): void
    {
        $svc = new FormIntelligenceService($this->matcher());
        $e = $svc->inventory('<form action="<?= $action ?>" method="post"></form><form action="/Nope" method="post"></form><form action="https://example.org/x" method="post"></form>', 'a.php');
        $this->assertSame(['BLOCKED', 'dynamic_action'], [$e[0]['status'], $e[0]['reason']]);
        $this->assertSame(['FAIL', 'no_route'], [$e[1]['status'], $e[1]['reason']]);
        $this->assertSame(['SKIPPED', 'external_action'], [$e[2]['status'], $e[2]['reason']]);
    }

    // --------------------------------------------------------- audit service

    public function testPlatformAuditDefaultsToReadOnly(): void
    {
        $docsDir = ROOTPATH . 'docs/_aiops/form-tests';
        $before = is_dir($docsDir) ? scandir($docsDir) : null;

        $report = (new FormDebugSeederAuditService())->run(['limit' => 3, 'write_reports' => false]);

        $this->assertSame('mymi.form-inventory.v1', $report['schema']);
        $this->assertTrue($report['options']['dry_run']);
        $this->assertFalse($report['options']['live']);
        $this->assertFalse($report['options']['db_counts']);
        $this->assertSame(0, $report['summary']['forms_submitted']);
        $this->assertFalse($report['seeder']['executed']);
        foreach ($report['forms'] as $e) {
            $this->assertFalse($e['submission']['executed']);
        }
        $this->assertSame($before, is_dir($docsDir) ? scandir($docsDir) : null, 'Audit must not write into docs/');
    }

    public function testLiveAuditNeedsAnApprovedPolicyEvenWhenDryRunIsOff(): void
    {
        $report = (new FormDebugSeederAuditService())->run([
            'dry_run' => false,
            'policy' => ['allowed' => false, 'reason' => 'host_not_allowlisted'],
            'limit' => 2,
            'write_reports' => false,
        ]);
        $this->assertFalse($report['options']['live']);
        $this->assertSame(0, $report['summary']['forms_submitted']);
    }
}

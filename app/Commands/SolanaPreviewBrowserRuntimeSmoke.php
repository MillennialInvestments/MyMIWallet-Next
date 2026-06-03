<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class SolanaPreviewBrowserRuntimeSmoke extends BaseCommand
{
    protected $group       = 'Solana';
    protected $name        = 'solana:preview-browser-runtime:smoke';
    protected $description = 'Phase 16 browser-runtime simulation for Solana preview modal and wallet-signature safety flow.';

    private int $pass = 0;
    private int $fail = 0;

    public function run(array $params)
    {
        CLI::write('');
        CLI::write('============================================================', 'yellow');
        CLI::write('SOLANA PREVIEW BROWSER RUNTIME SMOKE - PHASE 16', 'yellow');
        CLI::write('============================================================', 'yellow');
        CLI::write('Safety: simulated browser only; no private keys, broadcasts, minting, or execution calls.');
        CLI::write('');

        $previewJs = ROOTPATH . 'public/assets/js/Solana/preview-ux-modal.js';

        $this->checkFileExists('Preview UX JS exists', $previewJs);
        $this->checkFileContains('Preview UX JS has Phase 14 marker', $previewJs, 'MYMI_SOLANA_PREVIEW_UX_MODAL_PHASE14');
        $this->checkFileContains('Preview UX JS intercepts submit in capture phase', $previewJs, "document.addEventListener('submit'");
        $this->checkFileContains('Preview UX JS stops immediate propagation', $previewJs, 'stopImmediatePropagation');
        $this->checkFileContains('Preview UX JS calls swap preview fallback endpoint', $previewJs, '/index.php/API/Solana/swap/preview');
        $this->checkFileContains('Preview UX JS forces dry_run=true', $previewJs, 'payload.dry_run = true');
        $this->checkFileContains('Preview UX JS forces broadcast=false', $previewJs, 'payload.broadcast = false');
        $this->checkFileContains('Preview UX JS requires signature', $previewJs, 'payload.signature_required = true');
        $this->checkFileContains('Preview UX JS requires wallet signature', $previewJs, 'payload.wallet_signature_required = true');
        $this->checkFileContains('Preview UX JS blocks private key submission', $previewJs, 'payload.private_key_submission_allowed = false');
        $this->checkFileContains('Preview UX JS neutralizes private key fields', $previewJs, 'neutralizePrivateKeyFields');

        $this->checkFileContains('coinSwap view includes preview runtime config', ROOTPATH . 'app/Modules/Exchange/Views/Solana/coinSwap.php', 'mymiSolanaPreviewConfig');
        $this->checkFileContains('swap view includes preview runtime config', ROOTPATH . 'app/Modules/Exchange/Views/Solana/swap.php', 'mymiSolanaPreviewConfig');
        $this->checkFileContains('trade view includes preview runtime config', ROOTPATH . 'app/Modules/Exchange/Views/Solana/trade.php', 'mymiSolanaPreviewConfig');

        $routes = $this->collectRoutes();
        $this->checkStringContains('Preview swap API route exists', $routes, 'API/Solana/swap/preview');
        $this->checkStringContains('Preview transaction API route exists', $routes, 'API/Solana/transaction/preview');
        $this->checkStringContains('Preview swap route uses CSRF', $this->routeLine($routes, 'API/Solana/swap/preview'), 'csrf');
        $this->checkStringContains('Preview transaction route uses CSRF', $this->routeLine($routes, 'API/Solana/transaction/preview'), 'csrf');
        $this->checkStringContains('Swap execute route remains trackable', $routes, 'API/Solana/swap/execute');
        $this->checkStringContains('Token mint route remains trackable', $routes, 'API/Solana/token/mint');

        $this->checkNodeAvailable();
        $this->runNodeBrowserSimulation($previewJs);

        CLI::write('');
        CLI::write('============================================================', 'yellow');
        CLI::write('RESULT', 'yellow');
        CLI::write('============================================================', 'yellow');
        CLI::write('PASS count: ' . $this->pass, $this->fail === 0 ? 'green' : 'white');
        CLI::write('FAIL count: ' . $this->fail, $this->fail === 0 ? 'green' : 'red');

        return $this->fail === 0 ? EXIT_SUCCESS : EXIT_ERROR;
    }

    private function checkNodeAvailable(): void
    {
        $output = [];
        $code = 1;
        exec('command -v node 2>&1', $output, $code);

        $this->record('Node runtime is available for browser simulation', $code === 0 && trim(implode("\n", $output)) !== '');
    }

    private function runNodeBrowserSimulation(string $previewJs): void
    {
        if (! is_file($previewJs)) {
            $this->record('Browser simulation skipped because preview JS is missing', false);
            return;
        }

        $scriptPath = WRITEPATH . 'cache/solana-preview-browser-runtime-smoke.cjs';

        $fixturePath = ROOTPATH . 'tests/fixtures/solana/preview-browser-runtime-smoke.cjs';

        if (! is_file($fixturePath)) {
            $this->record('Browser simulation fixture exists', false);
            return;
        }

        $script = file_get_contents($fixturePath);

        if (! is_string($script) || trim($script) === '') {
            $this->record('Browser simulation fixture is readable', false);
            return;
        }

        $this->record('Browser simulation fixture is readable', true);

        if (! is_dir(dirname($scriptPath))) {
            mkdir(dirname($scriptPath), 0775, true);
        }

        file_put_contents($scriptPath, $script);

        $output = [];
        $code = 1;
        $cmd = 'node ' . escapeshellarg($scriptPath) . ' ' . escapeshellarg($previewJs) . ' 2>&1';
        exec($cmd, $output, $code);

        CLI::write('');
        CLI::write('--- Node Browser Simulation Output ---', 'yellow');

        foreach ($output as $line) {
            if (str_starts_with($line, 'PASS:')) {
                CLI::write($line, 'green');
            } elseif (str_starts_with($line, 'FAIL:')) {
                CLI::write($line, 'red');
            } else {
                CLI::write($line);
            }
        }

        $this->record('Node browser simulation completed successfully', $code === 0);
    }

    private function checkFileExists(string $label, string $file): void
    {
        $this->record($label, is_file($file));
    }

    private function checkFileContains(string $label, string $file, string $needle): void
    {
        if (! is_file($file)) {
            $this->record($label . ' file missing', false);
            return;
        }

        $content = file_get_contents($file);
        $this->record($label, is_string($content) && strpos($content, $needle) !== false);
    }

    private function checkStringContains(string $label, string $haystack, string $needle): void
    {
        $this->record($label, strpos($haystack, $needle) !== false);
    }

    private function collectRoutes(): string
    {
        $command = PHP_BINARY . ' ' . escapeshellarg(ROOTPATH . 'spark') . ' routes 2>&1';
        $output = shell_exec($command);

        return is_string($output) ? $output : '';
    }

    private function routeLine(string $routes, string $needle): string
    {
        $lines = preg_split('/\R/', $routes) ?: [];

        foreach ($lines as $line) {
            if (strpos($line, $needle) !== false) {
                return $line;
            }
        }

        return '';
    }

    private function record(string $label, bool $passed): void
    {
        if ($passed) {
            $this->pass++;
            CLI::write('PASS: ' . $label, 'green');
            return;
        }

        $this->fail++;
        CLI::write('FAIL: ' . $label, 'red');
    }
}

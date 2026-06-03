<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class SolanaPreviewRuntimeSmoke extends BaseCommand
{
    protected $group       = 'Solana';
    protected $name        = 'solana:preview-runtime:smoke';
    protected $description = 'Phase 15 smoke test for Solana preview UX runtime safety markers and preview-only API routes.';

    private int $pass = 0;
    private int $fail = 0;

    public function run(array $params)
    {
        CLI::write('');
        CLI::write('============================================================', 'yellow');
        CLI::write('SOLANA PREVIEW RUNTIME SMOKE - PHASE 15', 'yellow');
        CLI::write('============================================================', 'yellow');
        CLI::write('Safety: preview-only, no private keys, no broadcasts, no minting.');
        CLI::write('');

        $previewJs = ROOTPATH . 'public/assets/js/Solana/preview-ux-modal.js';

        $this->checkFileExists('Preview UX JS exists', $previewJs);
        $this->checkFileContains('Preview UX JS has Phase 14 marker', $previewJs, 'MYMI_SOLANA_PREVIEW_UX_MODAL_PHASE14');
        $this->checkFileContains('Preview UX JS forces dry_run=true', $previewJs, 'payload.dry_run = true');
        $this->checkFileContains('Preview UX JS forces broadcast=false', $previewJs, 'payload.broadcast = false');
        $this->checkFileContains('Preview UX JS requires signature', $previewJs, 'payload.signature_required = true');
        $this->checkFileContains('Preview UX JS requires wallet signature', $previewJs, 'payload.wallet_signature_required = true');
        $this->checkFileContains('Preview UX JS blocks private key submission', $previewJs, 'payload.private_key_submission_allowed = false');
        $this->checkFileContains('Preview UX JS strips private_key field', $previewJs, "'private_key'");
        $this->checkFileContains('Preview UX JS strips privateKey field', $previewJs, "'privateKey'");
        $this->checkFileContains('Preview UX JS strips seed phrase fields', $previewJs, "'seed_phrase'");
        $this->checkFileContains('Preview UX JS strips mnemonic field', $previewJs, "'mnemonic'");
        $this->checkFileContains('Preview UX JS neutralizes private key fields', $previewJs, 'neutralizePrivateKeyFields');
        $this->checkFileContains('Preview UX JS stops normal form submission', $previewJs, 'stopImmediatePropagation');
        $this->checkFileContains('Preview UX JS uses swap preview fallback endpoint', $previewJs, '/index.php/API/Solana/swap/preview');
        $this->checkFileNotContains('Preview UX JS does not call swap execute endpoint directly', $previewJs, '/API/Solana/swap/execute');
        $this->checkFileNotContains('Preview UX JS does not call token mint endpoint directly', $previewJs, '/API/Solana/token/mint');

        $views = [
            'coinSwap view' => ROOTPATH . 'app/Modules/Exchange/Views/Solana/coinSwap.php',
            'swap view'     => ROOTPATH . 'app/Modules/Exchange/Views/Solana/swap.php',
            'trade view'    => ROOTPATH . 'app/Modules/Exchange/Views/Solana/trade.php',
        ];

        foreach ($views as $label => $file) {
            $this->checkFileContains($label . ' injects preview UX JS', $file, 'preview-ux-modal.js');
            $this->checkFileContains($label . ' configures swap preview URL', $file, 'API/Solana/swap/preview');
            $this->checkFileContains($label . ' configures transaction preview URL', $file, 'API/Solana/transaction/preview');
        }

        $routes = $this->collectRoutes();

        $this->checkStringContains('Preview transaction route exists', $routes, 'API/Solana/transaction/preview');
        $this->checkStringContains('Preview swap route exists', $routes, 'API/Solana/swap/preview');
        $this->checkStringContains('Preview transaction route uses CSRF', $this->routeLine($routes, 'API/Solana/transaction/preview'), 'csrf');
        $this->checkStringContains('Preview swap route uses CSRF', $this->routeLine($routes, 'API/Solana/swap/preview'), 'csrf');

        $this->checkStringContains('Swap execute route remains trackable for safety monitoring', $routes, 'API/Solana/swap/execute');
        $this->checkStringContains('Token mint route remains trackable for safety monitoring', $routes, 'API/Solana/token/mint');

        CLI::write('');
        CLI::write('============================================================', 'yellow');
        CLI::write('RESULT', 'yellow');
        CLI::write('============================================================', 'yellow');
        CLI::write('PASS count: ' . $this->pass, $this->fail === 0 ? 'green' : 'white');
        CLI::write('FAIL count: ' . $this->fail, $this->fail === 0 ? 'green' : 'red');

        return $this->fail === 0 ? EXIT_SUCCESS : EXIT_ERROR;
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

    private function checkFileNotContains(string $label, string $file, string $needle): void
    {
        if (! is_file($file)) {
            $this->record($label . ' file missing', false);
            return;
        }

        $content = file_get_contents($file);
        $this->record($label, is_string($content) && strpos($content, $needle) === false);
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

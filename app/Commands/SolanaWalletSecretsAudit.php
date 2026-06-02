<?php

declare(strict_types=1);

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Throwable;

class SolanaWalletSecretsAudit extends BaseCommand
{
    protected $group       = 'Solana';
    protected $name        = 'solana:wallet-secrets:audit';
    protected $description = 'Audit and optionally encrypt existing plaintext Solana wallet access_token values.';
    protected $usage       = 'solana:wallet-secrets:audit [--apply] [--limit=500] [--include-all-crypto] [--guardrails-smoke]';
    protected $options     = [
        '--apply'              => 'Encrypt plaintext candidate rows. Default is dry-run.',
        '--limit'              => 'Maximum rows to scan. Default: 500.',
        '--include-all-crypto' => 'Scan all wallet_type=Crypto rows, not only Solana-labeled rows.',
        '--guardrails-smoke'  => 'Run Solana transaction guardrail smoke validation without private keys, broadcasts, or mainnet minting.',
    ];

    public function run(array $params)
    {
        $options = array_merge(
            $this->parseOptions(array_slice($_SERVER['argv'] ?? [], 2)),
            $this->parseOptions($params)
        );

        if (array_key_exists('guardrails-smoke', $options) || CLI::getOption('guardrails-smoke') !== null) {
            return $this->runGuardrailsSmoke();
        }

        $apply = array_key_exists('apply', $options) || CLI::getOption('apply') !== null;
        $includeAllCrypto = array_key_exists('include-all-crypto', $options) || CLI::getOption('include-all-crypto') !== null;
        $limitOption = $options['limit'] ?? CLI::getOption('limit') ?? 500;
        $limit = max(1, (int) $limitOption);

        $db = db_connect();

        if (! $db->tableExists('bf_users_wallet')) {
            CLI::error('Table bf_users_wallet was not found.');
            return EXIT_ERROR;
        }

        $fields = $db->getFieldNames('bf_users_wallet');

        foreach (['id', 'access_token'] as $required) {
            if (! in_array($required, $fields, true)) {
                CLI::error("Required column {$required} was not found in bf_users_wallet.");
                return EXIT_ERROR;
            }
        }

        $select = array_values(array_intersect([
            'id',
            'user_id',
            'wallet_type',
            'market',
            'nickname',
            'public_token',
            'access_token',
            'created_at',
            'updated_at',
        ], $fields));

        $builder = $db->table('bf_users_wallet')->select($select);

        if (in_array('access_token', $fields, true)) {
            $builder->where('access_token IS NOT NULL', null, false);
            $builder->where('access_token !=', '');
        }

        if (in_array('wallet_type', $fields, true)) {
            $builder->where('wallet_type', 'Crypto');
        }

        $rows = $builder->limit($limit)->get()->getResultArray();

        $reportRows = [];
        $counts = [
            'scanned' => 0,
            'candidate' => 0,
            'already_encrypted' => 0,
            'plaintext' => 0,
            'updated' => 0,
            'skipped' => 0,
            'errors' => 0,
        ];

        foreach ($rows as $row) {
            $counts['scanned']++;

            if (! $includeAllCrypto && ! $this->isLikelySolanaWallet($row)) {
                $counts['skipped']++;
                continue;
            }

            $counts['candidate']++;

            $id = (int) ($row['id'] ?? 0);
            $token = (string) ($row['access_token'] ?? '');
            $hash = substr(hash('sha256', $token), 0, 16);

            $classification = $this->classifyToken($token);

            $action = 'none';

            if ($classification === 'encrypted') {
                $counts['already_encrypted']++;
                $action = 'already_encrypted';
            } elseif ($classification === 'plaintext') {
                $counts['plaintext']++;

                if ($apply) {
                    try {
                        $encrypted = $this->encryptForStorage($token);

                        $update = ['access_token' => $encrypted];

                        if (in_array('updated_at', $fields, true)) {
                            $update['updated_at'] = date('Y-m-d H:i:s');
                        }

                        $db->table('bf_users_wallet')->where('id', $id)->update($update);

                        $counts['updated']++;
                        $action = 'encrypted';
                    } catch (Throwable $e) {
                        $counts['errors']++;
                        $action = 'error:' . $e->getMessage();

                        log_message('error', 'Solana wallet secret backfill failed for wallet_id={id}: {message}', [
                            'id' => $id,
                            'message' => $e->getMessage(),
                        ]);
                    }
                } else {
                    $action = 'would_encrypt';
                }
            } else {
                $counts['skipped']++;
                $action = 'unknown_skipped';
            }

            $reportRows[] = [
                'id' => $id,
                'user_id' => $row['user_id'] ?? '',
                'wallet_type' => $row['wallet_type'] ?? '',
                'market' => $row['market'] ?? '',
                'nickname' => $row['nickname'] ?? '',
                'public_token_hash' => substr(hash('sha256', (string) ($row['public_token'] ?? '')), 0, 16),
                'access_token_hash' => $hash,
                'classification' => $classification,
                'action' => $action,
            ];
        }

        $report = $this->writeReport($counts, $reportRows, $apply, $includeAllCrypto, $limit);

        CLI::write('Solana wallet secret audit complete.', 'green');
        CLI::write('Mode: ' . ($apply ? 'APPLY' : 'DRY-RUN'));
        CLI::write('Scanned: ' . $counts['scanned']);
        CLI::write('Candidates: ' . $counts['candidate']);
        CLI::write('Already encrypted: ' . $counts['already_encrypted']);
        CLI::write('Plaintext found: ' . $counts['plaintext']);
        CLI::write('Updated: ' . $counts['updated']);
        CLI::write('Skipped: ' . $counts['skipped']);
        CLI::write('Errors: ' . $counts['errors']);
        CLI::write('Report: ' . $report);

        return $counts['errors'] > 0 ? EXIT_ERROR : EXIT_SUCCESS;
    }

    private function isLikelySolanaWallet(array $row): bool
    {
        $market = strtolower((string) ($row['market'] ?? ''));
        $nickname = strtolower((string) ($row['nickname'] ?? ''));
        $walletType = strtolower((string) ($row['wallet_type'] ?? ''));

        if ($walletType !== '' && $walletType !== 'crypto') {
            return false;
        }

        if ($market === 'sol' || $market === 'solana') {
            return true;
        }

        if (str_contains($nickname, 'solana') || str_contains($nickname, 'mymi solana')) {
            return true;
        }

        return false;
    }

    private function classifyToken(string $token): string
    {
        $token = trim($token);

        if ($token === '') {
            return 'empty';
        }

        $decoded = base64_decode($token, true);

        if ($decoded !== false && $decoded !== '') {
            try {
                $plain = service('encrypter')->decrypt($decoded);

                if (is_string($plain) && $plain !== '') {
                    return 'encrypted';
                }
            } catch (Throwable $e) {
                // Not decryptable by current app key; treat as plaintext candidate unless proven otherwise.
            }
        }

        return 'plaintext';
    }

    private function encryptForStorage(string $secret): string
    {
        $secret = trim($secret);

        if ($secret === '') {
            throw new \RuntimeException('Cannot encrypt empty secret.');
        }

        return base64_encode(service('encrypter')->encrypt($secret));
    }

    private function writeReport(array $counts, array $rows, bool $apply, bool $includeAllCrypto, int $limit): string
    {
        $dir = ROOTPATH . 'docs/_aiops/reports/solana-security-hardening';

        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        $path = $dir . '/wallet-secret-backfill-audit-' . gmdate('Ymd-His') . '.md';

        $lines = [];
        $lines[] = '# Solana Wallet Secret Backfill Audit';
        $lines[] = '';
        $lines[] = '- Generated: ' . gmdate('c');
        $lines[] = '- Mode: ' . ($apply ? 'APPLY' : 'DRY-RUN');
        $lines[] = '- Limit: ' . $limit;
        $lines[] = '- Include all crypto: ' . ($includeAllCrypto ? 'yes' : 'no');
        $lines[] = '';
        $lines[] = '## Counts';
        $lines[] = '';
        foreach ($counts as $key => $value) {
            $lines[] = '- ' . $key . ': ' . $value;
        }

        $lines[] = '';
        $lines[] = '## Rows';
        $lines[] = '';
        $lines[] = '| id | user_id | wallet_type | market | nickname | public_token_hash | access_token_hash | classification | action |';
        $lines[] = '|---:|---:|---|---|---|---|---|---|---|';

        foreach ($rows as $row) {
            $lines[] = sprintf(
                '| %s | %s | %s | %s | %s | %s | %s | %s | %s |',
                $row['id'],
                $row['user_id'],
                $this->md($row['wallet_type']),
                $this->md($row['market']),
                $this->md($row['nickname']),
                $row['public_token_hash'],
                $row['access_token_hash'],
                $row['classification'],
                $this->md($row['action'])
            );
        }

        $lines[] = '';
        $lines[] = '## Safety Notes';
        $lines[] = '';
        $lines[] = '- This report never prints raw `access_token`, private keys, mnemonics, or seed values.';
        $lines[] = '- Hashes are SHA-256 prefixes for comparison only.';
        $lines[] = '- Dry-run is the default. Use `--apply` only after reviewing candidate counts.';
        $lines[] = '';

        file_put_contents($path, implode("\n", $lines));

        return str_replace(ROOTPATH, '', $path);
    }

    private function md($value): string
    {
        $value = str_replace('|', '\\|', (string) $value);
        return trim($value) === '' ? '' : $value;
    }

    private function parseOptions(array $params): array
    {
        $options = [];
        $count = count($params);

        for ($i = 0; $i < $count; $i++) {
            $param = (string) $params[$i];

            if (! str_starts_with($param, '--')) {
                continue;
            }

            $param = substr($param, 2);

            if (str_contains($param, '=')) {
                [$key, $value] = explode('=', $param, 2);
                $options[$key] = trim($value, "\"'");
                continue;
            }

            $key = $param;

            if (in_array($key, ['apply', 'include-all-crypto'], true)) {
                $options[$key] = true;
                continue;
            }

            $next = $params[$i + 1] ?? null;

            if (is_string($next) && ! str_starts_with($next, '--')) {
                $options[$key] = trim($next, "\"'");
                $i++;
                continue;
            }

            $options[$key] = true;
        }

        return $options;
    }

    private function runGuardrailsSmoke(): int
    {
        $pass = 0;
        $fail = 0;

        CLI::write('============================================================');
        CLI::write('SOLANA GUARDRAILS SMOKE');
        CLI::write('============================================================');
        CLI::write('Safety: no private keys, no broadcasts, no mainnet minting.');
        CLI::newLine();

        CLI::write('## Config Defaults');

        $config = config(\Config\Solana::class);

        $this->guardrailAssertFalse('SOLANA_ALLOW_TRANSACTION_EXECUTION default false', (bool) ($config->allowTransactionExecution ?? true), $pass, $fail);
        $this->guardrailAssertFalse('SOLANA_ALLOW_MAINNET_BROADCAST default false', (bool) ($config->allowMainnetBroadcast ?? true), $pass, $fail);
        $this->guardrailAssertFalse('SOLANA_ALLOW_MAINNET_MINT default false', (bool) ($config->allowMainnetMint ?? true), $pass, $fail);
        $this->guardrailAssertFalse('SOLANA_ALLOW_PRIVATE_KEY_SUBMISSION default false', (bool) ($config->allowPrivateKeySubmission ?? true), $pass, $fail);
        $this->guardrailAssertTrue('SOLANA_REQUIRE_WALLET_SIGNATURE default true', (bool) ($config->requireWalletSignature ?? false), $pass, $fail);
        $this->guardrailAssertTrue('SOLANA_DEFAULT_DRY_RUN default true', (bool) ($config->defaultDryRun ?? false), $pass, $fail);

        CLI::newLine();
        CLI::write('## Provider Library Guard Responses');

        $this->guardrailCheckProviderResult('MyMIRaydium::swap', function () {
            return (new \App\Libraries\MyMIRaydium())->swap([
                'from'       => 'SOL',
                'to'         => 'USDC',
                'amount'     => '0.001',
                'network'    => 'mainnet',
                'privateKey' => 'REDACTED_TEST_ONLY',
            ]);
        }, $pass, $fail);

        $phantom = new \App\Libraries\MyMIPhantom();

        $this->guardrailCheckProviderResult('MyMIPhantom::transfer', function () use ($phantom) {
            return $phantom->transfer('from-address', 'to-address', '0.001', ['network' => 'mainnet']);
        }, $pass, $fail);

        $this->guardrailCheckProviderResult('MyMIPhantom::swap', function () use ($phantom) {
            return $phantom->swap([
                'from'       => 'SOL',
                'to'         => 'USDC',
                'amount'     => '0.001',
                'network'    => 'mainnet',
                'privateKey' => 'REDACTED_TEST_ONLY',
            ]);
        }, $pass, $fail);

        $this->guardrailCheckProviderResult('MyMIPhantom::createToken', function () use ($phantom) {
            return $phantom->createToken([
                'symbol'     => 'TEST',
                'name'       => 'Test Token',
                'network'    => 'mainnet',
                'privateKey' => 'REDACTED_TEST_ONLY',
            ]);
        }, $pass, $fail);

        $solflare = new \App\Libraries\MyMISolflare();

        $this->guardrailCheckProviderResult('MyMISolflare::transfer', function () use ($solflare) {
            return $solflare->transfer('from-address', 'to-address', '0.001', ['network' => 'mainnet']);
        }, $pass, $fail);

        $this->guardrailCheckProviderResult('MyMISolflare::swap', function () use ($solflare) {
            return $solflare->swap([
                'from'       => 'SOL',
                'to'         => 'USDC',
                'amount'     => '0.001',
                'network'    => 'mainnet',
                'privateKey' => 'REDACTED_TEST_ONLY',
            ]);
        }, $pass, $fail);

        $this->guardrailCheckProviderResult('MyMISolflare::createToken', function () use ($solflare) {
            return $solflare->createToken([
                'symbol'     => 'TEST',
                'name'       => 'Test Token',
                'network'    => 'mainnet',
                'privateKey' => 'REDACTED_TEST_ONLY',
            ]);
        }, $pass, $fail);

        CLI::newLine();
        CLI::write('============================================================');
        CLI::write('RESULT');
        CLI::write('============================================================');
        CLI::write('PASS count: ' . $pass);
        CLI::write('FAIL count: ' . $fail);

        return $fail === 0 ? EXIT_SUCCESS : EXIT_ERROR;
    }

    private function guardrailCheckProviderResult(string $label, callable $callback, int &$pass, int &$fail): void
    {
        try {
            $result = $callback();

            $this->guardrailAssertTrue($label . ' returns array', is_array($result), $pass, $fail);
            $this->guardrailAssertFalse($label . ' broadcast=false', (bool) ($result['broadcast'] ?? true), $pass, $fail);
            $this->guardrailAssertTrue($label . ' dry_run=true', (bool) ($result['dry_run'] ?? false), $pass, $fail);
            $this->guardrailAssertFalse($label . ' sanitized payload', $this->guardrailHasSensitiveKey($result), $pass, $fail);

            $message = strtolower((string) ($result['message'] ?? ''));
            $safeMessage = str_contains($message, 'disabled by configuration')
                || str_contains($message, 'dry-run')
                || str_contains($message, 'preflight')
                || str_contains($message, 'no transaction');

            $this->guardrailAssertTrue($label . ' safe guard message', $safeMessage, $pass, $fail);
        } catch (Throwable $e) {
            $this->guardrailFail($label . ' threw exception: ' . $e->getMessage(), $fail);
        }
    }

    private function guardrailHasSensitiveKey(array $result): bool
    {
        $encoded = json_encode($result);
        $encoded = is_string($encoded) ? $encoded : '';

        return str_contains($encoded, 'REDACTED_TEST_ONLY')
            || str_contains($encoded, 'privateKey')
            || str_contains($encoded, 'secretKey')
            || str_contains($encoded, 'seedPhrase')
            || str_contains($encoded, 'mnemonic');
    }

    private function guardrailAssertTrue(string $label, bool $value, int &$pass, int &$fail): void
    {
        $value ? $this->guardrailPass($label, $pass) : $this->guardrailFail($label, $fail);
    }

    private function guardrailAssertFalse(string $label, bool $value, int &$pass, int &$fail): void
    {
        ! $value ? $this->guardrailPass($label, $pass) : $this->guardrailFail($label, $fail);
    }

    private function guardrailPass(string $label, int &$pass): void
    {
        $pass++;
        CLI::write('PASS: ' . $label);
    }

    private function guardrailFail(string $label, int &$fail): void
    {
        $fail++;
        CLI::write('FAIL: ' . $label);
    }


}

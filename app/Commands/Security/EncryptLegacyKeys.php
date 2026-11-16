<?php

declare(strict_types=1);

namespace App\Commands\Security;

use App\Libraries\StoredSecret;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

/**
 * SEC-KEYS-001: encrypt wallet private keys that were stored in plain text.
 *
 * Dry run by default: prints only counts and row ids, never a key value.
 * With --apply each value is encrypted, decrypted again and compared before
 * the row is written, all inside one transaction.
 */
class EncryptLegacyKeys extends SafeBaseCommand
{
    protected $group       = 'security';
    protected $name        = 'security:encrypt-legacy-keys';
    protected $description = 'Encrypt plain-text wallet private keys at rest (report only unless --apply).';
    protected $usage       = 'security:encrypt-legacy-keys --approve [--apply]';
    protected $options     = [
        '--approve' => 'Required by the safe-command base (report only without --apply).',
        '--apply' => 'Write the encrypted values. Without it nothing changes.',
    ];

    /** table => [id column, secret column] */
    public const TARGETS = [
        'bf_users'        => ['id', 'private_key'],
        'bf_users_wallet' => ['id', 'private_key'],
        'wallets'         => ['id', 'private_key'],
    ];

    public function isDestructive(): bool
    {
        return true;
    }

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $apply = isset($flags['apply']) || CLI::getOption('apply') !== null;
        $key = (string) config('Encryption')->key;
        if ($key === '') {
            CLI::error('BLOCKER: encryption.key is not set in .env, so nothing can be encrypted. Nothing changed.');
            return EXIT_ERROR;
        }

        $db = db_connect();
        $encrypter = service('encrypter');
        $total = 0;
        $failed = false;

        CLI::write($apply ? 'Mode: APPLY' : 'Mode: DRY RUN (add --apply to write)');
        foreach (self::TARGETS as $table => [$idCol, $col]) {
            if (! $db->tableExists($table) || ! $db->fieldExists($col, $table)) {
                CLI::write("{$table}.{$col}: not present, skipped");
                continue;
            }

            $rows = $db->table($table)->select("{$idCol}, {$col}")
                ->where("{$col} IS NOT NULL", null, false)
                ->where("{$col} !=", '')
                ->where("{$col} NOT LIKE", StoredSecret::PREFIX . '%')
                ->get()->getResultArray();
            $ids = array_map(static fn ($r) => (string) $r[$idCol], $rows);
            $total += count($rows);
            CLI::write(sprintf('%s.%s: %d plain-text value(s)%s', $table, $col, count($rows), $ids ? ' ids=' . implode(',', $ids) : ''));

            if (! $apply || $rows === []) {
                continue;
            }

            $db->transStart();
            foreach ($rows as $row) {
                $sealed = StoredSecret::seal((string) $row[$col], $encrypter);
                if ($sealed === null || StoredSecret::open($sealed, $encrypter) !== trim((string) $row[$col])) {
                    CLI::error("{$table} id {$row[$idCol]}: round-trip check failed, rolling back.");
                    $failed = true;
                    break;
                }
                $db->table($table)->where($idCol, $row[$idCol])->update([$col => $sealed]);
            }
            if ($failed) {
                $db->transRollback();
                return EXIT_ERROR;
            }
            $db->transComplete();
            if (! $db->transStatus()) {
                CLI::error("{$table}: transaction failed, nothing written for this table.");
                return EXIT_ERROR;
            }
            CLI::write("{$table}.{$col}: encrypted " . count($rows), 'green');
        }

        CLI::write($apply ? "DONE: {$total} value(s) encrypted." : "DRY RUN: {$total} value(s) would be encrypted.");
        CLI::write('Note: backups taken before this run still hold the plain values.');

        return EXIT_SUCCESS;
    }
}

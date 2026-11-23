<?php

declare(strict_types=1);

namespace App\Commands\SecureTransfer;

use App\Commands\SafeBaseCommand;
use App\Libraries\SecureTransfer\AuditLog;
use App\Libraries\SecureTransfer\DbAuditLog;
use CodeIgniter\CLI\CLI;

/**
 * Owner tool for the Secure Transfer investigation record. Runs only from a
 * server shell, never from the web. Exports are themselves recorded.
 *
 *   securetransfer:audit --verify
 *   securetransfer:audit --user=123 [--from=2026-11-01] [--to=2026-11-30] --out=/path/case-17.jsonl --by=owner --case="subpoena 17"
 *   securetransfer:audit --wallet=<address> | --transfer=<id>
 *   securetransfer:audit --holds
 *   securetransfer:audit --hold=user:123 --reason="subpoena 17" --by=owner
 *   securetransfer:audit --release=4 --by=owner
 */
class Audit extends SafeBaseCommand
{
    protected $group = 'SecureTransfer';
    protected $name = 'securetransfer:audit';
    protected $description = 'Export, verify and place legal holds on the Secure Transfer investigation record.';
    protected $usage = 'securetransfer:audit [--verify] [--holds] [--user=ID] [--wallet=ADDR] [--transfer=ID] [--from=DATE] [--to=DATE] [--out=FILE] [--hold=SCOPE:VALUE --reason=TEXT] [--release=HOLD_ID] [--by=NAME] [--case=TEXT]';
    protected $options = [
        '--verify'   => 'Check the hash chain of every record.',
        '--holds'    => 'List active legal holds.',
        '--user'     => 'Filter by MyMI user id.',
        '--wallet'   => 'Filter by wallet (sender, recipient or linked).',
        '--transfer' => 'Filter by transfer id.',
        '--from'     => 'From date/time (YYYY-MM-DD or Unix seconds).',
        '--to'       => 'To date/time (YYYY-MM-DD or Unix seconds).',
        '--out'      => 'Write the export to this file (JSON lines, mode 0600) instead of the screen.',
        '--hold'     => 'Place a legal hold: transfer:<id>, user:<id> or wallet:<address>.',
        '--release'  => 'Release a legal hold by its id.',
        '--reason'   => 'Why the hold is placed (case or request reference). Required with --hold.',
        '--by'       => 'Who is acting. Defaults to the shell user.',
        '--case'     => 'Case or request reference recorded with an export.',
    ];

    private static function opt(array $params, string $name): ?string
    {
        $v = $params[$name] ?? CLI::getOption($name);
        return $v === null || $v === true ? ($v === true ? '' : null) : (string) $v;
    }

    private static function time(?string $v, bool $end): ?int
    {
        if ($v === null || $v === '') {
            return null;
        }
        if (ctype_digit($v)) {
            return (int) $v;
        }
        $t = strtotime($v . ($end && preg_match('/^\d{4}-\d{2}-\d{2}$/', $v) ? ' 23:59:59 UTC' : ' UTC'));
        return $t === false ? null : $t;
    }

    public function run(array $params)
    {
        $db = db_connect();
        if (!DbAuditLog::available($db)) {
            CLI::write('SEMANTIC_RESULT=BLOCKED_SAFETY REASON=audit_tables_not_migrated');
            return 1;
        }
        $log = new DbAuditLog($db);
        $by = self::opt($params, 'by') ?: (get_current_user() ?: 'cli');
        $now = time();

        if (self::opt($params, 'verify') !== null) {
            $r = $log->verify();
            CLI::write($r['ok'] ? "SEMANTIC_RESULT=PASS CHAIN=intact ENTRIES={$r['entries']}"
                : "SEMANTIC_RESULT=BLOCKED_SAFETY CHAIN=broken BROKEN_AT_ID={$r['broken_at']} ENTRIES_CHECKED={$r['entries']}");
            return $r['ok'] ? 0 : 1;
        }
        if (self::opt($params, 'holds') !== null) {
            foreach ($log->activeHolds() as $h) {
                CLI::write(json_encode($h, JSON_UNESCAPED_SLASHES));
            }
            CLI::write('SEMANTIC_RESULT=PASS');
            return 0;
        }
        if (($hold = self::opt($params, 'hold')) !== null) {
            [$scope, $value] = array_pad(explode(':', $hold, 2), 2, '');
            $reason = trim((string) self::opt($params, 'reason'));
            if (!in_array($scope, AuditLog::HOLD_SCOPES, true) || $value === '' || $reason === '') {
                CLI::write('SEMANTIC_RESULT=FAILED REASON=usage: --hold=transfer:<id>|user:<id>|wallet:<address> --reason="<case>"');
                return 1;
            }
            $id = $log->setHold($scope, $value, $reason, $by, $now);
            $log->record('hold_set', ['user_id' => $scope === 'user' ? (int) $value : null, 'wallet' => $scope === 'wallet' ? $value : null,
                'transfer_id' => $scope === 'transfer' ? $value : null, 'detail' => ['hold_id' => $id, 'scope' => $scope, 'reason' => $reason, 'by' => $by], 'created_at' => $now]);
            CLI::write("SEMANTIC_RESULT=PASS HOLD_ID={$id}");
            return 0;
        }
        if (($release = self::opt($params, 'release')) !== null) {
            $ok = ctype_digit($release) && $log->releaseHold((int) $release, $by, $now);
            if ($ok) {
                $log->record('hold_released', ['detail' => ['hold_id' => (int) $release, 'by' => $by], 'created_at' => $now]);
            }
            CLI::write($ok ? "SEMANTIC_RESULT=PASS RELEASED={$release}" : 'SEMANTIC_RESULT=FAILED REASON=hold_not_found_or_already_released');
            return $ok ? 0 : 1;
        }

        $filters = array_filter([
            'user_id' => self::opt($params, 'user'),
            'wallet' => self::opt($params, 'wallet'),
            'transfer_id' => self::opt($params, 'transfer'),
            'from' => self::time(self::opt($params, 'from'), false),
            'to' => self::time(self::opt($params, 'to'), true),
        ], fn ($v) => $v !== null && $v !== '');
        if (!array_intersect_key($filters, ['user_id' => 1, 'wallet' => 1, 'transfer_id' => 1])) {
            CLI::write('SEMANTIC_RESULT=FAILED REASON=give --user, --wallet or --transfer (exports are scoped, never the whole record)');
            return 1;
        }
        $rows = $log->find($filters);
        $out = self::opt($params, 'out');
        $lines = array_map(fn ($r) => json_encode($r, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE), $rows);
        if ($out !== null && $out !== '') {
            $old = umask(0077);
            $written = file_put_contents($out, implode("\n", $lines) . ($lines ? "\n" : ''), LOCK_EX);
            umask($old);
            if ($written === false) {
                CLI::write('SEMANTIC_RESULT=FAILED REASON=cannot_write_out_file');
                return 1;
            }
            @chmod($out, 0600);
        } else {
            foreach ($lines as $l) {
                CLI::write($l);
            }
        }
        $log->record('audit_export', ['detail' => ['filters' => $filters, 'rows' => count($rows), 'by' => $by,
            'case' => (string) self::opt($params, 'case'), 'file_sha256' => $out ? hash_file('sha256', $out) : null], 'created_at' => $now]);
        CLI::write('SEMANTIC_RESULT=PASS ROWS=' . count($rows) . ($out ? ' OUT=' . $out . ' SHA256=' . hash_file('sha256', $out) : ''));
        return 0;
    }
}

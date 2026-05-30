<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class SolanaTransactionAudit extends BaseCommand
{
    protected $group = 'AIOps';
    protected $name = 'aiops:solana-transaction-audit';
    protected $description = 'Safely summarize Solana transaction records when available.';
    protected $usage = 'aiops:solana-transaction-audit [--days=7]';
    protected $options = ['--days' => 'Number of recent days to audit. Defaults to 7.'];

    public function run(array $params)
    {
        $days = 7;
        foreach ($params as $param) {
            if (is_string($param) && str_starts_with($param, '--days=')) {
                $days = max(1, (int) substr($param, 7));
            }
        }
        if (isset($params['days'])) {
            $days = max(1, (int) $params['days']);
        }

        $timestamp = date('Ymd-His');
        $reportDir = ROOTPATH . 'docs/_aiops/reports/solana-phase-03b';
        if (! is_dir($reportDir)) {
            mkdir($reportDir, 0775, true);
        }

        $summary = [];
        $table = null;
        try {
            $db = \Config\Database::connect();
            $candidates = ['bf_solana_transactions', 'solana_transactions', 'bf_exchanges_transactions', 'bf_transactions'];
            foreach ($candidates as $candidate) {
                if ($db->tableExists($candidate)) {
                    $table = $candidate;
                    break;
                }
            }

            if ($table !== null) {
                $fields = $db->getFieldNames($table);
                $statusColumn = in_array('status', $fields, true) ? 'status' : null;
                $dateColumn = in_array('created_at', $fields, true) ? 'created_at' : (in_array('created_on', $fields, true) ? 'created_on' : null);
                $builder = $db->table($table);
                if ($dateColumn !== null) {
                    $builder->where($dateColumn . ' >=', date('Y-m-d H:i:s', strtotime('-' . $days . ' days')));
                }
                if ($statusColumn !== null) {
                    $rows = $builder->select($statusColumn . ' AS status, COUNT(*) AS total')->groupBy($statusColumn)->get()->getResultArray();
                    foreach ($rows as $row) {
                        $summary[(string) ($row['status'] ?? 'unknown')] = (int) ($row['total'] ?? 0);
                    }
                } else {
                    $summary['total'] = (int) $builder->countAllResults();
                }
            }
        } catch (\Throwable $e) {
            $summary = ['error' => $e->getMessage()];
        }

        $report = [
            '# Solana Phase 03B Transaction Audit',
            '',
            '- Generated: ' . date('c'),
            '- Days: ' . $days,
            '- Table: ' . ($table ?? 'missing'),
            '- Status counts: `' . json_encode($summary, JSON_UNESCAPED_SLASHES) . '`',
            '- Secrets printed: no',
            '',
        ];
        $reportPath = $reportDir . '/solana-transaction-audit-' . $timestamp . '.md';
        file_put_contents($reportPath, implode(PHP_EOL, $report));

        CLI::write(sprintf('Solana transaction audit: table=%s report=%s', $table ?? 'missing', str_replace(ROOTPATH, '', $reportPath)), $table ? 'green' : 'yellow');
        return EXIT_SUCCESS;
    }
}

<?php

namespace App\Commands\Errors;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;

class ConsolidateErrors extends SafeBaseCommand
{
    protected $group = 'App - Logging';
    protected $name = 'app:logs:consolidate';
    protected $description = 'Consolidate bf_error_logs into categorized grouped records.';

    public function run(array $params)
    {
        $db = Database::connect();
        $errors = $db->table('bf_error_logs')->get()->getResultArray();

        foreach ($errors as $error) {

            $fingerprint = md5($this->normalize($error['message']));
            $category = $this->categorize($error['message']);

            $existing = $db->table('bf_error_consolidated_logs')
                ->where('fingerprint', $fingerprint)
                ->get()->getRowArray();

            if ($existing) {
                $db->table('bf_error_consolidated_logs')
                    ->where('id', $existing['id'])
                    ->update([
                        'occurrence_count' => $existing['occurrence_count'] + 1,
                        'last_seen' => date('Y-m-d H:i:s')
                    ]);
            } else {
                $db->table('bf_error_consolidated_logs')->insert([
                    'fingerprint' => $fingerprint,
                    'category' => $category,
                    'error_type' => $this->detectType($error['message']),
                    'message_sample' => substr($error['message'], 0, 500),
                    'occurrence_count' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'last_seen' => date('Y-m-d H:i:s')
                ]);
            }
        }

        CLI::write('Error consolidation complete.', 'green');
    }

    private function normalize($msg)
    {
        $msg = preg_replace('/\d+/', '', $msg);
        return strtolower(trim($msg));
    }

    private function categorize($msg)
    {
        if (str_contains($msg, 'database')) return 'Database';
        if (str_contains($msg, 'curl')) return 'External API';
        if (str_contains($msg, 'undefined')) return 'Code Bug';
        if (str_contains($msg, 'csrf')) return 'Security';
        if (str_contains($msg, 'solana')) return 'Solana Integration';
        return 'General';
    }

    private function detectType($msg)
    {
        if (str_contains($msg, 'deprecated')) return 'Deprecated';
        if (str_contains($msg, 'exception')) return 'Exception';
        if (str_contains($msg, 'warning')) return 'Warning';
        return 'Error';
    }
}
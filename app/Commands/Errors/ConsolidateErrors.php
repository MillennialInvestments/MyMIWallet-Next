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
        $batchSize = 1000;

        // ---- Ensure checkpoint exists ----
        $checkpoint = $db->table('bf_error_processing_checkpoint')
            ->where('process_name', 'log_consolidation')
            ->get()
            ->getRow();

        if (! $checkpoint) {
            $db->table('bf_error_processing_checkpoint')->insert([
                'process_name' => 'log_consolidation',
                'last_processed_id' => 0,
            ]);
            $lastId = 0;
        } else {
            $lastId = (int) $checkpoint->last_processed_id;
        }

        CLI::write("Starting from ID: {$lastId}");

        while (true) {

            $rows = $db->table('bf_error_logs')
                ->where('id >', $lastId)
                ->orderBy('id', 'ASC')
                ->limit($batchSize)
                ->get()
                ->getResultArray();

            if (empty($rows)) {
                break;
            }

            foreach ($rows as $row) {

                $normalized = $this->normalizeError($row['message']);
                $category   = $this->categorize($normalized);
                $type       = $this->detectType($normalized);

                $this->consolidateRow($row, $normalized, $category, $type);

                $lastId = $row['id'];
            }

            // Update checkpoint
            $db->table('bf_error_processing_checkpoint')
                ->where('process_name', 'log_consolidation')
                ->update(['last_processed_id' => $lastId]);

            unset($rows);
            gc_collect_cycles();

            CLI::write("Processed up to ID: {$lastId}");
        }

        CLI::write("Log consolidation complete.");
    }

    // -------------------------------------------------------
    // NORMALIZER
    // -------------------------------------------------------

    private function normalizeError(string $message): string
    {
        $message = preg_replace('/\d+/', '{number}', $message);
        $message = preg_replace('/\/[^\s]+/', '{path}', $message);
        return strtolower(substr(trim($message), 0, 300));
    }

    // -------------------------------------------------------
    // CATEGORY DETECTOR
    // -------------------------------------------------------

    private function categorize(string $msg): string
    {
        if (str_contains($msg, 'database')) return 'Database';
        if (str_contains($msg, 'curl')) return 'External API';
        if (str_contains($msg, 'undefined')) return 'Code Bug';
        if (str_contains($msg, 'csrf')) return 'Security';
        if (str_contains($msg, 'solana')) return 'Solana Integration';
        return 'General';
    }

    // -------------------------------------------------------
    // TYPE DETECTOR
    // -------------------------------------------------------

    private function detectType(string $msg): string
    {
        if (str_contains($msg, 'deprecated')) return 'Deprecated';
        if (str_contains($msg, 'exception')) return 'Exception';
        if (str_contains($msg, 'warning')) return 'Warning';
        return 'Error';
    }

    // -------------------------------------------------------
    // CONSOLIDATION LOGIC
    // -------------------------------------------------------

    private function consolidateRow(array $row, string $normalized, string $category, string $type): void
    {
        $db = Database::connect();

        $existing = $db->table('bf_error_consolidated_logs')
            ->where('normalized_message', $normalized)
            ->get()
            ->getRow();

        if ($existing) {

            $db->table('bf_error_consolidated_logs')
                ->where('id', $existing->id)
                ->set('count', 'count+1', false)
                ->set('last_seen_at', $row['created_at'])
                ->update();

        } else {

            $db->table('bf_error_consolidated_logs')
                ->insert([
                    'normalized_message' => $normalized,
                    'sample_message'     => $row['message'],
                    'category'           => $category,
                    'type'               => $type,
                    'count'              => 1,
                    'first_seen_at'      => $row['created_at'],
                    'last_seen_at'       => $row['created_at'],
                ]);
        }
    }
}
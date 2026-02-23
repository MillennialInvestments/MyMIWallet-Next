<?php

namespace App\Services\Observability;

use Config\Database;
use Config\Services;
use App\Models\ErrorAlertRuleModel;
use App\Models\ErrorAlertEventModel;

class ErrorAlertService
{
    public function dispatch(): array
    {
        $rulesModel = new ErrorAlertRuleModel();
        $eventsModel = new ErrorAlertEventModel();
        $db = Database::connect();

        $rules = $rulesModel->where('is_enabled', 1)->findAll();

        $fired = 0;
        foreach ($rules as $rule) {
            $window = (int)($rule['window_minutes'] ?? 15);
            $threshold = (int)($rule['threshold_count'] ?? 5);
            $severityMin = strtoupper((string)($rule['severity_min'] ?? 'HIGH'));

            $windowStart = date('Y-m-d H:i:s', time() - ($window * 60));
            $windowEnd = date('Y-m-d H:i:s');

            // crude severity mapping from level
            $levels = $this->levelsForSeverity($severityMin);
            $levelIn = "'" . implode("','", array_map('strtolower', $levels)) . "'";

            $whereScope = "";
            $scope = (string)($rule['scope'] ?? 'global');
            $scopeValue = (string)($rule['scope_value'] ?? '');

            if ($scope === 'controller' && $scopeValue !== '') {
                $whereScope = " AND (JSON_UNQUOTE(JSON_EXTRACT(context, '$.controller')) = " . $db->escape($scopeValue) . " 
                                 OR JSON_UNQUOTE(JSON_EXTRACT(context, '$.controllerFQCN')) = " . $db->escape($scopeValue) . ")";
            } elseif ($scope === 'service' && $scopeValue !== '') {
                $whereScope = " AND JSON_UNQUOTE(JSON_EXTRACT(context, '$.service')) = " . $db->escape($scopeValue);
            }

            $row = $db->query("
                SELECT COUNT(*) AS c
                FROM bf_error_logs
                WHERE created_at >= ? AND created_at <= ?
                  AND LOWER(level) IN ({$levelIn})
                  {$whereScope}
            ", [$windowStart, $windowEnd])->getRowArray();

            $count = (int)($row['c'] ?? 0);
            if ($count < $threshold) continue;

            // prevent alert spam: only fire once per rule per windowEnd minute
            $already = $eventsModel
                ->where('rule_id', (int)$rule['id'])
                ->where('window_start', $windowStart)
                ->where('window_end', $windowEnd)
                ->first();

            if ($already) continue;

            $payload = [
                'rule' => $rule,
                'count' => $count,
                'window_start' => $windowStart,
                'window_end' => $windowEnd,
            ];

            $eventsModel->insert([
                'rule_id' => (int)$rule['id'],
                'triggered_at' => date('Y-m-d H:i:s'),
                'window_start' => $windowStart,
                'window_end' => $windowEnd,
                'count' => $count,
                'severity' => $severityMin,
                'scope' => $scope,
                'scope_value' => $scopeValue ?: null,
                'payload' => json_encode($payload),
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            $this->notify($rule, $payload);
            $fired++;
        }

        return ['fired' => $fired, 'rules' => count($rules)];
    }

    private function levelsForSeverity(string $severityMin): array
    {
        // Map severity floor to CI levels we count
        switch ($severityMin) {
            case 'CRITICAL': return ['critical','alert','emergency'];
            case 'HIGH': return ['error','critical','alert','emergency'];
            case 'MEDIUM': return ['warning','error','critical','alert','emergency'];
            default: return ['notice','info','debug','warning','error','critical','alert','emergency'];
        }
    }

    private function notify(array $rule, array $payload): void
    {
        $emailTo = trim((string)($rule['notify_email'] ?? ''));
        if ($emailTo !== '') {
            try {
                $email = Services::email();
                $email->setTo($emailTo);
                $email->setSubject('[MyMI] Error Alert: ' . ($rule['name'] ?? 'Rule'));
                $email->setMessage(json_encode($payload, JSON_PRETTY_PRINT));
                $email->send();
            } catch (\Throwable $e) {
                log_message('error', 'ErrorAlertService email notify failed: ' . $e->getMessage());
            }
        }

        // Discord webhook (optional)
        $hook = trim((string)($rule['notify_discord_webhook'] ?? ''));
        if ($hook !== '') {
            try {
                $msg = "🚨 **MyMI Error Alert**\n".
                    "**Rule:** " . ($rule['name'] ?? 'Rule') . "\n".
                    "**Count:** " . ($payload['count'] ?? 0) . "\n".
                    "**Window:** " . ($payload['window_start'] ?? '') . " → " . ($payload['window_end'] ?? '') . "\n";

                $body = json_encode(['content' => $msg]);

                $ch = curl_init($hook);
                curl_setopt_array($ch, [
                    CURLOPT_POST => true,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
                    CURLOPT_POSTFIELDS => $body,
                    CURLOPT_TIMEOUT => 10,
                ]);
                curl_exec($ch);
                curl_close($ch);
            } catch (\Throwable $e) {
                log_message('error', 'ErrorAlertService discord notify failed: ' . $e->getMessage());
            }
        }
    }
}
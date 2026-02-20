<?php

namespace App\Commands\Ops;

use App\Models\OpsCommandInboxModel;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class FetchCommands extends SafeBaseCommand
{
    protected $group       = 'ops';
    protected $name        = 'ops:fetch-commands';
    protected $description = 'Fetch unread ops commands from IMAP and store them in bf_ops_command_inbox';
    protected $options     = [
        '--dry-run' => 'Preview actions without storing inbox items',
        '--approve' => 'Acknowledge and store inbox items',
    ];

    private ?OpsCommandInboxModel $model = null;

    protected function svc(): \App\Services\OpsCommandService
    {
        static $svc = null;

        if ($svc === null) {
            $svc = new \App\Services\OpsCommandService();
        }

        return $svc;
    }

    public function run(array $params)
    {
        log_message('info', '[spark:ops:fetch-commands] Started', ['params' => $params]);
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);

        if (! function_exists('imap_open')) {
            CLI::error('IMAP extension not available.');
            log_message('error', '[spark:ops:fetch-commands] Failed', ['reason' => 'IMAP extension missing']);
            return EXIT_ERROR;
        }

        $host          = trim((string) env('MYMI_OPS_IMAP_HOST'));
        $user          = trim((string) env('MYMI_OPS_IMAP_USER'));
        $pass          = trim((string) env('MYMI_OPS_IMAP_PASS'));
        $allowed       = array_filter(array_map('trim', explode(',', (string) env('MYMI_OPS_ALLOWED_SENDERS'))));
        $sharedToken   = trim((string) env('MYMI_OPS_EMAIL_TOKEN'));
        $mailboxFolder = env('MYMI_OPS_IMAP_MAILBOX') ?: 'INBOX';

        if ($host === '' || $user === '' || $pass === '') {
            CLI::error('IMAP credentials are not configured.');
            log_message('error', '[spark:ops:fetch-commands] Failed', ['reason' => 'IMAP credentials missing']);
            return EXIT_ERROR;
        }

        $mailbox = sprintf('{%s}%s', $host, $mailboxFolder);

        $imap = @imap_open($mailbox, $user, $pass);

        if (! $imap) {
            CLI::error('Unable to connect to IMAP mailbox.');
            log_message('error', '[spark:ops:fetch-commands] Failed', ['reason' => 'Unable to connect to IMAP']);
            return EXIT_ERROR;
        }

        $emails = imap_search($imap, 'UNSEEN') ?: [];

        if (empty($emails)) {
            CLI::write('No unread messages found.');
            imap_close($imap);
            log_message('info', '[spark:ops:fetch-commands] Completed', ['messages' => 0, 'dry_run' => $dryRun]);
            return EXIT_SUCCESS;
        }

        foreach ($emails as $emailNumber) {
            $this->processMessage($imap, (int) $emailNumber, $allowed, $sharedToken, $dryRun);
        }

        imap_close($imap);

        log_message('info', '[spark:ops:fetch-commands] Completed', [
            'messages' => count($emails),
            'dry_run' => $dryRun,
        ]);

        return EXIT_SUCCESS;
    }

    protected function processMessage($imap, int $emailNumber, array $allowedSenders, string $sharedToken, bool $dryRun): void
    {
        $overviewList = imap_fetch_overview($imap, (string) $emailNumber, 0);
        $overview     = $overviewList[0] ?? null;

        if (! $overview) {
            CLI::error("Skipping message {$emailNumber}: no overview available");
            return;
        }

        $fromAddress = strtolower((string) ($overview->from ?? 'unknown'));
        $fromEmail   = $this->extractEmail($fromAddress);

        if (! empty($allowedSenders) && ! in_array($fromEmail, $allowedSenders, true)) {
            log_message('warning', 'OpsFetchCommands: sender not allowlisted');
            CLI::error("Rejected sender: {$fromEmail}");
            return;
        }

        $rawBody = $this->getBody($imap, $emailNumber);
        $clean   = $this->stripHtml($rawBody);

        [$parsed, $flags] = $this->parsePayload($clean);

        $token = $this->extractToken($clean);

        if ($sharedToken !== '' && $token !== $sharedToken) {
            $flags[] = ['flag' => 'token_mismatch', 'details' => ['found' => $token]];
            log_message('warning', 'OpsFetchCommands: token mismatch for message {id}', ['id' => $overview->message_id ?? 'unknown']);
            CLI::error('Token mismatch; message left unread.');
            return;
        }

        $status = empty($parsed) ? 'New' : 'Parsed';

        $data = [
            'message_id'     => (string) ($overview->message_id ?? null),
            'from_email'     => $fromEmail,
            'subject'        => (string) ($overview->subject ?? ''),
            'raw_body'       => $clean,
            'parsed_json'    => $parsed,
            'security_flags' => $flags,
            'status'         => $status,
            'received_at'    => isset($overview->date) ? date('Y-m-d H:i:s', strtotime((string) $overview->date)) : null,
        ];

        if ($dryRun) {
            CLI::write(json_encode(['id' => 'dry-run', 'status' => $status, 'from' => $fromEmail]));
            return;
        }

        $this->model()->insert($data);
        $insertId = (int) $this->model()->getInsertID();

        imap_setflag_full($imap, (string) $emailNumber, '\\Seen');

        CLI::write(json_encode(['id' => $insertId, 'status' => $status, 'from' => $fromEmail]));
    }

    protected function getBody($imap, int $emailNumber): string
    {
        $body = imap_fetchbody($imap, $emailNumber, '1');

        if ($body === '') {
            $body = imap_body($imap, $emailNumber);
        }

        $structure = @imap_fetchstructure($imap, $emailNumber);
        $encoding  = is_object($structure) ? (int) $structure->encoding : 0;

        return $this->decodeBody($body, (int) $encoding);
    }

    protected function decodeBody(string $body, int $encoding): string
    {
        return match ($encoding) {
            1       => imap_8bit($body),
            2       => imap_binary($body),
            3       => imap_base64($body),
            4       => imap_qprint($body),
            default => $body,
        };
    }

    private function model(): OpsCommandInboxModel
    {
        if ($this->model === null) {
            $this->model = new OpsCommandInboxModel();
        }

        return $this->model;
    }

    protected function stripHtml(string $body): string
    {
        $body = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $body);
        $body = preg_replace('/<style\b[^>]*>(.*?)<\/style>/is', '', $body);
        $body = strip_tags($body);

        return trim((string) $body);
    }

    protected function extractEmail(string $from): string
    {
        if (preg_match('/<([^>]+)>/', $from, $matches)) {
            return strtolower($matches[1]);
        }

        return strtolower($from);
    }

    protected function extractToken(string $body): string
    {
        if (preg_match('/X-MyMI-Token:\s*(\S+)/i', $body, $matches)) {
            return trim($matches[1]);
        }

        if (preg_match('/token:\s*(\S+)/i', $body, $matches)) {
            return trim($matches[1]);
        }

        return '';
    }

    protected function parsePayload(string $body): array
    {
        $flags  = [];
        $parsed = [];

        if (str_contains($body, '---')) {
            $parts = preg_split('/---+/', $body);
            $candidate = trim((string) end($parts));

            $yamlParsed = $this->parseYaml($candidate);

            if (! empty($yamlParsed)) {
                $parsed = $yamlParsed;
            } else {
                $flags[] = ['flag' => 'yaml_parse_failed', 'details' => []];
            }
        }

        return [$parsed, $flags];
    }

    protected function parseYaml(string $yaml): array
    {
        if ($yaml === '') {
            return [];
        }

        if (function_exists('yaml_parse')) {
            $result = @yaml_parse($yaml);
            return is_array($result) ? $result : [];
        }

        $lines  = preg_split('/\r?\n/', $yaml);
        $output = [];

        foreach ($lines as $line) {
            if (! str_contains($line, ':')) {
                continue;
            }

            [$key, $value] = array_map('trim', explode(':', $line, 2));

            if ($key !== '') {
                $output[$key] = $value;
            }
        }

        return $output;
    }

    protected function isDestructive(): bool
    {
        return true;
    }
}

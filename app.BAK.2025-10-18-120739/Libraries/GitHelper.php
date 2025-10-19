<?php

namespace App\Libraries;

#[\AllowDynamicProperties]
class GitHelper
{
    protected $repos = [
        'media' => [
            'path'   => '/home/mymiteam/mymiwallet/site/current/public/MyMI-Media',
            'branch' => 'production',
        ],
        'main' => [
            'path'   => '/home/mymiteam/mymiwallet/site/current',
            'branch' => 'main',
        ],
    ];

    protected $logPath = WRITEPATH . 'logs/git-helper.log';
    protected $webhookUrl = 'https://discord.com/api/webhooks/xxx/yyy';

    public function pushRepo($repoKey = 'media', $customMessage = null, $author = null)
    {
        if (!isset($this->repos[$repoKey])) {
            return $this->logError("Invalid repo key: {$repoKey}");
        }

        $repo = $this->repos[$repoKey];
        if (! $this->isGitRepo($repo['path'])) {
            return $this->logError("No .git repo found at {$repo['path']}");
        }

        $timestamp = date('Y-m-d H:i:s');
        $user = $author ?? get_current_user();
        $message = $customMessage ?? "auto-commit by {$user} on {$timestamp}";

        $commands = [
            ['git', 'pull', 'origin', $repo['branch']],
            ['git', 'add', '.'],
            ['git', 'commit', '-m', $message],
            ['git', 'push', 'origin', $repo['branch']],
        ];

        $fullOutput = $this->executeCommands($commands, $repoKey, $repo['path']);

        $this->sendWebhook("✅ `{$repoKey}` repo auto-pushed:\n**{$message}**\nTimestamp: {$timestamp}");

        return $fullOutput;
    }

    public function previewDiff($repoKey)
    {
        if (!isset($this->repos[$repoKey])) {
            return ['error' => 'Invalid repo key'];
        }

        $repo = $this->repos[$repoKey];
        $result = SafeProcess::run(['git', 'diff'], ['git'], null, $repo['path']);

        return $result['stdout'];
    }

    public function revertLastCommit($repoKey)
    {
        if (!isset($this->repos[$repoKey])) {
            return $this->logError("Invalid repo key: {$repoKey}");
        }

        $repo = $this->repos[$repoKey];
        $commands = [
            ['git', 'reset', '--soft', 'HEAD~1'],
        ];

        return $this->executeCommands($commands, $repoKey, $repo['path']);
    }

    public function createBranch($repoKey, $branchName)
    {
        if (!isset($this->repos[$repoKey])) {
            return $this->logError("Invalid repo key: {$repoKey}");
        }

        $repo = $this->repos[$repoKey];
        $commands = [
            ['git', 'checkout', '-b', $branchName],
        ];

        return $this->executeCommands($commands, $repoKey, $repo['path']);
    }

    public function runBackgroundCommit($repoKey, $customMessage = null)
    {
        if (!isset($this->repos[$repoKey])) {
            return false;
        }

        $repo = $this->repos[$repoKey];
        $message = $customMessage ?? 'background commit on ' . date('Y-m-d H:i:s');
        $commands = [
            ['git', 'add', '.'],
            ['git', 'commit', '-m', $message],
            ['git', 'push', 'origin', $repo['branch']],
        ];

        $this->executeCommands($commands, $repoKey, $repo['path']);

        return 'Commit completed.';
    }

    protected function executeCommands(array $commands, $context, string $workingDir)
    {
        $fullOutput = [];
        foreach ($commands as $command) {
            $result = SafeProcess::run($command, ['git'], null, $workingDir);
            $fullOutput[] = [
                'command' => implode(' ', $command),
                'output'  => trim($result['stdout'] . ($result['stderr'] !== '' ? "\n" . $result['stderr'] : '')),
                'status'  => $result['exitCode'] === 0 ? 'success' : 'error',
            ];
        }

        $this->writeLog($fullOutput, $context);
        return $fullOutput;
    }

    protected function logError($message)
    {
        $this->writeLog([['status' => 'error', 'output' => $message]], 'ERROR');
        return [['status' => 'error', 'output' => $message]];
    }

    protected function writeLog(array $entries, $context = 'General')
    {
        $log = '[' . date('Y-m-d H:i:s') . "] [{$context}]\n";
        foreach ($entries as $entry) {
            $command = $entry['command'] ?? '---';
            $log .= "{$entry['status']} | {$command}\n";
            $log .= ($entry['output'] ?? '') . "\n\n";
        }
        file_put_contents($this->logPath, $log, FILE_APPEND);
    }

    protected function sendWebhook($message)
    {
        if (!$this->webhookUrl) {
            return;
        }

        $payload = json_encode(['content' => $message]);
        $ch = curl_init($this->webhookUrl);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        curl_close($ch);
    }

    public function listRepos()
    {
        return array_keys($this->repos);
    }

    public function isGitRepo($path)
    {
        return is_dir($path . '/.git');
    }
}

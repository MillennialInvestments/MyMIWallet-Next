<?php

declare(strict_types=1);

namespace App\Commands\Chat;

use App\Commands\SafeBaseCommand;
use App\Commands\Support\SubsCommandTrait;

class Status extends SafeBaseCommand
{
    use SubsCommandTrait;

    protected $group = 'Chat';
    protected $name = 'chat:status';
    protected $description = 'Chat status with PID and listening-port verification.';
    protected $options = ['--json' => 'JSON'];

    public function run(array $params)
    {
        $this->parseParams($params);

        $chat = $this->mgr()->status('chat.app');
        $payload = [
            'status' => ($chat['healthy'] ?? false) ? 'ok' : 'degraded',
            'chat' => $chat,
        ];

        $this->emit($payload, $this->optBool('json'));

        return ($chat['healthy'] ?? false) ? EXIT_SUCCESS : EXIT_ERROR;
    }
}

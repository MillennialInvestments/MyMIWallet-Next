<?php

namespace App\Log\Handlers;

use CodeIgniter\Log\Handlers\BaseHandler;
use CodeIgniter\Log\Handlers\FileHandler;
use CodeIgniter\Log\Handlers\HandlerInterface;

class UnifiedLoggerHandler extends BaseHandler implements HandlerInterface
{
    private FileHandler $fileHandler;

    private DatabaseLoggerHandler $dbHandler;

    public function __construct(array $config = [])
    {
        parent::__construct($config);

        $fileConfig = [
            'handles' => $config['levels'] ?? ['critical', 'error', 'warning', 'info', 'debug'],
            'path' => WRITEPATH . 'logs/',
            'fileExtension' => 'php',
            'filePermissions' => 0644,
        ];

        $dbConfig = [
            'handles' => $config['levels'] ?? ['critical', 'error', 'warning'],
            'fallbackPath' => WRITEPATH . 'logs/',
            'notificationEmail' => (string) env('LOGGER_ALERT_EMAIL', ''),
            'emailWarningLevel' => false,
        ];

        $this->fileHandler = new FileHandler($fileConfig);
        $this->dbHandler = new DatabaseLoggerHandler($dbConfig);
    }

    public function handle($level, $message, array $context = []): bool
    {
        if (! $this->canHandle($level)) {
            return false;
        }

        try {
            $this->fileHandler->handle($level, $message, $context);
            $this->dbHandler->handle($level, $message, $context);

            return true;
        } catch (\Throwable $e) {
            error_log('LOGGER FAILURE: ' . $e->getMessage());

            return false;
        }
    }
}

<?php

namespace Config;

use App\Log\Handlers\DatabaseLoggerHandler;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Log\Handlers\FileHandler;
use CodeIgniter\Log\Handlers\HandlerInterface;

class Logger extends BaseConfig
{
    /**
     * Error Logging Threshold
     *
     * @var int|list<int>
     */
    public $threshold = 4;

    /**
     * Date Format for Logs
     */
    public string $dateFormat = 'Y-m-d H:i:s';

    /**
     * Log Handlers
     *
     * @var array<class-string<HandlerInterface>, array<string, mixed>>
     */
    public array $handlers = [];

    /**
     * Resolved log path
     */
    protected string $logPath = '';

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->logPath   = $this->ensureLogPath();
        $this->threshold = $this->determineThreshold();

        $this->handlers = [
            /*
             * --------------------------------------------------------------------
             * Database Handler
             * --------------------------------------------------------------------
             */
            DatabaseLoggerHandler::class => [
                'handles'           => ['emergency', 'alert', 'critical', 'error', 'warning'],
                'fallbackPath'      => $this->logPath,
                'notificationEmail' => 'support@mymiwallet.com',
            ],

            /*
             * --------------------------------------------------------------------
             * File Handler
             * --------------------------------------------------------------------
             */
            FileHandler::class => [
                'handles' => [
                    'critical',
                    'alert',
                    'emergency',
                    'debug',
                    'error',
                    'info',
                    'notice',
                    'warning',
                ],
                'fileExtension'   => 'php',
                'filePermissions' => 0644,
                'path'            => $this->logPath,
            ],
        ];

        // Optional env override for alert email
        $this->handlers[DatabaseLoggerHandler::class]['notificationEmail'] = (string) env(
            'LOGGER_ALERT_EMAIL',
            $this->handlers[DatabaseLoggerHandler::class]['notificationEmail']
        );
    }

    /**
     * Ensure writable log directory exists.
     */
    protected function ensureLogPath(): string
    {
        $path = WRITEPATH . 'logs';

        if (! is_dir($path)) {
            @mkdir($path, 0775, true);
        }

        return rtrim($path, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
    }

    /**
     * Determine logging threshold safely.
     */
    protected function determineThreshold(): int
    {
        $envThreshold = env('logger.threshold');

        if ($envThreshold !== null && $envThreshold !== '') {
            return max(3, (int) $envThreshold);
        }

        // Production quieter, non-prod verbose
        return (ENVIRONMENT === 'production') ? 3 : 8;
    }
}

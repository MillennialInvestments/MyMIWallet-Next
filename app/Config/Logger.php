<?php

namespace Config;

use App\Log\Handlers\DatabaseLoggerHandler;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Log\Handlers\FileHandler;
use CodeIgniter\Log\Handlers\HandlerInterface;

class Logger extends BaseConfig
{
    /**
     * Error Logging Threshold.
     *
     * @var list<string>
     */
    public int|string|array $threshold = [4];

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
        $this->threshold = $this->resolveThreshold();

        $this->handlers = [
            /*
             * --------------------------------------------------------------------
             * Database Handler
             * --------------------------------------------------------------------
             */
            DatabaseLoggerHandler::class => [
                'handles'           => ['emergency', 'alert', 'critical', 'error', 'warning', 'notice', 'info', 'debug'],
                'fallbackPath'      => $this->logPath,
                'notificationEmail' => 'support@mymiwallet.com',
                'emailWarningLevel' => (bool) env('LOGGER_EMAIL_WARNING', false),
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
     * Resolve threshold list from environment or safe defaults.
     *
     * @return list<string>
     */
    protected function resolveThreshold(): array
    {
        $numeric = env('logger.threshold');
        if (is_numeric($numeric)) {
            $map = [
                1 => ['emergency'],
                2 => ['emergency', 'alert', 'critical'],
                3 => ['emergency', 'alert', 'critical', 'error'],
                4 => ['emergency', 'alert', 'critical', 'error', 'warning'],
                5 => ['emergency', 'alert', 'critical', 'error', 'warning', 'notice'],
                6 => ['emergency', 'alert', 'critical', 'error', 'warning', 'notice', 'info'],
                7 => ['emergency', 'alert', 'critical', 'error', 'warning', 'notice', 'info', 'debug'],
            ];

            return $map[(int) $numeric] ?? $map[7];
        }

        $configured = env('LOG_THRESHOLD');

        if (is_string($configured) && trim($configured) !== '') {
            $levels = array_values(array_filter(array_map(static fn (string $level): string => strtolower(trim($level)), explode(',', $configured))));

            if ($levels !== []) {
                return $levels;
            }
        }

        return ['emergency', 'alert', 'critical', 'error', 'warning', 'notice', 'info', 'debug'];
    }
}

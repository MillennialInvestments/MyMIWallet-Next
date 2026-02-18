<?php

/**
 * CI4 Logger - Settings
 * Audited: 2026-02-18
 * Purpose: Defines global logging thresholds, handlers, and log path resolution.
 */

namespace Config;

use App\Log\Handlers\DatabaseLoggerHandler;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Log\Handlers\FileHandler;
use CodeIgniter\Log\Handlers\HandlerInterface;

class Logger extends BaseConfig
{
    /**
     * Supported log levels in ascending verbosity.
     *
     * @var list<string>
     */
    private const ALL_LEVELS = ['emergency', 'alert', 'critical', 'error', 'warning', 'notice', 'info', 'debug'];

    /**
     * Error Logging Threshold.
     *
     * @var list<string>
     */
    public int|string|array $threshold = [
        'emergency',
        'alert',
        'critical',
        'error',
        'warning',
        'notice',
        'info',
        'debug',
    ];

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
            FileHandler::class => [
                'handles' => self::ALL_LEVELS,
                'path' => $this->logPath,
                'fileExtension' => 'php',
                'filePermissions' => 0664,
            ],

            DatabaseLoggerHandler::class => [
                'handles' => self::ALL_LEVELS,
                'fallbackPath' => $this->logPath,
                'notificationEmail' => (string) env('LOGGER_ALERT_EMAIL', 'support@mymiwallet.com'),
                'emailWarningLevel' => (bool) env('LOGGER_EMAIL_WARNING', false),
            ],
        ];

        if ($this->threshold === [] || $this->threshold === [9]) {
            $this->threshold = [
                'emergency',
                'alert',
                'critical',
                'error',
                'warning',
                'notice',
                'info',
                'debug',
            ];
        }

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
        if ($this->isForceDebugEnabled()) {
            return self::ALL_LEVELS;
        }

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

            return $map[(int) $numeric] ?? self::ALL_LEVELS;
        }

        $configured = env('LOG_THRESHOLD');

        if (is_string($configured) && trim($configured) !== '') {
            $levels = array_values(array_filter(array_map(static fn (string $level): string => strtolower(trim($level)), explode(',', $configured))));
            $levels = array_values(array_intersect($levels, self::ALL_LEVELS));

            if ($levels !== []) {
                return $levels;
            }
        }

        return self::ALL_LEVELS;
    }

    private function isForceDebugEnabled(): bool
    {
        return filter_var(env('AIOPS_FORCE_DEBUG', false), FILTER_VALIDATE_BOOLEAN);
    }
}

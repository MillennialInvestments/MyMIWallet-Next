<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Log\Handlers\FileHandler;

class Logger extends BaseConfig
{
    /**
     * Error Logging Threshold
     *
     * You can enable error logging by setting a threshold over zero.
     * Values below or equal to the threshold will be logged.
     */
    public $threshold = [1, 2, 3, 4, 5, 6, 7, 8, 9];

    /**
     * Date format for log entries.
     */
    public string $dateFormat = 'Y-m-d H:i:s';

    /**
     * Log Handlers - Defines how/where logs are written.
     */
    public array $handlers = [];

    public function __construct()
    {
        parent::__construct();
    
        // ✅ Register DB Logger only in production
        if (ENVIRONMENT === 'production') {
            $this->handlers['App\Log\Handlers\DatabaseLoggerHandler'] = [
                'handles' => ['critical', 'error'],
            ];
        }
    
        // ✅ File Logger is always active
        $this->handlers[FileHandler::class] = [
            'handles' => ['critical', 'alert', 'emergency', 'debug', 'error', 'info', 'notice', 'warning'],
            'fileExtension' => '',
            'filePermissions' => 0644,
            'path' => '',
        ];
    }
    
}

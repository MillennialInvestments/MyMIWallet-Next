<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * Debug Configuration
 *
 * Controls debugging, toolbar, and Kint behavior.
 * Safe for production. Codex-only behavior is gated by APP_ENV=codex.
 */
class Debug extends BaseConfig
{
    /**
     * Disable Kint by default.
     */
    public bool $enableKint = true;

    /**
     * Never auto-load debug helpers in CLI.
     */
    public bool $showToolbar = true;

    /**
     * Safety: never load dev-only helpers implicitly.
     */
    public array $toolbarCollectors = [];

    /**
     * Debug Toolbar
     */
    public bool $toolbar = true;

    /**
     * Debug Collectors
     */
    public array $collectors = [];

    /**
     * Kint (var dumping)
     */
    public bool $kintEnabled = true;

    /**
     * Error Views
     */
    public string $errorViewPath = APPPATH . 'Views/errors';

    /**
     * Log Severity
     */
    public int $logSeverity = E_ALL;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        // Codex environment hard-disable
        if (env('APP_ENV') === 'codex') {
            $this->toolbar     = false;
            $this->collectors  = [];
            $this->kintEnabled = false;
            $this->enableKint  = false;
        }

        // CLI safety (Spark, cron, AIOps)
        if (is_cli()) {
            $this->toolbar     = false;
            $this->kintEnabled = false;
            $this->enableKint  = false;
        }

        // Optional env overrides (safe)
        $this->toolbar = filter_var(
            env('debug.toolbar', $this->toolbar),
            FILTER_VALIDATE_BOOLEAN
        );

        $this->enableKint = filter_var(
            env('debug.enableKint', $this->enableKint),
            FILTER_VALIDATE_BOOLEAN
        );

        $this->kintEnabled = $this->enableKint;
    }
}

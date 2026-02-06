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
     * Disable Kint in CLI, CI, and production.
     */
    public bool $enableKint = false;

    /**
     * Never auto-load debug helpers in CLI.
     */
    public bool $showToolbar = false;

    /**
     * Safety: never load dev-only helpers implicitly.
     */
    public array $toolbarCollectors = [];
  
    /**
     * --------------------------------------------------------------------
     * Debug Toolbar
     * --------------------------------------------------------------------
     */
    public bool $toolbar = false;

    /**
     * --------------------------------------------------------------------
     * Debug Collectors
     * --------------------------------------------------------------------
     * Empty by default to avoid overhead in CLI and Codex.
     */
    public array $collectors = [];

    /**
     * --------------------------------------------------------------------
     * Kint (var dumping)
     * --------------------------------------------------------------------
     * Explicitly controlled to prevent CLI / Codex crashes.
     */
    public bool $kintEnabled = false;

    /**
     * --------------------------------------------------------------------
     * Error Views
     * --------------------------------------------------------------------
     */
    public string $errorViewPath = APPPATH . 'Views/errors';

    /**
     * --------------------------------------------------------------------
     * Log Severity
     * --------------------------------------------------------------------
     * Leave permissive; logging is already guarded elsewhere.
     */
    public int $logSeverity = E_ALL;

    /**
     * --------------------------------------------------------------------
     * Constructor
     * --------------------------------------------------------------------
     * Apply Codex-only hard disables.
     */
    public function __construct()
    {
        parent::__construct();

        // 🔒 Codex environment hardening
        if (getenv('APP_ENV') === 'codex') {
            $this->toolbar     = false;
            $this->collectors  = [];
            $this->kintEnabled = false;
        }

        // 🔒 CLI safety (Spark, cron, AIOps)
        if (is_cli()) {
            $this->toolbar     = false;
            $this->kintEnabled = false;
        }
    }
}

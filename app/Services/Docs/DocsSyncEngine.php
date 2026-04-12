<?php

namespace App\Services\Docs;

use CodeIgniter\Config\Factories;
use Config\Services;
use Throwable;

class DocsSyncEngine
{
    protected $scanner;
    protected $db;
    protected $logger;

    public function __construct($scanner = null, $db = null, $logger = null)
    {
        $this->scanner = $scanner ?? $this->resolveScanner();
        $this->db = $db ?? \Config\Database::connect();
        $this->logger = $logger;
    }

    /**
     * Execute docs-to-code sync pipeline.
     *
     * @param array<string, mixed> $options
     * @return array<string, mixed>
     */
    public function execute(array $options = []): array
    {
        if ($this->scanner === null) {
            throw new \RuntimeException('DocsSyncEngine scanner dependency could not be resolved.');
        }

        if (! method_exists($this->scanner, 'scan')) {
            throw new \RuntimeException('DocsSyncEngine scanner does not implement scan().');
        }

        $scanResults = $this->scanner->scan($options);

        return [
            'status' => 'success',
            'scanned' => is_array($scanResults) ? count($scanResults) : 0,
            'results' => $scanResults,
        ];
    }

    /**
     * Resolve the docs scanner from Services or direct class fallback.
     *
     * @return object|null
     */
    protected function resolveScanner()
    {
        try {
            if (method_exists(Services::class, 'docsScanner')) {
                return Services::docsScanner();
            }
        } catch (Throwable $e) {
            log_message('error', 'DocsSyncEngine docsScanner service resolution failed: {message}', [
                'message' => $e->getMessage(),
            ]);
        }

        $fallbackClasses = [
            \App\Services\Docs\DocsScanner::class,
            \App\Services\DocsScanner::class,
        ];

        foreach ($fallbackClasses as $class) {
            if (class_exists($class)) {
                try {
                    return new $class();
                } catch (Throwable $e) {
                    log_message('error', 'DocsSyncEngine fallback scanner init failed for {class}: {message}', [
                        'class' => $class,
                        'message' => $e->getMessage(),
                    ]);
                }
            }
        }

        return null;
    }
}
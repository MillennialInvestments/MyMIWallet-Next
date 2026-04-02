<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Config\BaseConfig;

class PyOps extends BaseConfig
{
    public string $pythonBinary = '';
    public string $entrypoint = 'pyops/src/mymi_pyops/cli.py';
    public int $defaultTimeoutSeconds = 120;
    public int $maxOutputBytes = 2_000_000;

    /** @var list<string> */
    public array $allowedActions = [
        'docs.index',
        'php.lint',
        'patch.propose',
    ];

    public function __construct()
    {
        $this->pythonBinary = (string) (env('PYOPS_PYTHON') ?: $this->pythonBinary);
        $this->entrypoint = (string) (env('PYOPS_ENTRYPOINT') ?: $this->entrypoint);
        $this->defaultTimeoutSeconds = (int) (env('PYOPS_TIMEOUT') ?: $this->defaultTimeoutSeconds);
        $this->maxOutputBytes = (int) (env('PYOPS_MAX_OUTPUT_BYTES') ?: $this->maxOutputBytes);
    }
}

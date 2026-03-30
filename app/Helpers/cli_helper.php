<?php

declare(strict_types=1);

use CodeIgniter\CLI\CLI;

if (! function_exists('cli_info')) {
    function cli_info(string $message): void
    {
        CLI::write($message, 'light_gray');
    }
}

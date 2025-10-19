<?php

namespace App\Libraries;

use CodeIgniter\Debug\ExceptionHandlerInterface;
use Throwable;

class ProductionExceptionHandler implements ExceptionHandlerInterface
{
    public function handle(Throwable $exception, int $statusCode): void
    {
        log_message('critical', $exception->getMessage(), ['exception' => $exception]);

        if (! headers_sent()) {
            http_response_code($statusCode ?: 500);
            header('Content-Type: text/html; charset=utf-8');
        }

        echo 'An unexpected error occurred. Our team has been notified.';
    }
}

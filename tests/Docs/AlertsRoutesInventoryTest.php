<?php

namespace Tests\Docs;

use PHPUnit\Framework\TestCase;

class AlertsRoutesInventoryTest extends TestCase
{
    public function testDocumentedRoutesMapToControllerMethods(): void
    {
        $docPath = ROOTPATH . 'docs/alerts/alerts_routes_inventory.md';
        $this->assertFileExists($docPath, 'Alerts inventory doc is missing.');

        $lines = file($docPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $this->assertNotEmpty($lines, 'Alerts inventory doc is empty.');

        $controllerMap = [
            'AlertsController'             => APPPATH . 'Modules/APIs/Controllers/AlertsController.php',
            'Management\\AlertsController' => APPPATH . 'Modules/Management/Controllers/AlertsController.php',
            'User\\AlertsController'        => APPPATH . 'Modules/User/Controllers/AlertsController.php',
        ];

        $sourceCache = [];
        $missing     = [];

        foreach ($lines as $line) {
            if (! preg_match('/\| `[^`]+` \| [^|]+ \| ([^:|]+)::([^|]+) \|/', $line, $matches)) {
                continue;
            }

            $controller = trim($matches[1]);
            $method     = trim($matches[2]);

            if (! isset($controllerMap[$controller])) {
                continue; // Ignore controllers outside the known map for now.
            }

            if (! isset($sourceCache[$controller])) {
                $path = $controllerMap[$controller];
                $this->assertFileExists($path, sprintf('Controller file missing: %s', $path));
                $sourceCache[$controller] = file_get_contents($path);
            }

            $pattern = '/function\s+' . preg_quote($method, '/') . '\s*\(/';
            if (! preg_match($pattern, $sourceCache[$controller])) {
                $missing[] = $controller . '::' . $method;
            }
        }

        $this->assertSame([], $missing, 'Documented routes missing implementations: ' . implode(', ', $missing));
    }
}

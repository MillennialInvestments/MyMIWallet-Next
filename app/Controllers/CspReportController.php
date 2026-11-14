<?php

declare(strict_types=1);

namespace App\Controllers;

use CodeIgniter\Controller;

/**
 * Receives browser CSP violation reports (GTM-030) and logs a short summary.
 */
class CspReportController extends Controller
{
    public function report()
    {
        $raw = (string) $this->request->getBody();
        if (strlen($raw) > 16384) {
            return $this->response->setStatusCode(413);
        }
        $data = json_decode($raw, true);
        $r = is_array($data) ? ($data['csp-report'] ?? $data[0]['body'] ?? $data) : [];
        if (is_array($r)) {
            $field = static fn (string ...$keys): string => substr((string) (array_values(array_filter(
                array_map(static fn ($k) => $r[$k] ?? null, $keys)
            ))[0] ?? ''), 0, 200);
            log_message('notice', '[CSP] {directive} blocked={blocked} page={page}', [
                'directive' => $field('violated-directive', 'effectiveDirective', 'effective-directive'),
                'blocked'   => $field('blocked-uri', 'blockedURL'),
                'page'      => strtok($field('document-uri', 'documentURL'), '?'),
            ]);
        }

        return $this->response->setStatusCode(204);
    }
}

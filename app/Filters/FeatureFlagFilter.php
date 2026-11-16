<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * GT-FORM-ROUTES-001: route switch, off by default.
 *
 * Usage on a route: ['filter' => ['login', 'feature:exchange_trading']].
 * The route runs only when Config\Features reports FEATURE_EXCHANGE_TRADING
 * on (set it to 1/true/on/yes in .env). Otherwise the request stops here with 503 (JSON for AJAX/API
 * calls, a redirect back with a flash message for normal form posts), so no
 * controller code, database write or provider call happens.
 *
 * Money, crypto and payment flows are wired behind these switches so they can
 * be tested on staging and turned on one at a time by the owner.
 */
class FeatureFlagFilter implements FilterInterface
{
    public const DISABLED_MESSAGE = 'This feature is not turned on yet.';

    public static function envName(string $flag): string
    {
        return 'FEATURE_' . strtoupper((string) preg_replace('/[^A-Za-z0-9]+/', '_', $flag));
    }

    /**
     * Reads Config\Features (the same switches feature_guard() uses). A flag
     * that is not listed there is off.
     */
    public static function enabled(string $flag): bool
    {
        $flag = trim($flag);
        if ($flag === '') {
            return false;
        }

        return (bool) config('Features')->enabled(self::envName($flag));
    }

    public function before(RequestInterface $request, $arguments = null)
    {
        $flags = array_filter(array_map('strval', (array) $arguments));
        foreach ($flags as $flag) {
            if (self::enabled($flag)) {
                continue;
            }

            log_message('info', 'Feature switch {flag} is off; blocked {method} {path}', [
                'flag'   => $flag,
                'method' => $request->getMethod(),
                'path'   => method_exists($request, 'getPath') ? $request->getPath() : '',
            ]);

            $wantsJson = method_exists($request, 'isAJAX') && $request->isAJAX()
                || str_contains(strtolower($request->getHeaderLine('Accept')), 'application/json')
                || str_contains(strtolower($request->getHeaderLine('Content-Type')), 'application/json');

            if ($wantsJson) {
                return service('response')->setStatusCode(503)->setJSON([
                    'status'  => 'disabled',
                    'feature' => $flag,
                    'message' => self::DISABLED_MESSAGE,
                ]);
            }

            return redirect()->back()->with('error', self::DISABLED_MESSAGE);
        }

        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return null;
    }
}

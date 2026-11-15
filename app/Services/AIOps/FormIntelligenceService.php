<?php

declare(strict_types=1);

namespace App\Services\AIOps;

use CodeIgniter\Config\Services;

/**
 * Form discovery for the AIOps form harness (GT-FORM-HARNESS-001).
 *
 * - Parses every <form> in a source, not just the first one.
 * - Understands CI4 helpers in raw view source (site_url, base_url, url_to,
 *   form_open, form_open_multipart, form_close, csrf_field) so actions are not
 *   lost when PHP tags are stripped. Line numbers are preserved.
 * - Finds JavaScript calls (fetch, $.ajax, $.post, $.get, axios.*) that send
 *   requests without a <form> tag.
 * - Maps each action + method to a defined CI4 route with FormRouteMatcher.
 *
 * Nothing in this class sends a request except analyze() with a 'url' source,
 * which performs one GET to read the page.
 */
class FormIntelligenceService
{
    public const STATUS_PASS    = 'PASS';
    public const STATUS_FAIL    = 'FAIL';
    public const STATUS_BLOCKED = 'BLOCKED';
    public const STATUS_SKIPPED = 'SKIPPED';

    private const PHP_MARK = '{php}';

    private ?FormRouteMatcher $matcher;

    public function __construct(?FormRouteMatcher $matcher = null)
    {
        $this->matcher = $matcher;
    }

    /**
     * Back-compatible entry point. Returns every form under 'forms'; 'form' and
     * 'route' still describe the first form for older callers.
     */
    public function analyze(array $sourceSpec): array
    {
        $type  = (string) ($sourceSpec['type'] ?? '');
        $value = (string) ($sourceSpec['value'] ?? '');
        $file  = $type === 'file' ? $this->resolveFilePath($value) : '';

        $source = $this->loadSource($type, $type === 'file' ? $file : $value);
        $all      = $this->inventory($source, $file !== '' ? $this->relativePath($file) : '');
        $entries  = array_values(array_filter($all, static fn (array $e) => $e['kind'] === 'form'));
        $requests = array_values(array_filter($all, static fn (array $e) => $e['kind'] === 'js'));

        if ($entries === []) {
            return [
                'ok'           => false,
                'error'        => 'No <form> found in source.',
                'source'       => $sourceSpec,
                'html_preview' => mb_substr($source, 0, 2000),
                'forms'        => [],
                'requests'     => $requests,
            ];
        }

        $first = $entries[0];

        return [
            'ok'     => true,
            'source' => $sourceSpec,
            'forms'    => $entries,
            'requests' => $requests,
            'form'     => [
                'action' => $first['action'],
                'method' => $first['method'],
                'inputs' => array_column($first['inputs'], 'name'),
            ],
            'route'        => $first['route'],
            'html_preview' => mb_substr($source, 0, 2000),
        ];
    }

    /**
     * Inventory every form and JS request in one source file.
     *
     * @return list<array<string, mixed>>
     */
    public function inventory(string $source, string $relativePath = ''): array
    {
        if (trim($source) === '') {
            return [];
        }

        $resolved = $this->resolvePhp($source);
        $legacy   = $relativePath !== '' && self::isLegacyPath($relativePath);

        $entries = array_merge($this->extractForms($resolved), $this->extractJsCalls($resolved));
        usort($entries, static fn ($a, $b) => [$a['line'], $a['kind']] <=> [$b['line'], $b['kind']]);

        $seen = [];
        $out  = [];
        foreach ($entries as $i => $e) {
            $identity = $relativePath . '|' . $e['kind'] . '|' . $e['method'] . '|' . $e['action'];
            $seen[$identity] = ($seen[$identity] ?? 0) + 1;

            $e['key']  = 'F-' . substr(sha1($identity . '|' . $seen[$identity]), 0, 12);
            $e['file'] = $relativePath;
            $e['ref']  = $relativePath . '#' . ($i + 1);
            $out[] = $this->classify($e, $legacy);
        }

        return $out;
    }

    public static function isLegacyPath(string $path): bool
    {
        $base = strtolower(basename($path));

        return preg_match('/(-\d{6,8}\.php$|[-_ ]copy\b|copy\.php$|_orig\b|-orig\b|backup|[-_]old\.php$|\.bak|-test\.php$|_test\.php$)/', $base) === 1
            || preg_match('#/(backup|backups|old|_old|legacy|archive)/#i', '/' . strtolower($path)) === 1
            || preg_match('#\(original\)|[ _-]copy(/|\.php$| \d)|_orig/#i', $path) === 1;
    }

    // ------------------------------------------------------------------ parse

    /**
     * Replace PHP tags with what they render to, when that is knowable, while
     * keeping every newline so DOM line numbers still point at the source line.
     */
    private function resolvePhp(string $src): string
    {
        $keepLines = static fn (string $orig, string $with): string => $with . str_repeat("\n", substr_count($orig, "\n"));
        $str = '(?:\'([^\'"]*)\'|"([^\'"$]*)")';

        // form_open('path', ...) / form_open_multipart('path', ...)
        $src = preg_replace_callback(
            '#<\?(?:=|php\s+echo)\s*form_open(_multipart)?\(\s*(?:' . $str . ')?([^?]*?)\)\s*;?\s*\?>#s',
            function (array $m) use ($keepLines) {
                $path = ($m[2] ?? '') !== '' ? $m[2] : ($m[3] ?? '');
                $rest = $m[4] ?? '';
                $action = (($m[2] ?? '') === '' && ($m[3] ?? '') === '' && trim($rest, " ,") !== '')
                    ? self::PHP_MARK : '/' . ltrim($path, '/');
                $method = preg_match('#[\'"]method[\'"]\s*=>\s*[\'"](\w+)[\'"]#i', $rest, $mm) ? strtolower($mm[1]) : 'post';
                $enc = $m[1] !== '' ? ' enctype="multipart/form-data"' : '';

                return $keepLines($m[0], '<form action="' . $action . '" method="' . $method . '"' . $enc
                    . ' data-ci-helper="form_open"><input type="hidden" name="csrf_field" data-ci-helper="csrf">');
            },
            $src
        ) ?? $src;

        $src = preg_replace_callback(
            '#<\?(?:=|php\s+echo)\s*form_close\(\s*\)\s*;?\s*\?>#',
            static fn ($m) => '</form>',
            $src
        ) ?? $src;

        $src = preg_replace_callback(
            '#<\?(?:=|php\s+echo)\s*csrf_field\(\s*\)\s*;?\s*\?>#',
            static fn ($m) => '<input type="hidden" name="csrf_field" data-ci-helper="csrf">',
            $src
        ) ?? $src;

        // site_url('x') / base_url('x') with a literal argument.
        $src = preg_replace_callback(
            '#<\?(?:=|php\s+echo)\s*(?:site_url|base_url)\(\s*' . $str . '\s*\)\s*;?\s*\?>#',
            static fn ($m) => '/' . ltrim(($m[1] ?? '') !== '' ? $m[1] : ($m[2] ?? ''), '/'),
            $src
        ) ?? $src;

        // site_url('prefix/' . $id): static prefix + dynamic tail.
        $src = preg_replace_callback(
            '#<\?(?:=|php\s+echo)\s*(?:site_url|base_url)\(\s*' . $str . '\s*\.[^?]*?\)\s*;?\s*\?>#',
            static fn ($m) => '/' . ltrim(($m[1] ?? '') !== '' ? $m[1] : ($m[2] ?? ''), '/') . self::PHP_MARK,
            $src
        ) ?? $src;

        $src = preg_replace_callback(
            '#<\?(?:=|php\s+echo)\s*(?:site_url|base_url)\(\s*\)\s*;?\s*\?>#',
            static fn ($m) => '/',
            $src
        ) ?? $src;

        // url_to('RouteName')
        $src = preg_replace_callback(
            '#<\?(?:=|php\s+echo)\s*url_to\(\s*' . $str . '\s*\)\s*;?\s*\?>#',
            fn ($m) => $this->reverseRoute(($m[1] ?? '') !== '' ? $m[1] : ($m[2] ?? '')),
            $src
        ) ?? $src;

        // Anything else is dynamic: keep a marker so the action is BLOCKED, not guessed.
        $src = preg_replace_callback('#<\?(?:php|=)?[\s\S]*?(?:\?>|\z)#', static function ($m) use ($keepLines) {
            return $keepLines($m[0], str_contains($m[0], "\n") ? '' : self::PHP_MARK);
        }, $src) ?? $src;

        return $src;
    }

    private function reverseRoute(string $name): string
    {
        try {
            $path = service('routes')->reverseRoute($name);
            if (is_string($path) && $path !== '') {
                return '/' . ltrim($path, '/');
            }
        } catch (\Throwable) {
            // fall through
        }

        return '{route:' . $name . '}';
    }

    /** @return list<array<string, mixed>> */
    private function extractForms(string $html): array
    {
        $doc = $html;
        if (! str_contains($doc, '<html') && ! str_contains($doc, '<body')) {
            // Prefix lives on line 1 with the first source line, so line numbers stay aligned.
            $doc = "<!doctype html><html><head><meta charset='utf-8'></head><body>" . $doc . '</body></html>';
        }

        $prev = libxml_use_internal_errors(true);
        $dom  = new \DOMDocument();
        $dom->loadHTML($doc, LIBXML_NONET | LIBXML_COMPACT);
        libxml_clear_errors();
        libxml_use_internal_errors($prev);

        $out = [];
        foreach ($dom->getElementsByTagName('form') as $form) {
            /** @var \DOMElement $form */
            $inputs = [];
            $hasCsrf = false;
            foreach (['input', 'select', 'textarea', 'button'] as $tag) {
                foreach ($form->getElementsByTagName($tag) as $el) {
                    /** @var \DOMElement $el */
                    $name = trim($el->getAttribute('name'));
                    if ($name === '') {
                        continue;
                    }
                    if (stripos($name, 'csrf') !== false) {
                        $hasCsrf = true;
                        continue;
                    }
                    if ($tag === 'button') {
                        continue;
                    }
                    $inputs[$name] = [
                        'name'     => $name,
                        'type'     => $tag === 'input' ? strtolower($el->getAttribute('type') ?: 'text') : $tag,
                        'required' => $el->hasAttribute('required'),
                    ];
                }
            }

            $method = strtoupper(trim($form->getAttribute('method')) ?: 'GET');
            if (str_contains($method, strtoupper(self::PHP_MARK))) {
                $method = 'DYNAMIC';
            }

            $out[] = [
                'kind'     => 'form',
                'line'     => $form->getLineNo(),
                'id'       => $form->getAttribute('id') ?: null,
                'name'     => $form->getAttribute('name') ?: null,
                'raw_action' => $form->getAttribute('action'),
                'action'   => $this->normaliseAction($form->getAttribute('action')),
                'method'   => $method,
                'enctype'  => $form->getAttribute('enctype') ?: null,
                'csrf'     => $hasCsrf,
                'inputs'   => array_values($inputs),
            ];
        }

        return $out;
    }

    /** @return list<array<string, mixed>> */
    private function extractJsCalls(string $src): array
    {
        // Requests inside HTML comments are disabled code; blank them, keep newlines.
        $src = preg_replace_callback('#<!--.*?-->#s', static fn ($m) => str_repeat("\n", substr_count($m[0], "\n")), $src) ?? $src;

        $q = '(?<q>[\'"`])(?<u>(?:(?!\k<q>).){0,300}?)\k<q>';
        $patterns = [
            ['#\bfetch\(\s*' . $q . '#s', null],
            ['#\$\.(?<v>post|get)\(\s*' . $q . '#s', 'v'],
            ['#\baxios\.(?<v>get|post|put|patch|delete)\(\s*' . $q . '#s', 'v'],
            ['#\$\.ajax\(\s*\{[^{}]{0,400}?\burl\s*:\s*' . $q . '#s', null],
        ];

        $out = [];
        foreach ($patterns as [$re, $verbGroup]) {
            if (! preg_match_all($re, $src, $all, PREG_SET_ORDER | PREG_OFFSET_CAPTURE)) {
                continue;
            }
            foreach ($all as $m) {
                $offset  = $m[0][1];
                // A call on a "//" line (or inside a "/* */" block's " * " lines) is commented out.
                $lineStart = strrpos(substr($src, 0, $offset), "\n");
                $linePrefix = ltrim(substr($src, $lineStart === false ? 0 : $lineStart + 1, $offset - ($lineStart === false ? 0 : $lineStart + 1)));
                if (preg_match('#^(//|\*|/\*)#', $linePrefix)) {
                    continue;
                }
                $quote   = $m['q'][0];
                $url     = $m['u'][0];
                $after   = substr($src, $m[0][1] + strlen($m[0][0]), 40);
                $window  = substr($src, $offset, 600);
                if (preg_match('#\b(?:fetch|axios\.\w+)\(|\$\.(?:ajax|post|get)\(#', $window, $nm, PREG_OFFSET_CAPTURE, 6)) {
                    $window = substr($window, 0, $nm[0][1]);
                }

                if ($verbGroup !== null) {
                    $method = strtoupper($m['v'][0]);
                } elseif (preg_match('#\b(?:method|type)\s*:\s*[\'"](get|post|put|patch|delete)[\'"]#i', $window, $mm)) {
                    $method = strtoupper($mm[1]);
                } else {
                    $method = 'GET'; // fetch() and $.ajax() default to GET
                }

                $dynamic = ($quote === '`' && str_contains($url, '${')) || preg_match('#^\s*\+#', $after) === 1;

                $out[] = [
                    'kind'       => 'js',
                    'line'       => substr_count(substr($src, 0, $offset), "\n") + 1,
                    'id'         => null,
                    'name'       => null,
                    'raw_action' => $url,
                    'action'     => $this->normaliseAction($dynamic ? $this->markDynamic($url) : $url),
                    'method'     => $method,
                    'enctype'    => null,
                    'csrf'       => null,
                    'inputs'     => [],
                    // The call sends a service credential itself (rare; normally a browser has none).
                    'sends_token' => preg_match('#Authorization|X-API-Token|X-Cron-Key|cron_key|api_token#i', $window) === 1,
                ];
            }
        }

        return $out;
    }

    private function markDynamic(string $url): string
    {
        $url = (string) preg_replace('#\$\{[^}]*\}#', self::PHP_MARK, $url);

        return str_ends_with($url, self::PHP_MARK) ? $url : rtrim($url, '/') . '/' . self::PHP_MARK;
    }

    private function normaliseAction(string $action): string
    {
        $action = trim(html_entity_decode($action, ENT_QUOTES | ENT_HTML5));
        if ($action === '' || $action === '#') {
            return '';
        }
        if (preg_match('#^(javascript:|mailto:|tel:)#i', $action)) {
            return $action;
        }

        if (preg_match('#^(https?:)?//#i', $action)) {
            $host = strtolower((string) parse_url(str_starts_with($action, '//') ? 'https:' . $action : $action, PHP_URL_HOST));
            if (! in_array($host, FormSubmissionPolicy::PRODUCTION_HOSTS, true) && $host !== 'localhost') {
                return $action; // external, classified later
            }
            $action = (string) (parse_url(str_starts_with($action, '//') ? 'https:' . $action : $action, PHP_URL_PATH) ?? '/');
        }

        $action = (string) preg_replace('#[?\#].*$#s', '', $action);
        $action = (string) preg_replace('#/{2,}#', '/', '/' . ltrim($action, '/'));
        $action = (string) preg_replace('#^/index\.php(/|$)#', '/', $action);

        return $action === '' ? '/' : $action;
    }

    // --------------------------------------------------------------- classify

    private function classify(array $e, bool $legacy): array
    {
        $action = (string) $e['action'];
        $e['route'] = null;

        $set = static function (array $e, string $status, string $reason) {
            $e['status'] = $status;
            $e['reason'] = $reason;

            return $e;
        };

        if ($legacy) {
            return $set($e, self::STATUS_SKIPPED, 'legacy_file');
        }
        if ($e['kind'] === 'js' && ($action === '' || preg_match('#\.(json|js|css|html?|txt|svg|png)$#i', $action))) {
            return $set($e, self::STATUS_SKIPPED, 'static_asset_request');
        }
        if ($action === '') {
            return $set($e, self::STATUS_BLOCKED, 'blank_action');
        }
        if (preg_match('#^(javascript:|mailto:|tel:)#i', $action)) {
            return $set($e, self::STATUS_BLOCKED, 'script_action');
        }
        if (preg_match('#^(https?:)?//#i', $action)) {
            return $set($e, self::STATUS_SKIPPED, 'external_action');
        }
        if (str_starts_with($action, '/{route:')) {
            return $set($e, self::STATUS_BLOCKED, 'named_route_unresolved');
        }
        if ($e['method'] === 'DYNAMIC') {
            return $set($e, self::STATUS_BLOCKED, 'dynamic_method');
        }

        $probe = $action;
        $sampled = false;
        if (str_contains($probe, self::PHP_MARK)) {
            // Accept a dynamic tail only after a static prefix of at least one segment.
            if (! preg_match('#^/[^{/]+#', $probe) || preg_match('#\{php\}[^/]#', $probe)) {
                return $set($e, self::STATUS_BLOCKED, 'dynamic_action');
            }
            $probe = str_replace(self::PHP_MARK, '1', $probe);
            $sampled = true;
        }

        $match = $this->matcher()->match($probe, $e['method']);
        if (! $match['matched'] && $sampled) {
            // A sampled numeric id may not fit a (:segment)/(:alpha) route; try a word.
            $retry = $this->matcher()->match(str_replace(self::PHP_MARK, 'sample', $action), $e['method']);
            if ($retry['matched'] || $retry['status'] === 'verb_mismatch') {
                $match = $retry;
            }
        }
        $e['route'] = $match;

        // A relative URL resolves against the current page path, so it only works
        // from a top-level page. Helpers (site_url etc.) always give a leading slash.
        $raw = trim((string) $e['raw_action']);
        if ($match['matched'] && $raw !== '' && ! preg_match('#^(/|https?:|//|\{|\$\{|\?|\#)#i', $raw)) {
            return $set($e, self::STATUS_FAIL, 'relative_url');
        }

        // A browser page has a session, not a service token: apiToken/cronKey routes reject it.
        if ($match['matched'] && array_intersect($match['filters'] ?? [], FormRouteMatcher::TOKEN_FILTERS) !== [] && empty($e['sends_token'])) {
            return $set($e, self::STATUS_FAIL, 'token_only_route');
        }

        if ($match['matched']) {
            return $set($e, self::STATUS_PASS, $sampled ? 'route_matched_sampled_segment' : 'route_matched');
        }
        if ($sampled && $match['status'] === 'no_route') {
            return $set($e, self::STATUS_BLOCKED, 'dynamic_action_no_static_match');
        }

        return $set($e, self::STATUS_FAIL, $match['status']);
    }

    private function matcher(): FormRouteMatcher
    {
        return $this->matcher ??= new FormRouteMatcher();
    }

    // ----------------------------------------------------------------- source

    private function resolveFilePath(string $value): string
    {
        if ($value === '') {
            return '';
        }
        if (is_file($value)) {
            return $value;
        }
        $candidate = ROOTPATH . ltrim($value, '/');

        return is_file($candidate) ? $candidate : $value;
    }

    private function relativePath(string $file): string
    {
        $real = realpath($file) ?: $file;
        $root = rtrim(realpath(ROOTPATH) ?: ROOTPATH, '/') . '/';

        return str_starts_with($real, $root) ? substr($real, strlen($root)) : $real;
    }

    private function loadSource(string $type, string $value): string
    {
        if ($type === 'text') {
            return $value;
        }
        if ($type === 'file') {
            if (! is_file($value)) {
                return '';
            }
            $content = @file_get_contents($value);

            return $content === false ? '' : $content;
        }
        if ($type !== 'url') {
            return '';
        }

        helper(['url']);
        $url = preg_match('#^https?://#i', $value) ? $value : site_url(ltrim($value, '/'));

        try {
            $resp = Services::curlrequest(['timeout' => 20, 'http_errors' => false])->get($url);

            return (string) $resp->getBody();
        } catch (\Throwable) {
            return '';
        }
    }

    /**
     * Kept for callers outside this class (Services::formIntelligence()).
     */
    public function mapRouteToController(string $action, string $method = 'POST'): array
    {
        $path = $this->normaliseAction($action);
        if ($path === '') {
            return ['matched' => false, 'route' => null, 'controller' => null, 'note' => 'Form action was blank. Cannot map route reliably.'];
        }

        return $this->matcher()->match($path, $method);
    }
}

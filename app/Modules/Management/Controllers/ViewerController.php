<?php declare(strict_types=1);

namespace App\Modules\Management\Controllers;

use App\Controllers\UserController;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class ViewerController extends UserController
{
    protected array $helpers = ['form', 'url'];

    private int $fileSizeLimit = 524288; // 512 KB

    /** @var array<int,array<string,string>> */
    private array $allowedRoots = [];

    /** @var array<string,int> */
    private array $previewRate = ['limit' => 30, 'window' => 60]; // 30/min

    /** @var array<string,int> */
    private array $requestRate = ['limit' => 10, 'window' => 60]; // 10/min

    /** @var array<int,string> */
    private array $allowedRequestHosts = [];

    public function __construct()
    {
        parent::__construct();
        $baseUrl = rtrim(site_url(), '/');
        $parsed  = parse_url($baseUrl);
        $host    = $parsed['host'] ?? null;

        $this->allowedRequestHosts = array_filter(array_unique(array_merge(
            $host ? [$host] : [],
            [
                'mymiwallet.com',
                'www.mymiwallet.com',
                'alphavantage.co',
                'marketaux.com',
            ]
        )));
    }

    public function index(): ResponseInterface|string
    {
        if ($response = $this->enforceAdmin()) {
            return $response;
        }

        $data = $this->commonData();
        if ($data instanceof ResponseInterface) {
            return $data;
        }

        $data['pageTitle']      = 'Management Viewer Console';
        $data['csrf']           = ['name' => csrf_token(), 'hash' => csrf_hash()];
        $data['allowedRoots']   = $this->getAllowedRoots();
        $data['requestHosts']   = $this->allowedRequestHosts;
        $data['fileSizeLimit']  = $this->fileSizeLimit;

        return $this->renderTheme('ManagementModule\\Views\\Tools\\viewer', $data);
    }

    public function list(): ResponseInterface
    {
        if ($response = $this->enforceAdmin(true)) {
            return $response;
        }

        $root = (string) $this->request->getGet('root');
        $ext  = (string) $this->request->getGet('ext');
        $exts = $ext ? array_filter(array_map('trim', explode(',', $ext))) : [];

        $files = $this->collectFiles($root, $exts);

        return $this->response->setJSON([
            'status' => 'success',
            'files'  => $files,
            'csrf'   => csrf_hash(),
        ]);
    }

    public function preview(): ResponseInterface
    {
        if ($response = $this->enforceAdmin(true)) {
            return $response;
        }

        if ($this->isRateLimited('preview')) {
            return $this->rateLimitResponse();
        }

        $sourceType  = $this->normalizeSourceType((string) $this->request->getPost('source_type'));
        $contentType = $this->normalizeContentType((string) $this->request->getPost('content_type'));
        $previewMode = $this->normalizePreviewMode((string) $this->request->getPost('preview_mode'));
        $filePath    = (string) $this->request->getPost('file_path');
        $content     = (string) $this->request->getPost('content');
        $optionsRaw  = (string) $this->request->getPost('options');

        $options = [
            'strip_php' => true,
            'sandbox'   => true,
            'highlight' => true,
        ];

        if ($optionsRaw !== '') {
            $decoded = json_decode($optionsRaw, true);
            if (is_array($decoded)) {
                $options = array_merge($options, $decoded);
            }
        }

        $meta = [
            'source_type'  => $sourceType,
            'content_type' => $contentType,
            'preview_mode' => $previewMode,
            'requested_at' => date('c'),
            'warnings'     => [],
        ];

        if ($sourceType === 'paste') {
            $result = $this->renderContent($content, $contentType, $previewMode, $options, $meta);
            $this->logPreview($meta, null);
            return $result;
        }

        $pathResolution = $this->resolveAllowedPath($filePath, $previewMode === 'trusted');
        if (! $pathResolution['isAllowed']) {
            $meta['warnings'][] = $pathResolution['reason'] ?? 'Not allowed';
            $this->logPreview($meta, null, true);

            return $this->response->setStatusCode(400)->setJSON([
                'status'  => 'error',
                'message' => $pathResolution['reason'] ?? 'File not allowed',
                'meta'    => $meta,
                'csrf'    => csrf_hash(),
            ]);
        }

        $absolutePath = $pathResolution['absolutePath'];
        $meta['resolved'] = $absolutePath;
        $meta['root']     = $pathResolution['root'];

        if (! is_file($absolutePath)) {
            $meta['warnings'][] = 'File not found';
            $this->logPreview($meta, $absolutePath, true);

            return $this->response->setStatusCode(404)->setJSON([
                'status'  => 'error',
                'message' => 'File not found.',
                'meta'    => $meta,
                'csrf'    => csrf_hash(),
            ]);
        }

        $size = filesize($absolutePath) ?: 0;
        $meta['bytes'] = $size;
        if ($size > $this->fileSizeLimit) {
            $meta['warnings'][] = 'File exceeds preview size limit.';
            $this->logPreview($meta, $absolutePath, true);

            return $this->response->setStatusCode(413)->setJSON([
                'status'  => 'error',
                'message' => 'File too large to preview.',
                'meta'    => $meta,
                'csrf'    => csrf_hash(),
            ]);
        }

        $fileContents = (string) file_get_contents($absolutePath);
        $meta['bytes'] = strlen($fileContents);

        $result = $this->renderContent($fileContents, $contentType, $previewMode, $options, $meta, $pathResolution);
        $this->logPreview($meta, $absolutePath);
        return $result;
    }

    public function request(): ResponseInterface
    {
        if ($response = $this->enforceAdmin(true)) {
            return $response;
        }

        if ($this->isRateLimited('request')) {
            return $this->rateLimitResponse();
        }

        $method          = strtoupper((string) $this->request->getPost('method', FILTER_SANITIZE_STRING));
        $url             = trim((string) $this->request->getPost('url'));
        $headersJson     = (string) $this->request->getPost('headers_json');
        $bodyRaw         = (string) $this->request->getPost('body_raw');
        $authType        = (string) $this->request->getPost('auth_type');
        $bearerToken     = (string) $this->request->getPost('bearer_token');
        $timeoutMs       = (int) $this->request->getPost('timeout_ms');
        $followRedirects = (bool) $this->request->getPost('follow_redirects');

        $meta = [
            'method' => $method ?: 'GET',
            'url'    => $url,
        ];

        if ($url === '') {
            return $this->response->setStatusCode(400)->setJSON([
                'status'  => 'error',
                'message' => 'URL is required.',
                'csrf'    => csrf_hash(),
            ]);
        }

        $parsed = parse_url($url);
        if (! isset($parsed['scheme'])) {
            $url = rtrim(site_url(), '/') . '/' . ltrim($url, '/');
            $parsed = parse_url($url);
        }

        $host = $parsed['host'] ?? '';
        if (! $this->hostAllowed($host)) {
            return $this->response->setStatusCode(403)->setJSON([
                'status'  => 'error',
                'message' => 'Target host is not allowlisted.',
                'csrf'    => csrf_hash(),
            ]);
        }

        $headers = [];
        if ($headersJson !== '') {
            $decoded = json_decode($headersJson, true);
            if (! is_array($decoded)) {
                return $this->response->setStatusCode(400)->setJSON([
                    'status'  => 'error',
                    'message' => 'Headers must be valid JSON object.',
                    'csrf'    => csrf_hash(),
                ]);
            }
            foreach ($decoded as $k => $v) {
                if (is_string($k) && is_string($v)) {
                    $headers[$k] = $v;
                }
            }
        }

        if ($authType === 'bearer' && $bearerToken !== '') {
            $headers['Authorization'] = 'Bearer ' . $bearerToken;
        }

        $curl = Services::curlrequest([
            'timeout'         => max(1, min($timeoutMs ?: 5000, 15000)) / 1000,
            'allow_redirects' => $followRedirects,
            'http_errors'     => false,
            'headers'         => $headers,
        ]);

        $start = microtime(true);
        $response = $curl->request($method ?: 'GET', $url, ['body' => $bodyRaw]);
        $elapsed = (int) ((microtime(true) - $start) * 1000);

        $body       = (string) $response->getBody();
        $truncated  = false;
        $limitBytes = 1024 * 1024; // 1MB
        if (strlen($body) > $limitBytes) {
            $body      = substr($body, 0, $limitBytes);
            $truncated = true;
        }

        $pretty = null;
        $contentTypeHeader = $response->getHeaderLine('Content-Type');
        if (str_contains(strtolower($contentTypeHeader), 'application/json')) {
            $decoded = json_decode($body, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $pretty = json_encode($decoded, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
            }
        }

        $curlCmd = $this->buildCurlCommand($method ?: 'GET', $url, $headers, $bodyRaw);

        return $this->response->setJSON([
            'status' => 'success',
            'request_meta' => [
                'url'      => $url,
                'method'   => $method ?: 'GET',
                'headers'  => $headers,
                'elapsed_ms' => $elapsed,
            ],
            'response' => [
                'status_code' => $response->getStatusCode(),
                'headers'     => $response->getHeaders(),
                'body'        => $body,
                'pretty'      => $pretty,
                'truncated'   => $truncated,
            ],
            'curl' => $curlCmd,
            'csrf' => csrf_hash(),
        ]);
    }

    public function saveSnapshot(): ResponseInterface
    {
        if ($response = $this->enforceAdmin(true)) {
            return $response;
        }

        $db = db_connect();
        $builder = $db->table('bf_viewer_snapshots');

        $payload = [
            'title'        => (string) $this->request->getPost('title'),
            'source_type'  => (string) $this->request->getPost('source_type'),
            'content_type' => (string) $this->request->getPost('content_type'),
            'file_path'    => (string) $this->request->getPost('file_path'),
            'content'      => (string) $this->request->getPost('content'),
            'response_json'=> (string) $this->request->getPost('response_json'),
            'user_id'      => $this->cuID,
            'created_on'   => date('Y-m-d H:i:s'),
        ];

        try {
            $builder->insert($payload);
            $id = $db->insertID();
        } catch (\Throwable $e) {
            return $this->response->setStatusCode(500)->setJSON([
                'status'  => 'error',
                'message' => 'Failed to save snapshot: ' . $e->getMessage(),
                'csrf'    => csrf_hash(),
            ]);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'id'     => $id,
            'csrf'   => csrf_hash(),
        ]);
    }

    public function showSnapshot(int $id): ResponseInterface
    {
        if ($response = $this->enforceAdmin(true)) {
            return $response;
        }

        $db = db_connect();
        $row = $db->table('bf_viewer_snapshots')->where('id', $id)->get()->getRowArray();

        if (! $row) {
            return $this->response->setStatusCode(404)->setJSON([
                'status'  => 'error',
                'message' => 'Snapshot not found.',
                'csrf'    => csrf_hash(),
            ]);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'data'   => $row,
            'csrf'   => csrf_hash(),
        ]);
    }

    private function normalizeSourceType(string $source): string
    {
        return $source === 'paste' ? 'paste' : 'file';
    }

    private function normalizeContentType(string $type): string
    {
        $allowed = ['html','view','css','js','json','md','txt','php','py','sql'];
        return in_array($type, $allowed, true) ? $type : 'html';
    }

    private function normalizePreviewMode(string $mode): string
    {
        return $mode === 'trusted' ? 'trusted' : 'safe';
    }

    private function enforceAdmin(bool $jsonResponse = false): ?ResponseInterface
    {
        $isAdmin = function_exists('in_groups') && in_groups('admin');
        if ($isAdmin) {
            return null;
        }

        if ($jsonResponse) {
            return $this->response->setStatusCode(403)->setJSON([
                'status'  => 'error',
                'message' => 'Admin access required.',
                'csrf'    => csrf_hash(),
            ]);
        }

        return redirect()->to('/Management')->with('message', 'Admin access required.');
    }

    /**
     * @return array<int,array<string,string>>
     */
    private function getAllowedRoots(): array
    {
        if ($this->allowedRoots !== []) {
            return $this->allowedRoots;
        }

        $roots = [];
        $baseRoots = [
            ['key' => 'views', 'path' => APPPATH . 'Views/', 'type' => 'core'],
            ['key' => 'themes', 'path' => ROOTPATH . 'themes/public/', 'type' => 'theme'],
        ];

        foreach ($baseRoots as $root) {
            $real = realpath($root['path']);
            if ($real !== false) {
                $roots[] = [
                    'key'  => $root['key'],
                    'base' => rtrim($real, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR,
                    'type' => $root['type'],
                ];
            }
        }

        $modulesDir = APPPATH . 'Modules/';
        foreach (glob($modulesDir . '*', GLOB_ONLYDIR) ?: [] as $moduleDir) {
            $viewsDir = $moduleDir . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR;
            $real     = realpath($viewsDir);
            if ($real !== false) {
                $roots[] = [
                    'key'  => 'module:' . basename($moduleDir),
                    'base' => rtrim($real, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR,
                    'type' => 'module',
                ];
            }
        }

        $this->allowedRoots = $roots;
        return $this->allowedRoots;
    }

    /**
     * @return array<int,array<string,string>>
     */
    private function getTrustedRoots(): array
    {
        return array_values(array_filter(
            $this->getAllowedRoots(),
            static fn ($root) => in_array($root['key'], ['views', 'themes'], true)
        ));
    }

    /**
     * @param bool $trustedPreview If true, limit to trusted roots.
     * @return array{isAllowed:bool,absolutePath?:string,relativeKey?:string,root?:string,reason?:string}
     */
    private function resolveAllowedPath(string $inputPath, bool $trustedPreview = false): array
    {
        $clean = $this->sanitizePath($inputPath);
        if ($clean === '') {
            return ['isAllowed' => false, 'reason' => 'File path is required.'];
        }

        if (str_contains($clean, "\0") || preg_match('#://#', $clean)) {
            return ['isAllowed' => false, 'reason' => 'Stream wrappers and null bytes are not allowed.'];
        }

        if (preg_match('#(^|/)\\.\\.(/|$)#', $clean)) {
            return ['isAllowed' => false, 'reason' => 'Path traversal is not allowed.'];
        }

        $roots = $trustedPreview ? $this->getTrustedRoots() : $this->getAllowedRoots();

        foreach ($roots as $root) {
            $candidate = $root['base'] . $clean;
            $real      = realpath($candidate);
            if ($real === false) {
                continue;
            }

            if (! str_starts_with($real, $root['base'])) {
                continue;
            }

            $relativeKey = ltrim(str_replace($root['base'], '', $real), DIRECTORY_SEPARATOR);

            return [
                'isAllowed'    => true,
                'absolutePath' => $real,
                'relativeKey'  => $relativeKey,
                'root'         => $root['key'],
            ];
        }

        return ['isAllowed' => false, 'reason' => 'File is not in an allowlisted directory.'];
    }

    private function sanitizePath(string $path): string
    {
        $path = str_replace(["\r", "\n"], '', $path);
        $path = str_replace('\\', '/', $path);
        $path = ltrim($path, '/');
        return preg_replace('#/+#', '/', $path) ?? '';
    }

    /**
     * @param array<string> $exts
     * @return array<int,array<string,string>>
     */
    private function collectFiles(string $rootFilter, array $exts = []): array
    {
        $cacheKey = 'viewer:list:' . md5($rootFilter . ':' . implode(',', $exts));
        $cached = cache($cacheKey);
        if (is_array($cached)) {
            return $cached;
        }

        $files = [];
        $roots = $this->getAllowedRoots();
        if ($rootFilter !== '') {
            $roots = array_values(array_filter($roots, static function ($root) use ($rootFilter) {
                if ($rootFilter === 'views' || $rootFilter === 'themes' || str_starts_with($rootFilter, 'module')) {
                    return $root['key'] === $rootFilter;
                }
                return true;
            }));
        }

        foreach ($roots as $root) {
            $iterator = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($root['base'], RecursiveDirectoryIterator::SKIP_DOTS)
            );

            foreach ($iterator as $file) {
                if (! $file->isFile()) {
                    continue;
                }

                $ext = strtolower($file->getExtension());
                if ($exts && ! in_array($ext, $exts, true)) {
                    continue;
                }

                if (! in_array($ext, ['php','html','js','css','json','md','txt','sql'], true)) {
                    continue;
                }

                $relative = ltrim(str_replace($root['base'], '', $file->getPathname()), DIRECTORY_SEPARATOR);
                $files[]  = [
                    'value' => str_replace(DIRECTORY_SEPARATOR, '/', $relative),
                    'label' => str_replace(DIRECTORY_SEPARATOR, '/', $relative),
                    'type'  => $ext,
                    'root'  => $root['key'],
                    'bytes' => $file->getSize(),
                ];
            }
        }

        usort($files, static fn ($a, $b) => strcmp($a['value'], $b['value']));

        cache()->save($cacheKey, $files, 120);
        return $files;
    }

    private function stripPhpTags(string $content): string
    {
        return (string) preg_replace('/<\\?(php|=)(.|\\s)*?\\?>/i', '', $content);
    }

    /**
     * @param array{absolutePath?:string,root?:string,relativeKey?:string} $resolution
     */
    private function deriveViewName(array $resolution): ?string
    {
        if (! isset($resolution['absolutePath'], $resolution['root'])) {
            return null;
        }

        $roots = $this->getAllowedRoots();
        $absolutePath = $resolution['absolutePath'];

        foreach ($roots as $root) {
            if ($root['key'] !== $resolution['root']) {
                continue;
            }

            $relative = ltrim(str_replace($root['base'], '', $absolutePath), DIRECTORY_SEPARATOR);
            $relative = preg_replace('#\\.(php|html)$#i', '', $relative) ?? $relative;
            return str_replace(DIRECTORY_SEPARATOR, '/', $relative);
        }

        return null;
    }

    /**
     * @param array<string,mixed> $options
     * @param array<string,mixed> $meta
     * @param array<string,mixed>|null $resolution
     */
    private function renderContent(string $content, string $contentType, string $previewMode, array $options, array &$meta, ?array $resolution = null): ResponseInterface
    {
        $renderType = 'iframe';
        $html = '';
        $code = '';

        if ($previewMode === 'trusted' && $contentType === 'view' && $resolution !== null) {
            $viewName = $this->deriveViewName($resolution);
            if ($viewName === null) {
                return $this->response->setStatusCode(400)->setJSON([
                    'status'  => 'error',
                    'message' => 'Unable to derive view name.',
                    'meta'    => $meta,
                    'csrf'    => csrf_hash(),
                ]);
            }

            try {
                $html = view($viewName);
            } catch (\Throwable $e) {
                return $this->response->setStatusCode(500)->setJSON([
                    'status'  => 'error',
                    'message' => 'Trusted render failed: ' . $e->getMessage(),
                    'meta'    => $meta,
                    'csrf'    => csrf_hash(),
                ]);
            }
        } else {
            $renderType = $this->inferRenderType($contentType);
            $processed = $content;

            if ($previewMode === 'safe' && $options['strip_php'] ?? true) {
                $processed = $this->stripPhpTags($processed);
                if ($processed !== $content) {
                    $meta['warnings'][] = 'PHP blocks stripped in safe mode.';
                }
            }

            if ($contentType === 'json') {
                $decoded = json_decode($processed, true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    $processed = json_encode($decoded, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
                } else {
                    $meta['warnings'][] = 'Invalid JSON; showing raw content.';
                }
                $renderType = 'code';
            } elseif (in_array($contentType, ['css','js','md','txt','py','sql','php'], true)) {
                $renderType = 'code';
            } else {
                $renderType = 'iframe';
            }

            if ($renderType === 'iframe') {
                $html = $processed;
            } else {
                $code = $processed;
            }
        }

        $meta['content_type'] = $contentType;
        $meta['preview_mode'] = $previewMode;
        $meta['render_type']  = $renderType;

        return $this->response->setJSON([
            'status'      => 'success',
            'render_type' => $renderType,
            'html'        => $html,
            'code'        => $code,
            'meta'        => $meta,
            'csrf'        => csrf_hash(),
        ]);
    }

    private function inferRenderType(string $contentType): string
    {
        return in_array($contentType, ['html','view'], true) ? 'iframe' : 'code';
    }

    private function isRateLimited(string $type): bool
    {
        $identifier = $this->cuID !== null ? 'user:' . $this->cuID : 'ip:' . $this->request->getIPAddress();
        $key = 'viewer:' . $type . ':' . $identifier;
        $cache = cache();
        $count = (int) ($cache->get($key) ?? 0);

        $limit = $type === 'request' ? $this->requestRate['limit'] : $this->previewRate['limit'];
        $window = $type === 'request' ? $this->requestRate['window'] : $this->previewRate['window'];

        if ($count >= $limit) {
            return true;
        }

        if ($count === 0) {
            $cache->save($key, 1, $window);
        } else {
            $cache->increment($key);
        }

        return false;
    }

    private function rateLimitResponse(): ResponseInterface
    {
        return $this->response->setStatusCode(429)->setJSON([
            'status'  => 'error',
            'message' => 'Rate limit exceeded. Please wait before retrying.',
            'csrf'    => csrf_hash(),
        ]);
    }

    /**
     * @param array<string,mixed> $meta
     */
    private function logPreview(array $meta, ?string $path, bool $denied = false): void
    {
        $message = sprintf(
            '[Viewer] %s preview: source=%s type=%s mode=%s path=%s user=%s ip=%s warnings=%s',
            $denied ? 'Denied' : 'Processed',
            $meta['source_type'] ?? 'n/a',
            $meta['content_type'] ?? 'n/a',
            $meta['preview_mode'] ?? 'safe',
            $path ?? 'n/a',
            $this->cuID ?? 'guest',
            $this->request->getIPAddress(),
            json_encode($meta['warnings'] ?? [])
        );

        if ($denied) {
            log_message('warning', $message);
        } else {
            log_message('info', $message);
        }
    }

    private function hostAllowed(string $host): bool
    {
        if ($host === '') {
            return false;
        }

        foreach ($this->allowedRequestHosts as $allowed) {
            if (strcasecmp($host, $allowed) === 0) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param array<string,string> $headers
     */
    private function buildCurlCommand(string $method, string $url, array $headers, string $body): string
    {
        $parts = ['curl', '-X', escapeshellarg($method)];
        foreach ($headers as $k => $v) {
            $parts[] = '-H';
            $parts[] = escapeshellarg($k . ': ' . $v);
        }
        if ($body !== '') {
            $parts[] = '--data';
            $parts[] = escapeshellarg($body);
        }
        $parts[] = escapeshellarg($url);
        return implode(' ', $parts);
    }
}

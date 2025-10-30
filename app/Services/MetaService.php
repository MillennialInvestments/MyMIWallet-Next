<?php namespace App\Services;

use App\Models\PageSEOModel;
use Config\Database;

class MetaService
{
    protected $db;
    protected $cache;
    protected $model;
    protected $defaultImage;
    protected $defaultDescription;
    public $helpers = ['string', 'cache'];   // or whatever file name you used

    public function __construct()
    {
        
        $this->db                 = Database::connect();
        $this->cache              = \Config\Services::cache();
        $this->model              = new PageSEOModel();
        $this->defaultImage       = base_url('/assets/images/Company/MyMI-Wallet-The-Future-Of-Finance-SQ.png');
        $this->defaultDescription = 'Experience the future of finance with MyMI Wallet. Budget, invest, grow.';
    }

    /**
     * Precedence:
     * 1) Controller $pageName override (exact match on page_name)
     * 2) Exact URI slug match (page_internal_url)
     * 3) Log missing page and return safe defaults
     */
    public function getSeoData($uri = null, ?string $pageName = null): array
    {
        $uri  = $uri ?? service('uri');
        $slug = implode('/', array_filter($uri->getSegments()));
        $slug = $this->normalizeSlug($slug);

        $cacheKey = 'seo_' . md5(($pageName ?? '') . '|' . $slug);
        $cacheKeySanitized = sanitizeCacheKey($cacheKey);
        if (!$this->cache) {
            $this->cache = \Config\Services::cache();
        }
        if ($cached = $this->cache->get($cacheKeySanitized)) {
            log_message('debug', '[MetaService] slug={slug} pageName={pageName} cacheHit={cacheHit} path={path}', [
                'slug'     => $slug,
                'pageName' => $pageName,
                'cacheHit' => true,
                'path'     => 'CACHE',
            ]);
            return $cached;
        }

        // 1) Controller override wins
        if (!empty($pageName)) {
            $row = $this->model->getByPageName($pageName);
            if ($row) {
                $final = $this->buildSeoArray($row, true);
                $this->cache->save($cacheKeySanitized, $final, 3600);
                log_message('debug', '[MetaService] slug={slug} pageName={pageName} cacheHit={cacheHit} path={path}', [
                    'slug'     => $slug,
                    'pageName' => $pageName,
                    'cacheHit' => false,
                    'path'     => 'DB',
                ]);
                return $final;
            }
        }

        // 2) Exact slug match
        if (!empty($slug)) {
            $row = $this->model->getByInternalUrl($slug);
            if ($row) {
                $final = $this->buildSeoArray($row, true);
                $this->cache->save($cacheKeySanitized, $final, 3600);
                log_message('debug', '[MetaService] slug={slug} pageName={pageName} cacheHit={cacheHit} path={path}', [
                    'slug'     => $slug,
                    'pageName' => $pageName,
                    'cacheHit' => false,
                    'path'     => 'DB',
                ]);
                return $final;
            }
        }

        // 2b) Lenient fallback (trailing slash/case)
        $altSlug = $this->relaxedSlug($slug);
        if ($altSlug !== $slug) {
            $row = $this->model->getByInternalUrl($altSlug);
            if ($row) {
                $final = $this->buildSeoArray($row, true);
                $this->cache->save($cacheKeySanitized, $final, 3600);
                log_message('debug', '[MetaService] slug={slug} pageName={pageName} cacheHit={cacheHit} path={path}', [
                    'slug'     => $slug,
                    'pageName' => $pageName,
                    'cacheHit' => false,
                    'path'     => 'DB',
                ]);
                return $final;
            }
        }

        // 3) Not found → log once & return safe defaults
        $this->logMissingPage($slug);

        $fallback = $this->buildSeoArray([
            'page_title'       => $this->humanizeSlug($slug),
            'page_description' => $this->defaultDescription,
            'page_url'         => base_url($slug),
            'page_image'       => $this->defaultImage
        ], false);

        $this->cache->save($cacheKeySanitized, $fallback, 900); // 15 min
        log_message('debug', '[MetaService] slug={slug} pageName={pageName} cacheHit={cacheHit} path={path}', [
            'slug'     => $slug,
            'pageName' => $pageName,
            'cacheHit' => false,
            'path'     => 'FALLBACK',
        ]);
        return $fallback;
    }

    protected function buildSeoArray(array $row, bool $automated): array
    {
        return [
            'page_title'       => $row['page_title']       ?? $this->humanizeSlug($row['page_internal_url'] ?? ''),
            'page_description' => $row['page_description'] ?? $this->defaultDescription,
            'page_url'         => $row['page_url']         ?? base_url($row['page_internal_url'] ?? ''),
            'page_image'       => $row['page_image']       ?? $this->defaultImage,
            'page_type'        => $automated ? 'Automated' : 'Manual',
        ];
    }

    public function getBySlugOrFallback(string $slug): array
    {
        // Normalize and try strict + relaxed lookups
        $norm    = $this->normalizeSlug($slug);
        $row     = $this->model->getByInternalUrl($norm);

        if (! $row) {
            $alt = $this->relaxedSlug($norm);
            if ($alt !== $norm) {
                $row = $this->model->getByInternalUrl($alt);
            }
        }

        if ($row) {
            // Reuse your canonical builder for consistency
            return $this->buildSeoArray($row, true);
        }

        // Log once (same as getSeoData) and return safe defaults
        $this->logMissingPage($norm);

        return $this->buildSeoArray([
            'page_title'       => $this->fallbackTitleFromSlug($norm),
            'page_description' => $this->defaultDescription,
            'page_url'         => base_url($norm),
            'page_image'       => $this->defaultImage,
        ], false);
    }

    private function fallbackTitleFromSlug(string $slug): string
    {
        // e.g., "preview/alert/nasdaq-xair" -> "Preview Alert — NASDAQ XAIR"
        $parts = array_map('ucfirst', explode('/', $slug));
        return implode(' ', array_filter([$parts[0] ?? '', $parts[1] ?? '', '—', strtoupper($parts[2] ?? '')]));
    }

    protected function humanizeSlug(string $slug): string
    {
        $slug = trim($slug, '/');
        if ($slug === '') return 'MyMI Wallet';
        return ucwords(str_replace(['-', '/'], [' ', ' | '], $slug)) . ' | MyMI Wallet';
    }

    protected function normalizeSlug(string $slug): string
    {
        $slug = strtolower(trim($slug, '/'));
        $slug = preg_replace('#/+#', '/', $slug);
        return $slug;
    }

    protected function relaxedSlug(string $slug): string
    {
        return rtrim($slug, '/');
    }

    protected function logMissingPage(string $slug): void
    {
        if ($slug === '') return;

        $exists = $this->db->table('bf_marketing_page_seo')
            ->where('page_internal_url', $slug)
            ->countAllResults();

        if ((int)$exists === 0) {
            $this->db->table('bf_marketing_page_seo')->insert([
                'page_name'         => $this->humanizeSlug($slug),
                'page_title'        => $this->humanizeSlug($slug),
                'page_description'  => $this->defaultDescription,
                'page_url'          => base_url($slug),
                'page_internal_url' => $slug,
                'page_image'        => $this->defaultImage,
                'status'            => 'Pending',
                'source'            => 'AutoDetected',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ]);
        }
    }

    public function getStructuredData(array $seoData): string
    {
        return json_encode([
            '@context'    => 'https://schema.org',
            '@type'       => 'WebPage',
            'url'         => $seoData['page_url'],
            'name'        => $seoData['page_title'],
            'description' => $seoData['page_description'],
            'image'       => $seoData['page_image']
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}

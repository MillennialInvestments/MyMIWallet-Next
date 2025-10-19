<?php

namespace App\Libraries;

use App\Contracts\SitemapSourceInterface;
use CodeIgniter\Router\RouteCollection;
use Config\Sitemap as SitemapConfig;

/**
 * Generates sitemap files based on routes and custom providers.
 */
#[\AllowDynamicProperties]
class SitemapGenerator
{
    private RouteCollection $routes;
    private SitemapConfig $config;
    /** @var SitemapSourceInterface[] */
    private array $providers;
    /** @var string[] URLs of written sitemap files */
    private array $writtenFiles = [];

    public function __construct(RouteCollection $routes, SitemapConfig $config, array $providers = [])
    {
        $this->routes    = $routes;
        $this->config    = $config;
        $this->providers = $providers;
    }

    /**
     * Collect static, non-parameterized GET routes.
     *
     * @return array<int,array{loc:string}>
     */
    public function collectStaticFromRoutes(): array
    {
        $urls  = [];
        $base  = $this->getBaseUrl();
        $paths = $this->routes->getRoutes('get');
        foreach ($paths as $uri => $handler) {
            if ($this->shouldExclude($uri)) {
                continue;
            }
            if (str_contains($uri, '(')) {
                // Parameterized route – requires provider.
                continue;
            }
            $loc = $uri === '/' || $uri === '' ? $base : $base . ltrim($uri, '/');
            $urls[] = ['loc' => $loc];
        }
        return $urls;
    }

    /**
     * Collect URLs from sitemap providers.
     *
     * @return array<int,array<string,mixed>>
     */
    public function collectFromProviders(): array
    {
        $urls = [];
        foreach ($this->providers as $provider) {
            if ($provider instanceof SitemapSourceInterface) {
                $urls = array_merge($urls, $provider->urls());
            }
        }
        return $urls;
    }

    /**
     * Normalize URLs and remove duplicates.
     *
     * @param array<int,array<string,mixed>> $urls
     *
     * @return array<int,array<string,mixed>>
     */
    public function normalizeAndDeduplicate(array $urls): array
    {
        $base   = rtrim($this->getBaseUrl(), '/');
        $seen   = [];
        $result = [];
        foreach ($urls as $item) {
            $loc = $item['loc'] ?? '';
            if ($loc === '') {
                continue;
            }
            if (! str_starts_with($loc, 'http')) {
                $loc = $base . '/' . ltrim($loc, '/');
            }
            $parts = parse_url($loc);
            $path  = strtolower($parts['path'] ?? '');
            $path  = rtrim($path, '/');
            $loc   = $base . $path;
            if ($path === '') {
                $loc = $base;
            }
            $key = $loc;
            if (! isset($seen[$key])) {
                $seen[$key] = true;
                $item['loc'] = $loc;
                $result[]    = $item;
            }
        }
        return $result;
    }

    /**
     * Build sitemap files.
     */
    public function build(): int
    {
        $urls = array_merge($this->collectStaticFromRoutes(), $this->collectFromProviders());
        $urls = $this->normalizeAndDeduplicate($urls);
        $this->writeSitemapFiles($urls);
        $this->writeRobots();
        return count($urls);
    }

    /**
     * Write sitemap files to disk, splitting when necessary.
     *
     * @param array<int,array<string,mixed>> $urls
     */
    public function writeSitemapFiles(array $urls): void
    {
        $chunks = array_chunk($urls, 50000);
        $this->writtenFiles = [];
        foreach ($chunks as $i => $chunk) {
            $xml      = $this->buildUrlset($chunk);
            $filename = count($chunks) === 1 ? 'sitemap.xml' : 'sitemap-' . ($i + 1) . '.xml';
            $path     = rtrim($this->config->outputDir, '/') . '/' . $filename;
            if ($this->config->gzip) {
                file_put_contents($path . '.gz', gzencode($xml));
                $this->writtenFiles[] = $this->getBaseUrl() . $filename . '.gz';
            } else {
                file_put_contents($path, $xml);
                $this->writtenFiles[] = $this->getBaseUrl() . $filename;
            }
        }
        if ($this->config->emitIndex && count($chunks) > 1) {
            $indexXml = $this->buildIndex($this->writtenFiles);
            $indexPath = rtrim($this->config->outputDir, '/') . '/sitemap-index.xml';
            file_put_contents($indexPath, $indexXml);
        }
    }

    /**
     * Build XML for a standard urlset.
     *
     * @param array<int,array<string,mixed>> $urls
     */
    protected function buildUrlset(array $urls): string
    {
        $dom = new \DOMDocument('1.0', 'UTF-8');
        $dom->formatOutput = true;
        $urlset = $dom->createElement('urlset');
        $urlset->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
        foreach ($urls as $item) {
            $url = $dom->createElement('url');
            $url->appendChild($dom->createElement('loc', htmlspecialchars($item['loc'], ENT_XML1)));
            if (! empty($item['lastmod']) && $item['lastmod'] instanceof \DateTimeInterface) {
                $url->appendChild($dom->createElement('lastmod', $item['lastmod']->format(DATE_RFC3339)));
            }
            if (! empty($item['changefreq'])) {
                $url->appendChild($dom->createElement('changefreq', $item['changefreq']));
            }
            if (! empty($item['priority'])) {
                $url->appendChild($dom->createElement('priority', number_format($item['priority'], 1)));
            }
            if (! empty($item['images'])) {
                $urlset->setAttribute('xmlns:image', 'http://www.google.com/schemas/sitemap-image/1.1');
                foreach ($item['images'] as $img) {
                    $image = $dom->createElement('image:image');
                    $image->appendChild($dom->createElement('image:loc', htmlspecialchars($img, ENT_XML1)));
                    $url->appendChild($image);
                }
            }
            $urlset->appendChild($url);
        }
        $dom->appendChild($urlset);
        return $dom->saveXML();
    }

    /**
     * Build XML for sitemap index.
     *
     * @param list<string> $files
     */
    protected function buildIndex(array $files): string
    {
        $dom = new \DOMDocument('1.0', 'UTF-8');
        $dom->formatOutput = true;
        $index = $dom->createElement('sitemapindex');
        $index->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
        $now = (new \DateTime())->format(DATE_RFC3339);
        foreach ($files as $loc) {
            $sitemap = $dom->createElement('sitemap');
            $sitemap->appendChild($dom->createElement('loc', htmlspecialchars($loc, ENT_XML1)));
            $sitemap->appendChild($dom->createElement('lastmod', $now));
            $index->appendChild($sitemap);
        }
        $dom->appendChild($index);
        return $dom->saveXML();
    }

    /** Update robots.txt with sitemap references. */
    public function writeRobots(): void
    {
        $path  = rtrim($this->config->outputDir, '/') . '/robots.txt';
        $lines = file_exists($path) ? file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];
        $lines = array_filter($lines, static fn ($line) => stripos($line, 'sitemap:') !== 0);
        $base  = $this->getBaseUrl();
        $lines[] = 'Sitemap: ' . $base . 'sitemap.xml';
        if ($this->config->emitIndex && count($this->writtenFiles) > 1) {
            $lines[] = 'Sitemap: ' . $base . 'sitemap-index.xml';
        }
        file_put_contents($path, implode(PHP_EOL, $lines) . PHP_EOL);
    }

    /** Notify search engines of updated sitemap. */
    public function pingSearchEngines(): void
    {
        $target = urlencode($this->getBaseUrl() . (count($this->writtenFiles) > 1 ? 'sitemap-index.xml' : 'sitemap.xml'));
        $urls = [
            'https://www.google.com/ping?sitemap=' . $target,
            'https://www.bing.com/ping?sitemap=' . $target,
        ];
        $context = stream_context_create(['http' => ['timeout' => 2]]);
        foreach ($urls as $url) {
            try {
                @file_get_contents($url, false, $context);
            } catch (\Throwable $e) {
                // Ignore errors
            }
        }
    }

    /** Convenience wrapper. */
    public function ping(): void
    {
        $this->pingSearchEngines();
    }

    /** Helper: Determine if a URI should be excluded. */
    protected function shouldExclude(string $uri): bool
    {
        foreach ($this->config->excludePatterns as $pattern) {
            if (preg_match($pattern, $uri)) {
                return true;
            }
        }
        return false;
    }

    protected function getBaseUrl(): string
    {
        return rtrim($this->config->baseURL ?: config('App')->baseURL, '/') . '/';
    }
}
?>

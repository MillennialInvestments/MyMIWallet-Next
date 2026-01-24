<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Sitemap extends BaseConfig
{
    /**
     * Base URL for generated sitemap links. Falls back to App.baseURL when empty.
     */
    public string $baseURL = '';

    /**
     * Directory where sitemap and robots files will be written.
     */
    public string $outputDir = FCPATH;

    /**
     * Regex patterns for routes that should be excluded.
     *
     * @var list<string>
     */
    public array $excludePatterns = [
        '#^api/#',
        '#/ajax/#',
        '#/fetch#',
        '#^admin#',
        '#/webhook#',
        '#/callback#',
        '#^debug#',
        '#^beta#',
        '#^test#',
        '#/index\.php/Exchange/Solana/fetchFrontendData$#',
    ];

    /** Whether to emit a sitemap index when multiple files are generated. */
    public bool $emitIndex = true;

    /** Emit image sitemap entries when available. */
    public bool $emitImageSitemap = true;

    /** Emit Google News sitemap (not yet implemented). */
    public bool $emitNewsSitemap = false;

    /** Compress sitemap files with gzip. */
    public bool $gzip = false;
}
?>
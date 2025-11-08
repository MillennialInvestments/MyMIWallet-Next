<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use Kint\Parser\ConstructablePluginInterface;
use Kint\Renderer\Rich\TabPluginInterface;
use Kint\Renderer\Rich\ValuePluginInterface;

/**
 * --------------------------------------------------------------------------
 * Kint
 * --------------------------------------------------------------------------
 *
 * We use Kint's `RichRenderer` and `CLIRenderer`. This area contains options
 * that you can set to customize how Kint works for you.
 *
 * @see https://kint-php.github.io/kint/ for details on these settings.
 */
class Kint extends BaseConfig   
{
    /*
    |--------------------------------------------------------------------------
    | Global Settings
    |--------------------------------------------------------------------------
    */

    /**
     * @var list<class-string<ConstructablePluginInterface>|ConstructablePluginInterface>|null
     */
    public $plugins;

    public int $maxDepth           = 6;
    public bool $displayCalledFrom = true;
    public bool $expanded          = false;

    /*
    |--------------------------------------------------------------------------
    | RichRenderer Settings
    |--------------------------------------------------------------------------
    */
    public string $richTheme = 'aante-light.css';
    public bool $richFolder  = false;
    public $richSort           = 0; // fallback, set properly in __construct()

    /**
     * @var array<string, class-string<ValuePluginInterface>>|null
     */
    public $richObjectPlugins;

    /**
     * @var array<string, class-string<TabPluginInterface>>|null
     */
    public $richTabPlugins;

    /*
    |--------------------------------------------------------------------------
    | CLI Settings
    |--------------------------------------------------------------------------
    */
    public bool $cliColors      = true;
    public bool $cliForceUTF8   = false;
    public bool $cliDetectWidth = true;
    public int $cliMinWidth     = 40;

    public function __construct()
    {
        parent::__construct();

        // Prefer SORT_FULL if available in your installed Kint; fall back safely
        if (\class_exists(\Kint\Renderer\AbstractRenderer::class)) {
            if (\defined('Kint\Renderer\AbstractRenderer::SORT_FULL')) {
                $this->richSort = \Kint\Renderer\AbstractRenderer::SORT_FULL;
            } elseif (\defined('Kint\Renderer\AbstractRenderer::SORT_SIMPLE')) {
                $this->richSort = \constant('Kint\\Renderer\\AbstractRenderer::SORT_SIMPLE');
            } elseif (\defined('Kint\Renderer\AbstractRenderer::SORT_NONE')) {
                $this->richSort = \constant('Kint\\Renderer\\AbstractRenderer::SORT_NONE');
            }
        }
    }
}

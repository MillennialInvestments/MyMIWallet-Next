<?php

use Config\Theme;

function theme_name(string $override = null): string
{
    $cfg = config(Theme::class);
    return $override ?: $cfg->default;
}

function theme_view(string $theme, string $path): string
{
    // maps to app/Views/themes/{theme}/{path}.php
    return "themes/{$theme}/{$path}";
}

function theme_asset(string $path, string $theme = null): string
{
    $cfg = config(Theme::class);
    $t   = $theme ?: $cfg->default;
    // e.g. /assets/dashboard/css/app.css
    return rtrim($cfg->assetBase, '/') . '/' . $t . '/' . ltrim($path, '/');
}

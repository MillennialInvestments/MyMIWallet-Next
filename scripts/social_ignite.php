#!/usr/bin/env php
<?php
declare(strict_types=1);

$root = dirname(__DIR__);
$templatesPath = __DIR__ . '/social_templates.json';

function usage(): void
{
    echo "Usage:\n";
    echo "  php scripts/social_ignite.php --input scripts/social_input.json\n";
    echo "  php scripts/social_ignite.php --title \"...\" --message \"...\" --url \"...\" --campaign \"...\" [--hashtags \"tag1,tag2\"] [--cta \"...\"] [--tickers \"AAPL,TSLA\"]\n";
    exit(1);
}

$options = getopt('', [
    'input:',
    'title:',
    'message:',
    'url:',
    'campaign:',
    'hashtags::',
    'cta::',
    'tickers::',
]);

if (!$options) {
    usage();
}

function parseList(?string $value): array
{
    if ($value === null) {
        return [];
    }
    $cleaned = str_replace(['#', '@'], '', $value);
    $parts   = preg_split('/[, ]+/', $cleaned, -1, PREG_SPLIT_NO_EMPTY);
    return array_values(array_filter(array_map('trim', $parts), static fn($v) => $v !== ''));
}

function slugify(string $value): string
{
    $value = strtolower($value);
    $value = preg_replace('/[^a-z0-9]+/', '-', $value);
    $value = trim($value ?? '', '-');
    return $value !== '' ? $value : 'campaign-' . date('Ymd-His');
}

function readInput(array $options, string $templatesPath): array
{
    $payload = [];
    if (isset($options['input'])) {
        $file = $options['input'];
        if (!is_file($file)) {
            fwrite(STDERR, "Input file not found: {$file}\n");
            exit(1);
        }
        $payload = json_decode((string) file_get_contents($file), true) ?? [];
        if (!is_array($payload)) {
            fwrite(STDERR, "Invalid input JSON.\n");
            exit(1);
        }
    }

    $payload['title']   = $options['title'] ?? $payload['title'] ?? null;
    $payload['message'] = $options['message'] ?? $payload['message'] ?? null;
    $payload['url']     = $options['url'] ?? $payload['url'] ?? null;
    $payload['cta']     = $options['cta'] ?? $payload['cta'] ?? null;
    $payload['campaign']= $options['campaign'] ?? $payload['campaign'] ?? null;

    $hashtagsInput = $options['hashtags'] ?? ($payload['hashtags'] ?? null);
    $tickersInput  = $options['tickers'] ?? ($payload['tickers'] ?? null);
    $payload['hashtags'] = parseList(is_array($hashtagsInput) ? implode(',', $hashtagsInput) : $hashtagsInput);
    $payload['tickers']  = parseList(is_array($tickersInput) ? implode(',', $tickersInput) : $tickersInput);

    foreach (['title', 'message', 'url'] as $required) {
        if (empty($payload[$required])) {
            fwrite(STDERR, "Missing required field: {$required}\n");
            usage();
        }
    }

    $payload['campaign'] = $payload['campaign'] ?: slugify((string) $payload['title']);

    if (!is_file($templatesPath)) {
        fwrite(STDERR, "Templates not found: {$templatesPath}\n");
        exit(1);
    }

    $templates = json_decode((string) file_get_contents($templatesPath), true);
    if (!isset($templates['platforms'])) {
        fwrite(STDERR, "Invalid templates file.\n");
        exit(1);
    }

    return [$payload, $templates['platforms']];
}

function truncateWithEllipsis(string $text, int $limit): string
{
    $strlen = function_exists('mb_strlen') ? 'mb_strlen' : 'strlen';
    $substr = function_exists('mb_substr') ? 'mb_substr' : 'substr';

    if ($strlen($text) <= $limit) {
        return $text;
    }
    $trimmed = $substr($text, 0, $limit - 1);
    $trimmed = preg_replace('/\s+\S*$/u', '', $trimmed) ?: $trimmed;
    return rtrim($trimmed) . '…';
}

function renderTemplate(string $template, array $context, ?int $maxLength = null): string
{
    $replaced = strtr($template, $context);
    $replaced = preg_replace("/\\n{3,}/", "\n\n", trim((string) $replaced));
    if ($maxLength !== null) {
        $replaced = truncateWithEllipsis($replaced, $maxLength);
    }
    return $replaced;
}

function buildContext(array $payload): array
{
    $hashtags = array_unique(array_map(static fn($tag) => '#' . ltrim($tag, '#'), $payload['hashtags'] ?? []));
    $tickers  = array_unique(array_map(static fn($tick) => strtoupper($tick), $payload['tickers'] ?? []));

    $hashtagsLine = $hashtags ? implode(' ', $hashtags) : '';
    $tickersLine  = $tickers ? 'Tickers: ' . implode(', ', $tickers) : '';
    $ctaLine      = $payload['cta'] ? 'CTA: ' . $payload['cta'] : '';

    return [
        '{title}'          => $payload['title'],
        '{message}'        => $payload['message'],
        '{url}'            => $payload['url'],
        '{hashtags_line}'  => $hashtagsLine,
        '{tickers_line}'   => $tickersLine,
        '{cta_line}'       => $ctaLine,
    ];
}

[$payload, $platforms] = readInput($options, $templatesPath);
$campaignSlug = slugify((string) $payload['campaign']);

$outBase = __DIR__ . '/social_output/' . date('Y-m-d') . '/' . $campaignSlug;
if (!is_dir($outBase) && !mkdir($outBase, 0775, true) && !is_dir($outBase)) {
    fwrite(STDERR, "Failed to create output directory: {$outBase}\n");
    exit(1);
}

$context = buildContext($payload);

$outputs = [];
foreach ($platforms as $key => $settings) {
    $template = $settings['template'] ?? '';
    $maxLen   = isset($settings['max_length']) ? (int) $settings['max_length'] : null;
    $rendered = renderTemplate($template, $context, $maxLen);

    $filename = match ($key) {
        'discord'  => 'discord.md',
        'x'        => 'x.txt',
        'linkedin' => 'linkedin.md',
        'facebook' => 'facebook.md',
        'email'    => 'email.md',
        'blog'     => 'blog.md',
        default    => $key . '.txt',
    };

    $path = $outBase . '/' . $filename;
    file_put_contents($path, $rendered);
    $outputs[$key] = [
        'path'    => $path,
        'content' => $rendered,
    ];
}

$bundlePath = $outBase . '/bundle.json';
file_put_contents($bundlePath, json_encode($outputs, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

echo "Campaign: {$payload['campaign']}\n";
echo "Output directory: {$outBase}\n";
foreach ($outputs as $key => $meta) {
    echo "- {$key}: {$meta['path']}\n";
}
echo "- bundle: {$bundlePath}\n";

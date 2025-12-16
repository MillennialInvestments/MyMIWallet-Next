<?php

declare(strict_types=1);

namespace App\Libraries\ContentEngine;

use App\Config\ContentEngine as ContentEngineConfig;
use App\Models\ContentPostModel;
use App\Models\ContentScannerRowModel;
use RuntimeException;

class PostDraftService
{
    protected ContentEngineConfig $config;
    protected ContentPostModel $postModel;
    protected ContentScannerRowModel $rowModel;

    public function __construct(?ContentEngineConfig $config = null)
    {
        $this->config = $config ?? config(ContentEngineConfig::class);
        $this->postModel = model(ContentPostModel::class);
        $this->rowModel = model(ContentScannerRowModel::class);
    }

    /**
     * Generate drafts for each idea using deterministic templates.
     */
    public function generateDrafts(int $ingestId, array $ideas): array
    {
        $rows = $this->rowModel->where('ingest_id', $ingestId)->findAll();
        $rowsBySymbol = [];
        foreach ($rows as $row) {
            $rowsBySymbol[$row['symbol']] = $row;
        }

        $created = [];
        foreach ($ideas as $idea) {
            $platforms = $idea['platforms'] ?? ($this->config->recommendedPlatforms[$idea['tier']] ?? []);
            $row = $rowsBySymbol[$idea['symbol']] ?? [];
            $payload = $this->buildTemplateData($idea, $row);

            foreach ($platforms as $platform) {
                $template = $this->loadTemplate($platform);
                if (! $template) {
                    continue;
                }
                $rendered = $this->renderTemplate($template, $payload);
                $created[] = $this->persistPost((int) $idea['id'], $platform, $rendered);
            }
        }

        return $created;
    }

    protected function buildTemplateData(array $idea, array $row): array
    {
        return [
            'symbol'          => $idea['symbol'],
            'score_total'     => $idea['score_total'],
            'tier'            => $idea['tier'],
            'mark_pct_change' => $this->formatPercent($row['mark_pct_change'] ?? null),
            'pct_chng_5d'     => $this->formatPercent($row['pct_chng_5d'] ?? null),
            'dollar_vol_m'    => $this->formatMillions($row['dollar_vol_m'] ?? null),
            'market_cap_m'    => $this->formatMillions($row['market_cap_m'] ?? null),
            'abvvol'          => $this->formatNumber($row['abvvol'] ?? null),
            'levels'          => 'Watch VWAP, prior day high, and the open range.',
            'cta'             => 'Save to MyMI Wallet, tune into Coffee & Stocks, and hop into Discord for the playbook.',
        ];
    }

    protected function loadTemplate(string $platform): ?array
    {
        $templateFile = $this->config->platformTemplates[$platform] ?? null;
        if (! $templateFile) {
            return null;
        }

        $path = APPPATH . 'Libraries/ContentEngine/templates/' . $templateFile;
        if (! is_file($path)) {
            log_message('warning', 'ContentEngine template missing for ' . $platform);
            return null;
        }

        /** @var array $template */
        $template = include $path;
        return $template;
    }

    protected function renderTemplate(array $template, array $data): array
    {
        $replacer = static function (?string $value, array $data) {
            if ($value === null) {
                return null;
            }
            $output = $value;
            foreach ($data as $key => $replacement) {
                $output = str_replace('{{' . $key . '}}', (string) $replacement, $output);
            }
            return $output;
        };

        return [
            'title'    => $replacer($template['title'] ?? null, $data),
            'body'     => $replacer($template['body'] ?? '', $data),
            'hashtags' => $replacer($template['hashtags'] ?? '', $data),
            'cta'      => $replacer($template['cta'] ?? '', $data),
        ];
    }

    protected function persistPost(int $ideaId, string $platform, array $rendered): array
    {
        $existing = $this->postModel
            ->where('idea_id', $ideaId)
            ->where('platform', $platform)
            ->first();

        $payload = [
            'idea_id'  => $ideaId,
            'platform' => $platform,
            'title'    => $rendered['title'] ?? null,
            'body'     => $rendered['body'] ?? null,
            'hashtags' => $rendered['hashtags'] ?? null,
            'cta'      => $rendered['cta'] ?? null,
            'payload_json' => json_encode($rendered),
            'status'   => 'draft',
        ];

        if ($existing) {
            $this->postModel->update($existing['id'], $payload);
            $payload['id'] = (int) $existing['id'];
            return $payload;
        }

        $payload['id'] = (int) $this->postModel->insert($payload);
        return $payload;
    }

    protected function formatMillions($value): string
    {
        if (! is_numeric($value)) {
            return 'n/a';
        }
        return number_format((float) $value, 1) . 'M';
    }

    protected function formatPercent($value): string
    {
        if (! is_numeric($value)) {
            return 'n/a';
        }
        return number_format((float) $value, 2) . '%';
    }

    protected function formatNumber($value): string
    {
        if (! is_numeric($value)) {
            return 'n/a';
        }
        return number_format((float) $value, 2);
    }
}
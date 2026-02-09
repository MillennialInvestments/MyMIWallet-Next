<?php

declare(strict_types=1);

namespace App\Commands\AiOps;

use App\Commands\SafeBaseCommand;
use App\Services\AiOps\PublicPagesPipelineService;
use CodeIgniter\CLI\CLI;
use Config\Database;

class PublicPagesRun extends SafeBaseCommand
{
    protected $group = 'AI-Ops';
    protected $name = 'aiops:public-pages:run';
    protected $description = 'Run public pages source collection and draft generation.';
    protected $options = [
        '--due' => 'Process pages due in next 24h (default).',
        '--page_id' => 'Process a specific page_id.',
    ];

    public function run(array $params)
    {
        $pageId = null;
        foreach ($params as $param) {
            if (str_starts_with($param, '--page_id=')) {
                $pageId = substr($param, 10);
            }
        }

        $db = Database::connect();
        $now = date('Y-m-d H:i:s');
        $runUuid = bin2hex(random_bytes(16));
        $db->table('bf_public_pages_runs')->insert([
            'run_uuid' => $runUuid,
            'started_at' => $now,
            'mode' => $pageId ? 'manual' : 'nightly',
        ]);
        $runId = (int) $db->insertID();

        $builder = $db->table('bf_public_pages_catalog')->where('status', 'active');
        if ($pageId) {
            $builder->where('page_id', $pageId);
        } else {
            $builder->where('next_run_at <=', date('Y-m-d H:i:s', strtotime('+24 hours')));
        }
        $pages = $builder->get()->getResultArray();

        $pipeline = new PublicPagesPipelineService();
        $processed = 0;
        $warnings = [];

        foreach ($pages as $page) {
            $sources = [];
            if (in_array($page['source_mode'], ['db', 'both'], true) && ! empty($page['db_query_key'])) {
                $sources = array_merge($sources, $pipeline->fetchDbSources((string) $page['db_query_key']));
            }
            if (in_array($page['source_mode'], ['google', 'both'], true) && ! empty($page['google_query'])) {
                $sources = array_merge($sources, $pipeline->fetchGoogleSources((string) $page['google_query']));
            }

            foreach ($sources as $source) {
                if (trim((string) ($source['content_clean'] ?? '')) === '' || str_word_count((string) $source['content_clean']) < 300) {
                    continue;
                }
                $db->table('bf_public_pages_sources')->insert([
                    'run_id' => $runId,
                    'page_id' => $page['id'],
                    'source_type' => $source['source_type'],
                    'source_ref' => $source['source_ref'],
                    'title' => $source['title'],
                    'content_raw' => $source['content_raw'],
                    'content_clean' => $source['content_clean'],
                    'meta_json' => $source['meta_json'],
                    'created_at' => $now,
                ]);
            }

            $validSources = $db->table('bf_public_pages_sources')->where('run_id', $runId)->where('page_id', $page['id'])->get()->getResultArray();
            $draft = $pipeline->buildDraft($page, $validSources);
            $status = $draft['word_count'] < 600 ? 'needs_review' : 'generated';
            if ($draft['word_count'] < 600) {
                $warnings[] = $page['page_id'] . ' draft below 600 words';
            }

            $db->table('bf_public_pages_drafts')->insert([
                'page_id' => $page['id'],
                'run_id' => $runId,
                'draft_title' => $draft['draft_title'],
                'draft_html' => $draft['draft_html'],
                'draft_summary' => $draft['draft_summary'],
                'draft_keywords' => $draft['draft_keywords'],
                'status' => $status,
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            $db->table('bf_public_pages_catalog')->where('id', $page['id'])->update([
                'last_run_at' => $now,
                'next_run_at' => date('Y-m-d H:i:s', strtotime("+{$page['refresh_days']} days")),
                'updated_at' => $now,
            ]);

            $processed++;
        }

        $ended = date('Y-m-d H:i:s');
        $summary = ['processed' => $processed, 'warnings' => $warnings];
        $db->table('bf_public_pages_runs')->where('id', $runId)->update([
            'ended_at' => $ended,
            'summary_json' => json_encode($summary, JSON_PRETTY_PRINT),
        ]);

        CLI::write('Run UUID: ' . $runUuid, 'yellow');
        CLI::write('Processed pages: ' . $processed, 'green');

        if ($warnings !== []) {
            foreach ($warnings as $warning) {
                CLI::error($warning);
            }
            return EXIT_ERROR;
        }

        return EXIT_SUCCESS;
    }
}

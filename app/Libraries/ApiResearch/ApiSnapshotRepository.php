<?php

declare(strict_types=1);

namespace App\Libraries\ApiResearch;

use App\Models\ApiResearchDiffModel;
use App\Models\ApiResearchEndpointModel;
use App\Models\ApiResearchPageModel;
use App\Models\ApiResearchRunModel;
use App\Models\ApiResearchSpecModel;
use Config\ApiResearch as ApiResearchConfig;

class ApiSnapshotRepository
{
    protected $config;

    public function __construct()
    {
        $config = config('ApiResearch');

        if (! $config instanceof ApiResearchConfig) {
            $config = new ApiResearchConfig();
        }

        $this->config = $config;
    }

    public function startRun(string $providerSlug, string $providerName, string $startUrl, ?string $domain = null): int
    {
        $model = new ApiResearchRunModel();

        return (int) $model->insert([
            'provider_slug'     => $providerSlug,
            'provider_name'     => $providerName,
            'start_url'         => $startUrl,
            'docs_domain'       => $domain,
            'status'            => 'running',
            'started_at'        => date('Y-m-d H:i:s'),
            'created_at'        => date('Y-m-d H:i:s'),
        ], true);
    }

    public function savePages(int $runId, array $pages): void
    {
        $model = new ApiResearchPageModel();

        foreach ($pages as $page) {
            $model->insert([
                'run_id'            => $runId,
                'url'               => (string) ($page['url'] ?? ''),
                'url_hash'          => hash('sha256', (string) ($page['url'] ?? '')),
                'depth'             => (int) ($page['depth'] ?? 0),
                'status_code'       => $page['status_code'] ?? null,
                'content_type'      => $page['content_type'] ?? null,
                'title'             => $page['title'] ?? null,
                'text_excerpt'      => mb_substr((string) ($page['text'] ?? ''), 0, 5000),
                'raw_text'          => (string) ($page['text'] ?? ''),
                'html_hash'         => ! empty($page['html']) ? hash('sha256', (string) $page['html']) : null,
                'is_spec_candidate' => 0,
                'is_reference_page' => 1,
                'created_at'        => date('Y-m-d H:i:s'),
            ]);
        }
    }

    public function saveSpecs(int $runId, array $parsedSpecs): array
    {
        $model = new ApiResearchSpecModel();
        $ids = [];

        foreach ($parsedSpecs as $spec) {
            $id = $model->insert([
                'run_id'      => $runId,
                'spec_type'   => (string) ($spec['spec_type'] ?? ''),
                'source_url'  => (string) ($spec['source_url'] ?? ''),
                'version'     => (string) ($spec['version'] ?? ''),
                'title'       => (string) ($spec['title'] ?? ''),
                'raw_content' => (string) ($spec['raw_content'] ?? ''),
                'parsed_json' => json_encode($spec['parsed_json'] ?? [], JSON_UNESCAPED_SLASHES),
                'created_at'  => date('Y-m-d H:i:s'),
            ], true);

            $ids[] = (int) $id;
        }

        return $ids;
    }

    public function saveEndpoints(int $runId, array $endpoints): void
    {
        $model = new ApiResearchEndpointModel();

        foreach ($endpoints as $endpoint) {
            $model->insert([
                'run_id'           => $runId,
                'spec_id'          => null,
                'method'           => (string) ($endpoint['method'] ?? ''),
                'path'             => (string) ($endpoint['path'] ?? ''),
                'operation_id'     => (string) ($endpoint['operation_id'] ?? ''),
                'summary'          => (string) ($endpoint['summary'] ?? ''),
                'description'      => (string) ($endpoint['description'] ?? ''),
                'tags_json'        => json_encode($endpoint['tags'] ?? [], JSON_UNESCAPED_SLASHES),
                'parameters_json'  => json_encode($endpoint['parameters'] ?? [], JSON_UNESCAPED_SLASHES),
                'request_body_json'=> json_encode($endpoint['request_body'] ?? [], JSON_UNESCAPED_SLASHES),
                'responses_json'   => json_encode($endpoint['responses'] ?? [], JSON_UNESCAPED_SLASHES),
                'security_json'    => json_encode($endpoint['security'] ?? [], JSON_UNESCAPED_SLASHES),
                'rate_limit_notes' => (string) ($endpoint['rate_limit_notes'] ?? ''),
                'example_request'  => (string) ($endpoint['example_request'] ?? ''),
                'example_response' => (string) ($endpoint['example_response'] ?? ''),
                'created_at'       => date('Y-m-d H:i:s'),
            ]);
        }
    }

    public function completeRun(int $runId, array $data): void
    {
        $model = new ApiResearchRunModel();

        $model->update($runId, [
            'status'               => (string) ($data['status'] ?? 'completed'),
            'pages_scraped'        => (int) ($data['pages_scraped'] ?? 0),
            'specs_found'          => (int) ($data['specs_found'] ?? 0),
            'endpoints_found'      => (int) ($data['endpoints_found'] ?? 0),
            'auth_confidence'      => (float) ($data['auth_confidence'] ?? 0),
            'integration_score'    => (float) ($data['integration_score'] ?? 0),
            'raw_snapshot_path'    => (string) ($data['raw_snapshot_path'] ?? ''),
            'markdown_report_path' => (string) ($data['markdown_report_path'] ?? ''),
            'json_snapshot_path'   => (string) ($data['json_snapshot_path'] ?? ''),
            'ai_summary_path'      => (string) ($data['ai_summary_path'] ?? ''),
            'error_message'        => (string) ($data['error_message'] ?? ''),
            'completed_at'         => date('Y-m-d H:i:s'),
        ]);
    }

    public function saveDiff(string $providerSlug, int $oldRunId, int $newRunId, array $diff): void
    {
        $model = new ApiResearchDiffModel();

        $model->insert([
            'provider_slug'         => $providerSlug,
            'old_run_id'            => $oldRunId,
            'new_run_id'            => $newRunId,
            'diff_summary'          => json_encode($diff, JSON_UNESCAPED_SLASHES),
            'new_endpoints_json'    => json_encode($diff['new_endpoints'] ?? [], JSON_UNESCAPED_SLASHES),
            'removed_endpoints_json'=> json_encode($diff['removed_endpoints'] ?? [], JSON_UNESCAPED_SLASHES),
            'changed_endpoints_json'=> json_encode($diff['changed_endpoints'] ?? [], JSON_UNESCAPED_SLASHES),
            'auth_changes_json'     => json_encode($diff['auth_changes'] ?? [], JSON_UNESCAPED_SLASHES),
            'rate_limit_changes_json'=> json_encode($diff['rate_limit_changes'] ?? [], JSON_UNESCAPED_SLASHES),
            'created_at'            => date('Y-m-d H:i:s'),
        ]);
    }

    public function getPreviousRun(string $providerSlug, int $excludeRunId): ?array
    {
        $model = new ApiResearchRunModel();

        $row = $model->where('provider_slug', $providerSlug)
            ->where('id !=', $excludeRunId)
            ->where('status', 'completed')
            ->orderBy('id', 'DESC')
            ->first();

        return is_array($row) ? $row : null;
    }
}
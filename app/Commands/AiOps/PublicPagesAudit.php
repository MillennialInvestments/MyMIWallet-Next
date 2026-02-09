<?php

declare(strict_types=1);

namespace App\Commands\AiOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;

class PublicPagesAudit extends SafeBaseCommand
{
    protected $group = 'AI-Ops';
    protected $name = 'aiops:public-pages:audit';
    protected $description = 'Audit public pages schema coverage, freshness, and governance conditions.';

    public function run(array $params)
    {
        $db = Database::connect();
        $violations = [];

        $published = $db->query('SELECT p.*, c.page_id as catalog_page_id, c.slug, c.type, c.refresh_days, c.updated_at as catalog_updated_at FROM bf_public_pages_published p JOIN bf_public_pages_catalog c ON c.id=p.page_id')->getResultArray();

        foreach ($published as $row) {
            $type = strtolower((string) ($row['type'] ?? ''));
            $schemaRaw = trim((string) ($row['schema_json'] ?? ''));
            $meta = json_decode((string) ($row['published_meta_json'] ?? ''), true);
            if (! is_array($meta)) {
                $meta = [];
            }

            if (in_array($type, ['review', 'glossary'], true) && $schemaRaw === '') {
                $violations[] = "Published page {$row['slug']} ({$type}) missing schema_json.";
            }

            if ($type === 'hybrid' && (! isset($meta['news_items']) || ! is_array($meta['news_items']) || $meta['news_items'] === [])) {
                $violations[] = "Hybrid page {$row['slug']} missing news block in published_meta_json.";
            }

            if ($type === 'hybrid') {
                $publishedAt = strtotime((string) ($row['published_at'] ?? 'now')) ?: time();
                $refreshDays = max(1, (int) ($row['refresh_days'] ?? 14));
                if ($publishedAt < strtotime('-' . $refreshDays . ' days')) {
                    $violations[] = "Hybrid page {$row['slug']} appears stale beyond refresh_days={$refreshDays}.";
                }
            }
        }

        $dupeRows = $db->query('SELECT slug, COUNT(*) as c FROM bf_public_pages_catalog GROUP BY slug HAVING COUNT(*) > 1')->getResultArray();
        foreach ($dupeRows as $dupe) {
            $violations[] = 'Duplicate slug detected in catalog: ' . $dupe['slug'];
        }

        $agedDrafts = $db->query("SELECT d.id, c.slug, d.created_at FROM bf_public_pages_drafts d JOIN bf_public_pages_catalog c ON c.id=d.page_id WHERE d.status NOT IN ('approved','rejected') AND d.created_at < DATE_SUB(NOW(), INTERVAL 30 DAY)")->getResultArray();
        $orphans = $db->query('SELECT p.id, p.page_id FROM bf_public_pages_published p LEFT JOIN bf_public_pages_catalog c ON c.id=p.page_id WHERE c.id IS NULL')->getResultArray();

        $opsRoutes = file_get_contents(APPPATH . 'Config/Routes.php') ?: '';
        if (strpos($opsRoutes, "\$routes->group('API/Ops', ['filter' => 'internalToken']") === false) {
            $violations[] = 'Public Ops route group missing internalToken filter.';
        }

        $dir = ROOTPATH . 'docs/_aiops/public-pages';
        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        $violationPath = $dir . '/violations.md';
        $reportPath = $dir . '/audit-report.md';

        $report = "# Public Pages Audit Report\n\n";
        $report .= '- Published pages audited: ' . count($published) . "\n";
        $report .= '- Violations: ' . count($violations) . "\n";
        $report .= '- Orphaned pages: ' . count($orphans) . "\n";
        $report .= '- Drafts stuck > 30 days: ' . count($agedDrafts) . "\n\n";

        $report .= "## Orphaned Pages\n\n";
        if ($orphans === []) {
            $report .= "- None\n";
        } else {
            foreach ($orphans as $orphan) {
                $report .= '- Published ID ' . $orphan['id'] . ' references missing catalog page_id=' . $orphan['page_id'] . "\n";
            }
        }

        $report .= "\n## Stuck Drafts\n\n";
        if ($agedDrafts === []) {
            $report .= "- None\n";
        } else {
            foreach ($agedDrafts as $draft) {
                $report .= '- Draft #' . $draft['id'] . ' (' . $draft['slug'] . ') created at ' . $draft['created_at'] . "\n";
            }
        }

        file_put_contents($reportPath, $report);

        if ($violations === []) {
            file_put_contents($violationPath, "# Public Pages Violations\n\n- None\n");
            CLI::write('Audit passed. Report: ' . $reportPath, 'green');
            return EXIT_SUCCESS;
        }

        $body = "# Public Pages Violations\n\n";
        foreach ($violations as $v) {
            $body .= '- ' . $v . "\n";
            CLI::error($v);
        }
        file_put_contents($violationPath, $body);
        CLI::error('Audit failed. Violations written to ' . $violationPath);
        return EXIT_ERROR;
    }
}

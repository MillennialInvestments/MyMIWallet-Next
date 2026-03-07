<?php

declare(strict_types=1);

namespace App\Modules\Management\Controllers;

use App\Controllers\BaseAdminController;

use App\Services\PublicPages\SchemaGenerator;
use Config\Database;

class PublicPagesAdminController extends BaseAdminController
{
    public function index()
    {
        $data = $this->commonData();
        if ($data instanceof \CodeIgniter\HTTP\ResponseInterface) {
            return $data;
        }

        $db = Database::connect();
        $limit = max(1, min(100, (int) ($this->request->getGet('limit') ?? 50)));
        $offset = max(0, (int) ($this->request->getGet('offset') ?? 0));

        try {
            $data['pages'] = $db->table('bf_public_pages_catalog')
                ->select('id,page_id,slug,title,status,next_run_at,updated_at')
                ->orderBy('updated_at', 'DESC')
                ->limit($limit, $offset)
                ->get()
                ->getResultArray();
        } catch (\Throwable $e) {
            log_message('error', 'PublicPagesController::index query failed: ' . $e->getMessage());
            $data['pages'] = [];
        }

        $data['pageTitle'] = 'Public Pages Management';
        return $this->renderTheme('App\Modules\Management\Views\PublicPages\index', $data);
    }

    public function ajaxGenerateNow(string $pageId)
    {
        if (! has_permission('admin.access')) {
            return $this->response->setStatusCode(403)->setJSON(['ok' => false]);
        }
        command('aiops:public-pages:run --page_id=' . $pageId);
        return $this->response->setJSON(['ok' => true]);
    }

    public function ajaxLoadDraft(int $draftId)
    {
        $row = Database::connect()->table('bf_public_pages_drafts')->where('id', $draftId)->get()->getRowArray();
        return $this->response->setJSON($row ?: []);
    }

    public function ajaxSaveDraft(int $draftId)
    {
        $html = (string) $this->request->getPost('draft_html');
        Database::connect()->table('bf_public_pages_drafts')->where('id', $draftId)->update([
            'draft_html' => $html,
            'status' => 'needs_review',
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return $this->response->setJSON(['ok' => true]);
    }

    public function ajaxApproveDraft(int $draftId)
    {
        $db = Database::connect();
        $draft = $db->table('bf_public_pages_drafts')->where('id', $draftId)->get()->getRowArray();
        if (! $draft) {
            return $this->response->setStatusCode(404)->setJSON(['ok' => false]);
        }
        $auth = service('authentication');
        $user = method_exists($auth, 'user') ? $auth->user() : null;
        $approvedBy = (string) ($user->email ?? $user->username ?? 'system');

        $catalog = $db->table('bf_public_pages_catalog')->where('id', $draft['page_id'])->get()->getRowArray();
        if (! $catalog) {
            return $this->response->setStatusCode(404)->setJSON(['ok' => false]);
        }

        $prosCons = json_decode((string) ($draft['draft_pros_cons_json'] ?? ''), true);
        if (! is_array($prosCons)) {
            $prosCons = [];
        }

        if (strtolower((string) ($catalog['type'] ?? '')) === 'review') {
            $hasPros = isset($prosCons['pros']) && is_array($prosCons['pros']) && $prosCons['pros'] !== [];
            $hasCons = isset($prosCons['cons']) && is_array($prosCons['cons']) && $prosCons['cons'] !== [];
            if (! $hasPros || ! $hasCons || trim((string) ($draft['draft_summary'] ?? '')) === '') {
                return $this->response->setStatusCode(422)->setJSON([
                    'ok' => false,
                    'message' => 'Review pages require pros/cons and summary before publish.',
                ]);
            }
        }

        $meta = ['draft_id' => $draftId, 'approved_by' => $approvedBy];
        if (strtolower((string) ($catalog['type'] ?? '')) === 'hybrid') {
            $notes = json_decode((string) ($draft['editor_notes'] ?? ''), true);
            $meta['news_items'] = is_array($notes) && isset($notes['news_items']) && is_array($notes['news_items']) ? $notes['news_items'] : [];
        }

        $publishHtml = (string) ($draft['draft_html'] ?? '');
        if (strtolower((string) ($catalog['type'] ?? '')) === 'review' && stripos($publishHtml, 'This review is for educational purposes only and not financial advice.') === false) {
            $publishHtml .= '<p><em>This review is for educational purposes only and not financial advice.</em></p>';
        }

        $schemaGenerator = new SchemaGenerator();
        $schemaPayload = $schemaGenerator->generate((string) ($catalog['type'] ?? ''), [
            'title' => $draft['draft_title'],
            'summary' => $draft['draft_summary'],
            'slug' => $catalog['slug'] ?? '',
            'published_at' => date('c'),
            'html' => $draft['draft_html'],
            'faq_json' => $draft['draft_faq_json'] ?? null,
            'pros_cons' => $prosCons,
            'news_items' => $meta['news_items'] ?? [],
        ]);

        $db->table('bf_public_pages_drafts')->where('id', $draftId)->update([
            'status' => 'approved',
            'approved_by' => $approvedBy,
            'approved_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $latest = $db->table('bf_public_pages_published')->where('page_id', $draft['page_id'])->orderBy('version', 'DESC')->get()->getRowArray();
        $version = ((int) ($latest['version'] ?? 0)) + 1;
        $db->table('bf_public_pages_published')->insert([
            'page_id' => $draft['page_id'],
            'published_title' => $draft['draft_title'],
            'published_html' => $publishHtml,
            'published_meta_json' => json_encode($meta),
            'schema_json' => json_encode($schemaPayload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
            'version' => $version,
            'published_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return $this->response->setJSON(['ok' => true, 'version' => $version]);
    }

    public function ajaxRejectDraft(int $draftId)
    {
        Database::connect()->table('bf_public_pages_drafts')->where('id', $draftId)->update([
            'status' => 'rejected',
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return $this->response->setJSON(['ok' => true]);
    }
}

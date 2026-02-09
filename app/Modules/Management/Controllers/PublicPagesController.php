<?php

declare(strict_types=1);

namespace App\Modules\Management\Controllers;

use App\Controllers\UserController;
use Config\Database;

class PublicPagesController extends UserController
{
    public function index()
    {
        $data = $this->commonData();
        if ($data instanceof \CodeIgniter\HTTP\ResponseInterface) {
            return $data;
        }

        $db = Database::connect();
        $data['pages'] = $db->table('bf_public_pages_catalog')->orderBy('updated_at', 'DESC')->get()->getResultArray();
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
            'published_html' => $draft['draft_html'],
            'published_meta_json' => json_encode(['draft_id' => $draftId, 'approved_by' => $approvedBy]),
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

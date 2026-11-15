<?php

declare(strict_types=1);

namespace App\Controllers;

use CodeIgniter\Controller;

/**
 * GT-FORM-ROUTES-001: POST /Notes/save, the "Save to Notes" button on the
 * Advisor insight modal. Notes go into bf_discord_ai_notes, the table the
 * assistant already reads (GET API/AI/Notes), keyed by the session user.
 */
class NotesController extends Controller
{
    private const ALLOWED_TAGS = '<p><br><b><strong><i><em><u><ul><ol><li><h1><h2><h3><h4><h5><h6><blockquote><a><span><div><table><thead><tbody><tr><th><td>';

    public function save()
    {
        $session = session();
        $userId = 0;
        foreach (['cuID', 'user_id'] as $key) {
            $value = $session->get($key);
            if (is_numeric($value) && (int) $value > 0) {
                $userId = (int) $value;
                break;
            }
        }
        if ($userId <= 0) {
            return $this->response->setStatusCode(401)->setJSON(['status' => 'error', 'message' => 'Please sign in.']);
        }

        $json = $this->request->getJSON(true);
        $input = is_array($json) ? $json : (array) $this->request->getPost();
        $content = self::clean((string) ($input['content'] ?? ''));
        $source = preg_replace('/[^a-z0-9_]/', '', strtolower((string) ($input['source'] ?? 'note'))) ?: 'note';

        if (trim(strip_tags($content)) === '') {
            return $this->response->setStatusCode(422)->setJSON(['status' => 'error', 'message' => 'There is nothing to save.']);
        }

        $db = db_connect();
        if (! $db->tableExists('bf_discord_ai_notes')) {
            return $this->response->setStatusCode(503)->setJSON(['status' => 'error', 'message' => 'Notes are not available yet.']);
        }

        $now = date('Y-m-d H:i:s');
        $db->table('bf_discord_ai_notes')->insert([
            'user_id'    => $userId,
            'title'      => mb_substr(trim(strip_tags((string) ($input['title'] ?? ''))) ?: ucwords(str_replace('_', ' ', $source)) . ' ' . date('M j, Y'), 0, 255),
            'note_type'  => mb_substr($source, 0, 64),
            'content'    => $content,
            'encrypted'  => 0,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return $this->response->setJSON(['status' => 'success', 'message' => 'Saved to your notes.', 'id' => (int) $db->insertID()]);
    }

    /** Keeps simple formatting only: no scripts, event handlers or javascript: links. */
    public static function clean(string $html): string
    {
        $html = mb_substr($html, 0, 100000);
        $html = (string) preg_replace('#<(script|style|iframe|object|embed)\b[^>]*>.*?</\1>#is', '', $html);
        $html = strip_tags($html, self::ALLOWED_TAGS);
        $html = (string) preg_replace('/\s+on[a-z]+\s*=\s*("[^"]*"|\'[^\']*\'|[^\s>]+)/i', '', $html);
        $html = (string) preg_replace('/\s(style)\s*=\s*("[^"]*"|\'[^\']*\')/i', '', $html);

        return (string) preg_replace('/(href|src)\s*=\s*(["\']?)\s*(javascript|data|vbscript):[^"\'>\s]*\2/i', '$1="#"', $html);
    }
}

<?php
namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseController;
use App\Libraries\MyMIAssistant;
use App\Models\DiscordLinkModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\API\ResponseTrait;

class AIController extends BaseController
{
    use ResponseTrait;

    protected MyMIAssistant $assistant;
    protected DiscordLinkModel $linkModel;

    public function _remap($method, ...$params)
    {
        if (! aiKimiEnabled()) {
            return $this->response->setJSON([
                'status'  => 'disabled',
                'message' => 'Kimi AI Services are currently disabled by SiteSettings.',
            ]);
        }

        if (! method_exists($this, $method)) {
            throw PageNotFoundException::forPageNotFound();
        }

        return $this->$method(...$params);
    }

    public function __construct()
    {
        $this->assistant = new MyMIAssistant();
        $this->linkModel = new DiscordLinkModel();
    }

    public function postChat()
    {
        $payload = $this->request->getJSON(true) ?? $this->request->getPost();
        $message = trim((string) ($payload['message'] ?? ''));

        if ($message === '') {
            return $this->failValidationErrors('message is required');
        }

        $params = [
            'message'        => $message,
            'session_key'    => $payload['session_key'] ?? null,
            'user_id'        => $this->cuID ?? ($payload['user_id'] ?? null),
            'discord_user_id'=> $payload['discord_user_id'] ?? null,
            'channel_context'=> [
                'channel_id' => $payload['channel_id'] ?? null,
                'source'     => $payload['source'] ?? 'web',
            ],
        ];

        try {
            $result = $this->assistant->chat($params);
            return $this->respond($result);
        } catch (\Throwable $e) {
            log_message('error', 'AIController::postChat failed: {msg}', ['msg' => $e->getMessage()]);
            return $this->failServerError('Unable to process AI chat request.');
        }
    }

    public function listNotes()
    {
        if (!$this->cuID) {
            return $this->failUnauthorized('Authentication required.');
        }

        $discordId = $this->request->getGet('discord_user_id') ?? null;
        $notes     = $this->assistant->getNotesForUser($this->cuID, $discordId);

        return $this->respond(['notes' => $notes]);
    }

    public function updateLinkSettings()
    {
        if (!$this->cuID) {
            return $this->failUnauthorized('Authentication required.');
        }

        $link = $this->linkModel->findByUserId($this->cuID);
        if (!$link) {
            return $this->failNotFound('No Discord link found for this user.');
        }

        $payload  = $this->request->getJSON(true) ?? $this->request->getPost();
        $unlink   = filter_var($payload['unlink'] ?? false, FILTER_VALIDATE_BOOLEAN);
        $persona  = $payload['ai_persona'] ?? $link['ai_persona'] ?? null;
        $scopes   = $this->normalizeScopes($payload['scopes'] ?? []);

        $update = [
            'ai_persona'  => $persona,
            'scopes_json' => json_encode($scopes),
            'last_seen_at'=> date('Y-m-d H:i:s'),
        ];

        if ($unlink) {
            $update = array_merge($update, [
                'user_id'         => null,
                'discord_user_id' => null,
                'linked_at'       => null,
            ]);
        }

        $this->linkModel->update($link['id'], $update);

        return $this->respond([
            'status'  => 'ok',
            'persona' => $persona,
            'scopes'  => $scopes,
            'unlinked'=> $unlink,
        ]);
    }

    private function normalizeScopes($scopes): array
    {
        $defaults = [
            'budget'     => true,
            'alerts'     => true,
            'watchlists' => true,
            'marketing'  => false,
        ];

        if (is_array($scopes)) {
            $scopes = array_merge($defaults, array_map('boolval', $scopes));
        } else {
            $decoded = json_decode((string) $scopes, true) ?? [];
            $scopes  = array_merge($defaults, array_map('boolval', $decoded));
        }

        return $scopes;
    }
}
<?php

namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseController;
use App\Models\ReferralModel;
use CodeIgniter\HTTP\ResponseInterface;

class ReferralController extends BaseController
{
    protected ReferralModel $referralModel;
    protected $auth;
    protected $session;
    protected ?int $currentUserId = null;

    public function __construct()
    {
        $this->referralModel = new ReferralModel();
        $this->auth = service('authentication');
        $this->session = service('session');
    }

    protected function resolveUserId(): ?int
    {
        if ($this->auth && method_exists($this->auth, 'id')) {
            $authId = $this->auth->id();
            if ($authId) {
                return (int) $authId;
            }
        }

        $sessionId = $this->session?->get('user_id');
        return $sessionId ? (int) $sessionId : null;
    }

    protected function guard(): ?ResponseInterface
    {
        $this->currentUserId = $this->resolveUserId();
        if ($this->currentUserId === null) {
            return $this->respondError('Unauthorized access.', ResponseInterface::HTTP_UNAUTHORIZED);
        }
        return null;
    }

    public function bulkUpdateStatus(): ResponseInterface
    {
        if ($guard = $this->guard()) {
            return $guard;
        }

        $payload = $this->getPayload();
        $ids = $this->sanitizeIds($payload['ids'] ?? []);
        if (empty($ids)) {
            return $this->respondError('Select at least one referral.', ResponseInterface::HTTP_BAD_REQUEST);
        }

        $status = strtolower((string) ($payload['status'] ?? 'active'));
        $makeActive = $status === 'active';
        $updated = $this->referralModel->bulkUpdateStatus($ids, $this->currentUserId, $makeActive);

        if ($updated <= 0) {
            return $this->respondError('No referrals were updated.', ResponseInterface::HTTP_BAD_REQUEST);
        }

        return $this->respondSuccess([
            'affected' => $updated,
            'ids'      => $ids,
        ], 'Referral status updated.');
    }

    public function bulkDelete(): ResponseInterface
    {
        if ($guard = $this->guard()) {
            return $guard;
        }

        $payload = $this->getPayload();
        $ids = $this->sanitizeIds($payload['ids'] ?? []);
        if (empty($ids)) {
            return $this->respondError('Select at least one referral.', ResponseInterface::HTTP_BAD_REQUEST);
        }

        $deleted = $this->referralModel->bulkDeleteByUser($ids, $this->currentUserId);
        if ($deleted <= 0) {
            return $this->respondError('Unable to delete the selected referrals.', ResponseInterface::HTTP_BAD_REQUEST);
        }

        return $this->respondSuccess([
            'affected' => $deleted,
            'ids'      => $ids,
        ], 'Selected referrals were removed.');
    }

    protected function getPayload(): array
    {
        $json = $this->request->getJSON(true);
        if (!empty($json)) {
            return $json;
        }
        return $this->request->getPost() ?? [];
    }

    protected function sanitizeIds($ids): array
    {
        if (!is_array($ids)) {
            $ids = [$ids];
        }
        $ids = array_map('intval', $ids);
        return array_values(array_filter($ids, static fn ($id) => $id > 0));
    }

    protected function respondSuccess(array $data, string $message = 'Success'): ResponseInterface
    {
        return $this->response->setJSON(array_merge([
            'status'  => 'success',
            'message' => $message,
            'csrf'    => [
                'token'  => csrf_hash(),
                'header' => config('Security')->headerName ?? 'X-CSRF-TOKEN',
            ],
            'asOf'    => date('c'),
        ], $data));
    }

    protected function respondError(string $message, int $statusCode = ResponseInterface::HTTP_BAD_REQUEST): ResponseInterface
    {
        return $this->response->setStatusCode($statusCode)->setJSON([
            'status'  => 'error',
            'message' => $message,
            'csrf'    => [
                'token'  => csrf_hash(),
                'header' => config('Security')->headerName ?? 'X-CSRF-TOKEN',
            ],
            'asOf'    => date('c'),
        ]);
    }
}
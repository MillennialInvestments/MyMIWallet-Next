<?php

namespace App\Modules\User\Controllers;

use App\Controllers\BaseUserController;
use App\Libraries\Privacy\DataErasureService;
use App\Libraries\Privacy\DataExportService;
use App\Models\PrivacyRequestModel;

/**
 * Privacy requests (GTM-045). Signed-in users ask for an export or erasure;
 * an admin approves erasure. Exports are generated straight away because
 * they only ever contain the requester's own data.
 */
class PrivacyController extends BaseUserController
{
    public function status()
    {
        $userId = $this->userId();
        if ($userId <= 0) {
            return $this->forbid();
        }
        $rows = (new PrivacyRequestModel())
            ->select('id,type,status,created_at,updated_at')
            ->where('user_id', $userId)->orderBy('id', 'DESC')->findAll(20);

        return $this->ok('Privacy requests', ['requests' => $rows]);
    }

    public function requestExport()
    {
        $userId = $this->userId();
        if ($userId <= 0) {
            return $this->forbid();
        }
        $m = new PrivacyRequestModel();
        $recent = $m->where(['user_id' => $userId, 'type' => 'export'])
            ->where('created_at >=', date('Y-m-d H:i:s', time() - 3600))->countAllResults();
        if ($recent > 0) {
            return $this->fail('You asked for an export in the last hour. Please try again later.');
        }

        $path = (new DataExportService(db_connect()))->exportUser($userId);
        $id = $m->insert([
            'user_id'     => $userId,
            'type'        => 'export',
            'status'      => 'done',
            'result_path' => basename($path),
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s'),
        ]);
        audit('privacy.export', ['req_id' => $id], 'privacy');

        return $this->ok('Your export is ready.', ['request_id' => $id, 'download' => site_url('Account/Privacy/Download/' . $id)]);
    }

    public function download(int $requestId)
    {
        $userId = $this->userId();
        $req = (new PrivacyRequestModel())->find($requestId);
        if ($userId <= 0 || ! $req || (int) $req['user_id'] !== $userId || $req['type'] !== 'export' || $req['status'] !== 'done') {
            return $this->response->setStatusCode(404)->setBody('Not found');
        }
        $file = WRITEPATH . 'exports/privacy/' . basename((string) $req['result_path']);
        $maxAge = (int) config('Privacy')->exportRetentionDays * 86400;
        if (! is_file($file) || filemtime($file) < time() - $maxAge) {
            return $this->response->setStatusCode(410)->setBody('This export has expired. Please request a new one.');
        }

        return $this->response->download($file, null)->setFileName('mymi-wallet-data-export.json');
    }

    public function requestErasure()
    {
        $userId = $this->userId();
        if ($userId <= 0) {
            return $this->forbid();
        }
        $m = new PrivacyRequestModel();
        if ($m->where(['user_id' => $userId, 'type' => 'erase', 'status' => 'pending'])->countAllResults() > 0) {
            return $this->ok('Your erasure request is already being reviewed.');
        }
        $id = $m->insert([
            'user_id'    => $userId,
            'type'       => 'erase',
            'status'     => 'pending',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        audit('privacy.request', ['type' => 'erase', 'req_id' => $id], 'privacy');

        return $this->ok('Request submitted. We will confirm by email once your data is erased.', ['request_id' => $id]);
    }

    /** Admin: route is behind role:admin,team. */
    public function adminApproveErasure(int $requestId)
    {
        $m = new PrivacyRequestModel();
        $req = $m->find($requestId);
        if (! $req || $req['type'] !== 'erase' || $req['status'] !== 'pending') {
            return $this->fail('Not found');
        }
        $changed = (new DataErasureService(db_connect()))->pseudonymizeUser((int) $req['user_id']);
        $m->update($requestId, ['status' => 'done', 'updated_at' => date('Y-m-d H:i:s'), 'notes' => 'rows:' . $changed]);
        audit('privacy.erase', ['req_id' => $requestId, 'rows' => $changed], 'privacy');

        return $this->ok("Erasure completed ({$changed} rows).");
    }

    /** Admin: route is behind role:admin,team. */
    public function adminRejectErasure(int $requestId)
    {
        $m = new PrivacyRequestModel();
        $req = $m->find($requestId);
        if (! $req || $req['type'] !== 'erase' || $req['status'] !== 'pending') {
            return $this->fail('Not found');
        }
        $note = substr(trim((string) $this->request->getPost('reason')), 0, 200);
        $m->update($requestId, ['status' => 'rejected', 'updated_at' => date('Y-m-d H:i:s'), 'notes' => $note]);
        audit('privacy.erase.rejected', ['req_id' => $requestId], 'privacy');

        return $this->ok('Request rejected.');
    }

    private function userId(): int
    {
        return (int) (session('cuID') ?: session('user_id') ?: 0);
    }

    private function ok(string $msg, array $data = [])
    {
        return $this->response->setJSON(['status' => 'success', 'message' => $msg, 'data' => $data, 'csrf' => csrf_hash()]);
    }

    private function fail(string $msg)
    {
        return $this->response->setStatusCode(400)->setJSON(['status' => 'error', 'message' => $msg, 'csrf' => csrf_hash()]);
    }

    private function forbid()
    {
        return $this->response->setStatusCode(403)->setJSON(['status' => 'error', 'message' => 'Forbidden', 'csrf' => csrf_hash()]);
    }
}

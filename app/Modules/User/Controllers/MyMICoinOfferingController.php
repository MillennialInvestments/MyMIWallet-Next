<?php

namespace App\Modules\User\Controllers;

use App\Controllers\UserController;
use App\Services\MDIT\MyMICoinOfferingService;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Controller for MyMI Coin offering under MDIT Reg D 506(c).
 *
 * Guarantees:
 * - Accredited-only gating on deposits and minting.
 * - Session IDOR enforcement via $this->resolveCuID().
 * - No public purchase button; no guaranteed returns.
 */
class MyMICoinOfferingController extends UserController
{
    protected ?MyMICoinOfferingService $service = null;

    protected function getService(): MyMICoinOfferingService
    {
        return $this->service ??= new MyMICoinOfferingService();
    }

    public function index(): string
    {
        $userId = $this->resolveCuID();
        $service = $this->getService();
        $isAccredited = $userId > 0 ? $service->isAccredited($userId) : false;
        $offering = $service->getOfferingDetails();

        $data = [
            'title'        => 'MyMI Coin Offering (Reg D 506(c))',
            'view'         => 'App\Modules\User\Views\MyMICoin\offering',
            'user'         => $this->currentUser,
            'isAccredited' => $isAccredited,
            'offering'     => $offering,
        ];

        return view('template/layout', $data);
    }

    public function interest(): ResponseInterface
    {
        $userId = $this->resolveCuID();
        if ($userId <= 0) {
            return $this->response->setStatusCode(401)->setJSON([
                'ok'      => false,
                'error'   => 'unauthorized',
                'message' => 'Please sign in to register interest.',
            ]);
        }

        $input = $this->request->getJSON(true) ?: $this->request->getPost();

        $email = (string) ($input['email'] ?? ($this->currentUser->email ?? ''));
        $attestation = (bool) ($input['accreditation_attestation'] ?? false);
        $intendedUsd = (float) ($input['intended_investment_usd'] ?? 0);
        $notes = (string) ($input['notes'] ?? '');

        $result = $this->getService()->registerInterest($userId, $email, $attestation, $intendedUsd, $notes);

        return $this->response->setJSON($result);
    }

    public function deposit(): ResponseInterface
    {
        $userId = $this->resolveCuID();
        if ($userId <= 0) {
            return $this->response->setStatusCode(401)->setJSON([
                'ok'      => false,
                'error'   => 'unauthorized',
                'message' => 'Please sign in to initiate deposit.',
            ]);
        }

        $input = $this->request->getJSON(true) ?: $this->request->getPost();
        $result = $this->getService()->initiateAccreditedDeposit($userId, $input);

        $status = ($result['ok'] ?? false) ? 200 : (
            ($result['error'] ?? '') === 'accreditation_required' ? 403 : 400
        );

        return $this->response->setStatusCode($status)->setJSON($result);
    }

    public function mint(): ResponseInterface
    {
        $userId = $this->resolveCuID();
        if ($userId <= 0) {
            return $this->response->setStatusCode(401)->setJSON([
                'ok'      => false,
                'error'   => 'unauthorized',
                'message' => 'Please sign in to mint token units.',
            ]);
        }

        $input = $this->request->getJSON(true) ?: $this->request->getPost();
        $depositId = (int) ($input['deposit_id'] ?? 0);

        if ($depositId <= 0) {
            return $this->response->setStatusCode(400)->setJSON([
                'ok'      => false,
                'error'   => 'invalid_deposit_id',
                'message' => 'Valid deposit ID is required.',
            ]);
        }

        $result = $this->getService()->mintMyMICoin($userId, $depositId);
        $status = ($result['ok'] ?? false) ? 200 : (
            ($result['error'] ?? '') === 'accreditation_required' ? 403 : 400
        );

        return $this->response->setStatusCode($status)->setJSON($result);
    }
}

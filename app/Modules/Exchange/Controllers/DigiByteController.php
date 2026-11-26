<?php

declare(strict_types=1);

namespace App\Modules\Exchange\Controllers;

use App\Controllers\BaseController;
use App\Services\DigiByteService;
use Config\Database;
use Config\DigiByte;

#[\AllowDynamicProperties]
class DigiByteController extends BaseController
{
    protected DigiByteService $service;
    protected DigiByte $config;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->service = new DigiByteService();
        $this->config = config(DigiByte::class);
    }

    protected function respondError(string $msg, int $code = 400, array $extra = [])
    {
        return $this->response->setStatusCode($code)->setJSON(array_merge([
            'status'  => 'error',
            'message' => $msg,
            'csrf'    => csrf_hash(),
        ], $extra));
    }

    protected function privateKeySubmissionDisabledResponse()
    {
        return $this->respondError(
            'Private key submission is disabled. Use a supported non-custodial DigiByte wallet.',
            403,
            ['reason' => 'private_key_submission_disabled']
        );
    }

    private function currentUserId(): int
    {
        if ($this->cuID !== null && (int) $this->cuID > 0) {
            return (int) $this->cuID;
        }

        return (int) ($this->resolveCurrentUserId() ?? 0);
    }

    private function hasSubmittedPrivateKey(): bool
    {
        $keys = ['private_key', 'privateKey', 'secret', 'secret_key', 'mnemonic', 'seed'];
        foreach ($keys as $k) {
            if ($this->request->getPost($k) !== null || $this->request->getGet($k) !== null) {
                return true;
            }
        }

        $json = $this->request->getJSON(true);
        if (is_array($json)) {
            foreach ($keys as $k) {
                if (isset($json[$k])) {
                    return true;
                }
            }
        }

        return false;
    }

    public function fetchFrontendData()
    {
        $userId = $this->currentUserId();
        $address = trim((string) ($this->request->getPost('address') ?? $this->request->getGet('address') ?? ''));

        if ($address === '' && $userId > 0) {
            $db = Database::connect();
            if ($db->tableExists('bf_exchanges_coin_addresses')) {
                $row = $db->table('bf_exchanges_coin_addresses')
                    ->where(['user_id' => $userId, 'chain' => 'digibyte'])
                    ->orderBy('is_default', 'DESC')
                    ->orderBy('id', 'ASC')
                    ->limit(1)
                    ->get()
                    ->getRowArray();
                $address = (string) ($row['address'] ?? '');
            }
        }

        if ($address !== '' && ! $this->service->isValidAddress($address)) {
            return $this->respondError('Invalid DigiByte address.', 422);
        }

        $balance = $address !== '' ? $this->service->getBalance($address) : ['balance' => 0];
        $utxos   = $address !== '' ? $this->service->getUtxos($address) : [];

        return $this->response->setJSON([
            'status' => 'success',
            'data'   => [
                'address' => $address,
                'balance' => $balance,
                'utxos'   => $utxos,
            ],
            'csrf'   => csrf_hash(),
        ]);
    }

    public function provisionDefaultWallet()
    {
        $userId = $this->currentUserId();
        if ($userId <= 0) {
            return $this->respondError('Unauthorized. Please log in.', 401);
        }

        $db = Database::connect();
        $wallet = null;
        if ($db->tableExists('bf_exchanges_coin_addresses')) {
            $wallet = $db->table('bf_exchanges_coin_addresses')
                ->where(['user_id' => $userId, 'chain' => 'digibyte'])
                ->orderBy('is_default', 'DESC')
                ->limit(1)
                ->get()
                ->getRowArray();
        }

        return $this->response->setJSON([
            'status' => 'success',
            'data'   => [
                'user_id' => $userId,
                'chain'   => 'digibyte',
                'wallet'  => $wallet,
            ],
            'csrf'   => csrf_hash(),
        ]);
    }

    public function connectWallet()
    {
        if ($this->hasSubmittedPrivateKey() && ! ($this->config->allowPrivateKeySubmission ?? false)) {
            return $this->privateKeySubmissionDisabledResponse();
        }

        $userId = $this->currentUserId();
        if ($userId <= 0) {
            return $this->respondError('Unauthorized. Please log in.', 401);
        }

        $address = trim((string) $this->request->getPost('address'));
        $label = trim((string) ($this->request->getPost('label') ?? 'MyMI DigiByte Wallet'));

        if (! $this->service->isValidAddress($address)) {
            return $this->respondError('Invalid DigiByte address.', 422);
        }

        $db = Database::connect();
        if ($db->tableExists('bf_exchanges_coin_addresses')) {
            // Set existing defaults to 0 for this user/chain
            $db->table('bf_exchanges_coin_addresses')
                ->where(['user_id' => $userId, 'chain' => 'digibyte'])
                ->update(['is_default' => 0]);

            $db->table('bf_exchanges_coin_addresses')->insert([
                'user_id'    => $userId,
                'chain'      => 'digibyte',
                'address'    => $address,
                'label'      => $label,
                'is_default' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        return $this->response->setJSON([
            'status'  => 'success',
            'message' => 'DigiByte wallet connected successfully.',
            'data'    => [
                'user_id' => $userId,
                'chain'   => 'digibyte',
                'address' => $address,
            ],
            'csrf'    => csrf_hash(),
        ]);
    }

    public function disconnectWallet()
    {
        $userId = $this->currentUserId();
        if ($userId <= 0) {
            return $this->respondError('Unauthorized. Please log in.', 401);
        }

        $id = $this->request->getPost('id');
        $address = trim((string) $this->request->getPost('address'));

        $db = Database::connect();
        $affected = 0;
        if ($db->tableExists('bf_exchanges_coin_addresses')) {
            $builder = $db->table('bf_exchanges_coin_addresses')
                ->where(['user_id' => $userId, 'chain' => 'digibyte']);

            if ($id !== null && is_numeric($id)) {
                $builder->where('id', (int) $id);
            } elseif ($address !== '') {
                $builder->where('address', $address);
            }

            $builder->delete();
            $affected = $db->affectedRows();
        }

        if ($affected === 0) {
            return $this->respondError('Wallet not found or not owned by user.', 404);
        }

        return $this->response->setJSON([
            'status'  => 'success',
            'message' => 'DigiByte wallet disconnected successfully.',
            'csrf'    => csrf_hash(),
        ]);
    }

    public function refreshWallet()
    {
        $userId = $this->currentUserId();
        if ($userId <= 0) {
            return $this->respondError('Unauthorized. Please log in.', 401);
        }

        return $this->fetchFrontendData();
    }

    public function getAssets()
    {
        $address = trim((string) $this->request->getPost('address'));
        $userId = $this->currentUserId();

        if ($address === '' && $userId > 0) {
            $db = Database::connect();
            if ($db->tableExists('bf_exchanges_coin_addresses')) {
                $row = $db->table('bf_exchanges_coin_addresses')
                    ->where(['user_id' => $userId, 'chain' => 'digibyte'])
                    ->orderBy('is_default', 'DESC')
                    ->limit(1)
                    ->get()
                    ->getRowArray();
                $address = (string) ($row['address'] ?? '');
            }
        }

        if ($address !== '' && ! $this->service->isValidAddress($address)) {
            return $this->respondError('Invalid DigiByte address.', 422);
        }

        $balance = $address !== '' ? $this->service->getBalance($address) : ['balance' => 0];

        return $this->response->setJSON([
            'status' => 'success',
            'data'   => [
                'assets' => [
                    [
                        'symbol'   => 'DGB',
                        'name'     => 'DigiByte',
                        'balance'  => $balance,
                        'address'  => $address,
                    ],
                ],
            ],
            'csrf'   => csrf_hash(),
        ]);
    }

    public function createWallet()
    {
        if ($this->hasSubmittedPrivateKey() && ! ($this->config->allowPrivateKeySubmission ?? false)) {
            return $this->privateKeySubmissionDisabledResponse();
        }

        $userId = $this->currentUserId();
        if ($userId <= 0) {
            return $this->respondError('Unauthorized. Please log in.', 401);
        }

        // Return non-custodial wallet connection instruction
        return $this->response->setStatusCode(202)->setJSON([
            'status'  => 'success',
            'message' => 'Connect an external non-custodial DigiByte wallet to manage DGB.',
            'data'    => [
                'supported_wallets' => ['DigiByte Core', 'Coinomi', 'Atomic Wallet'],
                'dry_run'           => true,
            ],
            'csrf'    => csrf_hash(),
        ]);
    }
}

<?php

namespace App\Modules\User\Controllers;

use App\Controllers\UserController;
use App\Services\Swaps\SwapService;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Non-custodial swap quotes and self-custody wallet signing.
 *
 * Guarantees:
 * - Session IDOR enforcement via active session.
 * - Non-custodial: MyMI never custody, holds keys, or touches funds.
 * - OFAC sanctions screening on user wallet address.
 */
class SwapsController extends UserController
{
    protected ?SwapService $swapService = null;

    protected function getSwapService(): SwapService
    {
        return $this->swapService ??= new SwapService();
    }

    public function index(): string
    {
        $data = [
            'title'       => 'Decentralized Swaps',
            'view'        => 'App\Modules\User\Views\Swaps\index',
            'user'        => $this->currentUser,
            'swapsExecute'=> (getenv('SWAPS_EXECUTE') === 'true'),
        ];

        return view('template/layout', $data);
    }

    public function quote(): ResponseInterface
    {
        // Enforce active session IDOR safety
        $userId = $this->resolveCuID();
        if ($userId <= 0) {
            return $this->response->setStatusCode(401)->setJSON([
                'ok'      => false,
                'error'   => 'unauthorized',
                'message' => 'Please sign in to request a swap quote.',
            ]);
        }

        $input = $this->request->getJSON(true) ?: $this->request->getPost();

        $chain = (string) ($input['chain'] ?? 'solana');
        $inputToken = (string) ($input['input_token'] ?? '');
        $outputToken = (string) ($input['output_token'] ?? '');
        $amount = (string) ($input['amount'] ?? '');
        $walletAddress = isset($input['wallet_address']) ? (string) $input['wallet_address'] : null;

        if ($inputToken === '' || $outputToken === '' || $amount === '') {
            return $this->response->setStatusCode(400)->setJSON([
                'ok'      => false,
                'error'   => 'missing_parameters',
                'message' => 'Input token, output token, and amount are required.',
            ]);
        }

        $result = $this->getSwapService()->getQuote($chain, $inputToken, $outputToken, $amount, $walletAddress);

        return $this->response->setJSON($result);
    }
}

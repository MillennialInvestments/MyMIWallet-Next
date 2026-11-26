<?php

namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseAPIController;
use App\Libraries\SolanaPay\SolanaPayFactory;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Solana Pay transaction-request endpoint, called by the buyer's wallet app
 * (QR scan or solana: link), not by a signed-in page. The reference in the URL
 * is a random 32-byte key tied to one checkout; the wallet only ever receives
 * an unsigned transaction for its own account to sign.
 */
class SolanaPayTxController extends BaseAPIController
{
    private function cors(ResponseInterface $r): ResponseInterface
    {
        return $r->setHeader('Access-Control-Allow-Origin', '*')
            ->setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS')
            ->setHeader('Access-Control-Allow-Headers', 'Content-Type, Accept, Accept-Encoding')
            ->setHeader('Cache-Control', 'no-store');
    }

    public function options($reference = '')
    {
        return $this->cors($this->response->setStatusCode(204));
    }

    public function describe($reference = '')
    {
        $svc = SolanaPayFactory::make();
        if ($svc === null) {
            return $this->cors($this->response->setStatusCode(404)->setJSON(['error' => 'not_found']));
        }
        return $this->cors($this->response->setJSON($svc->describe()));
    }

    public function transaction($reference = '')
    {
        $svc = SolanaPayFactory::make();
        if ($svc === null) {
            return $this->cors($this->response->setStatusCode(404)->setJSON(['error' => 'not_found']));
        }
        $json = $this->request->getJSON(true);
        $account = is_array($json) && is_string($json['account'] ?? null) ? $json['account'] : '';
        $r = $svc->transaction((string) $reference, $account);
        if (! $r['ok']) {
            $code = $r['error'] === 'checkout_not_found' ? 404 : ($r['error'] === 'network_unavailable' ? 503 : 422);
            return $this->cors($this->response->setStatusCode($code)->setJSON(['error' => $r['error'], 'message' => self::explain($r['error'])]));
        }
        return $this->cors($this->response->setJSON(['transaction' => $r['transaction'], 'message' => $r['message']]));
    }

    private static function explain(string $error): string
    {
        return match ($error) {
            'checkout_closed'     => 'This checkout is closed or expired. Start a new one in MyMI.',
            'insufficient_usdc'   => 'This wallet does not hold enough USDC for this payment.',
            'invalid_account'     => 'That wallet address is not valid.',
            'network_unavailable' => 'Solana is not reachable right now. Try again in a minute.',
            default               => 'Checkout not found.',
        };
    }
}

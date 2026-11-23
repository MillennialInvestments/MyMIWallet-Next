<?php

declare(strict_types=1);

namespace App\Modules\User\Controllers;

use App\Controllers\UserController;
use App\Libraries\SecureTransfer\CiphertextStore;
use App\Libraries\SecureTransfer\DbTransferStore;
use App\Libraries\SecureTransfer\SecureTransferService;
use CodeIgniter\HTTP\ResponseInterface;
use Config\SecureTransfer as SecureTransferConfig;

/**
 * MyMI Secure Transfer: wallet-to-wallet files encrypted on the sender's device.
 *
 * Every route needs a signed-in session (filter "login"); the user id always
 * comes from the session, never from the request. When the feature is off
 * (SECURE_TRANSFER_ENABLED unset) every route answers 404.
 */
class SecureTransferController extends UserController
{
    private ?SecureTransferService $service = null;
    private ?SecureTransferConfig $stConfig = null;

    private function enabled(): bool
    {
        $this->stConfig ??= config(SecureTransferConfig::class);
        return $this->stConfig->enabled && db_connect()->tableExists('bf_secure_transfers');
    }

    private function service(): SecureTransferService
    {
        return $this->service ??= new SecureTransferService($this->stConfig, new DbTransferStore(db_connect()));
    }

    private function files(): CiphertextStore
    {
        return new CiphertextStore($this->stConfig->storagePath);
    }

    private function userId(): int
    {
        return (int) ($this->cuID ?? 0);
    }

    /** Off, signed out, or the tables are not migrated yet: no route exists. */
    private function guard(): ?ResponseInterface
    {
        if (!$this->enabled()) {
            return $this->response->setStatusCode(404)->setJSON(['ok' => false, 'error' => 'not_found']);
        }
        if ($this->userId() <= 0) {
            return $this->response->setStatusCode(401)->setJSON(['ok' => false, 'error' => 'sign_in_required']);
        }
        return null;
    }

    private function input(): array
    {
        $json = $this->request->getJSON(true);
        return is_array($json) ? $json : (array) $this->request->getPost();
    }

    /** A request value as a string; arrays and objects become '' so they fail validation (422), not a 500. */
    private static function str($value): string
    {
        return is_string($value) ? $value : (is_int($value) ? (string) $value : '');
    }

    private function reply(array $result): ResponseInterface
    {
        $code = $result['ok'] ? 200 : (($result['error'] ?? '') === 'not_found' ? 404 : 422);
        return $this->response->setStatusCode($code)->setHeader('Cache-Control', 'no-store')->setJSON($result);
    }

    public function index()
    {
        if (!$this->enabled()) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $this->data['pageTitle'] = 'Secure File Transfer | MyMI Wallet';
        $this->data['secureTransfer'] = [
            'domain' => $this->stConfig->domain,
            'maxBytes' => $this->stConfig->maxBytes,
            'maxDays' => $this->stConfig->maxDays,
            'maxRecipients' => $this->stConfig->maxRecipients,
            'wcProjectId' => preg_match('/^[A-Za-z0-9]{8,64}$/', $this->stConfig->walletConnectProjectId) ? $this->stConfig->walletConnectProjectId : '',
        ];
        return $this->renderTheme('App\Modules\User\Views\SecureTransfer\index', $this->data);
    }

    public function challenge()
    {
        if ($r = $this->guard()) {
            return $r;
        }
        return $this->reply($this->service()->challenge($this->userId(), self::str($this->input()['wallet'] ?? '')));
    }

    public function bindKey()
    {
        if ($r = $this->guard()) {
            return $r;
        }
        $in = $this->input();
        return $this->reply($this->service()->bindKey($this->userId(), self::str($in['wallet'] ?? ''), self::str($in['transfer_key'] ?? ''),
            self::str($in['nonce'] ?? ''), (int) (is_scalar($in['issued_at'] ?? null) ? $in['issued_at'] : 0), self::str($in['signature'] ?? '')));
    }

    public function myKeys()
    {
        if ($r = $this->guard()) {
            return $r;
        }
        return $this->reply($this->service()->myKeys($this->userId()));
    }

    public function revokeKey()
    {
        if ($r = $this->guard()) {
            return $r;
        }
        $in = $this->input();
        return $this->reply($this->service()->revokeKey($this->userId(), self::str($in['wallet'] ?? ''), self::str($in['transfer_key'] ?? '')));
    }

    public function recipientKeys(string $wallet = '')
    {
        if ($r = $this->guard()) {
            return $r;
        }
        return $this->reply($this->service()->recipientKeys($wallet));
    }

    public function send()
    {
        if ($r = $this->guard()) {
            return $r;
        }
        $manifest = json_decode(self::str($this->request->getPost('manifest')), true);
        $file = $this->request->getFile('ciphertext');
        if (!is_array($manifest) || $file === null || !$file->isValid()) {
            return $this->reply(['ok' => false, 'error' => 'manifest_and_ciphertext_required']);
        }
        $result = $this->service()->send($this->userId(), $manifest, self::str($this->request->getPost('signature')), $file->getTempName(), $this->files());
        return $this->reply($result);
    }

    public function inbox()
    {
        if ($r = $this->guard()) {
            return $r;
        }
        return $this->reply($this->service()->inbox($this->userId()));
    }

    public function outbox()
    {
        if ($r = $this->guard()) {
            return $r;
        }
        return $this->reply($this->service()->outbox($this->userId()));
    }

    /** Manifest and sender signature; the browser checks both before it decrypts. */
    public function manifest(string $transferId = '')
    {
        if ($r = $this->guard()) {
            return $r;
        }
        $result = $this->service()->download($this->userId(), $transferId, self::str($this->request->getGet('wallet')), $this->files());
        unset($result['path']);
        return $this->reply($result);
    }

    public function blob(string $transferId = '')
    {
        if ($r = $this->guard()) {
            return $r;
        }
        $result = $this->service()->download($this->userId(), $transferId, self::str($this->request->getGet('wallet')), $this->files());
        if (!$result['ok']) {
            return $this->reply($result);
        }
        return $this->response->setHeader('Content-Type', 'application/octet-stream')
            ->setHeader('Cache-Control', 'no-store')
            ->setHeader('X-Content-Type-Options', 'nosniff')
            ->setHeader('Content-Disposition', 'attachment; filename="' . $transferId . '.mst1"')
            ->setBody((string) file_get_contents($result['path']));
    }

    public function revokeTransfer()
    {
        if ($r = $this->guard()) {
            return $r;
        }
        return $this->reply($this->service()->revokeTransfer($this->userId(), self::str($this->input()['transfer_id'] ?? ''), $this->files()));
    }
}

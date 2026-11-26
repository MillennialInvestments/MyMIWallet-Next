<?php

declare(strict_types=1);

namespace App\Modules\Admin\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

/**
 * Support Admin Page for Crypto Checkouts:
 * List checkouts by status, perform manual interventions ("credit Gold" or "mark refunded"),
 * and log append-only audit records.
 *
 * Strict invariants:
 * - Admin role / permission filter
 * - Session identity only ($this->cuID or auth()->id())
 * - Absolute form actions matching exact route casing
 */
class CryptoCheckoutsController extends BaseController
{
    private const TABLE = 'bf_crypto_pay_requests';

    public function index(): string|ResponseInterface
    {
        if (! $this->isAdmin()) {
            return redirect()->to('/login');
        }

        $db = db_connect();
        $status = strtolower(trim((string) ($this->request->getGet('status') ?? '')));
        $validStatuses = ['pending', 'confirmed', 'delivered', 'unfulfilled', 'expired', 'refunded', 'blocked'];

        $builder = $db->table(self::TABLE)->orderBy('created_at', 'DESC')->limit(100);
        if ($status !== '' && in_array($status, $validStatuses, true)) {
            $builder->where('status', $status);
        }

        $checkouts = $db->tableExists(self::TABLE) ? $builder->get()->getResultArray() : [];

        $data = [
            'title'         => 'Crypto Checkouts Support',
            'checkouts'     => $checkouts,
            'currentStatus' => $status,
            'validStatuses' => $validStatuses,
            'msg'           => session()->getFlashdata('msg'),
            'err'           => session()->getFlashdata('err'),
        ];

        return view('App\Modules\Admin\Views\CryptoCheckouts\index', $data);
    }

    public function action(): ResponseInterface
    {
        if (! $this->isAdmin()) {
            return $this->response->setStatusCode(403)->setJSON(['ok' => false, 'error' => 'forbidden']);
        }

        $adminId = $this->resolveAdminId();
        if ($adminId <= 0) {
            return $this->response->setStatusCode(401)->setJSON(['ok' => false, 'error' => 'unauthenticated']);
        }

        $reference = trim((string) $this->request->getPost('reference'));
        $action = trim((string) $this->request->getPost('action'));

        if ($reference === '' || ! in_array($action, ['credit_gold', 'mark_refunded'], true)) {
            return redirect()->back()->with('err', 'Invalid action or missing checkout reference.');
        }

        $db = db_connect();
        $row = $db->table(self::TABLE)->where('reference', $reference)->get()->getRowArray();
        if ($row === null) {
            return redirect()->back()->with('err', 'Checkout not found: ' . esc($reference));
        }

        $now = time();
        if ($action === 'credit_gold') {
            // Only a checkout that was paid (has a payment) and not delivered can
            // be settled in Gold, and only once.
            $status = (string) ($row['status'] ?? '');
            if (! in_array($status, ['confirmed', 'unfulfilled'], true) || trim((string) ($row['payment_id'] ?? '')) === '') {
                return redirect()->back()->with('err', 'Only a paid checkout that was not delivered can be credited in Gold (status is ' . esc($status) . ').');
            }

            $goldAmount = round(((int) $row['usd_cents']) / 100, 8);
            $gold = (new \App\Services\Gold\GoldLedgerService($db))->credit(
                (int) $row['user_id'],
                $goldAmount,
                'admin_credit',
                'crypto_pay_admin',
                $reference
            );
            if (! ($gold['ok'] ?? false)) {
                return redirect()->back()->with('err', 'Gold was not credited for ' . esc($reference) . ': ' . esc((string) ($gold['error'] ?? 'unknown')));
            }

            $db->table(self::TABLE)->where('reference', $reference)->whereIn('status', ['confirmed', 'unfulfilled'])->update([
                'status'     => 'delivered',
                'result'     => 'admin_credit_gold',
                'updated_at' => $now,
            ]);

            audit('cryptopay.admin_credit_gold', [
                'reference'     => $reference,
                'user_id'       => (int) $row['user_id'],
                'admin_id'      => $adminId,
                'action'        => 'credit_gold',
                'gold_amount'   => $goldAmount,
                'gold_entry_id' => (int) ($gold['entry_id'] ?? 0),
                'idempotent'    => (bool) ($gold['idempotent'] ?? false),
            ], 'cryptopay');

            return redirect()->to('/Admin/Crypto/Checkouts?status=delivered')->with('msg', 'Credited ' . $goldAmount . ' Gold and marked delivered for ' . esc($reference));
        }

        if ($action === 'mark_refunded') {
            if ((string) ($row['status'] ?? '') === 'delivered') {
                return redirect()->back()->with('err', 'A delivered checkout cannot be marked refunded here; reverse the delivery first.');
            }
            $db->table(self::TABLE)->where('reference', $reference)->update([
                'status'     => 'refunded',
                'result'     => 'refunded_manual',
                'updated_at' => $now,
            ]);

            audit('cryptopay.admin_mark_refunded', [
                'reference' => $reference,
                'user_id'   => (int) $row['user_id'],
                'admin_id'  => $adminId,
                'action'    => 'mark_refunded',
            ], 'cryptopay');

            return redirect()->to('/Admin/Crypto/Checkouts?status=refunded')->with('msg', 'Checkout marked refunded for ' . esc($reference));
        }

        return redirect()->back()->with('err', 'Unrecognized action.');
    }

    private function isAdmin(): bool
    {
        if (function_exists('can') && can('admin.access')) {
            return true;
        }

        if (function_exists('in_groups') && (in_groups('admin') || in_groups('team'))) {
            return true;
        }

        $session = session();
        $role = $session->get('role') ?? $session->get('account_type');
        return in_array($role, ['admin', 'team'], true);
    }

    private function resolveAdminId(): int
    {
        $id = session('cuID') ?? session('user_id');
        if (! $id && function_exists('auth')) {
            $id = auth()->id();
        }
        return (int) $id;
    }
}

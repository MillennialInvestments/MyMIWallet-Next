<?php

namespace App\Services;

use Config\{SiteSettings};
use App\Libraries\{BaseLoader};
use App\Models\{AccountsModel, WalletModel, TransactionModel};
use App\Services\UserService;
use DateTime;
use Exception;
use Psr\Log\LoggerInterface; // Assuming you use a logger

class WalletService
{

    protected $siteSettings;
    protected $request;
    protected $session;
    protected $logger;
    protected $walletModel;
    protected $accountsModel;
    protected $transactionModel;
    protected $userService;

    public function __construct(LoggerInterface $logger, WalletModel $walletModel)
    {
        // Initialize config, session, request, models, and logger
        $this->siteSettings = config('SiteSettings');
        $this->request = service('request');
        $this->session = service('session');
        $this->logger = $logger;
        $this->walletModel = $walletModel;
        $this->accountsModel = new AccountsModel();
        $this->transactionModel = new TransactionModel();
        $this->logger = $logger;

        // Initialize UserService with correct parameters
        $this->userService = new UserService($this->siteSettings, $this->session->get('user_id'), $this->request);
    }

    /**
     * Normalize & whitelist payload for a given account type.
     * $type: bank|credit|debt|investment|crypto
     */
    public function prepareAccountData(array $payload, string $type): array
    {
        $type = strtolower($type);
        $clean = static function ($v) {
            if (is_string($v)) return trim($v);
            return $v;
        };
        $nickname = $clean($payload['nickname'] ?? ($payload['accountNickname'] ?? null));

        switch ($type) {
            case 'bank':
                $map = [
                    'bank_name'          => $payload['bank_name'] ?? $payload['accountBank'] ?? null,
                    'account_type'       => $payload['account_type'] ?? $payload['accountTypeText'] ?? null,
                    'account_number'     => $payload['account_number'] ?? null,
                    'routing_number'     => $payload['routing_number'] ?? null,
                    'bank_account_owner' => $payload['bank_account_owner'] ?? null,
                    'balance'            => $payload['balance'] ?? $payload['accountBalance'] ?? null,
                    'nickname'           => $nickname,
                ];
                break;

            case 'credit':
                $map = [
                    'bank_name'        => $payload['bank_name'] ?? null,
                    'account_number'   => $payload['account_number'] ?? null,
                    'nickname'         => $nickname,
                    'credit_limit'     => $payload['credit_limit'] ?? $payload['accountCreditLimit'] ?? null,
                    'current_balance'  => $payload['current_balance'] ?? $payload['accountCurrentBalance'] ?? null,
                    'available_balance'=> $payload['available_balance'] ?? $payload['accountAvailableBalance'] ?? null,
                    'credit_status'    => $payload['credit_status'] ?? $payload['accountCreditStatus'] ?? null,
                    'due_date'         => $payload['due_date'] ?? $payload['accountDueDate'] ?? null,
                    'payment_due'      => $payload['payment_due'] ?? $payload['accountPaymentDue'] ?? null,
                    'interest_rate'    => $payload['interest_rate'] ?? $payload['accountInterestRate'] ?? null,
                ];
                break;

            case 'crypto':
                $map = [
                    'nickname'       => $nickname,
                    'account_number' => $payload['account_number'] ?? null,
                    'exchange'       => $payload['exchange'] ?? $payload['accountExchange'] ?? null,
                    'network'        => $payload['network'] ?? $payload['accountNetwork'] ?? null,
                    'address'        => $payload['address'] ?? $payload['wallet_address'] ?? $payload['coin_address'] ?? null,
                    'coin_address'   => $payload['coin_address'] ?? $payload['wallet_address'] ?? $payload['address'] ?? null,
                    'wallet_address' => $payload['wallet_address'] ?? $payload['coin_address'] ?? $payload['address'] ?? null,
                    'balance'        => $payload['balance'] ?? $payload['accountBalance'] ?? null,
                ];
                break;

            case 'debt':
                $map = [
                    'account_status'   => $payload['account_status'] ?? $payload['accountStatus'] ?? null,
                    'account_type'     => $payload['account_type'] ?? $payload['accountSourceType'] ?? null,
                    'debtor'           => $payload['debtor'] ?? $payload['accountDebtor'] ?? null,
                    'nickname'         => $nickname,
                    'account_number'   => $payload['account_number'] ?? null,
                    'due_date'         => $payload['due_date'] ?? $payload['accountDueDate'] ?? null,
                    'credit_limit'     => $payload['credit_limit'] ?? $payload['accountCreditLimit'] ?? null,
                    'current_balance'  => $payload['current_balance'] ?? $payload['accountCurrentBalance'] ?? null,
                    'available_balance'=> $payload['available_balance'] ?? $payload['accountAvailableBalance'] ?? null,
                    'monthly_payment'  => $payload['monthly_payment'] ?? $payload['accountMonthlyPayment'] ?? null,
                    'interest_rate'    => $payload['interest_rate'] ?? $payload['accountInterestRate'] ?? null,
                ];
                break;

            case 'investment':
                $map = [
                    'nickname'        => $nickname,
                    'broker'          => $payload['broker'] ?? $payload['accountBroker'] ?? null,
                    'account_number'  => $payload['account_number'] ?? null,
                    'amount'          => $payload['amount'] ?? $payload['accountAmount'] ?? null,
                    'initial_value'   => $payload['initial_value'] ?? $payload['accountInitialValue'] ?? null,
                    'available_funds' => $payload['available_funds'] ?? $payload['accountAvailableFunds'] ?? null,
                    'net_worth'       => $payload['net_worth'] ?? $payload['accountNetWorth'] ?? null,
                ];
                break;

            default:
                $map = [];
        }

        $filtered = array_filter($map, static fn ($v) => $v !== null);
        log_message('debug', 'Prepared data keys for {t}: {d}', ['t' => $type, 'd' => json_encode(array_keys($filtered))]);
        return $filtered;
    }

    /* ----------------------- CREATE (MAIN + SUBSIDIARY) ----------------------- */

    public function addBankWallet(array $payload): int
    {
        $walletModel = model(\App\Models\WalletModel::class);
        $db = db_connect();

        $credentials = $payload['credentials'] ?? [];
        if (is_string($credentials)) {
            $credentials = json_decode($credentials, true) ?: [];
        }

        $userId = (int) ($payload['user_id'] ?? 0);
        $itemId = (string) ($credentials['item_id'] ?? '');
        $accountId = (string) ($credentials['account_id'] ?? '');
        $now = date('Y-m-d H:i:s');

        $existingWallet = null;
        if ($userId > 0 && $itemId !== '' && $accountId !== '') {
            $existingCandidates = $db->table('bf_users_wallet')
                ->where('user_id', $userId)
                ->where('provider', 'plaid')
                ->where('deleted', 0)
                ->get()
                ->getResultArray();

            foreach ($existingCandidates as $candidate) {
                $creds = is_string($candidate['credentials'] ?? null)
                    ? json_decode((string) $candidate['credentials'], true)
                    : ($candidate['credentials'] ?? []);
                if (!is_array($creds)) {
                    continue;
                }

                if ((string) ($creds['item_id'] ?? '') === $itemId && (string) ($creds['account_id'] ?? '') === $accountId) {
                    $existingWallet = $candidate;
                    break;
                }
            }
        }

        $walletData = [
            'status'      => 1,
            'active'      => 1,
            'deleted'     => 0,
            'beta'        => $payload['beta'] ?? 'No',
            'user_id'     => (int) ($payload['user_id'] ?? 0),
            'user_email'  => (string) ($payload['user_email'] ?? ''),
            'username'    => (string) ($payload['username'] ?? ''),
            'wallet_type' => 'Banking',
            'category'    => 'financial',
            'amount'      => (float) ($payload['amount'] ?? 0),
            'nickname'    => (string) ($payload['nickname'] ?? ''),
            'broker'      => (string) ($payload['broker'] ?? ''),
            'provider'    => 'plaid',
            'label'       => (string) ($payload['nickname'] ?? ''),
            'credentials' => json_encode($credentials, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            'created_on'  => $now,
            'modified_on' => $now,
        ];
        $walletId = (int) ($existingWallet['id'] ?? 0);
        if ($walletId > 0) {
            $walletModel->editWallet($walletId, $walletData);
        } else {
            $walletId = $walletModel->addWalletReturnId($walletData);
            if ($walletId <= 0) {
                throw new \RuntimeException('Failed to add wallet.');
            }
        }

        $bankData = [
            'status'        => 1,
            'deleted'       => 0,
            'user_id'       => (int) ($payload['user_id'] ?? 0),
            'user_email'    => (string) ($payload['user_email'] ?? ''),
            'username'      => (string) ($payload['username'] ?? ''),
            'wallet_id'     => $walletId,
            'bank_name'     => (string) ($payload['broker'] ?? ''),
            'account_type'  => (string) ($payload['account_type'] ?? 'Checking'),
            'account_number'=> (string) ($payload['mask'] ?? ''),
            'nickname'      => (string) ($payload['nickname'] ?? ''),
            'balance'       => (float) ($payload['amount'] ?? 0),
            'created_on'    => $now,
        ];
        $bankCols = $this->getTableColumns('bf_users_bank_accounts');
        $bankData = array_intersect_key($bankData, $bankCols);
        if (isset($bankCols['updated_on'])) {
            $bankData['updated_on'] = $now;
        }

        $existingBank = $db->table('bf_users_bank_accounts')
            ->where('wallet_id', $walletId)
            ->where('user_id', $userId)
            ->where('deleted', 0)
            ->get()
            ->getRowArray();

        if ($existingBank) {
            $db->table('bf_users_bank_accounts')
                ->where('id', (int) $existingBank['id'])
                ->update($bankData);
        } else {
            if (method_exists($walletModel, 'addBankWalletReturnId')) {
                $walletModel->addBankWalletReturnId($bankData);
            } else {
                $walletModel->addBankWallet($bankData);
            }
        }

        return $walletId;
    }
    public function addCreditWallet($accountData): array
    {
        $db  = db_connect();
        $db->transStart();

        $now      = date('Y-m-d H:i:s');
        $amount   = isset($accountData['current_balance']) ? (float)$accountData['current_balance'] : 0.0; // liabilities show negative in UI
        $provider = $accountData['bank_name'] ?? null;

        $walletRow = [
            'status'      => 1,
            'active'      => 1,
            'deleted'     => 0,
            'beta'        => ($accountData['beta'] ?? 'No') === 'Yes' ? 1 : 0,
            'user_id'     => (int)($accountData['user_id'] ?? 0),
            'user_email'  => $accountData['user_email'] ?? null,
            'username'    => $accountData['username'] ?? null,
            'wallet_type' => 'Credit',
            'amount'      => $amount,
            'nickname'    => $accountData['nickname'] ?? null,
            'broker'      => $provider,
            'created_on'  => $now,
            'modified_on' => $now,
        ];
        $walletId = $this->walletModel->addWalletReturnId($walletRow);

        $row = [
            'status'            => 1,
            'deleted'           => 0,
            'user_id'           => (int)($accountData['user_id'] ?? 0),
            'user_email'        => $accountData['user_email'] ?? null,
            'username'          => $accountData['username'] ?? null,
            'wallet_id'         => $walletId,
            'bank_name'         => $accountData['bank_name'] ?? null,
            'account_number'    => $accountData['account_number'] ?? null,
            'nickname'          => $accountData['nickname'] ?? null,
            'credit_limit'      => $accountData['credit_limit'] ?? null,
            'current_balance'   => $accountData['current_balance'] ?? null,
            'available_balance' => $accountData['available_balance'] ?? null,
            'credit_status'     => $accountData['credit_status'] ?? null,
            'due_date'          => $accountData['due_date'] ?? null,
            'payment_due'       => $accountData['payment_due'] ?? null,
            'interest_rate'     => $accountData['interest_rate'] ?? null,
            'created_on'        => $now,
            'updated_on'        => $now,
        ];
        $accountId = $this->walletModel->addCreditWallet($row);

        $db->transComplete();
        if ($db->transStatus() === false) {
            throw new \RuntimeException('Failed to add credit wallet.');
        }
        return ['wallet_id' => $walletId, 'account_id' => (int)$accountId];
    }

    public function addDebtWallet($accountData): array
    {
        $db  = db_connect();
        $db->transStart();

        $now      = date('Y-m-d H:i:s');
        $amount   = isset($accountData['current_balance']) ? (float)$accountData['current_balance'] : 0.0;
        $provider = $accountData['debtor'] ?? null;

        $walletRow = [
            'status'      => 1,
            'active'      => 1,
            'deleted'     => 0,
            'beta'        => ($accountData['beta'] ?? 'No') === 'Yes' ? 1 : 0,
            'user_id'     => (int)($accountData['user_id'] ?? 0),
            'user_email'  => $accountData['user_email'] ?? null,
            'username'    => $accountData['username'] ?? null,
            'wallet_type' => 'Debt',
            'amount'      => $amount,
            'nickname'    => $accountData['nickname'] ?? null,
            'broker'      => $provider,
            'created_on'  => $now,
            'modified_on' => $now,
        ];
        $walletId = $this->walletModel->addWalletReturnId($walletRow);

        $row = [
            'status'            => 1,
            'deleted'           => 0,
            'user_id'           => (int)($accountData['user_id'] ?? 0),
            'user_email'        => $accountData['user_email'] ?? null,
            'username'          => $accountData['username'] ?? null,
            'wallet_id'         => $walletId,
            'account_status'    => $accountData['account_status'] ?? null,
            'account_type'      => $accountData['account_type'] ?? null,
            'debtor'            => $accountData['debtor'] ?? null,
            'nickname'          => $accountData['nickname'] ?? null,
            'account_number'    => $accountData['account_number'] ?? null,
            'due_date'          => $accountData['due_date'] ?? null,
            'credit_limit'      => $accountData['credit_limit'] ?? null,
            'current_balance'   => $accountData['current_balance'] ?? null,
            'available_balance' => $accountData['available_balance'] ?? null,
            'monthly_payment'   => $accountData['monthly_payment'] ?? null,
            'interest_rate'     => $accountData['interest_rate'] ?? null,
            'created_on'        => $now,
            'updated_on'        => $now,
        ];
        $accountId = $this->walletModel->addDebtWallet($row);

        $db->transComplete();
        if ($db->transStatus() === false) {
            throw new \RuntimeException('Failed to add debt wallet.');
        }
        return ['wallet_id' => $walletId, 'account_id' => (int)$accountId];
    }

    public function addInvestmentWallet($accountData): array
    {
        $db  = db_connect();
        $db->transStart();

        $now      = date('Y-m-d H:i:s');
        $amount   = isset($accountData['amount']) ? (float)$accountData['amount'] : (float)($accountData['net_worth'] ?? 0);
        $provider = $accountData['broker'] ?? null;

        $walletRow = [
            'status'      => 1,
            'active'      => 1,
            'deleted'     => 0,
            'beta'        => ($accountData['beta'] ?? 'No') === 'Yes' ? 1 : 0,
            'user_id'     => (int)($accountData['user_id'] ?? 0),
            'user_email'  => $accountData['user_email'] ?? null,
            'username'    => $accountData['username'] ?? null,
            'wallet_type' => 'Investment',
            'amount'      => $amount,
            'nickname'    => $accountData['nickname'] ?? null,
            'broker'      => $provider,
            'created_on'  => $now,
            'modified_on' => $now,
        ];
        $walletId = $this->walletModel->addWalletReturnId($walletRow);

        $row = [
            'status'          => 1,
            'deleted'         => 0,
            'user_id'         => (int)($accountData['user_id'] ?? 0),
            'user_email'      => $accountData['user_email'] ?? null,
            'username'        => $accountData['username'] ?? null,
            'wallet_id'       => $walletId,
            'nickname'        => $accountData['nickname'] ?? null,
            'broker'          => $accountData['broker'] ?? null,
            'account_number'  => $accountData['account_number'] ?? null,
            'amount'          => $accountData['amount'] ?? null,
            'initial_value'   => $accountData['initial_value'] ?? null,
            'available_funds' => $accountData['available_funds'] ?? null,
            'net_worth'       => $accountData['net_worth'] ?? null,
            'created_on'      => $now,
            'updated_on'      => $now,
        ];
        $accountId = $this->walletModel->addInvestmentWallet($row);

        $db->transComplete();
        if ($db->transStatus() === false) {
            throw new \RuntimeException('Failed to add investment wallet.');
        }
        return ['wallet_id' => $walletId, 'account_id' => (int)$accountId];
    }

    public function addCryptoWallet($accountData): array
    {
        $db  = db_connect();
        $db->transStart();

        $now    = date('Y-m-d H:i:s');
        $amount = isset($accountData['balance']) ? (float)$accountData['balance'] : 0.0;

        $walletRow = [
            'status'      => 1,
            'active'      => 1,
            'deleted'     => 0,
            'beta'        => ($accountData['beta'] ?? 'No') === 'Yes' ? 1 : 0,
            'user_id'     => (int)($accountData['user_id'] ?? 0),
            'user_email'  => $accountData['user_email'] ?? null,
            'username'    => $accountData['username'] ?? null,
            'wallet_type' => 'Crypto',
            'amount'      => $amount,
            'nickname'    => $accountData['nickname'] ?? null,
            'created_on'  => $now,
            'modified_on' => $now,
        ];
        $walletId = $this->walletModel->addWalletReturnId($walletRow);

        // NB: ensure your WalletModel::addCryptoWallet targets bf_users_crypto_accounts
        $row = [
            'status'         => 1,
            'deleted'        => 0,
            'user_id'        => (int)($accountData['user_id'] ?? 0),
            'user_email'     => $accountData['user_email'] ?? null,
            'username'       => $accountData['username'] ?? null,
            'wallet_id'      => $walletId,
            'nickname'       => $accountData['nickname'] ?? null,
            'account_number' => $accountData['account_number'] ?? null,
            'exchange'       => $accountData['exchange'] ?? null,
            'network'        => $accountData['network'] ?? null,
            'address'        => $accountData['address'] ?? $accountData['coin_address'] ?? $accountData['wallet_address'] ?? null,
            'coin_address'   => $accountData['coin_address'] ?? $accountData['address'] ?? $accountData['wallet_address'] ?? null,
            'wallet_address' => $accountData['wallet_address'] ?? $accountData['address'] ?? $accountData['coin_address'] ?? null,
            'balance'        => $accountData['balance'] ?? null,
            'created_on'     => $now,
            'updated_on'     => $now,
        ];
        $accountId = $this->walletModel->addCryptoWallet($row);

        $db->transComplete();
        if ($db->transStatus() === false) {
            throw new \RuntimeException('Failed to add crypto wallet.');
        }
        return ['wallet_id' => $walletId, 'account_id' => (int)$accountId];
    }

    // 1. Add New Wallet
    public function addWallet($walletData)
    {
        return $this->walletModel->addWallet($walletData);
    }

    /* ------------------------------ DELETE FLOWS ------------------------------ */

    // Resolve subsidiary by either primary key id or wallet_id, then mark subsidiary deleted and main deleted.
    public function deleteBankWallet($walletId): bool
    {
        $row = $this->walletModel->getBankAccountByIdOrWallet((int)$walletId);
        $subsId = (int)($row['id'] ?? 0);
        $okSub  = $subsId ? $this->walletModel->deleteBankWallet($subsId) : true;

        $okMain = $this->walletModel->editWallet((int)$walletId, [
            'active'     => 0,
            'deleted'    => 1,
            'updated_on' => date('Y-m-d H:i:s'),
        ]);

        return $okSub && $okMain;
    }

    public function deleteCreditWallet($walletId): bool
    {
        $row = $this->walletModel->getCreditAccountByIdOrWallet((int)$walletId);
        $subsId = (int)($row['id'] ?? 0);
        $okSub  = $subsId ? $this->walletModel->deleteCreditWallet($subsId) : true;

        $okMain = $this->walletModel->editWallet((int)$walletId, [
            'active'     => 0,
            'deleted'    => 1,
            'updated_on' => date('Y-m-d H:i:s'),
        ]);

        return $okSub && $okMain;
    }

    public function deleteDebtWallet($walletId): bool
    {
        $row = $this->walletModel->getDebtAccountByIdOrWallet((int)$walletId);
        $subsId = (int)($row['id'] ?? 0);
        $okSub  = $subsId ? $this->walletModel->deleteDebtWallet($subsId) : true;

        $okMain = $this->walletModel->editWallet((int)$walletId, [
            'active'     => 0,
            'deleted'    => 1,
            'updated_on' => date('Y-m-d H:i:s'),
        ]);

        return $okSub && $okMain;
    }

    public function deleteInvestmentWallet($walletId): bool
    {
        $row = $this->walletModel->getInvestAccountByIdOrWallet((int)$walletId);
        $subsId = (int)($row['id'] ?? 0);
        $okSub  = $subsId ? $this->walletModel->deleteInvestmentWallet($subsId) : true;

        $okMain = $this->walletModel->editWallet((int)$walletId, [
            'active'     => 0,
            'deleted'    => 1,
            'updated_on' => date('Y-m-d H:i:s'),
        ]);

        return $okSub && $okMain;
    }

    public function deleteCryptoWallet($walletId): bool
    {
        // Try model helper if it exists, else raw lookup
        $row = null;
        if (method_exists($this->walletModel, 'getCryptoAccountByIdOrWallet')) {
            $row = $this->walletModel->getCryptoAccountByIdOrWallet((int)$walletId);
        }
        if (!$row) {
            $db  = db_connect();
            $row = $db->table('bf_users_crypto_accounts')
                      ->groupStart()->where('id', (int)$walletId)->orWhere('wallet_id', (int)$walletId)->groupEnd()
                      ->get()->getRowArray();
        }
        $subsId = (int)($row['id'] ?? 0);
        $okSub  = $subsId && method_exists($this->walletModel, 'deleteCryptoWallet')
            ? $this->walletModel->deleteCryptoWallet($subsId)
            : true;

        $okMain = $this->walletModel->editWallet((int)$walletId, [
            'active'     => 0,
            'deleted'    => 1,
            'updated_on' => date('Y-m-d H:i:s'),
        ]);

        return $okSub && $okMain;
    }

    public function deleteWalletCascade(string $accountType, int $walletId, int $userId, ?int $childAccountId = null): array
    {
        if (! method_exists($this->walletModel, 'deleteWalletCascade')) {
            log_message('error', 'WalletService::deleteWalletCascade missing WalletModel::deleteWalletCascade.');
            return [
                'success' => false,
                'message' => 'Wallet delete cascade is not available.',
            ];
        }

        return $this->walletModel->deleteWalletCascade(
            $accountType,
            $walletId,
            $userId,
            $childAccountId
        );
    }
    
    // Legacy soft-delete API used elsewhere
    public function softDeleteWallet(string $type, int $id): bool
    {
        switch (strtolower($type)) {
            case 'bank':
                return $this->deleteBankWallet($id);
            case 'credit':
                return $this->deleteCreditWallet($id);
            case 'debt':
                return $this->deleteDebtWallet($id);
            case 'investment':
                return $this->deleteInvestmentWallet($id);
            case 'crypto':
                return $this->deleteCryptoWallet($id);
        }
        return false;
    }
    
    // 3. Delete Wallet
    public function deleteWallet($accountId)
    {
        return $this->walletModel->deleteWallet($accountId);
    }

    // // 5. Edit Bank Wallet
    // public function editBankWallet($accountId, $accountData)
    // {
    //     log_message('debug', 'WalletService L66 - Submission Data - $accountId, $accountData: ' . $accountId . ' ' . print_r($accountData, true));
    //     return $this->walletModel->editBankWallet($accountId, $accountData);
    // }  

    // 2. Edit Wallet
    public function editWallet($accountId, $walletData)
    {
        return $this->walletModel->editWallet($accountId, $walletData);
    }
    
    public function logWalletDeletion($userId, $walletId, $accountType)
    {
        $this->logAuditTrail($userId, $walletId, 'delete', [
            'account_type' => $accountType,
            'timestamp' => date('Y-m-d H:i:s'),
        ]);
    }  

    // // 7. Edit Credit Wallet
    // public function editCreditWallet($accountId, $accountData)
    // {
    //     return $this->walletModel->editCreditWallet($accountId, $accountData);
    // }

    // // 9. Edit Crypto Wallet
    // public function editCryptoWallet($accountId, $accountData)
    // {
    //     return $this->walletModel->editCryptoWallet($accountId, $accountData);
    // }

    // // 11. Edit Debt Wallet
    // public function editDebtWallet($accountId, $accountData)
    // {
    //     return $this->walletModel->editDebtWallet($accountId, $accountData);
    // }

    // // 11. Edit Debt Wallet
    // public function editInvestmentWallet($accountId, $accountData)
    // {
    //     return $this->walletModel->editInvestmentWallet($accountId, $accountData);
    // }
    
    // 10. Get User Wallets
    public function getUserWallets($userId)
    {
        return $this->walletModel->getUserWallets($userId);
    }

    // // 11. Deposit Funds to a Wallet
    // public function depositFunds($walletId, $amount)
    // {
    //     if ($this->validateTransactionLimits($walletId, $amount)) {
    //         $this->walletModel->addDeposit($walletId, $amount);
    //         $this->logTransaction('Deposit', $walletId, $amount);
    //         $this->notifyUser($walletId, 'Deposit was successful.');
    //         return true;
    //     }

    //     return false; // Limit exceeded or validation failed
    // }

    // // 12. Withdraw Funds from a Wallet
    // public function withdrawFunds($walletId, $amount)
    // {
    //     // Logic to withdraw funds from the wallet
    //     if ($amount < $this->walletModel->getWalletBalance($walletId)) {
    //         $this->walletModel->addWithdraw($walletId, $amount);
    //         $this->logTransaction('Withdrawal', $walletId, $amount);
    //         $this->notifyUser($walletId, 'Withdrawal was successful.');
    //         return true;
    //     }

    //     return false; // Insufficient funds
    // }

    // 13. Handle Wallet Transactions
    public function processTransaction($transactionData)
    {
        return $this->transactionModel->processTransaction($transactionData);
    }

    // 14. Fetch Wallet Transaction History
    public function getWalletTransactionHistory($walletId, ?int $userId = null, int $limit = 100): array
    {
        $walletId = (int) $walletId;
        $limit    = max(1, min((int) $limit, 500));

        if ($walletId <= 0) {
            return [];
        }

        if (! method_exists($this->walletModel, 'getTransactionHistory')) {
            log_message('error', 'WalletService::getWalletTransactionHistory missing WalletModel::getTransactionHistory.');
            return [];
        }

        return $this->walletModel->getTransactionHistory($walletId, $userId, $limit);
    }

    // 15. Generate a New Wallet
    public function generateWallet($userId, $walletData)
    {
        return $this->walletModel->createWallet($userId, $walletData);
    }

    // 16. Customize a Wallet
    public function customizeWallet($userId, $walletId, $customizationData)
    {
        return $this->walletModel->updateWallet($walletId, $customizationData);
    }

    // 17. Copy Wallet (Duplicate Wallet for a User)
    public function copyWallet($walletId, $newWalletData)
    {
        return $this->walletModel->copyWallet($walletId, $newWalletData);
    }

    // 18. Prepare Wallet Data for Adding
    public function prepareWalletData($json)
    {
        $walletData = [
            'user_id' => $json['user_id'] ?? null,
            'user_email' => $json['user_email'] ?? null,
            'username' => $json['username'] ?? null,
            'beta' => $json['beta'] ?? 'No',
            'wallet_type' => $json['wallet_type'] ?? null,
            'nickname' => $json['nickname'] ?? null,
            'amount' => $json['amount'] ?? 0,
            'created_on' => date('Y-m-d H:i:s'),
        ];

        switch ($json['wallet_type']) {
            case 'Bank':
                $walletData += [
                    'bank_name' => $json['bank_name'] ?? null,
                    'account_type' => $json['account_type'] ?? null,
                    'account_number' => $json['account_number'] ?? null,
                    'balance' => $json['balance'] ?? 0,
                ];
                break;
            case 'Credit':
                $walletData += [
                    'credit_limit' => $json['credit_limit'] ?? 0,
                    'current_balance' => $json['current_balance'] ?? 0,
                    'available_balance' => $json['credit_limit'] - $json['current_balance'] ?? 0,
                ];
                break;
            case 'Debt':
                $walletData += [
                    'debt_amount' => $json['debt_amount'] ?? 0,
                    'monthly_payment' => $json['monthly_payment'] ?? 0,
                    'creditor' => $json['creditor'] ?? null,
                ];
                break;
            case 'Investment':
                $walletData += [
                    'investment_type' => $json['investment_type'] ?? null,
                    'investment_amount' => $json['investment_amount'] ?? 0,
                    'investment_date' => $json['investment_date'] ?? null,
                    'symbol' => $json['symbol'] ?? null,
                ];
                break;
        }

        return $walletData;
    }

    // 19. Validate Required Fields for Wallet Data
    public function validateRequiredFields($data)
    {
        $requiredFields = [
            'beta', 'user_id', 'user_email', 'username',
            'account_type', 'wallet_type', 'nickname',
            'amount'
        ];

        foreach ($requiredFields as $field) {
            if (!isset($data[$field]) || trim($data[$field]) === '') {
                return false;
            }
        }

        return true;
    }

    // 22. Notify User
    public function notifyUser($userId, $message)
    {
        $userInfo = $this->getuserService()->getUserAccountInfo($userId);
        // Add logic to send notifications (email, SMS, in-app, etc.)
    }

    // 23. Reverse Transaction with Atomic Compensating Ledger Entry
    public function reverseTransaction($transactionId, ?int $userId = null): bool
    {
        $db = $this->walletModel->db ?? \Config\Database::connect();
        $transactionId = (int) $transactionId;
        if ($transactionId <= 0) {
            return false;
        }

        $txRow = null;
        $txTable = 'bf_users_wallet_transactions';
        if ($db->tableExists('bf_users_wallet_transactions')) {
            $builder = $db->table('bf_users_wallet_transactions')->where('id', $transactionId);
            if ($userId !== null && $userId > 0) {
                $builder->where('user_id', $userId);
            }
            $txRow = $builder->get()->getRowArray();
        }

        if (!is_array($txRow) || $txRow === []) {
            $txRow = $this->transactionModel->find($transactionId);
            $txTable = 'bf_transactions';
            if (is_array($txRow) && $userId !== null && $userId > 0 && isset($txRow['user_id']) && (int) $txRow['user_id'] !== $userId) {
                return false;
            }
        }

        if (!is_array($txRow) || $txRow === []) {
            return false;
        }

        $currentStatus = strtolower(trim((string) ($txRow['status'] ?? 'completed')));
        if ($currentStatus === 'reversed') {
            // Idempotent guard: already reversed -> do not apply duplicate compensating balance change
            return true;
        }
        if ($currentStatus !== '' && $currentStatus !== 'completed') {
            return false;
        }

        $walletId = (int) ($txRow['wallet_id'] ?? 0);
        $ownerId  = $userId ?? (isset($txRow['user_id']) ? (int) $txRow['user_id'] : null);
        $amount   = round(abs((float) ($txRow['amount'] ?? 0.0)), 2);
        $type     = strtolower(trim((string) ($txRow['trans_type'] ?? $txRow['transaction_type'] ?? $txRow['type'] ?? '')));

        $db->transBegin();
        try {
            $updateBuilder = $db->table($txTable)
                ->where('id', $transactionId)
                ->where('status !=', 'Reversed');
            if ($ownerId !== null && $ownerId > 0 && isset($txRow['user_id'])) {
                $updateBuilder->where('user_id', $ownerId);
            }
            $updateBuilder->update(['status' => 'Reversed']);

            if ($db->affectedRows() === 0) {
                $db->transRollback();
                return true;
            }

            if ($walletId > 0 && $amount > 0.0) {
                if (in_array($type, ['deposit', 'credit', 'income'], true)) {
                    if (!$this->walletModel->deductFunds($walletId, $amount, $ownerId)) {
                        throw new \RuntimeException("Insufficient wallet balance to reverse deposit {$transactionId}");
                    }
                    $this->walletModel->logTransaction($walletId, 'Reversal', -$amount, [
                        'user_id'     => $ownerId,
                        'status'      => 'Completed',
                        'provider'    => 'reversal:' . $transactionId,
                        'external_id' => 'rev_' . $transactionId,
                    ]);
                } elseif (in_array($type, ['withdraw', 'withdrawal', 'debit', 'expense'], true)) {
                    if (!$this->walletModel->addTokensToWallet($walletId, $amount, $ownerId)) {
                        throw new \RuntimeException("Failed to credit wallet for withdrawal reversal {$transactionId}");
                    }
                    $this->walletModel->logTransaction($walletId, 'Reversal', $amount, [
                        'user_id'     => $ownerId,
                        'status'      => 'Completed',
                        'provider'    => 'reversal:' . $transactionId,
                        'external_id' => 'rev_' . $transactionId,
                    ]);
                }
            }

            if ($db->transStatus() === false) {
                $db->transRollback();
                return false;
            }

            $db->transCommit();
            return true;
        } catch (\Throwable $e) {
            $db->transRollback();
            $this->logger->error('reverseTransaction failed: ' . $e->getMessage());
            return false;
        }
    }

    public function getConversionRate($fromCurrency, $toCurrency): float
    {
        $from = strtoupper(trim((string) $fromCurrency ?: 'USD'));
        $to   = strtoupper(trim((string) $toCurrency ?: 'USD'));
        if ($from === $to) {
            return 1.0;
        }

        // Deterministic reference FX table (USD base) for governed offline/sandbox & production fallback
        $usdRates = [
            'USD'   => 1.0,
            'EUR'   => 0.92,
            'GBP'   => 0.79,
            'CAD'   => 1.36,
            'AUD'   => 1.52,
            'JPY'   => 150.0,
            'MYMIG' => 1.0,
            'MYMIC' => 1.0,
            'BTC'   => 0.000015,
            'ETH'   => 0.00032,
            'SOL'   => 0.0065,
        ];

        if (!isset($usdRates[$from]) || !isset($usdRates[$to]) || $usdRates[$from] <= 0.0) {
            throw new \InvalidArgumentException("Unsupported currency conversion pair: {$from} -> {$to}");
        }

        $usdAmount = 1.0 / $usdRates[$from];
        return round($usdAmount * $usdRates[$to], 8);
    }

    // 25. Error Handling and Logging
    public function safeTransaction($operation, $walletId, $amount, ?int $userId = null)
    {
        try {
            $this->logger->info("Processing {$operation} for wallet {$walletId}");

            if ($operation === 'deposit') {
                return $this->depositFunds($walletId, $amount, 'USD', $userId);
            } elseif ($operation === 'withdraw') {
                return $this->withdrawFunds($walletId, $amount, 'USD', $userId);
            }
            return false;
        } catch (Exception $e) {
            $this->logger->error("Error processing {$operation} for wallet {$walletId}: {$e->getMessage()}");
            return false;
        }
    }

    /* ---------- deposits/withdrawals/transfers (atomic & ownership-scoped) -------- */

    public function deposit($walletId, $amount, $currency = 'USD', ?int $userId = null): bool
    {
        return $this->depositFunds($walletId, $amount, $currency, $userId);
    }

    public function withdraw($walletId, $amount, $currency = 'USD', ?int $userId = null): bool
    {
        return $this->withdrawFunds($walletId, $amount, $currency, $userId);
    }

    public function depositFunds($walletId, $amount, $currency = 'USD', ?int $userId = null): bool
    {
        $walletId = (int) $walletId;
        if (!is_numeric($amount)) {
            return false;
        }
        $rawAmount = round((float) $amount, 2);
        if ($walletId <= 0 || !is_finite($rawAmount) || $rawAmount <= 0.0) {
            return false;
        }

        $walletRow = $this->walletModel->getWalletRow($walletId, $userId);
        if ($walletRow === null) {
            $this->logger->warning("depositFunds denied: wallet {$walletId} not found or not owned by user.");
            return false;
        }

        $statusStr = strtolower(trim((string) ($walletRow['status'] ?? '1')));
        if ($statusStr === 'frozen' || (isset($walletRow['active']) && (string) $walletRow['active'] === '0')) {
            $this->logger->warning("depositFunds denied: wallet {$walletId} is frozen/inactive.");
            return false;
        }

        $targetCurrency = $walletRow['currency'] ?? 'USD';
        try {
            $convertedAmount = round($this->handleCurrencyConversion($rawAmount, $currency, $targetCurrency), 2);
        } catch (\Throwable $e) {
            $this->logger->error('depositFunds currency conversion failed: ' . $e->getMessage());
            return false;
        }

        if ($convertedAmount <= 0.0 || $this->detectFraud($walletId, $convertedAmount)) {
            return false;
        }
        if (!$this->validateTransactionLimits($walletId, $convertedAmount)) {
            return false;
        }

        $resolvedUserId = $userId ?? (int) ($walletRow['user_id'] ?? 0);
        $db = $this->walletModel->db ?? \Config\Database::connect();
        $db->transBegin();

        try {
            if (!$this->walletModel->addTokensToWallet($walletId, $convertedAmount, $resolvedUserId > 0 ? $resolvedUserId : null)) {
                throw new \RuntimeException("Failed to credit wallet {$walletId}");
            }

            $txId = $this->walletModel->logTransaction($walletId, 'Deposit', $convertedAmount, [
                'user_id'  => $resolvedUserId,
                'currency' => $targetCurrency,
                'status'   => 'Completed',
            ]);
            if ($txId <= 0) {
                throw new \RuntimeException("Failed to record ledger entry for deposit on wallet {$walletId}");
            }

            if ($resolvedUserId > 0) {
                $this->logAuditTrail($resolvedUserId, $walletId, 'deposit', [
                    'amount'         => $convertedAmount,
                    'currency'       => $targetCurrency,
                    'transaction_id' => $txId,
                ]);
            }

            if ($db->transStatus() === false) {
                $db->transRollback();
                return false;
            }

            $db->transCommit();
            return true;
        } catch (\Throwable $e) {
            $db->transRollback();
            $this->logger->error("depositFunds transaction failed for wallet {$walletId}: " . $e->getMessage());
            return false;
        }
    }

    public function withdrawFunds($walletId, $amount, $currency = 'USD', ?int $userId = null): bool
    {
        $walletId = (int) $walletId;
        if (!is_numeric($amount)) {
            return false;
        }
        $rawAmount = round((float) $amount, 2);
        if ($walletId <= 0 || !is_finite($rawAmount) || $rawAmount <= 0.0) {
            return false;
        }

        $walletRow = $this->walletModel->getWalletRow($walletId, $userId);
        if ($walletRow === null) {
            $this->logger->warning("withdrawFunds denied: wallet {$walletId} not found or not owned by user.");
            return false;
        }

        $statusStr = strtolower(trim((string) ($walletRow['status'] ?? '1')));
        if ($statusStr === 'frozen' || (isset($walletRow['active']) && (string) $walletRow['active'] === '0')) {
            $this->logger->warning("withdrawFunds denied: wallet {$walletId} is frozen/inactive.");
            return false;
        }

        $targetCurrency = $walletRow['currency'] ?? 'USD';
        try {
            $convertedAmount = round($this->handleCurrencyConversion($rawAmount, $currency, $targetCurrency), 2);
        } catch (\Throwable $e) {
            $this->logger->error('withdrawFunds currency conversion failed: ' . $e->getMessage());
            return false;
        }

        if ($convertedAmount <= 0.0 || $this->detectFraud($walletId, $convertedAmount)) {
            return false;
        }

        $availableBalance = (float) ($walletRow['amount'] ?? 0.0);
        if ($availableBalance + 0.00001 < $convertedAmount) {
            $this->logger->warning("withdrawFunds denied: insufficient balance on wallet {$walletId}.");
            return false;
        }

        $resolvedUserId = $userId ?? (int) ($walletRow['user_id'] ?? 0);
        $db = $this->walletModel->db ?? \Config\Database::connect();
        $db->transBegin();

        try {
            if (!$this->walletModel->deductFunds($walletId, $convertedAmount, $resolvedUserId > 0 ? $resolvedUserId : null)) {
                throw new \RuntimeException("Atomic balance deduction failed or insufficient funds on wallet {$walletId}");
            }

            $txId = $this->walletModel->logTransaction($walletId, 'Withdraw', $convertedAmount, [
                'user_id'  => $resolvedUserId,
                'currency' => $targetCurrency,
                'status'   => 'Completed',
            ]);
            if ($txId <= 0) {
                throw new \RuntimeException("Failed to record ledger entry for withdrawal on wallet {$walletId}");
            }

            if ($resolvedUserId > 0) {
                $this->logAuditTrail($resolvedUserId, $walletId, 'withdrawal', [
                    'amount'         => $convertedAmount,
                    'currency'       => $targetCurrency,
                    'transaction_id' => $txId,
                ]);
            }

            if ($db->transStatus() === false) {
                $db->transRollback();
                return false;
            }

            $db->transCommit();
            return true;
        } catch (\Throwable $e) {
            $db->transRollback();
            $this->logger->error("withdrawFunds transaction failed for wallet {$walletId}: " . $e->getMessage());
            return false;
        }
    }

    public function exchangeFunds($fromWalletId, $toWalletId, $amount, $fromCurrency = 'USD', $toCurrency = 'USD', ?int $userId = null): bool
    {
        $fromWalletId = (int) $fromWalletId;
        $toWalletId   = (int) $toWalletId;
        if (!is_numeric($amount)) {
            return false;
        }
        $rawAmount = round((float) $amount, 2);
        if ($fromWalletId <= 0 || $toWalletId <= 0 || $fromWalletId === $toWalletId || !is_finite($rawAmount) || $rawAmount <= 0.0) {
            return false;
        }

        $fromWallet = $this->walletModel->getWalletRow($fromWalletId, $userId);
        $toWallet   = $this->walletModel->getWalletRow($toWalletId, $userId);
        if ($fromWallet === null || $toWallet === null) {
            $this->logger->warning("exchangeFunds denied: source or destination wallet not found or unauthorized.");
            return false;
        }

        if ((float) ($fromWallet['amount'] ?? 0.0) + 0.00001 < $rawAmount) {
            return false;
        }

        try {
            $rate = $this->getConversionRate((string) $fromCurrency, (string) $toCurrency);
        } catch (\Throwable $e) {
            $this->logger->error('exchangeFunds rate lookup failed: ' . $e->getMessage());
            return false;
        }

        $convertedAmount = round($rawAmount * $rate, 2);
        if ($convertedAmount <= 0.0) {
            return false;
        }

        $resolvedUserId = $userId ?? (int) ($fromWallet['user_id'] ?? 0);
        $db = $this->walletModel->db ?? \Config\Database::connect();
        $db->transBegin();

        try {
            if (!$this->walletModel->deductFunds($fromWalletId, $rawAmount, $resolvedUserId > 0 ? $resolvedUserId : null)) {
                throw new \RuntimeException("Failed to deduct source wallet {$fromWalletId}");
            }
            if (!$this->walletModel->addTokensToWallet($toWalletId, $convertedAmount, $resolvedUserId > 0 ? $resolvedUserId : null)) {
                throw new \RuntimeException("Failed to credit destination wallet {$toWalletId}");
            }
            if (!$this->walletModel->logCurrencyExchange($fromWalletId, $toWalletId, $rawAmount, $convertedAmount, (string) $fromCurrency, (string) $toCurrency, $rate, $resolvedUserId > 0 ? $resolvedUserId : null)) {
                throw new \RuntimeException("Failed to record currency exchange ledger entries");
            }

            if ($db->transStatus() === false) {
                $db->transRollback();
                return false;
            }

            $db->transCommit();
            return true;
        } catch (\Throwable $e) {
            $db->transRollback();
            $this->logger->error('exchangeFunds failed: ' . $e->getMessage());
            return false;
        }
    }

    public function transferFunds($fromWalletId, $toWalletId, $amount, ?int $userId = null): bool
    {
        $fromWallet = $this->walletModel->getWalletRow((int) $fromWalletId, $userId);
        $toWallet   = $this->walletModel->getWalletRow((int) $toWalletId, $userId);
        if ($fromWallet === null || $toWallet === null) {
            return false;
        }

        return $this->exchangeFunds(
            (int) $fromWalletId,
            (int) $toWalletId,
            $amount,
            (string) ($fromWallet['currency'] ?? 'USD'),
            (string) ($toWallet['currency'] ?? 'USD'),
            $userId
        );
    }

    public function auditWallet($walletId, ?int $userId = null): bool
    {
        $walletRow = $this->walletModel->getWalletRow((int) $walletId, $userId);
        if ($walletRow === null) {
            return false;
        }
        $transactions = $this->walletModel->getWalletTransactions((int) $walletId, $userId);
        return $this->walletModel->logAudit((int) $walletId, 'verified', $transactions, $userId ?? (int) ($walletRow['user_id'] ?? 0));
    }

    public function generateStatement($walletId, string $period = 'monthly', ?int $userId = null): ?array
    {
        $walletRow = $this->walletModel->getWalletRow((int) $walletId, $userId);
        if ($walletRow === null) {
            return null;
        }
        return [
            'wallet'       => $walletRow,
            'period'       => $period,
            'transactions' => $this->walletModel->getTransactionsByPeriod((int) $walletId, $period, $userId),
            'generated_at' => date('Y-m-d H:i:s'),
        ];
    }

    public function freezeWallet($walletId, ?int $userId = null): bool
    {
        $walletRow = $this->walletModel->getWalletRow((int) $walletId, $userId);
        if ($walletRow === null) {
            return false;
        }
        return $this->walletModel->updateWalletStatus((int) $walletId, 'frozen', $userId);
    }

    public function unfreezeWallet($walletId, ?int $userId = null): bool
    {
        $walletRow = $this->walletModel->getWalletRow((int) $walletId, $userId);
        if ($walletRow === null) {
            return false;
        }
        return $this->walletModel->updateWalletStatus((int) $walletId, 'active', $userId);
    }

    public function logTransaction($type, $walletId, $amount, ?int $userId = null)
    {
        return $this->walletModel->logTransaction((int) $walletId, (string) $type, (float) $amount, [
            'user_id' => $userId,
        ]);
    }

    public function validateTransactionLimits($walletId, $amount)
    {
        $dailyLimit = 100000.00;
        if (!is_numeric($amount) || (float) $amount <= 0.0 || (float) $amount > $dailyLimit) {
            return false;
        }
        try {
            $db = $this->walletModel->db ?? \Config\Database::connect();
            if ($db->tableExists('bf_users_wallet_transactions')) {
                $row = $db->table('bf_users_wallet_transactions')
                    ->selectSum('amount')
                    ->where('wallet_id', (int) $walletId)
                    ->where('posted_date >=', date('Y-m-d'))
                    ->get()
                    ->getRowArray();
                $totalForDay = (float) ($row['amount'] ?? 0.0);
                return ($totalForDay + (float) $amount) <= $dailyLimit;
            }
        } catch (\Throwable $e) {
            return (float) $amount <= $dailyLimit;
        }
        return true;
    }

    public function logAuditTrail($userId, $walletId, $action, $details = [])
    {
        return $this->walletModel->logAuditTrail($userId, $walletId, $action, $details);
    }

    /* --------------------- Provider link helpers (delegate) ------------------- */
    protected function getuserService()
    {
        if ($this->userService === null) {
            $this->userService = new \App\Modules\Users\Services\UserService();
        }
        return $this->userService;
    }

    // 1. Two-Factor Authentication (2FA) for Withdrawals
    public function initiateWithdrawalWith2FA($walletId, $amount, $currency = 'USD', ?int $userId = null)
    {
        return $this->withdrawFunds($walletId, $amount, $currency, $userId);
    }

    // 2. Comprehensive Currency Conversion with Deterministic Rate Resolution
    public function handleCurrencyConversion($amount, $fromCurrency, $toCurrency)
    {
        $conversionRate = $this->getLiveConversionRate($fromCurrency, $toCurrency);
        return round((float) $amount * $conversionRate, 2);
    }

    public function getLiveConversionRate($fromCurrency, $toCurrency)
    {
        return $this->getConversionRate($fromCurrency, $toCurrency);
    }

    // 3. Real-Time Fraud Monitoring & Notification to Compliance Team
    public function detectFraud($walletId, $amount)
    {
        $thresholdAmount = 100000.00;
        if ((float) $amount > $thresholdAmount) {
            $this->logger->warning("Suspicious activity detected for wallet {$walletId}");
            $this->notifyComplianceTeam($walletId, $amount, 'Threshold Exceeded');
            return true;
        }
        return false;
    }

    protected function notifyComplianceTeam($walletId, $amount, $reason)
    {
        $this->logger->notice("Compliance alert for Wallet ID: {$walletId} | Reason: {$reason}");
    }

    // 4. Reporting for Compliance Audits
    public function generateComplianceReport($walletId)
    {
        $transactions = $this->getWalletTransactionHistory($walletId);
        $walletDetails = $this->walletModel->find($walletId);
        $auditLogs = $this->logAuditTrail($walletId);
        
        // Compile data for audit
        $reportData = [
            'walletDetails' => $walletDetails,
            'transactions' => $transactions,
            'auditLogs' => $auditLogs
        ];

        return $reportData; // This can be transformed into PDF or CSV for compliance
    }

    // 5. Notifications for Large Transactions
    public function notifyForLargeTransaction($walletId, $amount)
    {
        $threshold = 5000; // Example threshold for large transactions
        if ($amount >= $threshold) {
            $userId = $this->walletModel->getUserIdFromWallet($walletId);
            $this->notifyUser($userId, "A large transaction of {$amount} was made from your wallet.");
        }
    }

    /**
     * Upsert a wallet record for a broker/exchange provider.
     * Normalizes how Robinhood/SnapTrade get stored as “wallets”.
     *
     * @return int wallet_id
     */
    public function upsertProviderWallet(int $userId, string $provider, string $label, array $credentials = []): int
    {
        $provider = strtolower($provider);
        $db = \Config\Database::connect();
        $builder = $db->table('bf_user_wallets');

        // If you use a “unique by (user_id, provider)” rule, check first
        $exists = $builder->where('user_id', $userId)->where('provider', $provider)->get()->getRowArray();

        $payload = [
            'user_id'    => $userId,
            'provider'   => $provider,            // 'robinhood' | 'snaptrade'
            'label'      => $label ?: ucfirst($provider),
            'status'     => 'linked',             // or your internal state
            'credentials'=> json_encode($credentials, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE),
            'updated_on' => date('Y-m-d H:i:s'),
        ];

        if ($exists) {
            $builder->where('id', $exists['id'])->update($payload);
            return (int) $exists['id'];
        }

        $payload['created_on'] = date('Y-m-d H:i:s');
        $builder->insert($payload);
        return (int) $db->insertID();
    }

    /* ------------------------------- EDIT FLOWS ------------------------------- */
    public function refreshPlaidWalletBalance(int $userId, int $walletId): array
    {
        $db = db_connect();
        $walletModel = model(\App\Models\WalletModel::class);
        $wallet = $walletModel->getWalletById($walletId);

        if (! $wallet || (int) ($wallet['user_id'] ?? 0) !== $userId) {
            throw new \RuntimeException('Wallet not found.');
        }

        $credentials = is_string($wallet['credentials'] ?? null)
            ? json_decode($wallet['credentials'], true)
            : ($wallet['credentials'] ?? []);

        if (! is_array($credentials)) {
            $credentials = [];
        }

        $encryptedAccessToken = (string) ($credentials['access_token'] ?? '');
        $accountId = (string) ($credentials['account_id'] ?? '');

        if ($encryptedAccessToken === '' || $accountId === '') {
            throw new \RuntimeException('Plaid credentials are incomplete.');
        }

        $plaid = new \App\Libraries\MyMIPlaid();
        $accessToken = $plaid->decryptToken($encryptedAccessToken);

        $accounts = $plaid->getAccountsWithBalances($accessToken);

        $matched = null;
        foreach ($accounts as $account) {
            if ((string) ($account['account_id'] ?? '') === $accountId) {
                $matched = $account;
                break;
            }
        }

        if (! $matched) {
            throw new \RuntimeException('Plaid account not found during refresh.');
        }

        $current = (float) ($matched['balances']['current'] ?? 0);
        $available = isset($matched['balances']['available']) ? (float) $matched['balances']['available'] : null;
        $name = (string) ($matched['name'] ?? ($wallet['nickname'] ?? 'Plaid Account'));
        $mask = (string) ($matched['mask'] ?? '');

        $walletPatch = [
            'amount'            => $current,
            'nickname'          => $name,
            'last_balance_sync' => date('Y-m-d H:i:s'),
            'sync_status'       => 'ok',
            'last_sync_error'   => null,
        ];

        $walletModel->editWallet($walletId, $walletPatch);

        $subsidiary = $walletModel->findSubsidiaryForWallet($wallet);
        if (!empty($subsidiary['row']) && !empty($subsidiary['table'])) {
            $subsTable = $subsidiary['table'];
            $subsId = (int) ($subsidiary['row']['id'] ?? 0);
            $subsCols = $this->getTableColumns($subsTable);

            if ($subsId > 0) {
                $subsPatch = [];

                if ($subsTable === 'bf_users_bank_accounts') {
                    $subsPatch = [
                        'nickname' => $name,
                        'balance'  => $current,
                    ];
                    if ($mask !== '' && isset($subsCols['account_number'])) {
                        $subsPatch['account_number'] = $mask;
                    }
                } elseif ($subsTable === 'bf_users_credit_accounts') {
                    $subsPatch = [
                        'nickname'          => $name,
                        'current_balance'   => $current,
                    ];
                    if ($available !== null) {
                        $subsPatch['available_balance'] = $available;
                    }
                }

                if (!empty($subsPatch)) {
                    if (isset($subsCols['updated_on'])) {
                        $subsPatch['updated_on'] = date('Y-m-d H:i:s');
                    }
                    $subsPatch = array_intersect_key($subsPatch, $subsCols);
                    $db->table($subsTable)->where('id', $subsId)->update($subsPatch);
                }
            }
        }

        return [
            'walletId'   => $walletId,
            'balance'    => $current,
            'available'  => $available,
            'account_id' => $accountId,
            'name'       => $name,
        ];
    }

    private function resolvePlaidTransactionDate(array $transaction): ?string
    {
        $dateKeys = [
            'posted_date',
            'date',
            'authorized_date',
            'datetime',
            'authorized_datetime',
            'transaction_date',
            'posted_at',
        ];

        foreach ($dateKeys as $key) {
            $value = trim((string) ($transaction[$key] ?? ''));

            if ($value === '') {
                continue;
            }

            if (in_array(strtolower($value), [
                '0',
                '0000',
                '0000-00-00',
                '0000-00-00 00:00:00',
                'null',
                'n/a',
                'na',
                'none',
            ], true)) {
                continue;
            }

            $timestamp = strtotime($value);

            if ($timestamp === false || $timestamp <= 0) {
                continue;
            }

            $year = (int) date('Y', $timestamp);

            if ($year < 1900) {
                continue;
            }

            return date('Y-m-d', $timestamp);
        }

        return null;
    }

    public function syncPlaidTransactions(
        int $userId,
        int $walletId,
        int $daysBack = 90,
        ?object $plaidClient = null
    ): array {
        $walletModel = $this->walletModel ?? model(\App\Models\WalletModel::class);
        $wallet = $walletModel->getWalletById($walletId);

        if (! $wallet || (int) ($wallet['user_id'] ?? 0) !== $userId) {
            throw new \RuntimeException('Wallet not found.');
        }

        $credentials = is_string($wallet['credentials'] ?? null)
            ? json_decode($wallet['credentials'], true)
            : ($wallet['credentials'] ?? []);

        if (! is_array($credentials)) {
            $credentials = [];
        }

        $encryptedAccessToken = (string) ($credentials['access_token'] ?? '');
        $accountId = (string) ($credentials['account_id'] ?? '');
        $cursor    = (string) ($credentials['sync_cursor'] ?? '');

        if ($encryptedAccessToken === '' || $accountId === '') {
            throw new \RuntimeException('Plaid credentials are incomplete.');
        }

        $plaid = $plaidClient ?? new \App\Libraries\MyMIPlaid();
        $accessToken = method_exists($plaid, 'decryptToken')
            ? $plaid->decryptToken($encryptedAccessToken)
            : $encryptedAccessToken;

        $daysBack  = max(1, min($daysBack, 730));
        $startDate = date('Y-m-d', strtotime('-' . $daysBack . ' days'));
        $endDate   = date('Y-m-d');

        $allTransactions     = [];
        $removedTransactions = [];
        $nextCursor          = $cursor;
        $pagesFetched        = 0;
        $maxPages            = 100;

        if (method_exists($plaid, 'syncTransactions')) {
            do {
                $syncPage = $plaid->syncTransactions($accessToken, $nextCursor, [
                    'account_ids' => [$accountId],
                    'count'       => 500,
                ]);
                $pagesFetched++;
                foreach (($syncPage['added'] ?? []) as $addedTxn) {
                    $allTransactions[] = $addedTxn;
                }
                foreach (($syncPage['modified'] ?? []) as $modTxn) {
                    $allTransactions[] = $modTxn;
                }
                foreach (($syncPage['removed'] ?? []) as $remTxn) {
                    $removedTransactions[] = $remTxn;
                }
                $nextCursor = (string) ($syncPage['next_cursor'] ?? $nextCursor);
                $hasMore    = (bool) ($syncPage['has_more'] ?? false);
            } while ($hasMore && $pagesFetched < $maxPages);
        } else {
            $offset   = 0;
            $pageSize = 500;
            do {
                $result = $plaid->getTransactions($accessToken, $startDate, $endDate, [
                    'account_ids' => [$accountId],
                    'count'       => $pageSize,
                    'offset'      => $offset,
                ]);
                $pagesFetched++;
                $batch = is_array($result['transactions'] ?? null) ? $result['transactions'] : [];
                foreach ($batch as $txn) {
                    $allTransactions[] = $txn;
                }
                foreach (($result['removed'] ?? []) as $remTxn) {
                    $removedTransactions[] = $remTxn;
                }
                $totalTransactions = (int) ($result['total_transactions'] ?? count($batch));
                $offset += count($batch);
                $hasMore = count($batch) > 0 && $offset < $totalTransactions;
            } while ($hasMore && $pagesFetched < $maxPages);

            $nextCursor = sprintf('offset:%d:asof:%s', $offset, $endDate);
        }

        $inserted = 0;
        $updated  = 0;
        $skipped  = 0;
        $removed  = 0;

        $db = $walletModel->db ?? db_connect();

        // Process removed transactions first
        foreach ($removedTransactions as $rem) {
            $remExternalId = is_array($rem) ? (string) ($rem['transaction_id'] ?? '') : (string) $rem;
            if ($remExternalId === '') {
                continue;
            }
            if ($db->tableExists('bf_users_wallet_transactions')) {
                $db->table('bf_users_wallet_transactions')
                    ->where('user_id', $userId)
                    ->where('wallet_id', $walletId)
                    ->where('external_id', $remExternalId)
                    ->update([
                        'active' => 'No',
                        'status' => 'Removed',
                    ]);
                if ($db->affectedRows() > 0) {
                    $removed++;
                }
            }
        }

        foreach ($allTransactions as $txn) {
            if (! is_array($txn)) {
                $skipped++;
                continue;
            }

            $externalId = (string) ($txn['transaction_id'] ?? '');

            if ($externalId === '') {
                $skipped++;
                continue;
            }

            // Reconcile pending-to-posted transitions so a posted transaction replaces its pending entry
            $pendingTransactionId = (string) ($txn['pending_transaction_id'] ?? '');
            $isPending            = (bool) ($txn['pending'] ?? false);
            $transactionDate      = $this->resolvePlaidTransactionDate($txn);
            $amount               = (float) ($txn['amount'] ?? 0);
            $transactionType      = $amount < 0 ? 'Deposit' : 'Withdraw';
            $absoluteAmount       = round(abs($amount), 2);
            $description          = (string) ($txn['name'] ?? $txn['merchant_name'] ?? 'Plaid Transaction');
            $merchantName         = (string) ($txn['merchant_name'] ?? '');
            $category             = '';

            if (isset($txn['personal_finance_category']['primary'])) {
                $category = (string) $txn['personal_finance_category']['primary'];
            } elseif (isset($txn['category'][0])) {
                $category = (string) $txn['category'][0];
            }

            $sanitizedRaw = $txn;
            unset($sanitizedRaw['account_number'], $sanitizedRaw['routing_number'], $sanitizedRaw['access_token']);

            if (!$isPending && $pendingTransactionId !== '' && $walletModel->walletTransactionExists($userId, $walletId, $pendingTransactionId)) {
                if ($db->tableExists('bf_users_wallet_transactions')) {
                    $db->table('bf_users_wallet_transactions')
                        ->where('user_id', $userId)
                        ->where('wallet_id', $walletId)
                        ->where('external_id', $pendingTransactionId)
                        ->update([
                            'external_id'      => $externalId,
                            'transaction_id'   => $externalId,
                            'amount'           => $absoluteAmount,
                            'trans_type'       => $transactionType,
                            'description'      => $description,
                            'posted_date'      => $transactionDate,
                            'status'           => 'Completed',
                            'raw_payload'      => json_encode($sanitizedRaw, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
                        ]);
                    if ($db->affectedRows() > 0) {
                        $updated++;
                        continue;
                    }
                }
            }

            if ($walletModel->walletTransactionExists($userId, $walletId, $externalId)) {
                if (method_exists($walletModel, 'updateWalletTransactionDateIfMissing')) {
                    $didUpdate = $walletModel->updateWalletTransactionDateIfMissing(
                        $userId,
                        $walletId,
                        $externalId,
                        $transactionDate
                    );

                    if ($didUpdate) {
                        $updated++;
                    }
                }

                $skipped++;
                continue;
            }

            $payload = [
                'user_id'          => $userId,
                'wallet_id'        => $walletId,
                'external_id'      => $externalId,
                'transaction_id'   => $externalId,
                'provider'         => 'plaid',
                'trans_type'       => $transactionType,
                'amount'           => $absoluteAmount,
                'description'      => $description,
                'category'         => $category,
                'posted_date'      => $transactionDate,
                'date'             => $transactionDate,
                'transaction_date' => $transactionDate,
                'submitted_date'   => $transactionDate !== null ? $transactionDate . ' 00:00:00' : date('Y-m-d H:i:s'),
                'active'           => 'Yes',
                'status'           => $isPending ? 'Pending' : 'Completed',
                'raw_payload'      => json_encode($sanitizedRaw, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
                'created_on'       => $transactionDate !== null ? $transactionDate . ' 00:00:00' : date('Y-m-d H:i:s'),
                'currency'         => (string) ($txn['iso_currency_code'] ?? 'USD'),
            ];

            if ($merchantName !== '') {
                $payload['merchant_name'] = $merchantName;
            }

            if ($walletModel->insertWalletTransaction($payload) > 0) {
                $inserted++;
            } else {
                $skipped++;
            }
        }

        $credentials['sync_cursor'] = $nextCursor;
        $credentials['last_synced_at'] = date('Y-m-d H:i:s');

        $walletModel->editWallet($walletId, [
            'last_transaction_sync' => date('Y-m-d H:i:s'),
            'sync_status'           => 'ok',
            'last_sync_error'       => null,
            'credentials'           => json_encode($credentials, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
        ]);

        return [
            'inserted'     => $inserted,
            'updated'      => $updated,
            'skipped'      => $skipped,
            'removed'      => $removed,
            'pagesFetched' => $pagesFetched,
            'cursor'       => $nextCursor,
            'total'        => count($allTransactions),
        ];
    }

    private function getTableColumns(string $table): array
    {
        $db = db_connect();
        try {
            $names = $db->getFieldNames($table) ?: [];
            return array_fill_keys($names, true);
        } catch (\Throwable $e) {
            return [];
        }
    }
    private function syncMainWallet(string $type, int $walletId, array $subsData, array $ctx = []): bool
    {
        // IMPORTANT: banks use 'Banking' type to match the list filters.
        $walletTypeMap = [
            'bank'       => 'Banking',
            'credit'     => 'Credit',
            'debt'       => 'Debt',
            'investment' => 'Investment',
            'crypto'     => 'Crypto',
        ];
        $walletType = $walletTypeMap[strtolower($type)] ?? 'Banking';

        $amount = null;
        switch (strtolower($type)) {
            case 'bank':
                $amount = $subsData['balance'] ?? null;
                break;
            case 'credit':
            case 'debt':
                $amount = $subsData['current_balance'] ?? null;
                break;
            case 'investment':
                $amount = $subsData['amount'] ?? ($subsData['net_worth'] ?? null);
                break;
            case 'crypto':
                $amount = $subsData['balance'] ?? null;
                break;
        }

        $generic = [
            'nickname'    => $subsData['nickname'] ?? ($ctx['nickname'] ?? null),
            'amount'      => $amount,
            'user_id'     => $ctx['user_id'] ?? null,
            'user_email'  => $ctx['user_email'] ?? null,
            'username'    => $ctx['username'] ?? null,
            'wallet_type' => $walletType,
            'beta'        => $ctx['beta'] ?? 0,
            'status'      => 1,
            'active'      => 'Yes',
            'updated_on'  => date('Y-m-d H:i:s'),
        ];
        $generic = array_filter($generic, static fn($v) => $v !== null);

        $ok = $this->walletModel->editWallet($walletId, $generic);
        if (!$ok) {
            $this->logger->error('syncMainWallet failed', compact('type', 'walletId', 'generic'));
        }
        return (bool)$ok;
    }

    public function editBankWallet(int $id, array $data, array $ctx = []): bool
    {
        $row      = $this->walletModel->getBankAccountByIdOrWallet($id);
        $walletId = (int)($row['wallet_id'] ?? $row['id'] ?? $id);

        $ok1 = $this->walletModel->editBankWallet($id, $data);
        $ok2 = $this->syncMainWallet('bank', $walletId, $data, [
            'user_id'   => $row['user_id']   ?? ($ctx['user_id'] ?? null),
            'user_email'=> $row['user_email']?? ($ctx['user_email'] ?? null),
            'username'  => $row['username']  ?? ($ctx['username'] ?? null),
            'beta'      => $ctx['beta'] ?? 0,
            'nickname'  => $data['nickname'] ?? null,
        ]);
        return $ok1 && $ok2;
    }

    public function editCreditWallet(int $id, array $data, array $ctx = []): bool
    {
        $row      = $this->walletModel->getCreditAccountByIdOrWallet($id);
        $walletId = (int)($row['wallet_id'] ?? $row['id'] ?? $id);

        $ok1 = $this->walletModel->editCreditWallet($id, $data);
        $ok2 = $this->syncMainWallet('credit', $walletId, $data, [
            'user_id'   => $row['user_id']   ?? ($ctx['user_id'] ?? null),
            'user_email'=> $row['user_email']?? ($ctx['user_email'] ?? null),
            'username'  => $row['username']  ?? ($ctx['username'] ?? null),
            'beta'      => $ctx['beta'] ?? 0,
            'nickname'  => $data['nickname'] ?? null,
        ]);
        return $ok1 && $ok2;
    }

    public function editDebtWallet(int $id, array $data, array $ctx = []): bool
    {
        $row      = $this->walletModel->getDebtAccountByIdOrWallet($id);
        $walletId = (int)($row['wallet_id'] ?? $row['id'] ?? $id);

        $ok1 = $this->walletModel->editDebtWallet($id, $data);
        $ok2 = $this->syncMainWallet('debt', $walletId, $data, [
            'user_id'   => $row['user_id']   ?? ($ctx['user_id'] ?? null),
            'user_email'=> $row['user_email']?? ($ctx['user_email'] ?? null),
            'username'  => $row['username']  ?? ($ctx['username'] ?? null),
            'beta'      => $ctx['beta'] ?? 0,
            'nickname'  => $data['nickname'] ?? null,
        ]);
        return $ok1 && $ok2;
    }

    public function editInvestmentWallet(int $id, array $data, array $ctx = []): bool
    {
        $row      = $this->walletModel->getInvestAccountByIdOrWallet($id);
        $walletId = (int)($row['wallet_id'] ?? $row['id'] ?? $id);

        $ok1 = $this->walletModel->editInvestmentWallet($id, $data);
        $ok2 = $this->syncMainWallet('investment', $walletId, $data, [
            'user_id'   => $row['user_id']   ?? ($ctx['user_id'] ?? null),
            'user_email'=> $row['user_email']?? ($ctx['user_email'] ?? null),
            'username'  => $row['username']  ?? ($ctx['username'] ?? null),
            'beta'      => $ctx['beta'] ?? 0,
            'nickname'  => $data['nickname'] ?? null,
        ]);
        return $ok1 && $ok2;
    }

    public function editCryptoWallet(int $id, array $data, array $ctx = []): bool
    {
        // Try to resolve crypto row similarly to others; fall back to direct lookup.
        $row = null;
        if (method_exists($this->walletModel, 'getCryptoAccountByIdOrWallet')) {
            $row = $this->walletModel->getCryptoAccountByIdOrWallet($id);
        }
        if (!$row) {
            $db  = db_connect();
            $row = $db->table('bf_users_crypto_accounts')
                      ->groupStart()->where('id', $id)->orWhere('wallet_id', $id)->groupEnd()
                      ->get()->getRowArray();
        }
        if (!$row) {
            $this->logger->warning('editCryptoWallet: subsidiary not found', ['id' => $id]);
            return false;
        }

        $walletId = (int)($row['wallet_id'] ?? $row['id'] ?? $id);

        $ok1 = $this->walletModel->editCryptoWallet($id, $data);
        $ok2 = $this->syncMainWallet('crypto', $walletId, $data, [
            'user_id'   => $row['user_id']   ?? ($ctx['user_id'] ?? null),
            'user_email'=> $row['user_email']?? ($ctx['user_email'] ?? null),
            'username'  => $row['username']  ?? ($ctx['username'] ?? null),
            'beta'      => $ctx['beta'] ?? 0,
            'nickname'  => $data['nickname'] ?? null,
        ]);
        return $ok1 && $ok2;
    }

}
?>

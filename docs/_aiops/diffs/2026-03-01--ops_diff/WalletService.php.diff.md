# AIOps Diff Report

Generated: 2026-03-01 02:13:09 UTC  
File A: app/Services/WalletService.php  
File B: docs/Github/temporary/phase1_wallet_hardening/WalletService.php  

SHA256 A: 9a022c539f5063b007263e6d326177434a4fa981ea64716af821336625c30120  
SHA256 B: ce63e5049a1fc5b7f042e88f2aedc145d80a16cd35e4b711cf178d128e3ee224  

Risk Score: CRITICAL

---

## Unified Diff

```diff
--- app/Services/WalletService.php
+++ docs/Github/temporary/phase1_wallet_hardening/WalletService.php
@@ @@
 <?php
 
+declare(strict_types=1);
+
 namespace App\Services;
 
-use Config\{SiteSettings};
-use App\Libraries\{BaseLoader};
-use App\Models\{AccountsModel, WalletModel, TransactionModel};
-use App\Services\UserService;
-use DateTime;
-use Exception;
-use Psr\Log\LoggerInterface; // Assuming you use a logger
+use RuntimeException;
+use Throwable;
 
+/**
+ * Phase 1 hardened service patch for atomic wallet mutations.
+ * Source target: app/Services/WalletService.php
+ */
 class WalletService
 {
-
-    protected $siteSettings;
-    protected $request;
-    protected $session;
-    protected $logger;
-    protected $walletModel;
-    protected $accountsModel;
-    protected $transactionModel;
-    protected $userService;
-
-    public function __construct(LoggerInterface $logger, WalletModel $walletModel)
-    {
-        // Initialize config, session, request, models, and logger
-        $this->siteSettings = config('SiteSettings');
-        $this->request = service('request');
-        $this->session = service('session');
-        $this->logger = $logger;
-        $this->walletModel = $walletModel;
-        $this->accountsModel = new AccountsModel();
-        $this->transactionModel = new TransactionModel();
-        $this->logger = $logger;
-
-        // Initialize UserService with correct parameters
-        $this->userService = new UserService($this->siteSettings, $this->session->get('user_id'), $this->request);
-    }
-
     /**
-     * Normalize & whitelist payload for a given account type.
-     * $type: bank|credit|debt|investment|crypto
+     * Migration note:
+     * Ensure unique idempotency protection on ledger transaction id:
+     * ALTER TABLE bf_users_wallet_transactions
+     *   ADD UNIQUE KEY uq_wallet_txn_transaction_id (transaction_id);
      */
-    public function prepareAccountData(array $payload, string $type): array
+
+    public function isTransactionSettled(string $transactionId): bool
     {
-        $type = strtolower($type);
-        $clean = static function ($v) {
-            if (is_string($v)) return trim($v);
-            return $v;
-        };
-        $nickname = $clean($payload['nickname'] ?? ($payload['accountNickname'] ?? null));
+        $transactionId = trim($transactionId);
+        if ($transactionId === '') {
+            return false;
+        }
 
-        switch ($type) {
-            case 'bank':
-                $map = [
-                    'bank_name'          => $payload['bank_name'] ?? $payload['accountBank'] ?? null,
-                    'account_type'       => $payload['account_type'] ?? $payload['accountTypeText'] ?? null,
-                    'account_number'     => $payload['account_number'] ?? null,
-                    'routing_number'     => $payload['routing_number'] ?? null,
-                    'bank_account_owner' => $payload['bank_account_owner'] ?? null,
-                    'balance'            => $payload['balance'] ?? $payload['accountBalance'] ?? null,
-                    'nickname'           => $nickname,
-                ];
-                break;
+        $row = db_connect()->table('bf_users_wallet_transactions')
+            ->where('transaction_id', $transactionId)
+            ->where('status', 'Completed')
+            ->get()
+            ->getRowArray();
 
-            case 'credit':
-                $map = [
-                    'bank_name'        => $payload['bank_name'] ?? null,
-                    'account_number'   => $payload['account_number'] ?? null,
-                    'nickname'         => $nickname,
-                    'credit_limit'     => $payload['credit_limit'] ?? $payload['accountCreditLimit'] ?? null,
-                    'current_balance'  => $payload['current_balance'] ?? $payload['accountCurrentBalance'] ?? null,
-                    'available_balance'=> $payload['available_balance'] ?? $payload['accountAvailableBalance'] ?? null,
-                    'credit_status'    => $payload['credit_status'] ?? $payload['accountCreditStatus'] ?? null,
-                    'due_date'         => $payload['due_date'] ?? $payload['accountDueDate'] ?? null,
-                    'payment_due'      => $payload['payment_due'] ?? $payload['accountPaymentDue'] ?? null,
-                    'interest_rate'    => $payload['interest_rate'] ?? $payload['accountInterestRate'] ?? null,
-                ];
-                break;
-
-            case 'debt':
-                $map = [
-                    'account_status'   => $payload['account_status'] ?? $payload['accountStatus'] ?? null,
-                    'account_type'     => $payload['account_type'] ?? $payload['accountSourceType'] ?? null,
-                    'debtor'           => $payload['debtor'] ?? $payload['accountDebtor'] ?? null,
-                    'nickname'         => $nickname,
-                    'account_number'   => $payload['account_number'] ?? null,
-                    'due_date'         => $payload['due_date'] ?? $payload['accountDueDate'] ?? null,
-                    'credit_limit'     => $payload['credit_limit'] ?? $payload['accountCreditLimit'] ?? null,
-                    'current_balance'  => $payload['current_balance'] ?? $payload['accountCurrentBalance'] ?? null,
-                    'available_balance'=> $payload['available_balance'] ?? $payload['accountAvailableBalance'] ?? null,
-                    'monthly_payment'  => $payload['monthly_payment'] ?? $payload['accountMonthlyPayment'] ?? null,
-                    'interest_rate'    => $payload['interest_rate'] ?? $payload['accountInterestRate'] ?? null,
-                ];
-                break;
-
-            case 'investment':
-                $map = [
-                    'nickname'        => $nickname,
-                    'broker'          => $payload['broker'] ?? $payload['accountBroker'] ?? null,
-                    'account_number'  => $payload['account_number'] ?? null,
-                    'amount'          => $payload['amount'] ?? $payload['accountAmount'] ?? null,
-                    'initial_value'   => $payload['initial_value'] ?? $payload['accountInitialValue'] ?? null,
-                    'available_funds' => $payload['available_funds'] ?? $payload['accountAvailableFunds'] ?? null,
-                    'net_worth'       => $payload['net_worth'] ?? $payload['accountNetWorth'] ?? null,
-                ];
-                break;
-
-            case 'crypto':
-                $map = [
-                    'nickname'       => $nickname,
-                    'account_number' => $payload['account_number'] ?? null,
-                    'balance'        => $payload['balance'] ?? null,
-                ];
-                break;
-
-            default:
-                $map = [];
-        }
-
-        $filtered = array_filter($map, static fn ($v) => $v !== null);
-        log_message('debug', 'Prepared data for {t}: {d}', ['t' => $type, 'd' => print_r($filtered, true)]);
-        return $filtered;
+        return ! empty($row);
     }
 
-    /* ----------------------- CREATE (MAIN + SUBSIDIARY) ----------------------- */
-
-    public function addBankWallet(array $accountData): array
+    public function processDeposit(int $walletId, float $amount, string $currency, int $userId, ?string $transactionRef = null): array
     {
-        $db  = db_connect();
-        $db->transStart();
-        $now = date('Y-m-d H:i:s');
-
-        // Normalize credentials for storage
-        $provider    = $accountData['provider']    ?? null;
-        $credentials = $accountData['credentials'] ?? null;
-        if (is_array($credentials)) {
-            $credentials = json_encode($credentials, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
+        $currency = strtoupper(trim($currency));
+        $transactionRef = trim((string) ($transactionRef ?? ''));
+        if ($transactionRef === '') {
+            $transactionRef = 'dep_' . uniqid('', true);
         }
 
-        // Main wallet row
-        $walletRow = [
-            'status'      => 1,
-            'active'      => 1,
-            'deleted'     => 0,
-            'beta'        => ($accountData['beta'] ?? 'No') === 'Yes' ? 1 : 0,
-            'user_id'     => (int)($accountData['user_id'] ?? 0),
-            'user_email'  => $accountData['user_email'] ?? null,
-            'username'    => $accountData['username'] ?? null,
-            'wallet_type' => 'Banking',
-            'amount'      => (float)($accountData['balance'] ?? 0),
-            'nickname'    => $accountData['nickname'] ?? null,
-            'broker'      => $accountData['bank_name'] ?? null,
-            'provider'    => $provider,           // NEW
-            'credentials' => $credentials,        // NEW (JSON string or null)
-            'created_on'  => $now,
-            'modified_on' => $now,
-        ];
-
-        $walletId = $this->walletModel->addWalletReturnId($walletRow);
-
-        // Subsidiary bank row
-        $bankRow = [
-            'status'            => 1,
-            'deleted'           => 0,
-            'user_id'           => (int)($accountData['user_id'] ?? 0),
-            'user_email'        => $accountData['user_email'] ?? null,
-            'username'          => $accountData['username'] ?? null,
-            'wallet_id'         => $walletId,
-            'bank_name'         => $accountData['bank_name'] ?? null,
-            'account_type'      => $accountData['account_type'] ?? null,
-            'account_number'    => $accountData['account_number'] ?? null,
-            'routing_number'    => $accountData['routing_number'] ?? null,
-            'bank_account_owner'=> $accountData['bank_account_owner'] ?? null,
-            'balance'           => (float)($accountData['balance'] ?? 0),
-            'nickname'          => $accountData['nickname'] ?? null,
-            'created_on'        => $now,
-            'updated_on'        => $now,
-        ];
-
-        $accountId = $this->walletModel->addBankWalletReturnId($bankRow);
-
-        $db->transComplete();
-        if ($db->transStatus() === false) {
-            throw new \RuntimeException('Failed to add bank wallet.');
+        if ($this->isTransactionSettled($transactionRef)) {
+            return ['status' => 'already_settled', 'transaction_id' => $transactionRef];
         }
-        return ['wallet_id' => $walletId, 'account_id' => $accountId];
-    }
 
+        $db = db_connect();
 
-    public function addCreditWallet($accountData): array
-    {
-        $db  = db_connect();
-        $db->transStart();
+        try {
+            $db->transStart();
 
-        $now      = date('Y-m-d H:i:s');
-        $amount   = isset($accountData['current_balance']) ? (float)$accountData['current_balance'] : 0.0; // liabilities show negative in UI
-        $provider = $accountData['bank_name'] ?? null;
+            $wallet = $db->query('SELECT * FROM bf_users_wallet WHERE id = ? FOR UPDATE', [$walletId])->getRowArray();
+            if (! $wallet) {
+                throw new RuntimeException('Wallet not found for deposit.');
+            }
 
-        $walletRow = [
-            'status'      => 1,
-            'active'      => 1,
-            'deleted'     => 0,
-            'beta'        => ($accountData['beta'] ?? 'No') === 'Yes' ? 1 : 0,
-            'user_id'     => (int)($accountData['user_id'] ?? 0),
-            'user_email'  => $accountData['user_email'] ?? null,
-            'username'    => $accountData['username'] ?? null,
-            'wallet_type' => 'Credit',
-            'amount'      => $amount,
-            'nickname'    => $accountData['nickname'] ?? null,
-            'broker'      => $provider,
-            'created_on'  => $now,
-            'modified_on' => $now,
-        ];
-        $walletId = $this->walletModel->addWalletReturnId($walletRow);
+            $db->table('bf_users_wallet_transactions')->insert([
+                'transaction_id' => $transactionRef,
+                'status' => 'Pending',
+                'active' => 'No',
+                'user_id' => $userId,
+                'wallet_id' => $walletId,
+                'trans_type' => 'Deposit',
+                'currency' => $currency,
+                'amount' => $amount,
+                'type' => 'Deposit',
+                'unix_timestamp' => time(),
+                'submitted_date' => date('Y-m-d H:i:s'),
+            ]);
 
-        $row = [
-            'status'            => 1,
-            'deleted'           => 0,
-            'user_id'           => (int)($accountData['user_id'] ?? 0),
-            'user_email'        => $accountData['user_email'] ?? null,
-            'username'          => $accountData['username'] ?? null,
-            'wallet_id'         => $walletId,
-            'bank_name'         => $accountData['bank_name'] ?? null,
-            'account_number'    => $accountData['account_number'] ?? null,
-            'nickname'          => $accountData['nickname'] ?? null,
-            'credit_limit'      => $accountData['credit_limit'] ?? null,
-            'current_balance'   => $accountData['current_balance'] ?? null,
-            'available_balance' => $accountData['available_balance'] ?? null,
-            'credit_status'     => $accountData['credit_status'] ?? null,
-            'due_date'          => $accountData['due_date'] ?? null,
-            'payment_due'       => $accountData['payment_due'] ?? null,
-            'interest_rate'     => $accountData['interest_rate'] ?? null,
-            'created_on'        => $now,
-            'updated_on'        => $now,
-        ];
-        $accountId = $this->walletModel->addCreditWallet($row);
+            $db->table('bf_users_wallet')
+                ->set('amount', 'amount + ' . $db->escape($amount), false)
+                ->where('id', $walletId)
+                ->update();
 
-        $db->transComplete();
-        if ($db->transStatus() === false) {
-            throw new \RuntimeException('Failed to add credit wallet.');
-        }
-        return ['wallet_id' => $walletId, 'account_id' => (int)$accountId];
-    }
+            $db->table('bf_users_wallet_transactions')
+                ->where('transaction_id', $transactionRef)
+                ->update([
+                    'status' => 'Completed',
+                    'active' => 'Yes',
+                    'deposit_date' => date('Y-m-d H:i:s'),
+                ]);
 
-    public function addDebtWallet($accountData): array
-    {
-        $db  = db_connect();
-        $db->transStart();
+            $db->transComplete();
 
-        $now      = date('Y-m-d H:i:s');
-        $amount   = isset($accountData['current_balance']) ? (float)$accountData['current_balance'] : 0.0;
-        $provider = $accountData['debtor'] ?? null;
+            if (! $db->transStatus()) {
+                throw new RuntimeException('Deposit transaction failed during commit.');
+            }
 
-        $walletRow = [
-            'status'      => 1,
-            'active'      => 1,
-            'deleted'     => 0,
-            'beta'        => ($accountData['beta'] ?? 'No') === 'Yes' ? 1 : 0,
-            'user_id'     => (int)($accountData['user_id'] ?? 0),
-            'user_email'  => $accountData['user_email'] ?? null,
-            'username'    => $accountData['username'] ?? null,
-            'wallet_type' => 'Debt',
-            'amount'      => $amount,
-            'nickname'    => $accountData['nickname'] ?? null,
-            'broker'      => $provider,
-            'created_on'  => $now,
-            'modified_on' => $now,
-        ];
-        $walletId = $this->walletModel->addWalletReturnId($walletRow);
-
-        $row = [
-            'status'            => 1,
-            'deleted'           => 0,
-            'user_id'           => (int)($accountData['user_id'] ?? 0),
-            'user_email'        => $accountData['user_email'] ?? null,
-            'username'          => $accountData['username'] ?? null,
-            'wallet_id'         => $walletId,
-            'account_status'    => $accountData['account_status'] ?? null,
-            'account_type'      => $accountData['account_type'] ?? null,
-            'debtor'            => $accountData['debtor'] ?? null,
-            'nickname'          => $accountData['nickname'] ?? null,
-            'account_number'    => $accountData['account_number'] ?? null,
-            'due_date'          => $accountData['due_date'] ?? null,
-            'credit_limit'      => $accountData['credit_limit'] ?? null,
-            'current_balance'   => $accountData['current_balance'] ?? null,
-            'available_balance' => $accountData['available_balance'] ?? null,
-            'monthly_payment'   => $accountData['monthly_payment'] ?? null,
-            'interest_rate'     => $accountData['interest_rate'] ?? null,
-            'created_on'        => $now,
-            'updated_on'        => $now,
-        ];
-        $accountId = $this->walletModel->addDebtWallet($row);
-
-        $db->transComplete();
-        if ($db->transStatus() === false) {
-            throw new \RuntimeException('Failed to add debt wallet.');
+            return ['status' => 'success', 'transaction_id' => $transactionRef];
+        } catch (Throwable $e) {
+            if ($db->transStatus() !== false) {
+                $db->transRollback();
+            }
+            log_message('error', 'WalletService::processDeposit failed: {msg}', ['msg' => $e->getMessage()]);
+            throw $e;
         }
-        return ['wallet_id' => $walletId, 'account_id' => (int)$accountId];
     }
 
-    public function addInvestmentWallet($accountData): array
+    public function processWithdrawal(int $walletId, float $amount, string $currency, int $userId, ?string $transactionRef = null): array
     {
-        $db  = db_connect();
-        $db->transStart();
-
-        $now      = date('Y-m-d H:i:s');
-        $amount   = isset($accountData['amount']) ? (float)$accountData['amount'] : (float)($accountData['net_worth'] ?? 0);
-        $provider = $accountData['broker'] ?? null;
-
-        $walletRow = [
-            'status'      => 1,
-            'active'      => 1,
-            'deleted'     => 0,
-            'beta'        => ($accountData['beta'] ?? 'No') === 'Yes' ? 1 : 0,
-            'user_id'     => (int)($accountData['user_id'] ?? 0),
-            'user_email'  => $accountData['user_email'] ?? null,
-            'username'    => $accountData['username'] ?? null,
-            'wallet_type' => 'Investment',
-            'amount'      => $amount,
-            'nickname'    => $accountData['nickname'] ?? null,
-            'broker'      => $provider,
-            'created_on'  => $now,
-            'modified_on' => $now,
-        ];
-        $walletId = $this->walletModel->addWalletReturnId($walletRow);
-
-        $row = [
-            'status'          => 1,
-            'deleted'         => 0,
-            'user_id'         => (int)($accountData['user_id'] ?? 0),
-            'user_email'      => $accountData['user_email'] ?? null,
-            'username'        => $accountData['username'] ?? null,
-            'wallet_id'       => $walletId,
-            'nickname'        => $accountData['nickname'] ?? null,
-            'broker'          => $accountData['broker'] ?? null,
-            'account_number'  => $accountData['account_number'] ?? null,
-            'amount'          => $accountData['amount'] ?? null,
-            'initial_value'   => $accountData['initial_value'] ?? null,
-            'available_funds' => $accountData['available_funds'] ?? null,
-            'net_worth'       => $accountData['net_worth'] ?? null,
-            'created_on'      => $now,
-            'updated_on'      => $now,
-        ];
-        $accountId = $this->walletModel->addInvestmentWallet($row);
-
-        $db->transComplete();
-        if ($db->transStatus() === false) {
-            throw new \RuntimeException('Failed to add investment wallet.');
+        $currency = strtoupper(trim($currency));
+        $transactionRef = trim((string) ($transactionRef ?? ''));
+        if ($transactionRef === '') {
+            $transactionRef = 'wd_' . uniqid('', true);
         }
-        return ['wallet_id' => $walletId, 'account_id' => (int)$accountId];
-    }
 
-    public function addCryptoWallet($accountData): array
-    {
-        $db  = db_connect();
-        $db->transStart();
-
-        $now    = date('Y-m-d H:i:s');
-        $amount = isset($accountData['balance']) ? (float)$accountData['balance'] : 0.0;
-
-        $walletRow = [
-            'status'      => 1,
-            'active'      => 1,
-            'deleted'     => 0,
-            'beta'        => ($accountData['beta'] ?? 'No') === 'Yes' ? 1 : 0,
-            'user_id'     => (int)($accountData['user_id'] ?? 0),
-            'user_email'  => $accountData['user_email'] ?? null,
-            'username'    => $accountData['username'] ?? null,
-            'wallet_type' => 'Crypto',
-            'amount'      => $amount,
-            'nickname'    => $accountData['nickname'] ?? null,
-            'created_on'  => $now,
-            'modified_on' => $now,
-        ];
-        $walletId = $this->walletModel->addWalletReturnId($walletRow);
-
-        // NB: ensure your WalletModel::addCryptoWallet targets bf_users_crypto_accounts
-        $row = [
-            'status'         => 1,
-            'deleted'        => 0,
-            'user_id'        => (int)($accountData['user_id'] ?? 0),
-            'user_email'     => $accountData['user_email'] ?? null,
-            'username'       => $accountData['username'] ?? null,
-            'wallet_id'      => $walletId,
-            'nickname'       => $accountData['nickname'] ?? null,
-            'account_number' => $accountData['account_number'] ?? null,
-            'balance'        => $accountData['balance'] ?? null,
-            'created_on'     => $now,
-            'updated_on'     => $now,
-        ];
-        $accountId = $this->walletModel->addCryptoWallet($row);
-
-        $db->transComplete();
-        if ($db->transStatus() === false) {
-            throw new \RuntimeException('Failed to add crypto wallet.');
+        if ($this->isTransactionSettled($transactionRef)) {
+            return ['status' => 'already_settled', 'transaction_id' => $transactionRef];
         }
-        return ['wallet_id' => $walletId, 'account_id' => (int)$accountId];
-    }
 
-    // 1. Add New Wallet
-    public function addWallet($walletData)
-    {
-        return $this->walletModel->addWallet($walletData);
-    }
+        $db = db_connect();
 
-    /* ------------------------------ DELETE FLOWS ------------------------------ */
+        try {
+            $db->transStart();
 
-    // Resolve subsidiary by either primary key id or wallet_id, then mark subsidiary deleted and main deleted.
-    public function deleteBankWallet($walletId): bool
-    {
-        $row = $this->walletModel->getBankAccountByIdOrWallet((int)$walletId);
-        $subsId = (int)($row['id'] ?? 0);
-        $okSub  = $subsId ? $this->walletModel->deleteBankWallet($subsId) : true;
+            $wallet = $db->query('SELECT * FROM bf_users_wallet WHERE id = ? FOR UPDATE', [$walletId])->getRowArray();
+            if (! $wallet) {
+                throw new RuntimeException('Wallet not found for withdrawal.');
+            }
 
-        $okMain = $this->walletModel->editWallet((int)$walletId, [
-            'active'     => 0,
-            'deleted'    => 1,
-            'updated_on' => date('Y-m-d H:i:s'),
-        ]);
+            $currentAmount = (float) ($wallet['amount'] ?? 0);
+            if ($currentAmount < $amount) {
+                throw new RuntimeException('Insufficient wallet balance for withdrawal.');
+            }
 
-        return $okSub && $okMain;
-    }
+            $db->table('bf_users_wallet_transactions')->insert([
+                'transaction_id' => $transactionRef,
+                'status' => 'Pending',
+                'active' => 'No',
+                'user_id' => $userId,
+                'wallet_id' => $walletId,
+                'trans_type' => 'Withdraw',
+                'currency' => $currency,
+                'amount' => $amount,
+                'type' => 'Withdraw',
+                'unix_timestamp' => time(),
+                'submitted_date' => date('Y-m-d H:i:s'),
+            ]);
 
-    public function deleteCreditWallet($walletId): bool
-    {
-        $row = $this->walletModel->getCreditAccountByIdOrWallet((int)$walletId);
-        $subsId = (int)($row['id'] ?? 0);
-        $okSub  = $subsId ? $this->walletModel->deleteCreditWallet($subsId) : true;
+            $db->table('bf_users_wallet')
+                ->set('amount', 'amount - ' . $db->escape($amount), false)
+                ->where('id', $walletId)
+                ->update();
 
-        $okMain = $this->walletModel->editWallet((int)$walletId, [
-            'active'     => 0,
-            'deleted'    => 1,
-            'updated_on' => date('Y-m-d H:i:s'),
-        ]);
+            $db->table('bf_users_wallet_transactions')
+                ->where('transaction_id', $transactionRef)
+                ->update([
+                    'status' => 'Completed',
+                    'active' => 'Yes',
+                    'withdraw_date' => date('Y-m-d H:i:s'),
+                ]);
 
-        return $okSub && $okMain;
-    }
+            $db->transComplete();
 
-    public function deleteDebtWallet($walletId): bool
-    {
-        $row = $this->walletModel->getDebtAccountByIdOrWallet((int)$walletId);
-        $subsId = (int)($row['id'] ?? 0);
-        $okSub  = $subsId ? $this->walletModel->deleteDebtWallet($subsId) : true;
+            if (! $db->transStatus()) {
+                throw new RuntimeException('Withdrawal transaction failed during commit.');
+            }
 
-        $okMain = $this->walletModel->editWallet((int)$walletId, [
-            'active'     => 0,
-            'deleted'    => 1,
-            'updated_on' => date('Y-m-d H:i:s'),
-        ]);
-
-        return $okSub && $okMain;
+            return ['status' => 'success', 'transaction_id' => $transactionRef];
+        } catch (Throwable $e) {
+            if ($db->transStatus() !== false) {
+                $db->transRollback();
+            }
+            log_message('error', 'WalletService::processWithdrawal failed: {msg}', ['msg' => $e->getMessage()]);
+            throw $e;
+        }
     }
 
-    public function deleteInvestmentWallet($walletId): bool
-    {
-        $row = $this->walletModel->getInvestAccountByIdOrWallet((int)$walletId);
-        $subsId = (int)($row['id'] ?? 0);
-        $okSub  = $subsId ? $this->walletModel->deleteInvestmentWallet($subsId) : true;
+    /**
+     * Single atomic transfer with row-level lock on both wallets.
+     */
+    public function processTransfer(
+        int $fromWalletId,
+        int $toWalletId,
+        float $amount,
+        string $currency,
+        int $userId,
+        ?string $transactionRef = null
+    ): array {
+        $currency = strtoupper(trim($currency));
+        $transactionRef = trim((string) ($transactionRef ?? ''));
+        if ($transactionRef === '') {
+            $transactionRef = 'xfer_' . uniqid('', true);
+        }
 
-        $okMain = $this->walletModel->editWallet((int)$walletId, [
-            'active'     => 0,
-            'deleted'    => 1,
-            'updated_on' => date('Y-m-d H:i:s'),
-        ]);
+        $outRef = $transactionRef . '_out';
+        $inRef  = $transactionRef . '_in';
 
-        return $okSub && $okMain;
-    }
-
-    public function deleteCryptoWallet($walletId): bool
-    {
-        // Try model helper if it exists, else raw lookup
-        $row = null;
-        if (method_exists($this->walletModel, 'getCryptoAccountByIdOrWallet')) {
-            $row = $this->walletModel->getCryptoAccountByIdOrWallet((int)$walletId);
+        if ($this->isTransactionSettled($outRef) && $this->isTransactionSettled($inRef)) {
+            return [
+                'status' => 'already_settled',
+                'out_transaction_id' => $outRef,
+                'in_transaction_id' => $inRef,
+            ];
         }
-        if (!$row) {
-            $db  = db_connect();
-            $row = $db->table('bf_users_crypto_accounts')
-                      ->groupStart()->where('id', (int)$walletId)->orWhere('wallet_id', (int)$walletId)->groupEnd()
-                      ->get()->getRowArray();
-        }
-        $subsId = (int)($row['id'] ?? 0);
-        $okSub  = $subsId && method_exists($this->walletModel, 'deleteCryptoWallet')
-            ? $this->walletModel->deleteCryptoWallet($subsId)
-            : true;
 
-        $okMain = $this->walletModel->editWallet((int)$walletId, [
-            'active'     => 0,
-            'deleted'    => 1,
-            'updated_on' => date('Y-m-d H:i:s'),
-        ]);
-
-        return $okSub && $okMain;
-    }
-
-    // Legacy soft-delete API used elsewhere
-    public function softDeleteWallet(string $type, int $id): bool
-    {
-        switch (strtolower($type)) {
-            case 'bank':
-                return $this->deleteBankWallet($id);
-            case 'credit':
-                return $this->deleteCreditWallet($id);
-            case 'debt':
-                return $this->deleteDebtWallet($id);
-            case 'investment':
-                return $this->deleteInvestmentWallet($id);
-            case 'crypto':
-                return $this->deleteCryptoWallet($id);
+        if ($fromWalletId === $toWalletId) {
+            throw new RuntimeException('Source and destination wallets must differ.');
         }
-        return false;
-    }
-    
-    // 3. Delete Wallet
-    public function deleteWallet($accountId)
-    {
-        return $this->walletModel->deleteWallet($accountId);
-    }
 
-    // // 5. Edit Bank Wallet
-    // public function editBankWallet($accountId, $accountData)
-    // {
-    //     log_message('debug', 'WalletService L66 - Submission Data - $accountId, $accountData: ' . $accountId . ' ' . print_r($accountData, true));
-    //     return $this->walletModel->editBankWallet($accountId, $accountData);
-    // }  
+        $db = db_connect();
 
-    // 2. Edit Wallet
-    public function editWallet($accountId, $walletData)
-    {
-        return $this->walletModel->editWallet($accountId, $walletData);
-    }
-    
-    public function logWalletDeletion($userId, $walletId, $accountType)
-    {
-        $this->logAuditTrail($userId, $walletId, 'delete', [
-            'account_type' => $accountType,
-            'timestamp' => date('Y-m-d H:i:s'),
-        ]);
-    }  
+        try {
+            $db->transStart();
 
-    // // 7. Edit Credit Wallet
-    // public function editCreditWallet($accountId, $accountData)
-    // {
-    //     return $this->walletModel->editCreditWallet($accountId, $accountData);
-    // }
+            $first = min($fromWalletId, $toWalletId);
+            $second = max($fromWalletId, $toWalletId);
 
-    // // 9. Edit Crypto Wallet
-    // public function editCryptoWallet($accountId, $accountData)
-    // {
-    //     return $this->walletModel->editCryptoWallet($accountId, $accountData);
-    // }
+            $db->query('SELECT * FROM bf_users_wallet WHERE id = ? FOR UPDATE', [$first]);
+            $db->query('SELECT * FROM bf_users_wallet WHERE id = ? FOR UPDATE', [$second]);
 
-    // // 11. Edit Debt Wallet
-    // public function editDebtWallet($accountId, $accountData)
-    // {
-    //     return $this->walletModel->editDebtWallet($accountId, $accountData);
-    // }
+            $fromWallet = $db->table('bf_users_wallet')->where('id', $fromWalletId)->get()->getRowArray();
+            $toWallet = $db->table('bf_users_wallet')->where('id', $toWalletId)->get()->getRowArray();
 
-    // // 11. Edit Debt Wallet
-    // public function editInvestmentWallet($accountId, $accountData)
-    // {
-    //     return $this->walletModel->editInvestmentWallet($accountId, $accountData);
-    // }
-    
-    // 10. Get User Wallets
-    public function getUserWallets($userId)
-    {
-        return $this->walletModel->getUserWallets($userId);
-    }
+            if (! $fromWallet || ! $toWallet) {
+                throw new RuntimeException('One or both wallets do not exist.');
+            }
 
-    // // 11. Deposit Funds to a Wallet
-    // public function depositFunds($walletId, $amount)
-    // {
-    //     if ($this->validateTransactionLimits($walletId, $amount)) {
-    //         $this->walletModel->addDeposit($walletId, $amount);
-    //         $this->logTransaction('Deposit', $walletId, $amount);
-    //         $this->notifyUser($walletId, 'Deposit was successful.');
-    //         return true;
-    //     }
+            $fromBalance = (float) ($fromWallet['amount'] ?? 0);
+            if ($fromBalance < $amount) {
+                throw new RuntimeException('Insufficient balance for transfer.');
+            }
 
-    //     return false; // Limit exceeded or validation failed
-    // }
+            $db->table('bf_users_wallet')->set('amount', 'amount - ' . $db->escape($amount), false)->where('id', $fromWalletId)->update();
+            $db->table('bf_users_wallet')->set('amount', 'amount + ' . $db->escape($amount), false)->where('id', $toWalletId)->update();
 
-    // // 12. Withdraw Funds from a Wallet
-    // public function withdrawFunds($walletId, $amount)
-    // {
-    //     // Logic to withdraw funds from the wallet
-    //     if ($amount < $this->walletModel->getWalletBalance($walletId)) {
-    //         $this->walletModel->addWithdraw($walletId, $amount);
-    //         $this->logTransaction('Withdrawal', $walletId, $amount);
-    //         $this->notifyUser($walletId, 'Withdrawal was successful.');
-    //         return true;
-    //     }
+            $now = date('Y-m-d H:i:s');
 
-    //     return false; // Insufficient funds
-    // }
+            // ledger row 1: withdrawal leg
+            $db->table('bf_users_wallet_transactions')->insert([
+                'transaction_id' => $outRef,
+                'status' => 'Completed',
+                'active' => 'Yes',
+                'user_id' => $userId,
+                'wallet_id' => $fromWalletId,
+                'trans_type' => 'Transfer Out',
+                'currency' => $currency,
+                'amount' => $amount,
+                'type' => 'Transfer',
+                'withdraw_date' => $now,
+                'unix_timestamp' => time(),
+                'submitted_date' => $now,
+            ]);
 
-    // 13. Handle Wallet Transactions
-    public function processTransaction($transactionData)
-    {
-        return $this->transactionModel->processTransaction($transactionData);
-    }
+            // ledger row 2: deposit leg
+            $db->table('bf_users_wallet_transactions')->insert([
+                'transaction_id' => $inRef,
+                'status' => 'Completed',
+                'active' => 'Yes',
+                'user_id' => $userId,
+                'wallet_id' => $toWalletId,
+                'trans_type' => 'Transfer In',
+                'currency' => $currency,
+                'amount' => $amount,
+                'type' => 'Transfer',
+                'deposit_date' => $now,
+                'unix_timestamp' => time(),
+                'submitted_date' => $now,
+            ]);
 
-    // 14. Fetch Wallet Transaction History
-    public function getWalletTransactionHistory($walletId)
-    {
-        return $this->walletModel->getTransactionHistory($walletId);
-    }
+            $db->transComplete();
 
-    // 15. Generate a New Wallet
-    public function generateWallet($userId, $walletData)
-    {
-        return $this->walletModel->createWallet($userId, $walletData);
-    }
+            if (! $db->transStatus()) {
+                throw new RuntimeException('Transfer transaction failed during commit.');
+            }
 
-    // 16. Customize a Wallet
-    public function customizeWallet($userId, $walletId, $customizationData)
-    {
-        return $this->walletModel->updateWallet($walletId, $customizationData);
-    }
-
-    // 17. Copy Wallet (Duplicate Wallet for a User)
-    public function copyWallet($walletId, $newWalletData)
-    {
-        return $this->walletModel->copyWallet($walletId, $newWalletData);
-    }
-
-    // 18. Prepare Wallet Data for Adding
-    public function prepareWalletData($json)
-    {
-        $walletData = [
-            'user_id' => $json['user_id'] ?? null,
-            'user_email' => $json['user_email'] ?? null,
-            'username' => $json['username'] ?? null,
-            'beta' => $json['beta'] ?? 'No',
-            'wallet_type' => $json['wallet_type'] ?? null,
-            'nickname' => $json['nickname'] ?? null,
-            'amount' => $json['amount'] ?? 0,
-            'created_on' => date('Y-m-d H:i:s'),
-        ];
-
-        switch ($json['wallet_type']) {
-            case 'Bank':
-                $walletData += [
-                    'bank_name' => $json['bank_name'] ?? null,
-                    'account_type' => $json['account_type'] ?? null,
-                    'account_number' => $json['account_number'] ?? null,
-                    'balance' => $json['balance'] ?? 0,
-                ];
-                break;
-            case 'Credit':
-                $walletData += [
-                    'credit_limit' => $json['credit_limit'] ?? 0,
-                    'current_balance' => $json['current_balance'] ?? 0,
-                    'available_balance' => $json['credit_limit'] - $json['current_balance'] ?? 0,
-                ];
-                break;
-            case 'Debt':
-                $walletData += [
-                    'debt_amount' => $json['debt_amount'] ?? 0,
-                    'monthly_payment' => $json['monthly_payment'] ?? 0,
-                    'creditor' => $json['creditor'] ?? null,
-                ];
-                break;
-            case 'Investment':
-                $walletData += [
-                    'investment_type' => $json['investment_type'] ?? null,
-                    'investment_amount' => $json['investment_amount'] ?? 0,
-                    'investment_date' => $json['investment_date'] ?? null,
-                    'symbol' => $json['symbol'] ?? null,
-                ];
-                break;
+            return [
+                'status' => 'success',
+                'out_transaction_id' => $outRef,
+                'in_transaction_id' => $inRef,
+            ];
+        } catch (Throwable $e) {
+            if ($db->transStatus() !== false) {
+                $db->transRollback();
+            }
+            log_message('error', 'WalletService::processTransfer failed: {msg}', ['msg' => $e->getMessage()]);
+            throw $e;
         }
-
-        return $walletData;
     }
 
-    // 19. Validate Required Fields for Wallet Data
-    public function validateRequiredFields($data)
-    {
-        $requiredFields = [
-            'beta', 'user_id', 'user_email', 'username',
-            'account_type', 'wallet_type', 'nickname',
-            'amount'
-        ];
-
-        foreach ($requiredFields as $field) {
-            if (!isset($data[$field]) || trim($data[$field]) === '') {
-                return false;
-            }
+    /**
+     * Atomic PayPal callback settlement via service layer.
+     */
+    public function processPayPalPurchaseCallback(
+        int $walletId,
+        float $amount,
+        string $currency,
+        int $userId,
+        string $transactionId,
+        string $purchaseIdentifier,
+        ?string $userEmail = null,
+        float $fees = 0.0
+    ): array {
+        $transactionId = trim($transactionId);
+        if ($transactionId === '') {
+            throw new RuntimeException('Missing callback transaction id.');
         }
 
-        return true;
-    }
-
-    // 22. Notify User
-    public function notifyUser($userId, $message)
-    {
-        $userInfo = $this->getuserService()->getUserAccountInfo($userId);
-        // Add logic to send notifications (email, SMS, in-app, etc.)
-    }
-
-    // 23. Reverse Transaction
-    public function reverseTransaction($transactionId)
-    {
-        $transactionData = $this->transactionModel->find($transactionId);
-
-        if ($transactionData) {
-            // Reverse transaction logic
-            $transactionData['status'] = 'Reversed';
-            return $this->transactionModel->update($transactionId, $transactionData);
+        if ($this->isTransactionSettled($transactionId)) {
+            return [
+                'status' => 'already_settled',
+                'transaction_id' => $transactionId,
+            ];
         }
 
-        return false;
-    }
+        $db = db_connect();
 
-    public function getConversionRate($fromCurrency, $toCurrency)
-    {
-        // Fetch current conversion rate from an API or service
-        return 1.0; // Placeholder
-    }
-
-    // 25. Error Handling and Logging
-    public function safeTransaction($operation, $walletId, $amount)
-    {
         try {
-            $this->logger->info("Processing {$operation} for wallet {$walletId} with amount {$amount}");
+            $db->transStart();
 
-            if ($operation === 'deposit') {
-                return $this->depositFunds($walletId, $amount);
-            } elseif ($operation === 'withdraw') {
-                return $this->withdrawFunds($walletId, $amount);
+            $wallet = $db->query('SELECT * FROM bf_users_wallet WHERE id = ? FOR UPDATE', [$walletId])->getRowArray();
+            if (! $wallet) {
+                throw new RuntimeException('Wallet not found for callback settlement.');
             }
 
-        } catch (Exception $e) {
-            $this->logger->error("Error processing {$operation} for wallet {$walletId}: {$e->getMessage()}");
-            return false; // Fail gracefully
-        }
-    }
-
-    /* ---------- deposits/withdrawals (align with WalletModel methods) -------- */
-
-    public function depositFunds($walletId, $amount, $currency = 'USD')
-    {
-        $convertedAmount = $this->handleCurrencyConversion($amount, $currency, 'USD');
-        if ($this->detectFraud($walletId, $convertedAmount)) {
-            return false;
-        }
-        if ($this->validateTransactionLimits($walletId, $convertedAmount)) {
-            // update main wallet amount
-            $this->walletModel->addTokensToWallet($walletId, $convertedAmount);
-            // optional: log transaction via TransactionModel or wallet transactions table
-            $this->logTransaction('Deposit', $walletId, $convertedAmount);
-            // audit trail (best-effort user id)
-            $userId = method_exists($this->walletModel, 'getUserIdFromWallet')
-                ? $this->walletModel->getUserIdFromWallet($walletId)
-                : null;
-            if ($userId) {
-                $this->logAuditTrail($userId, $walletId, 'deposit', ['amount' => $convertedAmount]);
+            $balance = (float) ($wallet['amount'] ?? 0);
+            if ($balance < $amount) {
+                throw new RuntimeException('Insufficient balance for callback settlement.');
             }
-            return true;
-        }
-        return false;
-    }
 
-    public function withdrawFunds($walletId, $amount, $currency = 'USD')
-    {
-        $convertedAmount = $this->handleCurrencyConversion($amount, $currency, 'USD');
-        if ($this->detectFraud($walletId, $convertedAmount)) {
-            return false;
-        }
-        // naive balance check—replace with your own get balance if available
-        // (or allow negative for liabilities if needed)
-        $this->walletModel->deductFunds($walletId, $convertedAmount);
-        $this->logTransaction('Withdrawal', $walletId, $convertedAmount);
-        $userId = method_exists($this->walletModel, 'getUserIdFromWallet')
-            ? $this->walletModel->getUserIdFromWallet($walletId)
-            : null;
-        if ($userId) {
-            $this->logAuditTrail($userId, $walletId, 'withdrawal', ['amount' => $convertedAmount]);
-        }
-        return true;
-    }
+            $db->table('bf_users_wallet')->set('amount', 'amount - ' . $db->escape($amount), false)->where('id', $walletId)->update();
 
-    public function logTransaction($type, $walletId, $amount)
-    {
-        $transactionData = [
-            'wallet_id'        => $walletId,
-            'transaction_type' => $type,
-            'amount'           => $amount,
-            'status'           => 'Completed',
-            'created_at'       => date('Y-m-d H:i:s'),
-        ];
-        return $this->transactionModel->insert($transactionData);
-    }
+            $db->table('bf_users_wallet_transactions')->insert([
+                'transaction_id' => $transactionId,
+                'status' => 'Completed',
+                'active' => 'Yes',
+                'user_id' => $userId,
+                'wallet_id' => $walletId,
+                'user_email' => $userEmail,
+                'trans_type' => 'MyMI Gold Purchase',
+                'currency' => strtoupper(trim($currency)),
+                'amount' => $amount,
+                'fees' => $fees,
+                'type' => 'Purchase',
+                'provider' => 'PayPal',
+                'label' => $purchaseIdentifier,
+                'withdraw_date' => date('Y-m-d H:i:s'),
+                'unix_timestamp' => time(),
+                'submitted_date' => date('Y-m-d H:i:s'),
+            ]);
 
-    public function validateTransactionLimits($walletId, $amount)
-    {
-        $dailyLimit   = 10000;
-        $totalForDay  = $this->transactionModel->where('wallet_id', $walletId)
-                                               ->where('DATE(created_at)', date('Y-m-d'))
-                                               ->selectSum('amount')->get()->getRow()->amount;
-        return ($totalForDay + $amount) <= $dailyLimit;
-    }
+            $db->transComplete();
 
-    public function logAuditTrail($userId, $walletId, $action, $details)
-    {
-        return $this->walletModel->logAuditTrail($userId, $walletId, $action, $details);
-    }
+            if (! $db->transStatus()) {
+                throw new RuntimeException('PayPal callback settlement failed during commit.');
+            }
 
-    /* --------------------- Provider link helpers (delegate) ------------------- */
-    protected function getuserService()
-    {
-        if ($this->userService === null) {
-            $this->userService = new \App\Modules\Users\Services\UserService();
+            return [
+                'status' => 'success',
+                'transaction_id' => $transactionId,
+            ];
+        } catch (Throwable $e) {
+            if ($db->transStatus() !== false) {
+                $db->transRollback();
+            }
+            log_message('error', 'WalletService::processPayPalPurchaseCallback failed: {msg}', ['msg' => $e->getMessage()]);
+            throw $e;
         }
-        return $this->userService;
     }
 
-    // 1. Two-Factor Authentication (2FA) for Withdrawals
-    public function initiateWithdrawalWith2FA($walletId, $amount, $currency = 'USD')
+    public function completeDeposit(string $transactionId): bool
     {
-        // Assuming 2FA is managed via another service
-        $convertedAmount = $this->handleCurrencyConversion($amount, $currency, 'USD');
-        if ($this->detectFraud($walletId, $convertedAmount)) {
+        $transactionId = trim($transactionId);
+        if ($transactionId === '') {
             return false;
         }
 
-        // Trigger 2FA before allowing the withdrawal
-        $userId = $this->walletModel->getUserIdFromWallet($walletId);
-        if ($this->getuserService()->trigger2FA($userId)) {
-            // After successful 2FA, proceed with withdrawal
-            if ($convertedAmount < $this->walletModel->getWalletBalance($walletId)) {
-                $this->walletModel->addWithdraw($walletId, $convertedAmount);
-                $this->logTransaction('Withdrawal', $walletId, $convertedAmount);
-                $this->notifyUser($userId, 'Withdrawal was successful.');
-                $this->logAuditTrail($userId, $walletId, 'withdrawal', ['amount' => $convertedAmount]);
-                return true;
-            }
-        }
-        return false;
-    }
-
-    // 2. Comprehensive Currency Conversion with External API Integration
-    public function handleCurrencyConversion($amount, $fromCurrency, $toCurrency)
-    {
-        // Assume we're using an external API service to get conversion rates
-        $conversionRate = $this->getLiveConversionRate($fromCurrency, $toCurrency); 
-        return $amount * $conversionRate;
-    }
-
-    public function getLiveConversionRate($fromCurrency, $toCurrency)
-    {
-        // Logic to retrieve live conversion rates from an external financial API
-        // Example: Call to a currency exchange rate API
-        try {
-            $apiUrl = "https://api.exchangeratesapi.io/latest?base={$fromCurrency}&symbols={$toCurrency}";
-            $response = file_get_contents($apiUrl);
-            $data = json_decode($response, true);
-            return $data['rates'][$toCurrency] ?? 1.0; // Default to 1.0 if not found
-        } catch (Exception $e) {
-            $this->logger->error("Failed to fetch conversion rate: " . $e->getMessage());
-            return 1.0; // Default conversion rate on failure
-        }
-    }
-
-    // 3. Real-Time Fraud Monitoring & Notification to Compliance Team
-    public function detectFraud($walletId, $amount)
-    {
-        $thresholdAmount = 10000;
-        $dailyLimit = 5;
-        $transactionCount = $this->transactionModel
-            ->where('wallet_id', $walletId)
-            ->where('DATE(created_at)', date('Y-m-d'))
-            ->countAllResults();
-
-        if ($amount > $thresholdAmount || $transactionCount >= $dailyLimit) {
-            $this->logger->warning("Suspicious activity detected for wallet {$walletId}");
-
-            // Notify compliance team about suspicious activity
-            $this->notifyComplianceTeam($walletId, $amount, 'Suspicious Activity');
-            
+        if ($this->isTransactionSettled($transactionId)) {
             return true;
         }
-        return false;
-    }
 
-    protected function notifyComplianceTeam($walletId, $amount, $reason)
-    {
-        // Logic to notify compliance team (could be email, slack, etc.)
-        $message = "Wallet ID: {$walletId} | Amount: {$amount} | Reason: {$reason}";
-        // Example: Send an email to the compliance team
-        $complianceEmail = "compliance@example.com";
-        mail($complianceEmail, "Fraud Alert", $message);
-    }
+        $db = db_connect();
+        $db->transStart();
 
-    // 4. Reporting for Compliance Audits
-    public function generateComplianceReport($walletId)
-    {
-        $transactions = $this->getWalletTransactionHistory($walletId);
-        $walletDetails = $this->walletModel->find($walletId);
-        $auditLogs = $this->logAuditTrail($walletId);
-        
-        // Compile data for audit
-        $reportData = [
-            'walletDetails' => $walletDetails,
-            'transactions' => $transactions,
-            'auditLogs' => $auditLogs
-        ];
+        $db->table('bf_users_wallet_transactions')
+            ->where('transaction_id', $transactionId)
+            ->update([
+                'status' => 'Completed',
+                'active' => 'Yes',
+                'deposit_date' => date('Y-m-d H:i:s'),
+            ]);
 
-        return $reportData; // This can be transformed into PDF or CSV for compliance
-    }
+        $db->transComplete();
 
-    // 5. Notifications for Large Transactions
-    public function notifyForLargeTransaction($walletId, $amount)
-    {
-        $threshold = 5000; // Example threshold for large transactions
-        if ($amount >= $threshold) {
-            $userId = $this->walletModel->getUserIdFromWallet($walletId);
-            $this->notifyUser($userId, "A large transaction of {$amount} was made from your wallet.");
-        }
+        return $db->transStatus();
     }
-
-    /**
-     * Upsert a wallet record for a broker/exchange provider.
-     * Normalizes how Robinhood/SnapTrade get stored as “wallets”.
-     *
-     * @return int wallet_id
-     */
-    public function upsertProviderWallet(int $userId, string $provider, string $label, array $credentials = []): int
-    {
-        $provider = strtolower($provider);
-        $db = \Config\Database::connect();
-        $builder = $db->table('bf_user_wallets');
-
-        // If you use a “unique by (user_id, provider)” rule, check first
-        $exists = $builder->where('user_id', $userId)->where('provider', $provider)->get()->getRowArray();
-
-        $payload = [
-            'user_id'    => $userId,
-            'provider'   => $provider,            // 'robinhood' | 'snaptrade'
-            'label'      => $label ?: ucfirst($provider),
-            'status'     => 'linked',             // or your internal state
-            'credentials'=> json_encode($credentials, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE),
-            'updated_on' => date('Y-m-d H:i:s'),
-        ];
-
-        if ($exists) {
-            $builder->where('id', $exists['id'])->update($payload);
-            return (int) $exists['id'];
-        }
-
-        $payload['created_on'] = date('Y-m-d H:i:s');
-        $builder->insert($payload);
-        return (int) $db->insertID();
-    }
-
-    /* ------------------------------- EDIT FLOWS ------------------------------- */
-
-    private function syncMainWallet(string $type, int $walletId, array $subsData, array $ctx = []): bool
-    {
-        // IMPORTANT: banks use 'Banking' type to match the list filters.
-        $walletTypeMap = [
-            'bank'       => 'Banking',
-            'credit'     => 'Credit',
-            'debt'       => 'Debt',
-            'investment' => 'Investment',
-            'crypto'     => 'Crypto',
-        ];
-        $walletType = $walletTypeMap[strtolower($type)] ?? 'Banking';
-
-        $amount = null;
-        switch (strtolower($type)) {
-            case 'bank':
-                $amount = $subsData['balance'] ?? null;
-                break;
-            case 'credit':
-            case 'debt':
-                $amount = $subsData['current_balance'] ?? null;
-                break;
-            case 'investment':
-                $amount = $subsData['amount'] ?? ($subsData['net_worth'] ?? null);
-                break;
-            case 'crypto':
-                $amount = $subsData['balance'] ?? null;
-                break;
-        }
-
-        $generic = [
-            'nickname'    => $subsData['nickname'] ?? ($ctx['nickname'] ?? null),
-            'amount'      => $amount,
-            'user_id'     => $ctx['user_id'] ?? null,
-            'user_email'  => $ctx['user_email'] ?? null,
-            'username'    => $ctx['username'] ?? null,
-            'wallet_type' => $walletType,
-            'beta'        => $ctx['beta'] ?? 0,
-            'status'      => 1,
-            'active'      => 'Yes',
-            'updated_on'  => date('Y-m-d H:i:s'),
-        ];
-        $generic = array_filter($generic, static fn($v) => $v !== null);
-
-        $ok = $this->walletModel->editWallet($walletId, $generic);
-        if (!$ok) {
-            $this->logger->error('syncMainWallet failed', compact('type', 'walletId', 'generic'));
-        }
-        return (bool)$ok;
-    }
-
-    public function editBankWallet(int $id, array $data, array $ctx = []): bool
-    {
-        $row      = $this->walletModel->getBankAccountByIdOrWallet($id);
-        $walletId = (int)($row['wallet_id'] ?? $row['id'] ?? $id);
-
-        $ok1 = $this->walletModel->editBankWallet($id, $data);
-        $ok2 = $this->syncMainWallet('bank', $walletId, $data, [
-            'user_id'   => $row['user_id']   ?? ($ctx['user_id'] ?? null),
-            'user_email'=> $row['user_email']?? ($ctx['user_email'] ?? null),
-            'username'  => $row['username']  ?? ($ctx['username'] ?? null),
-            'beta'      => $ctx['beta'] ?? 0,
-            'nickname'  => $data['nickname'] ?? null,
-        ]);
-        return $ok1 && $ok2;
-    }
-
-    public function editCreditWallet(int $id, array $data, array $ctx = []): bool
-    {
-        $row      = $this->walletModel->getCreditAccountByIdOrWallet($id);
-        $walletId = (int)($row['wallet_id'] ?? $row['id'] ?? $id);
-
-        $ok1 = $this->walletModel->editCreditWallet($id, $data);
-        $ok2 = $this->syncMainWallet('credit', $walletId, $data, [
-            'user_id'   => $row['user_id']   ?? ($ctx['user_id'] ?? null),
-            'user_email'=> $row['user_email']?? ($ctx['user_email'] ?? null),
-            'username'  => $row['username']  ?? ($ctx['username'] ?? null),
-            'beta'      => $ctx['beta'] ?? 0,
-            'nickname'  => $data['nickname'] ?? null,
-        ]);
-        return $ok1 && $ok2;
-    }
-
-    public function editDebtWallet(int $id, array $data, array $ctx = []): bool
-    {
-        $row      = $this->walletModel->getDebtAccountByIdOrWallet($id);
-        $walletId = (int)($row['wallet_id'] ?? $row['id'] ?? $id);
-
-        $ok1 = $this->walletModel->editDebtWallet($id, $data);
-        $ok2 = $this->syncMainWallet('debt', $walletId, $data, [
-            'user_id'   => $row['user_id']   ?? ($ctx['user_id'] ?? null),
-            'user_email'=> $row['user_email']?? ($ctx['user_email'] ?? null),
-            'username'  => $row['username']  ?? ($ctx['username'] ?? null),
-            'beta'      => $ctx['beta'] ?? 0,
-            'nickname'  => $data['nickname'] ?? null,
-        ]);
-        return $ok1 && $ok2;
-    }
-
-    public function editInvestmentWallet(int $id, array $data, array $ctx = []): bool
-    {
-        $row      = $this->walletModel->getInvestAccountByIdOrWallet($id);
-        $walletId = (int)($row['wallet_id'] ?? $row['id'] ?? $id);
-
-        $ok1 = $this->walletModel->editInvestmentWallet($id, $data);
-        $ok2 = $this->syncMainWallet('investment', $walletId, $data, [
-            'user_id'   => $row['user_id']   ?? ($ctx['user_id'] ?? null),
-            'user_email'=> $row['user_email']?? ($ctx['user_email'] ?? null),
-            'username'  => $row['username']  ?? ($ctx['username'] ?? null),
-            'beta'      => $ctx['beta'] ?? 0,
-            'nickname'  => $data['nickname'] ?? null,
-        ]);
-        return $ok1 && $ok2;
-    }
-
-    public function editCryptoWallet(int $id, array $data, array $ctx = []): bool
-    {
-        // Try to resolve crypto row similarly to others; fall back to direct lookup.
-        $row = null;
-        if (method_exists($this->walletModel, 'getCryptoAccountByIdOrWallet')) {
-            $row = $this->walletModel->getCryptoAccountByIdOrWallet($id);
-        }
-        if (!$row) {
-            $db  = db_connect();
-            $row = $db->table('bf_users_crypto_accounts')
-                      ->groupStart()->where('id', $id)->orWhere('wallet_id', $id)->groupEnd()
-                      ->get()->getRowArray();
-        }
-        if (!$row) {
-            $this->logger->warning('editCryptoWallet: subsidiary not found', ['id' => $id]);
-            return false;
-        }
-
-        $walletId = (int)($row['wallet_id'] ?? $row['id'] ?? $id);
-
-        $ok1 = $this->walletModel->editCryptoWallet($id, $data);
-        $ok2 = $this->syncMainWallet('crypto', $walletId, $data, [
-            'user_id'   => $row['user_id']   ?? ($ctx['user_id'] ?? null),
-            'user_email'=> $row['user_email']?? ($ctx['user_email'] ?? null),
-            'username'  => $row['username']  ?? ($ctx['username'] ?? null),
-            'beta'      => $ctx['beta'] ?? 0,
-            'nickname'  => $data['nickname'] ?? null,
-        ]);
-        return $ok1 && $ok2;
-    }
-
 }
-?>


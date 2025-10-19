<?php

namespace App\Services;

use App\Libraries\{BaseLoader};
use App\Models\{AccountsModel, WalletModel};

class AccountService
{

    protected $accountsModel;
    protected $walletModel;

    public function __construct()
    {
        $this->accountsModel = new AccountsModel();
        $this->walletModel = new WalletModel();
    }

    // Get Account Info based on account type (bank, credit, debt, etc.)
    public function getAccountInfo($accountId, $accountType)
    {
        return $this->accountsModel->getAccountInfo($accountId, $accountType);
    }

    // Edit Bank Account
    public function editBankAccount($accountId, $data)
    {
        return $this->accountsModel->editBankAccount($accountId, $data);
    }

    // Edit Credit Account
    public function editCreditAccount($accountId, $data)
    {
        return $this->accountsModel->editCreditAccount($accountId, $data);
    }

    // Edit Debt Account
    public function editDebtAccount($accountId, $data)
    {
        return $this->accountsModel->editDebtAccount($accountId, $data);
    }

    // Edit Investment Account
    public function editInvestmentAccount($accountId, $data)
    {
        return $this->accountsModel->editInvestmentAccount($accountId, $data);
    }

    // Get User Bank Accounts
    public function getUserBankAccounts($userId)
    {
        return $this->accountsModel->getUserBankAccounts($userId);
    }

    // Get User Debt Accounts
    public function getUserCryptoAccounts($userId)
    {
        return $this->accountsModel->getUserCryptoAccounts($userId);
    }

    // Get User Debt Accounts
    public function getUserDebtAccounts($userId)
    {
        return $this->accountsModel->getUserDebtAccounts($userId);
    }

    // Get User Invest Accounts
    public function getUserInvestAccounts($userId)
    {
        return $this->accountsModel->getUserInvestAccounts($userId);
    }

    // Get Wallet Transactions for a User
    public function getWalletTransactions($userId)
    {
        return $this->accountsModel->getWalletTransactions($userId);
    }

    // Get Total Debt
    public function getTotalDebt($userId)
    {
        $debtSummary = $this->accountsModel->getDebtAccountsSummary($userId);

        if (empty($debtSummary)) {
            return 0.0;
        }

        // Prefer the live liability (current balance) and fall back to any legacy alias.
        if (array_key_exists('current_balance', $debtSummary) && $debtSummary['current_balance'] !== null) {
            return (float) $debtSummary['current_balance'];
        }

        if (array_key_exists('total_debt', $debtSummary) && $debtSummary['total_debt'] !== null) {
            return (float) $debtSummary['total_debt'];
        }

        if (array_key_exists('available_balance', $debtSummary) && $debtSummary['available_balance'] !== null) {
            // Older summaries stored liabilities as negative available balance values.
            return (float) $debtSummary['available_balance'];
        }

        return 0.0;
    }

    // Get Total Investments
    public function getTotalInvestments($userId)
    {
        $investSummary = $this->accountsModel->getInvestAccountsSummary($userId);
        return $investSummary['total_investments'] ?? 0;
    }

    /**
     * Get the credit limit for the given user.
     *
     * @param int $userId
     * @return float|null
     */


    // Get User Credit Accounts
    public function getUserCreditAccounts($userId)
    {
        return $this->accountsModel->getUserCreditAccounts($userId);
    }

    // Get User Credit Limit (from WalletModel)
    public function getUserCreditLimit($userId)
    {
        $creditSummary = $this->walletModel->getCreditAccountsSummary($userId);

        // Ensure the credit limit is available, and return it
        if (isset($creditSummary['credit_limit'])) {
            return (float) $creditSummary['credit_limit'];
        }

        // Return 0 if no credit limit is found
        return 0;
    }

    // Get Total Credit Available (from WalletModel)
    public function getTotalCreditAvailable($userId)
    {
        $creditSummary = $this->walletModel->getCreditAccountsSummary($userId);

        // Ensure the available balance is available, and return it
        if (isset($creditSummary['available_balance'])) {
            return (float) $creditSummary['available_balance'];
        }

        // Return 0 if no available credit is found
        return 0;
    }

    /**
     * Fetch user portfolio (wallet) summary, including all account types.
     * 
     * @param int $userId
     * @return array
     */
    public function getUserPortfolioSummary($userId)
    {
        // Get all account types and aggregate data
        return [
            'totalCredit' => $this->getTotalCreditAvailable($userId),
            'totalDebt' => $this->getTotalDebt($userId),
            'totalInvestments' => $this->getTotalInvestments($userId),
            'bankAccounts' => $this->getUserBankAccounts($userId),
            'creditAccounts' => $this->getUserCreditAccounts($userId),
            'debtAccounts' => $this->getUserDebtAccounts($userId),
            'investAccounts' => $this->getUserInvestAccounts($userId),
        ];
    }

    /**
     * Add or update account details for different types.
     * 
     * @param int $accountId
     * @param string $accountType
     * @param array $data
     * @return bool
     */
    public function updateAccount($accountId, $accountType, $data)
    {
        switch ($accountType) {
            case 'bank':
                return $this->editBankAccount($accountId, $data);
            case 'credit':
                return $this->editCreditAccount($accountId, $data);
            case 'debt':
                return $this->editDebtAccount($accountId, $data);
            case 'investment':
                return $this->editInvestmentAccount($accountId, $data);
            default:
                throw new \InvalidArgumentException('Invalid account type');
        }
    }
}

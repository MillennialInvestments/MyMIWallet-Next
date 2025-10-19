<?php

namespace App\Services;

use App\Libraries\{BaseLoader};
use App\Models\TransactionModel;
use Exception;
use DateTime;

class TransactionService
{

    protected $transactionModel;

    public function __construct()
    {
        $this->transactionModel = new TransactionModel();
    }

    // Log a new transaction in the system
    public function logTransaction($type, $transactionID, $userID, $amount, $status)
    {
        $data = [
            'user_id' => $userID,
            'transaction_type' => $type,
            'transaction_id' => $transactionID,
            'amount' => $amount,
            'status' => $status,
            'created_at' => date('Y-m-d H:i:s')
        ];

        try {
            return $this->transactionModel->insertTransaction($data);
        } catch (Exception $e) {
            throw new Exception("Failed to log transaction: " . $e->getMessage());
        }
    }

    // Retrieve transaction data by transaction ID
    public function getTransactionData($transactionID)
    {
        return $this->transactionModel->getTransactionById($transactionID);
    }

    // Complete a deposit operation
    public function completeDeposit($transactionID, $amount)
    {
        $transaction = $this->getTransactionData($transactionID);

        if ($transaction && $transaction['status'] === 'Pending') {
            $updatedData = [
                'status' => 'Completed',
                'amount' => $amount,
                'completed_at' => date('Y-m-d H:i:s')
            ];

            return $this->transactionModel->updateTransaction($transactionID, $updatedData);
        }

        throw new Exception("Transaction not found or already completed.");
    }

    // Reverse a transaction (e.g., for refunds or errors)
    public function reverseTransaction($transactionID)
    {
        $transaction = $this->getTransactionData($transactionID);

        if ($transaction && $transaction['status'] === 'Completed') {
            $updatedData = [
                'status' => 'Reversed',
                'reversed_at' => date('Y-m-d H:i:s')
            ];

            return $this->transactionModel->updateTransaction($transactionID, $updatedData);
        }

        throw new Exception("Transaction not found or not eligible for reversal.");
    }

    // Handle batch processing for multiple transactions
    public function processBatchTransactions($transactions)
    {
        foreach ($transactions as $transaction) {
            try {
                $this->logTransaction(
                    $transaction['type'],
                    $transaction['transaction_id'],
                    $transaction['user_id'],
                    $transaction['amount'],
                    $transaction['status']
                );
            } catch (Exception $e) {
                // Log or handle the failure for each individual transaction
                continue; // Move to the next transaction
            }
        }
    }

    // Fraud detection logic to monitor suspicious transactions
    public function detectFraud($transactionID)
    {
        $transaction = $this->getTransactionData($transactionID);
        $amount = $transaction['amount'] ?? 0;

        // Simple fraud detection logic based on amount thresholds and transaction frequency
        $thresholdAmount = 10000; // Example threshold
        $transactionCount = $this->transactionModel
            ->where('user_id', $transaction['user_id'])
            ->where('DATE(created_at)', date('Y-m-d'))
            ->countAllResults();

        if ($amount > $thresholdAmount || $transactionCount > 10) {
            // Flag transaction as suspicious
            $this->transactionModel->updateTransaction($transactionID, ['suspicious' => 1]);
            // Notify admin or security team
            $this->notifySecurityTeam($transactionID);
            return true;
        }

        return false;
    }

    // Notify security team about a suspicious transaction
    protected function notifySecurityTeam($transactionID)
    {
        // Add logic to notify the admin/security team (e.g., via email or an alert system)
        // Example:
        // EmailService::sendSecurityAlert("Suspicious transaction detected", $transactionID);
    }

    // Fetch transaction history for a user (with optional pagination)
    public function getUserTransactionHistory($userID, $limit = 100, $offset = 0)
    {
        return $this->transactionModel
            ->where('user_id', $userID)
            ->orderBy('created_at', 'DESC')
            ->findAll($limit, $offset);
    }

    // Perform transaction validation based on custom business rules
    public function validateTransaction($transactionID, $businessRules = [])
    {
        $transaction = $this->getTransactionData($transactionID);

        // Validate against provided business rules (e.g., currency type, amount limits, etc.)
        foreach ($businessRules as $rule => $value) {
            if (isset($transaction[$rule]) && $transaction[$rule] !== $value) {
                throw new Exception("Transaction validation failed for rule: $rule.");
            }
        }

        return true;
    }
}

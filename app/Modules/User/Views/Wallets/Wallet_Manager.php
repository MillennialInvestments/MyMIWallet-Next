<?php
// $this->load->library('encryption'); 
// $key                                                = bin2hex($this->encryption->create_key(16));
// $this->encryption->initialize(
//     array(
//             'cipher'                                => 'aes-256',
//             'mode'                                  => 'ctr',
//             'key'                                   => hex2bin($key)
//     )
// );
$unix_timestamp				                        = time();
$date                                               = date("m/d/Y");
$hostTime   				                        = date("G:i A");
$time 						                        = date("G:i A");
$month						                        = date("n");
$day						                        = date("j");
$year						                        = date("Y");
$orderForm								            = trim(file_get_contents("php://input"));
$orderForm						    		        = json_decode($orderForm, true);

// GET Request Defined Variables
$status                                             = 1;
$beta									            = $orderForm['beta'];
$formMode                                           = $orderForm['form_mode'];
$userID								                = $orderForm['user_id'];
$userEmail								            = $orderForm['user_email'];
$username								            = $orderForm['username'];
$walletID                                           = $orderForm['wallet_id'];
$accountType                                        = $orderForm['wallet_type'];
$walletType                                         = $orderForm['wallet_type'];
$purchaseType                                       = $orderForm['purchase_type'];
$active									            = 'Yes';
$status						                        = 'Incomplete';
$defaultWallet							            = 'No';
$exchangeWallet						                = 'No';
$form_mode								            = $orderForm['form_mode'];
$redirectURL							            = $orderForm['redirectURL'];

if ($formMode === 'Add') {
    if ($walletType=== 'Banking') {
        // Wallet Variable
        $broker                                     = $orderForm['bank_name'];
        $nickname                                   = $orderForm['nickname'];
        $amount                                     = $orderForm['balance'];
        // Bank Account Information
        $bankName                                   = $orderForm['bank_name'];
        $accountType                                = $orderForm['account_type'];
        $bank_account_owner                         = $orderForm['bank_account_owner'];
        // !!! BANK ACCOUNT / ROUTING NUMBER INPUTS
        // $routing_number                             = $this->encryption->encrypt($orderForm['routing_number']);
        // $routing_number                             = $orderForm['routing_number'];
        // $account_number                             = $this->encryption->encrypt($orderForm['account_number']);
        // $account_number                             = $orderForm['account_number'];
        $nickname                                   = $orderForm['nickname'];
        $balance                                    = $orderForm['balance'];

        $accountData                                = array(
            'status'                                => 1,
            'beta'                                  => $beta,
            'date'                                  => $date,
            'time'                                  => $time,
            'user_id'                               => $userID,
            'user_email'                            => $userEmail,
            'username'                              => $username,
            'wallet_id'                             => $walletID,
            'bank_name'                             => $bankName,
            'account_type'                          => $accountType,
            'bank_account_owner'                    => $bank_account_owner,
            'routing_number'                        => $routing_number,
            'account_number'                        => $account_number,
            'nickname'                              => $nickname,
            'balance'                               => $balance,
        );

        $this->db->insert('bf_users_bank_accounts', $accountData); 
        echo '<script ' . ($nonce['script'] ?? '') . '>console.log("Bank Account Submitted. Database Submission Complete")</script>';
        $initial_value                              = $amount;
        $walletData								    = array(
            'active'							    => $active,
            'beta'								    => $beta,
            'default_wallet'					    => $defaultWallet,
            'exchange_wallet'					    => $exchangeWallet,
            'user_id'							    => $userID,
            'username'							    => $username,
            'user_email'						    => $userEmail,
            'broker'							    => $broker,
            'nickname'							    => $nickname,
            'purchase_type'                         => $purchaseType,
            'wallet_type'						    => $walletType,
            'amount'							    => $amount,
            'initial_value'						    => $initial_value,
        );
        echo '<script ' . ($nonce['script'] ?? '') . '>console.log("Wallet Submitted. Database Submission Complete")</script>';
        return $this->db->insert('bf_users_wallet', $walletData);
    } elseif ($walletType=== 'Credit') {
        // Wallet Variable
        $credit_status                              = $orderForm['credit_status']; 
        if ($credit_status === 'Active') {
            $status                                 = 1;
        } elseif ($credit_status === 'Closed') {
            $status                                 = 2; 
        } else {
            $status                                 = 0; 
        }
        $broker                                     = $orderForm['bank_name'];
        $nickname                                   = $orderForm['nickname'];
        // $amount                                 = $orderForm['balance'];
        // Credit Card Account Information
        $accountType                               = $orderForm['wallet_type'];
        $bankName                                  = $orderForm['bank_name'];
        $nikcname                                   = $orderForm['nickname'];
        $account_number                             = $orderForm['account_number'];
        // $account_number                             = $this->encryption->encrypt($orderForm['account_number']);
        $credit_limit                               = $orderForm['credit_limit'];
        $current_balance                            = $orderForm['current_balance'];
        $available_balance                          = $orderForm['available_balance'];

        $accountData                                = array(
            'status'                                => $status,
            'beta'                                  => $beta,
            'date'                                  => $date,
            'time'                                  => $time,
            'user_id'                               => $userID,
            'user_email'                            => $userEmail,
            'username'                              => $username,
            'wallet_id'                             => $walletID,
            'account_type'                          => $accountType,
            'bank_name'                             => $bankName,
            'nickname'                              => $nickname,
            'account_number'                        => $account_number,
            'credit_limit'                          => $credit_limit,
            'current_balance'                       => $current_balance,
            'available_balance'                     => $available_balance,
        );

        $this->db->insert('bf_users_credit_accounts', $accountData); 
        echo '<script ' . ($nonce['script'] ?? '') . '>console.log("Credit Account Submitted. Database Submission Complete")</script>';
        $initial_value                              = $credit_limit - $current_balance;
        $walletData								    = array(
            'active'							    => $active,
            'beta'								    => $beta,
            'default_wallet'					    => $defaultWallet,
            'exchange_wallet'					    => $exchangeWallet,
            'user_id'							    => $userID,
            'username'							    => $username,
            'user_email'						    => $userEmail,
            'broker'							    => $broker,
            'nickname'							    => $nickname,
            'purchase_type'                         => $purchaseType,
            'wallet_type'						    => $walletType,
            'amount'							    => $available_balance,
            'initial_value'						    => $initial_value,
        );
        return $this->db->insert('bf_users_wallet', $walletData);
        echo '<script ' . ($nonce['script'] ?? '') . '>console.log("Wallet Submitted. Database Submission Complete")</script>';
    } elseif ($walletType=== 'Investment') {

    }
} elseif ($formMode === 'Edit') {
    if ($walletType=== 'Banking') {
        // Wallet Variable
        $account_id                                 = $orderForm['account_id'];
        $broker                                     = $orderForm['bank_name'];
        $nickname                                   = $orderForm['nickname'];
        $amount                                     = $orderForm['balance'];
        // Bank Account Information
        $bankName                                  = $orderForm['bank_name'];
        $accountType                               = $orderForm['account_type'];
        // $bank_account_owner                         = $orderForm['bank_account_owner'];
        // $routing_number                             = $orderForm['routing_number'];
        $account_number                             = $orderForm['account_number'];        
        // $routing_number                             = $this->encryption->encrypt($orderForm['routing_number']);
        // $account_number                             = $this->encryption->encrypt($orderForm['account_number']);
        $nickname                                   = $orderForm['nickname'];
        $balance                                    = $orderForm['balance'];

        $accountData                                = array(
            'status'                                => 1,
            'beta'                                  => $beta,
            'date'                                  => $date,
            'time'                                  => $time,
            'user_id'                               => $userID,
            'user_email'                            => $userEmail,
            'username'                              => $username,
            'wallet_id'                             => $walletID,
            'bank_name'                             => $bankName,
            'account_type'                          => $accountType,
            // 'bank_account_owner'                    => $bank_account_owner,
            // 'routing_number'                        => $routing_number,
            // 'account_number'                        => $account_number,
            'nickname'                              => $nickname,
            'balance'                               => $amount,
        );
        $this->db->where('id', $account_id);
        $this->db->update('bf_users_bank_accounts', $accountData); 
        echo '<script ' . ($nonce['script'] ?? '') . '>console.log("Bank Account Submitted. Database Submission Complete"</script>';
        $walletData							        = array(
            'active'						        => $active,
            'beta'							        => $beta,
            'default_wallet'			            => $defaultWallet,
            'exchange_wallet'				        => $exchangeWallet,
            'user_id'							    => $userID,
            'username'							    => $username,
            'user_email'						    => $userEmail,
            'broker'							    => $bankName,
            'nickname'							    => $nickname,
            'purchase_type'                         => $purchaseType,
            'wallet_type'						    => $walletType,
            'amount'							    => $balance,
        );
        $this->db->where('id', $account_id);
        return $this->db->update('bf_users_wallet', $walletData);
        echo '<script ' . ($nonce['script'] ?? '') . '>console.log("Wallet Updated. Database Submission Complete"</script>';
    } elseif ($walletType=== 'Credit') {
        // Wallet Variable
        $credit_status                              = $orderForm['credit_status']; 
        if ($credit_status === 'Active') {
            $status                                 = 1;
        } elseif ($credit_status === 'Closed') {
            $status                                 = 2; 
        } else {
            $status                                 = 0; 
        }
        $account_id                                 = $orderForm['account_id'];
        $bankName                                  = $orderForm['bank_name'];
        $nickname                                   = $orderForm['nickname'];
        // $amount                                 = $orderForm['balance'];
        // Credit Card Account Information
        $accountType                               = $orderForm['wallet_type'];
        $account_number                             = $orderForm['account_number'];
        // $account_number                             = $this->encryption->encrypt($orderForm['account_number']);
        $credit_limit                               = $orderForm['credit_limit'];
        $current_balance                            = $orderForm['current_balance'];
        $available_balance                          = $orderForm['available_balance'];

        $accountData                                = array(
            'status'                                => $status,
            'beta'                                  => $beta,
            'date'                                  => $date,
            'time'                                  => $time,
            'user_id'                               => $userID,
            'user_email'                            => $userEmail,
            'username'                              => $username,
            'wallet_id'                             => $walletID,
            'account_type'                          => $accountType,
            'bank_name'                             => $bankName,
            'nickname'                              => $nickname,
            'account_number'                        => $account_number,
            'credit_limit'                          => $credit_limit,
            'current_balance'                       => $current_balance,
            'available_balance'                     => $available_balance,
        );
        $this->db->where('id', $account_id);
        $this->db->update('bf_users_credit_accounts', $accountData); 
        if ($status === 2) {
            $debtData                               = array(
                'status'                            => 1,
                'beta'                              => $beta,
                'date'                              => $date,
                'time'                              => $time,
                'user_id'                           => $userID,
                'user_email'                        => $userEmail,
                'username'                          => $username,
                'wallet_id'                         => $walletID,
                'account_type'                      => $accountType,
                'debtor'                            => $bankName,
                'nickname'                          => $nickname,
                'account_number'                    => $account_number,
                'credit_limit'                      => $credit_limit,
                'current_balance'                   => $current_balance,
                'available_balance'                 => $available_balance,
            );
            $this->db->insert('bf_users_debt_accounts', $debtData); 
        }
        echo '<script ' . ($nonce['script'] ?? '') . '>console.log("Credit Account Updated. Database Submission Complete"</script>';
        $initial_value                              = $credit_limit - $current_balance;
        $walletData								    = array(
            'active'							    => $active,
            'beta'								    => $beta,
            'default_wallet'					    => $defaultWallet,
            'exchange_wallet'					    => $exchangeWallet,
            'user_id'							    => $userID,
            'username'							    => $username,
            'user_email'						    => $userEmail,
            'broker'							    => $bankName,
            'nickname'							    => $nickname,
            'purchase_type'                         => $purchaseType,
            'wallet_type'						    => $walletType,
            'amount'							    => $available_balance,
        );
        echo '<script ' . ($nonce['script'] ?? '') . '>console.log("Wallet Updated. Database Submission Complete"</script>';
        $this->db->where('id', $account_id);
        return $this->db->update('bf_users_wallet', $walletData);
    } elseif ($walletType=== 'Debt') {
    } elseif ($walletType=== 'Investment') {
    }
} elseif ($formMode === 'Purchase') {
} elseif ($formMode === 'Delete') {
    $active									        = 'No';
    $walletID                                       = $orderForm['wallet_id'];
    $accountInformation                             = array(
        'active'                                    => $active,
    );
    $this->db->where('id', $walletID); 
    return $this->db->update('bf_users_wallet', $accountInformation);
}
?>


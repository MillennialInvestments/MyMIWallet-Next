<?php

namespace App\Services;

use Config\Services;
use App\Config\{APIs, SiteSettings};
use App\Libraries\{BaseLoader};
use App\Models\{ReferralModel, TransactionModel, UserModel};
use App\Services\{ApplePayService, CashAppService, CryptoService, GooglePayService, PlaidService, PayPalService};

class ReferralService
{

    protected $auth;
    protected $session;
    protected $referralModel;
    protected $transactionModel;
    protected $userModel;
    protected $siteSettings;
    protected $cuID;

    public function __construct()
    {
        helper('url');
        $this->auth = service('authentication');
        $this->session = Services::session();
        $this->referralModel = new ReferralModel();
        $this->transactionModel = new TransactionModel();
        $this->userModel = new UserModel();
        $this->siteSettings = config('SiteSettings');
        $this->cuID = $this->session->get('user_id') ?? $this->auth->id() ?? 0;
    }

    /**
     * Track referral sign-ups, activity, and earnings.
     */
    public function getUserReferralData($cuID)
    {
        $defaults = [
            'cuReferrerCode'          => null,
            'cuWalletID'              => null,
            'getTotalReferrals'       => [],
            'totalReferrals'          => 0,
            'getTotalActiveReferrals' => [],
            'totalActiveReferrals'    => 0,
            'totalPaidActiveReferrals'=> 0,
            'active_referrals'        => 0,
            'totalReferralEarnings'   => 0.00,
            'total_referrals'         => [],
            'referral_link'           => null,
        ];

        if (empty($cuID)) {
            return $defaults;
        }

        $user = $this->userModel->find($cuID);
        if ($user) {
            $defaults['cuWalletID'] = $user['wallet_id'] ?? $user['cuWalletID'] ?? null;
        }

        $cuReferrerCode = $this->referralModel->getReferrerCode($cuID);
        $defaults['cuReferrerCode'] = $cuReferrerCode;
        $defaults['referral_link']  = $this->buildReferralLink($cuReferrerCode);

        if (empty($cuReferrerCode)) {
            return $defaults;
        }

        $getTotalReferrals = $this->referralModel->getTotalReferrals($cuID, $cuReferrerCode) ?? [];
        $getTotalActiveReferrals = $this->referralModel->getTotalActiveReferrals($cuID, $cuReferrerCode) ?? [];

        $totalReferrals = is_array($getTotalReferrals) ? count($getTotalReferrals) : 0;
        $totalActiveReferrals = $this->sumActiveReferrals($getTotalActiveReferrals);
        $commissionEarnings = (float) $this->calculateCommissions($cuID);

        $defaults['getTotalReferrals']        = $getTotalReferrals;
        $defaults['totalReferrals']           = $totalReferrals;
        $defaults['getTotalActiveReferrals']  = $getTotalActiveReferrals;
        $defaults['totalActiveReferrals']     = $totalActiveReferrals;
        $defaults['totalPaidActiveReferrals'] = $totalActiveReferrals;
        $defaults['active_referrals']         = $totalActiveReferrals;
        $defaults['totalReferralEarnings']    = $commissionEarnings;

        $monthlyStats = $this->referralModel->getMonthlyReferralStats($cuReferrerCode) ?? [];
        $defaults['total_referrals'] = array_map(static function ($row) {
            return [
                'year'   => (int) ($row['year'] ?? 0),
                'month'  => (int) ($row['month'] ?? 0),
                'total'  => (int) ($row['total'] ?? 0),
                'active' => (int) ($row['active'] ?? 0),
                'paying' => (int) ($row['paying'] ?? 0),
            ];
        }, $monthlyStats);

        return $defaults;
    }

    protected function buildReferralLink(?string $referrerCode): ?string
    {
        if (empty($referrerCode)) {
            return null;
        }

        return site_url('register?ref=' . $referrerCode);
    }

    private function sumActiveReferrals(array $rows): int
    {
        if (empty($rows)) {
            return 0;
        }

        return array_sum(array_map(static function ($row) {
            return (int) ($row['count'] ?? 0);
        }, $rows));
    }
    

    /**
     * Get user referral link.
     */
    public function getUserReferralLink($cuID)
    {
        $user = $this->referralModel->getAffiliateDetails($cuID);
        return $this->buildReferralLink($user['referrer_code'] ?? null);
    }

    /**
     * Generate referral links based on user tier.
     */
    public function generateReferralLinks($cuID)
    {
        // Fetch user affiliate info
        $affiliateInfo = $this->referralModel->getAffiliateDetails($cuID);
        $referrerCode = $affiliateInfo['referrer_code'] ?? $this->referralModel->getReferrerCode($cuID);

        if (empty($referrerCode)) {
            return [];
        }

        // Referral links for each tier (basic, premium, gold)
        $basicReferralLink = base_url("/referral/$referrerCode/basic");
        $premiumReferralLink = base_url("/referral/$referrerCode/premium");
        $goldReferralLink = base_url("/referral/$referrerCode/gold");

        return [
            'basic_link' => $basicReferralLink,
            'premium_link' => $premiumReferralLink,
            'gold_link' => $goldReferralLink
        ];
    }

    /**
     * Calculate the commission based on referred users' activities.
     */
    public function calculateCommissions($cuID)
    {
        $referrerCode = $this->referralModel->getReferrerCode($cuID);
        if (empty($referrerCode)) {
            return 0.0;
        }
        $commissions = $this->referralModel->calculateCommission($cuID, $referrerCode);

        $totalSpending = $commissions['total_spending'] ?? 0;

        // Implement flexible payout percentages based on performance or conditions
        $commissionPercentage = $this->getCommissionPercentage($cuID, $referrerCode); // Assume you have a method for this

        return (float) $totalSpending * ($commissionPercentage / 100);
    }
    
    // Helper function to determine commission percentage
    public function getCommissionPercentage($cuID, $referrerCode)
    {
        if (empty($referrerCode)) {
            return 10;
        }

        $performanceData = $this->getUserPerformance($cuID, $referrerCode) ?? [];
        $userPerformance = (float) ($performanceData['total_spending'] ?? 0);  // Assuming performance is based on total spending
    
        // Apply tiered commission based on performance
        if ($userPerformance > 20000) {
            return 50; // Highest performance
        } elseif ($userPerformance > 15000) {
            return 45;
        } elseif ($userPerformance > 10000) {
            return 40;
        } elseif ($userPerformance > 7500) {
            return 35;
        } elseif ($userPerformance > 5000) {
            return 30;
        } elseif ($userPerformance > 3000) {
            return 25;
        } elseif ($userPerformance > 1000) {
            return 20;
        } else {
            return 10; // Minimum commission for low performance
        }
    }
    
    private function getUserPerformance($cuID, $referrerCode)
    {
        // Custom logic to determine user performance (e.g., referral count, revenue)
        return $this->referralModel->getUserReferralPerformance($cuID, $referrerCode);
    }
    
    /**
     * Track referral activity and return summary.
     */
    public function getReferralActivity($cuID)
    {
        return $this->referralModel->getReferralActivity($cuID);
    }

    /**
     * Process and automate referral payments.
     */
    public function processReferralPayments($cuID)
    {
        $commission = $this->calculateCommissions($cuID);
        if ($commission > 0) {
            // Call a function to handle automated payments via PayPal, Stripe, etc.
            $this->payoutUser($cuID, $commission);
        }
    }

    /**
     * Handle payouts to the affiliate using a payment gateway.
     */
    private function payoutUser($cuID, $amount, $paymentMethod)
    {
        // Example payment integration logic based on the selected method
        $paymentData = [
            'user_id' => $cuID,
            'amount' => $amount,
            'status' => 'Pending',
            'payout_date' => date('Y-m-d H:i:s')
        ];
    
        // Save the pending payment to the database (e.g. referral_payouts table)
        $this->referralModel->savePayout($paymentData);
    
        // Call the appropriate payment gateway based on the payment method
        switch ($method) {
            case 'paypal':
                $service = new PayPalService();
                return $service->payViaPayPal($cuID, $amount);
                
            case 'cashapp':
                $service = new CashAppService();
                return $service->payViaCashApp($cuID, $amount);

            case 'applepay':
                $service = new ApplePayService();
                return $service->payViaApplePay($cuID, $amount);

            case 'googlepay':
                $service = new GooglePayService();
                return $service->payViaGooglePay($cuID, $amount);

            case 'crypto':
                $service = new CryptoService();
                return $service->payViaCrypto($cuID, $amount);

            case 'plaid':
                $service = new PlaidService();
                return $service->payViaPlaid($cuID, $amount);

            default:
                throw new \Exception('Payment method not supported.');
        }
    
        // Update payment status after success
        $paymentData['status'] = 'Paid';
        $this->referralModel->updatePayoutStatus($cuID, $paymentData);
    }   

    private function payViaPayPal($cuID, $amount)
    {
        // Initialize PayPal API and make the payment
        $paypal = new \PayPalService();
        $response = $paypal->payUser($cuID, $amount);

        if ($response->success) {
            log_message('info', "PayPal payment successful for user {$cuID}");
        } else {
            log_message('error', "PayPal payment failed for user {$cuID}: " . $response->error);
        }
    }

    private function payViaCashApp($cuID, $amount)
    {
        // CashApp API integration to send payment
        $cashApp = new \CashAppService();
        $response = $cashApp->sendPayment($cuID, $amount);

        if ($response->success) {
            log_message('info', "CashApp payment successful for user {$cuID}");
        } else {
            log_message('error', "CashApp payment failed for user {$cuID}: " . $response->error);
        }
    }

    private function payViaApplePay($cuID, $amount)
    {
        // ApplePay API integration to send payment
        $applePay = new \ApplePayService();
        $response = $applePay->sendPayment($cuID, $amount);
    
        if ($response->success) {
            log_message('info', "ApplePay payment successful for user {$cuID}");
        } else {
            log_message('error', "ApplePay payment failed for user {$cuID}: " . $response->error);
        }
    }
    
    private function payViaGooglePay($cuID, $amount)
    {
        // Google Pay API integration to send payment
        $googlePay = new \GooglePayService();
        $response = $googlePay->sendPayment($cuID, $amount);
    
        if ($response->success) {
            log_message('info', "Google Pay payment successful for user {$cuID}");
        } else {
            log_message('error', "Google Pay payment failed for user {$cuID}: " . $response->error);
        }
    }

    private function payViaCrypto($cuID, $amount)
    {
        // Crypto API integration to send payment
        $cryptoService = new \CryptoService();
        $response = $cryptoService->sendPayment($cuID, $amount, 'BTC'); // Example using Bitcoin

        if ($response->success) {
            log_message('info', "Crypto payment successful for user {$cuID}");
        } else {
            log_message('error', "Crypto payment failed for user {$cuID}: " . $response->error);
        }
    }

    private function payViaPlaid($cuID, $amount)
    {
        // Plaid API integration to send payment
        $plaidService = new \PlaidService();
        $response = $plaidService->sendACHTransfer($cuID, $amount);

        if ($response->success) {
            log_message('info', "Plaid payment successful for user {$cuID}");
        } else {
            log_message('error', "Plaid payment failed for user {$cuID}: " . $response->error);
        }
    }

    /**
     * Returns commission history for a given user.
     */
    public function getCommissionHistory($cuID)
    {
        return $this->referralModel->getUserCommissionHistory($cuID);
    }

    /**
     * Track detailed history of the user's referrals and commissions.
     */
    public function getReferralEarningsBreakdown($cuID)
    {
        return $this->referralModel->getEarningsBreakdown($cuID);
    }

    public function storeReferral($referralData, $subscriberData) {
        try {
            log_message('debug', "Attempting to store referral data: " . print_r($referralData, true));
            if ($this->referralModel->storeReferral($referralData)) {
                log_message('debug', "Attempting to store subscriber data: " . print_r($subscriberData, true));
                return $this->referralModel->storeSubscriber($subscriberData);
            } else { 
                log_message('error', "Error storing referral data: " . $e->getMessage());
                return false;
            }
        } catch (\Exception $e) {
            log_message('error', "Error storing subscriber data: " . $e->getMessage());
            return false;
        }
    }
    
    public function getUserNameByID($userID)
    {
        try {
            $user = $this->userModel->find($userID);
            $userName = $user ? $user->username : 'Unknown';
            log_message("debug", "Fetched referrer name for UserID {$userID}: {$userName}");
            return $userName;
        } catch (\Exception $e) {
            $this->logger->error("Error fetching referrer name for UserID {$userID}: " . $e->getMessage());
            return 'Unknown';
        }
    }
    
    public function getPreGeneratedMessages($cuID)
    {
        // Define an array of rotating messages
        $messages = [
            // General Finance Management
            "Join MyMI Wallet today and take control of your finances! Track your spending, manage your investments, and grow your wealth. Sign up now: " . base_url('/referral/' . $cuID),
            "Ready to simplify your finances? With MyMI Wallet, you can budget smarter and invest better. Start your journey today: " . base_url('/referral/' . $cuID),
            "Don’t miss out! Manage your income, expenses, and investments all in one place with MyMI Wallet. Start now: " . base_url('/referral/' . $cuID),
            
            // Investment Tools
            "Looking to track your investments in real-time? MyMI Wallet offers the best tools to monitor and optimize your portfolio. Get started today: " . base_url('/referral/' . $cuID),
            "Manage your assets with MyMI Wallet's robust investment tracking tools. Whether it's crypto or stocks, we've got you covered. Sign up here: " . base_url('/referral/' . $cuID),
            "Take control of your investment portfolio and grow your assets faster with MyMI Wallet’s advanced investment tools. Join now: " . base_url('/referral/' . $cuID),
    
            // Budgeting Features
            "Want to achieve your financial goals? MyMI Wallet’s budgeting tools make it easy to plan your expenses and save more. Join now: " . base_url('/referral/' . $cuID),
            "Budget smarter with MyMI Wallet! Set your savings goals, track spending, and stay on top of your financial game. Start today: " . base_url('/referral/' . $cuID),
            "MyMI Wallet's budgeting tools help you stay in control of your money and achieve your financial dreams. Join today: " . base_url('/referral/' . $cuID),
    
            // Automated Reports & Analysis
            "Automate your financial reports and analysis with MyMI Wallet! Get insights into your spending, income, and investments. Sign up now: " . base_url('/referral/' . $cuID),
            "With MyMI Wallet's automated financial reports, you can easily track and optimize your budget and investment performance. Start here: " . base_url('/referral/' . $cuID),
            "Get automatic financial insights with MyMI Wallet. From budgeting to investing, we make money management easy. Sign up today: " . base_url('/referral/' . $cuID),
    
            // Referral Program & Rewards
            "Earn rewards with MyMI Wallet! Refer friends and get rewarded while helping them manage their finances. Start sharing today: " . base_url('/referral/' . $cuID),
            "Get more from MyMI Wallet by referring friends! Earn commissions and grow your financial community. Sign up now: " . base_url('/referral/' . $cuID),
            "Love MyMI Wallet? Share it with friends and earn rewards through our referral program! Join today: " . base_url('/referral/' . $cuID),
    
            // Financial Goal Tracking
            "Stay on track with your financial goals using MyMI Wallet. Whether saving or investing, we help you stay focused. Join now: " . base_url('/referral/' . $cuID),
            "Achieve your financial goals with MyMI Wallet! Use our goal tracking tools to save, invest, and succeed. Sign up today: " . base_url('/referral/' . $cuID),
    
            // Crypto Integration
            "Looking for the best way to manage crypto investments? MyMI Wallet offers powerful tools to track your crypto assets. Join now: " . base_url('/referral/' . $cuID),
            "Crypto and stocks in one place! MyMI Wallet allows you to manage all your investments with ease. Sign up here: " . base_url('/referral/' . $cuID),
            "Track your crypto assets and more with MyMI Wallet. Start optimizing your investments today: " . base_url('/referral/' . $cuID),
    
            // Financial Education
            "Take control of your financial future with MyMI Wallet! Learn more about budgeting, investing, and managing your money. Start now: " . base_url('/referral/' . $cuID),
            "Learn to manage your finances like a pro with MyMI Wallet’s educational tools. Budget, save, and invest smarter. Join today: " . base_url('/referral/' . $cuID),
    
            // Mobile & Web Access
            "Manage your finances on the go with MyMI Wallet! Our mobile-friendly platform allows you to track your budget and investments anywhere. Sign up now: " . base_url('/referral/' . $cuID),
            "Access MyMI Wallet from anywhere! Whether on your phone or computer, manage your money with ease. Join here: " . base_url('/referral/' . $cuID),
    
            // Security & Privacy
            "Your security matters! MyMI Wallet provides top-notch security features to keep your financial data safe. Sign up today: " . base_url('/referral/' . $cuID),
            "Keep your finances secure with MyMI Wallet’s advanced encryption and privacy protection. Join today: " . base_url('/referral/' . $cuID),
        ];
    
        // Randomly select a message
        return $messages[array_rand($messages)];
    }
   
    public function getNonResponsiveInvites()
    {
        return $this->referralModel->where('active', 0)
                                   ->where('DATEDIFF(CURDATE(), signup_date) > 7') // Non-responsive for 7 days
                                   ->get()
                                   ->getResultArray();
    }
    
    public function sendFollowUpEmails()
    {
        // Get list of pending referral emails that haven't converted
        $pendingReferrals = $this->getPendingReferrals(); // Assume you have this method
    
        foreach ($pendingReferrals as $referral) {
            $email = $referral['email'];
            $userID = $referral['user_id'];
            $referrerCode = $referral['referrer_code'];
    
            // Prepare follow-up email content
            $emailContent = view('emails/referral_follow_up', [
                'referral_link' => site_url('/Referral/Register/' . $referrerCode),
                'referrer_name' => $this->getUserNameByID($userID)
            ]);
    
            // Send follow-up email
            $this->email->setTo($email);
            $this->email->setSubject('Reminder: Join MyMI Wallet Today!');
            $this->email->setMessage($emailContent);
    
            if ($this->email->send()) {
                log_message('info', 'Follow-up email sent to: ' . $email);
            } else {
                $error = $this->email->printDebugger(['headers']);
                log_message('error', 'Failed to send follow-up email to: ' . $email . ' Error: ' . $error);
            }
        }
    }

    public function getReferralSuccess($cuID)
    {
        $cuReferrerCode = $this->referralModel->getReferrerCode($cuID);
        $totalReferrals = $this->getUserReferralData($cuID)['totalReferrals'];
        $totalConverted = $this->referralModel->where('active', 1)->where('referrer_code', $cuReferrerCode)->countAllResults();
    
        return [
            'totalReferrals' => $totalReferrals,
            'totalConverted' => $totalConverted,
            'conversionRate' => ($totalReferrals > 0) ? ($totalConverted / $totalReferrals) * 100 : 0
        ];
    }
    
    // Helper method to fetch pending referral invites
    public function getPendingReferrals()
    {
        return $this->db->table('bf_users_referrals')
                        ->where('status', 'pending') // Adjust this depending on how you're tracking status
                        ->get()
                        ->getResultArray();
    }
    

}

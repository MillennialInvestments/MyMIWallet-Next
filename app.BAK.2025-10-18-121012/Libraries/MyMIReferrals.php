<?php

namespace App\Libraries;

use CodeIgniter\Session\Session;
use Config\Services;
use App\Config\{SiteSettings};
use App\Libraries\{BaseLoader};
use App\Models\{ReferralModel};
use App\Services\ReferralService;

#[\AllowDynamicProperties]
class MyMIReferrals
{

    protected $auth;
    protected $cuID;
    protected $db;
    protected $request;
    protected $session;
    protected $siteSettings;
    protected $referralModel;
    protected $referralService;

    public function __construct()
    {
        // Load necessary services, libraries, and configurations
        $this->auth           = service('authentication');
        $this->db             = \Config\Database::connect();
        $this->request        = Services::request();
        $this->session        = service('session');
        $this->cuID           = $this->session->get('user_id') ?? $this->auth->id() ?? 0;
        $this->referralModel  = new ReferralModel();
        $this->referralService = new ReferralService();
        
        // Assuming SiteSettings is a configuration file for global settings
        $this->siteSettings   = new SiteSettings();
    }

    /**
     * Fetch all referral information for a specific user.
     */
    public function allUserReferralInfo($cuID, $cuReferrerCode)
    {
        // Fetch referral data
        $getTotalReferrals = $this->referralModel->getTotalReferrals($cuID, $cuReferrerCode);
        $totalReferrals = count($getTotalReferrals);

        $getTotalActiveReferrals = $this->referralModel->getTotalActiveReferrals($cuID, $cuReferrerCode);
        $totalActiveReferrals = count($getTotalActiveReferrals);

        // Fetch the paid active referrals and total referral earnings from ReferralService
        $commissionData = $this->referralService->getUserReferralData($cuID);
        $totalPaidActiveReferrals = $commissionData['active_referrals'];
        $totalReferralEarnings = $commissionData['total_earnings'];

        $userReferrals = [
            'getTotalReferrals' => $getTotalReferrals,
            'totalReferrals' => $totalReferrals,
            'getTotalActiveReferrals' => $getTotalActiveReferrals,
            'totalActiveReferrals' => $totalActiveReferrals,
            'totalPaidActiveReferrals' => $totalPaidActiveReferrals,
            'totalReferralEarnings' => $totalReferralEarnings,
        ];

        return $userReferrals;
    }

    /**
     * Calculate commissions for a user based on their referral code.
     */
    public function commissionPerUser($cuID, $cuReferrerCode)
    {
        // Delegate commission calculation to the referral service
        $commissionsData = $this->referralService->calculateCommissions($cuID);
        return $commissionsData;
    }

    /**
     * Trigger payment processing for active referrals.
     */
    public function activatePayments($cuID)
    {
        // Use the referral service to process payments
        $this->referralService->processReferralPayments($cuID);
    }

    /**
     * Get the history of referrals for the user based on their referral code.
     */
    public function history($cuID)
    {
        // Fetch referral history from ReferralModel or ReferralService
        return $this->referralModel->getReferralHistory($cuID);
    }

    /**
     * Get payment history for the user's referral payments.
     */
    public function paymentHistory($cuID)
    {
        // Fetch payment history related to referral payouts
        return $this->referralModel->getReferralPaymentHistory($cuID);
    }
}

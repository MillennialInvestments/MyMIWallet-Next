<?php

namespace App\Libraries;

use App\Libraries\{BaseLoader};
use App\Models\UserModel;
use CodeIgniter\Email\Email;
use Config\Services;

#[\AllowDynamicProperties]
class MyMIOnboarding
{

    protected $userModel;
    protected $db;
    protected $session;
    protected $emailService;
    protected $solanaService;
    protected $ethService;
    protected $btcService;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        // $this->userModel = new UserModel();
        $this->session = Services::session();
        $this->emailService = service('email');
        $this->session       = Services::session();
        $this->solanaService = service('solanaService');
        $this->ethService    = service('ethereumServices');
        $this->btcService    = service('myMIBitcoin');
    }

    /**
     * Ensure default wallets exist for enabled chains.
     * Returns array of chain => address|null.
     */
    public function ensureDefaultWallets(int $userId): array
    {
        $out = [];

        $sol = $this->session->get('solana_public_key');
        if (!$sol) {
            $sol = $this->solanaService->generateAddressForUser($userId);
            if ($sol) {
                // model(\App\Models\SolanaModel::class)->attachExternalWallet($userId, $sol, 'MyMI Solana Wallet');
                $this->session->set('solana_public_key', $sol);
            }
        }
        $out['solana'] = $sol;

        $eth = $this->session->get('ethereum_public_key');
        if (!$eth) {
            $eth = $this->ethService->generateAddressForUser($userId);
            if ($eth) {
                // Persist via model if needed
                $this->session->set('ethereum_public_key', $eth);
            }
        }
        $out['ethereum'] = $eth;

        $btc = $this->session->get('bitcoin_public_key');
        if (!$btc && method_exists($this->btcService, 'generateAddressForUser')) {
            $btc = $this->btcService->generateAddressForUser($userId);
            if ($btc) {
                $this->session->set('bitcoin_public_key', $btc);
            }
        }
        $out['bitcoin'] = $btc;

        return $out;
    }

    /** Check whether an action requires KYC */
    public function requiresKycFor(string $action): bool
    {
        $needs = ['swap', 'trade'];
        return in_array(strtolower($action), $needs, true);
    }
    
    public function checkOnboardingStatus($userId)
    {
        return $this->userModel->getIncompleteOnboardingSteps($userId);
    }

    // Send random email reminders for incomplete onboarding steps
    public function sendOnboardingReminderEmails()
    {
        $users = $this->db->table('bf_user_onboarding')->get()->getResultArray();

        foreach ($users as $user) {
            $incompleteSteps = $this->userModel->getIncompleteOnboardingSteps($user['user_id']);

            if (!empty($incompleteSteps) && $this->shouldSendReminder($user)) {
                $this->sendReminderEmail($user['user_id'], $incompleteSteps);
                $this->userModel->updateOnboardingStep($user['user_id'], 'reminder_last_sent', date('Y-m-d H:i:s'));
            }
        }
    }

    private function shouldSendReminder($user)
    {
        if ($user['reminder_last_sent'] == null) {
            return true;
        }
        
        $lastSent = strtotime($user['reminder_last_sent']);
        $now = time();
        return ($now - $lastSent) > 86400 * 3; // 3 days interval
    }

    private function sendReminderEmail($userId, $incompleteSteps)
    {
        $email = $this->emailService;
        $email->setTo($this->getUserEmail($userId));
        $email->setSubject("Complete Your MyMI Wallet Setup");
        $email->setMessage("You have the following incomplete steps:\n\n" . implode("\n", $incompleteSteps));
        $email->send();
    }

    private function getUserEmail($userId)
    {
        return $this->db->table('users')->where('id', $userId)->get()->getRow()->email;
    }

    // Auto-completes a step
    public function completeStep($userId, $step)
    {
        $this->userModel->updateOnboardingStep($userId, $step, 1);
    }
}
?>

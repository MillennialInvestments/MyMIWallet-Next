<?php
use CodeIgniter\Email\Email;

if (!function_exists('sendITTReferralEmail')) {
    function sendITTReferralEmail(array $data)
    {
        $email = \Config\Services::email();
        $email->setTo($data['to']);
        $email->setSubject('🎟️ Your ITT Referral Code for Investor\'s Talk Access');
    
        $htmlMessage = "
            <h2>You're In!</h2>
            <p>Thank you for registering with <strong>MyMI Wallet</strong> to access the Investor's Talk community.</p>
            <p><strong>Your Personal Referral Code:</strong><br><code>{$data['code']}</code></p>
            <p>🔐 Use this code in the Facebook Group approval form when answering <strong>Question 3</strong>.</p>
            <hr>
            <p>This step ensures you're a real person and keeps our group spam-free.</p>
            <p>If you need assistance, email <a href='mailto:support@mymiwallet.com'>support@mymiwallet.com</a>.</p>
            <br>
            <p>Thanks,<br><strong>MyMI Wallet Team</strong></p>
        ";
    
        $email->setMessage($htmlMessage);
        $email->setMailType('html');
    
        $success = $email->send();
    
        // 🧠 DETAILED LOGGING
        log_message('info', '[ITT EMAIL ATTEMPT] to: ' . $data['to'] . ' | Referral Code: ' . $data['code']);
    
        if (!$success) {
            $debug = $email->printDebugger(['headers', 'subject', 'body']);
            log_message('error', '[ITT EMAIL ERROR] Failed to send email to ' . $data['to']);
            log_message('debug', '[EMAIL DEBUGGER OUTPUT]' . PHP_EOL . print_r($debug, true));
        } else {
            log_message('info', '[ITT EMAIL SUCCESS] Sent to ' . $data['to']);
        }
    }
    
}

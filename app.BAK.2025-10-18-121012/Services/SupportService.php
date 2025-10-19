<?php

namespace App\Services;

use App\Libraries\{BaseLoader};
use Config\Services;

class SupportService
{

    /**
     * Send an email notification
     *
     * @param array $data
     * @return bool
     * send an email notification
     */
    public function sendEmail(array $data): bool
    {
        $email = Services::email();
        $email->setTo($data['to']);
        $email->setFrom($data['from'], $data['from_name'] ?? 'MyMI Wallet | Customer Support');
        $email->setSubject($data['subject']);
        
        $email->setMessage($data['message']);
    
        try {
            return $email->send();
        } catch (\Exception $e) {
            log_message('error', 'SupportService::sendEmail - Failed: ' . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Send a message to Discord webhook
     */
    public function sendToDiscord(string $webhookUrl, string $message): bool
    {
        try {
            $curl = curl_init($webhookUrl);

            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode(['content' => $message], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($message)
            ]);

            $response = curl_exec($curl);
            curl_close($curl);

            return $response !== false;
        } catch (\Exception $e) {
            log_message('error', 'SupportService::sendToDiscord - Failed: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Prepare data for views and templates
     *
     * @param array $userAccount
     * @param array $siteSettings
     * @return array
     */
    public function prepareCommonData(array $userAccount, array $siteSettings): array
    {
        $data = [];
        $data['siteSettings'] = $siteSettings;
        $data['userAccount'] = $userAccount;

        if (! empty($userAccount)) {
            $data = array_merge($data, [
                'cuRole'       => $userAccount['cuRole'] ?? '',
                'cuEmail'      => $userAccount['cuEmail'] ?? '',
                'cuUsername'   => $userAccount['cuUsername'] ?? '',
                'cuDisplayName'=> $userAccount['cuDisplayName'] ?? '',
                'cuKYC'        => $userAccount['cuKYC'] ?? '',
            ]);
        }

        return $data;
    }

    /**
     * Send a confirmation email for support requests
     *
     * @param array $data
     * @return bool
     */
    public function sendConfirmationEmail(array $data): bool
    {
        $emailContent = view('UserModule//Views\\Support\\_emails\\Support_Request_Received', ['data' => $data]);
        return $this->sendEmail([
            'to' => $data['email'],
            'from' => 'noreply@MyMIWallet.com',
            'from_name' => 'MyMI Wallet - Customer Support',
            'subject' => $data['subject'],
            'message' => $emailContent,
        ]);
    }

    /**
     * Send a confirmation email for support requests
     *
     * @param array $data
     * @return bool
     */
    public function sendSupportConfirmationEmail(array $data): bool
    {
        $emailContent = view('UserModule//Views\\Support\\_emails\\Support_Request_Received', ['data' => $data]);
        return $this->sendEmail([
            'to' => $data['email'],
            'from' => 'noreply@MyMIWallet.com',
            'from_name' => 'MyMI Wallet - Customer Support',
            'subject' => 'Support Request Confirmation',
            'message' => $emailContent,
        ]);
    }

    /**
     * Send a general notification email
     *
     * @param array $data
     * @return bool
     */
    public function sendGeneralNotificationEmail(array $data): bool
    {
        $emailContent = $data['message'];
        return $this->sendEmail([
            'to' => $data['email'],
            'from' => 'noreply@MyMIWallet.com',
            'from_name' => 'MyMI Wallet - Notifications',
            'subject' => $data['subject'],
            'message' => $emailContent,
        ]);
    }

    /**
     * Record basic feedback for an article.
     */
    public function recordFeedback(string $slug, bool $helpful, ?string $note = null): bool
    {
        $request = service('request');
        $data = [
            'slug'    => $slug,
            'helpful' => $helpful,
            'note'    => $note,
            'ip'      => $request->getIPAddress(),
            'ua'      => $request->getUserAgent()->getAgentString(),
        ];
        log_message('info', 'Support feedback: ' . json_encode($data));
        return true;
    }
}

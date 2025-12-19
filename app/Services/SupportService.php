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
        $mailService = service('mailService');
        $result      = $mailService->send(
            $data['to'],
            $data['subject'] ?? 'MyMI Wallet Support',
            $data['message'] ?? '',
            [
                'from_email' => $data['from'] ?? 'noreply@mymiwallet.com',
                'from_name'  => $data['from_name'] ?? 'MyMI Wallet | Customer Support',
                'reply_to'   => $data['reply_to'] ?? null,
                'text'       => $data['text'] ?? null,
                'module'     => $data['module'] ?? 'support',
                'queue'      => $data['queue'] ?? true,
            ]
        );

        if (! ($result['ok'] ?? false)) {
            log_message('error', 'SupportService::sendEmail - Failed: ' . ($result['error'] ?? 'unknown'));
        }

        return (bool) ($result['ok'] ?? false);
    }
    
    /**
     * Queue a support message to Discord via MyMIDiscord
     */
    public function sendToDiscord(string $channelKey, string $message): bool
    {
        try {
            $discord = new \App\Libraries\MyMIDiscord();
            return $discord->enqueuePlain($channelKey, $message, [
                'dedupe_key' => $channelKey . '|' . hash('sha256', $message),
                'priority'   => 4,
            ]);
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
        $emailContent = view('UserModule\\Views\\Support\\_emails\\Support_Request_Received', ['data' => $data]);
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
        $emailContent = view('UserModule\\Views\\Support\\_emails\\Support_Request_Received', ['data' => $data]);
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

<?php

namespace App\Services;

use App\Libraries\{BaseLoader};
use GuzzleHttp\Client;

class MailChimpService
{

    protected $apiKey;
    protected $serverPrefix;
    protected $listId;

    public function __construct()
    {
        $this->apiKey = getenv('MAILCHIMP_API_KEY');
        $this->serverPrefix = getenv('MAILCHIMP_SERVER_PREFIX');
        $this->listId = getenv('MAILCHIMP_LIST_ID');
    }

    public function addSubscriber($email, $firstName, $lastName)
    {
        $client = new Client();

        $url = "https://{$this->serverPrefix}.api.mailchimp.com/3.0/lists/{$this->listId}/members/";

        $response = $client->post($url, [
            'auth' => ['anystring', $this->apiKey],
            'json' => [
                'email_address' => $email,
                'status' => 'subscribed',
                'merge_fields' => [
                    'FNAME' => $firstName,
                    'LNAME' => $lastName,
                ],
            ],
        ]);

        return $response->getStatusCode();
    }

    public function createCampaign($subject, $previewText, $fromName, $replyTo, $contentHtml)
    {
        $client = new Client();

        // Step 1: Create a campaign
        $campaignUrl = "https://{$this->serverPrefix}.api.mailchimp.com/3.0/campaigns";

        $campaignResponse = $client->post($campaignUrl, [
            'auth' => ['anystring', $this->apiKey],
            'json' => [
                'type' => 'regular',
                'recipients' => ['list_id' => $this->listId],
                'settings' => [
                    'subject_line' => $subject,
                    'preview_text' => $previewText,
                    'title' => $subject,
                    'from_name' => $fromName,
                    'reply_to' => $replyTo,
                ],
            ],
        ]);

        $campaignData = json_decode($campaignResponse->getBody(), true);
        $campaignId = $campaignData['id'];

        // Step 2: Set campaign content
        $contentUrl = "https://{$this->serverPrefix}.api.mailchimp.com/3.0/campaigns/{$campaignId}/content";

        $contentResponse = $client->put($contentUrl, [
            'auth' => ['anystring', $this->apiKey],
            'json' => [
                'html' => $contentHtml,
            ],
        ]);

        return [
            'campaign_id' => $campaignId,
            'content_status' => $contentResponse->getStatusCode(),
        ];
    }

    public function sendCampaign($campaignId)
    {
        $client = new Client();

        $url = "https://{$this->serverPrefix}.api.mailchimp.com/3.0/campaigns/{$campaignId}/actions/send";

        $response = $client->post($url, [
            'auth' => ['anystring', $this->apiKey],
        ]);

        return $response->getStatusCode();
    }
}

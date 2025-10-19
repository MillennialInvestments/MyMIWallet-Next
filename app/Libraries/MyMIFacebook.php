<?php

namespace App\Libraries;

use App\Libraries\{BaseLoader};

#[\AllowDynamicProperties]
class MyMIFacebook {

    protected $apiBaseUrl = 'https://graph.facebook.com/v17.0/'; // Update version if needed
    protected $accessToken;

    public function __construct($accessToken) {
        $this->accessToken = $accessToken;
    }

    /* --------------------- POST TO PROFILE, PAGE, AND GROUP --------------------- */

    /**
     * Publish a post on a Facebook profile/page/group
     *
     * @param string $targetId The ID of the Facebook target (profile, page, or group)
     * @param string $message The content of the post
     * @param array $additionalData Optional additional fields (e.g., link, media)
     * @return array|null
     * 
     * 
     * use App\Libraries\MyMIFacebook;
     * $facebook = new MyMIFacebook('<ACCESS_TOKEN>'); // Replace with valid token
     * // Post to a group
     * $response = $facebook->publishPost('<GROUP_ID>', 'Join our financial growth webinar!');
     * print_r($response);
     */
    public function publishPost($targetId, $message, $additionalData = []) {
        $endpoint = "{$targetId}/feed";
        $data = array_merge(['message' => $message], $additionalData);
        return $this->sendRequest($endpoint, $data, 'POST');
    }

    /**
     * Upload media to a profile/page/group
     *
     * @param string $targetId The ID of the target
     * @param string $mediaUrl The URL of the media to upload
     * @return array|null
     */
    public function uploadMedia($targetId, $mediaUrl) {
        $endpoint = "{$targetId}/photos";
        $data = ['url' => $mediaUrl, 'published' => false];
        return $this->sendRequest($endpoint, $data, 'POST');
    }

    /* --------------------- FACEBOOK MESSAGING --------------------- */

    /**
     * Send a private message
     *
     * @param string $recipientId Facebook User ID of the recipient
     * @param string $message The message text
     * @return array|null
     * 
     * use App\Libraries\MyMIFacebook;
     * $facebook = new MyMIFacebook('<ACCESS_TOKEN>'); // Replace with valid token
     * // Send a private message
     * $messageResponse = $facebook->sendMessage('<USER_ID>', 'Thanks for joining our community!');
     * print_r($messageResponse);
     */
    public function sendMessage($recipientId, $message) {
        $endpoint = "me/messages";
        $data = [
            'messaging_type' => 'RESPONSE',
            'recipient' => ['id' => $recipientId],
            'message' => ['text' => $message],
        ];
        return $this->sendRequest($endpoint, $data, 'POST');
    }

    /* --------------------- EVENTS MANAGEMENT --------------------- */

    /**
     * Create an event
     *
     * @param string $pageId The ID of the Facebook page
     * @param array $eventDetails Event details like name, start_time, etc.
     * @return array|null
     * 
     * use App\Libraries\MyMIFacebook;
     * $facebook = new MyMIFacebook('<ACCESS_TOKEN>'); // Replace with valid token
     * // Create an event
     * $eventDetails = [
     *      'name' => 'Financial Wellness Workshop',
     *      'start_time' => '2024-01-01T10:00:00',
     *      'end_time' => '2024-01-01T12:00:00',
     *      'description' => 'Learn tips to manage your finances effectively!',
     *      'location' => 'Online via Zoom',
     * ];
     * $eventResponse = $facebook->createEvent('<PAGE_ID>', $eventDetails);
     * print_r($eventResponse);
     */
    public function createEvent($pageId, $eventDetails) {
        $endpoint = "{$pageId}/events";
        return $this->sendRequest($endpoint, $eventDetails, 'POST');
    }

    /**
     * Get events for a page
     *
     * @param string $pageId The ID of the page
     * @return array|null
     */
    public function getEvents($pageId) {
        $endpoint = "{$pageId}/events";
        return $this->sendRequest($endpoint);
    }

    /* --------------------- POLLS MANAGEMENT --------------------- */

    /**
     * Create a poll in a group
     *
     * @param string $groupId The ID of the Facebook group
     * @param string $question The poll question
     * @param array $options An array of poll options
     * @return array|null
     * 
     * use App\Libraries\MyMIFacebook;
     * $facebook = new MyMIFacebook('<ACCESS_TOKEN>'); // Replace with valid token
     * // Create a poll
     * $pollResponse = $facebook->createPoll('<GROUP_ID>', 'What topics interest you the most?', ['Investing', 'Budgeting', 'Crypto']);
     * print_r($pollResponse);
     */
    public function createPoll($groupId, $question, $options) {
        $endpoint = "{$groupId}/feed";
        $data = [
            'message' => $question,
            'poll' => ['options' => $options],
        ];
        return $this->sendRequest($endpoint, $data, 'POST');
    }

    /* --------------------- GENERIC REQUEST HANDLING --------------------- */

    /**
     * Generic function to send API requests to Facebook
     *
     * @param string $endpoint The API endpoint
     * @param array $data Data payload for POST requests
     * @param string $method HTTP method: GET, POST, DELETE, etc.
     * @return array|null
     */
    private function sendRequest($endpoint, $data = [], $method = 'GET') {
        $url = $this->apiBaseUrl . $endpoint;
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $this->accessToken,
            'Content-Type: application/json',
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if ($method === 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        } elseif ($method === 'DELETE') {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        }

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new \Exception('Facebook API request failed: ' . curl_error($ch));
        }

        curl_close($ch);

        return json_decode($response, true);
    }
}

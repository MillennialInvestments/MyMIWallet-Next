<?php namespace App\Libraries;

use App\Libraries\{BaseLoader};
#[\AllowDynamicProperties]
class MyMITwitter {

    protected $apiBaseUrl = 'https://api.twitter.com/2/';
    protected $bearerToken;  // Bearer token for authentication

    public function __construct($bearerToken) {
        $this->bearerToken = $bearerToken;
    }

    // Fetch a tweet by ID
    public function getTweet($tweetId) {
        $endpoint = "tweets/{$tweetId}";
        return $this->sendRequest($endpoint);
    }

    // Post a new tweet
    public function postTweet($tweetContent) {
        $endpoint = "tweets";
        $data = ['text' => $tweetContent];
        return $this->sendRequest($endpoint, $data, 'POST');
    }

    // Delete a tweet
    public function deleteTweet($tweetId) {
        $endpoint = "tweets/{$tweetId}";
        return $this->sendRequest($endpoint, [], 'DELETE');
    }

    // Get user by username
    public function getUserByUsername($username) {
        $endpoint = "users/by/username/{$username}";
        return $this->sendRequest($endpoint);
    }

    // Follow a user
    public function followUser($followerId, $targetUserId) {
        $endpoint = "users/{$followerId}/following";
        $data = ['target_user_id' => $targetUserId];
        return $this->sendRequest($endpoint, $data, 'POST');
    }

    // Unfollow a user
    public function unfollowUser($followerId, $targetUserId) {
        $endpoint = "users/{$followerId}/following/{$targetUserId}";
        return $this->sendRequest($endpoint, [], 'DELETE');
    }

    // Generic function to send API requests to X
    private function sendRequest($endpoint, $data = [], $method = 'GET') {
        $url = $this->apiBaseUrl . $endpoint;
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $this->bearerToken,
            'Content-Type: application/json',
            'Accept: application/json'
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        switch ($method) {
            case 'POST':
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                break;
            case 'DELETE':
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
                break;
        }

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            throw new \Exception('X API request failed: ' . curl_error($ch));
        }
        curl_close($ch);

        return json_decode($response, true);
    }
}

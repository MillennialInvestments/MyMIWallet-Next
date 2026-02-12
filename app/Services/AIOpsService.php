<?php

namespace App\Services;

class AIOpsService
{
    protected $endpoint;

    public function __construct()
    {
        $this->endpoint = getenv('AIOPS_ENDPOINT');
    }

    public function generateCommandDefinition(string $text)
    {
        $payload = [
            'type' => 'spark_command',
            'text' => $text,
        ];

        $ch = curl_init($this->endpoint . '/generate-command');

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
            CURLOPT_POSTFIELDS => json_encode($payload),
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }
}

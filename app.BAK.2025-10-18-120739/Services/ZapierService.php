<?php
namespace App\Services;

use App\Models\MarketingModel;

class ZapierService
{
    protected string $zapierEndpoint;
    protected string $openAIEndpoint = 'https://api.openai.com/v1/chat/completions';
    protected string $openAIKey;

    protected MarketingModel $model;

    public function __construct()
    {
        $this->zapierEndpoint = trim((string) getenv('ZAPIER_APPROVED_WEBHOOK'));
        $this->openAIKey = trim((string) getenv('OPENAI_API_KEY'));
        $this->model = new MarketingModel();
    }

    public function sendApprovedPostsToZapier(): void
    {
        $records = $this->model->getApprovedUnpostedSummaries();

        if (empty($records)) {
            log_message('info', 'ZapierService: No approved marketing posts awaiting distribution.');
            return;
        }

        log_message('info', 'ZapierService: Preparing to distribute ' . count($records) . ' approved marketing posts.');

        foreach ($records as $record) {
            $id = (int) ($record['id'] ?? 0);
            $summary = (string) ($record['summary'] ?? '');
            $title = (string) ($record['title'] ?? '');
            $keywords = (string) ($record['keywords'] ?? '');

            if (trim($summary) === '') {
                $this->model->logDistributionIssue($id, 'Skipped distribution: summary content was empty.');
                log_message('warning', sprintf('ZapierService: Skipped record %d because the summary was empty.', $id));
                continue;
            }

            try {
                $text = $summary;

                if ((int) ($record['ai_review'] ?? 0) === 1) {
                    $text = $this->sendToOpenAI($text, $keywords);
                }

                $response = $this->sendToZapier($title, $text, $keywords);
                $this->model->markAsPosted($id, $response);

                log_message('info', sprintf('ZapierService: Successfully distributed marketing record %d.', $id));
            } catch (\Throwable $e) {
                $message = $e->getMessage();
                $this->model->logDistributionIssue($id, 'Failed to distribute: ' . $message);
                log_message('error', sprintf('ZapierService: Distribution failed for record %d - %s', $id, $message));
            }
        }
    }

    protected function sendToZapier(string $title, string $text, string $keywords = ''): string
    {
        if ($this->zapierEndpoint === '' || str_contains($this->zapierEndpoint, 'hooks.zapier.com/hooks/catch/XXXXXX/YYYYYY')) {
            throw new \RuntimeException('Zapier webhook URL is not configured.');
        }

        if (! filter_var($this->zapierEndpoint, FILTER_VALIDATE_URL)) {
            throw new \RuntimeException('Zapier webhook URL is invalid.');
        }

        $client = service('curlrequest');

        $payload = [
            'title'   => $title,
            'summary' => $text,
            'source'  => 'MyMI Wallet',
        ];

        if ($keywords !== '') {
            $payload['keywords'] = $keywords;
        }

        $response = $client->post($this->zapierEndpoint, [
            'json'    => $payload,
            'timeout' => 15,
        ]);

        $status = $response->getStatusCode();

        if ($status >= 400) {
            throw new \RuntimeException('Zapier returned HTTP ' . $status . ': ' . substr($response->getBody(), 0, 200));
        }

        return (string) $response->getBody();
    }

    protected function sendToOpenAI(string $text, string $keywords = ''): string
    {
        $cleanedText = trim($text);

        if ($cleanedText === '') {
            return $text;
        }

        $apiKey = $this->openAIKey;

        if ($apiKey === '' || str_contains($apiKey, 'REPLACE_ME')) {
            log_message('warning', 'ZapierService: OPENAI_API_KEY missing; skipping AI enhancement.');
            return $text;
        }

        $client = service('curlrequest');
        $messages = [
            ['role' => 'system', 'content' => 'Polish and improve this content for professional social media distribution.'],
        ];

        if ($keywords !== '') {
            $messages[] = ['role' => 'system', 'content' => 'Incorporate these focus keywords when appropriate: ' . $keywords];
        }

        $messages[] = ['role' => 'user', 'content' => $cleanedText];

        try {
            $response = $client->post($this->openAIEndpoint, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Content-Type'  => 'application/json',
                ],
                'json' => [
                    'model'       => 'gpt-4',
                    'messages'    => $messages,
                    'temperature' => 0.7,
                ],
                'timeout' => 30,
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'ZapierService: OpenAI request failed - ' . $e->getMessage());
            return $text;
        }

        $status = $response->getStatusCode();

        if ($status >= 400) {
            log_message('error', 'ZapierService: OpenAI returned HTTP ' . $status . ' - ' . $response->getBody());
            return $text;
        }

        $data = json_decode((string) $response->getBody(), true);

        if (! is_array($data)) {
            log_message('error', 'ZapierService: Unable to decode OpenAI response.');
            return $text;
        }

        $enhanced = $data['choices'][0]['message']['content'] ?? '';

        if (trim($enhanced) === '') {
            log_message('warning', 'ZapierService: OpenAI returned empty content; using original text.');
            return $text;
        }

        return trim($enhanced);
    }
}
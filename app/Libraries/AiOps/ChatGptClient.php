<?php

namespace App\Libraries\AiOps;

use App\Libraries\AiOps\AiOpsManager;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class ChatGptClient
{
    protected AiOpsManager $manager;

    public function __construct(?AiOpsManager $manager = null)
    {
        $this->manager = $manager ?? new AiOpsManager();
    }

    /**
     * Generic wrapper that enforces caps, caching, and usage logging.
     *
     * @param string   $subsystem chatgpt_marketing|chatgpt_alerts|chatgpt_analytics
     * @param array    $payload   prompt/model/params
     * @param callable $executor  function(array $payload): array returns ['response'=>mixed,'tokens_in'=>int,'tokens_out'=>int,'cost_usd'=>float]
     */
    public function run(string $subsystem, array $payload, callable $executor): array
    {
        $gate = $this->manager->assertCanRun($subsystem);
        if (! $gate['allowed']) {
            return ['allowed' => false, 'reason' => $gate['reason']];
        }

        $payload = $this->enforceCeilings($payload);
        $cacheKey = $this->buildCacheKey($subsystem, $payload);
        $ttl      = $this->getTtlSeconds($subsystem);
        $cacheHit = false;

        if ($ttl > 0) {
            $cached = cache($cacheKey);
            if ($cached !== null) {
                $cacheHit = true;
                $this->manager->recordUsage($subsystem, 0, 0, 0, true, true, ['event_type' => 'CACHE_HIT']);
                return ['allowed' => true, 'cache' => true, 'data' => $cached];
            }
        }

        try {
            $result    = $executor($payload);
            $tokensIn  = (int) ($result['tokens_in'] ?? $payload['tokens_in'] ?? 0);
            $tokensOut = (int) ($result['tokens_out'] ?? 0);
            $costUsd   = isset($result['cost_usd']) ? (float) $result['cost_usd'] : $this->estimateCost($tokensIn, $tokensOut, $payload);

            $this->manager->recordUsage($subsystem, $tokensIn, $tokensOut, $costUsd, $cacheHit, true);

            if ($ttl > 0) {
                cache()->save($cacheKey, $result['response'] ?? $result, $ttl);
            }

            return ['allowed' => true, 'cache' => false, 'data' => $result['response'] ?? $result];
        } catch (Exception $e) {
            $this->manager->recordUsage($subsystem, 0, 0, 0, false, false, [
                'event_type' => 'API_ERROR',
                'message'    => $e->getMessage(),
            ]);

            return [
                'allowed' => false,
                'reason'  => 'api_error',
                'message' => $e->getMessage(),
            ];
        }
    }

    protected function enforceCeilings(array $payload): array
    {
        $settings = config('SiteSettings');
        if (isset($payload['max_tokens'])) {
            $payload['max_tokens'] = min((int) $payload['max_tokens'], $settings->aiMaxTokensPerRequest);
        } else {
            $payload['max_tokens'] = $settings->aiMaxTokensPerRequest;
        }

        return $payload;
    }

    protected function buildCacheKey(string $subsystem, array $payload): string
    {
        $signature = json_encode([
            'prompt' => $payload['prompt'] ?? '',
            'model'  => $payload['model'] ?? '',
            'params' => $payload['params'] ?? $payload,
        ]);

        return 'ai:' . $subsystem . ':' . sha1($signature);
    }

    protected function getTtlSeconds(string $subsystem): int
    {
        return match ($subsystem) {
            'chatgpt_marketing' => 60 * 60 * 12, // 12h
            'chatgpt_alerts'    => 60 * 60,       // 1h
            'chatgpt_analytics' => 60 * 60 * 24,  // 24h
            default             => 0,
        };
    }

    protected function estimateCost(int $tokensIn, int $tokensOut, array $payload): float
    {
        $pricingPer1k = (float) ($payload['pricing_per_1k'] ?? 0);
        $totalTokens  = $tokensIn + $tokensOut;
        if ($pricingPer1k <= 0) {
            return 0.0;
        }

        return round(($totalTokens / 1000) * $pricingPer1k, 4);
    }
}

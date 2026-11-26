<?php

namespace App\Libraries\Swaps\Providers;

use App\Libraries\Swaps\SwapQuoteProvider;

/**
 * Jupiter DEX aggregator adapter for Solana token swaps.
 * Non-custodial: user signs transactions directly in Phantom/Solflare/etc.
 */
class JupiterSwapProvider implements SwapQuoteProvider
{
    protected ?array $mockFixture = null;

    public function __construct(?array $mockFixture = null)
    {
        $this->mockFixture = $mockFixture;
    }

    public function name(): string
    {
        return 'jupiter';
    }

    /**
     * @param string $inputToken Mint address (e.g. So11111111111111111111111111111111111111112 for SOL)
     * @param string $outputToken Mint address (e.g. EPjFWdd5AufqSSqeM2qN1xzybapC8G4wEGGkZwyTDt1v for USDC)
     * @param string $amount Raw input amount (in smallest units / lamports)
     * @param array<string, mixed> $options
     * @return array<string, mixed>
     */
    public function quote(string $inputToken, string $outputToken, string $amount, array $options = []): array
    {
        $payload = $this->mockFixture;

        if ($payload === null) {
            $apiUrl = (string) (getenv('JUPITER_QUOTE_API') ?: 'https://quote-api.jup.ag/v6/quote');
            $slippageBps = (int) ($options['slippage_bps'] ?? 50);
            $query = http_build_query([
                'inputMint'   => $inputToken,
                'outputMint'  => $outputToken,
                'amount'      => $amount,
                'slippageBps' => $slippageBps,
            ]);

            $url = $apiUrl . '?' . $query;
            $ctx = stream_context_create([
                'http' => [
                    'timeout' => 5,
                    'header'  => "Accept: application/json\r\nUser-Agent: MyMIWallet-Swaps/1.0\r\n",
                ],
            ]);

            $raw = @file_get_contents($url, false, $ctx);
            if ($raw === false) {
                return [
                    'ok'      => false,
                    'error'   => 'provider_unavailable',
                    'message' => 'Jupiter swap quote API is currently unavailable.',
                ];
            }

            $payload = json_decode($raw, true);
        }

        if (!is_array($payload) || !isset($payload['outAmount'])) {
            return [
                'ok'      => false,
                'error'   => 'quote_failed',
                'message' => $payload['error'] ?? 'Could not calculate swap quote.',
            ];
        }

        $feeBps = (int) (getenv('SWAP_PLATFORM_FEE_BPS') ?: 50); // 0.50%
        $outAmount = (string) $payload['outAmount'];
        $feeRatio = $feeBps / 10000;
        $platformFeeAmount = (string) (int) floor((float) $outAmount * $feeRatio);
        $netOutAmount = (string) ((int) $outAmount - (int) $platformFeeAmount);

        $routes = [];
        if (!empty($payload['routePlan']) && is_array($payload['routePlan'])) {
            foreach ($payload['routePlan'] as $step) {
                $routes[] = $step['swapInfo']['label'] ?? 'DEX';
            }
        }
        $routeSummary = empty($routes) ? 'Direct' : implode(' -> ', array_unique($routes));

        $canExecute = getenv('SWAPS_EXECUTE') === 'true';

        return [
            'ok'                  => true,
            'provider'            => 'jupiter',
            'chain'               => 'solana',
            'input_token'         => $inputToken,
            'output_token'        => $outputToken,
            'input_amount'        => $amount,
            'gross_output_amount' => $outAmount,
            'net_output_amount'   => $netOutAmount,
            'platform_fee_bps'    => $feeBps,
            'platform_fee_amount' => $platformFeeAmount,
            'price_impact_pct'    => (float) ($payload['priceImpactPct'] ?? 0.0),
            'network_fee_est'     => '0.000005 SOL',
            'route_summary'       => $routeSummary,
            'execution_allowed'   => $canExecute,
            'execution_note'      => $canExecute ? 'Ready for user signature.' : 'Swap execution is disabled on this network (quotes only).',
        ];
    }
}

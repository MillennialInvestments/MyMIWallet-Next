<?php

namespace App\Libraries\Swaps\Providers;

use App\Libraries\Swaps\SwapQuoteProvider;

/**
 * 0x Protocol DEX aggregator adapter for EVM token swaps (Ethereum, Base, etc.).
 * Non-custodial: user signs transactions directly in MetaMask/Coinbase Wallet/etc.
 */
class ZeroExSwapProvider implements SwapQuoteProvider
{
    protected ?array $mockFixture = null;

    public function __construct(?array $mockFixture = null)
    {
        $this->mockFixture = $mockFixture;
    }

    public function name(): string
    {
        return 'zeroex';
    }

    /**
     * @param string $inputToken Token address (e.g. 0xeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee for native ETH)
     * @param string $outputToken Token address (e.g. 0xa0b86991c6218b36c1d19d4a2e9eb0ce3606eb48 for USDC)
     * @param string $amount Raw sell amount (in wei or token smallest units)
     * @param array<string, mixed> $options
     * @return array<string, mixed>
     */
    public function quote(string $inputToken, string $outputToken, string $amount, array $options = []): array
    {
        $payload = $this->mockFixture;

        if ($payload === null) {
            $apiUrl = (string) (getenv('ZEROEX_QUOTE_API') ?: 'https://api.0x.org/swap/v1/quote');
            $apiKey = (string) (getenv('ZEROEX_API_KEY') ?: '');
            $chainId = (int) ($options['chain_id'] ?? 1);

            $query = http_build_query([
                'buyToken'   => $outputToken,
                'sellToken'  => $inputToken,
                'sellAmount' => $amount,
            ]);

            $url = $apiUrl . '?' . $query;
            $headers = "Accept: application/json\r\nUser-Agent: MyMIWallet-Swaps/1.0\r\n";
            if ($apiKey !== '') {
                $headers .= "0x-api-key: {$apiKey}\r\n";
            }
            if ($chainId !== 1) {
                $headers .= "0x-chain-id: {$chainId}\r\n";
            }

            $ctx = stream_context_create([
                'http' => [
                    'timeout' => 5,
                    'header'  => $headers,
                ],
            ]);

            $raw = @file_get_contents($url, false, $ctx);
            if ($raw === false) {
                return [
                    'ok'      => false,
                    'error'   => 'provider_unavailable',
                    'message' => '0x swap quote API is currently unavailable.',
                ];
            }

            $payload = json_decode($raw, true);
        }

        if (!is_array($payload) || !isset($payload['buyAmount'])) {
            return [
                'ok'      => false,
                'error'   => 'quote_failed',
                'message' => $payload['reason'] ?? $payload['error'] ?? 'Could not calculate swap quote.',
            ];
        }

        $feeBps = (int) (getenv('SWAP_PLATFORM_FEE_BPS') ?: 50); // 0.50%
        $outAmount = (string) $payload['buyAmount'];
        $feeRatio = $feeBps / 10000;
        $platformFeeAmount = (string) (int) floor((float) $outAmount * $feeRatio);
        $netOutAmount = (string) ((int) $outAmount - (int) $platformFeeAmount);

        $sources = [];
        if (!empty($payload['sources']) && is_array($payload['sources'])) {
            foreach ($payload['sources'] as $source) {
                if ((float) ($source['proportion'] ?? 0) > 0) {
                    $sources[] = $source['name'];
                }
            }
        }
        $routeSummary = empty($sources) ? 'DEX aggregator' : implode(', ', $sources);

        $gasUnits = (float) ($payload['gas'] ?? 150000);
        $gasPrice = (float) ($payload['gasPrice'] ?? 20000000000);
        $gasEth = number_format(($gasUnits * $gasPrice) / 1e18, 6, '.', '');

        $canExecute = getenv('SWAPS_EXECUTE') === 'true';

        return [
            'ok'                  => true,
            'provider'            => 'zeroex',
            'chain'               => 'ethereum',
            'input_token'         => $inputToken,
            'output_token'        => $outputToken,
            'input_amount'        => $amount,
            'gross_output_amount' => $outAmount,
            'net_output_amount'   => $netOutAmount,
            'platform_fee_bps'    => $feeBps,
            'platform_fee_amount' => $platformFeeAmount,
            'price_impact_pct'    => (float) ($payload['estimatedPriceImpact'] ?? 0.0),
            'network_fee_est'     => $gasEth . ' ETH',
            'route_summary'       => $routeSummary,
            'allowance_target'    => $payload['allowanceTarget'] ?? null,
            'execution_allowed'   => $canExecute,
            'execution_note'      => $canExecute ? 'Ready for user signature.' : 'Swap execution is disabled on this network (quotes only).',
        ];
    }
}

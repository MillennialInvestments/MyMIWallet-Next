<?php

namespace App\Services\Swaps;

use App\Libraries\Swaps\Providers\JupiterSwapProvider;
use App\Libraries\Swaps\Providers\ZeroExSwapProvider;
use App\Libraries\Swaps\SwapQuoteProvider;
use App\Services\Compliance\SanctionsScreen;

/**
 * Service for non-custodial DEX swaps.
 *
 * Core Guarantees:
 * 1. Non-custodial: MyMI never holds keys or user funds. All swaps are signed
 *    by the user in their own self-custody wallet.
 * 2. Sanctions Screening: User wallet addresses are screened against OFAC SDN lists.
 * 3. Execution Gating: On testnet/staging, swaps are quote-only unless SWAPS_EXECUTE=true.
 */
class SwapService
{
    protected ?SwapQuoteProvider $solanaProvider = null;
    protected ?SwapQuoteProvider $evmProvider = null;
    protected ?SanctionsScreen $sanctionsScreen = null;

    public function __construct(
        ?SwapQuoteProvider $solanaProvider = null,
        ?SwapQuoteProvider $evmProvider = null,
        ?SanctionsScreen $sanctionsScreen = null
    ) {
        $this->solanaProvider = $solanaProvider ?? new JupiterSwapProvider();
        $this->evmProvider = $evmProvider ?? new ZeroExSwapProvider();
        $this->sanctionsScreen = $sanctionsScreen ?? new SanctionsScreen();
    }

    /**
     * Get a non-custodial swap quote.
     *
     * @param string $chain 'solana', 'ethereum', 'base'
     * @param string $inputToken Token address/mint
     * @param string $outputToken Token address/mint
     * @param string $amount Raw or unit amount
     * @param string|null $walletAddress Optional user self-custody wallet address
     * @param array<string, mixed> $options
     * @return array<string, mixed>
     */
    public function getQuote(
        string $chain,
        string $inputToken,
        string $outputToken,
        string $amount,
        ?string $walletAddress = null,
        array $options = []
    ): array {
        $cleanChain = strtolower(trim($chain));

        // Compliance: Screen user wallet address if supplied
        if ($walletAddress !== null && trim($walletAddress) !== '') {
            if ($this->sanctionsScreen->isSanctioned($walletAddress)) {
                return [
                    'ok'      => false,
                    'error'   => 'sanctions_hold',
                    'message' => 'Wallet address is held for compliance review.',
                ];
            }
        }

        if ($cleanChain === 'solana') {
            return $this->solanaProvider->quote($inputToken, $outputToken, $amount, $options);
        }

        if (in_array($cleanChain, ['ethereum', 'base', 'polygon', 'arbitrum', 'optimism', 'avalanche', 'bsc', 'evm'], true)) {
            $options['chain_id'] = $options['chain_id'] ?? match ($cleanChain) {
                'polygon'   => 137,
                'arbitrum'  => 42161,
                'optimism'  => 10,
                'avalanche' => 43114,
                'bsc'       => 56,
                'base'      => 8453,
                default     => 1,
            };
            return $this->evmProvider->quote($inputToken, $outputToken, $amount, $options);
        }

        return [
            'ok'      => false,
            'error'   => 'unsupported_chain',
            'message' => "Chain '{$chain}' is not supported for swaps.",
        ];
    }
}

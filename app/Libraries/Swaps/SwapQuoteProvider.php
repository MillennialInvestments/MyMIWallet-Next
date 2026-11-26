<?php

namespace App\Libraries\Swaps;

/**
 * MYMI-XCHAIN-001 W5: Non-custodial swap quote provider interface.
 *
 * All swap operations are non-custodial: the user signs in their own wallet
 * and MyMI never holds keys or custody of funds.
 */
interface SwapQuoteProvider
{
    /**
     * Provider identifier (e.g. 'jupiter', 'zeroex').
     */
    public function name(): string;

    /**
     * Get a swap quote.
     *
     * @param string $inputToken Token identifier / mint / address
     * @param string $outputToken Token identifier / mint / address
     * @param string $amount Raw or decimal input amount
     * @param array<string, mixed> $options
     * @return array<string, mixed>
     */
    public function quote(string $inputToken, string $outputToken, string $amount, array $options = []): array;
}

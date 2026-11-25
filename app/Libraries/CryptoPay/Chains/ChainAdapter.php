<?php

declare(strict_types=1);

namespace App\Libraries\CryptoPay\Chains;

/**
 * One chain's part of crypto checkout: price the order in the chain's asset,
 * say where the chain is now, and find payments that pay a checkout.
 *
 * A checkout is told apart from others either by a unique amount
 * (MATCH_AMOUNT: the last digits of the amount are a per-checkout tag) or by
 * a destination tag (MATCH_TAG, XRP Ledger).
 */
interface ChainAdapter
{
    public const MATCH_AMOUNT = 'amount';
    public const MATCH_TAG = 'tag';

    public function chain(): string;

    /** 'USDC', 'XRP' or 'BTC'. */
    public function asset(): string;

    /** Base units per whole coin, as a power of ten (6 USDC, 6 XRP drops, 8 sats). */
    public function decimals(): int;

    public function matchMode(): string;

    /** Largest per-checkout tag added to the amount (MATCH_AMOUNT only). */
    public function maxAmountTag(): int;

    /** Amounts are rounded to this many base units before the tag is added. */
    public function amountStep(): int;

    public function validAddress(string $address): bool;

    /**
     * Base units (before any tag) for $cents US cents, at the rate in force.
     *
     * @return array{amount: int, rate: string}|null null when no trustworthy price is available
     */
    public function quote(int $cents): ?array;

    /** Current block / ledger / tip height, or null when the chain cannot be reached. */
    public function cursor(): ?int;

    /**
     * Payments to $row's recipient that pay exactly this checkout.
     *
     * Each payment may carry 'time' (Unix seconds the chain says it settled), so
     * a payment made after the checkout expired is not delivered at an old rate.
     *
     * @return array{0: list<array{id: string, amount: int, payer: string, confirmations: int, time?: ?int}>, 1: bool, 2: ?int}
     *         [payments, complete, scanned_to]: complete is false when any lookup failed, so
     *         "no payment" is never concluded from a partial answer; scanned_to is how far
     *         the chain was read (block or ledger), so the next sweep can continue from there.
     *         Endpoints are used only after they prove they are on the configured network.
     */
    public function payments(array $row): array;

    /** Link or QR text a wallet can open. */
    public function paymentUri(array $row): string;
}

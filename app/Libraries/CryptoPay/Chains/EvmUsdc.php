<?php

declare(strict_types=1);

namespace App\Libraries\CryptoPay\Chains;

use App\Libraries\CryptoPay\Http;

/**
 * USDC on an EVM chain (Ethereum, Base). A checkout is matched by its exact
 * amount: the price in USDC plus a per-checkout tag under one cent, paid to
 * MyMI's address. Payments are read from the USDC contract's Transfer logs,
 * so no node keys or wallet access are needed.
 */
final class EvmUsdc implements ChainAdapter
{
    /** keccak256("Transfer(address,address,uint256)") */
    public const TRANSFER_TOPIC = '0xddf252ad1be2c89b69c2b068fc378daa952ba7f163c4a11628f55a4df523b3ef';
    /** Blocks per eth_getLogs call and calls per sweep (public RPCs cap the range). */
    private const CHUNK = 1000;
    private const MAX_CHUNKS = 10;

    /** @param list<string> $endpoints */
    public function __construct(
        private string $chain,
        private int $chainId,
        private string $usdc,
        private array $endpoints,
        private Http $http,
        private int $confirmations,
    ) {
        $this->usdc = strtolower($usdc);
    }

    public function chain(): string
    {
        return $this->chain;
    }

    public function asset(): string
    {
        return 'USDC';
    }

    public function decimals(): int
    {
        return 6;
    }

    public function matchMode(): string
    {
        return self::MATCH_AMOUNT;
    }

    public function maxAmountTag(): int
    {
        return 9999; // under one cent of USDC
    }

    public function amountStep(): int
    {
        return 10000; // one cent
    }

    public function chainId(): int
    {
        return $this->chainId;
    }

    public function contract(): string
    {
        return $this->usdc;
    }

    public function validAddress(string $address): bool
    {
        return (bool) preg_match('/^0x[0-9a-fA-F]{40}$/', $address);
    }

    public function quote(int $cents): ?array
    {
        return ['amount' => $cents * 10000, 'rate' => '1'];
    }

    public function cursor(): ?int
    {
        $hex = $this->rpc('eth_blockNumber', []);
        return is_string($hex) && preg_match('/^0x[0-9a-f]+$/i', $hex) ? (int) hexdec($hex) : null;
    }

    public function payments(array $row): array
    {
        $latest = $this->cursor();
        if ($latest === null) {
            return [[], false, null];
        }
        $recipient = strtolower((string) $row['recipient']);
        $topicTo = '0x' . str_pad(substr($recipient, 2), 64, '0', STR_PAD_LEFT);
        $from = max((int) $row['start_cursor'], (int) ($row['scan_cursor'] ?? 0) + 1);
        $found = [];
        $complete = true;
        $readTo = $from - 1;
        for ($i = 0; $i < self::MAX_CHUNKS && $from <= $latest; $i++) {
            $to = min($latest, $from + self::CHUNK - 1);
            $logs = $this->rpc('eth_getLogs', [[
                'fromBlock' => '0x' . dechex($from), 'toBlock' => '0x' . dechex($to),
                'address' => $this->usdc, 'topics' => [self::TRANSFER_TOPIC, null, $topicTo],
            ]]);
            if (! is_array($logs)) {
                $complete = false;
                break;
            }
            foreach ($logs as $log) {
                $p = $this->match($log, $row, $topicTo, $latest);
                if ($p !== null) {
                    $found[] = $p;
                }
            }
            $readTo = $to;
            $from = $to + 1;
        }
        if ($from <= $latest) {
            $complete = false; // more blocks than one sweep reads; the next sweep continues
        }
        // Only blocks deep enough to be final are skipped next time; newer ones are read again.
        $scannedTo = min($readTo, $latest - $this->confirmations + 1);

        return [$found, $complete, $scannedTo >= (int) $row['start_cursor'] ? $scannedTo : null];
    }

    /** @return array{id: string, amount: int, payer: string, confirmations: int}|null */
    private function match(mixed $log, array $row, string $topicTo, int $latest): ?array
    {
        if (! is_array($log) || ! empty($log['removed']) || strtolower((string) ($log['address'] ?? '')) !== $this->usdc) {
            return null;
        }
        $topics = array_map(static fn ($t): string => strtolower((string) $t), (array) ($log['topics'] ?? []));
        if (count($topics) !== 3 || $topics[0] !== self::TRANSFER_TOPIC || $topics[2] !== $topicTo) {
            return null;
        }
        $amount = self::hexAmount((string) ($log['data'] ?? ''));
        $block = preg_match('/^0x[0-9a-f]+$/i', (string) ($log['blockNumber'] ?? '')) ? (int) hexdec((string) $log['blockNumber']) : 0;
        $tx = strtolower((string) ($log['transactionHash'] ?? ''));
        if ($amount === null || $amount !== (int) $row['asset_amount'] || $block < (int) $row['start_cursor'] || ! preg_match('/^0x[0-9a-f]{64}$/', $tx)) {
            return null;
        }
        $logIndex = preg_match('/^0x[0-9a-f]+$/i', (string) ($log['logIndex'] ?? '')) ? (int) hexdec((string) $log['logIndex']) : 0;

        return [
            'id'            => $this->chain . ':' . $tx . ':' . $logIndex,
            'amount'        => $amount,
            'payer'         => '0x' . substr($topics[1], -40),
            'confirmations' => $latest - $block + 1,
        ];
    }

    /** A uint256 log value that fits in an int, or null. */
    public static function hexAmount(string $data): ?int
    {
        if (! preg_match('/^0x[0-9a-f]{1,64}$/i', $data)) {
            return null;
        }
        $hex = ltrim(substr($data, 2), '0');
        if ($hex === '') {
            return 0;
        }
        return strlen($hex) > 15 ? null : (int) hexdec($hex);
    }

    public function paymentUri(array $row): string
    {
        return sprintf('ethereum:%s@%d/transfer?address=%s&uint256=%s', $this->usdc, $this->chainId, strtolower((string) $row['recipient']), (string) $row['asset_amount']);
    }

    private function rpc(string $method, array $params): mixed
    {
        foreach ($this->endpoints as $url) {
            $json = $this->http->postJson($url, ['jsonrpc' => '2.0', 'id' => 1, 'method' => $method, 'params' => $params]);
            if (is_array($json) && array_key_exists('result', $json)) {
                return $json['result'];
            }
        }
        return null;
    }
}

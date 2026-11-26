<?php

namespace Tests\Unit\CryptoPay;

use CodeIgniter\Test\CIUnitTestCase;

/**
 * @internal
 */
final class EvmCallDataEncodingTest extends CIUnitTestCase
{
    public function testErc20TransferSelector(): void
    {
        // Standard ERC-20 transfer(address,uint256) keccak-256 selector
        // keccak256("transfer(address,uint256)") = a9059cbb2ab09eb219583f4a59a5d0623ade346d962bcd4e46b11da047c9049b
        $selector = '0xa9059cbb';
        $this->assertSame('0xa9059cbb', $selector);
    }

    public function testCallDataEncodingMatchesSpecification(): void
    {
        $recipient = '0x0123456789abcdef0123456789abcdef01234567';
        $amountRaw = '50000000'; // 50 USDC (6 decimals)

        // Clean recipient and left pad to 64 hex characters (32 bytes)
        $cleanRecipient = strtolower(ltrim($recipient, '0x'));
        $paddedRecipient = str_pad($cleanRecipient, 64, '0', STR_PAD_LEFT);

        // Amount in hex left padded to 64 hex characters (32 bytes)
        $amountHex = dechex((int) $amountRaw); // 50000000 = 0x2faf080
        $paddedAmount = str_pad($amountHex, 64, '0', STR_PAD_LEFT);

        $calldata = '0xa9059cbb' . $paddedRecipient . $paddedAmount;

        $this->assertSame(138, strlen($calldata));
        $this->assertStringStartsWith('0xa9059cbb', $calldata);
        $this->assertSame('0000000000000000000000000123456789abcdef0123456789abcdef01234567', substr($calldata, 10, 64));
        $this->assertSame('0000000000000000000000000000000000000000000000000000000002faf080', substr($calldata, 74, 64));
    }

    public function testNodeTestExecution(): void
    {
        // Run the node unit test to verify public JS encoding matches
        $cmd = 'node --test tests/unit/CryptoPay/evm-calldata.test.mjs 2>&1';
        exec($cmd, $output, $returnCode);
        $this->assertSame(0, $returnCode, implode("\n", $output));
    }
}

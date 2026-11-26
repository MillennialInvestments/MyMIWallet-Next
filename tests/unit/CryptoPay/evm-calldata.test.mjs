import test from 'node:test';
import assert from 'node:assert/strict';
import '../../../public/assets/js/solana-pay/checkout.js';

const { hex64, encodeErc20Transfer } = globalThis;

test('hex64 pads values to 64 hex characters and strips leading 0x', () => {
  assert.equal(hex64('0x1234'), '0000000000000000000000000000000000000000000000000000000000001234');
  assert.equal(hex64('abcd'), '000000000000000000000000000000000000000000000000000000000000abcd');
  assert.equal(hex64('').length, 64);
});

test('encodeErc20Transfer formats ERC-20 transfer(address,uint256) correctly', () => {
  const recipient = '0x0123456789abcdef0123456789abcdef01234567';
  const amountRaw = '50000000'; // 50 USDC (6 decimals) -> 0x2faf080

  const calldata = encodeErc20Transfer(recipient, amountRaw);

  // Starts with transfer(address,uint256) selector: 0xa9059cbb
  assert.ok(calldata.startsWith('0xa9059cbb'), 'Must begin with 0xa9059cbb selector');
  
  // Length is 2 ('0x') + 8 (selector) + 64 (recipient) + 64 (amount) = 138 characters
  assert.equal(calldata.length, 138, 'Calldata must be exactly 138 characters long');

  // Verify recipient slice
  const recipientSlice = calldata.slice(10, 74);
  assert.equal(recipientSlice, '0000000000000000000000000123456789abcdef0123456789abcdef01234567');

  // Verify amount slice
  const amountSlice = calldata.slice(74, 138);
  assert.equal(amountSlice, '0000000000000000000000000000000000000000000000000000000002faf080');
});

test('encodeErc20Transfer handles zero amount and mixed-case recipient', () => {
  const recipient = '0xAbCdEf0123456789AbCdEf0123456789AbCdEf01';
  const calldata = encodeErc20Transfer(recipient, '0');

  assert.equal(calldata.slice(10, 74), '000000000000000000000000abcdef0123456789abcdef0123456789abcdef01');
  assert.equal(calldata.slice(74, 138), '0000000000000000000000000000000000000000000000000000000000000000');
});

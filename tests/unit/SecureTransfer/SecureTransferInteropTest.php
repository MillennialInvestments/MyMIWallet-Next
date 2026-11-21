<?php

namespace Tests\Unit\SecureTransfer;

use App\Libraries\SecureTransfer\Base58;
use App\Libraries\SecureTransfer\ManifestValidator;
use App\Libraries\SecureTransfer\TransferCrypto;
use CodeIgniter\Test\CIUnitTestCase;
use Config\SecureTransfer;

/**
 * The browser client (public/assets/js/secure-transfer/mst1.js) and the PHP side
 * must produce and accept the same bytes. Runs the JS under Node; skipped when
 * Node is not installed.
 */
final class SecureTransferInteropTest extends CIUnitTestCase
{
    private function node(array $args): array
    {
        $node = trim((string) shell_exec('command -v node 2>/dev/null'));
        if ($node === '') {
            $this->markTestSkipped('node not installed');
        }
        $cmd = escapeshellarg($node) . ' ' . escapeshellarg(ROOTPATH . 'tests/js/mst1-interop.cjs');
        foreach ($args as $a) {
            $cmd .= ' ' . escapeshellarg((string) $a);
        }
        $out = json_decode((string) shell_exec($cmd), true);
        $this->assertIsArray($out);
        $this->assertArrayNotHasKey('error', $out, $out['error'] ?? '');
        return $out;
    }

    public function testBrowserSealedTransferIsAcceptedAndOpenedByPhp(): void
    {
        $now = time();
        $wallet = Base58::encode(sodium_crypto_sign_publickey(sodium_crypto_sign_keypair()));
        $device = sodium_crypto_box_keypair();
        $out = $this->node(['seal', $wallet, base64_encode(sodium_crypto_box_publickey($device)), $now]);

        $config = new SecureTransfer();
        $this->assertSame([], (new ManifestValidator($config))->validate($out['manifest'], $out['signature'], $now));
        [$plain, $meta] = TransferCrypto::open(base64_decode($out['ciphertext']), $out['manifest'], $wallet, $device);
        $this->assertSame(70000, strlen($plain));
        $this->assertSame(chr((69999 * 7) & 255), $plain[69999]);
        $this->assertSame('from-node.bin', $meta['name']);
    }

    public function testPhpSealedTransferIsOpenedAndVerifiedByBrowser(): void
    {
        $now = time();
        $sender = sodium_crypto_sign_keypair();
        $senderWallet = Base58::encode(sodium_crypto_sign_publickey($sender));
        $recipientWallet = Base58::encode(sodium_crypto_sign_publickey(sodium_crypto_sign_keypair()));
        $device = sodium_crypto_box_keypair();
        $plain = str_repeat("MyMI \u{1F512} ", 9000);
        [$ct, $m] = TransferCrypto::seal($plain, 'café.txt', 'text/plain', $senderWallet,
            base64_encode(sodium_crypto_box_publickey(sodium_crypto_box_keypair())),
            [['wallet' => $recipientWallet, 'transfer_key' => base64_encode(sodium_crypto_box_publickey($device))]], $now + 60, $now);
        $sig = base64_encode(sodium_crypto_sign_detached(TransferCrypto::manifestMessage($m), sodium_crypto_sign_secretkey($sender)));
        $file = tempnam(sys_get_temp_dir(), 'mst1');
        file_put_contents($file, json_encode(['manifest' => $m, 'signature' => $sig, 'ciphertext' => base64_encode($ct), 'wallet' => $recipientWallet,
            'device_public' => base64_encode(sodium_crypto_box_publickey($device)), 'device_secret' => base64_encode(sodium_crypto_box_secretkey($device))]));
        try {
            $out = $this->node(['open', $file]);
        } finally {
            unlink($file);
        }
        $this->assertTrue($out['signature_ok']);
        $this->assertSame($plain, base64_decode($out['plain']));
        $this->assertSame('café.txt', $out['meta']['name']);
        $this->assertSame(TransferCrypto::canonicalJson($m), $out['canonical']);
    }
}

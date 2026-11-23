<?php

namespace Tests\Unit\SecureTransfer;

use App\Libraries\SecureTransfer\ArrayAuditLog;
use App\Libraries\SecureTransfer\ArrayTransferStore;
use App\Libraries\SecureTransfer\AuditLog;
use App\Libraries\SecureTransfer\Base58;
use App\Libraries\SecureTransfer\CiphertextStore;
use App\Libraries\SecureTransfer\ManifestValidator;
use App\Libraries\SecureTransfer\SecureTransferService;
use App\Libraries\SecureTransfer\TransferCrypto;
use CodeIgniter\Test\CIUnitTestCase;
use Config\SecureTransfer;

/**
 * MyMI Secure Transfer (MST1): crypto round trips, manifest checks and the
 * service rules, with an in-memory store and a temporary ciphertext directory.
 */
class SecureTransferTest extends CIUnitTestCase
{
    protected string $dir;
    protected int $now = 1_800_000_000;

    protected function setUp(): void
    {
        parent::setUp();
        $this->dir = sys_get_temp_dir() . '/mst1-' . bin2hex(random_bytes(4));
        mkdir($this->dir, 0700, true);
    }

    protected function tearDown(): void
    {
        $it = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($this->dir, \FilesystemIterator::SKIP_DOTS), \RecursiveIteratorIterator::CHILD_FIRST);
        foreach ($it as $f) {
            $f->isDir() ? rmdir($f->getPathname()) : unlink($f->getPathname());
        }
        rmdir($this->dir);
        parent::tearDown();
    }

    /** A wallet = Ed25519 signing key pair; a device = X25519 box key pair. */
    private function wallet(): array
    {
        $kp = sodium_crypto_sign_keypair();
        return ['kp' => $kp, 'address' => Base58::encode(sodium_crypto_sign_publickey($kp))];
    }

    private function sign(array $wallet, string $message): string
    {
        return base64_encode(sodium_crypto_sign_detached($message, sodium_crypto_sign_secretkey($wallet['kp'])));
    }

    private function config(): SecureTransfer
    {
        $c = new SecureTransfer();
        $c->enabled = true;
        $c->storagePath = $this->dir . '/store';
        return $c;
    }

    protected function newStore(): \App\Libraries\SecureTransfer\TransferStore
    {
        return new ArrayTransferStore();
    }

    protected function newAudit(): AuditLog
    {
        return new ArrayAuditLog();
    }

    /** Simulates someone editing a stored entry behind the application's back. */
    protected function editAuditRow(AuditLog $audit, int $id, array $set): void
    {
        $this->assertInstanceOf(ArrayAuditLog::class, $audit);
        $audit->rows[$id - 1] = array_merge($audit->rows[$id - 1], $set);
    }

    private function service(?\App\Libraries\SecureTransfer\TransferStore $store = null, ?SecureTransfer $config = null, ?AuditLog $audit = null): array
    {
        $store ??= $this->newStore();
        $svc = new SecureTransferService($config ?? $this->config(), $store, fn () => $this->now, $audit);
        return [$svc, $store];
    }

    /** Alice (user 1) sends one file to Bob (user 2) with the given expiry; returns [svc, files, manifest, alice, bob]. */
    private function sentTransfer(AuditLog $audit, int $ttl = 86400): array
    {
        [$svc] = $this->service(null, null, $audit);
        $svc->withRequest('203.0.113.7', 'TestBrowser/1.0');
        $files = new CiphertextStore($this->dir . '/store');
        $alice = $this->wallet();
        $bob = $this->wallet();
        $dev = $this->bind($svc, 1, $alice);
        $this->bind($svc, 2, $bob);
        $bobKey = $svc->recipientKeys($bob['address'])['keys'][0]['transfer_key'];
        [$ct, $m] = TransferCrypto::seal('evidence', 'a.txt', 'text/plain', $alice['address'], base64_encode(sodium_crypto_box_publickey($dev)),
            [['wallet' => $bob['address'], 'transfer_key' => $bobKey]], $this->now + $ttl, $this->now);
        $sent = $svc->send(1, $m, $this->sign($alice, TransferCrypto::manifestMessage($m)), $this->upload($ct), $files);
        $this->assertTrue($sent['ok'], json_encode($sent));
        return [$svc, $files, $m, $alice, $bob, $ct];
    }

    public function testInvestigationRecordTracksWhoSentWhatAndIsTamperEvident(): void
    {
        $audit = $this->newAudit();
        [$svc, $files, $m, $alice, $bob, $ct] = $this->sentTransfer($audit);
        $this->assertTrue($svc->download(2, $m['transfer_id'], $bob['address'], $files, 'manifest')['ok']);
        $this->assertTrue($svc->download(2, $m['transfer_id'], $bob['address'], $files)['ok']);
        $this->assertFalse($svc->download(1, $m['transfer_id'], $alice['address'], $files)['ok']);
        // A forged send is refused and still recorded.
        $forged = $svc->send(1, $m, base64_encode(str_repeat("\0", 64)), $this->upload($ct), $files);
        $this->assertFalse($forged['ok']);

        $events = array_column($audit->find([]), 'event');
        $this->assertSame(['key_linked', 'key_linked', 'transfer_sent', 'transfer_accessed', 'transfer_accessed', 'transfer_refused'], $events);

        $sent = $audit->find(['transfer_id' => $m['transfer_id']])[0];
        $this->assertSame('transfer_sent', $sent['event']);
        $this->assertSame(1, (int) $sent['user_id']);
        $this->assertSame($alice['address'], $sent['wallet']);
        $this->assertSame('203.0.113.7', $sent['ip']);
        $this->assertSame('TestBrowser/1.0', $sent['user_agent']);
        $detail = json_decode($sent['detail'], true);
        $this->assertSame([$bob['address']], $detail['recipients']);
        $this->assertSame(hash('sha256', $ct), $detail['ciphertext_sha256']);
        $this->assertStringNotContainsString('evidence', json_encode($audit->find([])));
        $this->assertStringNotContainsString('a.txt', json_encode($audit->find([])));

        // Who touched Bob's wallet: his key link, the transfer to him, his downloads.
        $this->assertCount(4, $audit->find(['wallet' => $bob['address']]));
        $this->assertCount(3, $audit->find(['user_id' => 2]));
        $this->assertSame(['ok' => true, 'entries' => 6], $audit->verify());

        // Changing one recorded entry afterwards is detected at that entry.
        $this->editAuditRow($audit, 3, ['ip' => '198.51.100.1']);
        $broken = $audit->verify();
        $this->assertFalse($broken['ok']);
        $this->assertSame(3, $broken['broken_at']);
    }

    public function testLegalHoldKeepsCiphertextThroughWithdrawAndPurge(): void
    {
        $audit = $this->newAudit();
        [$svc, $files, $m, $alice] = $this->sentTransfer($audit, 60);
        $holdId = $audit->setHold('wallet', $alice['address'], 'subpoena 2026-001', 'owner', $this->now);
        $this->assertTrue($audit->isHeld($m['transfer_id'], 1, [$alice['address']]));

        $this->assertTrue($svc->revokeTransfer(1, $m['transfer_id'], $files)['ok']);
        $this->assertNotNull($files->path($m['transfer_id']), 'held ciphertext must survive withdraw');
        $this->now += 61;
        $this->assertSame(['ok' => true, 'purgeable' => 0, 'held' => 1, 'applied' => true], $svc->purge($files, true));
        $this->assertNotNull($files->path($m['transfer_id']), 'held ciphertext must survive purge');

        $this->assertTrue($audit->releaseHold($holdId, 'owner', $this->now));
        $this->assertFalse($audit->releaseHold($holdId, 'owner', $this->now));
        $this->assertSame([], $audit->activeHolds());
        $this->assertSame(1, $svc->purge($files, true)['purgeable']);
        $this->assertNull($files->path($m['transfer_id']));
        $events = array_column($audit->find(['transfer_id' => $m['transfer_id']]), 'event');
        $this->assertSame(['transfer_sent', 'transfer_withdrawn', 'transfer_purged'], $events);
        $this->assertTrue($audit->verify()['ok']);
    }

    public function testUserAndTransferHoldsMatchOnlyTheirScope(): void
    {
        $audit = $this->newAudit();
        $audit->setHold('user', '7', 'case', 'owner', $this->now);
        $audit->setHold('transfer', 'abc', 'case', 'owner', $this->now);
        $this->assertTrue($audit->isHeld('zzz', 7, []));
        $this->assertTrue($audit->isHeld('abc', 8, []));
        $this->assertFalse($audit->isHeld('zzz', 8, ['someWallet']));
        $this->assertCount(2, $audit->activeHolds());
    }

    /** Runs the two-step binding as the browser would; returns the device key pair. */
    private function bind(SecureTransferService $svc, int $userId, array $wallet): string
    {
        $device = sodium_crypto_box_keypair();
        $pub = base64_encode(sodium_crypto_box_publickey($device));
        $c = $svc->challenge($userId, $wallet['address']);
        $this->assertTrue($c['ok'], json_encode($c));
        $msg = TransferCrypto::bindingMessage($c['domain'], $wallet['address'], $pub, $c['nonce'], $c['issued_at']);
        $r = $svc->bindKey($userId, $wallet['address'], $pub, $c['nonce'], $c['issued_at'], $this->sign($wallet, $msg));
        $this->assertTrue($r['ok'], json_encode($r));
        return $device;
    }

    private function upload(string $bytes): string
    {
        $path = $this->dir . '/upload-' . bin2hex(random_bytes(4));
        file_put_contents($path, $bytes);
        return $path;
    }

    public function testBase58MatchesSolanaVectors(): void
    {
        $this->assertSame('11111111111111111111111111111111', Base58::encode(str_repeat("\0", 32)));
        $this->assertSame(str_repeat("\0", 32), Base58::decode('11111111111111111111111111111111'));
        for ($i = 0; $i < 20; $i++) {
            $b = random_bytes(32);
            $this->assertSame($b, Base58::decode(Base58::encode($b)));
        }
        $this->assertNull(Base58::decode('0OIl'));
        $this->assertNull(Base58::walletPublicKey('abc'));
    }

    public function testCanonicalJsonSortsKeysAndKeepsListOrder(): void
    {
        $this->assertSame('{"a":1,"b":{"c":"x/y","d":[3,1]}}', TransferCrypto::canonicalJson(['b' => ['d' => [3, 1], 'c' => 'x/y'], 'a' => 1]));
    }

    public function testSealAndOpenRoundTripForEveryRecipientOnly(): void
    {
        $alice = $this->wallet();
        $bob = $this->wallet();
        $carol = $this->wallet();
        $aliceDev = sodium_crypto_box_keypair();
        $bobDev = sodium_crypto_box_keypair();
        $carolDev = sodium_crypto_box_keypair();
        $plain = random_bytes(TransferCrypto::CHUNK_BYTES * 2 + 123);
        [$ct, $m] = TransferCrypto::seal($plain, 'deed.pdf', 'application/pdf', $alice['address'],
            base64_encode(sodium_crypto_box_publickey($aliceDev)),
            [['wallet' => $bob['address'], 'transfer_key' => base64_encode(sodium_crypto_box_publickey($bobDev))],
             ['wallet' => $carol['address'], 'transfer_key' => base64_encode(sodium_crypto_box_publickey($carolDev))]],
            $this->now + 86400, $this->now);
        $this->assertSame(3, $m['chunks']);
        $this->assertTrue(ManifestValidator::chunkCountMatches($m['ciphertext_bytes'], $m['chunks']));
        $this->assertStringNotContainsString('deed.pdf', json_encode($m)); // file name is sealed
        [$outB, $metaB] = TransferCrypto::open($ct, $m, $bob['address'], $bobDev);
        [$outC] = TransferCrypto::open($ct, $m, $carol['address'], $carolDev);
        $this->assertSame($plain, $outB);
        $this->assertSame($plain, $outC);
        $this->assertSame(['bytes' => strlen($plain), 'mime' => 'application/pdf', 'name' => 'deed.pdf'], $metaB);

        $this->expectExceptionMessage('key_unwrap_failed');
        $m2 = $m;
        $m2['recipients'][0]['wallet'] = $alice['address'];
        TransferCrypto::open($ct, $m2, $alice['address'], $aliceDev); // sender's own device is not a recipient key
    }

    public function testTamperedCiphertextOrSwappedChunksFail(): void
    {
        $a = $this->wallet();
        $b = $this->wallet();
        $dev = sodium_crypto_box_keypair();
        [$ct, $m] = TransferCrypto::seal(random_bytes(TransferCrypto::CHUNK_BYTES * 2), 'x', 'text/plain', $a['address'],
            base64_encode(sodium_crypto_box_publickey(sodium_crypto_box_keypair())),
            [['wallet' => $b['address'], 'transfer_key' => base64_encode(sodium_crypto_box_publickey($dev))]], $this->now + 60, $this->now);
        $step = TransferCrypto::CHUNK_BYTES + 16;
        $swapped = substr($ct, $step, $step) . substr($ct, 0, $step);
        $m['ciphertext_sha256'] = hash('sha256', $swapped); // even with a matching hash, nonces bind chunk order
        try {
            TransferCrypto::open($swapped, $m, $b['address'], $dev);
            $this->fail('swapped chunks opened');
        } catch (\InvalidArgumentException $e) {
            $this->assertSame('chunk_auth_failed', $e->getMessage());
        }
    }

    public function testEmptyFileIsOneChunk(): void
    {
        $a = $this->wallet();
        $dev = sodium_crypto_box_keypair();
        [$ct, $m] = TransferCrypto::seal('', 'empty', 'text/plain', $a['address'], base64_encode(sodium_crypto_box_publickey($dev)),
            [['wallet' => $a['address'], 'transfer_key' => base64_encode(sodium_crypto_box_publickey($dev))]], $this->now + 60, $this->now);
        $this->assertSame(1, $m['chunks']);
        $this->assertSame('', TransferCrypto::open($ct, $m, $a['address'], $dev)[0]);
    }

    public function testFullFlowBindSendInboxDownloadDecrypt(): void
    {
        [$svc, $store] = $this->service();
        $files = new CiphertextStore($this->dir . '/store');
        $alice = $this->wallet();
        $bob = $this->wallet();
        $aliceDev = $this->bind($svc, 1, $alice);
        $bobDev = $this->bind($svc, 2, $bob);

        $keys = $svc->recipientKeys($bob['address'])['keys'];
        $this->assertCount(1, $keys);
        // The sender can check the binding itself, without trusting the server.
        $this->assertTrue(TransferCrypto::verifyWalletSignature($bob['address'], $keys[0]['statement'], $keys[0]['signature']));

        [$ct, $m] = TransferCrypto::seal('wire instructions', 'note.txt', 'text/plain', $alice['address'],
            base64_encode(sodium_crypto_box_publickey($aliceDev)),
            [['wallet' => $bob['address'], 'transfer_key' => $keys[0]['transfer_key']]], $this->now + 86400, $this->now);
        $sig = $this->sign($alice, TransferCrypto::manifestMessage($m));
        $sent = $svc->send(1, $m, $sig, $this->upload($ct), $files);
        $this->assertTrue($sent['ok'], json_encode($sent));
        $this->assertStringNotContainsString('wire instructions', file_get_contents($files->path($m['transfer_id'])));
        $this->assertSame('0600', substr(sprintf('%o', fileperms($files->path($m['transfer_id']))), -4));

        $this->assertSame([], $svc->inbox(1)['transfers']);
        $inbox = $svc->inbox(2)['transfers'];
        $this->assertCount(1, $inbox);
        $this->assertNull($inbox[0]['downloaded_at']);
        $this->assertFalse($svc->download(1, $m['transfer_id'], $alice['address'], $files)['ok']); // sender is not a recipient

        $got = $svc->download(2, $m['transfer_id'], $bob['address'], $files);
        $this->assertTrue($got['ok']);
        $this->assertTrue(TransferCrypto::verifyWalletSignature($alice['address'], TransferCrypto::manifestMessage($got['manifest']), $got['signature']));
        [$plain, $meta] = TransferCrypto::open(file_get_contents($got['path']), $got['manifest'], $bob['address'], $bobDev);
        $this->assertSame('wire instructions', $plain);
        $this->assertSame('note.txt', $meta['name']);
        $this->assertNotNull($svc->inbox(2)['transfers'][0]['downloaded_at']);

        $this->assertSame(['ok' => true, 'enabled' => true, 'protocol' => 'MST1', 'live_transfers' => 1,
            'live_ciphertext_bytes' => strlen($ct), 'transfers_last_24h' => 1, 'wallets_with_keys' => 2], $svc->stats());
        $this->assertTrue($svc->revokeTransfer(1, $m['transfer_id'], $files)['ok']);
        $this->assertNull($files->path($m['transfer_id']));
        $this->assertSame([], $svc->inbox(2)['transfers']);
    }

    public function testBindingRefusesReplayWrongUserWrongDomainAndForgery(): void
    {
        [$svc] = $this->service();
        $w = $this->wallet();
        $other = $this->wallet();
        $pub = base64_encode(sodium_crypto_box_publickey(sodium_crypto_box_keypair()));
        $c = $svc->challenge(1, $w['address']);
        $msg = TransferCrypto::bindingMessage($c['domain'], $w['address'], $pub, $c['nonce'], $c['issued_at']);

        $this->assertSame('bad_wallet_signature', $svc->bindKey(1, $w['address'], $pub, $c['nonce'], $c['issued_at'], $this->sign($other, $msg))['error']);
        $phish = TransferCrypto::bindingMessage('evil.example', $w['address'], $pub, $c['nonce'], $c['issued_at']);
        $this->assertSame('bad_wallet_signature', $svc->bindKey(1, $w['address'], $pub, $c['nonce'], $c['issued_at'], $this->sign($w, $phish))['error']);
        $this->assertSame('challenge_missing_used_or_expired', $svc->bindKey(2, $w['address'], $pub, $c['nonce'], $c['issued_at'], $this->sign($w, $msg))['error']);
        $this->assertTrue($svc->bindKey(1, $w['address'], $pub, $c['nonce'], $c['issued_at'], $this->sign($w, $msg))['ok']);
        $this->assertSame('challenge_missing_used_or_expired', $svc->bindKey(1, $w['address'], $pub, $c['nonce'], $c['issued_at'], $this->sign($w, $msg))['error']);
        // Once bound, another account cannot claim the wallet.
        $this->assertSame('wallet_bound_to_another_account', $svc->challenge(2, $w['address'])['error']);
    }

    public function testExpiredChallengeIsRefused(): void
    {
        [$svc] = $this->service();
        $w = $this->wallet();
        $pub = base64_encode(sodium_crypto_box_publickey(sodium_crypto_box_keypair()));
        $c = $svc->challenge(1, $w['address']);
        $this->now += 301;
        $msg = TransferCrypto::bindingMessage($c['domain'], $w['address'], $pub, $c['nonce'], $c['issued_at']);
        $this->assertSame('statement_expired', $svc->bindKey(1, $w['address'], $pub, $c['nonce'], $c['issued_at'], $this->sign($w, $msg))['error']);
    }

    public function testSendRefusesForgedTamperedUnboundAndOversized(): void
    {
        [$svc] = $this->service();
        $files = new CiphertextStore($this->dir . '/store');
        $alice = $this->wallet();
        $bob = $this->wallet();
        $mallory = $this->wallet();
        $aliceDev = $this->bind($svc, 1, $alice);
        $this->bind($svc, 2, $bob);
        $bobKey = $svc->recipientKeys($bob['address'])['keys'][0]['transfer_key'];
        $seal = fn () => TransferCrypto::seal('hello', 'a', 'text/plain', $alice['address'], base64_encode(sodium_crypto_box_publickey($aliceDev)),
            [['wallet' => $bob['address'], 'transfer_key' => $bobKey]], $this->now + 3600, $this->now);

        [$ct, $m] = $seal();
        $this->assertSame('bad_sender_signature', $svc->send(1, $m, $this->sign($mallory, TransferCrypto::manifestMessage($m)), $this->upload($ct), $files)['error']);
        $good = $this->sign($alice, TransferCrypto::manifestMessage($m));
        $this->assertSame('sender_wallet_not_bound_to_you', $svc->send(2, $m, $good, $this->upload($ct), $files)['error']);
        $this->assertSame('ciphertext_hash_mismatch', $svc->send(1, $m, $good, $this->upload(strrev($ct)), $files)['error']);
        $m2 = $m;
        $m2['expires_at'] = $this->now + 31 * 86400;
        $this->assertSame('expires_at_out_of_range', $svc->send(1, $m2, $this->sign($alice, TransferCrypto::manifestMessage($m2)), $this->upload($ct), $files)['error']);
        $m3 = $m;
        $m3['recipients'][0]['wallet'] = $mallory['address'];
        $this->assertSame('recipient_key_not_active', $svc->send(1, $m3, $this->sign($alice, TransferCrypto::manifestMessage($m3)), $this->upload($ct), $files)['error']);
        $m4 = $m + ['note' => 'x'];
        $this->assertSame('unknown_fields', $svc->send(1, $m4, $good, $this->upload($ct), $files)['error']);

        $this->assertTrue($svc->send(1, $m, $good, $this->upload($ct), $files)['ok']);
        $this->assertSame('duplicate_transfer_id', $svc->send(1, $m, $good, $this->upload($ct), $files)['error']);

        $small = $this->config();
        $small->maxBytes = 10;
        [$svcSmall] = $this->service(null, $small);
        [$ct5, $m5] = $seal();
        $this->assertSame('ciphertext_size_out_of_range', $svcSmall->send(1, $m5, $this->sign($alice, TransferCrypto::manifestMessage($m5)), $this->upload($ct5), $files)['error']);
    }

    public function testDailyLimitsAndPurgeOfExpired(): void
    {
        $config = $this->config();
        $config->dailyTransfersPerUser = 1;
        [$svc, $store] = $this->service(null, $config);
        $files = new CiphertextStore($this->dir . '/store');
        $alice = $this->wallet();
        $bob = $this->wallet();
        $dev = $this->bind($svc, 1, $alice);
        $this->bind($svc, 2, $bob);
        $bobKey = $svc->recipientKeys($bob['address'])['keys'][0]['transfer_key'];
        $send = function () use ($svc, $files, $alice, $bob, $bobKey, $dev) {
            [$ct, $m] = TransferCrypto::seal('x', 'a', 'text/plain', $alice['address'], base64_encode(sodium_crypto_box_publickey($dev)),
                [['wallet' => $bob['address'], 'transfer_key' => $bobKey]], $this->now + 60, $this->now);
            return [$svc->send(1, $m, $this->sign($alice, TransferCrypto::manifestMessage($m)), $this->upload($ct), $files), $m];
        };
        [$first, $m] = $send();
        $this->assertTrue($first['ok']);
        $this->assertSame('daily_transfer_limit', $send()[0]['error']);

        $this->now += 61;
        $this->assertSame([], $svc->inbox(2)['transfers']);
        $this->assertSame(['ok' => true, 'purgeable' => 1, 'held' => 0, 'applied' => false], $svc->purge($files, false));
        $this->assertNotNull($files->path($m['transfer_id']));
        $svc->purge($files, true);
        $this->assertNull($files->path($m['transfer_id']));
        $this->assertSame(0, $svc->purge($files, true)['purgeable']);
    }

    public function testKeyRevocationStopsNewTransfersToThatKey(): void
    {
        [$svc] = $this->service();
        $w = $this->wallet();
        $this->bind($svc, 1, $w);
        $key = $svc->myKeys(1)['keys'][0]['transfer_key'];
        $this->assertTrue($svc->revokeKey(1, $w['address'], $key)['ok']);
        $this->assertSame([], $svc->recipientKeys($w['address'])['keys']);
        $this->assertSame('key_not_found', $svc->revokeKey(1, $w['address'], $key)['error']);
    }

    public function testEveryLinkedDeviceOfARecipientCanOpen(): void
    {
        [$svc, $store] = $this->service();
        $files = new CiphertextStore($this->dir . '/store');
        $alice = $this->wallet();
        $bob = $this->wallet();
        $aliceDev = $this->bind($svc, 1, $alice);
        $laptop = $this->bind($svc, 2, $bob);
        $phone = $this->bind($svc, 2, $bob);
        $keys = $svc->recipientKeys($bob['address'])['keys'];
        $this->assertCount(2, $keys);

        $to = array_map(fn ($k) => ['wallet' => $bob['address'], 'transfer_key' => $k['transfer_key']], $keys);
        [$ct, $m] = TransferCrypto::seal('both devices', 'a.txt', 'text/plain', $alice['address'],
            base64_encode(sodium_crypto_box_publickey($aliceDev)), $to, $this->now + 86400, $this->now);
        $sent = $svc->send(1, $m, $this->sign($alice, TransferCrypto::manifestMessage($m)), $this->upload($ct), $files);
        $this->assertTrue($sent['ok'], json_encode($sent));
        $this->assertCount(1, $svc->inbox(2)['transfers'], 'one inbox row per wallet, not per device');

        foreach ([$laptop, $phone] as $device) {
            [$plain] = TransferCrypto::open($ct, $m, $bob['address'], $device);
            $this->assertSame('both devices', $plain);
        }

        // The same device twice is still refused.
        $dup = [$to[0], $to[0]];
        [$ct2, $m2] = TransferCrypto::seal('x', 'b.txt', 'text/plain', $alice['address'],
            base64_encode(sodium_crypto_box_publickey($aliceDev)), $dup, $this->now + 86400, $this->now);
        $again = $svc->send(1, $m2, $this->sign($alice, TransferCrypto::manifestMessage($m2)), $this->upload($ct2), $files);
        $this->assertFalse($again['ok']);
    }

    public function testReusedTransferIdNeverOverwritesStoredCiphertext(): void
    {
        $files = new CiphertextStore($this->dir . '/store');
        $id = str_repeat('ab', 16);
        $this->assertTrue($files->put($id, $this->upload('first')));
        $this->assertFalse($files->put($id, $this->upload('second')));
        $this->assertSame('first', file_get_contents($files->path($id)));
    }

    public function testConfigIsOffByDefault(): void
    {
        $this->assertFalse((new SecureTransfer())->enabled);
    }
}

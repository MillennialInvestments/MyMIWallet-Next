<?php

declare(strict_types=1);

namespace App\Commands\SecureTransfer;

use App\Commands\SafeBaseCommand;
use App\Libraries\SecureTransfer\Base58;
use App\Libraries\SecureTransfer\CiphertextStore;
use App\Libraries\SecureTransfer\DbAuditLog;
use App\Libraries\SecureTransfer\DbTransferStore;
use App\Libraries\SecureTransfer\SecureTransferService;
use App\Libraries\SecureTransfer\TransferCrypto;
use CodeIgniter\CLI\CLI;
use Config\SecureTransfer as SecureTransferConfig;

/**
 * End-to-end check of Secure Transfer on staging with two throwaway wallets
 * made on the spot. Nothing touches a blockchain and no SOL is spent: wallets
 * only sign messages. Runs the real service, database, file store and
 * investigation record: link, send, list, download, decrypt, legal hold,
 * withdraw, release, purge, chain check. Refuses to run outside staging.
 */
class Smoke extends SafeBaseCommand
{
    protected $group = 'SecureTransfer';
    protected $name = 'securetransfer:smoke';
    protected $description = 'Staging-only end-to-end test of Secure Transfer with throwaway wallets (no SOL spent).';
    protected $usage = 'securetransfer:smoke';

    /** Synthetic account ids for the two test parties; they never sign in. */
    private const SENDER = 2147480001;
    private const RECIPIENT = 2147480002;

    private int $failed = 0;

    private function check(string $name, bool $ok, string $why = ''): void
    {
        CLI::write(($ok ? 'PASS ' : 'FAIL ') . $name . ($ok || $why === '' ? '' : ' (' . $why . ')'));
        $this->failed += $ok ? 0 : 1;
    }

    private static function wallet(): array
    {
        $kp = sodium_crypto_sign_keypair();
        return ['kp' => $kp, 'address' => Base58::encode(sodium_crypto_sign_publickey($kp))];
    }

    private static function sign(array $wallet, string $message): string
    {
        return base64_encode(sodium_crypto_sign_detached($message, sodium_crypto_sign_secretkey($wallet['kp'])));
    }

    private function bind(SecureTransferService $svc, int $userId, array $wallet): ?string
    {
        $device = sodium_crypto_box_keypair();
        $pub = base64_encode(sodium_crypto_box_publickey($device));
        $c = $svc->challenge($userId, $wallet['address']);
        if (!$c['ok']) {
            return null;
        }
        $msg = TransferCrypto::bindingMessage($c['domain'], $wallet['address'], $pub, $c['nonce'], $c['issued_at']);
        $r = $svc->bindKey($userId, $wallet['address'], $pub, $c['nonce'], $c['issued_at'], self::sign($wallet, $msg));
        return $r['ok'] ? $device : null;
    }

    public function run(array $params)
    {
        $host = (string) parse_url((string) config('App')->baseURL, PHP_URL_HOST);
        if (ENVIRONMENT === 'production' && !str_contains($host, 'staging')) {
            CLI::write('SEMANTIC_RESULT=BLOCKED_SAFETY REASON=staging_only (baseURL host ' . $host . ')');
            return 1;
        }
        $db = db_connect();
        $config = config(SecureTransferConfig::class);
        if (!$db->tableExists('bf_secure_transfers') || !DbAuditLog::available($db)) {
            CLI::write('SEMANTIC_RESULT=BLOCKED_SAFETY REASON=tables_not_migrated');
            return 1;
        }
        $this->check('feature switched on (SECURE_TRANSFER_ENABLED)', $config->enabled);

        $audit = new DbAuditLog($db);
        $store = new DbTransferStore($db);
        $svc = (new SecureTransferService($config, $store, null, $audit))->withRequest('127.0.0.1', 'securetransfer:smoke');
        $files = new CiphertextStore($config->storagePath);
        $alice = self::wallet();
        $bob = self::wallet();
        CLI::write('SENDER_WALLET=' . $alice['address']);
        CLI::write('RECIPIENT_WALLET=' . $bob['address']);

        $aliceDev = $this->bind($svc, self::SENDER, $alice);
        $bobDev = $this->bind($svc, self::RECIPIENT, $bob);
        $this->check('both wallets link a device key', $aliceDev !== null && $bobDev !== null);
        if ($aliceDev === null || $bobDev === null) {
            return $this->finish(null);
        }
        $keys = $svc->recipientKeys($bob['address'])['keys'] ?? [];
        $this->check('recipient key is signed by the recipient wallet', count($keys) === 1
            && TransferCrypto::verifyWalletSignature($bob['address'], $keys[0]['statement'], $keys[0]['signature']));

        $secret = 'MST1 smoke ' . bin2hex(random_bytes(8));
        [$ct, $m] = TransferCrypto::seal($secret, 'smoke.txt', 'text/plain', $alice['address'], base64_encode(sodium_crypto_box_publickey($aliceDev)),
            [['wallet' => $bob['address'], 'transfer_key' => $keys[0]['transfer_key']]], time() + 3600, time());
        $tmp = tempnam(sys_get_temp_dir(), 'mst1smoke');
        file_put_contents($tmp, $ct);
        $sent = $svc->send(self::SENDER, $m, self::sign($alice, TransferCrypto::manifestMessage($m)), $tmp, $files);
        @unlink($tmp);
        $id = $m['transfer_id'];
        CLI::write('TRANSFER_ID=' . $id);
        $this->check('send accepted', $sent['ok'], (string) ($sent['error'] ?? ''));
        if (!$sent['ok']) {
            return $this->finish(null);
        }
        $stored = $files->path($id);
        $this->check('server stores ciphertext only', $stored !== null && !str_contains((string) file_get_contents($stored), $secret));
        $this->check('forged send is refused', !$svc->send(self::SENDER, $m, base64_encode(str_repeat("\0", 64)), $stored, $files)['ok']);
        $this->check('transfer is in the recipient inbox', in_array($id, array_column($svc->inbox(self::RECIPIENT)['transfers'], 'transfer_id'), true));
        $this->check('sender cannot download as a recipient', !$svc->download(self::SENDER, $id, $alice['address'], $files)['ok']);

        $got = $svc->download(self::RECIPIENT, $id, $bob['address'], $files);
        $plain = null;
        if ($got['ok']) {
            $sigOk = TransferCrypto::verifyWalletSignature($alice['address'], TransferCrypto::manifestMessage($got['manifest']), $got['signature']);
            $this->check('manifest is signed by the sender wallet', $sigOk);
            [$plain] = TransferCrypto::open((string) file_get_contents($got['path']), $got['manifest'], $bob['address'], $bobDev);
        }
        $this->check('recipient decrypts the exact file', $plain === $secret);

        $holdId = $audit->setHold('transfer', $id, 'securetransfer:smoke', 'smoke', time());
        $this->check('withdraw accepted', $svc->revokeTransfer(self::SENDER, $id, $files)['ok']);
        $this->check('legal hold keeps the ciphertext after withdraw', $files->path($id) !== null);
        $this->check('recipient loses access after withdraw', !$svc->download(self::RECIPIENT, $id, $bob['address'], $files)['ok']);
        $this->check('hold released', $audit->releaseHold($holdId, 'smoke', time()));
        $svc->purge($files, true);
        $this->check('purge removes the ciphertext once released', $files->path($id) === null);

        $svc->revokeKey(self::SENDER, $alice['address'], base64_encode(sodium_crypto_box_publickey($aliceDev)));
        $svc->revokeKey(self::RECIPIENT, $bob['address'], base64_encode(sodium_crypto_box_publickey($bobDev)));
        return $this->finish($id, $audit);
    }

    private function finish(?string $id, ?DbAuditLog $audit = null): int
    {
        if ($id !== null && $audit !== null) {
            $events = array_column($audit->find(['transfer_id' => $id]), 'event');
            $need = ['transfer_sent', 'transfer_accessed', 'transfer_withdrawn', 'transfer_purged'];
            $this->check('record has sent, accessed, withdrawn, purged', array_diff($need, $events) === [], implode(',', $events));
            $v = $audit->verify();
            $this->check('investigation record chain intact', $v['ok']);
            CLI::write('RECORD_ENTRIES=' . $v['entries']);
        }
        CLI::write($this->failed === 0 ? 'SEMANTIC_RESULT=PASS' : 'SEMANTIC_RESULT=FAILED FAILED_CHECKS=' . $this->failed);
        return $this->failed === 0 ? 0 : 1;
    }
}

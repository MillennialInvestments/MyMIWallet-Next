<?php

declare(strict_types=1);

namespace App\Services;

use App\Libraries\Security\Crypto;
use App\Libraries\Security\TotpService;
use App\Models\UserTwoFactorModel;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

/**
 * Login-time two-factor checks (GTM-020).
 *
 * Session keys:
 *  - 2fa_verified_user: user id that passed the challenge in this session
 *  - 2fa_last_slice:    last accepted TOTP time slice, to stop code replay
 */
class TwoFactorService
{
    public const SESSION_VERIFIED = '2fa_verified_user';
    public const SESSION_SLICE    = '2fa_last_slice';

    public function __construct(private ?UserTwoFactorModel $model = null)
    {
        $this->model ??= new UserTwoFactorModel();
    }

    public function enabledRow(int $userId): ?array
    {
        if ($userId <= 0) {
            return null;
        }
        try {
            $row = $this->model->byUser($userId);
        } catch (\Throwable $e) {
            log_message('error', '[2FA] lookup failed: {msg}', ['msg' => $e->getMessage()]);

            return null;
        }

        return ($row && (int) ($row['is_enabled'] ?? 0) === 1) ? $row : null;
    }

    public const SESSION_STATE = '2fa_state';

    public function isEnabled(int $userId): bool
    {
        return $this->enabledRow($userId) !== null;
    }

    /**
     * Same as isEnabled() but remembered in the session, so the global filter
     * does not query the database on every request.
     */
    public function isEnabledCached(int $userId): bool
    {
        $state = session(self::SESSION_STATE);
        if (is_array($state) && (int) ($state['uid'] ?? 0) === $userId) {
            return (bool) ($state['enabled'] ?? false);
        }
        $enabled = $this->isEnabled($userId);
        session()->set(self::SESSION_STATE, ['uid' => $userId, 'enabled' => $enabled]);

        return $enabled;
    }

    public function rememberState(int $userId, bool $enabled): void
    {
        session()->set(self::SESSION_STATE, ['uid' => $userId, 'enabled' => $enabled]);
    }

    public function isVerifiedInSession(int $userId): bool
    {
        return $userId > 0 && (int) session(self::SESSION_VERIFIED) === $userId;
    }

    public function markVerified(int $userId): void
    {
        session()->set(self::SESSION_VERIFIED, $userId);
    }

    public function clearVerification(): void
    {
        session()->remove([self::SESSION_VERIFIED, self::SESSION_SLICE, self::SESSION_STATE, '2fa_attempts']);
    }

    /**
     * Checks a 6-digit TOTP code or a backup code. A used backup code is consumed.
     */
    public function verifyCode(int $userId, string $code): bool
    {
        $row = $this->enabledRow($userId);
        if ($row === null) {
            return false;
        }
        $code = strtoupper(trim(str_replace(' ', '', $code)));

        if (preg_match('/^\d{6}$/', $code)) {
            $secret = $this->secretFor($row);
            if ($secret === null) {
                return false;
            }
            $slice = TotpService::matchingTimeSlice($secret, $code);
            if ($slice === null) {
                return false;
            }
            $last = session(self::SESSION_SLICE);
            if ($last !== null && $slice <= (int) $last) {
                return false; // replayed code
            }
            session()->set(self::SESSION_SLICE, $slice);

            return true;
        }

        return $this->consumeBackupCode($row, $code);
    }

    public function secretFor(array $row): ?string
    {
        if (empty($row['secret_ciphertext'])) {
            return null;
        }
        try {
            $secret = Crypto::decrypt($row['secret_ciphertext'], $row['secret_iv'], $row['secret_tag']);
        } catch (\Throwable $e) {
            log_message('error', '[2FA] secret decrypt failed for user {id}', ['id' => $row['user_id'] ?? 0]);

            return null;
        }

        return is_string($secret) && $secret !== '' ? $secret : null;
    }

    /**
     * QR code as an inline SVG data URI. Rendered locally so the TOTP secret is
     * never sent to a third-party QR service.
     */
    public static function qrDataUri(string $otpauthUrl): string
    {
        $options = new QROptions([
            'outputType'   => QRCode::OUTPUT_MARKUP_SVG,
            'imageBase64'  => true,
            'eccLevel'     => QRCode::ECC_M,
            'addQuietzone' => true,
        ]);

        return (new QRCode($options))->render($otpauthUrl);
    }

    private function consumeBackupCode(array $row, string $code): bool
    {
        if (! preg_match('/^[A-F0-9]{8}$/', $code) || empty($row['backup_codes_hashes'])) {
            return false;
        }
        $hashes = json_decode((string) $row['backup_codes_hashes'], true);
        if (! is_array($hashes)) {
            return false;
        }
        require_once APPPATH . 'Helpers/CryptoHelper.php';
        foreach ($hashes as $i => $hash) {
            if (is_string($hash) && crypto_verify_password($code, $hash)) {
                unset($hashes[$i]);
                $this->model->update($row['id'], [
                    'backup_codes_hashes' => json_encode(array_values($hashes)),
                    'updated_at'          => date('Y-m-d H:i:s'),
                ]);
                if (function_exists('audit')) {
                    audit('2fa.backup.used', ['remaining' => count($hashes)], 'user');
                }

                return true;
            }
        }

        return false;
    }
}

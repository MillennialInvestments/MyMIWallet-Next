<?php

declare(strict_types=1);

namespace App\Legacy\Auth\Authentication\Resetters;

use App\Libraries\MailService;
use Myth\Auth\Authentication\Resetters\EmailResetter as BaseEmailResetter;
use Myth\Auth\Config\Auth as AuthConfig;
use Myth\Auth\Entities\User;

/**
 * GTM-017: sends the branded MailService email, and falls back to Myth's own plain
 * template if the branded send fails or throws, so a mail-layer problem never
 * blocks the password reset. The parent declares $error untyped, so this
 * class must not redeclare it.
 */
class EmailResetter extends BaseEmailResetter
{
    private ?MailService $mailService;

    public function __construct(?AuthConfig $config = null, ?MailService $mailService = null)
    {
        parent::__construct($config);
        $this->mailService = $mailService;
    }

    public function send(?User $user = null): bool
    {
        $token = (string) ($user->reset_hash ?? '');
        if ($user === null || $token === '' || (string) ($user->email ?? '') === '') {
            $this->error = lang('Auth.unknownError');

            return false;
        }

        try {
            $mail   = $this->mailService ??= new MailService();
            $result = $mail->sendPasswordResetEmail($user, $token, ['source' => 'auth-resetter']);
            if ($result['ok'] ?? false) {
                $this->error = '';

                return true;
            }
            log_message('warning', 'auth-resetter: branded send failed, using plain template');
        } catch (\Throwable $e) {
            log_message('warning', 'auth-resetter: branded send threw {class}, using plain template', ['class' => $e::class]);
        }

        // The app's legacy config points its email views at the branded
        // templates, which expect a full URL rather than a bare token. Myth's
        // own templates take the token, so send the plain mail with Myth's config.
        $own          = $this->config;
        $this->config = new AuthConfig();

        try {
            return parent::send($user);
        } finally {
            $this->config = $own;
        }
    }

    /**
     * Myth keys these settings by class name, and this subclass has no entry of
     * its own, so read the parent's.
     */
    public function getResetterSettings()
    {
        $all = (array) ($this->config->userResetters ?? []);

        return (object) ($all[static::class] ?? $all[BaseEmailResetter::class] ?? []);
    }
}

<?php

declare(strict_types=1);

namespace App\Legacy\Auth\Authentication\Resetters;

use App\Libraries\MailService;
use Myth\Auth\Authentication\Resetters\EmailResetter as BaseEmailResetter;

class EmailResetter extends BaseEmailResetter
{
    protected ?string $error = null;
    protected MailService $mailService;

    public function __construct()
    {
        if (method_exists(get_parent_class($this), '__construct')) {
            parent::__construct();
        }

        $this->mailService = new MailService();
    }

    public function send($user): bool
    {
        $token = (string) ($user->reset_hash ?? '');

        if ($token === '') {
            $this->error = 'We couldn’t send your email right now. Please try again or contact support.';
            return false;
        }

        $result = $this->mailService->sendPasswordResetEmail($user, $token, ['source' => 'auth-resetter']);

        if (! ($result['ok'] ?? false)) {
            $this->error = 'We couldn’t send your email right now. Please try again or contact support.';
            return false;
        }

        $this->error = null;
        return true;
    }

    public function error(): ?string
    {
        return $this->error;
    }
}

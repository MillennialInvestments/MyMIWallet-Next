<?php

namespace App\Controllers\Traits;

use App\Models\WalletModel;
use App\Services\WalletService;

trait HasUserContext
{
    protected ?int $cuID = null;
    protected ?WalletService $walletService = null;

    protected function initUserContext(): void
    {
        $resolved = null;

        if (method_exists($this, 'resolveCurrentUserId')) {
            $resolved = $this->resolveCurrentUserId();
        }

        if ($resolved === null && function_exists('session')) {
            $session = session();
            $value = $session?->get('user_id');
            if (is_numeric($value) && (int) $value > 0) {
                $resolved = (int) $value;
            }
        }

        $this->cuID = $resolved;

        if ($this->walletService === null) {
            if (method_exists($this, 'getWalletService')) {
                $this->walletService = $this->getWalletService();
            } else {
                $this->walletService = new WalletService(service('logger'), new WalletModel());
            }
        }
    }

    protected function getCuID(): ?int
    {
        if ($this->cuID !== null) {
            return $this->cuID;
        }

        $this->initUserContext();

        return $this->cuID;
    }
}

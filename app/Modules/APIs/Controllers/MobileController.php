<?php

declare(strict_types=1);

namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseAPIController;
use App\Modules\APIs\Services\MobileAppService;

class MobileController extends BaseAPIController
{
    private function userId(): ?int
    {
        return service('mobileAuthContext')->userId();
    }

    private function unauthorizedIfMissingUser()
    {
        $userId = $this->userId();
        if ($userId === null) {
            return $this->error('Authentication required.', 401);
        }

        return null;
    }

    public function dashboard()
    {
        if ($error = $this->unauthorizedIfMissingUser()) {
            return $error;
        }

        $data = (new MobileAppService())->dashboard((int) $this->userId());
        return $this->success($data);
    }

    public function budget()
    {
        if ($error = $this->unauthorizedIfMissingUser()) {
            return $error;
        }

        return $this->success((new MobileAppService())->budget((int) $this->userId()));
    }

    public function investments()
    {
        if ($error = $this->unauthorizedIfMissingUser()) {
            return $error;
        }

        return $this->success((new MobileAppService())->investments((int) $this->userId()));
    }

    public function alerts()
    {
        if ($error = $this->unauthorizedIfMissingUser()) {
            return $error;
        }

        return $this->success((new MobileAppService())->alerts((int) $this->userId()));
    }
}

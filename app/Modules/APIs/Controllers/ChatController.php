<?php

declare(strict_types=1);

namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseAPIController;
use CodeIgniter\HTTP\ResponseInterface;

#[\AllowDynamicProperties]
class ChatController extends BaseAPIController
{
    public function me(): ResponseInterface
    {
        $userId = (int) (session('user_id') ?? (function_exists('user_id') ? user_id() : 0));
        return $this->respond([
            'status'     => 'success',
            'user_id'    => $userId,
            'role'       => 'user',
            'chat_ready' => true,
            'timestamp'  => time(),
        ], 200);
    }

    public function health(): ResponseInterface
    {
        return $this->respond([
            'status'    => 'healthy',
            'subsystem' => 'chat',
            'timestamp' => time(),
        ], 200);
    }
}

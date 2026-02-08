<?php

declare(strict_types=1);

namespace App\Modules\Chat\Controllers;

use App\Controllers\Api\InternalApiController;
use App\Services\Ops\SparkRunnerService;

class ChatController extends InternalApiController
{
    public function health()
    {
        $runner = new SparkRunnerService();
        $result = $runner->run('chat:audit', [], ['json' => 1]);
        if ($result['output'] === '') {
            $result = $runner->run('chat:audit');
        }

        return $this->jsonOk($result, ['endpoint' => 'chat.health']);
    }

    public function usage()
    {
        return $this->jsonError('not_implemented', 'Chat usage endpoint is not implemented.', 501);
    }
}

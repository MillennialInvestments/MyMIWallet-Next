<?php

declare(strict_types=1);

namespace App\Modules\ContentEngine\Controllers;

use App\Controllers\Api\InternalApiController;
use App\Services\Ops\SparkRunnerService;

class ContentEngineController extends InternalApiController
{
    public function run()
    {
        $runner = new SparkRunnerService();
        $result = $runner->run('contentengine:smoke');

        return $this->jsonOk([
            'run' => $result,
            'parsed' => [
                'picks' => null,
                'drafts' => null,
            ],
        ], ['endpoint' => 'contentengine.run']);
    }

    public function draft(string $id)
    {
        return $this->jsonError('not_implemented', 'Draft retrieval is not implemented.', 501, [
            'draft_id' => $id,
        ]);
    }
}

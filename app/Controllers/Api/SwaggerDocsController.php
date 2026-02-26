<?php

declare(strict_types=1);

namespace App\Controllers\Api;

use App\Controllers\BaseController;

class SwaggerDocsController extends BaseController
{
    public function index()
    {
        return view('api/swagger_docs', [
            'specUrl' => base_url('docs/APIs/openapi/openapi.v1.json'),
        ]);
    }
}

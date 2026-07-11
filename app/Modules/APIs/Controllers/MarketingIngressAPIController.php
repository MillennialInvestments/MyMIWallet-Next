<?php

declare(strict_types=1);

namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseAPIController;
use App\Services\Marketing\MarketingZapierIngressService;
use CodeIgniter\API\ResponseTrait;
use Throwable;

final class MarketingIngressAPIController extends BaseAPIController
{
    use ResponseTrait;

    public function receive()
    {
        try {
            $payload = $this->request->getJSON(true);
        } catch (Throwable) {
            return $this->respond([
                'status' => 'error',
                'data' => null,
                'error' => [
                    'code' => 'invalid_json',
                    'message' => 'The request body must contain valid JSON.',
                ],
                'meta' => [
                    'ts' => date('c'),
                ],
            ], 400);
        }

        if (! is_array($payload)) {
            return $this->respond([
                'status' => 'error',
                'data' => null,
                'error' => [
                    'code' => 'invalid_payload',
                    'message' => 'The JSON body must contain an object.',
                ],
                'meta' => [
                    'ts' => date('c'),
                ],
            ], 400);
        }

        $service = new MarketingZapierIngressService();

        $result = $service->process(
            strtolower(trim(
                $this->request->getHeaderLine('X-MyMI-Source')
            )),
            trim(
                $this->request->getHeaderLine('Idempotency-Key')
            ),
            $payload
        );

        return $this->respond(
            $result['body'],
            $result['status_code']
        );
    }
}

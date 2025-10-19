<?php

namespace App\Modules\User\Controllers;

use App\Controllers\UserController;

class SearchController extends UserController
{
    public function index()
    {
        $q = trim((string) $this->request->getGet('query'));
        $this->data['query'] = $q;
        $this->data['pageTitle'] = 'Search Results';

        $results = [];

        if ($q !== '') {
            $client = \Config\Services::curlrequest(['timeout' => 3.0]);
            $url = site_url('API/Investments/searchTickers?query=' . urlencode($q) . '&limit=15');

            try {
                $response = $client->get($url);
                $payload = json_decode($response->getBody(), true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    $results = $payload['data'] ?? [];
                }
            } catch (\Throwable $e) {
                log_message('error', 'SearchController::index API error: {msg}', ['msg' => $e->getMessage()]);
            }
        }

        $this->data['results'] = $results;

        return $this->renderTheme('App\\Modules\\User\\Views\\Search\\index', $this->data);
    }
}
<?php

namespace App\Modules\User\Controllers;

use App\Controllers\BaseUserController;

use App\Models\UserModel;

class SearchController extends BaseUserController
{
    public function index()
    {
        $queryParam = $this->request->getGet('q') ?? $this->request->getGet('query');
        $q = trim((string) $queryParam);
        $this->data['query'] = $q;
        $this->data['pageTitle'] = 'Search Results';

        $results = [];

        if ($q !== '') {
            if ($q[0] === '$') {
                $symbol = strtoupper(substr($q, 1));
                return redirect()->to(site_url('Preview/Alert/' . urlencode($symbol)));
            }

            if ($q[0] === '@') {
                $handle = substr($q, 1);

                try {
                    $userModel = model(UserModel::class);
                    $user      = $userModel
                        ->where('LOWER(username)', strtolower($handle))
                        ->first();
                } catch (\Throwable $e) {
                    $user = null;
                }

                if ($user && isset($user->id)) {
                    return redirect()->to(site_url('Users/Profile/' . $user->id));
                }

                $groupProfile = null;
                if (class_exists('App\\Models\\GroupsModel')) {
                    try {
                        $groupModel = model('App\\Models\\GroupsModel');
                        $groupProfile = $groupModel
                            ->where('LOWER(slug)', strtolower($handle))
                            ->first();
                    } catch (\Throwable $e) {
                        $groupProfile = null;
                    }
                }

                if ($groupProfile && isset($groupProfile->id)) {
                    return redirect()->to(site_url('Groups/Profile/' . $groupProfile->id));
                }

                if (strcasecmp($handle, 'admin') === 0 || strcasecmp($handle, 'support') === 0) {
                    return redirect()->to(site_url('Support'));
                }
            }
        }

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
<?php

namespace App\Modules\APIs\Controllers;

use App\Controllers\UserController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use Throwable;

#[\AllowDynamicProperties]
class SearchController extends UserController
{
    public function index(): ResponseInterface|string
    {
        $q = trim((string) $this->request->getGet('q'));

        if ($q === '') {
            return $this->response->setJSON([
                'status' => 'success',
                'query' => '',
                'filters' => [],
                'results' => [
                    'users' => [],
                    'alerts' => [],
                    'projects' => [],
                ],
            ]);
        }

        $tokens = preg_split('/\s+/', $q) ?: [];
        $filters = [];
        $terms = [];

        foreach ($tokens as $token) {
            if (str_contains($token, ':')) {
                [$key, $value] = explode(':', $token, 2);
                $filters[$key] = $value;
                continue;
            }

            $terms[] = $token;
        }

        $searchTerm = trim(implode(' ', $terms));
        $results = [
            'users' => [],
            'alerts' => [],
            'projects' => [],
        ];

        try {
            if (! isset($filters['type']) || $filters['type'] === 'user') {
                $results['users'] = model(UserModel::class)
                    ->groupStart()
                    ->like('username', $searchTerm)
                    ->orLike('email', $searchTerm)
                    ->orLike('display_name', $searchTerm)
                    ->groupEnd()
                    ->findAll(5);
            }

            $db = db_connect();

            if ((! isset($filters['type']) || $filters['type'] === 'alert') && $db->tableExists('bf_investment_trade_alerts')) {
                $results['alerts'] = $db->table('bf_investment_trade_alerts')
                    ->select('id, ticker, direction, entry_price, created_on')
                    ->groupStart()
                    ->like('ticker', $searchTerm)
                    ->orLike('summary', $searchTerm)
                    ->groupEnd()
                    ->orderBy('created_on', 'DESC')
                    ->limit(5)
                    ->get()
                    ->getResultArray();
            }

            if ((! isset($filters['type']) || $filters['type'] === 'project') && $db->tableExists('bf_projects')) {
                $results['projects'] = $db->table('bf_projects')
                    ->select('id, title, description, updated_at')
                    ->groupStart()
                    ->like('title', $searchTerm)
                    ->orLike('description', $searchTerm)
                    ->groupEnd()
                    ->orderBy('updated_at', 'DESC')
                    ->limit(5)
                    ->get()
                    ->getResultArray();
            }
        } catch (Throwable $e) {
            log_message('error', '[API] search failed: {message}', ['message' => $e->getMessage()]);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'query' => $q,
            'filters' => $filters,
            'results' => $results,
        ]);
    }
}

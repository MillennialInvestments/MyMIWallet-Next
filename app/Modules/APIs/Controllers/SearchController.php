<?php
namespace App\Modules\APIs\Controllers;

use App\Controllers\UserController;
use App\Models\UserModel;
use App\Models\InvestmentModel;
use App\Models\TradeAlertModel;
use App\Models\ProjectModel;

#[\AllowDynamicProperties]
class SearchController extends UserController
{
    public function index()
    {
        $q = trim($this->request->getGet('q'));

        if (!$q) {
            return redirect()->back()->with('error', 'Please enter a search term.');
        }

        // Split smart search terms (e.g. "type:user budget:completed")
        $tokens = explode(' ', $q);
        $filters = [];
        $terms = [];

        foreach ($tokens as $token) {
            if (strpos($token, ':') !== false) {
                [$key, $value] = explode(':', $token, 2);
                $filters[$key] = $value;
            } else {
                $terms[] = $token;
            }
        }

        $searchTerm = implode(' ', $terms);
        $results = [];

        // Example: Search Users
        if (!isset($filters['type']) || $filters['type'] === 'user') {
            $userModel = new UserModel();
            $results['users'] = $userModel
                ->like('username', $searchTerm)
                ->orLike('email', $searchTerm)
                ->orLike('display_name', $searchTerm)
                ->findAll(5);
        }

        // Example: Trade Alerts
        if (!isset($filters['type']) || $filters['type'] === 'alert') {
            $alertModel = new TradeAlertModel();
            $results['alerts'] = $alertModel
                ->like('symbol', $searchTerm)
                ->orLike('summary', $searchTerm)
                ->findAll(5);
        }

        // Example: Projects
        if (!isset($filters['type']) || $filters['type'] === 'project') {
            $projectModel = new ProjectModel();
            $results['projects'] = $projectModel
                ->like('title', $searchTerm)
                ->orLike('description', $searchTerm)
                ->findAll(5);
        }

        return $this->renderTheme('Search/results', [
            'query' => $q,
            'filters' => $filters,
            'results' => $results,
        ]);
    }
}
?>

<?php
namespace App\Models;

use App\Libraries\MyMISupport;
use CodeIgniter\Model;

#[\AllowDynamicProperties]
class SupportModel extends Model
{
    protected $table = 'bf_support_requests';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['user_id', 'email', 'name', 'details', 'date', 'time', 'res_id', 'response', 'status', 'topic']; // Assuming these are the fields you'll be using
    protected $createdField  = 'created_on';
    protected $updatedField  = 'modified_on';
    protected $deletedField  = 'deleted_on';
    protected $userModel; 
    protected $MyMISupport;

    public function __construct()
    {
        parent::__construct();
        $this->userModel = new \App\Models\UserModel();
        $this->MyMISupport = new MyMISupport();
    }

    // Method to submit a new support request
    public function submitRequest($data)
    {
        // First, attempt to find the user by email
        $user = $this->userModel->where('email', $data['email'])->first();
        
        if ($user) {
            $data['user_id'] = $user->id;  // Access user ID using object property
        } else {
            $data['user_id'] = null; // Consider setting to a default or null if no user is found
        }

        // Insert the new support request
        $inserted = $this->insert($data, true);
        if ($inserted) {
            $response = [
                'request_id' => $this->insertID(), // Get the last insert ID
                'user_id' => $data['user_id'] // Include the user ID in the response
            ];
            return $response;
        } else {
            return false; // Handle failures appropriately
        }
    }

    // Submitting a response to a support request
    public function submitResponse($data)
    {
        return $this->insert($data);
    }

    // Closing a support request
    public function closeRequest($id, $data)
    {
        return $this->update($id, $data);
    }

    // Fetching pending support requests
    public function getPendingSupport($department = null)
    {
        return $this->where('status', 'Pending')
                    ->where('topic', $department)
                    ->findAll();
    }

    // Fetching completed support requests
    public function getCompleteSupport($department = null)
    {
        return $this->where('status', 'Complete')
                    ->where('topic', $department)
                    ->findAll();
    }

    /**
     * Fetch a single article by slug.
     */
    public function findBySlug(string $slug): ?array
    {
        return $this->MyMISupport->getArticle($slug);
    }

    /**
     * List all available articles.
     *
     * @return array<string,array>
     */
    public function listAvailable(): array
    {
        $path = APPPATH . 'Modules/Support/Views/articles/';
        $files = glob($path . '*.php');
        $articles = [];

        foreach ($files as $file) {
            $slug = basename($file, '.php');
            $articles[$slug] = $this->MyMISupport->getArticle($slug);
        }

        return $articles;
    }

    /**
     * Fetch a paginated list of Knowledge Base articles.
     * Accepts filters:
     * - published (int|null) default 1
     * - category (string)
     * - tag (string)  // matches inside tags_json
     * - search (string) // title/body_html LIKE
     * - orderBy (string) default 'updated_at'
     * - orderDir (string) default 'DESC'
     * - limit (int) default 10
     * - offset (int) default 0
     */
    public function getAllArticles(array $opts = []): array
    {
        $db = $this->db;

        // If KB table is missing, fail safe
        if (! $db->tableExists('bf_support_kb_articles')) {
            log_message(
                'warning',
                'SupportModel::getAllArticles called but table bf_support_kb_articles does not exist'
            );

            $limit  = max(1, (int)($opts['limit']  ?? 10));
            $offset = max(0, (int)($opts['offset'] ?? 0));

            return [
                'data'   => [],
                'total'  => 0,
                'limit'  => $limit,
                'offset' => $offset,
            ];
        }

        $builder = $db->table('bf_support_kb_articles')
            ->select('id, slug, title, category, tags_json, published, views, created_at, updated_at');

        // Filters
        $published = $opts['published'] ?? 1; // default only published
        if ($published !== null) {
            $builder->where('published', (int) $published);
        }

        if (!empty($opts['category'])) {
            $builder->where('category', $opts['category']);
        }

        if (!empty($opts['search'])) {
            $q = trim((string)$opts['search']);
            if ($q !== '') {
                $builder->groupStart()
                        ->like('title', $q)
                        ->orLike('body_html', $q)
                        ->groupEnd();
            }
        }

        if (!empty($opts['tag'])) {
            // naive JSON-contains match (works if tags_json is '["tag1","tag2"]')
            $tag = trim((string)$opts['tag']);
            if ($tag !== '') {
                $builder->like('tags_json', '"'.$db->escapeString($tag).'"');
            }
        }

        // Ordering
        $orderBy = $opts['orderBy'] ?? 'updated_at';
        $orderDir = strtoupper($opts['orderDir'] ?? 'DESC');
        $builder->orderBy($orderBy, $orderDir === 'ASC' ? 'ASC' : 'DESC');

        // Pagination
        $limit  = max(1, (int)($opts['limit']  ?? 10));
        $offset = max(0, (int)($opts['offset'] ?? 0));

        // Total BEFORE limit/offset
        $total = (clone $builder)->countAllResults();

        // Apply limit/offset and fetch
        $rows = $builder->limit($limit, $offset)->get()->getResultArray();

        return [
            'data'   => $rows,
            'total'  => (int)$total,
            'limit'  => $limit,
            'offset' => $offset,
        ];
    }

    /**
     * Fetch a single KB article by slug. Returns null if not found or table missing.
     */
    public function getArticleBySlug(string $slug): ?array
    {
        $db = $this->db;
        if (! $db->tableExists('bf_support_kb_articles')) {
            log_message('warning', 'SupportModel::getArticleBySlug table missing');
            return null;
        }

        $row = $db->table('bf_support_kb_articles')
            ->select('id, slug, title, body_html, category, tags_json, published, views, created_at, updated_at')
            ->where('slug', $slug)
            ->limit(1)
            ->get()
            ->getRowArray();

        return $row ?: null;
    }

    /**
     * Convenience search (thin wrapper for getAllArticles).
     */
    public function searchArticles(string $query, int $limit = 10): array
    {
        return $this->getAllArticles([
            'search' => $query,
            'limit'  => $limit,
            'offset' => 0,
        ]);
    }

}


<?php
namespace App\Modules\APIs\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;
use App\Models\SupportModel;

class SupportController extends Controller
{
    use ResponseTrait;

    /** @var SupportModel */
    protected $supportModel;

    public function __construct()
    {
        $this->supportModel = new SupportModel();
    }

    /**
     * GET /API/Support/kb
     * List Knowledge Base articles with optional filters.
     * Query params: q, category, tag, limit (int), offset (int), published (0|1)
     */
    public function kb()
    {
        $opts = [
            'search'   => (string) ($this->request->getGet('q') ?? ''),
            'category' => (string) ($this->request->getGet('category') ?? ''),
            'tag'      => (string) ($this->request->getGet('tag') ?? ''),
            'limit'    => (int) ($this->request->getGet('limit')  ?? 10),
            'offset'   => (int) ($this->request->getGet('offset') ?? 0),
        ];

        // Optional published filter passthrough (defaults to 1 inside model)
        if ($this->request->getGet('published') !== null) {
            $opts['published'] = (int) $this->request->getGet('published');
        }

        try {
            $result = $this->supportModel->getAllArticles($opts);

            return $this->respond([
                'status' => 'success',
                'asOf'   => gmdate('c'),
                'data'   => $result,
            ], 200);
        } catch (\Throwable $e) {
            log_message('error', 'API/Support/kb failed: {msg} in {file}:{line}', [
                'msg'  => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return $this->respond([
                'status'  => 'degraded',
                'asOf'    => gmdate('c'),
                'message' => 'Knowledge Base is temporarily unavailable.',
            ], 200);
        }
    }

    /**
     * GET /API/Support/kb/{slug}
     * Fetch a single Knowledge Base article by slug.
     */
    public function kbArticle(string $slug)
    {
        try {
            $row = $this->supportModel->getArticleBySlug($slug);

            if (!$row) {
                return $this->respond([
                    'status'  => 'error',
                    'asOf'    => gmdate('c'),
                    'message' => 'Article not found.',
                ], 404);
            }

            return $this->respond([
                'status' => 'success',
                'asOf'   => gmdate('c'),
                'data'   => $row,
            ], 200);
        } catch (\Throwable $e) {
            log_message('error', 'API/Support/kbArticle failed: {msg} in {file}:{line}', [
                'msg'  => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return $this->respond([
                'status'  => 'degraded',
                'asOf'    => gmdate('c'),
                'message' => 'Knowledge Base is temporarily unavailable.',
            ], 200);
        }
    }
}

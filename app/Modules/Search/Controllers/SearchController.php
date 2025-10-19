<?php
namespace App\Modules\Search\Controllers;

use App\Controllers\BaseController;
use App\Services\SearchService;

class SearchController extends BaseController
{
    public function api()
    {
        $q      = (string)$this->request->getGet('q');
        $types  = $this->request->getGet('types');
        $limit  = (int)($this->request->getGet('limit') ?? 20);
        $offset = (int)($this->request->getGet('offset') ?? 0);

        $typesArr = is_string($types) && $types !== '' ? array_values(array_intersect(explode(',', $types), ['project','asset','post','alert'])) : [];

        $svc = new SearchService(db_connect());
        $out = $svc->search($q, $typesArr, $limit, $offset);
        $items = array_map(static function($r){
            return [
                'type' => $r->type,
                'id' => $r->id,
                'title' => $r->title,
                'snippet' => $r->snippet,
                'url' => $r->url,
                'score' => $r->score,
                'created_at' => $r->createdAt,
            ];
        }, $out['items']);

        // optional: log query for basic analytics (no PII)
        db_connect()->table('bf_search_logs')->insert([
            'q'       => mb_substr($q, 0, 200),
            'user_id' => (int)(session('cuID') ?? 0) ?: null,
            'results' => (int)$out['total'],
        ]);

        return $this->response->setJSON([
            'status' => 'success',
            'data' => ['items' => $items, 'total' => $out['total']],
            'csrf' => csrf_hash(),
        ]);
    }

    public function view()
    {
        return view('App/Modules/Search\Views\index', [
            'pageTitle' => 'Search',
        ]);
    }
}

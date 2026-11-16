<?php
namespace App\Services;

use App\Entities\SearchResult;
use CodeIgniter\Database\BaseConnection;

class SearchService
{
    public function __construct(private BaseConnection $db) {}

    /**
     * @param string $q
     * @param array $types
     * @param int $limit
     * @param int $offset
     */
    public function search(string $q, array $types = [], int $limit = 20, int $offset = 0): array
    {
        $limit  = max(1, min(50, $limit));
        $offset = max(0, $offset);
        $needle = trim($q);
        if ($needle === '') return ['items'=>[], 'total'=>0];
        $needle = preg_replace('~\s+~',' ', $needle);
        $needle = mb_substr($needle,0,128);

        $want = static fn (string $t) => empty($types) || in_array($t, $types, true);

        // GT-FORM-ROUTES-001: LIKE only. No FULLTEXT indexes exist on these tables, so the
        // old MATCH() branch threw; and a table missing in one environment skips that type
        // instead of failing the whole search.
        $results = [];
        $run = function (string $table, callable $query, callable $map) use (&$results): void {
            try {
                if (! $this->db->tableExists($table)) {
                    return;
                }
                foreach ($query() as $r) {
                    $results[] = $map($r);
                }
            } catch (\Throwable $e) {
                log_message('warning', 'SearchService skipped {table}: {msg}', ['table' => $table, 'msg' => $e->getMessage()]);
            }
        };

        if ($want('project')) {
            $run('bf_projects',
                fn () => $this->db->table('bf_projects')->select('id,title,description,created_at')
                    ->groupStart()->where('is_private', 0)->orWhere('is_private IS NULL', null, false)->groupEnd()
                    ->groupStart()->like('title',$needle)->orLike('description',$needle)->groupEnd()
                    ->orderBy('created_at','DESC')->limit($limit,$offset)->get()->getResultArray(),
                fn ($r) => new SearchResult('project',(int)$r['id'],(string)$r['title'],$this->snippet((string)($r['description']??''), $needle),site_url('Projects/View/'.(int)$r['id']),0.0,(string)($r['created_at']??'')));
        }

        if ($want('asset')) {
            $run('bf_assets',
                fn () => $this->db->table('bf_assets')->select('id,name,symbol,created_at')
                    ->groupStart()->like('name',$needle)->orLike('symbol',$needle)->groupEnd()
                    ->orderBy('created_at','DESC')->limit($limit,$offset)->get()->getResultArray(),
                function ($r) use ($needle) {
                    $title = trim($r['name'].' ('.$r['symbol'].')');
                    return new SearchResult('asset',(int)$r['id'],$title,$this->snippet($title,$needle),site_url('Assets/view/'.(int)$r['id']),0.0,(string)($r['created_at']??''));
                });
        }

        if ($want('post')) {
            $run('bf_posts',
                fn () => $this->db->table('bf_posts')->select('id,title,body,created_at')->where('status','published')
                    ->groupStart()->like('title',$needle)->orLike('body',$needle)->groupEnd()
                    ->orderBy('created_at','DESC')->limit($limit,$offset)->get()->getResultArray(),
                fn ($r) => new SearchResult('post',(int)$r['id'],(string)$r['title'],$this->snippet((string)($r['body']??''), $needle),site_url('Blog/post/'.(int)$r['id']),0.0,(string)($r['created_at']??'')));
        }

        if ($want('alert')) {
            $uid = (int)(session('cuID') ?? 0);
            if ($uid > 0) {
                $run('bf_investment_trade_alerts',
                    fn () => $this->db->table('bf_investment_trade_alerts')->select('id,ticker,notes,created_at')->where('user_id',$uid)
                        ->groupStart()->like('ticker',$needle)->orLike('notes',$needle)->groupEnd()
                        ->orderBy('created_at','DESC')->limit($limit,$offset)->get()->getResultArray(),
                    fn ($r) => new SearchResult('alert',(int)$r['id'],'Alert: '.$r['ticker'],$this->snippet((string)($r['notes']??''), $needle),site_url('Preview/Alert/'.rawurlencode((string)$r['ticker'])),0.0,(string)($r['created_at']??'')));
            }
        }

        $total = count($results) < $limit ? ($offset + count($results)) : ($offset + $limit + 1);

        usort($results, static fn (SearchResult $a, SearchResult $b) => strcmp((string)$b->createdAt, (string)$a->createdAt));

        return ['items'=>array_slice($results, 0, $limit), 'total'=>$total];
    }

    private function snippet(string $haystack, string $needle, int $len = 140): string
    {
        $h = strip_tags($haystack);
        $pos = stripos($h, $needle);
        if ($pos === false) {
            return mb_substr($h,0,$len) . (mb_strlen($h) > $len ? '…' : '');
        }
        $start = max(0, $pos - (int)($len/3));
        $chunk = mb_substr($h,$start,$len);
        return ($start>0?'…':'') . $chunk . ((mb_strlen($h) > ($start+$len)) ? '…' : '');
    }
}

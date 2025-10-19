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
        $useFulltext = $this->isFulltextSupported();
        $needle = trim($q);
        if ($needle === '') return ['items'=>[], 'total'=>0];
        $needle = preg_replace('~\s+~',' ', $needle);
        $needle = mb_substr($needle,0,128);

        $want = function(string $t) use ($types) {
            return empty($types) || in_array($t, $types, true);
        };

        $results = [];

        if ($want('project')) {
            $rows = $useFulltext
                ? $this->db->query("SELECT id,title,description,created_at,MATCH(title,description) AGAINST (? IN NATURAL LANGUAGE MODE) AS score FROM bf_projects WHERE (MATCH(title,description) AGAINST (? IN NATURAL LANGUAGE MODE)) AND (is_private = 0 OR is_private IS NULL) ORDER BY score DESC, created_at DESC LIMIT ? OFFSET ?", [$needle,$needle,$limit,$offset])->getResultArray()
                : $this->db->table('bf_projects')->select('id,title,description,created_at')->like('title',$needle)->orLike('description',$needle)->orderBy('created_at','DESC')->limit($limit,$offset)->get()->getResultArray();
            foreach ($rows as $r) {
                $results[] = new SearchResult('project',(int)$r['id'],(string)$r['title'],$this->snippet($r['description']??'', $needle),url_to('Projects::view',$r['id']),(float)($r['score']??0),(string)($r['created_at']??null));
            }
        }

        if ($want('asset')) {
            $rows = $useFulltext
                ? $this->db->query("SELECT id,name,symbol,created_at,MATCH(name,symbol) AGAINST (? IN NATURAL LANGUAGE MODE) AS score FROM bf_assets WHERE MATCH(name,symbol) AGAINST (? IN NATURAL LANGUAGE MODE) ORDER BY score DESC, created_at DESC LIMIT ? OFFSET ?", [$needle,$needle,$limit,$offset])->getResultArray()
                : $this->db->table('bf_assets')->select('id,name,symbol,created_at')->groupStart()->like('name',$needle)->orLike('symbol',$needle)->groupEnd()->orderBy('created_at','DESC')->limit($limit,$offset)->get()->getResultArray();
            foreach ($rows as $r) {
                $title = trim($r['name'].' ('.$r['symbol'].')');
                $results[] = new SearchResult('asset',(int)$r['id'],$title,$this->snippet($title,$needle),site_url('/Assets/view/'.$r['id']),(float)($r['score']??0),(string)($r['created_at']??null));
            }
        }

        if ($want('post')) {
            $rows = $useFulltext
                ? $this->db->query("SELECT id,title,body,created_at,MATCH(title,body) AGAINST (? IN NATURAL LANGUAGE MODE) AS score FROM bf_posts WHERE status='published' AND MATCH(title,body) AGAINST (? IN NATURAL LANGUAGE MODE) ORDER BY score DESC, created_at DESC LIMIT ? OFFSET ?", [$needle,$needle,$limit,$offset])->getResultArray()
                : $this->db->table('bf_posts')->select('id,title,body,created_at')->where('status','published')->groupStart()->like('title',$needle)->orLike('body',$needle)->groupEnd()->orderBy('created_at','DESC')->limit($limit,$offset)->get()->getResultArray();
            foreach ($rows as $r) {
                $results[] = new SearchResult('post',(int)$r['id'],(string)$r['title'],$this->snippet($r['body']??'', $needle),site_url('/Blog/post/'.$r['id']),(float)($r['score']??0),(string)($r['created_at']??null));
            }
        }

        if ($want('alert')) {
            $uid = (int)(session('cuID') ?? 0);
            $rows = $useFulltext
                ? $this->db->query("SELECT id,ticker,notes,created_at,MATCH(ticker,notes) AGAINST (? IN NATURAL LANGUAGE MODE) AS score FROM bf_investment_trade_alerts WHERE user_id = ? AND MATCH(ticker,notes) AGAINST (? IN NATURAL LANGUAGE MODE) ORDER BY score DESC, created_at DESC LIMIT ? OFFSET ?", [$needle,$uid,$needle,$limit,$offset])->getResultArray()
                : $this->db->table('bf_investment_trade_alerts')->select('id,ticker,notes,created_at')->where('user_id',$uid)->groupStart()->like('ticker',$needle)->orLike('notes',$needle)->groupEnd()->orderBy('created_at','DESC')->limit($limit,$offset)->get()->getResultArray();
            foreach ($rows as $r) {
                $title = 'Alert: '.$r['ticker'];
                $results[] = new SearchResult('alert',(int)$r['id'],$title,$this->snippet($r['notes']??'', $needle),site_url('/Alerts/view/'.$r['id']),(float)($r['score']??0),(string)($r['created_at']??null));
            }
        }

        $total = count($results) < $limit ? ($offset + count($results)) : ($offset + $limit + 1);

        usort($results, function(SearchResult $a, SearchResult $b){
            if ($a->score == $b->score) {
                return strcmp((string)$b->createdAt, (string)$a->createdAt);
            }
            return ($a->score < $b->score) ? 1 : -1;
        });

        return ['items'=>$results, 'total'=>$total];
    }

    private function isFulltextSupported(): bool
    {
        try {
            $this->db->query("SELECT 1 FROM bf_projects LIMIT 1");
            return true;
        } catch (\Throwable $e) {
            return false;
        }
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

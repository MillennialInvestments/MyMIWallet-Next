<?php namespace App\Models\Predictions;

use CodeIgniter\Model;

class MarketsModel extends Model
{
    protected $table         = 'bf_predictions_markets';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useTimestamps = false;
    protected $allowedFields = [
        'slug','title','description','category','resolution_source','currency_mode',
        'state','open_at','lock_at','resolve_at','created_by','created_at','updated_at'
    ];

    protected $validationRules = [
        'title' => 'required|min_length[3]',
        'state' => 'in_list[DRAFT,OPEN,LOCKED,RESOLVED,CANCELED]',
        'currency_mode' => 'in_list[GOLD_CENTRIC,MULTI_ASSET]'
    ];

    /** Filters **/
    public function scopeOpen()
    {
        return $this->where('state', 'OPEN');
    }
    public function scopeActive()
    {
        return $this->whereIn('state', ['OPEN','LOCKED']);
    }
    public function byCategory(string $cat)
    {
        return $this->where('category', $cat);
    }
    public function search(string $q)
    {
        $q = trim($q);
        if ($q === '') return $this;
        return $this->groupStart()
                ->like('title', $q)
                ->orLike('description', $q)
                ->orLike('slug', $q)
            ->groupEnd();
    }

    /** Convenience **/
    public function listForIndex(array $filters = [], int $limit = 50, int $offset = 0): array
    {
        $builder = $this->orderBy('lock_at','ASC');
        if (!empty($filters['state']))        $builder->where('state', $filters['state']);
        if (!empty($filters['category']))     $builder->where('category', $filters['category']);
        if (!empty($filters['search']))       $builder = $this->search($filters['search']);
        return $builder->findAll($limit, $offset);
    }
}
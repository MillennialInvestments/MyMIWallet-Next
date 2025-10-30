<?php
namespace App\Modules\ScriptStudio\Models;

use CodeIgniter\Model;

class ScriptModel extends Model
{
    protected $table            = 'bf_script_studio';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'title',
        'slug',
        'description',
        'platform',
        'language',
        'code_raw',
        'code_emulated',
        'logic_type',
        'tags',
        'documentation',
        'price',
        'is_published',
        'created_by',
    ];

    protected $validationRules  = [
        'title'        => 'required|string|min_length[3]|max_length[255]',
        'description'  => 'permit_empty|string',
        'platform'     => 'required|in_list[TradingView,ThinkOrSwim,MetaTrader,NinjaTrader,TrendSpider,Custom]',
        'language'     => 'required|in_list[PineScript,ThinkScript,MQL4,MQL5,EasyLanguage,JavaScript,Custom]',
        'code_raw'     => 'permit_empty|string',
        'logic_type'   => 'required|in_list[Study,Scanner,Strategy]',
        'tags'         => 'permit_empty|string',
        'documentation'=> 'permit_empty|string',
        'price'        => 'permit_empty|decimal|greater_than_equal_to[0]',
        'is_published' => 'permit_empty|in_list[0,1]',
    ];

    protected $validationMessages = [
        'platform' => [
            'in_list' => 'Select a supported trading platform.',
        ],
        'language' => [
            'in_list' => 'Select a supported scripting language.',
        ],
        'logic_type' => [
            'in_list' => 'Logic type must be Study, Scanner, or Strategy.',
        ],
    ];

    public function getRules(): array
    {
        return $this->validationRules;
    }
}
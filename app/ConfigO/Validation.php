<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
        \Myth\Auth\Authentication\Passwords\ValidationRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    public $comments = [
        'ticker'       => 'required',
        'comment'      => 'required|min_length[3]' // Ensure the field name matches request
    ];   

    public $project = [
        'title'         => 'required|min_length[3]',
        'category'      => 'permit_empty|in_list[real_estate,business,ip,equipment,vehicle,node,other]',
        'offering_type' => 'permit_empty|in_list[revshare,equity,rental,hybrid]',
        'funding_goal'  => 'permit_empty|decimal',
        'valuation'     => 'permit_empty|decimal',
    ];

    public $asset = [
        'asset_type'    => 'required',
        'name'          => 'required',
        'metadata_json' => 'permit_empty|valid_json',
    ];

    public $token = [
        'chain'         => 'required|in_list[solana,evm,other]',
        'decimals'      => 'required|integer|greater_than_equal_to[0]|less_than_equal_to[18]',
        'total_supply'  => 'required|decimal',
        'minted_supply' => 'required|decimal',
    ];

    public $revenue = [
        'amount'     => 'required|decimal|greater_than[0]',
        'currency'   => 'required|in_list[USD,USDC,USDT]',
        'event_date' => 'required|valid_date',
        'source'     => 'required|in_list[rental,sale,royalty,service,other]',
    ];

    public $ownership = [
        'units' => 'required|decimal|greater_than[0]',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
}

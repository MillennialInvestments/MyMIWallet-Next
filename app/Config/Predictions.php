<?php namespace App\Config;

use CodeIgniter\Config\BaseConfig;

class Predictions extends BaseConfig
{
    public bool $enabled = true;
    public string $defaultMode = 'GOLD_CENTRIC'; // or MULTI_ASSET
    public bool $multiAssetEnabled = false;      // gate with .env
    public int $tradeFeeBips = 50;               // 0.50%
    public int $maxStakeGoldCents = 1_000_000;   // $10,000 (if using cents)
    public bool $allowLP = true;
    public bool $requireKyc = true;
    public bool $planGating = true;              // Starter/Basic/Pro/Premium
}
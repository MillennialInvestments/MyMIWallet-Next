<?php namespace App\Config;

use CodeIgniter\Config\BaseConfig;

class Blogger extends BaseConfig
{
    public string $defaultTone = 'confident';
    public array $defaultChannels = ['blog','email','x','linkedin'];
    public string $defaultCTA = 'https://www.mymiwallet.com/?utm_source=blogger&utm_medium=owned&utm_campaign=default';
    public string $brandVoice = 'clear, helpful, trustworthy, anti-fluff';
    public array $prohibitedPhrases = ['guaranteed returns','risk-free','moon'];
    public int $cacheTTLSeconds = 600;
}
?>
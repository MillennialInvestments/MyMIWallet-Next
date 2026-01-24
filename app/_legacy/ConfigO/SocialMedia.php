<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class SocialMedia extends BaseConfig
{
    public string $discord          = 'https://discord.gg/UUMexvA';
    public string $facebook_page    = 'https://www.facebook.com/MyMIWalletNews';
    public string $facebook_group   = 'https://www.facebook.com/InvestorsTalk';
    public string $linkedin         = 'https://www.linkedin.com/MyMIWallet';
    public string $tiktok           = 'https://www.tiktok.com/@MyMIWallet';
    public string $tradingview      = 'https://www.tradingview.com/u/MyMIWallet/';
    public string $twitter          = 'https://www.twitter.com/MyMIWalletNews';
    public string $youtube          = 'https://www.youtube.com/@MyMIWallet';
    public $twitter_api_key = 'YOUR_TWITTER_API_KEY';
    public $twitter_api_secret_key = 'YOUR_TWITTER_API_SECRET_KEY';
    public $twitter_access_token = 'YOUR_TWITTER_ACCESS_TOKEN';
    public $twitter_access_token_secret = 'YOUR_TWITTER_ACCESS_TOKEN_SECRET';

    public $linkedin_client_id = 'YOUR_LINKEDIN_CLIENT_ID';
    public $linkedin_client_secret = 'YOUR_LINKEDIN_CLIENT_SECRET';
    public $linkedin_redirect_uri = 'YOUR_LINKEDIN_REDIRECT_URI';

    public $discord_bot_token = 'YOUR_DISCORD_BOT_TOKEN';
    public $discord_channel_id = 'YOUR_DISCORD_CHANNEL_ID';

    public $promotional_yt_video = 'https://www.youtube.com/embed/AMCS5kwGgpA';
    
}
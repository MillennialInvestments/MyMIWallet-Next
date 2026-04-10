<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Marketing extends BaseConfig
{
    /** @var array<string,mixed> */
    public array $imap = [
        'host' => '',
        'port' => 993,
        'encryption' => 'ssl',
        'validate_cert' => false,
        'username' => '',
        'password' => '',
        'mailbox' => 'tradealerts@mymiwallet.com',
        'default_folder' => 'INBOX',
        'folders' => ['INBOX'],
        'search_criteria' => 'ALL',
        'timeout' => 30,
    ];

    /** @var array<string,mixed> */
    public array $newsScrape = [
        'accepted_subject_patterns' => [
            '/news\s+alert\s+for\s+all\s+symbols/i',
            '/press\s+release\s+alert\s+for\s+all\s+symbols/i',
            '/mt\s+newswires/i',
            '/business\s+wire/i',
            '/globenewswire/i',
            '/pr\s+newswire/i',
        ],
        'allowed_senders' => [
            'alerts@schwab.com',
            'donotreply@schwab.com',
            'alerts@thinkorswim.com',
            'notifications@thinkorswim.com',
        ],
        'footer_noise_tokens' => [
            'unsubscribe',
            'privacy policy',
            'view in browser',
            'this message was sent',
            'do not reply',
            'all rights reserved',
            'forwarded message',
        ],
        'provider_prefixes' => [
            'pr newswire' => 'PR Newswire',
            'globenewswire' => 'GlobeNewswire',
            'business wire' => 'Business Wire',
            'press release' => 'Press Release',
            'mt newswires' => 'MT Newswires',
        ],
        'debug_list_limit' => 10,
        'log_subject_rejections' => true,
    ];

    /** @var array<string,mixed> */
    public array $ocr = [
        'engine_mode' => 3,
        'page_segmentation_mode' => 6,
        'binary' => 'tesseract',
    ];

    /** @var array<string,mixed> */
    public array $tempScraper = [
        'table' => 'bf_marketing_temp_scraper',
        'default_status' => 'pending',
        'dedupe_on_content_hash' => true,
    ];

    /** @var array<string,mixed> */
    public array $storyline = [
        'lookback_limit' => 50,
        'keyword_weight' => 0.45,
        'title_weight' => 0.30,
        'domain_weight' => 0.10,
        'time_weight' => 0.15,
        'time_decay_hours' => 72,
        'match_threshold' => 0.35,
        'keyword_only_threshold' => 0.30,
    ];

    /** @var array<string,mixed> */
    public array $logging = [
        'debug_mode' => false,
        'log_imap_connection' => true,
        'log_rejection_reasons' => true,
    ];

    public function __construct()
    {
        parent::__construct();

        $folders = (string) env('MARKETING_IMAP_FOLDERS', 'INBOX');

        $this->imap['host'] = (string) env('MARKETING_IMAP_HOST', env('MYMI_ALERTS_IMAP_HOST', 'imap.dreamhost.com'));
        $this->imap['port'] = (int) env('MARKETING_IMAP_PORT', 993);
        $this->imap['encryption'] = (string) env('MARKETING_IMAP_ENCRYPTION', 'ssl');
        $this->imap['validate_cert'] = (bool) env('MARKETING_IMAP_VALIDATE_CERT', false);
        $this->imap['username'] = (string) env('MARKETING_IMAP_USERNAME', 'tradealerts@mymiwallet.com');
        $this->imap['password'] = (string) env('MARKETING_IMAP_PASSWORD', '');
        $this->imap['mailbox'] = (string) env('MARKETING_IMAP_MAILBOX', $this->imap['username']);
        $this->imap['default_folder'] = (string) env('MARKETING_IMAP_DEFAULT_FOLDER', 'INBOX');
        $this->imap['folders'] = array_values(array_filter(array_map('trim', explode(',', $folders))));
        if ($this->imap['folders'] === []) {
            $this->imap['folders'] = [(string) $this->imap['default_folder']];
        }
        $this->imap['search_criteria'] = (string) env('MARKETING_IMAP_SEARCH', 'ALL');
        $this->imap['timeout'] = (int) env('MARKETING_IMAP_TIMEOUT', 30);

        $patterns = (string) env('MARKETING_ACCEPT_SUBJECT_PATTERNS', '');
        if ($patterns !== '') {
            $this->newsScrape['accepted_subject_patterns'] = array_values(array_filter(array_map('trim', explode('|', $patterns))));
        }

        $senders = (string) env('MARKETING_ALLOWED_SENDERS', '');
        if ($senders !== '') {
            $this->newsScrape['allowed_senders'] = array_values(array_filter(array_map('trim', explode(',', $senders))));
        }

        $this->logging['debug_mode'] = (bool) env('MARKETING_DEBUG_MODE', false);
    }
}

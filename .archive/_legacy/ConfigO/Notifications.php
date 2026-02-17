<?php
// app/Config/Notifications.php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Notifications extends BaseConfig
{
    public $vapid = [
        'subject' => 'mailto:support@mymiwallet.com',
        'publicKey' => 'YOUR_PUBLIC_KEY_HERE',  // Replace with your actual public key
        'privateKey' => 'YOUR_PRIVATE_KEY_HERE' // Replace with your actual private key
    ];
}

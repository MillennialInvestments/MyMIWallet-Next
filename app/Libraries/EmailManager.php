<?php 

namespace App\Libraries;

#[\AllowDynamicProperties]
class EmailManager {
    private $dreamHostApiKey;

    public function __construct() {
        $this->dreamHostApiKey = env('DREAMHOST_API');  // Assign it here
    }

    public function addEmailToList($email, $tier) {
        $list = $this->getTierList($tier);
        $params = [
            'key' => $this->dreamHostApiKey,
            'cmd' => 'dns-add_record',
            'record' => $list,
            'type' => 'A',
            'value' => $email
        ];
        return $this->callDreamHostApi($params);
    }

    public function removeEmailFromList($email, $tier) {
        $list = $this->getTierList($tier);
        $params = [
            'key' => $this->dreamHostApiKey,
            'cmd' => 'dns-remove_record',
            'record' => $list,
            'type' => 'A',
            'value' => $email
        ];
        return $this->callDreamHostApi($params);
    }

    private function getTierList($tier) {
        $lists = [
            'Free' => 'free_alerts@yourdomain.com',
            'Tier 1' => 'tier1_alerts@yourdomain.com',
            'Tier 2' => 'tier2_alerts@yourdomain.com',
            'Tier 3' => 'tier3_alerts@yourdomain.com'
        ];
        return $lists[$tier] ?? 'free_alerts@yourdomain.com';
    }

    private function callDreamHostApi($params) {
        $url = "https://api.dreamhost.com/?" . http_build_query($params);
        return file_get_contents($url);
    }
}

?>

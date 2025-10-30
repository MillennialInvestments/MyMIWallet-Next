<?php
namespace App\Libraries\Privacy;

use CodeIgniter\Database\BaseConnection;

class DataExportService
{
    public function __construct(private BaseConnection $db) {}

    /** Return path to generated JSON file */
    public function exportUser(int $userId): string
    {
        $bundle = [
            'generated_at' => gmdate('c'),
            'user_id'      => $userId,
            'profiles'     => $this->db->table('bf_user_profiles')->where('user_id',$userId)
                                     ->select('user_id,phone,street,city,state,postal_code,created_at,updated_at')
                                     ->get()->getResultArray(),
            'wallets'      => $this->db->table('bf_wallets')->where('user_id',$userId)
                                     ->select('id,provider,address,chain,is_default,created_at')
                                     ->get()->getResultArray(),
            'alerts'       => $this->db->table('bf_investment_trade_alerts')->where('user_id',$userId)
                                     ->select('id,ticker,status,occurrences,created_at,updated_at')
                                     ->get()->getResultArray(),
        ];

        $dir  = WRITEPATH . 'exports';
        if (!is_dir($dir)) @mkdir($dir, 0755, true);
        $file = $dir . '/export_user_' . $userId . '_' . date('Ymd_His') . '.json';
        file_put_contents($file, json_encode($bundle, JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES));
        return $file;
    }
}

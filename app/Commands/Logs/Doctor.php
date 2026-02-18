<?php

namespace App\Commands\Logs;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;

class Doctor extends SafeBaseCommand
{
    protected $group       = 'logs';
    protected $name        = 'logs:doctor';
    protected $description = 'Validate CI4 logging and debug visibility plumbing.';

    public function run(array $params)
    {
        $this->parseParams($params);

        $results = [];
        $logDir = WRITEPATH . 'logs';
        $results['writable_logs'] = is_dir($logDir) && is_writable($logDir);

        log_message('info', '[logs:doctor] file log probe');
        $results['file_log_probe'] = true;

        $dbOk = false;
        $dbInsertOk = false;
        $authTables = [];

        try {
            $db = Database::connect();
            $dbOk = (bool) $db->connID;

            if ($dbOk) {
                try {
                    $db->table('bf_error_logs')->insert([
                        'level'      => 'info',
                        'message'    => '[logs:doctor] database log probe',
                        'context'    => json_encode(['source' => 'spark logs:doctor'], JSON_UNESCAPED_SLASHES),
                        'created_at' => date('Y-m-d H:i:s'),
                    ]);
                    $dbInsertOk = true;
                } catch (\Throwable $e) {
                    $dbInsertOk = false;
                    CLI::write('DB insert probe failed: ' . $e->getMessage(), 'yellow');
                }

                try {
                    $authRows = $db->query("SHOW TABLES LIKE 'auth_%'")->getResultArray();
                    $usersRows = $db->query("SHOW TABLES LIKE 'users'")->getResultArray();
                    $authTables = [
                        'auth_%' => count($authRows),
                        'users'  => count($usersRows),
                    ];
                } catch (\Throwable $e) {
                    CLI::write('Schema probe failed: ' . $e->getMessage(), 'yellow');
                }
            }
        } catch (\Throwable $e) {
            CLI::write('DB connectivity failed: ' . $e->getMessage(), 'yellow');
        }

        $results['db_connectivity'] = $dbOk;
        $results['db_log_insert'] = $dbInsertOk;

        try {
            throw new \RuntimeException('logs:doctor exception probe');
        } catch (\Throwable $e) {
            log_message('error', '[logs:doctor] exception probe: {msg}', ['msg' => $e->getMessage()]);
            $results['exception_probe'] = true;
        }

        CLI::write('logs:doctor results', 'green');
        foreach ($results as $key => $ok) {
            CLI::write(sprintf('- %s: %s', $key, $ok ? 'PASS' : 'FAIL'), $ok ? 'green' : 'red');
        }

        if ($authTables !== []) {
            CLI::write(sprintf("- schema auth_%% tables: %d | users tables: %d", $authTables['auth_%'], $authTables['users']));
        }

        return in_array(false, $results, true) ? EXIT_ERROR : EXIT_SUCCESS;
    }
}

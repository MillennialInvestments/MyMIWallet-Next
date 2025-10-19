<?php
namespace App\Libraries\Backups;

use ZipArchive;

class BackupService
{
    private static function dir(): string
    {
        $dir = rtrim(getenv('BACKUP_DIR') ?: (WRITEPATH.'backups'), '/');
        if (!is_dir($dir)) {
            @mkdir($dir, 0755, true);
        }
        return $dir;
    }

    public static function backupDatabase(): array
    {
        $ts = date('Ymd_His');
        $tmp = tempnam(sys_get_temp_dir(), 'dbbk_');
        $method = 'php';
        $dump = getenv('BACKUP_MYSQLDUMP_PATH');
        if ($dump && is_file($dump) && is_executable($dump)) {
            $cfg = config('Database')->default;
            $cmd = sprintf('%s --single-transaction --quick --routines --events --skip-lock-tables -h%s -u%s %s %s > %s 2>/dev/null',
                escapeshellcmd($dump), escapeshellarg($cfg['hostname']), escapeshellarg($cfg['username']),
                $cfg['password'] ? '-p'.escapeshellarg($cfg['password']) : '',
                escapeshellarg($cfg['database']), escapeshellarg($tmp)
            );
            @system($cmd);
            $method = 'mysqldump';
        } else {
            $zip = new ZipArchive();
            $zip->open($tmp, ZipArchive::OVERWRITE);
            $db = db_connect();
            $schema = '';
            $tables = [];
            $q = $db->query('SHOW TABLES');
            foreach ($q->getResultArray() as $row) {
                $tables[] = array_values($row)[0];
            }
            foreach ($tables as $t) {
                $row = $db->query('SHOW CREATE TABLE '.$t)->getRowArray();
                $schema .= $row['Create Table'].";\n\n";
                $zip->addFromString('data/'.$t.'.jsonl', self::dumpTableJsonl($t));
            }
            $zip->addFromString('schema.sql', $schema);
            $zip->close();
        }
        $payload = file_get_contents($tmp) ?: '';
        @unlink($tmp);
        $gz = gzencode($payload, 6);
        $enc = Crypto::encrypt($gz);
        $json = json_encode($enc, JSON_UNESCAPED_SLASHES);
        $fname = 'db_'.$ts.'.enc.json';
        $path = self::dir().'/'.$fname;
        file_put_contents($path, $json);
        $sha = hash('sha256', $json);
        db_connect()->table('bf_backup_manifests')->insert([
            'type'=>'db','filename'=>$fname,'bytes'=>strlen($json),'sha256'=>$sha,'method'=>$method,'encrypted'=>1,'created_at'=>date('Y-m-d H:i:s')
        ]);
        return ['filename'=>$fname,'bytes'=>strlen($json),'sha256'=>$sha];
    }

    public static function backupFiles(): array
    {
        $ts = date('Ymd_His');
        $fname = 'files_'.$ts.'.enc.json';
        $path = self::dir().'/'.$fname;
        $includes = array_filter(array_map('trim', explode(',', getenv('BACKUP_INCLUDE_DIRS') ?: 'public/uploads');
        $excludes = array_filter(array_map('trim', explode(',', getenv('BACKUP_EXCLUDE_GLOBS') ?: '');
        $tmp = tempnam(sys_get_temp_dir(), 'fbk_');
        $zip = new ZipArchive();
        $zip->open($tmp, ZipArchive::OVERWRITE);
        foreach ($includes as $rel) {
            $base = rtrim(FCPATH, '/').'/'.ltrim($rel, '/');
            if (!is_dir($base)) continue;
            $it = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($base, \FilesystemIterator::SKIP_DOTS));
            foreach ($it as $f) {
                $relpath = str_replace(rtrim(FCPATH,'/').'/', '', $f->getPathname());
                if (self::isExcluded($relpath, $excludes)) continue;
                $zip->addFile($f->getPathname(), $relpath);
            }
        }
        $zip->close();
        $payload = file_get_contents($tmp) ?: '';
        @unlink($tmp);
        $gz = gzencode($payload, 6);
        $enc = Crypto::encrypt($gz);
        $json = json_encode($enc, JSON_UNESCAPED_SLASHES);
        file_put_contents($path, $json);
        $sha = hash('sha256', $json);
        db_connect()->table('bf_backup_manifests')->insert([
            'type'=>'files','filename'=>$fname,'bytes'=>strlen($json),'sha256'=>$sha,'method'=>'php','encrypted'=>1,'created_at'=>date('Y-m-d H:i:s')
        ]);
        return ['filename'=>$fname,'bytes'=>strlen($json),'sha256'=>$sha];
    }

    public static function prune(): array
    {
        $dir = self::dir();
        $dbDays = (int)(getenv('BACKUP_RETENTION_DAYS_DB') ?: 14);
        $fsDays = (int)(getenv('BACKUP_RETENTION_DAYS_FILES') ?: 30);
        $cutDb = time() - $dbDays*86400;
        $cutFs = time() - $fsDays*86400;
        $removed = 0;
        $rows = db_connect()->table('bf_backup_manifests')->get()->getResultArray();
        foreach ($rows as $r) {
            $full = $dir.'/'.$r['filename'];
            $limit = $r['type']==='db' ? $cutDb : $cutFs;
            if (is_file($full) && filemtime($full) < $limit) {
                @unlink($full);
                $removed++;
            }
        }
        return ['removed'=>$removed];
    }

    private static function dumpTableJsonl(string $table): string
    {
        $db = db_connect();
        $rows = $db->table($table)->get()->getResultArray();
        $out = '';
        foreach ($rows as $r) {
            $out .= json_encode($r, JSON_UNESCAPED_SLASHES)."\n";
        }
        return $out;
    }

    private static function isExcluded(string $rel, array $globs): bool
    {
        foreach ($globs as $g) {
            if (fnmatch($g, $rel)) return true;
        }
        return false;
    }
}

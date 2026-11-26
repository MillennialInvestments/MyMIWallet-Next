<?php

/**
 * Run only the named App migrations, without running every pending one the
 * way `php spark migrate` does. Each one is recorded in the migrations table
 * like a normal run. A migration that is already applied is skipped (never
 * rolled back), and the script stops at the first failure.
 *
 *   php scripts/ops/db/run-migrations.php [--dry-run] 2026-11-14-000100_CreatePrivacyRequests ...
 *
 * Run it from the release root (for example /apps/TBI/www/mymiwallet/current).
 * Prints no data and no credentials.
 */

if (PHP_SAPI !== 'cli') {
    exit(1);
}

$args   = array_slice($argv, 1);
$dryRun = in_array('--dry-run', $args, true);
$names  = array_values(array_filter($args, static fn ($a) => $a !== '--dry-run'));
if ($names === []) {
    fwrite(STDERR, "usage: php scripts/ops/db/run-migrations.php [--dry-run] <migration file name> ...\n");
    exit(1);
}

$root = getcwd() . DIRECTORY_SEPARATOR;
if (! is_file($root . 'spark') || ! is_dir($root . 'app/Database/Migrations')) {
    fwrite(STDERR, "Run this from the release root (the folder that holds spark).\n");
    exit(1);
}

define('FCPATH', $root . 'public' . DIRECTORY_SEPARATOR);
chdir(FCPATH);
require $root . 'app/Config/Paths.php';
$paths = new Config\Paths();
defined('ROOTPATH') || define('ROOTPATH', $root);
require $paths->systemDirectory . '/Boot.php';
// bootConsole() does not define ENVIRONMENT, so take it the way spark would.
if (! defined('ENVIRONMENT')) {
    $envName = getenv('CI_ENVIRONMENT') ?: '';
    if ($envName === '' && is_readable($root . '.env')
        && preg_match('/^\s*CI_ENVIRONMENT\s*=\s*[\'"]?([A-Za-z]+)/m', (string) file_get_contents($root . '.env'), $m)) {
        $envName = $m[1];
    }
    define('ENVIRONMENT', $envName !== '' ? $envName : 'production');
}
CodeIgniter\Boot::bootConsole($paths);

$runner = service('migrations');
$runner->setNamespace('App');
$db       = db_connect();
$table    = config('Migrations')->table;
$applied  = [];
if ($db->tableExists($table)) {
    foreach ($db->table($table)->select('version, class')->where('namespace', 'App')->get()->getResultArray() as $row) {
        $applied[$row['version'] . '|' . ltrim($row['class'], '\\')] = true;
    }
}

foreach ($names as $name) {
    $name = basename($name, '.php');
    $file = APPPATH . 'Database/Migrations/' . $name . '.php';
    if (! is_file($file)) {
        $matches = glob(APPPATH . 'Database/Migrations/*_' . $name . '.php');
        if (! empty($matches) && count($matches) === 1) {
            $file = $matches[0];
            $name = basename($file, '.php');
        } else {
            fwrite(STDERR, "NOT FOUND: {$name}\n");
            exit(1);
        }
    }
    [$version] = explode('_', $name, 2);
    $class     = 'App\\Database\\Migrations\\' . substr($name, strlen($version) + 1);
    if (isset($applied[$version . '|' . $class])) {
        echo "already applied: {$name}\n";

        continue;
    }
    if ($dryRun) {
        echo "would run: {$name}\n";

        continue;
    }
    echo "running: {$name}\n";
    if (! $runner->force($file, 'App')) {
        fwrite(STDERR, "FAILED: {$name}\n");
        exit(1);
    }
    echo "done: {$name}\n";
}

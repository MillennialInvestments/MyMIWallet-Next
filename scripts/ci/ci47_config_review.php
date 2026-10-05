<?php

declare(strict_types=1);

$root = dirname(__DIR__, 2);
chdir($root);

$jsonOut = $root . '/writable/reports/ci47-config-review.json';
$mdOut   = $root . '/writable/reports/ci47-config-review.md';
foreach ($argv as $arg) {
    if (str_starts_with($arg, '--json=')) $jsonOut = $root . '/' . ltrim(substr($arg, 7), '/');
    if (str_starts_with($arg, '--md='))   $mdOut   = $root . '/' . ltrim(substr($arg, 5), '/');
}
@mkdir(dirname($jsonOut), 0775, true);
@mkdir(dirname($mdOut), 0775, true);

function parseEnv(string $file): array {
    if (!is_file($file)) return [];
    $out = [];
    foreach (file($file, FILE_IGNORE_NEW_LINES) ?: [] as $line) {
        $line = trim($line);
        if ($line === '' || str_starts_with($line, '#')) continue;
        if (str_starts_with($line, 'export ')) $line = trim(substr($line, 7));
        $p = strpos($line, '=');
        if ($p === false) continue;
        $k = trim(substr($line, 0, $p));
        $v = trim(substr($line, $p + 1));
        if ($v !== '' && (($v[0] === '"' && str_ends_with($v, '"')) || ($v[0] === "'" && str_ends_with($v, "'")))) $v = substr($v, 1, -1);
        if ($k !== '') $out[$k] = $v;
    }
    return $out;
}

function inferType(string $expr): string {
    $v = trim($expr);
    if ($v === '') return 'mixed';
    if ($v[0] === '[' || str_starts_with($v, 'array(')) return 'array';
    if ($v[0] === '"' || $v[0] === "'") return 'string';
    if ($v === 'true' || $v === 'false') return 'bool';
    if ($v === 'null') return 'null';
    if (preg_match('/^-?\d+$/', $v)) return 'int';
    if (preg_match('/^-?\d+\.\d+$/', $v)) return 'float';
    return 'mixed';
}

function summarizeValue(string $expr): string {
    $v = trim(preg_replace('/\s+/', ' ', $expr) ?? '');
    return strlen($v) > 120 ? substr($v, 0, 117) . '...' : $v;
}

function parseConfigFile(string $file): ?array {
    $code = (string) @file_get_contents($file);
    if ($code === '' || !preg_match('/namespace\s+Config\s*;/', $code) || !preg_match('/class\s+([A-Za-z_][A-Za-z0-9_]*)/', $code, $m)) {
        return null;
    }
    $class = $m[1];

    $tokens = token_get_all($code);
    $props = [];
    $pendingPublic = false;
    $captureVar = null;
    $captureVal = '';
    $capturing = false;
    $brace = 0;
    $inClass = false;

    for ($i = 0; $i < count($tokens); $i++) {
        $t = $tokens[$i];
        $id = is_array($t) ? $t[0] : null;
        $tx = is_array($t) ? $t[1] : $t;

        if ($id === T_CLASS) $inClass = true;
        if ($tx === '{') { if ($inClass) $brace++; }
        if ($tx === '}') { if ($inClass) { $brace--; if ($brace <= 0) $inClass = false; } }
        if (!$inClass || $brace !== 1) continue;

        if ($id === T_PUBLIC) { $pendingPublic = true; continue; }
        if (!$pendingPublic) continue;

        if ($id === T_VARIABLE && !$capturing) {
            $captureVar = substr($tx, 1);
            continue;
        }
        if ($tx === '=' && $captureVar !== null && !$capturing) {
            $capturing = true;
            $captureVal = '';
            continue;
        }
        if ($capturing) {
            if ($tx === ';') {
                $expr = trim($captureVal);
                $props[$captureVar] = ['type' => inferType($expr), 'value' => summarizeValue($expr)];
                $pendingPublic = false;
                $captureVar = null;
                $captureVal = '';
                $capturing = false;
            } else {
                $captureVal .= is_array($t) ? $t[1] : $t;
            }
            continue;
        }
        if ($tx === ';') {
            if ($captureVar !== null) $props[$captureVar] = ['type' => 'mixed', 'value' => '(uninitialized)'];
            $pendingPublic = false;
            $captureVar = null;
        }
    }

    ksort($props);
    return ['class' => $class, 'properties' => $props, 'file' => str_replace('\\', '/', $file)];
}

$vendor = [];
foreach (glob($root . '/vendor/codeigniter4/framework/app/Config/*.php') ?: [] as $f) {
    $s = parseConfigFile($f);
    if ($s) $vendor[basename($f)] = $s;
}
$app = [];
foreach (glob($root . '/app/Config/*.php') ?: [] as $f) {
    $b = basename($f);
    if (str_contains($b, '.bak') || str_contains($b, ' copy')) continue;
    $s = parseConfigFile($f);
    if ($s) $app[$b] = $s;
}

$report = [];
$sum = ['config_classes_checked'=>0,'properties_checked'=>0,'ok'=>0,'warning'=>0,'error'=>0];
foreach ($vendor as $file => $v) {
    if (!isset($app[$file])) {
        $report[$file] = ['status'=>'error','message'=>'Missing app config class that exists in CI4.7 baseline.'];
        $sum['error']++;
        continue;
    }
    $sum['config_classes_checked']++;
    foreach ($v['properties'] as $p => $exp) {
        $sum['properties_checked']++;
        $key = basename($file, '.php') . '.' . $p;
        if (!isset($app[$file]['properties'][$p])) {
            $report[$key] = ['expectedType'=>$exp['type'],'foundValue'=>null,'status'=>'error','suggestion'=>'Add missing public property to keep CI4.7 compatibility.'];
            $sum['error']++;
            continue;
        }
        $found = $app[$file]['properties'][$p];
        $status = $exp['type'] === $found['type'] || $exp['type'] === 'mixed' || $found['type'] === 'mixed' ? 'ok' : 'warning';
        $sug = $status === 'warning' ? "Expected {$exp['type']}, found {$found['type']}." : null;

        if ($key === 'App.baseURL') {
            $fv = trim($found['value'], "'\"");
            if ($fv === '' || !preg_match('#^https?://#', $fv) || !str_ends_with($fv, '/')) {
                $status = 'warning';
                $sug = 'baseURL should be absolute and end with trailing slash.';
            }
        }
        if ($key === 'App.indexPage' && trim($found['value'],"'\"") !== '') {
            $status = 'warning';
            $sug = 'indexPage should typically be empty with URL rewriting.';
        }
        if ($key === 'Encryption.key') {
            $fv = trim($found['value'], "'\"");
            if ($fv !== '' && strlen($fv) < 32) {
                $status = 'warning';
                $sug = 'Encryption key appears short; use a strong random key.';
            }
        }

        $report[$key] = [
            'expectedType'=>$exp['type'],'foundType'=>$found['type'],'expectedValueSample'=>$exp['value'],'foundValue'=>$found['value'],'status'=>$status,'suggestion'=>$sug
        ];
        $sum[$status]++;
    }
    foreach (array_diff(array_keys($app[$file]['properties']), array_keys($v['properties'])) as $extra) {
        $key = basename($file, '.php') . '.' . $extra;
        $report[$key] = ['expectedType'=>null,'foundType'=>$app[$file]['properties'][$extra]['type'],'foundValue'=>$app[$file]['properties'][$extra]['value'],'status'=>'warning','suggestion'=>'Custom property detected; confirm intentional usage.'];
        $sum['warning']++;
    }
}

$env = parseEnv($root . '/.env');
$envExample = parseEnv($root . '/.env.example');
$envStatus = ['envFileExists'=>is_file($root.'/.env'),'CI_ENVIRONMENT'=>$env['CI_ENVIRONMENT']??null,'status'=>'ok','warnings'=>[],'missingFromEnvComparedToExample'=>[],'unusedCiStyleKeys'=>[]];
if (!$envStatus['envFileExists']) { $envStatus['status']='warning'; $envStatus['warnings'][]='.env file missing; runtime overrides may rely on server env vars.'; }
$ciEnv = $env['CI_ENVIRONMENT'] ?? '';
if ($ciEnv === '') { $envStatus['status']='warning'; $envStatus['warnings'][]='CI_ENVIRONMENT not set in .env.'; }
elseif (!in_array($ciEnv, ['development','production','testing'], true)) { $envStatus['status']='error'; $envStatus['warnings'][]='CI_ENVIRONMENT must be development|production|testing.'; }
foreach ($envExample as $k => $_) if (!isset($env[$k]) && str_contains($k,'.')) $envStatus['missingFromEnvComparedToExample'][] = $k;
foreach (array_keys($env) as $k) {
    if (!str_contains($k, '.')) continue;
    [$c, $p] = array_pad(explode('.', $k, 2), 2, '');
    $f = ucfirst($c) . '.php';
    if (!isset($app[$f]) || !isset($app[$f]['properties'][$p])) $envStatus['unusedCiStyleKeys'][] = $k;
}

$requiredExt = ['intl','mbstring','json','openssl','curl','xml','ctype','filter','hash','session'];
$missingExt = [];
foreach ($requiredExt as $ext) if (!extension_loaded($ext)) $missingExt[] = $ext;
$phpServer = [
    'minimumPhpForCi47'=>'8.1.0',
    'runningPhp'=>PHP_VERSION,
    'phpOk'=>version_compare(PHP_VERSION,'8.1.0','>='),
    'requiredExtensions'=>$requiredExt,
    'missingExtensions'=>$missingExt,
    'recommendedIni'=>['display_errors'=>ini_get('display_errors'),'log_errors'=>ini_get('log_errors'),'error_reporting'=>ini_get('error_reporting')],
];

$w = [];
foreach (['writable','writable/cache','writable/logs','writable/session','writable/uploads'] as $p) {
    $abs = $root.'/'.$p;
    $w[$p] = ['exists'=>file_exists($abs),'isWritable'=>is_writable($abs),'status'=>(file_exists($abs)&&is_writable($abs))?'ok':'error'];
}

$out = [
    'generatedAt'=>date('c'),
    'frameworkVersion'=>'v4.7.0 baseline (vendor templates)',
    'summary'=>$sum,
    'propertyReport'=>$report,
    'customConfigClasses'=>array_values(array_diff(array_keys($app), array_keys($vendor))),
    'environment'=>$envStatus,
    'phpAndServer'=>$phpServer,
    'writableDirectories'=>$w,
    'docs'=>[
        'configuration'=>'https://codeigniter4.github.io/userguide/general/configuration.html',
        'dotEnv'=>'https://codeigniter4.github.io/userguide/general/configuration.html#setting-configuration-values-with-env-files',
        'requirements'=>'https://codeigniter4.github.io/userguide/intro/requirements.html',
        'security'=>'https://codeigniter4.github.io/userguide/libraries/security.html'
    ],
];
file_put_contents($jsonOut, json_encode($out, JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES));

$md = "# CONFIG REVIEW REPORT — CI4.7\n\n";
$md .= "- Generated: {$out['generatedAt']}\n";
$md .= "- Config classes checked: {$sum['config_classes_checked']}\n";
$md .= "- Properties checked: {$sum['properties_checked']}\n";
$md .= "- Status totals: ✅ {$sum['ok']} | ⚠️ {$sum['warning']} | ❌ {$sum['error']}\n\n";
$md .= "## Major Checks\n";
$md .= '- '.($phpServer['phpOk']?'✅':'❌')." PHP version >= {$phpServer['minimumPhpForCi47']} (found {$phpServer['runningPhp']})\n";
$md .= '- '.(empty($missingExt)?'✅':'⚠️').' Missing extensions: '.(empty($missingExt)?'none':implode(', ', $missingExt))."\n";
$st = $envStatus['status']; $em = $st==='ok'?'✅':($st==='warning'?'⚠️':'❌');
$md .= "- {$em} Environment status: {$st}\n\n";
$md .= "## Selected Property Results\n";
foreach (['App.baseURL','App.indexPage','Database.defaultGroup','Database.default.DBDriver','Security.CSRFProtection','Encryption.key'] as $k) {
    if (!isset($report[$k])) continue;
    $r = $report[$k];
    $em = $r['status']==='ok'?'✅':($r['status']==='warning'?'⚠️':'❌');
    $md .= "- {$em} `{$k}` → `{$r['foundValue']}`\n";
    if (!empty($r['suggestion'])) $md .= "  - Suggestion: {$r['suggestion']}\n";
}
$md .= "\n## Deployment/Writable Paths\n";
foreach ($w as $p => $c) {
    $em = $c['status']==='ok'?'✅':'❌';
    $md .= "- {$em} `{$p}` exists=".($c['exists']?'yes':'no').", writable=".($c['isWritable']?'yes':'no')."\n";
}
$md .= "\n## Recommended Actions\n";
foreach ($envStatus['warnings'] as $warn) $md .= "- {$warn}\n";
$md .= '- Review all ⚠️/❌ items in `'.str_replace($root.'/', '', $jsonOut)."`.\n";
$md .= "- Integrate this script into CI/CD pre-deploy checks.\n";
file_put_contents($mdOut, $md);

echo "CI4.7 config review complete\n";
echo 'JSON: '.str_replace($root.'/', '', $jsonOut)."\n";
echo 'MD:   '.str_replace($root.'/', '', $mdOut)."\n";

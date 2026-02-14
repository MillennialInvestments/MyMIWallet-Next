<?php

declare(strict_types=1);

$root = dirname(__DIR__, 2);
$targetPhp = $argv[1] ?? PHP_VERSION;
$timestamp = date('Ymd-His');
$outDir = $root . '/writable/triage/compat-audit';
@mkdir($outDir, 0775, true);
$jsonOut = $outDir . '/compat-audit-' . $timestamp . '.json';
$csvOut = $outDir . '/compat-audit-' . $timestamp . '.csv';

$exclude = ['/.git/', '/vendor/', '/writable/', '/node_modules/', '/build/', '/builds/', '/public/build/'];

$rules = [
    ['id'=>'CI3_LOADER','severity'=>'Critical','re'=>'/\$this->load->\w+\s*\(/','ex'=>'CI3 loader removed in CI4.','fix'=>'Use helper()/model()/view() APIs.','safe'=>false],
    ['id'=>'CI3_INPUT_POST','severity'=>'High','re'=>'/\$this->input->post\s*\(/','ex'=>'CI3 input API removed in CI4.','fix'=>'$this->request->getPost("field")','safe'=>true],
    ['id'=>'CI3_DB_QUERY','severity'=>'Medium','re'=>'/\$this->db->query\s*\(/','ex'=>'Legacy DB query style risk.','fix'=>'Use bound query or Query Builder.','safe'=>false],
    ['id'=>'CI3_SESSION_GETID','severity'=>'High','re'=>'/->getId\s*\(\s*\)/','ex'=>'Session getId usage may be incompatible.','fix'=>'Use session_id() or CI4 session helpers.','safe'=>false],
    ['id'=>'CI3_REMOVED_REQUEST','severity'=>'High','re'=>'/\$this->request->(is_ajax_request|fetch_request_headers)\s*\(/i','ex'=>'Legacy request method naming pattern.','fix'=>'Use isAJAX()/getHeaderLine()/headers().','safe'=>false],
    ['id'=>'CI3_REMOVED_RESPONSE','severity'=>'High','re'=>'/\$this->response->set_header\s*\(/i','ex'=>'Legacy response header API.','fix'=>'Use setHeader().','safe'=>false],

    ['id'=>'PHP_DYNAMIC_PROPERTY','severity'=>'High','re'=>'/\$[a-zA-Z_][a-zA-Z0-9_]*->([a-zA-Z_][a-zA-Z0-9_]*)\s*=\s*/','ex'=>'Potential dynamic property (PHP 8.2+ deprecation).','fix'=>'Declare class property explicitly.','safe'=>false],
    ['id'=>'PHP_NULL_STRING_FN','severity'=>'Medium','re'=>'/\b(strlen|trim|ltrim|rtrim|strpos|strtolower|strtoupper|substr)\s*\(\s*\$[a-zA-Z_][a-zA-Z0-9_]*\s*\)/','ex'=>'Possible null to string conversion risk.','fix'=>'Guard/cast before string fn call.','safe'=>false],
    ['id'=>'PHP_DEPRECATED_INTERPOLATION','severity'=>'Medium','re'=>'/"\$\{[^}]+\}"/','ex'=>'Deprecated interpolation syntax.','fix'=>'Use "{$var}" style.','safe'=>false],
    ['id'=>'PHP_FILTER_SANITIZE_STRING','severity'=>'High','re'=>'/FILTER_SANITIZE_STRING/','ex'=>'Deprecated filter constant.','fix'=>'Use FILTER_SANITIZE_FULL_SPECIAL_CHARS or explicit validation.','safe'=>true],
    ['id'=>'PHP_UTF8_ENCODE','severity'=>'Medium','re'=>'/\butf8_encode\s*\(/','ex'=>'Deprecated utf8_encode().','fix'=>'Use mb_convert_encoding().','safe'=>false],
    ['id'=>'PHP_UTF8_DECODE','severity'=>'Medium','re'=>'/\butf8_decode\s*\(/','ex'=>'Deprecated utf8_decode().','fix'=>'Use mb_convert_encoding().','safe'=>false],
    ['id'=>'PHP_FLOAT_TO_INT','severity'=>'Low','re'=>'/\(int\)\s*\$[a-zA-Z_][a-zA-Z0-9_]*\s*\*\s*[0-9\.]+/','ex'=>'Potential float-to-int truncation warning risk.','fix'=>'Round explicitly before cast.','safe'=>false],
    ['id'=>'PHP_REFLECTION_USAGE','severity'=>'Low','re'=>'/\bReflection(Parameter|Method|Property|Class)\b/','ex'=>'Reflection usage requires forward-compat review.','fix'=>'Review for target PHP runtime behavior.','safe'=>false],

    ['id'=>'RISK_NULL_CHAIN','severity'=>'High','re'=>'/\$[a-zA-Z_][a-zA-Z0-9_]*->\w+->\w+/','ex'=>'Possible null chain property access.','fix'=>'Use nullsafe operator or guards.','safe'=>false],
    ['id'=>'RISK_UNDEFINED_INDEX','severity'=>'High','re'=>'/\$[a-zA-Z_][a-zA-Z0-9_]*\s*\[\s*["\'][^"\']+["\']\s*\]/','ex'=>'Potential undefined index access.','fix'=>'Guard with ?? / isset().','safe'=>false],
    ['id'=>'RISK_SUPERGLOBAL_ACCESS','severity'=>'High','re'=>'/\$_(POST|GET|REQUEST|COOKIE|FILES|SERVER)\s*\[\s*["\'][^"\']+["\']\s*\]/','ex'=>'Direct superglobal access bypasses CI4 request layer.','fix'=>'Use request object + validation.','safe'=>false],
    ['id'=>'RISK_METHOD_EXISTS_DYNAMIC','severity'=>'Medium','re'=>'/\bmethod_exists\s*\(\s*\$[a-zA-Z_][a-zA-Z0-9_]*\s*,\s*\$[a-zA-Z_][a-zA-Z0-9_]*\s*\)/','ex'=>'Dynamic method_exists can hide incompatible paths.','fix'=>'Prefer interface/explicit checks.','safe'=>false],
    ['id'=>'RISK_UNGUARDED_SERVICE','severity'=>'Medium','re'=>'/\bservice\s*\(\s*["\'][^"\']+["\']\s*\)/','ex'=>'Service lookup can throw/fail unguarded.','fix'=>'Add fallback/error path for critical services.','safe'=>false],
    ['id'=>'RISK_UNCHECKED_REQUEST_INPUT','severity'=>'Medium','re'=>'/\$this->request->get(Post|Get|Var)\s*\(/','ex'=>'Input reads should be validated/sanitized.','fix'=>'Use validation rules and normalize inputs.','safe'=>false],
    ['id'=>'RISK_UNESCAPED_VIEW_OUTPUT','severity'=>'High','re'=>'/<\?=\s*\$[a-zA-Z_][a-zA-Z0-9_\[\]"\'\->]*\s*\?>/','ex'=>'Potential unescaped output in views.','fix'=>'Use <?= esc($value) ?> for user-controlled output.','safe'=>false,'viewOnly'=>true],
];

$it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root, FilesystemIterator::SKIP_DOTS));
$issues = [];
$filesScanned = 0;

foreach ($it as $file) {
    if (!$file->isFile() || $file->getExtension() !== 'php') continue;
    $path = str_replace('\\','/',$file->getPathname());
    $skip = false;
    foreach ($exclude as $x) { if (str_contains($path, $x)) { $skip = true; break; } }
    if ($skip) continue;

    $filesScanned++;
    $rel = ltrim(str_replace(str_replace('\\','/',$root), '', $path), '/');
    $isView = str_contains($rel, 'app/Views/');
    $lines = @file($path, FILE_IGNORE_NEW_LINES);
    if (!is_array($lines)) continue;

    foreach ($lines as $i=>$line) {
        foreach ($rules as $r) {
            if (($r['viewOnly'] ?? false) && !$isView) continue;
            if (!preg_match($r['re'], $line)) continue;
            $issues[] = [
                'severity'=>$r['severity'],
                'file'=>$rel,
                'line'=>$i+1,
                'rule'=>$r['id'],
                'snippet'=>trim($line),
                'explanation'=>$r['ex'],
                'replacement'=>$r['fix'],
                'autofix'=>$r['safe'] ? 'Safe auto-fix available' : 'Manual review required',
            ];
        }
    }
}

$counts = ['Critical'=>0,'High'=>0,'Medium'=>0,'Low'=>0];
foreach ($issues as $iss) {
    $counts[$iss['severity']] = ($counts[$iss['severity']] ?? 0)+1;
}

$composer = json_decode((string)@file_get_contents($root.'/composer.json'), true) ?: [];
$lock = json_decode((string)@file_get_contents($root.'/composer.lock'), true) ?: [];
$installedCi = null;
foreach (array_merge($lock['packages'] ?? [], $lock['packages-dev'] ?? []) as $p) {
    if (($p['name'] ?? '') === 'codeigniter4/framework') { $installedCi = $p['version'] ?? null; break; }
}

$report = [
  'generated_at'=>date('c'),'target_php'=>$targetPhp,'files_scanned'=>$filesScanned,'issues_total'=>count($issues),'severity_counts'=>$counts,
  'framework_drift'=>[
    'current_php'=>PHP_VERSION,
    'composer_php_requirement'=>$composer['require']['php'] ?? null,
    'composer_ci_requirement'=>$composer['require']['codeigniter4/framework'] ?? null,
    'installed_ci_version'=>$installedCi,
  ],
  'issues'=>$issues,
];

file_put_contents($jsonOut, json_encode($report, JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES));
$fp = fopen($csvOut, 'wb');
fputcsv($fp,['severity','rule','file','line','snippet','explanation','replacement','autofix']);
foreach($issues as $iss){fputcsv($fp,[$iss['severity'],$iss['rule'],$iss['file'],$iss['line'],$iss['snippet'],$iss['explanation'],$iss['replacement'],$iss['autofix']]);}
fclose($fp);

echo "files_scanned={$filesScanned}\n";
echo "issues_total=".count($issues)."\n";
echo "Critical={$counts['Critical']} High={$counts['High']} Medium={$counts['Medium']} Low={$counts['Low']}\n";
echo "json={$jsonOut}\n";
echo "csv={$csvOut}\n";

#!/usr/bin/env php
<?php
/**
 * MyMI AI-Ops Worker (Worker-Only Mode)
 * - Generates docs/_aiops/*.md reports
 * - Stores state in docs/_aiops/state.json
 *
 * Usage:
 *   php aiops/aiops_worker.php --mode=nightly
 *   php aiops/aiops_worker.php --mode=manual
 */

declare(strict_types=1);

function nowIso(): string { return gmdate('Y-m-d\TH:i:s\Z'); }

function repoRoot(): string {
    // aiops/aiops_worker.php => repo root is one level up from /aiops
    return realpath(__DIR__ . '/..') ?: getcwd();
}

function ensureDir(string $dir): void {
    $dir = ROOTPATH . ltrim(str_replace(ROOTPATH, '', $dir), '/');
    if (!is_dir($dir)) {
        @mkdir($dir, 0775, true);
    }
}

function writeFile(string $path, string $content): void {
    $path = ROOTPATH . ltrim(str_replace(ROOTPATH, '', $path), '/');
    ensureDir(dirname($path));
    file_put_contents($path, $content);
}

function extractManualTodosBlock(string $content): ?string {
    $start = '<!-- AIOPS_MANUAL_TODOS_START -->';
    $end = '<!-- AIOPS_MANUAL_TODOS_END -->';
    $pattern = '/## MANUAL_TODOS\s*' . preg_quote($start, '/') . '.*?' . preg_quote($end, '/') . '/s';
    if (preg_match($pattern, $content, $matches)) {
        return trim($matches[0]) . "\n";
    }

    return null;
}

function listFiles(string $baseDir, string $pattern = '/\.md$/i'): array {
    $out = [];
    $it = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($baseDir, FilesystemIterator::SKIP_DOTS)
    );
    foreach ($it as $file) {
        /** @var SplFileInfo $file */
        if (!$file->isFile()) continue;
        $p = $file->getPathname();
        if (preg_match($pattern, $p)) $out[] = $p;
    }
    sort($out);
    return $out;
}

function relPath(string $abs, string $root): string {
    $root = rtrim(str_replace('\\', '/', $root), '/') . '/';
    $abs  = str_replace('\\', '/', $abs);
    return str_starts_with($abs, $root) ? substr($abs, strlen($root)) : $abs;
}

function shaFileSafe(string $path): string {
    return is_file($path) ? hash_file('sha256', $path) : '';
}

function loadState(string $path): array {
    if (!is_file($path)) return ['docs' => [], 'last_run' => null];
    $raw = file_get_contents($path);
    $json = json_decode($raw ?: '[]', true);
    return is_array($json) ? $json : ['docs' => [], 'last_run' => null];
}

function saveState(string $path, array $state): void {
    $path = ROOTPATH . ltrim(str_replace(ROOTPATH, '', $path), '/');
    ensureDir(dirname($path));
    file_put_contents($path, json_encode($state, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
}

function runCmd(string $cmd, int $timeoutSeconds = 60): array {
    // Simple safe exec wrapper (no interactive). DreamHost-friendly.
    $descriptor = [
        1 => ['pipe', 'w'],
        2 => ['pipe', 'w'],
    ];
    $proc = proc_open($cmd, $descriptor, $pipes);
    if (!is_resource($proc)) return ['exit' => 1, 'out' => '', 'err' => 'proc_open failed'];

    stream_set_blocking($pipes[1], false);
    stream_set_blocking($pipes[2], false);

    $out = '';
    $err = '';
    $start = time();
    while (true) {
        $out .= stream_get_contents($pipes[1]);
        $err .= stream_get_contents($pipes[2]);

        $status = proc_get_status($proc);
        if (!$status['running']) break;

        if ((time() - $start) > $timeoutSeconds) {
            proc_terminate($proc);
            break;
        }
        usleep(100000);
    }

    fclose($pipes[1]);
    fclose($pipes[2]);
    $exit = proc_close($proc);

    return ['exit' => (int)$exit, 'out' => trim($out), 'err' => trim($err)];
}

/** --------------------------- MAIN --------------------------- */

$root = repoRoot();
define('ROOTPATH', rtrim($root, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR);
$mode = 'nightly';
foreach ($argv as $arg) {
    if (str_starts_with($arg, '--mode=')) $mode = substr($arg, 7);
}

$docsDir = ROOTPATH . 'docs';
$aiopsDocsDir = $docsDir . '/_aiops';
$statePath = $aiopsDocsDir . '/state.json';

ensureDir($aiopsDocsDir);
ensureDir(dirname($statePath));

$state = loadState($statePath);
$runStarted = nowIso();

// 0) Inventory docs
$mdFiles = is_dir($docsDir) ? listFiles($docsDir, '/\.md$/i') : [];
$mdFiles = array_values(array_filter($mdFiles, fn($p) => strpos(str_replace('\\','/',$p), '/docs/_aiops/') === false));

$docChanges = [];
$newDocsState = $state['docs'] ?? [];
foreach ($mdFiles as $abs) {
    $rel = relPath($abs, $root);
    $hash = shaFileSafe($abs);
    $mtime = is_file($abs) ? gmdate('Y-m-d', (int)filemtime($abs)) : null;

    $prev = $newDocsState[$rel] ?? null;
    $changeType = 'unchanged';
    if (!$prev) $changeType = 'new';
    elseif (($prev['hash'] ?? '') !== $hash) $changeType = 'modified';

    $newDocsState[$rel] = [
        'hash' => $hash,
        'mtime' => $mtime,
    ];

    $docChanges[] = [
        'path' => $rel,
        'last_modified' => $mtime,
        'change' => $changeType,
    ];
}

// 1) Write doc-change-log.md
$changedCount = 0;
$docLog = "# AI-Ops: Doc Change Log\n> Auto-generated. Do not edit manually.\n> Run: {$runStarted}\n\n";
foreach ($docChanges as $d) {
    if ($d['change'] !== 'unchanged') $changedCount++;
    $docLog .= "- {$d['path']}\n";
    $docLog .= "  - Last updated: " . ($d['last_modified'] ?: 'unknown') . "\n";
    $docLog .= "  - Change type: {$d['change']}\n";
}
writeFile($aiopsDocsDir . '/doc-change-log.md', $docLog);

// 2) Gap report (lightweight heuristic)
$codeTargets = [
    $root . '/app/Modules',
    $root . '/app/Controllers',
    $root . '/app/Libraries',
];
$codeFiles = [];
foreach ($codeTargets as $dir) {
    if (is_dir($dir)) {
        $codeFiles = array_merge($codeFiles, listFiles($dir, '/\.(php)$/i'));
    }
}
$codeFilesRel = array_map(fn($p) => relPath($p, $root), $codeFiles);

$gap = "# AI-Ops: Gap Report\n> Auto-generated. Do not edit manually.\n> Run: {$runStarted}\n\n";

$gap .= "## Undocumented Code (best-effort)\n";
$undocumented = [];
foreach ($codeFilesRel as $cf) {
    // Heuristic: if filename appears anywhere in docs paths, consider documented
    $base = strtolower(basename($cf, '.php'));
    $found = false;
    foreach ($mdFiles as $mdAbs) {
        $mdRel = strtolower(relPath($mdAbs, $root));
        if (strpos($mdRel, $base) !== false) { $found = true; break; }
    }
    if (!$found) $undocumented[] = $cf;
}
$gap .= $undocumented ? "" : "- ✅ None detected by heuristic\n";
foreach (array_slice($undocumented, 0, 200) as $u) {
    $gap .= "- {$u}\n  - ⚠️ No obvious doc match found (heuristic)\n";
}
if (count($undocumented) > 200) {
    $gap .= "- … and " . (count($undocumented) - 200) . " more\n";
}

$gap .= "\n## Documented Items With No Obvious Code Match (best-effort)\n";
$docNoCode = [];
foreach ($mdFiles as $mdAbs) {
    $mdRel = relPath($mdAbs, $root);
    $base = strtolower(basename($mdRel, '.md'));
    // If doc base appears in any code filename, assume match
    $found = false;
    foreach ($codeFilesRel as $cf) {
        if (strpos(strtolower($cf), $base) !== false) { $found = true; break; }
    }
    if (!$found && !str_starts_with($mdRel, 'docs/_aiops/')) $docNoCode[] = $mdRel;
}
$gap .= $docNoCode ? "" : "- ✅ None detected by heuristic\n";
foreach (array_slice($docNoCode, 0, 200) as $d) {
    $gap .= "- {$d}\n  - ❌ No obvious code match found (heuristic)\n";
}
if (count($docNoCode) > 200) {
    $gap .= "- … and " . (count($docNoCode) - 200) . " more\n";
}

writeFile($aiopsDocsDir . '/gap-report.md', $gap);

// 3) Stale docs detection (mtime-only baseline; code-linking heuristic optional)
$stale = "# AI-Ops: Stale Docs\n> Auto-generated. Do not edit manually.\n> Run: {$runStarted}\n\n";
$staleEntries = [];

$now = time();
$days = fn(int $ts) => (int)floor(($now - $ts) / 86400);

foreach ($mdFiles as $mdAbs) {
    $mdRel = relPath($mdAbs, $root);
    $mdMtime = is_file($mdAbs) ? (int)filemtime($mdAbs) : 0;
    $mdAge = $mdMtime ? $days($mdMtime) : 9999;

    // Baseline rule: stale if doc older than 60 days
    if ($mdAge >= 60) {
        $staleEntries[] = [
            'doc' => $mdRel,
            'doc_age_days' => $mdAge,
            'doc_date' => $mdMtime ? gmdate('Y-m-d', $mdMtime) : 'unknown'
        ];
    }
}

if (!$staleEntries) {
    $stale .= "- ✅ No stale docs detected (>= 60 days)\n";
} else {
    foreach (array_slice($staleEntries, 0, 200) as $e) {
        $stale .= "- {$e['doc']}\n";
        $stale .= "  - Doc last updated: {$e['doc_date']} ({$e['doc_age_days']} days ago)\n";
    }
}
writeFile($aiopsDocsDir . '/stale-docs.md', $stale);

// 4) Next steps (SAFE MODE)
$next = "# AI-Ops: Next Steps (Worker-Only Suggestions)\n> Auto-generated. Do not edit manually.\n> Run: {$runStarted}\n\n";
$nextItems = [];
$manualBlock = null;
$manualPath = $aiopsDocsDir . '/next-steps.md';
if (is_file($manualPath)) {
    $existing = file_get_contents($manualPath);
    if (is_string($existing)) {
        $manualBlock = extractManualTodosBlock($existing);
    }
}
if ($manualBlock === null) {
    $manualBlock = "## MANUAL_TODOS\n"
        . "<!-- AIOPS_MANUAL_TODOS_START -->\n"
        . "- [ ] Example: Review scraper pacing for 15m cycle\n"
        . "- [ ] Example: Add LinkedIn post template variants\n"
        . "<!-- AIOPS_MANUAL_TODOS_END -->\n";
}

// Suggest documenting top undocumented code files
foreach (array_slice($undocumented, 0, 10) as $u) {
    $nextItems[] = "[DOC ONLY] Add/extend docs mentioning `" . basename($u) . "`\n  - Reason: Code exists with no obvious doc reference (heuristic)\n  - File: {$u}";
}
// Suggest reviewing stale docs
foreach (array_slice($staleEntries, 0, 10) as $e) {
    $nextItems[] = "[DOC ONLY] Review stale doc: `{$e['doc']}`\n  - Reason: Doc unchanged for {$e['doc_age_days']} days";
}
// Cap + include safe refactor suggestion placeholder
$nextItems[] = "[LOW RISK] Add/verify headers in docs/_aiops outputs\n  - Reason: enforce 'Auto-generated' rule and reduce accidental edits";

foreach ($nextItems as $item) $next .= "- " . str_replace("\n", "\n  ", $item) . "\n";
$next .= "\n" . $manualBlock . "\n";
writeFile($aiopsDocsDir . '/next-steps.md', $next);

// 5) Spark results (whitelist)
$spark = "# AI-Ops: Spark Results\n> Auto-generated. Do not edit manually.\n> Run: {$runStarted}\n\n";

$php = PHP_BINARY ?: 'php';
$whitelist = [
    "{$php} spark logs:summarize",
    "{$php} spark routes:list",
    "{$php} spark app:healthcheck",
];

$ran = 0;
foreach ($whitelist as $cmd) {
    $res = runCmd("cd " . escapeshellarg($root) . " && {$cmd}", 90);
    $ran++;

    $spark .= "## Command {$ran}\n";
    $spark .= "- Cmd: `{$cmd}`\n";
    $spark .= "- Exit: {$res['exit']}\n";
    if ($res['out']) $spark .= "- Output:\n\n```\n" . substr($res['out'], 0, 4000) . "\n```\n\n";
    if ($res['err']) $spark .= "- Errors:\n\n```\n" . substr($res['err'], 0, 2000) . "\n```\n\n";
}
writeFile($aiopsDocsDir . '/spark-results.md', $spark);

// 6) CI summary (placeholder unless you wire GitHub API)
$ci = "# AI-Ops: CI Summary\n> Auto-generated. Do not edit manually.\n> Run: {$runStarted}\n\n";
$ci .= "- CI integration not configured in this worker yet.\n";
$ci .= "- If using GitHub Actions, wire a lightweight fetch (token) or write CI artifacts into writable/aiops/.\n";
writeFile($aiopsDocsDir . '/ci-summary.md', $ci);

// 7) Nightly summary (single pane)
$nightly = "# AI-Ops: Nightly Summary\n> Auto-generated. Do not edit manually.\n> Run: {$runStarted}\n\n";
$nightly .= "## Docs\n";
$nightly .= "- Changed docs: {$changedCount}\n";
$nightly .= "- Total docs scanned: " . count($mdFiles) . "\n\n";

$nightly .= "## Gaps (heuristic)\n";
$nightly .= "- Undocumented code candidates: " . count($undocumented) . "\n";
$nightly .= "- Docs with no code match candidates: " . count($docNoCode) . "\n\n";

$nightly .= "## Stale Docs\n";
$nightly .= "- Docs older than 60 days: " . count($staleEntries) . "\n\n";

$nightly .= "## Suggestions\n";
$nightly .= "- See: `docs/_aiops/next-steps.md`\n\n";

$nightly .= "## Ops\n";
$nightly .= "- Spark results: `docs/_aiops/spark-results.md`\n";
$nightly .= "- CI summary: `docs/_aiops/ci-summary.md`\n";

writeFile($aiopsDocsDir . '/nightly-summary.md', $nightly);

// Save state
$state['docs'] = $newDocsState;
$state['last_run'] = $runStarted;
saveState($statePath, $state);

echo "AI-Ops worker complete. Wrote docs/_aiops outputs. Run={$runStarted}\n";
exit(0);

# Filesystem Lint Report

- Generated: 2026-02-10T13:58:57+00:00
- Total violations: 71
- Errors: 0
- Warnings: 71

## app/Commands/AiOps/CommandIndex.php:139
Issue: Missing ROOTPATH anchor
Fix:
Replace:
@mkdir($directory, 0775, true);

With:
@mkdir(ROOTPATH . 'docs/_aiops/autofix.json', 0775, true);

Allowed:
- docs/_aiops/

## app/Commands/AiOps/CommandIndex.php:143
Issue: Missing ROOTPATH anchor
Fix:
Replace:
file_put_contents($jsonPath, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

With:
file_put_contents(ROOTPATH . 'docs/_aiops/autofix.json', json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

Allowed:
- docs/_aiops/

## app/Commands/AiOps/ScanCells.php:76
Issue: Missing ROOTPATH anchor
Fix:
Replace:
mkdir($runDir, 0775, true);

With:
mkdir(ROOTPATH . 'docs/_aiops/autofix.json', 0775, true);

Allowed:
- docs/_aiops/

## app/Commands/AiOps/PublicPagesAudit.php:64
Issue: Missing ROOTPATH anchor
Fix:
Replace:
mkdir($dir, 0775, true);

With:
mkdir(ROOTPATH . 'docs/_aiops/autofix.json', 0775, true);

Allowed:
- docs/_aiops/

## app/Commands/AiOps/PublicPagesAudit.php:94
Issue: Missing ROOTPATH anchor
Fix:
Replace:
file_put_contents($reportPath, $report);

With:
file_put_contents(ROOTPATH . 'docs/_aiops/autofix.json', $report);

Allowed:
- docs/_aiops/

## app/Commands/AiOps/PublicPagesAudit.php:97
Issue: Missing ROOTPATH anchor
Fix:
Replace:
file_put_contents($violationPath, "# Public Pages Violations\n\n- None\n");

With:
file_put_contents(ROOTPATH . 'docs/_aiops/autofix.json', "# Public Pages Violations\n\n- None\n");

Allowed:
- docs/_aiops/

## app/Commands/AiOps/PublicPagesAudit.php:107
Issue: Missing ROOTPATH anchor
Fix:
Replace:
file_put_contents($violationPath, $body);

With:
file_put_contents(ROOTPATH . 'docs/_aiops/autofix.json', $body);

Allowed:
- docs/_aiops/

## app/Commands/AiOps/PublicPagesReport.php:41
Issue: Missing ROOTPATH anchor
Fix:
Replace:
mkdir($dir, 0775, true);

With:
mkdir(ROOTPATH . 'docs/_aiops/autofix.json', 0775, true);

Allowed:
- docs/_aiops/

## app/Commands/AiOps/PublicPagesReport.php:44
Issue: Missing ROOTPATH anchor
Fix:
Replace:
file_put_contents($dir . '/run_summary.json', (string) ($run['summary_json'] ?: '{}'));

With:
file_put_contents(ROOTPATH . 'docs/_aiops/autofix.json', (string) ($run['summary_json'] ?: '{}'));

Allowed:
- docs/_aiops/

## app/Commands/AiOps/PublicPagesReport.php:73
Issue: Missing ROOTPATH anchor
Fix:
Replace:
file_put_contents($dir . '/publish_suggestions.md', $md);

With:
file_put_contents(ROOTPATH . 'docs/_aiops/autofix.json', $md);

Allowed:
- docs/_aiops/

## app/Commands/AiOps/PublicPagesRun.php:129
Issue: Missing ROOTPATH anchor
Fix:
Replace:
mkdir($dir, 0775, true);

With:
mkdir(ROOTPATH . 'docs/_aiops/autofix.json', 0775, true);

Allowed:
- docs/_aiops/

## app/Commands/AiOps/PublicPagesRun.php:139
Issue: Missing ROOTPATH anchor
Fix:
Replace:
file_put_contents($dir . '/violations.md', $body);

With:
file_put_contents(ROOTPATH . 'docs/_aiops/autofix.json', $body);

Allowed:
- docs/_aiops/

## app/Commands/AiOps/Unlock.php:39
Issue: Missing ROOTPATH anchor
Fix:
Replace:
mkdir($unlockDir, 0775, true);

With:
mkdir(ROOTPATH . 'docs/_aiops/autofix.json', 0775, true);

Allowed:
- docs/_aiops/

## app/Commands/AiOps/CopilotValidate.php:290
Issue: Missing ROOTPATH anchor
Fix:
Replace:
@mkdir($directory, 0775, true);

With:
@mkdir(ROOTPATH . 'docs/_aiops/autofix.json', 0775, true);

Allowed:
- docs/_aiops/

## app/Commands/AiOps/CopilotValidate.php:294
Issue: Missing ROOTPATH anchor
Fix:
Replace:
file_put_contents($path, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

With:
file_put_contents(ROOTPATH . 'docs/_aiops/autofix.json', json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

Allowed:
- docs/_aiops/

## app/Commands/AiOps/Audit.php:58
Issue: Missing ROOTPATH anchor
Fix:
Replace:
@mkdir($dir, 0775, true);

With:
@mkdir(ROOTPATH . 'docs/_aiops/autofix.json', 0775, true);

Allowed:
- docs/_aiops/

## app/Commands/AiOps/Audit.php:60
Issue: Missing ROOTPATH anchor
Fix:
Replace:
file_put_contents($mdAbsPath, $this->buildOrchestrationMarkdown($orchestration));

With:
file_put_contents(ROOTPATH . 'docs/_aiops/autofix.json', $this->buildOrchestrationMarkdown($orchestration));

Allowed:
- docs/_aiops/

## app/Commands/AiOps/Backlog.php:134
Issue: Missing ROOTPATH anchor
Fix:
Replace:
file_put_contents($reportPath, $report);

With:
file_put_contents(ROOTPATH . 'docs/_aiops/autofix.json', $report);

Allowed:
- docs/_aiops/

## app/Commands/AiOps/Backlog.php:185
Issue: Missing ROOTPATH anchor
Fix:
Replace:
mkdir($dir, 0775, true);

With:
mkdir(ROOTPATH . 'docs/_aiops/autofix.json', 0775, true);

Allowed:
- docs/_aiops/

## app/Commands/AiOps/SelfHeal.php:3
Issue: Missing ROOTPATH anchor
Fix:
Replace:
class SelfHeal extends SafeBaseCommand { use SubsCommandTrait; protected $group = 'AI-Ops'; protected $name='aiops:self-heal'; protected $description='Run one-pass self-heal'; protected $options=['--attempts'=>'max 3','--json'=>'JSON']; public function run(array $params){$this->parseParams($params);$json=$this->optBool('json');$attempts=max(1,min(3,$this->optInt('attempts', 1)));$lock = ROOTPATH . 'aiops/runtime/selfheal.lock'; if(is_file($lock) && (time()-filemtime($lock))<600){$out=['status'=>'locked','message'=>'self-heal already running'];$this->emit($out,$json);return EXIT_SUCCESS;} file_put_contents($lock,(string)getmypid()); try {$runs=[]; for($i=1;$i<=$attempts;$i++){ $audit=command('aiops:audit --json=1'); $repair=command('aiops:repair --json=1'); $status=command('aiops:status --json=1'); $runs[]=['cycle'=>$i,'audit'=>$audit,'repair'=>$repair,'status'=>$status]; } $md="# Self Heal ".date('c')."\n\nAttempts: {$attempts}\n"; $path=$this->writeDoc('nightly','self-heal-'.date('Y-m-d--Hi').'.md',$md); $out=['status'=>'ok','attempts'=>$attempts,'report'=>$path]; } finally {@unlink($lock);} $this->emit($out,$json); return EXIT_SUCCESS; }}

With:
class SelfHeal extends SafeBaseCommand { use SubsCommandTrait; protected $group = 'AI-Ops'; protected $name='aiops:self-heal'; protected $description='Run one-pass self-heal'; protected $options=['--attempts'=>'max 3','--json'=>'JSON']; public function run(array $params){$this->parseParams($params);$json=$this->optBool('json');$attempts=max(1,min(3,$this->optInt('attempts', 1)));ROOTPATH . 'docs/_aiops/autofix.json' = ROOTPATH . 'aiops/runtime/selfheal.lock'; if(is_file(ROOTPATH . 'docs/_aiops/autofix.json') && (time()-filemtime(ROOTPATH . 'docs/_aiops/autofix.json'))<600){$out=['status'=>'locked','message'=>'self-heal already running'];$this->emit($out,$json);return EXIT_SUCCESS;} file_put_contents(ROOTPATH . 'docs/_aiops/autofix.json',(string)getmypid()); try {$runs=[]; for($i=1;$i<=$attempts;$i++){ $audit=command('aiops:audit --json=1'); $repair=command('aiops:repair --json=1'); $status=command('aiops:status --json=1'); $runs[]=['cycle'=>$i,'audit'=>$audit,'repair'=>$repair,'status'=>$status]; } $md="# Self Heal ".date('c')."\n\nAttempts: {$attempts}\n"; $path=$this->writeDoc('nightly','self-heal-'.date('Y-m-d--Hi').'.md',$md); $out=['status'=>'ok','attempts'=>$attempts,'report'=>$path]; } finally {@unlink(ROOTPATH . 'docs/_aiops/autofix.json');} $this->emit($out,$json); return EXIT_SUCCESS; }}

Allowed:
- docs/_aiops/

## app/Commands/Ops/CommandsLint.php:175
Issue: Missing ROOTPATH anchor
Fix:
Replace:
@mkdir($directory, 0775, true);

With:
@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);

Allowed:
- docs/_ops/
- ci/

## app/Commands/Ops/CommandsLint.php:179
Issue: Missing ROOTPATH anchor
Fix:
Replace:
file_put_contents($path, json_encode($payload, JSON_PRETTY_PRINT));

With:
file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($payload, JSON_PRETTY_PRINT));

Allowed:
- docs/_ops/
- ci/

## app/Commands/Ops/CiPrepare.php:31
Issue: Missing ROOTPATH anchor
Fix:
Replace:
@mkdir($path, 0775, true);

With:
@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);

Allowed:
- docs/_ops/
- ci/

## app/Commands/Ops/CiPrepare.php:58
Issue: Missing ROOTPATH anchor
Fix:
Replace:
@mkdir(dirname($path), 0775, true);

With:
@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);

Allowed:
- docs/_ops/
- ci/

## app/Commands/Ops/CiPrepare.php:59
Issue: Missing ROOTPATH anchor
Fix:
Replace:
file_put_contents($path, json_encode($report, JSON_PRETTY_PRINT));

With:
file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($report, JSON_PRETTY_PRINT));

Allowed:
- docs/_ops/
- ci/

## app/Commands/Ops/CommandsAudit.php:34
Issue: Missing ROOTPATH anchor
Fix:
Replace:
@mkdir($targetDir, 0775, true);

With:
@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);

Allowed:
- docs/_ops/
- ci/

## app/Commands/Ops/FilesystemFix.php:68
Issue: Missing ROOTPATH anchor
Fix:
Replace:
@mkdir(dirname($patchPath), 0775, true);

With:
@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);

Allowed:
- docs/_ops/
- ci/

## app/Commands/Ops/FilesystemFix.php:70
Issue: Missing ROOTPATH anchor
Fix:
Replace:
file_put_contents($patchPath, $diff);

With:
file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $diff);

Allowed:
- docs/_ops/
- ci/

## app/Commands/Ops/NextSteps.php:281
Issue: Missing ROOTPATH anchor
Fix:
Replace:
mkdir($dir, 0775, true);

With:
mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);

Allowed:
- docs/_ops/
- ci/

## app/Commands/Ops/NextSteps.php:283
Issue: Missing ROOTPATH anchor
Fix:
Replace:
file_put_contents($target, $markdown);

With:
file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $markdown);

Allowed:
- docs/_ops/
- ci/

## app/Commands/Ops/NextSteps.php:293
Issue: Missing ROOTPATH anchor
Fix:
Replace:
mkdir($dir, 0775, true);

With:
mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);

Allowed:
- docs/_ops/
- ci/

## app/Commands/Ops/NextSteps.php:304
Issue: Missing ROOTPATH anchor
Fix:
Replace:
@mkdir(dirname($path), 0775, true);

With:
@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);

Allowed:
- docs/_ops/
- ci/

## app/Commands/Ops/NextSteps.php:305
Issue: Missing ROOTPATH anchor
Fix:
Replace:
file_put_contents($path, json_encode($payload, JSON_PRETTY_PRINT));

With:
file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($payload, JSON_PRETTY_PRINT));

Allowed:
- docs/_ops/
- ci/

## app/Commands/Ops/ProposePr.php:355
Issue: Missing ROOTPATH anchor
Fix:
Replace:
mkdir($rootedDir, 0775, true);

With:
mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);

Allowed:
- docs/_ops/
- ci/

## app/Commands/Ops/ProposePr.php:364
Issue: Missing ROOTPATH anchor
Fix:
Replace:
@mkdir($rootedDir, 0775, true);

With:
@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);

Allowed:
- docs/_ops/
- ci/

## app/Commands/Ops/ProposePr.php:366
Issue: Missing ROOTPATH anchor
Fix:
Replace:
if (file_put_contents($rootedPath, $content) === false) {

With:
if (file_put_contents(ROOTPATH . 'docs/_ops/autofix.json') {

Allowed:
- docs/_ops/
- ci/

## app/Commands/Support/SubsCommandTrait.php:49
Issue: Missing ROOTPATH anchor
Fix:
Replace:
@mkdir($dir, 0775, true);

With:
@mkdir(ROOTPATH . 'docs/_support/autofix.json', 0775, true);

Allowed:
- docs/_support/

## app/Commands/Support/SubsCommandTrait.php:53
Issue: Missing ROOTPATH anchor
Fix:
Replace:
file_put_contents($path, $content . "\n");

With:
file_put_contents(ROOTPATH . 'docs/_support/autofix.json', $content . "\n");

Allowed:
- docs/_support/

## app/Commands/Support/ArtifactHelper.php:108
Issue: Missing ROOTPATH anchor
Fix:
Replace:
if (file_put_contents($artifactDir . '/summary.md', $summary) === false) {

With:
if (file_put_contents(ROOTPATH . 'docs/_support/autofix.json') {

Allowed:
- docs/_support/

## app/Commands/Support/ArtifactHelper.php:113
Issue: Missing ROOTPATH anchor
Fix:
Replace:
if (file_put_contents($artifactDir . '/report.json', $reportJson) === false) {

With:
if (file_put_contents(ROOTPATH . 'docs/_support/autofix.json') {

Allowed:
- docs/_support/

## app/Commands/Support/ArtifactHelper.php:120
Issue: Missing ROOTPATH anchor
Fix:
Replace:
if (file_put_contents($artifactDir . '/meta.json', $metaJson) === false) {

With:
if (file_put_contents(ROOTPATH . 'docs/_support/autofix.json') {

Allowed:
- docs/_support/

## app/Commands/Support/ArtifactHelper.php:139
Issue: Missing ROOTPATH anchor
Fix:
Replace:
if (file_put_contents($target, $body . PHP_EOL) === false) {

With:
if (file_put_contents(ROOTPATH . 'docs/_support/autofix.json') {

Allowed:
- docs/_support/

## app/Commands/Support/ArtifactHelper.php:156
Issue: Missing ROOTPATH anchor
Fix:
Replace:
return mkdir($artifactDir, 0755, true);

With:
return mkdir(ROOTPATH . 'docs/_support/autofix.json', 0775, true);

Allowed:
- docs/_support/

## app/Commands/Support/ArtifactHelper.php:187
Issue: Missing ROOTPATH anchor
Fix:
Replace:
if (file_put_contents($resolved, $contents) === false) {

With:
if (file_put_contents(ROOTPATH . 'docs/_support/autofix.json') {

Allowed:
- docs/_support/

## app/Commands/Support/ArtifactHelper.php:208
Issue: Missing ROOTPATH anchor
Fix:
Replace:
if (file_put_contents($resolved, $contents, FILE_APPEND) === false) {

With:
if (file_put_contents(ROOTPATH . 'docs/_support/autofix.json') {

Allowed:
- docs/_support/

## app/Commands/Support/GitHubIssueHelper.php:73
Issue: Missing ROOTPATH anchor
Fix:
Replace:
@mkdir(dirname($path), 0775, true);

With:
@mkdir(ROOTPATH . 'docs/_support/autofix.json', 0775, true);

Allowed:
- docs/_support/

## app/Commands/Support/GitHubIssueHelper.php:79
Issue: Missing ROOTPATH anchor
Fix:
Replace:
@mkdir(dirname($path), 0775, true);

With:
@mkdir(ROOTPATH . 'docs/_support/autofix.json', 0775, true);

Allowed:
- docs/_support/

## app/Commands/Support/GitHubIssueHelper.php:90
Issue: Missing ROOTPATH anchor
Fix:
Replace:
file_put_contents($path, $payload . PHP_EOL);

With:
file_put_contents(ROOTPATH . 'docs/_support/autofix.json', $payload . PHP_EOL);

Allowed:
- docs/_support/

## app/Commands/NewsAudit.php:659
Issue: Missing ROOTPATH anchor
Fix:
Replace:
mkdir($docPath, 0775, true);

With:
mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);

Allowed:
- docs/_ops/
- ci/

## app/Commands/NewsAudit.php:719
Issue: Missing ROOTPATH anchor
Fix:
Replace:
file_put_contents($docPath . DIRECTORY_SEPARATOR . 'news_audit_last_run.md', implode(PHP_EOL, $lines));

With:
file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $lines));

Allowed:
- docs/_ops/
- ci/

## app/Commands/Logs/SummarizeAll.php:27
Issue: Missing ROOTPATH anchor
Fix:
Replace:
@mkdir($outDir, 0775, true);

With:
@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);

Allowed:
- docs/_ops/
- ci/

## app/Commands/Logs/SummarizeAll.php:50
Issue: Missing ROOTPATH anchor
Fix:
Replace:
file_put_contents($file, $this->renderSubsystemMarkdown($summary));

With:
file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $this->renderSubsystemMarkdown($summary));

Allowed:
- docs/_ops/
- ci/

## app/Commands/AlertsAudit.php:492
Issue: Missing ROOTPATH anchor
Fix:
Replace:
mkdir($docPath, 0775, true);

With:
mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);

Allowed:
- docs/_ops/
- ci/

## app/Commands/AlertsAudit.php:561
Issue: Missing ROOTPATH anchor
Fix:
Replace:
file_put_contents($docPath . DIRECTORY_SEPARATOR . 'alerts_audit_last_run.md', implode(PHP_EOL, $lines));

With:
file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', implode(PHP_EOL, $lines));

Allowed:
- docs/_ops/
- ci/

## app/Commands/SparkFix.php:164
Issue: Missing ROOTPATH anchor
Fix:
Replace:
@mkdir(dirname($path), 0775, true);

With:
@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);

Allowed:
- docs/_ops/
- ci/

## app/Commands/SparkFix.php:166
Issue: Missing ROOTPATH anchor
Fix:
Replace:
return file_put_contents($path, $updated) !== false;

With:
return file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $updated) !== false;

Allowed:
- docs/_ops/
- ci/

## app/Commands/SparkFix.php:258
Issue: Missing ROOTPATH anchor
Fix:
Replace:
$ok = @mkdir(dirname($path), 0775, true);

With:
$ok = @mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);

Allowed:
- docs/_ops/
- ci/

## app/Commands/Security/GenerateCI4Key.php:48
Issue: Missing ROOTPATH anchor
Fix:
Replace:
file_put_contents($env, $contents);

With:
file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', $contents);

Allowed:
- docs/_ops/
- ci/

## app/Commands/Codex/Review.php:36
Issue: Missing ROOTPATH anchor
Fix:
Replace:
if (! is_dir($outputDir) && ! mkdir($outputDir, 0775, true) && ! is_dir($outputDir)) {

With:
if (! is_dir($outputDir) && ! mkdir(ROOTPATH . 'docs/_codex/autofix.json', 0775, true) {

Allowed:
- docs/_codex/

## app/Commands/Codex/Review.php:55
Issue: Missing ROOTPATH anchor
Fix:
Replace:
file_put_contents($reviewPath, $this->renderReview($today, $status, $recentCommits, $changedFiles, $docsDrift));

With:
file_put_contents(ROOTPATH . 'docs/_codex/autofix.json', $this->renderReview($today, $status, $recentCommits, $changedFiles, $docsDrift));

Allowed:
- docs/_codex/

## app/Commands/Codex/Review.php:56
Issue: Missing ROOTPATH anchor
Fix:
Replace:
file_put_contents($promptPath, $this->renderPromptPayload($today, $status, $recentCommits, $changedFiles, $docsDrift));

With:
file_put_contents(ROOTPATH . 'docs/_codex/autofix.json', $this->renderPromptPayload($today, $status, $recentCommits, $changedFiles, $docsDrift));

Allowed:
- docs/_codex/

## app/Commands/Codex/ReviewPrOutbox.php:75
Issue: Missing ROOTPATH anchor
Fix:
Replace:
@mkdir($dir, 0775, true);

With:
@mkdir(ROOTPATH . 'docs/_codex/autofix.json', 0775, true);

Allowed:
- docs/_codex/

## app/Commands/Codex/ReviewPrOutbox.php:76
Issue: Missing ROOTPATH anchor
Fix:
Replace:
file_put_contents($dir . '/CODEX_REVIEW.md', $review);

With:
file_put_contents(ROOTPATH . 'docs/_codex/autofix.json', $review);

Allowed:
- docs/_codex/

## app/Commands/Codex/ReviewPublish.php:54
Issue: Missing ROOTPATH anchor
Fix:
Replace:
@mkdir($dir, 0775, true);

With:
@mkdir(ROOTPATH . 'docs/_codex/autofix.json', 0775, true);

Allowed:
- docs/_codex/

## app/Commands/Codex/ReviewPublish.php:56
Issue: Missing ROOTPATH anchor
Fix:
Replace:
file_put_contents($artifactPath, json_encode($payload, JSON_PRETTY_PRINT) . PHP_EOL);

With:
file_put_contents(ROOTPATH . 'docs/_codex/autofix.json', json_encode($payload, JSON_PRETTY_PRINT) . PHP_EOL);

Allowed:
- docs/_codex/

## app/Commands/Codex/ReviewPublish.php:59
Issue: Missing ROOTPATH anchor
Fix:
Replace:
file_put_contents($dashboardPath, $this->renderDashboard($filesystem, $commands, $timestamp));

With:
file_put_contents(ROOTPATH . 'docs/_codex/autofix.json', $this->renderDashboard($filesystem, $commands, $timestamp));

Allowed:
- docs/_codex/

## app/Commands/Codex/ReviewPublish.php:189
Issue: Missing ROOTPATH anchor
Fix:
Replace:
mkdir($dir, 0775, true);

With:
mkdir(ROOTPATH . 'docs/_codex/autofix.json', 0775, true);

Allowed:
- docs/_codex/

## app/Commands/SparkDoctor.php:294
Issue: Missing ROOTPATH anchor
Fix:
Replace:
@mkdir($directory, 0775, true);

With:
@mkdir(ROOTPATH . 'docs/_ops/autofix.json', 0775, true);

Allowed:
- docs/_ops/
- ci/

## app/Commands/SparkDoctor.php:298
Issue: Missing ROOTPATH anchor
Fix:
Replace:
file_put_contents($path, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

With:
file_put_contents(ROOTPATH . 'docs/_ops/autofix.json', json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

Allowed:
- docs/_ops/
- ci/

## app/Commands/GapTrackerSync.php:247
Issue: Missing ROOTPATH anchor
Fix:
Replace:
@mkdir($rootedDir, 0775, true);

With:
@mkdir(ROOTPATH . 'docs/_gap-tracker/autofix.json', 0775, true);

Allowed:
- docs/_gap-tracker/

## app/Commands/GapTrackerSync.php:278
Issue: Missing ROOTPATH anchor
Fix:
Replace:
file_put_contents($path, implode(PHP_EOL, $report));

With:
file_put_contents(ROOTPATH . 'docs/_gap-tracker/autofix.json', implode(PHP_EOL, $report));

Allowed:
- docs/_gap-tracker/


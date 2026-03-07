<?php 
namespace App\Services\Docs;

use App\Services\AiOps\DiffEngineService;
use App\Services\AiOps\RepoScannerService;
use App\Services\AiOps\PatchValidatorService;

class DocsSyncEngine
{
    protected $repoScanner;
    protected $diffEngine;
    protected $validator;
    protected $docsParser;

    public function __construct()
    {
        $this->repoScanner = service('repoScanner');
        $this->diffEngine  = service('diffEngine');
        $this->validator   = service('patchValidator');
        $this->docsParser  = service('docsParser');
    }

    public function execute(array $options)
    {
        $docs = $this->docsParser->parseDocsDirectory(ROOTPATH . 'docs');

        $repoSnapshot = $this->repoScanner->scan();

        $instructions = $this->buildInstructions($docs);

        $patch = $this->diffEngine->generatePatch([
            'source' => 'docs',
            'instructions' => $instructions
        ], $repoSnapshot);

        $validation = $this->validator->validate($patch);

        if (!$validation['valid']) {
            return [
                'status' => 'failed',
                'reason' => $validation
            ];
        }

        if ($options['createPR']) {

            $branch = 'docs-sync-' . date('Ymd-His');

            service('githubPRFactory')->createFromPatch([
                'branch' => $branch,
                'title' => 'Docs Sync Auto Alignment',
                'description' => 'Generated from docs:sync-code command.',
                'patch' => $patch
            ]);
        }

        return [
            'status' => 'success',
            'patch_generated' => true,
            'files_modified' => count($patch['files'])
        ];
    }

    private function buildInstructions($docs)
    {

        $intent = $docs['required_changes'];

        $instructions = [];

        foreach ($intent['routes'] as $route) {

            $instructions[] = [
                'type' => 'route',
                'action' => 'verify_or_create',
                'value' => trim($route)
            ];
        }

        foreach ($intent['controllers'] as $controller) {

            $instructions[] = [
                'type' => 'controller',
                'action' => 'verify_or_create',
                'value' => trim($controller)
            ];
        }

        foreach ($intent['tables'] as $table) {

            $instructions[] = [
                'type' => 'table',
                'action' => 'verify_or_create',
                'value' => trim($table)
            ];
        }

        return $instructions;
    }

    private function filterUnsafeChanges($patch)
    {

        $protected = [
            'app/Config/App.php',
            'app/Config/Database.php',
            '.env'
        ];

        foreach ($patch['files'] as $file) {

            if (in_array($file['path'], $protected)) {
                unset($file);
            }
        }

        return $patch;
    }
}
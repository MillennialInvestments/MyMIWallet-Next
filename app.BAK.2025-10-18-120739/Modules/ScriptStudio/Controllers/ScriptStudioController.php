<?php
namespace App\Modules\ScriptStudio\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Modules\ScriptStudio\Libraries\ScriptEngine;
use App\Modules\ScriptStudio\Models\ScriptModel;

class ScriptStudioController extends BaseController
{
    protected ScriptModel $scriptModel;
    protected ScriptEngine $scriptEngine;

    /** @var string[] */
    protected array $platformOptions = [
        'TradingView',
        'ThinkOrSwim',
        'MetaTrader',
        'NinjaTrader',
        'TrendSpider',
        'Custom',
    ];

    /** @var string[] */
    protected array $languageOptions = [
        'PineScript',
        'ThinkScript',
        'MQL4',
        'MQL5',
        'EasyLanguage',
        'JavaScript',
        'Custom',
    ];

    /** @var string[] */
    protected array $logicTypeOptions = ['Study', 'Scanner', 'Strategy'];

    public function __construct()
    {
        helper(['form', 'text']);
        $this->scriptModel  = new ScriptModel();
        $this->scriptEngine = new ScriptEngine();
    }

    public function index(): string
    {
        $scripts = $this->scriptModel->orderBy('created_at', 'desc')->findAll();

        return view('App//Modules\\ScriptStudio\\Views\\index', [
            'scripts'           => $scripts,
            'platformOptions'   => $this->platformOptions,
            'languageOptions'   => $this->languageOptions,
            'logicTypeOptions'  => $this->logicTypeOptions,
        ]);
    }

    public function marketplace(): string
    {
        $scripts = $this->scriptModel
            ->where('is_published', 1)
            ->orderBy('created_at', 'desc')
            ->findAll();

        return view('App//Modules\\ScriptStudio\\Views\\marketplace', [
            'scripts' => $scripts,
        ]);
    }

    public function create(): string
    {
        return view('App//Modules\\ScriptStudio\\Views\\create_edit', [
            'platformOptions'  => $this->platformOptions,
            'languageOptions'  => $this->languageOptions,
            'logicTypeOptions' => $this->logicTypeOptions,
            'validation'       => \Config\Services::validation(),
        ]);
    }

    public function store()
    {
        $payload = $this->validateAndFormatInput();
        if ($payload === null) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $payload['created_by'] = user_id() ?? null;

        $this->scriptModel->insert($payload);

        return redirect()->to('ScriptStudio')->with('message', 'Script created successfully.');
    }

    public function edit(int $id): string
    {
        $script = $this->scriptModel->find($id);
        if (! $script) {
            throw PageNotFoundException::forPageNotFound('Script not found');
        }

        return view('App//Modules\\ScriptStudio\\Views\\create_edit', [
            'script'           => $this->prepareScriptForForm($script),
            'platformOptions'  => $this->platformOptions,
            'languageOptions'  => $this->languageOptions,
            'logicTypeOptions' => $this->logicTypeOptions,
            'validation'       => \Config\Services::validation(),
        ]);
    }

    public function update(int $id)
    {
        $script = $this->scriptModel->find($id);
        if (! $script) {
            throw PageNotFoundException::forPageNotFound('Script not found');
        }

        $payload = $this->validateAndFormatInput($id);
        if ($payload === null) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $payload['id'] = $id;
        $this->scriptModel->save($payload);

        return redirect()->to('ScriptStudio')->with('message', 'Script updated successfully.');
    }

    public function preview(int $id): string
    {
        $script = $this->scriptModel->find($id);
        if (! $script) {
            throw PageNotFoundException::forPageNotFound('Script not found');
        }

        return view('App//Modules\\ScriptStudio\\Views\\preview_emulator', [
            'script'              => $script,
            'pineScriptExport'    => $this->scriptEngine->convertToPineScript($script['code_raw'] ?? ''),
            'thinkScriptExport'   => $this->scriptEngine->convertToThinkScript($script['code_raw'] ?? ''),
            'documentationHtml'   => $this->scriptEngine->renderMarkdown($script['documentation'] ?? $script['description'] ?? ''),
            'tags'                => $this->scriptEngine->tagsToArray($script['tags'] ?? []),
        ]);
    }

    public function export(int $id, string $format)
    {
        $script = $this->scriptModel->find($id);
        if (! $script) {
            throw PageNotFoundException::forPageNotFound('Script not found');
        }

        $format = strtolower($format);
        $filename = ($script['slug'] ?? 'script') . '.' . ($format === 'pinescript' ? 'pine' : 'txt');

        if ($format === 'pinescript') {
            $content = $this->scriptEngine->convertToPineScript($script['code_raw'] ?? '');
        } elseif ($format === 'thinkscript') {
            $content = $this->scriptEngine->convertToThinkScript($script['code_raw'] ?? '');
        } else {
            throw PageNotFoundException::forPageNotFound('Export format not supported');
        }

        return $this->response
            ->setContentType('text/plain')
            ->setHeader('Content-Disposition', 'attachment; filename="' . $filename . '"')
            ->setBody($content);
    }

    protected function validateAndFormatInput(?int $id = null): ?array
    {
        $rules = $this->scriptModel->getRules();

        if (! $this->validate($rules)) {
            return null;
        }

        $data = $this->validator->getValidated();

        $data['slug']          = $this->generateSlug($data['title'], $id);
        $data['tags']          = $this->scriptEngine->normalizeTags($this->request->getPost('tags'));
        $data['code_emulated'] = $this->scriptEngine->buildEmulatedCode($data['language'], $data['code_raw'] ?? '');
        $data['is_published']  = (int) ($this->request->getPost('is_published') ? 1 : 0);
        $price                 = (float) ($this->request->getPost('price') ?? 0);
        $data['price']         = number_format($price, 2, '.', '');
        $data['documentation'] = $this->request->getPost('documentation');

        return $data;
    }

    protected function generateSlug(string $title, ?int $ignoreId = null): string
    {
        $base = url_title($title, '-', true) ?: 'script';
        $slug = $base;
        $counter = 1;

        while ($this->slugExists($slug, $ignoreId)) {
            $slug = $base . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    protected function slugExists(string $slug, ?int $ignoreId = null): bool
    {
        $builder = $this->scriptModel->builder();
        $builder->where('slug', $slug);
        if ($ignoreId !== null) {
            $builder->where('id !=', $ignoreId);
        }

        return $builder->countAllResults() > 0;
    }

    protected function prepareScriptForForm(array $script): array
    {
        $script['tags'] = $this->scriptEngine->tagsToString($script['tags'] ?? '');

        return $script;
    }
}
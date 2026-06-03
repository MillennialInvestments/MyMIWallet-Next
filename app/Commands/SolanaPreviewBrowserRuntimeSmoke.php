<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class SolanaPreviewBrowserRuntimeSmoke extends BaseCommand
{
    protected $group       = 'Solana';
    protected $name        = 'solana:preview-browser-runtime:smoke';
    protected $description = 'Phase 16 browser-runtime simulation for Solana preview modal and wallet-signature safety flow.';

    private int $pass = 0;
    private int $fail = 0;

    public function run(array $params)
    {
        CLI::write('');
        CLI::write('============================================================', 'yellow');
        CLI::write('SOLANA PREVIEW BROWSER RUNTIME SMOKE - PHASE 16', 'yellow');
        CLI::write('============================================================', 'yellow');
        CLI::write('Safety: simulated browser only; no private keys, broadcasts, minting, or execution calls.');
        CLI::write('');

        $previewJs = ROOTPATH . 'public/assets/js/Solana/preview-ux-modal.js';

        $this->checkFileExists('Preview UX JS exists', $previewJs);
        $this->checkFileContains('Preview UX JS has Phase 14 marker', $previewJs, 'MYMI_SOLANA_PREVIEW_UX_MODAL_PHASE14');
        $this->checkFileContains('Preview UX JS intercepts submit in capture phase', $previewJs, "document.addEventListener('submit'");
        $this->checkFileContains('Preview UX JS stops immediate propagation', $previewJs, 'stopImmediatePropagation');
        $this->checkFileContains('Preview UX JS calls swap preview fallback endpoint', $previewJs, '/index.php/API/Solana/swap/preview');
        $this->checkFileContains('Preview UX JS forces dry_run=true', $previewJs, 'payload.dry_run = true');
        $this->checkFileContains('Preview UX JS forces broadcast=false', $previewJs, 'payload.broadcast = false');
        $this->checkFileContains('Preview UX JS requires signature', $previewJs, 'payload.signature_required = true');
        $this->checkFileContains('Preview UX JS requires wallet signature', $previewJs, 'payload.wallet_signature_required = true');
        $this->checkFileContains('Preview UX JS blocks private key submission', $previewJs, 'payload.private_key_submission_allowed = false');
        $this->checkFileContains('Preview UX JS neutralizes private key fields', $previewJs, 'neutralizePrivateKeyFields');

        $this->checkFileContains('coinSwap view includes preview runtime config', ROOTPATH . 'app/Modules/Exchange/Views/Solana/coinSwap.php', 'mymiSolanaPreviewConfig');
        $this->checkFileContains('swap view includes preview runtime config', ROOTPATH . 'app/Modules/Exchange/Views/Solana/swap.php', 'mymiSolanaPreviewConfig');
        $this->checkFileContains('trade view includes preview runtime config', ROOTPATH . 'app/Modules/Exchange/Views/Solana/trade.php', 'mymiSolanaPreviewConfig');

        $routes = $this->collectRoutes();
        $this->checkStringContains('Preview swap API route exists', $routes, 'API/Solana/swap/preview');
        $this->checkStringContains('Preview transaction API route exists', $routes, 'API/Solana/transaction/preview');
        $this->checkStringContains('Preview swap route uses CSRF', $this->routeLine($routes, 'API/Solana/swap/preview'), 'csrf');
        $this->checkStringContains('Preview transaction route uses CSRF', $this->routeLine($routes, 'API/Solana/transaction/preview'), 'csrf');
        $this->checkStringContains('Swap execute route remains trackable', $routes, 'API/Solana/swap/execute');
        $this->checkStringContains('Token mint route remains trackable', $routes, 'API/Solana/token/mint');

        $this->checkNodeAvailable();
        $this->runNodeBrowserSimulation($previewJs);

        CLI::write('');
        CLI::write('============================================================', 'yellow');
        CLI::write('RESULT', 'yellow');
        CLI::write('============================================================', 'yellow');
        CLI::write('PASS count: ' . $this->pass, $this->fail === 0 ? 'green' : 'white');
        CLI::write('FAIL count: ' . $this->fail, $this->fail === 0 ? 'green' : 'red');

        return $this->fail === 0 ? EXIT_SUCCESS : EXIT_ERROR;
    }

    private function checkNodeAvailable(): void
    {
        $output = [];
        $code = 1;
        exec('command -v node 2>&1', $output, $code);

        $this->record('Node runtime is available for browser simulation', $code === 0 && trim(implode("\n", $output)) !== '');
    }

    private function runNodeBrowserSimulation(string $previewJs): void
    {
        if (! is_file($previewJs)) {
            $this->record('Browser simulation skipped because preview JS is missing', false);
            return;
        }

        $scriptPath = WRITEPATH . 'cache/solana-preview-browser-runtime-smoke.js';

        $script = <<<'JS'
const fs = require('fs');

const previewPath = process.argv[2];
const code = fs.readFileSync(previewPath, 'utf8');

const checks = [];
const fetchCalls = [];
const listeners = {};
const elementsById = {};

function check(label, passed) {
  checks.push({ label, passed: !!passed });
}

class FakeElement {
  constructor(id = '') {
    this.id = id;
    this.value = '';
    this.required = false;
    this.disabled = false;
    this.attributes = {};
    this.children = [];
    this.style = {};
    this._classes = new Set();
    this.classList = {
      add: (name) => this._classes.add(name),
      contains: (name) => this._classes.has(name)
    };
    if (id) {
      elementsById[id] = this;
    }
  }

  setAttribute(name, value) {
    this.attributes[name] = value;
    if (name === 'id') {
      this.id = value;
      elementsById[value] = this;
    }
  }

  removeAttribute(name) {
    delete this.attributes[name];
  }

  appendChild(child) {
    this.children.push(child);
    if (child && child.id) {
      elementsById[child.id] = child;
    }
    return child;
  }

  closest() {
    return new FakeElement();
  }

  querySelector(selector) {
    return queryField(selector);
  }
}

const fields = {
  csrf_test_name: { name: 'csrf_test_name', value: 'csrf-test-hash', required: false, disabled: false },
  from_token: { name: 'from_token', value: 'SOL', required: true, disabled: false },
  to_token: { name: 'to_token', value: 'MYMI', required: true, disabled: false },
  amount: { name: 'amount', value: '0.25', required: true, disabled: false },
  slippage: { name: 'slippage', value: '0.50', required: false, disabled: false },
  private_key: { name: 'private_key', id: 'private_key', value: 'DO_NOT_SUBMIT_PRIVATE_KEY', required: true, disabled: false },
  privateKey: { name: 'privateKey', id: 'privateKey', value: 'DO_NOT_SUBMIT_PRIVATEKEY', required: true, disabled: false },
  seed: { name: 'seed', id: 'seed', value: 'DO_NOT_SUBMIT_SEED', required: true, disabled: false },
  seed_phrase: { name: 'seed_phrase', id: 'seed_phrase', value: 'DO_NOT_SUBMIT_SEED_PHRASE', required: true, disabled: false },
  mnemonic: { name: 'mnemonic', id: 'mnemonic', value: 'DO_NOT_SUBMIT_MNEMONIC', required: true, disabled: false }
};

Object.keys(fields).forEach((key) => {
  fields[key].setAttribute = function(name, value) {
    this.attributes = this.attributes || {};
    this.attributes[name] = value;
    if (name === 'data-mymi-phase14-disabled') {
      this.phase14Disabled = true;
    }
  };
  fields[key].closest = function() {
    return new FakeElement();
  };
});

function queryField(selector) {
  const parts = String(selector).split(',').map((item) => item.trim());

  for (const part of parts) {
    const nameMatch = part.match(/\[name="([^"]+)"\]/);
    if (nameMatch && fields[nameMatch[1]]) {
      return fields[nameMatch[1]];
    }

    const idMatch = part.match(/^#(.+)$/);
    if (idMatch) {
      const found = Object.values(fields).find((field) => field.id === idMatch[1]);
      if (found) {
        return found;
      }
    }
  }

  return null;
}

function queryFields(selector) {
  const found = new Set();
  const parts = String(selector).split(',').map((item) => item.trim());

  for (const part of parts) {
    const nameMatch = part.match(/\[name="([^"]+)"\]/);
    if (nameMatch && fields[nameMatch[1]]) {
      found.add(fields[nameMatch[1]]);
    }

    const idMatch = part.match(/^#(.+)$/);
    if (idMatch) {
      Object.values(fields).forEach((field) => {
        if (field.id === idMatch[1]) {
          found.add(field);
        }
      });
    }
  }

  return Array.from(found);
}

const fakeForm = new FakeElement('solanaCoinSwapForm');
fakeForm.getAttribute = function(name) {
  if (name === 'action') {
    return '/Exchange/Solana/Wallet/Execute-Swap';
  }
  return '';
};
fakeForm.querySelector = queryField;

const fakeDocument = {
  readyState: 'loading',
  body: new FakeElement('body'),
  createElement: function() {
    return new FakeElement();
  },
  getElementById: function(id) {
    if (id === 'solanaCoinSwapForm') {
      return fakeForm;
    }
    return elementsById[id] || null;
  },
  querySelector: function(selector) {
    if (selector === 'meta[name="csrf-token-name"]') {
      return { content: 'csrf_test_name' };
    }
    if (selector === 'meta[name="csrf-token"]') {
      return { content: 'csrf-test-hash' };
    }
    if (selector === '#solanaCoinSwapForm') {
      return fakeForm;
    }
    return queryField(selector);
  },
  querySelectorAll: queryFields,
  addEventListener: function(type, handler) {
    listeners[type] = listeners[type] || [];
    listeners[type].push(handler);
  }
};

global.window = {
  mymiSolanaPreviewConfig: {
    swapPreviewUrl: '/index.php/API/Solana/swap/preview',
    transactionPreviewUrl: '/index.php/API/Solana/transaction/preview',
    csrfTokenName: 'csrf_test_name',
    csrfHash: 'csrf-test-hash'
  }
};
global.document = fakeDocument;

global.FormData = class FakeFormData {
  constructor() {
    this.items = Object.keys(fields).map((key) => [fields[key].name, fields[key].value]);
  }

  forEach(callback) {
    this.items.forEach(([key, value]) => callback(value, key));
  }
};

global.fetch = async function(url, options = {}) {
  fetchCalls.push({
    url: String(url),
    method: options.method || 'GET',
    body: String(options.body || ''),
    headers: options.headers || {}
  });

  return {
    ok: true,
    status: 200,
    json: async () => ({
      preview: {
        action: 'swap_preview',
        network: 'solana',
        from_token: 'SOL',
        to_token: 'MYMI',
        amount: '0.25',
        estimated_output: 'Preview pending API estimate',
        slippage: '0.50',
        estimated_fee: 'Preview pending fee estimate',
        dry_run: true,
        broadcast: false,
        signature_required: true,
        wallet_signature_required: true,
        private_key_submission_allowed: false
      }
    })
  };
};

try {
  eval(code);

  (listeners.DOMContentLoaded || []).forEach((handler) => handler());

  const event = {
    target: fakeForm,
    prevented: false,
    stopped: false,
    immediateStopped: false,
    preventDefault: function() { this.prevented = true; },
    stopPropagation: function() { this.stopped = true; },
    stopImmediatePropagation: function() { this.immediateStopped = true; }
  };

  (listeners.submit || []).forEach((handler) => handler(event));

  setTimeout(() => {
    const call = fetchCalls[0] || { url: '', method: '', body: '', headers: {} };
    const body = call.body || '';
    const modal = elementsById.mymiSolanaPreviewUxModal;

    check('Submit default prevented', event.prevented === true);
    check('Submit propagation stopped', event.stopped === true);
    check('Submit immediate propagation stopped', event.immediateStopped === true);
    check('Preview API called exactly once', fetchCalls.length === 1);
    check('Preview API endpoint used', call.url.includes('/API/Solana/swap/preview'));
    check('Preview API uses POST', call.method === 'POST');
    check('CSRF token included in preview request', body.includes('csrf_test_name=csrf-test-hash'));
    check('dry_run=true submitted', body.includes('dry_run=true'));
    check('broadcast=false submitted', body.includes('broadcast=false'));
    check('signature_required=true submitted', body.includes('signature_required=true'));
    check('wallet_signature_required=true submitted', body.includes('wallet_signature_required=true'));
    check('private_key_submission_allowed=false submitted', body.includes('private_key_submission_allowed=false'));
    check('private_key value not submitted', !body.includes('private_key=') && !body.includes('DO_NOT_SUBMIT_PRIVATE_KEY'));
    check('privateKey value not submitted', !body.includes('privateKey=') && !body.includes('DO_NOT_SUBMIT_PRIVATEKEY'));
    check('seed value not submitted', !body.includes('seed=') && !body.includes('DO_NOT_SUBMIT_SEED'));
    check('seed_phrase value not submitted', !body.includes('seed_phrase=') && !body.includes('DO_NOT_SUBMIT_SEED_PHRASE'));
    check('mnemonic value not submitted', !body.includes('mnemonic=') && !body.includes('DO_NOT_SUBMIT_MNEMONIC'));
    check('private key field disabled in DOM', fields.private_key.disabled === true && fields.private_key.required === false);
    check('seed phrase field disabled in DOM', fields.seed_phrase.disabled === true && fields.seed_phrase.required === false);
    check('preview modal opened', !!modal && modal.classList.contains('show') && modal.style.display === 'block');
    check('no swap execute fetch call occurred', fetchCalls.every((item) => !item.url.includes('/swap/execute')));
    check('no token mint fetch call occurred', fetchCalls.every((item) => !item.url.includes('/token/mint')));

    let failed = 0;

    checks.forEach((item) => {
      if (item.passed) {
        console.log('PASS: ' + item.label);
      } else {
        failed += 1;
        console.log('FAIL: ' + item.label);
      }
    });

    console.log('FETCH_CALLS=' + JSON.stringify(fetchCalls));
    process.exit(failed === 0 ? 0 : 1);
  }, 75);
} catch (error) {
  console.log('FAIL: Browser simulation threw error: ' + error.message);
  process.exit(1);
}
JS;

        if (! is_dir(dirname($scriptPath))) {
            mkdir(dirname($scriptPath), 0775, true);
        }

        file_put_contents($scriptPath, $script);

        $output = [];
        $code = 1;
        $cmd = 'node ' . escapeshellarg($scriptPath) . ' ' . escapeshellarg($previewJs) . ' 2>&1';
        exec($cmd, $output, $code);

        CLI::write('');
        CLI::write('--- Node Browser Simulation Output ---', 'yellow');

        foreach ($output as $line) {
            if (str_starts_with($line, 'PASS:')) {
                CLI::write($line, 'green');
            } elseif (str_starts_with($line, 'FAIL:')) {
                CLI::write($line, 'red');
            } else {
                CLI::write($line);
            }
        }

        $this->record('Node browser simulation completed successfully', $code === 0);
    }

    private function checkFileExists(string $label, string $file): void
    {
        $this->record($label, is_file($file));
    }

    private function checkFileContains(string $label, string $file, string $needle): void
    {
        if (! is_file($file)) {
            $this->record($label . ' file missing', false);
            return;
        }

        $content = file_get_contents($file);
        $this->record($label, is_string($content) && strpos($content, $needle) !== false);
    }

    private function checkStringContains(string $label, string $haystack, string $needle): void
    {
        $this->record($label, strpos($haystack, $needle) !== false);
    }

    private function collectRoutes(): string
    {
        $command = PHP_BINARY . ' ' . escapeshellarg(ROOTPATH . 'spark') . ' routes 2>&1';
        $output = shell_exec($command);

        return is_string($output) ? $output : '';
    }

    private function routeLine(string $routes, string $needle): string
    {
        $lines = preg_split('/\R/', $routes) ?: [];

        foreach ($lines as $line) {
            if (strpos($line, $needle) !== false) {
                return $line;
            }
        }

        return '';
    }

    private function record(string $label, bool $passed): void
    {
        if ($passed) {
            $this->pass++;
            CLI::write('PASS: ' . $label, 'green');
            return;
        }

        $this->fail++;
        CLI::write('FAIL: ' . $label, 'red');
    }
}

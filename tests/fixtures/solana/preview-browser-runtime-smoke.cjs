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

# ChatGPT Export → CSV (Repo Writer)

## Goal
Create an n8n workflow that reads `docs/chatgpt/raw/conversations.json` and produces:

- `docs/chatgpt/derived/chatgpt_messages.csv` (message-level, canonical)
- `docs/chatgpt/derived/chatgpt_conversations.csv` (conversation-level summary)
- `docs/chatgpt/state/chatgpt_export_state.json` (workflow state)

The CSV is the canonical, editable artifact for planning, tracking, and automation.

## Folder setup and gitignore
Create (if missing):

- `docs/chatgpt/raw/`
- `docs/chatgpt/derived/`
- `docs/chatgpt/state/`
- `docs/chatgpt/overrides/` (optional, used by the future overrides merge workflow)

Optional `.gitignore` entry (skip if you want state tracked — recommended to track):

```
docs/chatgpt/state/*.json
```

## n8n prerequisites
Set `MYMI_REPO_ROOT` so n8n can read/write repo files. Add to `aiops/.env` (or n8n env) and restart n8n if required:

```
MYMI_REPO_ROOT=/home/mymiteam/mymiwallet/site/current
```

## Workflow outline (nodes + configuration)
Create a new workflow named **ChatGPT Export → CSV (Repo Writer)**.

1) **Trigger**  
   - Cron: every day at 03:10 (America/Chicago).  
   - Keep a Manual Trigger for testing; swap as needed.

2) **Set Paths** (Set node)  
   Fields:
   - `repoRoot = {{$env.MYMI_REPO_ROOT}}`
   - `sourcePath = docs/chatgpt/raw/conversations.json`
   - `outMessagesPath = docs/chatgpt/derived/chatgpt_messages.csv`
   - `outConvosPath = docs/chatgpt/derived/chatgpt_conversations.csv`
   - `statePath = docs/chatgpt/state/chatgpt_export_state.json`

3) **Read conversations.json** (Code node, JavaScript)

```js
const fs = require('fs');
const path = require('path');

const repoRoot = $json.repoRoot;
const sourcePath = $json.sourcePath;

if (!repoRoot) throw new Error('MYMI_REPO_ROOT not set in env');
const fullPath = path.join(repoRoot, sourcePath);

if (!fs.existsSync(fullPath)) {
  throw new Error(`Missing source file: ${fullPath}`);
}

const raw = fs.readFileSync(fullPath, 'utf8');
let parsed;
try {
  parsed = JSON.parse(raw);
} catch (e) {
  throw new Error(`Invalid JSON in ${fullPath}: ${e.message}`);
}

// ChatGPT export formats vary.
// Common patterns:
// - parsed is an array of conversations
// - parsed has a "conversations" array
const conversations = Array.isArray(parsed)
  ? parsed
  : (Array.isArray(parsed?.conversations) ? parsed.conversations : []);

if (!Array.isArray(conversations)) {
  throw new Error('Unable to find conversations array in export.');
}

return [{
  repoRoot,
  sourcePath,
  conversations,
  exportedCount: conversations.length
}];
```

4) **Load State** (Code node)

```js
const fs = require('fs');
const path = require('path');

const repoRoot = $json.repoRoot;
const statePath = path.join(repoRoot, $json.statePath);

let state = {
  lastRunAt: null,
  lastSourceHash: null,
  lastConversationCount: 0,
  lastMessageRowCount: 0
};

if (fs.existsSync(statePath)) {
  try {
    state = JSON.parse(fs.readFileSync(statePath, 'utf8'));
  } catch {
    // keep defaults
  }
}

return [{
  ...$json,
  state,
  stateFullPath: statePath
}];
```

5) **Flatten + Build CSV Rows** (Code node)

This node detects messages, normalizes text/roles, adds flags/tags, and produces two CSV strings.

```js
const crypto = require('crypto');
const path = require('path');

function toIsoMaybe(v) {
  if (v === null || v === undefined) return '';
  if (typeof v === 'number') {
    // ChatGPT export often uses seconds epoch
    // if it looks like seconds, convert to ms
    const ms = v < 1e12 ? v * 1000 : v;
    return new Date(ms).toISOString();
  }
  if (typeof v === 'string') {
    // already ISO or something — keep
    return v;
  }
  return '';
}

function cleanText(s) {
  if (!s) return '';
  return String(s)
    .replace(/\r\n/g, '\n')
    .replace(/[ \t]+/g, ' ')
    .replace(/\n{3,}/g, '\n\n')
    .trim();
}

function detectRole(msg) {
  // Multiple export variants exist.
  // Common: msg.author.role or msg.message.author.role
  const r =
    msg?.author?.role ||
    msg?.message?.author?.role ||
    msg?.role ||
    msg?.sender ||
    'unknown';
  const role = String(r).toLowerCase();
  if (['user','assistant','system','tool'].includes(role)) return role;
  return 'unknown';
}

function detectAuthorName(msg) {
  const name =
    msg?.author?.name ||
    msg?.message?.author?.name ||
    msg?.author?.metadata?.name ||
    '';
  return String(name || '');
}

function extractText(msg) {
  // Variants:
  // msg.content.parts (array)
  // msg.message.content.parts
  // msg.text
  // msg.content (string)
  const parts =
    msg?.content?.parts ||
    msg?.message?.content?.parts ||
    null;

  if (Array.isArray(parts)) return cleanText(parts.join('\n'));
  if (typeof msg?.text === 'string') return cleanText(msg.text);
  if (typeof msg?.content === 'string') return cleanText(msg.content);
  if (typeof msg?.message?.content === 'string') return cleanText(msg.message.content);

  // some exports store "content" as object
  const c = msg?.content || msg?.message?.content;
  if (c && typeof c === 'object') {
    if (Array.isArray(c?.parts)) return cleanText(c.parts.join('\n'));
    if (typeof c?.text === 'string') return cleanText(c.text);
  }
  return '';
}

function hasAny(text, re) { return re.test(text); }

function tagify(text) {
  const tags = new Set();
  const t = text.toLowerCase();

  if (t.includes('codeigniter') || t.includes('ci4') || t.includes('bonfire')) tags.add('ci4');
  if (t.includes('n8n')) tags.add('n8n');
  if (t.includes('nginx')) tags.add('nginx');
  if (t.includes('502')) tags.add('502');
  if (t.includes('jwt') || t.includes('sso')) tags.add('auth');
  if (t.includes('datatables')) tags.add('datatables');
  if (t.includes('redis')) tags.add('redis');
  if (t.includes('mysql')) tags.add('mysql');
  if (t.includes('alpha') || t.includes('alphavantage')) tags.add('alphavantage');

  return Array.from(tags);
}

function csvEscape(v) {
  const s = String(v ?? '');
  if (/[",\n]/.test(s)) return `"${s.replace(/"/g, '""')}"`;
  return s;
}

function sha256(s) {
  return crypto.createHash('sha256').update(String(s)).digest('hex');
}

// ---- flatten ----
const ingestedAt = new Date().toISOString();
const sourcePath = $json.sourcePath;

const conversations = $json.conversations || [];
const messageRows = [];
const convoRows = [];

let totalMsgs = 0;

for (const c of conversations) {
  const conversationId = String(c?.id || c?.conversation_id || c?.uuid || '');
  const title = String(c?.title || c?.name || '');
  const cCreate = toIsoMaybe(c?.create_time ?? c?.created_at ?? c?.createdAt);
  const cUpdate = toIsoMaybe(c?.update_time ?? c?.updated_at ?? c?.updatedAt);

  // messages can be:
  // c.mapping (object keyed by message id)
  // c.messages (array)
  // c.chat_messages (array)
  let msgs = [];

  if (c?.mapping && typeof c.mapping === 'object') {
    msgs = Object.values(c.mapping)
      .map(x => x?.message ? ({ ...x.message, _export_id: x?.id }) : x?.message || x)
      .filter(Boolean);
  } else if (Array.isArray(c?.messages)) {
    msgs = c.messages;
  } else if (Array.isArray(c?.chat_messages)) {
    msgs = c.chat_messages;
  }

  // normalize message ids + sort by create_time when possible
  msgs = msgs.map((m, idx) => {
    const messageId = String(m?.id || m?._export_id || m?.message_id || `${conversationId}:${idx}`);
    const role = detectRole(m);
    const author = detectAuthorName(m);
    const text = extractText(m);
    const mt = toIsoMaybe(m?.create_time ?? m?.created_at ?? m?.timestamp);
    const textLen = text.length;

    const hasCode = hasAny(text, /```|<\?php|function\s+\w+\(|class\s+\w+|SELECT\s+.+\s+FROM/i);
    const hasErr  = hasAny(text, /\b(error|exception|fatal|stack trace|502|504|401|403|404)\b/i);
    const hasUrl  = hasAny(text, /https?:\/\/\S+/i);
    const hasPath = hasAny(text, /(\/docs\/|\/home\/|~\/|\.php\b|\.md\b|\.env\b)/i);

    const hasAiops = text.includes('aiops.mymiwallet.com') ? 1 : 0;
    const hasChat  = text.includes('chat.mymiwallet.com') ? 1 : 0;
    const hasRoot  = text.includes('mymiwallet.com') ? 1 : 0;

    const tags = tagify(text);
    const hash = sha256([conversationId, messageId, role, text].join('|'));

    return {
      export_source: 'chatgpt_conversations_json',
      conversation_id: conversationId,
      conversation_title: title,
      conversation_create_time: cCreate,
      conversation_update_time: cUpdate,
      message_id: messageId,
      message_role: role,
      message_author_name: author,
      message_create_time: mt,
      message_text: text,
      message_text_len: textLen,
      message_has_code: hasCode ? 1 : 0,
      message_has_error: hasErr ? 1 : 0,
      message_has_url: hasUrl ? 1 : 0,
      message_has_file_path: hasPath ? 1 : 0,
      message_has_domain_aiops: hasAiops,
      message_has_domain_chat: hasChat,
      message_has_domain_mymiwallet: hasRoot,
      message_tags: tags.join('|'),
      source_path: sourcePath,
      hash,
      ingested_at: ingestedAt
    };
  });

  msgs.sort((a,b) => (a.message_create_time || '').localeCompare(b.message_create_time || ''));

  totalMsgs += msgs.length;
  messageRows.push(...msgs);

  // conversation summary
  const userCount = msgs.filter(m => m.message_role === 'user').length;
  const asstCount = msgs.filter(m => m.message_role === 'assistant').length;
  const allText = msgs.map(m => m.message_text).join('\n');
  const allTags = new Set(msgs.flatMap(m => (m.message_tags || '').split('|').filter(Boolean)));

  const has_ci4 = allText.toLowerCase().includes('codeigniter') || allText.toLowerCase().includes('ci4');
  const has_n8n = allText.toLowerCase().includes('n8n');
  const has_nginx = allText.toLowerCase().includes('nginx');
  const has_502 = allText.includes('502');
  const has_auth = allText.toLowerCase().includes('jwt') || allText.toLowerCase().includes('basic auth') || allText.toLowerCase().includes('sso');

  const firstTime = msgs[0]?.message_create_time || '';
  const lastTime = msgs[msgs.length - 1]?.message_create_time || '';

  const convoHash = sha256([conversationId, title, cCreate, cUpdate, msgs.length, firstTime, lastTime].join('|'));

  convoRows.push({
    conversation_id: conversationId,
    conversation_title: title,
    create_time: cCreate,
    update_time: cUpdate,
    message_count: msgs.length,
    user_message_count: userCount,
    assistant_message_count: asstCount,
    first_message_time: firstTime,
    last_message_time: lastTime,
    has_keywords_ci4: has_ci4 ? 1 : 0,
    has_keywords_n8n: has_n8n ? 1 : 0,
    has_keywords_nginx: has_nginx ? 1 : 0,
    has_keywords_502: has_502 ? 1 : 0,
    has_keywords_auth: has_auth ? 1 : 0,
    top_tags: Array.from(allTags).slice(0, 20).join('|'),
    source_path: sourcePath,
    hash: convoHash,
    ingested_at: ingestedAt
  });
}

// ---- build CSV strings ----
function buildCsv(rows, columns) {
  const head = columns.join(',');
  const lines = [head];
  for (const r of rows) {
    lines.push(columns.map(c => csvEscape(r[c])).join(','));
  }
  return lines.join('\n') + '\n';
}

const messageColumns = [
  'export_source',
  'conversation_id',
  'conversation_title',
  'conversation_create_time',
  'conversation_update_time',
  'message_id',
  'message_role',
  'message_author_name',
  'message_create_time',
  'message_text',
  'message_text_len',
  'message_has_code',
  'message_has_error',
  'message_has_url',
  'message_has_file_path',
  'message_has_domain_aiops',
  'message_has_domain_chat',
  'message_has_domain_mymiwallet',
  'message_tags',
  'source_path',
  'hash',
  'ingested_at'
];

const convoColumns = [
  'conversation_id',
  'conversation_title',
  'create_time',
  'update_time',
  'message_count',
  'user_message_count',
  'assistant_message_count',
  'first_message_time',
  'last_message_time',
  'has_keywords_ci4',
  'has_keywords_n8n',
  'has_keywords_nginx',
  'has_keywords_502',
  'has_keywords_auth',
  'top_tags',
  'source_path',
  'hash',
  'ingested_at'
];

const messagesCsv = buildCsv(messageRows, messageColumns);
const convosCsv = buildCsv(convoRows, convoColumns);

const sourceHash = sha256(messagesCsv);

return [{
  ...$json,
  messagesCsv,
  convosCsv,
  computed: {
    conversations: conversations.length,
    messages: messageRows.length,
    sourceHash
  }
}];
```

6) **Write CSV Files + State** (Code node)

```js
const fs = require('fs');
const path = require('path');

const repoRoot = $json.repoRoot;

const outMessages = path.join(repoRoot, $json.outMessagesPath);
const outConvos = path.join(repoRoot, $json.outConvosPath);
const statePath = path.join(repoRoot, $json.statePath);

fs.mkdirSync(path.dirname(outMessages), { recursive: true });
fs.mkdirSync(path.dirname(outConvos), { recursive: true });
fs.mkdirSync(path.dirname(statePath), { recursive: true });

// Write CSVs
fs.writeFileSync(outMessages, $json.messagesCsv, 'utf8');
fs.writeFileSync(outConvos, $json.convosCsv, 'utf8');

// Write state
const state = {
  lastRunAt: new Date().toISOString(),
  lastSourceHash: $json.computed.sourceHash,
  lastConversationCount: $json.computed.conversations,
  lastMessageRowCount: $json.computed.messages
};

fs.writeFileSync(statePath, JSON.stringify(state, null, 2), 'utf8');

return [{
  ok: true,
  outMessages,
  outConvos,
  statePath,
  computed: $json.computed
}];
```

7) **Git Commit (server)** — optional, use if server git auth is configured (Execute Command node)

```bash
cd "$MYMI_REPO_ROOT" \
  && git add docs/chatgpt/derived/*.csv docs/chatgpt/state/*.json \
  && git commit -m "chore(docs): update ChatGPT export CSVs" || true
```

Skip if you prefer manual commits.

## How to run and verify
1. In n8n, run the workflow manually (or wait for Cron).  
2. Confirm files exist:
   - `docs/chatgpt/derived/chatgpt_messages.csv`
   - `docs/chatgpt/derived/chatgpt_conversations.csv`
   - `docs/chatgpt/state/chatgpt_export_state.json`
3. Spot-check results: messages CSV should contain `message_text`; conversations CSV should be one row per conversation.

## Canonical rules and refresh process
- `docs/chatgpt/raw/conversations.json` is the raw archive.  
- `docs/chatgpt/derived/chatgpt_messages.csv` is the canonical working index for annotations and automation.  
- For monthly refresh: replace `conversations.json` with the latest ChatGPT export, commit if desired, then run the workflow. Content hashes + `(conversation_id, message_id)` keep the pipeline idempotent.

## Future enhancement (recommended)
Add a second workflow that merges overrides from `docs/chatgpt/overrides/message_overrides.csv` into a third output `docs/chatgpt/derived/chatgpt_messages_enriched.csv` via a left join on `(conversation_id, message_id)`.

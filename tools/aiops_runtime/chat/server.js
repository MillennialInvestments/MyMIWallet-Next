const path = require('path');
const express = require('express');
const dotenv = require('dotenv');

dotenv.config({ path: path.join(__dirname, '.env') });

const app = express();
const port = parseInt(process.env.PORT, 10) || 8300;
const ollamaBaseUrl = (process.env.OLLAMA_BASE_URL || 'http://127.0.0.1:11434').replace(/\/$/, '');
const ollamaModel = process.env.OLLAMA_MODEL || 'llama3';
const chatTitle = process.env.CHAT_TITLE || 'AI Ops Chat';
const basicAuthUser = process.env.BASIC_AUTH_USER;
const basicAuthPass = process.env.BASIC_AUTH_PASS;

app.use(express.json());
app.use(express.urlencoded({ extended: false }));

const unauthorized = (res) => {
  res.set('WWW-Authenticate', 'Basic realm="AI Ops Chat"');
  return res.status(401).send('Authentication required');
};

app.use((req, res, next) => {
  if (req.path === '/health') {
    return next();
  }

  if (!basicAuthUser || !basicAuthPass) {
    return res.status(500).send('BASIC_AUTH_USER and BASIC_AUTH_PASS must be set.');
  }

  const header = req.headers.authorization || '';
  if (!header.startsWith('Basic ')) {
    return unauthorized(res);
  }

  const decoded = Buffer.from(header.split(' ')[1] || '', 'base64').toString();
  const separatorIndex = decoded.indexOf(':');
  const user = decoded.slice(0, separatorIndex);
  const pass = decoded.slice(separatorIndex + 1);

  if (user === basicAuthUser && pass === basicAuthPass) {
    return next();
  }

  return unauthorized(res);
});

app.get('/health', (_req, res) => {
  res.json({ status: 'ok', port, backend: ollamaBaseUrl });
});

app.get('/', (_req, res) => {
  const html = `<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>${chatTitle}</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 40px; background: #0d1117; color: #e6edf3; }
    h1 { margin-bottom: 0; }
    .subtitle { color: #8b949e; margin-top: 4px; }
    .panel { background: #161b22; border: 1px solid #30363d; border-radius: 8px; padding: 16px; margin-top: 16px; }
    label { display: block; margin-bottom: 8px; font-weight: bold; }
    textarea { width: 100%; min-height: 140px; border-radius: 6px; border: 1px solid #30363d; background: #0d1117; color: #e6edf3; padding: 10px; }
    button { background: #2ea043; border: none; color: #fff; padding: 10px 16px; border-radius: 6px; cursor: pointer; margin-top: 10px; }
    button:disabled { background: #2ea04380; cursor: not-allowed; }
    pre { white-space: pre-wrap; word-wrap: break-word; background: #0d1117; border: 1px solid #30363d; border-radius: 6px; padding: 12px; min-height: 80px; }
    .status { margin-top: 8px; color: #8b949e; }
  </style>
</head>
<body>
  <h1>${chatTitle}</h1>
  <div class="subtitle">Backend: ${ollamaBaseUrl}</div>
  <div class="panel">
    <label for="prompt">Prompt</label>
    <textarea id="prompt" placeholder="Ask a question..." autofocus></textarea>
    <button id="send">Send</button>
    <div class="status" id="status"></div>
    <h3>Response</h3>
    <pre id="response"></pre>
  </div>
  <script>
    const sendBtn = document.getElementById('send');
    const promptEl = document.getElementById('prompt');
    const responseEl = document.getElementById('response');
    const statusEl = document.getElementById('status');

    async function sendPrompt() {
      const prompt = promptEl.value.trim();
      if (!prompt) {
        statusEl.textContent = 'Enter a prompt to start.';
        return;
      }
      sendBtn.disabled = true;
      statusEl.textContent = 'Sending...';
      responseEl.textContent = '';
      try {
        const res = await fetch('/api/chat', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ prompt })
        });

        const data = await res.json();
        if (!res.ok) {
          throw new Error(data.error || 'Chat request failed');
        }
        responseEl.textContent = data.message || '[no content]';
        statusEl.textContent = 'OK';
      } catch (err) {
        statusEl.textContent = err.message;
        responseEl.textContent = '';
      } finally {
        sendBtn.disabled = false;
      }
    }

    sendBtn.addEventListener('click', sendPrompt);
    promptEl.addEventListener('keydown', (e) => {
      if (e.ctrlKey && e.key === 'Enter') {
        sendPrompt();
      }
    });
  </script>
</body>
</html>`;

  res.setHeader('Content-Type', 'text/html');
  res.send(html);
});

app.post('/api/chat', async (req, res) => {
  const prompt = (req.body?.prompt || '').trim();
  if (!prompt) {
    return res.status(400).json({ error: 'Prompt is required.' });
  }

  try {
    const response = await fetch(`${ollamaBaseUrl}/api/chat`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({
        model: ollamaModel,
        messages: [
          { role: 'system', content: 'You are the MyMI Wallet assistant.' },
          { role: 'user', content: prompt }
        ],
        stream: false
      })
    });

    if (!response.ok) {
      const text = await response.text();
      return res.status(502).json({ error: 'Upstream chat error', detail: text });
    }

    const payload = await response.json();
    const message = payload?.message?.content || payload?.response || '';
    return res.json({ message });
  } catch (error) {
    return res.status(500).json({ error: 'Failed to contact backend', detail: error.message });
  }
});

app.listen(port, '0.0.0.0', () => {
  console.log(`${chatTitle} listening on port ${port}, proxying to ${ollamaBaseUrl}`);
});

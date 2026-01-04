const transcript = document.getElementById('transcript');
const form = document.getElementById('chat-form');
const messageInput = document.getElementById('message');
const sendBtn = document.getElementById('send-btn');
const statusEl = document.getElementById('status');
const template = document.getElementById('message-template');

const conversation = [];

function addMessage(role, content) {
  const clone = template.content.firstElementChild.cloneNode(true);
  clone.classList.add(role);
  clone.querySelector('.role').textContent = role;
  clone.querySelector('.content').textContent = content;
  transcript.appendChild(clone);
  transcript.scrollTop = transcript.scrollHeight;
}

function setStatus(text, isError = false) {
  statusEl.textContent = text;
  statusEl.style.color = isError ? '#ef4444' : '#9ca3af';
}

form.addEventListener('submit', async (e) => {
  e.preventDefault();
  const content = messageInput.value.trim();
  if (!content) return;

  sendBtn.disabled = true;
  setStatus('Sending...');
  addMessage('user', content);
  conversation.push({ role: 'user', content });
  messageInput.value = '';

  try {
    const response = await fetch('/api/chat', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ messages: conversation })
    });

    if (response.status === 503) {
      setStatus('Service disabled', true);
      addMessage('assistant', 'Chat is temporarily disabled.');
      sendBtn.disabled = false;
      return;
    }

    if (response.status === 429) {
      setStatus('Usage cap reached', true);
      addMessage('assistant', 'Usage limits reached. Please try again later.');
      sendBtn.disabled = false;
      return;
    }

    if (!response.ok) {
      throw new Error(`Request failed with status ${response.status}`);
    }

    const payload = await response.json();
    const reply = payload.reply || 'No response received.';
    conversation.push({ role: 'assistant', content: reply });
    addMessage('assistant', reply);
    setStatus('Secure session');
  } catch (err) {
    console.error(err);
    setStatus('Error contacting server', true);
    addMessage('assistant', 'Could not reach chat service.');
  } finally {
    sendBtn.disabled = false;
    messageInput.focus();
  }
});

messageInput.addEventListener('keydown', (e) => {
  if (e.key === 'Enter' && !e.shiftKey) {
    e.preventDefault();
    form.requestSubmit();
  }
});

addMessage('assistant', 'Welcome to MyMI Chat. Start by typing your question.');

const opsOutput = document.getElementById('ops-output');
const opsBaseInput = document.getElementById('ops-base-url');
const opsSecretInput = document.getElementById('ops-secret');
const opsJobKeyInput = document.getElementById('ops-job-key');
const opsDispatchBtn = document.getElementById('ops-dispatch-btn');
const opsStatusBtn = document.getElementById('ops-status-btn');
const opsLatestBtn = document.getElementById('ops-latest-btn');

if (opsBaseInput) {
  opsBaseInput.value = window.location.origin;
}

let lastQueueId = null;

function setOpsOutput(message) {
  if (opsOutput) {
    opsOutput.textContent = message;
  }
}

function bufferToBase64(buffer) {
  let binary = '';
  const bytes = new Uint8Array(buffer);
  for (let i = 0; i < bytes.byteLength; i++) {
    binary += String.fromCharCode(bytes[i]);
  }
  return btoa(binary);
}

async function signPayload(path, body, secret) {
  const encoder = new TextEncoder();
  const key = await crypto.subtle.importKey('raw', encoder.encode(secret), { name: 'HMAC', hash: 'SHA-256' }, false, [
    'sign'
  ]);
  const timestamp = Math.floor(Date.now() / 1000).toString();
  const message = `${timestamp}\n${path}\n${body}`;
  const signatureBuffer = await crypto.subtle.sign('HMAC', key, encoder.encode(message));
  return { timestamp, signature: bufferToBase64(signatureBuffer) };
}

async function opsFetch(path, method = 'GET', bodyObj = null) {
  if (!opsBaseInput || !opsSecretInput) return {};
  const baseUrl = opsBaseInput.value.trim() || window.location.origin;
  const secret = opsSecretInput.value.trim();
  if (!secret) {
    throw new Error('Shared secret is required');
  }

  const body = bodyObj ? JSON.stringify(bodyObj) : '';
  const { timestamp, signature } = await signPayload(path, body, secret);
  const headers = {
    'X-MyMI-Timestamp': timestamp,
    'X-MyMI-Signature': signature,
    'Content-Type': 'application/json'
  };

  const response = await fetch(`${baseUrl}${path}`, {
    method,
    headers,
    body: method === 'POST' ? body : undefined
  });

  if (!response.ok) {
    const text = await response.text();
    throw new Error(`HTTP ${response.status}: ${text}`);
  }

  return response.json();
}

opsDispatchBtn?.addEventListener('click', async () => {
  const jobKey = opsJobKeyInput?.value.trim();
  if (!jobKey) {
    setOpsOutput('Enter a job key to dispatch (e.g., ops.health.check)');
    return;
  }

  try {
    setOpsOutput('Dispatching job...');
    const res = await opsFetch('/API/Ops/dispatch', 'POST', { job_key: jobKey });
    lastQueueId = res.queue_id || null;
    setOpsOutput(`Queued ${jobKey}. queue_id=${lastQueueId || 'n/a'}`);
  } catch (err) {
    console.error(err);
    setOpsOutput(`Dispatch failed: ${err.message}`);
  }
});

opsStatusBtn?.addEventListener('click', async () => {
  try {
    setOpsOutput('Checking status...');
    const path = lastQueueId ? `/API/Ops/status?queue_id=${lastQueueId}` : '/API/Ops/status';
    const res = await opsFetch(path, 'GET');
    if (res?.queue_run?.queue_id) {
      lastQueueId = res.queue_run.queue_id;
    }
    setOpsOutput(JSON.stringify(res, null, 2));
  } catch (err) {
    console.error(err);
    setOpsOutput(`Status failed: ${err.message}`);
  }
});

opsLatestBtn?.addEventListener('click', async () => {
  try {
    setOpsOutput('Fetching latest report...');
    const res = await opsFetch('/API/Ops/reports/latest', 'GET');
    const content = res?.content || JSON.stringify(res, null, 2);
    setOpsOutput(content);
  } catch (err) {
    console.error(err);
    setOpsOutput(`Latest report failed: ${err.message}`);
  }
});

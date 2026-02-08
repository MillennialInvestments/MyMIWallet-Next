const transcript = document.getElementById('transcript');
const form = document.getElementById('chat-form');
const messageInput = document.getElementById('message');
const sendBtn = document.getElementById('send-btn');
const statusEl = document.getElementById('status');
const template = document.getElementById('message-template');
const modeBadge = document.getElementById('mode-badge');
const actionsSubtitle = document.getElementById('actions-subtitle');
const userEmailEl = document.getElementById('user-email');
const userRolesEl = document.getElementById('user-roles');
const userTierEl = document.getElementById('user-tier');
const accessDeniedEl = document.getElementById('access-denied');
const managementActions = document.getElementById('management-actions');
const userActions = document.getElementById('user-actions');
const opsStatusBtn = document.getElementById('ops-status-btn');
const latestErrorsBtn = document.getElementById('latest-errors-btn');
const runCronBtn = document.getElementById('run-cron-btn');
const budgetBtn = document.getElementById('budget-btn');
const portfolioBtn = document.getElementById('portfolio-btn');
const tradeAlertsBtn = document.getElementById('trade-alerts-btn');
const marketBtn = document.getElementById('market-question-btn');
const marketTickerInput = document.getElementById('market-ticker');
const tileChatStatus = document.getElementById('tile-chat-status');
const tileChatPort = document.getElementById('tile-chat-port');
const tileToolHealth = document.getElementById('tile-tool-health');
const tileLastError = document.getElementById('tile-last-error');
const tileLogFreshness = document.getElementById('tile-log-freshness');

const conversation = [];
const MODE = window.location.pathname.startsWith('/m') ? 'management' : 'user';
const managementRoles = ['admin', 'ops', 'manager'];
let currentUser = { roles: [], tier: 'FREE', userId: null };
let accessDenied = false;

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

function setModeBadge() {
  if (modeBadge) {
    modeBadge.textContent = MODE === 'management' ? 'Management Mode' : 'User Mode';
    modeBadge.className = MODE === 'management' ? 'badge badge-warn' : 'badge badge-ok';
  }
  if (actionsSubtitle) {
    actionsSubtitle.textContent =
      MODE === 'management'
        ? 'Ops tooling guarded by CI4 roles (admin/ops/manager).'
        : 'Budgeting, portfolio, and premium alerts personalized to you.';
  }
}

function normalizeProfile(payload) {
  const data = payload?.data || {};
  const roles = Array.isArray(data.roles) ? data.roles.map((r) => (r || '').toLowerCase()) : [];
  const tier = (data.tier || 'FREE').toString().toUpperCase();
  return {
    userId: data.userId ?? null,
    roles,
    tier,
  };
}

function updateProfileUi() {
  userEmailEl.textContent = currentUser.userId ? `User #${currentUser.userId}` : 'Guest session';
  userRolesEl.textContent = currentUser.roles.length ? currentUser.roles.join(', ') : 'none';
  userTierEl.textContent = currentUser.tier;
}

function enforceManagementGate() {
  if (MODE !== 'management') {
    accessDenied = false;
    return;
  }

  const allowed = currentUser.roles.some((role) => managementRoles.includes(role));
  accessDenied = !allowed;
  accessDeniedEl.hidden = allowed;
  form.classList.toggle('disabled', !allowed);
  Array.from(document.querySelectorAll('button')).forEach((btn) => {
    if (btn.dataset?.ignoreGate !== 'true') {
      btn.disabled = !allowed;
    }
  });
  if (!allowed) {
    setStatus('Access denied — management role required', true);
  } else {
    setStatus('Secure session');
  }
}

async function fetchProfile() {
  setStatus('Loading session...');
  try {
    const res = await fetch('/api/me', { credentials: 'include' });
    if (!res.ok) {
      throw new Error(`Profile lookup failed (${res.status})`);
    }
    const payload = await res.json();
    currentUser = normalizeProfile(payload);
    updateProfileUi();
    enforceManagementGate();
    if (!accessDenied) {
      setStatus('Secure session');
    }
  } catch (err) {
    console.error(err);
    setStatus('Unable to load profile', true);
  }
}

function toggleActions() {
  if (MODE === 'management') {
    managementActions?.classList.remove('hidden');
    userActions?.classList.add('hidden');
  } else {
    managementActions?.classList.add('hidden');
    userActions?.classList.remove('hidden');
  }
}

async function sendChatMessage(content) {
  sendBtn.disabled = true;
  setStatus('Sending...');
  addMessage('user', content);
  conversation.push({ role: 'user', content });
  messageInput.value = '';

  try {
    const response = await fetch('/api/chat', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ messages: conversation }),
    });

    if (response.status === 503) {
      setStatus('Service disabled', true);
      addMessage('assistant', 'Chat is temporarily disabled.');
      return;
    }

    if (response.status === 429) {
      setStatus('Usage cap reached', true);
      addMessage('assistant', 'Usage limits reached. Please try again later.');
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
}

function formatToolResponse(body) {
  if (!body) return 'No response received.';
  if (typeof body === 'string') return body;
  if (body.reply) return body.reply;
  if (body.data) return JSON.stringify(body.data, null, 2);
  return JSON.stringify(body, null, 2);
}

async function sendToolRequest(tool, context = {}, message = '') {
  if (accessDenied) {
    addMessage('assistant', 'Access denied. Management role required.');
    return;
  }
  setStatus(`Running ${tool}...`);
  addMessage('user', `Run ${tool}${message ? ` — ${message}` : ''}`);

  try {
    const res = await fetch('/api/chat', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ mode: MODE, tool, context, message }),
    });

    if (!res.ok) {
      const text = await res.text();
      throw new Error(text || `Tool failed (${res.status})`);
    }

    const payload = await res.json();
    const formatted = formatToolResponse(payload);
    addMessage('assistant', formatted);
    setStatus('Secure session');
  } catch (err) {
    console.error(err);
    addMessage('assistant', `Tool error: ${err.message}`);
    setStatus('Tool error', true);
  }
}

function setTile(el, value) {
  if (!el) return;
  el.textContent = value;
}

async function refreshOpsVisibility() {
  try {
    const res = await fetch('/api/ops/visibility');
    if (!res.ok) throw new Error(`visibility ${res.status}`);
    const payload = await res.json();
    setTile(tileChatStatus, payload?.chatStatus?.status || 'unknown');
    setTile(tileChatPort, String(payload?.chatPort || '--'));
    const tool = payload?.toolHealth;
    setTile(tileToolHealth, tool?.ok ? `ok (${tool.status})` : `down (${tool?.status ?? 'n/a'})`);
    setTile(tileLastError, payload?.lastError || 'none');
    const age = payload?.logFreshness?.ageSeconds;
    setTile(tileLogFreshness, Number.isFinite(age) ? `${age}s ago` : 'unknown');
  } catch (err) {
    setTile(tileChatStatus, 'unavailable');
    setTile(tileToolHealth, 'unavailable');
  }
}

form.addEventListener('submit', (e) => {
  e.preventDefault();
  if (accessDenied) {
    return;
  }
  const content = messageInput.value.trim();
  if (!content) return;
  sendChatMessage(content);
});

messageInput.addEventListener('keydown', (e) => {
  if (e.key === 'Enter' && !e.shiftKey) {
    e.preventDefault();
    form.requestSubmit();
  }
});

opsStatusBtn?.addEventListener('click', () => sendToolRequest('ops_status'));
latestErrorsBtn?.addEventListener('click', () => sendToolRequest('latest_errors'));
runCronBtn?.addEventListener('click', () => sendToolRequest('run_cron'));
budgetBtn?.addEventListener('click', () => sendToolRequest('budget_snapshot'));
portfolioBtn?.addEventListener('click', () => sendToolRequest('portfolio_overview'));
tradeAlertsBtn?.addEventListener('click', () => sendToolRequest('trade_alerts'));
marketBtn?.addEventListener('click', () => {
  const ticker = marketTickerInput.value.trim() || 'AAPL';
  sendToolRequest('market_question', { ticker });
});

addMessage('assistant', 'Welcome to MyMI Chat. Start by typing your question or choose a quick action.');
setModeBadge();
toggleActions();
refreshOpsVisibility();
setInterval(refreshOpsVisibility, 30000);
fetchProfile();

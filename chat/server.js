import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';
import express from 'express';
import helmet from 'helmet';
import compression from 'compression';
import rateLimit from 'express-rate-limit';
import dotenv from 'dotenv';
import { spawn } from 'child_process';
import jwt from 'jsonwebtoken';
import { createCostControls } from '../tools/ai-cost-controls/index.js';

dotenv.config();

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const PORT = process.env.PORT || 8300;
const HOST = process.env.BIND_HOST || '0.0.0.0';
const APP_BASE_URL = process.env.APP_BASE_URL || '';
const BASIC_AUTH_ACTIVE = (process.env.BASIC_AUTH_ACTIVE || 'true').toLowerCase() === 'true';
const BASIC_AUTH_USER = process.env.BASIC_AUTH_USER || 'team';
const BASIC_AUTH_PASS = process.env.BASIC_AUTH_PASS || 'change_me';
const SSO_ENABLED = (process.env.SSO_ENABLED || 'false').toLowerCase() === 'true';
const SSO_JWT_ISSUER = process.env.SSO_JWT_ISSUER || 'https://mymiwallet.com';
const SSO_JWT_AUDIENCE = process.env.SSO_JWT_AUDIENCE || 'chat.mymiwallet.com';
const SSO_JWT_SECRET = process.env.SSO_JWT_SECRET || '';
const ALERT_EMAIL_TO = process.env.ALERT_EMAIL_TO || 'team@mymiwallet.com';
const MYMI_USAGE_WEBHOOK_URL = process.env.MYMI_USAGE_WEBHOOK_URL || '';
const MYMI_USAGE_WEBHOOK_SECRET = process.env.MYMI_USAGE_WEBHOOK_SECRET || '';
const OPENAI_API_KEY = process.env.OPENAI_API_KEY;
const OPENAI_MODEL = process.env.OPENAI_MODEL || 'gpt-4o-mini';
const OLLAMA_BASE_URL = process.env.OLLAMA_BASE_URL || 'https://aiops.mymiwallet.com';
const COST_PER_1K = {
  'gpt-4o-mini': 0.00015,
  'gpt-4o': 0.005,
  'gpt-3.5-turbo': 0.0005
};

const CONFIG_PATH = path.join(__dirname, 'config.runtime.json');
const USAGE_PATH = path.join(__dirname, 'usage.json');
const LOG_PATH = path.join(__dirname, 'logs', 'chat.log');
const TEN_SECONDS = 10 * 1000;
const DEFAULT_PROVIDER = 'openai';
const DEFAULT_MODEL = 'gpt-4o-mini';

const runtimeCache = { config: null, loadedAt: 0 };
let costControls;

try {
  costControls = createCostControls({
    configPath: path.join(__dirname, '..', 'config', 'ai-cost-controls.json')
  });
} catch (err) {
  appendLog(`Cost control initialization failed: ${err.message}`);
}

const app = express();
app.disable('x-powered-by');
app.use(helmet());
app.use(compression());
app.use(express.json({ limit: '1mb' }));
app.use(requestLogger);
app.use(corsGuard);
app.use(jwtAuthMiddleware);
if (BASIC_AUTH_ACTIVE) {
  app.use(basicAuthMiddleware);
}
app.use(
  rateLimit({
    windowMs: 60 * 1000,
    max: 60,
    standardHeaders: true,
    legacyHeaders: false,
    message: 'Too many requests, please slow down.'
  })
);

app.use(express.static(path.join(__dirname, 'public')));

app.get('/health', async (_req, res) => {
  const config = await loadRuntimeConfig();
  res.status(200).json({ status: 'ok', enabled: config.enabled !== false });
});

app.get('/', (_req, res) => {
  res.sendFile(path.join(__dirname, 'public', 'index.html'));
});

app.post('/api/chat', async (req, res) => {
  const config = await loadRuntimeConfig();
  if (!config.enabled) {
    return res.status(503).json({ error: 'Chat temporarily disabled' });
  }

  const { messages = [], temperature = 0.7 } = req.body || {};
  if (!Array.isArray(messages) || messages.length === 0) {
    return res.status(400).json({ error: 'messages array required' });
  }

  const estimate = estimateUsage(messages, config.providerModel);
  const actor = resolveActor(req);
  const monthKey = costControls?.monthKey ? costControls.monthKey() : null;

  if (costControls) {
    try {
      const userUsage = await costControls.fetchChatUsage(actor.userId, monthKey || undefined);
      const planCap = costControls.planLimit(actor.plan);
      if (planCap && userUsage.usd_used + estimate.costUsd >= planCap) {
        return res.status(429).json({ error: 'Monthly AI limit reached for your plan' });
      }
    } catch (err) {
      await appendLog(`Per-user usage check failed: ${err.message}`);
    }
  }

  const usage = await loadUsage();
  const hardStopValue = Number(config.monthlyBudgetUsd || 0) * (Number(config.hardStopPercent || 95) / 100);
  const projectedTotal = usage.totalUsd + estimate.costUsd;

  if (hardStopValue > 0 && usage.totalUsd >= hardStopValue) {
    return res.status(429).json({ error: 'Monthly AI budget exhausted' });
  }

  if (hardStopValue > 0 && projectedTotal >= hardStopValue) {
    return res.status(429).json({ error: 'Monthly AI budget exhausted' });
  }

  let llmResponse;
  try {
    llmResponse = await callLLM(messages, {
      temperature,
      provider: config.provider,
      model: config.providerModel
    });
  } catch (err) {
    await appendLog(`LLM call failed: ${err.message}`);
    return res.status(502).json({ error: 'Upstream provider error' });
  }

  const updatedUsage = await persistUsage(usage, estimate);
  if (costControls) {
    try {
      await costControls.incrementChatUsage(
        { userId: actor.userId, email: actor.email, plan: actor.plan },
        { tokens: estimate.tokens, costUsd: estimate.costUsd },
        monthKey || undefined
      );
    } catch (err) {
      await appendLog(`Unable to record chat_usage row: ${err.message}`);
    }
  }
  await maybeSendAlert(updatedUsage, config);
  await sendUsageWebhook(updatedUsage, estimate, { user: actor });

  return res.json({ reply: llmResponse });
});

app.use((req, res) => {
  res.status(404).json({ error: 'Not found' });
});

async function loadRuntimeConfig() {
  const now = Date.now();
  if (runtimeCache.config && now - runtimeCache.loadedAt < TEN_SECONDS) {
    return runtimeCache.config;
  }
  try {
    const raw = await fs.promises.readFile(CONFIG_PATH, 'utf8');
    const parsed = JSON.parse(raw);
    runtimeCache.config = {
      enabled: parsed.enabled !== false,
      provider: parsed.provider || DEFAULT_PROVIDER,
      providerModel: parsed.providerModel || OPENAI_MODEL || DEFAULT_MODEL,
      monthlyBudgetUsd: Number(parsed.monthlyBudgetUsd ?? 0),
      alertThresholdPercent: Number(parsed.alertThresholdPercent ?? 80),
      hardStopPercent: Number(parsed.hardStopPercent ?? 95)
    };
    runtimeCache.loadedAt = now;
    return runtimeCache.config;
  } catch (err) {
    await appendLog(`Failed to read config.runtime.json: ${err.message}`);
    const fallback = {
      enabled: true,
      provider: DEFAULT_PROVIDER,
      providerModel: OPENAI_MODEL || DEFAULT_MODEL,
      monthlyBudgetUsd: 25,
      alertThresholdPercent: 80,
      hardStopPercent: 95
    };
    runtimeCache.config = fallback;
    runtimeCache.loadedAt = now;
    return fallback;
  }
}

async function ensureUsageFile() {
  try {
    await fs.promises.access(USAGE_PATH);
  } catch {
    const initial = createEmptyUsage();
    await fs.promises.writeFile(USAGE_PATH, JSON.stringify(initial, null, 2));
  }
}

function createEmptyUsage() {
  const now = new Date();
  return {
    month: `${now.getUTCFullYear()}-${String(now.getUTCMonth() + 1).padStart(2, '0')}`,
    totalUsd: 0,
    lastAlertSent: 0
  };
}

async function loadUsage() {
  await ensureUsageFile();
  const raw = await fs.promises.readFile(USAGE_PATH, 'utf8');
  const parsed = JSON.parse(raw);
  const normalized = normalizeUsage(parsed);
  return normalized;
}

function normalizeUsage(usage) {
  const now = new Date();
  const monthKey = `${now.getUTCFullYear()}-${String(now.getUTCMonth() + 1).padStart(2, '0')}`;
  const normalized = {
    month: usage.month || usage.monthly?.month || monthKey,
    totalUsd: Number.isFinite(usage.totalUsd) ? Number(usage.totalUsd) : Number(usage.monthly?.cost || 0),
    lastAlertSent: Number.isFinite(usage.lastAlertSent) ? Number(usage.lastAlertSent) : 0
  };

  if (normalized.month !== monthKey) {
    normalized.month = monthKey;
    normalized.totalUsd = 0;
    normalized.lastAlertSent = 0;
  }
  return normalized;
}

async function persistUsage(currentUsage, estimate) {
  const usage = normalizeUsage(currentUsage);
  usage.totalUsd += estimate.costUsd;
  await fs.promises.writeFile(USAGE_PATH, JSON.stringify(usage, null, 2));
  await appendLog(`Usage updated: month=${usage.month}, totalUsd=$${usage.totalUsd.toFixed(6)}`);
  return usage;
}

function estimateUsage(messages, providerModel) {
  const estimatedTokens = Math.ceil(JSON.stringify(messages).length / 4);
  const tokenCost = COST_PER_1K[providerModel] || 0.001;
  const costUsd = (estimatedTokens / 1000) * tokenCost;
  return { tokens: estimatedTokens, costUsd };
}

async function maybeSendAlert(usage, config) {
  const monthlyBudget = Number(config.monthlyBudgetUsd || 0);
  const alertThreshold = Number(config.alertThresholdPercent || 80);
  if (!monthlyBudget || !alertThreshold) return;
  const percentUsed = Math.floor((usage.totalUsd / monthlyBudget) * 100);
  if (percentUsed >= alertThreshold && usage.lastAlertSent < alertThreshold) {
    await sendAlertNotification(percentUsed, usage);
    usage.lastAlertSent = alertThreshold;
    await fs.promises.writeFile(USAGE_PATH, JSON.stringify(usage, null, 2));
  }
}

async function sendAlertNotification(percentUsed, usage) {
  try {
    await sendAlertEmail(percentUsed);
  } catch (err) {
    await appendLog(`Alert email failed: ${err.message}`);
  }
  await sendUsageWebhook(usage, null, { alertPercent: percentUsed });
}

async function sendAlertEmail(percent) {
  const subject = `MyMI Chat usage at ${percent.toFixed(2)}%`;
  const body = `Usage has reached ${percent.toFixed(2)}% of the monthly budget. Consider increasing limits or pausing traffic.`;
  const sendmailPath = '/usr/sbin/sendmail';
  if (fs.existsSync(sendmailPath)) {
    return new Promise((resolve, reject) => {
      const mail = spawn(sendmailPath, ['-t']);
      mail.stdin.write(`To: ${ALERT_EMAIL_TO}\n`);
      mail.stdin.write('Subject: ' + subject + '\n');
      mail.stdin.write('\n');
      mail.stdin.write(body + '\n');
      mail.stdin.end();
      mail.on('exit', code => {
        if (code === 0) {
          appendLog(`Alert email sent to ${ALERT_EMAIL_TO}`);
          resolve();
        } else {
          appendLog(`sendmail exited with code ${code}`);
          reject(new Error('sendmail failed'));
        }
      });
    });
  }
  await appendLog(`[ALERT] ${subject} - ${body}`);
}

async function sendUsageWebhook(usage, estimate, extra = {}) {
  if (!MYMI_USAGE_WEBHOOK_URL) return;
  try {
    await fetch(MYMI_USAGE_WEBHOOK_URL, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-Usage-Secret': MYMI_USAGE_WEBHOOK_SECRET || ''
      },
      body: JSON.stringify({
        source: 'chat',
        timestamp: new Date().toISOString(),
        usage,
        estimate,
        ...extra
      })
    });
  } catch (err) {
    await appendLog(`Usage webhook failed: ${err.message}`);
  }
}

async function callLLM(messages, opts = {}) {
  const runtime = await loadRuntimeConfig();
  const provider = opts.provider || runtime.provider;
  switch (provider) {
    case 'openai':
      return callOpenAI(messages, opts);
    case 'ollama':
      return callOllama(messages, opts);
    default:
      throw new Error('Unknown provider');
  }
}

async function callOpenAI(messages, opts = {}) {
  if (!OPENAI_API_KEY) {
    throw new Error('Missing OPENAI_API_KEY');
  }
  const response = await fetch('https://api.openai.com/v1/chat/completions', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      Authorization: `Bearer ${OPENAI_API_KEY}`
    },
    body: JSON.stringify({
      model: opts.model || OPENAI_MODEL || DEFAULT_MODEL,
      messages,
      temperature: opts.temperature ?? 0.7
    })
  });

  if (!response.ok) {
    const text = await response.text();
    throw new Error(`OpenAI request failed (${response.status}): ${text}`);
  }
  const data = await response.json();
  const reply = data?.choices?.[0]?.message?.content;
  return reply || 'No response received.';
}

async function callOllama(messages, opts = {}) {
  const model = opts.model || 'llama3';
  const response = await fetch(`${OLLAMA_BASE_URL}/api/chat`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      model,
      messages,
      options: {
        temperature: opts.temperature ?? 0.7
      }
    })
  });

  if (!response.ok) {
    const text = await response.text();
    throw new Error(`Ollama request failed (${response.status}): ${text}`);
  }

  const data = await response.json();
  const reply = data?.message?.content || data?.choices?.[0]?.message?.content;
  return reply || 'No response received.';
}

function jwtAuthMiddleware(req, res, next) {
  if (!SSO_ENABLED) {
    return next();
  }

  const authHeader = req.headers.authorization || '';
  const [scheme, token] = authHeader.split(' ');
  if (!token || (scheme || '').toLowerCase() !== 'bearer') {
    return next();
  }
  if (!SSO_JWT_SECRET) {
    appendLog('SSO is enabled but SSO_JWT_SECRET is not set.');
    return res.status(401).json({ error: 'SSO misconfigured' });
  }

  try {
    const decoded = jwt.verify(token, SSO_JWT_SECRET, {
      algorithms: ['HS256', 'RS256'],
      issuer: SSO_JWT_ISSUER,
      audience: SSO_JWT_AUDIENCE
    });
    req.user = normalizeUser(decoded);
    return next();
  } catch (err) {
    appendLog(`JWT validation failed: ${err.message}`);
    return res.status(401).json({ error: 'Invalid or expired SSO token' });
  }
}

function basicAuthMiddleware(req, res, next) {
  if (req.user) {
    return next();
  }

  const authHeader = req.headers.authorization || '';
  const [scheme, encoded] = authHeader.split(' ');
  if (!encoded || (scheme || '').toLowerCase() !== 'basic') {
    res.set('WWW-Authenticate', 'Basic realm="chat"');
    return res.status(401).send('Authentication required');
  }

  const decoded = Buffer.from(encoded, 'base64').toString('utf8');
  const [user, pass] = decoded.split(':');
  if (user === BASIC_AUTH_USER && pass === BASIC_AUTH_PASS) {
    return next();
  }

  res.set('WWW-Authenticate', 'Basic realm="chat"');
  return res.status(401).send('Unauthorized');
}

function normalizeUser(payload = {}) {
  const rawId = payload.sub ?? payload.user_id ?? payload.id;
  const numericId = Number(rawId);
  const id = Number.isFinite(numericId) ? numericId : null;
  return {
    id,
    email: payload.email,
    role: payload.role || 'user',
    plan: payload.plan || 'free',
    raw: payload
  };
}

function resolveActor(req) {
  if (req.user) {
    return {
      userId: Number.isFinite(req.user.id) ? req.user.id : 0,
      email: req.user.email,
      plan: (req.user.plan || '').toLowerCase() || 'free',
      role: req.user.role || 'user',
      authType: 'sso'
    };
  }

  return {
    userId: 0,
    email: `${BASIC_AUTH_USER}@mymiwallet.com`,
    plan: 'premium',
    role: 'admin',
    authType: 'basic'
  };
}

function corsGuard(req, res, next) {
  const origin = req.headers.origin;
  if (!origin || (APP_BASE_URL && origin === APP_BASE_URL)) {
    if (origin) {
      res.header('Access-Control-Allow-Origin', origin);
    }
    res.header('Access-Control-Allow-Methods', 'GET,POST,OPTIONS');
    res.header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    if (req.method === 'OPTIONS') {
      return res.sendStatus(204);
    }
    return next();
  }
  return res.status(403).json({ error: 'CORS not allowed for this origin' });
}

function requestLogger(req, _res, next) {
  appendLog(`${req.method} ${req.originalUrl} from ${req.ip}`);
  next();
}

async function appendLog(message) {
  await fs.promises.mkdir(path.dirname(LOG_PATH), { recursive: true });
  const line = `[${new Date().toISOString()}] ${message}\n`;
  await fs.promises.appendFile(LOG_PATH, line);
}

app.listen(PORT, HOST, () => {
  appendLog(`Chat server listening on ${HOST}:${PORT}`);
});

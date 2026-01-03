import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';
import express from 'express';
import helmet from 'helmet';
import compression from 'compression';
import rateLimit from 'express-rate-limit';
import dotenv from 'dotenv';
import { spawn } from 'child_process';

dotenv.config();

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const PORT = process.env.PORT || 8300;
const HOST = process.env.BIND_HOST || '0.0.0.0';
const APP_BASE_URL = process.env.APP_BASE_URL || '';
const BASIC_AUTH_ACTIVE = (process.env.BASIC_AUTH_ACTIVE || 'true').toLowerCase() === 'true';
const BASIC_AUTH_USER = process.env.BASIC_AUTH_USER || 'team';
const BASIC_AUTH_PASS = process.env.BASIC_AUTH_PASS || 'change_me';
const ALERT_EMAIL_TO = process.env.ALERT_EMAIL_TO || 'team@mymiwallet.com';
const MYMI_USAGE_WEBHOOK_URL = process.env.MYMI_USAGE_WEBHOOK_URL || '';
const MYMI_USAGE_WEBHOOK_SECRET = process.env.MYMI_USAGE_WEBHOOK_SECRET || '';
const OPENAI_API_KEY = process.env.OPENAI_API_KEY;
const OPENAI_MODEL = process.env.OPENAI_MODEL || 'gpt-4o-mini';

const CONFIG_PATH = path.join(__dirname, 'config.runtime.json');
const USAGE_PATH = path.join(__dirname, 'usage.json');
const LOG_PATH = path.join(__dirname, 'logs', 'chat.log');
const TEN_SECONDS = 10 * 1000;
const COST_PER_KTOKEN_USD = 0.00015; // rough estimate for budgeting; adjust when pricing changes

const runtimeCache = { config: null, loadedAt: 0 };

const app = express();
app.disable('x-powered-by');
app.use(helmet());
app.use(compression());
app.use(express.json({ limit: '1mb' }));
app.use(requestLogger);
app.use(corsGuard);
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

  const usage = await loadUsage();
  const estimate = estimateUsage(messages);
  const projected = computeProjectedUsage(usage, estimate, config);
  if (projected.blocked) {
    return res.status(projected.status).json({ error: projected.reason });
  }

  let openAIResponse;
  try {
    openAIResponse = await callOpenAI(messages, { temperature });
  } catch (err) {
    await appendLog(`OpenAI call failed: ${err.message}`);
    return res.status(502).json({ error: 'Upstream provider error' });
  }

  const updatedUsage = await persistUsage(usage, estimate, config);
  await maybeSendAlert(updatedUsage, config);
  await sendUsageWebhook(updatedUsage, estimate);

  return res.json({ reply: openAIResponse });
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
    runtimeCache.config = parsed;
    runtimeCache.loadedAt = now;
    return parsed;
  } catch (err) {
    await appendLog(`Failed to read config.runtime.json: ${err.message}`);
    const fallback = {
      enabled: true,
      provider: 'openai',
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
    daily: { date: now.toISOString().slice(0, 10), tokens: 0, cost: 0 },
    monthly: { month: `${now.getUTCFullYear()}-${String(now.getUTCMonth() + 1).padStart(2, '0')}`, tokens: 0, cost: 0 },
    lastAlertSent: null
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
  const today = now.toISOString().slice(0, 10);
  const monthKey = `${now.getUTCFullYear()}-${String(now.getUTCMonth() + 1).padStart(2, '0')}`;
  if (usage.daily?.date !== today) {
    usage.daily = { date: today, tokens: 0, cost: 0 };
  }
  if (usage.monthly?.month !== monthKey) {
    usage.monthly = { month: monthKey, tokens: 0, cost: 0 };
    usage.lastAlertSent = null;
  }
  return usage;
}

async function persistUsage(currentUsage, estimate, config) {
  const usage = normalizeUsage(currentUsage);
  usage.daily.tokens += estimate.tokens;
  usage.daily.cost += estimate.cost;
  usage.monthly.tokens += estimate.tokens;
  usage.monthly.cost += estimate.cost;
  await fs.promises.writeFile(USAGE_PATH, JSON.stringify(usage, null, 2));
  await appendLog(`Usage updated: daily=$${usage.daily.cost.toFixed(6)}, monthly=$${usage.monthly.cost.toFixed(6)}`);
  return usage;
}

function estimateUsage(messages) {
  const totalChars = messages.reduce((sum, msg) => sum + (msg?.content?.length || 0), 0);
  const tokens = Math.ceil(totalChars / 4);
  const cost = (tokens / 1000) * COST_PER_KTOKEN_USD;
  return { tokens, cost };
}

function computeProjectedUsage(usage, estimate, config) {
  const monthlyBudget = Number(config.monthlyBudgetUsd || 0);
  const projectedMonthlyCost = usage.monthly.cost + estimate.cost;
  const projectedDailyCost = usage.daily.cost + estimate.cost;
  const dailyBudget = monthlyBudget > 0 ? monthlyBudget / 30 : 0;
  if (monthlyBudget > 0) {
    const monthlyPercent = (projectedMonthlyCost / monthlyBudget) * 100;
    if (monthlyPercent >= (config.hardStopPercent || 95)) {
      return { blocked: true, status: 429, reason: 'Monthly usage cap reached' };
    }
  }
  if (dailyBudget > 0) {
    const dailyPercent = (projectedDailyCost / dailyBudget) * 100;
    if (dailyPercent >= (config.hardStopPercent || 95)) {
      return { blocked: true, status: 429, reason: 'Daily usage cap reached' };
    }
  }
  return { blocked: false };
}

async function maybeSendAlert(usage, config) {
  const monthlyBudget = Number(config.monthlyBudgetUsd || 0);
  const alertThreshold = Number(config.alertThresholdPercent || 80);
  if (!monthlyBudget || !alertThreshold) return;
  const percent = (usage.monthly.cost / monthlyBudget) * 100;
  if (percent >= alertThreshold && !usage.lastAlertSent) {
    await sendAlertEmail(percent);
    usage.lastAlertSent = new Date().toISOString();
    await fs.promises.writeFile(USAGE_PATH, JSON.stringify(usage, null, 2));
  }
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

async function sendUsageWebhook(usage, estimate) {
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
        usage: {
          monthly: usage.monthly,
          daily: usage.daily,
          lastCall: estimate
        }
      })
    });
  } catch (err) {
    await appendLog(`Usage webhook failed: ${err.message}`);
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
      model: OPENAI_MODEL,
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

function basicAuthMiddleware(req, res, next) {
  const authHeader = req.headers.authorization || '';
  const [, encoded] = authHeader.split(' ');
  if (!encoded) {
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

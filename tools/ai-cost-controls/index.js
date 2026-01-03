import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';
import mysql from 'mysql2/promise';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const DEFAULT_CONFIG = {
  chat: {
    plans: {
      free: { monthlyUsd: 1 },
      basic: { monthlyUsd: 5 },
      pro: { monthlyUsd: 20 },
      premium: { monthlyUsd: 50 }
    },
    alertPercent: 80
  },
  aiops: {
    workflows: {
      gap_analysis: { monthlyUsd: 5 },
      doc_generation: { monthlyUsd: 10 },
      code_review: { monthlyUsd: 15 }
    }
  }
};

export function loadConfig(configPath) {
  const resolved = configPath || path.resolve(__dirname, '..', '..', 'config', 'ai-cost-controls.json');
  try {
    if (fs.existsSync(resolved)) {
      const raw = fs.readFileSync(resolved, 'utf8');
      const parsed = JSON.parse(raw);
      return parsed;
    }
  } catch (err) {
    // fall through to default config
    console.warn(`[ai-cost-controls] Unable to read config at ${resolved}: ${err.message}`);
  }
  return DEFAULT_CONFIG;
}

export function getMonthKey(date = new Date()) {
  const d = date instanceof Date ? date : new Date(date);
  const month = String(d.getUTCMonth() + 1).padStart(2, '0');
  return `${d.getUTCFullYear()}-${month}`;
}

export function planLimit(config, plan) {
  if (!plan) return null;
  const key = String(plan).toLowerCase();
  return config?.chat?.plans?.[key]?.monthlyUsd ?? null;
}

export function createPoolFromEnv() {
  const host = process.env.DB_HOST || process.env.DATABASE_HOST;
  const user = process.env.DB_USER || process.env.DATABASE_USER;
  const database = process.env.DB_NAME || process.env.DATABASE_NAME;

  if (!host || !user || !database) {
    throw new Error('Database configuration missing (DB_HOST, DB_USER, DB_NAME are required)');
  }

  return mysql.createPool({
    host,
    user,
    password: process.env.DB_PASS || process.env.DATABASE_PASSWORD || '',
    database,
    port: Number(process.env.DB_PORT || process.env.DATABASE_PORT || 3306),
    waitForConnections: true,
    connectionLimit: 10
  });
}

export function createCostControls(options = {}) {
  const config = loadConfig(options.configPath);
  const pool = options.pool || createPoolFromEnv();

  async function fetchChatUsage(userId, month = getMonthKey()) {
    const [rows] = await pool.query(
      'SELECT user_id, month, tokens_used, usd_used, last_plan, last_email FROM chat_usage WHERE user_id = ? AND month = ? LIMIT 1',
      [userId, month]
    );
    if (rows.length) {
      return rows[0];
    }
    return {
      user_id: userId,
      month,
      tokens_used: 0,
      usd_used: 0,
      last_plan: null,
      last_email: null
    };
  }

  async function incrementChatUsage(user, estimate, month = getMonthKey()) {
    const current = await fetchChatUsage(user.userId, month);
    const nextTokens = Number(current.tokens_used || 0) + Number(estimate.tokens || 0);
    const nextUsd = Number(current.usd_used || 0) + Number(estimate.costUsd || 0);
    const now = new Date();

    await pool.query(
      `
      INSERT INTO chat_usage (user_id, month, tokens_used, usd_used, last_plan, last_email, updated_at)
      VALUES (?, ?, ?, ?, ?, ?, ?)
      ON DUPLICATE KEY UPDATE
        tokens_used = VALUES(tokens_used),
        usd_used = VALUES(usd_used),
        last_plan = VALUES(last_plan),
        last_email = VALUES(last_email),
        updated_at = VALUES(updated_at)
      `,
      [
        user.userId,
        month,
        nextTokens,
        nextUsd.toFixed(4),
        user.plan || current.last_plan,
        user.email || current.last_email,
        now.toISOString().slice(0, 19).replace('T', ' ')
      ]
    );

    return { ...current, tokens_used: nextTokens, usd_used: nextUsd, last_plan: user.plan || current.last_plan };
  }

  return {
    config,
    pool,
    monthKey: getMonthKey,
    planLimit: plan => planLimit(config, plan),
    fetchChatUsage,
    incrementChatUsage
  };
}

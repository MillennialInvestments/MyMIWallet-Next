#!/usr/bin/env node
const express = require('express');

const PORT = Number(process.env.BRIDGE_PORT || process.env.AIOPS_PORT || 8500);
const HOST = process.env.BRIDGE_HOST || process.env.AIOPS_HOST || '127.0.0.1';
const STARTED_AT_ISO = new Date().toISOString();
const startedAtMs = Date.now();
const app = express();

const log = (level, message, extra = {}) => {
  const entry = {
    ts: new Date().toISOString(),
    component: 'aiops-api',
    level,
    message,
    ...extra,
  };

  process.stdout.write(`${JSON.stringify(entry)}\n`);
};

app.use(express.json({ limit: '1mb' }));

app.use((req, res, next) => {
  const requestStarted = Date.now();
  res.on('finish', () => {
    log('info', 'request complete', {
      method: req.method,
      path: req.originalUrl,
      statusCode: res.statusCode,
      durationMs: Date.now() - requestStarted,
      remoteAddress: req.ip,
    });
  });
  next();
});

const runtimeMeta = () => ({
  component: 'aiops-api',
  controlPlane: 'aiops-primary',
  ollamaMode: 'internal-first',
  startedAt: STARTED_AT_ISO,
  uptimeSeconds: Math.floor((Date.now() - startedAtMs) / 1000),
  timestamp: new Date().toISOString(),
});

app.get('/api/health', (req, res) => {
  res.status(200).json({
    ok: true,
    status: 'healthy',
    ...runtimeMeta(),
  });
});

app.get('/api/status', (req, res) => {
  res.status(200).json({
    ok: true,
    status: 'ready',
    stage: 'lean-core',
    proxyRequired: false,
    notes: [
      'AIOPS is the primary control plane for CI4 integrations.',
      'Ollama stays internal-first in this stage.',
      'DreamHost public Proxy Server for Ollama can be added later if needed.',
    ],
    ...runtimeMeta(),
  });
});

// Backward-compatible endpoints currently used by existing checks.
app.get('/health', (req, res) => res.redirect(302, '/api/health'));
app.get('/status', (req, res) => res.redirect(302, '/api/status'));

app.use((req, res) => {
  res.status(404).json({
    ok: false,
    status: 'not_found',
    ...runtimeMeta(),
    error: `Route ${req.method} ${req.originalUrl} not found`,
  });
});

const server = app.listen(PORT, HOST, () => {
  log('info', 'aiops api started', { host: HOST, port: PORT, pid: process.pid });
});

const shutdown = (signal) => {
  log('info', 'aiops api shutting down', { signal });
  server.close(() => process.exit(0));
  setTimeout(() => process.exit(0), 2000).unref();
};

process.on('SIGTERM', () => shutdown('SIGTERM'));
process.on('SIGINT', () => shutdown('SIGINT'));
process.on('uncaughtException', (err) => {
  log('error', 'uncaught exception', { error: err.message });
  process.exit(1);
});
process.on('unhandledRejection', (reason) => {
  log('error', 'unhandled rejection', { error: String(reason) });
  process.exit(1);
});

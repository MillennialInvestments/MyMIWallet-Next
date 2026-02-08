#!/usr/bin/env node
const http = require('http');

const PORT = Number(process.env.BRIDGE_PORT || 8500);
const HOST = process.env.BRIDGE_HOST || '127.0.0.1';
const STARTED_AT = new Date().toISOString();

const log = (level, message, extra = {}) => {
  const entry = {
    ts: new Date().toISOString(),
    component: 'aiops-bridge',
    level,
    message,
    ...extra,
  };
  process.stdout.write(`${JSON.stringify(entry)}\n`);
};

const server = http.createServer((req, res) => {
  if (req.url === '/health' || req.url === '/status') {
    res.writeHead(200, { 'Content-Type': 'application/json' });
    res.end(JSON.stringify({ ok: true, component: 'aiops-bridge', startedAt: STARTED_AT }));
    return;
  }

  res.writeHead(404, { 'Content-Type': 'application/json' });
  res.end(JSON.stringify({ ok: false, error: 'Not found' }));
});

server.listen(PORT, HOST, () => {
  log('info', 'bridge started', { host: HOST, port: PORT });
});

const shutdown = (signal) => {
  log('info', 'bridge shutting down', { signal });
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

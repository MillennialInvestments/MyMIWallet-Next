const http = require('http');
const { request } = require('http');

const LISTEN_HOST = '127.0.0.1';
const LISTEN_PORT = 8500;

const TARGET_HOST = '127.0.0.1';
const TARGET_PORT = 5678;

const server = http.createServer((req, res) => {
  const opts = {
    host: TARGET_HOST,
    port: TARGET_PORT,
    method: req.method,
    path: req.url,
    headers: { ...req.headers },
  };

  // Preserve original Host header for n8n routing
  opts.headers.host = req.headers.host;

  const proxyReq = request(opts, (proxyRes) => {
    res.writeHead(proxyRes.statusCode || 502, proxyRes.headers);
    proxyRes.pipe(res, { end: true });
  });

  proxyReq.on('error', (err) => {
    res.writeHead(502, { 'content-type': 'text/plain' });
    res.end('Bridge error: ' + err.message);
  });

  req.pipe(proxyReq, { end: true });
});

server.on('clientError', (err, socket) => {
  try { socket.end('HTTP/1.1 400 Bad Request\\r\\n\\r\\n'); } catch {}
});

server.listen(LISTEN_PORT, LISTEN_HOST, () => {
  console.log(`Bridge listening on http://${LISTEN_HOST}:${LISTEN_PORT} -> http://${TARGET_HOST}:${TARGET_PORT}`);
});

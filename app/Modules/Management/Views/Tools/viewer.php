<?php /** @var array<string,string>|null $csrf */ ?>
<div class="container-fluid py-3">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        <div>
            <h3 class="mb-1">Management Viewer Console</h3>
            <p class="text-muted mb-0">Preview CI views, static assets, pasted snippets, and inspect HTTP APIs in one console.</p>
        </div>
        <div class="d-flex align-items-center gap-3">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="autoRefresh">
                <label class="form-check-label" for="autoRefresh">Auto refresh (800ms)</label>
            </div>
            <div class="btn-group" role="group">
                <input type="radio" class="btn-check" name="previewMode" id="modeSafe" value="safe" checked>
                <label class="btn btn-outline-success" for="modeSafe">Safe</label>
                <input type="radio" class="btn-check" name="previewMode" id="modeTrusted" value="trusted">
                <label class="btn btn-outline-danger" for="modeTrusted">Trusted</label>
            </div>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-lg-5">
            <div class="card shadow-sm h-100">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="viewerTabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="file-tab" data-bs-toggle="tab" href="#filePane" role="tab">File Preview</a></li>
                        <li class="nav-item"><a class="nav-link" id="paste-tab" data-bs-toggle="tab" href="#pastePane" role="tab">Paste Preview</a></li>
                        <li class="nav-item"><a class="nav-link" id="api-tab" data-bs-toggle="tab" href="#apiPane" role="tab">API Inspector</a></li>
                        <li class="nav-item"><a class="nav-link" id="fmt-tab" data-bs-toggle="tab" href="#fmtPane" role="tab">Formatter</a></li>
                        <li class="nav-item"><a class="nav-link" id="snap-tab" data-bs-toggle="tab" href="#snapPane" role="tab">Snapshots</a></li>
                    </ul>
                </div>
                <div class="card-body tab-content">
                    <div class="tab-pane fade show active" id="filePane" role="tabpanel" aria-labelledby="file-tab">
                        <div class="mb-3">
                            <label class="form-label">Allowed roots</label>
                            <select class="form-select" id="rootFilter">
                                <option value="">All</option>
                                <?php foreach (($allowedRoots ?? []) as $root): ?>
                                    <option value="<?= esc($root['key']) ?>"><?= esc($root['key']) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-muted">Max file size: <?= esc(number_format($fileSizeLimit ?? 0)) ?> bytes</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">File (allowlisted)</label>
                            <select id="fileList" class="form-select">
                                <option value="">-- Select file --</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Manual path</label>
                            <input type="text" id="filePath" class="form-control" placeholder="e.g. Management/Views/Tools/viewer.php">
                            <small class="text-muted">Must be inside allowlisted roots.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Content Type</label>
                            <select id="fileContentType" class="form-select">
                                <option value="view">View</option>
                                <option value="html">HTML</option>
                                <option value="css">CSS</option>
                                <option value="js">JS</option>
                                <option value="json">JSON</option>
                                <option value="md">Markdown</option>
                                <option value="txt">Text</option>
                                <option value="php">PHP (no execution)</option>
                                <option value="sql">SQL</option>
                            </select>
                        </div>
                        <button class="btn btn-primary w-100" id="renderFileBtn">Render File</button>
                    </div>

                    <div class="tab-pane fade" id="pastePane" role="tabpanel" aria-labelledby="paste-tab">
                        <div class="mb-3">
                            <label class="form-label">Content Type</label>
                            <select id="pasteContentType" class="form-select">
                                <option value="html">HTML</option>
                                <option value="view">View</option>
                                <option value="css">CSS</option>
                                <option value="js">JS</option>
                                <option value="json">JSON</option>
                                <option value="md">Markdown</option>
                                <option value="txt">Text</option>
                                <option value="php">PHP (stripped)</option>
                                <option value="sql">SQL</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Paste content</label>
                            <textarea id="pasteContent" class="form-control" rows="8" placeholder="Paste HTML / code"></textarea>
                        </div>
                        <button class="btn btn-primary w-100" id="renderPasteBtn">Render Paste</button>
                    </div>

                    <div class="tab-pane fade" id="apiPane" role="tabpanel" aria-labelledby="api-tab">
                        <div class="row g-2">
                            <div class="col-4">
                                <label class="form-label">Method</label>
                                <select id="apiMethod" class="form-select">
                                    <option>GET</option>
                                    <option>POST</option>
                                    <option>PUT</option>
                                    <option>PATCH</option>
                                    <option>DELETE</option>
                                </select>
                            </div>
                            <div class="col-8">
                                <label class="form-label">URL</label>
                                <input type="text" id="apiUrl" class="form-control" placeholder="https://api.example.com">
                            </div>
                        </div>
                        <div class="mb-3 mt-2">
                            <label class="form-label">Headers (JSON)</label>
                            <textarea id="apiHeaders" class="form-control" rows="2" placeholder='{"Accept":"application/json"}'></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Body</label>
                            <textarea id="apiBody" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label">Auth</label>
                                <select id="apiAuth" class="form-select">
                                    <option value="none">None</option>
                                    <option value="bearer">Bearer</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Bearer Token</label>
                                <input type="text" id="apiToken" class="form-control" placeholder="Token">
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label">Timeout (ms)</label>
                                <input type="number" id="apiTimeout" class="form-control" value="5000">
                            </div>
                            <div class="col-6 d-flex align-items-center">
                                <div class="form-check mt-4">
                                    <input class="form-check-input" type="checkbox" id="apiRedirects" checked>
                                    <label class="form-check-label" for="apiRedirects">Follow redirects</label>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary w-100" id="sendApiBtn">Send Request</button>
                        <div class="mt-3">
                            <small class="text-muted">Allowed hosts: <?= esc(implode(', ', $requestHosts ?? [])) ?></small>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="fmtPane" role="tabpanel" aria-labelledby="fmt-tab">
                        <div class="mb-3">
                            <label class="form-label">Formatter Type</label>
                            <select id="fmtType" class="form-select">
                                <option value="json">JSON Pretty</option>
                                <option value="html">HTML Basic Indent</option>
                                <option value="sql">SQL Normalize</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Input</label>
                            <textarea id="fmtInput" class="form-control" rows="6"></textarea>
                        </div>
                        <button class="btn btn-primary w-100" id="formatBtn">Format</button>
                    </div>

                    <div class="tab-pane fade" id="snapPane" role="tabpanel" aria-labelledby="snap-tab">
                        <div class="mb-3">
                            <label class="form-label">Snapshot Title</label>
                            <input type="text" id="snapTitle" class="form-control" placeholder="Describe snapshot">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Load Snapshot ID</label>
                            <input type="number" id="snapId" class="form-control" placeholder="ID">
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-outline-primary" id="saveSnapshotBtn" type="button">Save Current</button>
                            <button class="btn btn-outline-secondary" id="loadSnapshotBtn" type="button">Load</button>
                        </div>
                        <div class="small text-muted mt-2">Stores content and response metadata in bf_viewer_snapshots.</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-7">
            <div class="card shadow-sm h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span class="fw-bold">Preview</span>
                    <span class="badge bg-light text-dark" id="modeLabel">Safe</span>
                </div>
                <div class="card-body p-0">
                    <iframe id="previewFrame" class="w-100 border-0" style="height:520px;" sandbox="allow-forms allow-popups allow-same-origin"></iframe>
                    <pre id="codeBlock" class="p-3 bg-light text-dark d-none" style="height:520px; overflow:auto;"></pre>
                </div>
                <div class="card-footer">
                    <div id="metaInfo" class="small text-muted">No preview yet.</div>
                </div>
            </div>
            <div class="alert mt-2 d-none" id="statusAlert"></div>
        </div>
    </div>
</div>

<input type="hidden" id="csrfName" value="<?= esc($csrf['name'] ?? csrf_token()) ?>">
<input type="hidden" id="csrfValue" value="<?= esc($csrf['hash'] ?? csrf_hash()) ?>">

<script <?= $nonce['script'] ?? '' ?>>
(() => {
    const listUrl = "<?= site_url('Management/Viewer/list'); ?>";
    const previewUrl = "<?= site_url('Management/Viewer/preview'); ?>";
    const requestUrl = "<?= site_url('Management/Viewer/request'); ?>";
    const saveSnapUrl = "<?= site_url('Management/Viewer/snapshots/save'); ?>";
    const showSnapUrl = (id) => "<?= site_url('Management/Viewer/snapshots'); ?>/" + id;

    const autoRefresh = document.getElementById('autoRefresh');
    const previewFrame = document.getElementById('previewFrame');
    const codeBlock = document.getElementById('codeBlock');
    const metaInfo = document.getElementById('metaInfo');
    const statusAlert = document.getElementById('statusAlert');
    const modeLabel = document.getElementById('modeLabel');
    const csrfName = document.getElementById('csrfName');
    const csrfValue = document.getElementById('csrfValue');

    let debounceTimer = null;
    let lastResponse = null;

    const getPreviewMode = () => document.querySelector('input[name="previewMode"]:checked')?.value ?? 'safe';
    const setModeLabel = () => modeLabel.textContent = getPreviewMode() === 'trusted' ? 'Trusted' : 'Safe';

    const setSandbox = () => {
        if (getPreviewMode() === 'safe') {
            previewFrame.setAttribute('sandbox', 'allow-forms allow-popups allow-same-origin');
        } else {
            previewFrame.removeAttribute('sandbox');
        }
    };

    const updateCsrf = (hash) => {
        if (!hash) return;
        csrfValue.value = hash;
    };

    const showStatus = (msg, type = 'info') => {
        statusAlert.className = `alert alert-${type}`;
        statusAlert.textContent = msg;
        statusAlert.classList.remove('d-none');
    };

    const clearStatus = () => statusAlert.classList.add('d-none');

    const renderMeta = (meta) => {
        if (!meta) {
            metaInfo.textContent = 'No preview yet.';
            return;
        }
        const parts = [];
        if (meta.resolved) parts.push(`Resolved: ${meta.resolved}`);
        if (meta.bytes !== undefined) parts.push(`Bytes: ${meta.bytes}`);
        if (meta.content_type) parts.push(`Type: ${meta.content_type}`);
        if (meta.preview_mode) parts.push(`Mode: ${meta.preview_mode}`);
        if (meta.warnings && meta.warnings.length) parts.push(`Warnings: ${meta.warnings.join(', ')}`);
        metaInfo.textContent = parts.join(' • ') || 'Ready';
    };

    const debounceRender = (fn) => {
        if (!autoRefresh.checked) return;
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(fn, 800);
    };

    const loadList = async () => {
        try {
            const params = new URLSearchParams();
            const root = document.getElementById('rootFilter').value;
            if (root) params.append('root', root);
            params.append('ext', 'php,html,js,css,json,md,txt,sql');
            const res = await fetch(`${listUrl}?${params.toString()}`, { credentials: 'same-origin' });
            const data = await res.json();
            if (data?.files) {
                const select = document.getElementById('fileList');
                select.innerHTML = '<option value=\"\">-- Select file --</option>';
                data.files.forEach(f => {
                    const option = document.createElement('option');
                    option.value = f.value;
                    option.textContent = `${f.label} (${f.root})`;
                    select.appendChild(option);
                });
            }
            updateCsrf(data?.csrf);
        } catch (e) {
            showStatus('Failed to load file list', 'warning');
        }
    };

    const handlePreview = async (payload) => {
        clearStatus();
        setSandbox();
        setModeLabel();
        const form = new FormData();
        Object.entries(payload).forEach(([k, v]) => form.append(k, v));
        form.append(csrfName.value, csrfValue.value);

        try {
            const res = await fetch(previewUrl, { method: 'POST', body: form, credentials: 'same-origin' });
            const data = await res.json();
            updateCsrf(data?.csrf);
            lastResponse = data;

            if (!res.ok || data.status !== 'success') {
                showStatus(data.message || 'Preview failed', 'danger');
                return;
            }

            if (data.render_type === 'iframe') {
                previewFrame.srcdoc = data.html ?? '';
                previewFrame.classList.remove('d-none');
                codeBlock.classList.add('d-none');
            } else {
                codeBlock.textContent = data.code ?? '';
                codeBlock.classList.remove('d-none');
                previewFrame.classList.add('d-none');
            }
            renderMeta(data.meta);
            showStatus('Preview updated', 'success');
        } catch (e) {
            showStatus('Preview request failed', 'danger');
            console.error(e);
        }
    };

    const renderFile = () => {
        const payload = {
            source_type: 'file',
            content_type: document.getElementById('fileContentType').value,
            preview_mode: getPreviewMode(),
            file_path: document.getElementById('fileList').value || document.getElementById('filePath').value,
            options: JSON.stringify({ strip_php: true, sandbox: true }),
        };
        handlePreview(payload);
    };

    const renderPaste = () => {
        const payload = {
            source_type: 'paste',
            content_type: document.getElementById('pasteContentType').value,
            preview_mode: getPreviewMode(),
            content: document.getElementById('pasteContent').value,
            options: JSON.stringify({ strip_php: true, sandbox: true }),
        };
        handlePreview(payload);
    };

    const sendApi = async () => {
        clearStatus();
        const form = new FormData();
        form.append('method', document.getElementById('apiMethod').value);
        form.append('url', document.getElementById('apiUrl').value);
        form.append('headers_json', document.getElementById('apiHeaders').value);
        form.append('body_raw', document.getElementById('apiBody').value);
        form.append('auth_type', document.getElementById('apiAuth').value);
        form.append('bearer_token', document.getElementById('apiToken').value);
        form.append('timeout_ms', document.getElementById('apiTimeout').value);
        form.append('follow_redirects', document.getElementById('apiRedirects').checked ? '1' : '0');
        form.append(csrfName.value, csrfValue.value);

        try {
            const res = await fetch(requestUrl, { method: 'POST', body: form, credentials: 'same-origin' });
            const data = await res.json();
            updateCsrf(data?.csrf);
            lastResponse = data;

            if (!res.ok || data.status !== 'success') {
                showStatus(data.message || 'Request failed', 'danger');
                return;
            }

            const responseBody = data.response?.pretty ?? data.response?.body ?? '';
            codeBlock.textContent = responseBody;
            codeBlock.classList.remove('d-none');
            previewFrame.classList.add('d-none');
            renderMeta({ bytes: responseBody.length, content_type: 'http', preview_mode: 'api', warnings: data.response?.truncated ? ['Body truncated'] : [] });
            showStatus(`HTTP ${data.response.status_code} in ${data.request_meta.elapsed_ms}ms`, 'success');
        } catch (e) {
            showStatus('API request failed', 'danger');
            console.error(e);
        }
    };

    const formatContent = () => {
        const type = document.getElementById('fmtType').value;
        const input = document.getElementById('fmtInput').value;
        let output = input;
        let error = null;

        if (type === 'json') {
            try {
                output = JSON.stringify(JSON.parse(input), null, 2);
            } catch (e) {
                error = 'Invalid JSON';
            }
        } else if (type === 'html') {
            output = input.replace(/></g, '>\n<');
        } else if (type === 'sql') {
            output = input.replace(/\s+/g, ' ').trim();
        }

        if (error) {
            showStatus(error, 'danger');
            return;
        }

        codeBlock.textContent = output;
        codeBlock.classList.remove('d-none');
        previewFrame.classList.add('d-none');
        renderMeta({ content_type: type, preview_mode: 'format', bytes: output.length, warnings: [] });
        showStatus('Formatted', 'success');
    };

    const saveSnapshot = async () => {
        if (!lastResponse) {
            showStatus('No preview/response to snapshot', 'warning');
            return;
        }
        const form = new FormData();
        form.append('title', document.getElementById('snapTitle').value);
        form.append('source_type', lastResponse.meta?.source_type ?? '');
        form.append('content_type', lastResponse.meta?.content_type ?? '');
        form.append('file_path', lastResponse.meta?.resolved ?? '');
        form.append('content', lastResponse.code ?? lastResponse.html ?? '');
        form.append('response_json', JSON.stringify(lastResponse));
        form.append(csrfName.value, csrfValue.value);

        try {
            const res = await fetch(saveSnapUrl, { method: 'POST', body: form, credentials: 'same-origin' });
            const data = await res.json();
            updateCsrf(data?.csrf);
            if (!res.ok || data.status !== 'success') {
                showStatus(data.message || 'Snapshot save failed', 'danger');
                return;
            }
            showStatus(`Snapshot saved (ID ${data.id})`, 'success');
        } catch (e) {
            showStatus('Snapshot save failed', 'danger');
            console.error(e);
        }
    };

    const loadSnapshot = async () => {
        const id = document.getElementById('snapId').value;
        if (!id) {
            showStatus('Enter an ID', 'warning');
            return;
        }
        try {
            const res = await fetch(showSnapUrl(id), { credentials: 'same-origin' });
            const data = await res.json();
            updateCsrf(data?.csrf);
            if (!res.ok || data.status !== 'success') {
                showStatus(data.message || 'Snapshot load failed', 'danger');
                return;
            }
            const payload = data.data || {};
            codeBlock.textContent = payload.content || '';
            codeBlock.classList.remove('d-none');
            previewFrame.classList.add('d-none');
            renderMeta({ content_type: payload.content_type, preview_mode: 'snapshot', bytes: (payload.content || '').length, warnings: [] });
            showStatus(`Loaded snapshot ${id}`, 'success');
        } catch (e) {
            showStatus('Snapshot load failed', 'danger');
            console.error(e);
        }
    };

    document.getElementById('rootFilter').addEventListener('change', () => { loadList(); debounceRender(renderFile); });
    document.getElementById('fileList').addEventListener('change', () => debounceRender(renderFile));
    document.getElementById('filePath').addEventListener('input', () => debounceRender(renderFile));
    document.getElementById('renderFileBtn').addEventListener('click', (e) => { e.preventDefault(); renderFile(); });
    document.getElementById('renderPasteBtn').addEventListener('click', (e) => { e.preventDefault(); renderPaste(); });
    document.getElementById('pasteContent').addEventListener('input', () => debounceRender(renderPaste));
    document.getElementById('pasteContentType').addEventListener('change', () => debounceRender(renderPaste));
    document.getElementById('sendApiBtn').addEventListener('click', (e) => { e.preventDefault(); sendApi(); });
    document.getElementById('formatBtn').addEventListener('click', (e) => { e.preventDefault(); formatContent(); });
    document.getElementById('saveSnapshotBtn').addEventListener('click', (e) => { e.preventDefault(); saveSnapshot(); });
    document.getElementById('loadSnapshotBtn').addEventListener('click', (e) => { e.preventDefault(); loadSnapshot(); });

    document.querySelectorAll('input[name="previewMode"]').forEach(el => {
        el.addEventListener('change', () => { setSandbox(); setModeLabel(); debounceRender(renderFile); });
    });

    setSandbox();
    setModeLabel();
    loadList();
})();
</script>

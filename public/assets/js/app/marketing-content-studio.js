(function () {
  function parseJsonSafe(value, fallback) {
    try {
      return JSON.parse(value);
    } catch (error) {
      return fallback;
    }
  }

  function updatePreview(panel, payload) {
    if (!panel || !payload) return;
    panel.querySelector('[data-preview="script"]').textContent = payload.voiceover_script || 'No script generated yet.';
    panel.querySelector('[data-preview="caption"]').textContent = payload.caption || 'No caption generated yet.';
    panel.querySelector('[data-preview="overlay"]').textContent = (parseJsonSafe(payload.overlay_text_json || '[]', []) || [])
      .map((item) => item.text || '')
      .filter(Boolean)
      .join(' | ');
    panel.querySelector('[data-preview="storyboard"]').textContent = (parseJsonSafe(payload.scene_plan_json || '[]', []) || [])
      .map((scene) => `${scene.scene}. ${scene.duration} — ${scene.text}`)
      .join('\n');
    panel.querySelector('[data-preview="adaptations"]').textContent = JSON.stringify(parseJsonSafe(payload.platform_adaptations_json || '{}', {}), null, 2);
  }

  document.addEventListener('DOMContentLoaded', function () {
    const root = document.querySelector('[data-marketing-content-studio]');
    if (!root) return;

    const form = root.querySelector('#marketingVideoGeneratorForm');
    const queue = root.querySelector('#marketingVideoQueueTable tbody');
    const previewPanel = root.querySelector('#marketingPreviewPanel');
    const outputPanel = root.querySelector('#marketingGeneratedOutputPanel');
    const templatesPanel = root.querySelector('#marketingTemplateList');
    const csrfToken = root.dataset.csrfToken || '';

    async function requestJson(url, options) {
      const response = await fetch(url, options);
      const payload = await response.json();
      if (!response.ok || payload.status === 'error') {
        throw new Error(payload.message || 'Request failed');
      }
      return payload;
    }

    async function refreshQueue() {
      const formData = new FormData(root.querySelector('#marketingQueueFilterForm'));
      const query = new URLSearchParams(formData).toString();
      const payload = await requestJson(`/API/Marketing/getVideoQueue?${query}`, { headers: { Accept: 'application/json' } });
      queue.innerHTML = payload.queue.map((item) => `
        <tr>
          <td>${item.id}</td>
          <td>${item.platform}</td>
          <td>${item.video_type}</td>
          <td>${item.title}</td>
          <td>${item.status}</td>
          <td>${item.symbol || item.topic || ''}</td>
          <td>${item.creator_editor || ''}</td>
          <td>
            <button class="btn btn-sm btn-primary" data-action="load" data-id="${item.id}">Preview</button>
            <button class="btn btn-sm btn-outline-secondary" data-action="duplicate" data-id="${item.id}">Duplicate</button>
            <button class="btn btn-sm btn-outline-success" data-action="approve" data-id="${item.id}">Approve</button>
            <button class="btn btn-sm btn-outline-dark" data-action="export" data-id="${item.id}">Export</button>
          </td>
        </tr>`).join('');
    }

    async function refreshTemplates() {
      const payload = await requestJson('/API/Marketing/getTemplates', { headers: { Accept: 'application/json' } });
      templatesPanel.innerHTML = payload.templates.map((template) => `
        <div class="border rounded p-2 mb-2 bg-light">
          <div class="d-flex justify-content-between">
            <strong>${template.template_name}</strong>
            <span class="badge bg-primary">${template.video_type}</span>
          </div>
          <div class="small text-muted mt-1">${template.platform}</div>
        </div>`).join('');
    }

    form?.addEventListener('submit', async function (event) {
      event.preventDefault();
      const payload = Object.fromEntries(new FormData(form).entries());
      payload.generated_by = root.dataset.userId || '';
      try {
        const response = await requestJson('/API/Marketing/generateVideoContent', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            Accept: 'application/json',
            'X-CSRF-TOKEN': csrfToken,
          },
          body: JSON.stringify(payload),
        });

        const content = response.content;
        outputPanel.querySelector('[name="id"]').value = content.id || '';
        ['title','platform','video_type','hook','intro_text','body_text','insight_text','cta_text','caption','hashtags','voiceover_script','thumbnail_text','promo_link','target_publish_window','status'].forEach((field) => {
          const element = outputPanel.querySelector(`[name="${field}"]`);
          if (element) element.value = content[field] || '';
        });
        outputPanel.querySelector('[name="overlay_text_json"]').value = content.overlay_text_json || '[]';
        outputPanel.querySelector('[name="scene_plan_json"]').value = content.scene_plan_json || '[]';
        outputPanel.querySelector('[name="asset_plan_json"]').value = content.asset_plan_json || '[]';
        outputPanel.querySelector('[name="platform_adaptations_json"]').value = content.platform_adaptations_json || '{}';
        updatePreview(previewPanel, content);
        await refreshQueue();
      } catch (error) {
        window.alert(error.message);
      }
    });

    outputPanel?.addEventListener('submit', async function (event) {
      event.preventDefault();
      const payload = Object.fromEntries(new FormData(outputPanel).entries());
      const id = payload.id;
      const url = id ? `/API/Marketing/updateVideoContent/${id}` : '/API/Marketing/saveVideoDraft';
      try {
        const response = await requestJson(url, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            Accept: 'application/json',
            'X-CSRF-TOKEN': csrfToken,
          },
          body: JSON.stringify(payload),
        });
        updatePreview(previewPanel, response.content);
        await refreshQueue();
      } catch (error) {
        window.alert(error.message);
      }
    });

    root.querySelector('#marketingQueueFilterForm')?.addEventListener('submit', function (event) {
      event.preventDefault();
      refreshQueue().catch((error) => window.alert(error.message));
    });

    queue?.addEventListener('click', async function (event) {
      const button = event.target.closest('button[data-action]');
      if (!button) return;
      const id = button.dataset.id;
      const action = button.dataset.action;
      try {
        if (action === 'load') {
          const payload = await requestJson(`/API/Marketing/getVideoContent/${id}`, { headers: { Accept: 'application/json' } });
          updatePreview(previewPanel, payload.content);
          return;
        }
        if (action === 'duplicate') {
          await requestJson(`/API/Marketing/duplicateVideoContent/${id}`, { method: 'POST', headers: { Accept: 'application/json', 'X-CSRF-TOKEN': csrfToken } });
        }
        if (action === 'approve') {
          await requestJson(`/API/Marketing/approveVideoContent/${id}`, { method: 'POST', headers: { Accept: 'application/json', 'X-CSRF-TOKEN': csrfToken } });
        }
        if (action === 'export') {
          const payload = await requestJson(`/API/Marketing/exportVideoPackage/${id}`, { headers: { Accept: 'application/json' } });
          window.prompt('Copy export package', payload.export.plain_text);
          return;
        }
        await refreshQueue();
      } catch (error) {
        window.alert(error.message);
      }
    });

    refreshQueue().catch(console.error);
    refreshTemplates().catch(console.error);
  });
})();

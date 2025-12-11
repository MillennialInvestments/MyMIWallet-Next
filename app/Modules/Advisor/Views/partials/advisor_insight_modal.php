<div class="modal fade" tabindex="-1" id="advisor-insight-modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">MyMI Advisor Insight</h5>
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
            </div>
            <div class="modal-body">
                <div class="summernote" id="advisor-insight-body"></div>
                <div class="mt-3 d-flex gap-2">
                    <button class="btn btn-primary" id="copy-advisor-insight">Copy to Clipboard</button>
                    <button class="btn btn-outline-primary" id="save-advisor-insight">Save to Notes</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    (function() {
        const modalEl = document.getElementById('advisor-insight-modal');
        const summernoteEl = $('#advisor-insight-body');

        const loadInsight = async (payload) => {
            const response = await fetch('/Advisor/generateInsight', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload || {}),
            });
            const json = await response.json();
            if (json?.status === 'disabled') {
                return json?.message || 'Kimi AI is disabled.';
            }

            return json?.content || json?.data?.choices?.[0]?.message?.content || 'No insight available.';
        };

        const copyToClipboard = () => {
            const content = summernoteEl.summernote('code');
            navigator.clipboard.writeText(content || '');
        };

        const saveToNotes = async () => {
            const content = summernoteEl.summernote('code');
            await fetch('/Notes/save', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ content, source: 'advisor_insight' }),
            });
        };

        const initModal = async () => {
            summernoteEl.summernote({ height: 300 });
            const userId = <?= json_encode($cuID ?? null); ?>;
            const insight = await loadInsight({ user_id: userId });
            summernoteEl.summernote('code', insight);
            $('#advisor-insight-modal').modal('show');
        };

        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('copy-advisor-insight')?.addEventListener('click', copyToClipboard);
            document.getElementById('save-advisor-insight')?.addEventListener('click', saveToNotes);
        });

        const originalDynamicModalLoader = window.dynamicModalLoader;
        if (typeof originalDynamicModalLoader === 'function') {
            window.dynamicModalLoader = (endpoint, payload) => {
                if (endpoint === '/Advisor/generateInsight') {
                    initModal(payload);
                    return;
                }

                return originalDynamicModalLoader(endpoint, payload);
            };
        }

        modalEl?.addEventListener('hidden.bs.modal', () => {
            summernoteEl.summernote('destroy');
        });
    })();
</script>

<div class="nk-block">
    <div class="card card-bordered">
        <div class="card-inner">
            <h5 class="title mb-3">AIOps Chat Ingest</h5>
            <form id="chat-admin-form" method="post" action="<?= site_url('Management/Admin/Chat/submit'); ?>">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="chatPrompt">Prompt</label>
                    <textarea class="form-control" id="chatPrompt" name="text" rows="6" placeholder="Paste directive text here..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit to aiops:ingest</button>
            </form>
            <hr>
            <div class="card bg-light mt-3">
                <div class="card-body">
                    <strong>Response Console</strong>
                    <pre id="chat-response" class="mt-2 mb-0" style="max-height: 320px; overflow:auto;"></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
(function () {
    const form = document.getElementById('chat-admin-form');
    const output = document.getElementById('chat-response');

    form.addEventListener('submit', async function (event) {
        event.preventDefault();

        const formData = new FormData(form);
        output.textContent = 'Submitting...';

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData,
                credentials: 'same-origin'
            });

            const json = await response.json();
            output.textContent = JSON.stringify(json, null, 2);
        } catch (error) {
            output.textContent = 'Request failed: ' + error.message;
        }
    });
})();
</script>

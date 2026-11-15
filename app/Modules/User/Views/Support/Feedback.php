<?php
/**
 * GT-FORM-ROUTES-001: user feedback form. Rewritten from CodeIgniter 3
 * (Template::block, $this->router, $this->config) and repointed from the
 * nonexistent User/Support/Communication_Manager to POST /Support/Manager,
 * which stores the request in bf_support_requests. The user id and email come
 * from the session on the server, never from hidden fields.
 */
$topics = ['Account', 'Assets', 'Billing', 'Development', 'Exchange', 'Investor', 'Partner', 'Security', 'Transaction'];
?>
<form class="form-horizontal" id="add_user_feedback" method="post" action="<?= esc(site_url('Support/Manager'), 'attr') ?>">
    <?= csrf_field() ?>
    <h4 class="card-title">Provide Your Feedback</h4>
    <p class="card-description">Please fill out the information below.</p>
    <hr>
    <div class="form-group row mb-2">
        <label for="topic" class="col-3 form-label">Topic</label>
        <div class="col-9">
            <select name="topic" class="form-control" id="topic" required>
                <option value="">Select an option</option>
                <?php foreach ($topics as $t): ?>
                    <option value="<?= esc($t, 'attr') ?>"><?= esc($t) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="form-group row mb-2">
        <label class="col-3 form-label" for="details">Provide Your Feedback</label>
        <div class="col-9">
            <textarea class="form-control no-resize" name="details" id="details" rows="10" minlength="5" required placeholder="Tell us what's working and what isn't"></textarea>
        </div>
    </div>
    <div class="mt-3">
        <button class="btn btn-primary" type="submit" id="addFeedbackSubmit">Submit</button>
    </div>
    <div id="feedbackResult" class="mt-3" role="status" aria-live="polite"></div>
</form>
<script <?= $nonce['script'] ?? '' ?>>
(function () {
    const form = document.querySelector('#add_user_feedback');
    if (!form) { return; }
    const out = document.querySelector('#feedbackResult');
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const btn = document.querySelector('#addFeedbackSubmit');
        btn.disabled = true;
        out.className = 'mt-3';
        out.textContent = '';
        try {
            const res = await fetch(form.action, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
                credentials: 'same-origin',
                body: JSON.stringify({
                    topic: form.topic.value || 'Feedback',
                    subject: 'Feedback',
                    details: form.details.value,
                }),
            });
            const data = await res.json().catch(() => ({}));
            out.className = 'mt-3 alert ' + (res.ok ? 'alert-success' : 'alert-danger');
            out.textContent = data.message || (res.ok ? 'Thanks for the feedback!' : 'Sorry, we could not save your feedback.');
            if (res.ok) { form.reset(); }
        } catch (err) {
            out.className = 'mt-3 alert alert-danger';
            out.textContent = 'Network error. Please try again.';
        } finally {
            btn.disabled = false;
        }
    });
})();
</script>

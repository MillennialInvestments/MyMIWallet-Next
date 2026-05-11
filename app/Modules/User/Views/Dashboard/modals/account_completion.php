<?php
$completion = is_array($accountCompletion ?? null) ? $accountCompletion : [];
$shouldDisplay = (bool) ($completion['should_display'] ?? false);
$nextAction = is_array($completion['next_action'] ?? null) ? $completion['next_action'] : [];
$checks = is_array($completion['checks'] ?? null) ? $completion['checks'] : [];
$modalId = 'accountCompletionModal';
?>
<?php if ($shouldDisplay && $nextAction !== []) : ?>
<div class="modal fade" id="<?= esc($modalId) ?>" tabindex="-1" aria-labelledby="accountCompletionModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="accountCompletionModalLabel"><?= esc((string) ($nextAction['title'] ?? 'Complete your account')) ?></h5>
                <button type="button" class="btn-close js-account-completion-dismiss" data-action="snooze" data-bs-dismiss="modal" aria-label="Remind me later"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted mb-3"><?= esc((string) ($nextAction['body'] ?? 'Finish the next account setup step.')) ?></p>
                <?php if ($checks !== []) : ?>
                    <ul class="list-group list-group-flush small mb-0">
                        <?php foreach ($checks as $check) : ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <span><?= esc((string) ($check['label'] ?? 'Setup step')) ?></span>
                                <?php if (! empty($check['complete'])) : ?>
                                    <span class="badge bg-success">Complete</span>
                                <?php else : ?>
                                    <span class="badge bg-warning text-dark">Needs attention</span>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-outline-secondary js-account-completion-dismiss" data-action="snooze" data-bs-dismiss="modal">Remind me later</button>
                <a class="btn btn-primary js-account-completion-dismiss" data-action="dismiss" href="<?= esc((string) ($nextAction['url'] ?? site_url('Dashboard')), 'attr') ?>">
                    <?= esc((string) ($nextAction['button_label'] ?? 'Continue setup')) ?>
                </a>
            </div>
        </div>
    </div>
</div>
<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', function () {
    var modalElement = document.getElementById('<?= esc($modalId) ?>');
    if (!modalElement || typeof bootstrap === 'undefined') {
        return;
    }

    var postDismiss = function (action) {
        var endpoint = <?= json_encode(site_url('Dashboard/account-completion/dismiss')) ?>;
        var csrfName = window.CSRF_TOKEN && window.CSRF_TOKEN.name ? window.CSRF_TOKEN.name : <?= json_encode(csrf_token()) ?>;
        var csrfHash = window.CSRF_TOKEN && window.CSRF_TOKEN.hash ? window.CSRF_TOKEN.hash : <?= json_encode(csrf_hash()) ?>;
        var body = new URLSearchParams();
        body.append('action', action || 'snooze');
        body.append(csrfName, csrfHash);

        fetch(endpoint, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: body.toString(),
            credentials: 'same-origin'
        }).then(function (response) {
            return response.json().catch(function () { return {}; });
        }).then(function (payload) {
            if (payload.csrf) {
                window.CSRF_TOKEN = window.CSRF_TOKEN || {};
                window.CSRF_TOKEN.hash = payload.csrf;
                var meta = document.querySelector('meta[name="' + csrfName + '"]');
                if (meta) {
                    meta.setAttribute('content', payload.csrf);
                }
            }
        }).catch(function () {
            // Persistence failures should not block the user from continuing setup.
        });
    };

    modalElement.querySelectorAll('.js-account-completion-dismiss').forEach(function (element) {
        element.addEventListener('click', function () {
            postDismiss(element.getAttribute('data-action') || 'snooze');
        });
    });

    if (!document.getElementById('onboardingWalkthroughModal')?.classList.contains('show')) {
        new bootstrap.Modal(modalElement).show();
    }
});
</script>
<?php endif; ?>

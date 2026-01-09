<?php
$progressPayload = $onboardingProgress ?? [];
$stepsPayload = $progressPayload['steps'] ?? [];
$showModal = (bool) ($onboardingShowModal ?? false);
$stepStatus = [
    'stage_a.profile' => (bool) ($stepsPayload['stage_a']['profile'] ?? false),
    'stage_a.employment' => (bool) ($stepsPayload['stage_a']['employment'] ?? false),
    'stage_b.income' => (bool) ($stepsPayload['stage_b']['income'] ?? false),
    'stage_b.credit_debt' => (bool) ($stepsPayload['stage_b']['credit_debt'] ?? false),
    'stage_b.recurring_expenses' => (bool) ($stepsPayload['stage_b']['recurring_expenses'] ?? false),
    'stage_b.watchlist' => (bool) ($stepsPayload['stage_b']['watchlist'] ?? false),
];
?>
<div class="modal fade" id="onboardingWalkthroughModal" tabindex="-1" aria-labelledby="onboardingWalkthroughLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="onboardingWalkthroughLabel">Finish your MyMI Wallet setup</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-4">
                    <div class="col-md-4">
                        <h6 class="text-muted">Steps</h6>
                        <ul class="list-group small" id="onboardingStepList">
                            <li class="list-group-item d-flex justify-content-between align-items-center" data-step-key="stage_a.profile">
                                Profile basics
                                <span class="badge bg-success" style="display: <?= $stepStatus['stage_a.profile'] ? 'inline-block' : 'none' ?>;">Done</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center" data-step-key="stage_a.employment">
                                Employment details
                                <span class="badge bg-success" style="display: <?= $stepStatus['stage_a.employment'] ? 'inline-block' : 'none' ?>;">Done</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center" data-step-key="stage_b.income">
                                Monthly income
                                <span class="badge bg-success" style="display: <?= $stepStatus['stage_b.income'] ? 'inline-block' : 'none' ?>;">Done</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center" data-step-key="stage_b.credit_debt">
                                Credit & debt
                                <span class="badge bg-success" style="display: <?= $stepStatus['stage_b.credit_debt'] ? 'inline-block' : 'none' ?>;">Done</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center" data-step-key="stage_b.recurring_expenses">
                                Recurring expenses
                                <span class="badge bg-success" style="display: <?= $stepStatus['stage_b.recurring_expenses'] ? 'inline-block' : 'none' ?>;">Done</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center" data-step-key="stage_b.watchlist">
                                Starter watchlist
                                <span class="badge bg-success" style="display: <?= $stepStatus['stage_b.watchlist'] ? 'inline-block' : 'none' ?>;">Done</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <div class="onboarding-step" data-step-index="0" data-step-key="stage_a.profile">
                            <h6>Profile setup</h6>
                            <p class="text-muted small">Tell us how to address you and how you work.</p>
                            <form method="post" action="<?= site_url('Dashboard/onboarding/profile') ?>" class="onboarding-form">
                                <?= csrf_field() ?>
                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <label class="form-label">First name</label>
                                        <input type="text" class="form-control" name="first_name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Last name</label>
                                        <input type="text" class="form-control" name="last_name" required>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Optional">
                                </div>
                                <div class="mt-3">
                                    <label class="form-label">Employment type</label>
                                    <div class="d-flex flex-column gap-2">
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" name="employment_type" value="company" required>
                                            <span class="form-check-label">Works for a company</span>
                                        </label>
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" name="employment_type" value="business">
                                            <span class="form-check-label">Owns a business</span>
                                        </label>
                                        <label class="form-check">
                                            <input class="form-check-input" type="radio" name="employment_type" value="both">
                                            <span class="form-check-label">Both</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row g-2 mt-2">
                                    <div class="col-md-6">
                                        <label class="form-label">Company name</label>
                                        <input type="text" class="form-control" name="company_name" placeholder="If applicable">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Business name</label>
                                        <input type="text" class="form-control" name="business_name" placeholder="If applicable">
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <label class="form-label">Job title</label>
                                    <input type="text" class="form-control" name="job_title" placeholder="Optional">
                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <button type="submit" class="btn btn-primary">Save & continue</button>
                                </div>
                            </form>
                        </div>

                        <div class="onboarding-step d-none" data-step-index="1" data-step-key="stage_b.income">
                            <h6>Monthly income</h6>
                            <p class="text-muted small">Add your primary income so we can prefill your budget.</p>
                            <form method="post" action="<?= site_url('Dashboard/onboarding/budget-income') ?>" class="onboarding-form">
                                <?= csrf_field() ?>
                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <label class="form-label">Monthly income</label>
                                        <input type="number" min="0" step="0.01" class="form-control" name="amount" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Source</label>
                                        <input type="text" class="form-control" name="source" placeholder="Salary, freelance, etc.">
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <label class="form-label">Label</label>
                                    <input type="text" class="form-control" name="label" placeholder="Monthly income">
                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <button type="submit" class="btn btn-primary">Save & continue</button>
                                </div>
                            </form>
                        </div>

                        <div class="onboarding-step d-none" data-step-index="2" data-step-key="stage_b.credit_debt">
                            <h6>Credit & debt overview</h6>
                            <p class="text-muted small">Add any balances so your dashboard can calculate your net position.</p>
                            <form method="post" action="<?= site_url('Dashboard/onboarding/credit-debt') ?>" class="onboarding-form">
                                <?= csrf_field() ?>
                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <label class="form-label">Credit balance</label>
                                        <input type="number" min="0" step="0.01" class="form-control" name="credit_balance" placeholder="0.00">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Debt balance</label>
                                        <input type="number" min="0" step="0.01" class="form-control" name="debt_balance" placeholder="0.00">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <button type="submit" class="btn btn-primary">Save & continue</button>
                                </div>
                            </form>
                        </div>

                        <div class="onboarding-step d-none" data-step-index="3" data-step-key="stage_b.recurring_expenses">
                            <h6>Recurring expenses</h6>
                            <p class="text-muted small">Track one recurring bill to seed your expense plan.</p>
                            <form method="post" action="<?= site_url('Dashboard/onboarding/recurring-expense') ?>" class="onboarding-form">
                                <?= csrf_field() ?>
                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <label class="form-label">Expense name</label>
                                        <input type="text" class="form-control" name="label" placeholder="Rent, utilities" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Monthly amount</label>
                                        <input type="number" min="0" step="0.01" class="form-control" name="amount" required>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <button type="submit" class="btn btn-primary">Save & continue</button>
                                </div>
                            </form>
                        </div>

                        <div class="onboarding-step d-none" data-step-index="4" data-step-key="stage_b.watchlist">
                            <h6>Starter watchlist</h6>
                            <p class="text-muted small">Add one ticker to start tracking investments.</p>
                            <form method="post" action="<?= site_url('Dashboard/onboarding/watchlist') ?>" class="onboarding-form">
                                <?= csrf_field() ?>
                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <label class="form-label">Symbol</label>
                                        <input type="text" class="form-control" name="symbol" placeholder="AAPL" required>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <button type="submit" class="btn btn-primary">Save & finish</button>
                                </div>
                            </form>
                        </div>

                        <div class="onboarding-step d-none" data-step-index="5" data-step-key="stage_b.complete">
                            <h6>You're all set!</h6>
                            <p class="text-muted small">Your onboarding checklist is complete. Explore the dashboard for deeper insights.</p>
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Start using MyMI Wallet</button>
                            </div>
                        </div>

                        <div class="alert alert-danger mt-3 d-none" id="onboardingError"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const progress = <?= json_encode($progressPayload, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;
    const csrfTokenName = <?= json_encode(csrf_token()) ?>;
    const steps = Array.from(document.querySelectorAll('.onboarding-step'));
    const stepList = document.getElementById('onboardingStepList');
    const errorBox = document.getElementById('onboardingError');

    const stepKeyStatus = (key) => {
        const stepsData = progress.steps || {};
        const [stage, item] = key.split('.');
        return Boolean(stepsData?.[stage]?.[item]);
    };

    const updateStepBadge = (key, done) => {
        const item = stepList?.querySelector(`[data-step-key="${key}"]`);
        if (!item) return;
        const badge = item.querySelector('.badge');
        if (badge) {
            badge.style.display = done ? 'inline-block' : 'none';
        }
    };

    const isProfileComplete = () => stepKeyStatus('stage_a.profile') && stepKeyStatus('stage_a.employment');

    const findFirstIncomplete = () => {
        if (!isProfileComplete()) {
            return 0;
        }
        if (!stepKeyStatus('stage_b.income')) {
            return 1;
        }
        if (!stepKeyStatus('stage_b.credit_debt')) {
            return 2;
        }
        if (!stepKeyStatus('stage_b.recurring_expenses')) {
            return 3;
        }
        if (!stepKeyStatus('stage_b.watchlist')) {
            return 4;
        }
        return 5;
    };

    const showStep = (index) => {
        steps.forEach((step, idx) => {
            step.classList.toggle('d-none', idx !== index);
        });
    };

    let currentIndex = findFirstIncomplete();
    showStep(currentIndex);

    const updateProgressState = (responseData) => {
        if (!responseData?.data?.steps) {
            return;
        }
        progress.steps = responseData.data.steps;
        Object.entries(progress.steps.stage_a || {}).forEach(([key, value]) => {
            if (key !== 'completed') {
                updateStepBadge(`stage_a.${key}`, Boolean(value));
            }
        });
        Object.entries(progress.steps.stage_b || {}).forEach(([key, value]) => {
            if (key !== 'completed') {
                updateStepBadge(`stage_b.${key}`, Boolean(value));
            }
        });
    };

    const updateCsrf = (csrf) => {
        if (!csrf) return;
        document.querySelectorAll(`input[name=\"${csrfTokenName}\"]`).forEach((input) => {
            input.value = csrf;
        });
    };

    document.querySelectorAll('.onboarding-form').forEach((form) => {
        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            errorBox.classList.add('d-none');

            const formData = new FormData(form);
            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    headers: { 'X-Requested-With': 'XMLHttpRequest' },
                    body: formData,
                });
                const payload = await response.json();
                updateCsrf(payload.csrf);

                if (!response.ok || payload.status !== 'success') {
                    errorBox.textContent = payload.message || 'Something went wrong. Please try again.';
                    errorBox.classList.remove('d-none');
                    return;
                }

                updateProgressState(payload);
                currentIndex = findFirstIncomplete();
                showStep(currentIndex);

                if (payload.data?.isComplete) {
                    showStep(5);
                }
            } catch (error) {
                errorBox.textContent = 'Unable to save this step right now.';
                errorBox.classList.remove('d-none');
            }
        });
    });

    if (<?= $showModal ? 'true' : 'false' ?>) {
        const modal = new bootstrap.Modal(document.getElementById('onboardingWalkthroughModal'));
        modal.show();
    }
});
</script>

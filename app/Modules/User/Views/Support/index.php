<!-- app/Modules/User/Views/Support/index.php -->
<?php
/** @var array $supportUser */
/** @var array $reporting */
/** @var array $nonce */
/** @var CodeIgniter\HTTP\URI $uri */

$styleNonce  = $nonce['style'] ?? '';
$scriptNonce = $nonce['script'] ?? '';
$ticketTab   = '';
$activeTab   = in_array($ticketTab, ['tickets', 'create', 'kb'], true) ? $ticketTab : 'tickets';
$supportName = $supportUser['displayName'] ?? ($supportUser['username'] ?? ($supportUser['email'] ?? 'Guest'));
?>

<style <?= $styleNonce; ?>>
    .support-shell {
        min-height: 65vh;
    }
    .support-tab-card {
        background-color: var(--bs-body-bg);
        border: 1px solid var(--bs-border-color);
        border-radius: 1rem;
        box-shadow: var(--bs-box-shadow-sm);
    }
    .support-ticket-actions {
        display: flex;
        justify-content: flex-end;
        gap: 0.5rem;
    }
    .support-stat {
        border-left: 3px solid var(--bs-primary);
        padding-left: 1rem;
    }
    .support-empty {
        padding: 3rem 1rem;
        text-align: center;
        color: var(--bs-secondary-color);
    }
    .support-message-preview {
        max-height: 10rem;
        overflow: hidden;
    }
    .support-attachment-input input[type="file"] {
        cursor: pointer;
    }
    .support-kb-results [data-support-kb="result"]:hover {
        border-color: var(--bs-primary-border-subtle);
        box-shadow: var(--bs-box-shadow);
    }
</style>

<div class="container-fluid py-4 support-shell" id="support-root">
    <div class="row justify-content-center mb-4">
        <div class="col-xl-10">
            <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3">
                <div>
                    <p class="text-uppercase text-muted small mb-1">Need a hand?</p>
                    <h1 class="h3 mb-2">Support Center</h1>
                    <p class="mb-0 text-secondary">Welcome back, <strong><?= esc($supportName); ?></strong>. Use the tabs below to review previous requests, submit a new ticket, or browse the knowledge base.</p>
                </div>
                <?php if (! empty($reporting)): ?>
                <div class="d-flex flex-wrap gap-3">
                    <div class="support-stat">
                        <span class="d-block text-uppercase text-muted small">Active Users</span>
                        <span class="fs-5 fw-semibold"><?= esc(number_format($reporting['totalActiveUsers'] ?? 0)); ?></span>
                    </div>
                    <div class="support-stat">
                        <span class="d-block text-uppercase text-muted small">Wallets Created</span>
                        <span class="fs-5 fw-semibold"><?= esc(number_format($reporting['totalWalletsCreated'] ?? 0)); ?></span>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-xl-10">
            <div class="support-tab-card p-3 p-md-4">
                <ul class="nav nav-tabs" id="supportTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link<?= $activeTab === 'tickets' ? ' active' : ''; ?>" id="support-tickets-tab" data-bs-toggle="tab" data-bs-target="#support-tickets" type="button" role="tab" aria-controls="support-tickets" aria-selected="<?= $activeTab === 'tickets' ? 'true' : 'false'; ?>">
                            My Tickets
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link<?= $activeTab === 'create' ? ' active' : ''; ?>" id="support-create-tab" data-bs-toggle="tab" data-bs-target="#support-create" type="button" role="tab" aria-controls="support-create" aria-selected="<?= $activeTab === 'create' ? 'true' : 'false'; ?>">
                            Create Ticket
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link<?= $activeTab === 'kb' ? ' active' : ''; ?>" id="support-kb-tab" data-bs-toggle="tab" data-bs-target="#support-kb" type="button" role="tab" aria-controls="support-kb" aria-selected="<?= $activeTab === 'kb' ? 'true' : 'false'; ?>">
                            Knowledge Base
                        </button>
                    </li>
                </ul>
                <div class="tab-content pt-4" id="supportTabsContent">
                    <div class="tab-pane fade<?= $activeTab === 'tickets' ? ' show active' : ''; ?>" id="support-tickets" role="tabpanel" aria-labelledby="support-tickets-tab">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                            <div class="input-group input-group-sm w-auto">
                                <label class="input-group-text" for="support-search">Search</label>
                                <input type="search" id="support-search" class="form-control" placeholder="Subject, ticket #, status" autocomplete="off">
                            </div>
                            <div class="d-flex gap-2">
                                <select class="form-select form-select-sm" id="support-filter-status">
                                    <option value="">All Statuses</option>
                                    <option value="open">Open</option>
                                    <option value="pending">Pending</option>
                                    <option value="waiting_user">Waiting on You</option>
                                    <option value="waiting_support">Waiting on Support</option>
                                    <option value="resolved">Resolved</option>
                                </select>
                                <select class="form-select form-select-sm" id="support-filter-priority">
                                    <option value="">All Priorities</option>
                                    <option value="low">Low</option>
                                    <option value="normal">Normal</option>
                                    <option value="high">High</option>
                                    <option value="urgent">Urgent</option>
                                </select>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-middle mb-0" id="support-ticket-table" data-support-ticket="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Ticket</th>
                                        <th scope="col">Updated</th>
                                        <th scope="col">Priority</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody data-support-ticket="tbody">
                                    <tr class="support-empty" data-support-ticket="empty">
                                        <td colspan="5">
                                            <div class="d-flex flex-column align-items-center">
                                                <i class="bi bi-life-preserver display-6 mb-2 text-primary"></i>
                                                <p class="mb-2">No tickets yet. When you open a ticket it will appear here with real-time updates.</p>
                                                <button class="btn btn-primary btn-sm" data-support-open="create">Open a ticket</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade<?= $activeTab === 'create' ? ' show active' : ''; ?>" id="support-create" role="tabpanel" aria-labelledby="support-create-tab">
                        <div class="row g-4">
                            <div class="col-lg-7">
                                <form id="support-ticket-form" novalidate>
                                    <?= csrf_field(); ?>
                                    <div class="mb-3">
                                        <label for="support-subject" class="form-label">Subject <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="support-subject" name="subject" maxlength="140" required placeholder="Briefly describe your request">
                                        <div class="invalid-feedback">Subject must be between 4 and 140 characters.</div>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="support-category" class="form-label">Category</label>
                                            <select id="support-category" class="form-select" name="category" required>
                                                <option value="">Choose...</option>
                                                <option value="account">Account &amp; Billing</option>
                                                <option value="wallets">Wallets</option>
                                                <option value="alerts">Alerts &amp; Signals</option>
                                                <option value="technical">Technical Issue</option>
                                                <option value="feedback">Feedback</option>
                                            </select>
                                            <div class="invalid-feedback">Select the category that best matches your issue.</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="support-priority" class="form-label">Priority</label>
                                            <select id="support-priority" class="form-select" name="priority" required>
                                                <option value="normal">Normal</option>
                                                <option value="low">Low</option>
                                                <option value="high">High</option>
                                                <option value="urgent">Urgent</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <label for="support-message" class="form-label">How can we help? <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="support-message" name="message" rows="6" minlength="20" required placeholder="Share the details, steps to reproduce, or any error codes."></textarea>
                                        <div class="invalid-feedback">Please include enough detail so we can assist quickly.</div>
                                    </div>
                                    <div class="mt-3 support-attachment-input">
                                        <label for="support-attachments" class="form-label">Attachments</label>
                                        <input class="form-control" type="file" id="support-attachments" name="attachments[]" accept=".png,.jpg,.jpeg,.pdf,.txt,.csv,.xlsx" multiple>
                                        <div class="form-text">Up to 10 MB per file. Screenshots, CSV exports, or PDFs are welcome.</div>
                                    </div>
                                    <div class="mt-4 d-flex align-items-center gap-3">
                                        <button type="submit" class="btn btn-primary">Submit Ticket</button>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="support-acknowledge" required>
                                            <label class="form-check-label" for="support-acknowledge">
                                                I confirm the information is accurate.
                                            </label>
                                        </div>
                                    </div>
                                    <div class="d-none" aria-hidden="true">
                                        <label for="support-honeypot" class="form-label">Do not fill this field</label>
                                        <input type="text" id="support-honeypot" name="website" tabindex="-1" autocomplete="off">
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-5">
                                <div class="border rounded-3 p-3 h-100 bg-light-subtle">
                                    <h2 class="h5 mb-3">What happens next?</h2>
                                    <ol class="mb-0 ps-3 small">
                                        <li class="mb-2">We send you a confirmation email with your ticket number.</li>
                                        <li class="mb-2">A support specialist reviews the details and attachments.</li>
                                        <li class="mb-2">You will receive updates via email and inside this dashboard.</li>
                                        <li class="mb-0">Need to add more info? Reply directly from your inbox or here.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade<?= $activeTab === 'kb' ? ' show active' : ''; ?>" id="support-kb" role="tabpanel" aria-labelledby="support-kb-tab">
                        <div class="row g-4">
                            <div class="col-lg-4">
                                <div class="card h-100 border-0 bg-light-subtle">
                                    <div class="card-body">
                                        <h2 class="card-title h5">Search the Knowledge Base</h2>
                                        <p class="card-text text-secondary">Browse curated walkthroughs, troubleshooting steps, and how-to articles written by our support team.</p>
                                        <form id="support-kb-search" class="mt-3" role="search">
                                            <label class="form-label" for="support-kb-query">Search keywords</label>
                                            <input type="search" class="form-control" id="support-kb-query" name="query" placeholder="e.g. Connect brokerage" autocomplete="off">
                                            <button class="btn btn-outline-primary w-100 mt-3" type="submit">Search</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <?= view('UserModule\Views\Support\partials\kb_results', ['nonce' => $nonce ?? []]); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('App\\Modules\\User\\Views\\Support\\partials\\ticket_row', ['nonce' => $nonce ?? []]); ?>
<?= view('App\\Modules\\User\\Views\\Support\\partials\\ticket_offcanvas', ['nonce' => $nonce ?? []]); ?>

<script <?= $scriptNonce; ?>>
    (() => {
        const root = document.getElementById('support-root');
        if (!root) {
            return;
        }

        const openButtons = root.querySelectorAll('[data-support-open="create"]');
        openButtons.forEach((button) => {
            button.addEventListener('click', () => {
                const createTab = document.querySelector('#support-create-tab');
                if (createTab) {
                    createTab.click();
                }
            });
        });

        const params = new URLSearchParams(window.location.search);
        if (params.get('open') === 'new-ticket') {
            const createTab = document.querySelector('#support-create-tab');
            if (createTab) {
                createTab.click();
            }
        }
    })();
</script>
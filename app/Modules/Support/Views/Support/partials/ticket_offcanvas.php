<?php
/** @var array $nonce */
$styleNonce  = $nonce['style'] ?? '';
?>

<style <?= $styleNonce; ?>>
    .support-offcanvas-header {
        border-bottom: 1px solid var(--bs-border-color);
        padding-bottom: 1rem;
    }
    .support-offcanvas-meta {
        font-size: 0.875rem;
        color: var(--bs-secondary-color);
    }
    .support-message-item {
        border-left: 3px solid transparent;
        transition: border-color 0.2s ease;
    }
    .support-message-item[data-author="user"] {
        border-color: var(--bs-primary);
    }
    .support-message-body {
        white-space: pre-wrap;
    }
    .support-message-attachments a {
        word-break: break-all;
    }
</style>

<div class="offcanvas offcanvas-end" tabindex="-1" id="support-ticket-viewer" aria-labelledby="support-ticket-viewer-label" data-support-ticket="viewer">
    <div class="offcanvas-header support-offcanvas-header">
        <div>
            <p class="text-uppercase text-muted small mb-1">Ticket</p>
            <h2 class="h5 mb-1" id="support-ticket-viewer-label" data-support-field="subject">Loading ticket…</h2>
            <div class="d-flex flex-wrap align-items-center gap-2 support-offcanvas-meta">
                <span data-support-field="ticketNumber">#0000</span>
                <span class="vr"></span>
                <span data-support-field="status" class="badge text-bg-secondary">Status</span>
                <span data-support-field="priority" class="badge text-bg-light">Priority</span>
                <span data-support-field="updatedAt">Updated just now</span>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column gap-4">
        <section>
            <h3 class="h6 text-uppercase text-muted mb-3">Summary</h3>
            <dl class="row mb-0 support-offcanvas-meta" data-support-ticket="summary">
                <dt class="col-4">Category</dt>
                <dd class="col-8" data-support-field="category">—</dd>
                <dt class="col-4">Opened</dt>
                <dd class="col-8" data-support-field="createdAt">—</dd>
                <dt class="col-4">SLA Due</dt>
                <dd class="col-8" data-support-field="slaDue">—</dd>
            </dl>
        </section>
        <section class="flex-grow-1 d-flex flex-column gap-3" aria-live="polite">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="h6 text-uppercase text-muted mb-0">Conversation</h3>
                <button type="button" class="btn btn-sm btn-outline-primary" data-support-ticket="reply">Reply</button>
            </div>
            <div class="d-flex flex-column gap-3" data-support-ticket="messages">
                <div class="text-center text-secondary py-5" data-support-ticket="empty">No messages yet.</div>
            </div>
        </section>
        <section>
            <h3 class="h6 text-uppercase text-muted mb-3">Internal Notes</h3>
            <div class="form-floating">
                <textarea class="form-control" placeholder="Add a quick note" id="support-ticket-note" data-support-ticket="note" style="height: 120px;"></textarea>
                <label for="support-ticket-note">Add an internal note (visible only to support staff)</label>
            </div>
        </section>
    </div>
</div>

<template id="support-message-template">
    <article class="support-message-item card border-0 shadow-sm" data-author="user">
        <div class="card-body d-flex flex-column gap-2">
            <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                <div>
                    <h4 class="h6 mb-1" data-field="author">Author</h4>
                    <p class="mb-0 small text-secondary" data-field="timestamp">Just now</p>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="badge text-bg-primary" data-field="origin">Portal</span>
                </div>
            </div>
            <div class="support-message-body" data-field="body">Message content</div>
            <div class="support-message-attachments d-flex flex-column gap-1" data-field="attachments"></div>
        </div>
    </article>
</template>

<template id="support-attachment-template">
    <a class="btn btn-outline-secondary btn-sm text-start" href="#" target="_blank" rel="noopener" data-field="url">
        <i class="bi bi-paperclip me-2"></i>
        <span data-field="filename">Attachment</span>
        <span class="ms-2 text-secondary" data-field="filesize">(0 KB)</span>
    </a>
</template>
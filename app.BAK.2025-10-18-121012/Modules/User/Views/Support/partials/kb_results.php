<?php
/** @var array $nonce */
?>

<div id="support-kb-results" class="support-kb-results d-flex flex-column gap-3" aria-live="polite" data-support-kb="results">
    <div class="support-empty border rounded-3" data-support-kb="empty">
        <p class="mb-2">Try searching for topics like “Budgeting rules” or “Wallet syncing”.</p>
        <button class="btn btn-link" data-support-open="create">Still need help? Open a ticket.</button>
    </div>
</div>

<template id="support-kb-result-template">
    <article class="card border-0 shadow-sm" data-support-kb="result">
        <div class="card-body d-flex flex-column gap-2">
            <div class="d-flex justify-content-between flex-wrap gap-2">
                <h3 class="h6 mb-0" data-field="title">Article Title</h3>
                <span class="badge text-bg-secondary" data-field="category">Category</span>
            </div>
            <p class="mb-0 text-secondary" data-field="excerpt">A short excerpt from the knowledge base article will appear here.</p>
            <div class="d-flex flex-wrap gap-2">
                <a class="btn btn-sm btn-outline-primary" href="#" target="_blank" rel="noopener" data-field="url">Read Article</a>
                <button class="btn btn-sm btn-link" type="button" data-field="feedback-positive">This was helpful</button>
                <button class="btn btn-sm btn-link text-decoration-underline" type="button" data-field="feedback-negative">Needs more detail</button>
            </div>
        </div>
    </article>
</template>
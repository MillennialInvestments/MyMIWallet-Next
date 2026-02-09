<div class="nk-content-body">
    <h3>Draft Editor</h3>
    <textarea id="draft_html" style="width:100%;height:320px;"><?= esc((string) ($draft['draft_html'] ?? '')) ?></textarea>
    <div class="mt-2">
        <button class="btn btn-primary" onclick="saveDraft()">Save</button>
        <button class="btn btn-success" onclick="approveDraft()">Approve & Publish</button>
        <button class="btn btn-danger" onclick="rejectDraft()">Reject</button>
    </div>
</div>

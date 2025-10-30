<!-- app/Modules/Management/Views/Email/modals/previewQueuedEmail.php -->

<div class="modal-header">
    <h5 class="modal-title">📧 Email Preview</h5>
</div>
<div class="modal-body">
    <div class="mb-3">
        <strong>Email:</strong> <?= esc($email['email']) ?>
    </div>
    <div class="mb-3">
        <strong>Subject:</strong> <?= esc($email['subject']) ?>
    </div>
    <div class="mb-3">
        <strong>Content:</strong>
        <div class="border p-3 rounded" style="background-color: #f9f9f9;">
            <?= $email['content'] ?>
        </div>
    </div>
</div>

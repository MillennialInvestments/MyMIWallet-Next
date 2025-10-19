<div class="modal-header">
    <h5 class="modal-title">👁️ View Campaign Step</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<div class="modal-body">
    <p><strong>Step #:</strong> <?= $step['step_number'] ?></p>
    <p><strong>Name:</strong> <?= esc($step['name']) ?></p>
    <p><strong>Subject:</strong> <?= esc($step['subject']) ?></p>
    <p><strong>Delay:</strong> <?= $step['delay_days'] ?> days / <?= $step['delay_hours'] ?> hrs</p>
    <p><strong>View File:</strong> <?= esc($step['view_file']) ?></p>
</div>

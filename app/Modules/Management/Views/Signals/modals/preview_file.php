<div class="modal-header">
  <h5 class="modal-title">Preview: <?= esc($file['file_name'] ?? '') ?></h5>
  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">
  <div class="mb-2 text-muted small">
    Category: <b><?= esc($file['category'] ?? '') ?></b> · Type: <b><?= esc($file['signal_type'] ?? '') ?></b><br>
    Path: <code><?= esc($file['file_path'] ?? '') ?></code>
  </div>

  <div class="table-responsive">
    <table class="table table-sm table-striped">
      <thead>
        <tr>
          <?php foreach (($header ?? []) as $h): ?>
            <th><?= esc($h) ?></th>
          <?php endforeach; ?>
        </tr>
      </thead>
      <tbody>
        <?php foreach (($rows ?? []) as $r): ?>
          <tr>
            <?php foreach ($r as $cell): ?>
              <td><?= esc($cell) ?></td>
            <?php endforeach; ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <small class="text-muted">Showing first 50 rows.</small>
</div>

<div class="modal-footer">
  <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
</div>

<?php foreach ($scrapedEmails as $email): ?>
  <div class="card mb-3">
    <div class="card-body">
      <h5><?= esc($email['title']) ?></h5>
      <p><?= character_limiter(strip_tags($email['content']), 300) ?></p>
      <form action="<?= site_url('Marketing/GenerateFromSimilar/' . $email['id']) ?>" method="post">
        <button class="btn btn-primary">🧠 Generate Summary</button>
      </form>
      <?php if (!empty($email['force_allowed'])): ?>
      <form action="<?= site_url('Marketing/ForceGenerateFromTemp/' . $email['id']) ?>" method="post">
        <button class="btn btn-warning mt-2">⚠️ Force Generate</button>
      </form>
      <?php endif; ?>
    </div>
  </div>
<?php endforeach; ?>

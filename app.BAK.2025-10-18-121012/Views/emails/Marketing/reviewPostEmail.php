<!-- app/Views/emails/reviewPostEmail.php -->
<?php ob_start(); ?>
<h2>📢 Review &amp; Approve Campaign Content</h2>
<p><strong>Title:</strong> <?= esc($post['title'] ?? '') ?></p>
<p><?= nl2br(esc($post['summary'] ?? '')) ?></p>
<a href="<?= site_url('Marketing/approveBufferItem/' . ($post['id'] ?? 0)) ?>" style="background:green;color:white;padding:10px;">✅ Approve</a>
<a href="<?= site_url('Marketing/rejectBufferItem/' . ($post['id'] ?? 0)) ?>" style="background:red;color:white;padding:10px;margin-left:10px;">❌ Reject</a>
<hr>
<ul>
  <li><a href="https://discord.gg/your-server">Join Discord</a></li>
  <li><a href="https://blog.mymiwallet.com">Visit Blog</a></li>
  <li><a href="https://zapier.com/apps/mymi-wallet/integrations">Zapier Tools</a></li>
</ul>
<?php $content = ob_get_clean(); ?>
<?= view('emails/layout', ['content' => $content, 'siteSettings' => $siteSettings ?? null, 'socialMedia' => $socialMedia ?? null]) ?>
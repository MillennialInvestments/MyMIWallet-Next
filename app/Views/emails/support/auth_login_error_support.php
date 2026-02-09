<p>Auth exception ticket created.</p>
<p><strong>Ticket ID:</strong> #<?= esc($ticket_id ?? '') ?></p>
<p><strong>Email:</strong> <?= esc($email_entered ?? 'n/a') ?></p>
<p><strong>User ID:</strong> <?= esc((string) ($user_id ?? 'n/a')) ?></p>
<p><strong>IP:</strong> <?= esc($ip_address ?? 'n/a') ?></p>
<p><strong>User Agent:</strong> <?= esc(mb_substr((string) ($user_agent ?? ''), 0, 180)) ?></p>
<p><strong>Error:</strong> <?= esc($error_message ?? 'unknown') ?></p>

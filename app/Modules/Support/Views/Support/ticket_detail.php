<h2>Support Ticket #<?= esc($ticket['id']) ?></h2>
<p><strong>Status:</strong> <?= esc($ticket['status']) ?></p>
<p><strong>Subject:</strong> <?= esc($ticket['subject']) ?></p>
<p><strong>Message:</strong> <?= esc($ticket['message']) ?></p>

<h3>Events</h3>
<ul>
    <?php foreach ($events as $event): ?>
        <li>
            <strong><?= esc($event['event_type']) ?></strong>
            at <?= esc($event['created_at']) ?>
        </li>
    <?php endforeach; ?>
</ul>

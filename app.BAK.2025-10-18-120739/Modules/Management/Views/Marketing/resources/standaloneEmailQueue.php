<!-- File: app/Views/newsletter/queue.php -->

<div class="container mt-5">
    <h2 class="text-center mb-4">Email Queue</h2>
    <table class="table table-striped shadow-sm">
        <thead class="table-dark">
            <tr>
                <th scope="col">Subject</th>
                <th scope="col">Scheduled Send Time</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($queuedEmails as $email): ?>
                <tr>
                    <td><?= esc($email->subject) ?></td>
                    <td><?= esc($email->send_time) ?></td>
                    <td>
                        <span class="badge <?= $email->status == 'queued' ? 'bg-warning' : ($email->status == 'sent' ? 'bg-success' : 'bg-danger') ?>">
                            <?= ucfirst($email->status) ?>
                        </span>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

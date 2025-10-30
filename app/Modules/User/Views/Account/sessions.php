<?php
// PATCH: session management view
?>
<table class="table">
    <thead>
        <tr><th>User Agent</th><th>IP</th><th>Last Seen</th><th></th></tr>
    </thead>
    <tbody>
    <?php foreach ($sessions as $s): ?>
        <tr>
            <td><?= esc($s['user_agent']) ?></td>
            <td><?= esc($s['ip_address']) ?></td>
            <td><?= esc($s['last_seen']) ?></td>
            <td>
                <?php if ($s['session_id'] !== session_id()): ?>
                <button class="btn btn-sm btn-danger revoke" data-sid="<?= esc($s['session_id']) ?>">Revoke</button>
                <?php else: ?>
                <span class="badge bg-primary">Current</span>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script <?= $nonce['script'] ?? '' ?>>
// rotate CSRF automatically
const tokenName = '<?= csrf_token() ?>';
document.querySelectorAll('.revoke').forEach(btn => {
    btn.addEventListener('click', async () => {
        const sid = btn.dataset.sid;
        const res = await fetch(`/Account/sessions/revoke/${sid}`, {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': document.cookie.match(/csrf_cookie_name=([^;]+)/)[1] },
        });
        const data = await res.json();
        if (data.status === 'success') location.reload();
        else alert(data.message);
    });
});
</script>

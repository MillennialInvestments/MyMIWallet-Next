<div class="nk-content-body">
    <div class="nk-block-head nk-block-head-sm"><h3 class="nk-block-title page-title">Public Pages</h3></div>
    <table id="public-pages-table" class="table table-striped">
        <thead><tr><th>Page ID</th><th>Slug</th><th>Title</th><th>Status</th><th>Next Run</th><th>Actions</th></tr></thead>
        <tbody>
        <?php foreach (($pages ?? []) as $p): ?>
            <tr>
                <td><?= esc($p['page_id']) ?></td><td><?= esc($p['slug']) ?></td><td><?= esc($p['title']) ?></td><td><?= esc($p['status']) ?></td><td><?= esc((string) $p['next_run_at']) ?></td>
                <td>
                    <button class="btn btn-sm btn-primary" onclick="generateNow('<?= esc($p['page_id']) ?>')">Generate Now</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>
function generateNow(pageId){fetch('<?= site_url('Management/PublicPages/ajaxGenerateNow') ?>/'+encodeURIComponent(pageId),{method:'POST'}).then(()=>location.reload());}
</script>

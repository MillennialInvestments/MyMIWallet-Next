<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyMI Wallet | Maintenance</title>
    <style>
        :root {
            color-scheme: light dark;
            --brand:#0ea5e9;
            --bg:#0f172a;
            --card:#111827;
            --text:#e5e7eb;
            --muted:#94a3b8;
        }
        body { margin:0; font-family:Inter,system-ui,-apple-system,sans-serif; background:linear-gradient(160deg,#020617,#0f172a 40%,#0b1120); color:var(--text); }
        .wrap { max-width:1024px; margin:0 auto; padding:2rem 1rem 3rem; }
        .hero, .card { background:rgba(17,24,39,.85); border:1px solid rgba(148,163,184,.2); border-radius:16px; padding:1.25rem; margin-bottom:1rem; }
        h1,h2,h3 { margin:.25rem 0 .75rem; }
        .pill { display:inline-block; padding:.3rem .7rem; border-radius:999px; background:rgba(14,165,233,.15); color:#7dd3fc; font-size:.85rem; }
        .muted { color:var(--muted); }
        .grid { display:grid; gap:1rem; grid-template-columns:repeat(auto-fit,minmax(240px,1fr)); }
        ul { margin:.5rem 0 0 1rem; }
        .brands { display:flex; flex-wrap:wrap; gap:.5rem; margin-top:.75rem; }
        .brand { border:1px solid rgba(14,165,233,.35); border-radius:10px; padding:.4rem .65rem; color:#bae6fd; background:rgba(14,165,233,.08); }
        .admin { border-color:#22c55e; background:rgba(34,197,94,.12); color:#bbf7d0; }
    </style>
</head>
<body>
<div class="wrap">
    <?php if (!empty($maintenanceMode) && !empty($isAdmin)): ?>
        <div class="hero admin">
            <strong>Admin Notice:</strong> Maintenance mode is currently enabled. Public users are being redirected to this page.
        </div>
    <?php endif; ?>

    <section class="hero">
        <span class="pill">Service Status</span>
        <h1><?= esc($maintenanceMessage ?? 'We’re performing scheduled maintenance.') ?></h1>
        <p class="muted">We’ll be right back. Our team is making improvements to keep MyMI Wallet secure, fast, and reliable.</p>
        <?php if (!empty($maintenanceEta)): ?>
            <p><strong>Estimated return:</strong> <?= esc($maintenanceEta) ?></p>
        <?php endif; ?>

        <div class="brands">
            <span class="brand">MyMI Wallet</span>
            <span class="brand">Investor’s Talk</span>
            <span class="brand">MyMI Alerts</span>
            <span class="brand">MyMI Marketing</span>
            <span class="brand">MyMI Digital Investment Trust (MDIT)</span>
            <span class="brand">Community & Discord</span>
        </div>
    </section>

    <section class="grid">
        <?php foreach ($sections as $name => $section): ?>
            <article class="card">
                <h2><?= esc(ucfirst((string) $name)) ?></h2>
                <?php if (!empty($section['summary'])): ?>
                    <p class="muted"><?= esc($section['summary']) ?></p>
                <?php endif; ?>

                <?php if (!empty($section['headings'])): ?>
                    <h3>Highlights</h3>
                    <ul>
                        <?php foreach ($section['headings'] as $heading): ?>
                            <li><?= esc($heading) ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <?php if (!empty($section['bullets'])): ?>
                    <h3>Feature Bullets</h3>
                    <ul>
                        <?php foreach ($section['bullets'] as $bullet): ?>
                            <li><?= esc($bullet) ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </article>
        <?php endforeach; ?>
    </section>
</div>
</body>
</html>

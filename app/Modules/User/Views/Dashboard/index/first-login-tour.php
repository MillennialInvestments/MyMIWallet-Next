<?php
/**
 * First-login how-to tour (App\Libraries\Onboarding\FirstLoginTour).
 * Opens by itself once per member; the "Take the tour" button replays it.
 *
 * @var array<string,mixed>       $firstLoginTour
 * @var list<array<string,mixed>> $firstLoginTourSlides
 */
$tourState = is_array($firstLoginTour ?? null) ? $firstLoginTour : [];
$tourSlides = is_array($firstLoginTourSlides ?? null) ? array_values($firstLoginTourSlides) : [];
$tourAutoOpen = ! empty($tourState['show']) && $tourSlides !== [];
$tourName = trim((string) ($tourDisplayName ?? ''));
$tourCount = count($tourSlides);
if ($tourCount === 0) {
    return;
}
?>
<div class="modal fade" id="firstLoginTourModal" tabindex="-1" aria-labelledby="firstLoginTourTitle" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 pb-0">
                <div class="w-100">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="small text-soft" id="firstLoginTourCounter" aria-live="polite">Step 1 of <?= $tourCount ?></span>
                        <button type="button" class="btn-close" data-tour-action="skip" aria-label="Skip tour"></button>
                    </div>
                    <div class="progress" style="height: 4px;" aria-hidden="true">
                        <div class="progress-bar" id="firstLoginTourBar" role="progressbar" style="width: <?= (int) round(100 / $tourCount) ?>%;"></div>
                    </div>
                </div>
            </div>
            <div class="modal-body px-4 px-md-5 py-4">
                <?php foreach ($tourSlides as $i => $slide): ?>
                    <?php
                    $title = (string) ($slide['title'] ?? '');
                    if (($slide['key'] ?? '') === 'welcome' && $tourName !== '') {
                        $title = 'Welcome to MyMI Wallet, ' . $tourName;
                    }
                    $steps = is_array($slide['steps'] ?? null) ? $slide['steps'] : [];
                    $moves = is_array($slide['moves'] ?? null) ? $slide['moves'] : [];
                    $cta = is_array($slide['cta'] ?? null) ? $slide['cta'] : null;
                    ?>
                    <section class="first-login-tour-slide<?= $i === 0 ? '' : ' d-none' ?>" data-tour-slide="<?= esc((string) ($slide['key'] ?? $i), 'attr') ?>" data-tour-module="<?= esc((string) ($slide['module'] ?? ''), 'attr') ?>" aria-roledescription="slide">
                        <div class="d-flex align-items-center mb-3 mt-2" style="gap: 1rem;">
                            <span class="d-inline-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-primary-dim text-primary" style="width: 56px; height: 56px; font-size: 1.75rem;">
                                <em class="icon ni <?= esc((string) ($slide['icon'] ?? 'ni-info'), 'attr') ?>"></em>
                            </span>
                            <div>
                                <div class="overline-title text-primary mb-1"><?= esc((string) ($slide['eyebrow'] ?? '')) ?></div>
                                <h4 class="mb-0"<?= $i === 0 ? ' id="firstLoginTourTitle"' : '' ?>><?= esc($title) ?></h4>
                            </div>
                        </div>
                        <?php if (! empty($slide['body'])): ?>
                            <p class="text-soft mb-3" style="font-size: 1rem; line-height: 1.6;"><?= esc((string) $slide['body']) ?></p>
                        <?php endif; ?>
                        <?php if ($steps !== []): ?>
                            <div class="mb-3" role="list">
                                <?php foreach ($steps as $n => $step): ?>
                                    <div class="d-flex align-items-start mb-2" role="listitem" style="gap: 1rem; line-height: 1.5;">
                                        <span class="badge rounded-pill bg-primary flex-shrink-0" style="margin-top: 2px;"><?= $n + 1 ?></span>
                                        <span><?= esc((string) $step) ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($moves !== []): ?>
                            <div class="row g-3 mb-3">
                                <?php foreach ($moves as $move): ?>
                                    <div class="col-sm-<?= count($moves) >= 3 ? '4' : '6' ?>">
                                        <a class="card card-bordered h-100 text-decoration-none" href="<?= esc(site_url((string) $move['url'])) ?>" data-tour-action="go">
                                            <div class="card-inner text-center">
                                                <em class="icon ni <?= esc((string) $move['icon'], 'attr') ?> text-primary" style="font-size: 1.75rem;"></em>
                                                <div class="mt-2 fw-bold"><?= esc((string) $move['label']) ?></div>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (! empty($slide['tip'])): ?>
                            <div class="alert alert-light border small mb-3">
                                <em class="icon ni ni-bulb text-warning me-1"></em><?= esc((string) $slide['tip']) ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($cta !== null): ?>
                            <a class="link link-primary small" href="<?= esc(site_url((string) $cta['url'])) ?>" data-tour-action="go">
                                <?= esc((string) $cta['label']) ?> <em class="icon ni ni-arrow-right"></em>
                            </a>
                        <?php endif; ?>
                    </section>
                <?php endforeach; ?>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-link text-soft px-0" data-tour-action="skip" id="firstLoginTourSkip">Skip tour</button>
                <div class="d-flex" style="gap: .5rem;">
                    <button type="button" class="btn btn-outline-light" data-tour-action="back" id="firstLoginTourBack" disabled>Back</button>
                    <button type="button" class="btn btn-primary" data-tour-action="next" id="firstLoginTourNext">Next</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script <?= $nonce['script'] ?? '' ?>>
// Read by the setup walkthrough and the daily news modal so they wait their turn.
window.MyMIFirstLoginTour = { autoOpen: <?= $tourAutoOpen ? 'true' : 'false' ?>, closed: false };
document.addEventListener('DOMContentLoaded', () => {
    const el = document.getElementById('firstLoginTourModal');
    if (!el || typeof bootstrap === 'undefined') {
        window.MyMIFirstLoginTour.closed = true;
        document.dispatchEvent(new CustomEvent('mymi:first-login-tour-closed'));
        return;
    }

    // Move modal directly to <body> so .modal-backdrop never renders on top of it
    if (el.parentElement !== document.body) {
        document.body.appendChild(el);
    }

    const endpoint = <?= json_encode(site_url('Dashboard/onboarding/tour/complete')) ?>;
    const csrfName = <?= json_encode(csrf_token()) ?>;
    let csrfHash = <?= json_encode(csrf_hash()) ?>;
    const slides = Array.from(el.querySelectorAll('[data-tour-slide]'));
    const counter = document.getElementById('firstLoginTourCounter');
    const bar = document.getElementById('firstLoginTourBar');
    const back = document.getElementById('firstLoginTourBack');
    const next = document.getElementById('firstLoginTourNext');
    const skip = document.getElementById('firstLoginTourSkip');
    const modal = bootstrap.Modal.getOrCreateInstance(el);
    let index = 0;
    let saved = false;

    const show = (i) => {
        index = Math.max(0, Math.min(slides.length - 1, i));
        slides.forEach((s, n) => s.classList.toggle('d-none', n !== index));
        counter.textContent = 'Step ' + (index + 1) + ' of ' + slides.length;
        bar.style.width = Math.round(((index + 1) / slides.length) * 100) + '%';
        back.disabled = index === 0;
        const last = index === slides.length - 1;
        next.textContent = last ? 'Finish' : 'Next';
        skip.classList.toggle('invisible', last);
    };

    const save = (action) => {
        if (saved) {
            return Promise.resolve();
        }
        saved = true;
        const body = new URLSearchParams();
        body.append('action', action);
        body.append(csrfName, csrfHash);
        return fetch(endpoint, {
            method: 'POST',
            credentials: 'same-origin',
            keepalive: true,
            headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8', 'X-Requested-With': 'XMLHttpRequest' },
            body: body.toString(),
        }).then((r) => r.json()).then((payload) => {
            if (payload && payload.csrf) {
                csrfHash = payload.csrf;
            }
        }).catch(() => {});
    };

    el.addEventListener('click', (event) => {
        const target = event.target.closest('[data-tour-action]');
        if (!target) {
            return;
        }
        const action = target.getAttribute('data-tour-action');
        if (action === 'next') {
            if (index === slides.length - 1) {
                save('completed');
                modal.hide();
            } else {
                show(index + 1);
            }
        } else if (action === 'back') {
            show(index - 1);
        } else if (action === 'skip') {
            save('skipped');
            modal.hide();
        } else if (action === 'go') {
            event.preventDefault();
            const href = target.getAttribute('href');
            save('completed').finally(() => { window.location.href = href; });
        }
    });

    el.addEventListener('keydown', (event) => {
        if (event.key === 'ArrowRight' && index < slides.length - 1) {
            show(index + 1);
        } else if (event.key === 'ArrowLeft') {
            show(index - 1);
        } else if (event.key === 'Escape') {
            save('skipped');
            modal.hide();
        }
    });

    el.addEventListener('hidden.bs.modal', () => {
        if (!window.MyMIFirstLoginTour.closed) {
            window.MyMIFirstLoginTour.closed = true;
            document.dispatchEvent(new CustomEvent('mymi:first-login-tour-closed'));
        }
    });

    document.querySelectorAll('[data-first-login-tour-open]').forEach((button) => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            saved = false;
            show(0);
            modal.show();
        });
    });

    if (window.MyMIFirstLoginTour.autoOpen) {
        show(0);
        modal.show();
    } else {
        window.MyMIFirstLoginTour.closed = true;
    }
});
</script>

<?php // app/Views/themes/public/landing.php (partial view, no extend/section) ?>
<?php $cspNonce = $cspNonce ?? (service('renderer')->getData('cspNonce') ?? ''); ?>

<style nonce="<?= esc($cspNonce) ?>">
  .hero {padding: 4rem 0; text-align:center;}
  .hero h1 {font-size: 2.25rem; margin: 0 0 .5rem;}
  .muted {color:#6b7280}
  .cta {display:flex; gap:.75rem; justify-content:center; flex-wrap:wrap;}
  .cta a {padding:.75rem 1rem; border-radius:8px; border:1px solid #1F48AF; text-decoration:none}
  .cta a.primary {background:#1F48AF; color:#fff; border-color:#1F48AF;}
  .subscribe {text-align:center}
  .subscribe__form {display:inline-flex;gap:.5rem;flex-wrap:wrap;justify-content:center;}
  .subscribe__input {padding:.75rem;border-radius:8px;border:1px solid #d1d5db;min-width:260px;}
  .subscribe__button {padding:.75rem 1rem;border-radius:8px;border:1px solid #1F48AF;background:#1F48AF;color:#fff;}
</style>

<section class="hero">
  <h1><?= esc($pageTitle ?? 'MyMI Wallet — The Future of Finance') ?></h1>
  <p class="muted">Budgeting & investments, alerts, and tokenized assets. Join the build.</p>
  <div class="cta">
    <a class="primary" href="/register">Create Account</a>
    <a href="/login">Sign In</a>
    <a href="#subscribe">Subscribe</a>
  </div>
</section>

<section id="subscribe" class="subscribe">
  <form method="post" action="/newsletter/subscribe" class="subscribe__form">
    <?= csrf_field() ?>
    <input type="email" name="email" placeholder="you@example.com" required class="subscribe__input">
    <button type="submit" class="subscribe__button">
      Notify me
    </button>
  </form>
</section>

<script nonce="<?= esc($cspNonce) ?>">
  // optional page JS
</script>

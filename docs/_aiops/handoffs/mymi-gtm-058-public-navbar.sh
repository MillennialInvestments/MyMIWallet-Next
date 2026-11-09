#!/usr/bin/env bash
# Preview the tested public navbar fix from its existing AIOps worktree.
# Use --patch to print the candidate or --handoff to print the AIOps task.
set -u
set -o pipefail

branch=feature/mymi-gtm-058-public-navbar-collapse-20261103

stop() {
    printf 'STOP: %s\n' "$*" >&2
    exit 2
}

emit_patch() {
    cat <<'MYMI_PUBLIC_NAVBAR_PATCH'
diff --git a/app/Views/themes/public/layouts/_sitenav.php b/app/Views/themes/public/layouts/_sitenav.php
index b0561db4..e10a4789 100644
--- a/app/Views/themes/public/layouts/_sitenav.php
+++ b/app/Views/themes/public/layouts/_sitenav.php
@@ -5,7 +5,7 @@ $authUser = null;
 $authUserId = null;
 
 $homeUrl = site_url('/');
-$featuresUrl = site_url('#features');
+$featuresUrl = $homeUrl . '#features';
 $supportUrl = site_url('Support');
 $dashboardUrl = site_url('/Dashboard');
 $loginUrl = site_url('login');
@@ -14,34 +14,33 @@ $brandImage = base_url('assets/images/MyMI-Wallet-Logo-White.png');
 $brandAlt = 'MyMI Wallet - Investment Accounting/Analytical Software & Crypto Asset Marketplace/Exchange';
 ?>
 
-<!-- <nav class="intro-navbar navbar navbar-expand-lg navbar-dark bg-dark intro-navbar"> -->
-<nav class="intro-navbar navbar navbar-expand-lg intro-navbar fixed-top">
-  <div class="container container-fluid w-80 px-5">
+<nav class="intro-navbar navbar navbar-expand-lg navbar-dark fixed-top" aria-label="Main navigation">
+  <div class="container px-3 px-lg-4">
     <a class="navbar-brand d-flex align-items-center" href="<?= $homeUrl ?>">
       <img class="logo-img logo-dark img-fluid"
            src="<?= esc($brandImage) ?>" srcset="<?= esc($brandImage) ?>"
            alt="<?= esc($brandAlt) ?>">
     </a>
 
-    <!-- <button class="navbar-toggler" type="button"
+    <button class="navbar-toggler" type="button"
             data-bs-toggle="collapse"
             data-bs-target="#publicNavbarNav"
             aria-controls="publicNavbarNav"
             aria-expanded="false"
             aria-label="Toggle navigation">
-      <span class="navbar-toggler-icon"></span>
-    </button> -->
+      <span class="navbar-toggler-icon bg-transparent" aria-hidden="true"></span>
+    </button>
 
-    <div class="navbar-collapse intro-nav d-block" id="publicNavbarNav">
-      <ul class="navbar-nav w-100 w-lg-auto mt-0 ps-4 ps-lg-0 align-items-lg-center gap-lg-2">
+    <div class="collapse navbar-collapse" id="publicNavbarNav">
+      <ul class="navbar-nav w-100 py-2 py-lg-0 align-items-lg-center gap-lg-2">
         <li class="nav-item intro-nav-item">
-          <a href="<?= $homeUrl ?>" class="link-to nav-link intro-nav-link">Home</a>
+          <a href="<?= $homeUrl ?>" class="nav-link intro-nav-link">Home</a>
         </li>
         <li class="nav-item intro-nav-item">
-          <a href="<?= $featuresUrl ?>" class="link-to nav-link intro-nav-link">Features</a>
+          <a href="<?= $featuresUrl ?>" class="nav-link intro-nav-link">Features</a>
         </li>
         <li class="nav-item intro-nav-item">
-          <a href="<?= site_url('How-It-Works'); ?>" class="link-to nav-link intro-nav-link">How It Works</a>
+          <a href="<?= site_url('How-It-Works'); ?>" class="nav-link intro-nav-link">How It Works</a>
         </li>
 
         <!-- <li class="nav-item intro-nav-item dropdown">
@@ -57,10 +56,7 @@ $brandAlt = 'MyMI Wallet - Investment Accounting/Analytical Software & Crypto As
           </ul>
         </li> -->
 
-        <!-- spacer that only grows on lg+ to push the last item right -->
-        <li class="d-none d-lg-block flex-lg-grow-1"></li>
-
-        <li class="nav-item intro-nav-item pb-1 ps-lg-1 ms-lg-0">
+        <li class="nav-item intro-nav-item ps-lg-1 ms-lg-auto">
           <?php if ($isLoggedIn): ?>
             <a href="<?= $dashboardUrl ?>" class="btn btn-primary text-white"><span>ACCOUNT</span></a>
             <a href="<?= site_url('/logout') ?>" class="btn btn-primary text-white"><span><em class="icon ni ni-signout"></em></span></a>
diff --git a/app/Views/themes/public/layouts/js-links.php b/app/Views/themes/public/layouts/js-links.php
index 713caf9d..a989ea3c 100644
--- a/app/Views/themes/public/layouts/js-links.php
+++ b/app/Views/themes/public/layouts/js-links.php
@@ -213,6 +213,13 @@ document.addEventListener('DOMContentLoaded', function () {
         }
     });
 
+    $('#publicNavbarNav').on('click', 'a', function(event) {
+        var menu = event.delegateTarget;
+        if (menu.classList.contains('show')) {
+            window.bootstrap?.Collapse.getOrCreateInstance(menu, { toggle: false }).hide();
+        }
+    });
+
     $win.on('scroll', function() {
         if ($win.scrollTop() > 0) {
             if (!$introNav.hasClass(_navbar_fixed)) {
diff --git a/public/assets/css/responsive-overrides.css b/public/assets/css/responsive-overrides.css
index a7e820ab..fe68a175 100644
--- a/public/assets/css/responsive-overrides.css
+++ b/public/assets/css/responsive-overrides.css
@@ -295,6 +295,16 @@ a:focus {
 .intro-navbar {
     background-color: #10006b;
 }
+
+/* Override the legacy collapse height while keeping Bootstrap's transition. */
+#publicNavbarNav.collapse {
+    height: auto;
+    overflow: visible;
+}
+
+.intro #features {
+    scroll-margin-top: 4.5rem;
+}
 /* .intro-navbar.scrolled {
   background-color: #fff !important;
   transition: background-color 200ms linear;
MYMI_PUBLIC_NAVBAR_PATCH
}

emit_handoff() {
    cat <<'MYMI_PUBLIC_NAVBAR_HANDOFF'
---
task_id: 20261109-121236-timothyburks-navbar-reproduction
repo_key: mymiwallet-next
repo_name: MyMI Wallet
source_agent: codex
target_agent: aiops
source_branch: feature/mymi-gtm-058-public-navbar-collapse-20261103
source_pr:
base_branch: main
risk_level: low
priority: normal
status: queued
model_preference: qwen2.5-coder:3b
requires_human_approval: true
---

# Resume the public MyMI Wallet navbar repair

# Objective

Restore the global public navbar on www.mymiwallet.com. Below 992 px, show a working mobile toggle and keep the links collapsed until opened. At 992 px and above, keep the links visible. Preserve all existing destinations and keep the Features anchor clear of the fixed header.

# Background

The live homepage returned HTTP 200 during verification. Its active sitenav forced the menu open with `d-block` and had the collapse toggle commented out. The public stylesheet set also includes a legacy Bootstrap rule that clips a Bootstrap 5 collapse container unless scoped to the current menu. The existing navbar branch is the continuation for this objective.

# Current State

- Resume MYMI-GTM-058 on the existing branch `feature/mymi-gtm-058-public-navbar-collapse-20261103`. This upload is a temporary transport copy.
- Native baseline preview passed, but the apply stopped before source mutation. Recover the existing mission's objective and approved worktree environment before reconciling the baseline.
- The exact three-file candidate passed PHP syntax, whitespace checks, and an isolated Chromium fixture using repository theme assets and Bootstrap 5.3.3 at 320, 390, 768, 991, 992, and 1440 px. Touch, keyboard, the Features offset, How It Works, and Login navigation passed in the fixture.

# What Needs To Change

Recover the existing mission's objective and worktree bootstrap via a supported AIOps repair procedure. Do not create the lock directory or synthesize objective records to pass the gate. Revalidate the baseline and grant current source scope through the control plane. Bind the existing candidate to a deterministic Class-1 recipe limited to the three listed files. Preview, apply through the approved recipe, and package the validated feature PR. The companion Bash package emits the exact patch with `--patch` and checks the recorded source blobs in its default mode.

# Files To Inspect

- `app/Views/themes/public/layouts/_sitenav.php` with preimage Git blob `b0561db4d0afcf623156f8e67f016683c6c3a274`
- `app/Views/themes/public/layouts/js-links.php` with preimage Git blob `713caf9dd3c5429e48223129e3628943bd90ac95`
- `public/assets/css/responsive-overrides.css` with preimage Git blob `a7e820ab015938d050b90d356a9e7e14ad14ac6f`

# Files To Avoid

Keep the shared Bootstrap assets, dashboard navigation, authentication, budget forms, production release paths, and secrets outside the source scope. Use only the supported AIOps mechanism for worktree runtime recovery.

# Commands To Run

From the existing worktree, use `ai check` and `ai next` after supported recovery. Re-run the native baseline reconciliation preview from the TBI control checkout with the current mission config and worktree. Check the patch preimages, then use the approved recipe's preview and validators. Run `php -l` on both changed PHP files, `git diff --check`, `vendor/bin/phpunit`, and browser smoke checks on a non-production build. Run `ai finish --dry-run` and preserve the owner gate.

# Acceptance Criteria

- The public mobile toggle changes `aria-expanded`, the menu opens without clipping, and a selected link closes it.
- At desktop widths all four links remain visible. Home, Features, How It Works and Login use their existing destinations.
- Features works from the homepage and another public page, landing below the navbar.
- The approved diff contains exactly the three paths above and passes the required checks. The PR is ready for owner review.

# Risks

The theme loads conflicting Bootstrap CSS, so the collapse-height override must stay scoped to the public navbar. The public content anchor depends on adequate spacing below the fixed header. The currently recorded mission status does not grant mutation authority for this candidate.

# Rollback Notes

Use the deterministic recipe's exact preimages or a bounded reverse patch in the governed worktree. After merge, use a corrective PR.

# Final Report Requirements

Include the current mission, recipe and approval IDs, exact branch and PR head, three-path scope, checks, risks, rollback, and any remaining owner gate. Record the missing objective-directory precondition that allowed baseline preview to pass before apply stopped as an AIOps operational finding, and route a durable prevention update to AGENTS.md through governance.
MYMI_PUBLIC_NAVBAR_HANDOFF
}

case "${1:---preview}" in
    --patch) emit_patch; exit ;;
    --handoff) emit_handoff; exit ;;
    --preview) ;;
    *) stop 'Use --preview, --patch, or --handoff.' ;;
esac

worktree=$(git rev-parse --show-toplevel 2>/dev/null) ||
    stop 'Run the preview from the existing MyMI Wallet navbar worktree.'
if ! cd -- "$worktree" || [ "$(git branch --show-current)" != "$branch" ]; then
    stop 'Use the existing MYMI-GTM-058 feature branch.'
fi

case "$(git remote get-url origin)" in
    https://github.com/MillennialInvestments/MyMIWallet-Next.git|git@github.com:MillennialInvestments/MyMIWallet-Next.git) ;;
    *) stop 'The origin does not match MyMI Wallet.' ;;
esac

dirty=$(git --no-optional-locks status --porcelain --untracked-files=all) ||
    stop 'Could not verify worktree status.'
if [ -n "$dirty" ]; then
    stop 'The worktree has local changes. Reconcile them in the existing lane.'
fi

while read -r expected file; do
    if [ "$(git rev-parse --verify "HEAD:$file")" != "$expected" ] ||
       [ "$(git hash-object -- "$file")" != "$expected" ]; then
        stop "Candidate preimage changed for $file. Recheck the existing source before any retry."
    fi
done <<'MYMI_PUBLIC_NAVBAR_PREIMAGES'
b0561db4d0afcf623156f8e67f016683c6c3a274 app/Views/themes/public/layouts/_sitenav.php
713caf9dd3c5429e48223129e3628943bd90ac95 app/Views/themes/public/layouts/js-links.php
a7e820ab015938d050b90d356a9e7e14ad14ac6f public/assets/css/responsive-overrides.css
MYMI_PUBLIC_NAVBAR_PREIMAGES

if ! emit_patch | git --no-optional-locks apply --check --index --whitespace=error-all -; then
    stop 'The three-file patch did not pass its read-only check.'
fi
printf '%s\n' 'PASS: The exact navbar candidate fits the current worktree.'
printf 'HEAD=%s\nORIGIN_MAIN=%s\n' "$(git rev-parse HEAD)" "$(git rev-parse origin/main)"

if [ ! -d writable/aiops/objectives ] || [ -L writable/aiops/objectives ]; then
    stop 'AIOps must recover the existing mission objective before baseline reconciliation.'
fi
if [ "$(git rev-parse HEAD)" != "$(git rev-parse origin/main)" ]; then
    stop 'Complete native baseline reconciliation for the existing mission.'
fi
if [ ! -e .env ]; then
    stop 'Use the approved worktree bootstrap before validation.'
fi
printf '%s\n' 'NEXT: Bind and preview the exact candidate through a currently approved AIOps recipe.'

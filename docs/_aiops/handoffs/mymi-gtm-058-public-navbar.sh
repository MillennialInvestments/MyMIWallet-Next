#!/usr/bin/env bash
# Preview the tested public navbar fix from its existing AIOps worktree.
# Use --patch for the diff, --scope for the recipe input, or --handoff for the task.
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
index b0561db4..8b6fec2b 100644
--- a/app/Views/themes/public/layouts/_sitenav.php
+++ b/app/Views/themes/public/layouts/_sitenav.php
@@ -5,43 +5,43 @@ $authUser = null;
 $authUserId = null;
 
 $homeUrl = site_url('/');
-$featuresUrl = site_url('#features');
+$featuresUrl = $homeUrl . '#features';
 $supportUrl = site_url('Support');
 $dashboardUrl = site_url('/Dashboard');
 $loginUrl = site_url('login');
 
 $brandImage = base_url('assets/images/MyMI-Wallet-Logo-White.png');
 $brandAlt = 'MyMI Wallet - Investment Accounting/Analytical Software & Crypto Asset Marketplace/Exchange';
+$cspNonce = $cspNonce ?? ($csp['script'] ?? service('renderer')->getData('cspNonce') ?? '');
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
@@ -57,10 +57,7 @@ $brandAlt = 'MyMI Wallet - Investment Accounting/Analytical Software & Crypto As
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
@@ -72,3 +69,15 @@ $brandAlt = 'MyMI Wallet - Investment Accounting/Analytical Software & Crypto As
     </div>
   </div>
 </nav>
+
+<script nonce="<?= esc($cspNonce, 'attr') ?>">
+(() => {
+    const menu = document.getElementById('publicNavbarNav');
+
+    menu.addEventListener('click', (event) => {
+        if (event.target.closest('a') && menu.classList.contains('show')) {
+            window.bootstrap?.Collapse.getOrCreateInstance(menu, { toggle: false }).hide();
+        }
+    });
+})();
+</script>
diff --git a/public/assets/css/responsive-overrides.css b/public/assets/css/responsive-overrides.css
index a7e820ab..501a02fd 100644
--- a/public/assets/css/responsive-overrides.css
+++ b/public/assets/css/responsive-overrides.css
@@ -295,6 +295,33 @@ a:focus {
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
+#publicNavbarNav .nav-link {
+    padding: 0.5rem 0.75rem;
+}
+
+.intro-navbar .navbar-toggler:focus-visible,
+#publicNavbarNav .nav-link:focus-visible {
+    outline: 2px solid #fff;
+    outline-offset: 2px;
+}
+
+@media (max-width: 991.98px) {
+    #publicNavbarNav.collapse.show {
+        max-height: calc(100dvh - 4.5rem);
+        overflow-y: auto;
+    }
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

emit_scope() {
    cat <<'MYMI_PUBLIC_NAVBAR_SCOPE'
{
  "allowed_source_paths": [
    "app/Views/themes/public/layouts/_sitenav.php",
    "public/assets/css/responsive-overrides.css"
  ],
  "read_only_source_paths": [],
  "file_operations": [
    {
      "id": "apply-tested-public-navbar-diff",
      "type": "apply_unified_diff",
      "diff": "diff --git a/app/Views/themes/public/layouts/_sitenav.php b/app/Views/themes/public/layouts/_sitenav.php\nindex b0561db4..8b6fec2b 100644\n--- a/app/Views/themes/public/layouts/_sitenav.php\n+++ b/app/Views/themes/public/layouts/_sitenav.php\n@@ -5,43 +5,43 @@ $authUser = null;\n $authUserId = null;\n \n $homeUrl = site_url('/');\n-$featuresUrl = site_url('#features');\n+$featuresUrl = $homeUrl . '#features';\n $supportUrl = site_url('Support');\n $dashboardUrl = site_url('/Dashboard');\n $loginUrl = site_url('login');\n \n $brandImage = base_url('assets/images/MyMI-Wallet-Logo-White.png');\n $brandAlt = 'MyMI Wallet - Investment Accounting/Analytical Software & Crypto Asset Marketplace/Exchange';\n+$cspNonce = $cspNonce ?? ($csp['script'] ?? service('renderer')->getData('cspNonce') ?? '');\n ?>\n \n-<!-- <nav class=\"intro-navbar navbar navbar-expand-lg navbar-dark bg-dark intro-navbar\"> -->\n-<nav class=\"intro-navbar navbar navbar-expand-lg intro-navbar fixed-top\">\n-  <div class=\"container container-fluid w-80 px-5\">\n+<nav class=\"intro-navbar navbar navbar-expand-lg navbar-dark fixed-top\" aria-label=\"Main navigation\">\n+  <div class=\"container px-3 px-lg-4\">\n     <a class=\"navbar-brand d-flex align-items-center\" href=\"<?= $homeUrl ?>\">\n       <img class=\"logo-img logo-dark img-fluid\"\n            src=\"<?= esc($brandImage) ?>\" srcset=\"<?= esc($brandImage) ?>\"\n            alt=\"<?= esc($brandAlt) ?>\">\n     </a>\n \n-    <!-- <button class=\"navbar-toggler\" type=\"button\"\n+    <button class=\"navbar-toggler\" type=\"button\"\n             data-bs-toggle=\"collapse\"\n             data-bs-target=\"#publicNavbarNav\"\n             aria-controls=\"publicNavbarNav\"\n             aria-expanded=\"false\"\n             aria-label=\"Toggle navigation\">\n-      <span class=\"navbar-toggler-icon\"></span>\n-    </button> -->\n+      <span class=\"navbar-toggler-icon bg-transparent\" aria-hidden=\"true\"></span>\n+    </button>\n \n-    <div class=\"navbar-collapse intro-nav d-block\" id=\"publicNavbarNav\">\n-      <ul class=\"navbar-nav w-100 w-lg-auto mt-0 ps-4 ps-lg-0 align-items-lg-center gap-lg-2\">\n+    <div class=\"collapse navbar-collapse\" id=\"publicNavbarNav\">\n+      <ul class=\"navbar-nav w-100 py-2 py-lg-0 align-items-lg-center gap-lg-2\">\n         <li class=\"nav-item intro-nav-item\">\n-          <a href=\"<?= $homeUrl ?>\" class=\"link-to nav-link intro-nav-link\">Home</a>\n+          <a href=\"<?= $homeUrl ?>\" class=\"nav-link intro-nav-link\">Home</a>\n         </li>\n         <li class=\"nav-item intro-nav-item\">\n-          <a href=\"<?= $featuresUrl ?>\" class=\"link-to nav-link intro-nav-link\">Features</a>\n+          <a href=\"<?= $featuresUrl ?>\" class=\"nav-link intro-nav-link\">Features</a>\n         </li>\n         <li class=\"nav-item intro-nav-item\">\n-          <a href=\"<?= site_url('How-It-Works'); ?>\" class=\"link-to nav-link intro-nav-link\">How It Works</a>\n+          <a href=\"<?= site_url('How-It-Works'); ?>\" class=\"nav-link intro-nav-link\">How It Works</a>\n         </li>\n \n         <!-- <li class=\"nav-item intro-nav-item dropdown\">\n@@ -57,10 +57,7 @@ $brandAlt = 'MyMI Wallet - Investment Accounting/Analytical Software & Crypto As\n           </ul>\n         </li> -->\n \n-        <!-- spacer that only grows on lg+ to push the last item right -->\n-        <li class=\"d-none d-lg-block flex-lg-grow-1\"></li>\n-\n-        <li class=\"nav-item intro-nav-item pb-1 ps-lg-1 ms-lg-0\">\n+        <li class=\"nav-item intro-nav-item ps-lg-1 ms-lg-auto\">\n           <?php if ($isLoggedIn): ?>\n             <a href=\"<?= $dashboardUrl ?>\" class=\"btn btn-primary text-white\"><span>ACCOUNT</span></a>\n             <a href=\"<?= site_url('/logout') ?>\" class=\"btn btn-primary text-white\"><span><em class=\"icon ni ni-signout\"></em></span></a>\n@@ -72,3 +69,15 @@ $brandAlt = 'MyMI Wallet - Investment Accounting/Analytical Software & Crypto As\n     </div>\n   </div>\n </nav>\n+\n+<script nonce=\"<?= esc($cspNonce, 'attr') ?>\">\n+(() => {\n+    const menu = document.getElementById('publicNavbarNav');\n+\n+    menu.addEventListener('click', (event) => {\n+        if (event.target.closest('a') && menu.classList.contains('show')) {\n+            window.bootstrap?.Collapse.getOrCreateInstance(menu, { toggle: false }).hide();\n+        }\n+    });\n+})();\n+</script>\ndiff --git a/public/assets/css/responsive-overrides.css b/public/assets/css/responsive-overrides.css\nindex a7e820ab..501a02fd 100644\n--- a/public/assets/css/responsive-overrides.css\n+++ b/public/assets/css/responsive-overrides.css\n@@ -295,6 +295,33 @@ a:focus {\n .intro-navbar {\n     background-color: #10006b;\n }\n+\n+/* Override the legacy collapse height while keeping Bootstrap's transition. */\n+#publicNavbarNav.collapse {\n+    height: auto;\n+    overflow: visible;\n+}\n+\n+#publicNavbarNav .nav-link {\n+    padding: 0.5rem 0.75rem;\n+}\n+\n+.intro-navbar .navbar-toggler:focus-visible,\n+#publicNavbarNav .nav-link:focus-visible {\n+    outline: 2px solid #fff;\n+    outline-offset: 2px;\n+}\n+\n+@media (max-width: 991.98px) {\n+    #publicNavbarNav.collapse.show {\n+        max-height: calc(100dvh - 4.5rem);\n+        overflow-y: auto;\n+    }\n+}\n+\n+.intro #features {\n+    scroll-margin-top: 4.5rem;\n+}\n /* .intro-navbar.scrolled {\n   background-color: #fff !important;\n   transition: background-color 200ms linear;\n",
      "preimage_hashes": {
        "app/Views/themes/public/layouts/_sitenav.php": "439fb8eb661b8418e1c43970c10bbcb305968511e905a3c78f29713fc5056b7d",
        "public/assets/css/responsive-overrides.css": "46f1c035784e2bc515acbfc952b314ea13022b00495ba393439f01528eba59eb"
      }
    }
  ],
  "validation_commands": [
    "php -l app/Views/themes/public/layouts/_sitenav.php",
    "git diff --check"
  ],
  "rollback_commands": [
    "git restore --source=14b9ab53f38d29a2f5420372bce74d1512a690e3 --worktree -- app/Views/themes/public/layouts/_sitenav.php public/assets/css/responsive-overrides.css"
  ]
}
MYMI_PUBLIC_NAVBAR_SCOPE
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

- AIOps restored the MYMI-GTM-058 objective and reconciled the existing feature worktree to main. The approved worktree environment remains to be bootstrapped.
- The original pinned proposal was preserved. Its menu was clipped at 320 px. This replacement candidate keeps the same two-file boundary and needs its own exact recipe approval.
- The replacement passed PHP syntax, a local Chromium fixture with a nonce-based script policy, and viewport checks at 320, 375, 390, 768, 991, 992, 1280, and 1440 px. Touch, keyboard, the Features offset, How It Works, and Login navigation passed in the fixture.

# What Needs To Change

Resume the existing mission. Verify the current baseline and approved worktree environment. The transport script emits the tested patch with `--patch` and exact deterministic recipe input with `--scope`. Approve only the exact candidate and source scope, preview, apply through AIOps, and validate the feature PR.

# Files To Inspect

- `app/Views/themes/public/layouts/_sitenav.php` with preimage Git blob `b0561db4d0afcf623156f8e67f016683c6c3a274`
- `public/assets/css/responsive-overrides.css` with preimage Git blob `a7e820ab015938d050b90d356a9e7e14ad14ac6f`

# Files To Avoid

Keep the shared Bootstrap assets, dashboard navigation, authentication, budget forms, production release paths, and secrets outside the source scope. Use only the supported AIOps mechanism for worktree runtime recovery.

# Commands To Run

From the existing worktree, use `ai check` and `ai next` after supported recovery. Re-run the native baseline reconciliation preview from the TBI control checkout with the current mission config and worktree. Check the patch preimages, then use the approved recipe's preview and validators. Run `php -l` on the changed PHP view, `git diff --check`, `vendor/bin/phpunit`, and browser smoke checks on a non-production build. Run `ai finish --dry-run` and preserve the owner gate.

# Acceptance Criteria

- The public mobile toggle changes `aria-expanded`, the menu opens without clipping, and a selected link closes it.
- At desktop widths all four links remain visible. Home, Features, How It Works and Login use their existing destinations.
- Features works from the homepage and another public page, landing below the navbar.
- The approved diff contains exactly the two paths above and passes the required checks. The PR is ready for owner review.

# Risks

The theme loads conflicting Bootstrap CSS, so the collapse-height override must stay scoped to the public navbar. The public content anchor depends on adequate spacing below the fixed header. The currently recorded mission status does not grant mutation authority for this candidate.

# Rollback Notes

Use the deterministic recipe's exact preimages or a bounded reverse patch in the governed worktree. After merge, use a corrective PR.

# Final Report Requirements

Include the current mission, recipe and approval IDs, exact branch and PR head, two-path scope, checks, risks, rollback, and any remaining owner gate. Record the preserved original proposal and this corrected candidate, and route any durable operational findings through governance.
MYMI_PUBLIC_NAVBAR_HANDOFF
}

case "${1:---preview}" in
    --patch) emit_patch; exit ;;
    --scope) emit_scope; exit ;;
    --handoff) emit_handoff; exit ;;
    --preview) ;;
    *) stop 'Use --preview, --patch, --scope, or --handoff.' ;;
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
a7e820ab015938d050b90d356a9e7e14ad14ac6f public/assets/css/responsive-overrides.css
MYMI_PUBLIC_NAVBAR_PREIMAGES

if ! emit_patch | git --no-optional-locks apply --check --index --whitespace=error-all -; then
    stop 'The two-file patch did not pass its read-only check.'
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

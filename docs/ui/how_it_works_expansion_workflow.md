# How-It-Works Expansion Workflow (Codex + AIOps + Ollama)

This playbook expands the existing **How-It-Works** section without breaking current routes or views.

## Scope and guardrails

- Keep the current architecture:
  - CI4 controllers (`HowItWorksController`)
  - static PHP views in `app/Modules/Blog/Views/HowItWorks/`
  - public rendering path (`renderPublic()`/`respondWithRendered()`)
- **Never overwrite existing view content.**
- Only add missing topic views and map them in `show()`.

## 1) Codex review workflow

Use this exact task block with Codex:

```text
TASK: Expand How-It-Works documentation system.

OBJECTIVES
1. Scan all /docs/**/*.md files.
2. Identify documentation topics.
3. Match topics with existing HowItWorks views.
4. Generate missing views in app/Modules/Blog/Views/HowItWorks/
5. Use naming convention Topic_Name.php.
6. Update app/Modules/Blog/Controllers/HowItWorksController.php.
7. Expand $viewMap in show() with all new pages.
8. Keep each page rendering through renderPublic()/respondWithRendered().
9. Add internal links between related pages.
10. Keep URL slugs as /How-It-Works/<slug>.
11. Do not modify existing view content.
```

## 2) Repository scan commands

```bash
# Existing How-It-Works views
find app/Modules/Blog/Views/HowItWorks -type f -name "*.php" | sort

# Markdown source inventory
find docs -type f -name "*.md" | sort

# Top-level markdown headings
rg "^# " docs --glob "*.md"
```

## 3) Topic-to-view classification rules

Codex should classify each markdown topic to one of:

- Existing page (already covered) -> ensure link exists.
- New page (uncovered) -> generate a new How-It-Works view.

Baseline mapping examples:

- Account onboarding -> `Registering_An_Account.php`
- Budgeting -> `Personal_Budgeting.php`
- Investing/portfolio -> `Investment_Portfolio_Management.php`
- Financial goals -> `Determining_Your_Financial_Goals.php`
- Gold token -> `MyMI_Gold.php`
- News -> `Daily_Financial_News.php`

If docs add a new topic (for example `docs/.../options.md`), generate:

- `app/Modules/Blog/Views/HowItWorks/Options_Trading.php`
- slug: `options-trading`
- controller map entry for that slug.

## 4) show() map expansion pattern

When Codex finds a new topic view, append an entry to `$viewMap` in `HowItWorksController::show()`:

```php
'options-trading' => 'App\\Modules\\Blog\\Views\\HowItWorks\\Options_Trading',
```

Do not remove existing keys. Keep backward-compatible slugs intact.

## 5) Standard view template for generated pages

Use this structure for new view files:

```php
<?php
$title = $title ?? 'How It Works';
?>

<div class="container py-5">
    <h1><?= esc($title) ?></h1>

    <div class="content mt-4">
        <?= $content ?? '' ?>
    </div>

    <hr class="my-4">

    <nav class="d-flex gap-3 flex-wrap">
        <a href="<?= site_url('How-It-Works/personal-budgeting') ?>">Personal Budgeting</a>
        <a href="<?= site_url('How-It-Works/setting-financial-goals') ?>">Financial Goals</a>
        <a href="<?= site_url('How-It-Works/investment-dashboard') ?>">Investment Portfolio</a>
    </nav>
</div>
```

## 6) Internal linking requirements

Every generated page must include at least:

- 1 previous/related link
- 1 next-step link
- 1 link back to `/How-It-Works`

Recommended chain:

- Registering Account -> Personal Budgeting -> Financial Goals -> Investment Dashboard -> Manage Finances.

## 7) AIOps ingestion command

Run this to create a patch job for Codex/Ollama pipeline:

```bash
php spark aiops:ingest \
  --title="Expand How-It-Works Documentation System" \
  --text="Scan docs/**/*.md. Generate HowItWorks view pages for uncovered topics. Update HowItWorksController::show() view map. Create internal navigation links between related pages. Keep existing views unchanged and preserve current slugs."
```

## 8) Ollama instruction template

Use this payload in the generated instruction/prompt stage:

```text
INSTRUCTION TYPE: UI_EXPANSION

Target Controller:
App\Modules\Blog\Controllers\HowItWorksController

Target Views:
app/Modules/Blog/Views/HowItWorks/

Process:
1. Scan docs directory for markdown files.
2. Extract titles/headings and group by topic.
3. For uncovered topics, create new How-It-Works view files.
4. Add internal cross-links to related How-It-Works pages.
5. Expand show() $viewMap using normalized slugs.
6. Keep existing views and routes unchanged.
7. Ensure output uses public rendering architecture.
```

## 9) Optional dedicated command

For repeatable expansion, add a command:

```bash
php spark docs:expand-how-it-works
```

Suggested responsibilities:

- scan `docs/`
- extract headings/topics
- compare against existing `HowItWorks/*.php`
- generate missing views
- patch controller `$viewMap`
- print a change summary

## 10) Future state (documentation engine)

Long-term path:

- `docs/*.md` -> markdown parser -> rendered HTML -> public layout
- route `/How-It-Works/<slug>` resolves dynamically from docs content.

This reduces manual view creation while preserving CI4 controller governance.

## 11) Phase 2 — Content Knowledge Graph Engine

Append this to Codex execution instructions:

```text
PHASE 2: BUILD CONTENT KNOWLEDGE GRAPH

Objective:
Generate docs/_knowledge_graph.json mapping docs -> views -> routes -> controllers -> services.

Steps:
1) Scan docs/**/*.md (file, title, headings, related topics)
2) Scan app/Modules/**/Views/**/*.php (view name, module, path, slug)
3) Scan routes (app/Config/Routes.php + module routes) for uri/controller/method
4) Scan app/Modules/**/Controllers/**/*.php (methods, rendered views, services used)
5) Scan app/Services/**/*.php + app/Libraries/**/*.php (service name, dependencies)
6) Build relationships records combining doc/view/route/controller/method
7) Save docs/_knowledge_graph.json
8) Add Spark command: php spark docs:generate-knowledge-graph
```

Implemented command path:

- `app/Commands/Docs/GenerateKnowledgeGraph.php`

## 12) Phase 3 — Auto Navigation Builder

Implemented command:

- `php spark docs:build-how-it-works-nav`
- file: `app/Commands/Docs/BuildHowItWorksNavigation.php`

Output file:

- `app/Modules/Blog/Views/HowItWorks/partials/navigation.php`

Index integration:

- `app/Modules/Blog/Views/HowItWorks/index.php` includes the generated nav partial.

## 13) Phase 4 — AIOps integration commands

```bash
php spark aiops:ingest \
  --title="Build CI4 Content Knowledge Graph" \
  --text="Generate docs/_knowledge_graph.json linking docs, views, routes, controllers, and services. Add spark command docs:generate-knowledge-graph."

php spark aiops:ingest \
  --title="Auto Expand How-It-Works System" \
  --text="Scan docs/**/*.md, generate new HowItWorks view pages, update show() slug mapping, and rebuild navigation menu using docs:build-how-it-works-nav."
```

## 14) Phase 5 — Automation loop (cron)

```cron
0 */6 * * * php /path/to/project/spark docs:generate-knowledge-graph
0 */6 * * * php /path/to/project/spark docs:build-how-it-works-nav
```

## 15) Phase 3 — CI4 Documentation Engine (Docs -> Dynamic Pages)

Implementation targets:

- `app/Modules/Blog/Controllers/HowItWorksController.php`
- `app/Services/Docs/DocsRendererService.php`
- `docs/how-it-works/*.md`

Behavior:

- `show()` checks static `viewMap` first.
- If no static view is found, it now checks `docs/how-it-works/*.md`.
- Markdown is rendered with existing `Parsedown` and returned via the existing public page renderer.
- Front matter support:
  - `title`
  - `category`
  - `slug` (overrides filename slug)

## 16) Phase 4 — Architecture health commands

Implemented commands:

- `php spark docs:scan-orphan-routes` -> `docs/_orphan_routes.json`
- `php spark docs:scan-orphan-views` -> `docs/_orphan_views.json`
- `php spark docs:scan-undocumented-controllers` -> `docs/_undocumented_controllers.json`

Knowledge graph integration:

- `docs:generate-knowledge-graph` now includes health scan payloads (if available) under `health`.

Automation cadence recommendation (every 6 hours):

```cron
0 */6 * * * php /path/to/project/spark docs:generate-knowledge-graph
0 */6 * * * php /path/to/project/spark docs:build-how-it-works-nav
0 */6 * * * php /path/to/project/spark docs:scan-orphan-routes
0 */6 * * * php /path/to/project/spark docs:scan-orphan-views
0 */6 * * * php /path/to/project/spark docs:scan-undocumented-controllers
```

## 17) Phase 4 — Repository Intelligence Engine

New command:

- `php spark docs:generate-architecture-map`
- file: `app/Commands/Docs/GenerateArchitectureMap.php`

Output:

- `docs/_architecture_map.json`

Read-only scan coverage:

- controllers
- services
- models
- routes
- views
- docs
- spark commands
- tables (from model properties, migrations, SQL docs)
- relationships

AIOps ingest command:

```bash
php spark aiops:ingest \
  --title="Generate Repository Architecture Map" \
  --text="Scan controllers, models, services, routes, views, commands, and docs. Build docs/_architecture_map.json for AI code analysis."
```

## 18) Phase 7 — Automation pipeline (6-hour cadence)

```cron
0 */6 * * * php /path/to/project/spark docs:generate-architecture-map
0 */6 * * * php /path/to/project/spark docs:generate-knowledge-graph
0 */6 * * * php /path/to/project/spark docs:build-how-it-works-nav
0 */6 * * * php /path/to/project/spark docs:scan-orphan-routes
0 */6 * * * php /path/to/project/spark docs:scan-orphan-views
0 */6 * * * php /path/to/project/spark docs:scan-undocumented-controllers
```

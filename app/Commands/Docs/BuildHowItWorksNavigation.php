<?php

namespace App\Commands\Docs;

use App\Commands\SafeBaseCommand;
use App\Services\Docs\DocsRendererService;
use CodeIgniter\CLI\CLI;

class BuildHowItWorksNavigation extends SafeBaseCommand
{
    protected $group = 'Docs';
    protected $name = 'docs:build-how-it-works-nav';
    protected $description = 'Build How-It-Works navigation partial from view files and docs/how-it-works markdown files.';

    public function run(array $params)
    {
        $viewsBasePath = APPPATH . 'Modules/Blog/Views/HowItWorks';
        $outputPath = $viewsBasePath . '/partials/navigation.php';

        if (! is_dir($viewsBasePath)) {
            CLI::error('HowItWorks view directory was not found: ' . $viewsBasePath);
            return;
        }

        $items = [];

        foreach ($this->buildItemsFromViews($viewsBasePath) as $item) {
            $items[$item['slug']] = $item;
        }

        $docsRenderer = new DocsRendererService();
        foreach ($docsRenderer->listHowItWorksDocs() as $doc) {
            $items[$doc['slug']] = [
                'name' => $doc['slug'],
                'label' => $doc['title'],
                'slug' => $doc['slug'],
                'href' => '/How-It-Works/' . $doc['slug'],
                'source' => 'docs',
            ];
        }

        $items = array_values($items);
        usort($items, static fn (array $a, array $b): int => strcmp($a['label'], $b['label']));

        $export = var_export($items, true);
        $export = str_replace("=> \
", "=>\n", $export);

        $buffer = "<?php\n";
        $buffer .= '$currentSlug = $currentSlug ?? null;' . "\n";
        $buffer .= '$howItWorksNavItems = ' . $export . ";\n\n";
        $buffer .= "?>\n";
        $buffer .= "<ul class=\"how-it-works-nav list-unstyled\">\n";
        $buffer .= "    <?php foreach (\$howItWorksNavItems as \$item): ?>\n";
        $buffer .= "        <li class=\"mb-2\">\n";
        $buffer .= "            <a class=\"<?= (\$currentSlug === \$item['slug']) ? 'fw-bold' : '' ?>\" href=\"<?= esc(\$item['href']) ?>\">\n";
        $buffer .= "                <?= esc(\$item['label']) ?>\n";
        $buffer .= "            </a>\n";
        $buffer .= "        </li>\n";
        $buffer .= "    <?php endforeach; ?>\n";
        $buffer .= "</ul>\n";

        $buffer = preg_replace('/[ \t]+\n/', "\n", $buffer) ?: $buffer;

        file_put_contents($outputPath, $buffer);

        CLI::write('How-It-Works navigation generated: ' . $outputPath, 'green');
        CLI::write('Links generated: ' . count($items));
    }

    private function buildItemsFromViews(string $basePath): array
    {
        $items = [];
        $entries = scandir($basePath) ?: [];

        foreach ($entries as $entry) {
            $fullPath = $basePath . '/' . $entry;
            if (! is_file($fullPath) || pathinfo($entry, PATHINFO_EXTENSION) !== 'php') {
                continue;
            }

            $name = basename($entry, '.php');
            if (in_array(strtolower($name), ['index'], true)) {
                continue;
            }

            $slug = $this->slugify($name);
            $items[] = [
                'name' => $name,
                'label' => ucwords(str_replace('_', ' ', $name)),
                'slug' => $slug,
                'href' => '/How-It-Works/' . $slug,
                'source' => 'view',
            ];
        }

        return $items;
    }

    private function slugify(string $value): string
    {
        $value = str_replace('_', '-', $value);
        $value = preg_replace('/[^a-zA-Z0-9-]+/', '-', $value);
        $value = preg_replace('/-+/', '-', $value);

        return strtolower(trim((string) $value, '-'));
    }
}

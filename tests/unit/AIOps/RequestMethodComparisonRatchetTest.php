<?php

declare(strict_types=1);

namespace Tests\Unit\AIOps;

use CodeIgniter\Test\CIUnitTestCase;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

/**
 * GT-FORM-ROUTES-001: since CodeIgniter 4.5, IncomingRequest::getMethod() returns
 * the verb in UPPER case. A comparison with a lower-case literal such as
 * getMethod() === 'post' is always false, so the POST branch never runs and the
 * form silently does nothing. Eleven controllers had this bug.
 */
final class RequestMethodComparisonRatchetTest extends CIUnitTestCase
{
    private const PATTERN = '#getMethod\(\s*(?:true|false)?\s*\)\s*(?:===|==|!==|!=)\s*[\'"](?:get|post|put|patch|delete)[\'"]'
        . '|[\'"](?:get|post|put|patch|delete)[\'"]\s*(?:===|==|!==|!=)\s*\$[\w>-]*getMethod\(#';

    public function testNoLowercaseMethodComparisons(): void
    {
        $hits = [];
        $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(APPPATH, RecursiveDirectoryIterator::SKIP_DOTS));
        foreach ($it as $file) {
            if ($file->getExtension() !== 'php') {
                continue;
            }
            foreach (file($file->getPathname()) ?: [] as $n => $line) {
                if (preg_match(self::PATTERN, $line) === 1) {
                    $hits[] = substr($file->getPathname(), strlen(ROOTPATH)) . ':' . ($n + 1);
                }
            }
        }

        $this->assertSame([], $hits, "Compare against upper case ('POST') or wrap in strtolower():\n" . implode("\n", $hits));
    }

    public function testPatternCatchesTheBug(): void
    {
        $this->assertSame(1, preg_match(self::PATTERN, "if (\$this->request->getMethod() === 'post') {"));
        $this->assertSame(0, preg_match(self::PATTERN, "if (strtolower(\$this->request->getMethod()) === 'post') {"));
        $this->assertSame(0, preg_match(self::PATTERN, "if (\$this->request->getMethod() === 'POST') {"));
    }
}

<?php

declare(strict_types=1);

use CodeIgniter\Test\CIUnitTestCase;

/**
 * GTM-030: inline scripts must carry the per-request CSP nonce so the policy
 * can move from report-only to enforced. A bare <script> line in a live view
 * fails this test; dated or *_old backups are ignored.
 *
 * @internal
 */
final class InlineScriptNonceTest extends CIUnitTestCase
{
    public function testNoBareInlineScriptTagsInLiveViews(): void
    {
        $bare = [];
        foreach ([APPPATH . 'Views', APPPATH . 'Modules'] as $root) {
            $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root, FilesystemIterator::SKIP_DOTS));
            foreach ($it as $file) {
                $path = (string) $file;
                if (! str_ends_with($path, '.php') || preg_match('/(\.\d{8}|_old)\.php$/', $path)) {
                    continue;
                }
                foreach (file($path) ?: [] as $i => $line) {
                    if (preg_match('/^\s*<script(\s+type="text\/javascript"\s*)?>\s*$/', $line)) {
                        $bare[] = substr($path, strlen(ROOTPATH)) . ':' . ($i + 1);
                    }
                }
            }
        }

        $this->assertSame([], $bare, "Use <script<?= script_nonce_attr() ?>> instead of a bare <script>:\n  " . implode("\n  ", $bare));
    }

    public function testNonceHelperIsAutoloadedAndRendersTheRequestNonce(): void
    {
        $this->assertContains('csp', config('Autoload')->helpers);

        helper('csp');
        $renderer = \Config\Services::renderer();
        $renderer->setData(['cspNonce' => 'abc123def456'], 'raw');

        $this->assertSame(' nonce="abc123def456"', script_nonce_attr());
    }
}

<?php

declare(strict_types=1);

namespace Tests\Unit\Documentation;

use App\Libraries\DocsIndex;
use App\Models\BlogModel;
use App\Models\SubscribeModel;
use App\Modules\APIs\Controllers\DocsAPIController;
use App\Modules\Blog\Controllers\BlogController;
use App\Modules\Docs\Controllers\DocsController;
use App\Modules\User\Controllers\KnowledgebaseController;
use CodeIgniter\Config\Services;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\URI;
use CodeIgniter\HTTP\UserAgent;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Database;
use ReflectionClass;

/**
 * MYMI-GTM-056: Certification tests for Documentation, Knowledgebase, and Blog.
 *
 * Verifies:
 * - Blog post publication lifecycle: published vs. future/draft isolation.
 * - BlogModel category filtering, related posts, and missing table resilience.
 * - BlogController view resolution and missing post redirect with warning.
 * - Knowledgebase slug normalization, canonical category routing, and graceful 404 on missing topics.
 * - DocsIndex markdown scanner, title/snippet extraction, and directory traversal rejection.
 * - DocsAPIController structured JSON output and safe fallbacks.
 */
final class DocsKnowledgebaseBlogTest extends CIUnitTestCase
{
    private const USER_A = 9301;

    protected function setUp(): void
    {
        parent::setUp();

        $db = Database::connect();
        $db->resetDataCache();

        $this->createTables($db);
    }

    protected function tearDown(): void
    {
        Services::resetSingle('auth');
        Services::resetSingle('authentication');
        parent::tearDown();
    }

    private function createTables($db): void
    {
        $db->query('CREATE TABLE IF NOT EXISTS bf_blog_posts (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            title TEXT NOT NULL,
            slug TEXT NOT NULL UNIQUE,
            content TEXT NULL,
            meta_description TEXT NULL,
            meta_keywords TEXT NULL,
            featured_image TEXT NULL,
            category_id INTEGER NOT NULL DEFAULT 1,
            published_at TEXT NULL,
            created_at TEXT NULL,
            updated_at TEXT NULL
        )');

        $db->query('CREATE TABLE IF NOT EXISTS bf_settings (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            class TEXT NOT NULL,
            key TEXT NOT NULL,
            value TEXT NULL,
            type TEXT NOT NULL DEFAULT "string",
            context TEXT NULL,
            created_at TEXT NULL,
            updated_at TEXT NULL
        )');

        $db->table('bf_blog_posts')->emptyTable();
    }

    public function testBlogModelPublishedVsDraftIsolation(): void
    {
        $model = new BlogModel();

        // 1. Published post (past timestamp)
        $pastDate = date('Y-m-d H:i:s', strtotime('-1 day'));
        $model->insert([
            'title' => 'Getting Started with Automated Budgeting',
            'slug' => 'getting-started-budgeting',
            'content' => 'Full article content for budgeting.',
            'category_id' => 1,
            'published_at' => $pastDate,
        ]);

        // 2. Draft/Scheduled post (future timestamp)
        $futureDate = date('Y-m-d H:i:s', strtotime('+7 days'));
        $model->insert([
            'title' => 'Upcoming 2027 Macro Strategies',
            'slug' => 'upcoming-macro-strategies-2027',
            'content' => 'Confidential draft strategies.',
            'category_id' => 1,
            'published_at' => $futureDate,
        ]);

        // 3. Published post in category 2
        $model->insert([
            'title' => 'Crypto Security Essentials',
            'slug' => 'crypto-security-essentials',
            'content' => 'Hardware wallet guide.',
            'category_id' => 2,
            'published_at' => $pastDate,
        ]);

        // Public slug lookup for published post -> succeeds
        $published = $model->getPostBySlug('getting-started-budgeting');
        $this->assertNotNull($published);
        $this->assertSame('Getting Started with Automated Budgeting', $published['title']);

        // Public slug lookup for future/draft post -> strictly null
        $draft = $model->getPostBySlug('upcoming-macro-strategies-2027');
        $this->assertNull($draft);

        // Recent posts only include published
        $recent = $model->getRecentPosts(10);
        $this->assertCount(2, $recent);
        $slugs = array_column($recent, 'slug');
        $this->assertContains('getting-started-budgeting', $slugs);
        $this->assertContains('crypto-security-essentials', $slugs);
        $this->assertNotContains('upcoming-macro-strategies-2027', $slugs);

        // Category filtering only returns published posts in that category
        $cat1Posts = $model->getPostsByCategory(1);
        $this->assertCount(1, $cat1Posts);
        $this->assertSame('getting-started-budgeting', $cat1Posts[0]['slug']);

        $cat2Posts = $model->getPostsByCategory(2);
        $this->assertCount(1, $cat2Posts);
        $this->assertSame('crypto-security-essentials', $cat2Posts[0]['slug']);
    }

    public function testBlogModelRelatedPostsExcludesCurrentPost(): void
    {
        $model = new BlogModel();
        $pastDate = date('Y-m-d H:i:s', strtotime('-2 hours'));

        $id1 = $model->insert([
            'title' => 'Post Alpha',
            'slug' => 'post-alpha',
            'category_id' => 5,
            'published_at' => $pastDate,
        ], true);

        $id2 = $model->insert([
            'title' => 'Post Beta',
            'slug' => 'post-beta',
            'category_id' => 5,
            'published_at' => $pastDate,
        ], true);

        $id3 = $model->insert([
            'title' => 'Post Gamma',
            'slug' => 'post-gamma',
            'category_id' => 5,
            'published_at' => $pastDate,
        ], true);

        // Related to Post Alpha in category 5 -> returns Beta and Gamma, excludes Alpha
        $related = $model->getRelatedPosts((int) $id1, 5, 5);
        $this->assertCount(2, $related);
        $relatedIds = array_column($related, 'id');
        $this->assertNotContains((int) $id1, $relatedIds);
        $this->assertContains((int) $id2, $relatedIds);
        $this->assertContains((int) $id3, $relatedIds);
    }

    public function testBlogControllerMissingPostRedirectsWithoutError(): void
    {
        $mockAuth = new class () {
            public function loggedIn(): bool { return false; }
            public function user(): ?object { return null; }
        };
        Services::injectMock('auth', $mockAuth);

        $controller = new BlogController();
        $request = new IncomingRequest(config('App'), new URI('http://example.com/Blog/Post/missing-post-xyz'), null, new UserAgent());
        $controller->initController($request, new Response(config('App')), Services::logger());

        // Calling viewBlog with non-existent slug redirects to site_url('Blog')
        $response = $controller->viewBlog('missing-post-xyz');

        $this->assertSame(302, $response->getStatusCode());
        $this->assertStringContainsString('Blog', $response->getHeaderLine('Location'));
    }

    public function testKnowledgebaseSlugNormalizationAndCanonicalCategories(): void
    {
        $controller = new KnowledgebaseController();
        $ref = new ReflectionClass($controller);
        $normalizeMethod = $ref->getMethod('normalizeSlug');
        $normalizeMethod->setAccessible(true);

        // 1. Slug normalization logic
        $this->assertSame('account-and-billing', $normalizeMethod->invoke($controller, 'Account_And_Billing'));
        $this->assertSame('integrating-wallets', $normalizeMethod->invoke($controller, 'integrating wallets'));
        $this->assertSame('kyc-verification', $normalizeMethod->invoke($controller, 'KYC-Verification'));
        $this->assertSame('investor-profile', $normalizeMethod->invoke($controller, 'investor_profile'));

        // 2. Unknown slug returns graceful 404 without exception
        $request = new IncomingRequest(config('App'), new URI('http://example.com/Knowledgebase/completely-invalid-topic'), null, new UserAgent());
        $controller->initController($request, new Response(config('App')), Services::logger());

        $response404 = $controller->show('completely-invalid-topic');
        $this->assertSame(404, $response404->getStatusCode());
    }

    public function testDocsIndexScannerAndTraversalProtection(): void
    {
        // 1. Create a temporary docs structure
        $tempDocs = sys_get_temp_dir() . '/mymi_test_docs_' . uniqid();
        @mkdir($tempDocs . '/sub', 0755, true);

        file_put_contents($tempDocs . '/getting-started.md', "# Getting Started Guide\n\nThis is the first step in setting up MyMI Wallet.\nLine 2 text.");
        file_put_contents($tempDocs . '/sub/security.md', "# Security Architecture\n\nAll cryptographic keys are isolated.");
        file_put_contents($tempDocs . '/notes.txt', "Not a markdown file.");

        $index = new DocsIndex($tempDocs);

        // 2. Scan finds only .md files and extracts title + snippet
        $scanned = $index->scan();
        $this->assertCount(2, $scanned);

        $titles = array_column($scanned, 'title');
        $this->assertContains('Getting Started Guide', $titles);
        $this->assertContains('Security Architecture', $titles);

        // 3. getContents valid relative path
        $content = $index->getContents('getting-started.md');
        $this->assertStringContainsString('Getting Started Guide', $content);

        // 4. Directory traversal attempt is blocked
        $traversal = $index->getContents('../../../../../etc/passwd');
        $this->assertSame('', $traversal);

        // 5. Cleanup temp files
        @unlink($tempDocs . '/getting-started.md');
        @unlink($tempDocs . '/sub/security.md');
        @unlink($tempDocs . '/notes.txt');
        @rmdir($tempDocs . '/sub');
        @rmdir($tempDocs);
    }

    public function testDocsApiControllerReturnsStructuredJson(): void
    {
        $controller = new DocsAPIController();
        $request = new IncomingRequest(config('App'), new URI('http://example.com/API/Docs/index'), null, new UserAgent());
        $controller->initController($request, new Response(config('App')), Services::logger());

        // 1. Index endpoint
        $response = $controller->index();
        $this->assertSame(200, $response->getStatusCode());
        $body = json_decode((string) $response->getBody(), true);
        $this->assertSame('success', $body['status']);
        $this->assertIsArray($body['data']);

        // 2. View endpoint with safe path
        $viewReq = new IncomingRequest(config('App'), new URI('http://example.com/API/Docs/view?path=README.md'), null, new UserAgent());
        $controller->initController($viewReq, new Response(config('App')), Services::logger());
        $viewResp = $controller->view();
        $this->assertSame(200, $viewResp->getStatusCode());
        $viewBody = json_decode((string) $viewResp->getBody(), true);
        $this->assertSame('success', $viewBody['status']);
        $this->assertArrayHasKey('path', $viewBody['data']);
        $this->assertArrayHasKey('content', $viewBody['data']);
    }
}

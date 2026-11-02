<?php

declare(strict_types=1);

namespace Tests\Unit\Release;

use App\Commands\Release\MymiImmutableHotfixRelease;
use PHPUnit\Framework\TestCase;
use RuntimeException;

/** All mutation tests operate solely inside fresh OS-temp test fixtures. */
final class MymiImmutableHotfixReleaseTest extends TestCase
{
    private const OLD = '20261026T205500Z-marketing-distro-1ff876823';
    private const NEW = '20261102T140000Z-p0-658-hotfix-v1';
    private const PATHS = [
        'app/Controllers/AuthController.php',
        'app/Filters/CsrfDebugFilter.php',
        'app/Views/Auth/register_form.php',
    ];

    /** @return array{0:string,1:array<string,mixed>,2:string} */
    private function fixture(): array
    {
        $tmp = sys_get_temp_dir() . '/mymi-661-tests-' . bin2hex(random_bytes(8));
        $root = $tmp . '/site';
        $baseline = $root . '/releases/' . self::OLD;
        $overlay = $tmp . '/overlay';
        $evidence = $tmp . '/evidence';
        foreach ([$baseline, $overlay, $evidence, $tmp . '/shared/writable', $tmp . '/shared/env'] as $directory) {
            self::assertTrue(mkdir($directory, 0755, true));
        }
        self::assertTrue(symlink($tmp . '/shared/writable', $baseline . '/writable'));
        self::assertTrue(symlink($tmp . '/shared/env/.env.production', $baseline . '/.env'));
        self::assertTrue(symlink('releases/' . self::OLD, $root . '/current'));
        $files = [];
        foreach (self::PATHS as $i => $path) {
            self::assertTrue(mkdir(dirname($baseline . '/' . $path), 0755, true));
            self::assertTrue(mkdir(dirname($overlay . '/' . $path), 0755, true));
            $old = 'ORIGINAL-' . $i;
            $new = 'FIXED-' . $i;
            file_put_contents($baseline . '/' . $path, $old);
            file_put_contents($overlay . '/' . $path, $new);
            $files[$path] = [
                'pre_sha256' => hash('sha256', $old),
                'post_sha256' => hash('sha256', $new),
            ];
        }
        $manifest = [
            'schema' => 'mymi_immutable_hotfix_v1',
            'release_id' => self::NEW,
            'baseline_release_id' => self::OLD,
            'baseline_link' => 'releases/' . self::OLD,
            'overlay_root' => $overlay,
            'evidence_root' => $evidence,
            'files' => $files,
        ];
        return [$root, $manifest, hash('sha256', json_encode($manifest, JSON_UNESCAPED_SLASHES))];
    }

    public function testPlanAndCertifyAreReadOnly(): void
    {
        [$root, $m, $hash] = $this->fixture();
        $result = MymiImmutableHotfixRelease::executePhase('plan', $m, $root, $hash);
        self::assertSame(3, $result['change_count']);
        self::assertSame(false, $result['production_modified']);
        self::assertSame(
            $result['build_gate_sha256'],
            MymiImmutableHotfixRelease::executePhase('certify', $m, $root, $hash)['build_gate_sha256']
        );
        self::assertFalse(file_exists($root . '/releases/' . self::NEW));
        self::assertSame('releases/' . self::OLD, readlink($root . '/current'));
    }

    public function testRefusesUnexpectedFourthPath(): void
    {
        [$root, $m, $hash] = $this->fixture();
        $m['files']['app/Config/Routes.php'] = ['pre_sha256' => str_repeat('0', 64), 'post_sha256' => str_repeat('1', 64)];
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('manifest_exact_three_file_scope_required');
        MymiImmutableHotfixRelease::executePhase('plan', $m, $root, $hash);
    }

    public function testRefusesPreimageDrift(): void
    {
        [$root, $m, $hash] = $this->fixture();
        file_put_contents($root . '/releases/' . self::OLD . '/' . self::PATHS[0], 'DRIFT');
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('hotfix_hash_mismatch');
        MymiImmutableHotfixRelease::executePhase('certify', $m, $root, $hash);
    }

    public function testRefusesCurrentSymlinkDrift(): void
    {
        [$root, $m, $hash] = $this->fixture();
        // Isolated fixture deliberately tests a different current-link target.
        $link = $root . '/current';
        rename($link, $root . '/preserved-current-link');
        symlink('releases/not-the-certified-baseline', $link);
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('current_symlink_drift');
        MymiImmutableHotfixRelease::executePhase('plan', $m, $root, $hash);
    }

    public function testRefusesUnapprovedBuild(): void
    {
        [$root, $m, $hash] = $this->fixture();
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('build_approval_token_mismatch');
        MymiImmutableHotfixRelease::executePhase('build', $m, $root, $hash, str_repeat('0', 64));
    }

    public function testBuildAndActivationRequireSeparateExactGates(): void
    {
        [$root, $m, $hash] = $this->fixture();
        $initial = MymiImmutableHotfixRelease::executePhase('certify', $m, $root, $hash);
        $built = MymiImmutableHotfixRelease::executePhase('build', $m, $root, $hash, $initial['build_gate_sha256']);
        $candidate = $root . '/releases/' . self::NEW;
        self::assertTrue(is_dir($candidate));
        self::assertSame('releases/' . self::OLD, readlink($root . '/current'));
        self::assertTrue(is_link($candidate . '/writable'));
        self::assertTrue(is_link($candidate . '/.env'));
        foreach (self::PATHS as $i => $path) {
            self::assertSame('FIXED-' . $i, file_get_contents($candidate . '/' . $path));
            self::assertSame('ORIGINAL-' . $i, file_get_contents($root . '/releases/' . self::OLD . '/' . $path));
        }
        try {
            MymiImmutableHotfixRelease::executePhase('activate', $m, $root, $hash, str_repeat('0', 64));
            self::fail('Activation accepted incorrect token');
        } catch (RuntimeException $e) {
            self::assertSame('activation_approval_token_mismatch', $e->getMessage());
        }
        self::assertSame('releases/' . self::OLD, readlink($root . '/current'));
        $activated = MymiImmutableHotfixRelease::executePhase('activate', $m, $root, $hash, $built['activate_gate_sha256']);
        self::assertTrue($activated['production_modified']);
        self::assertSame('releases/' . self::NEW, readlink($root . '/current'));
        self::assertTrue(MymiImmutableHotfixRelease::executePhase('verify', $m, $root, $hash)['active']);
    }

    public function testRefusesUnexpectedSymlinkInBaseline(): void
    {
        [$root, $m, $hash] = $this->fixture();
        symlink('/tmp', $root . '/releases/' . self::OLD . '/unexpected-link');
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('unapproved_release_symlink');
        MymiImmutableHotfixRelease::executePhase('certify', $m, $root, $hash);
    }

    public function testRefusesDuplicateReleaseId(): void
    {
        [$root, $m, $hash] = $this->fixture();
        mkdir($root . '/releases/' . self::NEW);
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('release_already_exists');
        MymiImmutableHotfixRelease::executePhase('plan', $m, $root, $hash);
    }

    public function testRejectsConcurrentBuildLock(): void
    {
        [$root, $m, $hash] = $this->fixture();
        $plan = MymiImmutableHotfixRelease::executePhase('certify', $m, $root, $hash);
        $path = $m['evidence_root'] . '/.mymi-release-global.lock';
        $handle = fopen($path, 'c+');
        self::assertNotFalse($handle);
        self::assertTrue(flock($handle, LOCK_EX | LOCK_NB));
        try {
            $this->expectException(RuntimeException::class);
            $this->expectExceptionMessage('concurrent_release_lock_held');
            MymiImmutableHotfixRelease::executePhase('build', $m, $root, $hash, $plan['build_gate_sha256']);
        } finally {
            flock($handle, LOCK_UN);
            fclose($handle);
        }
    }
}
